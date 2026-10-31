<?php
// The Print & Signage page now lives at /print-signage/.
// Old links land here; send them on with a permanent redirect (query string kept).
$qs = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '' ? '?' . $_SERVER['QUERY_STRING'] : '';
header('Location: ../print-signage/' . $qs, true, 301);
exit;
