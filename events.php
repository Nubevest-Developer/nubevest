<?php
$page = 'events';
$seo_title = 'Nubevest Events — A Nubevest Service | Expos, Networking & Delivery';
$meta_desc = 'Nubevest Events is a Nubevest service — expos, networking sessions, roadshows and end-to-end event delivery, organised by Nubevest Pty Ltd. Not a separate company.';
include 'includes/header.php';
include 'includes/eventbrite.php';

$upcoming_events = nv_eventbrite_get_events('live', 'start_asc');

// Past events — merge ended + completed, dedupe by id, group by year desc
$past_raw = array_merge(
    nv_eventbrite_get_events('ended', 'start_desc'),
    nv_eventbrite_get_events('completed', 'start_desc')
);
$seen = [];
$past_by_year = [];
foreach ($past_raw as $ev) {
    $id = $ev['id'] ?? null;
    if ($id && isset($seen[$id])) continue;
    if ($id) $seen[$id] = true;
    $iso = $ev['start']['local'] ?? $ev['start']['utc'] ?? null;
    if (!$iso) continue;
    $yr = date('Y', strtotime($iso));
    $past_by_year[$yr][] = $ev;
}
krsort($past_by_year);
foreach ($past_by_year as $yr => $list) {
    usort($past_by_year[$yr], function($a, $b) {
        $da = strtotime($a['start']['local'] ?? $a['start']['utc'] ?? '');
        $db = strtotime($b['start']['local'] ?? $b['start']['utc'] ?? '');
        return $db - $da;
    });
}

$total_past = array_sum(array_map('count', $past_by_year));

// Count events per filter tab for the badges
$cat_counts = ['exhibit-sponsor' => 0, 'ndis' => 0, 'property' => 0];
$all_events_flat = $upcoming_events ?: [];
foreach ($past_by_year as $list) { $all_events_flat = array_merge($all_events_flat, $list); }
foreach ($all_events_flat as $ev) {
    $c = nv_ev_category($ev);
    if (isset($cat_counts[$c])) { $cat_counts[$c]++; }
}
$total_all = count($all_events_flat);
$total_upcoming = count($upcoming_events ?: []);

// City tally for hero stat
$cities = [];
foreach ($past_by_year as $list) {
    foreach ($list as $ev) {
        $c = nv_ev_city($ev);
        if ($c) { $cities[$c] = true; }
    }
}
$city_count = count($cities);

// Renders one event card (used for both upcoming and past)
function nv_render_event_card($ev, $variant = 'upcoming') {
    $start = $ev['start']['local'] ?? $ev['start']['utc'] ?? null;
    if (!$start) return;
    [$tone, $tag_label] = nv_ev_tag($ev['name']['text'] ?? '');
    $url   = $ev['url'] ?? '#';
    $title = $ev['name']['text'] ?? 'Event';
    $desc  = nv_ev_desc($ev, 120);
    $venue = nv_ev_venue($ev);
    $free  = !empty($ev['is_free']);
    $logo  = $ev['logo']['url'] ?? '';
    $past  = ($variant === 'past');
    $cat   = nv_ev_category($ev);
    $when  = $past ? 'past' : 'upcoming';
    if (!$past && strpos($url, '2001032964463') !== false) { $url = 'https://events.nubevest.com.au/'; }
    ?>
    <a class="ev-card<?= $past ? ' ev-card--past' : '' ?>" data-category="<?= htmlspecialchars($cat, ENT_QUOTES, 'UTF-8') ?>" data-when="<?= $when ?>" href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener">
      <div class="ev-card__media ev-card__media<?= $tone ?>"<?= $logo ? ' style="background-image:url(' . htmlspecialchars($logo, ENT_QUOTES, 'UTF-8') . ')"' : '' ?>>
        <div class="ev-card__date">
          <span class="ev-card__day"><?= nv_ev_day($start) ?></span>
          <span class="ev-card__mo"><?= nv_ev_mo_year($start) ?></span>
        </div>
        <span class="ev-item__tag ev-item__tag<?= $tone ?> ev-card__tag"><?= $tag_label ?></span>
        <?php if ($past): ?><span class="ev-card__past-badge">Past</span><?php endif; ?>
      </div>
      <div class="ev-card__body">
        <h3 class="ev-card__title"><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h3>
        <?php if ($desc): ?><p class="ev-card__desc"><?= htmlspecialchars($desc, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
        <div class="ev-card__meta">
          <?php if ($venue): ?><span><?= nv_ev_icon('pin') ?><?= htmlspecialchars($venue, ENT_QUOTES, 'UTF-8') ?></span><?php endif; ?>
          <span><?= nv_ev_icon('clock') ?><?= nv_ev_time($start) ?></span>
        </div>
      </div>
      <div class="ev-card__foot">
        <span class="ev-card__price<?= $free ? ' ev-card__price--free' : '' ?>"><?= nv_ev_icon('ticket') ?><?= $free ? ($past ? 'Was free' : 'Free entry') : ($past ? 'Was ticketed' : 'Ticketed') ?></span>
        <span class="ev-card__go"><?= $past ? 'View recap' : 'Register' ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="<?= $past ? 'M7 17L17 7M9 7h8v8' : 'M5 12h14M13 6l6 6-6 6' ?>" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </span>
      </div>
    </a>
    <?php
}
?>

<main id="main">

<!-- HERO -->
<?php
  // Grab 3 recent past events with images for the hero collage
  $hero_pix = [];
  foreach ($past_by_year as $list) {
      foreach ($list as $ev) {
          if (!empty($ev['logo']['url'])) {
              $hero_pix[] = $ev;
              if (count($hero_pix) >= 3) break 2;
          }
      }
  }
  // Top cities (up to 4)
  $city_counts = [];
  foreach ($past_by_year as $list) {
      foreach ($list as $ev) {
          $c = nv_ev_city($ev);
          if ($c) { $city_counts[$c] = ($city_counts[$c] ?? 0) + 1; }
      }
  }
  arsort($city_counts);
  $top_cities = array_slice(array_keys($city_counts), 0, 4);
?>
<section class="ev-hero">
  <div class="container ev-hero__grid">
    <div class="ev-hero__text">
      <span class="kicker kicker--pill ev-hero__kicker"><i></i>NUBEVEST EVENTS &middot; A NUBEVEST SERVICE</span>
      <h1 class="ev-hero__title">
        Where business, technology and people <span class="ev-hero__grad">come together.</span>
      </h1>
      <p class="ev-hero__lead">
        Nubevest Events plans and delivers business events, expos, networking sessions and roadshows &mdash; from venue and exhibitor journey to branding, promotion, registration and on-the-day coordination. Organised by Nubevest Pty Ltd &mdash; not a separate company.
      </p>
      <div class="ev-hero__cta">
        <a href="#upcoming" class="btn btn--primary">See upcoming</a>
        <a href="/contact.php?service=event" class="btn btn--secondary btn--arrow-blue">Talk to us about an event</a>
      </div>

      <?php if (!empty($top_cities)): ?>
      <div class="ev-hero__cities">
        <span class="ev-hero__cities-lbl">Hosted in</span>
        <?php foreach ($top_cities as $c): ?>
          <span class="ev-hero__city"><?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?></span>
        <?php endforeach; ?>
        <?php if (count($city_counts) > count($top_cities)): ?>
          <span class="ev-hero__city ev-hero__city--more">+<?= count($city_counts) - count($top_cities) ?> more</span>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>

    <div class="ev-hero__visual" aria-hidden="true">
      <div class="ev-hero__collage">
        <?php
          // Hero photos: use our own photos from assets/images/events/hero-1..3 (jpg/jpeg/png/webp).
          // Falls back to the Eventbrite banner for any slot without a local photo.
          $hero_srcs = [];
          for ($n = 1; $n <= 3; $n++) {
              $src = '';
              foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
                  $rel = 'assets/images/events/hero-' . $n . '.' . $ext;
                  if (file_exists(__DIR__ . '/' . $rel)) { $src = '/' . $rel . '?v=' . filemtime(__DIR__ . '/' . $rel); break; }
              }
              if ($src === '' && !empty($hero_pix[$n - 1]['logo']['url'])) { $src = $hero_pix[$n - 1]['logo']['url']; }
              if ($src !== '') { $hero_srcs[$n] = $src; }
          }
        ?>
        <?php foreach ($hero_srcs as $n => $src): ?>
          <div class="ev-hero__pic ev-hero__pic--<?= $n ?>" style="background-image:url('<?= htmlspecialchars($src, ENT_QUOTES, 'UTF-8') ?>')"></div>
        <?php endforeach; ?>
        <div class="ev-hero__chip ev-hero__chip--stat">
          <span class="ev-hero__chip-num"><?= max(48, $total_past) ?>+</span>
          <span class="ev-hero__chip-lbl">Events hosted</span>
        </div>
        <div class="ev-hero__chip ev-hero__chip--live">
          <span class="ev-hero__chip-dot"></span>
          <span>Live on Eventbrite</span>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="ev-hero__stats">
      <div class="ev-hero__stat">
        <span class="ev-hero__stat-num"><?= max(48, $total_past) ?>+</span>
        <span class="ev-hero__stat-lbl">Events hosted</span>
      </div>
      <div class="ev-hero__stat">
        <span class="ev-hero__stat-num">1.4k+</span>
        <span class="ev-hero__stat-lbl">Attendees</span>
      </div>
      <div class="ev-hero__stat">
        <span class="ev-hero__stat-num"><?= max(5, $city_count) ?></span>
        <span class="ev-hero__stat-lbl">Australian cities</span>
      </div>
      <div class="ev-hero__stat">
        <span class="ev-hero__stat-num">Monthly</span>
        <span class="ev-hero__stat-lbl">Cadence</span>
      </div>
    </div>
  </div>
</section>

<!-- FILTER TABS -->
<section class="ev-filter-wrap" aria-label="Filter events">
  <div class="container">
    <div class="ev-filter" role="tablist">
      <button type="button" class="ev-filter__btn" data-filter="all" role="tab" aria-selected="false">
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        <span>All</span><span class="ev-filter__ct"><?= $total_all ?></span>
      </button>
      <button type="button" class="ev-filter__btn is-active" data-filter="upcoming" role="tab" aria-selected="true">
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M3 10h18M8 3v4M16 3v4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        <span>Upcoming</span><span class="ev-filter__ct"><?= $total_upcoming ?></span>
      </button>
      <button type="button" class="ev-filter__btn" data-filter="past" role="tab" aria-selected="false">
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        <span>Past</span><span class="ev-filter__ct"><?= $total_past ?></span>
      </button>
      <span class="ev-filter__sep" aria-hidden="true"></span>
      <button type="button" class="ev-filter__btn" data-filter="exhibit-sponsor" role="tab" aria-selected="false">
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 20V8l8-4 8 4v12M9 20v-6h6v6" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
        <span>Exhibit &amp; Sponsor</span><span class="ev-filter__ct"><?= $cat_counts['exhibit-sponsor'] ?></span>
      </button>
      <button type="button" class="ev-filter__btn" data-filter="ndis" role="tab" aria-selected="false">
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20.8 12a8.8 8.8 0 1 1-4.5-7.7M15 8l2 2 4-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <span>NDIS</span><span class="ev-filter__ct"><?= $cat_counts['ndis'] ?></span>
      </button>
      <button type="button" class="ev-filter__btn" data-filter="property" role="tab" aria-selected="false">
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 11l9-7 9 7v9a1 1 0 0 1-1 1h-5v-6h-6v6H4a1 1 0 0 1-1-1v-9z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
        <span>Property</span><span class="ev-filter__ct"><?= $cat_counts['property'] ?></span>
      </button>
    </div>
    <p class="ev-filter__hint" id="ev-filter-hint" hidden>No events match this filter yet &mdash; check back soon or <a href="/contact.php">get in touch</a>.</p>
  </div>
</section>

<!-- UPCOMING EVENTS -->
<section id="upcoming" class="ab-do">
  <div class="container">
    <div class="ab-panel">
      <div class="ev-section-head">
        <h2 class="ab-panel__title">Upcoming events</h2>
        <p class="ev-section-lead">The next sessions on the calendar &mdash; secure your spot on Eventbrite.</p>
      </div>

      <?php if (!empty($upcoming_events)): ?>
        <div class="ev-grid">
          <?php foreach ($upcoming_events as $ev) nv_render_event_card($ev, 'upcoming'); ?>
        </div>
      <?php else: ?>
        <div class="ev-empty-clean">
          <svg width="36" height="36" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.6"/>
            <path d="M3 10h18M8 3v4M16 3v4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
          </svg>
          <h3>Nothing on the calendar right now.</h3>
          <p>New sessions are added every few weeks. Get in touch to be notified when the next one drops.</p>
          <div class="ev-empty-clean__cta">
            <a href="/contact.php" class="btn btn--primary">Notify me</a>
            <a href="#past" class="btn btn--secondary btn--arrow-blue">Browse past events</a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- PAST EVENTS -->
<section id="past" class="ab-do">
  <div class="container">
    <div class="ab-panel">
      <div class="ev-section-head">
        <h2 class="ab-panel__title">Past events</h2>
        <p class="ev-section-lead">A snapshot of the workshops, expos and networking sessions we&rsquo;ve hosted so far.</p>
      </div>

      <?php if (!empty($past_by_year)): ?>
        <?php foreach ($past_by_year as $year => $events): ?>
          <h3 class="ev-year"><?= htmlspecialchars($year, ENT_QUOTES, 'UTF-8') ?></h3>
          <div class="ev-grid">
            <?php foreach ($events as $ev) nv_render_event_card($ev, 'past'); ?>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="ev-empty-clean">
          <h3>Event history loading soon</h3>
          <p>We&rsquo;re syncing past sessions from Eventbrite &mdash; check back in a few minutes.</p>
        </div>
      <?php endif; ?>

      <p class="ev-more-note">View the full history on our <a href="https://www.eventbrite.com.au/o/93226055063" target="_blank" rel="noopener">Eventbrite organiser page</a>.</p>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="ab-cta">
  <div class="container">
    <div class="ab-cta__inner">
      <div class="ab-cta__icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H9l-5 4V6z" stroke="#7c3aed" stroke-width="1.8" stroke-linejoin="round"/></svg></div>
      <div class="ab-cta__text">
        <h3>Want to speak, sponsor or co-host an event?</h3>
        <p>Tell us the topic and audience you have in mind &mdash; we&rsquo;ll take it from there.</p>
      </div>
      <a href="/contact.php" class="ab-cta__btn">Partner With Us <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
    </div>
  </div>
</section>

</main>

<style>
  /* Filter band — clean white, no sticky bar, sits between hero and grid */
  .ev-filter-wrap {
    padding: 28px 0 20px;
    background: #ffffff;
  }
  .ev-filter-wrap .container {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
  }

  /* Pills row — no wrapper card, gap between pills */
  .ev-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
    justify-content: center;
    max-width: 100%;
  }

  .ev-filter__sep { display: none; }

  /* Each pill — solid gradient in brand colors, inactive is muted */
  .ev-filter__btn {
    appearance: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border: 0;
    padding: 11px 22px;
    border-radius: 999px;
    font: inherit;
    font-size: .9rem;
    font-weight: 600;
    color: #ffffff;
    cursor: pointer;
    white-space: nowrap;
    line-height: 1;
    background: linear-gradient(135deg, #a78bfa 0%, #c084fc 50%, #e879f9 100%);
    opacity: .78;
    transition: opacity .2s ease, transform .15s ease, box-shadow .25s ease, background .25s ease;
    box-shadow: 0 2px 6px -2px rgba(192,132,252,.35);
  }
  .ev-filter__btn svg {
    width: 15px; height: 15px; flex: none; opacity: .9;
  }
  .ev-filter__btn:hover {
    opacity: 1;
    transform: translateY(-1px);
    box-shadow: 0 6px 14px -4px rgba(192,132,252,.5);
  }
  .ev-filter__btn:focus-visible {
    outline: none;
    box-shadow: 0 0 0 3px rgba(124,58,237,.35);
  }

  .ev-filter__ct {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 20px;
    padding: 0 7px;
    height: 19px;
    border-radius: 999px;
    background: rgba(255,255,255,.28);
    color: #ffffff;
    font-size: .7rem;
    font-weight: 700;
    letter-spacing: .01em;
  }

  /* Active — full-saturation brand gradient + lift */
  .ev-filter__btn.is-active {
    opacity: 1;
    background: linear-gradient(135deg, #2563eb 0%, #7c3aed 55%, #c026d3 100%);
    box-shadow:
      0 10px 22px -8px rgba(124,58,237,.55),
      0 3px 8px -2px rgba(192,38,211,.35);
    transform: translateY(-1px);
  }

  .ev-filter__hint {
    text-align: center;
    margin: 16px auto 0;
    color: #64748b;
    font-size: .92rem;
  }
  .ev-filter__hint a { color: #4f46e5; text-decoration: underline; }

  /* When a filter empties a whole section, collapse its chrome. */
  .ev-section-empty { display: none !important; }
  .ev-card.is-hidden { display: none !important; }
  .ev-year.is-hidden { display: none !important; }

  /* Mobile — horizontal scroll strip */
  @media (max-width: 640px) {
    .ev-filter-wrap { padding: 18px 0 14px; }
    .ev-filter {
      flex-wrap: nowrap;
      justify-content: flex-start;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      -webkit-overflow-scrolling: touch;
      padding: 4px 16px;
      width: 100%;
      scrollbar-width: none;
    }
    .ev-filter::-webkit-scrollbar { display: none; }
    .ev-filter__btn { scroll-snap-align: start; padding: 10px 18px; }
  }
</style>

<script>
(function () {
  var buttons = document.querySelectorAll('.ev-filter__btn');
  var cards   = document.querySelectorAll('.ev-card');
  var upSec   = document.getElementById('upcoming');
  var pastSec = document.getElementById('past');
  var hint    = document.getElementById('ev-filter-hint');

  function apply(filter) {
    var upVisible = 0, pastVisible = 0;
    cards.forEach(function (card) {
      var cat  = card.getAttribute('data-category');
      var when = card.getAttribute('data-when');
      var show = (filter === 'all')
              || (filter === 'upcoming' && when === 'upcoming')
              || (filter === 'past'     && when === 'past')
              || (cat === filter);
      card.classList.toggle('is-hidden', !show);
      if (show && when === 'upcoming') upVisible++;
      if (show && when === 'past')     pastVisible++;
    });

    // Hide year headings inside Past whose following grid has no visible cards.
    if (pastSec) {
      pastSec.querySelectorAll('.ev-year').forEach(function (h) {
        var grid = h.nextElementSibling;
        if (!grid) return;
        var any = grid.querySelectorAll('.ev-card:not(.is-hidden)').length;
        h.classList.toggle('is-hidden', !any);
      });
    }

    if (upSec)   upSec.classList.toggle('ev-section-empty',   upVisible === 0);
    if (pastSec) pastSec.classList.toggle('ev-section-empty', pastVisible === 0);
    if (hint)    hint.hidden = (upVisible + pastVisible) > 0;
  }

  buttons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      buttons.forEach(function (b) {
        b.classList.remove('is-active');
        b.setAttribute('aria-selected', 'false');
      });
      btn.classList.add('is-active');
      btn.setAttribute('aria-selected', 'true');
      var filter = btn.getAttribute('data-filter');
      apply(filter);

      // Scroll to the first visible section so the user isn't stuck mid-page.
      var target = (filter === 'past') ? pastSec : upSec;
      if (target && target.classList.contains('ev-section-empty')) {
        target = (target === upSec) ? pastSec : upSec;
      }
      if (target && !target.classList.contains('ev-section-empty')) {
        var top = target.getBoundingClientRect().top + window.pageYOffset - 80;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  // Apply the default filter on load (Upcoming) so page starts short.
  var initial = document.querySelector('.ev-filter__btn.is-active');
  apply(initial ? initial.getAttribute('data-filter') : 'all');
})();
</script>

<!-- LinkedIn Insight Tag -->
<script type="text/javascript">
_linkedin_partner_id = "3304180";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(l) {
if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
window.lintrk.q=[]}
var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})(window.lintrk);
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3304180&fmt=gif" />
</noscript>
<!-- End LinkedIn Insight Tag -->
<?php include 'includes/footer.php'; ?>
