<?php require_once __DIR__ . '/app/templates/header.php'; ?>

<?php
// ===== Data (unchanged) =====
$servicesContent = servicesPageContent();
$mainServices = $servicesContent['main_services'];
$seoServices = $servicesContent['seo_services'];
$stats = $servicesContent['stats'];
$process = $servicesContent['process'];
$resultsDriven = $servicesContent['results'];
$faqs = $servicesContent['faqs'];

// ===== Icon Helper (unchanged) =====
function spIcon(string $name): string {
    $icons = [
        'sparkles'   => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
        'arrow'      => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'send'       => '<path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/>',
        'paintbrush' => '<path d="m14.622 17.897-10.68-2.913"/><path d="M18.376 2.622a1 1 0 1 1 3.002 3.002L17.36 9.643a.5.5 0 0 0 0 .707l.944.944a2.41 2.41 0 0 1 0 3.408l-.944.944a.5.5 0 0 1-.707 0L8.354 7.348a.5.5 0 0 1 0-.707l.944-.944a2.41 2.41 0 0 1 3.408 0l.944.944a.5.5 0 0 0 .707 0z"/><path d="M9 8c-1.804 2.71-3.97 3.46-6.583 3.948a.507.507 0 0 0-.302.819l7.32 8.883a1 1 0 0 0 1.185.204C12.735 20.405 16 16.792 16 15"/>',
        'code'       => '<path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/>',
        'search'     => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
        'share'      => '<path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/>',
        'megaphone'  => '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>',
        'smartphone' => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/>',
        'mappin'     => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'globe'      => '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
        'earth'      => '<path d="M21.54 15H17a2 2 0 0 0-2 2v4.54"/><path d="M7 3.34V5a3 3 0 0 0 3 3a2 2 0 0 1 2 2c0 1.1.9 2 2 2a2 2 0 0 0 2-2c0-1.1.9-2 2-2h3.17"/><path d="M11 21.95V18a2 2 0 0 0-2-2a2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05"/><circle cx="12" cy="12" r="10"/>',
        'chart'      => '<path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/>',
        'check'      => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
        'rocket'     => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
        'award'      => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'trending'   => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'plus'       => '<path d="M5 12h14"/><path d="M12 5v14"/>',
        'minus'      => '<path d="M5 12h14"/>',
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
   SERVICES PAGE — "Expo Floor" design
   Magenta (#C4007A) + Gold (#FFB547) + Deep (#7E004E)
   Matches B2B Exhibition SEO / SEO Delhi / Contact / Blog Post.
   ============================================================ */
.sp-page {
    --pink:#C4007A; --pink2:#E0398F; --pink3:#FF7BC0;
    --deep:#7E004E; --head:#5E0B45;
    --blush:#FBEAF3; --soft:#FFF4FA; --gold:#FFB547; --mint:#0E9F6E;
    --text:#4A3342; --mute:#7A6574; --line:rgba(126,0,78,.14);

    /* Legacy aliases — magenta system me remap */
    --ink:var(--deep); --ink2:#5C0038; --mist:var(--soft);

    --disp:'Bricolage Grotesque','Plus Jakarta Sans',system-ui,sans-serif;
    position:relative; width:100%; overflow-x:clip; background:#fff; color:var(--text);
    font-family:'Plus Jakarta Sans',system-ui,-apple-system,sans-serif;
}
.sp-page *, .sp-page *::before, .sp-page *::after { box-sizing:border-box; }
.sp-page h1, .sp-page h2, .sp-page h3, .sp-page h4 { margin:0; font-family:var(--disp); letter-spacing:-.02em; }
.sp-page p { margin:0; }
.sp-page :is(a, button, input, textarea, summary):focus-visible { outline:3px solid var(--gold); outline-offset:3px; }
.sp-page ::selection { background:var(--pink); color:#fff; }
.sp-page h1, .sp-page h2, .sp-page h3, .sp-page h4, .sp-page p { overflow-wrap:anywhere; }
.sp-container { position:relative; z-index:2; width:100%; max-width:1200px; margin:0 auto; padding:0 22px; }
.sp-sec { position:relative; padding:88px 0; }
.sp-grid-fix > * { min-width:0; }

/* ---------- buttons ---------- */
.sp-btn {
    position:relative; overflow:hidden;
    display:inline-flex; align-items:center; justify-content:center; gap:10px;
    padding:14px 26px; border-radius:12px; border:2px solid transparent;
    font:700 .95rem/1.2 'Plus Jakarta Sans', sans-serif;
    text-decoration:none; text-align:center; cursor:pointer;
    transition:translate .2s ease, box-shadow .2s ease, background .2s ease;
}
.sp-btn svg { width:16px; height:16px; flex-shrink:0; transition:translate .2s ease; }
.sp-btn:hover svg { translate:4px 0; }
.sp-btn--pink {
    background:radial-gradient(150px circle at var(--bx,50%) var(--by,50%), var(--pink2) 0, var(--pink) 72%);
    color:#fff !important; box-shadow:0 6px 0 var(--deep);
}
.sp-btn--pink:hover { translate:0 2px; box-shadow:0 4px 0 var(--deep); }
.sp-btn--pink:active { translate:0 6px; box-shadow:0 0 0 var(--deep); }
.sp-btn--ghost { background:transparent; color:#fff !important; border-color:rgba(255,255,255,.5); }
.sp-btn--ghost:hover { background:rgba(255,255,255,.12); border-color:#fff; }
.sp-btn--line { background:#fff; color:var(--pink) !important; border-color:var(--deep); box-shadow:0 4px 0 var(--deep); }
.sp-btn--line:hover { background:var(--blush); translate:0 2px; box-shadow:0 2px 0 var(--deep); }
.sp-ripple { position:absolute; width:12px; height:12px; margin:-6px 0 0 -6px; border-radius:50%; background:currentColor; opacity:.3; pointer-events:none; animation:spRipple .65s ease-out forwards; }
@keyframes spRipple { to { transform:scale(22); opacity:0; } }
.sp-or-badge {
    display:grid; place-items:center; flex:0 0 34px; width:34px; height:34px;
    border-radius:50%; background:var(--gold); color:var(--deep);
    border:2px solid var(--deep); font-size:.72rem; font-weight:800;
    box-shadow:2px 2px 0 var(--deep);
}

/* ---------- section heads ---------- */
.sp-head { max-width:720px; margin:0 auto 46px; text-align:center; }
.sp-kicker, .sp-pill {
    display:inline-flex; align-items:center; gap:8px;
    margin-bottom:14px; padding:6px 13px; border-radius:8px;
    background:var(--deep); color:var(--gold);
    font-size:.76rem; font-weight:800; letter-spacing:.12em; text-transform:uppercase;
}
.sp-pill svg { width:14px; height:14px; }
.sp-block-title { font-size:clamp(1.9rem,3.6vw,2.8rem); font-weight:800; line-height:1.1; color:var(--head); }
.sp-block-title .accent { position:relative; display:inline-block; color:var(--pink); }
.sp-block-sub { margin-top:14px; font-size:1.02rem; line-height:1.65; color:var(--mute); }
.sp-bar {
    display:block; width:84px; height:7px; margin:16px auto 0;
    background:repeating-linear-gradient(90deg, var(--pink) 0 12px, var(--gold) 12px 24px);
}
.sp-w { display:inline-block; overflow:hidden; vertical-align:top; padding-bottom:.12em; margin-bottom:-.12em; }
.sp-w > span { display:inline-block; }

/* ---------- hero (magenta expo hall) ---------- */
.sp-hero {
    position:relative; padding:72px 0 84px; color:#fff;
    background:
        radial-gradient(60% 70% at 88% 0%, rgba(255,181,71,.38), transparent 65%),
        radial-gradient(50% 60% at 0% 100%, rgba(255,255,255,.18), transparent 70%),
        linear-gradient(135deg, #A8006A 0%, #C4007A 45%, #E0398F 100%);
}
.sp-hero::before {
    content:''; position:absolute; inset:0; pointer-events:none;
    background-image:radial-gradient(rgba(255,255,255,.15) 1px, transparent 1.2px);
    background-size:26px 26px;
    -webkit-mask-image:linear-gradient(180deg,#000 30%,transparent 95%);
    mask-image:linear-gradient(180deg,#000 30%,transparent 95%);
}
.sp-aurora { position:absolute; inset:0; overflow:hidden; pointer-events:none; }
.sp-aurora i { position:absolute; border-radius:50%; filter:blur(80px); opacity:.5; animation:spDrift 14s ease-in-out infinite alternate; }
.sp-aurora i:nth-child(1) { width:420px; height:420px; left:-8%; top:4%; background:var(--pink3); }
.sp-aurora i:nth-child(2) { width:340px; height:340px; right:10%; bottom:-12%; background:var(--gold); opacity:.26; animation-duration:18s; }
.sp-aurora i:nth-child(3) { width:300px; height:300px; left:40%; top:-14%; background:var(--pink3); opacity:.3; animation-duration:22s; }
@keyframes spDrift { to { transform:translate(60px,40px) scale(1.2); } }
.sp-hero-grid { display:grid; grid-template-columns:minmax(0,1fr); gap:48px; align-items:center; }
@media (min-width:1024px) { .sp-hero-grid { grid-template-columns:1.1fr .9fr; gap:64px; } }
.sp-hero .sp-pill {
    background:rgba(255,255,255,.18); border:1px solid rgba(255,255,255,.45);
    color:#fff; -webkit-backdrop-filter:blur(10px); backdrop-filter:blur(10px);
    border-radius:999px; padding:7px 15px 7px 11px;
}
.sp-hero .sp-pill svg { color:var(--gold); }
.sp-hero-h1 {
    font-size:clamp(2.2rem,5vw,3.9rem); font-weight:800; line-height:1.06;
    letter-spacing:-.035em; color:#fff; margin-bottom:20px;
    text-shadow:0 3px 0 rgba(126,0,78,.35);
}
.sp-hero-h1 .accent { color:var(--gold); }
.sp-hero-sub { max-width:580px; margin-bottom:30px; font-size:clamp(1rem,1.5vw,1.12rem); line-height:1.7; color:rgba(255,255,255,.88); }
.sp-hero-btns { display:flex; flex-wrap:wrap; align-items:center; gap:12px 14px; }

/* Quote form = visitor badge */
.sp-quote-card {
    position:relative; padding:32px 28px; background:#fff; color:var(--text);
    border:2px solid var(--deep); border-radius:24px;
    box-shadow:10px 10px 0 var(--deep);
}
.sp-quote-card h2 { margin-bottom:20px; font-size:1.55rem; font-weight:800; color:var(--head); }
.sp-quote-form { display:flex; flex-direction:column; gap:14px; }
.sp-quote-input, .sp-quote-textarea {
    width:100%; min-width:0; padding:13px 15px;
    border:2px solid #E4DCE6; border-radius:12px;
    background:#FCFAFD; color:var(--head);
    font:500 .94rem 'Plus Jakarta Sans', sans-serif;
    transition:border-color .2s, box-shadow .2s;
}
.sp-quote-textarea { resize:none; }
.sp-quote-input::placeholder, .sp-quote-textarea::placeholder { color:#9A93A3; }
.sp-quote-input:focus, .sp-quote-textarea:focus {
    outline:none; border-color:var(--pink); background:#fff;
    box-shadow:0 0 0 4px rgba(196,0,122,.14);
}
.sp-recaptcha {
    display:flex; align-items:center; justify-content:space-between; gap:10px;
    padding:12px 15px;
    border:2px dashed rgba(126,0,78,.4); border-radius:12px;
    background:var(--blush); cursor:pointer; user-select:none;
}
.sp-recaptcha-left { display:flex; align-items:center; gap:10px; }
.sp-recaptcha input[type="checkbox"] { width:18px; height:18px; accent-color:var(--pink); cursor:pointer; flex-shrink:0; }
.sp-recaptcha-left span { font-size:.84rem; font-weight:600; color:var(--head); }
.sp-recaptcha-brand { font-size:.66rem; font-weight:700; color:#9A93A3; }
.sp-submit { width:100%; margin-top:4px; }

/* ---------- intro ---------- */
.sp-intro { background:#fff; }
.sp-intro-inner { max-width:860px; margin:0 auto; text-align:center; }
.sp-intro-body { display:flex; flex-direction:column; gap:18px; margin-top:8px; }
.sp-intro-body p { font-size:1.04rem; line-height:1.8; color:var(--mute); }

/* ---------- website CTA ---------- */
.sp-website-cta { background:var(--soft); background-image:radial-gradient(rgba(126,0,78,.07) 1px, transparent 1.2px); background-size:24px 24px; }
.sp-website-grid { display:grid; grid-template-columns:minmax(0,1fr); gap:48px; align-items:center; }
@media (min-width:992px) { .sp-website-grid { grid-template-columns:repeat(2,minmax(0,1fr)); gap:72px; } }
.sp-website-pre { margin-bottom:8px; font-size:1.1rem; font-weight:700; color:var(--mute); }
.sp-website-h2 { margin-bottom:18px; font-size:clamp(1.9rem,3.6vw,2.8rem); font-weight:800; line-height:1.1; color:var(--pink); }
.sp-website-sub { max-width:520px; margin-bottom:28px; line-height:1.75; color:var(--mute); }
.sp-website-btns { display:flex; flex-wrap:wrap; align-items:center; gap:12px 14px; }
.sp-website-btns .sp-btn--ghost { color:var(--head) !important; border-color:var(--deep); background:#fff; box-shadow:0 4px 0 var(--deep); }
.sp-website-btns .sp-btn--ghost:hover { background:var(--gold); translate:0 2px; box-shadow:0 2px 0 var(--deep); }
.sp-website-image { position:relative; perspective:1200px; }
.sp-website-image::before {
    content:''; position:absolute; inset:8% 4% -4%; z-index:0;
    border-radius:40px; filter:blur(48px); opacity:.5;
    background:conic-gradient(from 0deg, var(--pink), var(--gold), var(--pink2), var(--pink));
    animation:spSpin 16s linear infinite;
}
@keyframes spSpin { to { rotate:360deg; } }
.sp-shot {
    position:relative; z-index:1; padding:14px; max-width:480px; margin:0 auto;
    background:#fff; border:2px solid var(--deep); border-radius:22px;
    box-shadow:12px 12px 0 var(--gold);
    rotate:2deg; transition:rotate .4s ease;
}
.sp-shot:hover { rotate:0deg; }
.sp-shot img { display:block; width:100%; height:auto; border-radius:12px; object-fit:contain; }

/* ---------- stats (dark magenta strip) ---------- */
.sp-stats-sec {
    padding:72px 0;
    background:
        radial-gradient(50% 60% at 92% 0%, rgba(255,181,71,.25), transparent 70%),
        linear-gradient(160deg, var(--deep) 0%, #A8006A 100%);
}
.sp-stats { display:grid; grid-template-columns:repeat(auto-fit, minmax(min(100%,150px),1fr)); gap:18px; }
.sp-stat {
    padding:24px 14px; text-align:center; color:#fff;
    border:2px solid rgba(255,255,255,.22); border-radius:18px;
    background:rgba(255,255,255,.08);
    -webkit-backdrop-filter:blur(6px); backdrop-filter:blur(6px);
    box-shadow:6px 6px 0 var(--gold);
    transition:translate .25s ease, box-shadow .25s ease;
}
.sp-stat:hover { translate:-4px -4px; box-shadow:10px 10px 0 var(--pink); }
.sp-stat-ico {
    display:grid; place-items:center; width:46px; height:46px; margin:0 auto 12px;
    border-radius:12px; background:var(--gold); color:var(--deep);
    border:2px solid var(--deep); box-shadow:3px 3px 0 var(--deep);
}
.sp-stat-ico svg { width:22px; height:22px; }
.sp-stat-value { font-family:var(--disp); font-size:clamp(1.8rem,3.2vw,2.5rem); font-weight:800; line-height:1.05; color:var(--gold); }
.sp-stat-label { margin-top:6px; font-size:.88rem; font-weight:700; color:rgba(255,255,255,.88); }

/* ---------- core services (stalls) ---------- */
.sp-services-grid { display:grid; grid-template-columns:repeat(auto-fit, minmax(min(100%,300px),1fr)); gap:24px; perspective:1200px; }
.sp-service-card {
    position:relative; display:flex; flex-direction:column; overflow:hidden;
    padding:54px 24px 24px; background:#fff;
    border:2px solid var(--deep); border-radius:18px;
    box-shadow:6px 6px 0 var(--gold);
    transition:translate .25s ease, box-shadow .25s ease;
}
.sp-service-card::before {
    content:''; position:absolute; top:0; left:0; right:0; height:28px;
    border-bottom:2px solid var(--deep);
    background:repeating-linear-gradient(90deg, var(--pink) 0 22px, #fff 22px 44px);
}
.sp-service-card:nth-child(even)::before { background:repeating-linear-gradient(90deg, var(--gold) 0 22px, #fff 22px 44px); }
.sp-service-card:hover { translate:-4px -4px; box-shadow:10px 10px 0 var(--pink); }
.sp-service-icon {
    display:grid; place-items:center; width:56px; height:56px; margin-bottom:16px;
    border-radius:14px; background:var(--blush); color:var(--pink);
    border:2px solid var(--deep); box-shadow:3px 3px 0 var(--gold);
    transition:rotate .3s ease, scale .3s ease;
}
.sp-service-card:hover .sp-service-icon { rotate:-8deg; scale:1.08; }
.sp-service-icon svg { width:26px; height:26px; }
.sp-service-title { margin-bottom:8px; font-size:1.25rem; font-weight:800; color:var(--head); }
.sp-service-desc { margin-bottom:16px; font-size:.93rem; line-height:1.65; color:var(--mute); }
.sp-service-tags { display:flex; flex-wrap:wrap; gap:8px; margin-bottom:18px; }
.sp-service-tag { padding:5px 12px; border-radius:999px; background:var(--blush); color:var(--pink); font-size:.76rem; font-weight:700; }
.sp-service-link { display:inline-flex; align-items:center; gap:6px; margin-top:auto; color:var(--pink); font-size:.92rem; font-weight:800; text-decoration:none; transition:gap .25s ease; }
.sp-service-link:hover { gap:11px; color:var(--pink); }
.sp-service-link svg { width:16px; height:16px; }

/* ---------- SEO services ---------- */
.sp-seo-sec { background:var(--blush); }
.sp-seo-grid { display:grid; grid-template-columns:repeat(auto-fit, minmax(min(100%,260px),1fr)); gap:22px; }
.sp-seo-card {
    display:flex; flex-direction:column; padding:26px 24px;
    background:#fff; border:2px solid var(--deep); border-radius:18px;
    box-shadow:5px 5px 0 var(--gold);
    transition:translate .25s ease, box-shadow .25s ease;
}
.sp-seo-card:hover { translate:-3px -3px; box-shadow:9px 9px 0 var(--pink); }
.sp-seo-icon {
    display:grid; place-items:center; width:52px; height:52px; margin-bottom:14px;
    border-radius:50%; background:var(--deep); color:var(--gold);
    border:2px solid var(--deep); box-shadow:3px 3px 0 var(--gold);
    transition:rotate .3s ease;
}
.sp-seo-card:hover .sp-seo-icon { rotate:-10deg; }
.sp-seo-icon svg { width:24px; height:24px; }
.sp-seo-title { margin-bottom:8px; font-size:1.15rem; font-weight:800; color:var(--head); }
.sp-seo-desc { margin-bottom:14px; font-size:.92rem; line-height:1.65; color:var(--mute); }
.sp-seo-benefits { display:flex; flex-wrap:wrap; gap:8px 12px; margin-bottom:18px; }
.sp-seo-benefit { display:inline-flex; align-items:center; gap:5px; font-size:.78rem; font-weight:600; color:var(--text); }
.sp-seo-benefit svg { width:14px; height:14px; color:var(--mint); }
.sp-seo-link { display:inline-flex; align-items:center; gap:6px; margin-top:auto; color:var(--pink); font-size:.9rem; font-weight:800; text-decoration:none; transition:gap .25s ease; }
.sp-seo-link:hover { gap:11px; color:var(--pink); }
.sp-seo-link svg { width:16px; height:16px; }
.sp-seo-cta { display:flex; flex-wrap:wrap; justify-content:center; gap:14px; margin-top:36px; }

/* ---------- B2B spotlight ---------- */
@property --spa { syntax:'<angle>'; initial-value:0deg; inherits:false; }
@keyframes spAngle { to { --spa:360deg; } }
.sp-spot-sec { padding:0 0 88px; }
.sp-spot {
    position:relative; overflow:hidden;
    padding:52px 34px; text-align:center; color:#fff; border-radius:28px;
    background:
        radial-gradient(50% 80% at 50% 120%, rgba(255,181,71,.45), transparent 70%),
        radial-gradient(rgba(255,255,255,.18) 1px, transparent 1.2px) 0 0/26px 26px,
        linear-gradient(135deg, #A8006A 0%, #C4007A 50%, #E0398F 100%);
}
.sp-spot::after {
    content:''; position:absolute; inset:0; border-radius:inherit; padding:3px; pointer-events:none;
    background:conic-gradient(from var(--spa), var(--gold), #fff, var(--pink3), var(--gold));
    -webkit-mask:linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
    -webkit-mask-composite:xor;
    mask:linear-gradient(#000 0 0) content-box exclude, linear-gradient(#000 0 0);
    animation:spAngle 6s linear infinite;
}
.sp-spot-in { position:relative; z-index:2; }
.sp-spot .sp-pill { background:var(--gold); color:var(--deep); border-radius:999px; }
.sp-spot h3 { max-width:880px; margin:0 auto 14px; font-size:clamp(1.9rem,3.8vw,3rem); font-weight:800; line-height:1.1; color:#fff; text-shadow:0 3px 0 rgba(126,0,78,.3); }
.sp-spot h3 span { color:var(--gold); }
.sp-spot h4 { max-width:760px; margin:0 auto 14px; font-size:clamp(1.05rem,1.8vw,1.3rem); font-weight:700; line-height:1.4; color:#FFD7EB; }
.sp-spot p { max-width:800px; margin:0 auto 12px; font-size:.98rem; line-height:1.7; color:rgba(255,255,255,.88); }
.sp-spot p strong { color:#fff; }
.sp-spot .sp-note { font-size:.8rem; color:rgba(255,255,255,.6); }
.sp-chips { display:flex; flex-wrap:wrap; justify-content:center; gap:10px; margin:24px 0 28px; }
.sp-chip {
    padding:8px 16px;
    border:2px solid var(--deep); border-radius:999px;
    background:var(--gold); color:var(--deep);
    font-size:.8rem; font-weight:800;
    box-shadow:3px 3px 0 var(--deep);
}
.sp-chip:nth-child(even) { background:#fff; }
.sp-spot-btns { display:flex; flex-wrap:wrap; justify-content:center; gap:14px; margin-bottom:20px; }

/* ---------- results ---------- */
.sp-results-sec { background:#fff; padding-top:0; }
.sp-results-section {
    padding:44px 40px; background:#fff;
    border:2px solid var(--deep); border-radius:26px;
    box-shadow:10px 10px 0 var(--gold);
}
.sp-results-h2 { margin-bottom:34px; font-size:clamp(1.7rem,3.2vw,2.4rem); font-weight:800; line-height:1.12; color:var(--head); }
.sp-results-h2 .accent { color:var(--pink); }
.sp-results-list { display:grid; grid-template-columns:minmax(0,1fr); gap:22px 36px; }
@media (min-width:900px) { .sp-results-list { grid-template-columns:repeat(2,minmax(0,1fr)); } }
.sp-result-item { display:flex; align-items:flex-start; gap:14px; }
.sp-result-check {
    display:grid; place-items:center; flex:0 0 30px; width:30px; height:30px; margin-top:1px;
    border-radius:9px; background:var(--mint); color:#fff;
    border:2px solid var(--deep); box-shadow:2px 2px 0 var(--deep);
}
.sp-result-check svg { width:16px; height:16px; }
.sp-result-text { font-size:.95rem; line-height:1.7; color:var(--mute); }
.sp-result-text .bold { display:block; margin-bottom:2px; font-family:var(--disp); font-size:1.05rem; font-weight:800; color:var(--head); }

/* ---------- process (dark magenta) ---------- */
.sp-process-sec {
    background:
        radial-gradient(50% 60% at 92% 0%, rgba(255,181,71,.25), transparent 70%),
        linear-gradient(160deg, var(--deep) 0%, #A8006A 100%);
}
.sp-process-sec .sp-block-title { color:#fff; }
.sp-process-sec .sp-block-title .accent { color:var(--gold); }
.sp-process-sec .sp-block-sub { color:rgba(255,255,255,.8); }
.sp-process-grid { display:grid; grid-template-columns:repeat(auto-fit, minmax(min(100%,250px),1fr)); gap:22px; }
.sp-process-card {
    position:relative; overflow:hidden; padding:28px 24px;
    border:2px solid rgba(255,255,255,.22); border-radius:20px;
    background:rgba(255,255,255,.08);
    -webkit-backdrop-filter:blur(6px); backdrop-filter:blur(6px);
    box-shadow:7px 7px 0 var(--gold);
    transition:translate .25s ease, box-shadow .25s ease;
}
.sp-process-card:hover { translate:-4px -4px; box-shadow:11px 11px 0 var(--pink); }
.sp-process-num {
    margin-bottom:14px; font:800 3.4rem/1 var(--disp);
    letter-spacing:-.04em; color:transparent;
    -webkit-text-stroke:2px var(--gold);
}
.sp-process-title { margin-bottom:8px; font-size:1.2rem; font-weight:800; color:#fff; }
.sp-process-desc { font-size:.92rem; line-height:1.7; color:rgba(255,255,255,.8); }

/* ---------- FAQ ---------- */
.sp-faq-sec { background:var(--blush); }
.sp-faq-wrap { max-width:800px; margin:0 auto; display:flex; flex-direction:column; gap:14px; }
.sp-faq {
    overflow:hidden; background:#fff;
    border:2px solid var(--deep); border-radius:16px;
    box-shadow:4px 4px 0 var(--gold);
    transition:box-shadow .25s ease;
}
.sp-faq.active { box-shadow:6px 6px 0 var(--pink); }
.sp-faq-btn {
    display:flex; align-items:center; justify-content:space-between; gap:16px;
    width:100%; padding:18px 20px; border:0; background:#fff; color:var(--head);
    text-align:left; cursor:pointer; font-family:inherit;
    transition:background .25s ease, color .25s ease;
}
.sp-faq-btn:hover { background:var(--blush); }
.sp-faq.active .sp-faq-btn { background:var(--deep); color:#fff; }
.sp-faq-q { font-family:var(--disp); font-size:1.04rem; font-weight:800; line-height:1.3; }
.sp-faq-icon {
    display:grid; place-items:center; flex:0 0 30px; width:30px; height:30px;
    border-radius:8px; background:var(--blush); color:var(--pink);
    border:2px solid var(--deep);
    transition:background .25s ease, color .25s ease, transform .25s ease;
}
.sp-faq.active .sp-faq-icon { background:var(--gold); color:var(--deep); transform:rotate(45deg); }
.sp-faq-icon svg { width:15px; height:15px; }
.sp-faq-body {
    display:none; padding:18px 20px 22px;
    border-top:2px solid var(--deep);
    font-size:.95rem; line-height:1.75; color:var(--mute);
}
.sp-faq.active .sp-faq-body { display:block; animation:spFade .35s ease; }
@keyframes spFade { from { opacity:0; translate:0 -8px; } to { opacity:1; translate:0 0; } }

/* ---------- CTA rocket ---------- */
.sp-cta-sec { padding:88px 0 96px; background:#fff; }
.sp-cta-rocket {
    position:relative; overflow:hidden;
    padding:64px 34px; text-align:center; color:#fff; border-radius:28px;
    background:
        radial-gradient(50% 80% at 50% 120%, rgba(255,181,71,.45), transparent 70%),
        radial-gradient(rgba(255,255,255,.18) 1px, transparent 1.2px) 0 0/26px 26px,
        linear-gradient(135deg, #A8006A 0%, #C4007A 50%, #E0398F 100%);
}
.sp-cta-rocket::after {
    content:''; position:absolute; inset:0; border-radius:inherit; padding:3px; pointer-events:none;
    background:conic-gradient(from var(--spa), var(--gold), #fff, var(--pink3), var(--gold));
    -webkit-mask:linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
    -webkit-mask-composite:xor;
    mask:linear-gradient(#000 0 0) content-box exclude, linear-gradient(#000 0 0);
    animation:spAngle 6s linear infinite;
}
.sp-cta-rocket-inner { position:relative; z-index:2; }
.sp-cta-ico {
    display:grid; place-items:center; width:68px; height:68px; margin:0 auto 20px;
    border-radius:18px; background:var(--gold); color:var(--deep);
    border:2px solid var(--deep); box-shadow:5px 5px 0 var(--deep);
    animation:spFloat 3.4s ease-in-out infinite alternate;
}
.sp-cta-ico svg { width:32px; height:32px; }
@keyframes spFloat { from { translate:0 0; rotate:-4deg; } to { translate:0 -8px; rotate:4deg; } }
.sp-cta-rocket h2 { max-width:800px; margin:0 auto 16px; font-size:clamp(1.9rem,3.8vw,3rem); font-weight:800; line-height:1.1; color:#fff; text-shadow:0 3px 0 rgba(126,0,78,.3); }
.sp-cta-rocket p { max-width:640px; margin:0 auto 30px; line-height:1.7; color:rgba(255,255,255,.9); }
.sp-cta-rocket-btns { display:flex; flex-wrap:wrap; justify-content:center; gap:14px; }

/* ---------- proposal (dark form on deep magenta) ---------- */
.sp-proposal {
    position:relative; padding:88px 0; color:#fff;
    background:
        radial-gradient(50% 70% at 0% 0%, rgba(255,181,71,.22), transparent 70%),
        radial-gradient(40% 50% at 100% 100%, rgba(255,255,255,.14), transparent 70%),
        linear-gradient(160deg, #5C0038 0%, var(--deep) 100%);
}
.sp-proposal::before {
    content:''; position:absolute; inset:0; pointer-events:none;
    background-image:radial-gradient(rgba(255,255,255,.1) 1px, transparent 1.2px);
    background-size:26px 26px;
}
.sp-proposal-grid { position:relative; z-index:2; display:grid; grid-template-columns:minmax(0,1fr); gap:40px; align-items:center; }
@media (min-width:1024px) { .sp-proposal-grid { grid-template-columns:.85fr 1.15fr; gap:64px; } }
.sp-proposal-pre { margin-bottom:8px; font-size:1rem; font-weight:700; color:var(--gold); }
.sp-proposal-h2 { font-size:clamp(1.9rem,3.8vw,3rem); font-weight:800; line-height:1.1; color:#fff; }
.sp-proposal-h2 .accent { color:var(--gold); }
.sp-proposal-form {
    display:grid; grid-template-columns:minmax(0,1fr); gap:14px;
    padding:28px 24px;
    border:2px solid rgba(255,255,255,.22); border-radius:22px;
    background:rgba(255,255,255,.08);
    -webkit-backdrop-filter:blur(8px); backdrop-filter:blur(8px);
    box-shadow:8px 8px 0 var(--gold);
}
@media (min-width:640px) {
    .sp-proposal-form { grid-template-columns:repeat(2,minmax(0,1fr)); }
    .sp-proposal-textarea, .sp-proposal-recaptcha, .sp-proposal-submit { grid-column:1 / -1; }
}
.sp-proposal-input, .sp-proposal-textarea {
    width:100%; min-width:0; padding:13px 15px;
    border:2px solid rgba(255,255,255,.22); border-radius:12px;
    background:rgba(255,255,255,.08); color:#fff;
    font:500 .94rem 'Plus Jakarta Sans', sans-serif;
    transition:border-color .2s, box-shadow .2s;
}
.sp-proposal-textarea { resize:none; min-height:90px; }
.sp-proposal-input::placeholder, .sp-proposal-textarea::placeholder { color:rgba(255,255,255,.55); }
.sp-proposal-input:focus, .sp-proposal-textarea:focus {
    outline:none; border-color:var(--gold);
    box-shadow:0 0 0 4px rgba(255,181,71,.2);
}
.sp-proposal-recaptcha { display:flex; align-items:center; gap:10px; cursor:pointer; user-select:none; }
.sp-proposal-recaptcha input[type="checkbox"] { width:18px; height:18px; accent-color:var(--gold); cursor:pointer; flex-shrink:0; }
.sp-proposal-recaptcha span { font-size:.84rem; color:rgba(255,255,255,.85); }
.sp-proposal-recaptcha .brand { margin-left:auto; font-size:.66rem; font-weight:700; color:rgba(255,255,255,.5); }
.sp-proposal-submit { width:100%; }

/* ---------- progress bar + motion states ---------- */
.sp-progress {
    display:none; position:fixed; top:0; left:0; width:100%; height:4px; z-index:9999;
    transform-origin:0 50%; transform:scaleX(0);
    background:linear-gradient(90deg, var(--gold), var(--pink));
}
.sp-js .sp-progress { display:block; }
.sp-js [data-rv], .sp-js .sp-hero [data-hero] { opacity:0; }

/* ---------- responsive ---------- */
@media (max-width:991px) { .sp-sec { padding:70px 0; } .sp-hero { padding:60px 0 70px; } .sp-shot { rotate:0deg; box-shadow:8px 8px 0 var(--gold); } }
@media (max-width:575px) {
    .sp-container { padding:0 16px; }
    .sp-sec, .sp-proposal { padding:56px 0; }
    .sp-hero { padding:48px 0 56px; }
    .sp-head { margin-bottom:32px; }
    .sp-hero-btns .sp-btn, .sp-website-btns .sp-btn, .sp-seo-cta .sp-btn, .sp-spot-btns .sp-btn, .sp-cta-rocket-btns .sp-btn { width:100%; }
    .sp-btn { min-height:48px; }
    .sp-quote-card { padding:24px 18px; box-shadow:6px 6px 0 var(--deep); border-radius:20px; }
    .sp-service-card { box-shadow:4px 4px 0 var(--gold); }
    .sp-process-card { box-shadow:4px 4px 0 var(--gold); }
    .sp-spot { padding:40px 18px; border-radius:20px; }
    .sp-spot-sec { padding-bottom:56px; }
    .sp-results-section { padding:28px 18px; box-shadow:6px 6px 0 var(--gold); border-radius:20px; }
    .sp-cta-rocket { padding:44px 20px; border-radius:20px; }
    .sp-cta-sec { padding:56px 0 64px; }
    .sp-proposal-form { padding:22px 16px; box-shadow:5px 5px 0 var(--gold); }
    .sp-faq-btn { padding:16px; }
    .sp-faq-q { font-size:.98rem; }
    .sp-faq-body { padding:16px 16px 20px; }
    .sp-aurora i { filter:blur(50px); }
    .sp-stats-sec { padding:56px 0; }
    .sp-quote-input, .sp-quote-textarea, .sp-proposal-input, .sp-proposal-textarea { font-size:16px; }
}
@media (hover:none) {
    .sp-stat:hover, .sp-service-card:hover, .sp-seo-card:hover, .sp-process-card:hover, .sp-btn--pink:hover { translate:none; }
    .sp-stat:hover { box-shadow:6px 6px 0 var(--gold); }
    .sp-service-card:hover { box-shadow:6px 6px 0 var(--gold); }
    .sp-seo-card:hover { box-shadow:5px 5px 0 var(--gold); }
    .sp-process-card:hover { box-shadow:7px 7px 0 var(--gold); }
}
@media (prefers-reduced-motion:reduce) {
    .sp-aurora i, .sp-website-image::before, .sp-spot::after, .sp-cta-rocket::after, .sp-cta-ico { animation:none; }
    .sp-faq.active .sp-faq-body { animation:none; }
}
</style>

<main class="sp-page" id="servicesPage">
<script>
/* hidden-start animation states only on desktop mouse devices */
(function (s) {
    try {
        var desk = matchMedia('(min-width: 992px)').matches && matchMedia('(pointer: fine)').matches;
        var calm = matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (desk && !calm) s.parentElement.classList.add('sp-js');
    } catch (e) {}
})(document.currentScript);
</script>
<div class="sp-progress" aria-hidden="true"></div>

    <!-- ===== HERO + QUOTE FORM ===== -->
    <section class="sp-hero">
        <div class="sp-aurora" aria-hidden="true"><i></i><i></i><i></i></div>
        <div class="sp-container">
            <div class="sp-hero-grid">
                <div class="sp-hero-left">
                    <div class="sp-pill" data-hero>
                        <?= spIcon('sparkles') ?>
                        <span><?= e((string) $servicesContent['hero_badge']) ?></span>
                    </div>

                    <h1 class="sp-hero-h1">
                        <?= e((string) $servicesContent['hero_heading_prefix']) ?>
                        <span class="accent"><?= e((string) $servicesContent['hero_heading_highlight']) ?></span>
                    </h1>

                    <p class="sp-hero-sub" data-hero><?= e((string) $servicesContent['summary']) ?></p>

                    <div class="sp-hero-btns" data-hero>
                        <a href="<?= e((string) $servicesContent['hero_primary_href']) ?>" class="sp-btn sp-btn--pink">
                            <span><?= e((string) $servicesContent['hero_primary_label']) ?></span>
                            <?= spIcon('arrow') ?>
                        </a>
                        <span class="sp-or-badge"><?= e((string) $servicesContent['button_separator_label']) ?></span>
                        <a href="tel:<?= e((string) $servicesContent['hero_phone']) ?>" class="sp-btn sp-btn--ghost">
                            <?= spIcon('phone') ?>
                            <span><?= e((string) $servicesContent['hero_phone_label']) ?></span>
                        </a>
                    </div>
                </div>

                <div class="sp-quote-card" data-hero>
                    <h2><?= e((string) $servicesContent['quote_title']) ?></h2>
                    <form class="sp-quote-form" method="POST" action="/contact.php">
                        <input type="text" name="name" placeholder="<?= e((string) $servicesContent['quote_name_placeholder']) ?>" class="sp-quote-input" required>
                        <input type="tel" name="phone" placeholder="<?= e((string) $servicesContent['quote_phone_placeholder']) ?>" class="sp-quote-input" required>
                        <input type="email" name="email" placeholder="<?= e((string) $servicesContent['quote_email_placeholder']) ?>" class="sp-quote-input" required>
                        <textarea name="message" placeholder="<?= e((string) $servicesContent['quote_message_placeholder']) ?>" rows="3" class="sp-quote-textarea" required></textarea>

                        <label class="sp-recaptcha">
                            <span class="sp-recaptcha-left">
                                <input type="checkbox" required>
                                <span><?= e((string) $servicesContent['robot_label']) ?></span>
                            </span>
                            <span class="sp-recaptcha-brand"><?= e((string) $servicesContent['recaptcha_label']) ?></span>
                        </label>

                        <button type="submit" class="sp-btn sp-btn--pink sp-submit">
                            <span><?= e((string) $servicesContent['quote_submit_label']) ?></span>
                            <?= spIcon('send') ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== INTRO ===== -->
    <section class="sp-sec sp-intro">
        <div class="sp-container">
            <div class="sp-intro-inner">
                <div class="sp-head" data-rv="up" style="margin-bottom: 26px;">
                    <span class="sp-kicker"><?= e((string) $servicesContent['intro_eyebrow']) ?></span>
                    <h2 class="sp-block-title">
                        <?= e((string) $servicesContent['intro_heading_prefix']) ?>
                        <span class="accent"><?= e((string) $servicesContent['intro_heading_highlight']) ?></span>
                    </h2>
                    <i class="sp-bar"></i>
                </div>

                <div class="sp-intro-body">
                    <?php foreach ($servicesContent['intro_paragraphs'] as $i => $paragraph): ?>
                        <?php if (trim((string) $paragraph) !== ''): ?><p data-rv="up" data-d="<?= min($i, 5) * 0.08 ?>"><?= e((string) $paragraph) ?></p><?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== WEBSITE CTA ===== -->
    <section class="sp-sec sp-website-cta">
        <div class="sp-container">
            <div class="sp-website-grid">
                <div data-rv="left">
                    <p class="sp-website-pre"><?= e((string) $servicesContent['website_pre']) ?></p>
                    <h2 class="sp-website-h2"><?= e((string) $servicesContent['website_heading']) ?></h2>
                    <p class="sp-website-sub"><?= e((string) $servicesContent['website_description']) ?></p>

                    <div class="sp-website-btns">
                        <a href="<?= e((string) $servicesContent['website_primary_href']) ?>" class="sp-btn sp-btn--pink">
                            <span><?= e((string) $servicesContent['website_primary_label']) ?></span>
                            <?= spIcon('arrow') ?>
                        </a>
                        <span class="sp-or-badge"><?= e((string) $servicesContent['button_separator_label']) ?></span>
                        <a href="tel:<?= e((string) $servicesContent['website_phone']) ?>" class="sp-btn sp-btn--ghost">
                            <?= spIcon('phone') ?>
                            <span><?= e((string) $servicesContent['website_phone_label']) ?></span>
                        </a>
                    </div>
                </div>

                <div class="sp-website-image" data-rv="right">
                    <div class="sp-shot">
                        <img
                            src="<?= e((string) $servicesContent['website_image']) ?>"
                            alt="<?= e((string) $servicesContent['website_image_alt']) ?>"
                            loading="lazy"
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== STATS ===== -->
    <section class="sp-stats-sec">
        <div class="sp-container">
            <div class="sp-stats">
                <?php foreach ($stats as $i => $stat): ?>
                    <div class="sp-stat" data-rv="up" data-d="<?= min($i, 5) * 0.08 ?>">
                        <div class="sp-stat-ico"><?= spIcon($stat['icon']) ?></div>
                        <div class="sp-stat-value"><?= htmlspecialchars($stat['value']) ?></div>
                        <div class="sp-stat-label"><?= htmlspecialchars($stat['label']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== CORE SERVICES ===== -->
    <section class="sp-sec" id="core-services">
        <div class="sp-container">
            <div class="sp-head" data-rv="up">
                <span class="sp-kicker"><?= e((string) $servicesContent['services_eyebrow']) ?></span>
                <h2 class="sp-block-title"><?= e((string) $servicesContent['services_heading_prefix']) ?> <span class="accent"><?= e((string) $servicesContent['services_heading_highlight']) ?></span></h2>
                <p class="sp-block-sub"><?= e((string) $servicesContent['services_subtitle']) ?></p>
                <i class="sp-bar"></i>
            </div>

            <div class="sp-services-grid">
                <?php foreach ($mainServices as $i => $service): ?>
                    <div class="sp-service-card" data-rv="up" data-d="<?= min($i % 3, 5) * 0.1 ?>">
                        <div class="sp-service-icon"><?= spIcon($service['icon']) ?></div>
                        <h3 class="sp-service-title"><?= htmlspecialchars($service['title']) ?></h3>
                        <p class="sp-service-desc"><?= htmlspecialchars($service['description']) ?></p>

                        <div class="sp-service-tags">
                            <?php foreach (($service['features'] ?? []) as $f): ?>
                                <span class="sp-service-tag"><?= htmlspecialchars($f) ?></span>
                            <?php endforeach; ?>
                        </div>

                        <a href="<?= htmlspecialchars(!empty($service['href']) ? $service['href'] : $servicesContent['main_service_link_href']) ?>" class="sp-service-link">
                            <span><?= e((string) $servicesContent['main_service_link_label']) ?></span>
                            <?= spIcon('arrow') ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== SEO SERVICES ===== -->
    <section class="sp-sec sp-seo-sec" id="seo-services">
        <div class="sp-container">
            <div class="sp-head" data-rv="up">
                <div class="sp-pill">
                    <?= spIcon('chart') ?>
                    <span><?= e((string) $servicesContent['seo_badge']) ?></span>
                </div>
                <h2 class="sp-block-title">
                    <?= e((string) $servicesContent['seo_heading_prefix']) ?>
                    <span class="accent"><?= e((string) $servicesContent['seo_heading_highlight']) ?></span>
                </h2>
                <p class="sp-block-sub"><?= e((string) $servicesContent['seo_subtitle']) ?></p>
                <i class="sp-bar"></i>
            </div>

            <div class="sp-seo-grid">
                <?php foreach ($seoServices as $i => $seo):
                    $cardSlug = !empty($seo['href']) ? $seo['href'] : (!empty($seo['slug']) ? '/' . $seo['slug'] . '.php' : '/seo-services-delhi.php');
                ?>
                    <div class="sp-seo-card" data-rv="up" data-d="<?= min($i % 3, 5) * 0.1 ?>">
                        <div class="sp-seo-icon"><?= spIcon($seo['icon']) ?></div>
                        <h4 class="sp-seo-title"><?= htmlspecialchars($seo['title']) ?></h4>
                        <p class="sp-seo-desc"><?= htmlspecialchars($seo['description']) ?></p>

                        <div class="sp-seo-benefits">
                            <?php foreach (($seo['benefits'] ?? []) as $b): ?>
                                <span class="sp-seo-benefit">
                                    <?= spIcon('check') ?>
                                    <?= htmlspecialchars($b) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <a href="<?= $cardSlug ?>" class="sp-seo-link">
                            <span>Explore <?= htmlspecialchars($seo['title']) ?></span>
                            <?= spIcon('arrow') ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="sp-seo-cta">
                <a href="/seo-services-delhi.php" class="sp-btn sp-btn--pink">
                    <span>View All SEO Services in Delhi Hub</span>
                    <?= spIcon('arrow') ?>
                </a>
                <a href="javascript:void(0)" class="trigger-enquiry-modal sp-btn sp-btn--line">
                    <?= e((string) $servicesContent['seo_quote_label']) ?>
                </a>
            </div>
        </div>
    </section>

    <!-- ===== B2B & EXHIBITION SEO SPOTLIGHT ===== -->
    <section class="sp-spot-sec" style="padding-top: 88px;">
        <div class="sp-container">
            <div class="sp-spot" data-rv="scale">
                <div class="sp-spot-in">
                    <div class="sp-pill">
                        <?= spIcon('award') ?>
                        <span>SPECIALIZED PROVEN FLAGSHIP</span>
                    </div>

                    <h3>Boost Your Event &amp; Exhibition <span>With SEO.</span></h3>

                    <h4>Want to attract more attendees, sponsors, exhibitors, and increase revenue?</h4>

                    <p>
                        We'll help you uncover hidden opportunities and improve your exhibition website's performance with a customized Event SEO strategy that drives pre-registered trade buyers, sells out exhibitor stalls, and delivers measurable results.
                    </p>

                    <p>
                        The organic search engine partner behind <strong>Bharat Tex Fair (Ministry of Textiles)</strong> and <strong>IHGF Delhi Autumn Fair (EPCH)</strong>. If you have any questions about how to kick-start your SEO strategy get in touch today.
                    </p>

                    <div class="sp-chips">
                        <span class="sp-chip">✓ Attract Global Attendees</span>
                        <span class="sp-chip">✓ Sell Out Exhibitor Stalls</span>
                        <span class="sp-chip">✓ Multi-Date Google Event Schema</span>
                        <span class="sp-chip">✓ 400%+ Organic Lift Proven</span>
                    </div>

                    <div class="sp-spot-btns">
                        <a href="/b2b-exhibition-seo.php" class="sp-btn sp-btn--pink">
                            <span>Let's Talk Optimization</span>
                            <?= spIcon('arrow') ?>
                        </a>
                        <a href="tel:+919999674255" class="sp-btn sp-btn--ghost">
                            <?= spIcon('phone') ?>
                            <span>Call: +91-9999674255</span>
                        </a>
                    </div>

                    <p class="sp-note">
                        * While results can't be guaranteed, events and trade exhibitions are uniquely positioned to perform exceptionally well with effective search engine optimization.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== RESULTS DRIVEN ===== -->
    <section class="sp-sec sp-results-sec">
        <div class="sp-container">
            <div class="sp-results-section" data-rv="up">
                <h2 class="sp-results-h2">
                    <?= e((string) $servicesContent['results_heading_prefix']) ?>
                    <span class="accent"><?= e((string) $servicesContent['results_heading_highlight']) ?></span>
                </h2>

                <div class="sp-results-list">
                    <?php foreach ($resultsDriven as $r): ?>
                        <div class="sp-result-item">
                            <span class="sp-result-check"><?= spIcon('check') ?></span>
                            <p class="sp-result-text">
                                <span class="bold"><?= htmlspecialchars($r['title']) ?></span>
                                <?= htmlspecialchars($r['description']) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== PROCESS ===== -->
    <section class="sp-sec sp-process-sec">
        <div class="sp-container">
            <div class="sp-head" data-rv="up">
                <h2 class="sp-block-title"><?= e((string) $servicesContent['process_heading_prefix']) ?> <span class="accent"><?= e((string) $servicesContent['process_heading_highlight']) ?></span></h2>
                <p class="sp-block-sub"><?= e((string) $servicesContent['process_subtitle']) ?></p>
                <i class="sp-bar"></i>
            </div>

            <div class="sp-process-grid">
                <?php foreach ($process as $i => $step): ?>
                    <div class="sp-process-card" data-rv="up" data-d="<?= min($i, 5) * 0.1 ?>">
                        <div class="sp-process-num"><?= htmlspecialchars($step['step']) ?></div>
                        <h3 class="sp-process-title"><?= htmlspecialchars($step['title']) ?></h3>
                        <p class="sp-process-desc"><?= htmlspecialchars($step['description']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== FAQ ===== -->
    <section class="sp-sec sp-faq-sec">
        <div class="sp-container">
            <div class="sp-head" data-rv="up">
                <h2 class="sp-block-title">
                    <?= e((string) $servicesContent['faq_heading_prefix']) ?>
                    <span class="accent"><?= e((string) $servicesContent['faq_heading_highlight']) ?></span>
                </h2>
                <i class="sp-bar"></i>
            </div>

            <div class="sp-faq-wrap" id="spFaqWrap">
                <?php foreach ($faqs as $i => $faq): ?>
                    <div class="sp-faq <?= $i === 0 ? 'active' : '' ?>" data-faq-index="<?= $i ?>" data-rv="up" data-d="<?= min($i, 5) * 0.06 ?>">
                        <button type="button" class="sp-faq-btn" onclick="spToggleFaq(this)">
                            <span class="sp-faq-q"><?= htmlspecialchars($faq['q']) ?></span>
                            <span class="sp-faq-icon">
                                <?= spIcon($i === 0 ? 'minus' : 'plus') ?>
                            </span>
                        </button>
                        <div class="sp-faq-body"><?= htmlspecialchars($faq['a']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== CTA ROCKET ===== -->
    <section class="sp-cta-sec">
        <div class="sp-container">
            <div class="sp-cta-rocket" data-rv="scale">
                <div class="sp-cta-rocket-inner">
                    <div class="sp-cta-ico"><?= spIcon('rocket') ?></div>
                    <h2><?= e((string) $servicesContent['cta_title']) ?></h2>
                    <p><?= e((string) $servicesContent['cta_description']) ?></p>

                    <div class="sp-cta-rocket-btns">
                        <a href="<?= e((string) $servicesContent['cta_primary_href']) ?>" class="sp-btn sp-btn--pink">
                            <span><?= e((string) $servicesContent['cta_primary_label']) ?></span>
                            <?= spIcon('arrow') ?>
                        </a>
                        <a href="<?= e((string) $servicesContent['cta_secondary_href']) ?>" class="sp-btn sp-btn--ghost">
                            <span><?= e((string) $servicesContent['cta_secondary_label']) ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FREE PROPOSAL (DARK) ===== -->
    <section class="sp-proposal">
        <div class="sp-container">
            <div class="sp-proposal-grid">
                <div data-rv="left">
                    <p class="sp-proposal-pre"><?= e((string) $servicesContent['proposal_pre']) ?></p>
                    <h2 class="sp-proposal-h2">
                        <?= e((string) $servicesContent['proposal_heading_prefix']) ?>
                        <span class="accent"><?= e((string) $servicesContent['proposal_heading_highlight']) ?></span> <?= e((string) $servicesContent['proposal_heading_suffix']) ?>
                    </h2>
                </div>

                <form class="sp-proposal-form" method="POST" action="/contact.php" data-rv="right">
                    <input type="text" name="name" placeholder="<?= e((string) $servicesContent['proposal_name_placeholder']) ?>" class="sp-proposal-input" required>
                    <input type="tel" name="phone" placeholder="<?= e((string) $servicesContent['proposal_phone_placeholder']) ?>" class="sp-proposal-input" required>
                    <input type="email" name="email" placeholder="<?= e((string) $servicesContent['proposal_email_placeholder']) ?>" class="sp-proposal-input" required>
                    <textarea name="message" placeholder="<?= e((string) $servicesContent['proposal_message_placeholder']) ?>" rows="2" class="sp-proposal-textarea" required></textarea>

                    <label class="sp-proposal-recaptcha">
                        <input type="checkbox" required>
                        <span><?= e((string) $servicesContent['proposal_robot_label']) ?></span>
                        <span class="brand"><?= e((string) $servicesContent['proposal_recaptcha_label']) ?></span>
                    </label>

                    <button type="submit" class="sp-btn sp-btn--pink sp-proposal-submit"><span><?= e((string) $servicesContent['proposal_submit_label']) ?></span></button>
                </form>
            </div>
        </div>
    </section>

</main>

<script>
    // ===== FAQ toggle (unchanged) =====
    function spToggleFaq(btn) {
        const faq = btn.closest('.sp-faq');
        const wrap = document.getElementById('spFaqWrap');
        const isActive = faq.classList.contains('active');

        wrap.querySelectorAll('.sp-faq').forEach((el) => {
            el.classList.remove('active');
            const icon = el.querySelector('.sp-faq-icon');
            if (icon) icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>`;
        });

        if (!isActive) {
            faq.classList.add('active');
            const icon = faq.querySelector('.sp-faq-icon');
            if (icon) icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>`;
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/motion@11.18.2/dist/motion.js"></script>
<script>
(function () {
    var root = document.getElementById('servicesPage');
    if (!root) return;

    root.querySelectorAll('.sp-btn--pink').forEach(function (b) {
        b.addEventListener('pointermove', function (e) {
            var r = b.getBoundingClientRect();
            b.style.setProperty('--bx', (e.clientX - r.left) + 'px');
            b.style.setProperty('--by', (e.clientY - r.top) + 'px');
        });
    });
    root.addEventListener('click', function (e) {
        var b = e.target.closest && e.target.closest('.sp-btn');
        if (!b) return;
        var r = b.getBoundingClientRect(), d = document.createElement('i');
        d.className = 'sp-ripple';
        d.style.left = (e.clientX - r.left) + 'px';
        d.style.top = (e.clientY - r.top) + 'px';
        b.appendChild(d);
        setTimeout(function () { d.remove(); }, 700);
    });

    var M = window.Motion;
    var fallback = function () { root.classList.remove('sp-js'); };
    if (!M || !root.classList.contains('sp-js')) { fallback(); return; }
    try {
        var animate = M.animate, inView = M.inView, scroll = M.scroll, stagger = M.stagger;
        var spring = { type: 'spring', stiffness: 110, damping: 16 };

        var bar = root.querySelector('.sp-progress');
        if (bar && scroll) scroll(animate(bar, { scaleX: [0, 1] }, { ease: 'linear' }));

        var split = function (el) {
            var walker = document.createTreeWalker(el, NodeFilter.SHOW_TEXT, null), list = [], n;
            while ((n = walker.nextNode())) { if (n.nodeValue.trim()) list.push(n); }
            list.forEach(function (node) {
                var frag = document.createDocumentFragment();
                node.nodeValue.split(/(\s+)/).forEach(function (part) {
                    if (!part) return;
                    if (/^\s+$/.test(part)) { frag.appendChild(document.createTextNode(' ')); return; }
                    var w = document.createElement('span'), inner = document.createElement('span');
                    w.className = 'sp-w'; inner.textContent = part; w.appendChild(inner); frag.appendChild(w);
                });
                node.parentNode.replaceChild(frag, node);
            });
            return el.querySelectorAll('.sp-w > span');
        };
        var h1 = root.querySelector('.sp-hero-h1');
        if (h1) animate(split(h1), { y: ['110%', '0%'] }, { duration: 0.85, delay: stagger(0.06, { startDelay: 0.1 }), ease: [0.22, 1, 0.36, 1] });
        animate(root.querySelectorAll('.sp-hero [data-hero]'), { opacity: [0, 1], y: [26, 0] }, { duration: 0.7, delay: stagger(0.12, { startDelay: 0.5 }), ease: 'easeOut' });

        root.querySelectorAll('.sp-head .sp-block-title').forEach(function (h) {
            var sp = split(h);
            sp.forEach(function (s) { s.style.transform = 'translateY(110%)'; });
            inView(h, function () { animate(sp, { y: ['110%', '0%'] }, { duration: 0.8, delay: stagger(0.05), ease: [0.22, 1, 0.36, 1] }); }, { amount: 0.6 });
        });

        root.querySelectorAll('[data-rv]').forEach(function (el) {
            var kind = el.getAttribute('data-rv'), d = parseFloat(el.getAttribute('data-d') || '0');
            var kf = { opacity: [0, 1] };
            if (kind === 'left') kf.x = [-80, 0];
            else if (kind === 'right') kf.x = [80, 0];
            else if (kind === 'scale') kf.scale = [0.93, 1];
            else kf.y = [48, 0];
            inView(el, function () { animate(el, kf, Object.assign({ delay: d }, spring)); }, { amount: 0.12 });
        });

        root.querySelectorAll('.sp-bar').forEach(function (b) {
            b.style.transform = 'scaleX(0)';
            inView(b, function () { animate(b, { scaleX: [0, 1] }, { duration: 0.8, delay: 0.3, ease: [0.22, 1, 0.36, 1] }); }, { amount: 0.8 });
        });

        root.querySelectorAll('.sp-stat-value').forEach(function (el) {
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

        root.querySelectorAll('.sp-service-card').forEach(function (c) {
            c.addEventListener('pointermove', function (e) {
                var r = c.getBoundingClientRect(), nx = (e.clientX - r.left) / r.width - 0.5, ny = (e.clientY - r.top) / r.height - 0.5;
                animate(c, { rotateY: nx * 6, rotateX: -ny * 6 }, { duration: 0.3 });
            });
            c.addEventListener('pointerleave', function () { animate(c, { rotateX: 0, rotateY: 0 }, { type: 'spring', stiffness: 200, damping: 15 }); });
        });

        root.querySelectorAll('.sp-btn--pink').forEach(function (b) {
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