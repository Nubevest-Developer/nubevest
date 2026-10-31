<?php
/**
 * POST /print-signage/api/price.php
 *
 * Body: JSON configuration from the price calculator.
 * Returns: {status: "priced" | "quote_required" | "error", ...}
 *
 * Read-only: it validates and prices, it never stores anything or takes payment.
 */

declare(strict_types=1);

require __DIR__ . '/../lib/pricing.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');

function np_respond(int $code, array $body): void
{
    http_response_code($code);
    echo json_encode($body, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Allow: POST');
    np_respond(405, ['status' => 'error', 'errors' => ['_' => 'Use POST.']]);
}

$raw = file_get_contents('php://input', false, null, 0, 8192);
$in  = json_decode($raw ?: '', true);
if (!is_array($in)) {
    np_respond(400, ['status' => 'error', 'errors' => ['_' => 'We couldn’t read that request. Refresh the page and try again.']]);
}

try {
    $result = np_evaluate($in);
} catch (Throwable $e) {
    error_log('[printing/price] ' . $e->getMessage());
    np_respond(500, ['status' => 'error', 'errors' => ['_' => 'Something went wrong on our side. Try again, or call 1300 959 514.']]);
}

np_respond($result['status'] === 'error' ? 422 : 200, $result);
