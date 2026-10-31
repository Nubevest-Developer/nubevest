<?php
/**
 * Nubevest AI chatbot backend.
 *
 * Accepts POST JSON { message: string } and returns { reply: string }.
 * Maintains conversation history in the PHP session.
 */

declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');

session_start();

$config = require __DIR__ . '/../config/ai.php';

if (empty($config['api_key'])) {
    http_response_code(500);
    echo json_encode(['error' => 'Chatbot is not configured yet. Please set ANTHROPIC_API_KEY.']);
    exit;
}

$raw = file_get_contents('php://input');
$body = json_decode($raw ?: '', true);
$message = trim((string)($body['message'] ?? ''));

if ($message === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Empty message.']);
    exit;
}
if (mb_strlen($message) > 2000) {
    http_response_code(400);
    echo json_encode(['error' => 'Message is too long. Keep it under 2000 characters.']);
    exit;
}

// Optional reset flag
if (!empty($body['reset'])) {
    $_SESSION['nv_chat_history'] = [];
}

$history = $_SESSION['nv_chat_history'] ?? [];
$history[] = ['role' => 'user', 'content' => $message];

// Trim history so we don't send unbounded context each time.
$limit = (int)($config['history_limit'] ?? 12) * 2;
if (count($history) > $limit) {
    $history = array_slice($history, -$limit);
}

$systemPrompt = <<<TXT
You are "Nubi", the AI assistant for **Nubevest** — a Melbourne-founded business growth, technology and operations company that helps Australian businesses through one accountable relationship.

## Company snapshot
- Phone: 1300 959 514
- Email: info@nubevest.com.au
- Address: Unit 112/43 Danaher Drive, South Morang VIC 3752
- Founded 2019 · 120+ projects delivered · 50+ active clients · 3 hubs

## Solutions (services)
- Websites & eCommerce
- Marketing, SEO & Lead Generation
- Software, Apps & Portals
- CRM, Automation & AI
- Managed IT, Cloud & Cybersecurity
- Workplace Technology
- Event Strategy & Management

## Products & Platforms (built in-house)
- **Plannor** — NDIS provider management platform (in development)
- **Go Meta CRM** — leads & workflow platform
- **NDIS Pages** — provider discovery (in development)
- **MetaMeet** — domains, hosting, email & SSL
- **MonitorMart** — hardware & procurement

## Specialist Businesses
- Workers Australia — recruitment & workforce
- Skill to Upskill — education & RPL pathways
- Kangar Dubai Experts — Dubai property guidance
- Nube Rentals — long-term vehicle rentals
- Nubevest Events — expos, networking & production

## How you behave
- Warm, concise, professional. Use plain English. 1–4 short sentences unless the visitor asks for detail.
- Answer questions about Nubevest's services, brands, products, industries, work, and general "how do we start" queries.
- If the visitor asks about pricing, quotes, timelines, or anything requiring a human — offer to book a **Business Systems Review** at /contact.php, or share the phone / email above.
- For NDIS-specific questions, mention Plannor and the NDIS-provider industry page.
- For unrelated topics (personal advice, other companies, jokes, coding help, world news), politely say you're focused on helping with Nubevest and redirect to how you can help.
- Never invent facts, prices, dates, or team member names. If unsure, say so and offer the contact options.
- Never claim to be human. If asked, say you're Nubevest's AI assistant, and a real person is one click away at /contact.php.
- Keep replies plain text — no markdown headers, bold, or lists longer than 3 items.
TXT;

$payload = [
    'model'       => $config['model'],
    'max_tokens'  => (int)$config['max_tokens'],
    'temperature' => (float)$config['temperature'],
    'system'      => $systemPrompt,
    'messages'    => array_values($history),
];

$ch = curl_init('https://api.anthropic.com/v1/messages');
$curlOpts = [
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 60,
    CURLOPT_CONNECTTIMEOUT => 15,
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
        'x-api-key: ' . $config['api_key'],
        'anthropic-version: 2023-06-01',
    ],
    CURLOPT_POSTFIELDS     => json_encode($payload),
];

// XAMPP on Windows often has an out-of-date ca-bundle; disable SSL verify
// when running from localhost so cURL doesn't fail on cert lookup.
$isLocal = in_array(($_SERVER['SERVER_NAME'] ?? ''), ['localhost', '127.0.0.1', '::1'], true);
if ($isLocal) {
    $curlOpts[CURLOPT_SSL_VERIFYPEER] = false;
    $curlOpts[CURLOPT_SSL_VERIFYHOST] = 0;
}

curl_setopt_array($ch, $curlOpts);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlErr  = curl_error($ch);
curl_close($ch);

// Log failures to help diagnose
if ($response === false || $httpCode >= 400) {
    @file_put_contents(
        __DIR__ . '/../config/chat-error.log',
        '[' . date('c') . "] HTTP=$httpCode  err=$curlErr  body=" . substr((string)$response, 0, 600) . "\n",
        FILE_APPEND
    );
}

if ($response === false) {
    http_response_code(502);
    echo json_encode(['error' => 'Upstream error: ' . $curlErr]);
    exit;
}

$data = json_decode($response, true);

if ($httpCode >= 400 || empty($data['content'][0]['text'])) {
    http_response_code(502);
    $errMsg = $data['error']['message'] ?? 'Unexpected upstream response.';
    echo json_encode(['error' => $errMsg]);
    exit;
}

$reply = trim((string)$data['content'][0]['text']);

// Persist assistant turn.
$history[] = ['role' => 'assistant', 'content' => $reply];
$_SESSION['nv_chat_history'] = $history;

echo json_encode(['reply' => $reply]);
