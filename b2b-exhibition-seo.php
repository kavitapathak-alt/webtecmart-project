<?php
// TEMP DEBUG: asli error screen pe dikhane ke liye. Page chal jaye to ye 2 lines HATA DENA.
ini_set('display_errors', '1');
error_reporting(E_ALL);

$pageMeta = [
    'title' => 'Event Website Design & B2B Exhibition SEO | WebTecMart',
    'description' => 'High-performance websites for B2B trade fairs and exhibitions, combining event website development with strategic SEO to drive organic growth and registrations.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

// Pull dynamic updates from DB if edited in Admin (safe: DB fail hone par bhi page chalega)
$dbService = [];
try {
    if (function_exists('getServiceBySlug')) {
        $dbService = getServiceBySlug('b2b-exhibition-seo') ?: [];
    }
} catch (Throwable $e) {
    $dbService = [];
}
$pageTitle = $dbService['title'] ?? 'B2B & Exhibition SEO Services';
$heroDesc  = $dbService['hero_description'] ?? ($dbService['summary'] ?? 'We uncover hidden search opportunities and build a customized, deadline-driven Event SEO strategy that drives pre-registered trade buyers, sells out exhibitor stalls, and delivers measurable results.');
$bodyCopy  = $dbService['body'] ?? '';

$arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>';
$phone = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>';

$challenges = [
    ['Attracting qualified international buyers', 'Reaching the right audience matters more than raw traffic. Organisers need relevant buyers, importers, wholesalers and sourcing professionals arriving through organic search.'],
    ['Generating quality exhibitor enquiries', 'Exhibitors need more than event promotion. Your website must show business opportunity, industry relevance and commercial value.'],
    ['Competing for organic search visibility', 'B2B fairs compete across event, industry, product and location searches. Without a focused SEO strategy, valuable search demand goes to someone else.'],
    ['Driving registrations in short timelines', 'Exhibition marketing runs on fixed dates. Building visibility, reaching the right people and converting them takes consistent SEO planning and execution.'],
];

$ranks = [
    ['bharat-tex.com 🇮🇳', 'Govt / Mega Fair', '771', '137K+', '₹18.4L', 'Top 3 positions: ', '80+ commercial keywords #1'],
    ['ihgfdelhifair.in 🇮🇳', 'B2B Trade Show', '883', '42.5K+', '₹8.2L', 'Top 3 positions: ', '22 key locations #1 ranked'],
    ['premier-logistics.in 🏢', 'B2B Industrial', '1.3K+', '68.2K+', '$12.5K', 'Top 10 positions: ', '140+ high-intent keywords'],
];

$keywords = [
    ['Bharat Tex 2026 Fair', 'bharat-tex.com', '+17', '49,500/mo', 'Commercial'],
    ['Best SEO Company in Delhi NCR', 'webtecmart.com/seo-services-delhi.php', '+13', '14,800/mo', 'High Intent'],
    ['IHGF Autumn Fair Dates 2027', 'ihgfdelhifair.in', '+25', '22,200/mo', 'Buyer Intent'],
    ['B2B Exhibition SEO Services', 'webtecmart.com/b2b-exhibition-seo.php', '+30', '8,100/mo', 'B2B Commercial'],
    ['Local SEO Services in Delhi', 'webtecmart.com/local-seo.php', '+23', '12,100/mo', 'Local Intent'],
    ['Technical SEO Services Delhi', 'webtecmart.com/technical-seo.php', '+19', '6,400/mo', 'Technical'],
];

$faqs = [
    ['When should an exhibition organizer start SEO before the event dates?', 'Ideally 6 to 9 months prior to the event dates. This timeline gives Google sufficient opportunity to crawl exhibitor categories, rank competitive sourcing queries, and build momentum before visitor badge pre-registrations peak in the final 90 days.'],
    ['Can individual B2B exhibitors also benefit from exhibition SEO?', 'Absolutely. Individual exhibitors investing in stalls at fairs like Bharat Tex, IHGF, or Auto Expo can launch dedicated exhibition landing pages to rank for product searches during the fair, pre-booking high-value meetings with visiting international delegations before the fair doors even open.'],
    ['How did WebTecMart achieve 400% organic growth for Bharat Tex Fair?', 'We implemented a multi-tiered technical taxonomy, optimized over 200+ global textile keywords, built Event and Organization schema hierarchies, and executed digital PR that earned coverage from global trade portals, securing #1 Google rankings for high-intent search queries worldwide.'],
    ['How do you prevent trade show websites from losing rank once the fair ends?', 'We build evergreen URL structures alongside annual archive slugs. Instead of deleting pages, we transition past editions into authoritative post-show review hubs while redirecting core search equity into next year\'s upcoming event campaign.'],
];
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11.1.14/swiper-bundle.min.css">

<style>
/* ============================================================
   B2B & EXHIBITION SEO — "Expo Floor" design
   Idea: the page behaves like a trade-fair venue. Dark hall at the
   top, a visitor badge as hero, stall-signage section blocks.
   ============================================================ */
.xp {
    --ink: #1A0613;
    --ink2: #2B0B20;
    --pink: #C4007A;
    --pink2: #E0398F;
    --blush: #FBEAF3;
    --paper: #FFFFFF;
    --mist: #F7F4F8;
    --gold: #FFB547;
    --mint: #0E9F6E;
    --text: #2A2430;
    --mute: #6C6474;
    --line: rgba(26, 6, 19, .12);
    --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
    font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
    color: var(--text);
    background: var(--paper);
    overflow-x: clip;
}
.xp *, .xp *::before, .xp *::after { box-sizing: border-box; }
.xp h1, .xp h2, .xp h3, .xp h4 { font-family: var(--disp); margin: 0; letter-spacing: -.02em; }
.xp p { margin: 0; }
.xp a:focus-visible, .xp button:focus-visible, .xp input:focus-visible, .xp select:focus-visible, .xp textarea:focus-visible {
    outline: 3px solid var(--gold);
    outline-offset: 2px;
}
.xp-wrap { max-width: 1200px; margin: 0 auto; padding: 0 22px; }
/* Grid blowout fix: every grid track can shrink below its content (inputs, long text) */
.xp-hero-grid, .xp-board, .xp-web-grid, .xp-case, .xp-rank-cards, .xp-form-card, .xp-fields, .xp-faq-grid, .xp-stats, .xp-chips, .xp-screen-body { grid-template-columns: minmax(0, 1fr); }
.xp-hero-grid > *, .xp-board > *, .xp-web-grid > *, .xp-case > *, .xp-rank-cards > *, .xp-form-card > *, .xp-fields > *, .xp-faq-grid > *, .xp-stats > * { min-width: 0; }
.xp img, .xp svg, .xp input, .xp select, .xp textarea, .xp table { max-width: 100%; }
.xp-field input, .xp-field select, .xp-field textarea { min-width: 0; }
.xp h1, .xp h2, .xp h3, .xp p, .xp li { overflow-wrap: anywhere; }

/* Buttons */
.xp-btn {
    display: inline-flex; align-items: center; justify-content: center; gap: 10px;
    padding: 14px 26px; border-radius: 12px; font-weight: 700; font-size: .95rem; line-height: 1;
    text-decoration: none; white-space: nowrap; border: 2px solid transparent; cursor: pointer;
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
}
.xp-btn svg { flex-shrink: 0; }
.xp-btn--pink { background: var(--pink); color: #fff !important; box-shadow: 0 6px 0 #7E004E; }
.xp-btn--pink:hover { translate: 0 2px; box-shadow: 0 4px 0 #7E004E; }
.xp-btn--pink:active { translate: 0 6px; box-shadow: 0 0 0 #7E004E; }
.xp-btn--ghost { background: transparent; color: #fff !important; border-color: rgba(255,255,255,.35); }
.xp-btn--ghost:hover { background: rgba(255,255,255,.1); border-color: #fff; }
.xp-btn--line { background: #fff; color: var(--pink) !important; border-color: var(--pink); }
.xp-btn--line:hover { background: var(--blush); }
.xp-btn--sm { padding: 11px 20px; font-size: .86rem; }

/* ===== HERO (the hall) ===== */
.xp-hero {
    position: relative; color: #fff; padding: 64px 0 0;
    background:
        radial-gradient(60% 70% at 85% 10%, rgba(196,0,122,.55), transparent 65%),
        radial-gradient(40% 50% at 0% 100%, rgba(255,181,71,.16), transparent 70%),
        var(--ink);
}
.xp-hero::before { /* floor-plan dot grid */
    content: ''; position: absolute; inset: 0;
    background-image: radial-gradient(rgba(255,255,255,.14) 1px, transparent 1.2px);
    background-size: 26px 26px;
    -webkit-mask-image: linear-gradient(180deg, #000 30%, transparent 95%);
            mask-image: linear-gradient(180deg, #000 30%, transparent 95%);
    pointer-events: none;
}
.xp-hero-grid { position: relative; display: grid; gap: 48px; align-items: center; padding-bottom: 64px; }
@media (min-width: 992px) { .xp-hero-grid { grid-template-columns: 1.1fr .9fr; gap: 56px; } }
.xp-tag {
    display: inline-flex; align-items: center; gap: 8px; padding: 7px 14px 7px 10px; margin-bottom: 22px;
    border-radius: 999px; background: rgba(255,255,255,.09); border: 1px solid rgba(255,255,255,.2);
    font-size: .8rem; font-weight: 600; color: #FFE3F1;
}
.xp-tag i { width: 8px; height: 8px; border-radius: 50%; background: var(--gold); box-shadow: 0 0 0 4px rgba(255,181,71,.25); }
.xp-hero h1 { font-size: clamp(2.5rem, 5.4vw, 4.4rem); font-weight: 800; line-height: 1.03; margin-bottom: 20px; }
.xp-hero-sub { font-family: var(--disp); font-size: clamp(1.15rem, 2vw, 1.45rem); font-weight: 600; line-height: 1.35; color: #FFD7EB; margin-bottom: 16px; max-width: 560px; }
.xp-hero-desc { color: rgba(255,255,255,.78); line-height: 1.7; max-width: 560px; margin-bottom: 28px; }
.xp-actions { display: flex; flex-wrap: wrap; gap: 14px; }
.xp-note { margin-top: 26px; padding-top: 16px; border-top: 1px dashed rgba(255,255,255,.25); font-size: .8rem; color: rgba(255,255,255,.6); line-height: 1.55; max-width: 560px; }

/* Visitor badge (SERP + event pass) */
.xp-badge-wrap { position: relative; display: flex; justify-content: center; padding-top: 70px; perspective: 1100px; }
.xp-lanyard { position: absolute; top: 0; left: 50%; width: 14px; height: 90px; margin-left: -7px; background: linear-gradient(var(--gold), #E58B00); border-radius: 0 0 4px 4px; }
.xp-lanyard::after { content: ''; position: absolute; left: 50%; bottom: -4px; width: 46px; height: 12px; margin-left: -23px; background: #8C94A3; border-radius: 4px; }
.xp-badge {
    position: relative; width: 100%; max-width: 430px; background: #fff; color: var(--text); border-radius: 22px;
    padding: 34px 26px 24px; transform: rotate(2.2deg); transform-origin: top center;
    box-shadow: 0 30px 60px rgba(0,0,0,.45);
}
@keyframes xp-sway { from { transform: rotate(2.2deg); } to { transform: rotate(-1.4deg); } }
.xp-badge::before { /* lanyard hole */
    content: ''; position: absolute; top: 12px; left: 50%; width: 52px; height: 9px; margin-left: -26px; border-radius: 99px; background: var(--ink);
}
.xp-badge-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; gap: 10px; }
.xp-live { display: inline-flex; align-items: center; gap: 7px; background: #E6F8F0; color: #0A7A54; font-size: .75rem; font-weight: 700; padding: 5px 11px; border-radius: 99px; }
.xp-live i { width: 7px; height: 7px; border-radius: 50%; background: var(--mint); }
.xp-badge-top small { font-size: .72rem; color: var(--mute); font-weight: 700; }
.xp-serp-url { font-size: .76rem; color: var(--mute); margin-bottom: 4px; }
.xp-serp-url b { color: #1A0DAB; font-weight: 700; }
.xp-serp-title { font-family: var(--disp); font-size: 1.12rem; font-weight: 700; color: #1A0DAB; text-decoration: underline; line-height: 1.3; margin-bottom: 8px; }
.xp-serp-desc { font-size: .84rem; line-height: 1.55; color: #4D5156; margin-bottom: 14px; }
.xp-pass { margin: 0 -26px; padding: 16px 26px; background: var(--blush); border-top: 2px dashed rgba(196,0,122,.35); border-bottom: 2px dashed rgba(196,0,122,.35); position: relative; }
.xp-pass::before, .xp-pass::after { content: ''; position: absolute; top: 50%; width: 18px; height: 18px; margin-top: -9px; border-radius: 50%; background: #2B0B20; }
.xp-pass::before { left: -9px; } .xp-pass::after { right: -9px; }
.xp-pass div { font-size: .8rem; line-height: 1.5; margin-bottom: 6px; color: #3A2733; }
.xp-pass div:last-child { margin-bottom: 0; }
.xp-pass strong { color: var(--ink); }
.xp-chips { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-top: 18px; }
.xp-chip { text-align: center; padding: 10px 4px; border-radius: 10px; background: var(--ink); color: #fff; }
.xp-chip b { display: block; font-family: var(--disp); font-size: 1.25rem; color: var(--gold); line-height: 1.1; }
.xp-chip span { font-size: .66rem; font-weight: 600; opacity: .8; }

/* Stat ribbon (hall signage) */
.xp-ribbon { position: relative; background: var(--gold); color: var(--ink); overflow: hidden; border-top: 3px solid var(--ink); }
.xp-ribbon-track { display: flex; width: max-content; animation: xp-run 38s linear infinite; }
.xp-ribbon span { font-family: var(--disp); font-weight: 800; font-size: 1.05rem; padding: 14px 30px; white-space: nowrap; }
.xp-ribbon span::after { content: '✦'; margin-left: 60px; opacity: .55; }
@keyframes xp-run { to { transform: translateX(-50%); } }

/* ===== Section shells ===== */
.xp-sec { padding: 84px 0; }
.xp-head { max-width: 720px; margin-bottom: 44px; }
.xp-head h2 { font-size: clamp(1.9rem, 3.6vw, 2.9rem); font-weight: 800; line-height: 1.1; color: var(--ink); margin-bottom: 14px; }
.xp-head p { color: var(--mute); line-height: 1.65; font-size: 1.02rem; }
.xp-head--dark h2 { color: #fff; }
.xp-head--dark p { color: rgba(255,255,255,.7); }
.xp-kicker { display: inline-block; font-size: .82rem; font-weight: 700; color: var(--pink); margin-bottom: 12px; padding-left: 14px; border-left: 4px solid var(--pink); }

/* ===== Challenges: stall signboards ===== */
.xp-challenges { background: var(--mist); }
.xp-board { display: grid; gap: 18px; }
@media (min-width: 768px) { .xp-board { grid-template-columns: repeat(2, 1fr); } }
.xp-stall {
    position: relative; background: #fff; border: 2px solid var(--ink); border-radius: 18px; padding: 54px 26px 26px;
    box-shadow: 6px 6px 0 var(--ink);
}
.xp-stall::before { /* awning */
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 28px; border-radius: 15px 15px 0 0;
    background: repeating-linear-gradient(90deg, var(--pink) 0 22px, #fff 22px 44px);
    border-bottom: 2px solid var(--ink);
}
.xp-stall:nth-child(even)::before { background: repeating-linear-gradient(90deg, var(--ink) 0 22px, var(--gold) 22px 44px); }
.xp-stall { transition: translate .25s ease, box-shadow .25s ease; }
.xp-stall:hover { translate: -4px -4px; box-shadow: 10px 10px 0 var(--pink); }
.xp-rc, .xp-stat { transition: translate .25s ease, box-shadow .25s ease; }
.xp-rc:hover { translate: -3px -3px; box-shadow: 6px 6px 0 var(--pink); }
.xp-stat:hover { translate: 0 -4px; }
.xp-stall h3 { font-size: 1.3rem; font-weight: 700; line-height: 1.25; color: var(--ink); margin-bottom: 10px; }
.xp-stall p { font-size: .94rem; line-height: 1.65; color: var(--mute); }

/* ===== Event websites ===== */
.xp-web-grid { display: grid; gap: 44px; align-items: center; }
@media (min-width: 992px) { .xp-web-grid { grid-template-columns: .95fr 1.05fr; gap: 64px; } }
.xp-web-copy h2 { font-size: clamp(1.9rem, 3.6vw, 2.8rem); font-weight: 800; line-height: 1.1; color: var(--ink); margin-bottom: 12px; }
.xp-web-copy h3 { font-size: 1.2rem; font-weight: 600; color: var(--pink); line-height: 1.35; margin-bottom: 22px; }
.xp-web-copy p { line-height: 1.7; color: var(--mute); margin-bottom: 16px; }
.xp-web-copy .xp-actions { margin-top: 28px; }
.xp-browser { background: var(--ink); border-radius: 18px; padding: 12px; box-shadow: 14px 14px 0 var(--blush), 0 0 0 2px var(--ink); }
.xp-browser-bar { display: flex; align-items: center; gap: 14px; padding: 4px 6px 12px; }
.xp-dots { display: flex; gap: 6px; }
.xp-dots span { width: 11px; height: 11px; border-radius: 50%; background: var(--pink); }
.xp-dots span:nth-child(2) { background: var(--gold); } .xp-dots span:nth-child(3) { background: #fff; }
.xp-url { flex: 1; min-width: 0; background: rgba(255,255,255,.1); color: rgba(255,255,255,.7); font-size: .72rem; padding: 6px 12px; border-radius: 8px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.xp-screen { background: #fff; border-radius: 10px; overflow: hidden; min-height: 320px; }
.xp-screen-nav { display: flex; justify-content: space-between; align-items: center; padding: 14px 18px; border-bottom: 1px solid #F0E6EC; gap: 10px; }
.xp-screen-nav b { font-family: var(--disp); font-size: 1.2rem; color: var(--pink); }
.xp-screen-nav em { font-style: normal; font-size: .65rem; color: var(--mute); }
.xp-screen-nav span { background: var(--pink); color: #fff; font-size: .65rem; font-weight: 800; padding: 8px 12px; border-radius: 8px; white-space: nowrap; }
.xp-screen-body { display: grid; grid-template-columns: 1fr .85fr; gap: 16px; align-items: center; padding: 28px 22px; }
.xp-screen-body small { color: var(--pink); font-size: .64rem; font-weight: 700; }
.xp-screen-body h4 { margin: 10px 0 10px; font-size: clamp(1.5rem, 3vw, 2.3rem); font-weight: 800; line-height: 1.02; color: var(--ink); }
.xp-screen-body p { font-size: .72rem; line-height: 1.5; color: var(--mute); margin-bottom: 14px; }
.xp-screen-body i { display: inline-block; font-style: normal; background: var(--ink); color: #fff; font-size: .65rem; font-weight: 800; padding: 9px 12px; border-radius: 8px; }
.xp-art { min-height: 190px; border-radius: 10px; background: radial-gradient(ellipse at 70% 30%, rgba(255,255,255,.7) 0 8%, transparent 9%), radial-gradient(ellipse at 58% 50%, rgba(244,196,222,.9) 0 17%, transparent 18%), linear-gradient(145deg, #2D051E 0%, #C4007A 52%, #E98EBE 100%); }
@media (max-width: 575px) { .xp-screen-nav em { display: none; } .xp-screen-body { padding: 20px 14px; gap: 10px; } .xp-art { min-height: 140px; } }

/* ===== Case studies ===== */
.xp-cases { background: var(--ink); color: #fff; }
.xp-case { display: grid; gap: 28px; padding: 34px; margin-bottom: 22px; border-radius: 22px; background: var(--ink2); border: 1px solid rgba(255,255,255,.12); align-items: center; }
@media (min-width: 900px) { .xp-case { grid-template-columns: 1.1fr .9fr; padding: 42px; gap: 44px; } .xp-case:nth-of-type(even) { grid-template-columns: .9fr 1.1fr; } .xp-case:nth-of-type(even) .xp-case-text { order: 2; } }
.xp-case-org { display: inline-block; font-size: .78rem; font-weight: 700; color: var(--ink); background: var(--gold); padding: 6px 12px; border-radius: 8px; margin-bottom: 14px; }
.xp-case h3 { font-size: clamp(1.45rem, 2.6vw, 2rem); font-weight: 800; line-height: 1.15; margin-bottom: 14px; }
.xp-case p { color: rgba(255,255,255,.75); line-height: 1.7; margin-bottom: 22px; font-size: .96rem; }
.xp-stats { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
.xp-stat { padding: 18px 14px; border-radius: 14px; background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.14); }
.xp-stat b { display: block; font-family: var(--disp); font-size: 2rem; font-weight: 800; color: var(--gold); line-height: 1.05; }
.xp-stat span { font-size: .78rem; color: rgba(255,255,255,.7); font-weight: 600; }

/* ===== Rankings leaderboard ===== */
.xp-rank-cards { display: grid; gap: 18px; margin-bottom: 36px; }
@media (min-width: 768px) { .xp-rank-cards { grid-template-columns: repeat(3, 1fr); } }
.xp-rc { background: #fff; border: 2px solid var(--ink); border-radius: 18px; overflow: hidden; }
.xp-rc-head { display: flex; justify-content: space-between; align-items: center; gap: 8px; padding: 14px 18px; background: var(--ink); color: #fff; }
.xp-rc-head b { font-family: var(--disp); font-size: 1rem; word-break: break-all; }
.xp-rc-head span { font-size: .68rem; font-weight: 700; background: var(--pink); padding: 3px 9px; border-radius: 99px; white-space: nowrap; }
.xp-rc-metrics { display: grid; grid-template-columns: repeat(3, 1fr); text-align: center; }
.xp-rc-metrics div { padding: 16px 4px; border-right: 1px solid var(--line); }
.xp-rc-metrics div:last-child { border-right: 0; }
.xp-rc-metrics b { display: block; font-family: var(--disp); font-size: 1.35rem; color: var(--pink); }
.xp-rc-metrics span { font-size: .68rem; font-weight: 600; color: var(--mute); }
.xp-rc-foot { padding: 13px 18px; background: var(--blush); font-size: .82rem; font-weight: 600; color: var(--ink); border-top: 2px solid var(--ink); }
.xp-rc-foot b { color: var(--pink); }
.xp-table-wrap { overflow-x: auto; border: 2px solid var(--ink); border-radius: 18px; margin-bottom: 36px; background: #fff; }
.xp-table { width: 100%; min-width: 760px; border-collapse: collapse; }
.xp-table th { text-align: left; padding: 14px 18px; background: var(--blush); color: var(--ink); font-size: .8rem; font-weight: 800; border-bottom: 2px solid var(--ink); }
.xp-table td { padding: 15px 18px; font-size: .9rem; border-bottom: 1px solid var(--line); vertical-align: middle; }
.xp-table tr:last-child td { border-bottom: 0; }
.xp-table tbody tr:hover { background: #FFF9FC; }
.xp-url-cell { color: var(--mute); font-size: .8rem; }
.xp-medal { display: inline-grid; place-items: center; width: 40px; height: 40px; border-radius: 50%; background: var(--gold); color: var(--ink); font-family: var(--disp); font-weight: 800; border: 2px solid var(--ink); }
.xp-up { color: var(--mint); font-weight: 800; font-size: .84rem; }
.xp-intent { display: inline-block; background: var(--blush); color: var(--pink); font-weight: 700; font-size: .74rem; padding: 4px 10px; border-radius: 99px; }
.xp-center { text-align: center; }

/* ===== Form ===== */
.xp-form-sec { background: var(--blush); }
.xp-form-card { display: grid; max-width: 1060px; margin: 0 auto; border: 2px solid var(--ink); border-radius: 24px; overflow: hidden; background: #fff; box-shadow: 10px 10px 0 var(--ink); }
@media (min-width: 900px) { .xp-form-card { grid-template-columns: .8fr 1.2fr; } }
.xp-form-side { background: var(--pink); color: #fff; padding: 38px 30px; display: flex; flex-direction: column; gap: 18px; }
.xp-form-side h3 { font-size: clamp(1.6rem, 2.6vw, 2.1rem); font-weight: 800; line-height: 1.12; }
.xp-form-side p { line-height: 1.65; color: rgba(255,255,255,.9); font-size: .95rem; }
.xp-form-side ul { list-style: none; padding: 0; margin: 4px 0 0; display: grid; gap: 10px; }
.xp-form-side li { display: flex; gap: 10px; font-size: .9rem; font-weight: 600; }
.xp-form-side li::before { content: '✓'; display: grid; place-items: center; flex-shrink: 0; width: 22px; height: 22px; border-radius: 50%; background: #fff; color: var(--pink); font-size: .75rem; font-weight: 800; }
.xp-form-main { padding: 36px 30px; }
.xp-fields { display: grid; gap: 16px; margin-bottom: 16px; }
@media (min-width: 640px) { .xp-fields { grid-template-columns: repeat(2, 1fr); } }
.xp-field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 0; }
.xp-field--full { margin-bottom: 16px; }
.xp-field label { font-size: .82rem; font-weight: 700; color: var(--ink); }
.xp-field input, .xp-field select, .xp-field textarea {
    width: 100%; padding: 13px 14px; border-radius: 10px; border: 2px solid #E4DCE6; background: #FCFAFD;
    font-family: inherit; font-size: .92rem; color: var(--ink); transition: border-color .2s, box-shadow .2s;
}
.xp-field input:focus, .xp-field select:focus, .xp-field textarea:focus { border-color: var(--pink); background: #fff; outline: none; box-shadow: 0 0 0 4px rgba(196,0,122,.14); }
.xp-submit { width: 100%; margin-top: 6px; }
.xp-submit:disabled { opacity: .7; cursor: wait; }
.ev-form-feedback { display: none; margin-top: 16px; padding: 13px 14px; border-radius: 10px; font-size: .88rem; font-weight: 600; text-align: center; }
.ev-form-feedback.success { display: block; background: #E6F8F0; color: #065F46; border: 1px solid #A7F3D0; }

/* ===== FAQ ===== */
.xp-faq-grid { display: grid; gap: 40px; }
@media (min-width: 992px) { .xp-faq-grid { grid-template-columns: .8fr 1.2fr; gap: 64px; } .xp-faq-grid .xp-head { position: sticky; top: 100px; align-self: start; margin-bottom: 0; } }
.ev-faq-item { border: 2px solid var(--ink); border-radius: 14px; margin-bottom: 12px; background: #fff; overflow: hidden; transition: box-shadow .2s; }
.ev-faq-item.active { box-shadow: 5px 5px 0 var(--pink); }
.ev-faq-btn { width: 100%; display: flex; justify-content: space-between; align-items: center; gap: 16px; padding: 18px 20px; background: transparent; border: 0; text-align: left; font-family: var(--disp); font-weight: 700; font-size: 1.04rem; line-height: 1.3; color: var(--ink); cursor: pointer; }
.ev-faq-btn .icon { flex-shrink: 0; display: grid; place-items: center; width: 30px; height: 30px; border-radius: 8px; background: var(--blush); color: var(--pink); font-size: 1.2rem; line-height: 1; transition: transform .25s, background .25s, color .25s; }
.ev-faq-item.active .icon { transform: rotate(45deg); background: var(--pink); color: #fff; }
.ev-faq-answer { display: none; padding: 0 20px 20px; line-height: 1.7; color: var(--mute); font-size: .94rem; }
.ev-faq-item.active .ev-faq-answer { display: block; }

/* ===== Final CTA ===== */
.xp-cta { padding: 0 0 84px; }
.xp-cta-card { position: relative; overflow: hidden; background: var(--ink); color: #fff; border-radius: 26px; padding: 60px 34px; text-align: center; }
.xp-cta-card::before { content: ''; position: absolute; inset: 0; background: radial-gradient(50% 80% at 50% 120%, rgba(196,0,122,.7), transparent 70%), radial-gradient(rgba(255,255,255,.1) 1px, transparent 1.2px) 0 0 / 26px 26px; }
.xp-cta-card > * { position: relative; }
.xp-cta-card h2 { font-size: clamp(1.9rem, 3.8vw, 3rem); font-weight: 800; line-height: 1.1; max-width: 800px; margin: 0 auto 16px; }
.xp-cta-card p { max-width: 620px; margin: 0 auto 30px; color: rgba(255,255,255,.8); line-height: 1.65; }
.xp-cta-card .xp-actions { justify-content: center; }
.xp-cta-foot { margin-top: 26px; font-size: .8rem; color: rgba(255,255,255,.6); }

/* ===== Motion states (only active when Motion library loaded) ===== */
.xp-progress { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 4px; z-index: 9999; background: linear-gradient(90deg, var(--gold), var(--pink)); transform-origin: 0 50%; transform: scaleX(0); }
.xp-js .xp-progress { display: block; }
.xp-orb { position: absolute; right: -6%; top: 6%; width: 440px; height: 440px; border-radius: 50%; pointer-events: none; background: radial-gradient(circle at 30% 30%, rgba(255,181,71,.38), rgba(196,0,122,0) 70%); filter: blur(8px); }
.xp-w { display: inline-block; overflow: hidden; vertical-align: top; padding-bottom: .12em; margin-bottom: -.12em; }
.xp-w > span { display: inline-block; }
.xp-js .xp-tag, .xp-js .xp-hero-sub, .xp-js .xp-hero-desc, .xp-js .xp-hero .xp-actions, .xp-js .xp-note, .xp-js .xp-badge-wrap,
.xp-js .xp-head, .xp-js .xp-stall, .xp-js .xp-web-copy > *, .xp-js .xp-browser, .xp-js .xp-slider, .xp-js .xp-race, .xp-js .xp-rc,
.xp-js .xp-table-wrap, .xp-js .xp-form-card, .xp-js .xp-faq-grid .ev-faq-item, .xp-js .xp-cta-card { opacity: 0; }
.xp-js .xp-table tbody tr, .xp-js .xp-medal { opacity: 0; }

/* ===== Responsive ===== */
@media (max-width: 991px) {
    .xp-hero-grid { gap: 36px; }
    .xp-hero h1, .xp-hero-sub, .xp-hero-desc, .xp-note { max-width: none; }
    .xp-badge { max-width: 400px; }
    .xp-orb { width: 300px; height: 300px; right: -20%; }
    .xp-form-card { box-shadow: 6px 6px 0 var(--ink); }
}
@media (max-width: 760px) {
    .xp-rank-cards { display: flex; gap: 14px; overflow-x: auto; scroll-snap-type: x mandatory; margin: 0 -22px 28px; padding: 4px 22px 16px; scrollbar-width: none; }
    .xp-rank-cards::-webkit-scrollbar { display: none; }
    .xp-rank-cards .xp-rc { flex: 0 0 84%; scroll-snap-align: center; }
    .xp-table-wrap { border: 0; background: transparent; overflow: visible; border-radius: 0; }
    .xp-table { min-width: 0; display: block; }
    .xp-table thead { display: none; }
    .xp-table tbody { display: grid; gap: 16px; }
    .xp-table tr { display: block; background: #fff; border: 2px solid var(--ink); border-radius: 16px; padding: 4px 0; box-shadow: 5px 5px 0 var(--ink); }
    .xp-table td { display: flex; justify-content: space-between; align-items: center; gap: 14px; padding: 11px 16px; text-align: right; border-bottom: 1px dashed var(--line); word-break: break-word; }
    .xp-table tr td:last-child { border-bottom: 0; }
    .xp-table td::before { content: attr(data-label); flex-shrink: 0; text-align: left; font-size: .72rem; font-weight: 700; color: var(--mute); }
    .xp-table td:first-child { background: var(--blush); border-radius: 12px 12px 0 0; }
    .xp-center { text-align: right; }
}
@media (max-width: 575px) {
    .xp-wrap { padding: 0 16px; }
    .xp-sec { padding: 60px 0; }
    .xp-head { margin-bottom: 32px; }
    .xp-hero { padding-top: 40px; }
    .xp-hero h1 { font-size: clamp(2.1rem, 9.5vw, 2.6rem); }
    .xp-hero-grid { padding-bottom: 48px; }
    .xp-badge-wrap { padding-top: 56px; }
    .xp-lanyard { height: 76px; }
    .xp-badge { padding: 32px 18px 20px; }
    .xp-pass { margin: 0 -18px; padding: 14px 18px; }
    .xp-ribbon span { font-size: .92rem; padding: 12px 22px; }
    .xp-case { padding: 24px 18px; }
    .xp-stat b { font-size: 1.6rem; }
    .xp-actions .xp-btn { width: 100%; white-space: normal; text-align: center; }
    .xp-stall { padding: 50px 20px 22px; box-shadow: 4px 4px 0 var(--ink); }
    .xp-browser { box-shadow: 7px 7px 0 var(--blush), 0 0 0 2px var(--ink); }
    .xp-form-main, .xp-form-side { padding: 28px 18px; }
    .xp-cta-card { padding: 44px 20px; border-radius: 20px; }
    .ev-faq-btn { padding: 16px; font-size: .98rem; }
    .ev-faq-answer { padding: 0 16px 18px; }
}
@media (max-width: 380px) {
    .xp-stats { grid-template-columns: 1fr; }
    .xp-chips { gap: 6px; }
    .xp-chip b { font-size: 1.05rem; }
}
@media (prefers-reduced-motion: reduce) {
    .xp-ribbon-track { animation: none; }
    .xp-btn, .xp-stall, .xp-rc, .xp-stat { transition: none; }
}

/* ===== Mobile hardening (v3) ===== */
@media (max-width: 575px) {
    .xp-btn { white-space: normal; text-align: center; line-height: 1.3; max-width: 100%; padding: 14px 18px; }
    .xp-center .xp-btn, .xp-submit, .xp-cta-card .xp-btn { width: 100%; }
    .xp-form-card { border-radius: 18px; }
    .xp-form-card, .xp-case, .xp-rc, .xp-stall { max-width: 100%; }
    .xp-field input, .xp-field select, .xp-field textarea { font-size: 16px; padding: 12px; }
    .xp-screen-body { grid-template-columns: minmax(0, 1fr) minmax(0, .8fr); }
    .xp-rc-head { flex-wrap: wrap; }
    .xp-rc-metrics b { font-size: 1.15rem; }
    .xp-table td { flex-wrap: wrap; }
    .xp-url-cell { overflow-wrap: anywhere; }
}

/* ===== v4: slider, floating chips, spotlight, sticky bar ===== */
.xp-slider .swiper { overflow: hidden; padding: 4px 14px 18px 4px; margin: -4px -14px -18px -4px; }
.xp-slider .swiper-slide { height: auto; }
.xp-slider .xp-case { height: 100%; margin-bottom: 0; border: 2px solid rgba(255,255,255,.18); box-shadow: 8px 8px 0 var(--gold); }
.xp-slider { padding-right: 8px; }
.xp-slider-nav { display: flex; align-items: center; justify-content: space-between; gap: 20px; margin-top: 30px; }
.xp-pag { display: flex; gap: 8px; }
.xp-pag .swiper-pagination-bullet { width: 44px; height: 6px; border-radius: 0; background: rgba(255,255,255,.28); opacity: 1; margin: 0 !important; cursor: pointer; transition: background .3s, width .3s; }
.xp-pag .swiper-pagination-bullet-active { background: var(--gold); width: 72px; }
.xp-arrows { display: flex; gap: 10px; }
.xp-arrows button { display: grid; place-items: center; width: 48px; height: 48px; border-radius: 12px; border: 2px solid var(--ink); background: var(--gold); color: var(--ink); cursor: pointer; box-shadow: 0 4px 0 #B77400; transition: translate .15s, box-shadow .15s, background .2s; }
.xp-arrows button:hover { translate: 0 2px; box-shadow: 0 2px 0 #B77400; background: #fff; }
.xp-arrows button.swiper-button-disabled { opacity: .45; }

.xp-float { position: absolute; z-index: 3; display: inline-flex; align-items: center; gap: 8px; padding: 9px 14px; border-radius: 12px; background: var(--gold); color: var(--ink); border: 2px solid var(--ink); box-shadow: 4px 4px 0 var(--ink); font-family: var(--disp); font-weight: 800; font-size: .8rem; white-space: nowrap; }
.xp-float i { width: 8px; height: 8px; border-radius: 50%; background: var(--mint); box-shadow: 0 0 0 3px rgba(14,159,110,.25); }
.xp-float--a { left: 0; top: 46%; }
.xp-float--b { right: 0; bottom: 5%; background: #fff; }
@media (max-width: 575px) { .xp-float { display: none; } }

.xp-stall::after, .xp-rc::after { content: ''; position: absolute; inset: 0; border-radius: inherit; pointer-events: none; opacity: 0; transition: opacity .25s; background: radial-gradient(260px circle at var(--mx, 50%) var(--my, 50%), rgba(196,0,122,.13), transparent 62%); }
.xp-rc { position: relative; }
.xp-stall:hover::after, .xp-rc:hover::after { opacity: 1; }

.xp-bar { display: block; width: 84px; height: 7px; margin: 0 0 16px; background: repeating-linear-gradient(90deg, var(--pink) 0 12px, var(--gold) 12px 24px); transform-origin: 0 50%; }

.xp-sticky { position: fixed; left: 0; right: 0; bottom: 0; z-index: 999; display: none; gap: 10px; padding: 10px 14px calc(10px + env(safe-area-inset-bottom)); background: var(--ink); border-top: 3px solid var(--gold); translate: 0 115%; transition: translate .35s cubic-bezier(.16, 1, .3, 1); }
.xp-sticky.on { translate: 0 0; }
.xp-sticky .xp-btn { padding: 13px 16px; font-size: .9rem; }
.xp-sticky .xp-btn--ghost { flex: 0 0 auto; }
.xp-sticky .xp-btn--pink { flex: 1; width: auto; box-shadow: 0 4px 0 #7E004E; }
@media (max-width: 767px) { .xp-sticky { display: flex; } .xp-cta { padding-bottom: 96px; } }

@media (max-width: 575px) {
    .xp-rank-cards { margin: 0 -16px 28px; padding: 4px 16px 16px; }
    .xp-slider .xp-case { box-shadow: 5px 5px 0 var(--gold); }
    .xp-pag .swiper-pagination-bullet { width: 26px; }
    .xp-pag .swiper-pagination-bullet-active { width: 44px; }
}

/* ===== v5: aurora, bento, big type, cursor, glow borders ===== */
@property --xpa { syntax: '<angle>'; initial-value: 0deg; inherits: false; }
@keyframes xpSpin { to { rotate: 360deg; } }
@keyframes xpAngle { to { --xpa: 360deg; } }
@keyframes xpShine { to { background-position: 200% 0; } }
@keyframes xpRunSlow { to { transform: translateX(-33.333%); } }

.xp-aurora { position: absolute; inset: 0; overflow: hidden; pointer-events: none; }
.xp-aurora i { position: absolute; border-radius: 50%; filter: blur(80px); opacity: .5; }
.xp-aurora i:nth-child(1) { width: 440px; height: 440px; left: -8%; top: 8%; background: var(--pink); }
.xp-aurora i:nth-child(2) { width: 360px; height: 360px; right: 16%; bottom: -10%; background: var(--gold); opacity: .26; }
.xp-aurora i:nth-child(3) { width: 320px; height: 320px; left: 38%; top: -12%; background: var(--pink2); opacity: .3; }
.xp-hero::after { content: ''; position: absolute; inset: 0; pointer-events: none; opacity: .09; mix-blend-mode: overlay; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
.xp-hero .xp-ribbon, .xp-hero-grid { z-index: 2; }
.xp-hero h1 .xp-w:last-child > span { background: linear-gradient(90deg, var(--gold), #FF7BC0, var(--gold)); background-size: 200% 100%; -webkit-background-clip: text; background-clip: text; color: transparent; animation: xpShine 4s linear infinite; }
.xp-tag { backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); }

.xp-rotor { display: flex; align-items: center; flex-wrap: wrap; gap: 8px; margin: -6px 0 22px; font-size: .95rem; color: rgba(255,255,255,.75); }
.xp-rotor-win { display: inline-block; overflow: hidden; height: 1.55em; }
.xp-rotor b { display: inline-block; font-family: var(--disp); font-size: 1.05rem; color: var(--gold); }

.xp-badge-wrap::before { content: ''; position: absolute; left: 8%; right: 8%; top: 22%; bottom: 0; z-index: 0; border-radius: 50%; filter: blur(60px); opacity: .55; background: conic-gradient(from 0deg, var(--pink), var(--gold), var(--pink2), var(--pink)); animation: xpSpin 14s linear infinite; }
.xp-badge { z-index: 1; }

/* bento challenges */
.xp-board { perspective: 1200px; }
.xp-web-grid { perspective: 1400px; }
.xp-ico { display: grid; place-items: center; width: 50px; height: 50px; margin-bottom: 16px; border-radius: 12px; background: var(--blush); color: var(--pink); border: 2px solid var(--ink); box-shadow: 3px 3px 0 var(--gold); transition: rotate .3s ease, scale .3s ease; }
.xp-stall:hover .xp-ico { rotate: -8deg; scale: 1.08; }
@media (min-width: 768px) { .xp-stall--wide { grid-column: span 2; } }
@media (min-width: 992px) {
    .xp-board { grid-template-columns: repeat(6, minmax(0, 1fr)); }
    .xp-stall { grid-column: span 2; }
    .xp-stall--wide { grid-column: span 4; }
    .xp-stall--wide h3 { font-size: 1.6rem; }
}

/* big scrolling type */
.xp-bigtext { overflow: hidden; background: #fff; border-top: 3px solid var(--ink); border-bottom: 3px solid var(--ink); padding: 22px 0; }
.xp-bigtext-track { display: flex; width: max-content; align-items: center; gap: 48px; animation: xpRunSlow 60s linear infinite; }
.xp-js .xp-bigtext-track { animation: none; }
.xp-bigtext span { font-family: var(--disp); font-weight: 800; font-size: clamp(3rem, 9vw, 7.5rem); line-height: 1; letter-spacing: -.03em; text-transform: uppercase; white-space: nowrap; color: transparent; -webkit-text-stroke: 2px var(--ink); }
.xp-bigtext span:nth-child(3n+2) { color: var(--pink); -webkit-text-stroke: 0; }
.xp-bigtext span:nth-child(3n) { -webkit-text-stroke-color: var(--pink); }
.xp-bigtext span::after { content: '✦'; margin-left: 48px; font-size: .45em; vertical-align: middle; color: var(--gold); -webkit-text-fill-color: var(--gold); -webkit-text-stroke: 0; }

/* conic glow border on final CTA */
.xp-cta-card::after { content: ''; position: absolute; inset: 0; border-radius: inherit; padding: 3px; pointer-events: none; background: conic-gradient(from var(--xpa), var(--pink), var(--gold), var(--pink2), var(--pink)); -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0); -webkit-mask-composite: xor; mask: linear-gradient(#000 0 0) content-box exclude, linear-gradient(#000 0 0); animation: xpAngle 6s linear infinite; }

/* form micro-interactions */
.xp-field:focus-within label { color: var(--pink); }
.xp-submit { position: relative; overflow: hidden; }
.xp-submit::after { content: ''; position: absolute; top: 0; bottom: 0; left: -60%; width: 40%; transform: skewX(-20deg); background: linear-gradient(90deg, transparent, rgba(255,255,255,.35), transparent); animation: xpSweep 3.2s ease-in-out infinite; }
@keyframes xpSweep { 0% { left: -60%; } 55%, 100% { left: 130%; } }

/* cursor ring + confetti */
.xp-cursor { position: fixed; left: -18px; top: -18px; width: 36px; height: 36px; border-radius: 50%; border: 2px solid var(--pink); background: rgba(255,181,71,.14); pointer-events: none; z-index: 99998; opacity: 0; transition: opacity .25s, scale .25s, background .25s; scale: 1; }
.xp-cursor.on { opacity: 1; }
.xp-cursor.big { scale: 1.9; background: rgba(196,0,122,.14); }
.xp-conf { position: fixed; width: 9px; height: 14px; border-radius: 2px; z-index: 10000; pointer-events: none; }
@media (pointer: coarse) { .xp-cursor { display: none; } }
@media (prefers-reduced-motion: reduce) { .xp-aurora i, .xp-badge-wrap::before, .xp-cta-card::after, .xp-submit::after, .xp-bigtext-track, .xp-hero h1 .xp-w:last-child > span { animation: none; } }

/* ===== v6: sliding sections, ghost chapters, section rail ===== */
.xp-wrap { position: relative; z-index: 1; }
.xp-sec { position: relative; }
.xp-sec::before { content: attr(data-chap); position: absolute; top: 14px; right: 3%; z-index: 0; pointer-events: none; font: 800 clamp(6rem, 16vw, 14rem)/1 var(--disp); letter-spacing: -.05em; color: transparent; -webkit-text-stroke: 2px rgba(26,6,19,.09); }
.xp-cases::before { -webkit-text-stroke-color: rgba(255,255,255,.1); }
.xp-js .xp-sec, .xp-js .xp-cta, .xp-js .xp-bigtext { clip-path: inset(0% 100% 0% 0%); }
.xp-js .xp-sec > .xp-wrap, .xp-js .xp-cta > .xp-wrap { opacity: 0; }

.xp-rail { position: fixed; right: 18px; top: 50%; translate: 0 -50%; z-index: 900; display: none; flex-direction: column; gap: 14px; }
@media (min-width: 1280px) { .xp-rail { display: flex; } }
.xp-rail a { position: relative; display: block; width: 13px; height: 13px; border-radius: 50%; background: #fff; border: 2px solid var(--ink); box-shadow: 0 0 0 2px #fff; transition: scale .25s, background .25s; }
.xp-rail a.on { background: var(--pink); scale: 1.45; }
.xp-rail a span { position: absolute; right: 26px; top: 50%; translate: 8px -50%; opacity: 0; pointer-events: none; white-space: nowrap; background: var(--ink); color: #fff; font: 700 .72rem var(--disp); padding: 5px 10px; border-radius: 8px; transition: opacity .2s, translate .2s; }
.xp-rail a:hover span, .xp-rail a.on span { opacity: 1; translate: 0 -50%; }

/* ===== v7: cursor spotlight, button glow, awning scallops, smooth scroll ===== */
html.lenis, html.lenis body { height: auto; }
.lenis.lenis-smooth { scroll-behavior: auto !important; }
.xp-spot { position: absolute; inset: 0; z-index: 1; pointer-events: none; background: radial-gradient(420px circle at var(--hx, 70%) var(--hy, 30%), rgba(255,181,71,.17), transparent 60%); }
.xp-spot::after { content: ''; position: absolute; inset: 0; background-image: radial-gradient(rgba(255,255,255,.6) 1px, transparent 1.3px); background-size: 26px 26px; -webkit-mask-image: radial-gradient(260px circle at var(--hx, 70%) var(--hy, 30%), #000, transparent 70%); mask-image: radial-gradient(260px circle at var(--hx, 70%) var(--hy, 30%), #000, transparent 70%); }
.xp-btn--pink { background: radial-gradient(150px circle at var(--bx, 50%) var(--by, 50%), #E0398F 0, var(--pink) 72%); }
.xp-challenges::after { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 18px; z-index: 0; pointer-events: none; background: radial-gradient(circle at 18px 0, var(--gold) 17px, transparent 18px) 0 0 / 36px 18px repeat-x; }
.xp-form-side { background: radial-gradient(circle at 12% 0%, rgba(255,181,71,.42), transparent 55%), radial-gradient(circle at 100% 100%, rgba(26,6,19,.4), transparent 55%), var(--pink); }
.xp-kicker { min-width: 1ch; }

/* ===== v8: expo doors intro, typing search, bar race, ripple ===== */
@keyframes xpBlink { 50% { opacity: 0; } }
.xp-intro { position: fixed; inset: 0; z-index: 100000; display: none; }
.xp-intro-on .xp-intro { display: block; }
.xp-door { position: absolute; top: 0; bottom: 0; width: 50.5%; background: radial-gradient(rgba(255,255,255,.12) 1px, transparent 1.2px) 0 0 / 26px 26px, var(--ink); }
.xp-door.l { left: 0; border-right: 4px solid var(--gold); }
.xp-door.r { right: 0; border-left: 4px solid var(--gold); }
.xp-intro-msg { position: absolute; inset: 0; z-index: 2; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 10px; text-align: center; color: #fff; padding: 20px; }
.xp-intro-msg span { font-size: .85rem; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: var(--gold); }
.xp-intro-msg b { font-family: var(--disp); font-weight: 800; font-size: clamp(2rem, 7vw, 4.5rem); line-height: 1.05; letter-spacing: -.03em; }

.xp-search { display: flex; align-items: center; gap: 8px; margin-bottom: 14px; padding: 8px 14px; border: 2px solid var(--ink); border-radius: 999px; background: #fff; color: var(--ink); font-size: .82rem; box-shadow: 3px 3px 0 var(--gold); }
.xp-search svg { color: var(--pink); flex-shrink: 0; }
.xp-typed { flex: 1; min-width: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-weight: 600; }
.xp-caret { width: 2px; height: 1.1em; background: var(--pink); animation: xpBlink 1s steps(1) infinite; }
.xp-rank { display: inline-block; font-family: var(--disp); }

.xp-race { background: #fff; border: 2px solid var(--ink); border-radius: 20px; box-shadow: 6px 6px 0 var(--ink); padding: 24px; margin-bottom: 30px; }
.xp-race-head { display: flex; flex-wrap: wrap; align-items: baseline; justify-content: space-between; gap: 6px 14px; margin-bottom: 14px; }
.xp-race-head b { font-family: var(--disp); font-size: 1.2rem; color: var(--ink); }
.xp-race-head span { font-size: .8rem; color: var(--mute); font-weight: 600; }
.xp-race-row { display: grid; grid-template-columns: minmax(130px, 250px) minmax(0, 1fr) 52px; align-items: center; gap: 14px; margin: 12px 0; }
.xp-race-name { font-size: .88rem; font-weight: 700; color: var(--ink); }
.xp-race-track { height: 18px; border-radius: 99px; border: 2px solid var(--ink); background: var(--blush); overflow: hidden; }
.xp-race-bar { display: block; height: 100%; border-radius: 99px; transform-origin: 0 50%; background: repeating-linear-gradient(45deg, var(--pink) 0 10px, var(--pink2) 10px 20px); }
.xp-race-val { font-family: var(--disp); font-size: 1.05rem; color: var(--mint); text-align: right; }
@media (max-width: 575px) {
    .xp-race { padding: 18px 16px; box-shadow: 4px 4px 0 var(--ink); }
    .xp-race-row { grid-template-columns: minmax(0, 1fr) 48px; gap: 6px 10px; margin: 16px 0; }
    .xp-race-name { grid-column: 1 / -1; }
}

.xp-btn { position: relative; overflow: hidden; }
.xp-ripple { position: absolute; width: 12px; height: 12px; margin: -6px 0 0 -6px; border-radius: 50%; background: currentColor; opacity: .3; pointer-events: none; animation: xpRipple .65s ease-out forwards; }
@keyframes xpRipple { to { transform: scale(22); opacity: 0; } }

/* ===== v9: stamp, scroll cue, richer backgrounds, responsive hardening ===== */
.xp-stamp { position: absolute; top: 6px; right: 2%; z-index: 4; display: grid; place-items: center; width: 112px; height: 112px; border-radius: 50%; background: var(--gold); color: var(--ink); border: 2px solid var(--ink); box-shadow: 4px 4px 0 var(--ink); transition: scale .25s ease; }
.xp-stamp:hover { scale: 1.08; }
.xp-stamp svg { width: 100%; height: 100%; display: block; overflow: visible; }
.xp-stamp-ring { transform-origin: 60px 60px; animation: xpSpin2 14s linear infinite; }
.xp-stamp:hover .xp-stamp-ring { animation-duration: 4s; }
@keyframes xpSpin2 { to { transform: rotate(360deg); } }

.xp-cue { position: relative; z-index: 2; display: flex; flex-direction: column; align-items: center; gap: 8px; padding: 0 0 20px; font-size: .7rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; color: rgba(255,255,255,.6); }
.xp-cue i { position: relative; width: 22px; height: 34px; border: 2px solid rgba(255,255,255,.5); border-radius: 12px; }
.xp-cue i::after { content: ''; position: absolute; left: 50%; top: 6px; width: 4px; height: 8px; margin-left: -2px; border-radius: 2px; background: var(--gold); animation: xpWheel 1.6s ease-in-out infinite; }
@keyframes xpWheel { 0% { translate: 0 0; opacity: 1; } 70% { translate: 0 12px; opacity: 0; } 100% { opacity: 0; } }

.xp-challenges { background-image: radial-gradient(rgba(26,6,19,.07) 1px, transparent 1.2px); background-size: 24px 24px; }
.xp-cases { background: radial-gradient(50% 60% at 92% 0%, rgba(196,0,122,.38), transparent 70%), radial-gradient(40% 50% at 0% 100%, rgba(255,181,71,.14), transparent 70%), var(--ink); }
.xp-form-sec { background: radial-gradient(40% 50% at 100% 0%, rgba(255,181,71,.28), transparent 70%), var(--blush); }

@media (min-width: 1440px) { .xp-wrap { max-width: 1320px; } }
@media (min-width: 576px) and (max-width: 991px) {
    .xp-hero h1 { font-size: clamp(2.6rem, 7vw, 3.5rem); }
    .xp-stamp { width: 96px; height: 96px; }
    .xp-board { gap: 16px; }
}
@media (max-width: 767px) {
    .xp-cue { display: none; }
    .xp-aurora i { filter: blur(48px); }
    .xp-badge-wrap::before { animation: none; filter: blur(40px); }
    .xp-hero::after { display: none; }
    .xp-sec::before { top: 6px; right: 2%; font-size: clamp(5rem, 24vw, 8rem); }
}
@media (max-width: 575px) {
    .xp-stamp { width: 78px; height: 78px; top: 0; right: 0; box-shadow: 3px 3px 0 var(--ink); }
    .xp-btn { min-height: 48px; }
    .xp-head h2 { overflow-wrap: break-word; }
    .xp-bigtext { padding: 14px 0; }
}
@media (hover: none) {
    .xp-stall:hover, .xp-rc:hover, .xp-btn--pink:hover, .xp-stat:hover, .xp-stamp:hover { translate: none; scale: 1; }
    .xp-stall:hover { box-shadow: 6px 6px 0 var(--ink); }
    .xp-rc:hover { box-shadow: none; }
}
@media (max-height: 520px) and (orientation: landscape) {
    .xp-sticky { display: none; }
    .xp-hero { padding-top: 32px; }
}
@media (prefers-reduced-motion: reduce) { .xp-stamp-ring, .xp-cue i::after { animation: none; } }

/* ===== v10: ribbon + big-type divider rebuilt (no outline artifacts, fully responsive) ===== */
.xp-ribbon span b { display: inline-block; margin-right: 8px; padding: 2px 11px; border-radius: 8px; background: var(--ink); color: var(--gold); font-size: 1em; }
.xp-ribbon:hover .xp-ribbon-track { animation-play-state: paused; }
.xp-ribbon::before, .xp-ribbon::after { content: ''; position: absolute; top: 0; bottom: 0; width: 70px; z-index: 2; pointer-events: none; }
.xp-ribbon::before { left: 0; background: linear-gradient(90deg, var(--gold), transparent); }
.xp-ribbon::after { right: 0; background: linear-gradient(270deg, var(--gold), transparent); }

.xp-bigtext { display: grid; gap: 14px; padding: 28px 0 24px; }
.xp-bigtext span { -webkit-text-stroke: 0; color: var(--ink); }
.xp-bigtext span:nth-child(3n+2) { background: linear-gradient(90deg, var(--pink), #FF7BC0 55%, var(--gold)); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: transparent; }
.xp-bigtext span:nth-child(3n) { background: repeating-linear-gradient(135deg, var(--pink) 0 6px, var(--ink) 6px 12px); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: transparent; }
.xp-bigtext span::after { -webkit-text-fill-color: var(--gold); color: var(--gold); }

.xp-bigtext-track--b { gap: 16px; }
.xp-bigtext-track--b span { font-size: clamp(1.15rem, 2.6vw, 2rem); letter-spacing: 0; padding: 10px 24px; border: 2px solid var(--ink); border-radius: 999px; background: var(--gold); -webkit-background-clip: border-box; background-clip: border-box; color: var(--ink); -webkit-text-fill-color: var(--ink); box-shadow: 3px 3px 0 var(--ink); }
.xp-bigtext-track--b span:nth-child(even) { background: var(--pink); color: #fff; -webkit-text-fill-color: #fff; }
.xp-bigtext-track--b span:nth-child(3n) { background: #fff; color: var(--ink); -webkit-text-fill-color: var(--ink); }
.xp-bigtext-track--b span::after { display: none; }

@media (max-width: 767px) {
    .xp-ribbon span { font-size: .9rem; padding: 12px 20px; }
    .xp-ribbon span::after { margin-left: 36px; }
    .xp-ribbon::before, .xp-ribbon::after { width: 36px; }
    .xp-challenges::after { height: 14px; background: radial-gradient(circle at 14px 0, var(--gold) 13px, transparent 14px) 0 0 / 28px 14px repeat-x; }
    .xp-bigtext { gap: 10px; padding: 18px 0 16px; }
    .xp-bigtext-track { gap: 28px; }
    .xp-bigtext span { font-size: clamp(2.4rem, 13vw, 3.6rem); }
    .xp-bigtext span::after { margin-left: 28px; }
    .xp-bigtext-track--b { gap: 10px; }
    .xp-bigtext-track--b span { font-size: .95rem; padding: 8px 16px; box-shadow: 2px 2px 0 var(--ink); }
}
</style>

<main class="xp">
<script>(function (s) {
    s.parentElement.classList.add('xp-js');
    try {
        var calm = matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (!calm && !sessionStorage.getItem('xpSeen')) {
            document.documentElement.classList.add('xp-intro-on');
            setTimeout(function () { document.documentElement.classList.remove('xp-intro-on'); }, 4500); /* failsafe */
        }
    } catch (e) {}
})(document.currentScript);</script>
<div class="xp-intro" id="xpIntro" aria-hidden="true">
    <div class="xp-door l"></div><div class="xp-door r"></div>
    <div class="xp-intro-msg"><span>WebTecMart presents</span><b>B2B Exhibition SEO</b></div>
</div>
<div class="xp-progress" aria-hidden="true"></div>

    <!-- 1. HERO -->
    <section class="xp-hero">
        <div class="xp-orb" aria-hidden="true"></div>
        <div class="xp-aurora" aria-hidden="true"><i></i><i></i><i></i></div>
        <div class="xp-wrap">
            <div class="xp-hero-grid">
                <div>
                    <div class="xp-tag"><i></i><span>India's #1 event &amp; exhibition SEO specialists</span></div>
                    <div class="xp-rotor"><span>We help you rank for</span><span class="xp-rotor-win"><b>trade buyers</b></span></div>
                    <h1>Boost Your Event &amp; Exhibition With SEO.</h1>
                    <h3 class="xp-hero-sub">Want to attract more attendees, sponsors, exhibitors, and increase revenue?</h3>
                    <p class="xp-hero-desc"><?= htmlspecialchars($heroDesc) ?></p>
                    <div class="xp-actions">
                        <a href="#event-audit-form" class="xp-btn xp-btn--pink"><span>Let's Talk Optimization</span><?= $arrow ?></a>
                        <a href="tel:+919999674255" class="xp-btn xp-btn--ghost"><?= $phone ?><span>Call: +91-9999674255</span></a>
                    </div>
                    <p class="xp-note">* While results can't be guaranteed, events and trade exhibitions are uniquely positioned to perform exceptionally well with effective search engine optimization.</p>
                </div>

                <div class="xp-badge-wrap" data-wtm-reveal="fade-up">
                    <div class="xp-lanyard"></div>
                    <div class="xp-float xp-float--a"><i></i>Event schema live</div>
                    <div class="xp-float xp-float--b">80+ top 3 worldwide</div>
                    <a class="xp-stamp" href="#event-audit-form" aria-label="Get a free event SEO audit">
                        <svg viewBox="0 0 120 120" aria-hidden="true">
                            <defs><path id="xpCirc" d="M60,60 m-44,0 a44,44 0 1,1 88,0 a44,44 0 1,1 -88,0"/></defs>
                            <g class="xp-stamp-ring"><text font-size="9.5" font-weight="800" fill="currentColor" letter-spacing=".4"><textPath href="#xpCirc" textLength="268" lengthAdjust="spacing">FREE EVENT SEO AUDIT • FREE EVENT SEO AUDIT • </textPath></text></g>
                            <circle cx="60" cy="60" r="22" fill="#1A0613"/>
                            <path d="M52 68 68 52M54 52h14v14" fill="none" stroke="#FFB547" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <div class="xp-badge">
                        <div class="xp-search"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg><span class="xp-typed">bharat tex fair 2026</span><i class="xp-caret"></i></div>
                        <div class="xp-badge-top">
                            <div class="xp-live"><i></i><b class="xp-rank">#1</b>&nbsp;Google Search Result</div>
                            <small>Google Event Schema</small>
                        </div>
                        <div class="xp-serp-url"><b>https://www.your-expo-domain.com</b> &rsaquo; register</div>
                        <div class="xp-serp-title">Bharat Tex Fair 2026 | Global Textile Mega Exhibition &amp; B2B Expo</div>
                        <div class="xp-serp-desc">Pre-register as international trade buyer or book exhibitor stall. 3,500+ global exhibitors, 100+ buyer delegations from USA, UK, Europe, UAE.</div>
                        <div class="xp-pass">
                            <div><strong>Dates:</strong> Feb 14 &ndash; Feb 17, 2026</div>
                            <div><strong>Venue:</strong> Bharat Mandapam &amp; Yashobhoomi, New Delhi</div>
                            <div><strong>Registration:</strong> Visitor Badges Open &bull; Zero Booking Fee</div>
                        </div>
                        <div class="xp-chips">
                            <div class="xp-chip"><b>400%</b><span>Organic Growth</span></div>
                            <div class="xp-chip"><b>200+</b><span>Top 3 Ranks</span></div>
                            <div class="xp-chip"><b>10k+</b><span>Pre-Registrations</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="xp-cue" aria-hidden="true"><span>Scroll</span><i></i></div>

        <div class="xp-ribbon" aria-hidden="true">
            <div class="xp-ribbon-track">
                <?php for ($i = 0; $i < 4; $i++): ?>
                    <span><b>400%</b> organic growth</span><span><b>200+</b> keywords ranked</span><span><b>80+</b> top 3 worldwide</span><span><b>10,000+</b> buyer registrations</span>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- 2. CHALLENGES -->
    <section class="xp-sec xp-challenges">
        <div class="xp-wrap">
            <div class="xp-head">
                <span class="xp-kicker">Event organiser challenges</span>
                <h2>Challenges Faced by B2B Exhibition Organisers</h2>
                <p>Turning event websites into powerful organic growth platforms.</p>
            </div>
            <div class="xp-board">
                <?php
                $cIcons = [
                    '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
                    '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>',
                    '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>',
                    '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>',
                ];
                foreach ($challenges as $ci => $c): ?>
                    <article class="xp-stall<?= ($ci === 0 || $ci === 3) ? ' xp-stall--wide' : '' ?>">
                        <span class="xp-ico"><?= isset($cIcons[$ci]) ? $cIcons[$ci] : '' ?></span>
                        <h3><?= htmlspecialchars($c[0]) ?></h3>
                        <p><?= htmlspecialchars($c[1]) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 3. EVENT WEBSITE DESIGN -->
    <section class="xp-sec">
        <div class="xp-wrap">
            <div class="xp-web-grid">
                <div class="xp-web-copy">
                    <span class="xp-kicker">Event website design &amp; SEO</span>
                    <h2>Event Websites That Perform.</h2>
                    <h3>Designing &amp; Developing Event Websites That Drive Organic Growth.</h3>
                    <p>Your event website should do more than look impressive. It should attract the right audience, rank on search engines and convert visitors into registrations.</p>
                    <p>At WEBTECMART, we specialise in designing and developing high-performance websites for B2B trade fairs, exhibitions and international business events, with a strong focus on organic SEO.</p>
                    <p>We combine event-specific website development with strategic SEO to help organisers improve Google visibility, attract international buyers, exhibitors and visitors, and generate quality registrations through organic search.</p>
                    <div class="xp-actions">
                        <a href="/event-website-demo.php" class="xp-btn xp-btn--pink"><span>Request a demo</span><?= $arrow ?></a>
                        <a href="/portfolio.php" class="xp-btn xp-btn--line"><span>View Portfolio</span></a>
                    </div>
                </div>

                <div class="xp-browser" aria-hidden="true">
                    <div class="xp-browser-bar">
                        <div class="xp-dots"><span></span><span></span><span></span></div>
                        <div class="xp-url">webtecmart.com/b2b-exhibition-seo.php</div>
                    </div>
                    <div class="xp-screen">
                        <div class="xp-screen-nav">
                            <b>Canvas</b>
                            <em>Home &nbsp; About &nbsp; Exhibit &nbsp; Visit</em>
                            <span>Book Tickets</span>
                        </div>
                        <div class="xp-screen-body">
                            <div>
                                <small>1 - 3 SEPTEMBER | LONDON</small>
                                <h4>Artistry<br>Unveiled</h4>
                                <p>Discover ideas, people and possibilities shaping the future.</p>
                                <i>Explore the event</i>
                            </div>
                            <div class="xp-art"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DIVIDER: scroll-driven marquee (2 rows, opposite directions) -->
    <div class="xp-bigtext" aria-hidden="true">
        <div class="xp-bigtext-track">
            <?php for ($i = 0; $i < 3; $i++): ?>
                <span>Buyers</span><span>Exhibitors</span><span>Visitors</span><span>Sponsors</span><span>Registrations</span>
            <?php endfor; ?>
        </div>
        <div class="xp-bigtext-track xp-bigtext-track--b">
            <?php for ($i = 0; $i < 4; $i++): ?>
                <span>Event websites</span><span>Exhibition SEO</span><span>Trade fairs</span><span>Global buyers</span>
            <?php endfor; ?>
        </div>
    </div>

    <!-- 4. CASE STUDIES -->
    <section class="xp-sec xp-cases">
        <div class="xp-wrap">
            <div class="xp-head xp-head--dark">
                <span class="xp-kicker" style="color:var(--gold);border-color:var(--gold)">Verified proof of performance</span>
                <h2>The Organic Engine Behind India's Mega Fairs</h2>
                <p>Authentic results delivered for government-backed exhibitions and export promotion councils.</p>
            </div>

            <div class="xp-slider">
                <div class="swiper" id="xpCaseSwiper">
                    <div class="swiper-wrapper">
<div class="swiper-slide">
<div class="xp-case">
                <div class="xp-case-text">
                    <span class="xp-case-org">Ministry of Textiles, Government of India</span>
                    <h3>Bharat Tex Fair 2026 &mdash; 400% Organic Traffic Surge</h3>
                    <p>Positioned India's flagship international textile mega-expo at the very top of Google searches across 100+ countries. Engineered product-silo architectures for yarns, apparel machinery, home textiles, and technical textiles, capturing verified overseas buyer delegations and institutional registrations.</p>
                    <a href="#event-audit-form" class="xp-btn xp-btn--pink xp-btn--sm"><span>Request Similar Growth Plan</span><?= $arrow ?></a>
                </div>
                <div class="xp-stats">
                    <div class="xp-stat"><b>400%</b><span>Organic Growth Lift</span></div>
                    <div class="xp-stat"><b>200+</b><span>Keywords Ranked</span></div>
                    <div class="xp-stat"><b>80+</b><span>Top 3 Worldwide</span></div>
                    <div class="xp-stat"><b>10,000+</b><span>Buyer Registrations</span></div>
                </div>
            </div>
</div>
<div class="swiper-slide">
<div class="xp-case">
                <div class="xp-case-text">
                    <span class="xp-case-org">Export Promotion Council for Handicrafts (EPCH)</span>
                    <h3>IHGF Delhi Autumn Fair &mdash; Global Sourcing Dominance</h3>
                    <p>Targeted international procurement queries for handicraft exporters, home decor, lifestyle, and fashion accessories across the US, UK, Germany, France, and the Middle East. Secured top 3 global positions, driving high-volume pre-show registrations for visiting foreign buyer delegations.</p>
                    <a href="#event-audit-form" class="xp-btn xp-btn--pink xp-btn--sm"><span>Request Similar Growth Plan</span><?= $arrow ?></a>
                </div>
                <div class="xp-stats">
                    <div class="xp-stat"><b>Top 3</b><span>Global SERP Rank</span></div>
                    <div class="xp-stat"><b>100+</b><span>Countries Targeted</span></div>
                    <div class="xp-stat"><b>3x</b><span>Pre-Fair Sourcing Leads</span></div>
                    <div class="xp-stat"><b>100%</b><span>White-Hat Strategy</span></div>
                </div>
            </div>
</div>
<div class="swiper-slide">
<div class="xp-case">
    <div class="xp-case-text">
        <span class="xp-case-org">B2B Industrial</span>
        <h3>Premier Logistics &mdash; High-Intent Industrial Keywords</h3>
        <p>Organic search programme for an industrial B2B brand, focused on high-intent commercial queries. The domain now ranks for 1.3K+ keywords, with 140+ high-intent keywords holding top 10 positions.</p>
        <a href="#event-audit-form" class="xp-btn xp-btn--pink xp-btn--sm"><span>Request Similar Growth Plan</span><?= $arrow ?></a>
    </div>
    <div class="xp-stats">
        <div class="xp-stat"><b>1.3K+</b><span>Keywords Ranked</span></div>
        <div class="xp-stat"><b>68.2K+</b><span>Monthly Traffic</span></div>
        <div class="xp-stat"><b>140+</b><span>Top 10 Keywords</span></div>
        <div class="xp-stat"><b>$12.5K</b><span>Traffic Value</span></div>
    </div>
</div>
</div>
                    </div>
                </div>
                <div class="xp-slider-nav">
                    <div class="xp-pag"></div>
                    <div class="xp-arrows">
                        <button type="button" class="xp-prev" aria-label="Previous case study"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg></button>
                        <button type="button" class="xp-next" aria-label="Next case study"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4B. LIVE RANKINGS -->
    <section class="xp-sec">
        <div class="xp-wrap">
            <div class="xp-head">
                <span class="xp-kicker">Live Google rankings proof</span>
                <h2>Organic Rankings That Drive Real Inbound Revenue</h2>
                <p>Inspect our authentic live ranking metrics verified across enterprise brands, global trade fairs, and B2B exporters.</p>
            </div>

            <div class="xp-rank-cards">
                <?php foreach ($ranks as $r): ?>
                    <div class="xp-rc">
                        <div class="xp-rc-head"><b><?= $r[0] ?></b><span><?= $r[1] ?></span></div>
                        <div class="xp-rc-metrics">
                            <div><b><?= $r[2] ?></b><span>Keywords</span></div>
                            <div><b><?= $r[3] ?></b><span>Traffic/Mo</span></div>
                            <div><b><?= $r[4] ?></b><span>Traffic Cost</span></div>
                        </div>
                        <div class="xp-rc-foot"><?= $r[5] ?><b><?= $r[6] ?></b></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php
            $sorted = $keywords;
            // PHP 7.3 and older compatible (static fn needs 7.4+)
            usort($sorted, function ($a, $b) {
                return (int) $b[2] - (int) $a[2];
            });
            $maxGain = max(1, (int) $sorted[0][2]);
            ?>
            <div class="xp-race">
                <div class="xp-race-head"><b>Positions gained</b><span>Rank movement per keyword</span></div>
                <?php foreach ($sorted as $k): $v = (int) $k[2]; ?>
                    <div class="xp-race-row">
                        <span class="xp-race-name"><?= $k[0] ?></span>
                        <div class="xp-race-track"><i class="xp-race-bar" style="width: <?= round($v / $maxGain * 100) ?>%"></i></div>
                        <b class="xp-race-val">+<?= $v ?></b>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="xp-table-wrap">
                <table class="xp-table">
                    <thead>
                        <tr>
                            <th>Target Search Keyword</th>
                            <th>Ranking URL</th>
                            <th class="xp-center">Google Rank</th>
                            <th>Rank Movement</th>
                            <th>Monthly Searches</th>
                            <th>Search Intent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($keywords as $k): ?>
                            <tr>
                                <td data-label="Keyword"><strong><?= $k[0] ?></strong></td>
                                <td class="xp-url-cell" data-label="Ranking URL"><?= $k[1] ?></td>
                                <td class="xp-center" data-label="Google Rank"><span class="xp-medal">#1</span></td>
                                <td data-label="Movement"><span class="xp-up">↑ <?= $k[2] ?> Positions</span></td>
                                <td data-label="Searches"><?= $k[3] ?></td>
                                <td data-label="Intent"><span class="xp-intent"><?= $k[4] ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="xp-center">
                <a href="tel:+919999674255" class="xp-btn xp-btn--pink"><?= $phone ?><span>Call Our SEO Specialists (+91-9999674255)</span></a>
            </div>
        </div>
    </section>

    <!-- 5. AUDIT FORM -->
    <section class="xp-sec xp-form-sec" id="event-audit-form">
        <div class="xp-wrap">
            <div class="xp-form-card">
                <div class="xp-form-side">
                    <span class="xp-kicker" style="color:#fff;border-color:var(--gold)">Complimentary event audit</span>
                    <h3>Let's Talk Event &amp; Exhibition Optimization</h3>
                    <p>Share your upcoming trade fair or B2B event details for a tailored organic footfall roadmap.</p>
                    <ul>
                        <li>Custom organic footfall blueprint</li>
                        <li>Reviewed by senior exhibition SEO strategists</li>
                        <li>Reply within 24 hours</li>
                    </ul>
                </div>

                <div class="xp-form-main">
                    <form id="evAuditForm" onsubmit="handleEvFormSubmit(event)">
                        <div class="xp-fields">
                            <div class="xp-field">
                                <label for="evEventName">Event / Fair Name *</label>
                                <input type="text" id="evEventName" name="event_name" placeholder="e.g. India Auto Expo 2026" required>
                            </div>
                            <div class="xp-field">
                                <label for="evWebsite">Event Website URL *</label>
                                <input type="url" id="evWebsite" name="website" placeholder="https://www.yourexpo.com" required>
                            </div>
                            <div class="xp-field">
                                <label for="evDates">Event Dates &amp; Venue *</label>
                                <input type="text" id="evDates" name="dates_venue" placeholder="e.g. Oct 15-18 &bull; Pragati Maidan / Yashobhoomi" required>
                            </div>
                            <div class="xp-field">
                                <label for="evGoal">Primary SEO Objective *</label>
                                <select id="evGoal" name="goal" required>
                                    <option value="Pre-Register Trade Visitors & Attendees">Pre-Register Trade Visitors &amp; Attendees</option>
                                    <option value="Sell Out Exhibitor Stalls & Booths">Sell Out Exhibitor Stalls &amp; Booths</option>
                                    <option value="Attract International Sourcing Delegations">Attract International Sourcing Delegations</option>
                                    <option value="Full Event Lifecycle SEO (All of the Above)">Full Event Lifecycle SEO (All of the Above)</option>
                                </select>
                            </div>
                            <div class="xp-field">
                                <label for="evContactName">Contact Person Name *</label>
                                <input type="text" id="evContactName" name="name" placeholder="Your Full Name" required>
                            </div>
                            <div class="xp-field">
                                <label for="evContactPhone">Phone Number / WhatsApp *</label>
                                <input type="tel" id="evContactPhone" name="phone" placeholder="+91 99996 74255" required>
                            </div>
                        </div>

                        <div class="xp-field xp-field--full">
                            <label for="evContactEmail">Official Email Address *</label>
                            <input type="email" id="evContactEmail" name="email" placeholder="organizer@yourexpo.com" required>
                        </div>

                        <div class="xp-field xp-field--full">
                            <label for="evMessage">Tell Us About Your Event &amp; Target Audience</label>
                            <textarea id="evMessage" name="message" rows="3" placeholder="Target countries, expected exhibitor count, current challenges with visitor registrations..."></textarea>
                        </div>

                        <button type="submit" class="xp-btn xp-btn--pink xp-submit" id="evSubmitBtn">
                            <span>Claim Your Free Event SEO Growth Blueprint</span><?= $arrow ?>
                        </button>

                        <div class="ev-form-feedback" id="evFeedback">
                            Thank you! Your event details have been submitted. Our Senior Exhibition SEO Strategists will review your site and contact you within 24 hours with a custom blueprint.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. FAQ -->
    <section class="xp-sec">
        <div class="xp-wrap">
            <div class="xp-faq-grid">
                <div class="xp-head">
                    <span class="xp-kicker">Common queries</span>
                    <h2>Frequently Asked Questions</h2>
                    <p>Answers to key questions asked by trade show organizers and international B2B exhibitors.</p>
                </div>
                <div>
                    <?php foreach ($faqs as $i => $f): ?>
                        <div class="ev-faq-item<?= $i === 0 ? ' active' : '' ?>">
                            <button class="ev-faq-btn" onclick="toggleEvFaq(this)">
                                <span><?= htmlspecialchars($f[0]) ?></span>
                                <span class="icon">+</span>
                            </button>
                            <div class="ev-faq-answer"><?= htmlspecialchars($f[1]) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. CTA -->
    <section class="xp-cta">
        <div class="xp-wrap">
            <div class="xp-cta-card">
                <h2>Ready to Pack Your Exhibition Halls with High-Intent Trade Buyers?</h2>
                <p>Speak with our senior event SEO specialists today for a complimentary audit and custom organic footfall blueprint for your upcoming fair.</p>
                <div class="xp-actions">
                    <a href="#event-audit-form" class="xp-btn xp-btn--pink"><span>Let's Talk Optimization</span><?= $arrow ?></a>
                    <a href="tel:+919999674255" class="xp-btn xp-btn--ghost"><?= $phone ?><span>Call: +91-9999674255</span></a>
                </div>
                <div class="xp-cta-foot">Free Event Strategy Consultation &bull; Zero Obligation &bull; Tailored For Organizers &amp; Exhibitors</div>
            </div>
        </div>
    </section>

    <div class="xp-sticky" id="xpSticky">
        <a href="tel:+919999674255" class="xp-btn xp-btn--ghost"><?= $phone ?><span>Call</span></a>
        <a href="#event-audit-form" class="xp-btn xp-btn--pink"><span>Free SEO audit</span><?= $arrow ?></a>
    </div>

</main>

<script>
    function toggleEvFaq(btn) {
        const item = btn.closest('.ev-faq-item');
        if (!item) return;
        const isActive = item.classList.contains('active');
        document.querySelectorAll('.ev-faq-item').forEach(el => el.classList.remove('active'));
        if (!isActive) {
            item.classList.add('active');
            if (window.Motion) {
                Motion.animate(item.querySelector('.ev-faq-answer'), { opacity: [0, 1], y: [-10, 0] }, { duration: 0.35, ease: 'easeOut' });
            }
        }
    }

    function handleEvFormSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('evAuditForm');
        const btn  = document.getElementById('evSubmitBtn');
        const fb   = document.getElementById('evFeedback');

        const formData = new FormData(form);
        // Compose full service message
        const msg = "EVENT AUDIT REQUEST:\n" +
            "Event: " + (form.event_name.value || '') + "\n" +
            "Website: " + (form.website.value || '') + "\n" +
            "Dates/Venue: " + (form.dates_venue.value || '') + "\n" +
            "Goal: " + (form.goal.value || '') + "\n" +
            "Notes: " + (form.message.value || '');

        formData.set('service', 'B2B & Exhibition SEO Services');
        formData.set('message', msg);
        formData.set('ajax', '1');

        btn.disabled = true;
        btn.querySelector('span').innerText = 'Submitting Your Request...';

        fetch('/contact.php', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            fb.classList.remove('error');
            fb.classList.add('success');
            fb.innerText = "Thank you! Your event details have been submitted. Our Senior Exhibition SEO Strategists will review your site and contact you within 24 hours with a custom blueprint.";
            fb.style.display = 'block';
            form.reset();
            if (window.xpConfetti) xpConfetti(btn);
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Claim Your Free Event SEO Growth Blueprint';
        })
        .catch(() => {
            fb.classList.remove('error');
            fb.classList.add('success');
            fb.innerText = "Thank you! Your event details have been submitted. Our Senior Exhibition SEO Strategists will contact you shortly.";
            fb.style.display = 'block';
            form.reset();
            if (window.xpConfetti) xpConfetti(btn);
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Claim Your Free Event SEO Growth Blueprint';
        });
    }
</script>

<script>
(function () {
    /* confetti burst (Web Animations API, no library needed) */
    window.xpConfetti = function (el) {
        var r = el.getBoundingClientRect(), cx = r.left + r.width / 2, cy = r.top + r.height / 2, cols = ['#C4007A', '#FFB547', '#E0398F', '#1A0613', '#0E9F6E'];
        for (var i = 0; i < 40; i++) {
            var d = document.createElement('i');
            d.className = 'xp-conf';
            d.style.left = cx + 'px'; d.style.top = cy + 'px'; d.style.background = cols[i % cols.length];
            document.body.appendChild(d);
            var a = Math.random() * Math.PI * 2, v = 120 + Math.random() * 240;
            var anim = d.animate([
                { transform: 'translate(0,0) rotate(0deg)', opacity: 1 },
                { transform: 'translate(' + Math.cos(a) * v + 'px,' + (Math.sin(a) * v + 150) + 'px) rotate(' + Math.random() * 720 + 'deg)', opacity: 0 }
            ], { duration: 1100 + Math.random() * 700, easing: 'cubic-bezier(.2,.7,.3,1)' });
            anim.onfinish = (function (n) { return function () { n.remove(); }; })(d);
        }
    };

    /* cursor ring (desktop pointers only) */
    var fine = window.matchMedia('(pointer: fine)').matches, calm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (fine && !calm) {
        var ring = document.createElement('div');
        ring.className = 'xp-cursor';
        ring.setAttribute('aria-hidden', 'true');
        document.body.appendChild(ring);
        var tx = -100, ty = -100, x = tx, y = ty;
        window.addEventListener('pointermove', function (e) {
            tx = e.clientX; ty = e.clientY;
            var inside = e.target.closest && e.target.closest('main.xp');
            ring.classList.toggle('on', !!inside);
            ring.classList.toggle('big', !!(inside && e.target.closest('a,button,.xp-stall,.xp-rc,input,select,textarea,.swiper,.xp-browser')));
        }, { passive: true });
        (function loop() { x += (tx - x) * 0.18; y += (ty - y) * 0.18; ring.style.transform = 'translate3d(' + x + 'px,' + y + 'px,0)'; requestAnimationFrame(loop); })();
    }
})();
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11.1.14/swiper-bundle.min.js"></script>
<script>
(function () {
    /* case-study slider */
    if (window.Swiper && document.getElementById('xpCaseSwiper')) {
        new Swiper('#xpCaseSwiper', {
            slidesPerView: 1, spaceBetween: 0, speed: 800, rewind: true, grabCursor: true,
            effect: 'creative', creativeEffect: { prev: { shadow: false, translate: ['-25%', 0, -1], opacity: 0 }, next: { translate: ['100%', 0, 0] } },
            autoplay: { delay: 6500, disableOnInteraction: false, pauseOnMouseEnter: true },
            keyboard: { enabled: true },
            navigation: { nextEl: '.xp-next', prevEl: '.xp-prev' },
            pagination: { el: '.xp-pag', clickable: true },
            on: {
                slideChangeTransitionStart: function (sw) {
                    if (!window.Motion) return;
                    var st = sw.slides[sw.activeIndex].querySelectorAll('.xp-stat');
                    Motion.animate(st, { opacity: [0, 1], y: [22, 0], scale: [0.94, 1] }, { delay: Motion.stagger(0.07), type: 'spring', stiffness: 160, damping: 15 });
                }
            }
        });
    }

    /* sticky mobile CTA: shows after hero, hides while the form is on screen */
    var sticky = document.getElementById('xpSticky'), hero = document.querySelector('.xp-hero'), form = document.getElementById('event-audit-form');
    if (sticky && hero && 'IntersectionObserver' in window) {
        var heroOut = false, formIn = false, ctaIn = false;
        var upd = function () { sticky.classList.toggle('on', heroOut && !formIn && !ctaIn); };
        new IntersectionObserver(function (e) { heroOut = !e[0].isIntersecting; upd(); }).observe(hero);
        if (form) new IntersectionObserver(function (e) { formIn = e[0].isIntersecting; upd(); }, { threshold: 0.15 }).observe(form);
        var ctaEl = document.querySelector('.xp-cta');
        if (ctaEl) new IntersectionObserver(function (e) { ctaIn = e[0].isIntersecting; upd(); }, { threshold: 0.2 }).observe(ctaEl);
    }

    /* cursor spotlight on cards */
    document.querySelectorAll('.xp-stall, .xp-rc').forEach(function (c) {
        c.addEventListener('pointermove', function (e) {
            var r = c.getBoundingClientRect();
            c.style.setProperty('--mx', (e.clientX - r.left) + 'px');
            c.style.setProperty('--my', (e.clientY - r.top) + 'px');
        });
    });
})();
</script>

<script src="https://cdn.jsdelivr.net/npm/lenis@1.1.18/dist/lenis.min.js"></script>
<script>
(function () {
    var root = document.querySelector('main.xp');
    if (!root) return;
    var fine = window.matchMedia('(pointer: fine)').matches, calm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* hero spotlight: dot grid lights up around the cursor */
    var hero = root.querySelector('.xp-hero');
    if (hero && fine && !calm) {
        var spot = document.createElement('div');
        spot.className = 'xp-spot';
        spot.setAttribute('aria-hidden', 'true');
        var au = hero.querySelector('.xp-aurora');
        (au || hero.firstElementChild).insertAdjacentElement('afterend', spot);
        hero.addEventListener('pointermove', function (e) {
            var r = hero.getBoundingClientRect();
            spot.style.setProperty('--hx', (e.clientX - r.left) + 'px');
            spot.style.setProperty('--hy', (e.clientY - r.top) + 'px');
        });
    }

    /* pink buttons: light follows the pointer */
    root.querySelectorAll('.xp-btn--pink').forEach(function (b) {
        b.addEventListener('pointermove', function (e) {
            var r = b.getBoundingClientRect();
            b.style.setProperty('--bx', (e.clientX - r.left) + 'px');
            b.style.setProperty('--by', (e.clientY - r.top) + 'px');
        });
    });

    /* tactile click ripple */
    root.addEventListener('click', function (e) {
        var b = e.target.closest && e.target.closest('.xp-btn');
        if (!b) return;
        var r = b.getBoundingClientRect(), d = document.createElement('i');
        d.className = 'xp-ripple';
        d.style.left = (e.clientX - r.left) + 'px';
        d.style.top = (e.clientY - r.top) + 'px';
        b.appendChild(d);
        setTimeout(function () { d.remove(); }, 700);
    });

    /* inertia smooth scroll (desktop only) */
    if (window.Lenis && fine && !calm) {
        var lenis = new Lenis({ duration: 1.1, smoothWheel: true });
        window.xpLenis = lenis;
        (function raf(t) { lenis.raf(t); requestAnimationFrame(raf); })(performance.now());
        document.addEventListener('click', function (e) {
            var a = e.target.closest && e.target.closest('a[href^="#"]');
            if (!a || a.getAttribute('href') === '#') return;
            var t = null;
            try { t = document.querySelector(a.getAttribute('href')); } catch (err) { return; }
            if (t) { e.preventDefault(); lenis.scrollTo(t, { offset: -10 }); }
        });
    }
})();
</script>

<script>
(function () {
    var root = document.querySelector('main.xp');
    if (!root) return;
    root.querySelectorAll('section.xp-sec').forEach(function (sec, i) { sec.setAttribute('data-chap', String(i + 1).padStart(2, '0')); });
    var map = [['.xp-hero', 'Start'], ['.xp-challenges', 'Challenges'], ['.xp-web-grid', 'Websites'], ['.xp-cases', 'Results'], ['.xp-rank-cards', 'Rankings'], ['#event-audit-form', 'Audit'], ['.xp-faq-grid', 'FAQ']];
    var rail = document.createElement('nav');
    rail.className = 'xp-rail';
    rail.setAttribute('aria-label', 'Page sections');
    var items = [];
    map.forEach(function (m) {
        var el = root.querySelector(m[0]);
        var sec = el && (el.tagName === 'SECTION' ? el : el.closest('section'));
        if (!sec) return;
        var a = document.createElement('a');
        a.href = '#'; a.setAttribute('aria-label', m[1]);
        a.innerHTML = '<span>' + m[1] + '</span>';
        a.addEventListener('click', function (e) { e.preventDefault(); if (window.xpLenis) window.xpLenis.scrollTo(sec); else sec.scrollIntoView({ behavior: 'smooth', block: 'start' }); });
        rail.appendChild(a);
        items.push({ a: a, sec: sec });
    });
    root.appendChild(rail);
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (!en.isIntersecting) return;
                items.forEach(function (it) { it.a.classList.toggle('on', it.sec === en.target); });
            });
        }, { rootMargin: '-45% 0px -45% 0px' });
        items.forEach(function (it) { io.observe(it.sec); });
    }
})();
</script>

<script src="https://cdn.jsdelivr.net/npm/motion@11.18.2/dist/motion.js"></script>
<script>
(function () {
    var root = document.querySelector('main.xp');
    if (!root) return;
    var M = window.Motion;
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (!M || reduce) { root.classList.remove('xp-js'); document.documentElement.classList.remove('xp-intro-on'); return; }
    var animate = M.animate, inView = M.inView, scroll = M.scroll, stagger = M.stagger;
    var spring = { type: 'spring', stiffness: 110, damping: 16 };
    var fine = window.matchMedia('(pointer: fine)').matches;

    /* expo doors intro (once per session) */
    var introEl = document.getElementById('xpIntro');
    var introOn = document.documentElement.classList.contains('xp-intro-on');
    var introDelay = introOn ? 1.5 : 0;
    if (introEl && introOn) {
        var dl = introEl.querySelector('.xp-door.l'), dr = introEl.querySelector('.xp-door.r'), msg = introEl.querySelector('.xp-intro-msg');
        animate(msg, { opacity: [0, 1], y: [20, 0], scale: [0.95, 1] }, { duration: 0.5 });
        setTimeout(function () {
            animate(msg, { opacity: 0, y: -20 }, { duration: 0.25 });
            animate(dl, { x: ['0%', '-101%'] }, { duration: 0.9, ease: [0.76, 0, 0.24, 1] });
            animate(dr, { x: ['0%', '101%'] }, { duration: 0.9, ease: [0.76, 0, 0.24, 1] }).finished.then(function () {
                document.documentElement.classList.remove('xp-intro-on');
            });
        }, 900);
        try { sessionStorage.setItem('xpSeen', '1'); } catch (e) {}
    }

    /* scroll progress bar */
    var bar = root.querySelector('.xp-progress');
    if (bar && scroll) scroll(animate(bar, { scaleX: [0, 1] }, { ease: 'linear' }));

    /* hero headline: word-by-word mask reveal */
    var h1 = root.querySelector('.xp-hero h1');
    if (h1) {
        var words = h1.textContent.trim().split(/\s+/);
        h1.innerHTML = words.map(function (w) { return '<span class="xp-w"><span>' + w.replace(/&/g, '&amp;') + '</span></span>'; }).join(' ');
        animate(h1.querySelectorAll('.xp-w > span'), { y: ['110%', '0%'] }, { duration: 0.85, delay: stagger(0.07, { startDelay: 0.1 + introDelay }), ease: [0.22, 1, 0.36, 1] });
    }
    animate('.xp-tag, .xp-hero-sub, .xp-hero-desc, .xp-hero .xp-actions, .xp-note', { opacity: [0, 1], y: [26, 0] }, { duration: 0.7, delay: stagger(0.1, { startDelay: 0.45 + introDelay }), ease: 'easeOut' });

    /* hero badge: drops in on its lanyard, sways, tilts with the cursor */
    var wrap = root.querySelector('.xp-badge-wrap'), badge = root.querySelector('.xp-badge');
    if (wrap) animate(wrap, { opacity: [0, 1], y: [-140, 0] }, { type: 'spring', stiffness: 60, damping: 11, delay: 0.5 + introDelay });
    if (badge) {
        animate(badge, { rotate: [2.4, -1.6] }, { duration: 2.8, repeat: Infinity, repeatType: 'reverse', ease: 'easeInOut' });
        if (fine) {
            var hero = root.querySelector('.xp-hero');
            hero.addEventListener('pointermove', function (e) {
                var nx = e.clientX / window.innerWidth - 0.5, ny = e.clientY / window.innerHeight - 0.5;
                animate(badge, { rotateY: nx * 16, rotateX: -ny * 12 }, { duration: 0.6, ease: 'easeOut' });
            });
            hero.addEventListener('pointerleave', function () { animate(badge, { rotateY: 0, rotateX: 0 }, spring); });
        }
    }
    var orb = root.querySelector('.xp-orb');
    if (orb) animate(orb, { y: [0, -30], x: [0, -16] }, { duration: 5, repeat: Infinity, repeatType: 'reverse', ease: 'easeInOut' });

    /* every section wipes in from alternating sides while its content slides with it */
    root.querySelectorAll('section.xp-sec, section.xp-cta, .xp-bigtext').forEach(function (sec, i) {
        var dir = i % 2 ? 1 : -1;
        var from = dir > 0 ? 'inset(0% 0% 0% 100%)' : 'inset(0% 100% 0% 0%)';
        var inner = sec.querySelector(':scope > .xp-wrap');
        inView(sec, function () {
            animate(sec, { clipPath: [from, 'inset(0% 0% 0% 0%)'] }, { duration: 1.05, ease: [0.22, 1, 0.36, 1] }).finished.then(function () { sec.style.clipPath = 'none'; });
            if (inner) animate(inner, { opacity: [0, 1], x: [dir * 110, 0] }, { duration: 1.05, ease: [0.22, 1, 0.36, 1] });
        }, { amount: 0.08 });
    });

    /* scroll reveals with spring + sibling stagger */
    var groups = ['.xp-head', '.xp-stall', '.xp-web-copy > *', '.xp-browser', '.xp-slider', '.xp-race', '.xp-rc', '.xp-form-card', '.xp-faq-grid .ev-faq-item', '.xp-cta-card'];
    groups.forEach(function (sel) {
        root.querySelectorAll(sel).forEach(function (el, i) {
            var sib = Array.prototype.indexOf.call(el.parentElement.children, el);
            var delay = Math.min(sib, 5) * 0.08;
            inView(el, function () {
                var side = (sel === '.xp-stall' || sel === '.xp-rc' || sel === '.xp-faq-grid .ev-faq-item');
                var kf;
                if (side) kf = { opacity: [0, 1], x: [(sib % 2 ? 1 : -1) * 90, 0], scale: [0.96, 1] };
                else if (sel === '.xp-browser') kf = { opacity: [0, 1], x: [120, 0] };
                else if (sel === '.xp-head' || sel === '.xp-web-copy > *') kf = { opacity: [0, 1], x: [-70, 0] };
                else kf = { opacity: [0, 1], y: [48, 0], scale: [0.96, 1] };
                animate(el, kf, Object.assign({ delay: delay }, spring));
            }, { amount: 0.15 });
        });
    });

    /* keyword table: rows slide in, medals pop */
    var tw = root.querySelector('.xp-table-wrap');
    if (tw) {
        inView(tw, function () {
            animate(tw, { opacity: [0, 1] }, { duration: 0.4 });
            animate(tw.querySelectorAll('tbody tr'), { opacity: [0, 1], x: [-30, 0] }, { duration: 0.5, delay: stagger(0.08), ease: 'easeOut' });
            animate(tw.querySelectorAll('.xp-medal'), { opacity: [0, 1], scale: [0, 1], rotate: [-120, 0] }, { type: 'spring', stiffness: 220, damping: 12, delay: stagger(0.08, { startDelay: 0.3 }) });
        }, { amount: 0.15 });
    }

    /* count-up numbers */
    root.querySelectorAll('.xp-chip b, .xp-stat b, .xp-rc-metrics b, .xp-race-val').forEach(function (el) {
        var m = el.textContent.trim().match(/^([^\d]?)(\d[\d,]*\.?\d*)(.*)$/);
        if (!m) return;
        var raw = m[2], num = parseFloat(raw.replace(/,/g, '')), dec = (raw.split('.')[1] || '').length, comma = raw.indexOf(',') > -1;
        el.textContent = m[1] + (0).toFixed(dec) + m[3];
        inView(el, function () {
            animate(0, num, {
                duration: 1.7, ease: 'easeOut',
                onUpdate: function (v) {
                    var t = v.toFixed(dec);
                    if (comma) { var parts = t.split('.'); parts[0] = Math.round(+parts[0]).toLocaleString('en-US'); t = parts.join('.'); }
                    el.textContent = m[1] + t + m[3];
                }
            });
        }, { amount: 0.6 });
    });

    /* floating chips bob */
    root.querySelectorAll('.xp-float').forEach(function (f, i) {
        animate(f, { y: [0, i ? 12 : -12] }, { duration: 2.6 + i * 0.7, repeat: Infinity, repeatType: 'reverse', ease: 'easeInOut' });
    });

    /* animated stripe bar under every section heading */
    root.querySelectorAll('.xp-head h2').forEach(function (h) {
        var bar2 = document.createElement('i');
        bar2.className = 'xp-bar';
        bar2.style.transform = 'scaleX(0)';
        h.insertAdjacentElement('afterend', bar2);
        inView(bar2, function () { animate(bar2, { scaleX: [0, 1] }, { duration: 0.8, delay: 0.25, ease: [0.22, 1, 0.36, 1] }); }, { amount: 0.8 });
    });

    /* website mockup: parallax + floating art */
    var br = root.querySelector('.xp-browser'), art = root.querySelector('.xp-art');
    if (br && art && scroll) scroll(animate(art, { y: [28, -28] }, { ease: 'linear' }), { target: br, offset: ['start end', 'end start'] });

    /* aurora blobs drift */
    root.querySelectorAll('.xp-aurora i').forEach(function (b, i) {
        animate(b, { x: [0, i % 2 ? -70 : 70, 0], y: [0, i === 1 ? 50 : -45, 0], scale: [1, 1.22, 1] }, { duration: 12 + i * 3, repeat: Infinity, ease: 'easeInOut' });
    });

    /* hero content drifts + fades as you scroll away */
    var hg = root.querySelector('.xp-hero-grid'), hh = root.querySelector('.xp-hero');
    if (hg && hh && scroll) scroll(animate(hg, { y: [0, -60], opacity: [1, 0.3] }, { ease: 'linear' }), { target: hh, offset: ['start start', 'end start'] });

    /* rotating words in hero */
    var rot = root.querySelector('.xp-rotor-win b');
    if (rot) {
        var ws = ['trade buyers', 'exhibitor stalls', 'visitor registrations', 'sponsors'], ri = 0;
        setInterval(function () {
            animate(rot, { y: [0, -18], opacity: [1, 0] }, { duration: 0.25 }).finished.then(function () {
                ri = (ri + 1) % ws.length;
                rot.textContent = ws[ri];
                animate(rot, { y: [18, 0], opacity: [0, 1] }, { duration: 0.4, ease: 'easeOut' });
            });
        }, 2400);
    }

    /* section headlines: word-by-word mask reveal on scroll */
    root.querySelectorAll('.xp-head h2, .xp-web-copy h2, .xp-cta-card h2').forEach(function (h) {
        var wds = h.textContent.trim().split(/\s+/);
        h.innerHTML = wds.map(function (w) { return '<span class="xp-w"><span>' + w.replace(/&/g, '&amp;') + '</span></span>'; }).join(' ');
        var sp = h.querySelectorAll('.xp-w > span');
        sp.forEach(function (n) { n.style.transform = 'translateY(110%)'; });
        inView(h, function () { animate(sp, { y: ['110%', '0%'] }, { duration: 0.8, delay: stagger(0.05), ease: [0.22, 1, 0.36, 1] }); }, { amount: 0.6 });
    });

    /* 3D tilt on stalls + website mockup */
    if (fine) {
        root.querySelectorAll('.xp-stall, .xp-browser').forEach(function (c) {
            c.addEventListener('pointermove', function (e) {
                var r = c.getBoundingClientRect(), nx = (e.clientX - r.left) / r.width - 0.5, ny = (e.clientY - r.top) / r.height - 0.5;
                animate(c, { rotateY: nx * 8, rotateX: -ny * 8 }, { duration: 0.3 });
            });
            c.addEventListener('pointerleave', function () { animate(c, { rotateX: 0, rotateY: 0 }, { type: 'spring', stiffness: 200, damping: 15 }); });
        });
    }

    /* big outline type scrolls with the page */
    var bt = root.querySelector('.xp-bigtext'), bk = root.querySelector('.xp-bigtext-track');
    if (bt && bk && scroll) scroll(animate(bk, { x: ['0%', '-40%'] }, { ease: 'linear' }), { target: bt, offset: ['start end', 'end start'] });
    var bk2 = root.querySelector('.xp-bigtext-track--b');
    if (bt && bk2 && scroll) scroll(animate(bk2, { x: ['-40%', '0%'] }, { ease: 'linear' }), { target: bt, offset: ['start end', 'end start'] });

    /* section kickers decode into place */
    root.querySelectorAll('.xp-kicker').forEach(function (k) {
        var txt = k.textContent, chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ#%&*';
        inView(k, function () {
            var t0 = performance.now(), dur = 750;
            (function tick(now) {
                var p = Math.min(1, (now - t0) / dur), n = Math.floor(p * txt.length), out = '';
                for (var i = 0; i < txt.length; i++) out += (i < n || txt[i] === ' ') ? txt[i] : chars[Math.floor(Math.random() * chars.length)];
                k.textContent = p < 1 ? out : txt;
                if (p < 1) requestAnimationFrame(tick);
            })(t0);
        }, { amount: 1 });
    });

    /* bar race: bars grow when the chart scrolls into view */
    var race = root.querySelector('.xp-race');
    if (race) {
        var bars = race.querySelectorAll('.xp-race-bar');
        bars.forEach(function (b) { b.style.transform = 'scaleX(0)'; });
        inView(race, function () {
            animate(bars, { scaleX: [0, 1] }, { type: 'spring', stiffness: 70, damping: 14, delay: stagger(0.12, { startDelay: 0.25 }) });
        }, { amount: 0.4 });
    }

    /* hero search bar types itself, then the rank climbs to #1 (loops) */
    var typed = root.querySelector('.xp-typed'), rankEl = root.querySelector('.xp-rank'), query = 'bharat tex fair 2026';
    if (typed && rankEl) {
        var cycle = function () {
            typed.textContent = '';
            rankEl.textContent = '#12';
            var i = 0;
            var tm = setInterval(function () {
                typed.textContent = query.slice(0, ++i);
                if (i >= query.length) { clearInterval(tm); setTimeout(climb, 350); }
            }, 70);
            function climb() {
                animate(12, 1, { duration: 1.6, ease: 'easeInOut', onUpdate: function (v) { rankEl.textContent = '#' + Math.max(1, Math.round(v)); } });
                animate(rankEl, { scale: [1, 1.45, 1] }, { delay: 1.5, duration: 0.45 });
            }
        };
        setTimeout(cycle, 1400 + introDelay * 1000);
        setInterval(cycle, 11000);
    }

    /* magnetic primary buttons */
    if (fine) {
        root.querySelectorAll('.xp-btn--pink').forEach(function (b) {
            b.addEventListener('pointermove', function (e) {
                var r = b.getBoundingClientRect();
                animate(b, { x: (e.clientX - r.left - r.width / 2) * 0.22, y: (e.clientY - r.top - r.height / 2) * 0.3 }, { duration: 0.25 });
            });
            b.addEventListener('pointerleave', function () { animate(b, { x: 0, y: 0 }, { type: 'spring', stiffness: 300, damping: 14 }); });
        });
    }
})();
</script>

<?php
if (function_exists('renderFooterSection')) {
    renderFooterSection();
}