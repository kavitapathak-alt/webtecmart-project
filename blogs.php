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
<style>
    main *, main *::before, main *::after { box-sizing: border-box; }
    main .text-center { text-align: center; }
    main .position-relative { position: relative; }
    main h1, main h2, main h3, main h4, main p { margin-top: 0; }
    main img { max-width: 100%; }
</style>

<style>
    :root {
        --p50:#FFF8FC; --p100:#FFF0F7; --p200:#FCE7F3; --p300:#F5A3CF; --p400:#E0398F;
        --p500:#C4007A; --p600:#A3005F; --p700:#850053; --p800:#60003C; --p900:#111827;
    }
    main { background: #FFF8FC; font-family: inherit; overflow-x: hidden; }
    main ::selection { background: #FCE7F3; color: #C4007A; }
    main a:focus-visible, main button:focus-visible, main input:focus-visible { outline: 3px solid var(--p400); outline-offset: 3px; }

    /* ========== HERO ========== */
    .bl-hero {
        position: relative; overflow: hidden; text-align: center;
        padding: 56px 0 64px;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 60%, #FFF0F7 100%);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .bl-hero .container { position: relative; z-index: 2; }
    .bl-blob { position: absolute; border-radius: 50%; opacity: .45; animation: blFloat 9s ease-in-out infinite; pointer-events: none; }
    .bl-blob.b1 { width: 260px; height: 260px; left: -60px; top: -30px; background: radial-gradient(circle, rgba(224,57,143,0.18), transparent 70%); }
    .bl-blob.b2 { width: 220px; height: 220px; right: -40px; bottom: 10px; background: radial-gradient(circle, rgba(196,0,122,0.15), transparent 70%); animation-delay: -4s; }
    @keyframes blFloat { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-16px); } }
    .bl-kicker {
        display: inline-flex; align-items: center; gap: 8px; padding: 6px 18px; border-radius: 999px;
        font-size: .76rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase;
        color: #C4007A; background: #FFF0F7; border: 1.5px solid rgba(196, 0, 122, 0.2);
        box-shadow: 0 2px 10px rgba(196, 0, 122, 0.06);
    }
    .bl-hero h1 {
        margin: 18px 0 12px; font-weight: 800; font-size: clamp(2.1rem, 4.2vw, 3.2rem);
        line-height: 1.18; letter-spacing: -.025em; color: #111827;
    }
    .bl-hero h1 span { color: #C4007A; position: relative; display: inline-block; }
    .bl-hero h1 span svg { position: absolute; left: 0; bottom: -4px; width: 100%; height: 6px; pointer-events: none; }
    .bl-hero p.sub { margin: 0 auto 30px; max-width: 640px; font-size: 1.05rem; line-height: 1.65; color: #4B5563; }

    /* Search Bar */
    .bl-search { position: relative; max-width: 580px; margin: 0 auto; }
    .bl-search input {
        width: 100%; border: 1.5px solid rgba(196, 0, 122, 0.2); outline: 0; padding: 16px 24px 16px 54px;
        border-radius: 999px; font-size: 0.98rem; font-family: inherit;
        color: #111827; background: #FFFFFF; box-shadow: 0 10px 30px rgba(196, 0, 122, 0.08);
        transition: all .25s ease; -webkit-appearance: none; appearance: none;
    }
    .bl-search input::placeholder { color: #9CA3AF; }
    .bl-search input:focus {
        border-color: #C4007A; background: #FFFFFF;
        box-shadow: 0 14px 35px rgba(196, 0, 122, 0.16), 0 0 0 3px rgba(196, 0, 122, 0.12);
        outline: 0;
    }
    .bl-search input::-webkit-search-cancel-button { -webkit-appearance: none; }
    .bl-search i { position: absolute; left: 22px; top: 50%; transform: translateY(-50%); color: #C4007A; font-size: 1.15rem; pointer-events: none; }

    /* ========== BODY ========== */
    .bl-wrap { padding: 44px 0 90px; position: relative; z-index: 2; }

    /* Chips */
    .bl-chips { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-bottom: 40px; }
    .bl-chip {
        border: 1.5px solid rgba(196, 0, 122, 0.15); background: #FFFFFF; color: #4B5563; font-weight: 700; font-size: .88rem; font-family: inherit;
        padding: 9px 22px; border-radius: 999px; cursor: pointer; transition: all .25s ease; white-space: nowrap;
        box-shadow: 0 2px 8px rgba(196, 0, 122, 0.04);
        -webkit-tap-highlight-color: transparent;
    }
    .bl-chip:hover { border-color: #C4007A; color: #C4007A; transform: translateY(-2px); box-shadow: 0 6px 16px rgba(196, 0, 122, 0.12); }
    .bl-chip.active { color: #FFFFFF; border-color: transparent; background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%); box-shadow: 0 8px 22px rgba(196, 0, 122, 0.35); }

    /* Section title */
    .bl-sec-title { display: flex; align-items: center; gap: 14px; margin: 0 0 26px; flex-wrap: wrap; }
    .bl-sec-title h3 { margin: 0; font-weight: 800; font-size: 1.45rem; color: #111827; }
    .bl-sec-title .line { flex: 1; min-width: 40px; height: 2px; border-radius: 2px; background: linear-gradient(90deg, rgba(196, 0, 122, 0.3), transparent); }
    .bl-count { font-size: .78rem; font-weight: 800; color: #C4007A; background: #FFF0F7; border: 1px solid rgba(196, 0, 122, 0.18); padding: 5px 14px; border-radius: 999px; white-space: nowrap; }

    /* Image block */
    .bl-img {
        position: relative; display: block; overflow: hidden; isolation: isolate;
        background: linear-gradient(135deg, #FFF0F7, #FCE7F3);
    }
    .bl-img::before {
        content: "\F4E5"; font-family: "bootstrap-icons"; position: absolute; inset: 0; z-index: 0;
        display: flex; align-items: center; justify-content: center; font-size: 3rem; color: rgba(196, 0, 122, 0.2);
    }
    .bl-img .bl-bgblur { display: none; }
    .bl-img .bl-main {
        position: relative; z-index: 2; display: block; width: 100%; height: 100%;
        object-fit: cover; object-position: center; transition: transform .5s ease;
    }
    .bl-img.noimg .bl-main, .bl-img.noimg .bl-bgblur { display: none; }
    .bl-img::after { content: ""; position: absolute; inset: 0; z-index: 3; background: linear-gradient(180deg, rgba(0,0,0,0.02), transparent 40%, rgba(0,0,0,0.1)); pointer-events: none; }
    .bl-pill {
        position: absolute; z-index: 4; top: 14px; left: 14px; max-width: calc(100% - 28px); overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        padding: 5px 14px; border-radius: 999px; font-size: .72rem; font-weight: 800;
        letter-spacing: .06em; text-transform: uppercase; color: #FFFFFF; background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        box-shadow: 0 4px 14px rgba(196, 0, 122, 0.35);
    }
    .bl-time {
        position: absolute; z-index: 4; bottom: 12px; right: 12px; padding: 5px 12px; border-radius: 999px; font-size: .75rem; font-weight: 700;
        color: #C4007A; background: rgba(255, 255, 255, 0.95); box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    .bl-time i { color: #C4007A; margin-right: 4px; }

    /* Cards */
    .bl-card {
        height: 100%; display: flex; flex-direction: column; background: #FFFFFF; border-radius: 22px; overflow: hidden;
        border: 1.5px solid rgba(196, 0, 122, 0.12); box-shadow: 0 8px 24px rgba(196, 0, 122, 0.06);
        transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
    }
    .bl-card:hover { transform: translateY(-7px); border-color: rgba(196, 0, 122, 0.35); box-shadow: 0 22px 48px rgba(196, 0, 122, 0.14); }
    .bl-card .bl-img { aspect-ratio: 16 / 10; flex-shrink: 0; }
    .bl-card:hover .bl-img .bl-main, .bl-featured:hover .bl-img .bl-main { transform: scale(1.04); }
    .bl-body { display: flex; flex-direction: column; flex: 1; padding: 22px; min-width: 0; }
    .bl-date { font-size: .78rem; font-weight: 700; color: #C4007A; margin-bottom: 8px; }
    .bl-date i { margin-right: 6px; }
    .bl-title { margin: 0 0 10px; font-weight: 800; font-size: 1.18rem; line-height: 1.35; color: #111827; overflow-wrap: anywhere; }
    .bl-title a { color: inherit; text-decoration: none; background: linear-gradient(#C4007A, #C4007A) 0 100%/0 2px no-repeat; transition: background-size .35s ease, color .25s ease; }
    .bl-card:hover .bl-title a, .bl-featured:hover .bl-title a { color: #C4007A; background-size: 100% 2px; }
    .bl-excerpt { margin: 0 0 18px; color: #4B5563; line-height: 1.6; font-size: .94rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    .bl-foot { margin-top: auto; padding-top: 16px; border-top: 1px solid rgba(196, 0, 122, 0.1); display: flex; align-items: center; justify-content: space-between; gap: 10px; }
    .bl-author { display: flex; align-items: center; gap: 10px; font-size: .84rem; font-weight: 700; color: #374151; min-width: 0; }
    .bl-author-name { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .bl-ava {
        flex-shrink: 0; width: 34px; height: 34px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center;
        font-weight: 800; font-size: .82rem; color: #FFFFFF; background: linear-gradient(135deg, #C4007A, #E0398F);
    }
    .bl-arrow {
        flex-shrink: 0; width: 38px; height: 38px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; text-decoration: none;
        color: #C4007A; background: #FFF0F7; border: 1px solid rgba(196, 0, 122, 0.15); transition: all .3s ease;
    }
    .bl-card:hover .bl-arrow { color: #FFFFFF; background: linear-gradient(135deg, #C4007A, #E0398F); border-color: transparent; transform: rotate(-45deg); box-shadow: 0 6px 16px rgba(196, 0, 122, 0.35); }

    /* Featured */
    .bl-featured {
        display: grid; grid-template-columns: 1.15fr 1fr; background: #FFFFFF; border-radius: 26px; overflow: hidden; margin-bottom: 50px;
        border: 1.5px solid rgba(196, 0, 122, 0.16); box-shadow: 0 16px 42px rgba(196, 0, 122, 0.08);
        transition: box-shadow .35s ease, transform .35s ease, border-color .35s ease;
    }
    .bl-featured:hover { transform: translateY(-4px); border-color: rgba(196, 0, 122, 0.35); box-shadow: 0 24px 55px rgba(196, 0, 122, 0.15); }
    .bl-featured .bl-img { min-height: 380px; height: 100%; }
    .bl-featured.no-img { grid-template-columns: 1fr; }
    .bl-feat-body { padding: 42px; display: flex; flex-direction: column; justify-content: center; min-width: 0; }
    .bl-feat-tag {
        align-self: flex-start; display: inline-flex; align-items: center; gap: 7px; margin-bottom: 16px; padding: 6px 16px; border-radius: 999px;
        font-size: .74rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: #C4007A;
        background: #FFF0F7; border: 1.5px solid rgba(196, 0, 122, 0.22);
    }
    .bl-feat-body .bl-title { font-size: clamp(1.4rem, 2.6vw, 2.1rem); line-height: 1.25; color: #111827; }
    .bl-feat-body .bl-excerpt { -webkit-line-clamp: 4; font-size: 1rem; color: #4B5563; line-height: 1.65; }
    .bl-meta { display: flex; flex-wrap: wrap; gap: 10px 22px; margin-bottom: 24px; font-size: .86rem; font-weight: 600; color: #6B7280; }
    .bl-meta i { color: #C4007A; margin-right: 6px; }
    .bl-btn {
        align-self: flex-start; display: inline-flex; align-items: center; gap: 10px; padding: 13px 30px; border-radius: 999px; text-decoration: none;
        font-weight: 700; color: #FFFFFF; background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%); transition: all .3s ease;
        box-shadow: 0 8px 22px rgba(196, 0, 122, 0.32);
    }
    .bl-btn:hover { color: #FFFFFF; transform: translateY(-2px); box-shadow: 0 12px 28px rgba(196, 0, 122, 0.45); }
    .bl-btn i { transition: transform .3s ease; }
    .bl-btn:hover i { transform: translateX(5px); }

    /* CTA */
    .bl-cta {
        position: relative; overflow: hidden; margin-top: 60px; padding: 50px 32px; border-radius: 28px; text-align: center; color: #111827;
        background: linear-gradient(135deg, #FFF0F7 0%, #FFFFFF 50%, #FCE7F3 100%);
        border: 1.5px solid rgba(196, 0, 122, 0.18);
        box-shadow: 0 18px 40px rgba(196, 0, 122, 0.08);
    }
    .bl-cta h3 { margin: 0 0 10px; font-weight: 800; font-size: clamp(1.4rem, 2.8vw, 2.1rem); color: #111827; }
    .bl-cta p { margin: 0 auto 24px; max-width: 540px; color: #4B5563; line-height: 1.65; font-size: 1rem; }
    .bl-cta a {
        display: inline-flex; align-items: center; gap: 10px; padding: 13px 32px; border-radius: 999px;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%); color: #FFFFFF; font-weight: 700; text-decoration: none;
        transition: all .25s ease; box-shadow: 0 8px 22px rgba(196, 0, 122, 0.3);
    }
    .bl-cta a:hover { transform: translateY(-2px); box-shadow: 0 12px 28px rgba(196, 0, 122, 0.45); color: #FFFFFF; }

    /* Empty */
    .bl-empty { display: none; text-align: center; padding: 60px 20px; background: #FFFFFF; border: 1.5px dashed rgba(196, 0, 122, 0.25); border-radius: 24px; color: #6B7280; margin-top: 20px; }
    .bl-empty i { font-size: 3rem; color: #C4007A; }
    .bl-empty h4 { margin: 12px 0 6px; font-weight: 800; color: #111827; }

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
            <span class="bl-kicker"><i class="bi bi-stars"></i> INDUSTRY INSIGHTS &amp; STRATEGY</span>
            <h1>Latest <span>Blogs &amp; Insights<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span></h1>
            <p class="sub">Practical insights, algorithmic updates, and digital marketing playbooks engineered for business growth.</p>
            <div class="bl-search">
                <i class="bi bi-search"></i>
                <input type="search" id="blSearch" placeholder="Search articles by topic, keyword, or strategy..." autocomplete="off" aria-label="Search articles">
            </div>
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
