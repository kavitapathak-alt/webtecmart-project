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
   B2B & EXHIBITION SEO — "Expo Floor" colour edition
   Deep magenta outlines + hard gold shadows, no black.
   ============================================================ */
.xp {
    --pink: #C4007A; --pink2: #E0398F; --pink3: #FF7BC0;
    --deep: #7E004E;            /* outlines + hard shadows */
    --head: #5E0B45;            /* headings */
    --blush: #FBEAF3; --soft: #FFF4FA; --gold: #FFB547; --mint: #0E9F6E;
    --text: #4A3342; --mute: #7A6574; --line: rgba(126, 0, 78, .14);
    --hero: radial-gradient(60% 70% at 88% 0%, rgba(255,181,71,.38), transparent 65%),
            radial-gradient(50% 60% at 0% 100%, rgba(255,255,255,.2), transparent 70%),
            linear-gradient(135deg, #A8006A 0%, #C4007A 45%, #E0398F 100%);
    --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
    position: relative; width: 100%; overflow-x: clip; background: #fff; color: var(--text);
    font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
}
.xp *, .xp *::before, .xp *::after { box-sizing: border-box; }
.xp :where(h1, h2, h3, h4) { margin: 0; font-family: var(--disp); letter-spacing: -.02em; }
.xp :where(p) { margin: 0; }
.xp :is(a, button, input, select, textarea):focus-visible { outline: 3px solid var(--gold); outline-offset: 2px; }
.xp ::selection { background: var(--pink); color: #fff; }
.xp-wrap { max-width: 1200px; margin: 0 auto; padding: 0 22px; }
.xp :where(h1, h2, h3, p, li) { overflow-wrap: anywhere; }

/* Buttons */
.xp-btn {
    position: relative; overflow: hidden;
    display: inline-flex; align-items: center; justify-content: center; gap: 10px;
    padding: 14px 26px; border-radius: 12px; font-weight: 700; font-size: .95rem; line-height: 1.2;
    text-decoration: none; white-space: nowrap; border: 2px solid transparent; cursor: pointer;
    transition: translate .2s ease, box-shadow .2s ease, background .2s ease;
}
.xp-btn svg { flex-shrink: 0; }
.xp-btn--pink { background: var(--pink); color: #fff !important; box-shadow: 0 6px 0 var(--deep); }
.xp-btn--pink:hover { translate: 0 2px; box-shadow: 0 4px 0 var(--deep); }
.xp-btn--pink:active { translate: 0 6px; box-shadow: 0 0 0 transparent; }
.xp-btn--ghost { background: transparent; color: #fff !important; border-color: rgba(255,255,255,.5); }
.xp-btn--ghost:hover { background: rgba(255,255,255,.12); border-color: #fff; }
.xp-btn--line { background: #fff; color: var(--pink) !important; border-color: var(--deep); box-shadow: 0 4px 0 var(--deep); }
.xp-btn--line:hover { background: var(--blush); translate: 0 2px; box-shadow: 0 2px 0 var(--deep); }
.xp-btn--sm { padding: 11px 20px; font-size: .86rem; }
.xp-ripple { position: absolute; width: 12px; height: 12px; margin: -6px 0 0 -6px; border-radius: 50%; background: currentColor; opacity: .3; pointer-events: none; animation: xpRipple .65s ease-out forwards; }
@keyframes xpRipple { to { transform: scale(22); opacity: 0; } }

/* ===== HERO ===== */
.xp-hero { position: relative; color: #fff; padding: 64px 0 0; background: var(--hero); overflow: hidden; }
.xp-hero::before { content: ''; position: absolute; inset: 0; background-image: radial-gradient(rgba(255,255,255,.15) 1px, transparent 1.2px); background-size: 26px 26px; -webkit-mask-image: linear-gradient(180deg, #000 30%, transparent 95%); mask-image: linear-gradient(180deg, #000 30%, transparent 95%); pointer-events: none; }
.xp-aurora { position: absolute; inset: 0; overflow: hidden; pointer-events: none; z-index: 1; }
.xp-aurora i { position: absolute; border-radius: 50%; filter: blur(80px); opacity: .4; animation: xpDrift 14s ease-in-out infinite alternate; }
.xp-aurora i:nth-child(1) { width: 440px; height: 440px; left: -8%; top: 8%; background: var(--pink3); }
.xp-aurora i:nth-child(2) { width: 360px; height: 360px; right: 16%; bottom: -10%; background: var(--gold); opacity: .26; animation-duration: 18s; }
@keyframes xpDrift { to { transform: translate(60px, 40px) scale(1.2); } }

.xp-hero-grid { position: relative; z-index: 2; display: grid; gap: 48px; align-items: center; padding-bottom: 64px; }
@media (min-width: 992px) { .xp-hero-grid { grid-template-columns: 1.1fr .9fr; gap: 56px; } }
.xp-tag { display: inline-flex; align-items: center; gap: 8px; padding: 7px 15px 7px 11px; margin-bottom: 22px; border-radius: 999px; background: rgba(255,255,255,.18); border: 1px solid rgba(255,255,255,.45); font-size: .78rem; font-weight: 700; color: #fff; -webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px); }
.xp-tag i { width: 8px; height: 8px; border-radius: 50%; background: var(--gold); box-shadow: 0 0 0 4px rgba(255,181,71,.25); flex-shrink: 0; }
.xp-rotor { display: flex; align-items: center; flex-wrap: wrap; gap: 8px; margin: -6px 0 22px; font-size: .95rem; color: rgba(255,255,255,.85); }
.xp-rotor b { display: inline-block; font-family: var(--disp); font-size: 1.05rem; color: var(--gold); }
.xp-hero h1 { font-size: clamp(2.5rem, 5.4vw, 4.4rem); font-weight: 800; line-height: 1.03; margin-bottom: 20px; letter-spacing: -.03em; text-shadow: 0 3px 0 rgba(126,0,78,.35); }
.xp-w { display: inline-block; overflow: hidden; vertical-align: top; padding-bottom: .12em; margin-bottom: -.12em; }
.xp-w > span { display: inline-block; }
.xp-hero-sub { font-family: var(--disp); font-size: clamp(1.15rem, 2vw, 1.45rem); font-weight: 600; line-height: 1.35; color: #FFD7EB; margin-bottom: 16px; max-width: 560px; }
.xp-hero-desc { color: rgba(255,255,255,.88); line-height: 1.7; max-width: 560px; margin-bottom: 28px; }
.xp-actions { display: flex; flex-wrap: wrap; gap: 14px; }
.xp-note { margin-top: 26px; padding-top: 16px; border-top: 1px dashed rgba(255,255,255,.35); font-size: .8rem; color: rgba(255,255,255,.72); line-height: 1.55; max-width: 560px; }

/* Badge / SERP */
.xp-badge-wrap { position: relative; display: flex; justify-content: center; padding-top: 70px; perspective: 1100px; }
.xp-lanyard { position: absolute; top: 0; left: 50%; width: 14px; height: 90px; margin-left: -7px; background: linear-gradient(var(--gold), #E58B00); border-radius: 0 0 4px 4px; z-index: 3; }
.xp-lanyard::after { content: ''; position: absolute; left: 50%; bottom: -4px; width: 46px; height: 12px; margin-left: -23px; background: #A898A2; border-radius: 4px; }
.xp-badge { position: relative; z-index: 2; width: 100%; max-width: 430px; background: #fff; color: var(--text); border: 2px solid var(--deep); border-radius: 22px; padding: 34px 26px 24px; transform: rotate(2.2deg); transform-origin: top center; box-shadow: 12px 12px 0 var(--deep); }
.xp-badge::before { content: ''; position: absolute; top: 12px; left: 50%; width: 52px; height: 9px; margin-left: -26px; border-radius: 99px; background: var(--deep); }
.xp-search { display: flex; align-items: center; gap: 8px; margin-bottom: 14px; padding: 8px 14px; border: 2px solid var(--deep); border-radius: 999px; background: #fff; color: var(--head); font-size: .82rem; box-shadow: 3px 3px 0 var(--gold); }
.xp-search svg { color: var(--pink); flex-shrink: 0; }
.xp-typed { flex: 1; min-width: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-weight: 700; }
.xp-caret { width: 2px; height: 1.1em; background: var(--pink); animation: xpBlink 1s steps(1) infinite; }
@keyframes xpBlink { 50% { opacity: 0; } }
.xp-badge-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; gap: 10px; }
.xp-live { display: inline-flex; align-items: center; gap: 7px; background: #E6F8F0; color: #0A7A54; font-size: .75rem; font-weight: 700; padding: 5px 11px; border-radius: 99px; }
.xp-live i { width: 7px; height: 7px; border-radius: 50%; background: var(--mint); }
.xp-badge-top small { font-size: .72rem; color: var(--mute); font-weight: 700; }
.xp-serp-url { font-size: .76rem; color: var(--mute); margin-bottom: 4px; }
.xp-serp-url b { color: var(--pink); font-weight: 700; }
.xp-serp-title { font-family: var(--disp); font-size: 1.12rem; font-weight: 700; color: #5E0B45; text-decoration: underline; line-height: 1.3; margin-bottom: 8px; }
.xp-serp-desc { font-size: .84rem; line-height: 1.55; color: var(--mute); margin-bottom: 14px; }
.xp-pass { margin: 0 -26px; padding: 16px 26px; background: var(--blush); border-top: 2px dashed rgba(126,0,78,.4); border-bottom: 2px dashed rgba(126,0,78,.4); position: relative; }
.xp-pass::before, .xp-pass::after { content: ''; position: absolute; top: 50%; width: 18px; height: 18px; margin-top: -9px; border-radius: 50%; background: #fff; border: 2px solid var(--deep); }
.xp-pass::before { left: -11px; } .xp-pass::after { right: -11px; }
.xp-pass div { font-size: .8rem; line-height: 1.5; margin-bottom: 6px; color: var(--text); }
.xp-pass div:last-child { margin-bottom: 0; }
.xp-pass strong { color: var(--head); }
.xp-chips { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-top: 18px; }
.xp-chip { text-align: center; padding: 10px 4px; border-radius: 10px; background: var(--deep); color: #fff; border: 2px solid var(--deep); }
.xp-chip b { display: block; font-family: var(--disp); font-size: 1.25rem; color: var(--gold); line-height: 1.1; }
.xp-chip span { font-size: .66rem; font-weight: 600; opacity: .8; }
.xp-float { position: absolute; z-index: 3; display: inline-flex; align-items: center; gap: 8px; padding: 9px 14px; border-radius: 12px; background: var(--gold); color: var(--deep); border: 2px solid var(--deep); box-shadow: 4px 4px 0 var(--deep); font-family: var(--disp); font-weight: 800; font-size: .8rem; white-space: nowrap; }
.xp-float i { width: 8px; height: 8px; border-radius: 50%; background: var(--mint); box-shadow: 0 0 0 3px rgba(14,159,110,.25); }
.xp-float--a { left: 0; top: 46%; }
.xp-float--b { right: 0; bottom: 5%; background: #fff; }
@media (max-width: 575px) { .xp-float { display: none; } }

/* Stat ribbon */
.xp-ribbon { position: relative; background: var(--gold); color: var(--deep); overflow: hidden; border-top: 3px solid var(--deep); border-bottom: 3px solid var(--deep); z-index: 2; }
.xp-ribbon-track { display: flex; width: max-content; animation: xp-run 38s linear infinite; }
.xp-ribbon:hover .xp-ribbon-track { animation-play-state: paused; }
.xp-ribbon span { font-family: var(--disp); font-weight: 800; font-size: 1.05rem; padding: 14px 30px; white-space: nowrap; }
.xp-ribbon span b { display: inline-block; margin-right: 8px; padding: 2px 11px; border-radius: 8px; background: var(--deep); color: var(--gold); font-size: 1em; }
.xp-ribbon span::after { content: '✦'; margin-left: 60px; opacity: .55; }
@keyframes xp-run { to { transform: translateX(-50%); } }

/* Section shells */
.xp-sec { padding: 84px 0; position: relative; }
.xp-head { max-width: 720px; margin-bottom: 44px; }
.xp-head h2 { font-size: clamp(1.9rem, 3.6vw, 2.9rem); font-weight: 800; line-height: 1.1; color: var(--head); margin-bottom: 14px; }
.xp-head p { color: var(--mute); line-height: 1.65; font-size: 1.02rem; }
.xp-head--dark h2 { color: #fff; }
.xp-head--dark p { color: rgba(255,255,255,.8); }
.xp-kicker { display: inline-block; font-size: .82rem; font-weight: 800; color: var(--pink); margin-bottom: 12px; padding-left: 14px; border-left: 4px solid var(--pink); text-transform: uppercase; letter-spacing: .06em; }

/* Challenges / stalls */
.xp-challenges { background: var(--soft); background-image: radial-gradient(rgba(126,0,78,.07) 1px, transparent 1.2px); background-size: 24px 24px; }
.xp-board { display: grid; gap: 18px; perspective: 1200px; }
@media (min-width: 768px) { .xp-board { grid-template-columns: repeat(2, 1fr); } }
@media (min-width: 992px) {
    .xp-board { grid-template-columns: repeat(6, minmax(0, 1fr)); }
    .xp-stall { grid-column: span 2; }
    .xp-stall--wide { grid-column: span 4; }
    .xp-stall--wide h3 { font-size: 1.6rem; }
}
.xp-stall { position: relative; background: #fff; border: 2px solid var(--deep); border-radius: 18px; padding: 54px 26px 26px; box-shadow: 6px 6px 0 var(--gold); transition: translate .25s ease, box-shadow .25s ease; overflow: hidden; }
.xp-stall::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 28px; border-radius: 15px 15px 0 0; background: repeating-linear-gradient(90deg, var(--pink) 0 22px, #fff 22px 44px); border-bottom: 2px solid var(--deep); }
.xp-stall:nth-child(even)::before { background: repeating-linear-gradient(90deg, var(--gold) 0 22px, #fff 22px 44px); }
.xp-stall:hover { translate: -4px -4px; box-shadow: 10px 10px 0 var(--pink); }
.xp-ico { display: grid; place-items: center; width: 50px; height: 50px; margin-bottom: 16px; border-radius: 12px; background: var(--blush); color: var(--pink); border: 2px solid var(--deep); box-shadow: 3px 3px 0 var(--gold); transition: rotate .3s ease, scale .3s ease; }
.xp-stall:hover .xp-ico { rotate: -8deg; scale: 1.08; }
.xp-stall h3 { font-size: 1.3rem; font-weight: 800; line-height: 1.25; color: var(--head); margin-bottom: 10px; }
.xp-stall p { font-size: .94rem; line-height: 1.65; color: var(--mute); }

/* Event websites */
.xp-web-grid { display: grid; gap: 44px; align-items: center; perspective: 1400px; }
@media (min-width: 992px) { .xp-web-grid { grid-template-columns: .95fr 1.05fr; gap: 64px; } }
.xp-web-copy h2 { font-size: clamp(1.9rem, 3.6vw, 2.8rem); font-weight: 800; line-height: 1.1; color: var(--head); margin-bottom: 12px; }
.xp-web-copy h3 { font-size: 1.2rem; font-weight: 700; color: var(--pink); line-height: 1.35; margin-bottom: 22px; }
.xp-web-copy p { line-height: 1.7; color: var(--mute); margin-bottom: 16px; }
.xp-web-copy .xp-actions { margin-top: 28px; }
.xp-browser { background: var(--deep); border-radius: 18px; padding: 12px; box-shadow: 14px 14px 0 var(--blush), 0 0 0 2px var(--deep); }
.xp-browser-bar { display: flex; align-items: center; gap: 14px; padding: 4px 6px 12px; }
.xp-dots { display: flex; gap: 6px; }
.xp-dots span { width: 11px; height: 11px; border-radius: 50%; background: var(--pink); }
.xp-dots span:nth-child(2) { background: var(--gold); } .xp-dots span:nth-child(3) { background: #fff; }
.xp-url { flex: 1; min-width: 0; background: rgba(255,255,255,.15); color: rgba(255,255,255,.85); font-size: .72rem; padding: 6px 12px; border-radius: 8px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.xp-screen { background: #fff; border-radius: 10px; overflow: hidden; min-height: 320px; }
.xp-screen-nav { display: flex; justify-content: space-between; align-items: center; padding: 14px 18px; border-bottom: 1px solid #F0E6EC; gap: 10px; }
.xp-screen-nav b { font-family: var(--disp); font-size: 1.2rem; color: var(--pink); }
.xp-screen-nav em { font-style: normal; font-size: .65rem; color: var(--mute); }
.xp-screen-nav span { background: var(--pink); color: #fff; font-size: .65rem; font-weight: 800; padding: 8px 12px; border-radius: 8px; white-space: nowrap; }
.xp-screen-body { display: grid; grid-template-columns: 1fr .85fr; gap: 16px; align-items: center; padding: 28px 22px; }
.xp-screen-body small { color: var(--pink); font-size: .64rem; font-weight: 700; }
.xp-screen-body h4 { margin: 10px 0 10px; font-size: clamp(1.5rem, 3vw, 2.3rem); font-weight: 800; line-height: 1.02; color: var(--head); }
.xp-screen-body p { font-size: .72rem; line-height: 1.5; color: var(--mute); margin-bottom: 14px; }
.xp-screen-body i { display: inline-block; font-style: normal; background: var(--deep); color: #fff; font-size: .65rem; font-weight: 800; padding: 9px 12px; border-radius: 8px; }
.xp-art { min-height: 190px; border-radius: 10px; background: radial-gradient(ellipse at 70% 30%, rgba(255,255,255,.7) 0 8%, transparent 9%), radial-gradient(ellipse at 58% 50%, rgba(244,196,222,.9) 0 17%, transparent 18%), linear-gradient(145deg, #7E004E 0%, #C4007A 52%, #E98EBE 100%); }
@media (max-width: 575px) { .xp-screen-nav em { display: none; } .xp-screen-body { padding: 20px 14px; gap: 10px; } .xp-art { min-height: 140px; } }

/* Case studies */
.xp-cases { background: radial-gradient(50% 60% at 92% 0%, rgba(255,181,71,.15), transparent 70%), linear-gradient(160deg, var(--deep) 0%, #A8006A 100%); color: #fff; }
.xp-case { display: grid; gap: 28px; padding: 34px; margin-bottom: 22px; border-radius: 22px; background: rgba(255,255,255,.08); border: 2px solid rgba(255,255,255,.2); align-items: center; backdrop-filter: blur(10px); }
@media (min-width: 900px) { .xp-case { grid-template-columns: 1.1fr .9fr; padding: 42px; gap: 44px; } .xp-case:nth-of-type(even) { grid-template-columns: .9fr 1.1fr; } .xp-case:nth-of-type(even) .xp-case-text { order: 2; } }
.xp-case-org { display: inline-block; font-size: .78rem; font-weight: 800; color: var(--deep); background: var(--gold); padding: 6px 12px; border-radius: 8px; margin-bottom: 14px; border: 2px solid var(--deep); box-shadow: 2px 2px 0 var(--deep); }
.xp-case h3 { font-size: clamp(1.45rem, 2.6vw, 2rem); font-weight: 800; line-height: 1.15; margin-bottom: 14px; color: #fff; }
.xp-case p { color: rgba(255,255,255,.82); line-height: 1.7; margin-bottom: 22px; font-size: .96rem; }
.xp-stats { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
.xp-stat { padding: 18px 14px; border-radius: 14px; background: rgba(255,255,255,.1); border: 2px solid rgba(255,255,255,.25); transition: translate .25s ease, background .25s ease; }
.xp-stat:hover { translate: 0 -4px; background: rgba(255,255,255,.16); }
.xp-stat b { display: block; font-family: var(--disp); font-size: 2rem; font-weight: 800; color: var(--gold); line-height: 1.05; }
.xp-stat span { font-size: .78rem; color: rgba(255,255,255,.8); font-weight: 600; }

/* Slider */
.xp-slider .swiper { overflow: hidden; padding: 4px 14px 18px 4px; margin: -4px -14px -18px -4px; }
.xp-slider .swiper-slide { height: auto; }
.xp-slider .xp-case { height: 100%; margin-bottom: 0; box-shadow: 8px 8px 0 var(--gold); }
.xp-slider { padding-right: 8px; }
.xp-slider-nav { display: flex; align-items: center; justify-content: space-between; gap: 20px; margin-top: 30px; }
.xp-pag { display: flex; gap: 8px; }
.xp-pag .swiper-pagination-bullet { width: 44px; height: 6px; border-radius: 0; background: rgba(255,255,255,.3); opacity: 1; margin: 0 !important; cursor: pointer; transition: background .3s, width .3s; }
.xp-pag .swiper-pagination-bullet-active { background: var(--gold); width: 72px; }
.xp-arrows { display: flex; gap: 10px; }
.xp-arrows button { display: grid; place-items: center; width: 48px; height: 48px; border-radius: 12px; border: 2px solid var(--deep); background: var(--gold); color: var(--deep); cursor: pointer; box-shadow: 0 4px 0 var(--deep); transition: translate .15s, box-shadow .15s, background .2s; }
.xp-arrows button:hover { translate: 0 2px; box-shadow: 0 2px 0 var(--deep); background: #fff; }
.xp-arrows button.swiper-button-disabled { opacity: .45; }

/* Rankings */
.xp-rank-cards { display: grid; gap: 18px; margin-bottom: 36px; }
@media (min-width: 768px) { .xp-rank-cards { grid-template-columns: repeat(3, 1fr); } }
.xp-rc { position: relative; background: #fff; border: 2px solid var(--deep); border-radius: 18px; overflow: hidden; box-shadow: 4px 4px 0 var(--gold); transition: translate .25s ease, box-shadow .25s ease; }
.xp-rc:hover { translate: -3px -3px; box-shadow: 7px 7px 0 var(--pink); }
.xp-rc-head { display: flex; justify-content: space-between; align-items: center; gap: 8px; padding: 14px 18px; background: var(--deep); color: #fff; }
.xp-rc-head b { font-family: var(--disp); font-size: 1rem; word-break: break-all; }
.xp-rc-head span { font-size: .68rem; font-weight: 800; background: var(--pink); padding: 3px 9px; border-radius: 99px; white-space: nowrap; color: #fff; }
.xp-rc-metrics { display: grid; grid-template-columns: repeat(3, 1fr); text-align: center; }
.xp-rc-metrics div { padding: 16px 4px; border-right: 2px solid var(--line); }
.xp-rc-metrics div:last-child { border-right: 0; }
.xp-rc-metrics b { display: block; font-family: var(--disp); font-size: 1.35rem; color: var(--pink); }
.xp-rc-metrics span { font-size: .68rem; font-weight: 700; color: var(--mute); }
.xp-rc-foot { padding: 13px 18px; background: var(--blush); font-size: .82rem; font-weight: 700; color: var(--head); border-top: 2px solid var(--deep); }
.xp-rc-foot b { color: var(--pink); }

/* Race bars */
.xp-race { background: #fff; border: 2px solid var(--deep); border-radius: 20px; box-shadow: 6px 6px 0 var(--gold); padding: 24px; margin-bottom: 30px; }
.xp-race-head { display: flex; flex-wrap: wrap; align-items: baseline; justify-content: space-between; gap: 6px 14px; margin-bottom: 14px; }
.xp-race-head b { font-family: var(--disp); font-size: 1.2rem; color: var(--head); }
.xp-race-head span { font-size: .8rem; color: var(--mute); font-weight: 600; }
.xp-race-row { display: grid; grid-template-columns: minmax(130px, 250px) minmax(0, 1fr) 52px; align-items: center; gap: 14px; margin: 12px 0; }
.xp-race-name { font-size: .88rem; font-weight: 700; color: var(--head); }
.xp-race-track { height: 18px; border-radius: 99px; border: 2px solid var(--deep); background: var(--blush); overflow: hidden; }
.xp-race-bar { display: block; height: 100%; border-radius: 99px; transform-origin: 0 50%; background: repeating-linear-gradient(45deg, var(--pink) 0 10px, var(--pink2) 10px 20px); }
.xp-race-val { font-family: var(--disp); font-size: 1.05rem; color: var(--mint); text-align: right; }
@media (max-width: 575px) {
    .xp-race { padding: 18px 16px; box-shadow: 4px 4px 0 var(--gold); }
    .xp-race-row { grid-template-columns: minmax(0, 1fr) 48px; gap: 6px 10px; margin: 16px 0; }
    .xp-race-name { grid-column: 1 / -1; }
}

/* Table */
.xp-table-wrap { overflow-x: auto; border: 2px solid var(--deep); border-radius: 18px; margin-bottom: 36px; background: #fff; box-shadow: 6px 6px 0 var(--gold); }
.xp-table { width: 100%; min-width: 760px; border-collapse: collapse; }
.xp-table th { text-align: left; padding: 14px 18px; background: var(--blush); color: var(--head); font-size: .8rem; font-weight: 800; border-bottom: 2px solid var(--deep); }
.xp-table td { padding: 15px 18px; font-size: .9rem; border-bottom: 1px solid var(--line); vertical-align: middle; color: var(--text); }
.xp-table tr:last-child td { border-bottom: 0; }
.xp-table tbody tr:hover { background: #FFF9FC; }
.xp-url-cell { color: var(--mute); font-size: .8rem; }
.xp-medal { display: inline-grid; place-items: center; width: 40px; height: 40px; border-radius: 50%; background: var(--gold); color: var(--deep); font-family: var(--disp); font-weight: 800; border: 2px solid var(--deep); box-shadow: 2px 2px 0 var(--deep); }
.xp-up { color: var(--mint); font-weight: 800; font-size: .84rem; }
.xp-intent { display: inline-block; background: var(--blush); color: var(--pink); font-weight: 800; font-size: .74rem; padding: 4px 10px; border-radius: 99px; border: 1.5px solid var(--pink); }
.xp-center { text-align: center; }

/* Form */
.xp-form-sec { background: var(--soft); background-image: radial-gradient(rgba(126,0,78,.06) 1px, transparent 1.2px); background-size: 24px 24px; }
.xp-form-card { display: grid; max-width: 1060px; margin: 0 auto; border: 2px solid var(--deep); border-radius: 24px; overflow: hidden; background: #fff; box-shadow: 10px 10px 0 var(--gold); }
@media (min-width: 900px) { .xp-form-card { grid-template-columns: .8fr 1.2fr; } }
.xp-form-side { background: radial-gradient(circle at 12% 0%, rgba(255,181,71,.42), transparent 55%), radial-gradient(circle at 100% 100%, rgba(126,0,78,.4), transparent 55%), var(--pink); color: #fff; padding: 38px 30px; display: flex; flex-direction: column; gap: 18px; }
.xp-form-side h3 { font-size: clamp(1.6rem, 2.6vw, 2.1rem); font-weight: 800; line-height: 1.12; color: #fff; }
.xp-form-side p { line-height: 1.65; color: rgba(255,255,255,.92); font-size: .95rem; }
.xp-form-side ul { list-style: none; padding: 0; margin: 4px 0 0; display: grid; gap: 10px; }
.xp-form-side li { display: flex; gap: 10px; font-size: .9rem; font-weight: 600; align-items: flex-start; }
.xp-form-side li::before { content: '✓'; display: grid; place-items: center; flex-shrink: 0; width: 22px; height: 22px; border-radius: 50%; background: #fff; color: var(--pink); font-size: .75rem; font-weight: 800; margin-top: 2px; }
.xp-form-main { padding: 36px 30px; }
.xp-fields { display: grid; gap: 16px; margin-bottom: 16px; }
@media (min-width: 640px) { .xp-fields { grid-template-columns: repeat(2, 1fr); } }
.xp-field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 0; }
.xp-field--full { margin-bottom: 16px; }
.xp-field label { font-size: .82rem; font-weight: 800; color: var(--head); }
.xp-field input, .xp-field select, .xp-field textarea { width: 100%; padding: 13px 14px; border-radius: 10px; border: 2px solid #E4DCE6; background: #FCFAFD; font-family: inherit; font-size: .92rem; color: var(--head); transition: border-color .2s, box-shadow .2s; }
.xp-field input:focus, .xp-field select:focus, .xp-field textarea:focus { border-color: var(--pink); background: #fff; outline: none; box-shadow: 0 0 0 4px rgba(196,0,122,.14); }
.xp-field:focus-within label { color: var(--pink); }
.xp-submit { width: 100%; margin-top: 6px; position: relative; overflow: hidden; }
.xp-submit:disabled { opacity: .7; cursor: wait; }
.ev-form-feedback { display: none; margin-top: 16px; padding: 13px 14px; border-radius: 10px; font-size: .88rem; font-weight: 600; text-align: center; }
.ev-form-feedback.success { display: block; background: #E6F8F0; color: #065F46; border: 1px solid #A7F3D0; }

/* FAQ */
.xp-faq-grid { display: grid; gap: 40px; }
@media (min-width: 992px) { .xp-faq-grid { grid-template-columns: .8fr 1.2fr; gap: 64px; } .xp-faq-grid .xp-head { position: sticky; top: 100px; align-self: start; margin-bottom: 0; } }
.ev-faq-item { border: 2px solid var(--deep); border-radius: 14px; margin-bottom: 12px; background: #fff; overflow: hidden; transition: box-shadow .2s; box-shadow: 4px 4px 0 var(--gold); }
.ev-faq-item.active { box-shadow: 5px 5px 0 var(--pink); }
.ev-faq-btn { width: 100%; display: flex; justify-content: space-between; align-items: center; gap: 16px; padding: 18px 20px; background: transparent; border: 0; text-align: left; font-family: var(--disp); font-weight: 800; font-size: 1.04rem; line-height: 1.3; color: var(--head); cursor: pointer; }
.ev-faq-btn .icon { flex-shrink: 0; display: grid; place-items: center; width: 30px; height: 30px; border-radius: 8px; background: var(--blush); color: var(--pink); font-size: 1.2rem; line-height: 1; transition: transform .25s, background .25s, color .25s; border: 2px solid var(--deep); }
.ev-faq-item.active .icon { transform: rotate(45deg); background: var(--pink); color: #fff; }
.ev-faq-answer { display: none; padding: 0 20px 20px; line-height: 1.7; color: var(--mute); font-size: .94rem; }
.ev-faq-item.active .ev-faq-answer { display: block; }

/* CTA */
@keyframes xpAngle { to { --xpa: 360deg; } }
@property --xpa { syntax: '<angle>'; initial-value: 0deg; inherits: false; }
.xp-cta { padding: 0 0 84px; background: var(--soft); }
.xp-cta-card { position: relative; overflow: hidden; color: #fff; border-radius: 26px; padding: 60px 34px; text-align: center; box-shadow: 10px 10px 0 var(--gold); background: radial-gradient(50% 80% at 50% 120%, rgba(255,181,71,.45), transparent 70%), radial-gradient(rgba(255,255,255,.18) 1px, transparent 1.2px) 0 0 / 26px 26px, linear-gradient(135deg, #A8006A 0%, #C4007A 50%, #E0398F 100%); }
.xp-cta-card::after { content: ''; position: absolute; inset: 0; border-radius: inherit; padding: 3px; pointer-events: none; background: conic-gradient(from var(--xpa), var(--gold), #fff, var(--pink3), var(--gold)); -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0); -webkit-mask-composite: xor; mask: linear-gradient(#000 0 0) content-box exclude, linear-gradient(#000 0 0); animation: xpAngle 6s linear infinite; }
.xp-cta-card > * { position: relative; z-index: 2; }
.xp-cta-card h2 { font-size: clamp(1.9rem, 3.8vw, 3rem); font-weight: 800; line-height: 1.1; max-width: 800px; margin: 0 auto 16px; color: #fff; text-shadow: 0 3px 0 rgba(126,0,78,.3); }
.xp-cta-card p { max-width: 620px; margin: 0 auto 30px; color: rgba(255,255,255,.92); line-height: 1.65; }
.xp-cta-card .xp-actions { justify-content: center; }
.xp-cta-foot { margin-top: 26px; font-size: .8rem; color: rgba(255,255,255,.72); }

/* Motion */
.xp-progress { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 4px; z-index: 9999; background: linear-gradient(90deg, var(--gold), var(--pink)); transform-origin: 0 50%; transform: scaleX(0); }
.xp-js .xp-progress { display: block; }

/* Sticky Mobile CTA */
.xp-sticky { position: fixed; left: 0; right: 0; bottom: 0; z-index: 999; display: none; gap: 10px; padding: 10px 14px calc(10px + env(safe-area-inset-bottom)); background: var(--deep); border-top: 3px solid var(--gold); translate: 0 115%; transition: translate .35s cubic-bezier(.16, 1, .3, 1); }
.xp-sticky.on { translate: 0 0; }
.xp-sticky .xp-btn { padding: 13px 16px; font-size: .9rem; }
.xp-sticky .xp-btn--ghost { flex: 0 0 auto; }
.xp-sticky .xp-btn--pink { flex: 1; width: auto; box-shadow: 0 4px 0 #5C0038; }
@media (max-width: 767px) { .xp-sticky { display: flex; } .xp-cta { padding-bottom: 96px; } }

/* Responsive */
@media (max-width: 991px) {
    .xp-hero-grid { gap: 36px; }
    .xp-hero h1, .xp-hero-sub, .xp-hero-desc, .xp-note { max-width: none; }
    .xp-badge { max-width: 400px; }
    .xp-form-card { box-shadow: 6px 6px 0 var(--gold); }
}
@media (max-width: 760px) {
    .xp-rank-cards { display: flex; gap: 14px; overflow-x: auto; scroll-snap-type: x mandatory; margin: 0 -22px 28px; padding: 4px 22px 16px; scrollbar-width: none; }
    .xp-rank-cards::-webkit-scrollbar { display: none; }
    .xp-rank-cards .xp-rc { flex: 0 0 84%; scroll-snap-align: center; }
    .xp-table-wrap { border: 0; background: transparent; overflow: visible; border-radius: 0; box-shadow: none; }
    .xp-table { min-width: 0; display: block; }
    .xp-table thead { display: none; }
    .xp-table tbody { display: grid; gap: 16px; }
    .xp-table tr { display: block; background: #fff; border: 2px solid var(--deep); border-radius: 16px; padding: 4px 0; box-shadow: 5px 5px 0 var(--gold); }
    .xp-table td { display: flex; justify-content: space-between; align-items: center; gap: 14px; padding: 11px 16px; text-align: right; border-bottom: 1px dashed var(--line); word-break: break-word; }
    .xp-table tr td:last-child { border-bottom: 0; }
    .xp-table td::before { content: attr(data-label); flex-shrink: 0; text-align: left; font-size: .72rem; font-weight: 800; color: var(--mute); }
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
    .xp-badge { padding: 32px 18px 20px; box-shadow: 8px 8px 0 var(--deep); }
    .xp-pass { margin: 0 -18px; padding: 14px 18px; }
    .xp-ribbon span { font-size: .92rem; padding: 12px 22px; }
    .xp-case { padding: 24px 18px; }
    .xp-stat b { font-size: 1.6rem; }
    .xp-actions .xp-btn { width: 100%; white-space: normal; text-align: center; }
    .xp-stall { padding: 50px 20px 22px; box-shadow: 4px 4px 0 var(--gold); }
    .xp-browser { box-shadow: 7px 7px 0 var(--blush), 0 0 0 2px var(--deep); }
    .xp-form-main, .xp-form-side { padding: 28px 18px; }
    .xp-cta-card { padding: 44px 20px; border-radius: 20px; box-shadow: 6px 6px 0 var(--gold); }
    .ev-faq-btn { padding: 16px; font-size: .98rem; }
    .ev-faq-answer { padding: 0 16px 18px; }
    .xp-aurora i { filter: blur(50px); }
}
@media (prefers-reduced-motion: reduce) {
    .xp-ribbon-track, .xp-cta-card::after, .xp-aurora i { animation: none; }
    .xp-btn, .xp-stall, .xp-rc, .xp-stat { transition: none; }
}
@media (hover: none) {
    .xp-stall:hover, .xp-rc:hover, .xp-btn--pink:hover, .xp-stat:hover { translate: none; }
    .xp-stall:hover { box-shadow: 6px 6px 0 var(--gold); }
    .xp-rc:hover { box-shadow: 4px 4px 0 var(--gold); }
}
</style>

<main class="xp">
<script>(function (s) {
    var mobile = false, calm = false;
    try {
        mobile = matchMedia('(max-width: 991px)').matches || matchMedia('(pointer: coarse)').matches;
        calm = matchMedia('(prefers-reduced-motion: reduce)').matches;
    } catch (e) {}
    if (!mobile && !calm) s.parentElement.classList.add('xp-js');
})(document.currentScript);</script>
<div class="xp-progress" aria-hidden="true"></div>

    <!-- 1. HERO -->
    <section class="xp-hero">
        <div class="xp-aurora" aria-hidden="true"><i></i><i></i></div>
        <div class="xp-wrap">
            <div class="xp-hero-grid">
                <div>
                    <div class="xp-tag"><i></i><span>India's #1 event &amp; exhibition SEO specialists</span></div>
                    <div class="xp-rotor"><span>We help you rank for</span><b>trade buyers</b></div>
                    <h1>Boost Your Event &amp; Exhibition With SEO.</h1>
                    <h3 class="xp-hero-sub">Want to attract more attendees, sponsors, exhibitors, and increase revenue?</h3>
                    <p class="xp-hero-desc"><?= htmlspecialchars($heroDesc) ?></p>
                    <div class="xp-actions">
                        <a href="#event-audit-form" class="xp-btn xp-btn--pink"><span>Let's Talk Optimization</span><?= $arrow ?></a>
                        <a href="tel:+919999674255" class="xp-btn xp-btn--ghost"><?= $phone ?><span>Call: +91-9999674255</span></a>
                    </div>
                    <p class="xp-note">* While results can't be guaranteed, events and trade exhibitions are uniquely positioned to perform exceptionally well with effective search engine optimization.</p>
                </div>

                <div class="xp-badge-wrap">
                    <div class="xp-lanyard"></div>
                    <div class="xp-float xp-float--a"><i></i>Event schema live</div>
                    <div class="xp-float xp-float--b">80+ top 3 worldwide</div>
                    <div class="xp-badge">
                        <div class="xp-search"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg><span class="xp-typed">bharat tex fair 2026</span><i class="xp-caret"></i></div>
                        <div class="xp-badge-top">
                            <div class="xp-live"><i></i>#1&nbsp;Google Search Result</div>
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
        }
    }

    function handleEvFormSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('evAuditForm');
        const btn  = document.getElementById('evSubmitBtn');
        const fb   = document.getElementById('evFeedback');
        const formData = new FormData(form);
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
            method: 'POST', body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
        })
        .then(res => res.json())
        .then(() => {
            fb.classList.add('success'); fb.style.display = 'block';
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Claim Your Free Event SEO Growth Blueprint';
        })
        .catch(() => {
            fb.classList.add('success'); fb.style.display = 'block';
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Claim Your Free Event SEO Growth Blueprint';
        });
    }

    /* click ripple */
    document.querySelector('main.xp').addEventListener('click', function (e) {
        var b = e.target.closest && e.target.closest('.xp-btn');
        if (!b) return;
        var r = b.getBoundingClientRect(), d = document.createElement('i');
        d.className = 'xp-ripple';
        d.style.left = (e.clientX - r.left) + 'px';
        d.style.top = (e.clientY - r.top) + 'px';
        b.appendChild(d);
        setTimeout(function () { d.remove(); }, 700);
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11.1.14/swiper-bundle.min.js"></script>
<script>
(function () {
    if (window.Swiper && document.getElementById('xpCaseSwiper')) {
        new Swiper('#xpCaseSwiper', {
            slidesPerView: 1, spaceBetween: 0, speed: 800, rewind: true, grabCursor: true,
            effect: 'creative', creativeEffect: { prev: { shadow: false, translate: ['-25%', 0, -1], opacity: 0 }, next: { translate: ['100%', 0, 0] } },
            autoplay: { delay: 6500, disableOnInteraction: false, pauseOnMouseEnter: true },
            keyboard: { enabled: true },
            navigation: { nextEl: '.xp-next', prevEl: '.xp-prev' },
            pagination: { el: '.xp-pag', clickable: true }
        });
    }

    /* sticky mobile cta */
    var sticky = document.getElementById('xpSticky'), hero = document.querySelector('.xp-hero'), form = document.getElementById('event-audit-form');
    if (sticky && hero && 'IntersectionObserver' in window) {
        var heroOut = false, formIn = false, ctaIn = false;
        var upd = function () { sticky.classList.toggle('on', heroOut && !formIn && !ctaIn); };
        new IntersectionObserver(function (e) { heroOut = !e[0].isIntersecting; upd(); }).observe(hero);
        if (form) new IntersectionObserver(function (e) { formIn = e[0].isIntersecting; upd(); }, { threshold: 0.15 }).observe(form);
        var ctaEl = document.querySelector('.xp-cta');
        if (ctaEl) new IntersectionObserver(function (e) { ctaIn = e[0].isIntersecting; upd(); }, { threshold: 0.2 }).observe(ctaEl);
    }
})();
</script>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>