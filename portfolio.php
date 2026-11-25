<?php require_once __DIR__ . '/app/templates/header.php'; ?>

<?php
// ===== Icon Helper =====
function portIcon(string $name): string {
    $icons = [
        'sparkles'   => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
        'arrow'      => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'check'      => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
        'external'   => '<path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>',
        'briefcase'  => '<rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'award'      => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        'trending'   => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'filter'     => '<polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>',
        'x'          => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
        'search'     => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
        'rocket'     => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
        'globe'      => '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
        'smartphone' => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/>',
        'code'       => '<path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/>',
        'paintbrush' => '<path d="m14.622 17.897-10.68-2.913"/><path d="M18.376 2.622a1 1 0 1 1 3.002 3.002L17.36 9.643a.5.5 0 0 0 0 .707l.944.944a2.41 2.41 0 0 1 0 3.408l-.944.944a.5.5 0 0 1-.707 0L8.354 7.348a.5.5 0 0 1 0-.707l.944-.944a2.41 2.41 0 0 1 3.408 0l.944.944a.5.5 0 0 0 .707 0z"/><path d="M9 8c-1.804 2.71-3.97 3.46-6.583 3.948a.507.507 0 0 0-.302.819l7.32 8.883a1 1 0 0 0 1.185.204C12.735 20.405 16 16.792 16 15"/>',
        'megaphone'  => '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>',
        'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
    ];
    $path = $icons[$name] ?? '';
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $path . '</svg>';
}

// ===== Categories (fallback defaults — overridden by portfolioPageContent() below) =====
$categories = [
    ['id' => 'all',      'label' => 'All Projects'],
    ['id' => 'branding', 'label' => 'Branding'],
    ['id' => 'web',      'label' => 'Web Design'],
    ['id' => 'seo',      'label' => 'SEO'],
    ['id' => 'social',   'label' => 'Social Media'],
    ['id' => 'app',      'label' => 'App Development'],
];

// ===== Projects (fallback defaults — overridden by portfolioProjects() below) =====
$projects = [
    ['id' => 1, 'title' => 'TechSolutions India', 'category' => 'branding', 'categoryLabel' => 'Branding', 'description' => 'Complete digital branding and identity design for a leading tech solutions company. We created a modern, professional brand identity that reflects their innovative approach.', 'image' => '/portfolio/project-1.jpg', 'results' => ['300% Brand Recognition', '50% Increase in Leads', 'Award Winning Design'], 'client' => 'TechSolutions India', 'year' => '2024', 'link' => '#'],
    ['id' => 2, 'title' => 'StyleHub Fashion', 'category' => 'web', 'categoryLabel' => 'Web Design', 'description' => 'Responsive e-commerce website design and development for a premium fashion brand. The website features seamless shopping experience and modern UI/UX.', 'image' => '/portfolio/project-2.jpg', 'results' => ['400% Increase in Sales', '200% More Traffic', '5-Star User Rating'], 'client' => 'StyleHub Fashion', 'year' => '2024', 'link' => '#'],
    ['id' => 3, 'title' => 'GreenTech Solutions', 'category' => 'seo', 'categoryLabel' => 'SEO', 'description' => 'Comprehensive SEO strategy that helped a green tech company rank #1 on Google for 50+ keywords and achieve 300% organic growth.', 'image' => '/portfolio/project-3.jpg', 'results' => ['50+ Keywords Ranked #1', '300% Organic Growth', '200% More Leads'], 'client' => 'GreenTech Solutions', 'year' => '2023', 'link' => '#'],
    ['id' => 4, 'title' => 'Wellness World', 'category' => 'social', 'categoryLabel' => 'Social Media', 'description' => 'Social media management and content strategy that grew a wellness brand\'s following from 5K to 50K+ followers with 5x engagement.', 'image' => '/portfolio/project-4.jpg', 'results' => ['50K+ Followers', '5x Engagement Rate', '200% More Traffic'], 'client' => 'Wellness World', 'year' => '2023', 'link' => '#'],
    ['id' => 5, 'title' => 'FinTech Solutions', 'category' => 'app', 'categoryLabel' => 'App Development', 'description' => 'Cross-platform mobile app for a fintech startup. The app features secure payments, user-friendly interface, and real-time analytics.', 'image' => '/portfolio/project-5.jpg', 'results' => ['10K+ Downloads', '4.8 Star Rating', '100K+ Transactions'], 'client' => 'FinTech Solutions', 'year' => '2024', 'link' => '#'],
    ['id' => 6, 'title' => 'DigitalFirst Agency', 'category' => 'branding', 'categoryLabel' => 'Branding', 'description' => 'Complete rebranding for a digital marketing agency including logo design, brand guidelines, and marketing collateral.', 'image' => '/portfolio/project-6.jpg', 'results' => ['200% Brand Recognition', '150% More Inquiries', 'Industry Award'], 'client' => 'DigitalFirst Agency', 'year' => '2024', 'link' => '#'],
    ['id' => 7, 'title' => 'GreenEnergy Hub', 'category' => 'seo', 'categoryLabel' => 'SEO', 'description' => 'Local SEO campaign for a green energy company that increased foot traffic and online inquiries by 300% across 10+ locations.', 'image' => '/portfolio/project-7.jpg', 'results' => ['10+ Locations Ranked #1', '300% Foot Traffic', '500% Online Inquiries'], 'client' => 'GreenEnergy Hub', 'year' => '2023', 'link' => '#'],
    ['id' => 8, 'title' => 'ShopSmart App', 'category' => 'app', 'categoryLabel' => 'App Development', 'description' => 'E-commerce mobile app with AI-powered product recommendations, seamless checkout, and personalized shopping experience.', 'image' => '/portfolio/project-8.jpg', 'results' => ['50K+ Downloads', '4.9 Star Rating', '200% More Sales'], 'client' => 'ShopSmart', 'year' => '2024', 'link' => '#'],
    ['id' => 9, 'title' => 'EcoFriendly Living', 'category' => 'web', 'categoryLabel' => 'Web Design', 'description' => 'Modern, sustainable website design for an eco-friendly lifestyle brand with focus on user experience and conversion optimization.', 'image' => '/portfolio/project-9.jpg', 'results' => ['150% More Conversions', '100% Traffic Increase', 'Best Design Award'], 'client' => 'EcoFriendly Living', 'year' => '2023', 'link' => '#'],
];

$stats = [
    ['icon' => 'briefcase', 'value' => '500+', 'label' => 'Projects Delivered'],
    ['icon' => 'users',     'value' => '300+', 'label' => 'Happy Clients'],
    ['icon' => 'award',     'value' => '50+',  'label' => 'Awards Won'],
    ['icon' => 'trending',  'value' => '98%',  'label' => 'Client Satisfaction'],
];

// Map category → icon
$categoryIconMap = [
    'branding' => 'paintbrush',
    'web'      => 'code',
    'seo'      => 'rocket',
    'social'   => 'megaphone',
    'app'      => 'smartphone',
];

$portfolioPage = portfolioPageContent();
$projects = portfolioProjects();
$stats = $portfolioPage['stats'];
$categories = array_merge(
    [['id' => 'all', 'label' => $portfolioPage['all_projects_label']]],
    $portfolioPage['categories']
);
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

<style>
    /* ============================================================
       PORTFOLIO PAGE — "Expo Floor" colour edition (NO BLACK)
       ============================================================ */
    .port-page, .port-modal {
        --pink: #C4007A;
        --pink2: #E0398F;
        --pink3: #FF7BC0;
        --deep: #7E004E;            /* Replaces old black --ink */
        --head: #5E0B45;            /* Headings */
        --blush: #FBEAF3;
        --soft: #FFF4FA;
        --gold: #FFB547;
        --mint: #0E9F6E;
        --text: #4A3342;
        --mute: #7A6574;
        --line: rgba(126, 0, 78, 0.14);
        --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        color: var(--text);
    }
    .port-page *, .port-page *::before, .port-page *::after, .port-modal *, .port-modal *::before, .port-modal *::after { box-sizing: border-box; }
    .port-page { position: relative; width: 100%; background: #fff; overflow-x: clip; }
    .port-page h1,.port-page h2,.port-page h3,.port-page h4,.port-modal h3,.port-modal h4 { font-family: var(--disp); letter-spacing: -.02em; }
    .port-page a:focus-visible,.port-page button:focus-visible,.port-modal a:focus-visible,.port-modal button:focus-visible { outline: 3px solid var(--gold); outline-offset: 2px; }
    .port-container { position: relative; z-index: 1; max-width: 1200px; width: 100%; margin: 0 auto; padding: 0 22px; }
    @media (min-width: 1440px){ .port-container { max-width: 1320px; } }

    /* ===== HERO (the hall) ===== */
    .port-hero { position:relative; overflow:hidden; color:#fff; text-align:center; padding:72px 0 64px;
        background: radial-gradient(60% 70% at 85% 10%, rgba(255,255,255,.18), transparent 65%),
                    radial-gradient(40% 50% at 0% 100%, rgba(255,181,71,.3), transparent 70%),
                    linear-gradient(135deg, #A8006A 0%, #C4007A 45%, #E0398F 100%); }
    .port-hero::before { content:''; position:absolute; inset:0; background-image:radial-gradient(rgba(255,255,255,.15) 1px,transparent 1.2px); background-size:26px 26px; -webkit-mask-image:linear-gradient(180deg,#000 30%,transparent 95%); mask-image:linear-gradient(180deg,#000 30%,transparent 95%); pointer-events:none; }
    .port-pill { display:inline-flex; align-items:center; gap:8px; padding:7px 15px 7px 11px; margin-bottom:22px; border-radius:999px; background:rgba(255,255,255,.18); border:1px solid rgba(255,255,255,.45); font-size:.8rem; font-weight:700; color:#fff; -webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px); }
    .port-pill i { width:8px; height:8px; border-radius:50%; background:var(--gold); box-shadow:0 0 0 4px rgba(255,181,71,.3); }
    
    /* 🔥 UPDATED HERO HEADING (Matches Blog Style) 🔥 */
    .port-h1 { 
        margin:0 auto 18px; 
        max-width:900px; 
        font-size:clamp(2.4rem, 6vw, 4.5rem); 
        font-weight:800; 
        line-height:1.06; 
        letter-spacing:-.035em;
        color:#fff; 
        text-shadow: 0 4px 0 var(--deep), 0 8px 24px rgba(126, 0, 78, 0.5);
        position: relative;
        z-index: 5;
    }
    .port-h1 .accent { 
        position: relative;
        display: inline-block;
        background:linear-gradient(90deg,var(--gold),#FF7BC0,var(--gold)); 
        background-size:200% 100%; 
        -webkit-background-clip:text; 
        background-clip:text; 
        color:transparent; 
        animation:portShine 4s linear infinite; 
        text-shadow: 0 4px 0 var(--pink), 0 8px 24px rgba(196, 0, 122, 0.4);
    }
    .port-h1 .accent svg {
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 100%;
        height: 12px;
    }
    .port-h1 .accent svg path {
        stroke: #fff;
        opacity: 0.9;
        stroke-width: 3;
    }
    @keyframes portShine { to { background-position:200% 0; } }
    .port-subtitle { max-width:720px; margin:0 auto; color:rgba(255,255,255,.88); font-size:1.05rem; line-height:1.7; }

    /* Stats */
    .port-stats { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; max-width:960px; margin:44px auto 0; }
    @media (min-width:768px){ .port-stats { grid-template-columns:repeat(4,minmax(0,1fr)); gap:18px; } }
    .port-stat { padding:20px 12px; text-align:center; border-radius:16px; background:rgba(255,255,255,.12); border:2px solid rgba(255,255,255,.25); transition:translate .25s, border-color .25s, background .25s; }
    .port-stat:hover { translate:0 -4px; border-color:var(--gold); background:rgba(255,255,255,.18); }
    .port-stat svg { display:block; width:26px; height:26px; margin:0 auto 8px; color:var(--gold); }
    .port-stat-value { font:800 2rem/1.05 var(--disp); color:var(--gold); }
    .port-stat-label { margin-top:4px; font-size:.8rem; font-weight:700; color:rgba(255,255,255,.9); }

    /* Gold ribbon strip under hero */
    .port-ribbon { background:var(--gold); border-top:3px solid var(--deep); border-bottom:3px solid var(--deep); overflow:hidden; }
    .port-ribbon-track { display:flex; width:max-content; animation:portRun 40s linear infinite; }
    .port-ribbon span { padding:13px 30px; white-space:nowrap; font:800 1.05rem var(--disp); color:var(--deep); }
    .port-ribbon span::after { content:'✦'; margin-left:60px; opacity:.6; }
    @keyframes portRun { to { transform:translateX(-50%); } }

    /* ===== Gallery section ===== */
    .port-gallery { position:relative; padding:72px 0 76px; background:var(--soft) radial-gradient(rgba(126,0,78,.07) 1px,transparent 1.2px) 0 0/24px 24px; }
    .port-gallery-head { max-width:720px; margin:0 auto 32px; text-align:center; }
    .port-kicker { display:inline-block; margin-bottom:12px; padding-left:14px; border-left:4px solid var(--pink); font-size:.82rem; font-weight:800; color:var(--pink); text-align:left; text-transform:uppercase; letter-spacing:.06em; }
    .port-gallery-head h2 { margin:0 0 14px; font-size:clamp(1.85rem,3.5vw,2.8rem); font-weight:800; line-height:1.1; color:var(--head); }
    .port-bar { display:block; width:84px; height:7px; margin:0 auto; background:repeating-linear-gradient(90deg,var(--pink) 0 12px,var(--gold) 12px 24px); }

    /* Filters */
    .port-filters { display:flex; flex-wrap:wrap; align-items:center; justify-content:center; gap:10px; margin-bottom:40px; }
    .port-filter { padding:11px 20px; border-radius:12px; font:800 .88rem/1 inherit; font-family:inherit; border:2px solid var(--deep); background:#fff; color:var(--deep); cursor:pointer; box-shadow:3px 3px 0 var(--gold); transition:translate .15s, box-shadow .15s, background .2s, color .2s; }
    .port-filter:hover { background:var(--blush); color:var(--pink); translate:-1px -1px; box-shadow:4px 4px 0 var(--gold); }
    .port-filter.active { background:var(--pink); color:#fff; border-color:var(--deep); box-shadow:3px 3px 0 var(--gold); }

    /* Projects grid */
    .port-grid { display:grid; grid-template-columns:minmax(0,1fr); gap:28px; }
    @media (min-width:768px){ .port-grid { grid-template-columns:repeat(2,minmax(0,1fr)); gap:30px; } }
    @media (min-width:1024px){ .port-grid { grid-template-columns:repeat(3,minmax(0,1fr)); } }
    .port-card { display:flex; flex-direction:column; min-width:0; background:#fff; border:2px solid var(--deep); border-radius:18px; overflow:hidden; box-shadow:6px 6px 0 var(--gold); transition:translate .25s, box-shadow .25s; }
    .port-card:hover { translate:-4px -4px; box-shadow:10px 10px 0 var(--pink); }
    .port-img { position:relative; height:220px; overflow:hidden; display:flex; align-items:center; justify-content:center; border-bottom:2px solid var(--deep);
        background:radial-gradient(ellipse at 70% 30%,rgba(255,255,255,.55) 0 8%,transparent 9%),linear-gradient(145deg,#7E004E 0%,#C4007A 55%,#E98EBE 100%); }
    .port-project-image { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; transition:transform .5s ease; }
    .port-card:hover .port-project-image { transform:scale(1.05); }
    .port-img-icon { position:absolute; inset:0; display:flex; align-items:center; justify-content:center; }
    .port-img-icon svg { width:64px; height:64px; color:rgba(255,255,255,.35); }
    .port-cat-badge { position:absolute; top:14px; left:14px; z-index:2; padding:5px 12px; background:var(--gold); color:var(--deep); border:2px solid var(--deep); border-radius:8px; box-shadow:3px 3px 0 var(--deep); font-size:.74rem; font-weight:800; }
    .port-year-badge { position:absolute; bottom:12px; right:12px; z-index:2; padding:4px 11px; background:#fff; color:var(--deep); border:2px solid var(--deep); border-radius:999px; box-shadow:2px 2px 0 var(--deep); font:800 .74rem var(--disp); }
    .port-hover-overlay { position:absolute; inset:0; z-index:3; display:flex; align-items:center; justify-content:center; padding:0; border:0; background:rgba(126,0,78,.7); opacity:0; cursor:pointer; font-family:inherit; transition:opacity .3s; }
    .port-card:hover .port-hover-overlay,.port-hover-overlay:focus-visible { opacity:1; }
    .port-hover-overlay span { padding:11px 20px; border-radius:12px; background:var(--pink); color:#fff; font-weight:800; font-size:.88rem; box-shadow:0 4px 0 var(--deep); border:2px solid var(--deep); }
    .port-body { display:flex; flex-direction:column; flex:1; padding:22px 22px 20px; }
    .port-title-row { display:flex; align-items:flex-start; justify-content:space-between; gap:10px; margin-bottom:8px; }
    .port-title { margin:0; font-size:1.25rem; font-weight:800; line-height:1.25; color:var(--head); transition:color .25s; overflow-wrap:anywhere; }
    .port-card:hover .port-title { color:var(--pink); }
    .port-client { flex-shrink:0; max-width:40%; font-size:.74rem; font-weight:800; color:var(--mute); text-align:right; overflow-wrap:anywhere; }
    .port-desc { margin:0 0 16px; font-size:.9rem; line-height:1.65; color:var(--mute); overflow-wrap:anywhere; }
    .port-results { display:flex; flex-wrap:wrap; gap:7px; margin-bottom:18px; }
    .port-result-tag { padding:4px 11px; border:1.5px solid var(--pink); border-radius:999px; background:var(--blush); color:var(--pink); font-size:.74rem; font-weight:800; }
    .port-link { align-self:flex-start; margin-top:auto; display:inline-flex; align-items:center; gap:7px; padding-top:14px; width:100%; border-top:2px dashed var(--line); font-weight:800; font-size:.9rem; color:var(--pink); text-decoration:none; transition:gap .25s; }
    .port-link:hover { gap:12px; color:var(--pink); }
    .port-link svg { width:15px; height:15px; flex-shrink:0; }

    .port-empty { text-align:center; padding:56px 0; }
    .port-empty svg { display:block; width:52px; height:52px; margin:0 auto 16px; color:var(--pink); }
    .port-empty p { margin:0; color:var(--mute); font-weight:700; }

    /* ===== CTA ===== */
    .port-cta-sec { padding:0 0 76px; background:var(--soft); }
    .port-cta { position:relative; overflow:hidden; padding:60px 34px; text-align:center; color:#fff; border-radius:26px; box-shadow:10px 10px 0 var(--gold);
        background: radial-gradient(50% 80% at 50% 120%, rgba(255,181,71,.45), transparent 70%),
                    radial-gradient(rgba(255,255,255,.2) 1px, transparent 1.2px) 0 0 / 26px 26px,
                    linear-gradient(135deg, #A8006A 0%, #C4007A 50%, #E0398F 100%); }
    .port-cta-inner { position:relative; }
    .port-cta-inner > svg { display:block; width:46px; height:46px; margin:0 auto 16px; color:var(--gold); }
    .port-cta-h2 { max-width:820px; margin:0 auto 14px; font-size:clamp(1.8rem,3.6vw,2.9rem); font-weight:800; line-height:1.12; color:#fff; text-shadow:0 3px 0 rgba(126,0,78,.3); }
    .port-cta-sub { max-width:640px; margin:0 auto 28px; color:rgba(255,255,255,.92); line-height:1.65; }
    .port-cta-btns { display:flex; flex-wrap:wrap; align-items:center; justify-content:center; gap:14px; }
    .port-cta-btn-1,.port-cta-btn-2,.port-modal-cta { display:inline-flex; align-items:center; justify-content:center; gap:10px; padding:14px 26px; border:2px solid transparent; border-radius:12px; font-weight:700; font-size:.95rem; line-height:1.2; text-decoration:none; cursor:pointer; font-family:inherit; transition:translate .2s, box-shadow .2s, background .2s; }
    .port-cta-btn-1,.port-modal-cta { background:var(--pink); color:#fff; box-shadow:0 6px 0 var(--deep); border-color:var(--deep); }
    .port-cta-btn-1:hover,.port-modal-cta:hover { color:#fff; translate:0 2px; box-shadow:0 4px 0 var(--deep); }
    .port-cta-btn-2 { background:transparent; color:#fff; border-color:rgba(255,255,255,.5); }
    .port-cta-btn-2:hover { color:#fff; background:rgba(255,255,255,.15); border-color:#fff; }
    .port-cta-btn-1 svg,.port-modal-cta svg { width:16px; height:16px; flex-shrink:0; }

    /* ===== Project Modal ===== */
    .port-modal { position:fixed; inset:0; z-index:9999; display:none; align-items:center; justify-content:center; padding:16px; opacity:0; transition:opacity .25s ease; }
    .port-modal.open { display:flex; opacity:1; }
    .port-modal-backdrop { position:absolute; inset:0; background:rgba(126,0,78,.8); backdrop-filter:blur(4px); }
    .port-modal-box { position:relative; width:100%; max-width:660px; max-height:90vh; overflow-y:auto; border:2px solid var(--deep); border-radius:22px; background:#fff; box-shadow:10px 10px 0 var(--gold); transform:translateY(20px) scale(.97); transition:transform .25s ease; }
    .port-modal.open .port-modal-box { transform:translateY(0) scale(1); }
    .port-modal-close { position:absolute; top:12px; right:12px; z-index:10; display:flex; align-items:center; justify-content:center; width:38px; height:38px; border:2px solid var(--deep); border-radius:10px; background:#fff; color:var(--deep); cursor:pointer; box-shadow:3px 3px 0 var(--gold); transition:background .2s, color .2s; }
    .port-modal-close:hover { background:var(--pink); color:#fff; }
    .port-modal-close svg { width:16px; height:16px; }
    .port-modal-hero { position:relative; display:flex; align-items:center; justify-content:center; height:170px; border-bottom:2px solid var(--deep);
        background:radial-gradient(ellipse at 70% 30%,rgba(255,255,255,.55) 0 8%,transparent 9%),linear-gradient(145deg,#7E004E 0%,#C4007A 55%,#E98EBE 100%); }
    .port-modal-hero svg { width:64px; height:64px; color:rgba(255,255,255,.45); }
    .port-modal-body { padding:26px 26px 28px; }
    .port-modal-cat { display:inline-block; margin-bottom:12px; padding:5px 12px; background:var(--gold); color:var(--deep); border:2px solid var(--deep); border-radius:8px; box-shadow:3px 3px 0 var(--deep); font-size:.74rem; font-weight:800; }
    .port-modal-title { margin:0 0 4px; font-size:1.7rem; font-weight:800; line-height:1.15; color:var(--head); }
    .port-modal-meta { margin:0 0 16px; font-size:.86rem; font-weight:700; color:var(--pink); }
    .port-modal-desc { margin:0 0 18px; font-size:.95rem; line-height:1.7; color:var(--mute); }
    .port-modal-body p a { color:var(--pink); font-weight:800; }
    .port-modal-results-title { margin:0 0 10px; font-size:.95rem; font-weight:800; color:var(--head); }
    .port-modal-results { display:grid; gap:9px; margin-bottom:24px; padding:16px; border:2px dashed var(--pink); border-radius:14px; background:var(--blush); }
    .port-modal-result { display:flex; align-items:center; gap:9px; font-size:.9rem; font-weight:700; color:var(--head); }
    .port-modal-result svg { width:17px; height:17px; flex-shrink:0; color:var(--mint); }

    /* Responsive */
    @media (max-width:767px){ .port-ribbon span { font-size:.9rem; padding:12px 20px; } .port-ribbon span::after { margin-left:36px; } }
    @media (max-width:575px){
        .port-container { padding:0 16px; } .port-hero { padding:48px 0 44px; } .port-gallery { padding:56px 0; }
        .port-h1 { font-size:clamp(2rem, 9.5vw, 2.6rem); }
        .port-card { box-shadow:4px 4px 0 var(--gold); } .port-stat-value { font-size:1.6rem; }
        .port-cta { padding:44px 20px; border-radius:20px; box-shadow:6px 6px 0 var(--gold); } .port-cta-btns > a,.port-modal-cta { width:100%; white-space:normal; text-align:center; min-height:48px; }
        .port-modal-box { box-shadow:6px 6px 0 var(--gold); } .port-modal-body { padding:22px 18px 24px; } .port-modal-title { font-size:1.4rem; }
        .port-filter { padding:10px 14px; font-size:.82rem; }
    }
    @media (hover:none){ .port-card:hover { translate:none; box-shadow:6px 6px 0 var(--gold); } .port-stat:hover { translate:none; } .port-hover-overlay { display:none; } }
    @media (prefers-reduced-motion:reduce){ .port-ribbon-track,.port-h1 .accent { animation:none; } .port-card,.port-filter,.port-stat { transition:none; } }
</style>

<main class="port-page" id="portfolioPage">

    <!-- ===== HERO ===== -->
    <section class="port-hero">
        <div class="port-container">
            <div class="port-pill"><i></i><span><?= e((string) $portfolioPage['badge']) ?></span></div>

            <!-- 🔥 Yahan heading update ki gayi hai, Blog ki tarah 🔥 -->
            <h1 class="port-h1">
                <?= e((string) $portfolioPage['heading_prefix']) ?>
                <span class="accent">
                    <?= e((string) $portfolioPage['heading_highlight']) ?>
                    <svg viewBox="0 0 300 8" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M2 4C60 1 240 1 298 4" stroke="#FFB547" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                    </svg>
                </span>
            </h1>

            <p class="port-subtitle"><?= e((string) $portfolioPage['summary']) ?></p>

            <!-- Stats -->
            <div class="port-stats">
                <?php foreach ($stats as $stat): ?>
                    <div class="port-stat">
                        <?= portIcon((string) ($stat['icon'] ?? '')) ?>
                        <div class="port-stat-value"><?= e((string) ($stat['value'] ?? '')) ?></div>
                        <div class="port-stat-label"><?= e((string) ($stat['label'] ?? '')) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Ribbon (built from the same stats) -->
    <div class="port-ribbon" aria-hidden="true">
        <div class="port-ribbon-track">
            <?php for ($i = 0; $i < 4; $i++): foreach ($stats as $stat): ?>
                <span><?= e((string) ($stat['value'] ?? '')) ?> <?= e((string) ($stat['label'] ?? '')) ?></span>
            <?php endforeach; endfor; ?>
        </div>
    </div>

    <!-- ===== GALLERY ===== -->
    <section class="port-gallery">
        <div class="port-container">

            <div class="port-gallery-head">
                <span class="port-kicker"><?= e((string) $portfolioPage['badge']) ?></span>
                <h2><?= e((string) $portfolioPage['heading_prefix']) ?> <span style="color:var(--pink)"><?= e((string) $portfolioPage['heading_highlight']) ?></span></h2>
                <i class="port-bar"></i>
            </div>

            <!-- Filters -->
            <div class="port-filters" id="portFilters">
                <?php foreach ($categories as $cat): ?>
                    <button
                        type="button"
                        class="port-filter <?= $cat['id'] === 'all' ? 'active' : '' ?>"
                        data-filter="<?= htmlspecialchars($cat['id']) ?>"
                        onclick="portSetFilter('<?= htmlspecialchars($cat['id']) ?>')"
                    >
                        <?= e((string) $cat['label']) ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- Projects Grid -->
            <div class="port-grid" id="portGrid">
                <?php foreach ($projects as $p):
                    $icon = $categoryIconMap[$p['category']] ?? 'briefcase';
                ?>
                    <div class="port-card" data-category="<?= e((string) $p['category']) ?>">
                        <!-- Image / Icon area -->
                        <div class="port-img">
                            <?php if (!empty($p['image'])): ?><img class="port-project-image" src="<?= e((string) $p['image']) ?>" alt="<?= e((string) $p['title']) ?>" loading="lazy" onerror="this.remove()"><?php endif; ?>
                            <div class="port-img-icon"><?= portIcon($icon) ?></div>

                            <div class="port-cat-badge"><?= e((string) $p['categoryLabel']) ?></div>
                            <div class="port-year-badge"><?= e((string) $p['year']) ?></div>

                            <button
                                type="button"
                                class="port-hover-overlay"
                                onclick="portOpenModal(<?= (int) $p['id'] ?>)"
                                aria-label="<?= e((string) $portfolioPage['view_details_label']) ?>"
                            >
                                <span><?= e((string) $portfolioPage['view_details_label']) ?></span>
                            </button>
                        </div>

                        <!-- Content -->
                        <div class="port-body">
                            <div class="port-title-row">
                                <h3 class="port-title"><?= e((string) $p['title']) ?></h3>
                                <span class="port-client"><?= e((string) $p['client']) ?></span>
                            </div>

                            <p class="port-desc"><?= e((string) $p['description']) ?></p>

                            <div class="port-results">
                                <?php foreach ($p['results'] as $r): ?>
                                    <span class="port-result-tag"><?= e((string) $r) ?></span>
                                <?php endforeach; ?>
                            </div>

                            <a href="<?= e((string) $p['link']) ?>" class="port-link" onclick="event.preventDefault(); portOpenModal(<?= (int) $p['id'] ?>);">
                                <?= e((string) $portfolioPage['view_project_label']) ?>
                                <?= portIcon('external') ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Empty state (hidden by default) -->
            <div class="port-empty" id="portEmpty" style="display: none;">
                <?= portIcon('search') ?>
                <p><?= e((string) $portfolioPage['empty_message']) ?></p>
            </div>
        </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="port-cta-sec">
        <div class="port-container">
            <div class="port-cta">
                <div class="port-cta-inner">
                    <?= portIcon('rocket') ?>
                    <h2 class="port-cta-h2"><?= e((string) $portfolioPage['cta_heading']) ?></h2>
                    <p class="port-cta-sub"><?= e((string) $portfolioPage['cta_description']) ?></p>

                    <div class="port-cta-btns">
                        <a href="<?= e((string) $portfolioPage['cta_primary_href']) ?>" class="port-cta-btn-1">
                            <span><?= e((string) $portfolioPage['cta_primary_label']) ?></span>
                            <?= portIcon('arrow') ?>
                        </a>
                        <a href="<?= e((string) $portfolioPage['cta_secondary_href']) ?>" class="port-cta-btn-2">
                            <span><?= e((string) $portfolioPage['cta_secondary_label']) ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- ===== Project Modal ===== -->
<div class="port-modal" id="portModal">
    <div class="port-modal-backdrop" onclick="portCloseModal()"></div>
    <div class="port-modal-box" id="portModalBox"></div>
</div>

<script>
    // ===== Data for JS =====
    const PORT_DATA = <?= json_encode($projects, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    const PORT_PAGE = <?= json_encode([
        'modal_results_label' => $portfolioPage['modal_results_label'],
        'modal_cta_label' => $portfolioPage['modal_cta_label'],
        'view_project_label' => $portfolioPage['view_project_label'],
        'cta_primary_href' => $portfolioPage['cta_primary_href'],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    function portEscapeHtml(value) {
        return String(value).replace(/[&<>"']/g, (character) => ({
            '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;'
        })[character]);
    }
    const PORT_ICONS = {
        briefcase: `<?= portIcon('briefcase') ?>`,
        users:     `<?= portIcon('users') ?>`,
        award:     `<?= portIcon('award') ?>`,
        trending:  `<?= portIcon('trending') ?>`,
        check:     `<?= portIcon('check') ?>`,
        external:  `<?= portIcon('external') ?>`,
        x:         `<?= portIcon('x') ?>`,
        arrow:     `<?= portIcon('arrow') ?>`,
        rocket:    `<?= portIcon('rocket') ?>`,
        paintbrush:`<?= portIcon('paintbrush') ?>`,
        code:      `<?= portIcon('code') ?>`,
        smartphone:`<?= portIcon('smartphone') ?>`,
        megaphone: `<?= portIcon('megaphone') ?>`,
    };

    const PORT_CATEGORY_ICON = {
        branding: 'paintbrush',
        web:      'code',
        seo:      'rocket',
        social:   'megaphone',
        app:      'smartphone',
    };

    // ===== Filter =====
    let portCurrentFilter = 'all';

    function portSetFilter(filter) {
        portCurrentFilter = filter;

        // Update filter buttons
        document.querySelectorAll('#portFilters .port-filter').forEach((btn) => {
            btn.classList.toggle('active', btn.dataset.filter === filter);
        });

        // Show/hide cards
        let visibleCount = 0;
        document.querySelectorAll('#portGrid .port-card').forEach((card) => {
            const match = (filter === 'all') || (card.dataset.category === filter);
            card.style.display = match ? '' : 'none';
            if (match) visibleCount++;
        });

        // Empty state
        const empty = document.getElementById('portEmpty');
        if (empty) {
            empty.style.display = (visibleCount === 0) ? 'block' : 'none';
        }
    }

    // ===== Modal =====
    function portOpenModal(id) {
        const project = PORT_DATA.find((p) => p.id === id);
        if (!project) return;

        const iconKey = PORT_CATEGORY_ICON[project.category] || 'briefcase';
        const iconSvg = PORT_ICONS[iconKey] || '';

        const resultsHtml = (project.results || []).map((r) => `
            <div class="port-modal-result">
                ${PORT_ICONS.check}
                <span>${portEscapeHtml(r)}</span>
            </div>
        `).join('');

        const box = document.getElementById('portModalBox');
        box.innerHTML = `
            <button type="button" class="port-modal-close" onclick="portCloseModal()" aria-label="Close">
                ${PORT_ICONS.x}
            </button>

            <div class="port-modal-hero">
                ${iconSvg}
            </div>

            <div class="port-modal-body">
                <span class="port-modal-cat">${portEscapeHtml(project.categoryLabel)}</span>
                <h3 class="port-modal-title">${portEscapeHtml(project.title)}</h3>
                <p class="port-modal-meta">${portEscapeHtml(project.client)} &middot; ${portEscapeHtml(project.year)}</p>
                <p class="port-modal-desc">${portEscapeHtml(project.description)}</p>
                ${project.link && project.link !== '#' ? `<p><a href="${portEscapeHtml(project.link)}" target="_blank" rel="noopener noreferrer">${portEscapeHtml(PORT_PAGE.view_project_label)}</a></p>` : ''}

                <h4 class="port-modal-results-title">${portEscapeHtml(PORT_PAGE.modal_results_label)}</h4>
                <div class="port-modal-results">
                    ${resultsHtml}
                </div>

                <a href="${portEscapeHtml(PORT_PAGE.cta_primary_href)}" class="port-modal-cta">
                    ${portEscapeHtml(PORT_PAGE.modal_cta_label)}
                    ${PORT_ICONS.arrow}
                </a>
            </div>
        `;

        document.getElementById('portModal').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function portCloseModal() {
        document.getElementById('portModal').classList.remove('open');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') portCloseModal();
    });
</script>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>