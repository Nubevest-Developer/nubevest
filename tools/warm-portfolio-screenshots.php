<?php
/**
 * warm-portfolio-screenshots.php
 *
 * One-shot CLI script that walks every URL in portfolio.php,
 * asks WordPress mshots to generate a screenshot, waits for
 * the real image (not the "Generating Preview…" placeholder),
 * and saves it as a local JPG in
 *   assets/images/portfolio/cache/<slug>-<width>.jpg
 *
 * portfolio.php's nv_shot() prefers those local files, so once
 * this script has run the portfolio grid loads instantly with
 * no mshots waiting.
 *
 * USAGE (from project root):
 *   C:\xampp\php\php.exe tools/warm-portfolio-screenshots.php
 *
 * Flags:
 *   --force              re-download every screenshot even if cached
 *   --only=<substring>   only warm URLs containing <substring>
 *   --service=microlink  use microlink.io (waits for networkidle, better
 *                        for pages with animations/lazy-loading; default
 *                        service is mshots which is faster but sometimes
 *                        captures mid-animation)
 */

if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit("This script must be run from the command line.\n");
}

$rootDir  = dirname(__DIR__);
$cacheDir = $rootDir . '/assets/images/portfolio/cache';
if (!is_dir($cacheDir)) {
    mkdir($cacheDir, 0777, true);
}

$force   = in_array('--force', $argv, true);
$onlyArg = null;
$service = 'mshots';
foreach ($argv as $a) {
    if (strpos($a, '--only=') === 0) {
        $onlyArg = substr($a, strlen('--only='));
    }
    if (strpos($a, '--service=') === 0) {
        $service = substr($a, strlen('--service='));
    }
}
echo "Screenshot service: {$service}\n";

/* --------------------------------------------------------------
   Extract the $projects array from portfolio.php without
   executing the whole page (avoids header/footer includes).
   -------------------------------------------------------------- */
$portfolioSrc = file_get_contents($rootDir . '/portfolio.php');
if (!$portfolioSrc) {
    exit("Could not read portfolio.php\n");
}

// Grab everything from `$projects = [` up to `];` at the top level.
if (!preg_match('/\$projects\s*=\s*(\[.*?\n\];)/s', $portfolioSrc, $m)) {
    exit("Could not locate \$projects array in portfolio.php\n");
}
$projectsLiteral = rtrim($m[1], ';');

$projects = null;
try {
    $projects = eval('return ' . $projectsLiteral . ';');
} catch (Throwable $e) {
    exit("Failed to eval \$projects: " . $e->getMessage() . "\n");
}
if (!is_array($projects)) {
    exit("\$projects did not evaluate to an array.\n");
}

echo "Found " . count($projects) . " projects.\n";

/* --------------------------------------------------------------
   Warm each URL at two widths (1200 desktop, 400 mobile).
   -------------------------------------------------------------- */
$widths       = [1200, 400];
$maxAttempts  = 12;      // ~2 minutes per URL in worst case
$delaySeconds = 10;

foreach ($projects as $p) {
    $url = $p['url'] ?? null;
    if (!$url) { continue; }
    if ($onlyArg && stripos($url, $onlyArg) === false) { continue; }

    echo "\n== " . ($p['client'] ?? $url) . " ($url)\n";

    foreach ($widths as $w) {
        $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', preg_replace('#^https?://(www\.)?#', '', rtrim($url, '/'))));
        $slug = trim($slug, '-');
        $dest = $cacheDir . '/' . $slug . '-' . $w . '.jpg';

        if (!$force && is_file($dest) && filesize($dest) > 15000) {
            echo "   [skip {$w}px] already cached (" . round(filesize($dest) / 1024) . " KB)\n";
            continue;
        }

        echo "   [ {$w}px ] warming via {$service}...\n";
        $ok = false;

        if ($service === 'microlink') {
            // Microlink waits for networkidle before capturing — much better
            // for animated hero sections and lazy-loaded content.
            //
            // Viewport strategy:
            //   desktop (w >= 1000): 4:3 landscape crop
            //   mobile  (w <  1000): iPhone-style portrait 390x844 so the
            //                        site's mobile responsive layout renders
            //                        (hamburger menu, stacked cards, etc.).
            if ($w >= 1000) {
                $vpW = $w;
                $vpH = intval($w * 0.75);
                $isMobile = 'false';
            } else {
                $vpW = 390;
                $vpH = 844;
                $isMobile = 'true';
            }
            $api = 'https://api.microlink.io/?' . http_build_query([
                'url'             => $url,
                'screenshot'      => 'true',
                'meta'            => 'false',
                'embed'           => 'screenshot.url',
                'waitUntil'       => 'networkidle0',
                'viewport.width'  => $vpW,
                'viewport.height' => $vpH,
                'viewport.isMobile' => $isMobile,
                'viewport.hasTouch' => $isMobile,
                'viewport.deviceScaleFactor' => 2,
                'type'            => 'jpeg',
                'quality'         => 82,
            ]);
            // Microlink follows the redirect for us because embed=screenshot.url
            // returns the image binary directly.
            $bytes = fetchBinary($api);
            if ($bytes !== null && strlen($bytes) >= 20000) {
                file_put_contents($dest, $bytes);
                echo "     OK, saved " . round(strlen($bytes) / 1024) . " KB\n";
                $ok = true;
            } else {
                echo "     microlink returned " . ($bytes === null ? "null" : strlen($bytes) . " bytes") . "\n";
            }
        } else {
            // Default: WordPress mshots — fast, cached, but placeholder-first.
            $mshotUrl = 'https://s.wordpress.com/mshots/v1/' . rawurlencode($url) . '?w=' . $w;
            fetchBinary($mshotUrl); // kick off generation
            for ($i = 1; $i <= $maxAttempts; $i++) {
                sleep($delaySeconds);
                $bytes = fetchBinary($mshotUrl);
                if ($bytes === null) {
                    echo "     attempt {$i}: request failed\n";
                    continue;
                }
                $size = strlen($bytes);
                $minBytes = ($w >= 1000) ? 40000 : 20000;
                if ($size >= $minBytes) {
                    file_put_contents($dest, $bytes);
                    echo "     attempt {$i}: OK, saved " . round($size / 1024) . " KB\n";
                    $ok = true;
                    break;
                } else {
                    echo "     attempt {$i}: still placeholder (" . round($size / 1024) . " KB), waiting...\n";
                }
            }
        }

        if (!$ok) {
            echo "   [!] gave up on {$w}px — mshots kept returning placeholder.\n";
            echo "       Try again later, or drop a screenshot manually into:\n";
            echo "       " . $dest . "\n";
        }
    }
}

echo "\nDone. Refresh /portfolio.php to see cached screenshots.\n";

/* -------------------------------------------------------------- */
function fetchBinary($url) {
    $ctx = stream_context_create([
        'http' => [
            'method'  => 'GET',
            'timeout' => 30,
            'header'  => "User-Agent: Mozilla/5.0 (Nubevest portfolio warmer)\r\n",
        ],
        'ssl' => [
            'verify_peer'      => false,
            'verify_peer_name' => false,
        ],
    ]);
    $data = @file_get_contents($url, false, $ctx);
    return $data === false ? null : $data;
}
