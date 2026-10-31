<?php
/**
 * warm-desktop-only.php
 *
 * Re-generate the 1200px desktop screenshots using thum.io with a 1440px
 * viewport (proper desktop rendering) waiting for page + animations to
 * settle. Same pattern as warm-mobile-only.php.
 *
 * USAGE:
 *   C:\xampp\php\php.exe tools/warm-desktop-only.php [--only=<substr>] [--force]
 *
 * Without --force, only URLs whose 1200px file is missing or under 40 KB
 * are re-warmed (safe to re-run).
 */

if (php_sapi_name() !== 'cli') { exit("CLI only.\n"); }

$rootDir  = dirname(__DIR__);
$cacheDir = $rootDir . '/assets/images/portfolio/cache';
if (!is_dir($cacheDir)) { mkdir($cacheDir, 0777, true); }

$onlyArg = null;
$force   = in_array('--force', $argv, true);
foreach ($argv as $a) {
    if (strpos($a, '--only=') === 0) { $onlyArg = substr($a, strlen('--only=')); }
}

$portfolioSrc = file_get_contents($rootDir . '/portfolio.php');
if (!preg_match('/\$projects\s*=\s*(\[.*?\n\];)/s', $portfolioSrc, $m)) {
    exit("Could not locate \$projects in portfolio.php\n");
}
$projects = eval('return ' . rtrim($m[1], ';') . ';');
echo "Found " . count($projects) . " projects.\n";
echo "Mode: " . ($force ? 'FORCE (re-download all)' : 'GAP-FILL (skip healthy files)') . "\n\n";

foreach ($projects as $p) {
    $url = $p['url'] ?? null; if (!$url) continue;
    if ($onlyArg && stripos($url, $onlyArg) === false) continue;

    $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', preg_replace('#^https?://(www\.)?#', '', rtrim($url, '/'))));
    $slug = trim($slug, '-');
    $dest = $cacheDir . '/' . $slug . '-1200.jpg';

    if (!$force && is_file($dest) && filesize($dest) >= 40000) {
        echo "-- " . ($p['client'] ?? $url) . " — already have " . round(filesize($dest)/1024) . " KB, skip\n";
        continue;
    }

    echo "== " . ($p['client'] ?? $url) . "\n";
    // thum.io: viewportWidth/1440 renders full desktop layout,
    // width/1200 resizes to portfolio's laptop-frame width,
    // crop/900 caps the height, wait/8 lets JS and images settle,
    // noanimate pauses CSS animations mid-frame.
    $api = 'https://image.thum.io/get/viewportWidth/1440/width/1200/crop/900/wait/8/noanimate/' . $url;

    $ctx = stream_context_create([
        'http' => ['method' => 'GET', 'timeout' => 90, 'header' => "User-Agent: Mozilla/5.0 (Nubevest warmer)\r\n"],
        'ssl'  => ['verify_peer' => false, 'verify_peer_name' => false],
    ]);
    $bytes = @file_get_contents($api, false, $ctx);
    if ($bytes && strlen($bytes) >= 30000) {
        file_put_contents($dest, $bytes);
        echo "   OK, saved " . round(strlen($bytes) / 1024) . " KB → " . basename($dest) . "\n";
    } else {
        echo "   [!] thum.io returned " . ($bytes === false ? 'error' : strlen($bytes) . ' bytes') . "\n";
    }
    usleep(1500000);
}
echo "\nDone. Refresh /portfolio.php to see desktop screenshots.\n";
