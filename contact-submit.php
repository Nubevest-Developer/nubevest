<?php
/**
 * Nubevest Contact Form Handler (PHPMailer + SMTP)
 * Processes contact form submissions from contact.php
 *
 * Setup:
 *  1. Fill in SMTP_* values below (Gmail App Password or your SMTP provider).
 *  2. All submissions are also logged to /includes/contact-submissions.log
 *     as a backup — nothing is ever lost.
 */

header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/includes/PHPMailer/PHPMailer.php';
require __DIR__ . '/includes/PHPMailer/SMTP.php';
require __DIR__ . '/includes/PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* ---------- CONFIG ---------- */
$TO_EMAIL       = 'info@nubevest.com.au';
$FROM_EMAIL     = 'smtp@nubevest.co.uk';   // must match SMTP account or Titan will reject
$SITE_NAME      = 'Nubevest';
$LOG_FILE       = __DIR__ . '/includes/contact-submissions.log';

/* SMTP settings — Titan Email */
$SMTP_HOST      = 'smtp.titan.email';
$SMTP_PORT      = 465;
$SMTP_SECURE    = PHPMailer::ENCRYPTION_SMTPS;      // SSL on 465 (use ENCRYPTION_STARTTLS + port 587 as fallback)
$SMTP_USERNAME  = 'smtp@nubevest.co.uk';
$SMTP_PASSWORD  = 'SMTP@2024';

/* ---------- ONLY ACCEPT POST ---------- */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    exit;
}

/* ---------- HELPERS ---------- */
function clean($v) {
    return trim(strip_tags($v ?? ''));
}
function bad($msg, $code = 400) {
    http_response_code($code);
    echo json_encode(['ok' => false, 'error' => $msg]);
    exit;
}

/* ---------- COLLECT INPUT ---------- */
$name          = clean($_POST['name']              ?? '');
$business      = clean($_POST['business']          ?? '');
$email         = clean($_POST['email']             ?? '');
$phone         = clean($_POST['phone']             ?? '');
$service       = clean($_POST['service']           ?? '');
$business_type = clean($_POST['business_type']     ?? '');
$timing        = clean($_POST['timing']            ?? '');
$message       = clean($_POST['message']           ?? '');
$desired_result= clean($_POST['desired_result']    ?? '');
$consent       = isset($_POST['consent']);
$marketing_ok  = isset($_POST['marketing_consent']);

/* ---------- VALIDATE ---------- */
if ($name === '')                                                bad('Please enter your name.');
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) bad('Please enter a valid email address.');
if ($message === '')                                             bad('Please enter your message.');
if (!$consent)                                                   bad('Please accept the Privacy Policy to continue.');

/* Honeypot */
if (!empty($_POST['website'])) {
    echo json_encode(['ok' => true]);
    exit;
}

/* ---------- reCAPTCHA v3 VERIFICATION ---------- */
$recaptcha = @include __DIR__ . '/includes/recaptcha-config.php';
if (is_array($recaptcha) && !empty($recaptcha['enabled'])) {
    $token = trim($_POST['g-recaptcha-response'] ?? '');
    if ($token === '') {
        bad('Security check missing. Please refresh the page and try again.');
    }

    $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 8,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query([
            'secret'   => $recaptcha['secret_key'],
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
        ]),
    ]);
    $rcRaw  = curl_exec($ch);
    $rcCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($rcCode !== 200 || !$rcRaw) {
        bad('Could not verify security check. Please try again in a moment.');
    }
    $rcData    = json_decode($rcRaw, true) ?: [];
    $rcOk      = !empty($rcData['success']);
    $rcScore   = isset($rcData['score']) ? (float)$rcData['score'] : 0.0;
    $rcAction  = $rcData['action'] ?? '';
    $rcMinScore = (float)($recaptcha['min_score'] ?? 0.5);
    $rcExpectedAction = $recaptcha['action'] ?? 'contact_submit';

    if (!$rcOk || $rcAction !== $rcExpectedAction || $rcScore < $rcMinScore) {
        bad('Security check failed. If this is a mistake, please email us directly at info@nubevest.com.au.');
    }
}

/* ---------- BUILD EMAIL ---------- */
$subject = "New enquiry from $name" . ($business ? " ($business)" : '');

$body_text = implode("\n", [
    "You have a new enquiry from the Nubevest website:",
    "",
    "Name:            $name",
    "Business:        " . ($business ?: '—'),
    "Email:           $email",
    "Phone:           " . ($phone ?: '—'),
    "Needs help with: " . ($service ?: '—'),
    "Business type:   " . ($business_type ?: '—'),
    "Timing:          " . ($timing ?: '—'),
    "",
    "Current situation:",
    $message,
    "",
    "Desired result:",
    ($desired_result ?: '—'),
    "",
    "Marketing consent: " . ($marketing_ok ? 'Yes' : 'No'),
    "-----",
    "Submitted: " . date('Y-m-d H:i:s'),
    "IP:        " . ($_SERVER['REMOTE_ADDR'] ?? '—'),
]);

/* Build a nicely formatted branded HTML email */
$row = function($label, $value, $isLast = false) {
    $border = $isLast ? '' : 'border-bottom:1px solid #eef0f4;';
    return '<tr>'
         . '<td style="padding:14px 16px;' . $border . 'width:130px;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#6b7280;font-weight:600;text-transform:uppercase;letter-spacing:0.4px;vertical-align:top;background:#fafbfc;">' . $label . '</td>'
         . '<td style="padding:14px 20px;' . $border . 'font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#111827;vertical-align:top;">' . $value . '</td>'
         . '</tr>';
};

$emailLink   = '<a href="mailto:' . htmlspecialchars($email) . '" style="color:#2563eb;text-decoration:none;">' . htmlspecialchars($email) . '</a>';
$phoneLink   = $phone ? '<a href="tel:' . htmlspecialchars(preg_replace('/\s+/', '', $phone)) . '" style="color:#2563eb;text-decoration:none;">' . htmlspecialchars($phone) . '</a>' : '<span style="color:#9ca3af;">—</span>';
$businessVal = $business ? htmlspecialchars($business) : '<span style="color:#9ca3af;">—</span>';
$serviceVal  = $service ? '<span style="display:inline-block;padding:4px 10px;background:#eef2ff;color:#4338ca;border-radius:12px;font-size:13px;font-weight:600;">' . htmlspecialchars($service) . '</span>' : '<span style="color:#9ca3af;">—</span>';
$btypeVal    = $business_type ? '<span style="display:inline-block;padding:4px 10px;background:#fef3c7;color:#92400e;border-radius:12px;font-size:13px;font-weight:600;">' . htmlspecialchars($business_type) . '</span>' : '<span style="color:#9ca3af;">—</span>';
$timingVal   = $timing ? '<span style="display:inline-block;padding:4px 10px;background:#dcfce7;color:#166534;border-radius:12px;font-size:13px;font-weight:600;">' . htmlspecialchars($timing) . '</span>' : '<span style="color:#9ca3af;">—</span>';
$messageVal  = '<div style="white-space:pre-wrap;line-height:1.6;color:#1f2937;">' . nl2br(htmlspecialchars($message)) . '</div>';
$resultVal   = $desired_result ? '<div style="white-space:pre-wrap;line-height:1.6;color:#1f2937;">' . nl2br(htmlspecialchars($desired_result)) . '</div>' : '<span style="color:#9ca3af;">—</span>';
$marketingVal= $marketing_ok ? '<span style="color:#166534;font-weight:600;">Yes — opted in</span>' : '<span style="color:#9ca3af;">No</span>';

$body_html = '
<div style="background:#f4f6fb;padding:32px 16px;font-family:Arial,Helvetica,sans-serif;">
  <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="max-width:620px;margin:0 auto;background:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 4px 20px rgba(20,30,60,0.08);">

    <!-- Header -->
    <tr>
      <td style="background:linear-gradient(135deg,#2f88ff 0%,#e53935 40%,#fdc82f 70%,#43a047 100%);padding:28px 32px;">
        <table role="presentation" width="100%"><tr>
          <td style="color:#ffffff;font-family:Arial,Helvetica,sans-serif;">
            <div style="font-size:13px;font-weight:600;letter-spacing:2px;opacity:0.9;text-transform:uppercase;">Nubevest</div>
            <div style="font-size:22px;font-weight:700;margin-top:6px;">📩 New Website Enquiry</div>
          </td>
        </tr></table>
      </td>
    </tr>

    <!-- Intro -->
    <tr>
      <td style="padding:28px 32px 8px;font-family:Arial,Helvetica,sans-serif;">
        <p style="margin:0 0 4px;color:#111827;font-size:16px;">Hi team,</p>
        <p style="margin:0;color:#4b5563;font-size:15px;line-height:1.5;">You have received a new enquiry from <b>' . htmlspecialchars($name) . '</b>' . ($business ? ' at <b>' . htmlspecialchars($business) . '</b>' : '') . ' via the Nubevest website.</p>
      </td>
    </tr>

    <!-- Details table -->
    <tr>
      <td style="padding:20px 32px 8px;">
        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #eef0f4;border-radius:10px;overflow:hidden;">'
          . $row('Name',              htmlspecialchars($name))
          . $row('Business',          $businessVal)
          . $row('Email',             $emailLink)
          . $row('Phone',             $phoneLink)
          . $row('Needs help with',   $serviceVal)
          . $row('Business type',     $btypeVal)
          . $row('Timing',            $timingVal)
          . $row('Current situation', $messageVal)
          . $row('Desired result',    $resultVal)
          . $row('Marketing',         $marketingVal, true)
        . '</table>
      </td>
    </tr>

    <!-- CTA -->
    <tr>
      <td style="padding:8px 32px 24px;text-align:center;">
        <a href="mailto:' . htmlspecialchars($email) . '?subject=Re:%20Your%20enquiry%20with%20Nubevest" style="display:inline-block;padding:12px 28px;background:#2563eb;color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:600;text-decoration:none;border-radius:8px;">↩ Reply to ' . htmlspecialchars(explode(' ', $name)[0]) . '</a>
      </td>
    </tr>

    <!-- Footer -->
    <tr>
      <td style="padding:16px 32px 24px;background:#fafbfc;border-top:1px solid #eef0f4;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#6b7280;line-height:1.6;">
        <b>Submitted:</b> ' . date('D, d M Y · H:i:s') . '<br>
        <b>IP:</b> ' . htmlspecialchars($_SERVER['REMOTE_ADDR'] ?? '—') . '<br>
        <b>Source:</b> <a href="https://nubevest.com.au/contact.php" style="color:#2563eb;text-decoration:none;">nubevest.com.au/contact</a>
      </td>
    </tr>

  </table>
  <p style="text-align:center;margin:16px 0 0;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#9ca3af;">© ' . date('Y') . ' Nubevest — Business Technology, Connected.</p>
</div>';

/* ---------- LOG ALWAYS (backup) ---------- */
$log_entry = "\n==================== " . date('Y-m-d H:i:s') . " ====================\n" . $body_text . "\n";
@file_put_contents($LOG_FILE, $log_entry, FILE_APPEND | LOCK_EX);

/* ---------- SEND VIA PHPMailer/SMTP ---------- */
$sent = false;
$err  = '';

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = $SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = $SMTP_USERNAME;
    $mail->Password   = $SMTP_PASSWORD;
    $mail->SMTPSecure = $SMTP_SECURE;
    $mail->Port       = $SMTP_PORT;
    $mail->CharSet    = 'UTF-8';

    $mail->setFrom($FROM_EMAIL, $SITE_NAME);
    $mail->addAddress($TO_EMAIL);
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body_html;
    $mail->AltBody = $body_text;

    $sent = $mail->send();
} catch (Exception $e) {
    $err = $mail->ErrorInfo ?? $e->getMessage();
    @file_put_contents($LOG_FILE, "MAIL ERROR: $err\n", FILE_APPEND | LOCK_EX);
}

echo json_encode([
    'ok'      => true,
    'mailed'  => (bool) $sent,
    'message' => 'Thanks — your enquiry has been received. We\'ll be in touch shortly.'
]);
exit;
