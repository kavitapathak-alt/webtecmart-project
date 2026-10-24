<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

$blogPageMeta = [
    'page_meta_title' => 'Blog & Insights | ' . APP_NAME,
    'page_meta_description' => 'Read the latest digital marketing, SEO, web design, and business growth insights from WebTecMart.',
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
    return '<img class="bl-bgblur" src="' . $src . '" alt="" aria-hidden="true"' . $loading . ' ' . $err . '>'
         . '<img class="bl-main" src="' . $src . '" alt="' . $alt . '"' . $loading . ' ' . $err . '>';
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap-grid.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
    main *, main *::before, main *::after { box-sizing: border-box; }
    main .text-center { text-align: center; }
    main .position-relative { position: relative; }
    main h1, main h2, main h3, main h4, main p { margin-top: 0; }
    main img { max-width: 100%; }
</style>

<style>
    :root {
        --p50:#FFF5FA; --p100:#FDE7F3; --p200:#FBCFE6; --p300:#F5A3CF; --p400:#E0398F;
        --p500:#C4007A; --p600:#A3005F; --p700:#7A0047; --p800:#5C0035; --p900:#3D0023;
    }
    main { background: var(--p50); font-family: inherit; overflow-x: hidden; }
    main ::selection { background: var(--p300); color: var(--p900); }
    main a:focus-visible, main button:focus-visible, main input:focus-visible { outline: 3px solid var(--p400); outline-offset: 3px; }

    /* ========== HERO ========== */
    .bl-hero {
        position: relative; overflow: hidden; color: #fff; text-align: center;
        padding: 80px 0 150px;
        background:
            radial-gradient(circle at 15% 20%, rgba(245,163,207,.45) 0, transparent 38%),
            radial-gradient(circle at 85% 10%, rgba(224,57,143,.55) 0, transparent 40%),
            radial-gradient(rgba(255,255,255,.13) 1.5px, transparent 1.5px) 0 0/28px 28px,
            linear-gradient(135deg, var(--p800) 0%, var(--p600) 50%, var(--p400) 100%);
    }
    .bl-hero .container { position: relative; z-index: 2; }
    .bl-blob { position: absolute; border-radius: 50%; opacity: .5; animation: blFloat 9s ease-in-out infinite; pointer-events: none; }
    .bl-blob.b1 { width: 220px; height: 220px; left: -60px; bottom: 30px; background: radial-gradient(circle, var(--p300), transparent 70%); }
    .bl-blob.b2 { width: 160px; height: 160px; right: 8%; top: 40px; background: radial-gradient(circle, #fff, transparent 70%); opacity: .25; animation-delay: -4s; }
    @keyframes blFloat { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-22px); } }
    .bl-kicker {
        display: inline-flex; align-items: center; gap: 8px; padding: 8px 18px; border-radius: 50px;
        font-size: .78rem; font-weight: 700; letter-spacing: .14em; text-transform: uppercase;
        background: rgba(255,255,255,.14); border: 1px solid rgba(255,255,255,.3); backdrop-filter: blur(6px);
    }
    .bl-hero h1 { margin: 18px 0 14px; font-weight: 800; font-size: clamp(2rem, 5vw, 3.7rem); line-height: 1.12; letter-spacing: -.02em; }
    .bl-hero h1 span { color: var(--p200); }
    .bl-hero p.sub { margin: 0 auto 30px; max-width: 620px; font-size: 1.1rem; line-height: 1.7; color: rgba(255,255,255,.9); }
    .bl-wave { position: absolute; left: 0; right: 0; bottom: -1px; line-height: 0; z-index: 1; }
    .bl-wave svg { display: block; width: 100%; height: 90px; }

    /* Search */
    .bl-search { position: relative; max-width: 560px; margin: 0 auto; }
    .bl-search input {
        width: 100%; border: 0; outline: 0; padding: 18px 24px 18px 56px; border-radius: 60px; font-size: 1rem; font-family: inherit;
        color: var(--p800); background: #fff; box-shadow: 0 18px 40px rgba(61,0,35,.35);
        -webkit-appearance: none; appearance: none;
    }
    .bl-search input::placeholder { color: var(--p300); }
    .bl-search input:focus { box-shadow: 0 18px 40px rgba(61,0,35,.35), 0 0 0 4px rgba(245,163,207,.7); outline: 0; }
    .bl-search input::-webkit-search-cancel-button { -webkit-appearance: none; }
    .bl-search i { position: absolute; left: 22px; top: 50%; transform: translateY(-50%); color: var(--p500); font-size: 1.15rem; pointer-events: none; }

    /* ========== BODY ========== */
    .bl-wrap { padding: 0 0 90px; margin-top: -40px; position: relative; z-index: 2; }

    /* Chips */
    .bl-chips { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-bottom: 44px; }
    .bl-chip {
        border: 1.5px solid var(--p200); background: #fff; color: var(--p600); font-weight: 600; font-size: .88rem; font-family: inherit;
        padding: 9px 20px; border-radius: 50px; cursor: pointer; transition: all .25s ease; white-space: nowrap;
        -webkit-tap-highlight-color: transparent;
    }
    .bl-chip:hover { border-color: var(--p400); color: var(--p500); transform: translateY(-2px); }
    .bl-chip.active { color: #fff; border-color: transparent; background: linear-gradient(90deg, var(--p500), var(--p400)); box-shadow: 0 10px 22px rgba(196,0,122,.35); }

    /* Section title */
    .bl-sec-title { display: flex; align-items: center; gap: 14px; margin: 0 0 26px; flex-wrap: wrap; }
    .bl-sec-title h3 { margin: 0; font-weight: 800; font-size: 1.5rem; color: var(--p900); }
    .bl-sec-title .line { flex: 1; min-width: 40px; height: 3px; border-radius: 3px; background: linear-gradient(90deg, var(--p300), transparent); }
    .bl-count { font-size: .8rem; font-weight: 700; color: var(--p500); background: var(--p100); padding: 5px 13px; border-radius: 50px; white-space: nowrap; }

    /* Image block */
    .bl-img {
        position: relative; display: block; overflow: hidden; isolation: isolate;
        background: linear-gradient(135deg, var(--p200), var(--p400));
    }
    .bl-img::before {
        content: "\F4E5"; font-family: "bootstrap-icons"; position: absolute; inset: 0; z-index: 0;
        display: flex; align-items: center; justify-content: center; font-size: 3.2rem; color: rgba(255,255,255,.7);
    }
    .bl-img .bl-bgblur {
        position: absolute; inset: -20px; z-index: 1; width: calc(100% + 40px); height: calc(100% + 40px); max-width: none;
        object-fit: cover; filter: blur(22px) saturate(1.2); opacity: .95;
    }
    .bl-img .bl-main {
        position: relative; z-index: 2; display: block; width: 100%; height: 100%;
        object-fit: contain; transition: transform .6s ease;
    }
    .bl-img.noimg .bl-main, .bl-img.noimg .bl-bgblur { display: none; }
    .bl-img::after { content: ""; position: absolute; inset: 0; z-index: 3; background: linear-gradient(180deg, rgba(92,0,53,.16), transparent 30%, transparent 70%, rgba(92,0,53,.2)); pointer-events: none; }
    .bl-pill {
        position: absolute; z-index: 4; top: 14px; left: 14px; max-width: calc(100% - 28px); overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        padding: 6px 14px; border-radius: 50px; font-size: .72rem; font-weight: 800;
        letter-spacing: .06em; text-transform: uppercase; color: #fff; background: linear-gradient(90deg, var(--p500), var(--p400));
        box-shadow: 0 6px 16px rgba(196,0,122,.45);
    }
    .bl-time {
        position: absolute; z-index: 4; bottom: 12px; right: 12px; padding: 5px 12px; border-radius: 50px; font-size: .75rem; font-weight: 600;
        color: var(--p700); background: rgba(255,255,255,.94);
    }
    .bl-time i { color: var(--p500); margin-right: 4px; }

    /* Cards */
    .bl-card {
        height: 100%; display: flex; flex-direction: column; background: #fff; border-radius: 24px; overflow: hidden;
        border: 1.5px solid var(--p100); box-shadow: 0 10px 30px rgba(196,0,122,.08);
        transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
    }
    .bl-card:hover { transform: translateY(-8px); border-color: var(--p300); box-shadow: 0 28px 55px rgba(196,0,122,.22); }
    .bl-card .bl-img { aspect-ratio: 16 / 10; flex-shrink: 0; }
    .bl-card:hover .bl-img .bl-main, .bl-featured:hover .bl-img .bl-main { transform: scale(1.03); }
    .bl-body { display: flex; flex-direction: column; flex: 1; padding: 24px; min-width: 0; }
    .bl-date { font-size: .8rem; font-weight: 600; color: var(--p400); margin-bottom: 10px; }
    .bl-date i { margin-right: 6px; }
    .bl-title { margin: 0 0 12px; font-weight: 800; font-size: 1.22rem; line-height: 1.4; color: var(--p900); overflow-wrap: anywhere; }
    .bl-title a { color: inherit; text-decoration: none; background: linear-gradient(var(--p500), var(--p500)) 0 100%/0 2px no-repeat; transition: background-size .35s ease, color .25s ease; }
    .bl-card:hover .bl-title a, .bl-featured:hover .bl-title a { color: var(--p500); background-size: 100% 2px; }
    .bl-excerpt { margin: 0 0 20px; color: var(--p700); opacity: .85; line-height: 1.7; font-size: .96rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    .bl-foot { margin-top: auto; padding-top: 18px; border-top: 1.5px dashed var(--p200); display: flex; align-items: center; justify-content: space-between; gap: 10px; }
    .bl-author { display: flex; align-items: center; gap: 10px; font-size: .85rem; font-weight: 600; color: var(--p700); min-width: 0; }
    .bl-author-name { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .bl-ava {
        flex-shrink: 0; width: 36px; height: 36px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center;
        font-weight: 800; font-size: .85rem; color: #fff; background: linear-gradient(135deg, var(--p500), var(--p400));
    }
    .bl-arrow {
        flex-shrink: 0; width: 42px; height: 42px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; text-decoration: none;
        color: var(--p500); background: var(--p100); transition: all .3s ease;
    }
    .bl-card:hover .bl-arrow { color: #fff; background: linear-gradient(135deg, var(--p500), var(--p400)); transform: rotate(-45deg); box-shadow: 0 8px 18px rgba(196,0,122,.4); }

    /* Featured */
    .bl-featured {
        display: grid; grid-template-columns: 1.1fr 1fr; background: #fff; border-radius: 30px; overflow: hidden; margin-bottom: 56px;
        border: 1.5px solid var(--p100); box-shadow: 0 25px 60px rgba(196,0,122,.16);
        transition: box-shadow .35s ease, transform .35s ease;
    }
    .bl-featured:hover { transform: translateY(-5px); box-shadow: 0 35px 70px rgba(196,0,122,.26); }
    .bl-featured .bl-img { min-height: 380px; height: 100%; }
    .bl-featured.no-img { grid-template-columns: 1fr; }
    .bl-feat-body { padding: 46px; display: flex; flex-direction: column; justify-content: center; min-width: 0; }
    .bl-feat-tag {
        align-self: flex-start; display: inline-flex; align-items: center; gap: 7px; margin-bottom: 18px; padding: 7px 16px; border-radius: 50px;
        font-size: .75rem; font-weight: 800; letter-spacing: .1em; text-transform: uppercase; color: #fff;
        background: linear-gradient(90deg, var(--p600), var(--p400));
    }
    .bl-feat-body .bl-title { font-size: clamp(1.45rem, 2.8vw, 2.2rem); line-height: 1.25; }
    .bl-feat-body .bl-excerpt { -webkit-line-clamp: 4; font-size: 1.02rem; }
    .bl-meta { display: flex; flex-wrap: wrap; gap: 10px 22px; margin-bottom: 26px; font-size: .86rem; font-weight: 600; color: var(--p600); }
    .bl-meta i { color: var(--p400); margin-right: 6px; }
    .bl-btn {
        align-self: flex-start; display: inline-flex; align-items: center; gap: 10px; padding: 14px 30px; border-radius: 50px; text-decoration: none;
        font-weight: 700; color: #fff; background: linear-gradient(90deg, var(--p500), var(--p400)); transition: all .3s ease;
        box-shadow: 0 12px 26px rgba(196,0,122,.35);
    }
    .bl-btn:hover { color: #fff; transform: translateY(-3px); box-shadow: 0 18px 34px rgba(196,0,122,.5); }
    .bl-btn i { transition: transform .3s ease; }
    .bl-btn:hover i { transform: translateX(5px); }

    /* CTA */
    .bl-cta {
        position: relative; overflow: hidden; margin-top: 70px; padding: 56px 30px; border-radius: 32px; text-align: center; color: #fff;
        background:
            radial-gradient(circle at 90% 0%, rgba(245,163,207,.5), transparent 45%),
            radial-gradient(rgba(255,255,255,.12) 1.5px, transparent 1.5px) 0 0/26px 26px,
            linear-gradient(135deg, var(--p800), var(--p500) 60%, var(--p400));
        box-shadow: 0 30px 60px rgba(196,0,122,.3);
    }
    .bl-cta h3 { margin: 0 0 10px; font-weight: 800; font-size: clamp(1.4rem, 3vw, 2.2rem); }
    .bl-cta p { margin: 0 auto 26px; max-width: 540px; color: rgba(255,255,255,.9); line-height: 1.7; }
    .bl-cta a { display: inline-flex; align-items: center; gap: 10px; padding: 15px 34px; border-radius: 50px; background: #fff; color: var(--p500); font-weight: 800; text-decoration: none; transition: all .3s ease; }
    .bl-cta a:hover { transform: translateY(-3px); box-shadow: 0 16px 32px rgba(61,0,35,.35); color: var(--p600); }

    /* Empty */
    .bl-empty { display: none; text-align: center; padding: 60px 20px; background: #fff; border: 1.5px dashed var(--p300); border-radius: 26px; color: var(--p600); margin-top: 20px; }
    .bl-empty i { font-size: 3rem; color: var(--p400); }
    .bl-empty h4 { margin: 12px 0 6px; font-weight: 800; color: var(--p900); }

    /* ========== RESPONSIVE ========== */

    /* Tablet */
    @media (max-width: 991.98px) {
        .bl-featured { grid-template-columns: 1fr; border-radius: 24px; }
        .bl-featured .bl-img { min-height: 0; height: auto; aspect-ratio: 16 / 10; }
        .bl-feat-body { padding: 28px 22px; }
    }

    /* Mobile */
    @media (max-width: 767.98px) {
        .bl-wrap { margin-top: -30px; padding-bottom: 60px; }
        .bl-chips {
            flex-wrap: nowrap; justify-content: flex-start; overflow-x: auto;
            margin: 0 -16px 32px; padding: 4px 16px 12px;
            scrollbar-width: none; -webkit-overflow-scrolling: touch;
            scroll-snap-type: x proximity;
        }
        .bl-chips::-webkit-scrollbar { display: none; }
        .bl-chip { flex-shrink: 0; scroll-snap-align: start; }
        .bl-featured { margin-bottom: 40px; }
        .bl-sec-title h3 { font-size: 1.25rem; }
        .bl-card { border-radius: 20px; }
        .bl-card:hover, .bl-featured:hover { transform: none; }
        .bl-card:hover .bl-img .bl-main, .bl-featured:hover .bl-img .bl-main { transform: none; }
        .bl-card:hover .bl-arrow { transform: none; }
        .bl-cta { margin-top: 50px; padding: 40px 20px; border-radius: 24px; }
        .bl-blob { display: none; }
    }

    /* Small Mobile */
    @media (max-width: 575.98px) {
        .bl-hero { padding: 52px 0 110px; }
        .bl-hero h1 { font-size: clamp(1.6rem, 8vw, 2.2rem); margin: 14px 0 10px; }
        .bl-hero p.sub { font-size: .98rem; padding: 0 12px; margin-bottom: 24px; }
        .bl-kicker { font-size: .68rem; padding: 7px 14px; }
        .bl-search input { padding: 15px 20px 15px 48px; font-size: .95rem; }
        .bl-search i { left: 18px; font-size: 1.05rem; }
        .bl-wrap { margin-top: -20px; padding-bottom: 50px; }
        .bl-chips { margin: 0 -12px 24px; padding: 4px 12px 10px; }
        .bl-chip { font-size: .82rem; padding: 8px 16px; }
        .bl-feat-body { padding: 22px 18px; }
        .bl-feat-body .bl-title { font-size: 1.25rem; }
        .bl-feat-tag { font-size: .68rem; padding: 6px 13px; margin-bottom: 12px; }
        .bl-meta { gap: 8px 16px; font-size: .8rem; margin-bottom: 20px; }
        .bl-body { padding: 18px; }
        .bl-title { font-size: 1.1rem; }
        .bl-excerpt { font-size: .92rem; }
        .bl-btn, .bl-cta a { width: 100%; justify-content: center; padding: 13px 24px; }
        .bl-sec-title { gap: 10px; margin-bottom: 20px; }
        .bl-sec-title h3 { font-size: 1.15rem; }
        .bl-count { font-size: .72rem; padding: 4px 11px; }
        .bl-cta { padding: 36px 18px; margin-top: 44px; }
        .bl-cta h3 { font-size: 1.3rem; }
        .bl-cta p { font-size: .92rem; }
        .bl-foot { padding-top: 14px; gap: 8px; }
        .bl-ava { width: 32px; height: 32px; font-size: .78rem; }
        .bl-author-name { font-size: .8rem; }
        .bl-arrow { width: 38px; height: 38px; font-size: .9rem; }
        .bl-pill { top: 10px; left: 10px; padding: 5px 12px; font-size: .68rem; }
        .bl-time { bottom: 10px; right: 10px; padding: 4px 10px; font-size: .7rem; }
    }

    /* Very Small Mobile */
    @media (max-width: 380px) {
        .bl-hero h1 { font-size: 1.45rem; }
        .bl-feat-body .bl-title { font-size: 1.15rem; }
        .bl-title { font-size: 1.02rem; }
        .bl-author-name { max-width: 80px; }
    }

    @media (prefers-reduced-motion: reduce) {
        .bl-blob { animation: none; }
        main * { transition: none !important; }
    }
</style>

<main>
    <!-- ===== HERO ===== -->
    <section class="bl-hero">
        <span class="bl-blob b1"></span><span class="bl-blob b2"></span>
        <div class="container">
            <span class="bl-kicker"><i class="bi bi-stars"></i> WebTecMart Insights</span>
            <h1>Latest <span>Blogs &amp; Insights</span></h1>
            <p class="sub">Ideas, strategies, and practical guidance to support your digital growth.</p>
            <div class="bl-search">
                <i class="bi bi-search"></i>
                <input type="search" id="blSearch" placeholder="Search articles..." autocomplete="off" aria-label="Search articles">
            </div>
        </div>
        <div class="bl-wave">
            <svg viewBox="0 0 1440 90" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path fill="#FFF5FA" d="M0,48 C240,100 480,0 720,40 C960,80 1200,100 1440,36 L1440,90 L0,90 Z"/>
            </svg>
        </div>
    </section>

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
                            <a href="/blog.php?id=<?= $fid ?>" class="bl-img" aria-label="Read <?= e((string) $featured['title']) ?>">
                                <?= blImage($featured, false) ?>
                                <?php if (!empty($featured['readTime'])): ?><span class="bl-time"><i class="bi bi-clock"></i><?= e((string) $featured['readTime']) ?></span><?php endif; ?>
                            </a>
                        <?php endif; ?>
                        <div class="bl-feat-body">
                            <span class="bl-feat-tag"><i class="bi bi-lightning-charge-fill"></i> Featured<?= !empty($featured['category']) ? ' &middot; ' . e((string) $featured['category']) : '' ?></span>
                            <h2 class="bl-title"><a href="/blog.php?id=<?= $fid ?>"><?= e((string) $featured['title']) ?></a></h2>
                            <p class="bl-excerpt"><?= e((string) ($featured['summary'] ?? '')) ?></p>
                            <div class="bl-meta">
                                <?php if ($fAuthor !== ''): ?><span><i class="bi bi-person-circle"></i><?= e($fAuthor) ?></span><?php endif; ?>
                                <?php if (!empty($featured['date'])): ?><span><i class="bi bi-calendar3"></i><?= e((string) $featured['date']) ?></span><?php endif; ?>
                            </div>
                            <a href="/blog.php?id=<?= $fid ?>" class="bl-btn">Read Article <i class="bi bi-arrow-right"></i></a>
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
                                    <a href="/blog.php?id=<?= $pid ?>" class="bl-img" aria-label="Read <?= e((string) $post['title']) ?>">
                                        <?= blImage($post, true) ?>
                                        <?php if (!empty($post['category'])): ?><span class="bl-pill"><?= e((string) $post['category']) ?></span><?php endif; ?>
                                        <?php if (!empty($post['readTime'])): ?><span class="bl-time"><i class="bi bi-clock"></i><?= e((string) $post['readTime']) ?></span><?php endif; ?>
                                    </a>
                                    <div class="bl-body">
                                        <?php if (!empty($post['date'])): ?><div class="bl-date"><i class="bi bi-calendar3"></i><?= e((string) $post['date']) ?></div><?php endif; ?>
                                        <h2 class="bl-title"><a href="/blog.php?id=<?= $pid ?>"><?= e((string) $post['title']) ?></a></h2>
                                        <p class="bl-excerpt"><?= e((string) ($post['summary'] ?? '')) ?></p>
                                        <div class="bl-foot">
                                            <span class="bl-author">
                                                <span class="bl-ava"><?= e($pAuthor !== '' ? strtoupper(substr($pAuthor, 0, 1)) : 'W') ?></span>
                                                <span class="bl-author-name"><?= e($pAuthor !== '' ? $pAuthor : 'WebTecMart') ?></span>
                                            </span>
                                            <a class="bl-arrow" href="/blog.php?id=<?= $pid ?>" aria-label="Read more"><i class="bi bi-arrow-right"></i></a>
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

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>Kyuki Espe multiple members kaam karege yr