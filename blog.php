<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

$requestedPostId = filter_var($_GET['id'] ?? 0, FILTER_VALIDATE_INT) ?: 0;
$managedPosts = blogPosts();
$post = null;
if ($requestedPostId > 0) {
    foreach ($managedPosts as $managedPost) {
        if ((int) ($managedPost['id'] ?? 0) === $requestedPostId) {
            $post = $managedPost;
            break;
        }
    }
} else {
    $post = $managedPosts[0] ?? null;
}
$isNotFound = false;
if ($post === null) {
    $isNotFound = true;
    http_response_code(404);
    $post = [
        'id' => 0,
        'title' => 'Blog post not found',
        'summary' => '',
        'body' => 'This blog post is unavailable or has been removed.',
        'category' => '',
        'author' => '',
        'date' => '',
        'readTime' => '',
        'likes' => 0,
        'image' => '',
    ];
}

// Related posts (current post ko chhodkar, max 3)
$currentId = (int) ($post['id'] ?? 0);
$relatedPosts = [];
foreach ($managedPosts as $p) {
    if ((int) ($p['id'] ?? 0) !== $currentId) $relatedPosts[] = $p;
    if (count($relatedPosts) >= 3) break;
}

$blogPageMeta = [
    'page_meta_title' => (string) ($post['title'] ?? APP_NAME),
    'page_meta_description' => (string) ($post['summary'] ?? ''),
];
require_once __DIR__ . '/app/templates/header.php';

// Escape first, then allow **bold** only (safe)
function blogInline(string $text): string
{
    return preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', e($text));
}

function renderBlogContent(string $content): void
{
    $paragraph = [];
    $list = [];
    $listTag = 'ul';
    $flushParagraph = static function () use (&$paragraph): void {
        if (!$paragraph) return;
        echo '<p>' . blogInline(implode(' ', $paragraph)) . '</p>';
        $paragraph = [];
    };
    $flushList = static function () use (&$list, &$listTag): void {
        if (!$list) return;
        echo '<' . $listTag . '>';
        foreach ($list as $item) echo '<li>' . blogInline($item) . '</li>';
        echo '</' . $listTag . '>';
        $list = [];
    };
    foreach (preg_split('/\r\n|\r|\n/', $content) as $line) {
        $line = trim($line);
        if ($line === '') {
            $flushParagraph();
            $flushList();
        } elseif (preg_match('/^(#{1,3})\s+(.+)$/', $line, $heading)) {
            $flushParagraph();
            $flushList();
            $level = strlen($heading[1]) + 1;
            echo '<h' . $level . '>' . e($heading[2]) . '</h' . $level . '>';
        } elseif (preg_match('/^[-*]\s+(.+)$/', $line, $item)) {
            $flushParagraph();
            if ($list && $listTag !== 'ul') $flushList();
            $listTag = 'ul';
            $list[] = $item[1];
        } elseif (preg_match('/^\d+[.)]\s+(.+)$/', $line, $item)) {
            $flushParagraph();
            if ($list && $listTag !== 'ol') $flushList();
            $listTag = 'ol';
            $list[] = $item[1];
        } else {
            $flushList();
            $paragraph[] = $line;
        }
    }
    $flushParagraph();
    $flushList();
}

$hasImage = !empty($post['image']) && !$isNotFound;
$authorName = (string) ($post['author'] ?? '');
$authorInitial = $authorName !== '' ? strtoupper(substr($authorName, 0, 1)) : 'W';
$imgErr = "onerror=\"this.closest('.has-fallback').classList.add('noimg')\"";
?>

<!-- Bootstrap 5 GRID only (reboot nahi) taaki header ki styling na bigde -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap-grid.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
    main *, main *::before, main *::after { box-sizing: border-box; }
    main .text-center { text-align: center; }
    main .position-relative { position: relative; }
    main h1, main h2, main h3, main h4, main p { margin-top: 0; }
    main img { max-width: 100%; }
    /* full-width layout */
    main .container { max-width: 1400px; width: 100%; padding-left: 24px; padding-right: 24px; margin-left: auto; margin-right: auto; }
</style>

<style>
    :root {
        --p50:#FFF5FA; --p100:#FDE7F3; --p200:#FBCFE6; --p300:#F5A3CF; --p400:#E0398F;
        --p500:#C4007A; --p600:#A3005F; --p700:#7A0047; --p800:#5C0035; --p900:#3D0023;
    }
    main { background: var(--p50); font-family: inherit; overflow-x: hidden; }
    main ::selection { background: var(--p300); color: var(--p900); }
    main a:focus-visible, main button:focus-visible { outline: 3px solid var(--p400); outline-offset: 3px; }

    #bpProgress { position: fixed; top: 0; left: 0; height: 5px; width: 0; z-index: 99999; border-radius: 0 6px 6px 0;
        background: linear-gradient(90deg, var(--p300), var(--p500), var(--p800)); transition: width .1s linear; }

    /* ========== HERO ========== */
    .bp-hero {
        position: relative; overflow: hidden; color: #fff; padding: 34px 0 105px;
        background:
            radial-gradient(circle at 12% 25%, rgba(245,163,207,.45) 0, transparent 38%),
            radial-gradient(circle at 88% 5%, rgba(224,57,143,.55) 0, transparent 40%),
            radial-gradient(rgba(255,255,255,.13) 1.5px, transparent 1.5px) 0 0/28px 28px,
            linear-gradient(135deg, var(--p800) 0%, var(--p600) 50%, var(--p400) 100%);
    }
    .bp-hero-bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: .16; mix-blend-mode: soft-light; pointer-events: none; }
    .bp-hero .container { position: relative; z-index: 2; }
    .bp-wave { position: absolute; left: 0; right: 0; bottom: -1px; line-height: 0; z-index: 1; }
    .bp-wave svg { display: block; width: 100%; height: 55px; }
    .bp-crumbs { display: flex; flex-wrap: wrap; align-items: center; gap: 8px; margin-bottom: 14px; font-size: .85rem; font-weight: 600; }
    .bp-crumbs a { color: rgba(255,255,255,.9); text-decoration: none; padding: 6px 14px; border-radius: 50px; background: rgba(255,255,255,.13); border: 1px solid rgba(255,255,255,.25); transition: all .25s ease; }
    .bp-crumbs a:hover { background: rgba(255,255,255,.28); color: #fff; }
    .bp-crumbs i { color: var(--p200); font-size: .75rem; }
    .bp-cat { display: inline-block; margin-bottom: 10px; padding: 7px 17px; border-radius: 50px; font-size: .75rem; font-weight: 800; letter-spacing: .1em; text-transform: uppercase;
        color: var(--p600); background: #fff; box-shadow: 0 8px 20px rgba(61,0,35,.3); }
    .bp-title { margin: 0 0 16px; font-weight: 800; font-size: clamp(1.55rem, 3.4vw, 2.5rem); line-height: 1.2; letter-spacing: -.02em; max-width: 1000px; overflow-wrap: anywhere; }
    .bp-chips { display: flex; flex-wrap: wrap; gap: 12px; }
    .bp-chip { display: inline-flex; align-items: center; gap: 9px; padding: 8px 18px 8px 8px; border-radius: 50px; font-size: .9rem; font-weight: 600;
        background: rgba(255,255,255,.14); border: 1px solid rgba(255,255,255,.28); backdrop-filter: blur(6px); }
    .bp-chip.plain { padding: 11px 18px; }
    .bp-chip i { color: var(--p200); }
    .bp-avatar { width: 34px; height: 34px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-weight: 800; font-size: .85rem;
        color: var(--p600); background: #fff; }

    /* ========== LAYOUT ========== */
    .bp-wrap { padding-bottom: 70px; margin-top: -62px; position: relative; z-index: 3; }
    .bp-card { background: #fff; border-radius: 30px; overflow: hidden; border: 1.5px solid var(--p100); box-shadow: 0 30px 70px rgba(196,0,122,.16); }

    /* Cover: full image, no crop, blurred backdrop for side gaps */
    .bp-cover { position: relative; overflow: hidden; isolation: isolate; line-height: 0; background: linear-gradient(135deg, var(--p200), var(--p400)); }
    .bp-cover .bg { position: absolute; inset: -24px; z-index: 0; width: calc(100% + 48px); height: calc(100% + 48px); max-width: none; object-fit: cover; filter: blur(26px) saturate(1.2); }
    .bp-cover .main { position: relative; z-index: 1; display: block; width: 100%; height: auto; max-height: 420px; object-fit: contain; margin: 0 auto; }
    .bp-cover.noimg { display: none; }

    .bp-inner { padding: 32px 36px; }
    .bp-lead { margin: 0 0 22px; padding: 16px 22px; border-radius: 20px; font-size: 1.18rem; line-height: 1.75; font-weight: 600; color: var(--p700);
        background: linear-gradient(135deg, var(--p100), var(--p50)); border-left: 6px solid var(--p500); }

    .bp-content { color: var(--p800); font-size: 1.05rem; line-height: 1.7; overflow-wrap: anywhere; }
    .bp-content p { margin: 0 0 .9em; }
    .bp-content h2 { margin: 1.3em 0 .5em; font-weight: 800; font-size: 1.75rem; line-height: 1.3; color: var(--p900); scroll-margin-top: 110px; }
    .bp-content h2::before { content: ""; display: inline-block; width: 8px; height: 1.05em; vertical-align: -.14em; margin-right: 12px; border-radius: 6px; background: linear-gradient(180deg, var(--p500), var(--p300)); }
    .bp-content h3 { margin: 1.1em 0 .4em; font-weight: 800; font-size: 1.35rem; color: var(--p600); scroll-margin-top: 110px; }
    .bp-content h4 { margin: 1.4em 0 .5em; font-weight: 800; font-size: 1.12rem; color: var(--p600); }
    .bp-content ul, .bp-content ol { margin: 0 0 1em; padding: 0; list-style: none; }
    .bp-content ol { counter-reset: bpn; }
    .bp-content li { position: relative; margin-bottom: .5em; padding: 9px 14px 9px 50px; border-radius: 14px; background: var(--p50); border: 1px solid var(--p100); }
    .bp-content ul li::before { content: "\F26A"; font-family: "bootstrap-icons"; position: absolute; left: 16px; top: 11px; color: var(--p500); font-size: 1.15rem; }
    .bp-content ol li { counter-increment: bpn; }
    .bp-content ol li::before { content: counter(bpn); position: absolute; left: 14px; top: 12px; width: 26px; height: 26px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: .8rem; font-weight: 800; line-height: 1; color: #fff; background: var(--p500); }
    .bp-content a { color: var(--p500); font-weight: 600; text-underline-offset: 3px; }
    .bp-content strong { color: var(--p900); }
    .bp-content img { max-width: 100%; height: auto; border-radius: 16px; }

    /* Actions */
    .bp-actions { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 14px; margin-top: 26px; padding-top: 20px; border-top: 2px dashed var(--p200); }
    .bp-btns { display: flex; align-items: center; gap: 10px; }
    .bp-like { display: inline-flex; align-items: center; gap: 9px; border: 0; cursor: pointer; padding: 12px 24px; border-radius: 50px; font-weight: 700; font-size: .95rem; font-family: inherit; color: var(--p600); background: var(--p100); transition: all .25s ease; }
    .bp-like i { color: var(--p500); transition: transform .2s ease; }
    .bp-like:hover { background: var(--p200); }
    .bp-like.liked { color: #fff; background: linear-gradient(90deg, var(--p500), var(--p400)); box-shadow: 0 10px 22px rgba(196,0,122,.4); }
    .bp-like.liked i { color: #fff; }
    .bp-round { width: 48px; height: 48px; border-radius: 50%; border: 0; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; font-size: 1.05rem; color: var(--p600); background: var(--p100); transition: all .25s ease; }
    .bp-round:hover { color: #fff; background: var(--p500); transform: translateY(-3px); box-shadow: 0 10px 20px rgba(196,0,122,.35); }
    .bp-round.saved { color: #fff; background: var(--p500); }
    .bp-hint { font-size: .85rem; font-weight: 600; color: var(--p400); }

    /* Author box */
    .bp-author { display: flex; align-items: center; gap: 16px; margin-top: 20px; padding: 18px; border-radius: 22px; background: linear-gradient(135deg, var(--p100), var(--p50)); border: 1.5px solid var(--p200); }
    .bp-author .ava { flex-shrink: 0; width: 64px; height: 64px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.5rem; color: #fff; background: linear-gradient(135deg, var(--p500), var(--p400)); box-shadow: 0 10px 22px rgba(196,0,122,.35); }
    .bp-author small { display: block; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--p400); font-size: .72rem; }
    .bp-author strong { display: block; font-size: 1.15rem; color: var(--p900); }
    .bp-author span.t { color: var(--p600); font-size: .9rem; }

    /* ========== SIDEBAR ========== */
    .bp-side { position: sticky; top: 100px; display: flex; flex-direction: column; gap: 24px; }
    .bp-box { padding: 26px; background: #fff; border-radius: 26px; border: 1.5px solid var(--p100); box-shadow: 0 16px 40px rgba(196,0,122,.1); }
    .bp-box h4 { display: flex; align-items: center; gap: 10px; margin: 0 0 18px; font-weight: 800; font-size: 1.08rem; color: var(--p900); }
    .bp-box h4 i { color: var(--p500); }
    .bp-toc { list-style: none; margin: 0; padding: 0; max-height: 50vh; overflow-y: auto; }
    .bp-toc li a { display: block; padding: 9px 14px; margin-bottom: 4px; border-radius: 12px; font-size: .92rem; font-weight: 600; text-decoration: none; color: var(--p700); border-left: 3px solid transparent; transition: all .2s ease; }
    .bp-toc li.sub a { margin-left: 16px; font-weight: 500; font-size: .88rem; }
    .bp-toc li a:hover, .bp-toc li a.active { color: var(--p500); background: var(--p100); border-left-color: var(--p500); }
    .bp-cta { position: relative; overflow: hidden; padding: 30px 26px; border-radius: 26px; text-align: center; color: #fff;
        background: radial-gradient(circle at 90% 0%, rgba(245,163,207,.55), transparent 45%), radial-gradient(rgba(255,255,255,.12) 1.5px, transparent 1.5px) 0 0/24px 24px, linear-gradient(135deg, var(--p800), var(--p500) 60%, var(--p400));
        box-shadow: 0 24px 50px rgba(196,0,122,.3); }
    .bp-cta .ic { width: 58px; height: 58px; margin: 0 auto 14px; border-radius: 18px; display: flex; align-items: center; justify-content: center; font-size: 1.6rem; background: rgba(255,255,255,.18); border: 1px solid rgba(255,255,255,.3); }
    .bp-cta h4 { margin: 0 0 8px; font-weight: 800; font-size: 1.25rem; }
    .bp-cta p { margin: 0 0 20px; font-size: .92rem; line-height: 1.6; color: rgba(255,255,255,.9); }
    .bp-cta a { display: inline-flex; align-items: center; gap: 8px; padding: 13px 26px; border-radius: 50px; font-weight: 800; text-decoration: none; color: var(--p500); background: #fff; transition: all .3s ease; }
    .bp-cta a:hover { transform: translateY(-3px); box-shadow: 0 14px 28px rgba(61,0,35,.4); }
    .bp-rel { display: flex; gap: 14px; align-items: center; padding: 10px; margin: 0 -10px 6px; border-radius: 16px; text-decoration: none; transition: background .25s ease; }
    .bp-rel:hover { background: var(--p100); }
    .bp-rel .th { flex-shrink: 0; position: relative; width: 84px; height: 74px; border-radius: 16px; overflow: hidden; isolation: isolate; background: linear-gradient(135deg, var(--p200), var(--p400)); }
    .bp-rel .th .bg { position: absolute; inset: -8px; z-index: 0; width: calc(100% + 16px); height: calc(100% + 16px); max-width: none; object-fit: cover; filter: blur(8px); }
    .bp-rel .th .main { position: relative; z-index: 1; width: 100%; height: 100%; object-fit: contain; display: block; }
    .bp-rel .th.noimg img { display: none; }
    .bp-rel .tt { font-weight: 700; font-size: .94rem; line-height: 1.4; color: var(--p900); overflow-wrap: anywhere; }
    .bp-rel:hover .tt { color: var(--p500); }
    .bp-rel .mm { display: block; margin-top: 4px; font-size: .78rem; font-weight: 600; color: var(--p400); }

    .bp-notfound { padding: 70px 30px; text-align: center; }
    .bp-notfound i { font-size: 4rem; color: var(--p400); }
    .bp-notfound h2 { margin: 14px 0 8px; font-weight: 800; color: var(--p900); }
    .bp-notfound p { color: var(--p600); margin-bottom: 26px; }
    .bp-btn { display: inline-flex; align-items: center; gap: 10px; padding: 14px 30px; border-radius: 50px; font-weight: 700; text-decoration: none; color: #fff; background: linear-gradient(90deg, var(--p500), var(--p400)); box-shadow: 0 12px 26px rgba(196,0,122,.35); transition: all .3s ease; }
    .bp-btn:hover { color: #fff; transform: translateY(-3px); }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 991.98px) {
        .bp-wrap { margin-top: -55px; }
        .bp-side { position: static; margin-top: 8px; }
        .bp-inner { padding: 24px 20px; }
        .bp-cover .main { max-height: 380px; }
        .bp-toc { max-height: none; }
    }
    @media (max-width: 575.98px) {
        .bp-hero { padding: 26px 0 80px; }
        .bp-wrap { padding-bottom: 60px; }
        .bp-crumbs { margin-bottom: 10px; font-size: .78rem; }
        .bp-title { font-size: 1.45rem; margin-bottom: 12px; }
        .bp-chip { font-size: .82rem; }
        .bp-chip.plain { padding: 9px 14px; }
        .bp-card { border-radius: 22px; }
        .bp-cover .main { max-height: 300px; }
        .bp-inner { padding: 18px 14px; }
        .bp-lead { font-size: 1.02rem; padding: 16px 18px; }
        .bp-content { font-size: 1rem; line-height: 1.65; }
        .bp-content h2 { font-size: 1.4rem; }
        .bp-content h3 { font-size: 1.2rem; }
        .bp-content li { padding: 10px 12px 10px 44px; }
        .bp-content ul li::before { left: 12px; }
        .bp-content ol li::before { left: 10px; }
        .bp-actions { flex-direction: column; align-items: flex-start; }
        .bp-author { flex-direction: column; text-align: center; }
        .bp-box, .bp-cta { padding: 22px 18px; border-radius: 22px; }
    }
    @media (prefers-reduced-motion: reduce) { main * { transition: none !important; } #bpProgress { transition: none; } }

    /* ========== POLISH PASS ========== */
    .bp-hero { padding: 30px 0 100px; }
    .bp-chip { font-size: .85rem; padding: 6px 16px 6px 6px; }
    .bp-chip.plain { padding: 9px 16px; }
    .bp-avatar { width: 30px; height: 30px; font-size: .8rem; }
    .bp-card { border-radius: 28px; box-shadow: 0 24px 60px rgba(196,0,122,.13); }
    .bp-cover::after { content: ""; position: absolute; inset: 0; z-index: 2; pointer-events: none; box-shadow: inset 0 -40px 50px -40px rgba(92,0,53,.25); }
    .bp-inner { padding: 34px clamp(20px, 4vw, 48px) 30px; }
    .bp-lead { font-size: 1.08rem; line-height: 1.7; font-weight: 600; padding: 16px 20px; border-radius: 16px; border-left-width: 4px; background: var(--p50); border: 1px solid var(--p100); border-left: 4px solid var(--p500); }
    .bp-content { font-size: 1.06rem; line-height: 1.75; }
    .bp-content h2 { font-size: 1.55rem; }
    .bp-content h2::before { width: 6px; margin-right: 10px; }
    .bp-content li { background: #fff; border: 1px solid var(--p100); box-shadow: 0 2px 8px rgba(196,0,122,.05); }
    .bp-content blockquote { margin: 0 0 1.2em; padding: 14px 20px; border-left: 4px solid var(--p400); background: var(--p50); border-radius: 0 14px 14px 0; font-style: italic; }
    a.bp-round { text-decoration: none; }
    .bp-btns { flex-wrap: wrap; }
    .bp-back { display: inline-flex; align-items: center; gap: 8px; padding: 11px 20px; border-radius: 50px; font-size: .9rem; font-weight: 700; text-decoration: none; color: var(--p600); border: 1.5px solid var(--p200); transition: all .25s ease; }
    .bp-back:hover { color: #fff; background: var(--p500); border-color: var(--p500); }
    .bp-author { background: var(--p50); border-color: var(--p100); }
    .bp-author .ava { width: 56px; height: 56px; font-size: 1.3rem; }
    .bp-side { top: 90px; gap: 20px; }
    .bp-box { border-radius: 22px; padding: 22px; }
    .bp-cta { border-radius: 22px; padding: 26px 22px; }
    .bp-rel { padding: 8px; margin: 0 -8px 4px; }

    @media (max-width: 991.98px) {
        .bp-wrap { margin-top: -50px; }
        #bpTocBox { display: none !important; }   /* TOC mobile pe article ke baad aata tha, isliye hide */
        .bp-side { margin-top: 0; gap: 16px; }
    }
    @media (max-width: 575.98px) {
        main .container { padding-left: 14px; padding-right: 14px; }
        .bp-hero { padding: 20px 0 76px; }
        .bp-wave svg { height: 36px; }
        .bp-crumbs a { padding: 5px 12px; }
        .bp-cat { font-size: .7rem; padding: 6px 14px; }
        .bp-title { font-size: 1.4rem; line-height: 1.25; }
        .bp-chips { flex-wrap: nowrap; overflow-x: auto; margin: 0 -14px; padding: 2px 14px 6px; gap: 8px; scrollbar-width: none; }
        .bp-chips::-webkit-scrollbar { display: none; }
        .bp-chip { flex-shrink: 0; white-space: nowrap; font-size: .78rem; }
        .bp-chip.plain { padding: 8px 13px; }
        .bp-card { border-radius: 20px; }
        .bp-cover .main { max-height: 260px; }
        .bp-inner { padding: 18px 16px 20px; }
        .bp-lead { font-size: 1rem; padding: 14px 16px; }
        .bp-content { font-size: 1rem; line-height: 1.7; }
        .bp-content h2 { font-size: 1.3rem; }
        .bp-content h2::before { display: none; }
        .bp-content li { padding: 9px 12px 9px 42px; }
        .bp-actions { flex-direction: row; align-items: center; }
        .bp-btns { width: 100%; justify-content: space-between; }
        .bp-like { padding: 11px 18px; }
        .bp-round { width: 44px; height: 44px; }
        .bp-back { width: 100%; justify-content: center; }
        .bp-author { flex-direction: row; text-align: left; padding: 14px; }
        .bp-author .ava { width: 48px; height: 48px; font-size: 1.1rem; }
        .bp-box, .bp-cta { padding: 20px 16px; border-radius: 18px; }
    }
</style>

<div id="bpProgress"></div>

<main>
    <!-- ===== HERO ===== -->
    <section class="bp-hero">
        <?php if ($hasImage): ?><img class="bp-hero-bg" src="<?= e((string) $post['image']) ?>" alt="" aria-hidden="true" onerror="this.style.display='none'"><?php endif; ?>
        <div class="container">
            <div class="bp-crumbs">
                <a href="/"><i class="bi bi-house-fill"></i> Home</a>
                <i class="bi bi-chevron-right"></i>
                <a href="/blogs.php">Blog</a>
            </div>

            <?php if (!empty($post['category'])): ?><span class="bp-cat"><?= e((string) $post['category']) ?></span><?php endif; ?>

            <h1 class="bp-title"><?= e((string) $post['title']) ?></h1>

            <?php if (!$isNotFound): ?>
                <div class="bp-chips">
                    <?php if ($authorName !== ''): ?><span class="bp-chip"><span class="bp-avatar"><?= e($authorInitial) ?></span><?= e($authorName) ?></span><?php endif; ?>
                    <?php if (!empty($post['date'])): ?><span class="bp-chip plain"><i class="bi bi-calendar3"></i><?= e((string) $post['date']) ?></span><?php endif; ?>
                    <?php if (!empty($post['readTime'])): ?><span class="bp-chip plain"><i class="bi bi-clock"></i><?= e((string) $post['readTime']) ?></span><?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="bp-wave">
            <svg viewBox="0 0 1440 90" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path fill="#FFF5FA" d="M0,48 C240,100 480,0 720,40 C960,80 1200,100 1440,36 L1440,90 L0,90 Z"/>
            </svg>
        </div>
    </section>

    <!-- ===== BODY ===== -->
    <section class="bp-wrap">
        <div class="container">
            <?php if ($isNotFound): ?>
                <div class="bp-card bp-notfound">
                    <i class="bi bi-journal-x"></i>
                    <h2>Article not found</h2>
                    <p><?= e((string) $post['body']) ?></p>
                    <a href="/blogs.php" class="bp-btn"><i class="bi bi-arrow-left"></i> Browse all articles</a>
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <!-- Article -->
                    <div class="col-12 col-lg-8">
                        <article class="bp-card">
                            <?php if ($hasImage): ?>
                                <div class="bp-cover has-fallback">
                                    <img class="bg" src="<?= e((string) $post['image']) ?>" alt="" aria-hidden="true" <?= $imgErr ?>>
                                    <img class="main" src="<?= e((string) $post['image']) ?>" alt="<?= e((string) $post['title']) ?>" <?= $imgErr ?>>
                                </div>
                            <?php endif; ?>

                            <div class="bp-inner">
                                <?php if (!empty($post['summary'])): ?><p class="bp-lead"><?= e((string) $post['summary']) ?></p><?php endif; ?>

                                <div class="bp-content" id="bpContent">
                                    <?php renderBlogContent(trim((string) ($post['body'] ?? ''))); ?>
                                </div>

                                <div class="bp-actions">
                                    <div class="bp-btns">
                                        <button type="button" class="bp-like" id="bpLikeBtn" aria-pressed="false" onclick="bpToggleLike()">
                                            <i class="bi bi-heart-fill"></i> <span id="bpLikeCount"><?= (int) ($post['likes'] ?? 0) ?></span>
                                        </button>
                                        <a class="bp-round" id="bpWa" target="_blank" rel="noopener" aria-label="Share on WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                        <a class="bp-round" id="bpLi" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><i class="bi bi-linkedin"></i></a>
                                        <button type="button" class="bp-round" aria-label="Share or copy link" onclick="bpShare()"><i class="bi bi-link-45deg"></i></button>
                                        <button type="button" class="bp-round" id="bpBookmarkBtn" aria-label="Bookmark" onclick="bpBookmark(this)"><i class="bi bi-bookmark"></i></button>
                                    </div>
                                    <a class="bp-back" href="/blogs.php"><i class="bi bi-arrow-left"></i> All articles</a>
                                </div>

                                <?php if ($authorName !== ''): ?>
                                    <div class="bp-author">
                                        <span class="ava"><?= e($authorInitial) ?></span>
                                        <div>
                                            <small>Written by</small>
                                            <strong><?= e($authorName) ?></strong>
                                            <span class="t">Digital growth experts at WebTecMart</span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>
                    </div>

                    <!-- Sidebar -->
                    <aside class="col-12 col-lg-4">
                        <div class="bp-side">
                            <div class="bp-box" id="bpTocBox" style="display:none;">
                                <h4><i class="bi bi-list-stars"></i> In this article</h4>
                                <ul class="bp-toc" id="bpToc"></ul>
                            </div>

                            <div class="bp-cta">
                                <div class="ic"><i class="bi bi-rocket-takeoff-fill"></i></div>
                                <h4>Grow Your Business</h4>
                                <p>Get a free consultation and a tailored digital growth plan.</p>
                                <a href="/contact.php">Get Free Consultation <i class="bi bi-arrow-right"></i></a>
                            </div>

                            <?php if ($relatedPosts): ?>
                                <div class="bp-box">
                                    <h4><i class="bi bi-journal-richtext"></i> Keep Reading</h4>
                                    <?php foreach ($relatedPosts as $rp): ?>
                                        <a class="bp-rel" href="/blog.php?id=<?= (int) ($rp['id'] ?? 0) ?>">
                                            <span class="th has-fallback">
                                                <?php if (!empty($rp['image'])): ?>
                                                    <img class="bg" src="<?= e((string) $rp['image']) ?>" alt="" aria-hidden="true" loading="lazy" <?= $imgErr ?>>
                                                    <img class="main" src="<?= e((string) $rp['image']) ?>" alt="" loading="lazy" <?= $imgErr ?>>
                                                <?php endif; ?>
                                            </span>
                                            <span>
                                                <span class="tt"><?= e((string) $rp['title']) ?></span>
                                                <?php if (!empty($rp['readTime'])): ?><span class="mm"><i class="bi bi-clock"></i> <?= e((string) $rp['readTime']) ?></span><?php endif; ?>
                                            </span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </aside>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<script>
    const BP_POST_ID = <?= (int) $currentId ?>;

    // ===== Reading progress =====
    (function () {
        const bar = document.getElementById('bpProgress');
        if (!bar) return;
        window.addEventListener('scroll', function () {
            const h = document.documentElement;
            const max = h.scrollHeight - h.clientHeight;
            bar.style.width = (max > 0 ? (h.scrollTop / max) * 100 : 0) + '%';
        }, { passive: true });
    })();

    // ===== Table of contents =====
    (function () {
        const content = document.getElementById('bpContent');
        const toc = document.getElementById('bpToc');
        const box = document.getElementById('bpTocBox');
        if (!content || !toc || !box) return;
        const heads = content.querySelectorAll('h2, h3');
        if (!heads.length) return;
        heads.forEach(function (h, i) {
            h.id = 'sec-' + (i + 1);
            const li = document.createElement('li');
            if (h.tagName === 'H3') li.className = 'sub';
            const a = document.createElement('a');
            a.href = '#' + h.id;
            a.textContent = h.textContent;
            li.appendChild(a);
            toc.appendChild(li);
        });
        box.style.display = '';
        const links = toc.querySelectorAll('a');
        window.addEventListener('scroll', function () {
            let current = 0;
            heads.forEach(function (h, i) { if (h.getBoundingClientRect().top < 160) current = i; });
            links.forEach(function (l, i) { l.classList.toggle('active', i === current); });
        }, { passive: true });
    })();

    // ===== Local storage helpers (like / bookmark yaad rahe) =====
    function bpGet(k) { try { return localStorage.getItem(k); } catch (e) { return null; } }
    function bpSet(k, v) { try { v ? localStorage.setItem(k, '1') : localStorage.removeItem(k); } catch (e) {} }

    // ===== Like toggle =====
    let bpLiked = false;
    function bpRenderLike(animate) {
        const btn = document.getElementById('bpLikeBtn');
        if (!btn) return;
        btn.classList.toggle('liked', bpLiked);
        btn.setAttribute('aria-pressed', bpLiked ? 'true' : 'false');
        const icon = btn.querySelector('i');
        if (icon && animate) {
            icon.style.transform = 'scale(1.5)';
            setTimeout(function () { icon.style.transform = 'scale(1)'; }, 200);
        }
    }
    function bpToggleLike() {
        const countEl = document.getElementById('bpLikeCount');
        if (!countEl) return;
        let count = parseInt(countEl.textContent, 10) || 0;
        count = bpLiked ? Math.max(0, count - 1) : count + 1;
        bpLiked = !bpLiked;
        countEl.textContent = count;
        bpSet('bp_like_' + BP_POST_ID, bpLiked);
        bpRenderLike(true);
    }

    // ===== Share =====
    (function () {
        const u = encodeURIComponent(window.location.href), t = encodeURIComponent(document.title);
        const wa = document.getElementById('bpWa'), li = document.getElementById('bpLi');
        if (wa) wa.href = 'https://wa.me/?text=' + t + '%20' + u;
        if (li) li.href = 'https://www.linkedin.com/sharing/share-offsite/?url=' + u;
    })();

    function bpShare() {
        const url = window.location.href;
        if (navigator.share) {
            navigator.share({ title: document.title, url: url }).catch(function () {});
        } else if (navigator.clipboard) {
            navigator.clipboard.writeText(url).then(function () { bpToast('Link copied to clipboard!'); }).catch(function () { bpToast('Could not copy link'); });
        } else {
            bpToast('Copy the link from the address bar');
        }
    }

    // ===== Bookmark =====
    function bpApplyBookmark(btn, isSaved) {
        btn.classList.toggle('saved', isSaved);
        const icon = btn.querySelector('i');
        if (icon) icon.className = isSaved ? 'bi bi-bookmark-fill' : 'bi bi-bookmark';
    }
    function bpBookmark(btn) {
        const isSaved = !btn.classList.contains('saved');
        bpApplyBookmark(btn, isSaved);
        bpSet('bp_save_' + BP_POST_ID, isSaved);
        bpToast(isSaved ? 'Saved to bookmarks' : 'Bookmark removed');
    }

    // restore saved state
    (function () {
        if (bpGet('bp_like_' + BP_POST_ID)) {
            const countEl = document.getElementById('bpLikeCount');
            if (countEl) countEl.textContent = (parseInt(countEl.textContent, 10) || 0) + 1;
            bpLiked = true;
            bpRenderLike(false);
        }
        const bm = document.getElementById('bpBookmarkBtn');
        if (bm && bpGet('bp_save_' + BP_POST_ID)) bpApplyBookmark(bm, true);
    })();

    // ===== Toast =====
    function bpToast(msg) {
        const toast = document.createElement('div');
        toast.textContent = msg;
        toast.setAttribute('role', 'status');
        toast.style.cssText = 'position:fixed;bottom:24px;left:50%;transform:translateX(-50%) translateY(20px);max-width:calc(100% - 32px);text-align:center;background:#5C0035;color:#fff;padding:12px 22px;border-radius:9999px;font-size:14px;font-weight:600;z-index:99999;box-shadow:0 20px 25px -5px rgba(61,0,35,.4);opacity:0;transition:all .3s ease;font-family:inherit;';
        document.body.appendChild(toast);
        requestAnimationFrame(function () {
            toast.style.opacity = '1';
            toast.style.transform = 'translateX(-50%) translateY(0)';
        });
        setTimeout(function () {
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(-50%) translateY(20px)';
            setTimeout(function () { toast.remove(); }, 300);
        }, 2000);
    }
</script>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>