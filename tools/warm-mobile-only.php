<?php
/**
 * warm-mobile-only.php
 *
 * Re-generate only the 400px mobile screenshots using microlink with a
 * proper iPhone-shaped viewport (390x844, isMobile=true) so the site's
 * mobile responsive layout renders (hamburger menu, stacked cards, etc.)
 * instead of a squashed 4:3 desktop-at-400-wide capture.
 *
 * USAGE: C:\xampp\php\php.exe tools/warm-mobile-only.php [--only=<substr>]
 */

if (php_sapi_name() !== 'cli') { exit("CLI only.\n"); }

$rootDir  = dirname(__DIR__);
$cacheDir = $rootDir . '/assets/images/portfolio/cache';
if (!is_dir($cacheDir)) { mkdir($cacheDir, 0777, true); }

$onlyArg = null;
foreach ($argv as $a) {
    if (strpos($a, '--only=') === 0) { $onlyArg = substr($a, strlen('--only=')); }
}

$portfolioSrc = file_get_contents($rootDir . '/portfolio.php');
if (!preg_match('/\$projects\s*=\s*(\[.*?\n\];)/s', $portfolioSrc, $m)) {
    exit("Could not locate \$projects in portfolio.php\n");
}
$projects = eval('return ' . rtrim($m[1], ';') . ';');
echo "Found " . count($projects) . " projects.\n";

foreach ($projects as $p) {
    $url = $p['url'] ?? null; if (!$url) continue;
    if ($onlyArg && stripos($url, $onlyArg) === false) continue;

    $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', preg_replace('#^https?://(www\.)?#', '', rtrim($url, '/'))));
    $slug = trim($slug, '-');
    $dest = $cacheDir . '/' . $slug . '-400.jpg';

    echo "== " . ($p['client'] ?? $url) . "\n";
    // thum.io free service — no API key, generous quota, waits for page
    // load. viewportWidth/390 forces the site to render its mobile layout
    // (hamburger menu, stacked hero, mobile CSS breakpoints).
    $api = 'https://image.thum.io/get/viewportWidth/390/width/390/wait/8/noanimate/' . $url;

    $ctx = stream_context_create([
        'http' => ['method' => 'GET', 'timeout' => 60, 'header' => "User-Agent: Mozilla/5.0 (Nubevest warmer)\r\n"],
        'ssl'  => ['verify_peer' => false, 'verify_peer_name' => false],
    ]);
    $bytes = @file_get_contents($api, false, $ctx);
    if ($bytes && strlen($bytes) >= 20000) {
        file_put_contents($dest, $bytes);
        echo "   OK, saved " . round(strlen($bytes) / 1024) . " KB → " . basename($dest) . "\n";
    } else {
        echo "   [!] microlink returned " . ($bytes === false ? 'error' : strlen($bytes) . ' bytes') . "\n";
    }
    // Small delay to stay under microlink's 60/min free-tier limit.
    usleep(1200000);
}
echo "\nDone. Refresh /portfolio.php to see the phone-shaped mobile screenshots.\n";
