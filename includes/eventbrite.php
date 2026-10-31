<?php
// Eventbrite API helper — fetches events for the configured organisation
// and caches the response so we don't hit the API on every page load.

function nv_eventbrite_config() {
    static $cfg = null;
    if ($cfg === null) {
        $cfg = include __DIR__ . '/eventbrite-config.php';
    }
    return $cfg;
}

function nv_eventbrite_cache_path($status) {
    $dir = __DIR__ . '/cache';
    if (!is_dir($dir)) { @mkdir($dir, 0775, true); }
    return $dir . '/eventbrite-' . preg_replace('/[^a-z_]/i', '', $status) . '.json';
}

function nv_eventbrite_fetch($status = 'live', $order = 'start_asc') {
    $cfg   = nv_eventbrite_config();
    $token = $cfg['private_token'];
    $org   = $cfg['organization_id'];

    $all  = [];
    $page = 1;
    do {
        $url = 'https://www.eventbriteapi.com/v3/organizations/' . rawurlencode($org)
             . '/events/?status=' . rawurlencode($status)
             . '&order_by=' . rawurlencode($order)
             . '&expand=venue,logo&page=' . $page;

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_HTTPHEADER     => [
                'Authorization: Bearer ' . $token,
                'Accept: application/json',
            ],
        ]);
        $body = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($code !== 200 || !$body) { return $page === 1 ? null : $all; }
        $data = json_decode($body, true);
        if (empty($data['events'])) break;

        $all = array_merge($all, $data['events']);
        $hasMore = !empty($data['pagination']['has_more_items']);
        $page++;
        if ($page > 10) break; // safety cap
    } while ($hasMore);

    return $all;
}

function nv_eventbrite_get_events($status = 'live', $order = 'start_asc') {
    $cfg   = nv_eventbrite_config();
    $cache = nv_eventbrite_cache_path($status);
    $ttl   = max(1, (int)$cfg['cache_minutes']) * 60;

    if (is_file($cache) && (time() - filemtime($cache)) < $ttl) {
        $cached = json_decode(file_get_contents($cache), true);
        if (is_array($cached)) { return $cached; }
    }

    $events = nv_eventbrite_fetch($status, $order);
    if ($events !== null) {
        @file_put_contents($cache, json_encode($events));
        return $events;
    }

    // API failed — fall back to stale cache if we have one
    if (is_file($cache)) {
        $stale = json_decode(file_get_contents($cache), true);
        if (is_array($stale)) { return $stale; }
    }
    return [];
}

// Small helpers for the template
function nv_ev_day($iso)      { return date('d',    strtotime($iso)); }
function nv_ev_mo($iso)       { return date('M',    strtotime($iso)); }
function nv_ev_mo_year($iso)  { return date('M Y',  strtotime($iso)); }
function nv_ev_time($iso)     { return date('g:i A', strtotime($iso)); }

function nv_ev_venue($ev) {
    if (!empty($ev['venue']['address']['city']) && !empty($ev['venue']['name'])) {
        return $ev['venue']['name'] . ', ' . $ev['venue']['address']['city'];
    }
    if (!empty($ev['venue']['address']['localized_address_display'])) {
        return $ev['venue']['address']['localized_address_display'];
    }
    if (!empty($ev['venue']['name'])) { return $ev['venue']['name']; }
    return !empty($ev['online_event']) ? 'Online' : '';
}

function nv_ev_city($ev) {
    if (!empty($ev['venue']['address']['city'])) { return $ev['venue']['address']['city']; }
    if (!empty($ev['online_event'])) { return 'Online'; }
    return '';
}

// Infer a topical category from title + description. Returns a slug used
// by the events page filter tabs: 'exhibit-sponsor' | 'ndis' | 'property' | 'general'.
function nv_ev_category($ev) {
    $title = strtolower($ev['name']['text'] ?? '');
    $desc  = strtolower($ev['description']['text'] ?? '');
    $hay   = $title . ' ' . $desc;

    if (strpos($hay, 'ndis') !== false || strpos($hay, 'disability') !== false) {
        return 'ndis';
    }
    if (strpos($hay, 'property') !== false || strpos($hay, 'real estate') !== false
        || strpos($hay, 'realestate') !== false || strpos($hay, 'housing') !== false) {
        return 'property';
    }
    if (strpos($hay, 'exhibit') !== false || strpos($hay, 'sponsor') !== false
        || strpos($hay, 'expo') !== false || strpos($hay, 'stall') !== false
        || strpos($hay, 'booth') !== false) {
        return 'exhibit-sponsor';
    }
    return 'general';
}

function nv_ev_category_label($slug) {
    switch ($slug) {
        case 'exhibit-sponsor': return 'Exhibit / Sponsor';
        case 'ndis':            return 'NDIS';
        case 'property':        return 'Property';
        default:                return 'General';
    }
}

// Infer a category tag from the title. Returns ['tone_suffix', 'label'].
function nv_ev_tag($title) {
    $t = strtolower($title);
    if (strpos($t, 'expo')       !== false) return ['--blue',   'Expo'];
    if (strpos($t, 'roadshow')   !== false) return ['--amber',  'Roadshow'];
    if (strpos($t, 'workshop')   !== false) return ['--amber',  'Workshop'];
    if (strpos($t, 'summit')     !== false) return ['--blue',   'Summit'];
    if (strpos($t, 'launch')     !== false) return ['--purple', 'Launch'];
    if (strpos($t, 'meetup')     !== false) return ['--purple', 'Meetup'];
    if (strpos($t, 'network')    !== false) return ['--purple', 'Networking'];
    if (strpos($t, 'conference') !== false) return ['--blue',   'Conference'];
    return ['--blue', 'Event'];
}

// Clean Eventbrite description — strip control chars, collapse whitespace,
// and cut to first sentence or a hard character limit.
function nv_ev_desc($ev, $max = 160) {
    $raw = $ev['description']['text'] ?? '';
    $raw = trim(preg_replace('/\s+/', ' ', $raw));
    if ($raw === '') { return ''; }
    // Prefer the first full sentence when it's short enough.
    if (preg_match('/^(.{40,' . $max . '}?[.!?])(\s|$)/u', $raw, $m)) {
        return $m[1];
    }
    if (mb_strlen($raw) > $max) {
        return rtrim(mb_substr($raw, 0, $max), " ,.–—-") . '…';
    }
    return $raw;
}

// SVG icons for meta row
function nv_ev_icon($name) {
    switch ($name) {
        case 'pin':
            return '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 22s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12z" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="10" r="2.5" stroke="currentColor" stroke-width="1.6"/></svg>';
        case 'clock':
            return '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>';
        case 'ticket':
            return '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v2a2 2 0 0 0 0 4v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2a2 2 0 0 0 0-4V8z" stroke="currentColor" stroke-width="1.6"/></svg>';
    }
    return '';
}
