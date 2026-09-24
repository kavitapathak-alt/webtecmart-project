<?php require_once __DIR__ . '/app/templates/header.php'; ?>

<?php
// ===== Fetch Post Data (in real app, use $id from URL) =====
$postId = isset($_GET['id']) ? (int) $_GET['id'] : 1;

// Sample post data (in real app, fetch from DB)
$post = [
    'id' => $postId,
    'title' => 'The Future of Web Development: Trends to Watch in 2026',
    'content' => '
        <p>Web development is evolving at an unprecedented pace. With new technologies emerging every day, developers need to stay ahead of the curve to build cutting-edge applications.</p>

        <h2>AI-Powered Development</h2>
        <p>Artificial Intelligence is transforming the way we build websites. From AI-powered code completion to automated testing, developers can now work more efficiently than ever before.</p>

        <h2>Immersive User Experiences</h2>
        <p>Users expect more than just functional websites. They want immersive experiences that engage and delight. WebGL, 3D graphics, and interactive elements are becoming standard.</p>

        <h2>WebAssembly and Performance</h2>
        <p>WebAssembly is opening up new possibilities for high-performance web applications. Developers can now run complex computations directly in the browser.</p>
    ',
    'category' => 'Technology',
    'author' => 'John Doe',
    'date' => 'August 07, 2026',
    'readTime' => '6 min read',
    'likes' => 89,
];

$managedPosts = blogPosts();
$managedPost = $managedPosts[max(0, $postId - 1)] ?? null;
if ($managedPost) {
    $post['title'] = $managedPost['title'];
    $post['image'] = $managedPost['image'] ?? '';
    $post['content'] = '<p>' . e($managedPost['summary'] ?? '') . '</p>';
    if (!empty($managedPost['body'])) {
        $post['content'] .= '<p>' . e($managedPost['body']) . '</p>';
    }
}

// ===== Icon Helper =====
function bpIcon(string $name): string {
    $icons = [
        'arrow-left' => '<path d="m12 19-7-7 7-7"/><path d="M19 12H5"/>',
        'user'       => '<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
        'calendar'   => '<path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/>',
        'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'heart'      => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>',
        'share'      => '<path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/>',
        'bookmark'   => '<path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/>',
    ];
    $path = $icons[$name] ?? '';
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
}
?>

<style>
    /* ============================================================
       BLOG POST PAGE — Pixel-perfect Next.js clone
       ============================================================ */
    .bp-main {
        min-height: 100vh;
        background: #FBF8F1;
        padding: 32px 0;
    }
    @media (min-width: 640px) {
        .bp-main { padding: 40px 0; }
    }
    @media (min-width: 768px) {
        .bp-main { padding: 48px 0; }
    }
    @media (min-width: 1024px) {
        .bp-main { padding: 64px 0; }
    }

    .bp-container {
        max-width: 1280px;
        padding-left: 16px;
        padding-right: 16px;
        margin: 0 auto;
        width: 100%;
    }

    .bp-inner {
        max-width: 896px;
        margin: 0 auto;
    }

    /* ===== Back Button ===== */
    .bp-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #4B5563;
        font-size: 0.875rem;
        font-weight: 500;
        text-decoration: none;
        margin-bottom: 24px;
        transition: color 0.3s ease;
    }
    .bp-back:hover {
        color: #C4007A;
    }
    .bp-back svg {
        width: 16px;
        height: 16px;
        transition: transform 0.3s ease;
    }
    .bp-back:hover svg {
        transform: translateX(-4px);
    }

    /* ===== Post Card ===== */
    .bp-card {
        background: #fff;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        border: 1px solid #F3F4F6;
    }
    @media (min-width: 640px) {
        .bp-card { padding: 32px; }
    }
    @media (min-width: 768px) {
        .bp-card { padding: 40px; }
    }

    /* ===== Category Badge ===== */
    .bp-category-wrap {
        margin-bottom: 16px;
    }
    .bp-category {
        display: inline-block;
        padding: 4px 12px;
        background: rgba(196, 0, 122, 0.1);
        color: #C4007A;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* ===== Title ===== */
    .bp-title {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: #111827;
        line-height: 1.2;
        margin: 0 0 16px;
        letter-spacing: -0.02em;
    }
    @media (min-width: 640px) {
        .bp-title { font-size: 1.875rem; }
    }
    @media (min-width: 768px) {
        .bp-title { font-size: 2.25rem; }
    }

    /* ===== Meta Row ===== */
    .bp-meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 16px;
        font-size: 0.875rem;
        color: #6B7280;
        margin-bottom: 24px;
    }
    .bp-meta-item {
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .bp-meta-item svg {
        width: 16px;
        height: 16px;
    }

    /* ===== Post Content (Prose) ===== */
    .bp-content {
        color: #374151;
        font-size: 1rem;
        line-height: 1.75;
    }
    @media (min-width: 768px) {
        .bp-content { font-size: 1.125rem; }
    }

    .bp-content p {
        margin: 0 0 1.25em;
    }

    .bp-content h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #111827;
        margin: 2em 0 0.75em;
        line-height: 1.3;
        letter-spacing: -0.01em;
    }
    @media (min-width: 640px) {
        .bp-content h2 { font-size: 1.5rem; }
    }
    @media (min-width: 768px) {
        .bp-content h2 { font-size: 1.75rem; }
    }

    .bp-content h3 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.125rem;
        font-weight: 700;
        color: #111827;
        margin: 1.5em 0 0.5em;
        line-height: 1.3;
    }
    @media (min-width: 768px) {
        .bp-content h3 { font-size: 1.25rem; }
    }

    .bp-content ul,
    .bp-content ol {
        margin: 0 0 1.25em;
        padding-left: 1.5em;
    }
    .bp-content li {
        margin-bottom: 0.5em;
    }

    .bp-content a {
        color: #C4007A;
        text-decoration: underline;
        text-underline-offset: 2px;
    }
    .bp-content a:hover {
        color: #A3005F;
    }

    .bp-content strong {
        font-weight: 700;
        color: #111827;
    }

    .bp-content blockquote {
        border-left: 4px solid #C4007A;
        padding-left: 1em;
        margin: 1.5em 0;
        color: #4B5563;
        font-style: italic;
    }

    .bp-content code {
        background: #FDF0F6;
        color: #C4007A;
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 0.9em;
    }

    .bp-content img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 1.5em 0;
    }

    /* ===== Post Footer (Actions) ===== */
    .bp-footer {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding-top: 24px;
        margin-top: 24px;
        border-top: 1px solid #E5E7EB;
    }

    .bp-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .bp-like-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: #F3F4F6;
        border: none;
        border-radius: 9999px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
        font-size: 0.875rem;
        font-weight: 500;
        color: #111827;
    }
    .bp-like-btn:hover {
        background: rgba(196, 0, 122, 0.1);
    }
    .bp-like-btn.liked svg {
        fill: #C4007A;
    }
    .bp-like-btn svg {
        width: 16px;
        height: 16px;
        color: #C4007A;
        transition: transform 0.2s ease;
    }

    .bp-icon-btn {
        padding: 8px;
        background: transparent;
        border: none;
        border-radius: 9999px;
        cursor: pointer;
        transition: background 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4B5563;
    }
    .bp-icon-btn:hover {
        background: #F3F4F6;
    }
    .bp-icon-btn.saved {
        color: #C4007A;
    }
    .bp-icon-btn.saved svg {
        fill: #C4007A;
    }
    .bp-icon-btn svg {
        width: 16px;
        height: 16px;
    }
</style>

<main class="bp-main">
    <div class="bp-container">
        <div class="bp-inner">

            <!-- Back Button -->
            <a href="/blogs.php" class="bp-back">
                <?= bpIcon('arrow-left') ?>
                Back to Blog
            </a>

            <!-- Post Card -->
            <article class="bp-card">

                <!-- Category -->
                <div class="bp-category-wrap">
                    <span class="bp-category"><?= htmlspecialchars($post['category']) ?></span>
                </div>

                <!-- Title -->
                <h1 class="bp-title"><?= htmlspecialchars($post['title']) ?></h1>

                <!-- Meta -->
                <div class="bp-meta">
                    <span class="bp-meta-item">
                        <?= bpIcon('user') ?>
                        <?= htmlspecialchars($post['author']) ?>
                    </span>
                    <span class="bp-meta-item">
                        <?= bpIcon('calendar') ?>
                        <?= htmlspecialchars($post['date']) ?>
                    </span>
                    <span class="bp-meta-item">
                        <?= bpIcon('clock') ?>
                        <?= htmlspecialchars($post['readTime']) ?>
                    </span>
                </div>

                <!-- Content -->
                <div class="bp-content">
                    <?php if (!empty($post['image'])): ?><img src="<?= e($post['image']) ?>" alt="<?= e($post['title']) ?>" style="width:100%;max-height:440px;object-fit:cover;border-radius:18px;margin-bottom:24px;"> <?php endif; ?>
                    <?= $post['content'] ?>
                </div>

                <!-- Footer / Actions -->
                <div class="bp-footer">
                    <div class="bp-actions">
                        <button type="button" class="bp-like-btn" id="bpLikeBtn" onclick="bpToggleLike()">
                            <?= bpIcon('heart') ?>
                            <span id="bpLikeCount"><?= (int) $post['likes'] ?></span>
                        </button>
                        <button type="button" class="bp-icon-btn" aria-label="Share" onclick="bpShare()">
                            <?= bpIcon('share') ?>
                        </button>
                        <button type="button" class="bp-icon-btn" id="bpBookmarkBtn" aria-label="Bookmark" onclick="bpBookmark(this)">
                            <?= bpIcon('bookmark') ?>
                        </button>
                    </div>
                </div>

            </article>

        </div>
    </div>
</main>

<script>
    // ===== Like toggle =====
    let bpLiked = false;
    function bpToggleLike() {
        const countEl = document.getElementById('bpLikeCount');
        const btn = document.getElementById('bpLikeBtn');
        if (!countEl || !btn) return;

        let count = parseInt(countEl.textContent, 10) || 0;

        if (bpLiked) {
            count = Math.max(0, count - 1);
        } else {
            count = count + 1;
        }
        bpLiked = !bpLiked;
        countEl.textContent = count;
        btn.classList.toggle('liked', bpLiked);

        // Pop animation
        const heartSvg = btn.querySelector('svg');
        if (heartSvg) {
            heartSvg.style.transform = 'scale(1.3)';
            setTimeout(() => { heartSvg.style.transform = 'scale(1)'; }, 200);
        }
    }

    // ===== Share =====
    function bpShare() {
        const url = window.location.href;
        const title = document.title;

        if (navigator.share) {
            navigator.share({ title: title, url: url }).catch(() => {});
        } else if (navigator.clipboard) {
            navigator.clipboard.writeText(url).then(() => {
                bpToast('Link copied to clipboard!');
            }).catch(() => {});
        }
    }

    // ===== Bookmark =====
    function bpBookmark(btn) {
        const isSaved = btn.classList.toggle('saved');
        btn.style.transform = 'scale(1.2)';
        setTimeout(() => { btn.style.transform = 'scale(1)'; }, 150);
        bpToast(isSaved ? 'Saved to bookmarks' : 'Bookmark removed');
    }

    // ===== Toast =====
    function bpToast(msg) {
        const toast = document.createElement('div');
        toast.textContent = msg;
        toast.style.cssText = `
            position: fixed;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%) translateY(20px);
            background: #111827;
            color: #fff;
            padding: 12px 20px;
            border-radius: 9999px;
            font-size: 14px;
            font-weight: 500;
            z-index: 99999;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
            opacity: 0;
            transition: all 0.3s ease;
            font-family: inherit;
        `;
        document.body.appendChild(toast);

        requestAnimationFrame(() => {
            toast.style.opacity = '1';
            toast.style.transform = 'translateX(-50%) translateY(0)';
        });

        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(-50%) translateY(20px)';
            setTimeout(() => toast.remove(), 300);
        }, 2000);
    }
</script>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>