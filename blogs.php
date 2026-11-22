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
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap-grid.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">
<style>
    main *, main *::before, main *::after { box-sizing: border-box; }
    main .text-center { text-align: center; }
    main .position-relative { position: relative; }
    main h1, main h2, main h3, main h4, main p { margin-top: 0; }
    main img { max-width: 100%; }
    main .container { max-width: 1200px; width: 100%; padding-left: 22px; padding-right: 22px; margin-left: auto; margin-right: auto; }
    @media (min-width: 1440px) { main .container { max-width: 1320px; } }
</style>

<style>
    /* ============================================================
       BLOG LISTING — "Expo Floor" design
       ============================================================ */
    main {
        --ink:#1A0613; --ink2:#2B0B20; --pink:#C4007A; --pink2:#E0398F; --blush:#FBEAF3; --gold:#FFB547; --mint:#0E9F6E;
        --text:#2A2430; --mute:#6C6474; --line:rgba(26,6,19,.14);
        --disp:'Bricolage Grotesque','Plus Jakarta Sans',system-ui,sans-serif;
        font-family:'Plus Jakarta Sans',system-ui,-apple-system,sans-serif; color:var(--text); overflow-x:clip;
        background:#F7F4F8 radial-gradient(rgba(26,6,19,.06) 1px,transparent 1.2px) 0 0/24px 24px;
    }
    main ::selection { background:var(--gold); color:var(--ink); }
    main a:focus-visible, main button:focus-visible, main input:focus-visible { outline:3px solid var(--gold); outline-offset:3px; }
    main h1, main h2, main h3, main h4 { font-family:var(--disp); letter-spacing:-.02em; }

    /* ========== HERO (the hall) ========== */
    .bl-hero { position:relative; overflow:hidden; text-align:center; color:#fff; padding:76px 0 70px;
        background:radial-gradient(60% 70% at 85% 10%,rgba(196,0,122,.55),transparent 65%),radial-gradient(40% 50% at 0% 100%,rgba(255,181,71,.16),transparent 70%),var(--ink); }
    .bl-hero::before { content:''; position:absolute; inset:0; background-image:radial-gradient(rgba(255,255,255,.14) 1px,transparent 1.2px); background-size:26px 26px; -webkit-mask-image:linear-gradient(180deg,#000 30%,transparent 95%); mask-image:linear-gradient(180deg,#000 30%,transparent 95%); pointer-events:none; }
    .bl-hero .container { position:relative; z-index:2; }
    .bl-blob { position:absolute; border-radius:50%; pointer-events:none; filter:blur(70px); opacity:.45; animation:blFloat 9s ease-in-out infinite; }
    .bl-blob.b1 { width:320px; height:320px; left:-80px; top:-60px; background:var(--pink); }
    .bl-blob.b2 { width:260px; height:260px; right:-60px; bottom:-30px; background:var(--gold); opacity:.25; animation-delay:-4s; }
    @keyframes blFloat { 0%,100% { transform:translateY(0); } 50% { transform:translateY(-16px); } }
    .bl-kicker { display:inline-flex; align-items:center; gap:8px; padding:7px 16px 7px 12px; border-radius:999px; background:rgba(255,255,255,.09); border:1px solid rgba(255,255,255,.22); font-size:.78rem; font-weight:700; color:#FFE3F1; }
    .bl-kicker i { color:var(--gold); }
    .bl-hero h1 { margin:22px auto 16px; max-width:860px; font-weight:800; font-size:clamp(2.4rem,5.4vw,4.4rem); line-height:1.04; color:#fff; }
    .bl-hero h1 span { background:linear-gradient(90deg,var(--gold),#FF7BC0,var(--gold)); background-size:200% 100%; -webkit-background-clip:text; background-clip:text; color:transparent; animation:blShine 4s linear infinite; }
    .bl-hero h1 span svg { display:none; }
    @keyframes blShine { to { background-position:200% 0; } }
    .bl-hero p.sub { margin:0 auto 32px; max-width:640px; font-size:1.05rem; line-height:1.7; color:rgba(255,255,255,.78); }

    /* Search */
    .bl-search { position:relative; max-width:600px; margin:0 auto; }
    .bl-search input { width:100%; padding:17px 22px 17px 54px; border:2px solid var(--ink); border-radius:14px; background:#fff; color:var(--ink); font:inherit; font-size:.98rem; box-shadow:5px 5px 0 var(--gold); transition:box-shadow .2s, translate .2s; -webkit-appearance:none; appearance:none; outline:0; }
    .bl-search input::placeholder { color:#9A91A1; }
    .bl-search input:focus { translate:1px 1px; box-shadow:3px 3px 0 var(--pink); }
    .bl-search input::-webkit-search-cancel-button { -webkit-appearance:none; }
    .bl-search i { position:absolute; left:20px; top:50%; translate:0 -50%; color:var(--pink); font-size:1.15rem; pointer-events:none; }

    /* Gold ribbon */
    .bl-ribbon { background:var(--gold); border-top:3px solid var(--ink); border-bottom:3px solid var(--ink); overflow:hidden; }
    .bl-ribbon-track { display:flex; width:max-content; animation:blRun 38s linear infinite; }
    .bl-ribbon span { padding:13px 30px; white-space:nowrap; font:800 1.05rem var(--disp); color:var(--ink); }
    .bl-ribbon span::after { content:'✦'; margin-left:60px; opacity:.55; }
    @keyframes blRun { to { transform:translateX(-50%); } }

    /* ========== BODY ========== */
    .bl-wrap { position:relative; z-index:2; padding:56px 0 90px; }

    /* Chips */
    .bl-chips { display:flex; flex-wrap:wrap; justify-content:center; gap:10px; margin-bottom:44px; }
    .bl-chip { padding:11px 20px; border:2px solid var(--ink); border-radius:12px; background:#fff; color:var(--ink); box-shadow:3px 3px 0 var(--ink); font:700 .88rem/1 inherit; font-family:inherit; white-space:nowrap; cursor:pointer; -webkit-tap-highlight-color:transparent; transition:translate .15s, box-shadow .15s, background .2s, color .2s; }
    .bl-chip:hover { background:var(--blush); color:var(--pink); translate:-1px -1px; box-shadow:4px 4px 0 var(--ink); }
    .bl-chip.active { background:var(--pink); color:#fff; box-shadow:3px 3px 0 var(--gold); }

    /* Section title */
    .bl-sec-title { display:flex; align-items:center; flex-wrap:wrap; gap:14px; margin:0 0 28px; }
    .bl-sec-title h3 { margin:0; font-weight:800; font-size:1.7rem; color:var(--ink); }
    .bl-sec-title .line { flex:1; min-width:40px; height:7px; background:repeating-linear-gradient(90deg,var(--pink) 0 12px,var(--gold) 12px 24px); }
    .bl-count { padding:5px 13px; border:2px solid var(--ink); border-radius:999px; background:#fff; color:var(--pink); font-size:.78rem; font-weight:800; white-space:nowrap; }

    /* Image block */
    .bl-img { position:relative; display:block; overflow:hidden; isolation:isolate; background:linear-gradient(145deg,#2D051E,#C4007A 55%,#E98EBE); border-bottom:2px solid var(--ink); }
    .bl-img::before { content:"\F4E5"; font-family:"bootstrap-icons"; position:absolute; inset:0; z-index:0; display:flex; align-items:center; justify-content:center; font-size:3rem; color:rgba(255,255,255,.35); }
    .bl-img .bl-bgblur { display:none; }
    .bl-img .bl-main { position:relative; z-index:2; display:block; width:100%; height:100%; object-fit:cover; object-position:center; transition:transform .5s ease; }
    .bl-img.noimg .bl-main, .bl-img.noimg .bl-bgblur { display:none; }
    .bl-pill { position:absolute; z-index:4; top:14px; left:14px; max-width:calc(100% - 28px); overflow:hidden; text-overflow:ellipsis; white-space:nowrap; padding:5px 12px; background:var(--gold); color:var(--ink); border:2px solid var(--ink); border-radius:8px; box-shadow:3px 3px 0 var(--ink); font-size:.72rem; font-weight:800; }
    .bl-time { position:absolute; z-index:4; bottom:12px; right:12px; padding:4px 11px; background:#fff; color:var(--ink); border:2px solid var(--ink); border-radius:999px; font-size:.72rem; font-weight:800; }
    .bl-time i { color:var(--pink); margin-right:4px; }

    /* Cards (stalls) */
    .bl-card { position:relative; display:flex; flex-direction:column; height:100%; background:#fff; border:2px solid var(--ink); border-radius:18px; overflow:hidden; box-shadow:6px 6px 0 var(--ink); transition:translate .25s, box-shadow .25s; }
    .bl-card:hover { translate:-4px -4px; box-shadow:10px 10px 0 var(--pink); }
    .bl-card .bl-img { aspect-ratio:16/10; flex-shrink:0; }
    .bl-card:hover .bl-img .bl-main, .bl-featured:hover .bl-img .bl-main { transform:scale(1.05); }
    .bl-body { display:flex; flex-direction:column; flex:1; min-width:0; padding:22px; }
    .bl-date { margin-bottom:8px; font-size:.78rem; font-weight:700; color:var(--pink); }
    .bl-date i { margin-right:6px; }
    .bl-title { margin:0 0 10px; font-weight:700; font-size:1.2rem; line-height:1.3; color:var(--ink); overflow-wrap:anywhere; }
    .bl-title a { color:inherit; text-decoration:none; transition:color .25s; }
    .bl-card:hover .bl-title a, .bl-featured:hover .bl-title a { color:var(--pink); }
    .bl-excerpt { margin:0 0 18px; color:var(--mute); line-height:1.65; font-size:.93rem; display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }
    .bl-foot { display:flex; align-items:center; justify-content:space-between; gap:10px; margin-top:auto; padding-top:16px; border-top:2px dashed var(--line); }
    .bl-author { display:flex; align-items:center; gap:10px; min-width:0; font-size:.84rem; font-weight:700; color:var(--ink); }
    .bl-author-name { overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
    .bl-ava { display:inline-flex; align-items:center; justify-content:center; flex-shrink:0; width:34px; height:34px; border:2px solid var(--ink); border-radius:50%; background:var(--pink); color:#fff; font:800 .82rem var(--disp); }
    .bl-arrow { display:inline-flex; align-items:center; justify-content:center; flex-shrink:0; width:38px; height:38px; border:2px solid var(--ink); border-radius:10px; background:var(--gold); color:var(--ink); text-decoration:none; box-shadow:2px 2px 0 var(--ink); transition:rotate .3s, background .2s, color .2s; }
    .bl-card:hover .bl-arrow { background:var(--pink); color:#fff; rotate:-45deg; }

    /* Featured */
    .bl-featured { display:grid; grid-template-columns:1.1fr 1fr; margin-bottom:56px; background:#fff; border:2px solid var(--ink); border-radius:24px; overflow:hidden; box-shadow:10px 10px 0 var(--gold); transition:translate .25s, box-shadow .25s; }
    .bl-featured:hover { translate:-3px -3px; box-shadow:13px 13px 0 var(--pink); }
    .bl-featured .bl-img { min-height:400px; height:100%; border-bottom:0; border-right:2px solid var(--ink); }
    .bl-featured.no-img { grid-template-columns:1fr; }
    .bl-feat-body { display:flex; flex-direction:column; justify-content:center; min-width:0; padding:44px; }
    .bl-feat-tag { align-self:flex-start; display:inline-flex; align-items:center; gap:7px; margin-bottom:16px; padding:6px 14px; background:var(--gold); color:var(--ink); border:2px solid var(--ink); border-radius:8px; box-shadow:3px 3px 0 var(--ink); font-size:.76rem; font-weight:800; }
    .bl-feat-body .bl-title { font-size:clamp(1.5rem,2.8vw,2.3rem); line-height:1.15; font-weight:800; }
    .bl-feat-body .bl-excerpt { -webkit-line-clamp:4; font-size:1rem; line-height:1.7; }
    .bl-meta { display:flex; flex-wrap:wrap; gap:10px 22px; margin-bottom:24px; font-size:.86rem; font-weight:700; color:var(--mute); }
    .bl-meta i { margin-right:6px; color:var(--pink); }
    .bl-btn { align-self:flex-start; display:inline-flex; align-items:center; gap:10px; padding:14px 26px; border-radius:12px; background:var(--pink); color:#fff; font-weight:700; text-decoration:none; box-shadow:0 6px 0 #7E004E; transition:translate .2s, box-shadow .2s; }
    .bl-btn:hover { color:#fff; translate:0 2px; box-shadow:0 4px 0 #7E004E; }
    .bl-btn i { transition:transform .3s ease; }
    .bl-btn:hover i { transform:translateX(5px); }

    /* CTA (dark card) */
    .bl-cta { position:relative; overflow:hidden; margin-top:64px; padding:60px 34px; text-align:center; color:#fff; background:var(--ink); border:3px solid var(--pink); border-radius:26px; }
    .bl-cta::before { content:''; position:absolute; inset:0; background:radial-gradient(50% 80% at 50% 120%,rgba(196,0,122,.7),transparent 70%),radial-gradient(rgba(255,255,255,.1) 1px,transparent 1.2px) 0 0/26px 26px; }
    .bl-cta > * { position:relative; }
    .bl-cta h3 { margin:0 auto 14px; max-width:760px; font-weight:800; font-size:clamp(1.8rem,3.6vw,2.8rem); line-height:1.12; color:#fff; }
    .bl-cta p { margin:0 auto 28px; max-width:560px; color:rgba(255,255,255,.8); line-height:1.65; }
    .bl-cta a { display:inline-flex; align-items:center; gap:10px; padding:14px 28px; border-radius:12px; background:var(--pink); color:#fff; font-weight:700; text-decoration:none; box-shadow:0 6px 0 #7E004E; transition:translate .2s, box-shadow .2s; }
    .bl-cta a:hover { color:#fff; translate:0 2px; box-shadow:0 4px 0 #7E004E; }

    /* Empty */
    .bl-empty { display:none; margin-top:20px; padding:60px 20px; text-align:center; background:#fff; border:2px dashed rgba(196,0,122,.5); border-radius:20px; color:var(--mute); }
    .bl-empty i { font-size:3rem; color:var(--pink); }
    .bl-empty h4 { margin:12px 0 6px; font-weight:800; color:var(--ink); }

    /* ========== RESPONSIVE ========== */
    @media (max-width:991.98px) {
        .bl-featured { grid-template-columns:1fr; }
        .bl-featured .bl-img { min-height:0; height:auto; aspect-ratio:16/10; border-right:0; border-bottom:2px solid var(--ink); }
        .bl-feat-body { padding:28px 22px; }
    }
    @media (max-width:767.98px) {
        .bl-wrap { padding:44px 0 60px; }
        .bl-chips { flex-wrap:nowrap; justify-content:flex-start; overflow-x:auto; margin:0 -22px 36px; padding:4px 22px 12px; scrollbar-width:none; -webkit-overflow-scrolling:touch; scroll-snap-type:x proximity; }
        .bl-chips::-webkit-scrollbar { display:none; }
        .bl-chip { flex-shrink:0; scroll-snap-align:start; }
        .bl-blob { display:none; }
        .bl-ribbon span { font-size:.9rem; padding:12px 20px; } .bl-ribbon span::after { margin-left:36px; }
    }
    @media (max-width:575.98px) {
        main .container { padding-left:16px; padding-right:16px; }
        .bl-chips { margin:0 -16px 30px; padding:4px 16px 12px; }
        .bl-hero { padding:48px 0 52px; }
        .bl-hero h1 { font-size:clamp(2rem,9.5vw,2.6rem); }
        .bl-hero p.sub { font-size:.98rem; margin-bottom:26px; }
        .bl-search input { padding:15px 18px 15px 48px; font-size:16px; } .bl-search i { left:17px; }
        .bl-featured { margin-bottom:44px; box-shadow:6px 6px 0 var(--gold); }
        .bl-card { box-shadow:4px 4px 0 var(--ink); }
        .bl-feat-body { padding:22px 18px; } .bl-feat-body .bl-title { font-size:1.35rem; }
        .bl-body { padding:18px; }
        .bl-btn, .bl-cta a { width:100%; justify-content:center; }
        .bl-sec-title h3 { font-size:1.35rem; }
        .bl-cta { padding:44px 20px; margin-top:48px; border-radius:20px; }
    }
    @media (max-width:380px) { .bl-author-name { max-width:80px; } }
    @media (hover:none) { .bl-card:hover, .bl-featured:hover, .bl-btn:hover, .bl-chip:hover { translate:none; } .bl-card:hover { box-shadow:6px 6px 0 var(--ink); } .bl-featured:hover { box-shadow:10px 10px 0 var(--gold); } }
    @media (prefers-reduced-motion:reduce) { .bl-blob,.bl-ribbon-track,.bl-hero h1 span { animation:none; } main * { transition:none !important; } }
</style>

<main>
    <!-- ===== HERO ===== -->
    <section class="bl-hero">
        <span class="bl-blob b1"></span><span class="bl-blob b2"></span>
        <div class="container">
            <span class="bl-kicker"><i class="bi bi-stars"></i> INDUSTRY INSIGHTS &amp; STRATEGY</span>
            <h1>Latest <span>Blogs &amp; Insights<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span></h1>
            <p class="sub">Practical insights, algorithmic updates, and digital marketing playbooks engineered for business growth.</p>
            <div class="bl-search">
                <i class="bi bi-search"></i>
                <input type="search" id="blSearch" placeholder="Search articles by topic, keyword, or strategy..." autocomplete="off" aria-label="Search articles">
            </div>
        </div>
    </section>

    <?php if ($totalPosts > 0): ?>
    <div class="bl-ribbon" aria-hidden="true">
        <div class="bl-ribbon-track">
            <?php for ($i = 0; $i < 6; $i++): ?>
                <span><?= (int) $totalPosts ?> articles</span><span>SEO &amp; growth playbooks</span><span>Web design insights</span><span>Digital marketing strategy</span>
            <?php endfor; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- ===== LIST ===== -->
    <section class="bl-wrap">
        <div class="container">

            <?php if ($totalPosts > 0): ?>

                <?php if (count($categories) > 1): ?>
                    <div class="bl-chips" id="blChips">
                        <button type="button" class="bl-chip active" data-cat="">All</button>
                        <?php foreach ($categories as $cat): ?>
                            <button type="button" class="bl-chip" data-cat="<?= e($cat) ?>"><?= e($cat) ?></button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($featured): ?>
                    <?php $fid = (int) ($featured['id'] ?? 0); $fImg = !empty($featured['image']); $fAuthor = (string) ($featured['author'] ?? ''); ?>
                    <article class="bl-featured bl-item <?= $fImg ? '' : 'no-img' ?>" <?= blDataAttrs($featured) ?>>
                        <?php if ($fImg): ?>
                            <a href="<?= blogUrl($featured) ?>" class="bl-img" aria-label="Read <?= e((string) $featured['title']) ?>">
                                <?= blImage($featured, false) ?>
                                <?php if (!empty($featured['readTime'])): ?><span class="bl-time"><i class="bi bi-clock"></i><?= e((string) $featured['readTime']) ?></span><?php endif; ?>
                            </a>
                        <?php endif; ?>
                        <div class="bl-feat-body">
                            <span class="bl-feat-tag"><i class="bi bi-lightning-charge-fill"></i> Featured<?= !empty($featured['category']) ? ' &middot; ' . e((string) $featured['category']) : '' ?></span>
                            <h2 class="bl-title"><a href="<?= blogUrl($featured) ?>"><?= e((string) $featured['title']) ?></a></h2>
                            <p class="bl-excerpt"><?= e((string) ($featured['summary'] ?? '')) ?></p>
                            <div class="bl-meta">
                                <?php if ($fAuthor !== ''): ?><span><i class="bi bi-person-circle"></i><?= e($fAuthor) ?></span><?php endif; ?>
                                <?php if (!empty($featured['date'])): ?><span><i class="bi bi-calendar3"></i><?= e((string) $featured['date']) ?></span><?php endif; ?>
                            </div>
                            <a href="<?= blogUrl($featured) ?>" class="bl-btn">Read Article <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </article>
                <?php endif; ?>

                <?php if ($posts): ?>
                    <div class="bl-sec-title">
                        <h3>More Articles</h3>
                        <span class="bl-count"><?= count($posts) ?> posts</span>
                        <span class="line"></span>
                    </div>
                    <div class="row g-4" id="blGrid">
                        <?php foreach ($posts as $post): ?>
                            <?php $pid = (int) ($post['id'] ?? 0); $pAuthor = (string) ($post['author'] ?? ''); ?>
                            <div class="col-12 col-md-6 col-lg-4 bl-item" <?= blDataAttrs($post) ?>>
                                <article class="bl-card">
                                    <a href="<?= blogUrl($post) ?>" class="bl-img" aria-label="Read <?= e((string) $post['title']) ?>">
                                        <?= blImage($post, true) ?>
                                        <?php if (!empty($post['category'])): ?><span class="bl-pill"><?= e((string) $post['category']) ?></span><?php endif; ?>
                                        <?php if (!empty($post['readTime'])): ?><span class="bl-time"><i class="bi bi-clock"></i><?= e((string) $post['readTime']) ?></span><?php endif; ?>
                                    </a>
                                    <div class="bl-body">
                                        <?php if (!empty($post['date'])): ?><div class="bl-date"><i class="bi bi-calendar3"></i><?= e((string) $post['date']) ?></div><?php endif; ?>
                                        <h2 class="bl-title"><a href="<?= blogUrl($post) ?>"><?= e((string) $post['title']) ?></a></h2>
                                        <p class="bl-excerpt"><?= e((string) ($post['summary'] ?? '')) ?></p>
                                        <div class="bl-foot">
                                            <span class="bl-author">
                                                <span class="bl-ava"><?= e($pAuthor !== '' ? strtoupper(substr($pAuthor, 0, 1)) : 'W') ?></span>
                                                <span class="bl-author-name"><?= e($pAuthor !== '' ? $pAuthor : 'WebTecMart') ?></span>
                                            </span>
                                            <a class="bl-arrow" href="<?= blogUrl($post) ?>" aria-label="Read more"><i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="bl-empty" id="blEmpty">
                    <i class="bi bi-search-heart"></i>
                    <h4>No articles found</h4>
                    <p style="margin:0;">Try a different keyword or pick another category.</p>
                </div>

                <!-- CTA -->
                <div class="bl-cta">
                    <h3>Ready to Grow Your Business?</h3>
                    <p>Get a free consultation and a tailored digital growth plan from our team.</p>
                    <a href="/contact.php">Get Free Consultation <i class="bi bi-arrow-right"></i></a>
                </div>

            <?php else: ?>
                <div class="bl-empty" style="display:block;">
                    <i class="bi bi-journal-text"></i>
                    <h4>No articles yet</h4>
                    <p style="margin:0;">No published articles are available right now. Please check back soon.</p>
                </div>
            <?php endif; ?>

        </div>
    </section>
</main>

<script>
    (function () {
        const search = document.getElementById('blSearch');
        const chips = document.querySelectorAll('.bl-chip');
        const items = document.querySelectorAll('.bl-item');
        const empty = document.getElementById('blEmpty');
        const secTitle = document.querySelector('.bl-sec-title');
        const counter = document.querySelector('.bl-count');
        let activeCat = '';

        function apply() {
            const q = (search ? search.value : '').trim().toLowerCase();
            let visible = 0, gridVisible = 0;
            items.forEach(function (el) {
                const okCat = !activeCat || el.dataset.cat === activeCat;
                const okText = !q || (el.dataset.search || '').indexOf(q) !== -1;
                const show = okCat && okText;
                el.style.display = show ? '' : 'none';
                if (show) {
                    visible++;
                    if (el.parentElement && el.parentElement.id === 'blGrid') gridVisible++;
                }
            });
            if (counter) counter.textContent = gridVisible + (gridVisible === 1 ? ' post' : ' posts');
            if (secTitle) secTitle.style.display = gridVisible ? '' : 'none';
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
    })();
</script>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>