<?php
/**
 * Config for the /print-signage (printing) module inside the Nubevest site.
 *
 * Every URL is root-relative. includes/header.php prefixes them with BASE_URL
 * when the site runs in a subfolder (localhost/nubevest/), and is a no-op at
 * the domain root. Quote requests go to the site's own contact handler with
 * the same reCAPTCHA settings as the contact page.
 */

$nvHost    = strtolower(preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? ''));
$nvIsLocal = in_array($nvHost, ['localhost', '127.0.0.1', '[::1]'], true)
          || substr($nvHost, -10) === '.localhost'
          || substr($nvHost, -5) === '.test';

define('NV_ENV', $nvIsLocal ? 'local' : 'production');

// Web root of the Nubevest site on disk (for asset cache-busting).
define('NV_ROOT', dirname(__DIR__, 2));

// Quote requests reuse the existing contact handler (AJAX POST, JSON response).
define('NV_QUOTE_ENDPOINT', '/contact-submit.php');

// reCAPTCHA v3 site key, shared with the contact form.
$nvRecaptcha = @include NV_ROOT . '/includes/recaptcha-config.php';
define('NV_RECAPTCHA_KEY', is_array($nvRecaptcha) && !empty($nvRecaptcha['enabled']) ? (string) $nvRecaptcha['site_key'] : '');
unset($nvRecaptcha);

// `service` value sent to /contact-submit.php (shown as "Needs help with" in the email).
define('NV_QUOTE_SERVICE', 'printing');

// Online checkout is not built. While false, copy says "quote" rather than "order".
define('NV_CHECKOUT_LIVE', false);

function nv_e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** URL for a page on the Nubevest site, e.g. nv_site('/about.php'). */
function nv_site(string $path): string
{
    return $path;
}

/** URL for a static file, cache-busted by modification time. */
function nv_asset(string $path): string
{
    $file = NV_ROOT . $path;
    return $path . (is_file($file) ? '?v=' . filemtime($file) : '');
}

/** URL inside the printing module, e.g. nv_printing('/print-signage/'). */
function nv_printing(string $path): string
{
    return $path;
}

/** Absolute URL path for use inside JS/JSON, where header.php can't rewrite it. */
function nv_js_url(string $path): string
{
    return (defined('BASE_URL') ? BASE_URL : '') . $path;
}
