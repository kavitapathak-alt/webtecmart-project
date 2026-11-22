<?php require_once __DIR__ . '/app/templates/header.php'; ?>

<?php
// ===== Data (unchanged) =====
$aboutContent = aboutPageContent();
$stats = $aboutContent['stats'];
$coreValues = $aboutContent['core_values'];
$journeyMilestones = $aboutContent['milestones'];
$uspItems = $aboutContent['usp_items'];

// ===== Icon Helper (unchanged) =====
function apIcon(string $name): string {
    $icons = [
        'sparkles'   => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
        'award'      => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'briefcase'  => '<rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        'trending'   => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        'target'     => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
        'lightbulb'  => '<path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1.3.5 2.6 1.5 3.5.8.8 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/>',
        'handshake'  => '<path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2"/><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 4h8"/>',
        'rocket'     => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
        'shield'     => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
        'zap'        => '<path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/>',
        'quote'      => '<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/>',
        'arrow'      => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
    ];
    $path = $icons[$name] ?? '';
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
}
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

<style>
/* ============================================================
   ABOUT PAGE — "Expo Floor" design (matches the B2B page)
   ink + magenta + gold, signboard cards, hard offset shadows
   ============================================================ */
.ap {
    --ink: #1A0613; --ink2: #2B0B20; --pink: #C4007A; --pink2: #E0398F;
    --blush: #FBEAF3; --mist: #F7F4F8; --gold: #FFB547; --mint: #0E9F6E;
    --text: #2A2430; --mute: #6C6474; --line: rgba(26, 6, 19, .12);
    --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
    position: relative; width: 100%; overflow-x: clip; background: #fff; color: var(--text);
    font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
}
.ap *, .ap *::before, .ap *::after { box-sizing: border-box; }
.ap h1, .ap h2, .ap h3 { margin: 0; font-family: var(--disp); letter-spacing: -.02em; }
.ap p { margin: 0; }
.ap :is(a, button):focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }
.ap ::selection { background: var(--pink); color: #fff; }
.ap-wrap { position: relative; z-index: 2; width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 22px; }
.ap h1, .ap h2, .ap h3, .ap p { overflow-wrap: anywhere; }
.ap-grid-fix > * { min-width: 0; }

/* ---------- buttons ---------- */
.ap-btn { position: relative; overflow: hidden; display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 14px 26px; border-radius: 12px; border: 2px solid transparent; font: 700 .95rem/1.2 'Plus Jakarta Sans', sans-serif; text-decoration: none; text-align: center; cursor: pointer; transition: translate .2s ease, box-shadow .2s ease, background .2s ease; }
.ap-btn svg { width: 16px; height: 16px; flex-shrink: 0; transition: translate .2s ease; }
.ap-btn:hover svg { translate: 4px 0; }
.ap-btn--pink { background: radial-gradient(150px circle at var(--bx, 50%) var(--by, 50%), var(--pink2) 0, var(--pink) 72%); color: #fff !important; box-shadow: 0 6px 0 #7E004E; }
.ap-btn--pink:hover { translate: 0 2px; box-shadow: 0 4px 0 #7E004E; }
.ap-btn--pink:active { translate: 0 6px; box-shadow: 0 0 0 #7E004E; }
.ap-btn--ghost { background: transparent; color: #fff !important; border-color: rgba(255,255,255,.4); }
.ap-btn--ghost:hover { background: rgba(255,255,255,.1); border-color: #fff; }
.ap-ripple { position: absolute; width: 12px; height: 12px; margin: -6px 0 0 -6px; border-radius: 50%; background: currentColor; opacity: .3; pointer-events: none; animation: apRipple .65s ease-out forwards; }
@keyframes apRipple { to { transform: scale(22); opacity: 0; } }

/* ---------- hero ---------- */
.ap-hero { position: relative; padding: 76px 0 132px; text-align: center; color: #fff; background: radial-gradient(60% 70% at 85% 0%, rgba(196,0,122,.55), transparent 65%), radial-gradient(40% 50% at 0% 100%, rgba(255,181,71,.16), transparent 70%), var(--ink); }
.ap-hero::before { content: ''; position: absolute; inset: 0; pointer-events: none; background-image: radial-gradient(rgba(255,255,255,.14) 1px, transparent 1.2px); background-size: 26px 26px; -webkit-mask-image: linear-gradient(180deg, #000 30%, transparent 95%); mask-image: linear-gradient(180deg, #000 30%, transparent 95%); }
.ap-aurora { position: absolute; inset: 0; overflow: hidden; pointer-events: none; }
.ap-aurora i { position: absolute; border-radius: 50%; filter: blur(80px); opacity: .5; animation: apDrift 14s ease-in-out infinite alternate; }
.ap-aurora i:nth-child(1) { width: 420px; height: 420px; left: -8%; top: 4%; background: var(--pink); }
.ap-aurora i:nth-child(2) { width: 340px; height: 340px; right: 10%; bottom: -12%; background: var(--gold); opacity: .26; animation-duration: 18s; }
.ap-aurora i:nth-child(3) { width: 300px; height: 300px; left: 40%; top: -14%; background: var(--pink2); opacity: .3; animation-duration: 22s; }
@keyframes apDrift { to { transform: translate(60px, 40px) scale(1.2); } }
.ap-pill { display: inline-flex; align-items: center; gap: 8px; margin-bottom: 22px; padding: 7px 15px 7px 11px; border-radius: 999px; background: rgba(255,255,255,.09); border: 1px solid rgba(255,255,255,.22); -webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px); }
.ap-pill svg { width: 15px; height: 15px; color: var(--gold); flex-shrink: 0; }
.ap-pill span { font-size: .76rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: #FFE3F1; }
.ap-h1 { max-width: 980px; margin: 0 auto; font-size: clamp(2.2rem, 5.6vw, 4.2rem); font-weight: 800; line-height: 1.06; letter-spacing: -.035em; }
.ap-h1 .accent { position: relative; display: inline-block; color: var(--gold); }
.ap-h1 .accent svg { position: absolute; left: 0; bottom: -6px; width: 100%; height: 8px; }
.ap-h1 .accent svg path { stroke: var(--gold); opacity: .7; }
.ap-w { display: inline-block; overflow: hidden; vertical-align: top; padding-bottom: .12em; margin-bottom: -.12em; }
.ap-w > span { display: inline-block; }
.ap-sub { max-width: 720px; margin: 22px auto 0; font-size: clamp(1rem, 1.6vw, 1.15rem); line-height: 1.7; color: rgba(255,255,255,.78); }
.ap-actions { display: flex; flex-wrap: wrap; justify-content: center; gap: 14px; margin-top: 32px; }

/* ---------- stats (pull up over the hero) ---------- */
.ap-statswrap { position: relative; z-index: 3; margin-top: -76px; }
.ap-stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 140px), 1fr)); gap: 16px; }
.ap-stat { position: relative; padding: 22px 16px; text-align: center; background: #fff; border: 2px solid var(--ink); border-radius: 18px; box-shadow: 6px 6px 0 var(--ink); transition: translate .25s ease, box-shadow .25s ease; }
.ap-stat:hover { translate: -4px -4px; box-shadow: 10px 10px 0 var(--pink); }
.ap-stat-ico { display: grid; place-items: center; width: 46px; height: 46px; margin: 0 auto 12px; border-radius: 12px; background: var(--gold); color: var(--ink); border: 2px solid var(--ink); box-shadow: 3px 3px 0 var(--ink); transition: rotate .3s ease; }
.ap-stat:hover .ap-stat-ico { rotate: -8deg; }
.ap-stat-ico svg { width: 22px; height: 22px; }
.ap-stat-value { font-family: var(--disp); font-size: clamp(1.7rem, 3vw, 2.3rem); font-weight: 800; line-height: 1.05; color: var(--pink); }
.ap-stat-label { margin-top: 6px; font-size: .88rem; font-weight: 800; color: var(--ink); }
.ap-stat-desc { margin-top: 4px; font-size: .75rem; line-height: 1.4; color: var(--mute); }

/* ---------- section shell ---------- */
.ap-sec { position: relative; padding: 88px 0; }
.ap-head { max-width: 720px; margin: 0 auto 46px; text-align: center; }
.ap-kicker { display: inline-block; margin-bottom: 14px; padding: 6px 13px; border-radius: 8px; background: var(--ink); color: var(--gold); font-size: .76rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
.ap-head h2, .ap-story-text h2 { font-size: clamp(1.9rem, 3.6vw, 2.9rem); font-weight: 800; line-height: 1.1; color: var(--ink); }
.ap-head h2 .accent, .ap-story-text h2 .accent { position: relative; display: inline-block; color: var(--pink); }
.ap-head h2 .accent svg, .ap-story-text h2 .accent svg { position: absolute; left: 0; bottom: -4px; width: 100%; height: 6px; pointer-events: none; }
.ap-head p { margin-top: 14px; line-height: 1.65; color: var(--mute); font-size: 1.02rem; }
.ap-bar { display: block; width: 84px; height: 7px; margin: 16px auto 0; background: repeating-linear-gradient(90deg, var(--pink) 0 12px, var(--gold) 12px 24px); transform-origin: 50% 50%; }

/* ---------- story ---------- */
.ap-story { padding-top: 96px; }
.ap-story-grid { display: grid; grid-template-columns: minmax(0, 1fr); gap: 48px; align-items: center; }
@media (min-width: 992px) { .ap-story-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 72px; } }
.ap-story-text h2 { margin-bottom: 22px; }
.ap-story-text p { margin-bottom: 16px; font-size: 1.02rem; line-height: 1.75; color: var(--mute); }
.ap-story-text p .bold { font-weight: 800; color: var(--pink); }
.ap-story-visual { perspective: 1200px; }
.ap-card-id { position: relative; overflow: hidden; display: grid; place-items: center; min-height: 380px; padding: 40px 28px; text-align: center; color: #fff; border: 2px solid var(--ink); border-radius: 26px; box-shadow: 12px 12px 0 var(--gold); background: radial-gradient(70% 60% at 80% 0%, rgba(196,0,122,.6), transparent 70%), radial-gradient(rgba(255,255,255,.1) 1px, transparent 1.2px) 0 0 / 24px 24px, var(--ink); }
.ap-rings { position: absolute; left: 50%; top: 38%; width: 0; height: 0; pointer-events: none; }
.ap-rings i { position: absolute; border-radius: 50%; border: 2px dashed rgba(255,181,71,.45); translate: -50% -50%; animation: apSpin 24s linear infinite; }
.ap-rings i:nth-child(1) { width: 190px; height: 190px; }
.ap-rings i:nth-child(2) { width: 280px; height: 280px; border-color: rgba(255,255,255,.2); animation-direction: reverse; animation-duration: 36s; }
@keyframes apSpin { to { rotate: 360deg; } }
.ap-card-in { position: relative; z-index: 2; }
.ap-quote { display: grid; place-items: center; width: 84px; height: 84px; margin: 0 auto 18px; border-radius: 50%; background: var(--gold); color: var(--ink); border: 2px solid var(--ink); box-shadow: 4px 4px 0 var(--pink); }
.ap-quote svg { width: 38px; height: 38px; }
.ap-brand { font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; color: #fff; }
.ap-tagline { margin-top: 8px; font-size: 1rem; color: rgba(255,255,255,.75); }
.ap-dots { display: flex; justify-content: center; gap: 8px; margin-top: 18px; }
.ap-dots span { width: 9px; height: 9px; border-radius: 50%; background: rgba(255,181,71,.4); }
.ap-dots span:nth-child(3) { background: var(--gold); box-shadow: 0 0 0 4px rgba(255,181,71,.25); }

/* ---------- ribbon (core values scrolling) ---------- */
.ap-ribbon { position: relative; overflow: hidden; background: var(--gold); color: var(--ink); border-top: 3px solid var(--ink); border-bottom: 3px solid var(--ink); }
.ap-ribbon-track { display: flex; width: max-content; animation: apRun 40s linear infinite; }
.ap-ribbon:hover .ap-ribbon-track { animation-play-state: paused; }
.ap-ribbon span { padding: 15px 30px; font-family: var(--disp); font-size: 1.1rem; font-weight: 800; white-space: nowrap; }
.ap-ribbon span::after { content: '\2726'; margin-left: 60px; opacity: .55; }
@keyframes apRun { to { transform: translateX(-50%); } }

/* ---------- values ---------- */
.ap-values { background: var(--mist); background-image: radial-gradient(rgba(26,6,19,.07) 1px, transparent 1.2px); background-size: 24px 24px; }
.ap-values-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 250px), 1fr)); gap: 22px; perspective: 1200px; }
.ap-value { position: relative; overflow: hidden; padding: 52px 24px 26px; background: #fff; border: 2px solid var(--ink); border-radius: 18px; box-shadow: 6px 6px 0 var(--ink); transition: translate .25s ease, box-shadow .25s ease; }
.ap-value::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 26px; border-bottom: 2px solid var(--ink); background: repeating-linear-gradient(90deg, var(--pink) 0 22px, #fff 22px 44px); }
.ap-value:nth-child(even)::before { background: repeating-linear-gradient(90deg, var(--ink) 0 22px, var(--gold) 22px 44px); }
.ap-value::after { content: attr(data-n); position: absolute; right: 14px; bottom: -14px; font: 800 6rem/1 var(--disp); color: transparent; -webkit-text-stroke: 2px rgba(196,0,122,.14); pointer-events: none; }
.ap-value:hover { translate: -4px -4px; box-shadow: 10px 10px 0 var(--pink); }
.ap-value-icon { position: relative; z-index: 1; display: grid; place-items: center; width: 52px; height: 52px; margin-bottom: 16px; border-radius: 13px; background: var(--blush); color: var(--pink); border: 2px solid var(--ink); box-shadow: 3px 3px 0 var(--gold); transition: rotate .3s ease, scale .3s ease; }
.ap-value:hover .ap-value-icon { rotate: -8deg; scale: 1.08; }
.ap-value-icon svg { width: 24px; height: 24px; }
.ap-value-title { position: relative; z-index: 1; margin-bottom: 8px; font-size: 1.2rem; font-weight: 800; color: var(--ink); }
.ap-value-desc { position: relative; z-index: 1; font-size: .92rem; line-height: 1.65; color: var(--mute); }

/* ---------- journey timeline ---------- */
.ap-tl { position: relative; --p: 0; }
.ap-tl-line { position: absolute; top: 0; bottom: 0; left: 16px; width: 6px; border: 2px solid var(--ink); border-radius: 99px; background: #fff; overflow: hidden; margin-left: -3px; }
.ap-tl-fill { position: absolute; inset: 0; transform-origin: 50% 0; transform: scaleY(var(--p)); background: repeating-linear-gradient(45deg, var(--pink) 0 8px, var(--pink2) 8px 16px); }
.ap-tl-items { display: flex; flex-direction: column; gap: 22px; }
.ap-tl-item { position: relative; padding-left: 48px; }
.ap-tl-node { position: absolute; top: 28px; left: 16px; width: 20px; height: 20px; margin-left: -10px; border-radius: 50%; background: var(--gold); border: 2px solid var(--ink); box-shadow: 0 0 0 4px #fff; z-index: 3; transition: background .3s, scale .3s; }
.ap-tl-node.on { background: var(--pink); scale: 1.25; }
.ap-tl-card { position: relative; overflow: hidden; padding: 22px 22px 24px; background: #fff; border: 2px solid var(--ink); border-radius: 18px; box-shadow: 6px 6px 0 var(--ink); transition: translate .25s ease, box-shadow .25s ease; }
.ap-tl-card:hover { translate: -4px -4px; box-shadow: 10px 10px 0 var(--gold); }
.ap-tl-year { display: inline-block; font: 800 clamp(2rem, 4vw, 2.8rem)/1 var(--disp); color: var(--pink); letter-spacing: -.03em; }
.ap-tl-title { margin-top: 8px; font-size: 1.15rem; font-weight: 800; color: var(--ink); }
.ap-tl-desc { margin-top: 6px; font-size: .92rem; line-height: 1.65; color: var(--mute); }
@media (min-width: 768px) {
    .ap-tl-line { left: 50%; }
    .ap-tl-items { gap: 30px; }
    .ap-tl-item { width: calc(50% - 38px); padding-left: 0; }
    .ap-tl-item.odd { margin-left: auto; }
    .ap-tl-item.even { text-align: right; }
    .ap-tl-node { top: 34px; }
    .ap-tl-item.even .ap-tl-node { left: calc(100% + 38px); }
    .ap-tl-item.odd .ap-tl-node { left: -38px; }
}

/* ---------- USP (dark) ---------- */
.ap-usp { background: radial-gradient(50% 60% at 92% 0%, rgba(196,0,122,.38), transparent 70%), radial-gradient(40% 50% at 0% 100%, rgba(255,181,71,.14), transparent 70%), var(--ink); color: #fff; }
.ap-usp-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 260px), 1fr)); gap: 22px; }
.ap-usp-item { padding: 30px 26px; border-radius: 20px; border: 2px solid rgba(255,255,255,.18); background: linear-gradient(135deg, rgba(255,255,255,.09), rgba(255,255,255,.02)); -webkit-backdrop-filter: blur(6px); backdrop-filter: blur(6px); box-shadow: 8px 8px 0 var(--gold); transition: translate .25s ease, box-shadow .25s ease; }
.ap-usp-item:hover { translate: -4px -4px; box-shadow: 12px 12px 0 var(--pink); }
.ap-usp-icon { display: grid; place-items: center; width: 56px; height: 56px; margin-bottom: 18px; border-radius: 14px; background: var(--gold); color: var(--ink); border: 2px solid var(--ink); box-shadow: 3px 3px 0 var(--pink); transition: rotate .3s ease; }
.ap-usp-item:hover .ap-usp-icon { rotate: -8deg; }
.ap-usp-icon svg { width: 26px; height: 26px; }
.ap-usp-title { margin-bottom: 8px; font-size: 1.25rem; font-weight: 800; color: #fff; }
.ap-usp-desc { font-size: .93rem; line-height: 1.7; color: rgba(255,255,255,.75); }

/* ---------- CTA ---------- */
@property --apa { syntax: '<angle>'; initial-value: 0deg; inherits: false; }
@keyframes apAngle { to { --apa: 360deg; } }
.ap-cta-sec { padding: 88px 0 96px; background: #fff; }
.ap-cta { position: relative; overflow: hidden; padding: 64px 34px; text-align: center; color: #fff; border-radius: 28px; background: radial-gradient(50% 80% at 50% 120%, rgba(196,0,122,.75), transparent 70%), radial-gradient(rgba(255,255,255,.1) 1px, transparent 1.2px) 0 0 / 26px 26px, var(--ink); }
.ap-cta::after { content: ''; position: absolute; inset: 0; border-radius: inherit; padding: 3px; pointer-events: none; background: conic-gradient(from var(--apa), var(--pink), var(--gold), var(--pink2), var(--pink)); -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0); -webkit-mask-composite: xor; mask: linear-gradient(#000 0 0) content-box exclude, linear-gradient(#000 0 0); animation: apAngle 6s linear infinite; }
.ap-cta-in { position: relative; z-index: 2; }
.ap-cta h2 { max-width: 800px; margin: 0 auto 16px; font-size: clamp(1.9rem, 3.8vw, 3rem); font-weight: 800; line-height: 1.1; color: #fff; }
.ap-cta p { max-width: 640px; margin: 0 auto 30px; line-height: 1.7; color: rgba(255,255,255,.8); }
.ap-cta .ap-actions { margin-top: 0; }

/* ---------- progress bar + motion states ---------- */
.ap-progress { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 4px; z-index: 9999; transform-origin: 0 50%; transform: scaleX(0); background: linear-gradient(90deg, var(--gold), var(--pink)); }
.ap-js .ap-progress { display: block; }
.ap-js [data-rv], .ap-js .ap-hero [data-hero] { opacity: 0; }

/* ---------- responsive ---------- */
@media (max-width: 991px) {
    .ap-sec { padding: 72px 0; }
    .ap-hero { padding-bottom: 120px; }
    .ap-card-id { min-height: 320px; box-shadow: 8px 8px 0 var(--gold); }
}
@media (max-width: 575px) {
    .ap-wrap { padding: 0 16px; }
    .ap-hero { padding: 52px 0 108px; }
    .ap-statswrap { margin-top: -64px; }
    .ap-stats { gap: 12px; }
    .ap-stat { padding: 18px 10px; box-shadow: 4px 4px 0 var(--ink); }
    .ap-sec { padding: 56px 0; }
    .ap-head { margin-bottom: 34px; }
    .ap-actions .ap-btn { width: 100%; }
    .ap-btn { min-height: 48px; }
    .ap-value, .ap-tl-card { box-shadow: 4px 4px 0 var(--ink); }
    .ap-usp-item { box-shadow: 5px 5px 0 var(--gold); padding: 24px 20px; }
    .ap-cta { padding: 44px 20px; border-radius: 20px; }
    .ap-cta-sec { padding: 56px 0 64px; }
    .ap-ribbon span { font-size: .95rem; padding: 12px 22px; }
    .ap-ribbon span::after { margin-left: 36px; }
    .ap-aurora i { filter: blur(50px); }
}
@media (hover: none) {
    .ap-stat:hover, .ap-value:hover, .ap-tl-card:hover, .ap-usp-item:hover, .ap-btn--pink:hover { translate: none; }
    .ap-stat:hover { box-shadow: 6px 6px 0 var(--ink); }
    .ap-value:hover, .ap-tl-card:hover { box-shadow: 6px 6px 0 var(--ink); }
    .ap-usp-item:hover { box-shadow: 8px 8px 0 var(--gold); }
}
@media (prefers-reduced-motion: reduce) {
    .ap-aurora i, .ap-rings i, .ap-ribbon-track, .ap-cta::after { animation: none; }
}
</style>

<main class="ap" id="aboutPage">
<script>
/* hidden-start animation states only on desktop mouse devices; phones/tablets/reduced-motion get the plain page */
(function (s) {
    try {
        var desk = matchMedia('(min-width: 992px)').matches && matchMedia('(pointer: fine)').matches;
        var calm = matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (desk && !calm) s.parentElement.classList.add('ap-js');
    } catch (e) {}
})(document.currentScript);
</script>
<div class="ap-progress" aria-hidden="true"></div>

    <!-- ===== HERO ===== -->
    <section class="ap-hero">
        <div class="ap-aurora" aria-hidden="true"><i></i><i></i><i></i></div>
        <div class="ap-wrap">
            <div class="ap-pill" data-hero>
                <?= apIcon('sparkles') ?>
                <span><?= e((string) $aboutContent['badge']) ?></span>
            </div>

            <h1 class="ap-h1">
                <?= e((string) $aboutContent['hero_prefix']) ?>
                <?php if ($aboutContent['hero_highlight'] !== ''): ?>
                    <span class="accent">
                        <?= e((string) $aboutContent['hero_highlight']) ?>
                        <svg viewBox="0 0 300 8" preserveAspectRatio="none" aria-hidden="true">
                            <path d="M2 4C60 1 240 1 298 4" stroke="#FFB547" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                        </svg>
                    </span>
                <?php endif; ?>
                <?= e((string) $aboutContent['hero_suffix']) ?>
            </h1>

            <p class="ap-sub" data-hero><?= e((string) $aboutContent['summary']) ?></p>

            <div class="ap-actions" data-hero>
                <a href="<?= e((string) $aboutContent['cta_primary_href']) ?>" class="ap-btn ap-btn--pink">
                    <span><?= e((string) $aboutContent['cta_primary_label']) ?></span>
                    <?= apIcon('arrow') ?>
                </a>
                <a href="<?= e((string) $aboutContent['cta_secondary_href']) ?>" class="ap-btn ap-btn--ghost">
                    <span><?= e((string) $aboutContent['cta_secondary_label']) ?></span>
                </a>
            </div>
        </div>
    </section>

    <!-- ===== STATS ===== -->
    <section class="ap-statswrap">
        <div class="ap-wrap">
            <div class="ap-stats">
                <?php foreach ($stats as $i => $stat): ?>
                    <div class="ap-stat" data-rv="up" data-d="<?= min($i, 5) * 0.08 ?>">
                        <div class="ap-stat-ico"><?= apIcon($stat['icon']) ?></div>
                        <div class="ap-stat-value"><?= htmlspecialchars($stat['value']) ?></div>
                        <div class="ap-stat-label"><?= htmlspecialchars($stat['label']) ?></div>
                        <div class="ap-stat-desc"><?= htmlspecialchars($stat['description']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== OUR STORY ===== -->
    <section class="ap-sec ap-story">
        <div class="ap-wrap">
            <div class="ap-story-grid">
                <div class="ap-story-text" data-rv="left">
                    <h2><?= e((string) $aboutContent['story_heading_prefix']) ?> <span class="accent"><?= e((string) $aboutContent['story_heading_highlight']) ?></span></h2>
                    <?php foreach ($aboutContent['story_paragraphs'] as $paragraph): ?>
                        <?php if (trim((string) $paragraph) !== ''): ?><p><?= e((string) $paragraph) ?></p><?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="ap-story-visual" data-rv="right">
                    <div class="ap-card-id" id="apCardId">
                        <div class="ap-rings" aria-hidden="true"><i></i><i></i></div>
                        <div class="ap-card-in">
                            <div class="ap-quote"><?= apIcon('quote') ?></div>
                            <h3 class="ap-brand"><?= e((string) $aboutContent['story_visual_brand']) ?></h3>
                            <p class="ap-tagline"><?= e((string) $aboutContent['story_visual_tagline']) ?></p>
                            <div class="ap-dots"><span></span><span></span><span></span><span></span><span></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== RIBBON: core values scroll past ===== -->
    <div class="ap-ribbon" aria-hidden="true">
        <div class="ap-ribbon-track">
            <?php for ($r = 0; $r < 4; $r++): foreach ($coreValues as $value): ?>
                <span><?= htmlspecialchars($value['title']) ?></span>
            <?php endforeach; endfor; ?>
        </div>
    </div>

    <!-- ===== CORE VALUES ===== -->
    <section class="ap-sec ap-values">
        <div class="ap-wrap">
            <div class="ap-head" data-rv="up">
                <span class="ap-kicker">What we stand for</span>
                <h2><?= e((string) $aboutContent['values_heading_prefix']) ?> <span class="accent"><?= e((string) $aboutContent['values_heading_highlight']) ?></span></h2>
                <p><?= e((string) $aboutContent['values_subtitle']) ?></p>
                <i class="ap-bar"></i>
            </div>

            <div class="ap-values-grid">
                <?php foreach ($coreValues as $i => $value): ?>
                    <div class="ap-value" data-n="<?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?>" data-rv="up" data-d="<?= min($i, 5) * 0.08 ?>">
                        <div class="ap-value-icon"><?= apIcon($value['icon']) ?></div>
                        <h3 class="ap-value-title"><?= htmlspecialchars($value['title']) ?></h3>
                        <p class="ap-value-desc"><?= htmlspecialchars($value['description']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== JOURNEY TIMELINE ===== -->
    <section class="ap-sec ap-journey">
        <div class="ap-wrap">
            <div class="ap-head" data-rv="up">
                <span class="ap-kicker">Our timeline</span>
                <h2><?= e((string) $aboutContent['journey_heading_prefix']) ?> <span class="accent"><?= e((string) $aboutContent['journey_heading_highlight']) ?></span></h2>
                <p><?= e((string) $aboutContent['journey_subtitle']) ?></p>
                <i class="ap-bar"></i>
            </div>

            <div class="ap-tl" id="apTl">
                <div class="ap-tl-line" aria-hidden="true"><i class="ap-tl-fill"></i></div>
                <div class="ap-tl-items">
                    <?php foreach ($journeyMilestones as $i => $milestone):
                        $isEven = ($i % 2 === 0);
                    ?>
                        <div class="ap-tl-item <?= $isEven ? 'even' : 'odd' ?>" data-rv="<?= $isEven ? 'left' : 'right' ?>">
                            <span class="ap-tl-node" aria-hidden="true"></span>
                            <div class="ap-tl-card">
                                <span class="ap-tl-year"><?= htmlspecialchars($milestone['year']) ?></span>
                                <h3 class="ap-tl-title"><?= htmlspecialchars($milestone['title']) ?></h3>
                                <p class="ap-tl-desc"><?= htmlspecialchars($milestone['description']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== USP SECTION ===== -->
    <section class="ap-sec ap-usp">
        <div class="ap-wrap">
            <div class="ap-usp-grid">
                <?php foreach ($uspItems as $i => $usp): ?>
                    <div class="ap-usp-item" data-rv="up" data-d="<?= min($i, 5) * 0.1 ?>">
                        <div class="ap-usp-icon"><?= apIcon((string) ($usp['icon'] ?? 'sparkles')) ?></div>
                        <h3 class="ap-usp-title"><?= e((string) ($usp['title'] ?? '')) ?></h3>
                        <p class="ap-usp-desc"><?= e((string) ($usp['description'] ?? '')) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="ap-cta-sec">
        <div class="ap-wrap">
            <div class="ap-cta" data-rv="scale">
                <div class="ap-cta-in">
                    <h2><?= e((string) $aboutContent['cta_title']) ?></h2>
                    <p><?= e((string) $aboutContent['cta_description']) ?></p>
                    <div class="ap-actions">
                        <a href="<?= e((string) $aboutContent['cta_primary_href']) ?>" class="ap-btn ap-btn--pink">
                            <span><?= e((string) $aboutContent['cta_primary_label']) ?></span>
                            <?= apIcon('arrow') ?>
                        </a>
                        <a href="<?= e((string) $aboutContent['cta_secondary_href']) ?>" class="ap-btn ap-btn--ghost">
                            <span><?= e((string) $aboutContent['cta_secondary_label']) ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/motion@11.18.2/dist/motion.js"></script>
<script>
(function () {
    var root = document.getElementById('aboutPage');
    if (!root) return;

    /* ---------- works everywhere (no library): timeline fill + nodes, button glow, ripple ---------- */
    var tl = document.getElementById('apTl');
    if (tl) {
        var nodes = tl.querySelectorAll('.ap-tl-node'), ticking = false;
        var upd = function () {
            ticking = false;
            var vh = window.innerHeight, r = tl.getBoundingClientRect();
            var p = Math.max(0, Math.min(1, (vh * 0.6 - r.top) / r.height));
            tl.style.setProperty('--p', p.toFixed(3));
            nodes.forEach(function (n) { n.classList.toggle('on', n.getBoundingClientRect().top < vh * 0.65); });
        };
        window.addEventListener('scroll', function () { if (!ticking) { ticking = true; requestAnimationFrame(upd); } }, { passive: true });
        window.addEventListener('resize', upd);
        upd();
    }
    root.querySelectorAll('.ap-btn--pink').forEach(function (b) {
        b.addEventListener('pointermove', function (e) {
            var r = b.getBoundingClientRect();
            b.style.setProperty('--bx', (e.clientX - r.left) + 'px');
            b.style.setProperty('--by', (e.clientY - r.top) + 'px');
        });
    });
    root.addEventListener('click', function (e) {
        var b = e.target.closest && e.target.closest('.ap-btn');
        if (!b) return;
        var r = b.getBoundingClientRect(), d = document.createElement('i');
        d.className = 'ap-ripple';
        d.style.left = (e.clientX - r.left) + 'px';
        d.style.top = (e.clientY - r.top) + 'px';
        b.appendChild(d);
        setTimeout(function () { d.remove(); }, 700);
    });

    /* ---------- desktop animations (Motion) ---------- */
    var M = window.Motion;
    var fallback = function () { root.classList.remove('ap-js'); };
    if (!M || !root.classList.contains('ap-js')) { fallback(); return; }
    try {
        var animate = M.animate, inView = M.inView, scroll = M.scroll, stagger = M.stagger;
        var spring = { type: 'spring', stiffness: 110, damping: 16 };

        /* progress bar */
        var bar = root.querySelector('.ap-progress');
        if (bar && scroll) scroll(animate(bar, { scaleX: [0, 1] }, { ease: 'linear' }));

        /* word-by-word mask reveal (hero h1 + section headings) */
        var split = function (el) {
            var walker = document.createTreeWalker(el, NodeFilter.SHOW_TEXT, null), list = [], n;
            while ((n = walker.nextNode())) { if (n.nodeValue.trim()) list.push(n); }
            list.forEach(function (node) {
                var frag = document.createDocumentFragment();
                node.nodeValue.split(/(\s+)/).forEach(function (part) {
                    if (!part) return;
                    if (/^\s+$/.test(part)) { frag.appendChild(document.createTextNode(' ')); return; }
                    var w = document.createElement('span'), inner = document.createElement('span');
                    w.className = 'ap-w'; inner.textContent = part; w.appendChild(inner); frag.appendChild(w);
                });
                node.parentNode.replaceChild(frag, node);
            });
            return el.querySelectorAll('.ap-w > span');
        };
        var h1 = root.querySelector('.ap-h1');
        if (h1) animate(split(h1), { y: ['110%', '0%'] }, { duration: 0.85, delay: stagger(0.06, { startDelay: 0.1 }), ease: [0.22, 1, 0.36, 1] });
        animate(root.querySelectorAll('.ap-hero [data-hero]'), { opacity: [0, 1], y: [26, 0] }, { duration: 0.7, delay: stagger(0.12, { startDelay: 0.5 }), ease: 'easeOut' });

        root.querySelectorAll('.ap-head h2').forEach(function (h) {
            var sp = split(h);
            sp.forEach(function (s) { s.style.transform = 'translateY(110%)'; });
            inView(h, function () { animate(sp, { y: ['110%', '0%'] }, { duration: 0.8, delay: stagger(0.05), ease: [0.22, 1, 0.36, 1] }); }, { amount: 0.6 });
        });

        /* generic reveals: slide/spring in from the side they belong to */
        root.querySelectorAll('[data-rv]').forEach(function (el) {
            var kind = el.getAttribute('data-rv'), d = parseFloat(el.getAttribute('data-d') || '0');
            var kf = { opacity: [0, 1] };
            if (kind === 'left') kf.x = [-80, 0];
            else if (kind === 'right') kf.x = [80, 0];
            else if (kind === 'scale') kf.scale = [0.92, 1];
            else kf.y = [44, 0];
            inView(el, function () { animate(el, kf, Object.assign({ delay: d }, spring)); }, { amount: 0.15 });
        });

        /* stripe bar under headings draws itself */
        root.querySelectorAll('.ap-bar').forEach(function (b) {
            b.style.transform = 'scaleX(0)';
            inView(b, function () { animate(b, { scaleX: [0, 1] }, { duration: 0.8, delay: 0.3, ease: [0.22, 1, 0.36, 1] }); }, { amount: 0.8 });
        });

        /* count-up numbers in the stats */
        root.querySelectorAll('.ap-stat-value').forEach(function (el) {
            var txt = el.textContent.trim(), m = txt.match(/^([^\d]?)(\d[\d,]*\.?\d*)(.*)$/);
            if (!m) return;
            var raw = m[2], num = parseFloat(raw.replace(/,/g, '')), dec = (raw.split('.')[1] || '').length, comma = raw.indexOf(',') > -1;
            if (num < 2) return;
            el.textContent = m[1] + (0).toFixed(dec) + m[3];
            inView(el, function () {
                animate(0, num, {
                    duration: 1.7, ease: 'easeOut',
                    onUpdate: function (v) {
                        var t = v.toFixed(dec);
                        if (comma) { var p = t.split('.'); p[0] = Math.round(+p[0]).toLocaleString('en-US'); t = p.join('.'); }
                        el.textContent = m[1] + t + m[3];
                    },
                    onComplete: function () { el.textContent = txt; }
                });
            }, { amount: 0.6 });
        });

        /* 3D tilt on the story card */
        var card = document.getElementById('apCardId');
        if (card) {
            card.addEventListener('pointermove', function (e) {
                var r = card.getBoundingClientRect(), nx = (e.clientX - r.left) / r.width - 0.5, ny = (e.clientY - r.top) / r.height - 0.5;
                animate(card, { rotateY: nx * 10, rotateX: -ny * 10 }, { duration: 0.3 });
            });
            card.addEventListener('pointerleave', function () { animate(card, { rotateX: 0, rotateY: 0 }, { type: 'spring', stiffness: 200, damping: 15 }); });
        }

        /* magnetic pink buttons */
        root.querySelectorAll('.ap-btn--pink').forEach(function (b) {
            b.addEventListener('pointermove', function (e) {
                var r = b.getBoundingClientRect();
                animate(b, { x: (e.clientX - r.left - r.width / 2) * 0.2, y: (e.clientY - r.top - r.height / 2) * 0.28 }, { duration: 0.25 });
            });
            b.addEventListener('pointerleave', function () { animate(b, { x: 0, y: 0 }, { type: 'spring', stiffness: 300, damping: 14 }); });
        });
    } catch (err) { fallback(); }
})();
</script>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>