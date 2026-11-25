<?php require_once __DIR__ . '/app/templates/header.php'; ?>

<?php
// ===== Icon Helper (unchanged) =====
if (!function_exists('pkgIcon')) {
function pkgIcon(string $name): string {
    $icons = [
        'sparkles'   => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
        'arrow'      => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'check'      => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
        'rocket'     => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
        'zap'        => '<path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/>',
        'crown'      => '<path d="M11.562 3.266a.5.5 0 0 1 .876 0L15.39 8.87a1 1 0 0 0 1.516.294L21.183 5.5a.5.5 0 0 1 .798.519l-2.834 10.246a1 1 0 0 1-.956.735H5.81a1 1 0 0 1-.957-.735L2.02 6.02a.5.5 0 0 1 .798-.519l4.276 3.664a1 1 0 0 0 1.516-.294z"/><path d="M5 21h14"/>',
        'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'trending'   => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        'award'      => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'shield'     => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
        'mail'       => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
        'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'message'    => '<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>',
        'x'          => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
    ];
    $path = $icons[$name] ?? '';
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
}
}

$packagesPage = packagesPageContent();
$packages = $packagesPage['packages'];
$addons = $packagesPage['addons'];
$faqs = $packagesPage['faqs'];
$trustBadges = $packagesPage['trust_badges'];
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

<style>
/* ============================================================
   PACKAGES PAGE — "Expo Floor" design, colour edition (no black)
   Pricing cards are event passes: perforation, punch holes, barcode.
   magenta + gold + blush, deep-magenta outlines & offset shadows.

   NOTE (centering fix): the resets below use :where() so they have
   ZERO specificity. Before, ".pkg-page h1 { margin:0 }" beat
   ".pkg-h1 { margin:0 auto }" and pushed headings/paragraphs to
   the left of their container.
   ============================================================ */
.pkg-page {
    --pink: #C4007A; --pink2: #E0398F; --pink3: #FF7BC0;
    --deep: #7E004E;            /* outlines + hard shadows (deep magenta) */
    --head: #5E0B45;            /* headings (burgundy, not black) */
    --blush: #FBEAF3; --soft: #FFF4FA; --gold: #FFB547; --mint: #0E9F6E;
    --text: #4A3342; --mute: #7A6574; --line: rgba(126, 0, 78, .14);
    --hero: radial-gradient(60% 70% at 88% 0%, rgba(255,181,71,.38), transparent 65%), radial-gradient(50% 60% at 0% 100%, rgba(255,255,255,.2), transparent 70%), linear-gradient(135deg, #A8006A 0%, #C4007A 45%, #E0398F 100%);
    --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
    position: relative; width: 100%; overflow-x: clip; background: #fff; color: var(--text);
    font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
}
.pkg-page *, .pkg-page *::before, .pkg-page *::after { box-sizing: border-box; }
.pkg-page :where(h1, h2, h3) { margin: 0; font-family: var(--disp); letter-spacing: -.02em; }
.pkg-page :where(p) { margin: 0; }
.pkg-page :is(a, button, summary):focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }
.pkg-page ::selection { background: var(--pink); color: #fff; }
.pkg-page :where(h1, h2, h3, p) { overflow-wrap: anywhere; }
.pkg-container { position: relative; z-index: 2; width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 22px; }

/* ---------- hero (everything centered) ---------- */
.pkg-hero-sec { position: relative; padding: 76px 0 150px; text-align: center; color: #fff; background: var(--hero); }
.pkg-hero-sec::before { content: ''; position: absolute; inset: 0; pointer-events: none; background-image: radial-gradient(rgba(255,255,255,.22) 1px, transparent 1.2px); background-size: 26px 26px; -webkit-mask-image: linear-gradient(180deg, #000 30%, transparent 95%); mask-image: linear-gradient(180deg, #000 30%, transparent 95%); }
.pkg-aurora { position: absolute; inset: 0; overflow: hidden; pointer-events: none; }
.pkg-aurora i { position: absolute; border-radius: 50%; filter: blur(80px); opacity: .5; animation: pkgDrift 14s ease-in-out infinite alternate; }
.pkg-aurora i:nth-child(1) { width: 420px; height: 420px; left: -8%; top: 4%; background: var(--pink3); opacity: .45; }
.pkg-aurora i:nth-child(2) { width: 340px; height: 340px; right: 10%; bottom: -12%; background: var(--gold); opacity: .4; animation-duration: 18s; }
.pkg-aurora i:nth-child(3) { width: 300px; height: 300px; left: 40%; top: -14%; background: #fff; opacity: .22; animation-duration: 22s; }
@keyframes pkgDrift { to { transform: translate(60px, 40px) scale(1.2); } }
.pkg-pill { display: inline-flex; align-items: center; gap: 8px; margin-bottom: 22px; padding: 7px 15px 7px 11px; border-radius: 999px; background: rgba(255,255,255,.18); border: 1px solid rgba(255,255,255,.45); -webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px); }
.pkg-pill svg { width: 15px; height: 15px; color: var(--gold); flex-shrink: 0; }
.pkg-pill span { font-size: .76rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: #fff; }
.pkg-h1 { max-width: 900px; margin: 0 auto; text-align: center; font-size: clamp(2.2rem, 5.4vw, 4rem); font-weight: 800; line-height: 1.06; letter-spacing: -.035em; text-shadow: 0 3px 0 rgba(126,0,78,.35); }
.pkg-h1 .accent { position: relative; display: inline-block; color: var(--gold); }
.pkg-h1 .accent svg { position: absolute; left: 0; bottom: -6px; width: 100%; height: 8px; }
.pkg-h1 .accent svg path { stroke: #fff; opacity: .85; }
.pkg-w { display: inline-block; overflow: hidden; vertical-align: top; padding-bottom: .12em; margin-bottom: -.12em; }
.pkg-w > span { display: inline-block; }
.pkg-subtitle { max-width: 700px; margin: 22px auto 0; text-align: center; font-size: clamp(1rem, 1.6vw, 1.15rem); line-height: 1.7; color: rgba(255,255,255,.92); }

/* ---------- billing toggle ---------- */
.pkg-toggle-wrap { display: inline-flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 14px; margin-top: 34px; padding: 10px 20px; border-radius: 999px; background: rgba(255,255,255,.18); border: 1px solid rgba(255,255,255,.45); -webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px); }
.pkg-toggle-label { display: inline-flex; align-items: center; gap: 8px; font-size: .92rem; font-weight: 700; transition: color .3s ease; }
.pkg-toggle-label.active { color: var(--gold); }
.pkg-toggle-label.inactive { color: rgba(255,255,255,.75); }
.pkg-toggle { position: relative; width: 66px; height: 36px; padding: 0; border: 2px solid var(--deep); border-radius: 999px; background: var(--gold); cursor: pointer; box-shadow: 0 3px 0 var(--deep); transition: background .3s ease; }
.pkg-toggle.yearly { background: #fff; box-shadow: 0 3px 0 var(--deep); }
.pkg-toggle-knob { position: absolute; top: 3px; left: 3px; width: 26px; height: 26px; border-radius: 50%; background: #fff; border: 2px solid var(--deep); transition: transform .35s cubic-bezier(.34, 1.56, .64, 1), background .3s; }
.pkg-toggle.yearly .pkg-toggle-knob { transform: translateX(30px); background: var(--pink); }
.pkg-save-badge { padding: 3px 10px; border-radius: 999px; background: var(--mint); color: #fff; font-size: .72rem; font-weight: 800; }

/* ---------- pass cards ---------- */
.pkg-main-sec { position: relative; z-index: 3; margin-top: -92px; padding-bottom: 80px; }
.pkg-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 290px), 1fr)); gap: 28px; align-items: stretch; perspective: 1200px; }
.pkg-card { position: relative; display: flex; flex-direction: column; overflow: hidden; padding: 30px 28px 0; background: #fff; border: 2px solid var(--deep); border-radius: 24px; box-shadow: 8px 8px 0 var(--gold); transition: translate .25s ease, box-shadow .25s ease; }
.pkg-card:hover { translate: -4px -4px; box-shadow: 12px 12px 0 var(--pink); }
.pkg-card-head { text-align: center; }
.pkg-icon-wrap { display: grid; place-items: center; width: 62px; height: 62px; margin: 0 auto 16px; border-radius: 16px; background: var(--blush); color: var(--pink); border: 2px solid var(--deep); box-shadow: 4px 4px 0 var(--gold); transition: rotate .3s ease; }
.pkg-card:hover .pkg-icon-wrap { rotate: -8deg; }
.pkg-icon-wrap svg { width: 30px; height: 30px; }
.pkg-name { font-size: 1.6rem; font-weight: 800; color: var(--head); }
.pkg-desc { margin-top: 8px; font-size: .92rem; line-height: 1.55; color: var(--mute); }

/* perforation + punch holes */
.pkg-perf { position: relative; margin: 26px -28px; border-top: 2px dashed var(--deep); }
.pkg-perf::before, .pkg-perf::after { content: ''; position: absolute; top: -14px; width: 26px; height: 26px; border-radius: 50%; background: #fff; border: 2px solid var(--deep); }
.pkg-perf::before { left: -15px; }
.pkg-perf::after { right: -15px; }

.pkg-price-wrap { text-align: center; margin-bottom: 24px; }
.pkg-price { display: inline-block; font-family: var(--disp); font-size: clamp(2.4rem, 4vw, 3.1rem); font-weight: 800; line-height: 1; letter-spacing: -.03em; color: var(--pink); font-variant-numeric: tabular-nums; }
.pkg-price-label { margin-left: 6px; font-size: .9rem; font-weight: 600; color: var(--mute); }
.pkg-features { flex: 1; display: flex; flex-direction: column; gap: 13px; margin: 0 0 28px; padding: 0; list-style: none; }
.pkg-feature { display: flex; align-items: flex-start; gap: 10px; font-size: .92rem; line-height: 1.5; color: var(--text); }
.pkg-feature svg { width: 18px; height: 18px; margin-top: 2px; flex-shrink: 0; color: var(--mint); }

.pkg-cta { position: relative; overflow: hidden; display: block; width: 100%; padding: 15px; border-radius: 12px; border: 2px solid var(--deep); font: 800 1rem/1.2 'Plus Jakarta Sans', sans-serif; text-align: center; text-decoration: none; cursor: pointer; transition: translate .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease; }
.pkg-cta.regular { background: #fff; color: var(--deep); box-shadow: 0 5px 0 var(--deep); }
.pkg-cta.regular:hover { background: var(--gold); translate: 0 2px; box-shadow: 0 3px 0 var(--deep); }
.pkg-cta.popular { background: radial-gradient(150px circle at var(--bx, 50%) var(--by, 50%), #FFD08A 0, var(--gold) 72%); color: var(--deep); border-color: var(--deep); box-shadow: 0 5px 0 var(--deep); }
.pkg-cta.popular:hover { translate: 0 2px; box-shadow: 0 3px 0 var(--deep); color: var(--deep); }
.pkg-cta:active { translate: 0 5px; box-shadow: 0 0 0 transparent; }
.pkg-ripple { position: absolute; width: 12px; height: 12px; margin: -6px 0 0 -6px; border-radius: 50%; background: currentColor; opacity: .3; pointer-events: none; animation: pkgRipple .65s ease-out forwards; }
@keyframes pkgRipple { to { transform: scale(22); opacity: 0; } }

/* ticket stub footer */
.pkg-stub { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin: 26px -28px 0; padding: 14px 28px; background: var(--blush); border-top: 2px solid var(--deep); }
.pkg-barcode { flex: 0 0 auto; width: 92px; height: 30px; background: repeating-linear-gradient(90deg, var(--deep) 0 2px, transparent 2px 4px, var(--deep) 4px 5px, transparent 5px 8px, var(--deep) 8px 11px, transparent 11px 13px); }
.pkg-code { font-size: .7rem; font-weight: 800; letter-spacing: .16em; text-transform: uppercase; color: var(--deep); }

/* popular = VIP pass (magenta) */
.pkg-card.popular { color: #fff; background: radial-gradient(70% 50% at 100% 0%, rgba(255,181,71,.4), transparent 70%), linear-gradient(160deg, #C4007A 0%, #E0398F 100%); box-shadow: 8px 8px 0 var(--gold); }
.pkg-card.popular:hover { box-shadow: 12px 12px 0 var(--deep); }
.pkg-card.popular::after { content: ''; position: absolute; inset: 0; border-radius: inherit; padding: 3px; pointer-events: none; background: conic-gradient(from var(--pkga), var(--gold), #fff, var(--pink3), var(--gold)); -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0); -webkit-mask-composite: xor; mask: linear-gradient(#000 0 0) content-box exclude, linear-gradient(#000 0 0); animation: pkgAngle 6s linear infinite; }
@property --pkga { syntax: '<angle>'; initial-value: 0deg; inherits: false; }
@keyframes pkgAngle { to { --pkga: 360deg; } }
.pkg-card.popular .pkg-name { color: #fff; }
.pkg-card.popular .pkg-desc { color: rgba(255,255,255,.88); }
.pkg-card.popular .pkg-icon-wrap { background: var(--gold); color: var(--deep); box-shadow: 4px 4px 0 var(--deep); }
.pkg-card.popular .pkg-perf { border-top-color: rgba(255,255,255,.7); }
.pkg-card.popular .pkg-perf::before, .pkg-card.popular .pkg-perf::after { border-color: var(--gold); }
.pkg-card.popular .pkg-price { color: #fff; text-shadow: 0 3px 0 rgba(126,0,78,.4); }
.pkg-card.popular .pkg-price-label { color: rgba(255,255,255,.85); }
.pkg-card.popular .pkg-feature { color: rgba(255,255,255,.95); }
.pkg-card.popular .pkg-feature svg { color: var(--gold); }
.pkg-card.popular .pkg-stub { background: rgba(255,255,255,.16); border-top-color: rgba(255,255,255,.45); }
.pkg-card.popular .pkg-barcode { background: repeating-linear-gradient(90deg, #fff 0 2px, transparent 2px 4px, #fff 4px 5px, transparent 5px 8px, #fff 8px 11px, transparent 11px 13px); }
.pkg-card.popular .pkg-code { color: #fff; }
.pkg-popular-badge { position: absolute; top: 0; left: 50%; z-index: 3; translate: -50% 0; padding: 7px 18px; border: 2px solid var(--deep); border-top: 0; border-radius: 0 0 14px 14px; background: var(--gold); color: var(--deep); font: 800 .74rem/1 'Plus Jakarta Sans', sans-serif; letter-spacing: .08em; text-transform: uppercase; white-space: nowrap; }
.pkg-card.popular { padding-top: 48px; }
@media (min-width: 992px) {
    .pkg-card.popular { translate: 0 -16px; }
    .pkg-card.popular:hover { translate: -4px -20px; }
}

/* ---------- section shell (headings centered) ---------- */
.pkg-sec { position: relative; padding: 84px 0; }
.pkg-head { max-width: 720px; margin: 0 auto 44px; text-align: center; }
.pkg-kicker { display: inline-block; margin-bottom: 14px; padding: 6px 13px; border-radius: 8px; background: var(--pink); color: #fff; border: 2px solid var(--deep); box-shadow: 3px 3px 0 var(--gold); font-size: .76rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
.pkg-head h2 { text-align: center; font-size: clamp(1.9rem, 3.6vw, 2.8rem); font-weight: 800; line-height: 1.1; color: var(--head); }
.pkg-head h2 .accent { position: relative; display: inline-block; color: var(--pink); }
.pkg-head p { margin-top: 14px; text-align: center; font-size: 1.02rem; line-height: 1.65; color: var(--mute); }
.pkg-bar { display: block; width: 84px; height: 7px; margin: 16px auto 0; background: repeating-linear-gradient(90deg, var(--pink) 0 12px, var(--gold) 12px 24px); }

/* ---------- add-ons ---------- */
.pkg-addons-sec { background-color: var(--soft); background-image: radial-gradient(rgba(196,0,122,.1) 1px, transparent 1.2px); background-size: 24px 24px; }
.pkg-addons-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 260px), 1fr)); gap: 16px; }
.pkg-addon { display: flex; align-items: center; justify-content: space-between; gap: 14px; padding: 16px 18px; background: #fff; border: 2px solid var(--deep); border-radius: 14px; box-shadow: 4px 4px 0 var(--deep); transition: translate .25s ease, box-shadow .25s ease; }
.pkg-addon:hover { translate: -3px -3px; box-shadow: 7px 7px 0 var(--pink); }
.pkg-addon-name { font-size: .93rem; font-weight: 700; color: var(--head); }
.pkg-addon-price { flex-shrink: 0; padding: 5px 12px; border-radius: 999px; background: var(--gold); border: 2px solid var(--deep); font-size: .84rem; font-weight: 800; color: var(--deep); white-space: nowrap; }

/* ---------- trust ---------- */
.pkg-trust { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 150px), 1fr)); gap: 16px; }
.pkg-trust-card { padding: 22px 14px; text-align: center; background: #fff; border: 2px solid var(--deep); border-radius: 18px; box-shadow: 5px 5px 0 var(--blush); transition: translate .25s ease, box-shadow .25s ease; }
.pkg-trust-card:hover { translate: -3px -3px; box-shadow: 8px 8px 0 var(--gold); }
.pkg-trust-ico { display: grid; place-items: center; width: 46px; height: 46px; margin: 0 auto 12px; border-radius: 12px; background: var(--blush); color: var(--pink); border: 2px solid var(--deep); box-shadow: 3px 3px 0 var(--gold); }
.pkg-trust-ico svg { width: 22px; height: 22px; }
.pkg-trust-title { font-size: .92rem; font-weight: 800; color: var(--head); }
.pkg-trust-sub { margin-top: 4px; font-size: .78rem; line-height: 1.4; color: var(--mute); }

/* ---------- FAQ accordion ---------- */
.pkg-faq-sec { background: radial-gradient(40% 50% at 100% 0%, rgba(255,181,71,.28), transparent 70%), var(--blush); }
.pkg-faq-grid { display: grid; grid-template-columns: minmax(0, 1fr); gap: 16px; align-items: start; }
@media (min-width: 768px) { .pkg-faq-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
.pkg-faq-card { background: #fff; border: 2px solid var(--deep); border-radius: 16px; box-shadow: 4px 4px 0 var(--deep); transition: box-shadow .25s ease; }
.pkg-faq-card[open] { box-shadow: 6px 6px 0 var(--pink); }
.pkg-faq-q { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 20px; font: 700 1.02rem/1.3 var(--disp); color: var(--head); cursor: pointer; list-style: none; }
.pkg-faq-q::-webkit-details-marker { display: none; }
.pkg-plus { position: relative; flex: 0 0 30px; width: 30px; height: 30px; border-radius: 8px; background: var(--blush); transition: rotate .25s ease, background .25s ease; }
.pkg-plus::before, .pkg-plus::after { content: ''; position: absolute; left: 50%; top: 50%; width: 12px; height: 2px; margin: -1px 0 0 -6px; background: var(--pink); transition: background .25s; }
.pkg-plus::after { rotate: 90deg; }
.pkg-faq-card[open] .pkg-plus { rotate: 45deg; background: var(--pink); }
.pkg-faq-card[open] .pkg-plus::before, .pkg-faq-card[open] .pkg-plus::after { background: #fff; }
.pkg-faq-a { padding: 0 20px 20px; font-size: .94rem; line-height: 1.7; color: var(--mute); animation: pkgFade .35s ease; }
@keyframes pkgFade { from { opacity: 0; translate: 0 -8px; } to { opacity: 1; translate: 0 0; } }

/* ---------- CTA (centered) ---------- */
.pkg-cta-sec { padding: 84px 0 96px; background: #fff; }
.pkg-cta-section { position: relative; overflow: hidden; padding: 64px 34px; text-align: center; color: #fff; border-radius: 28px; box-shadow: 10px 10px 0 var(--gold); background: radial-gradient(50% 80% at 50% 120%, rgba(255,181,71,.45), transparent 70%), radial-gradient(rgba(255,255,255,.2) 1px, transparent 1.2px) 0 0 / 26px 26px, linear-gradient(135deg, #A8006A 0%, #C4007A 50%, #E0398F 100%); }
.pkg-cta-section::after { content: ''; position: absolute; inset: 0; border-radius: inherit; padding: 3px; pointer-events: none; background: conic-gradient(from var(--pkga), var(--gold), #fff, var(--pink3), var(--gold)); -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0); -webkit-mask-composite: xor; mask: linear-gradient(#000 0 0) content-box exclude, linear-gradient(#000 0 0); animation: pkgAngle 6s linear infinite; }
.pkg-cta-inner { position: relative; z-index: 2; }
.pkg-cta-h2 { max-width: 800px; margin: 0 auto 16px; text-align: center; font-size: clamp(1.9rem, 3.8vw, 3rem); font-weight: 800; line-height: 1.1; color: #fff; text-shadow: 0 3px 0 rgba(126,0,78,.3); }
.pkg-cta-sub { max-width: 640px; margin: 0 auto 30px; text-align: center; line-height: 1.7; color: rgba(255,255,255,.92); }
.pkg-cta-btns { display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 14px; }
.pkg-cta-btn-1, .pkg-cta-btn-2 { position: relative; overflow: hidden; display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 14px 26px; border-radius: 12px; border: 2px solid transparent; font: 700 .95rem/1.2 'Plus Jakarta Sans', sans-serif; text-decoration: none; text-align: center; transition: translate .2s ease, box-shadow .2s ease, background .2s ease; }
.pkg-cta-btn-1 { background: #fff; color: var(--pink); box-shadow: 0 6px 0 var(--deep); }
.pkg-cta-btn-1:hover { background: var(--blush); translate: 0 2px; box-shadow: 0 4px 0 var(--deep); color: var(--pink); }
.pkg-cta-btn-2 { background: transparent; color: #fff; border-color: rgba(255,255,255,.6); }
.pkg-cta-btn-2:hover { background: rgba(255,255,255,.16); border-color: #fff; color: #fff; }
.pkg-cta-btn-1 svg, .pkg-cta-btn-2 svg { width: 16px; height: 16px; flex-shrink: 0; }

/* ---------- progress bar + motion states (desktop mouse only) ---------- */
.pkg-progress { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 4px; z-index: 9999; transform-origin: 0 50%; transform: scaleX(0); background: linear-gradient(90deg, var(--gold), var(--pink)); }
.pkg-js .pkg-progress { display: block; }
.pkg-js [data-rv], .pkg-js .pkg-hero-sec [data-hero] { opacity: 0; }

/* ---------- responsive ---------- */
@media (max-width: 991px) { .pkg-sec { padding: 70px 0; } .pkg-card.popular { order: -1; } }
@media (max-width: 575px) {
    .pkg-container { padding: 0 16px; }
    .pkg-hero-sec { padding: 52px 0 130px; }
    .pkg-main-sec { margin-top: -80px; padding-bottom: 56px; }
    .pkg-toggle-wrap { gap: 10px; padding: 10px 14px; }
    .pkg-card { padding: 26px 20px 0; box-shadow: 5px 5px 0 var(--gold); border-radius: 20px; }
    .pkg-card.popular { padding-top: 46px; }
    .pkg-perf, .pkg-stub { margin-left: -20px; margin-right: -20px; }
    .pkg-stub { padding: 12px 20px; }
    .pkg-sec { padding: 56px 0; }
    .pkg-head { margin-bottom: 32px; }
    .pkg-cta-section { padding: 44px 20px; border-radius: 20px; box-shadow: 6px 6px 0 var(--gold); }
    .pkg-cta-sec { padding: 56px 0 64px; }
    .pkg-cta-btns > a { width: 100%; }
    .pkg-aurora i { filter: blur(50px); }
    .pkg-faq-q { padding: 16px; font-size: .98rem; }
    .pkg-faq-a { padding: 0 16px 18px; }
}
@media (hover: none) {
    .pkg-card:hover, .pkg-addon:hover, .pkg-trust-card:hover { translate: none; }
    .pkg-card:hover, .pkg-card.popular:hover { box-shadow: 8px 8px 0 var(--gold); }
    .pkg-addon:hover { box-shadow: 4px 4px 0 var(--deep); }
    .pkg-trust-card:hover { box-shadow: 5px 5px 0 var(--blush); }
}
@media (prefers-reduced-motion: reduce) {
    .pkg-aurora i, .pkg-card.popular::after, .pkg-cta-section::after { animation: none; }
    .pkg-toggle-knob, .pkg-card, .pkg-faq-a { transition: none; animation: none; }
}
</style>

<main
    class="pkg-page"
    id="packagesPage"
    data-monthly-period="<?= e((string) $packagesPage['monthly_period_label']) ?>"
    data-yearly-period="<?= e((string) $packagesPage['yearly_period_label']) ?>"
>
<script>
/* hidden-start animation states only on desktop mouse devices; phones/tablets/reduced-motion get the plain page */
(function (s) {
    try {
        var desk = matchMedia('(min-width: 992px)').matches && matchMedia('(pointer: fine)').matches;
        var calm = matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (desk && !calm) s.parentElement.classList.add('pkg-js');
    } catch (e) {}
})(document.currentScript);
</script>
<div class="pkg-progress" aria-hidden="true"></div>

    <!-- ===== HERO ===== -->
    <section class="pkg-hero-sec">
        <div class="pkg-aurora" aria-hidden="true"><i></i><i></i><i></i></div>
        <div class="pkg-container">
            <div class="pkg-pill" data-hero>
                <?= pkgIcon('sparkles') ?>
                <span><?= e((string) $packagesPage['hero_badge']) ?></span>
            </div>

            <h1 class="pkg-h1">
                <?= e((string) $packagesPage['heading_prefix']) ?>
                <span class="accent">
                    <?= e((string) $packagesPage['heading_highlight']) ?>
                    <svg viewBox="0 0 300 8" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M2 4C60 1 240 1 298 4" stroke="#FFB547" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.7"/>
                    </svg>
                </span>
            </h1>

            <p class="pkg-subtitle" data-hero><?= e((string) $packagesPage['summary']) ?></p>

            <!-- ===== Billing Toggle ===== -->
            <div class="pkg-toggle-wrap" data-hero>
                <span class="pkg-toggle-label active" id="pkgLabelMonthly"><?= e((string) $packagesPage['monthly_label']) ?></span>
                <button type="button" class="pkg-toggle" id="pkgToggle" onclick="pkgToggleBilling()" aria-label="Toggle billing cycle">
                    <span class="pkg-toggle-knob"></span>
                </button>
                <span class="pkg-toggle-label inactive" id="pkgLabelYearly">
                    <?= e((string) $packagesPage['yearly_label']) ?>
                    <span class="pkg-save-badge"><?= e((string) $packagesPage['save_badge']) ?></span>
                </span>
            </div>
        </div>
    </section>

    <!-- ===== Packages Grid (event passes) ===== -->
    <section class="pkg-main-sec">
        <div class="pkg-container">
            <div class="pkg-grid">
                <?php foreach ($packages as $i => $pkg):
                    $isPopular = !empty($pkg['popular']);
                ?>
                    <div class="pkg-card <?= $isPopular ? 'popular' : '' ?>"
                         data-pkg-id="<?= htmlspecialchars($pkg['id']) ?>"
                         data-price-monthly="<?= (int) $pkg['monthly'] ?>"
                         data-price-yearly="<?= (int) $pkg['yearly'] ?>"
                         data-popular="<?= $isPopular ? '1' : '0' ?>"
                         data-rv="up" data-d="<?= min($i, 5) * 0.1 ?>">

                        <?php if ($isPopular): ?>
                            <div class="pkg-popular-badge"><?= e((string) $packagesPage['popular_badge']) ?></div>
                        <?php endif; ?>

                        <div class="pkg-card-head">
                            <div class="pkg-icon-wrap"><?= pkgIcon($pkg['icon']) ?></div>
                            <h3 class="pkg-name"><?= htmlspecialchars($pkg['name']) ?></h3>
                            <p class="pkg-desc"><?= htmlspecialchars($pkg['description']) ?></p>
                        </div>

                        <div class="pkg-perf" aria-hidden="true"></div>

                        <div class="pkg-price-wrap">
                            <span class="pkg-price" data-pkg-price>₹<?= number_format((int) $pkg['monthly']) ?></span>
                            <span class="pkg-price-label" data-pkg-label><?= e((string) $packagesPage['monthly_period_label']) ?></span>
                        </div>

                        <ul class="pkg-features">
                            <?php foreach (($pkg['features'] ?? []) as $feature): ?>
                                <li class="pkg-feature">
                                    <?= pkgIcon('check') ?>
                                    <span><?= htmlspecialchars($feature) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <a href="<?= e((string) ($pkg['buttonHref'] ?? '/contact.php')) ?>" class="pkg-cta <?= $isPopular ? 'popular' : 'regular' ?>">
                            <?= e((string) $pkg['buttonText']) ?>
                        </a>

                        <div class="pkg-stub" aria-hidden="true">
                            <span class="pkg-code">Pass &middot; <?= htmlspecialchars(strtoupper((string) $pkg['id'])) ?></span>
                            <span class="pkg-barcode"></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== Add-ons ===== -->
    <section class="pkg-sec pkg-addons-sec">
        <div class="pkg-container">
            <div class="pkg-head" data-rv="up">
                <span class="pkg-kicker">Customise your pass</span>
                <h2>
                    <?= e((string) $packagesPage['addons_heading_prefix']) ?>
                    <span class="accent"><?= e((string) $packagesPage['addons_heading_highlight']) ?></span>
                </h2>
                <p><?= e((string) $packagesPage['addons_subtitle']) ?></p>
                <i class="pkg-bar"></i>
            </div>

            <div class="pkg-addons-grid">
                <?php foreach ($addons as $i => $addon): ?>
                    <div class="pkg-addon" data-rv="up" data-d="<?= min($i, 5) * 0.06 ?>">
                        <span class="pkg-addon-name"><?= htmlspecialchars($addon['name']) ?></span>
                        <span class="pkg-addon-price"><?= htmlspecialchars($addon['price']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== Trust Badges ===== -->
    <section class="pkg-sec" style="padding-top: 56px; padding-bottom: 56px;">
        <div class="pkg-container">
            <div class="pkg-trust">
                <?php foreach ($trustBadges as $i => $badge): ?>
                    <div class="pkg-trust-card" data-rv="up" data-d="<?= min($i, 5) * 0.08 ?>">
                        <div class="pkg-trust-ico"><?= pkgIcon($badge['icon']) ?></div>
                        <div class="pkg-trust-title"><?= htmlspecialchars($badge['title']) ?></div>
                        <div class="pkg-trust-sub"><?= htmlspecialchars($badge['subtitle']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== FAQ ===== -->
    <section class="pkg-sec pkg-faq-sec">
        <div class="pkg-container">
            <div class="pkg-head" data-rv="up">
                <span class="pkg-kicker">Questions, answered</span>
                <h2>
                    <?= e((string) $packagesPage['faq_heading_prefix']) ?>
                    <span class="accent"><?= e((string) $packagesPage['faq_heading_highlight']) ?></span>
                </h2>
                <p><?= e((string) $packagesPage['faq_subtitle']) ?></p>
                <i class="pkg-bar"></i>
            </div>

            <div class="pkg-faq-grid">
                <?php foreach ($faqs as $i => $faq): ?>
                    <details class="pkg-faq-card" <?= $i === 0 ? 'open' : '' ?> data-rv="up" data-d="<?= min($i, 5) * 0.06 ?>">
                        <summary class="pkg-faq-q">
                            <span><?= htmlspecialchars($faq['question']) ?></span>
                            <i class="pkg-plus" aria-hidden="true"></i>
                        </summary>
                        <p class="pkg-faq-a"><?= htmlspecialchars($faq['answer']) ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="pkg-cta-sec">
        <div class="pkg-container">
            <div class="pkg-cta-section" data-rv="scale">
                <div class="pkg-cta-inner">
                    <h2 class="pkg-cta-h2"><?= e((string) $packagesPage['cta_title']) ?></h2>
                    <p class="pkg-cta-sub"><?= e((string) $packagesPage['cta_description']) ?></p>

                    <div class="pkg-cta-btns">
                        <a href="<?= e((string) $packagesPage['cta_primary_href']) ?>" class="pkg-cta-btn-1">
                            <span><?= e((string) $packagesPage['cta_primary_label']) ?></span>
                            <?= pkgIcon('arrow') ?>
                        </a>
                        <a href="tel:<?= e((string) $packagesPage['cta_phone']) ?>" class="pkg-cta-btn-2">
                            <?= pkgIcon('phone') ?>
                            <span><?= e((string) $packagesPage['cta_phone_label']) ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<script>
    // ===== Billing toggle (logic unchanged, price now rolls between values) =====
    let pkgBillingCycle = 'monthly';
    const pkgPage = document.getElementById('packagesPage');
    const pkgPeriodLabels = {
        monthly: pkgPage.dataset.monthlyPeriod,
        yearly: pkgPage.dataset.yearlyPeriod,
    };
    const pkgInrFormatter = new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: 'INR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    });
    const pkgCalm = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function pkgRollPrice(el, from, to) {
        if (pkgCalm || from === to) { el.textContent = pkgInrFormatter.format(to); return; }
        const t0 = performance.now(), dur = 650;
        (function tick(now) {
            const p = Math.min(1, (now - t0) / dur);
            const eased = 1 - Math.pow(1 - p, 3);
            el.textContent = pkgInrFormatter.format(Math.round(from + (to - from) * eased));
            if (p < 1) requestAnimationFrame(tick);
        })(t0);
    }

    function pkgToggleBilling() {
        pkgBillingCycle = (pkgBillingCycle === 'monthly') ? 'yearly' : 'monthly';

        const toggle = document.getElementById('pkgToggle');
        const labelMonthly = document.getElementById('pkgLabelMonthly');
        const labelYearly = document.getElementById('pkgLabelYearly');

        toggle.classList.toggle('yearly', pkgBillingCycle === 'yearly');

        if (pkgBillingCycle === 'yearly') {
            labelMonthly.classList.add('inactive');
            labelMonthly.classList.remove('active');
            labelYearly.classList.add('active');
            labelYearly.classList.remove('inactive');
        } else {
            labelMonthly.classList.add('active');
            labelMonthly.classList.remove('inactive');
            labelYearly.classList.add('inactive');
            labelYearly.classList.remove('active');
        }

        // Update all cards
        document.querySelectorAll('.pkg-card').forEach((card) => {
            const priceEl = card.querySelector('[data-pkg-price]');
            const labelEl = card.querySelector('[data-pkg-label]');
            if (!priceEl || !labelEl) return;

            const monthly = parseInt(card.dataset.priceMonthly, 10) || 0;
            const yearly = parseInt(card.dataset.priceYearly, 10) || 0;

            if (pkgBillingCycle === 'monthly') {
                pkgRollPrice(priceEl, yearly, monthly);
                labelEl.textContent = pkgPeriodLabels.monthly;
            } else {
                pkgRollPrice(priceEl, monthly, yearly);
                labelEl.textContent = pkgPeriodLabels.yearly;
            }
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/motion@11.18.2/dist/motion.js"></script>
<script>
(function () {
    var root = document.getElementById('packagesPage');
    if (!root) return;

    /* ---------- everywhere (no library): button glow + click ripple ---------- */
    root.querySelectorAll('.pkg-cta.popular, .pkg-cta-btn-1').forEach(function (b) {
        b.addEventListener('pointermove', function (e) {
            var r = b.getBoundingClientRect();
            b.style.setProperty('--bx', (e.clientX - r.left) + 'px');
            b.style.setProperty('--by', (e.clientY - r.top) + 'px');
        });
    });
    root.addEventListener('click', function (e) {
        var b = e.target.closest && e.target.closest('.pkg-cta, .pkg-cta-btn-1, .pkg-cta-btn-2');
        if (!b) return;
        var r = b.getBoundingClientRect(), d = document.createElement('i');
        d.className = 'pkg-ripple';
        d.style.left = (e.clientX - r.left) + 'px';
        d.style.top = (e.clientY - r.top) + 'px';
        b.appendChild(d);
        setTimeout(function () { d.remove(); }, 700);
    });

    /* ---------- desktop animations (Motion) ---------- */
    var M = window.Motion;
    var fallback = function () { root.classList.remove('pkg-js'); };
    if (!M || !root.classList.contains('pkg-js')) { fallback(); return; }
    try {
        var animate = M.animate, inView = M.inView, scroll = M.scroll, stagger = M.stagger;
        var spring = { type: 'spring', stiffness: 110, damping: 16 };

        var bar = root.querySelector('.pkg-progress');
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
                    w.className = 'pkg-w'; inner.textContent = part; w.appendChild(inner); frag.appendChild(w);
                });
                node.parentNode.replaceChild(frag, node);
            });
            return el.querySelectorAll('.pkg-w > span');
        };
        var h1 = root.querySelector('.pkg-h1');
        if (h1) animate(split(h1), { y: ['110%', '0%'] }, { duration: 0.85, delay: stagger(0.06, { startDelay: 0.1 }), ease: [0.22, 1, 0.36, 1] });
        animate(root.querySelectorAll('.pkg-hero-sec [data-hero]'), { opacity: [0, 1], y: [26, 0] }, { duration: 0.7, delay: stagger(0.12, { startDelay: 0.5 }), ease: 'easeOut' });

        root.querySelectorAll('.pkg-head h2').forEach(function (h) {
            var sp = split(h);
            sp.forEach(function (s) { s.style.transform = 'translateY(110%)'; });
            inView(h, function () { animate(sp, { y: ['110%', '0%'] }, { duration: 0.8, delay: stagger(0.05), ease: [0.22, 1, 0.36, 1] }); }, { amount: 0.6 });
        });

        /* reveals */
        root.querySelectorAll('[data-rv]').forEach(function (el) {
            var kind = el.getAttribute('data-rv'), d = parseFloat(el.getAttribute('data-d') || '0');
            var kf = { opacity: [0, 1] };
            if (kind === 'scale') kf.scale = [0.92, 1];
            else kf.y = [50, 0];
            inView(el, function () { animate(el, kf, Object.assign({ delay: d }, spring)); }, { amount: 0.12 });
        });

        /* stripe bars draw themselves */
        root.querySelectorAll('.pkg-bar').forEach(function (b) {
            b.style.transform = 'scaleX(0)';
            inView(b, function () { animate(b, { scaleX: [0, 1] }, { duration: 0.8, delay: 0.3, ease: [0.22, 1, 0.36, 1] }); }, { amount: 0.8 });
        });

        /* 3D tilt on the regular passes (the VIP pass stays calm) */
        root.querySelectorAll('.pkg-card:not(.popular)').forEach(function (c) {
            c.addEventListener('pointermove', function (e) {
                var r = c.getBoundingClientRect(), nx = (e.clientX - r.left) / r.width - 0.5, ny = (e.clientY - r.top) / r.height - 0.5;
                animate(c, { rotateY: nx * 6, rotateX: -ny * 6 }, { duration: 0.3 });
            });
            c.addEventListener('pointerleave', function () { animate(c, { rotateX: 0, rotateY: 0 }, { type: 'spring', stiffness: 200, damping: 15 }); });
        });

        /* magnetic pink buttons */
        root.querySelectorAll('.pkg-cta.popular, .pkg-cta-btn-1').forEach(function (b) {
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