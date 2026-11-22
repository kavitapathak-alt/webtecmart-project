<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

$requestedPostId = filter_var($_GET['id'] ?? 0, FILTER_VALIDATE_INT) ?: 0;
$requestedSlug = trim((string) ($_GET['slug'] ?? ''));
$managedPosts = blogPosts();
$post = null;

if ($requestedPostId > 0) {
    $post = getBlogPost($requestedPostId);
} elseif ($requestedSlug !== '') {
    $post = getBlogPost($requestedSlug);
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

$pageMeta = [
    'title' => (string) (!empty($post['title']) && !$isNotFound ? $post['title'] . ' | ' . APP_NAME : 'Article | ' . APP_NAME),
    'description' => (string) (!empty($post['summary']) ? $post['summary'] : 'Read digital marketing and SEO insights from WebTecMart.'),
];
$blogPageMeta = [
    'page_meta_title' => $pageMeta['title'],
    'page_meta_description' => $pageMeta['description'],
];
require_once __DIR__ . '/app/templates/header.php';

// Inline markdown formatting
function blogInline(string $text): string
{
    $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    // Markdown links: [text](url)
    $text = preg_replace_callback('/\[([^\]]+)\]\(((?:https?:\/\/|\/)[^\s\)]+)\)/', static function ($m) {
        return '<a href="' . $m[2] . '" target="_blank" rel="noopener noreferrer">' . $m[1] . '</a>';
    }, $text);
    // Bold **text**
    $text = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $text);
    // Italic *text*
    $text = preg_replace('/(?<!\*)\*(?!\*)(.+?)(?<!\*)\*(?!\*)/s', '<em>$1</em>', $text);
    // Inline code `code`
    $text = preg_replace('/`([^`]+)`/', '<code>$1</code>', $text);
    return $text;
}

function renderBlogContent(string $content, string $articleTitle = ''): void
{
    $lines = preg_split('/\r\n|\r|\n/', trim($content));
    if (!$lines) return;

    // Strip duplicate title if repeated as the very first line
    $firstLine = trim($lines[0] ?? '');
    $cleanFirst = ltrim($firstLine, '# ');
    if ($articleTitle !== '' && (stripos($cleanFirst, $articleTitle) !== false || stripos($articleTitle, $cleanFirst) !== false)) {
        array_shift($lines);
    }

    $paragraph = [];
    $list = [];
    $listTag = 'ul';

    $flushParagraph = static function () use (&$paragraph): void {
        if (!$paragraph) return;
        $joined = implode(' ', $paragraph);
        if (trim($joined) !== '') {
            echo '<p>' . blogInline($joined) . '</p>' . "\n";
        }
        $paragraph = [];
    };

    $flushList = static function () use (&$list, &$listTag): void {
        if (!$list) return;
        echo '<' . $listTag . ' class="bp-list">' . "\n";
        foreach ($list as $item) {
            echo '  <li>' . blogInline($item) . '</li>' . "\n";
        }
        echo '</' . $listTag . '>' . "\n";
        $list = [];
    };

    foreach ($lines as $line) {
        $trimmed = trim($line);

        if ($trimmed === '') {
            $flushParagraph();
            $flushList();
            continue;
        }

        // Markdown image ![alt](url)
        if (preg_match('/^!\[(.*?)\]\(((?:https?:\/\/|\/)[^\s\)]+)\)$/', $trimmed, $imgMatch)) {
            $flushParagraph();
            $flushList();
            $alt = htmlspecialchars($imgMatch[1], ENT_QUOTES, 'UTF-8');
            $src = htmlspecialchars($imgMatch[2], ENT_QUOTES, 'UTF-8');
            echo '<figure class="bp-article-figure"><img src="' . $src . '" alt="' . $alt . '" loading="lazy" class="bp-article-img">';
            if ($alt !== '') {
                echo '<figcaption>' . $alt . '</figcaption>';
            }
            echo '</figure>' . "\n";
            continue;
        }

        // Markdown headings (# H1, ## H2, ### H3, #### H4)
        if (preg_match('/^(#{1,4})\s+(.+)$/', $trimmed, $heading)) {
            $flushParagraph();
            $flushList();
            $hLevel = min(4, strlen($heading[1]) + 1);
            $hText = trim($heading[2]);
            $hId = slugify($hText);
            echo '<h' . $hLevel . ' id="' . htmlspecialchars($hId, ENT_QUOTES, 'UTF-8') . '" class="bp-heading">' . htmlspecialchars($hText, ENT_QUOTES, 'UTF-8') . '</h' . $hLevel . '>' . "\n";
            continue;
        }

        // Section step headings: "1. Perform Keyword Research"
        if (preg_match('/^(\d+)[.)]\s+([A-Z0-9].{3,85})$/', $trimmed, $numberedSection) && !str_ends_with($trimmed, '.')) {
            $flushParagraph();
            $flushList();
            $stepNum = $numberedSection[1];
            $stepTitle = trim($numberedSection[2]);
            $stepId = 'step-' . $stepNum . '-' . slugify($stepTitle);
            echo '<h2 id="' . htmlspecialchars($stepId, ENT_QUOTES, 'UTF-8') . '" class="bp-step-heading"><span class="bp-step-num">' . htmlspecialchars($stepNum, ENT_QUOTES, 'UTF-8') . '</span> ' . htmlspecialchars($stepTitle, ENT_QUOTES, 'UTF-8') . '</h2>' . "\n";
            continue;
        }

        // Blockquotes
        if (preg_match('/^>\s*(.+)$/', $trimmed, $quoteMatch)) {
            $flushParagraph();
            $flushList();
            echo '<blockquote class="bp-quote"><p>' . blogInline($quoteMatch[1]) . '</p></blockquote>' . "\n";
            continue;
        }

        // Bullet lists
        if (preg_match('/^[-*]\s+(.+)$/', $trimmed, $item)) {
            $flushParagraph();
            if ($list && $listTag !== 'ul') $flushList();
            $listTag = 'ul';
            $list[] = $item[1];
            continue;
        }

        // Numbered list items
        if (preg_match('/^\d+[.)]\s+(.+)$/', $trimmed, $item)) {
            $flushParagraph();
            if ($list && $listTag !== 'ol') $flushList();
            $listTag = 'ol';
            $list[] = $item[1];
            continue;
        }

        // Regular paragraph text
        $flushList();
        $paragraph[] = $trimmed;
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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">
<style>
    main *, main *::before, main *::after { box-sizing: border-box; }
    main .text-center { text-align: center; }
    main .position-relative { position: relative; }
    main h1, main h2, main h3, main h4, main p { margin-top: 0; }
    main img { max-width: 100%; }
    main .container { max-width: 1320px; width: 100%; padding-left: 22px; padding-right: 22px; margin-left: auto; margin-right: auto; }
</style>

<style>
    /* ============================================================
       BLOG POST — "Expo Floor" design
       ============================================================ */
    main {
        --ink:#1A0613; --ink2:#2B0B20; --pink:#C4007A; --pink2:#E0398F; --blush:#FBEAF3; --gold:#FFB547; --mint:#0E9F6E;
        --text:#2A2430; --mute:#6C6474; --line:rgba(26,6,19,.14);
        --disp:'Bricolage Grotesque','Plus Jakarta Sans',system-ui,sans-serif;
        font-family:'Plus Jakarta Sans',system-ui,-apple-system,sans-serif; color:var(--text); overflow-x:clip;
        background:#F7F4F8 radial-gradient(rgba(26,6,19,.06) 1px,transparent 1.2px) 0 0/24px 24px;
    }
    main ::selection { background:var(--gold); color:var(--ink); }
    main a:focus-visible, main button:focus-visible { outline:3px solid var(--gold); outline-offset:3px; }
    main h1, main h2, main h3, main h4 { font-family:var(--disp); letter-spacing:-.02em; }

    #bpProgress { position:fixed; top:0; left:0; height:5px; width:0; z-index:99999; background:linear-gradient(90deg,var(--gold),var(--pink)); transition:width .1s linear; }

    /* ========== HERO (the hall) ========== */
    .bp-hero { position:relative; overflow:hidden; color:#fff; padding:44px 0 104px;
        background:radial-gradient(60% 70% at 85% 10%,rgba(196,0,122,.55),transparent 65%),radial-gradient(40% 50% at 0% 100%,rgba(255,181,71,.16),transparent 70%),var(--ink); }
    .bp-hero::before { content:''; position:absolute; inset:0; background-image:radial-gradient(rgba(255,255,255,.14) 1px,transparent 1.2px); background-size:26px 26px; -webkit-mask-image:linear-gradient(180deg,#000 30%,transparent 95%); mask-image:linear-gradient(180deg,#000 30%,transparent 95%); pointer-events:none; }
    .bp-hero-bg, .bp-wave { display:none; }
    .bp-hero .container { position:relative; z-index:2; }
    .bp-crumbs { display:flex; flex-wrap:wrap; align-items:center; gap:8px; margin-bottom:20px; font-size:.84rem; font-weight:700; }
    .bp-crumbs a { display:inline-flex; align-items:center; gap:6px; padding:6px 14px; border-radius:999px; background:rgba(255,255,255,.09); border:1px solid rgba(255,255,255,.22); color:#FFE3F1; text-decoration:none; transition:background .2s, color .2s; }
    .bp-crumbs a:hover { background:var(--gold); color:var(--ink); border-color:var(--gold); }
    .bp-crumbs i { color:var(--gold); font-size:.75rem; }
    .bp-cat { display:inline-block; margin-bottom:16px; padding:6px 14px; background:var(--gold); color:var(--ink); border:2px solid var(--ink); border-radius:8px; box-shadow:3px 3px 0 var(--ink); font-size:.76rem; font-weight:800; }
    .bp-title { margin:0 0 22px; max-width:1000px; font-weight:800; font-size:clamp(2rem,4.6vw,3.6rem); line-height:1.08; color:#fff; overflow-wrap:anywhere; }
    .bp-chips { display:flex; flex-wrap:wrap; gap:10px; }
    .bp-chip { display:inline-flex; align-items:center; gap:8px; padding:6px 16px 6px 6px; border-radius:999px; font-size:.85rem; font-weight:600; background:rgba(255,255,255,.09); border:1px solid rgba(255,255,255,.22); color:#FFE3F1; }
    .bp-chip.plain { padding:9px 16px; }
    .bp-chip i { color:var(--gold); }
    .bp-avatar { display:inline-flex; align-items:center; justify-content:center; width:30px; height:30px; border-radius:50%; background:var(--pink); color:#fff; border:2px solid var(--gold); font:800 .8rem var(--disp); }

    /* ========== LAYOUT ========== */
    .bp-wrap { position:relative; z-index:3; margin-top:-56px; padding-bottom:76px; }
    .bp-card { background:#fff; border:2px solid var(--ink); border-radius:24px; overflow:hidden; box-shadow:8px 8px 0 var(--ink); }

    .bp-cover { position:relative; display:flex; align-items:center; justify-content:center; width:100%; height:420px; max-height:480px; overflow:hidden; background:linear-gradient(145deg,#2D051E,#C4007A 55%,#E98EBE); border-bottom:2px solid var(--ink); }
    .bp-cover .bg { display:none; }
    .bp-cover .main { display:block; width:100%; height:100%; object-fit:cover; object-position:center; }
    .bp-cover.noimg { display:none; }

    .bp-inner { padding:36px clamp(20px,4vw,48px) 32px; }
    .bp-lead { margin:0 0 26px; padding:18px 22px; border:2px solid var(--ink); border-left:8px solid var(--pink); border-radius:0 16px 16px 0; background:var(--blush); font-size:1.08rem; line-height:1.7; font-weight:600; color:#3A2733; }

    .bp-content { color:var(--text); font-size:1.06rem; line-height:1.8; overflow-wrap:anywhere; }
    .bp-content p { margin:0 0 1em; }
    .bp-content h2 { margin:1.5em 0 .6em; font-weight:800; font-size:1.7rem; line-height:1.2; color:var(--ink); scroll-margin-top:110px; }
    .bp-content h2:not(.bp-step-heading)::before { content:""; display:inline-block; width:34px; height:7px; margin-right:12px; vertical-align:.18em; background:repeating-linear-gradient(90deg,var(--pink) 0 8px,var(--gold) 8px 16px); }
    .bp-content h3 { margin:1.3em 0 .5em; font-weight:700; font-size:1.35rem; color:var(--pink); scroll-margin-top:110px; }
    .bp-content h4 { margin:1.3em 0 .5em; font-weight:700; font-size:1.12rem; color:var(--ink); }
    .bp-step-heading { display:flex; align-items:center; gap:14px; }
    .bp-step-num { display:inline-flex; align-items:center; justify-content:center; flex-shrink:0; min-width:42px; height:42px; padding:0 8px; border:2px solid var(--ink); border-radius:11px; background:var(--gold); color:var(--ink); box-shadow:3px 3px 0 var(--ink); font:800 1.05rem var(--disp); }
    .bp-content ul, .bp-content ol { margin:0 0 1.2em; padding:0; list-style:none; }
    .bp-content ol { counter-reset:bpn; }
    .bp-content li { position:relative; margin-bottom:.6em; padding:11px 16px 11px 52px; border:2px solid var(--ink); border-radius:12px; background:#fff; box-shadow:3px 3px 0 var(--blush); line-height:1.65; }
    .bp-content ul li::before { content:"\F26A"; font-family:"bootstrap-icons"; position:absolute; left:16px; top:11px; color:var(--pink); font-size:1.15rem; }
    .bp-content ol li { counter-increment:bpn; }
    .bp-content ol li::before { content:counter(bpn); position:absolute; left:12px; top:11px; display:flex; align-items:center; justify-content:center; width:28px; height:28px; border:2px solid var(--ink); border-radius:8px; background:var(--pink); color:#fff; font:800 .82rem/1 var(--disp); }
    .bp-content a { color:var(--pink); font-weight:700; text-underline-offset:3px; }
    .bp-content strong { color:var(--ink); }
    .bp-content code { padding:2px 7px; border-radius:6px; background:var(--blush); color:var(--pink); font-size:.92em; }
    .bp-content img { max-width:100%; height:auto; border-radius:14px; }
    .bp-quote, .bp-content blockquote { margin:0 0 1.3em; padding:16px 22px; border:2px solid var(--ink); border-left:8px solid var(--pink); border-radius:0 14px 14px 0; background:var(--blush); font-style:italic; color:#3A2733; }
    .bp-quote p { margin:0; }
    .bp-article-figure { margin:32px auto; text-align:center; max-width:100%; }
    .bp-article-img { display:block; max-width:100%; height:auto; margin:0 auto; border:2px solid var(--ink); border-radius:16px; box-shadow:6px 6px 0 var(--ink); }
    .bp-article-figure figcaption { margin-top:14px; font-size:.86rem; font-weight:600; color:var(--mute); }

    /* Actions */
    .bp-actions { display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:14px; margin-top:30px; padding-top:22px; border-top:2px dashed var(--line); }
    .bp-btns { display:flex; flex-wrap:wrap; align-items:center; gap:10px; }
    .bp-like { display:inline-flex; align-items:center; gap:9px; padding:12px 22px; border:2px solid var(--ink); border-radius:12px; background:#fff; color:var(--ink); box-shadow:3px 3px 0 var(--ink); cursor:pointer; font:700 .95rem inherit; font-family:inherit; transition:translate .15s, box-shadow .15s, background .2s; }
    .bp-like i { color:var(--pink); transition:transform .2s ease; }
    .bp-like:hover { background:var(--blush); translate:-1px -1px; box-shadow:4px 4px 0 var(--ink); }
    .bp-like.liked { background:var(--pink); color:#fff; box-shadow:3px 3px 0 var(--gold); }
    .bp-like.liked i { color:#fff; }
    .bp-round { display:inline-flex; align-items:center; justify-content:center; width:48px; height:48px; border:2px solid var(--ink); border-radius:12px; background:#fff; color:var(--ink); box-shadow:3px 3px 0 var(--ink); cursor:pointer; font-size:1.05rem; text-decoration:none; transition:translate .15s, box-shadow .15s, background .2s, color .2s; }
    .bp-round:hover { background:var(--gold); color:var(--ink); translate:-1px -1px; box-shadow:4px 4px 0 var(--ink); }
    .bp-round.saved { background:var(--pink); color:#fff; box-shadow:3px 3px 0 var(--gold); }
    .bp-back { display:inline-flex; align-items:center; gap:8px; padding:12px 20px; border:2px solid var(--pink); border-radius:12px; background:#fff; color:var(--pink); font-size:.9rem; font-weight:700; text-decoration:none; transition:background .2s; }
    .bp-back:hover { background:var(--blush); color:var(--pink); }

    /* Author */
    .bp-author { display:flex; align-items:center; gap:16px; margin-top:22px; padding:18px; border:2px dashed rgba(196,0,122,.45); border-radius:16px; background:var(--blush); }
    .bp-author .ava { display:flex; align-items:center; justify-content:center; flex-shrink:0; width:58px; height:58px; border:3px solid var(--gold); border-radius:50%; background:var(--pink); color:#fff; box-shadow:3px 3px 0 var(--ink); font:800 1.35rem var(--disp); }
    .bp-author small { display:block; font-size:.72rem; font-weight:800; color:var(--pink); }
    .bp-author strong { display:block; font:800 1.15rem var(--disp); color:var(--ink); }
    .bp-author span.t { color:var(--mute); font-size:.9rem; }

    /* ========== SIDEBAR ========== */
    .bp-side { position:sticky; top:96px; display:flex; flex-direction:column; gap:24px; }
    .bp-box { padding:24px; background:#fff; border:2px solid var(--ink); border-radius:20px; box-shadow:6px 6px 0 var(--ink); }
    .bp-box h4 { display:flex; align-items:center; gap:10px; margin:0 0 16px; font-weight:800; font-size:1.1rem; color:var(--ink); }
    .bp-box h4 i { color:var(--pink); }
    .bp-toc { list-style:none; margin:0; padding:0; max-height:50vh; overflow-y:auto; }
    .bp-toc li a { display:block; margin-bottom:4px; padding:9px 14px; border-left:4px solid transparent; border-radius:0 10px 10px 0; font-size:.9rem; font-weight:600; line-height:1.4; text-decoration:none; color:var(--text); transition:background .2s, color .2s, border-color .2s; }
    .bp-toc li.sub a { margin-left:14px; font-weight:500; font-size:.86rem; }
    .bp-toc li a:hover, .bp-toc li a.active { color:var(--pink); background:var(--blush); border-left-color:var(--pink); }
    .bp-cta { position:relative; overflow:hidden; padding:30px 24px; text-align:center; color:#fff; border:3px solid var(--pink); border-radius:20px; box-shadow:6px 6px 0 var(--gold);
        background:radial-gradient(70% 60% at 100% 0%,rgba(196,0,122,.55),transparent 65%),radial-gradient(rgba(255,255,255,.1) 1px,transparent 1.2px) 0 0/22px 22px,var(--ink); }
    .bp-cta > * { position:relative; }
    .bp-cta .ic { display:flex; align-items:center; justify-content:center; width:58px; height:58px; margin:0 auto 14px; border:2px solid var(--ink); border-radius:14px; background:var(--gold); color:var(--ink); box-shadow:3px 3px 0 var(--ink); font-size:1.6rem; }
    .bp-cta h4 { margin:0 0 8px; font-weight:800; font-size:1.3rem; color:#fff; }
    .bp-cta p { margin:0 0 20px; font-size:.92rem; line-height:1.6; color:rgba(255,255,255,.82); }
    .bp-cta a { display:inline-flex; align-items:center; gap:8px; padding:13px 22px; border-radius:12px; background:var(--pink); color:#fff; font-weight:700; font-size:.92rem; text-decoration:none; box-shadow:0 5px 0 #7E004E; transition:translate .2s, box-shadow .2s; }
    .bp-cta a:hover { color:#fff; translate:0 2px; box-shadow:0 3px 0 #7E004E; }
    .bp-rel { display:flex; gap:14px; align-items:center; margin:0 -8px 6px; padding:8px; border-radius:14px; text-decoration:none; transition:background .2s; }
    .bp-rel:hover { background:var(--blush); }
    .bp-rel .th { position:relative; flex-shrink:0; width:84px; height:74px; overflow:hidden; border:2px solid var(--ink); border-radius:12px; background:linear-gradient(145deg,#2D051E,#C4007A 55%,#E98EBE); }
    .bp-rel .th .bg { display:none; }
    .bp-rel .th .main { display:block; width:100%; height:100%; object-fit:cover; }
    .bp-rel .th.noimg img { display:none; }
    .bp-rel .tt { font:700 .95rem/1.35 var(--disp); color:var(--ink); overflow-wrap:anywhere; }
    .bp-rel:hover .tt { color:var(--pink); }
    .bp-rel .mm { display:block; margin-top:4px; font-size:.76rem; font-weight:700; color:var(--pink); }

    .bp-notfound { padding:70px 30px; text-align:center; }
    .bp-notfound i { font-size:4rem; color:var(--pink); }
    .bp-notfound h2 { margin:14px 0 8px; font-weight:800; color:var(--ink); }
    .bp-notfound p { margin-bottom:26px; color:var(--mute); }
    .bp-btn { display:inline-flex; align-items:center; gap:10px; padding:14px 28px; border-radius:12px; background:var(--pink); color:#fff; font-weight:700; text-decoration:none; box-shadow:0 6px 0 #7E004E; transition:translate .2s, box-shadow .2s; }
    .bp-btn:hover { color:#fff; translate:0 2px; box-shadow:0 4px 0 #7E004E; }

    /* ========== RESPONSIVE ========== */
    @media (max-width:991.98px) {
        .bp-wrap { margin-top:-50px; }
        #bpTocBox { display:none !important; }   /* TOC mobile pe hide */
        .bp-side { position:static; gap:20px; margin-top:8px; }
        .bp-cover { height:340px; }
    }
    @media (max-width:575.98px) {
        main .container { padding-left:14px; padding-right:14px; }
        .bp-hero { padding:28px 0 84px; }
        .bp-title { font-size:1.75rem; line-height:1.12; }
        .bp-chips { flex-wrap:nowrap; overflow-x:auto; margin:0 -14px; padding:2px 14px 6px; scrollbar-width:none; }
        .bp-chips::-webkit-scrollbar { display:none; }
        .bp-chip { flex-shrink:0; white-space:nowrap; font-size:.78rem; }
        .bp-card { border-radius:18px; box-shadow:5px 5px 0 var(--ink); }
        .bp-cover { height:230px; }
        .bp-inner { padding:22px 16px 22px; }
        .bp-lead { font-size:1rem; padding:14px 16px; }
        .bp-content { font-size:1rem; line-height:1.75; }
        .bp-content h2 { font-size:1.35rem; } .bp-content h3 { font-size:1.18rem; }
        .bp-content h2:not(.bp-step-heading)::before { display:none; }
        .bp-content li { padding:10px 12px 10px 46px; } .bp-content ul li::before { left:13px; } .bp-content ol li::before { left:10px; }
        .bp-actions { flex-direction:column; align-items:stretch; }
        .bp-btns { width:100%; justify-content:space-between; }
        .bp-like { padding:11px 16px; } .bp-round { width:44px; height:44px; }
        .bp-back { justify-content:center; }
        .bp-author { padding:14px; } .bp-author .ava { width:48px; height:48px; font-size:1.1rem; }
        .bp-box { padding:20px 16px; box-shadow:4px 4px 0 var(--ink); } .bp-cta { padding:26px 18px; box-shadow:4px 4px 0 var(--gold); }
    }
    @media (hover:none){ .bp-like:hover,.bp-round:hover { translate:none; } }
    @media (prefers-reduced-motion:reduce) { main * { transition:none !important; } #bpProgress { transition:none; } }
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
                                    <?php renderBlogContent(trim((string) ($post['body'] ?? '')), (string) ($post['title'] ?? '')); ?>
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
                                        <a class="bp-rel" href="<?= blogUrl($rp) ?>">
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
        toast.style.cssText = 'position:fixed;bottom:24px;left:50%;transform:translateX(-50%) translateY(20px);max-width:calc(100% - 32px);text-align:center;background:#1A0613;color:#fff;padding:12px 22px;border:2px solid #FFB547;border-radius:12px;font-size:14px;font-weight:700;z-index:99999;box-shadow:4px 4px 0 #C4007A;opacity:0;transition:all .3s ease;font-family:inherit;';
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