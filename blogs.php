<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

$pageMeta = [
    'title' => 'Blog & Insights | ' . APP_NAME,
    'description' => 'Read the latest digital marketing, SEO, web design, and business growth insights from WebTecMart.',
];
$blogPageMeta = [
    'page_meta_title' => $pageMeta['title'],
    'page_meta_description' => $pageMeta['description'],
];
$posts = blogPosts();

// Categories for filter chips
$categories = [];
foreach ($posts as $p) {
    if (!empty($p['category'])) $categories[(string) $p['category']] = true;
}
$categories = array_keys($categories);

$featured = $posts ? array_shift($posts) : null;
$totalPosts = count($posts) + ($featured ? 1 : 0);
require_once __DIR__ . '/app/templates/header.php';

function blDataAttrs(array $p): string
{
    $searchText = trim(($p['title'] ?? '') . ' ' . ($p['summary'] ?? '') . ' ' . ($p['category'] ?? ''));
    $hay = function_exists('mb_strtolower') ? mb_strtolower($searchText) : strtolower($searchText);
    return 'data-search="' . e($hay) . '" data-cat="' . e((string) ($p['category'] ?? '')) . '"';
}

function blImage(array $p, bool $lazy = true): string
{
    if (empty($p['image'])) return '';
    $src = e((string) $p['image']);
    $alt = e((string) ($p['title'] ?? ''));
    $loading = $lazy ? ' loading="lazy"' : '';
    $err = "onerror=\"this.closest('.bl-img').classList.add('noimg')\"";
    return '<img class="bl-main" src="' . $src . '" alt="' . $alt . '"' . $loading . ' ' . $err . '>';
}

if (!function_exists('blIcon')) {
function blIcon(string $name): string {
    $icons = [
        'sparkles' => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
        'search'   => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
        'calendar' => '<path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/>',
        'clock'    => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'user'     => '<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
        'arrow'    => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'bolt'     => '<path d="M13 2 3 14h9l-1 8 10-12h-9l1-8z"/>',
        'journal'  => '<path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/>',
        'heart'    => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>',
    ];
    $path = $icons[$name] ?? '';
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
}
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap-grid.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

<style>
/* ============================================================
   BLOG PAGE — Fixed Layout & Consistent Colors
   ============================================================ */
.bl-page {
    --pink: #C4007A; --pink2: #E0398F; --pink3: #FF7BC0;
    --deep: #7E004E;
    --head: #5E0B45;
    --blush: #FBEAF3; --soft: #FFF4FA; --gold: #FFB547; --mint: #0E9F6E;
    --text: #4A3342; --mute: #7A6574; --line: rgba(126, 0, 78, .14);
    --hero: radial-gradient(70% 80% at 85% 10%, rgba(255,255,255,.15), transparent 60%),
            radial-gradient(50% 50% at 10% 90%, rgba(255,181,71,.3), transparent 70%),
            linear-gradient(135deg, #C4007A 0%, #E0398F 50%, #FF7BC0 100%);
    --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
    position: relative; width: 100%; overflow-x: clip; background: #FFF4FA; color: var(--text);
    font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
}
.bl-page *, .bl-page *::before, .bl-page *::after { box-sizing: border-box; }
.bl-page :where(h1, h2, h3) { margin: 0; font-family: var(--disp); letter-spacing: -.02em; }
.bl-page :where(p) { margin: 0; }
.bl-page :is(a, button, input):focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }
.bl-page ::selection { background: var(--pink); color: #fff; }
.bl-page :where(h1, h2, h3, p) { overflow-wrap: anywhere; }
.bl-container { position: relative; z-index: 2; width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 22px; }

/* ---------- hero ---------- */
.bl-hero-sec { position: relative; padding: 76px 0 60px; text-align: center; color: #fff; background: var(--hero); }
.bl-hero-sec::before { content: ''; position: absolute; inset: 0; pointer-events: none; background-image: radial-gradient(rgba(255,255,255,.15) 1px, transparent 1.2px); background-size: 26px 26px; -webkit-mask-image: linear-gradient(180deg, #000 30%, transparent 95%); mask-image: linear-gradient(180deg, #000 30%, transparent 95%); }
.bl-aurora { position: absolute; inset: 0; overflow: hidden; pointer-events: none; }
.bl-aurora i { position: absolute; border-radius: 50%; filter: blur(80px); opacity: .5; animation: blDrift 14s ease-in-out infinite alternate; }
.bl-aurora i:nth-child(1) { width: 420px; height: 420px; left: -8%; top: 4%; background: var(--pink3); opacity: .45; }
.bl-aurora i:nth-child(2) { width: 340px; height: 340px; right: 10%; bottom: -12%; background: var(--gold); opacity: .4; animation-duration: 18s; }
@keyframes blDrift { to { transform: translate(60px, 40px) scale(1.2); } }

.bl-pill { display: inline-flex; align-items: center; gap: 8px; margin-bottom: 22px; padding: 7px 15px 7px 11px; border-radius: 999px; background: rgba(255,255,255,.18); border: 1px solid rgba(255,255,255,.45); -webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px); }
.bl-pill svg { width: 15px; height: 15px; color: var(--gold); flex-shrink: 0; }
.bl-pill span { font-size: .76rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: #fff; }
.bl-h1 { max-width: 900px; margin: 0 auto; text-align: center; font-size: clamp(2.2rem, 5.4vw, 4rem); font-weight: 800; line-height: 1.06; letter-spacing: -.035em; text-shadow: 0 3px 0 rgba(126,0,78,.35); }
.bl-h1 .accent { position: relative; display: inline-block; color: var(--gold); }
.bl-h1 .accent svg { position: absolute; left: 0; bottom: -6px; width: 100%; height: 8px; }
.bl-w { display: inline-block; overflow: hidden; vertical-align: top; padding-bottom: .12em; margin-bottom: -.12em; }
.bl-w > span { display: inline-block; }
.bl-subtitle { max-width: 700px; margin: 22px auto 0; text-align: center; font-size: clamp(1rem, 1.6vw, 1.15rem); line-height: 1.7; color: rgba(255,255,255,.92); }

/* search */
.bl-search-wrap { position: relative; z-index: 4; max-width: 620px; margin: 30px auto 0; }
.bl-search { position: relative; display: block; }
.bl-search input { width: 100%; padding: 15px 20px 15px 52px; border: 2px solid var(--deep); border-radius: 14px; background: #fff; color: var(--text); font: 600 .98rem 'Plus Jakarta Sans', system-ui, sans-serif; box-shadow: 0 6px 0 var(--deep); -webkit-appearance: none; appearance: none; outline: 0; transition: translate .2s, box-shadow .2s; }
.bl-search input::placeholder { color: #B0A0A8; font-weight: 500; }
.bl-search input:focus { translate: 0 2px; box-shadow: 0 4px 0 var(--deep); }
.bl-search input::-webkit-search-cancel-button { -webkit-appearance: none; }
.bl-search .bl-search-ico { position: absolute; left: 18px; top: 50%; translate: 0 -50%; display: grid; place-items: center; width: 22px; height: 22px; color: var(--pink); pointer-events: none; }
.bl-search .bl-search-ico svg { width: 20px; height: 20px; }

/* gold ribbon */
.bl-ribbon { position: relative; overflow: hidden; background: var(--gold); color: var(--deep); border-top: 3px solid var(--deep); border-bottom: 3px solid var(--deep); }
.bl-ribbon-track { display: flex; width: max-content; animation: blRun 40s linear infinite; }
.bl-ribbon:hover .bl-ribbon-track { animation-play-state: paused; }
.bl-ribbon span { padding: 13px 28px; font: 800 1rem var(--disp); white-space: nowrap; }
.bl-ribbon span::after { content: '\2726'; margin-left: 50px; color: var(--pink); opacity: .8; }
@keyframes blRun { to { transform: translateX(-50%); } }

/* ---------- body shell (Fixed overlapping) ---------- */
.bl-main-sec { position: relative; z-index: 3; padding: 60px 0 80px; } /* Removed negative margin */
.bl-sec { padding: 84px 0; position: relative; }

/* filter chips */
.bl-chips { display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; margin-bottom: 48px; }
.bl-chip { padding: 10px 20px; border: 2px solid var(--deep); border-radius: 12px; background: #fff; color: var(--deep); box-shadow: 0 4px 0 var(--deep); font: 800 .86rem/1 'Plus Jakarta Sans', system-ui, sans-serif; white-space: nowrap; cursor: pointer; -webkit-tap-highlight-color: transparent; transition: translate .18s ease, box-shadow .18s ease, background .18s ease, color .18s ease; }
.bl-chip:hover { background: var(--blush); translate: 0 -2px; box-shadow: 0 6px 0 var(--deep); }
.bl-chip.active { background: var(--pink); color: #fff; box-shadow: 0 4px 0 var(--gold); }
.bl-chip:active { translate: 0 4px; box-shadow: 0 0 0 transparent; }

/* section heading */
.bl-head { max-width: 720px; margin: 0 auto 40px; text-align: center; }
.bl-kicker { display: inline-block; margin-bottom: 14px; padding: 6px 13px; border-radius: 8px; background: var(--pink); color: #fff; border: 2px solid var(--deep); box-shadow: 3px 3px 0 var(--gold); font-size: .76rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
.bl-head h2 { text-align: center; font-size: clamp(1.9rem, 3.6vw, 2.8rem); font-weight: 800; line-height: 1.1; color: var(--head); }
.bl-head h2 .accent { position: relative; display: inline-block; color: var(--pink); }
.bl-head p { margin-top: 12px; text-align: center; font-size: 1rem; line-height: 1.65; color: var(--mute); }
.bl-bar { display: block; width: 84px; height: 7px; margin: 16px auto 0; background: repeating-linear-gradient(90deg, var(--pink) 0 12px, var(--gold) 12px 24px); transform-origin: 50% 50%; }

/* ---------- featured (FIXED GRID) ---------- */
.bl-featured { display: grid; grid-template-columns: 1.1fr 1fr; margin-bottom: 56px; background: #fff; border: 2px solid var(--deep); border-radius: 24px; overflow: hidden; box-shadow: 10px 10px 0 var(--gold); transition: translate .25s ease, box-shadow .25s ease; }
.bl-featured:hover { translate: -3px -3px; box-shadow: 13px 13px 0 var(--pink); }
.bl-featured.no-img { grid-template-columns: 1fr; }

/* Featured Image Area */
.bl-feat-img-wrap { position: relative; display: block; overflow: hidden; isolation: isolate; width: 100%; height: 100%; min-height: 400px; background: var(--blush); border-right: 2px solid var(--deep); }
.bl-img { position: relative; display: block; overflow: hidden; isolation: isolate; width: 100%; height: 100%; background: var(--blush); }
.bl-img::before { content: "📰"; position: absolute; inset: 0; z-index: 0; display: flex; align-items: center; justify-content: center; font-size: 3rem; opacity: 0.4; }
.bl-img .bl-main { position: relative; z-index: 2; display: block; width: 100%; height: 100%; object-fit: cover; object-position: center; transition: transform .5s ease; }
.bl-img.noimg .bl-main { display: none; }
.bl-featured:hover .bl-main, .bl-card:hover .bl-main { transform: scale(1.05); }

/* Featured Content Area */
.bl-feat-body { display: flex; flex-direction: column; justify-content: center; min-width: 0; padding: 44px; background: #fff; }

/* Misc */
.bl-feat-tag { align-self: flex-start; display: inline-flex; align-items: center; gap: 7px; margin-bottom: 16px; padding: 6px 14px; background: var(--gold); color: var(--deep); border: 2px solid var(--deep); border-radius: 8px; box-shadow: 3px 3px 0 var(--deep); font-size: .76rem; font-weight: 800; }
.bl-feat-tag svg { width: 14px; height: 14px; }
.bl-pill-tag { position: absolute; z-index: 4; top: 14px; left: 14px; max-width: calc(100% - 28px); overflow: hidden; text-overflow: ellipsis; white-space: nowrap; padding: 5px 12px; background: var(--gold); color: var(--deep); border: 2px solid var(--deep); border-radius: 8px; box-shadow: 3px 3px 0 var(--deep); font-size: .72rem; font-weight: 800; }
.bl-time { position: absolute; z-index: 4; bottom: 14px; right: 14px; display: inline-flex; align-items: center; gap: 5px; padding: 4px 11px; background: #fff; color: var(--deep); border: 2px solid var(--deep); border-radius: 999px; box-shadow: 2px 2px 0 var(--deep); font-size: .72rem; font-weight: 800; }
.bl-time svg { width: 12px; height: 12px; color: var(--pink); }

.bl-title { margin: 0 0 12px; font-weight: 800; font-size: 1.22rem; line-height: 1.3; color: var(--head); overflow-wrap: anywhere; }
.bl-title a { color: inherit; text-decoration: none; transition: color .25s ease; }
.bl-card:hover .bl-title a, .bl-featured:hover .bl-title a { color: var(--pink); }
.bl-excerpt { margin: 0 0 18px; color: var(--mute); line-height: 1.65; font-size: .93rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
.bl-feat-body .bl-title { font-size: clamp(1.5rem, 2.8vw, 2.2rem); line-height: 1.15; }
.bl-feat-body .bl-excerpt { -webkit-line-clamp: 4; font-size: 1rem; line-height: 1.7; }
.bl-meta { display: flex; flex-wrap: wrap; gap: 10px 22px; margin-bottom: 24px; font-size: .85rem; font-weight: 700; color: var(--mute); }
.bl-meta span { display: inline-flex; align-items: center; gap: 7px; }
.bl-meta svg { width: 14px; height: 14px; color: var(--pink); }

/* buttons */
.bl-btn { position: relative; overflow: hidden; align-self: flex-start; display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 14px 26px; border-radius: 12px; border: 2px solid transparent; font: 700 .95rem/1.2 'Plus Jakarta Sans', system-ui, sans-serif; text-decoration: none; text-align: center; cursor: pointer; transition: translate .2s ease, box-shadow .2s ease, background .2s ease; background: var(--pink); color: #fff !important; box-shadow: 0 6px 0 var(--deep); }
.bl-btn:hover { translate: 0 2px; box-shadow: 0 4px 0 var(--deep); color: #fff; }
.bl-btn:active { translate: 0 6px; box-shadow: 0 0 0 transparent; }
.bl-btn svg { width: 16px; height: 16px; flex-shrink: 0; transition: translate .2s ease; }
.bl-btn:hover svg { translate: 4px 0; }
.bl-ripple { position: absolute; width: 12px; height: 12px; margin: -6px 0 0 -6px; border-radius: 50%; background: currentColor; opacity: .3; pointer-events: none; animation: blRipple .65s ease-out forwards; }
@keyframes blRipple { to { transform: scale(22); opacity: 0; } }

/* ---------- blog cards ---------- */
.bl-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr)); gap: 26px; perspective: 1200px; }
.bl-card { position: relative; display: flex; flex-direction: column; height: 100%; overflow: hidden; background: #fff; border: 2px solid var(--deep); border-radius: 20px; box-shadow: 6px 6px 0 var(--gold); transition: translate .25s ease, box-shadow .25s ease; }
.bl-card:hover { translate: -4px -4px; box-shadow: 10px 10px 0 var(--pink); }
.bl-card .bl-img { aspect-ratio: 16/10; flex-shrink: 0; border-bottom: 2px solid var(--deep); }
.bl-card .bl-body { display: flex; flex-direction: column; flex: 1; min-width: 0; padding: 22px; }
.bl-date { display: inline-flex; align-items: center; gap: 7px; margin-bottom: 8px; font-size: .78rem; font-weight: 800; color: var(--pink); }
.bl-date svg { width: 13px; height: 13px; }
.bl-foot { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-top: auto; padding-top: 16px; border-top: 2px dashed var(--line); }
.bl-author { display: flex; align-items: center; gap: 10px; min-width: 0; font-size: .84rem; font-weight: 700; color: var(--deep); }
.bl-author-name { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.bl-ava { display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0; width: 34px; height: 34px; border: 2px solid var(--deep); border-radius: 50%; background: var(--pink); color: #fff; font: 800 .82rem var(--disp); box-shadow: 2px 2px 0 var(--gold); }
.bl-arrow { display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0; width: 38px; height: 38px; border: 2px solid var(--deep); border-radius: 10px; background: var(--gold); color: var(--deep); text-decoration: none; box-shadow: 2px 2px 0 var(--deep); transition: rotate .3s ease, background .2s ease, color .2s ease, translate .2s ease; }
.bl-arrow svg { width: 18px; height: 18px; }
.bl-card:hover .bl-arrow { background: var(--pink); color: #fff; rotate: -45deg; translate: 0 -2px; }

/* empty state */
.bl-empty { margin-top: 20px; padding: 60px 20px; text-align: center; background: #fff; border: 2px dashed var(--pink); border-radius: 20px; color: var(--mute); }
.bl-empty-ico { display: grid; place-items: center; width: 76px; height: 76px; margin: 0 auto 14px; border-radius: 18px; background: var(--blush); color: var(--pink); border: 2px solid var(--deep); box-shadow: 4px 4px 0 var(--gold); }
.bl-empty-ico svg { width: 36px; height: 36px; }
.bl-empty h4 { margin: 0 0 6px; font-family: var(--disp); font-size: 1.3rem; font-weight: 800; color: var(--head); }

/* ---------- CTA ---------- */
.bl-cta-sec { padding: 84px 0 96px; background: #FFF4FA; }
.bl-cta { position: relative; overflow: hidden; padding: 64px 34px; text-align: center; color: #fff; border-radius: 28px; box-shadow: 10px 10px 0 var(--gold); background: radial-gradient(50% 80% at 50% 120%, rgba(255,181,71,.45), transparent 70%), radial-gradient(rgba(255,255,255,.2) 1px, transparent 1.2px) 0 0 / 26px 26px, linear-gradient(135deg, #C4007A 0%, #E0398F 100%); }
.bl-cta h2 { max-width: 800px; margin: 0 auto 16px; text-align: center; font-size: clamp(1.9rem, 3.8vw, 3rem); font-weight: 800; line-height: 1.1; color: #fff; text-shadow: 0 3px 0 rgba(126,0,78,.3); }
.bl-cta p { max-width: 640px; margin: 0 auto 30px; text-align: center; line-height: 1.7; color: rgba(255,255,255,.92); }
.bl-cta a { display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 14px 28px; border-radius: 12px; border: 2px solid transparent; background: #fff; color: var(--pink) !important; font: 700 .95rem/1.2 'Plus Jakarta Sans', sans-serif; text-decoration: none; box-shadow: 0 6px 0 var(--deep); transition: translate .2s, box-shadow .2s, background .2s; }
.bl-cta a:hover { background: var(--blush); translate: 0 2px; box-shadow: 0 4px 0 var(--deep); color: var(--pink); }
.bl-cta a svg { width: 16px; height: 16px; }

/* ---------- responsive ---------- */
@media (max-width: 991px) {
    .bl-featured { grid-template-columns: 1fr; }
    .bl-feat-img-wrap { min-height: 0; height: auto; aspect-ratio: 16/10; border-right: 0; border-bottom: 2px solid var(--deep); }
    .bl-feat-body { padding: 28px 22px; }
    .bl-sec { padding: 70px 0; }
    .bl-card:nth-child(2) { order: -1; }
}
@media (max-width: 767px) {
    .bl-chips { flex-wrap: nowrap; justify-content: flex-start; overflow-x: auto; margin: 0 -22px 36px; padding: 4px 22px 14px; scrollbar-width: none; -webkit-overflow-scrolling: touch; scroll-snap-type: x proximity; }
    .bl-chips::-webkit-scrollbar { display: none; }
    .bl-chip { flex-shrink: 0; scroll-snap-align: start; }
    .bl-aurora i { filter: blur(50px); }
    .bl-ribbon span { font-size: .9rem; padding: 12px 20px; }
    .bl-ribbon span::after { margin-left: 36px; }
}
@media (max-width: 575px) {
    .bl-container { padding: 0 16px; }
    .bl-hero-sec { padding: 52px 0 40px; }
    .bl-chips { margin: 0 -16px 30px; padding: 4px 16px 14px; }
    .bl-h1 { font-size: clamp(2rem, 9.5vw, 2.6rem); }
    .bl-search input { font-size: 16px; padding: 14px 18px 14px 48px; }
    .bl-search .bl-search-ico { left: 15px; }
    .bl-featured { margin-bottom: 44px; box-shadow: 6px 6px 0 var(--gold); border-radius: 20px; }
    .bl-feat-body { padding: 22px 18px; }
    .bl-feat-body .bl-title { font-size: 1.35rem; }
    .bl-card { padding-top: 0; box-shadow: 4px 4px 0 var(--gold); border-radius: 18px; }
    .bl-card .bl-body { padding: 18px; }
    .bl-btn, .bl-cta a { width: 100%; justify-content: center; }
    .bl-main-sec { padding: 40px 0 56px; }
    .bl-head { margin-bottom: 32px; }
    .bl-cta { padding: 44px 20px; border-radius: 20px; box-shadow: 6px 6px 0 var(--gold); }
    .bl-cta-sec { padding: 56px 0 64px; }
}
</style>

<main class="bl-page" id="blogPage">
<div class="bl-progress" aria-hidden="true"></div>

    <!-- ===== HERO ===== -->
    <section class="bl-hero-sec">
        <div class="bl-aurora" aria-hidden="true"><i></i><i></i></div>
        <div class="bl-container">
            <div class="bl-pill" data-hero>
                <?= blIcon('sparkles') ?>
                <span>Industry Insights &amp; Strategy</span>
            </div>

            <h1 class="bl-h1">
                Latest
                <span class="accent">
                    Blogs &amp; Insights
                    <svg viewBox="0 0 300 8" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M2 4C60 1 240 1 298 4" stroke="#FFB547" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                    </svg>
                </span>
            </h1>

            <p class="bl-subtitle" data-hero>Practical insights, algorithmic updates, and digital marketing playbooks engineered for business growth.</p>

            <div class="bl-search-wrap" data-hero>
                <label class="bl-search" for="blSearch">
                    <span class="bl-search-ico"><?= blIcon('search') ?></span>
                    <input type="search" id="blSearch" placeholder="Search articles by topic, keyword, or strategy..." autocomplete="off" aria-label="Search articles">
                </label>
            </div>
        </div>
    </section>

    <?php if ($totalPosts > 0): ?>
    <div class="bl-ribbon" aria-hidden="true">
        <div class="bl-ribbon-track">
            <?php for ($i = 0; $i < 6; $i++): ?>
                <span><?= (int) $totalPosts ?> articles</span>
                <span>SEO &amp; growth playbooks</span>
                <span>Web design insights</span>
                <span>Digital marketing strategy</span>
            <?php endfor; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- ===== LIST ===== -->
    <section class="bl-main-sec">
        <div class="bl-container">

            <?php if ($totalPosts > 0): ?>

                <?php if (count($categories) > 1): ?>
                    <div class="bl-chips" id="blChips" data-rv="up">
                        <button type="button" class="bl-chip active" data-cat="">All</button>
                        <?php foreach ($categories as $cat): ?>
                            <button type="button" class="bl-chip" data-cat="<?= e($cat) ?>"><?= e($cat) ?></button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($featured): ?>
                    <?php $fImg = !empty($featured['image']); $fAuthor = (string) ($featured['author'] ?? ''); ?>
                    <article class="bl-featured bl-item <?= $fImg ? '' : 'no-img' ?>" data-rv="up" <?= blDataAttrs($featured) ?>>
                        
                        <?php if ($fImg): ?>
                            <a href="<?= blogUrl($featured) ?>" class="bl-feat-img-wrap" aria-label="Read <?= e((string) $featured['title']) ?>">
                                <div class="bl-img">
                                    <?= blImage($featured, false) ?>
                                </div>
                                <?php if (!empty($featured['readTime'])): ?>
                                    <span class="bl-time"><?= blIcon('clock') ?><?= e((string) $featured['readTime']) ?></span>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>

                        <div class="bl-feat-body">
                            <span class="bl-feat-tag"><?= blIcon('bolt') ?> Featured<?= !empty($featured['category']) ? ' · ' . e((string) $featured['category']) : '' ?></span>
                            <h2 class="bl-title"><a href="<?= blogUrl($featured) ?>"><?= e((string) $featured['title']) ?></a></h2>
                            <p class="bl-excerpt"><?= e((string) ($featured['summary'] ?? '')) ?></p>
                            <div class="bl-meta">
                                <?php if ($fAuthor !== ''): ?><span><?= blIcon('user') ?><?= e($fAuthor) ?></span><?php endif; ?>
                                <?php if (!empty($featured['date'])): ?><span><?= blIcon('calendar') ?><?= e((string) $featured['date']) ?></span><?php endif; ?>
                            </div>
                            <a href="<?= blogUrl($featured) ?>" class="bl-btn">Read Article <?= blIcon('arrow') ?></a>
                        </div>
                    </article>
                <?php endif; ?>

                <?php if ($posts): ?>
                    <div class="bl-head" data-rv="up">
                        <span class="bl-kicker">More from the blog</span>
                        <h2>Fresh <span class="accent">Articles</span></h2>
                        <p>Keep exploring — filter by category or search for a specific topic.</p>
                        <i class="bl-bar"></i>
                    </div>
                    <div class="bl-grid" id="blGrid">
                        <?php foreach ($posts as $i => $post): ?>
                            <?php $pAuthor = (string) ($post['author'] ?? ''); ?>
                            <div class="bl-item" data-rv="up" data-d="<?= min($i, 5) * 0.08 ?>" <?= blDataAttrs($post) ?>>
                                <article class="bl-card">
                                    <a href="<?= blogUrl($post) ?>" class="bl-img" aria-label="Read <?= e((string) $post['title']) ?>">
                                        <?= blImage($post, true) ?>
                                        <?php if (!empty($post['category'])): ?><span class="bl-pill-tag"><?= e((string) $post['category']) ?></span><?php endif; ?>
                                        <?php if (!empty($post['readTime'])): ?><span class="bl-time"><?= blIcon('clock') ?><?= e((string) $post['readTime']) ?></span><?php endif; ?>
                                    </a>
                                    <div class="bl-body">
                                        <?php if (!empty($post['date'])): ?><div class="bl-date"><?= blIcon('calendar') ?><?= e((string) $post['date']) ?></div><?php endif; ?>
                                        <h3 class="bl-title"><a href="<?= blogUrl($post) ?>"><?= e((string) $post['title']) ?></a></h3>
                                        <p class="bl-excerpt"><?= e((string) ($post['summary'] ?? '')) ?></p>
                                        <div class="bl-foot">
                                            <span class="bl-author">
                                                <span class="bl-ava"><?= e($pAuthor !== '' ? strtoupper(substr($pAuthor, 0, 1)) : 'W') ?></span>
                                                <span class="bl-author-name"><?= e($pAuthor !== '' ? $pAuthor : 'WebTecMart') ?></span>
                                            </span>
                                            <a class="bl-arrow" href="<?= blogUrl($post) ?>" aria-label="Read more"><?= blIcon('arrow') ?></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="bl-empty" id="blEmpty" style="display:none;">
                    <div class="bl-empty-ico"><?= blIcon('heart') ?></div>
                    <h4>No articles found</h4>
                    <p style="margin:0;">Try a different keyword or pick another category.</p>
                </div>

            <?php else: ?>
                <div class="bl-empty" style="display:block;">
                    <div class="bl-empty-ico"><?= blIcon('journal') ?></div>
                    <h4>No articles yet</h4>
                    <p style="margin:0;">No published articles are available right now. Please check back soon.</p>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <!-- ===== CTA ===== -->
    <?php if ($totalPosts > 0): ?>
    <section class="bl-cta-sec">
        <div class="bl-container">
            <div class="bl-cta" data-rv="scale">
                <h2>Ready to Grow Your Business?</h2>
                <p>Get a free consultation and a tailored digital growth plan from our team.</p>
                <a href="/contact.php">Get Free Consultation <?= blIcon('arrow') ?></a>
            </div>
        </div>
    </section>
    <?php endif; ?>

</main>

<script>
(function () {
    var root = document.getElementById('blogPage');
    if (!root) return;

    var search = document.getElementById('blSearch');
    var chips = root.querySelectorAll('.bl-chip');
    var items = root.querySelectorAll('.bl-item');
    var empty = document.getElementById('blEmpty');
    var head = root.querySelector('.bl-head');
    var activeCat = '';

    function apply() {
        var q = (search ? search.value : '').trim().toLowerCase();
        var visible = 0, gridVisible = 0;
        items.forEach(function (el) {
            var okCat = !activeCat || el.dataset.cat === activeCat;
            var okText = !q || (el.dataset.search || '').indexOf(q) !== -1;
            var show = okCat && okText;
            el.style.display = show ? '' : 'none';
            if (show) {
                visible++;
                if (el.parentElement && el.parentElement.id === 'blGrid') gridVisible++;
            }
        });
        if (head) head.style.display = gridVisible ? '' : 'none';
        if (empty) empty.style.display = visible === 0 && items.length ? 'block' : 'none';
    }

    if (search) search.addEventListener('input', apply);
    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            chips.forEach(function (c) { c.classList.remove('active'); });
            chip.classList.add('active');
            activeCat = chip.dataset.cat || '';
            apply();
        });
    });

    // ripple on buttons
    root.addEventListener('click', function (e) {
        var b = e.target.closest && e.target.closest('.bl-btn, .bl-cta a');
        if (!b) return;
        var r = b.getBoundingClientRect(), d = document.createElement('i');
        d.className = 'bl-ripple';
        d.style.left = (e.clientX - r.left) + 'px';
        d.style.top = (e.clientY - r.top) + 'px';
        b.appendChild(d);
        setTimeout(function () { d.remove(); }, 700);
    });
})();
</script>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>