<?php
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
    ['Bharat Tex 2027 Fair', 'bharat-tex.com', '+17', '49,500/mo', 'Commercial'],
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

$brandLogos = [
    ['name' => 'Informa Global', 'logo' => '/assets/images/logo-1.png'],
    ['name' => 'Bharat Tex Fair', 'logo' => '/assets/images/logos-10.jpeg'],
    ['name' => 'IHGF Delhi Autumn Fair 2027', 'logo' => '/assets/images/logos-11.jpeg'],
    ['name' => 'Clarion Events', 'logo' => '/assets/images/logos-2.png'],
    ['name' => 'London Tech Week', 'logo' => '/assets/images/logos-3.jpeg'],
    ['name' => 'Media 10', 'logo' => '/assets/images/logos-4.jpeg'],
    ['name' => 'The AI Summit', 'logo' => '/assets/images/logos-5.jpeg'],
    ['name' => 'Northstar Travel Group', 'logo' => '/assets/images/logos-6.jpeg'],
    ['name' => 'BMJ Future Health', 'logo' => '/assets/images/logos-7.jpeg'],
    ['name' => 'Stonex Jewellers', 'logo' => '/assets/images/stonex-jewellers-logo.png'],
    ['name' => 'Innovation Zero', 'logo' => '/assets/images/logos-8.jpeg'],
    ['name' => 'Premier Logistics', 'logo' => '/assets/images/logos-9.jpeg'],
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

/* Brands (logo cards slider) */
.xp-head--c { margin-left: auto; margin-right: auto; text-align: center; }
.xp-acc { color: var(--pink); }
.xp-bar { display: block; width: 84px; height: 7px; margin: 0 auto 16px; background: repeating-linear-gradient(90deg, var(--pink) 0 12px, var(--gold) 12px 24px); }
.xp-brands { padding: 56px 0 48px; background: #fff; border-bottom: 3px solid var(--deep); }
.xp-brands .xp-head { margin-bottom: 26px; }
.xp-lg { position: relative; }
.xp-lg .swiper { overflow: hidden; padding: 10px 12px 22px; -webkit-mask-image: linear-gradient(90deg, transparent 0, #000 7%, #000 93%, transparent 100%); mask-image: linear-gradient(90deg, transparent 0, #000 7%, #000 93%, transparent 100%); }
.xp-lg .swiper-slide { height: auto; }
.xp-lg-card { display: grid; place-items: center; height: 180px; padding: 20px; background: #fff; border: 2px solid var(--deep); border-radius: 20px; box-shadow: 5px 5px 0 var(--deep); transition: translate .25s ease, box-shadow .25s ease; }
.xp-lg-card--1 { box-shadow: 5px 5px 0 var(--gold); }
.xp-lg-card--2 { box-shadow: 5px 5px 0 var(--pink); }
.xp-lg-card:hover { translate: -3px -3px; }
.xp-lg-card img { max-width: 100%; max-height: 138px; width: auto; height: auto; object-fit: contain; display: block; }
.xp-lg-pag { display: flex; justify-content: center; gap: 8px; margin-top: 4px; }
.xp-lg-pag .swiper-pagination-bullet { width: 30px; height: 6px; border-radius: 0; background: #E3BFD5; opacity: 1; margin: 0 !important; cursor: pointer; transition: background .3s, width .3s; }
.xp-lg-pag .swiper-pagination-bullet-active { width: 56px; background: var(--pink); }
.xp-mono { display: grid; place-items: center; width: 84px; height: 84px; border-radius: 20px; background: var(--blush); color: var(--pink); font: 800 1.6rem var(--disp); }
@media (max-width: 575px) { .xp-lg-card { height: 130px; padding: 14px; } .xp-lg-card img { max-height: 96px; } }

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
.xp-screen { background: #fff; border-radius: 10px; overflow: hidden; }
.xp-screen img { display: block; width: 100%; height: auto; }
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
    .xp-stall:hover, .xp-rc:hover, .xp-btn--pink:hover, .xp-stat:hover, .xp-lg-card:hover { translate: none; }
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
                        <div class="xp-search"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg><span class="xp-typed">bharat tex fair 2027</span><i class="xp-caret"></i></div>
                        <div class="xp-badge-top">
                            <div class="xp-live"><i></i>#1&nbsp;Google Search Result</div>
                            <small>Google Event Schema</small>
                        </div>
                        <div class="xp-serp-url"><b>https://webtecmart.com</b> &rsaquo; bharat-tex-2027</div>
                        <div class="xp-serp-title">Bharat Tex Fair 2027 | Global Textile Mega Exhibition &amp; B2B Expo</div>
                        <div class="xp-serp-desc">Pre-register as international trade buyer or book exhibitor stall. 3,500+ global exhibitors, 100+ buyer delegations from USA, UK, Europe, UAE.</div>
                        <div class="xp-pass">
                            <div><strong>Dates:</strong> To Be Announced</div>
                            <div><strong>Venue:</strong> Bharat Mandapam, Pragati Maidan, New Delhi</div>
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

    <!-- 1B. BRANDS (logo cards slider) -->
    <section class="xp-brands">
        <div class="xp-wrap">
            <div class="xp-head xp-head--c">
                <span class="xp-kicker">Global industry credibility</span>
                <h2>Top Event Brands Embracing <span class="xp-acc">SEO</span></h2>
                <i class="xp-bar"></i>
                <p>Here are just a few of the organisers, global trade expos, and high-growth brands we've helped with strategic search optimisation campaigns.</p>
            </div>
            <div class="xp-lg">
                <div class="swiper" id="evBrandSwiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($brandLogos as $bi => $b): $imgPath = $b['logo'] ?? ''; ?>
                            <div class="swiper-slide">
                                <div class="xp-lg-card xp-lg-card--<?= $bi % 3 ?>" title="<?= htmlspecialchars($b['name']) ?>">
                                    <?php if (!empty($imgPath)): ?>
                                        <img src="<?= htmlspecialchars($imgPath) ?>" alt="<?= htmlspecialchars($b['name']) ?>" loading="lazy">
                                    <?php else: ?>
                                        <div class="xp-mono"><?= htmlspecialchars(substr($b['name'], 0, 2)) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="xp-lg-pag"></div>
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
                        <div class="xp-url">ihgfdelhifair.in</div>
                    </div>
                    <div class="xp-screen">
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAYEBAUEBAYFBQUGBgYHCQ4JCQgICRINDQoOFRIWFhUSFBQXGiEcFxgfGRQUHScdHyIjJSUlFhwpLCgkKyEkJST/2wBDAQYGBgkICREJCREkGBQYJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCQkJCT/wAARCAJuBLADASIAAhEBAxEB/8QAHQAAAgIDAQEBAAAAAAAAAAAAAAECBgMEBQcICf/EAFwQAAEDAwICBgYECAkHCgUEAwEAAgMEBREGEiExExRBUWGSByJSU3GRFTJUgQgWI0KhscHRJDM0YnJzlLLSF0NEVYKi4SU1VldjZHSTo/AmNjeV8Sd1wuJFhLP/xAAbAQADAQEBAQEAAAAAAAAAAAAAAQIDBAUGB//EADoRAAICAQMCAwYEBAYDAAMAAAABAhEDBBIhMVEFE0EUFSIyUmFxgZGhIzPh8AZCU7HB0RYkNENi8f/aAAwDAQACEQMRAD8A+k0IQuJHcATSCapCBCE1SASYSTCpCBCEJoATCSYVANCEKkAIQhUhDQhCpACYSTCpCYIQhUhAhCEACEISAEIQgYkIQkMEIQgAQhCTAEIQkwBCEJMASKaRUsAQhJSxgkmhSwEhCFLAEFCCpGhIQhJgCEIUgCEIUsBFCChSUCRTS7UmAkJlJSAIQhSwQJFNIpDBIppFSAJJpKSkJJNJSMXehCFLGRR3oR3qRiSKaRSY0IpJlJQNCUSpKJUspCKRTKRUlIiVEqRUSpZaEUin2pFQykRKRTKRUspEUk0lLKIlIqRUSpZSEVEqRUSpZQioqRUVLKQikUykVDKRApFMpFSUhFRKkolSURKSZSUMsRUVIqKllISRTSKllIgUipFRKRSEVEqRUSoZQkimkUmUiLu1RUiolSykJIppFSUiKEISKApJlJIAQhCABCEIAEIQgAQhCQIEIQgYwmEgmFSJZJNJNUiSQUgohSCtEsYUgohSCpEjCkFEKQVIhjCkFEKQVkskE0gmrJZIKYUAphXEhkwsg5KDVMLWJky1IQhfVo8AAmkE1SECFxNZ3qp09pyouVGIzPG+Nrekbub6xweC83/ywak7qD/yP+K9LS+G5dRDfCqPM1fi2HTT8ud2expheN/5YNR91v8A/I/4o/ywak7qD/yP+K6fcmo+36nJ/wCQabs/0PZPvQvGv8sGpO6g/wDI/wCKf+WDUndQf+R/xT9y6j7fqH/kGm7P9D2RMLxtvpf1I5wBFBxOP4j/AIr2Nh3MY7tLWu+YBXNqdFk09b/U7tH4ji1Tax3x3JIQhcqO8EIQqQhoSTVIATCSYVITBCEKkIEIQgAQhCQAhCEDEhCEhghCEACEISYAhCEmAIQhJgCRTSKlgCSaSljD5oP3o+SFLASEIUsAQUIKkaEhCEmAIQhSAIRlLKkYFCCUJMASKaSljEhNJSAIQhSwQJFNIpDBIppFSwBJGUlJSBJMkJZUjEhBISUsYkIykpGCRTykSpY0IpJkpKRoSiVLKiSFJSEUiglIlSykIqJUiVEqWWhdqRTSJUMaIlIpnmkVLLRFJNIqWUiJSKZKgT8FLKQyolBKFLKEVFSKioKQiolSKRUspECkUykVJSEolSKiVJREpJlJQyxFRUioqWUhKJUlEqWUhFRKZSKRQiolSKiVDKEkU0ikykRKipO7VFSykJIppFSUiKEISKBHzQkkAIQhAAhYqqpio4HTTP2sb95J7AO8+C0Ww3C4+vPNJQQn6sMJHSkfzn9nwHzVKN8voS5VwjqbXH813yRsd7Lvkub+L1uPF8c0jvafUykn/eS/F22fZ3/2iX/EqrH3f6f1Fc+x09jvZd8kbHey75Lmfi7bPs7/AO0S/wCJH4u2z7O/+0S/4kqx93+n9QufY6ex3su+SNjvZd8lzPxdtn2d/wDaJf8AEj8XbZ9nf/aJf8SKx93+n9Qufb9zqBjvZd8kwx3su+S5Y07a/s8n9ol/xpjTts+zv/tEv+JUlDu/0/qJufY6ux3su+Slsd7LvkuV+Llr+zv/ALRL/jT/ABbtf2d/9ol/xKkod3+n9Sbn2OqGO9l3yUgx3su+S5I03a/sz/7RL/jUhpu1/ZpP7TL/AI1aUO7/AE/qTc+x1gx3su+SYY72XfJcn8W7Vj+TP/tEv+NP8WrV9nk/tEv+NUlDu/0/qTc+x1gx3su+SmGO9l3yXIGmrV9mk/tM3+NMaZtX2aT+0zf41SUO7/T+pDc+x19jvZd8kwx3su+S5H4s2r7NJ/aZv8akNM2r7NJ/aZv8apKHf9v6k3LsdcMd7LvkpbHey75LjjTNq+zSf2mb/GpDTFqHKnkHwqZv8auodyW59jrdqmFyPoqqpBut1fMMf5iqcZY3eGT6zfuJ+C27dcOub4pYjT1UWOlgcclueRB/OaewqlH1RLl3Og1TCxtWQclcSGWpCEL6tHgAE0gmqQip+lN23Q9af+1h/vLwnpfivc/S07boOtP/AG0P95fP/TeK+u8Ef/r/AJnx/jivU/kjc6XxXRhpomMDp9znuGdoOA0ePiuLDIHTRgngXAfpVooYbd0Mlbdql8UTpCyNkfNxHM/BcP8AiLX5sEYYsF3Lt149EcWk06m3/wA9Dl1kLYmiWJzizOCCeLT+5avSrp3iCKjMzIJumppYelif4Z/XlV/pvFdfgOuyanT3l6p0Z6rAoTo3mS+u34hfUMfGKL+rZ/dC+Uo5vyjePaF9WxfxMX9Wz+6Fn43/AJPzPa/w+qlP8ia4jNbaYkuv0QzUNrdcTJ0PVBUs6Xf7O3Oc+C7a8r9Jdqt9Hrr0fVdNQ00NRPe3dLLHGGvk/Jn6xHErwUfSt0Xu76y03p+pbS3e/Wy3zubvEVTUNjcW9+CeS2bLqGz6ihkns10orjFE7Y99LM2RrXYzgkcjheX6kiq6L0qXS7V+grrqO3Pt8FNTyQUzJWNcCS4+sfHsVs0brfRVVbKqa3CksDaecQ1dLWRso3wzY4B7SQMkDh8FRN88lymljp4nzTPbHHG0ve9xwGtAySSuVZtY6c1FO+ns19ttxmY3e6OlqGyOa3vIB5KP44aXqPyP4w2OTpPU2ddiO7PDGN3HPcqFQ2qnt3puu9LaKWmoS7TjejbDGGNDy8gHA8cfJUgbL3Xa60rbK/6OrtR2mmrAQDBLVMa8E8gQTwXcY9sjA5jg5rhkEHIIXhGib1o7TWlH6a1XYKj8Y3OlbW001sfNLXyFx9dr9p3A5GDngrV+D7ca2r0XVUVbHLEbbcJ6WKKU5fFGDlrD/RzhUmJSs9OQhCpDBCEIAEIQkAIQhAxIQhIYIQhAAhCEmAIQhJgCEISYAkU0ipYAhCSlgNJNIqWMSEIUsAQUIKkaEhCEmAIHFwHihLODnuUgzy+y6pq6OosMlU+41jJ/pFsjIGOlc4tmw0kDsA4LJJq24VVZe46KSspDU3KhoITUxlrqUSR+s8NPI8DjxIXctVs09ZqmilZfqUuohUtAfUxjPTP3Ozx7DwTq6DS9e+7OqL3Ru+k3xSuIq4wYXxtw1zDngRjOU2yTTa+g0zqOigjvN8j6WobTSxVkcs8FU549UB5GGuzxyDjmMLD6PXw3Jwq6iW+SV7Z6nc+V8nVnASvaAPzTgYGPBdW1WWCsr6Wsq9TOvhondJTxb49jH4xvIZ9Z2O0967Vis8dgtrLfDI+RjHyPDn88ve55/S5S2NHRCELWqrjR0JaKqspqcu+r0srWZ+GTxWbLNlJc86isw53e2/2qP96Pxis3+uLb/ao/3pUxWdBC0GX+0SODWXW3ucTgBtSwkn5rYqq+koQ01dVT04dwb00jWZPhkqWhpmdIrFTVdPWR9LTTwzx5xvieHjPdkLKpGal3qn0Vrq6mLHSRROe3dyyAuHe9QVlAWiHo+Nskq/Wbn1w5gH3esVZJY2TRujkaHMeC1zTyIPYuFJYLBa6adtQWRRVMfV3Oqag/U9hpceA8AkqAlqI3NnUn0Ny6o2WZkL2mnbJndnjx+C5l61DdLbJNHAYpur1dPG/dHxfGYi+Tl28Dhdm20dqlgDKSpbWRxytkB6x02145ccnHwW1JaqOWd074Gukc9shce1waWg/IkJWl1HRX26ucK+61L3xfRFJR9LE7HrPe0+sc9xJAHitL6fu1Zp2WqhulPFX0UzYp+iha9j9xbjGeWA75hWVmnbXDTx07KRjYY2hrWdmA/eB5uK1q9+nmVFQytq7fDNMGCZklQxjjtOW5BKVoDn1Nbdo74y2C4VBbFSRyvkhoWydI50jwd3Y0YaOXit3UVXcaZ1K2idJHC7eZ5YYBNIzAGMMJ4tznJGT81nrrZbaiX6UnldEWxBpmZOY2lgJIyQcY4n5rFMbFqKWOOOvpqieEFzDS1Y6RoPA/VOcKWx0aVPcbneZGw0dwpYOipGTvnjh6Rsz3EjgHcWt9Xj29nYpWfUVRczO9zGMa23RVLWgcnl0gd93qBbtRpm11EcMZgdG2FnRN6KRzCWeycHiPisV2s1kMUc1eY6SOJggD+n6FpZ2MJyAR4FK0x0ysyaxuZnaGVYExgpXQ0opNzaiSQZLS/wDN8OK78NXdbhPUVlPXQQQU1U6n6tLENrw0gEufzBPHGPBKSp0nKyWN1xtOyURhwFWwfU+pj1uGMLHNJpGorTWSXO2mQuD3NFcwMe4cnObuwT4pOuwI1PxouMdTBI5kb6SOerFU1rPWEUcrWNc3+juye8ZWSnvdfdjHDT1kdKBHLO+eOESue1sha0Nb28Bkrdhr9LU7y+O52oOPSZ/hcZz0hDn/AJ3aQFOLTlmmt9NDSxhtPCD0ElNKRhrjkgOaeRUtrsUkzVrb7UN0c+6U88clQGhvSxREgu37SQx3HPge1cx+oroI5KXrMomZXRU/S9TAm2PYXZMXLmOB7QrHPQWt1GyyPMTI5GYZTiTa4tBzkccnB7Vh/Fe2dE5nRS5dI2YymV3SFzRgHdnPAEhSml1RVM576+5S1MNvjr3wOZSmqlqH0g6V/rYDRHyHj2rn1Wq7k+ic+ilo5Zepska/o3BjpOn6M8DxAx2dhViqNPUNRFDHIJ90OQyUTOEgB5jcDkjwUZ7RaKen3zwwwwRRNi3Pdta1jXbhxP8AO4qbj2KSZxH6ouFb1xlDEGzQwwboi0GSKR0hbIACQHEAcB2rforrUuslwndUtqJqUS7XOgMTxtbkB7DyPw4KTaPTl4qax0EtFU1FU1jpzTztc87D6rvVPAg9qyGOy2ankop6qmgbUBxkFTUAPlyMEkuOTw4KZU+Ehq+5yarVlT0NOYYJonPoJalxlgIBe1gIxnnxJ4LFPeblS2emqJLhUtfUVMMRkkt4a6NrgSdrB9bsXXmn07VxsY+vtz2RxOgbiqZwY4YI59wSt1LZXCOKjrI6rontlY0VXSljmggEcT3lTa7FJPucKPUN0rG0LIqqURzun21ENEHvmYzGHdGfq8Sc/BXCDd0Ee97nu2jLnN2knHMjs+C0J9OW6VzD0ckTmPe9pikcwgv+ty710Y4xFG2NpJDQAMnJ+azyNPoaQTXUai4qRWWghE9dDG7kXZKiMd0lEqUtqbOjbbG17BLVA8eIZ+9dUUVK0begiA+AWjqGarhoXGlrKajAaS+aXJLR4BU2/NfPbWuZfqI1rt7Xkuc1jmuiLC7h+cAQe5fS4tNjxrakfP5NTknOua/Y71XNZq2vloaGoArInFjmNBLd2M7SeWcLnuaWOLXAhwOCCufpSy0rdQwSwXGnlEc8sz2MJzJmNrRnxyM/erDqKFsVeHtGBI0OPx5LzfEtLGMfMgqPS0Ook5bJM5hSTSK8I9ZCPNIplIqWUiBSKZSKkpCKiVJRKkoiUkykoZYioqRUVLKQlEqSRUspESolSKiUihFRKkVEqGUJIppFJlIi7tUSpFRKllISRTSKkpEUIQkUCSaRSAEIQgDm7ev3h28ZhoQNo75XDOfubj5rpLn2n+NuQP1uuPz8NrcfoXQWmTrXYzx8q+4IQhZmgIQhIEC06K8UVwpJaunmDoYXvZI4gjY5h9YEHuwtxec3981svdz05AXNOpHxSUxH5pcds5+5oz966NPhWVuPr/x6mOfK8aT/AL+xdaXUNsrbKb3BVtfbxG6QzYIAa3mcc+xTt99pLlXVFFT9KZIIopnFzMAtkBLceOByVDroBQ3SbQ1Owsp7lVxVEQA4Npuco+bMf7S6bdPUV919fmVhnMMdLSAQxyuY3JDsE7SMkY4LqemxpNt8Va/Dg5vaJtpJfZ/uXtP7l5vbrhU2i2Wy/wBRWTTUtDVT26tdI8u/g5kLWSO7ywhvHuKtWjxUVNHPeKkydJcpTPGxx/i4uUYA7PVGfvWeTTeWrvg0hn3vbXJ1bVdaO80bKyhl6WFznMzgghzSQQQeIIIWCj1FS3Crjgo4qqoje6VjqlkR6GN0ZwWud355d+FTrzcp9F3a6W+kaT9PAT25o5NqnEMkb+kP+a3ZKH6AvWm7VBVGCKK3Voc8u9UvDATIR24JJWy00evfoZPPLp26l4c7Ywu2uOATgDiVp0d4p6mno5Jmy0UtZkRU1U3o5SRklu3vwM/BUDS89NarnRU9T0FZXVcUjW3CiuhqBOQ0kukjJ9XPyBWnBR0FfbtA1l2kJbK6WKWeWocwEbXkAuyMce3mtFo4rhv++f8AozepdWl/fBfbjrix2qomgqKmYmnOJ3xU8j44P6bgMBd2CaOoiZNC9skcjQ5r2nIcDxBC4GpWyVVBSWihraSkjub+gkke8F7odh3CIfnvI4eAOV3KGjht9FBR07dkEEbYo25zhoGAsZxgoprqaxctzT6GdSCiFILNFkgmkE1aJZILm3pnVmRXWMflaM5fj8+En12/t+IXSWvddotVbv8Aq9BJnyla43TMsi4N5hBAIOQeIKyDktO2bhbqUO+sIWZ+O0LcC0Sp0Zt2i1IQhfVI8EAmkE1SEUz0wHHo/rj/ANtB/fXzv0nivob0ynHo8r/66D++vAaSxXavgbPS0E80TuT2AYP6V9P4Xnx4tNuySSV+p8v4thlk1FRV8GASYOQeI4ro1Y+mqKKNkgaY3FxZnlnn+nisTtMX1uM2qqGTgeqOfzWai0xdW1TDV2mrMAzvAbx+qccj34V6vLpc+2aypSj0do48WmzQdbGKtquho4qPpN7mMEZPcM5P3k4+S52/xVog0/SyuoejtFcD0WZ3SMLmF20YOG8duc8v1KMun2xwxsj09cJndamL3fUd0G78mASeeOP61Om1el0uNxU03y3yuX+pc9FmyO2itRyflG8e0frX1zD/ABMX9Wz+6F8l3K21NqrGsngmiY92YjKAC5ufBfWcH8RD/VM/uhY+K5o5YY5wdpno+D4njnOMlyZFS9eaZud91HoyuoIWSQWq5mpqnOeGlkewjIB58ewK6IXjI99qykXW7ekW2XeqbR6btN6tr3E0z4q3q8sbcfVeHDBOe0LU0XoOsluN+1FrOgtctfe5Ynmgaxs8NMyNu1oy4Yc/vK9CQqJceTkM0fppj2vZp2zNc05BFDECD3j1VxKfTNzZ6XKvUjomC2y2llI2TeN3SB+SNvPl2q5JqkFIoVxvvpMkkqKS36PtcTy9zIK+W5AxsZng8sA3Zxxwu3oHSLdF6djtzqg1VVJI+oq6kjHTTPOXO+HcrFhMKkKgQhCoAQhCABCEJACEIKBiQhCQwQhCABCEJMAQhCTAEIQkwBIppFSwBJNCljFlBRhClgJCEKWAIKEFSNCQhCTAEh9ZvxCaQ+s34qQPhXRttgrPTnT2+phZPTm8ytfFINzXAPdwIPMcF9pDSOnA3YNP2cN7upRY/ur4+0KwD8I6Np44vdT/AH3r7YCvK+hnjXUoGpvQhorUUUjmWttqrHD1au2uMD2HsOGnafhheIXPWXpK/B71FFbLpXyX+xSEupzVEuErM8drzxa4dxJC+riqL6ZdEQa70HcaB0bTVwRmppHkcWSNGf0jIURlzTKlHsdPQGv7P6RbDHd7RLwzsmhd9eB/suH/ALyvEfwxowI9MTD6xdO0nww0rzP8H7W8+i/SJRU8krm0FzeKOqjPLJOGO+Idj5lepfhiN/5L0048xPMP90KlDbkRDlugy4fg96Zs1X6JbJUVlot1TPL0znSzUzHuP5R2Mkglej/ijpv/AKP2f+xRf4VTvweQB6H9O491If8A1HL0dYTfLNIrhFE1v6JdOaloYpKW00NHcqOVk9NPTxNiILXA7TtABBA7V5r+GHHnTunpeRbWSD5s/wCC+hTyXgf4XzM6Nsz+PCvI/wBwp4m3JCmvhZ3/AMFuIR+ielf2yVc7if8Aax+xeuryn8GNpb6IbZ4z1B/9Qr1YKMnzsuHyoRXiP4W0e/0b0cg5x3OLj4Fj17cV43+FVHv9FhdgepXwH+8P2pYvnQp/KzkfgiMI0ZeJDxLq8Dn3MXvC8N/BIGNB3E99eeP+yF7kln+dlYvlQjyXxd+EvA1vpdrgB/GwQE/e3C+0Svjn8Jln/wCr5zyfT0yrS/ORn+U+kdXUol9E9xp8cBZiMfCIL56/BKiD9f10uPqW1wz3Ze39y+kdTsB9HtzZ2fRTx/6S+dvwRGg6yux7RbxjzhEP5cwn88T6vXlX4TEXS+iW4/zJ4Hf769U715r+ESzf6I73z9URO4f0wufF86Np/Kzzb8Ey0UFwt2oZKyhpaktmia0zQtft9U8shfQH4tWL/Utr/skf7l4f+CEALFqB3aaqMf7hX0Cq1TfmMnD8iK/e9A6Xv9snt1dYrc6GZpaSynYxzT2EOABBCyaNsT9M6Xt1mc4PNHF0IdnmATj9GF3CuTqm7OslhrK6JodOyPbAz25XHaxo+LiFz238JtSXJ8z+lP0i1lq9OdDfYmyihtbhTRHk2ZjXbZiO8biR9y+o6OrhrqSGrp3h8M7GyMcORaRkFeG+nv0aBvowt1TTs6WssLR0zwOMjX/xrj/tHK7P4NGtfxk0ObRUSF1ZZnCI55uhPFh+7iPuXRlip4lKPpwZY24zcX68nrxVQ9LkIn9Guo2Hl1J7vlxVvKq/pNbv9H2oW99BL/dXHD50dEujPn/8EuMHVt6lxxbbmt+cjf3LY/C0hDb/AGCYDi6lkaT8HD96X4JDSb/f3Y5UcQz/ALa2fwt2/wAO067/ALKYfpC9Jv8A9v8Avsca/wDnPVvQxQUw9Femt1NAXOow5xMYJJLnc+C7GpPR/pzVFK6GttsUcnHZU0w6KaI97XNwfmtL0QAD0YaZA+wM/argV5eSTWRtdzvhFOCTPnOH0han9C+uGaY1NcJrxYZC0wVE/GWOInAcHczjtByvodkjJY2yMcHMeA5pHaD2r5l/Cinbd9a2a0ULemrWU+xzWcXbnu9VvxX0dY6SSgslvpJjmSnpoonn+c1gB/SFrqorZDJ6vqRgk90o+iN48lOkn6tVxSnk13H4KCgQuKMnFpo6XG1TOrfrZW1bzUQVoELgPUMYcAMKtV9JLRzU7QWPbKSDspmnAAzx4KwUF4dSs6GZvSw8gO0Ldp7ja4HGVr5N3YHNPBfRYtbinG26Z4WXQzjLo2c3Tz4xcImRmQjY7J6mI+Pi7CV+qW1NeQ05bGNn39q27hqEyMMdK1zc8C93P7guJxPPmvO8R1kZx8vGzv0Gklje+QJJpLxj1kIqJUjzUSoZSIlIplIqSkIqJUiolSURKSZSUMsRUVIqKllISiVJRKllIiUipFRKRSEVEqRUSoZQkimkUmUiLu1RKkVEqWUhJFNIqSkRQhCRQFJNGUgEhCEAc1zhb7uXOOIK4NbnsbM0YHzb+kLpLHUU8VVC+GZgfG8YIK0Gm4231XRuuVOPqvYQJ2DuIOA/4gg+C0rf+Jn8v4HTQud9O0o4Piro3drXUcpI+TSEfT1F3Vn9im/wI8qfYfmR7nRQud9PUXdWf2Kb/An9PUXdWf2Kb/Al5U+w/Mj3Ogsb6aCSaOd8MT5os9HI5gLmZ54PMZ8FpfT1F3Vn9im/wI+nqLurP7FN/gQsc10Qnkg/U3TTQOnbUOhiMzGlrZSwbmg8wDzAUmQQsmfM2KNsrwA+QNAc4Dlk8zhaIv1F3Vn9im/wJi/UXdWf2Kb/AAK/LyE74dzUvWmZbvG6hZXNo7XMAKmlhpmZl9bc7D+zd28F3mMbGxrGNDWtAAaOQAXO+n6L2az+xTf4E/p+i7q3+xT/AOBaNZJJRaIWxNtG/JTQTSRSSwRSPiO6Nz2Alh5ZBPI/BSdTwyStmfDG+VgLWvcwFzQeYB5jPatAX+i7q3+xT/4ExqCh7q3+xT/4EKE+wnKBsUlntlDI+Wkt1FTSSDD3w07GOcPEgcVOS12+ekFHLQUklK3lA+FpjHwaRhao1BQ+zW/2Gf8AwKQ1BQ91b/YZ/wDAtKyXfJFw6G71OmcYSaeE9Acwkxj8kcY9X2eHDgtgLljUFD3Vv9hn/wACl+MND3Vv9hn/AMCNk31Qt8TphSC5P4xUI7K3+xT/AOBP8ZKAdlZ/Yp/8CpY5dg3I64TXHGpaDurP7FP/AIFIaloewVp//wBKb/ArWOXYlyR1wudeX9b6K0RnL6o5lx+ZCD6xPx5D4rCbrXVnqUFBJCD/AKRWjY1vwYDud+geK27dSR0LXudK+eolIMs8mN0h+7gAOwDgFpGO3l9TOScuEdNoAAAGAsg5LCx4KytOQqRDRa0IQvqkeAATSCapCKP6aTt9HVef+2g/vrw+wVMrdNagLZZG7I4y3DiNvrdncvbfTecejevP/bwf314vpCzVlx01exE1jG1TWRxySPDWktOTk9mF6kpwh4fuydN0f90eRljKWsqPXa/9mT0zdp7tDV2mvqZpIRC6ojkLzuiczjwPdjK6mo7hcaOjuUcVsJt8kDRT1sLjhjOByTnitPT8ljsFwjtYqoa+sq8x1E4OIYwBkRg9uXYyVo1lm1DcZJ6i/Vv0dSNznppcMx2NYwHB8FwZMeDJrXkaUcfDSafP3ilzbr+7Ki8kdOoJty6cen2bO/vZIysbUVUkEAtFO98jSctGcnHieX3rlviorlTsuNiqa9nVZoxUU80pJ2lww4cVsXanngttzkkjc1n0PTsDjyLg7l8VxtFztoKe43CokY2BwZStaXDL3ucCOHcBxyowYq089RjfKaSXo7StNf3RWSX8WOKS4d8+qMOqah7tT1jXPc4Mnw0EkgDhyX1jB/J4f6pn90L5D1TKDqqvLSCDUcCDnPJfXlP/ACeH+qZ/dC9fUKtLgX2/4Rnof5+R/f8A5MiqD9U1tFr6e2VQZ9DyR08UcmMGGpeHFocfZfjA7iB3q3qu1OlhcbhfXVux1Jc6eCJm0+ux0YPreBBIIPeF56PVZp3XU9cNaWm0UGzqQmMVdIRkl5jLmxt8QBk/EI1ZqC60twbBZdjxbYBcLi0s3F8WcCIdziA92f5vitiDSL6IWJkNQag0NW+qq6ic4kqXuY4OeccNxJ5cgFht2hukfW191rrg24XCd0tQKOukjiDfqxsAGMhrABn4qiXZm1Zd6kWi1TWetMH0jX0kAnYwPIildxIB4Zwome76f1BaaGpuzrnT3J8kWyeFjJYi1pdvBbjLeGDkdq0JtB1cun6XT75Y5qGiusNRCXzPDzSNdu2FwwdwyQMHu4ro2/RkFh1Ky6WmGIQzQmGpZPI+R7MHLXRueSRnkW5weB7FSFya9tmver2S3OnvD7TbjM+Okip4WPklaxxaXvc/PMg4aOQUr5f6rSp06LtdaRsVRWvhq6l0YiY9nRPc3hx2nIbyUqS16i0y6els0NuuFsklfNBFUzuhkpS8lzmZDXB7MkkciM44rZqrLdbnPp6qrnUJmoKt9RUtiDgzaYnsAZniSNw4nHLKoDVn13a6++WSgst6oas1NQ9s8cLw9xYIyfu4gK2rkXazSVtys1VAIWNoal00uRglpjc3hgd5XXVIECEIQMEIQkAIQhAxIQhIYIQhAAhCEmAIQhIAQhCTAEimkVLAEk0lLGCEIUsASQhSwBBQgqRoSEISYAo/nD4qSj+cPipA+L9EtA/CXAA4fTdT/eevtAL4s0K/d+Eo1zjzvdTx/wBp6+0wqy+hnj9QKg9oeC0jIPAjvUytK8XCO1Wqsr5XBsdNC+VxPLDWkrL1NT8/bk0UOvKhsHq9DdHbNvZiXgvoP8MA7rFptxHE1Ev9wLwnRVsn1r6S7bTRxlzq64iV47mb97j9wBXuv4YbsWjTbRyNRMcf7IXTL54nMvlZavQdcdTQ+iywR0NhpKmmbC/ZK+t2F43u4lu04V7+ltYf9GaH/wC4j/CuB+D6c+h/TePcPH/qOXoq5ZvlnRHojDRSVEtJE+rgbTzubl8TX7w09wPavDPwvf8A5HtH/wC4f/wK95Xgv4XrgNE2hvabh/8AwKWL50Kfyssv4M3/ANIbX/XT/wB8r1ULyr8Gb/6Q2v8Arp/75XqgUZPmZUPlQFeRfhRsDvRNVEnBbWU5+PrY/avXSvHvwp3BvoqlB5urYAPmUsXzoJ/Kyr/gw1t+ptD1jLZZ6ath664l8lX0RB2jhjaV7D9K6v8A+jVD/wDcf/6rzX8Ev/6f13/j3f3Qvb0Zn8b4DEvhRWTddX/9GqH/AO4//wBV8sfhBzV9T6VYXXKjjo5jDTjo45ukGN3POAvsxy+PPwln49MMZP5sFN+tXpn8ZOb5T6g1K0DQ9ybjgLbIP/TK+dPwRGj8br2ccRQM/vr6K1O//wCBLm8cP+TJD/6a+dPwRHY1dem+1QN/vpY/5Uwn88T6r7151+EF/wDSO/8A9XH/AP8ARq9F7F5x+EI7b6I77wzlkY/9Rq58Xzo3n8rPMPwWau9U9lvgtdspqxhqYy90tT0W07eQ4HK9y+ktXf8AR63/AP3D/wDqvIPwQ/8AmDUH/i4/7i+gVWpf8R8EYV8CNG01FzqIHuulFBRyh2Gsim6UEd+cDCrmrpbhcL9ardbaKGtFG76QqY5Zejbwy2Ljg/nZOPBXB7gxpc4gNAySewKt6NzcI66/yA5uc5dDkcWwM9Vg+/BP3rnXc2+xqXN+prpb6mhqtOW58FTE6KRpr+YcMH81fMfo/uNb6GvTD9H3YCngfJ1OqaDlvRvwWuB7cHacr7JcF85/hW6J3RW/WNJGA6Mikqy0ccc43k+HFvyXRpppt430Zlmi0lNeh9EZBGQcjsI7VXPSMN2g9QA/YZv7pXA9Bmtvx10DRyTSb66hxS1OTxJaPVcfiMLuekkgaB1AT9gl/urm2OGTa+5upbo2jwj8Ef8A561D/wCFh/vlbX4W4HTadPbtm/WFq/gj/wDPOov/AAsP94rY/C3d/CtOtz/m5j+kLuf/ANf99jlX/wA57H6J+Ho10z/+3xLj3v0k1TL0/TkXUbDcXnbDLdnnbKDyfGB6rvgSF1/RMQfRppojj/yfH+oqHpQ9HtD6RNMz2+ZjW1sQMlHPj1opOwZ7jyI/cvP+HzWpHZ8WxbTl6Q9D1tsN7l1Ld62W+X6ZxkNXOAGsJ7WN7PAr0FeAfg9ekq4G4zaE1DM989PubSPlOXNLDh0RPbjHBe/qNVGcZ1N2VglFxuIJFNJcrOgg4KJCmVEqWUiOEYTKRUspCKiVIqKhlIRSKZSKllIgUimUipKQlEqRUSpKIlJMpKGWIqKkVFSykJIppFSykRKiUykUihFRKkVEqGUJIppFJlIiVEqTu1RKllISRTSKkpEUIQkUCEISAEkIQAIUJpmQRukkcGMaMlzuAAVKu+vZC90VtjaGjh00gyT8B+9a48Msj+EqMG+hd93ijf8Azl5Y/VV7e7cblMM9jcAfqUfxnvX+s6j5j9y6fYJ90a+Qz1Xf/OKN/ivKvxnvX+s6n5j9yPxnvX+s6n5j9yPYJ90HkPueq7/FG/xXlX4z3r/WdR8x+5H4z3r/AFnUfMfuR7vl3QeS+56sHeKlv/nLyf8AGe9f6zqfmP3J/jRe/wDWdT8x+5P2CXdB5D7nrAf/ADlIO/nLyX8aL3/rSp+Y/cj8ab3/AK0qfmP3JrQy7k+zs9bD/FSD/wCcvI/xqvg//wArU/MfuR+NV8/1rU/MfuVexy7k+zSPXQ/xUg/xXkH41Xz/AFrVfMfuR+Nd9/1rVfMfuT9jl3F7LI9gD/5yi+XaPrLyH8bL9/rWq+Y/ckdVX087rUn7x+5UtJLuC0kr6lg1frKrjrJKC3ymIR8JJG8ye4Lh1x1RboIqitddKeGfjG+Qua13wXLjq5GVzKyT8rIJBK7d+ec54r0HXfpQotU6dZbKWhmjle9j5XSYwwt44bjmvTw4cag7fKPa2TwvFjw4lKL+Z9ivdU1D+K/4x/S03VOn6vs6Z2/d+5dKz6X1PeaC21sV8EUdylfDAJJ3A7m54H44Kdj1Rpo6I/Fu+MugPWjUb6RrT8BkqFdra3waZtNqs4rGz2yvfUxyTNAyzcS3JB54IyuiOLD8z7fuc2TJq5N48eOnufO3jbXH7mKl0/qmoprhUS3SSmZQ1LaR5lmcN8jnBoDe/iQs+otPX3S8Uz6rVdJJUQEbqWOqcZeP80hbus/SZQX/AOi4rfSTU0EVUysrAWgGWQEcsHjyPNZNfekKz6st9TFT1N3a57mvjp5IIhE1w73D1v0qnjwJOnyYY8mvlkxvJjSjJ8qlx0/35ZHQus6i4VH0dcHB8m0ujl5F2OYPivQo3ZC8X0HRy1OoYZmA9HTgvc7u4YA/SvZaf6oyvKyJJ8HL4zhx4838P1LghCF9MfEAE0gmqQihenM49GlwP/b0/wDfXhWkqbrViu0vQUdS+nkgEcdbUGKIBxO784DPAL3P07nHoyuH9fT/AN9fMcV0ngt9VQNLegqXsfICOOWZxg/evpvDIb9NX3PD13Ge/sbDIHVl2FMxjY3STbAynaZA3j+aBxcO5dXVVgks0FDU9bqZ4qoPaG1LNkkbmHBBAcRjt5rhWy6VNnuFPcKN4ZUU797CRkA8uXwJWxdNQVF1p6eldBS01PTOe6KKnj2Bpecu8Ty7V6cotyT7HAoLa+5u1Daj8VqWsfJGWS1kkGfW6Q7WNOCc4LePAY5rHp6yG/z1cRrY6OOlpZKuSSRhcNrMZGB28Vz33WeS1w2x23q8U7qhvD1tzgAePdgKVsvNTaet9W2fwumfSybhn1HYzjx4BPZti1HgNttWEvRMrC2CZ08QeNsjmbS4fDsX2vTfyaD+qZ/dC+HYnflGf0h+tfcNN/JoP6qP+6F5PjHSH5npeFxqUjKhJUu9aLv+oLxPNPqipo7cAOggoxsI/pHtXgzk4rhWe7hhGbqctqLqheZaLu10smrrxp2vukt0oqKAzieU5dHgZwT8Oxalgo7/AOk81l6nv9baqBszoqSClOAMdp7/AP8AKzWotLaue34HXLw9xbc5JRSXP49OD1hNec6Mvd+fVXvSNdXtkulAwmmrZG7tzTwBcO3GR81q3TQd/oLNU3ar1rcfpCCN0x2u2wgjjtA7la1Dcd0Y3/wT7ElPZOaXSuru+h6gmDwXknWtXa20dpypoZ6uGd9S+Ornpn7CYwdoeR2rQ11ZrzpOOhgpNYXqsr66YRQwGTGRyzwPeQk9XS3KLrguHhylJY5ZEpc8deh7UhatqppqK2UlNUTOnmiiaySVxyXuA4k/etpdq6HmNU6QIQhAgQhCQAhCCgYkIQkMEIQgAQhCTAEIQkwBCEJMASKaRUsASwmkpYwwgoQpYCQhClgCChBUjQkIQkwBIfWb8U0uRB7lIHxFoGUH8Iink7HXqo/S96+2wvnt/wCCjK2+PvNLrGemqjUuqWPZTDLHFxcMHPivWrdZtbUdK2Go1Pb6x7RjpZKDDneJw7CrI06oiCa6lrK+fPwlfStTxWx+hbDMKu41pDKzoPW6Jnu+H5zj2dy9Nu+i9TahidT3DWtVSUzxh0dsp2wucP6ZyR9yNHeh3R+iJut262CauPF1ZVO6WUnvyeR+ChUuWOVvhHnv4OHoZqdHwP1RqCn6K61UfR01O761NEeZPc536AuL+GK7FHphnfLOf0NX0hhea+mH0OD0rutm+8Ot7aDfgCLfvLsePgnGdz3MHH4aRL8Hhwf6H9PY7I5B/wCo5ekLz3RPo+1LoTTdLp+26koZaWlLyx09CS/1nFxyQ7vK7v0drP8A1/av7Af8SylTdlR4R36yrgoKWSpqZBHDGMucewLwT8MGTGlbFHn61c4/Ji9A1PoLVmrY6alrtXwwUUU8c0sFLRbOn2uDg1xLs44LH6YvRKfStQ22l+lvo4UUr5c9Fv37m4704NRkmxStpo5v4MTt3oht382oqB/vlerLzfQXo31L6PdPMsVs1JQTUzJHytM9ES4FxyRwcrF9H61/17aP7C7/ABKJ05NlRtKiw1NTFR08lRO8RxRNLnuPIAdq8Z/CtqG/5Lqfa7hNcIcePqvKtOrNDay1dQC3VOr6Wjo3OaZmUtCWumAIO0ku5cFl9K/oyPpM0xR2P6S6gKaoZOZOj37trC3GPvShUZJtilbTSKN+CQ7doO5Nz9WvP90L3Mqh+iD0Xn0WWattv0n9INqZxOH9Fs2+rjHNX3CjK05tovGqjTIuXxp+ErJ/+sU3HgyCm/VlfZhC8U9JH4ObfSBq2q1A/UT6MztY0RCAO27RjnlVgmoytk5YuSpF91bKG+jW6S9n0S8/+kvnn8EV4brS6s7XW8H5PC+lbzps3fSFTp01Rj6ej6oZw3JHqgbsfsVC9FPoFi9GGoJbvFfJK7paZ1OYnQhg4kHOc+CI5IqEo9wlFuSZ6wvL/wAJCXovRJdeP1pIWfN4XqCqnpL0M30iaVm0++tdRNlljkMrWbiNpzjCwxtKabNZJuLSPJPwQn5smoWcOFVEf9wr6EwvPfRJ6JI/RXDcYYrq+vbXPY47owzZtBH7V6EUaiSlNtCxJqKTKt6QrlJT2SO10j8V95nbb6cdvr/Xd/ssDirDR0kVBSQ0kDQ2KCNsbB3NAwFyK3S/X9YW7UNRWOdFbaeSKnpNvqtkk4OkJ79owF3Vk6pJGketiK4msNO0+rNNXGyVTQY6yF0eT+a7m0/ccFdoqJ5rNOnZVWqPkL0Eann9HnpJm0/dXmGGtkNFO1x4MmBw133nh96+kPSm/o/RzqN2cfwCX9SpGvfwdKLWWqqjUNPepbZJUbXOjjhBw8fnA558lf77pee/6Jn05V3E9NUUoppKwM4uOBl2O84XTnyQnOM119TLFCUYuL/I8A/BIeBqK/M45NFGcfB62Pwtn/8AKuno/wDsJj/vBekeir0JR+jC8VlwivEld1qn6uY3RBm31g7PPwR6V/QwPSdc6GsfeXUIpIXRBgi37snOeavz4e0eZfBPlS8nbXJ3PQ+4O9F+mSPsDP1lXAri6K03+KGlbZYOs9Z6jD0IlLdu8ZJ5feu2V5+V3JtHZjVRSZ8oemq0Vfo69LFLqmgjLIKqVtbGWjA6QEb2ff8AtX0/Z7rTXu1Ulzo5GyU9XE2aNzTkYcM/8Foaw0dZ9b2h9rvNMJoSdzHA4fG72mnsK4mgtA3LQEBtlJfjXWcPLo6eqh9eHPMNcDy+5bZcscuNJ/Mv3Ix43Cbroy7BJMJLhOpESkUykVLKQiolSKiVLKEVFSKioKQikUyolSykRKRTKRUlIRUSpKJUlESkmUlDLEVFSKipZSEkU1EqWUiJSKkVEpFIRUSpFRKhlCSKaRSZSIu7VFSd2qKllISRTSKkpEUIQkUCSaEgEkSmovPBAFJ15d3mSO2xuIaAHy47e4KnLrarc52oKzd2OAHw2hcle7giowVHbBUgQhC2LOlZ9NXjUAlNqt89YIcdIY8ernlnJWO62K6WOVsVzoKije7i0SswHfA8irhoOmZWaL1RC+4xW4OfTfwiUuDWcT7PHwXZZaKPqOmtMXC4uukVxrTVNq2E9GIwCOja53HJI4jxXXHTqUU11f8A2eVk8QlDLKL6J/ftfXoeUIXpdzi01VQXOiqzbKZ8B205o6GaOSncHY2yOIwR4ntW/HQU9Lraj01DpCkqLVujHWHwOc+Rpbky9Jyx4ckvZXfUfvNVe379uDzL6Iqvon6WxF1Xpehz0g37sZ+rzx4rTY1z3BjGlznHAAGSSvSfoqxwW+Sprba2SKPUL4XiCPMnQgH1BjjjwC2Q2N9VR3a0wabq7fDcY4zJT0ro5YA44a1zXcz496PZvuHvH/8AX++x5dJG+KR0cjHMe04c1wwQfEKK9XfS0V81nqmpuFJQ5tDHvhYYHFshL8F8jW8X4/asNupdM3m9afOygnqpap8c7KWlkip549hOcOGNwPcj2Xs/76B7yVcxfS3+lnmEcbpZGxsG57yGtA7SVYR6OdWkA/QNZg9vq/vWjqO6Q3K4uNLbqW3wwF0ccdO3GQHHBce0+K78NVP/AJKql3Tzbxd2AO6Q5A6PvyohCDbT9DfNmyqMZRpXS556lPqKeWkqJKeeMxzROLHsdzaRzCy2+21l1qRTUNO+omLS4MZzIAyV6HURUFovlm0/Fp2kuFNXRQulqZWF81QZB6zmv7MfsVRnmGj9bTSW6TpGW6scI3Z+s1p5H7uCJYVF8vgWLVvKmormrX3/AOjj0tFUV1XHR00L5aiV2xkbRxc7uWzc7FXWeKnkrY42CoDixrZWucMHBDgORz3r0WqtdNpSsu2tKfb1aeBrrX/XTDj5fWWpR0mnqKi01W3SijcJ6GeSSXoS9pl3eq+UN4uAWi03o3z/AFMPeLdSiuP3ura/IoFstVTeKnq1IIzJsc/15AwYAyeJWs+nkjjbI+N7WOJDXEcHY54PavUqGwQ196tlVU0liq7dUUtUI56CEsZK9rc+sw8iFydSXNx9HdhYKSixO6eMuEAywNI4tPYe89qHgqLbZ1YfF574wh0f36df+igYRtTQuaz1fa8ncWFs22Onkr4GVQcYXvDXbTg8Vro4jiOfYk2KWryNdT2qy2altkIipoWxs5nHM+JPau9EMBaVuyaWEn6xY3PyC32DguW+T5bPkcpNy6lrQhC+pR80ATSCapCMVbY7bqK3zUF2o4qykeWudFKMtJByD9ypjNEejmppaioodH0VWyKboB0Y4OI5uJJ9Vo7yr7C1kscsL3FokaW5BweIx+1cWi0a+3scaa5sY8RsgAFO3o3xtzwe384nPE8F14skoxqLo5MsE5coqLNOei+VlN0ekaYyVGzax0RGNxxxOexbx0D6P/pma2s0ZQO6uW9LMXBoaC3dnBOSAFdrRYqO1W6lozsqDTjDZJGDdnJOfDnw7gufXaTFZcq6rFXE1lcwRytMIL2jZtO1+eHArTz8n1P9TPy49inTaa9FkTqlzdMW+SnpmOfJOwcMBhecDOTwC2odF+iyUTSOsFpjgjLGiV2cOLm5xjOeAXdfoVtQ2XrVyL3SwugJZEGANMTouA78Oz8Vmdo95qG1ouTRWBrW7+hBZjo9h9XPaPHgn5+T6n+oeXHsciP0dejCSsZSRWSzuqHcWsbkk8M8OPdxVukY2N5YwBrWgNAHYAFyqHRlLb+rdHVuIpqplSNzRk7YjHtJ+/K60rg6RxHJZznKXzOzbDFJ8IgvP/SF6R22aYWK0TRC6zENfNK7EdKD2k969BXFrtGadudVJV1tmoaieQ5fJJGC5x8VhljOUag6PR0k8UMm7MrRWNF0Gm6O21Vsob5TXG8XGN5qJ+k3PlcWnOPAZXM9Fmp7bpq01mn73VR2+soamQls527mk5yP0/oV8t2kNP2mqbV0FnoqWoaCGyRRgOGealddJ2K+TNnuVqpKqVvAPkjBPzWccM4041aOmWrxS3RnbUqfpdr9qKLoarjvGttR6uaejtbI+hZM8Ya4DGT8MNz965l41fSekS7Otst2itOm6dwMrnybJKw9wHcvWWWqhjoDbmUkDaNzDGYGsAYWnmMLk/5PdJ/9Hrb/AOSEnp8m1RT/AB+5cNbh8x5JRd0lHpxX/JvaeqrPPa447JNTy0VN+Rb0LstZgcv0qh6fB1x6Tay9uy+32UdBTZ5GTln9Z+S9BttkttnpX0lvooKWnkcXOjibtaSRgn5Kdrs9vssDoLdRw0kTnF5ZE3aCe9dDxSlt3dEckNRHH5jhdy4Tf7/mbiEIXSjiBCEIAEIQkAIQgoGJCEJDBCEIAEIQkwBCEJMAQhCTAEimkVLAEISwpYDSKEKWMSEIUsAQUIKkaEhCEmAIwhLtUgGEYTQpYCISwmUKRiwkQpJFJjI4TwmkpAWEYTQpYIWEEJpFIYsJEFSSKkBYSUklJSEQo4UklIyOEYT70KWMjhIhNBUjI4QQmkUmNFd1ZbXXOShY1kNW2MyPdQSymMVA24yCO1uc8eHFV+WOnvNRbBBa6m5Q/RzujbLUdG+JwftyXZ58MZGeSutytFFdWxisgEnRkljgS1zc8DgjjxClBb6WmdG6GBkZjj6Jm0fVZnOE1OkKrKPcaKOjMDr/AASXOahtLd5jec7+kwXA5HLh63hlbDhWwOo4aydz5hY6kvIfkE7mYOe047VcX0dPJK6V8THPfH0TnEc2Zzj4LALTQtawCnZiOE07fCM4y34HAU+YVtKhDUTW+gtNpnmkP5allppnuJdJESMtJ7S3P3jC2YKamvHXqu40M1yqWVktOIGu/kzGnDQBkYyMHPM5VlqLVRVLaZs1NG8Ur2vgyP4twGAR9ywVdgt1bO6omp/yrgA97HFpeB2HB4/ek5oe0wacqYqm1gQGsMcMj4Q6qIc87T7Q+sOzPguPfqFkla6Ol6SpvE8jHwyA46lGCOJI4BvPh+cSrVBTw0sLIYI2xRsGGsaMABc6TTdqkrZa51KBUSkOfI17gXEcs8VmpK7NK4o4ldQU1edQ1lWwvqKR2yB5cQYQ2JrmlvH1fWJOe1K7Q09TRQTVTJa65VdIxlLTNOCyTbkvGPq8SCXdmF3quxW6unM9RTB73AB3rEB4HLcBzx4qFZp2111X1yelDqjYIukDi07R2cDyRvQbTj6ltsc9hpaeuijq7m9jKWKQk/xrhhz+BHLi77lYKOlZRUcFLGXFkEbYwXHJIAxx+SZoqdz4HmJrnU4IiceJZkYOPuWYjCylK1RpFc2JJNJZM0REpFSKiVLKQiolSKiVLKEVFSKioZSEVEqRUSpZSIlIplIqSkJRKkolSURKSZSUMsRUVIqKllISRTSKllIiVEqRUSkUIqJUiolQyhJFNIpMpESolSKiVLKQkimkVJSIoQhIoEk0c0gEov5KSRGUAef66troq5lc1vqSgNce5w/4Krr1uvooa6nfBOwPjeMEKhXXSNbRPc6maamHs2/WHxH7l62m1CcdsjqxzVUzgoWR1PMxxa6GRpHYWFLoZfdv8pXZaNbRmgudbTUVTQw1MkdLVbTNECNsm3ln4KQu9wFDHQismFLFJ00cWeDH+0O0H4LX6GX3b/KUdDL7t/lKe/7k7IN3SOvcdZ6hu1F1KuvFXUU5xujc4evj2iBk/erPavSBarTT07oX6kJpsOZQPrGupi8Dhk43bc8dqoPQS+6f5SjoZfdP8pWkdRKLuznyaPDOO1ql9uDpHVN5Ej3xXCeAOqXVgZGcBspz6w8eOFK6avv96jjir7rUzxxuD2tJDQHD87gBx8Vy+hl90/ylHQy+6k8pU+bLua+TitParOvNrXUdRV09XJeas1FMC2KUOAc0HnyHHOBzSq9Z6hra2nrqi71T6imJML8gdETwO0AYC5PQy+6k8pR0MvupPKUebLuJYMK/yr9ERc4vcXOOXE5J7ytgXKsbb3W0VMgo3SCYwfml4GN3xwsPQy+6k8pR0EvupPKVO6vU1ai+p1qLWeordQdQpLzVw0oGBG1w9UdwOMj7iuMSSckkk8ST2qfQS+6k8pR0EvupPKU3O+rJjCEW3FJWbM94uNVb6e3T1k0lHTEmGBx9WMnnhbNJqu+0BpjS3Wpi6qwxQ7SMMYTktHDkT35XN6Cb3UnlKOgl91J5SjzGndiePG1TSo61RrPUNVWsrZrxVOqI2OjY/IGxruYAxgZ+Cw0uprxRWya109wnjops74BgtOefMcM+C5/QS+6k8pR0E3upPKU/Nl9QlhxJVtX6GNCydBL7qTyFAp5jyhkP+wVFo1tGNdPTtqfeLvT0zQdm4OkPc0c1ltmlbtc3gR0r4ozzlmG1o/aV6VprTlPYabZH68z+MkpHFx/YFE5pHPnzxjFpdTvwN2gADAC2W8lhjGAszeAWKPDlyWtCEL6pHz4BNIJqkIEfchCpANGEk1SCgQhCaECYSTCpANCEKkAJpIVIQ0JJqkAJhJMKkJghCFSECEIQAIQhIAQhCBiQhCQwQhCABCEJMAQhCTAEIQkwBIppFSwBJNJSxghCFLASEIUsAQUIKljQkIQkwBCEKQBCEKWAihBQpKBLtTSKTACkmkpAEIQpYIEimkkMEimkVIAkmoqSkCSaSkYkIQpYyKChCkYkimkUmNCKSZSUMaEolSUSpZSIkJEKRUSpKQikUyolSy0LCRCZSKhjREpFMpFSy0RSTSUsoRUSmUipZSEVEqRUSpZQiolSKipZSEUimVEqGUiJSKZSKkpCUSpFRKkoiUkykoZYioqRUVLKQkimolSykIqJTKRSKEVEqRUSoZQkimkUmUiJUSpO7VFSykJIppFSUiKEISKBCEkgBCEIAi5uVidFlZ0sJ2NM1jEfFHRnvPzWxtRgJ7mOzX6M+PzS6M+PzWztRtCNzCzW6M+KBEe8rZ2hG0I3Me5muIz4/NPoj3lbAanhVuZLbMAiPimIj4rYAUg0KlJkts1+iPimIj4/NbACkAqUmS5Gv0RPaU+hPj81sbVINVqTJcmawiPj81IRHxWxhSDQqUmS5GsIT3lSEJ8fmtgNUg1VuJcjW6Inv+akIT3lbAaFINVKTIcjC2FbEbMIAWVqpMzkyTQso5LGFkHJaxMWWpCEL6tHgAE0gmqQgQq36Q7tV2PSdXX0M3QTxuj2vwDgF4B5+C5GrvSFbqfSdVNZ79RG5tjYYxHI1zt2RngfvUyyxjafodOLS5Mii4rq6/v9S9pqsV+tIrYKKjZR1dzuVRTtmNPStBcG4GXOJ4AZyo/5Qrb9AV93NPVMfbnBlTSSNDZY3EgYIPx5qvNj0sn2XLVpFpQqU70pUVO+I1lnu9NDUjNLK+HIqD2NaBxyezK6Fm1xTXOuqKCsoK21VcMXWOiq2gbovaBHBNZoN0mOWkzRVuJZUwqez0k0ZDKt9qucdpkeI23J0Y6I5OASM5DSe1W9pBAIOQeII7VpGcZdGZZMM8db1RJCELRGYIQmqQhJoQqQAmElUPSTerppe2UOoaGVxobdVsfc6cNB6Wld6r3d4LMh3DuKoTLghVDXeoqynprTa7BUtbc73Usip52gO6OEetJLg8MBn6SFzaDWtu0/BqCoklvdxkbfjbo6eVzZHvqCxuI4RwDWcc8eXFNMmz0FCoWptWTT6Gv9VdbRqLTnU4muc+KSNsxBcOMTwSM9/wAVgqPSBfaP0gwabp9N1tbQm3tnEokj6R/rNHS5J+qM4I55CLCz0RCp1w9JMUVwraW1WC8XuO2v6OtqKJjejgeBksG4gvcBzDeSx3X0sWWgprFU0lNXXRl9Ego20ce57nsGdhaeIOeHhg5QOy6oKptR6RZRXG3UOl7zcbhBTxVFbTwdGDRh4Ja1xc4BzuB4NyrZR1JrKOGoME1OZWB/RTNw9mexw7CEAmZUIQkUCEIQAIQhJgCELha6uNVZ9GXu40UvRVVLRSyxSYB2uDcg4KTEd3KF5TXP1lpzQjdZs1nNXmCiZXTUVwpIhDK0gFzA5gBaTnAPHsVhf6Tqf8YItP01kutZcJKanqi2nYC2OOUcXOJPqhvbnn2KRWXXCRVJqvSnTNlrJbdYbzdbZQSOiqrjSRtMTHN+vtBO6Tb2lo7Ctu6+kW20rbYy101XfKy6w9YpKWhaC58QxmRznEBjeOMnt4JMdotaF5fZ/SBUVGs9U1NVT3SkpbTZoqiW21I2uikaXFxaM7SSAMOBwVbbnrajtejYNVS0076aaOCURNI3gSloHhw3BSwUixYQqtetex0F3ks1rs1yvtwgjbLUxUQaG07XfV3vcQNx7G81wNR+k67UdXpk2nTFyqKe6zPZJHOxsUpLWuzEA4ja8EZyeBCVD3I9HQqjXekB8FyNpoNN3a53KGmiqqynpzGOqNkztDnOIBdwPAZ5Kz0FUa6ihqXU89MZWB5hnbtkZnscOwqWCZnQUIKhlISEISYAhCFIAhCRwOJOApYAheX2fXl5qdYRXGpmZ+KV2q5LXQN2gbJo/qyF3dIQ9o+A71s6g1jW2H0qR26KmudzjqLMHw26kAIdL0xy85Ia3DR9YlG12LcejpHmqnRekuzyWy61lyiq7RNZ9vXqSrZiWLd9XAHB4dyBHMqFv9I0c9yoqK62G72QXF2yimrWN2TuxkNO0nY4jkHKdrHuRb0lx7Dqenv/ANLdBBLH9F10tDJvI9d7ACSMdhyqVe/SxcRR6TuFj0/VVVLe6zoXhzo9xHrjom5Iw87cgnhgFLa3wG5HpqFgoaiWqo4Z5qaSklkYHOgkILoz7JI4Z+CzqGUgSTSKkYJFNIqQBJNJSyhEpLh68uVVZ9F3240MvRVVLQzTRSYB2va3IODwVZtlk1tU2ChutDrieorZ6WOoFNXUcRge5zA7blgDgMnGUKNqxOVHoJQqRQelGjn0va7nPQVL7lcJX0rLZSt3yvqIyRI1ufzRjO48ACE5fSlRUVLXOuVouVvrLe2OWpo5w3e2B7w3pmkEh7Gk8cckvLl2HvRdEd6r181xa7DqCzWSpL3T3dzhE9mCyMDkXHsBPAeK1dQ+kO36eN7M1LUzx2WngmqpIsYBldhrB/OA9Y+GO9RsZW5FqSKqNH6RoZrpQUVbY7va4bm7o6GrqmNEc7sZDSASWEjkDzWhZNWttUut6+910zqO3XXoog7LyxpjZhjB4k8AO0oeNhvRfCkqpb/SBHPc6OgutjutkfcCW0Ulaxuyd2M7ctJ2vxx2u4rFX+kb6KlEtx01fKO1dOKc3KWNoja4u2gludwaTj1sdqjy5XQ9yLeolVu+a3jtt4Nlt9puF6uMcQmmhow3EDDyL3OIAJ7BzK5Xo11HPqS4asnkkrOhhubYoIKoFr6dvRNyzaeXrZS8t7dzK3q6LwVEqRSKxNERKiVIpFSy0RKRTKRUMpESolSKR4qWUiKSotJV6i13X181uvTrFZqOofSROp4WST1T2cHOJeCGtzwAwutT3Cp0nZq2p1Je4bjHSuG2aOAMl2nADXNacF5JwMYzlXLE1xfPYlT/AELEVEqs0muHSVsNHcLBdbXLVhxo+tNbipcBnYCD6ryPzXYWloDWd31Q+tZcLHPSMgqZom1G9mxu0gCMgHJd3nkpeGaTb9Clli3RcikeSrGpbzXUGrtLUFNOWU1dNO2oZgHpA2PI49nFaj/SSySrudJb9PXi4yWuodBVGBrdrMAHIJIyTn6o48FPkyatFebFPkuBSWlZ7vSahtNPc6CRxp6pm6NxbhzfiDyI7vBUW4UepqTV9qsjda3Mw10E8z3mmg3NLMYA9XlxURxbm03RUslK0rPRjzUTzVSOr32yaSz0tFd9TVdvaBW1MEbG7HHjhxyAX447Wrbh1za6sWR1K2aZl4mfBE7G0xPY0lweDxBGCMd6l4Zdi1lj3LAUiuZPqGmg1DHZHseJX0j6zpSRsaxrsEHxXFp/SFHWuZUUlivE9qfJ0TbjHEDG45xuDc7izP52MKPKm1aRXmRXqWwqJXn1r1ncKW+ano22y73p1LXna2ADbTxbB6oLiOPM7RxVysd6o9RWmnulA9z6eobububtcCDggjsIIII8EsuGUOX0HjyxnwjdKSZSXOzcRUVIqKllISiVJIqWUiJUSpFR7QOxIoRUSvN9MVdyv9qNdWa8loZ3VE8fVwKcbA2RzW8HDPIBd3V1xutPT22w2StH0xXnDap7QdkTG5fIRy48B8XLeWlansv/AHMY6hOO+uC09qCqkNcdHoYX51P0lazFO+mzj+Fbtmw93rfoUfoLWRputnVTRcMbuqikZ1XPse1jszlR7O18zrmi/OX+VWW08VErk6Vvp1HZIa98PQTEuimiznZI04cB4ZC6xXPODi3F9UdEJKStCSKaRWZaIoQhIoMJJoKQCwhRkJbG8g8QCR8lRNLU+pNQ2CC6/jZVQzzOkxGaaJ0Qw8gAjAJHDvW2PDui5N0kZTy7ZKKVsvqFUrdrV1Nb61l8ixcqCqFG+KlaXdZkcMsMbf5w447OK3qTVHW6iW31lurbTXGB80UdSB+VYBxLXNJBI4ZHMKpaXIr4JWog/U76F5qzU1dRad0VXT1NbO6oqXNqGxZfJUeq7DSO3jhWu26qZca2e11dvrbXWthM7Yp9uZI+W5rmkjI7uxVk0c4q+vX9nRMNTCXH99zvoXF0ZVR1umqGohmrJ2SNJElW8OlPrH6xCrlJV192u97bNrCS1spK0wRQAQD1A0HPrjJ5qY6ZylJXVFSzpKLrqX1C4El1rLPTU1LDRXPUUzozIamFsYa4Z4ZdkNz3ALRuepqG6WChuMUtypo33GGnc2EiOVsnSbSx4P5ueYSjppNrsN54r8S2hSCrp1jC7UdRYYLdXVFTTvY2V8bR0cbXDO8k8h4c12bjXwWq31FdUuDYaeMyPJ7gMqXhnFpNdSlki02n0NscU1S9F368S3F9BqB7TNXQC4UQDQ3bGTh0XiW+qfvVjtN7hu9TcaeKKRjqCp6s8uxhzsA5HhxWs8EoNrqZwzRmrOmFIKhXX0iVYtlmuNotE88VfW9XcHOZkYeWlo4/WOMg8lZY9RtFztlsqKGemqrhBLOGPLT0WzGWux28exW9Nkira7/sQs8G6T7fudkckwuLU6opqa4XKhdBM59voxWvcMYe054Dx9VcUelGiZQU11qbPdoLRUBu2udECwE8htB3YzwBxgqoafJLlImWeEerLsFIKs2zWsdZdaa3VlpuVsfWtc6kfVMAbOGjJHAna7HHB4rWPpFZJJcGUVgu1cLdO+GpfC1u1m3mRk+tw44HFUtPkuqJeeHWy4KQIWlbLlT3m209xoZA+CpjEkTiOYPeP2Kl6pdqjS1pkvsmqBU1LJWNZbuqsbBOXPAETfz9xB55VY8O+W26ZOTLtW6rR6GE8qlz1d61PqO42y3XV9mo7W2Ns0sUTZJZZnt3bfWyA0DHiUrRXajv1FX2g3SCiudqruq1VYyn3dNEWhzXsaeDXEEZzkc1p7O0uX/SyPOTdJF3CmF55FqS46Vu17pLldX3ujt1t6+6V8bWSwvzgROLeHrDiOGVHT96nudfRmu1/SRXKYtkfaKZsXRtBGeiyfWLgDgnPPsWi00qu+DN51dep6Q1ZByWNqyDkoiUy1IQhfVo8AAmkE1SEV30gWesv2lau30EQmqJHRlrC4AEB4J4nhyC0NW6JpK/SdXSWuzULbi+JojLImMdu4Z9bHDtXQ1fqet01FTPo7DW3czOcHCmB/J4HbgE8f2Ktf5Vb3/1f3r5P/wLCbx21I9LTQ1DhF46pO+qX68/Y36qyXyy36C+2qhiuJloY6SppXSiNzS3k5rjw+IXPrNHX25WHU1VU00LLpeTHspI5AWxtYRgFx4E80/8qd8/6AXryv8A8CB6VL3/ANX97+T/APAluxP1f6P/AKN1j1Sr4VfHNr0d11O3qKwV9e/TBgga8UFVHLUesBsaGYPx49yjedMVd11j1ss20Elqlo3yhwy17j3c+S4/+VW9/wDQC9/J/wDgS/yq3v8A6v738n/4FW/E/wD+MiODVxqkvVdV6/mc+h0LdIKeG0VmneuRscI31f0q9sL488+jzkHHZjGV6tFGyGNsbBhjGhrR4DgF5z/lVvf/AEAvfyf/AIF6DQVD6uigqZKeSmfLG17oZPrRkjO0+IWun2dIGGu8508qS/B3/wAs2EIQupHnghCFSENCSapACw11FT3KhqKGrjbLT1MboZWO4hzHDBHyKzJhUhM8z9GWhtQ2e7SVOp3xzMtFP9FWd4eHF1NuJ6V3c4ja3jx9VRl0fco7ZqmGt0rT36G46gfXRUj6tsLnQljAJGO/NeC04BIK9OQnRNHjUmhtXVukdW26Kjr6OkuFLFFb7VcLoKyRkoeC94kJIa0jGG57OxWm82u/2rW9r1HbLL9Lwi2fR08LKlkL4Xb2uD8v4EcDy4q+IRQUecWyj1foWW62+1abivlFW1s1dSVDa2OEwOlO5zJg7iQHZwW5yFisno8u1kr9Eud0VSLa+unuEzHANZJO3OGg8SNxI+5emIRQUeZ690zWXO+T1VLomrqql0LY4LvbL0KKbl9WTi04B5fW4fJXbStJdaDTdupb5VisucUDW1M4Od7+057fj2rrISoaXIkIQgoEIQgAQhCTAFw9cWyqvWjr1baGMSVVVRyxRMLgNzi3AGTwC7iEmI8+096HdPU1tthu0Nzrqiniic+mrrnNUU7JWgcRG5xZwPLhhda12CupvSPfL1LA0UNXQ00EMgcMucwu3DHMYyFa0KQpHmNpt2tdF2aq0rbdO092p+lnNDc+uMijYyV7nflmO9bLS4525zgKNHoi+6CqrHdLJSR340lr+i62l6ZsD3Df0gkic71eDiQWnswvUEikxUeZ23TGpr/qLVFxv1thtNNeLOygp2MnbM6L6ww8t5u9bPDh4rk3a0ekG66DptHHStPE+kFPFLX9fjMU8cT28Y2/WBIaD62McV7EkpHtKFLb9SaR1VebraLG2/0F6MUz4o6pkE1PMxm0/X4OYQByOQlqa26qudNpi+Gz0010tVcamottPVAZY5rm4bI8AFwBGeznhX5CVhtPLtXWK43y4R3B/o+rHVz6VjGV1uvjaWphOCTHI5pGQ0ngRuCvGkKK727TNupb7VisucUQbUTbt253x7SBgZ7cLsIUtjSoEFCCoKQkIQkwBCEKQBcHXMN6qtL1tJp+MPuFU0U7Hl4aIWvO10mT7LSTjnld5CkDy+5ehR7tL/Q1FrPUzmUsbXUdPNLD0DJWetGSBGDgOA7c+KH0muoNXW3VbdOQVTzY2UdfSCrjY/pukJcI3E4ODx48CDzyvTyhPexbUeVV+gdQ6xZqG83GCns9yrmUjKCidKJhEKaTpG9M5vAlzjggZwF0a6k1Zrits9LdtOx2Git9bHX1M7qxk5mfHktZEG8QCeZdjgvREip3Me085p6HV2k7tqOntenobvR3mtfX01X1xkQp3yMAc2VrvWIBGfVzkLmwaJ1Lb9BaNibb46m66euLa6eibO1vTN/KAhjz6ucPBGV6wklvFtNa2VFTV0EM9ZRPoah7cvp3yNkMZ7i5vA/ctlCFky0CRTSKQwSKaRUgCSaSko4WubZVXrRl8tlDGJKqropYYmFwbue5uAMngFWLbddfU1horTR6JZSVcFLHTisrblC6FhawN3lrMuPLOF6GkhSpUJxvk80b6PrppKm0zX2Nsd3r7L1kVUMsgiNaKjjK5jjwa7cARnhjgt2j03dNW6hq7zqW1MtVG+2SWqGgM7ZpHskOZHvc31R2YAV970IeRhsR5PaPR1qCs07dxqAxfTLIYaO2SteDiOmOYpM9he7BK2ajRmoK70Z3enq6aJ2pL1UCsqomyN2tf0jcMDuWGsYAvTSEFJ5WPYiqa1sVfeG6bFFCJDQ3amqp/WDdkbGuDjx58+QVerdA3e40uq2NENPUVV6julvdK4FkvRtYQH44gEtIXpaRULI0PYmef1lHqrWtws8VzsDLDRW2sZXzSyVbJ3TyMB2MjDOTcnJLscFTr7oLVV1sFXb6mw1dfenzF7rrNefyEjelDgWRbuHq8A0gAYXuBSQszj0Q3jT6lEqrfqHTGrbnerTZxfKO7xQ9NCypZDNTyxt2ggv4OYR45BWX0eWa/W6s1LXX+kp6We6XAVUbIJA9oZ0TW4z3jGDnnjKuqiVm8jaopQV2IqJUiolYmqEVEqRUSpZaEUimUioY0RKR4cUykUmWihU1v1Joe4XCO0Wdl9s1bUPq44o6lkM9LI/i9vr+q5hPEHORlc2o0LfNSWnUk1fDBbK261cFXTUxn6TozEBhsj29+PzeWcr01Jaee1ylyR5SZ55YdO1FTeaKW4aOnoG0b+n6zU3p1SGygcDGzcc9vF2OC39HUF60/c7nbKq07qGorp6yO4sqGbcPwQ0s+tnPDuVyKiVEszdpoqOJIq+pLLXXDVmmLhTwh9Nb5p3VDy4DYHR4HDt49yNH2SttM2pH1kQjFddpaqDDgd8bmMAPDlxB4FWcpFZvK9u00WNXZW9AWetsWl6eguEQiqI5JnFocHYDpHEcR4FQulmranXdju0UQNHSUtTHK/cPVc/btGOZ5FWUpKPMe5y7lKCpR7FGhpNR6Qu94NssjL1Q3OqNdG5lUyF8EjmgOa8P5ty0EEcVz/xLvtqtdouFNFTVt3obnLc6ikbJsZJ0oIdGxx4ZAIwTzwvSColV7RJen9ReSig09p1BqDVr7ndbQLXb5LVLQtZ1lksrS483beHwx3cVOwu1hYbdQ6fGnqaoFIGwNuXXGtgdEDwcWfXDtvZjmryeSRUSztqqVFLDXKfJXNJ2estd01DPVxBkdbcesQkOB3M2tGeHLiDzUNAWetsWm20NwiEU4qqiTaHB3qvlc5vEeBCspUSspZXJNP1r9jWGNRa+xEpJlJYM2EVFSKipZSEolSUSpZSEVHtCkVEpFFJ0ZoKgo7G1l7sNtfX9Znkc+WFkji10rnNJdjuI+CidH3K8ajr7zV3O5WcsApKJlDLGCaccSXZa7G53HHDkrv2KJWz1WTc5XyzJaeFKPY89Po+rmOvFoFfV1FvuLWVkddUPY6SCsaeZAAyDgHgOxO7a31NYaaCkuVgghqpz0LbkaodSD/bdw3NzzwRz4K/qMjGyNLHta9p5hwyCmtVb/iRTF7NS+B0V7QlPQ0enYqehrm14ZI8zVLRhskpOXkeGSu+UNY2NoYxrWtHABowAhcuWe+Tl3OrHHbFREkU0isjREUIQkUBSTKSQEZAXRvA5kEfoVF0u/VWnbFDaRpR80kLn4mdXRNjO55IJHFwHHuV8QtsebZFxatMyni3SUk6Z5/WaCuVTa3Vk0sFTepa8XGaNkjoon4bt6JrhxADeAd3resljklrzV1Gm5rc+CCRsMtTcjUP3uGCGt3EAEcyVckLZ63I1TMlpYJ2ijW7TF0p7Zo6CWnaJLZUukqhvb+TaWOA+PEjkuxcbRW1GsLfcYogaWGhqIJH7gMPcW7Rjn2KwoUPVTb3fj+5S08Uq/D9jh6JtlVZtLW+grYxHUQsIe0ODsHcTzHxXNs2jKR9zvlTebNQ1Bqa4ywSTRskcYy0DxI4jkrchR7RNOTXG4vyI1FP0KZqCx15vEDobZPcLOylEMVFSVnVWwSA8yMgEEYA7u5cyg0heYdKx0D6JkVQL6yt6ITh4bCJA4ncTx4D4r0ZC1jrZqKjXQzeki5W2cGy2qqo9Tagrpow2CtfCYXbgdwazB4dnFY9Z2au1JBR2iB0kNDPNvraiN7Q5kbeIa0HmS7HYeSsQUgs1nlvWT1Rbwx2OHoykXbRFzpZKG726+Xe6XC2zNkhp62aPY9hwJG5DW4y3xxwWxDT6h07eru+32ZlxprnOKmKXrLY+geWgEPB4kcM+rlXFNbrVzaqST/v7GT00U7i2jzyl0nfaXQ9mpjSRy3K23Drr6ZsrQJQJHOw1x4Dg7IyuveKW+T3CyakpLOHVVGyaKotz6hgfskAGWv8Aq5BGVbgpBV7XJu2l6/v1J9milSf9ootPZ9RXK56iuNdbI6MV9sFLTQidr3Bw3cHEcM8ezgtu5acuNT6O6Gyx07XVsMVI18ZcMAscwu48uGCrgOSkE3qZNppdP+CVp401fUr+orTV3C+aaq6aIOhoK1807twGxhjLQcdvE9iNI2estVPemVcQY6quNRURAOB3McBtPDkrCFIIWeW3b/fWweGO7d/fY4OhbXWWTSNut9dFsqYI3B7A4Ox67iOI4ciFWYmarqNQvvN40hUVzqdxbb4I6+BsNM328E8ZD7R5cgvRVIK4Z2m3S5IlhTSV9CmvpL/YL/WXi22b6Sp7tHE+opBUsjlppmtxwLvVcCOB8QtZlt1dZLFda+30NPU6ivVYZ5Y2TNEdG3aGtwXYDy1oHxJV9CeFotQ+y/7oh4F3ZQbLp+sqrHX6crNN1tujuMEgqbnUVsM0ksrh9dwack5+4YwtR+mr/XaaodJO0zSUQpnQtddWVEZjaI3AmRjR6+92O3tJXpYU2rSOqlfQzenXcmwYAHPHasg5LGFkHJZxLZakIQvq0eAATSTVIQJ5PeUkKkBLJ7yjJ71FCYEs+KMnvKWUZHeqAeT3lASTCoQ0JIVIBoQhUhDQkmqQAmEkwqQmCEIVIQIQhIAQhCABCEuCBghCEhghCEACEISYAhCEmAIQhIASKaWVLAEk0sqWMEIz8EKWAkIQpAEFCCpY0JCEJMYIQhSIEISUsYFCChSwBLtTSUjApJpJBQIQhSCBIppZUjBIppEpDoEkJKRoEkyllSMXehBI70sqWMSEIUjoSRTSKTGIpJlJQNCUSpKJUspCKRQSkVLLQiolSKiVLKQikUykVDGiJSKZPHmFElJlISSeQkoLEVEplIqWUhFRKZSKllCKiUykpZSEVEqRUSoZSIlIplIqS0JRKZSKgoiUkykpKQioqRUVLKQkimokqWUhFRKZSJSKQiolSz4qJPiFLRSEkUZHekSO8KaKEVEqRI71Ekd4UtFISRTyO8KJI7wpooSEZHeEZHeiigR9yPkj5KQD7kkZR94QAIR94R94QAIR94R94QAIR94R8kqAEI+8I+8IGMJhRBUgVSJJJpZTz4qkSSCkFAY71MK0SxjkpBRBTBVIkkFIKIPwUgrRDGFIKKkFSJZIJpBPKslklMKAKmCrRDJhZByWMLIFrEyYt8vvH+Yp75feP8ySF9YzDagMkvvH+ZLpJfeP8xTKSTDag6SX3j/MUdJL7x/mKEJBtQulk94/zFMSy+8f5ilhGEw2ofSy+8f5ijppfeyeYpYSS5Dauw+ml97J5il00vvZPMUIwlbDauwdNL72TzFHTS+9k8xRhGEWw2rsHTS+9k8xT6aX3snmKWEYSthtXYfTS+9k8xS6aX3snmKMJHglbDYuxLppveyeYo6Wb3snmKhlNLc+49iJdNN72TzFLp5feyeYpIS3MNqH08vvZPMU+ml97J5iooScn3DaiXSze9k8xR0s3vZPMVFGUtz7htRPpZveyeYo6Wb3snmKjhACW59xbF2JdNN71/mKOml97J5ilhBCW59w2rsHTS+9k8xUull96/zFQ+5SSt9x7F2JdLL7x/mKXTTe8f5ikhFvuLYuxITS+9f5ijppfev8xUQmlufcNi7D6WT3j/MUdLJ7x/mKSEtz7hsXYfSy+8f5ijpZfeP8xRwHagBTufcNq7AZZfeP8xT6WT3j/MUYSS3PuG1dh9LJ7x/mKOlk94/zFJHBJyfcNq7Eukk94/zFHSSe8f5igBGEbn3FtXYN8vvH+Yo3y+8f5imQjCnc+4bULfL7x/mKOkk94/zFPARgI3MNv2Fvk94/5lG+T3j/ADFPASIU7mPauwdJJ7x/mKN8vvH+YoAUsIbYnFCD5PeP8ye+T3j/AJowhTbDag3ye275lG+T23fMoQi2NJC3Se8f80bpPbf80IRbHtXYN8nvH/NG+T3j/mhCLYbUG+T23fMo3ye275oTyk2xOKFvk9t/zRvf7bvmmOKeEtzJ2oW9/tv+aRc/23fNSwjCm2VtXYjuk9t3zRuf7bvmpYRhFsNqI7n+275o3P8Abd80zwRnwUtsNqFl3tO+aNz/AGnfNPPggcUWwpCy/wBt3zRl/tO+alhGErYqRDL/AGnfNHre075qeEbUrY6RDLvad808u9o/NCYSsdEcu7z80juzzPzWTCRakKjH63tH5ow7vPzWTajCkdGPB7z80YPefmp4RtQFG1bHsbN0cgBD+WePFdCopGtJwxuPguMMgjHNd6iqW1sGCfXZwK9HRTUlskceoi4vejlTQY4Yx3LSljLT2rvVMPcudPGumeJF4slnLc13efmsTg8fnH5rfdHwK1nsXLKCOyDNVxd7R+ajl+PrO+ayvasZHisXFG6REuf7R+aiXO9p3zUnKHNZuJaiG53tO+ajudn6zvmmfiok8VO0raG53tO+aRc72j80soyjauw9oEvx9Y/NRJd7R+akePelhNRQ6I5d3n5ow72j81PCeFoorsMhtcfzj81La7vPzUtuFIDwW0ILsSyAYe9TDFMNWRrF0Rxx7GTZBkeewLK2EEcgpsYsrWrojij2MpSZjbA3h6oWZtOz2G/JTYzksrWrVYodjKUmY2U0fu2fJZmUsR/zTPksjG8Fma1aLFDsjnlN9zGyjh9zH5QszKKD3EXlCysas7GqvKh9KOeWSXcxMoKf7PF5Qs8dupiONPD5AsrG8Vsxs8EPHBf5V+hzyyS7mFtvomNLn0sGBxPqBVSv6Gpqnvjijazk0BoHBWG/VvRRdWYcOf8AWx2BV7aF874rmg5LHBLjqduhhKnkkzX6CP3bPkmII/ds+Sz4RhePSPS3PuYegj9235I6CP3bfks2EYRSDczD0Efu2/JLq8fu2/JZ8IwlSDczD1eP3bPkEdXj92z5BZsBGAikLczD1eP3bPkEurxe7b8lnwEYCKQbmYOrx+7Z8kGnj92z5BZ8IwlSDczB1eP3bfkjoI/Yb8lnwltSoNzMPQR+w35I6CP2G/JZtqNqKC2YehZ7DfkjoWey35LNtSwgLZi6Fnst+SfQs9lvyWXajagLZj6FnsN+SOib7I+Sy4RhAWzF0TfZHyR0bfZHyWXCMIC2Yujb7IR0bfZCy4RhAWYujb7IRsHcFlwntQKzFsHcjasu1G1O2KwyjKEL7cyBCEJACEiklQ0h5RkpIQOh5KSEIAEIQkAFLKZSSHQZRlCEgoYQ7kkUs5SCgTCSYUtBQIRlCKACllMpJUAZQhCVASQo5KMpUBPJSJUclMJUFBlSyVFCKCiWSllJLJSYUTBTyoAlNIKJZQColGfFITJ5QDjkoZTCkKJ5KFFNJoQ0JJ5SGNvapZ7VAFPKQqJZSyUkBSA8oyhCQBlNJCAGmooyUmJokhIJpBQIQhAUJCEJDBCEIAEDihCQEgmkOKakliTQhKh2CFHKCUDBySMoSYAmOaSBzSAmhCEiaBCEIGQTbzSQOakZNCQTSECipKKGCBCEJDArNR1LqWbeOR4EeCw9iEoycZbkEoqSpllLWTxCRhyCtCog5rBbK/q7uhkP5J3b3FdWaHcMjt5L3ceRZY7keXTxSp9DhSx7ThasjF154eJ4LSki4LKceTux5LObIxYHNW/JGQFrvZ4LmaOuMjUc1QIWy5qxOasmbxkYSoHmshaokKGWmY0Ke1G1KyrIJhS2o2poLAAYTwUBvJTAWsSGxYUmtTAU2hdECGwa1ZGtQGrI0LoiZyYw1ZGtQ0LI1q3izKTJMasrWqDAszAtbMJMkxvBZ2NUGhZ2NVbjnkyTWrYYFBjVnYEbjnkybGqVXVx0NOZXc+TR3lMyMhjMj3YaO1Vu5Vzq2ckcI2/VC4dbrFhh92LDheWXPQwTSvqJHSyHLnHPwUOxAQvlpNyds9pJJUgQhCVDBCEJACEIQAIQhAAhCEqAEIQigBCEIAEIQgBIwmhIAQhCQAhCbGhzwO8gJpW6BuuWJC41w1rYrdWzUkrK50kLyxxa0YyFr/5QdP8Au7h5Avcj/hzxCSUlj4PHl4/oYunMsKFX/wDKDYPd3HytT/yg6f8Ad3DyNT/8a8Q/0yf/ACDQv/8AIWBCr/8AlB0/7u4eRqX+UHT/ALu4+RqP/GvEP9MP/IND/qFhQq9/lC0/7u4eRq78U8NVTQVNOX9FMwPbvHEBcus8I1WkhvzQpHTpfFNNqpbMMrYJIQvpTtBCEJAI80JHmmkAIyllIlAEsoyoppDGnkKOQllICRKFHKMooY8oyEikigJZCEghJoY0IQkAIz8EuSSQqJEpc0k84CQUCEdiFIAgIyjKVDHhHJazbjSuqDTipiMw5xhwytguCQ3BrqSyjKjnKSCaJZQllGUqGMckwkCjKTQEshChlMEJColhCWQnlIVApKOU8pUFDRlYp6mGmiMs0jY4xzc44ARBVQVTd8ErJWe0w5CX2HtdWZsoyo5RuCVCokgc0gU8qaFQ0wooU0FEspqCYSCiSAQopoYiWUJN7U1IDQkhAAhJCQDQkhADQknlAAnxSympYmhg8EZSQkAIKEiEhghCEmAICEJASyEZCijCBUSTUUJALCCmkeSQADwUgVBMHASAmop5SSAEIQkMChCEmMCupa7jjFPMcg/VJ7Fy0LTDmeJ2jPLjWRUyyTw5B4LnTQ8+CLdcywCKoOW8mu/eujNAHN3N4g/pXswnHLHdE8/4sUtsjhyRcFqyRLqzQYWrJGuWao7YZDmPjWJzPBbskeCsDmLnkdUZmo5ixlvgtpzVjc1Ytm6kYNqNqyFvgltUWXZj2o2rJtRt8EKQWRDVMBAbwHBTa1axkQ2IBTaEAKQauiMiGyTQsjQotCyBq6IyMmMBZGhRa1ZWNWykZyZNjeSzMCg1vLgszG8lopGEmTY1Z2BY2NWdgT3mEpE2BZgWxtL3nAHMrEXtiG5xwAuPXXF1USxnCMH5rm1GrjiVszhjeR0gudxdVybGH8iOzvWkgoXzmXLLJLdI9THBQVRBCELM0BCEIAEIQgAQhCKAEIQkAIQhAAhCEACEISAEIQgAQhCABCEJAClD/Gt/pD9aipQ/xrf6Q/Wrx/MiZ/Kzx/VL9uo7kP8AvD/1rl9ItzVcmNS3TwqX/rXK6ThzX7pp3/Dj+CPxvNG8kvxZs9ItqOlqJGhwZzGRk4ytWgw+be/iyMFxHeexdOOKrqWOmZFK9g+s4NyF4PjHjktHNY8aV+tmuDSqfLOfITG8tcCCOYKj0x7lmrpBNCH59eM4J7x/+Vz+k8V6nh2uWrwLKl+P4mWXDslSNoy8Dley2Ljp+1n/ALu39q8QdJwPFe26eOdO2o5/0Zv7V4H+MX/6kfxPo/8AC0a1MvwNvOU8qPamvKZ9+h5RlIlLKQAeaMoKOxIACRRlBOUDBGUJJACEIygYIRlGUgDKMpIQA8oyktevrobbSSVM7gGMGfj4JN0rZSi5Ol1IXS8Utnp+nqn4B4NaObj3Bc606yt90mEGXQSk+q1/J3wKrNDSVGtLo6qqnPbSRnGOwD2QtC4Ohk1G2GkY2KKOVkTA3wK43mlaa6HsY9Bjp45fNVv7HqYKSQJRuXVR4xJUrXl7kifHQU8jmOHrvLTg+AVvqKllLA+aUgMY0uJXlRfLqK/gnO6ol5dzf/wubUT20ken4ZgUpvJPoi4aWuVTTWOWuuczjTtOY3O4uI//ADyXUsmqKG9udHDvZK3jseOY71WdcVrYIqe0U+GRxAOcG/oCx6Vulrs1M+WYvfVScw1vIdyjzGnRvk0scmJ565fRI9AXPv1x+irZNUgZeBhg7yeS5/44wFge2iqS08jw4quX7VrLlI1rKZ4ZECWh5/PPAE/BaTyxrhnJptFklNbo8GLR1tkul5NbLu2wu3ud7TjyC9HyqJYNT0dmoGUrqSpMv1nuDR6xXWi17bHHEkdTH/SYs8U4pcs31uHLlyNqPC6FlQufbr7QXUkUlQ15AyW8it/K3VPlHmSg4upLkaeVHKMoZJLKNyjlGUqAllAKjlMHikBLKAVB8jY2l73BrQMknkAuVNquzwHBrGPI7GDKhtLqVDFOfyKzs5Q4qvfjrb5HhkEc0pJxwGFirNbw0sW40M+ezOMKXJdzWOjyt1tOPr+7OmqW21gOyLDn/wA5x5Kw6QtLrVaWiQESzHpHD2e4KksujKm5Q1FTTPfHG8zzAcS8/u5K0N9IFC4A9Vqg3OM7RwWUZLc2z09ThyRwxwwj+JbEKvQa6s8xAfK+E/z2ld2CoiqYmywvbIx3JzTkLRNM8fJhnD51RlyjPFLOUIozollAOUkwpaENMZWhdLzR2iLfVTBpP1WDi53wCp121jX1BLYXtoITyJGZHfcobR04NJky9Ohd6u50dAN1VVRQj+c7ifuVfrPSJbIHEQRzVGO0DaP0qq0tlud6eJIqWRxzxnqSf2rrs9HM8mHT1zWuPMMZwUW2ehHSaXF/OnbLPZdU269ksge5k2M9E8YP3LsZyvLa61u0hfKF7ZXTAuDs4xwzgheoNdkA558U6OLWafHjaljdxZLOEA5Ucoyg4SSQOUZSSAkhLKMoAaEspoAE9ySEgHuRuSQkBJBS3IzlIQIQhSMEIQgAT7EkwUgBCEJCAqOVIqKTGgQhCAHlNACEhMEE4Qk5IYZRlA5IQMaEIKhgLPet2iub6YhsmXxd3aPgtLCByV48koO4sieNTVMsLhFVMEkLg5pWlNFgrnwVM1M/dG8jw7CunHXw1WBJiN/6F6Ec8Mq54ZxvHLE+6NCWNaz48HC6k0OPEd4WnLGcrCfB045o0XMWJzVuOZhYXMXNI6YyNVzfBIgDsWdzVBzVnZrZiRhT2o2pKQyICmEBvBSAWkZCYBTDcIaAp4W8ZkNgAsjRySAU2jktozMpEmtWRrUmhZWhbKZlIk0LOwYwsbByWXIY3JOB4qvMMWZGhOapjpmlziM9g7StKevDBiLi7vWjI50h3OJJXHm1yjxHkIYHJ8mWqq31Ljk4b2Ba+U0l5cpuTtnZGKSpAhCFFFAhCEh2CEIQAIQhAAhCEACEIQAIQhAAhCEhWCEIQAIQhAAhCEACEISoAUov41n9IfrUVKL+Oj/pj9aqC+JEy+VnhurXkanuvH/SpP1rlCTxW9rGTGqrsB2VUn61x+kB5lfuGB/w4/gj8lzQ/iS/E6lC/d0rM8S3P3A8V3a/Xc1lq4rfSMa2niDQRj63eVUYqgwyNkYRlp4LckmoatzZpWuEjQARgnl+teB4l4fCep8/JDfFqq+51abK8a2x4OvfZYnTVU0QDWS7CAOQJGSuHvUquskrJNscchDeO3bknxWqC8t3Brsd+OC9DwfSPS6ZQl1OfP8AHNyRsGTgV7tpog6btP8A4Zv7V8/mTgV79pc50xaD/wB1b+srx/8AF7/9SP4nu/4ZjWpl+BvHko5KZ5KK80+6HlNLwQEhhlGeCChAxIQhIAQShI80gHlJGUIoYIQhIBFCChIY1RdTV8t+u0dnpHfkw7ae5zu0/AKxapu30Ta5HMP5WT1GfE9q4ugbbhktxmGXvO2Mnu7SubK90lBHo6SCx43qJfl+J3JI4dO2RwiADYYzg+07v+apWlaTr+oY3luWxgyuJ7//AMrt69uP5OC3RuOXkySY9kLLoOgMFBJVvHGd3q/0Qs5JSyKMeiN8cni08sr6yLS3PemkozSCKJ8juTQSV1s8hK2VfXVzMVPHboyN0/F3HkFzdE0LGzVNzlAMcDdreHb2rjXSumr6+erkxyy34dgVo6L6H0hHCeEs4y7HPjxP6FwOW+e5+h77xeVgWJdZFddBJqDUPRl5Dp35J9lv/wCFcKPRNqpgN7JKg98jv2Lk6DozJNU18gBx+TYe49qurVrhxprdI5ddqpxl5WN0kcurorZa6KSbqcOI25A25yexV+z2xtbe42mFnQ0bN0pA4Okdxx9y6+pqxkYijf6zWAzvHZhvIfPCnpOnMVrFRID01U4yvJ8eSHFOaVGcZyhhc2+p1uqwe5i8gUHUNLK3a+micD2FgWfKqGo7tdoL9T01IXxxHaG5GWvJ55Wk2oroc2CMskqTo77NP22Oqjqo6YRTRnLTGS0H4hdFQaSAA4jcBxXOrdR2631bKWon2SOGeXAfE9iOERWTI66nTKMpNe2Rgc0gtIyCO1Cf3Mx5RlIuAPEgIykFEkBRT5cTwQBguVK6toZ6drg10jC0E9iq9D6O4GAGtq5Hu7WxeqPmreHtcMtcCO8JrOWNS5Zvi1GXFFxg6s5NNpe00gHR0jXEdrySVzNRCjppGxspogIWGaTDeZ5Nb95/UrO5waMnkOfgqTO8Xe7U8OC7rk3TP8ImcGj9ZWc0lwkb6ac5y3TfQ7+mLO2itbHTwsM8x6R+4A4z2LrClp/cReQKQAAAAwBwwmrUaVHNkyylJybNSos9vqgemo4X5/mhTt9uprXAYKRhjY527buJAPgpT11LSua2eoiic7kHuAys4IIyDkdmEuCJSm1UrollMHioZQOadGdGXIHErh6k1EyzxCKJokqZQdrc4AHeV2cqj6qoY6jU9IKyToqeVgBeeXA8Qs58I6dHjjLIt/Q5dJS3HUVSXQtdK8n16qUcGeDVb7Po6htzmyzk1dRzL5BwB8AuxSQwUlPHFTNa2IAbdvIrODlT5aRrqNbOfww4iAG0YGAE84QUk2jgaObe7DBfBB0rix0Lw5rgM/ELqjg0DuGFjB4qYOQpocpSlFRb4RJCjlNS0Z0NCSAkFDyjKFESMLi0OaSOYzySCmSymCteqrqWiDTU1EUO7gN7sZWdjg4BzSCCMgjtR0BxaVskE1FCViJIUJJWQxl8jw1rRkknAAXNpdUWisqerw10bpOQB4A/AoZSxzkrijqoCFxtWVlZQ2aWWia4y5ALhxLB2lIeODnJQXqdpC4OjKuvrbO2eudvLnEMJGCWjvXdc5rGlziABzJ7FI8uNwm4daGhRZIyVu5jmuae0HITSZFMaEBCQhhCM4HFGQkISSaSQ0CEYRhABkqSjhSyEgBJyeUikIByQhCChoRzRyUtAI8EsplJIAyjKEJgZoquWPhnc3uKzGeKXmNpWmhUskkQ8a6ozvZ3clie1IPc3kU9+eeEpSspcGu8cSsZBWw4ZWMtWDNUzEQlhTIUVG4uwTCWFMKlITG1TCi1ZAtYzIY2hZGgKIwFLpGgrVZUjN8mVoWQEDmtYzdyg57ncyh6iuhOyzafVtYPVG5a0k75D6x4dygkVzzyyl6lLGkBQhCxZoJCEJACEIQAIQhAAhCEgBCMISGCEYTQFiQmhAhJ4QhABhGEIQAYRhCEgBJNJAAhCEACEIQAKUQzNH/TH61FTg4Tx/0h+tXj+ZEz+Vng+oKJ9x1vdKZksUTn1UmHSuw3n3rP+INw6Tout0O/Gdpk44XK1g/GsrmOf8Nf/eW5r+R8V7hcxzmuNPGcg4I4L9Sz5NT5uLFgnt3RvpfKo/PIQw7ZzyRun37meTQtdFN0MlZQMkwCGulwT9y3qDTNVaIaiSWaglbKWNb+V7WvDsDx7F0NPVTbpb6GvnDfpAslpopXjO4gcCuRdKm/EW2nvFAIhHWAicYHSHh2DwXhw8V8QyZXh3q49eF6X0PRlotNGCyKL56f1LXA6Wnu0twlprfBEyMRPEM4j2ndu5kHGc4IXKljq30FHSUs9mjdBPJOS6YO3lzidvwwcIrX0Lae/wAtxa59MysY5zG/nnHBq48lHaNQUIuNopuqVFJI0zQDtbnmox+IamcW8kmo+r2quVY56XFFpRSvtbNDVNlktdR07zTMEzuEMT8mM47u5e0aR46UtH/hW/rK8R124DUtTx/Nb/dC9s0dx0nZzn/RW/tV+MvJLwrFLI7bZr4TGMddNRVKjolRCeUsoZ9YgTUc4RuSGPIRlRQgECE8JHglQ6BIp5SSAEIQgASyEFJJjHkIyEkJAad2tNLeaboKppIBy0tOC0+Cz01PHSQRwRANjjaGj4LKufqCtFvtNRPn1tpa0DtJ4KJJL4jbG5Tax3wUK8SuvF4qZW5d0kohiGOYHA/+/Fej0UDaWligaAAxobgKi6Ton1N5jEgOKZnSuB9or0DC59PHrLud/iMtu3EvQFxdSVrmtjoY3bTODvd3MHNdeaRsMTpHuAa0ZJKpldUvnoKu71BIdUnoKZoOMR9uPErTO6jSObSYrlbOXbKaO5XOmia0bJZukc0djG8l2Nb1e2QQt4COPO3xKWjaEmvnqNpEcTBEwkcz2rQv8v0je+hafrzCPH6FyrjHfc9bdv1H2ii16XoupWWnafrPb0jviV1icBRjYIo2xtGA0ABc6/XHqlIYoj+Xly1v80YyT8l1pKMbPFd5cjr1ZXb1ObpVOjiyetztgZ/Qb9Y/NXKKJsEbY28mAAKm6cjM96hjcPUo4Nw+LuP7VdVnh+K5M6Nb8G3GvQHOaxpc4gADJ+C06K40V0aX00rJdh48Pqlc7WVyNBZ3xsdiWc7B3gdpWjoCidDQzVbuAldtb8B2pufxqCIjp15Dyyddi0PcImOe8gBoLiT4LzaljdqLUu6Q5bJJud/RCuerK9tHaJGB2JJ/ybB8f+Cqmn5mWehq694Blcehi/aVjmackmdmhg4YpZF1fCO9dtYMtFcKWOnEsbAGuO7HHw+C79FWR11JHVRk9HINwz2KhVtp6tZW1lXk1FS/fxPFjcE4XVoK2WPT9BQU+esTgt+AJP8A7+5EJyt2Tm0uN404d6bDUE1TeWzvpJHsp6TGCCRudnsK6+k6+a42dkkz90kbjGT2nChc6Jlv03PTxkkNYMk9pyMla2hMCzSY59M79iaTU19yJuMtO6XR8Fke9sbS95DWgZJJ4Bef6g1BVXuuFBQbuh3bQGHjIe/4Lt6vurYYOpNdxc3dJ8OwfesGjrTHS0r7rUtAkkBLCR9Vv/FLJcntQaaEcMHmkrfoabYa7R5o5OtGWOZ2JoieAPgrwx4e0OHIjK871XXzVk0dS0ERRuLGHs7/AJq8Wad1Ta6WZ/1nxgnCWPiTSDWwflxyy6sjfJnx22Vsf15cRN/2uC42laZs91ra0DLIQKaPuwOazatrDC2FrTgsDpT9wwP1rZ0nT9WslPn60o6R3iSm+ZkJeXpm+52iQOC5Oo742y0XSN2mZ/BjT+tdTtyvNNX1zrle3xs9ZkRETAO//wDKWWW1EaHAs2SpdF1I26212qrg+SV5Lc5lkdyHgF3tLXKaK9VFqZI6Wkbu2FxyW47lsVdTHpXT0VPFgVUjcAdpceZPwUtE2Z9JA+vqB+WqOWeYas1Gmjvz5VPFJyXw9I/9ln5JghYX1MbZREXDe7k3tWQFbnhuLRPgude7NBe6QwSHa8cWSeyVv5RlS1fUqEnB7o9ShCn1Lpl+2B0k9Nn80b24+HYuzRayJAFTT7j2mI8W/Fp4qyE5WrV2qir2kVFLG8kc8YI+9Rsa6HY9TDJ/Nj+aHTXuhq2jopwSeG3GHD7lvAhV52mGU7t9FJxH+bnO5p+/mFqs1FUWmtbTXKnlihecNc47g34O7R8eISvuZvTqf8p2WtVzWGpXWeEU1N/KJR9b2B3rvSTsihdK53qNbuJ8F5/RU0updTb5QTG09LLkcm9jf1JPh0VosMXJ5MnyxNyyz6uigbMyHrUUnrNE7+IXett/qhVtobtSClneBsc12WOPd8V2g0BoAAAA4BVrUha+40ezO9kjOXPOVLVFeZHPJqUUjsX+7ss1tkqS4B/1Ywe13YtXSN1rbvbDU1oZuLyGloxkKt68qXV91prZEThmM49p3/BXW20jKCiipoxhsbAEupOXDHFp4tr4pGeeeOCF8srg1jAXOJ7AqFpWWou+rKmua9zYxlzgORHIAroa1u2+m6nBJgOeGvweY7VLSEbLVp6quTwA6Uue3+iODQpZrhxeVgc2uZcI4Osqt931A2kiy5keImY7XZ4rvXKtqejprJa3Oy0CMvacZwOPHuVctJb9LyVUzv4oEt/nPPj+1XrTtrFLC6qlYBPMO381vckdGrccMYxq9q/crdDW1+mtRRW6qq5Kiml25LjnBPaM+Kv33qu6p02+7GGrpHsjqoD6u7k4dxXUlrJKG0moqg0SxxZeBy3d3zQjztRKOZQnH5nw19yqa9vL5GG3wvIYDh+Obz3fBc6r0jJQ6abXlrzWEh7mj8xqenqP6c1G6SUmSKnO92eRdn969I2hwLSAR3EJHdlzvSKGKH4s07G6V9oo3TEmQxNJJ58lKou1BFWsoJp2CeQZDD2rZe5sMRdwY1oye4ALzK3dJqXV4nJJZ0m/4NbySOHT6fznPJJ0lyeoMDWANaA0DkBwwq36QK4U1iMIPrzuDAO8dqsbiGty44A5leca4uYuNYI4vWZH+SYP53Mn9QQPw/C8mZX0XJ0NAOdQWqpraiQtgLvVYT3cyAulbdb09bXMpZqaSn6Q4jcTkOXIt9E+7GltUPClp2gyuA+f35WPXkcVFcraynaGdGzgG+BGFLO2eLHlzOMurv8AI9CBC0L3e6ex0bqmc5PJrBzce4LcidmFjjzLQf0Ly/VF0m1DfOrwEmNjuiiaO054lBw6LS+dkp9F1Nmm1FqXUFYW0EgiA4kNA2tHiStqLXldBVxUlY2MGOXo5pGjiRnHJWS0WuLTVpEbMOkPrPdjiXf8F5zfpIp70+WGMsa9wP8ASOeaD08Cw6iUoqHwroz2JrtzQ4HgeKaxUx/g8Q/mN/Usp5cEmjwGqYJYTSypYgQhCAGOSEsppAAQhCQAEO5JbkE5UgBCEEoASAMJoQgoEimkUmAiknhJIQI4FCEqGGB3JFgPYmnlTSCyHRhPaApZRhFBYgMJoSSAeUJIQxDQRwQg8lNFEUIQgAQhCkAQhCAApYTQkAsIwmhACwmEISAEIQgAQhCQAhCEACEIQAIQhAAhCEACEIQAIQhAAhCEAClF/HR/0x+tRUov46P+mP1qofMiZ/Kz531PHLV65uUMLHSSGukDWtHE+srPqfS0tzusdZV1ENFQxQMD5JHcTgcQB3qpanqpqbX9zkp5XxSNr37XtOCMuwu76RrdDbnVEX0bf5DG5gbX1VQXwOyAThuMccntX6hqdLny5cM8c1Go10t80fCY544xnGavk6bLz1jTtQzTELnPo39BHgDeGEcXgeK4dFpu8OfDcLtUyRkTMMUMry58ri7uXF0pQ11fVyGhu9NbHMA3STSlmcngAACSsOoG3iy36WluNVIa+lcPXbIXYyMgtPwK58fg2XFKePDNU+bauRpPVxyVKa6cfYuep2yMsmod7HN3V7CNwxkY5hc7QpNDQ3K5VB2UzmCBpJ+s8uHBcXUNXcWW22Goln21kHTO31BkEvrEBxH5vwWvpyw3bU8k9DbNruhYah7HzBjQBzdx4LTH4VJ6OWnySSt/sqIlql56yJdDoa+c38Z6nB/NZ/dC9y0Zg6Psx/7q39ZXzjeaeahr5IKirhqpGAAywy9I08Ox3avo7Q/HRtl/8I39q4P8RYfJ8Nx4ruqO7weW/Vyn3OhhJPkksT60CkpJAhIOnUSFlbBK/wCrE8/7JUuqT+4k8qKEpLuYUiszqSp9xJ5VIW+qIz0D/kkG+K9TWQs5oqlvOCT5LGYXt+sxw+5IalF+pBCRDhzGE0FWhFJMpJACEihIY1Vdc1Lg2kpGetvcXub3gK1Kg6xrm/TUjCNxjh2NHcT2rn1LqB3+H492ZPsd3RlKxlsdWCNzZaiQkl3cOWFYQtK1Q9WtlLFwBbG3OPgncrjFa6V9TM4ANHAZ4uPcrj8EFZhmbyZXXqzl6kqX1c0NmpzmScgyEfms7Voaq6GM0VAx4a2nHSOZ3NA4Le0zTyzma71QPT1J9QEfVZ2Ku6kldPea7vGyADvyubLbjb9T0NNFLIoL/L/uWfS8TqWxMdIfWdul4HvVWseK7UsL+YDnP4q9MhMdvEI+sItv34VI0UGsvjmvGHNjeCT35RlSWxBglayzL5U1MdJTvnlOGsGfiqm0y11FXXaYn8tiGBp5AFwBUL1XS6hu0Vqon5hYfXcORPaupqOFlJp7oYhtZG6NoA8HBXKW62uiMseLytqfzS/2MOk4g+suVQG4y8MHhhWOSRkEbpHuDWtGSSuJpAbbdM8nJdM4k9yxXG5fS1V9HwHFMCBJIObz7IRB7YIzz43kzPsisaruT7ncGhvCNoxGPirxSCCz2iESvDGRRjJ7z+8lVjUun5aStjr4I3TQNLd7RxLcLE+7XHU9dHDSwhsTDy5hnifFZQk4ydrk7ssFmxQUH8K6hqSsfV1THSN/JtjMgb3dy1tPU0l3rqeAnMEHrvGOHP8AasOoJeiuNTGHk4Ij7+ACtukbW2gtjJXNxLPh7j4dgWcE5zNMs/J06a9ehpa/OykpsNOwlzTgcuHBQ0TDJUudWycWwt6KP49p+XBWmop4qqMxTxtkY7mHDKjR0UFvp209NGI425IaPFdHl/HZ5y1X/r+VXJgvkZltFW0czESuLoSUfRNQTyZKSfllWaRgljcx31XAg/BUgUV2scdbQU9IZY6gkiQdjcfrU5LU1L0Hpkp45Yr5tGo5jr9fWtJO2V+559lg7FZq6pFe5ltoCNjcBz28g0Kj219Warq1MD0k2IyO3Hd8O9ej2q2R22mDB60juL3d5/cs8Vts7NdWLbz06IrmtaSOltlHDEMMa93HvOO1WCzzxUun6WSV7WMbEMklF7s8V5onU8mWuHrMcPzXKtxWXUElRT00xa2npsBruBZ8cdpVSTjK6OeMo5sKjKVU7FqaplraiTMZYx0bIwD9bBOc+CuVJH0FLFHj6jGt+QVKucLY7+6Eve4b4iSeOVcLhcIbbTGaU+DWjm49wRG+WyNVD4IQiYrpchTBtPFxnl4MHs+K86p5o6G9dLVAubFK4uGeZH/FXi1QOr6l9xqciXhtYOTB3Kv3q1C1XxlfLD0lE+QPdkZ29+VGRN00dGilDG5Y31aNi026q1NcjdK8FtM13qMPI+A8Fbayugt0O+RzW8MNbnGVXazXNDBCG0MbpXcgCNrQudQWq5amrG1lxLm0wPI8MjuA7k064XJGTFLJ8eb4Yrojv2mJ9wqzcHn1GkhmOTj3/BdwcljijZBGyKNoYxgw1o5AKYK0o87LPe/sSQkXY7FCKdk7OkjJLSSAe/CDOjLlSBGFiyVMckCJZC59+gpqi1VDaloLGsLsnsI7VvZwqVrHUBmzbqc/kyfXd7XgPBZ5Gkjp0mKU8i2mZ16e/RLJHHLy4QnPbx/ctvQlMW0M1Y85fPIePgFqU2m6ip0e2m+pO53TBp/Usdm1RSWC1NoauOXrUTnAxBvj3rO6as7pxUscoYuXZcqusjo4HTSnDWjPx8FXrQ191uRrZGgsjduGfaPJcs1Nw1bUsIjdHAw5azBDG/znHt+CuNDSR0VPHBH9Vvb2k9pT6nLKC08ab+J/sUi2g3XW0kr+LWSOdn+jwCt94ujKKIxNfh7hxPsj96o9PcDpi+V75oHPlJdszyOTnK7unqSru1SLnXtIiB3xsP57va+A7FC7HVqcS4yS+VJV9zi36nkifFTc5SBnvy48AfHCsGpnNtdhpbez1Q4Bp+DRn9a5Ww3LXJjeMtil3fIcFj17XPfdY6Zo/i4wR8ScpNGqi55MeN9rZn0haDVP6aYB0TX9Jx7+xX3PcuVpyg+jrTBE7+MLd7/iV00JHla3L5mVtdCXNV3XFV1e0tiBx0sgH3AZVhBVb13a5rjbGPp2l74HbywdoxxQ0TpFHzo7ugaBoRT2YVLh+UqHFxPgOSsc1RHTRukleGNHf2/BU+36xt1psVNC3dLUMZgxtHI+K4rJr7q6vEsRcyOM+qRwZH4+JUs68mknlyyyZHSs6ur9TPkiNLBljHjiD9bB7T3J+jaja0VdYW8SRG0+HMrcrNFxixPpad2+sJEhlfze4dnwVdpr7W2S2OtENK+Kpc9257ufHuCVHRBQyad4cHW+S4Xe7dYjnhpXepACZZByBA5DvwvPZBJJXU9PDmSRuMduXnj+1WV9FcqDSs8s8bjLK5vqN/MZ8P1rBoC3deuU1ylALYuDf6RSZpp3DT4pzTui5WC0NtFvZDzkPrSO7yVUdeN36ioGHta0f7yv4cuDqjTpvDYqmnk6Osp+MZPI9uCkeXpNQln3zfUyanvUNotT27/y8kZZE0cycYyql6P6Bs9fNXzDLKdvAn2itmXRt1r6OprLhUGWsDPyUYOeI8VXYLrV01vdaYWuidJLmQjg5381M9PT4Y+TLHilbfVl6qq43ivdRwu9Rg3SPH+bZ2/eVSeF21KxsIwx8wYwDsaD+4K11UTdJ6UkY57euVXAu7XE/uC5Po7tpqbrJWOHqU7eB/nFINPKOPFPJHouF9z0hrcADuGFIkclHJSUs+e+5NLCWSmCkFgEsp5UVIDyjKSEATByEKOUZKQAgc0kJCJJhRymOSTKQ0IQpGCChCAEkeaZSwkAkIQkwBCEIoBpqKfJIAPJJSSwkAkIPBJIBpk8FHKEDBCEJACEISYAhCFIAhCEACEISAEIQgAQhCQAhCEUAIQhAAhCEgBCEIAEIQgAQhCABCEIAEIQgAUov46P+mP1qKbXBjmvd9VhDifAKofMiZdGfM2s6gRa4uzyMhlc84+DlHVuqZtR3epqmS1MdJKWltO+QlrcADly7FbtQaM0xeb5X3Ea/tsAqp3y9GYHEtyeWcrR/wAnWmf+sW2f2d371+v4tXgUY2+UuzPg56edujnaL1dQafo66mq46tr6h7HtqaMtEoDebMuHAHvC52s9Rx6p1LV3eGGSCKo2AMkducNrQOJ7eSsP+TrTPH/9RbX/AGd370D0d6Z/6xbX/Z3fvQtVgU99u/wZL0+RqitX2+w3Sgs9PFG5jqCl6B5PJx3E5HzWxpPUkGn23UzRyPNbQyUrNh+q52OJ8F3T6OtM4/8AqJa/7O796R9HWmf+sW1/2d371XtmBra2/wBGHs2S7KFuG0ceK+otCf8AyZZP/CN/avGv8nOmP+sS2f2d3717VpJlFBpugpaC4R3GGmiEPWIxhryOeAvnP8UamGXSqMO/Y9bwbDKGZt9juwWKqkwX7Yx/OOSt6LT8Df42R7/hwXT3DCiX8Oazo9KWpyS9TWjtdHGeEIP9LiszYIWD1YmDHgmX+KiXoozuT6snux2YQZFi3ceaiXeKVBRlMpUd5KxF/ilu8VDQ9pkL1EuaeBaFBzlEuUmiQOp4XDBjaR4hYH26lecmMDPcs2896Rd4rNlpyXqaEtmjwTHI5vgeK1JbZUM5APHeF2S7xS3qdzRtDNNFdfG+M+u0tPiFHKsT2seMOAOe9akttgfxZ6h8EeYjojnT6nJXnmuKM0t4FS7+LnAOfEc16ZLQSxHh6w8Fy7jbqe4xGCrhD254ZGCFORb40j0dFqlinu9DBJd6KkoWVElRGG7AQAck8OwKrQSVGsbwx8sT2UMRzt7Ph4krrO0Hay4O31GPZ38Au3S0UNDA2CBgYxvIKHCcmlLobxy4sSbhy3+xlbtY0NADWtGAB2BecQyPr9UBm4hr6rcfuK9HLcgjvXndJTus2q4m1ZLAJSd7uTgeRU6lcxNPD6ayX1o9GCr900k2oqH1VBUGlneDuA+q7KsAPcjC2lBS6nFiyzxSbgzkad09FZI3kv6WeT6z8Yx4Bbd5t/0nbZ6UEBzxlpPtDiFuE4KMoUElQ3lm8nmSfJ5/TVF2ggls7KaZskj8ue0HOO4Hu8VarJZzQwxvqGx9M0EAN5MB8e0+K6pxzRwUQxU7Zvl1byLhVfUZwRg4481BkMUWejYxmee0Yyp8Eita9Tk5RxrrpWhulS2pfvjkB9bZ+f8AFdeNjYmNY0Ya0AAeCkElKjFcpFyySklFvhEkkkxhFGYIzlJ3NJIDGyhpo5zOyCNsp4F4aASs2AllGUqG231HhPCjlAKQFT1dbamOsjuVLGZGjAkDRx4HgVio2XPUdwFZJF0MTODek+qweA7SrlwQABwHBZPFbs61qmoVXK9THTU0dLC2KMYA/T4qUkTJWlj2hzTzBGQp8go5Cs5bbdnPi07aopjM2iiDz4ZHyXRDQBgcB3KIKeUkkOU5S6sfJA5oyEuCCQnBdTyNbwcWED5LnWq4UzaSKGRzYJGNDSx5xn4HtXRHguRW2mVs7qmjLHhx3SU8v1HHvHcVD6muNRa2yOs6eJrdxkYB37gsLLnTPJDJQ7HMtBI+GVxXVtdD6sWnAZAOYc3asDqC/wB2wKh0dBAebI/rAKHJ+hqtNH/M6/Mz3jVLIt1PTx9LK7g2IH1jnv7vhzWCy6ZmqKpt0uoAlJ3NhA4N7s/uXUtGnaK0nfG0yTHiZJOJXXJS2t9Sp54wjsw/qMFa81BS1Dw+Wnie8HO5zQSsyatI4k2htY1rQ1oAA7AMBSBwo5RlFC56mKooaSrc19RTxSuacgubkrO0Bow0AAcsKOU8qGkPc/U5UVgbBf33WOUYkaQ6Mjt7wVkuunKG7TR1EzS2aMjDmniQOwrog8VLKW1F+dO1K+ehJuGjA5KWVjyjJScTFmUFLGeagHEJ5yoaEc2p0zaKyfpZqKIvzkkcMro08EVNG2KGNrI28mtGAFIcU+SnaXLJOSpsnlQdBE54e6JjnDk4tGQnkJ5CVEcroMtDgQ4Ag8CD2rHTUdPSNc2nhjha47iGDGSp5TBU0K3VEhwTUMqSCaHhV+9OpKKoZLDQxT3CThHho3E95Wxqa+NsdvMobumk9WMePeuTFWtsttN2ueH1s7fycZ5tHYB+1Kjt0+GSSn34X3KvqszdfZFVVDp6vGZMfVYTyaAr5pG0/RNniY5uJZPyknxKp2lbZNqG9Pr6vL4Y3b3k/nO7AvSgcDCR1eI5dsY6denUaEsp5UnkUCEIykKgQjKEmCBCEJDoEJ80YSASEykkJoEIQgQ0ZSQkUh5RlJCBghCEqAEIQpEzUvFe21Wmsr3YxTQvl49pA4fpXN0prGg1ZRMmp90U+0F8L+bT4d4W7qKgN00/cqEZ3T00jG47Tjh+lfPuitR1embkYyNrj6zQ/lnK6cWJZI/c87VamWHJHsfSRIAJJwB2rToLrT3KSdtPuc2B20v7HHwXKuWoYp6G3inJBr4zL8GAcf0lYdAvbLQ1srCCHVTgPgAh6fbj3SNPat2VQiWhJPmuM7WFiF1ZaW3KGWue7YIY/WOe445LmjFvodUpqPVnYKSZSUNGqBCEJACEISoAQhCVgCEY4I+4/JKmKwQhCVDBCEIoAQhCQAhCEACEIQAIQhIAQhCKAEIQigBCE8FIBITwUYKAEhPBRgoASE8FGCgBLFVfyWf+rd+orYWOdhkhkYObmlvzCvG6kmyZK4tHy3pmzwXvUUdJVSGKmBfLM5rdztjckho7ScYVvotL28X51JNaKeWirgZaefZKAxhjLmxAfmScAS53BdOL0G3eCo6xT32KCVrtzXsa4Oac9hWceh3U4dORqyQGo/jTuf8AlP6XHiv0333o2q8xdPufHPw3UW6iUW7u0lHp6WO2MkbcjIwYly4gD6xB5YK7140nap68UFPFT0sEFIKuV1NSyOqMNiDiAXHa4knkFv8A+QG4/wCuab/yyui30R6pwwHV0pEX8WNz/V4Y4cVT8b0PFZf9wXh+p+g5FRoqwuZK6WOohhZTzSMEMP5clkTHesCcfnE47+1atd6OKGeoa6GqlibURt6t0VN6gxCJCZTu9TOezPFd0+hzUgk6Uaqd0gLiH5fnJGD29oRH6HNRtbLGNUuDJQA9oL8OAGBkZ7lK8a0a6Zf9wfh2o+gouqdH0dhonz0tdNUvgqW0s7ZIQwBxjDwW4JyOOOK9g9DB/wDgWD+uf+tVOf0HXqojc2bUMcgc4PcHtccuxjPPnjgvRdC6Zl0np6K1zTsnex7nl7AQOJXj+P8AiWn1GlWPHO3Z3+F6TLizbpxpUehl/iol3BYy5RLuC1R1bTIXqJcsZckXIKSJlyjuUNyiXc0UUoky7gluWPcjKTKUSZco7lEuUSeKhoraZN2Ebli3I3rNoe0yF3xSyse74I3LOSHRPcjd4rGXcUZWTRVEy5YZYY5h67QfFPcjKydotWjQmoXsyWHcO5ajgQePBdrKxS07JhxHHsIVxz1wzeOR+pyVpXO1Ud2jDKqIOI5OHBzfgV05qV8XEes3vC11vcZo3hNxdxZCCJtPCyJpcQwbRuOSsm5I8klQ7b5Jc0KIOE8koCxlJGSjKQ06GEJZRuQK+RpYS3fBG7xCTKolhGFHeO8I3DvCVAM80kEpcUUA0I7cIUiBASRlFDRJCWUZUg2PPBLCXNCTQDwjCN3ijPzRQAhGUsjvSCxoSyO8JlJhYDgnlRymCkBIcCmo5Hejck0BJGVHmgHjhICWUZSyR2Jbh3oAlzTCju+CYKVEskE8qIdx7E+JSaEPKahxUkqAYTUcp5UtBRIHCluBUMIwpoTMiFEHCeVLQhpgqOUZU0FEsqW5Y8pg8VLQjh6utNTc6aGala2SSmf0nRO5PHcqrPRXzVNexlRTPhZHwLnNwGBekAphI7MOtlijSVtdPsatqtkFnoo6SnGGsHE9rj2krcykhJnHKTk7l1GgJZTBUiHlJCEgBPKSEgHlGUkJAMFMlRynlICSWE0JALCXJMqJ5pCoeUZSQkA8oSTygYIRlGUAY6mqgo4XT1MrIYmDLnvdgBVib0qaPhkcx14jJacHDHEfqXXv+m7fqWnbT18b3tbxbteW4Kodd6CqGZ7nU9zfG08mvj5feFpCEGuWceeeeL+BWiz0vpQ0jVzNijvMIcTwL2lo+ZCpHpE0LNUxvuVkgZUwEmaN0JBLM8XN4c29o7lpVHoGuLXEwVdM9o4gdIQT8wsukZb/AOj2tlprhDWNoJBjo5YjIwOzzBHJbxxxXMGcM5zyfDmjX3NyT6StOldO11VC9n8GnjIPEtc45aD9y9B0Zb327T1KyUESyDpXg8xu4rhzX63G2y0s5jloX+vE9ztwjdnO1wxlo54J+C7Ws6qrp9JVlTanhsnRtLHt7GnmR9yeabklBm2LFHE3ku6RUvS9rae0wssdslMdXUM3TSM5xsPIDxKrXoltEZ1HDLK3dLFG6dxPMHkMn71RZa2SsvhbK90xjALnOJOQByXt3omtHQWaW6Sx4lrHnaf5g/4rWUY4sTRxwnLUZ1fQvWcoQtWuulDbBGayqig6VwYwPdxc49gXlKLfQ99yS5ZtITwsdRPDSwvmnkbFGwZc9xwApodk1qV13oLbjrdVHETyaT6x+A5qn3zXFTWufRWZpi76l/b/AEQuFQ2h0zpZqmoMtaxwdl7vreGSq21yZuZa7p6Q6anzHQUktU/ll3qNC4/446irzIGNpaQNbu4c8fErBNDFUlkLndG0u4sHM9q1iH01TV08IaWEDgRkgdqdohyZG4Vd5NP0TrlVCYjc/dJkceTW45LRnfXyU8BguFVG4s2vL5DgHK6s1C8D8i+IGRuXF3Z8AsLg6kfHsMdSHNwA/kPhhNMmyM1RfKExvZc62OJrfWcZAWuPZwW1bNf32OWOGrjgqGnG57m7cA/BY5T1lkMMj97CRkNHb3laTo8SuDwCzJG/lgKlT6itl1ovSLZpw/rD3U2x/R7nDIcfDwVko6ynr4Gz0szJo3cQ5pyvG6hsdZKynjiY5jDlr8YLvBRprncLRd6Z8dbJTxMGHQRDIHH6uO1TLEn0LjkaPbcIwq1p/XNFeZ30sjXU87DtBeMNee4ePgrKsJRcepspJhhJNI81NFAhCEUAIQhIAQhCAHhGEIRQBhMcAkhFAPKaQTUgCEk0ACEkJ0A8JJ5QnQrAICEIoQ8juSyhCKAEIwnhUgFjgnhLhhSaCcAc00JnXLlAu4KJeoFy+2TPO2k9yRcoFyiXcU7KSMhccqJco7lEuQPaSLki5QLj3JbkMpRJ7kFyx7kF3FSx7Se5LdlQyllQyqJkpblAu4JblDQ0jJuRuWPcjcs5IdEtyMrHuT3LFoqieUFyhuUS5YyHRkJzwWnUUmTuj59oWwHI3ZWanKDtFxdHMIIOCMFLAW9NC2XjwBWm9jo3YIXbizKf4mylZEgLp6fjpX1xFV0fR7T9fllc3mkQt06YskN8XG6svPV7F7NJ8wjq9i9mk+YVE+5H3K/MXY4Pdz+tl8Fqs1XlsccLj/MPFV6/af8AowCaEl0JODn81aNnkmZcqfoCcl4BA7R4q6aga02ip3Y+qq4kjB79NmjFStMrumYrfJHP11sJIcMdJ8F3Or2H2aT9CofPipMjc84a0u+AWanSqjszaLdJy3tF66vYfZo/0JGnsOODaTP3Kk9Wm9zJ5Sjq03uZPKVW77GC0K/1GSrA1tTNtxs3nbjlhdyy6XNSxtRWZaw8Ws5E/Fc7T9CK65xxvGWM9dw+HYrXqC5m2UJ6PHSv9Vo7vFKEVTky9XnmnHBi6sbo7NbAGyCnjPceJQ2GzXRpbGIJO/bjIVCkkdK4ve4uJ5k8cpxTSU8jZInFj28QQjzF2J92yq97s6uobVBbJmiCXO7jsPNq6mlrfS1lvc+eBkjg8jLgqvNPLVTOmleXvdzJVx0b/wA2O/rClBJyHrFPHp0m+SuXWmH0zJTQtDAXBrQOxWyG222z0rTM2IdhkeOZVcqv/mwf1rV19a46hCDy6T9hTikrZln3TePHdWiV8sMFRSOqaRjWyNG71RwcFTcq+acqet2iLccloLDnwVLuNP1WvqIexrzj9ajLFVuRtoMklKWKb6FnsFso6izsllp43PO7iRxXDstp+la17CSyKMkuI/UFZtN/8ws/2lytHVLI6upgdwdIctz24Kravhs51lmlmcX0OubTZqMBskcIz7Z4lHVbF7NJ+haOqLHUVsgqqf19rcFnb9yqUkb4nlkjXNcOwhE57fQNPp1mjfmOy9dVsWfq0nzCrWo2UbKtgoxGGbeOzllchGMLGWS10O7BovLlu3NjT7FFPdgLHqdxd7RaaKe2QSSU8bnuZkkjiqXLgSvA4AOI/Sr/AGL/AJnpv6sKgTEdYk/pH9a6M8aiqPK0Em8mS2RzhWLSdFT1nWOsRMk24xuHJV0q06J51X+ys8EbmjfXSawtpmne6Wmpb3DG2NjIfULmgcOfFd4QWL2aT9C4GsON0H9W39q4nDljmreTbJqjCGmebFCTk1wXvoLF7NJ+hHQWL2aT9CpAppiOEL/KUxSzYP5B/lKXnv6SXoY/6h3NRR0DTTdTEIy71tmOS7DKex7RuFJnHHOFSHRPiwHtc3PYRhLCnz6duJs9Fugoqb4L10Fi7qT5hApLHIdrW0pJ4AAhUXHgExnPAYPgn7Sn/lRk/D39bLdc9MQuidJR/k3AZ28wVxLLHAbi1tWGdGAQQ/llWyyOldaoDN9bbzPcqXdAG3GoDeXSHCM8YxqaRGjnPJvwyf5lu6Cx91L8wjobH3UvzCpIaXHABJ7gFPqs/uZPKUvaL6RKloUuuRlz6Gx91L+hV6/imjrQKUMEewfU5ZXN6rP7mTylRLXMJa4FpHYVnly7o1to20+lWOe5TsmHIzlRDsJ7lyUdpJPKiCE8qGhEgU84UQ5GUmhEwcp5UQ5PKQiSFHcjKkRLKajlMFSA0JZTSAEIQkAIQhIB5KMlJCQBkoQhJgCEISAEIQkAIQhADykhCQiMkrII3SyvayNgy5zjgAeKo969MumbQ90UT5ri5pwRA0bfmVr+k+g1JqTo7PaKaQUIAfPKHYEjuxviAqNS+hO9ySAz07OJ4mSUBo+4LqxQjVtnmanUZN23HEuVD6cdM3Gfq9RQ1VMx/qlz2Ne3j2EDjhd+511vgsFTFHWRPt1TA5sUgeD0JI4A/wA3PyXJsXogtdteySseyZw5xRNw0+BPMq9C2UXQCDqdP0Qbt2GMYx3ckpzgnS5NMMcsovzeDzio9FNvmuVnmoZTHTSUwbVdplAAO4HvdlelUtPDR08dPBGI4omhrWjkAFU5q8aZ1HR2mHfJbi0ue0gnqYPLB9jPZ2K2TTRwtaXSRt3na0uPAk8lOVydJmunxwjbSMF4ucFmtdVcJ/4umidI4d+ByXzXJqa46w1SK2umc4tdujY0+rGM5AHwVp9L2v62shqbUOkpYoPVmhH57weZPa3uXB0Ja6Z8DJnuEUk+N8juJYD2BdmlwqMXJnlazUPJPbHoeqVfpTZFthoKB87mta3fI7Bc7HIALWudwq9QRMkrx0EUZBMAOWA+I7StG32GGkqXVUuGwwgujceLnD95Tbd3VU0kbYWO2uy3jgc15+Zpy+BcHpYFOMam+TebRwU9F1iR217ziOMdqw1dE8hswLA9xAa0Dip9M6rDpJGB8p9VoPJvwWwKyCMhu4kxsAc48gRyAHiVgatkhRihqjVTvaHCMNyRzJ4KE01PQZMjh00+GsOM5yOCy07qahifXVUja2pkyQ0ng3PLA8FoGJ89d9JVgayKPBAZzOBwAVIRiqopgGtz0T3EjDzjgFk6RjLeGuDcsaMbew9qw1txF0relMJbFEBsJGePam8OiiiYI8GQGQjPE9yaA1i/bGfWczHEEjmtSWWV0hdNK9uCMNWWeaSTPTB+QAAB+ta3QF02Tnjg8eZVoDaZC2MuqA3MriCWgrXlrBTuMvR7JCeEnM/FFeHF5jdy4HgeIWOCmmr3Na/1ogPqknIVLgDGX/weMdZaJHy7gcHJPfw5K/aP1lFUSw2iqqRUTuG2KUDgcDkT3qiOhZFLGWAudGDlpHPxU6GOU4uO+KFtORtIHEnPZ4pTpgm0+D2xUr0gekeLQ01NG+j6y6dheBv2ngcdy7Wmb3JdqPNQ1zZW8AT+eO9eT/hAU8lTeLe5jSBHAQXk8OJ5KtBhjkzbZ9CdZmlDFuib9P8AhAvq6iOCHTpdJI4MaOsYyT9y6c/plrLdVCC6abdREgkdJPz7scF5Xo+ho4s1l0ik6Jp3RyMGPWaeWVwbxV1FRWva50pc1xkDnPLy1p4geC933dg+k8Va7P8AUe2QenHrVLVTw2UF1MBuj6fieOOHBc9v4RLC5zXWEgt7DPxz8l5FappHVIL5yzpXBz8/nEHIz966ep6eCkrJbhTBrmzEOMTuJjcef/BHu7B9I/eGb6j01n4QjZHANsXMZJM/I/JdW2+mWa5SuZFYQQyIyuPT8h8l4hA3pwA1jePEgdit9ZTU+ntMQwse2oq7ofWax5/Jsbxz8SThHu7B9Ivb8/1F4b6b6h0c736fDBCze78vkDuGcLCPT9EaMzfQ7ekDw0RibiRjieS8luc9RTU4pWExxyuy9u7iccvuWtTSuj2iRjDHuO57hy4cEe7sH0h7fn+o9gl9PxYfVsQLcA5M/wDwUB+EC9zS4WEYH/b/APBeQyP6WPcMgOORuWCKV7XFp/JA5Bdxwj3dg+kft+f6j2F/4Q7mksbYAXcDxn/4L0TQ+rZNX2+erfRtpTFL0e1sm/PDOV83W6xRz00lzq6lscdPjMY4vkJ+qPAHvXtHoGkE2nLjIN/r1hPrcx6o4Li8Q0eLHhcork6tFq8uTKoyfB6agJ44JL59HuD5hGEBCYgQhCABCEIAEBCadCEmjtQAXHAGT3IS7Cuuo44zI8NaMkrr09E2mAccF/6lloaEUkIfIAZHDj4JzP58F7uj0O1Kc+pwZM+91Hoc8u8VEu4JEqBJwvV3GiRLckXKOUi5PcPaS3JblDdxS3eKqytpkLlElRLuCiXJ2OiRcluUSc8UiUrHRPcluUdyjuKB0ZC7gluUC4lLKhlbSe5G5Qyjcs2FEtyN3BQRnCxkhpEso3KG5G5YyHRk3eKjlR3cEblhIqiWVGRoe3BRuSLlg21yikjUkaY3Y7OwpRsdNI2Ng3PccAd5Wy9oeMFb2maYPu7N35jS4L0tNqFk+GXUWXLsg5djq0GkaaOMPrCZH44gHAC3foiyN4GKAfFy0tY1stPSxQxuLekJyQeOAqfknick+K75OMeKPMwYMuoj5kptWeiUVFbad+6lZCHfzTkrn6vNT1BrYm5hLvyhHMKo008tPMx8LnNeHDGDzXoVS1s1uf0wADo8u+SakpJmObC9PljJuyj2W2G6VoiJIjaNzyO5XCaW22OBocGRjHAAZLlytEsaG1Th3gArnatkc67lp+q1gwpXEbOjKnqNR5TdJHb/ABttmPqyeRRfqu2uY5obJkjH1FTEKPMs6F4Zi7ssujMGrqXdu0Y+GU9buIlpR2YJWjpasbS3VrXnDZRs4967urLc+sohLGNz4TnHh2q1zA58v8LWpy6FZsdNBWXGOGpAdGQSQThWr8XrKeHRM8//ABVFBxxBIKzUr3Gph9Z3129vis4yrho69Tpp5HvjOi1XnT9vpLbNPDBtexuQdxWXRmPot2PeFbmof+ZKn+gtPRn/ADW7+sK2qpnlb5S0snJ3ycWr/wDmsf1rV1ta/wAgh/rP2Fcmr4asH9a1dbW38gh/rP2FRfEjqn/Nw/gYNE1ORPTE8sPb+1aesKfori2UDAkbx+IWrpiq6td4snAkywqwaxpjJb2TgZMTuPwKn5sdFT/ha1P0Zn00f+QWfByo4lkhnMkbyx7XEgjmOKvGmv8AmFnwcqK/67vif1qcnEYsvQpPLlRarXrBjmCOvbtdyEjRwPxXZqKGgvEGSGSA8ntPELzpbFFcKq3v3U8rmd47CiOb6h5vDle7C6Z17lpKppcyUpM8Y/N/OH71w3NLSWuBaRwIPYrnYtSi5SCnqGBkxHAjk7/itDWFujhMdXG3BccOx2pTxprdEWm1WSOTyc3UrKDyQg8lz0eq0eiWLjZ6b+gFhfFZbZ6sogjc7j6+CSsthP8AyPTH/swqDWzvqKyaSQ5cXn9a7Zz2xR89p9M82Wa3Ui7/AEjYfeUvyW5b6ihnL+pOiOPrbAvN1atED+U/coxZnKVNGur0KxY3JSbNTV//ADoAOZjb+1diy2Knoqds9QxrpSNxLuTVytRDfqOBp5HYD813dSSOis05acHAb9xRGK3Sk/QjLkl5WPEn1MMmqLVE4tBL8drWcFAattnsyeRUpCzeoZ2rwzHXLZ17/cqe51Eb6cHDWkHIwtmx6b+kIhUVLnMid9Vo5uHeuAwBz2tPaQF6JUv6haXvjABii4fJGJKbcmRq5ywQjix+prtsNpiAYYmZ7NzuJWVtlttP+VFOxu3jk9ioZqZny9M6RxkzncT2q82W5Mu1Bh+OkaNsjVrinCbqjj1Wny4YqTk2a101JS0kJjpnNll5AN5BVKGKSsqQwcXyu7e8rcvtqNsqztH5GQksPd4LJphrX3mLdzaCQueblPIoyO7BDHhwPJDks1Nb6GzUnSSho2jL5HcysDtVWxpwN5+DFr6zkc2kgYPqueSfHCqK0y5vLe2KOXS6RaiPmZGy6fjZbPZk8irV1qoqyvlnh3bH45jwWgpA4XNkzOa5PQwaOGGW6JPKYKx7lIFc9HVRLKeSoZTypoVEgSnlRyjKVBRMFPKgCnlTQqJgp5UQUZUsVEwpA8FAFPKmiaJZRlLKMpUBIFPKiE1LQMaEgnlIQIQhIAQhCQAjCE8pMBYRhPKEgFhGE0JAJCe1LCQAhCE7Cjn327w2K2yVsxbhvBgc4NDndgyV4tqXXtzrnyT1N2kpqcH1IoDtBHcO0/Feh660FV6q2T090dHNFnZDKMxD4Acj4ry65eiLVhmc+agbVY4B0UgPDwC7MCgkeNrfPlKknR1tE+le1RPkp7xXVrBOBH008TZGNHcTzxxXpEJkpaO3wzTw3K1Szgx1ocB0TebGnvBPAO7F47F6GtRuppJXW5sQY0uDHvG52OwDvWzpHW7NKUEthvNJWPpXudvaJMOjB4EbDw8VvOCnzFmWDNPGtuRUjuSaGqr7rK+1F0Z0tDTyO6UO5yNcOTfEDj9y1aTTtFaJDJT18lXSAARucAN/wAVgodb08FtnoIq1tYyr401bjBLccWSDseB81yqmmgslkZVzZjYIukcXOyWDntCxm5NrG/U12Rit8Tn329zRwMp4d7nPdgNzx+Kjpav66+Vjtsc8ThG8Djgd4CLBJFdqU3VzDF0p4F4xsb/xVS0rdZKfVdS7iI90u8DsABOf0Ks2NU4RVJGeHI4tTk+WXzU2r4LNDHQ09O6qqXnOAcBoPL7/AAWSy1dU+nlkuMsfSSEEMaz6ngPn2qoafpp7zdn3GcOeXO3sHx7V6la7bSwgvmY12WjgTwaM8SufNCGLHt9WaYMk8uVt9EQp5aWJjNtO178cTnGUzTyySNiqS1tLG0hhd6pOe0rHVVFBTSbI+kaXO/JhmDwCc9PLWVUdVUvcICMbAeWFxnoGOuMNLTMhh6N0ecZIy5ak1ZFKS2bc1rW7Yxj9q3amNr3sij4gZcTjme4lc18fWKoAZLWn1mDjxVJgZamI9TEr2Zzj6ozgDvWlG53TbwBnGQSMgBdCpbwflzmtB9UErTpSYo5C4bg7gMDgFVhRhmaKiQuLhxxk8uK29vV4xsfuAGHgjj9yW0VbQIWAhh4nPBdCnjiD5mPIJc0NaOfFEmKjm0cPSdLJIT0QBG53BOrpaenpoIA1zC71ydpIJzwOeS6UTHiN7nOwA48AM7sJ1vSSxmEdJudFlrsfVGVFso2KO5Pbcqakp+laWBpIaOBdjt/UqV6YaqluV8pTI+SH8g0kg528e7t4qz001RA6MNG6RsRa9wbxbz5+OO1ec+k6jq46qhvUgdJDM00z95xgjiOPwXd4a0sys49anLE0ad6bTmzxUdule/o4y9+M+u8kZPgMKpxuma1wa7a88yeeFd9PUVPPcqalkrgyOWAsZjtceXNc66QFsk9tp6eASF22SU94OPkvpbPBRx7ZHALhCYonSQwevLK784duPBbV6qaS51MjKQ7Y2ABrXHGQBz4oibBAwUkUhc8tLTwwCfDwWM0LmzQiUAOxtw1AztWC0CKmbW1rmRU7HhrHOaSHuxns5rfggbdLiytfNF0eXsYHcc8Dx/Qta4yx0UFJa6cTVEwaZiwHg0u5D5BcRl0lfqKhpmsEEMLxgDh8UmBDUVbDWXNzhxAYGAsOQTjmufTSCpP5Wo2Fg2luz6yncZaQ1TzSh4YHcDI7OVjpqkNnc57R63PhzQBtwQbocuHFjsg5HEd+FhayW6TiGGP1g7JPZwWRstPPUtgY10bpsNB54K3ZrbLard0NNO189VKWOeOADRzAP60DMMhLmx04l3wxHLnDhvd+3C9t9AoA05X4GB1w/wB0Lw2ldHAxsBIdICR6vFe7eglrRparcDndVuOfuC87xX/5/wA0d3hv889JymllHavl6Pog5oQhMAQhCABCMJ7UALCaMJ4TJEutZKESE1Mn1W8Gg9/euZDEZ5mRN4lxwrSImU8LYmcGtC9TwzTeZPfLoji1mXatq6swzuWjK/iVsVD1oyPX0dI5sUTULki7gokqJPBclnekSLlElIuUSQmmXtGTxUdyiXcUtyrcPaTLuCjlRLktydlbSeUieKjlIu4p2G0nlLKhuS3Ise0yZRlY9yNyTHRMuSyoZRlQx0ZOCRUdyNyxkCQ8oUcoysWOiWUwVDKNywY6Jk8Es8FHKMrCQDyuvpjhcic49Qrj5Ta8t4tJB7wVOPJ5c1LsRlx+ZBx7l5uFrpLoGdZG7ZnGHYWl+Klp9l//AJiqMkkjhwlkB/pFa5mmHOWTzFe5h1cMq6cnDDQZYqo5KL1Bp+1UUgnDBlvEF7sgLQ1FqGFtO6lpXh73jDnA8GhVMyyHgZHkdxcSoE8Vr5nojXH4e96nlldFr0S4CKpGfzh+pdWtsNBXVBnnDi8gDg7CoDXvZna9zc88HCfTS+9k8xQsiSpoMmgnLI8kJ1Zd/wAVLV3O86DpW14J2uP+2qQJpfeyeYp9NL72TzFG+PYXsWb/AFCVSBBVytjJHRvIbx5YVtsupoaqJtPWObHMBjceTlTDzUTxURm0defSRzQUZ9V6l9qtNW6uPSNBjJ7YzzTo9OW62O6Y5e5vEOkPJUeOtqYW4jnkaPBxRLWVMwxLPI8fznFVvj2OL2DPW3zOC06k1BTvp5KGnxK5/BzgfVaP3rPo1zRbHAnB6Q81SVNssjAQyR7R3A4S8zm2bS8PXleVFnarMfjWCDw6Vq6utSOowYP+c/YVTy927cXEu788U3yPkAD3udjsJylv4Zb0bcoSv5QjkdG9sjThzSHA/BX22Xqku1KGSOYJCMPjd2qgcgluPYSPglHI4l6rSRzpW6aPTmRwU1O6OENYwA4DVVdPWeiuUc76nO5shAw7Cr3Ty+9k8xSbK9ow1zh8DhU8qdcHNi8PnjjJRnyy9DSlq7n+dH4q2ruf51RusTD/ADsnmKBUTH/Ov8xSeSPYXsOf/UZf6WxWy3SipYMObyc5+cLharvMNWWUsDg4MOXOHLKrrppHDDpHkfErHjCmeW1SReHQOM/MyStokFIqGVLOQsEekeh2Fzfoam4j+LXn04/hEv8ATP60hLI1oAkeAO5xUcntOVeSe6kcmm0nkzlK+oA57Fa9EuA6zkgclU8qTZXsztc5vwOFOOW2Vmmpw+bBwRZL+QdSU58Y/wBatFZSw19O6Cbix2MgHC80L3OO4ucT3k8VLp5veyeYrSOem7XU4svh7koJSraXcaUtR/Md50/xTtXsv/8AMVH6eb30nnKOnm99J5yn50PpF7Dn/wBQ72orTSWw0xpQ4F78HLsqxXZ4+hagZBPRd/gvPnSPd9Z7nY9o5TM0pGDI8j4lQsyTdLqXLQyko7pcoQ4Bbtpucltq2zNzsPB7e8LQyjKwTp2d+SCmnGXRnodfTU97t+0ODg4bmO7j3qs6cjfS6g6GUYcxrgVxWzSNAAe4AdgJR0jw7cHuDu8Hit3nUmm10ODFoZQhLHu4Z6LcbbSXNrG1A3BhyMHC0vxWtXsO86pXWJsfx0nmKOnm97J5iqeeD5cTKPh+WCqOSkXX8V7T7DvOq3qChp7fXCGmBDNgPE5XO6eb3snmKRe55y5xce8nKxnki1SjRvg0uSE7lOxKQOAo4Rlc7O6iW5Sz4LHlSyVIiecoUWlSyihDQllLKmhNGTKAVHKMqWgMg+Kaxgp5U0JoyKWFiDlLclQqJp5UNyYcpaFRNCjlGVNCJZTykhS0KhoSQkA0JZTQ0AJ5SQpYDQkjKQEgUHlyST5qWMihPGFo1V9tlFKYZ6tjJB+btc4/oBVKLfRCckupupgLiO1pp1ji192p2EcCHhzf1hSdrPTbC0G90ALhkflRxT8ufYnfE7BC5ly0xZr3I19wtlLUvHJz4wT810o5GTRtkje17HgOa4HIIVL9JF+u9Fb5KSyU9QZS3dPVRt4Qt7ge8/oTxp7qTMs8oKG6Ssr9/wBHWSrkuLKGg6qwjYxsJwPV/Ox8VUdVX2nu9jitMgfFUv2xPLBlsbmEAg/HGVz7TYdRtq21jqqromPftdLK88SezHafBdDVdtrKemm6CRscVQ5kU8j2YG4H1XZHLu4LoSUZpSdnnb3PG6jRmtVdRXieLT1CXgxxn12AFoIHMlYrRpt1putbUzMDppm9CBjgc8C74ELt6S0pDpyEiJzXTPaHOmIwZD2gdwC2m1tO+WW4TxRyt4xsbnk3vx4nKnLqXNtLoGLTbUm+pxWagsFmLqanqoQ5pG4MG45H6vgrBbdQUV4nAgrBMXN+pjAb9yrD9D2W7P6WjD6CR5Jc1vrNP3Faw9HVxoa1stJeIWyNO5pLHNIwplHFJcy5+5anljKtvH2PRLXamseaqocM8SAT3dyzV8xkO5xDIw3axuM5488LnMlqI7dHNUyt3MbteYnZbuPMBRq7y0xxRDG3GN23mfBcdHabZlxBJvxuPBuzgfhha0RMcmGRlge7LpCP0BbDDL1c1TgQ1oAAceJPesEdy3yPiOHvwMAA4CKAjXFlPGHl28Z9Ygdq1fynQF5OYid21wwF1JLfDvzM1+8gcHnhnvwtOto2tqA97nGIDbkcMJ2Bjhpptona07OBDBwBWWGpcZSJInHadwLBwHxWanc8ta2MSujI4cuI/cs0MIDIgG5ySC3PclYEomvkc0OlID25LcdpWeKnzUbXyPAYQ3b3KMnQRBsji9kmODQe1TdI6eeNkL2xOe0lxJ58OCViZhkZJHTbIYw1zXOJOeLxnmq16SbfNddEVgqGN6Snd1gM7Q1nd9yt1I0QFrnEvm3AYx2d+f0rnXj/AJWoa+GoZjMUsYc3huyw8MLTFPbNNEZI7otM+ebXXuqcflCejxt7C0diul1pZeqUNzmMbX1cbgHRu48OGT4qiWG0Vz4jV9VkbAPVEpOGu8B3qxyXCsda4rdNUHq0TzIyNoGQTz4r67en0Pn/ACpEW0rINjzJ9YEtB4cQs81fFRPhcNjnyMy3pBnI7wuXI/gSGbuGMuOVrCpy8ZjYdvAcOQRuDyGXinifNDHdam4NjrZ4H9HGWeq5jOXFUusoK+GrjrZdzOnb0rZByx2jPepRXRgkbv3MLeAIceA7l0qq619TbXUsdQ2ohI4RuGC3xHimmS8bRy6plAKjpoYjHAGj1dxOTjj+lYKapmD98TQdp3N3DIafHvWaWmfcY420YyGtHSA/WY7ODlSZDukNKGO207SZT9XPw8VRB17XTOrrg6rlEcZDCOnLdrI3Y54Ua+QdHT08cnTRUrXMik24DgTlx+8qdBc5C2fqxFNFT0rw1jm7t+eBz4rm08jnNDScgnG79iYGpO1wqRsDgSfV8V9DegqN0ekqhrmhp607gDnsC8L6RzwImRtc9gcQ9/dhe6+gkl2jpHEYPWX/AKgvM8V/kfmd/hv849GQjgU8L5mj6IWEKQRhAEUBSwEYCKAAEIQgQIQjmmI6tgpw+ofMeTBgfFdWcnGFgskPRUG7tecrJNwyvqvD8ezAjxc09+Vs06g4C0ZHLanPNaUpW85nXhjwarnKBdwSJSJ4Lms7Uh5UdyRdwUdyLKSHuUdyWQln4J2VRIngo7lEngolyEx0ZNyRcse4o3KkxpE9yW5R3JZPcnY9pPcjcoZRlKwonuRuUMoye5S2Oie5GVDJQCs5MKJ5RlRynlYsVDyjKWUZWLHRIFGVHKFjIdEsoyooWMgoksUzPzgsiDgoxZXjluQ0jVSKnIzaVjK96E1KNosaFHKaoBoQhAxFJMpJACEIQAJcU0JALCOPemkgA4owhGQpGCEimEBQICWQnkKRjQUgRlMIaEJMFCSVAGTjmllMpJDBPKSEATCaiOSDyUiJIUAeKe5IRJCjuSJ4oGSTUAVLKmgoaMpFJKgJ5TyoBNAiWUApIQBPcjmoJhJoKJIyoqXBS0JjBT3eCgmihUSyjKQwnkKaCiWUZUEBTRJkBTysaeUqCjJlAKjlNS0Kie5AcoJhTQmjKCmsbThS3JUKieUZUMpgqWhUSTCjlMHgpoCSajlGQkIkhRympoVDQkhKgoaY5pIHNJjG5waC48gMqt2ch0tVUkHLtxB8crr3moNLbppAcEjaPiVyLTG829zsgZB+9dukjycmoZ4/rZ3S183ElznnOTw8FQKtxiPRkD1XcCF6FrUbKs7GkkklUC4M6R5LeK6Mb6kZFVH0t6L7p9KaJtrnOzJCzoHf7PAfowunqubZZZI8kdNIxnAc+0/qXn3oCuplt1dbnOyY3CZo7e4q3a+rYaKmt5nMhjdOSWs5uIC87IqmzXrA4roTd6+jpY4i1lM0zYc763Hn+had2ko79abkyVg3SEtaGn6hHLA+K0pdVUtXWVnUemp53xdCGEZ9UcznsVn09pCz32zxujdcIqiEgT7Np9f4EKMGCWSVJ8mWTIoK2UqluU1wsUEznvjkbJ1Mxk8RKDg5+7JWxW0QgoS5z98MLB6o7lYK/QlusdY+ubLcpHue6Xo5NgZuLcE4A54XCN5muE/0XTW6KJkvqucXl2Grqnp547pmMZxmadse6OJo2u3lvDHMBdBta535MMJOBlzuxFNGIqgucCXQxmN5Aw0EDv7Vpsa9kb8y5dJj6x5NXE3Z0pGxPN1mcRRv3NbxORgZ8ESu6Q7QMbQADjl8FHomRs9Q8XDi7KiG/lmOlJLRg45ZRQzo0lJJLDmWVxj2+qHHtWFmwVIdHIC0NAIAxk/HuXPraqSWZzWO3t5HB5D4LMymY5oIftxxI7wpaCzpGeMYc31yXZc7OUVlUybZA5mGEj1jzK1JJGbXOp4wI88+z5qMZAjLy4vkJ+t7DfBKgOrAWRPcG7msY3JwOPBa0rXsq2TRuc5rhkDdwGUp6sBvQxYa2NuHADn4/FZIXtMjI5g5oc3ombQctJ7fBSM22wCZzXubyGAQeag9jIKmFzIyRgxt7cfeo9IYZp2zSOqBgNYDyAHgO1ZjOHQue6N/RUzMvb3nwPekJm1KY45207ste5m8YPHh3Kraq1THp6ItkIfUPBDYzxAyMZWaW4scx1xlE7IYGu3OfkZxxwM9i8omqp9T3uWsn3Fjneq09gXZo9N5s7fRGGfLsj9zbbJU3F+4jYDwa1ow1o8AszrBJjcdrvgrJZLE2reIWcCp3+wVFuBkge78nzOV76htVRPP3J9Tz+vpjGSGtK5TQRKQQrW1/SGQyNBJz81W6xwjqnYARFv1Bpehz65rmPzggFKlrHQuGScLLdahr2twMcFydzyeC0izN9S00scdc8Stk6GXscDgZ8VuTVEkVO+gaxwke4OlkIHYOQPaO1V621MkZDXcFamObW0TpOjbLUU7S9rXfnDtBwrizLJBNGhRPa6F9IAfyrMuOOPA5wtKpc6lnDoHucwY59qG1NRUu61HDHGAcN2cuCx0twqGOdI6ljqo8kljhjhjsxyV2YUS6yX4kLzjPE45L6J9Bj2v0c9zHBzTVPwR9y+eGyU0lM+SASBjx67Wn6vH9K+hPQRx0K04x/CZP1rzfFX/AAfzO/w1fxj0fkmkOSa+bPoBhCAhAwQhCABGUIQSGUHihB4cU0D6FsoxsoIWj2QsM3atiDhSQ/0Atebmvr48QX4Hgx+ZnPm5FaUq3p88VoShc02z0cXQ0CUi7gk4qJPBSdyQyeCiTwSJwoFyVlpD3FIuUSVElFlpEieCiSol3BRLk7HRPcjcseU9yaZVE9yNyx7kslUgoy7kbliynlIKMm4o3KGUZRYUTLkw5Y9yYcs5BRk3J5WPcnlZMVE/vSBUcoWTCiY4lNQaUysJATCFFp4JgrOQDTCSYWTQEZG7m+K1XcOC3VrTswc9i9HQ5aflscWYsJhIFPK9QoaEspbkgGUsozlASGGUZSwhIKHlGVHKaAHlJCSBDJ4JIQk0UgQhCRVCSTPNJIVDBwnlRTSEPKaiE84SAZSSyjKB0NCWUZSEPOOxBOUkkgHxTyUISoQ/vRhIIygY08qOU1LGPKW4JFCBEsoykhIRLKEkwkA0ZQhIQ8p5UUZRYEsoyllGUMKJAoykEKaESymOKjlNpU0Kh4TwjKEqGPPimHZUUgeKTQmifNSCgCpAqaJJZRlLKW5KgoyZTDuKx5QCpoRlBTB4LGCpApUS0TJKahlP71DQqJhGVEJpUFEuaEkZSoQ8pg8UkKWBydTS7KSNvA7n8kQRGOxk4wS0rT1ZNtdTxgZ4/tXTlna20NGPV2cR9y9DSrhs4dR1R4lq1zWTFxw45IwqLIz8q5uFcdXzNkqXg4+sR9yq7mNc8OHIcEsfQvLzRcfQvUGh1S2EktFQHRkfdkfqXpfpJqYKantz5ojKN8m1vYTt4Lx7TMrrff7fVA4Dahjj4jOF7L6Tsiy0tSCG9HUtaXYyQ1wwcfHgsM0fisOkSk2KmtNup33KVzqgh+djG4Bdz2r1L0ZU07bdNcqxphdXydMIzw2twuNpH0fOquguVzY3oWYfDTYPP2nfuV/dH0YwOAHLgurQ6VxfmSODU5k1tic7VFJFVQyNHFmDgDivHJ7fU0lz6Ub42OBbnl2r2asPA+PBV262+Go+tHnd4Lsz496a7mOKbj0PPbrWmUugiDGbsB2TwOFXzUzG47WtG3l8ArLqSyytjMlKAHx59XHEqnUs5ild0g3Su9U5XhywuHDPThNTVosw/LMAa8MDeZyoVU4diASb2960X1GIQ+mc1rW/XyVimnETxxD9zchynax2bzyWNJpeMruHDmFOKqiEG1zzJKD65H1T4ZWhFXsgic+pLgTkMA/as1Gxkj90haGycSOxqTVAmbMAklc0NwGHPqe1+5bhidBtOWl8nqgDiAO1RlZBRtIicXY/Ozngh1a6CAPh2uc71Rkcs81L5GN0Qe0sYzLnY3Pd9bA7lKaSokkHRNayIO+qTx4dpKjSvdIfyUhJB3E7OfetiOSNzo6fo8ue4gtB447/AILNqgRgoTVtElZJGXuZuAA5jhzU47i2CgfUTN2NnG/nknHZjxWzVtgtkcFBE/bJO87i08h2frWveKcUULHiN0zYI8bSPrEd/hlICuelC5S0Gm4aL1muqHA5Hs4yqdZHilpWvDRuOMK7avtcGo7Vb6yrklhdI7oo42OH1uQyD2Klaypzoajpy8macv2mMjaMjnhezoMsFFQ9Th1MZNuXoexejyhpJqc1lQ/Y7HbyXQ1JT0v0TPUNkbIH57OS8W036ZpqOgNObRuZyJ6bBJ8OC3bp6Xpn0slE2yuhz31GT8sL10jg3o5la98E0jmcslVKuqzJVkZxxXTnv1XVRucyicWc3Oa7dgfJcC5PpWXiWmhmMzGkBsjeG7KxtXwac0ZLk4BjeOVGgYH81nkhotm+rkrQxvPo2tP7UQ1Nlbwp5LjIRzBY0ftVJ2uBPh8meZgjDS3sXa0/WbapmCDn1SD3FcaRkMo3MM2w8i7gR8U6OofSzNLGh3dlVFMmckYbmJaW5VFOz1Y2vPDPBa8cuyMtZI5ucjmslfUy1lTJLM1rXuPEN5LVbFveGZxnmVojCjp08k1HSskb0bSXD1fa8V9I+gyaWo0MySbG81EmcfFfNDq0UbBSxNDztw4uH6l9K+gMOPo/iLi0nrEvIeK87xT+Sdvh3849GQg80l82e+MFBKSMooLJZ4owkE06ECEIToAR2oQihMttKQ6jhI5bQsEw5qVpfvt0Y9nIKc4X1mN7saf2PC6SaOdN2rQl7V0JuRWjKOaxmjuxM5DiokoJUSeKzbPUSBxWMuTcVElSWkGVElInio5SstIkeSgSjKi4plUPcjco7kbkxpEtyN3io7lHcqTHRk3I3LHuRlAUZNyeVj3I3oCieVLOFAHgjPBQxUZA5MOWMHgnlZsVGTcnkLEHcVIFYyBomCFLgAsYKllZSETHEIwotKms2JjCkFEdqkFDQiWEpI97CO3sTCkOaqDcWmiLOdjGQUsrNUs2S8ufFYF70JbopmydhlPKSFQx5SyhCQwyhGEIAEsoQpCgTykkgKHlGUkIGPKMpISAEIQgAQhCkAQhCQAhCEgBCCkgBoSQkBJJJMJANGUkJAPKNySEgJZyjCihIRNCQPBNIYIyhCQh5RngkmECHlNJNAAhIpApBRJGUhyQkBNPkooykKiWSmCcKCYKVATyUYUcqSmhMM4KNxSKEmJomDlNQCeVIiWUwVHKBzSoDIFrVd0oqBuamqii8CePySrIJ6qLoaeTo3uPM9o7s9i891X6Nbzcap0tuqpKXpGO3h7DI04GfrN48exUoWcebUbHSLXP6QNPQPw6uy3HF7Wktz3Z71zn+lGgdBUSUtHM8xjcwyyMYyQd+c8F5fP6LNXiZsQr6aqmaA/o43dHt3fVPrDifBciT0Z6pjhqnPtcsrA7aQKtgErhzAZkZ4rVYPucz1Uj15npco2bW1NGYnRt31JbKHNjHYAe0rZi9J0ZqITNQiKnnZvhZ0m6aT/ZHL714rS6HvdPPB1jSsz2NAdKDUjA4cN5J4DwXTtenbw6prK92l4umAHViZtuABguaM8u1DwxJWome30+sIameWPqzmNbGHtJePWPs8eRWePU8MrqRrKaZ5qCQ4MIPRYHavD6Wx3J9vpx1CGKQTF8tWyuB5HjjJ/Su/b5IaCWd0stTROuEzG0kMNXuLgOBccZI/Uo8lD8+R6vQaloq2LftnhOcBk0e1zuOM47uC3orlRyuc2OojLmnaW545xnHyXj7q+aijqXMuF2ldC5jBG9rXHAOS47uX/Fa9f6Vqi30cks1NAahrXOc55DSB3Acs4ws/KT6FrPJHol5lbV3rogd3RkB3gV1bweitL9vs4VD0feHXdlPWvGZJ2CVzs9pVyv82LYWDj6mStdPLiSHlXMWeH6ol6SrdwwclV/I3jB4hd/Ujf4S53eVwoomyOJ5JRKydTYlreqwiVrsOaQQe7ivpq2CK8xW+CSOOdkkcc53DIAABB+a+V7zhlG/wDor6c9DVS256WpriDuzBFA0+DG4P6crfHj3yT7HNqMmyNdz0BrWtZgDC1p48jgAAOa2w4HsWvUyAZDc5wvTPKs5NU3Od2A3GcgZK4lcQyFznvO08jyXcqe1zN3BuMnvVauMm4FpBcA7t5ErGZpErtycNhdgOHevOdah1BNHWUwOyUbH7ABh3Ycr0SrcWiYFuGniMjvVM1fT9Yssxx/F4cMHj9y4s0U0dWN0UqluRLDFO8OkcCQSukyrdUtBG4OwOR5lVpkO53SOY4l3HjwK61FI2P1XyhnD87gfuXHKJ0pm2aiernaJC4kZAbzyV1qKd8cYDnHYeGDyWhTxtdVEl7PjldWGGCNoZJKxxHNocspNFpGdtUXQ8BuGeKluD4h0jySHAho9Xh3KZqKGAdKw7sna1rGnjw7D3rDuZDO+aYSN2tGzjn7srIo3G9G0HoekyBtw0cfn2rZp4XUkDJWvHWn/muHBjRy+8rk2+qna93V2PcXHLi52cD4LpRUs8W0ud073+sAXjic8MnsWckM6sNM2s/h9a4OEDctAwST+rmt+OGC4tbLUE7THt28uHeVo0lMIg7rpAJbt6FnEA9/Dn3rnSXbp2TOp2O2ReqXF/b2cFm0/Qdma5W6orZYDSxtkfTTgtc/6pwc8PkvF/Stc23XUb4txkdTEh/HIdIeJI/QF67e7hFYbBU1ssxzC0FoY7iZCODT3rwGgDqivkqqwOkD3lznZwclev4Vh+JzZwa6dR2owUtFO+PGCNvr7cLrQyC5shcXiJ1KcdG48ZM9viVKuBpaKSeN5xK0sYCRu4fqCr1tkfJcYnucSc5JPwXtyVo8uD55PXvRxaoptE3+oIAcI+BI8CvJ66MNupGMesMr270btx6Pr2XDGWfsXjN0H/LLsDk8LKMUjpk7ozmIGnqh4D9ala+ipqrpmsGIWmQ8eZ5D9KjFMJIqpzRuAHLvXGqqpzZHbAWZOSO5VFWZ5XyWa2ytrKmaCeTfuBc1/L1u9JrXUz5ItjnSNOQ781a1hrIoW7y1r3OG3jxwvp30aaXs9y0VQVNVa6SWSancenfGDtO48Se0/sV9DKj5vjgZUMLntc44JwwZJXa0No6t1ZXTUNO9lPJE3e507cAtX0xV6JtVvtsk1Pbo+kiazd0ZaA4k8T4Lmtp4YZnw0lHCZWt9eYswOPIN7z4KJTp0aKFnlLPQLcKh7pfpSncNocejjyQPvK9K0NHQ+j/Tkdnqa5kjo5XvL3uDTlx5YRqK/Cw2CuukUWx9LH0kRz9bjgnw5qsQXZ18lnqzHBvmhEvRvbwduaDgePiufMlljtkb4f4ct0T0ga1sZqo6R1a0TyO2NYBnJ+IXcXhkUz4qGWtjmiifTbiXY/ingDGPhkKx2qe+QUUcjdSz1ZMvSH1WuaeH1T247cLy8mhv5OD0Yaz6z1BBVIh1rWW8xMrpIZ3OZuIeBG45OAcjh9y3af0k2OQHrEjoHCQxEfW4gZ7OzHbyXHLS5F6Gy1EH6lrCa1rdcaW60kdZRTMmgk+q9vIrZWLVOmbppq0CaSYSGGEcE0IIOzp2oGJac8/rBdKdvDkq5QVBpapknZnB+Cs82CzI5HkvofDcm/Ft7Hk6uG3Jfc5c7eC58owSupO04XPmbxK6po0xSK8SoEpu5LGSuVntoeVHKCVAu4KS0hkqBKeQokoLRElGUikTwQi6GXJZSKSpDoeUshGUsqkOiWQjIUcoyEwokCnlRB4IyhhRPKYKhlGcKGhUZMpZUdyA5ZtCaMmQnlQynkLGSFRkBUsrGCpZCyaEZAphY2kYUwQoaJJqQUA5SBU0TIyNUwoNUxzQkZsxVkWYd4/NXPXaLQ9jge0LjObtJGORwvU0kvhpl4n6CS4oylldZsNMJZRlIB5CRKSEACCjKRSYwQhCABCEIAEIRlAAhGUZUjBCMpFADyjKSEhDyjKSEmhjyjKSFIDQllPKQAhGUigB5QkjKQhoRlGUgBCMoygBhMKKaQyWQjIUSUA5SESJCajhMEYU0A08qOQmgB5QkE8oFQieKAQkeaEgJ5CM5UcptPFKgJIBSyjKQiWU8qGU8hICYKeQoBPKkRLIS4JdiEhGTKARlRygc0khMx1hiLY2T000rHu+vECTGe/gtM1dLTw9FRXx0czpwdlW4HI7YxnHFZrhUyQOgMVf1OXJ2l7C6OQ9jSp9er6mCU1Nnobgc/WhnaGuGMEjcMh2CeGVtE8bUO5shP1+KV0lPU0VUHOIc4t9ZjebcEHgAe5atwq6qKmrW1FNA+aaVkbQHERuJH1+RIx3rJ9HU808DWWeaExQ42via9pYewkOAzw5rmPoLVHSUzKWlrYZKmdzB6zmvexpzscc8BxIGcJyZiQqq+upGiKaGl61BF+VJ4CUAfmDHHHDiuB9K3D6NhlmbTNhqSXQyslzJA4niHkDi3w7F14LPRx3C6NqIqpsMcYMcwmk3x5HCPAPHs5Ksvoo32yn6Glq5Xxuf0kb6pzI5sHiRnkeSgohV1FWTtqZ7VT+qAZA174pWD85oAxn4LiV9FVsjguTbrCaWokDZAYjI1gz+cSeHeutcYrXVV9PSx2ypkbG0OMXSk9E88eOTg8VzKqkiq7WIhpyqDulfkw4dHI7vILuHcqT7FHLqKA0dQemvQkEhID27fyjCMjBJPAKpaufSNpCIIHzyDi6Rzi8BuMA9wVzqjUU87um0/TtlNOC3DWNDB3dvFU/XNfU1dLiepiia2Pg0P8AW/o4aAFWL50E2tp6Z6L5z9H0hPDEbRheiagnBtUm3g4ADK819G8jX2uh2Hjtb+pX+9iQWssfhxJzkLni6cjratRPL7+GxAOkwSe1cEQFlQSzixw3Bd3VMbw3BbnHBo71y4HyNhYHMweX3Iiysi5s5V/j/gbvAEL6O/B5wfRhaz3tfn47ivnnUDQKR4/mkr6C/B4ef8mNsHD8/wDvFd+k9TzdZ0R6acNGcrTnaXDcXYPILeIBHFas7AMuIBwO1drPPRya4tBDOGTzDeRVariJJAMEDuKstXPsaY2cScuJxy4qq3kuczOSBx4k4+CwmzaBxbs9zS6MDPAkKq3rbJbKiNzuQ44Pgu9eKxkFM1hOXAY3jsXnl+1VEXGkjidJKeHDnj9q5pnTHgrEcE4jcJPXix6uDx+a6luDauhayVmSwEDIw7nyyqjJe7jQ3AxPpuiiz9V4wXjvW0LxNdS+KJ5hibxDGuwCe3JXJPFJdTWORIvtBvhBkbDD0IHJwzj7+1Z46Wo4yOMLA53NrOI+PcqU27y2zAhmfLHwJhceGO1KsrKm918kBlfE0gbI2Egf8Vh5Lf4GvmIu5nie7pXTuma13BjCAP8AgtKtusU0rQ6CSSXcccfVHd8VztA2eEv21e5xa4seHOIxxV/sVuslv1OaKFm7Y/8AzoyRnsCzlFRlXoVutFVZqCWGBgjpo2Oc713O9UFbtFcoo6wSPkL6h3Ho2vyB3Fel2uooTV361GhgqWCqe4dKwOaG7W4CotHp+wt1bB01NK2mqZCzoGuwGPHMZ54wk4xfC6i3M1p7/VV85hhGWOxmSPPM8+Pct3T1NFG6vpGmOaSN2763IeC9UuWhbXJV2yOlp6ampYg98zWM5tA4DPNeS63oobK+pFiaIoXPImO4lzcjk09xVeTztEsvHBSPSTexeZ20lGAyhp8Ya0Y3vxxJ71TKOOFrYuncWs6Qkn2ePNW6S09LR9M8Frtu7hxVavlLHTNiiY5jhIC4Fhzn7l7uleNLZA8vVRn1Y+u0xqXB7WysO5oPMAd64ELqeKUiLLnOecO7AFsRQSytMcDdzzw24XOfDJRytEoDX78bQc4712Pockep7r6PXsb6NLwS4bsH9S8brMSXZ5HtL2DSbWx+i+uI5uOM968ffnrtQ/tbxWNnUupCgyYqxoOOBye5c+5UDoMvc/ORkZ7Vt2id7n1mBx2Ej4r0L0bejy36xoq6ovjJHTxyNER6QhoBHIhOLoiUXKSPObBN0L37m+q7huI4BfYvokhjl9Gtse6SQtNM7LmnBa3Lvq+K8pl9EtotrurOtxjL/WB6Vxae45C9r0JFHYNI2+3xUDnNZFsGwgt4uPE9vanuTG8LjyzZ1GY2aVmYyWtYXbGb3jLySeRP6MlVCoqY2Nle6WVk0YaBHHwO3cOHxzzwrlq2800VgnY9skk2Q0/kzt58Md4Xnn0i/ZUbI6p0krsM3wHazvIOOR5/FZT62aQi65Od6VK9kOh7sI2h+6EMaY252gvGQT8eK8+ptUx22koaGF7nTu2bctIbxA4E9y9C1HA51kLIqSpmjMsbnQbMbmBw9UA/NOoNLeYZ6F9qjEwyAHx4B4cMZ+7j2LJl7aNX8VqmuoTDIaGpjkYHyRNkcXAHngjgtitt9nt1IxpZNQAcA6OU4dngO8eKrUsE1utMN5oJOo1UbjFWUucxlw7cfd2dytUF2ZqCjfFcoBHVQsBqKVrRhzCcNkZ3+OVIHN1VFRRwNuFJVtcychrGc3syOJae0nlhVp1O7po43zilMJIJzmV47CT8FZW2WljL7XJUvpqSN3SxxAAtIP5zSfqg+HaqzrHQIiq2XWKvrPosvAEb5fWYDw4kd/6EkkFnrnosuNvZZBb2TRR1Ikc8w9ICcHtA7vgryvCdPMo7WyOWiphjf0cjw7EzGjtyc8QPmvWdMX11zidT1BIqYeByCDI3sd4/FeVqtO78xHo6fMq2s7qEJrhOwaEJZSJoasFnq+sU5hefXZy8Qq9lZaaofTTNlYeI7O9dejzvDkT9DDUYfMjS6linjwOS5szOJXVZMysgEjO3mO5aNQwjPBfR8SVo8yDadMpxKgSglIrhPpEhOKxlSKggtAkkkUFoCeCSCVEuwihklElGUlSRQ8pISxlWkMeMowgcEZVUAIzlGUZSoQ84QTwSyUZUtDDcmCkhQ0DJ5UgeKxgqWVjJCMgPHkpgrEHKYOVi0S0ZGlTBWMFTCgkyBSaoNU28lNEMytWRoysbQsjTxTUTGTM7BwXLuDOiqXDHA8V1Y1qXiLDYpPuK7NLxInFKpHLcoqRPBRXedgIUJ546aMyzPaxgIGTyyTgfpSdURNnZA6RoleCWsPNwHMoFaMqCtGK+W2asNHHWROn5bc8z2gHkT4LYgrKeplmihmZJJC4NkaDxYSM4KKDdHuZULRkvlsigfUOrYuiZKYXOBzh45t4dqz0dfTXCIy00okYDgkAjB+9INy9DOhadBXOrJaxhYG9XnMQOeeADn9K2Y545i8Rva8xu2Ox2O7kqGnZMpZWnVXm30cYknq42NLzEDzy4cxw7VB99tkdPHUuq2CKRxYx2DxI7MYQJziurN9C0n3q3R0YrHVTBAXbQ7B4nuA5qEuoLVDSx1UlbEIJAS1/Ejhz+CA3o6CFp094oKtkb4aljmyO2MPEbnYzgZ8FkfcKWJ72PnY1zNocCfq7uWfikNSRsIWCtrqa3Q9NVStijyG5PaT2KNHcKa4ROlpZRK1pwSARg/egdrobKFqUNaauorIiwNFNN0WR2+qD+1QlvlugqjSPqmCcEAsAJwTyHJIW5VbN5CwispnVTqQTMNQxoe6MH1g08jha8l7tsVaKJ9XGKgnGzx7s8s+CVDU0l1N5CxCrgd0uJW4hJEhz9QgZ4qMNdTT7ejmY7fGJRg82H874JNFWjOhaNLe7dXVDqemrIpJW/mg8/h3/csouVGaeaoFRGYoCWyPB4MI55SoW5dzZQtauqxS0E1WwCQRxl4GfrcFNtUzqbauUiNnRiRxPJoxlKg9aMyFz6e/W2qZI+GrY5kTOke7BADe/iFtuqYWOia6RrTMcR5P1jjPD7kgUov1MqFoU19ttXUdWhrInzZIDePrEc8d6zNuNI6GWZtREY4S5sjs8GEcwUbWLdHubKFgfW00YkLp4wImCR5J+q08iVhpr1bquCWohq43RwjMjs42Dxyk0G6K9TdyjKxPqYY5Io3StD5v4sE/W4Z4fcsbLjSPMDW1EZNRkRDP18c8JUO0bOcpgrA6sp2mcOnjHQDMuT9ThnisVDd6G47+q1McnRjLuzA7+PZ4pUxbo9zdyjK0aK82+4yvipaqOWRgyWjmR3jvHwW6k0EWpcoYKlu8FBPKQEt3gjd4KOUJASHEJ4UckI3FFANMKOUwUgokhLJTCkVAmkjOEmBLsRlLKOKQiQKeU4YpJnhkbHPceQAXeoNKveA+rdtHsN5qo45S6GGXUQxfMzg5ycDn3LcprVW1R/J078d7uAVvpbTR0Y/JQsB9ojJW59UYC3jpu7PNy+JvpBHnV3bJbahlM6thglw09FNHlkhJ7D7S57rO9zXOZZ4pWHa7FLNt3HJ7DyHPK7Ws2yPur2OdSOj2NPRVIw057nd64BpIGyHZZ6hjC+N7jTz5GQMdhxjv8AFZSVOkc+9y+J+prtkhoN7G0N/hDKYvIjPS7W54ZIJyfBcc3COJhoDWXemnkmD3VVZBvhkIxyIHDsGF2oomslMDfp6J0sBe0DP1gfrHvPgubW3CoqbdHR09be6d0LxI+WWnyHx9uzhyz3pNAjVinq6vUNXBDqEQOfFiSI0nRtPcRu7f2Lh3J5dU00Fbd6WsdBI7EroCyE45NeeQwu/WV76t9e2KVleKaNronTh0RJ7S53536lX6mohnmpfoqG1Nc8OdK6USOYTwyCCMO+5TtKbMeoLlTQ1MFS+7WYQnG+KGMucHeAzxVYmfSOoqkR3xkIdJl+ykcNh8ccCV35qvooqVodTQVTKolrY6Aua3HHIyPVHx+K0q+8XKspJQIpqemqag9JLHTAA/zhkqqGjnVEdNUSU8bxe6twpvWdEwxtORz5/oVI1haBR0LJ225lIDDxM0pLi7wCvVXHVMqRBNUXabawu3CWOKNzBywBzJVI1TFTxW5j2NhEj4CN0k5lkzu4jHZwVYm9yJn0PRPRhubaKOQdrAvSLu50lBtOA7IP3LzH0V1jTp6iJ48Nv3hemXF4dQuORjbkLlS+OSO//LEoF4LZZS2Xkxy4dSxgdG2I5wOK6N7c94e6JzCXHiCuPFLhx3kBx7k9lBKXoamp4w2hLuG4tP6l7n+DvIXeju2sB4AP+71ivnzU9S4Uz9rjyOAvpP0N2sWLT8VvwW7Y45ADzAewP/avQ0h52s6I9GZnaA7mtaseBzGQs/HOcErXqzhgy0HjyXazzkcWrbvduaezbwVXu1Rl5aW/V4AHtVpqMAO2555x2KqXbaZJCBuPLgueZ0QKdeR0zJN3qnJwAvHNSPMd7hfxw2Rez3cs2ZY4A9o7l5PqimAq3Su4gHgue+TZI3IaGkrp20NVEJ+jJkjJ78Zx8F6FoO3Wyukko6igpxA6NpA6McDnHcvOrVKXy0dQHBr8BhP3YXo2gmmGskidIN+3DSfB2f1LlytpWbwSNbXfompRWQy2qSKigmkEbw88GNJxkfuXUk9G9l0zR0dTNRGrkL2xmV7yD3ZwOH3Ky+kCKSSlmfE/IaGSNaOzBBXTrIzctJBxc1zowH558RxWPmNjqjxehhp6h9RV02GQvkc04JyCD3J01XLbr3Nc6h3rSO/Is57+GM57hjilY6Iw0l3iDjvjnkwPDOVq6gY6sp7KIHAEU7mu8HbiqUE27Bt9TcqtYXe1SzzQTNj6xl8mG5z96y2PUNTJUUlyqNtQ2N5eGluCSeeCuTeqJ7aGPJyXM2FZoInW+ydzsYafA9yW1JcFPlnpGpvTK2dxodPQfxkYZLPM3jH3gD9q8wqb+6Spq21cxqGFpI48C7tK1bJTTSucACc/WPbxWjqanNE1tNG072REnhxy49q0ik5URW2NmpcdQT1NA2jiaGR8XF7eZb2D9Cp9vuUcFYRLEZTuPR4OeJXTrXSRQOAad7sQx47TjH61l1Zpw6R1Q+0y8JoKWB7z7MjmAn9a9TTwSVo4NRJvhmtVTzOmDH/kS7sA4t+S5dzhpqAw0znvmq+kDpH54NHsjv8AitplzfDKXn13EHOeJK4FRLLNUCaQ5L3E811ehyJcnr2mL4To19CHcC4khUGtcI56n+dldXRFQ6dj6fPBrXOI+5ca+Ho5pvElZpHQ3wadjk3VNRjn0Tv1L2r0ATOkoq159Y9YbuOc59XgvLNC6bjvMFXUNqXxzRtdlgHAtx2eK9X9DlJSabp6tsr5HNllZteT9U+KckKFtnuFrkmdbTkFuZCW+qD2LNPPL1To2SObwxlatvMk9rY8cnPdw5FOWUQsbCBxIySeSk7Uk1yZunmLxFueQBnPYpTzzNc0g7uGNo4ZWOCQmLL3gnv8EOc2VzHB3BuVLKSVkJpnmMOmdh7HA7XDg7wXNvtTHWRk9HIAzDuiAGXkch8CVt1GauYMPJo3fetSpZFJ0VPLFHKd27EuMYHHJ+CT6ESR5NeKY0Wlbh0wPrVX5IuGSOJBAcOWD3/cq865zWq92K5Nf0jqaiLpWjgHRg8WnwKs2pIXUejqmoZF0b66uLmubJuHMknHeQePcqtfqdjaqgimIlP0QMhv5hJyOXw5rnXXkzo9MudF01BHX257ZGNY2aERtyWwu7z8c/JZjFT3a1PgaGvhqY3MYD2u78fcB8Vp+jepguVifap3bZKOFjg1h3b4nDP6Dw4qdspKijE1C8tYIZTLE4cSGk8QfDccofUmyg2Kcsr5G11LTvcGOJErS1jHNO0ncO7h8Then+jt9ZFdKRssEjvyL4ZJXEZHHLcjJx24x2LzTVjXW3U742NAjmInY/i1sjXcCD3DOVc9B1ckd3t9S2ToxSVTWgNHNjuBDh2AcvHmFnKCmqNIScXaPZwc4UgrPNbKOoHGPBP5zeC5VXY5YMuiPSN7u1cGbw/LDnqjvxayEuHwc5RUjkHBGCO9RJXBR1AmEBBQBuUFc+kkz9Zh5tXZf0dTGJYnBwPcq408FnpqqWldlh9U82nkV6Oj1jxfDLlHHn0+57o9SukqJQSo54ruPWQnFJB5pFIsXakUJFNIpCKiUzySCpIpAgppdqpIoQTQUsFWkA0kxzTTSFZFHFSQnQ7FlHNNCW0VkeSaaRUOIxKQKXNAKxlECYPFTaVjCm1YyiSzIDxU2lYgeKyNWTRDRlasjeSxsWVvJTRnIyBZWgZWNqzN5qkjGRnYOH3rHdGB1C5x5twVlYOAU6qPpKSVp9krpwqmc6dSTKz2JJ9iS7z0zkasjklsMzIn7JDJFtdtztPSN447Vy6mhuzL3A2puLKuR1HUtiLIBHscQPEq1EBwwRlMgEg4BI7U7Mp41J2U99XSVVho7ZSFoubXRARBvrxPa4bnHu7ePisFXNU2i73Kuponv65UGlIaOUhaNjvhzV0EbBIZAxgeeG4DiR8U9oz9Ud/JBDwN+pQaelNqtj6eOqbS9DeXATyM3AerxcR25OVb7LO6oonOfcYa94cR0sMYYB4YBK3jG1ww5jSDxwQm1gY0hjWt+Awky4YtrOZZf4+6jt647+6Fq2q50VNX3KmmqY4p31ziyNxwXZAxgLqUNPDCZ5IX7xUSmVxzkZ5cPksxhYX7zGwu7y0ZUlKD4aKm6GolmoG00jIZRcqgh7494Hqu7MhbF9NXS/RJmudPTzNlfuqXQep9U/m5/arRtGOQ4KLo2vGHMDh3EZQyXi4aKxXzQvo7dUS3hvSxyvMdfHE3oQ7HEObnGCOHNIzGq0ldH9FDu2TASwNIZPw+u0dmVZzDGWdGY2bPZ2jHyT2tA2gAN5YxwQ2UsTuzl19JHVWFrHZa9lO2Rjm8Cx7Wggjx4LjyRMp9I09XO8ulqJYamoleOLnFwJJ7gP0BWwt4YwlsaRtLQW9xHBIPKvkruorjTVtBTy0Nwp2iOsjzUYD2sOeZC6VjqHVFK7fcYLg4OI6SGMMAGOWASt7oYgCBGwNPYGjBTaxjBhrWtB7hhA1BqVs51lGK68f+LH9wLTooK83e6SR1cMVMKgF0b4NznANGcOyMfJdajpoIZ6t8L9zpZd8gzna7GMeHBbIDQTjHHmkJQ3JFHoprhHdI79LQ9HT1NQ5rp+lyehd6rAWYyMYB+9Zqqpho6ueOnmZOH1WZLZURflN+R60bhx8RnIVyLQW4wMdyh0bBIHljdw4biBn5pNkrA0upVqmkuss19fS3JkEJkfmN1NvLvyfH1shYIaeea3xRwB3SOsrAAOGeIyPkrlt7uR5+KQaAcgceX3JOXA/Z1fUrM9ZRXKS0U1rcx1TDURvLWNwYGNHr7u7hwwuVcqeWgsd2uFPG50VS+eKpjaDnO71ZAPDkfBXtrI2EuaxjHO5kAAn4p7QRjAwUbqCWG1yc64H/AOHZgfsuP90KNaCdMTAczRnHD+at+qpmVVNJTyZDJGlhx3FOKMRRMjbxYxoaM9wUpluDv8jgyUVzdpmqhmqYqoyUYbGyODYQdo4czlR+kKa61tlZRStmdTuMkobn8mBHj1u7irID3KDWMjLixjGknJLRjKW4h4m1RTrfHWYsrKwwsojUucx8bCJGyAkta4nkDx4rWr4JrfZ7pcIGvfDUyTxVMTRk53eq8Dw5HwV7wOAwMDwUtreW0YPgnuEtP9yrVccD5LkKoTiHqdLudE3JbjPHHbjmtaas6xbrzGyamr8UYxWwRbc8eDHAcCRz4K4kDuHcotYxjdrI2NB5hoACW4PIfoytNpbrBebIa24R1UW5+1jabo9vqdpycrVht7rjSWOHL4pGsndHIBxjeDwKuIwcZxkckANHIAY5cErGsCRSGyVNdHdpZ4JA6GspzVRBudzWAbsd47V0XXCG6XSToOrVdGKaTc+ma7pGNI+qTyJPcrMAOPAcf0pMjZFnYxjcnJ2jHFG8SwV6lXsVbELhR0kFRT3GJsTgx4i2TUrQBweRwOeXIHIVsysYjjY4uaxjS7mQ0DKkok7NMcHFEk1FNTRpQ0JBNAqGhJCAoaYSQkxEkZKihKh2TT5qAUweCloQAcU0gU8pAXLTtvjp6Jk2MvkG4krsYXHsdwYaOKIni1uOK7DXbhkHK7MU01wfLZ9zm2xphAwjC2swKfrGIx10VSZdgMYG2Vm6E4PI9oPiq3NaGVEBc2jYCyLeXW+qLS4gn1QF6DqC3Pr6LMT9ssYLm+ruzw5Y7V5/MLf1cCqihglkkHQkNMTnvxgD7+IK5MyqXJvilao1Kmlk6hBUQVl/ozUDEQY5k4jf7WcHny8FpXC71YfRmGW604EwjeZaXdI1xGMs5BwPaOIW3R2qOagNIyMRRb3O6OCqPE9rPite4mvFFBPBT19O2d7YmuZWtc6mwfHlnlnsWTZqjlOq5prleKQ6ibvDQ10EtHtO7vHHmVW575JXVjKWXVdLSVFOcsZFS7mt4cAw5zy5nKsU9NPT3KSBpu8z5G7yGVEYLeHMnHrfFcaWGrq6aWRtveyphP5UtqWflm92QMgnwUlpHCqZqaqqo3VV2u1UQeMnRgCU9ww3g34krDWwUvVBSOqbqXMdnq+TwJ7AO345C6bYbhcHsqWsip2F2ehdWF/ReBaBxC0611NSNqdgoiMs9eWTcC4HiTk5HwKY0c24TW2KoeaqwSwyxxAtZPP62OX1c/pVX1Id9M99DbKW3wQx7WuDSS/d2ZK793q2ybpX3OjLB635NmXsGcYyckrh0VprNcalpbHbG1NTUVMm0PeSWiMDmezAGStcUbZOSXHJ3vQ+4toY45t21sjtmfqu+B8F67WMjkthcH8COfgp+kPQdJozTGnIrc0BlF/BZHtHFzncdx+JyudNIZLMAwglrQFzZltyM69PJSxpnndfDvqZIelLcHOR2+C5Um2CYNzvwcklbN9m2VZcw9uVyQ5zyHOdnPatIK0E3ya1ez6SrqOiZ9eonZGPvcAvsiShForqINaBE+lZESB+cwYH6F8zeiPTX4y+k21MPGGicauU+DeQ+eF9a3il6zROIHrxne37l3YI0jzNVL4qNQSADK1at+cgDLe/uUqabpoWuCUseQfFb2cpw65/RxSYzk8OCql3jdglr8Z9pXCtg3njgAhVC+ubG52HB4aeWFhk4NsZULpM0sewkbQCCcdoXBs/o4r/AEj1FZS0NVFSOpoxJ0srS5riTwbw5Z710r1VtaHNALePEd69m9Eulnad00Jpm4qq8ieTvaMeq35LPHDczWc9q4Pmu86B1LoOWKnvdGI4XS/kaiJ26Jx54z2ferPZ6wRXGnqm4AccPA4DjwK+hdX6XpdV2ae21UYc2QZa7HFjhycF87XvTlx0fUS2+ta44dmOZo9V7e8LPU4OOC8GTuX6tn+lqeqY52SIXNAB7cLLpiu6bT88DuO1haVVtP3nftDseu0h3xWxZb3HT1slO94ayUlvHsK8mScbR2rkr1riEV5u8JbkSOL2+OQuRXRCCSnZuw1u/A+9dSpmFBqdrmvBErCw+JBXNvTXG4U4xlh3ZI+K3i+TNhfJS230ocMl5xjuCnfaqN9JBSQccAAcOXBc++17ZaiOJowxhaOax1FWyM7+DtoLgB3ngArUHxYm+p2dPQMpyx2CBuy7vAC412lhrrjUStAw5+ATx9UDCyfS3UqLkMyDaD4duEaasNw1ddorba4jvecySkerG32inixycrRM5JRpnb9FXo2Gr9a0U08bnWu0EVNQSOEj85Y37zx+AVV9O7Yqj0rX2L6k4czifzhsGAvrXR+l6bRVhitlGMub60sx+tK/tcV8+elP0Nao1Jrq43ukZE5lQ9rmuL8HAGF7ONbVR5eR7meFwROIeMBgDeDnjiq8Gu6fa4kkOK9auPoX1ZHMXSQRbQO2RUfUGjbnpmdn0gyMGXJbsdu5LWzNI6Po9w2quDiODaZ2D3E4XH1AR00uD+cupot3Ri4uzj8kB+lcu9t3Ne8cfWS9TT0O76NZ44GF5kfHtlOSO044L1rT81FR2QVksRIqXkPY0F2HAcfuXi2ipCIQACQ2bdw7V6ayapjsVNIInPidJIRg8slXVkqTRcqPXVR1FtBQTANhDnh08RJA7gQeK57PShUiPc+SF7xhuDC7l381VI7k2J7Mx7hnDhuxk/uU22+F3TVLn9XpBkNe7iXOI+qAjy0Ws0i7DXVxc+KMTUrTK0OZ+Sdgg/etdmu7pDHKwvi3s9YtMDuQ5jmqjFC6aGOSEyPLSGDA5f8ABSrp3PqX9PmOYANw3kR4hHloPOn3LMzXt0mkc+OWndG4buMLvV+PFT0zqyvvd+6hUz07ojDL6vRuZu9U/nZyAqf0FTTl0sbnQkNLsAfX8MLr6RZSW7VVA59b1ieppJTJyDYiWn1c9+FE8aSY1mn0Zv8ApMfG7SdupaeNrIOsu6NrRwxgDIOAT4njngudeLe+bUf0dSRsldDaWhm2P63Dl4f8Ftatqfpi5WqlibK9hkD4wQNrwSOLMfmgDC6FveJtb3dzpQGzsEEG1u4HA9YYHPsXB0N0cGz3ZunNU2VskzYIZ4WU8rhxbkjg53acH4L0G5W0uke7IDcEtI4EcOGAMEBpye3iV45rdhqHU1Q6NxLJeiL4/quAHAjHLkrfWapvFRarHcIpWxvip4JpIefSsM3RnLvEAH71aVohujX1xE3q1vncC2aBxiLAAXAfWGQePMHhzW9pu4iSep6NobH0UM0TWu4SesN5B7QPZ7FUtT08jBXxdYkd0VXJPHxzgGXBH3ZWxoGjE0domkDcUs0zXBx5gt4KdvI1I+0Kf+Tx5OTtH6llye9cfSl2F605bq8AjpoGkg8wRwP6l03SYXoLoZ1ZyL7SsjDZ2gAk4PiuOu1e5d8DR3OXFwvnPEIKOZ0ezpG/LVgPipJNUlxUbsAmkhMCvk8UjxKWU17p2IiUipOUUqKBRKkkVSRaIoCEKkh2CRHFPKFaQxEJ80c08KkgYIwjCapIkWEYTQnQCwjCeEYQ0BFIqZCiQpasoSO1GELKSGMHKkFAKYWUkJkwsjFjCyNWEokszMKysWFiysUOJjIzt4rNGFhZyWxGOCqKOeRsMytlrOkY5p/OaQtdg4LcgGS0eK6MS+I5MsqRTHN2kt7uCSyVLdtTKOwPI/Ssa7T149EaF7rpKCgL4A0zSPZDHu5BzjgE+A5rQhq6mkuXU5LrHVuMTnOjkaGvY4DIxjmF1bhQRXKkkpptwa/By3gWkHII8QQtGnscwqhVV9e+sljY6OL8k1gYHcCeHN3igialu4ORLfKl77Y2W4y0rZ6MzPdFCHlz9wHccDC271JX09FR1FLdZm9JJFE7MTfWDjjdgjgV0aKzR0M1PKyV7jBTGmAI5jdnJ8eCzXK3tuMMcbnlvRyslyO9pzhDZPlunZy7xPW299LC+uqYqbY4y1jIA92/PAOAHAeOF1bXPJPQQSyzRTOc3jJF9V3HmsNxoKmqnbUUlfJSTBpjPqh7HNJzxae3xWa3UEdtoo6WN7nNbklzubnE5J+aRUYtTZqaYA+iYe4vk/vlcl9+uUcFsnZtka987p2BvF0bDjh4gcfuXZ0/Ty0lsijmYWPa95LT4vJCjSWOOlNKRK9/VulwHAetvOTlIlQk4qjXp62ou1TcoqeudFFGYnQSRtBOHNyea0ILhc4tJTXWW4SSzOjJGYm4Zh+MgDnwXWtFgp7NLWvp3v21Ugk2HlHwxhvgomxNFhNoZO9rcECTAJHrbs45I4BQk+v3OYbtK2zXGqgutTM+GIEOngDOjJ7Rw4qLb7VRx15pq/6QihpDL0zow3opOxvDnnmuq61VdTRz0tdcesMlaGAthawt+XNOpsUc8lU5kz4mVcHQysaBgnsd8ccEuAUJWqMJqK66Vr6WmrDRsp4Y3vexgc57nDPbyAXPnv8AUvp6SOatbRuFbLSTztaCHbAcEZ5ZwurU2iYziooa99JOY2xSO2B4kaOXA9o704LBT07aJrXvPVpXzEvwTK9wIcXfPKLQtk3+JymXm4zWp0sMr5oW1PR9cjiy8xdrwztweC6tkqZKiklLq1la1riGyhu12McnDsKh9Augp+io62anLJzPC4AER55tx2t58Cs9stbqLp5ZZzUVNS4Olk2hoJAwMAcAkVCMk0Y7Mc1145fyv/8AgFUavU9xk1NcaA31tBHBOyOGIUXS7wQObuxXG1QSw1l0fIwtbLU72E/nDaBlRt9jht1fcK1kjpH10jZHtcBhpAxgJXQpY5SpJnJivte6t1RCZWltvY00/q8j0e7j38VXqrWF0LLD0t6gtrKygfUTTSQBwLwcDh2Kx3fRTbjcKmrpbtW2/rrBHVxw42zADA58jjhwWd+i7c6popMExUlI+jZA4AtLHcyc9qq0YyxZ3wmVaq1xf2WSx1sMTHzVE8jZWhmBURsGctzyyBlbVTrerngv9Xb6mN1PTU1PNSnaDt3889/cu3TaLgp4bRCa6pkbapHPh3AZIIxtPgAteP0d26nivMVPPNFFdSC5gAIiwc+r4ZRcReVnvqaeqrhqChms8tFdo4YrlPFT9E6na7oy5uS7J5/BdWG4XGl1RbbRUVLaiOSjkklfsDd7w4AHwW3ddOQXYWsSTSR/R07J2bQPXLRjB8FivumxdqqnraevqLfW04c1k8OD6p5tIPAqdyNfKmrkuvHqVWo1jdhZ5pzXxUzhen0XTuiBDIgO5N2sbszTV8qo66GpNFPFHT18cOGyBzgHer3jK78WhqGG3UtH087+gq+uvkfgumk7S7s4pz6IpprddLfHVzwU9fO2oDGBuIHAg+r4EhO4mPlZ7u/QNIXGpuBqHTXd9wa0AAOo+g2H9qsmeK5lmtFZa3SdZvNXcWuADWzMaAzxG0BdNYyO7DFxgkw7lLKijKRoM8UkZQSlQIEfehCB0SCEBCkkEIQhjBCEJAMIykhICQKeVHKMoFRLKMpIQA9yaimDwSBoaluCjlCVCokDxTLlBCliOnTVJiwOS7NHdiwDLshV7uU2vI5LllNxdo8KcE5Oy6QXSKQcXLajqY3jg4KkR1TmnmtmK5OZ2lXHXyj15M5aVPoXQODhkcVW9QacEodVUhe17AXCFpwwnvx3qMN6e1v1lvRX0Fo3YXStdhmqkZezZIu4lAraONswlqaKGrnlZsk3MLHNHaAR3Lh3K1yV1Y6AUkNLnBY4VDmtqQ3812OXwXrks9BWD8vBG/4haU+mdPVzXB9MGh/E7XEKqxy+WQXKPVHhtRQ9LspY7WGGOYkthrzG+J/IDcebfBa0tZT0klbNNb5o9/AiOfIlcO8Z4L24+jTTUrzJmqDyNpPTE5C1/wDIzpRwx/C3DO7jOVccF+ovPS6o+fX0dEKllU+1Mhlna5zulmPF35pzlYR1SBskcdLSukd64c2MOcD3cc54r6OZ6HNI53Po5Jj/ANpIXLrUPo/03bsdBa6duO3aFrHTV1Zm9T9j5botKX29kinpJQZXhzniMMAH3Dl4L3f0W6CodG0/Sx0gFfMzE1S4Ze7txnsHgF6NBa6On/i4GNHcAFsCFjeTAFtGCj0MZZGyr65sh1BpitosEylvSRHHJ7TkfqXiVJLNFTT07x6wJ59ngvpV7cjGFV7l6ONP3OqfVup3wTPOXOhft3H4Ln1OneRpx6nTpdUsdxl0Pk+/B7KiQlmBnmuMHjotxOOGV9WV3oK0xcH75X1YzzDX4ytWH8HPQrX7p4a6pHaySoIafuCUNPJLk0nq4N8FX/Bf02Y6K56kmj2mocKaEkc2ji4/Ne7O+qtKxWG3abtkVstVMympIvqRt5BdDAK64qlRwTluluKw2E0FVJFgiF53MJ5AnsWd5Dm/WAXcfCx+Q5oIPeteS2Ukn1oGH7kMSKfe6lkEDnBw3csZXm9+rcNdxwT4r22TS1mlOX2+BxPeD+9OLStkhduZa6QHxjB/Ws5QcjSORI8L0npqe/XWGepgcaWNwecj62OS98owRC0FuMDAC2I6WCEbY4Y2AdjWgLJsCuEdopz3GPZ2rj6l0tb9TUJpK2LcObXdrT3hd3aokJtEJ0fPt/8ARTdrHM+e3uNTC3iA3mPuVHuM01NLvLHRzsPrNdwOR2r60khbICHBeWay9EBu9/ZdaV7ZY9wdLTOOwux3OXJm06atHVjzu+TxS+XGKqdTVbOwhx4cQe1c6tuzTU0wLjjL+3717Nq30Y001E8W+zXKlmJALWgOYR29q8qrvQvqqSf8jR1vRAnDiQDxXPDH3TNpZE+bKjUXBstXkOBwSeayCpZNJG3O927O1vEk9yuVu9BVxD/4RabhUZ7TLtGVbdDegSqtl6juFdTtiiY7c2Mu3ELeOPc6oynOlwzh6U9FF21dJFUVjDR0oxjcOOPgvoHR+irVpChFNb4A0njJI7i6Q95K69vtkdFC1jGgYGFvNix2LphBRRg5N9SBYXDksMlMHHiFuAYTwFZBx6myU1WwtliBz4LzbXvoOt2qQx4e+GSPIa5oyMd2F7AQolufFKxnzJF+DXUULZ209wY7pW49ZhBBXErvwcbs+NzOvU4GeZBX1oYWHm0LFLRQyDBYPuCEwPjuH0LV+mXNEldE+N7iS4MPPuXQuDJ9OspqRs0cjTAXSMPDdk9gX05dNNU1dTPjfG05HDhyPevnn0n6blo74xhZI3ZCGtcBwJyt4yMmivww2q5PEskbqZ4PGMD1CAOJB7z3LFPJTzAhkTWBnFreYHxWCOGr6FlM8vIiyQQ3lnuWaSnYzayFpdub6znDkVpYiVKT0Z4bHgZY3scVmkcZBuMTMhgJLjkg/Fa1RE6QxvY92GM3E9pwoTNcYo6gknLsPj455c8ItAa1XXSs9Vu/jyJPEZXQ9H1E0alqK2oY4so485I5Oc4N/UVz6xrHlu9rg0t4cOa7GnIKmk0rdqpjCOkmijY5x4nDgT8ccFGRraVBWyN2Ep1baIHySYpGlnq+qR6zjjh8V0quaotViq6pk8rDTXOliaMYLWkN3tz3HPFaNzqBHrOdzmF7WPeXOb6uHFue3xXR1fJN+IXXN7THXXWCQvcOLRtbj9IwVyNKzVWU/X1Y+C3Vboo2E090mgdJy9XJLcnwzgLp2ueP8WbdUSgSSRWyIvae3NQD+xQ9Kdsf9E3xsJYY4aptQ4t7S85/auNSXAw6Rod5G51J1Jwb7RduaT80L5Rt8nRum03a/ue44D5CWZzgF7HBR0rK5zGwsw5nWi1vDtbjiudcb2+SqFVTuy2tp3U1YS0cHgd3ZxHNZtCSSxzUtUwlxin3vYBxAzgnuKhoaPrjQsUlBYBTPPCOeUM8Gl2R+tdx8xwq7o6OOGxRmF73RSSPkZuJOATnHFdknh2rrj0OiEEa1zeXRD4rnLeuAxF960V4HiP809LBxChtKllQHNSXCaDyjKSEgK9hGSmkAveOxAVEqRScnRRFCDzQrSLFgIwE0K0gFgIwE0JjQsYTQmqSCxITQqSEJPCEJgPCChBQBEpHmmUscUqCxIwhChopME8pIWUkBNpWVpWFqyNWMokszsKzMWBp5LPGoaMpGdgWxEteNbESEjmmbUfJb1OBuaVpRDOFvwNALV040cOZ8FLrD/Cpv6bv1rDlZaz+Vzf1jv1rEuhntQ+VBlCEIKFkoyUkKQHkpEoQUDSFnCllQUkDHlIlCCkCEjKEkmOgJIRuSKEh0PcUZSCaYUPKMpJpMTQZRlBSUgGSjckUkqGh7ijJSQgdDyU28VFMJMVElEnijJ70khUPKaSaQAkU1FAIkBwTwo5wjJSKJZQShIpCHuS3JJJBRLcnuUFJADBymohNIB5SyhCVCokmooygCSEkBIB5UsqKMpCHlPKjlPsSYmbg7PgkThTA9UfBRcFwZHyeJL5mLcgO4pFLK5pGiJiQjtUxUOHDKw5RlYS6m0TbFY4clmZcHAcyudlPcVjb9GXSZ1WXRzTncs7by8H6y4e8o3JrUZI9GHkwl1RY2XuQAess7L67tcFVhK4dqYneO1aLxLNH1Jejxv0Ley/4HYVlbfx2hUwVDx2piqk9pax8YzIzfh2Nl1F+jPPCyC8xHtCo/W3+0UxXPH5xWy8bn6ke64F7F2gI5hSFzgPaPmqILg8dqmLk8dpWi8cfYzfhS9GXr6QgP5+FIV0Dv84FRRdH96Yuj/aK0Xjv2Ifhf3L0KqE/5wKXWIT/AJxqogur/aKkLq/2irXjkfpJfhcu5eumi9435o6aM/nt+ao4uz/bKf0u8fnlV77h9JPuyXcvHSM9pvzQZW+235qkfTL/AGij6Zf7ZVLxmHYn3dLuXfpG+0PmjcCqULzIOTysgvso5PJWi8Xx9iX4fPuXLh3hLAVRF+l9pS+nZvaVLxXH2I9hmi2EA88YUTGw/mtVVF9mP5ymL3L7SpeJY+wvYpdyz7Ix2BSGwdgVY+mpfaR9Myn85P3jF9EL2SXcs5LezCW4d6rIu8vtBSF2kP5wR7euweyvuWTe3vS3t71XfpR5/OKf0i/20/bb9A9nLB0je9HSNXAFe720deefz0e1/YPIO90je9LpGrhisefzipipee1UtS+weSdcyNWrU0VHVHM0MUh73NB/WtQTu7SpCVx7VotQw8lCNjtxJPVYOP8A2bf3KDrFQE5NNB/5bf3LMJDnmpB5V+0MPIRpmwW8cOqU/wD5bf3JGw0HZS0+f6sfuW9uTyqWdi8iJyX6foiMdVp//Kb+5cR2maptZJO6CmnY3+KYQ1rG8O7HNXA4SwFTyWHlV0PCdT2W8UkUoioWDfC4VDujJ3EuOCDjn49yjpzTt1vNubaLxJTtpGhs0P5I7sj6wweZPD5L3ctDuYB+KgYWu4loP3KasFA8Dv1BBQXytoLhTSyUd4jaOnADg1wAAdjsI7QqpB6J5bXWzRR3BlRADxh6J0jHgjgQRxaV9QyUMEh9aGM/FoSbb4GHLYmNPg1ChXRg8dnzA7R88M0UlBY6sOa5rqilnhdsmwfzD2lWOr9HU1dNT1FjttXQTSN/Kxn1RETzBz9bP6F9ACCPltCn0LO7CrYn1EsbOBoW2Vtm01S0NxeX1ERcC4nJIzw/Qu+QpbAOSMLVLikdS4RpXEfkR8Vz107kPyI+K5i8LxD+admB/CCeUkLio2GmkE0UBwSoqR5KBC9yjrQJJ4SVpFCKMoI4pYVDsMoJQkqKDKYKWUZVIB5RlLKaaQDBTyohPKqhWPKMpZRlMCSRKW5GUCAlLKCUspFASo5KZKSTGgyjKElm0BNpU2lY2rI1ZyRLZnYVnYVrsWdh5LNxMpGywrZjytVhW1EUJHLM24s4XQiPALnxfFbbpOjgc7uaSujGjiy8uilVD91RK7veT+lQyo7sku7zlG4LRnuR6IZKWUFwSyEDJZRlRJRlFDRLKRKWQglIoMp5UcoykBLKWUi7gllISJZUSeKMpEpDseUApZRlAWSyjKjlLKBk8pKOUZQBLKWUspZSYDyjKWUZSoB5Tyo5RlTQ7JZSyllGUUA8qQPDsUMoylQiZKWSo5RkJUBLJSylkIyEgJZTyo7gjcEhkslGVHIRkIAllGVHIRlIRLKWUZRlIB5RkpZCWQkBLJTBJUMhPcEmBPKMqO4I3BSIllMFR3BMO4JgPKllQyEZQwJ5RlQB4p7gkI6YPqDh2KBKk3+Lb8FF2V50+rPEl8zMZKRKZUCueRSHlGUkieKwkboeU8qGUtyxZaMmUsqG5G5Zs0RPcjcsZejesmi0zJuQXLHvQX+Khl2T3FG4rHuRuUjsybijcVj3+KNyB2ZNxRuKx7kb00hWZN5RvKx70blaIbJ9IUdIVj3I3BaRJbMu9AeVi3BG5aIzbMvSFPpCsOUwVoiHIzCQqQkcsIcpB2VrFGbZmbI5ZGyOWuHLIHLVGTZmEjlMSFYA7iptcVaM2zYa8qQe5YQ5TDlsiWZg8qYcVhDlka5aRJZma5ZGu8Fr7j2KcZPatYmbZsNcsrXLA0rI0raKFZnBWQFYQ5ZAVaAytJUgVja5S3cVSGZMp5WPd4qQd4rRATzwSyjKS1QiQKMqIKMqkAzzQllGVQBhMBCArSFY0BIFSAVrgGzTuv8AEN+K5eV07scU7f6S5OV4fiH807tP8hMHinlQBT3BcJsTQo7k9wQBwkipEcFFe8kdaYnFRUuaiR4q6KsiTxSyskcD5TwGB3lbLKONo45cfFF0JySNHPikT4rpiCMD6jfkn0EfsN+Sdh5hy8+KBx7Qur0EfsN+SfQR+w35J7heYcn7wnnxXW6CP3bfkjoI/dt+Se8PMOVu+CW74Lr9BH7tvyT6vH7tvyR5gvNRx9yN3wXYFPF7tnyT6vF7tnyT8wPNRxtyC5drq8Xu2fJHV4vds8oR5gvORxC5Ld4ru9Wi90zyp9Wi90zypb0HnLscDd4oz8F3+qw+6Z5Qn1WH3UflCN4/PS9Cv7vFGfFWHqsPuo/KEdVh9zH5Qpche0LsV9rgsjSO9d3qsPuY/KExSw+6Z5UiXnXY4zCs7T4rp9Wi92z5KXV4/Yb8lNEPKmaLCtuIrIIW+yPkpCMDkMIoxlKzPCp3GXordM7OCGEArXAI5Epvb0jSx/rNPY7iFpGVGGz4rZUieHYluHeFaupQe4j8oR1KD3EflCe871qUvQqu4d4Ru+CtfUqf3EflCfUqf3EflCN4e1rsVPd4hG4eCtnUaf3EXlCYoaf3EXlCNw1q12Klu8QkXK39RpvcReQJ9Rpvs8XlCW4PbF2KfuHeEbh3q4dQpvs8XlCYoKb7PF5QjcL2xdinbh3hG4d4Vx6hTfZ4vIEdQpvs8XkCVh7bHsU7cO8JFw7wrl1Cm+zxeQJ/R9N9ni8gRY/bY9il7h3hG4d4V0+j6b7ND5An9HUv2aHyBIXt0exSdwzzCZd4hXX6Opfs8PkCf0dS/Z4fIEw9uj2KRuHeEbx3hXf6Opfs0PkCPo6l+zQ+QID2+PYo+8d4Rkd4V5+jaX7ND5Aj6OpPs0PkCA9vj2KPuHeEbh3hXn6Opfs0PkCPo6k+zQ+QJUL2+PYo24d4RuHeFefo6l+zQ+QJ/RtJ9lh8gRQe8I9ii7h3hG4d4V6+jaX7ND5AmLbS/ZofIEbR+8Y9iibh3pbh3hXz6NpPssPkCf0bSfZYfIEbRe8Y9ih7hjmEtw7wr79G0n2WHyBP6MpPssHkCWwPeMexQdw7wluCv/0ZSfZYPIEfRlH9lh8gSWNi94x7FADh3hPcO8K//RlJ9lg8gR9F0n2WDyBPymL3jHsUDcO8I3DvC9A+i6P7LB5Aj6Mo/skHkCXlMfvGPY8/3DvCkHDHMK//AEXR/ZYPIE/ouj+yweQI8lh7xj2PP9w7wjcO8L0D6Lo/ssHkCf0ZR/ZYPIEvJfcXvKH0nnxcO8Jbh3hegm10f2WDyBL6Lo/skHkCPJfcPeMex5/uHeEbh4K//RlJ9lg8gR9GUf2WDyBLyWHvGPYoO4d4T3fBX36MpPssPkCX0ZSfZYfIEvJfcPeMexRNw8Ebh3hXv6NpPssPkCPo2l+zQ+QJeS+4e8I9iibh3hPcPBXn6NpPssPkCPo2k+zQ+QI8ph7wj2KNn4I3DPYrx9G0v2aHyBH0bS/ZofIEvKD2+PYrjT+THwUS4d6s/U4Pcx+VLqUHuY/KFyy0Tbuzhc03ZVCVDKtvUqf3MflCXUaf3EXlCyfh8n6jWRFSJ+CRPFW7qFP7iPyhLqNP7iLyhZvw2X1GizIqBPiEs/BXDqNP7iLyhLqFN9ni8oWb8Kl9RSzrsU7PwT3fBW/qFN9ni8gR1Cm9xF5QpfhMvqK9oXYqGfgllW/qFP7iLyBHUKf7PF5AofhEvqKWpXYqOUFw8Fbeo0/uIvKEdRp/cReUKfc8vqRXtS7FR3hG4HuVt6jT+4i8oQaGn9xF5Qj3PP6kHtS7FRyO9PcArZ1Gn9xF5AjqNP7iLyhT7nl9Qe1LsVPcPBLcFbeo0/uIvKEuo0/uIvKE/dEvqQe0rsVPd8EbvgrX1Gn9xF5QjqNP7iLyhP3TL6he0LsVTcEi5WzqVP7iPyBLqVP7iPyhNeGS+oTzJlT3BMOVq6jT+4i8oR1Kn9xF5QqXh0l/mF5hVwfEJ5Vn6nB7mPyhLqcHuY/KFXsEu4t5Ws+IUgVYjSQ+5j8oR1SH3LPKqWja9SW7K+HLICu31WL3TPkjq0Xu2fJUtK16icbOMCsjSup1eP2GfJHQM9hvyT9nfcnyznAqYK3ehZ7DfkjoW+yPkrWKvUXlPuaoKyNKy9E32Qjox3KlGhPA36iBWRpWPajB71adC9mfc2GlZGlafrDtPzSy72nfNWpoXsr7nSaeKyNK5O6T23fNHSSj/OO+afmrsNaV9zsAqWVxOll94/5pdLL7x/zR567D9kfc7oKmFX+mlH+df8yl083vZPMULUJeg/ZH3LIClhVwzze9k8xS6xP76TzFWtXHsC0b7lkwmqyamf30nmKRqZ/fSeYp+2rsHscu5Zk8Kr9Zn9/J5ijrNR7+TzFP2+PYfsUu5acIwqr1qo9/L5il1qo9/L5in7wj2D2GXctYClnCqXWqj38vmKRqqj7RL5ij3jH6Q9gl3O/eDinb/SXK3LSfPNJwdLI4eLiob3+0fmvP1GZZJ7kdOLTOCqzoZTBXPE0jeTissdXg4ePvCwtFvEzcymsbHhwBByCpgpmfQ46iVkI4KGPFe+jpRFZIIOkO4j1R+lQDS5waOZW+xmxoaOQTCTpAGgDACeE8FPCVGViDU8KWE8IoVkQE8J4UsIoVkQ1PantKeEUKxYRtU8eKAEUKyO1MNU8IwihWR2phqkGlPCKFZHantUgB3pgIE2R2p7VI8BkkAfFPaihNkNqltUtuO9MAO5EH4FFCshtT2qe1PhnGRk9mUUTZDantU9vxT2p0LcY9qYasm1PaUULcYw1PYsgantKKFuMexMM8Fk2lPaihbjHtTDFk2/FPaUUTuMYYjZ4LKGp7UULcYgzwTDFlDSnsKKFuMWxPZ4LKGJ7EULeYdiez4LLsKe1FC3mHantWbYUbPFOg3GLZ4I2LNsT2ooW8w7EbFm2I2J0LcYtiNizbCntKKFuMOxPYsob8U9hToNxh6NPo/BZtiNiKJ3mERp9GsuzxTDR2EFFBuMPRp7Fm2Ibtdna4HHcU0g3GHYmGLMGJ7PiihbzDsR0fwWfYU9idC3mDYjZ4LOGJ7EULeYNiNiz7E+jKKFvMGxMRrPsPijYnQt5g6PwTEaz7EbCig3mDo0+jWfYUdGnQbzX6NLo/BbOwpbClQbzX6PwS2LY2FLYlQbzXMfgjo1sbEujSorea+xHR+Cz7EdGUqDea/Ro2LP0aNiVD3mv0fgjo1n2FGwpUPea+xLYtgtwMkqIw7k4HHPBSDcYdiXRrOWpDa76rgSO48lND3GDYjZlZy3HHKjge0PmgrcYujS2eCzlqiQAQCRk9mUmCkYdngjZ4LPsUS0NGScDxUtD3mEsRsWYDcMg5CWxIe4w7EthWbAOQCDjnxRtSHuMOxLYs+1LaUg3GDYjYs20o2lJj3GAsRsWbYUFpSDcYNiNngs2wpbCkVuMOxGxZdhRtKQKRh2JbFm2fFG0+KQ9xhLUtqzFqjtKRW4xbEi1ZdpS2qWPcYS1G1ZS34pbUh7jEWqOxZi1RLSpZW4xFqW1ZdpS2nxSse4xbUFqybSkQpY9xjLVEtWQ4BwSM92UEHklZVmItSLVkPAZJwO8pEJWOzHtSLVkwUuB5HP3qSrMeEi1ZCPiokgHBOCeQ70rGmQ2pbVkwkQpsdmMtS2rIQkR8UrHZjwkWqeEsJWUmQwkQFPCRCmx2QISwp4SISsqyGFEhZCFHCmx2RwlhSISIS3DsgQjCkQlhLcUOOV0TuHLtC32PD2gjtXOwVsUchDiw8jyTjLmjPLC1ZrEKBashCRC+lAdKzMue4LcAWvSD13fBbSdESfIsJ4TCYTM2wDU8IUkUIW1PamE0UIW1MNTCaKJbEGp7UwmEUKxbVLamE0USxbVrXK2Q3Whlo6gyCKUYcWO2u+49i20zgc+CTV9QUmnaPN9U6WsWn6JvRvuU9dUHo6anFS4l7u/4BWPS1mOkNOyyV0z5JdpqJySSGYH1R9wWW/6Ko9QVzK+WrrKepijEcb4X4DOJOcd/FcOy1tyuNk1LYqqY1k1FHJFHOebwWnAPyXLWyTdenB3uby4kt18qzHYbBNrqF98vlVVCGV7hT0sMhY1jAfD/AN8FmoBV6J1VSWd9XNVWq4g9B0xy6F47M/L5rrejaqjqNH0TWOBdDujeO52Sf2hc/WjhWav0zQQ8ZmSmZ4HNrcjn8intUVGUevH5hvlLLLE/l5/KhX6as1Rqn8WqWqlpKKmjEtZJFwc/+aPmFgvukH6TonXrT9ZWRy0oD5YpZS9sre3OVtWVwovSbeYJjtdVQNkiz+cBjl/77F3taVcVHpa5SSuABgcwZ7SeACW1PG5vryT5koZIY49HX52c2+6wNLo2G80bR09Y1jIAeOHu/dgrUpPRpDV0QnulyuElylaHvnbMQI3HjgDtwuJeqKaj9Gun5ZWOxTTxyyDH1WknH6/0r1GnmZUQRTREPZI0OaR2ghXGKnJ7/sRkk8MF5b6t/sVLQ10r21dx07dZjPVW53qTHnJGeWf0fNdrVN6dpyzS3JtOKgxuY3oy7aDucBz+9V3TbhX+kq/1kHrQRRMhLhyLhgfsPyWhr/S0tBYqu4Ovdxnb0rD0Er/yfrPH6s8FKnJY7XIPFjlnUZcXXH49T0aImSJj8Y3NDvmFPYq/pzS8tpmZVuvNwrGuiA6Gd+WDIHFWRdKtrlHn5UlKou0RDU9qkE0zOyOxMMUgpBBNkAxPYpKQQKyAYnsUwmgVkAxS2KQUkCshsRsUwmgmyGxPZ4KaEBZDZ4J7FMJpishsT2KaaBWY9iexZAhMVkNiAxZEBMVkNgRsWRPCBWYxGns8FkCaYrNG5WyG60FRQ1BeIp2FjjG7a4A9x7F5xRadptMelK1UNDNVOhlpZJHCaYv44PevVQvP7uQPTFZM9tFIP1rDLFbov7ndoskqnC+NrMGuZKm7aytGmJa6agttVE6WR0TtjpiCfVz936Vq6y0PbtIWKe92a419vraQB7C6pc4SnI9XDj2rLrGnfrfXdPpR0jKWlo4BVPnDQZXEjOGns7EtV+i6Cjs8txprxcJprew1DI6+XponbRnBB5clhJNqUkr56/32OzFOMPKjKe3jpXDvv+JetOVc9zsNvralmyeeBj3jGMEhdLZ4LkaKvb9R6YoLnJE2J80frNaMAEHHDw4LuLvXKs8bLcZyTVcmMM8EdH4LImmZ2zHs8E+jWRMIoVmLo/8A3hMMWRNMW4x7ECNZEwihbjGI0+j8FkTCdC3GLo0+j8FlQihbmYejS6NZ1FJoe5mLo0ujWb7kilQ9xh6NGxZSklQ1JmLYls8FmKSQ9xiLPBLZ4LKl9yljtmIs8EbMrKUkg3FT1Poyp1PcIemvVVTWxjMSUlP6he7PPd3Kna00lFoGgiv9guFdTzwysa6KSYvbKCeXFeo3W6UdloZq6vnbBTxDLnu/UO8qg26hr/Sbc4bzdIn0un6Z++jo3cHVJHJ7vD/2Fy5IJuo9T1NJnyJbpuoL9/t92dm/aYrtXx29z7xU0FCYg+opoBtdI4jI9b7+1VXWeh6XRlmffrHcbhSVVI5pw+cvbJk4wQV6jXVtNbKSWrq5o4KeFu573HAAXnkMNb6VbgyqqY5KXTFLJuijdwdWuHaf5qMsIt0ur/Yekz5F8TdQXX7/AG+7ZP0iXKeo9HFLUOzFPXGn3BpIwXYJws8HoksD4mF1Tcy8tBdirdzxxVm1Jpa26noIrfXiRsMbxIxsTtpyBgfdxVQvXovo7Pbaq42W7XOhqqaJ0zHGoJadozgqZx5cmrRWDURcFjjNxdv079Dp6zurtEaShgtu59Q7ZSUpkO52Twyc8yAudTeiWmqKETXK7XOS6ytD31LZyAx+Owdy4OpLxVX7QOmr9WDLqeuaah4HPBxu+/C9filZPEyWNwcx7Q5pHIg8kJLJJthknk02OKi6bbt/gUf0fXuufJc7BeZumrLS/HTnnJH2Erj2e2z+lCurbrcqyqitEExhpaWCQsD8fnEj/wB8VtaVb9K691bWUx3QdGKYPHJz+X7FsehiVsemJ7e7hUUlXIyVh5tJx+4qIfHtUu3/ACbZf4W/JBU/h/K1bOdU0lT6Mb/bn01bU1FiuMvQSwTv3GF55EH/AN8iujri43G43636RtNS6kfVtMtTUM+syId3yP6FD0vSCohsdrj9aqqa9rmNHPA4E/pUa8i2+mG3TVB2x1VCYI3HkX4Ix+hL12eljg98Y5pfNtk/xro/77GK7ejJlntz7hYLlcYLjSsMjXPmLhLjiQR4qzaLvx1PpyluL2hszgWStHY9pwV1rvVQ0Nrq6mZwbHHE9zieXIqkejS0TVvo9kgNRPR9dmleyWI4expPAj5Kktsmo9jneR5cG7I+U1z+JYa7UL6PVVtsQpg5tbDJKZd2Czb2YxxXb2Lym6aOmp9dWe3HUF0e6ogleKh0g6SPHY09xXo2n7I+xUb6aS41deXPL+kqXZcOHL4Ig27tE6jFjhGLhK21/wBm/sRsWTCSs5LMezwS2eCypJDsxFiNiyJKR2Y9iWxZSkkOzHsS2LKUlI7MWxRLPBZSkeSRSZiLEi1ZUikOzCWpbVlKipKTMZakWrIUlLGmYy1R2rKVEqbKsxlq0rvR1VZbp4KKrNHUPbhkwbu2ldBIqWVGTTTKU30X258H8Ir7lNVu4moMxB3d+OSx6Cu9T9F3WGvqHVEdsmcxs7uJcwAnn9yz6h1FVXSvdp3TpD6ojFTVD6lM3t49634tNQ2bSdXa6LL3vgk3Pd9aR5bzKi6to9Bzk4bcr5bX5Fbsdkl14yW9XmqqRTPe5tNSxSFjWtHacLJTMqdEalo7b1uaptNxy2MTO3Ohf8fkup6M6iObSNLE0+vA50bx2h2crS104VeotOUERzMKjpiBza0dv6CjpVGim5ZZYpfLzx2oWpKmtv8AqaLS9FUPpYGRdNWSx/WLfZHzHzWtetGnTlC+7WGtrIqmkb0jmSSF7ZWjnkLYo3Cj9Ktc2b1euUgMJP52A3h/un5KxaoqoqPT1xmlIDRA8ce0kYA+ZUPhWLzJQlCEejS/O+px7jq8RaLjvsDAJp2NbGw8hIeBH3EFaND6P46+ibVXevr5a+doe6RspAjJ44A8Fxq2hmh9Flte5jvyczZ3DuYXHj+r5r0qinjqqOCeJwcySNrmkdoITfqObeKP8Pu/2KrpC4VtNcq7TlymNRLR4fDM7m+M9/6F2dSXZ1hs89wEAmMW31C7bnJA5rg2twrfSTc6iHjFT04ie4ct3DgtLXGm5KSz11wdeK+VpeHdA9/5MZdy+7KlvhDeOEsqUnV0XmBxmgjl243tDsd2QpFq4OntOSW6SGrdd66pBix0MrssGQP1KwFKRzTST+F2QLfBRwshCiVFiRDCWFMqJU2UiBCRCmkUrGQwkWqaipspESFEhTKSmyiBCRCkUkrGiJCIzte13cU1E81O4rqMhRI4LMWqBavrqMEOk+u74LaWvTjDnLYCZLGEwkEwgkakoqSBDCaQTQSMJhIJhAmMKQUQpBBLGmkE0CY1pXu0Q323SUM8s0TH4O6J21wI4hbqaTSapiUnF2injSGpI4jTRawqRTngN8WXgd27OV3NNaapNM0Tqenc+WSR2+WaT60ju9dUKQUxxxTs0nnnJbX0KjU6FqKWvmrNPXmW1dYO6WEMD4ye8DsW9pzR0Vlq5bjVVktxuUw2uqZewdzR2KwKQ5oWKKdoJajJKO1s4WpdJQahMNQyoloq+mOYaqH6zfA94XMboKtuVTC/UN/nudPAQ5tOGbGOI9rvVxCaTxRbtomOoyRW1MwVlvprhQyUNRE19PKzY5nIYVRj0FeaKF1FbtWVdPbzwERj3PY3uDs8PuV2CknLHGTtkwzzxqo9Dl6c05RaZoBR0YccnfJI/i6R3eV03xRzMLJGNe0/muAI+RTCkFaSSoylJye5vkYwBjkmEgmEGY00k0CGFIKIUggQwmEgmEEjCaQTQIakoqSBAFIKITCCRoQhAmMJpBNUA00k0EjQgJoQgQEICYDTSTQIYTSCaYgCr1bpI1msqDUfWwwUkLoug2Z35zx3Z4c1YQmOSTin1KhklC3H14KvqnQsV/r4LtRV89ru1O3ayqh45b3OHauXVej/AFFe4xS3zWU9TQE/lIYKdsRkHcSOz45V9QpeGD5NYavLFJJ9OnC4/M17bbqa00MFDRxiKngYGMYOwLaSCa0OVtt2wCaQ5ppiYwmkEwmIE0IQIYQhCYDTCSYQIaEITQmCipKKQwSTSSBCKE0lIxFJMpFIYkIQkMRS5plCkZSteaArNaVVM9t66pT04yKcw72l+frHiM93Fa7dFayY0NbryVrQMACjaAAr4UisvJjbZ1x1mWMVDil9l/0UXVPo9umqbbbqKp1G4Clb+WLoMiok7HkAjs7FCLRGr6eNkUOuZI42ANaxtG0BoHIAK+JFS8UbsqOtyqKhxS+y/wCin3PQdXd7bb21Woq5t1od+yuh9TcXHtaPuC51T6PNR3aIUd41pVVNCfrxRwhjpB3E9v35XoKSHii+oQ1mWK4f7L9uDknTNrNgFhNMPo8R9F0eezvz354571Umeji/UdObdQazrILZybC6LL2N9kOzw+7C9BQlLHF8snHqskLp9e/PP5nI01pqh0rbG0FC123O58jvryOPMkrh3j0fSyXiS86fvE9mrZv4/Y3dHKe8t71ckJSgmqHDUZIyc0+X1+5UNP6A+j7v9N3m6T3i5gbY5ZRhkQ/mt710dV6SodWUTIKl0kM0Lt8FRFwfE7vHh4LulJLZGtvoN6jI5rJfKKDL6OLzdGR0t91bV11vYQTA2PYZMctzu378q70tJDQ00VLTRtihiaGMY0cAB2LOUklFR6BkzzyUpPhfkY3QROlbK6NhkaMB5aMgeB7FIplIpmQkk0khgUkykpGJJNJIYFJMpJDApJlJSMiUimUikUJIppFSMikmkpKQlFSKikxiKiVJRKllCWleKOouFtqKWlq3Uk0rNrZmjJZ4/JbqRUsqLppooVs9Ht5ssT4rfqg07Hu3ODaYZcfEk5K79hs94ts8r7lfX3JjmBrWOiDNhzz4LulRUnRPUTyXu9fsio1mh6iC4zV9gu81qfUHdLEG743HvwtnT+j2WiskudbWzXK5SDaaiXhtHc0disaCpG9ROUdrZwtS6WptRMhkMslLWU53Q1MX1mHu8QuQ7QtfcpYm37UE9wpYiCIGs2B5Htd6uSSQ455xVJmvUUVPU0b6OWFjqd7OjMeOG3GMKpR6IutAx9LatTVNLQuJxE5m5zB3A9n3YVzKSTHjyyhwjlaf07SacozT0xe97zulmfxdI7vK6EkbJWlkjGvaeYcMj5LIVFSJycnufUWMcBwASKaRUsBZUVJRUlIRSTKSTKRFIppFSMRUVIqKljQikU0ipLREpFMpFSNEUimkUijYLVAjgs5Cg5vAr7A5rIQDDis6xRjDisoQIYTCQTCBDUlFSQIYTSCaCRhMJBMIExhSCiFIIJYwmkmgQ00hxTQSxjkqnVake29XKjlv9DbRTSsjjikpw9zgWA5Jz3lWwLii1XekuNfU0FZb2xVkjZSyeB7nNIYG82uA7E11InfoZanUdNb53UdQ2Z1UGs6JjWjNVu4ZjGew5z3fBaMWqp6esvTJqCsq4KCqLXSQsaGwx9Gx3aQXEZcTjPBbFdpue4VrLjNXBtbTBvU3RsIZAfz8tJ9bdxB8MfFbTLIW094iM4zcpHyZ2/xe6NrMeP1co9CPis5motRvoaO61VHVPzT0MNSwdEC0Bz/rDtJI7F0fxjaZXU9RQ1tvdLFJJTuma09IGjJxgnDgOO0rTr9HurqKsphXdEamghog8R8WGM538+3uWw+xXCuqWTXO4wTCCORsLYYCzLntLd78k5OCeAwOJT45J+KzDbtTVU10obeKGeogmt7Ks1jnMYeLgC4tzwHHiB28uC2odVwSugkNFWR0NRIIYq1zW9G9xOG8M7g0ngCRg8O9Y6fTlRR1Nvmp6uEinoRQTNliJ6SPIOW4I2nh25HFQi0xWiGlt01yifaqWVkjIxARM8MduYxz84wCBxAycBPixfFRk/HKkEFdUGjrGwUc7qV0rg0CSUP2bW5Pf2nAXXt9XNWROfPRT0bg7AZK5rtw7wWkghc+OxzQWqroop6Z76iomnzUQdJGQ+QuLXNzx54ypabsJsTKoF8AFRIJBBTMcyGHDcYY0kkZ5nxU8BzZ2QmEgUwkMaaSaBDCkFEKQQIFIKKkEEjTSTQIYUlFSQIAmEgpBBIIQhAMYTSCaoQ0wkmgkaEBGUIQ0IQExMplVql4v10oZtR2+1ilmZHFDLTCRzgY2u3EkjtJH3LtVWqaW3VD6GpbO6tAj6GJrBurN3DMYzxAOc+zjJ4LE20XqiuVxqbdXW0RV0rZiyop5HOYQwNxlrwCOHco1+lZ7lcGXWa4BtxpQ0UD44z0dLw/KeqT62/iHZ/NwByymuiJd80arNZT0dVfRU2+tqqa21JD5oGN2wRbGu7SC8jJJxngpal1LJbqe6z0lXJmmooKljRCHMAfIRuHaSQOXwXRdpwvob7TdZaDdnSO3Bn8VvjDO/jjGVp3LRj6+mrYW3AwuqqCnog9seTGYnE7+fHOeSYuTZZqhjpuq1VBXW2WaGSandO1pEoY3LsYJw4Djtd2fBa1o1TV1V0oLc231FTBPb46s1rnMYTuOMloPD4DtWX8XLjXVcNRdrlTzililZTtp6cxje9hYZH5cckNJAAwOJUqHTdXbaq1z0tbARS0TKGdssJPSMaQdzSD6p4duQnx/f5k8kKPVDRTRMjZWXOrqKipbHCxjGP2xyua4niGhrcAZJyeHapza2o4oKVwoq99RU1bqEUrYx0sc4YXlruOAMDnnGCCsVPpKqtwp57fcIWVkElSd00JdHJHNKZCxwBB4EjBB7PFZaTSckNTR1lRXCaqjrpK+oeItrZXOhdEGtGfVABGM55eKfAcnRs96ZdjUxOpaikqaV4ZNBNjc3Iy0gtJBBHaFy6fW9sgul3oLrcaSlfSVYhiY44cYzGx2T97iutQ2o0l1uVd0wf10xeptxs2NLefbnKdqtRttVc5zN0nXqrrO0Nxs9RrceP1c/ekI5Fj1VUXHTlPdBRSVz55pWNFKWsaGte4Bxc8gAYA+JWSLU5uVZZDR74oaqongqYpGjc10bDlpIyMhw7DxWq7RErKG3wR1VLO6jnnl6OrgL4JelJPFocDubngfj3rNZNFutDqFxrIn9VrKirLY4OjaelGNoGeAGVXAuTDZdZTS222RSUs9xudVBJUOjhLGeo2Qtz6xAJ5DA4q3RPMkbXljmFwB2u5t8D4qoT6HnfZqK19JaaqKnjewmtoi9zXOcTvYQ4FpwcY8FaLZRm3W6mo3TyVBgibGZZOLn4GMnxR6ArNpCSaQAE0gmmA0wkmECGhCE0JgoqSikxgkU0kgQJJpKRiKRTKSQxJJpJFAUkykpYFQuOoKxt/qqCW8UdkbEWClbVU+5tWCMlweSBzONo48F06zUwpqyekprdW3B9Ixrqp9MG7YcjIHrEbnY47Rk4x3qN7tF5ukdXRsuFv6hVMMZZUUZe+IEYOCHAO7xuHNazdL3C1Pm+hLnFDFUwxMmbUwGVwfHGIxIwhw9Yta0EHIyM96foL1Nt+q6FulDqbo6jqQpzVbNv5TYOzHf4LVdrLbVxUTrHdW1dQwyU0Raz8swczndhmMjIdg8Vp27TdyrdEw2Wpqm08ctvNO9skOZGy7j65OcYx+bjmea79TaunvVJculDRTRSxdHt+tvxxz4YSdDVjs13hvVGamKOaEskfDLDMAHxSMOHNOOGQe5c661dzl1DTWugrIaRj6SSoe98HSklr2tAGSMfWWxbrNVWySXoayIxVFfNVzNdDklrxwYDngQcceOe5Y7paLjLeae6W2ro4pI6d9O5lTC54cHOa7I2uGD6qni/77D5o51ZfLham3KhulQwyw0Zq4KylhAJYHBpzG443AkduCCuhBqQVVxmoKSgq6rq0jYaidhYBG8tDuLS7cQA4EkDHHtWrPpOor6a4vuNxbNX11P1USMh2RU8ec7WMyTz4kk5PBY7ppCe53OOpfNboxHLG9lTHSltXG1uPUEgdgg4xxHIkYRx6j5JHXEHR1lSy13J9FQzPhqaprG7Yyw4c4DO5zRzJA5LLBfajr16AilroqZ9OII4A3OHx7ickgY7ckrlW/Tt9qLfdKJ1xjo6OurKkvY+n3TRxvec9G7OMOHIkHGVvVujOnFWKepiYyWamlZDLGXR7YWbAx4BBc08/uClpDVmzSatpKmaOCSmqKeY1XU5GPLXdFKWb2glpIIcORHbwXRorlDX1FZDE1+KWXoXvP1XPwCQPhniqhW6cfZrZd4RE6oqrvKyanbbqTZHTTRsaGdpwNzQcnxyrTZrZLarNDSdK11UGF8szhkPmdxc4jtG45x3JOqsauzlSakrG6h2CKM2ZkwoHzbTuFSRnOeW0cGnxK2n6ppWXO4UTqapDLa0PqqogCKIFm8cc5JI7AFoj0d2r6FNDJ0j6pzS99X0jw505O4y7c4zv9bC3Y9MCanvENwqBUC6tYJixm3GIWxkjnzLcpOqGrFRaqhqp44JaGrpnzxulpw/Y4zhoyQA1xw7HHacLJbtRNrrh9Hz0NTQ1JiM0bJnMdvaCAfqk4IyMgrm0ujZo4JoJp7bHupn08dRR0IiqAXN27y7ccED2QMp2XR8lsvFNcpJLbH1elfTCKipDEH52+s4lxJPq8vFJ7Q5LOkmkszQCkmUlIxJJpJDApJlJIYFJMpFSMiUimUikUJIppFSMiolSSUlIikmkkxiKiVIqJUsoS4NVU3Sqv9RQUlbBSQwU0cxL6cSFxc5w5kjA9Vd5cSs0pbrleZbjcKanqw6BkLI5Y87NpcSc57c/oRFq+QldcGjRawcYaaGelkrKuapnpYzRAGOUxHi8EngCPHmCFtVGqYYTPI2irJaKmeY56uNrTHG4fW4Z3ODe0gdh7luPs8Yr7dUQdHBFQtkY2FjABhwA4Y4DGFzZ9N1xhq6CmuUUNtq5Hvewwbpow85e1js4wSTjIJGfgncGHxIlctTthirzR0VXVMpI3dLUQtaWRu254AnLscCcArNY7z1+Ghp5tzqqagiq3vwA07sA/fla0+nK6FlbTWu4w0lHW5LmvgMj4XFu0lhyBxAHMHCbNP1tC6hlt1fCyano2UUnTwl7ZGtxhwAIIOR8OKT2VwC3XZMaop5oqY0tLU1M9SZBHTsADtsbtrnEk4Dc44k9oWKo1HVx3C20zLLVltYJC/e5jXRFuOGM8eefhyWOk0tVW2Giko7jGa6lbLG6WaHLJmSP3kOaCCCDggg/rWzUWm5Svt9V1+mdW0hk3OfTkRva8YIDQ7IxgYOT4pfBZXxULUtzqLZBTGF7YIpZdk1U6IyCnbgncWjvOBnkO1aVTqCqt1ohrIJIb6JaqOES0xYwAOcBx9bGcn967dwirpGMNBVQwSNdlwmiL2vHccEEfELjO0tPJTVrnVdO2tqqmGrLo4S2FroyNo25yc44nOSpi41yVLdfBunUNOykr554poHUBxNC/BdkgFuMcDnOB4rSj1E6mmuQqmyPLKxlPTQMADyXRNdtzy4EkkkrWkt8931JTSPZNHHTt/hxMRZFUPYcxBuSSQCSfuC2bhpNtdJVTmaIzSVjayLpYQ9jSIwwtc3PrAgHu5pVBdQuT6En6spY4XdJTzMqhOym6qXM3b3glvrZ24IBOc9neupSVElTCJJaWWlfkgxykE/HgSMLkjT04t8tPtswklkDnsFB+Rcwfmlu7JPbuzwW3YbQbLRvgMrHb5XShkbS2OLP5rASSG/f2lRLZXBpHdfJ0SoqSisDZCKipFJJjRFIppFSUIqKkVFSykIpFMpFSUiJSKZSKkaIpFSUSkyjeIUXBZyzhyUCzIX2RxIxNHFSCC0g8kJMtdBhMJBSCQhoCWFIIEMJpBNBIwmEgpBAgCkFEBSCCWNNJNAmMJpKSCQCkFEKQQIFIKKkECYwmkmgQwpKKkgkApBRCkECGmEgmgljTSTQIYUgohSCCQCkFFSCBDTSTQIakopoExhMJBSCCQQhNAmATSCaoBppJhAhhCAmgkSYQgJgNNJNAhhNIJpkgmEkwgGNCQTTEMJpBNMQJpBNCExhNIJgpiBCAhAiSAkE0wGmEkwgQ0IQmJgoqSikwBJNJIaBJBQpGIpJlJIYkk0sJDApJlJSxiQUIKQxJFPCRSYwSQUkhoSEykpGJCEJDQikmkkMCkmUipY0IpFNIpDEkmkkMCkmkpGJJCEgApJlJIoCkmkpGRKRUlEpMoihBCFLGRSTSKkpCKipKKTGIqJUiolSyhJFNIqWMRUSpKKRYlEplIqWNCSTSKljIlJMpJFIRUSpFJSURSKZCRUlCUVIqKkpCKSZSISY0RSKaRUlCKipKJUspCKSaRUlIiUimUikNCUSmkVLKPQeqWn3dJ+hHU7R7qj/AEKr9Rpfs0XlCOo0v2eLyhfdnx3mS7ln6lZ/dUf+6jqdn91R/wC6qz1Ck+zReUI6jScurQ+UJUg8yfcs3U7R7qj/AN1Pqdo93R/7qrHUKT7NF5QjqFL9mh8gRSDzJ9yz9UtHu6P/AHUdUtHu6P8A3VWOoUv2aLyhHUKT7NF5QikHmS7ln6pafd0n+6jqlp93SfoVX6hS/ZofKEzQ0n2aLyhFIPMl3LR1W0+xSfoR1a1exSfoVX6hSfZovKEuo0n2aHyhFIN8u5aerWr2KT5hHVrV7FJ8wqv1Ck+zReUIFDSfZovKEUhb5dy09XtXsUnzCOr2r2KX5hVbqNJ9mi8oR1Gk+zReUIpD3y7lp6C1+zS/MI6C1+zS/MKrdQpPs0XlCOoUn2aLyhFIW+XctPQWv2aX5hPobX7NL8wqqaCk+zReUI6hSfZovKEUg3y7lq6G2ezS/MI6K2d1L8wqp1Ck+zReUI6hS4/k0XlCKQb5dy19FbO6l+YR0Vt7qX5hVXqNJ9mi8oQKClP+jxeUIpBvl3LV0Vt7qX5hPo7b/wB2+YVUFBSfZovKEdRpPs0XlCKQb5dy19Hbv+7fMI2W7/u3zCqnUaT7NF5QjqFL9mh8oRSDfLuWvZbu+m+YT227vpvmFUuoUuf5NF5Qn1Cl+zxeUIpBvl3LZtt3fTfMI22/vpvmFUuo0n2aLyhHUKX7NF5QikG59y24t/fT/MIxb++n+YVS6jSfZovKE+oUuP5NF5QikG59y2f8n99P5gj+Ae1T/MKp9QpPs0XlCOoUv2aLyhFIW59y25oPap/MEZoPap/MFUuoUn2aLyhHUaT7NF5QikG59y25ofbp/MEbqH2oPMFUuoUn2aLyhHUKT7NF5QikG59y3bqH24PMEbqH24PMFUeoUn2aLyhI0NJ9mi8oRSDcy37qH24PMEbqL2oPMFUOoUn2aLyhPqFL9mi8oRSC2W7fRe3B5gjfRe3B5gqj1Ck+zReUJdQpPs0XlCKQWy376L24PMEdJRe8g8wVQ6hSfZovKE+o0mP5NF5QikFst/SUXvIPMEdJRe3B5gqh1GkH+jReUI6hSfZofKEUgtlv6Sj95B5gjpaP3kHmCqHUKXP8mi8oR1Cl+zxeUIpBbLf0tH7yDzBHS0fvIfMFUOoUn2aLyhLqFJ9mi8oRSCy49NSe8h8wR01J72HzBU7qNL9ni8oR1Gl+zQ+UIoLZcempPew+YI6ak97B5gqf1Ck5dWi8oR1Ck+zReUIoLZcOnpPew+YI6ek97D5gqeKCk+zReUI6hSfZovKEUKy4dPSe9h8wR09J72HzBU/qFJ9mi8oR1Ck+zReUIoLLh09J72HzBHT0vvYfMFT+oUn2aLyhHUKT7NF5QnQWXHrFL76HzhHWKX30PnCpvUKX7ND5QjqFL9mi8oQBcusU3vYfMEdZpffQ+YKm9Rpfs8XlCfUKT7NF5QigLj1mm99D5gjrNN7+LzhU0UFJ9mi8oT6hSfZovKEAXHrNN76LzBPrVN76LzBU4UNJ9mi8oR1Gkz/JofKEAXHrVN7+LzhLrVP76LzhU7qFLz6tD5Qn1Ck+zReUIodFw61T+/i84R1mm99F5gqf9H0o/wBGh8oR1Gk+zReUJ0FFw6zTe+h8wR1mn99D5gqf1Cl+zQ+UI6jS/ZovKEbR0XDrNN76LzBHWKb30XmCp/UKTP8AJofKEdQpfs0PlCNoUXDrFN76LzBHWKb30XmCp/UKT7ND5QjqNJ9mi8oRtCi4dYpfew+YJdPS+9h8wVQ6jSfZovKEdQpPs0XlCNqCi39NSe9h8wR01L72HzBVDqFJ9mi8oR1Ckz/JovKEbUJ2W/pqT3sPmCOmpPew+YKodQpPs0XlCXUaX7PD5QjYg5Lh01J72HzBHS0nvYfMFT+oUv2eLyhPqFJz6tF5QlsQclv6Wk95D5gl0tH7yHzBVHqFJ9mi8oQaCkx/JofKEbUFst3S0fvIPMEdJR+8g8wVQFBS/ZovKFOC101Q8tbTwDA45altQWy2dJR+8g8wR0lH7yDzBVv6Ahx/E03kR9AQ+5pvIjauwrZZOko/eQeYI6Sj9uDzBVr8X4vdU3kWKezwU4aXQQEE44NRtXYNzLV0lF7cHmCW+i9uDzBVLqFKHFppoctOD6oR1Cl+zReUJbV2HbLbvovbg8wRvovbg8wVS6jSH/RovKEdQpPs0PlCVLsG5lt30XtweYI3UPtQeYKpdQpPs0XlCOo0n2aLyhFLsG5lt3UPtQeYI3UPtQeYKpdRpOymi8oR1Gk+zReUIqPYNzLZmh9qn8wRmh9qn8wVT6jSfZovKEdQpB/o0XlCNsew9z7lszQ+1T/MI/gPtU/zCqfUKT7NF5QjqNJ9mi8oSqPYLfctn8B9qn+YR/APap/mFU+o0v2aHyhHUKX7ND5QlUew+e5bP4B7VP8AMIxQd9P8wqp1Ckx/JofKEGhpfs0XlCPh7D57lqxb/wDu/wAwjbb/APu/zCqnUKX7NF5QpdQpfs0XlCXw9h1LuWnbb/8Au3zCWy3f92+YVW6jSD/RofKEdQpPs0XlCXw9h1LuWnZbv+7fMI6O3f8AdvmFVuoUn2aLyhMUFLj+TQ+UIuPYKl3LR0du7qb5hHRW3upvmFVuo0mcdWh8oR1ClP8Ao0PlCVw+kKl3LR0Vt7qb5hHRWzupvmFV+o0g/wBGi8oR1Ck+zReUIuH0jqXctHQ2z2ab5hHQ2z2aX5hVfqFJ9mh8oT6hSfZovKEfB9Ivi7ln6C1+zS/MJdBa/YpfmFWOo0n2aLyhHUKT7ND5Qn8H0h8Xcs/V7X7FL8wjq9r9il+YVY6hSfZovKEdQpPs0PkCKh9KD4u5ZurWr2KX5hHVrV7FL8wqz1Ckx/JofKEuoUnbTReUJ7YfShXLuWfq1p9ik+YR1W0+7pP0Ks9Qpfs0PkCXUaQ/6NF5QjZD6UG6Xcs/VbT7uk+YS6pafd0n6FWeoUv2aLyhHUKT7NF5Qn5cPpQbpdyzdUtB/wA3SfoR1O0e6pP0Ks9RpD/o0XlCOo0n2aLyhHlw+lD3T7lm6naPdUf+6l1K0e6o/wBCrXUKTP8AJovKEdRpPs0PlCPLh9KDdP6mWXqVn91R/oR1Gz+5o/0KtdQpPs0PlCOo0v2aHyhHlw+lBun9TLL1Gz+5o/8AdR1Gz+5o/wDdVa6hS/ZofKEdRpMfyaHyhLysf0r9A3T+plk6hZvc0f8Auo+j7N7ij/3VW+oUv2aHyhHUKX7ND5Qjysf0r9A3z+plk+j7L7ii/wB1H0fZfcUX+6q31Cl+zQ+UI6hSfZovKEeVj+lfoG+f1Msn0dZfcUX+6l9HWX3FF/uqudQpPs0XlCOoUnPq0XlCPKx/Sv0F5k/qZ//Z" alt="IHGF Delhi Fair Spring 2027 website banner - Ultimate Sourcing Begins Here" loading="lazy">
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

    /* brand logos slider */
    if (window.Swiper && document.getElementById('evBrandSwiper')) {
        new Swiper('#evBrandSwiper', {
            slidesPerView: 2, slidesPerGroup: 2, spaceBetween: 16, rewind: true, grabCursor: true,
            autoplay: { delay: 3200, disableOnInteraction: false, pauseOnMouseEnter: true },
            pagination: { el: '.xp-lg-pag', clickable: true },
            breakpoints: {
                768: { slidesPerView: 3, slidesPerGroup: 3, spaceBetween: 22 },
                992: { slidesPerView: 4, slidesPerGroup: 4, spaceBetween: 24 }
            }
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