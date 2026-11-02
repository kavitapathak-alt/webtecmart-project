<?php
function renderBlogSection(): void
{
    $allPosts = blogPosts();
    $posts = array_slice($allPosts, 0, 3);
    if (!$posts) return;
    ?>
    <section class="home-blog-section" id="blog" style="padding: 56px 0 44px; background: #FFFFFF; position: relative; border-bottom: 1px solid #EAEAEA;">
        <style>
            .home-blog-header {
                text-align: center;
                max-width: 720px;
                margin: 0 auto 36px;
            }
            .home-blog-pill {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: #FFF2F7;
                border: 1px solid #EAEAEA;
                color: #FF2D75;
                font-size: 0.74rem;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                padding: 6px 16px;
                border-radius: 999px;
                margin-bottom: 14px;
            }
            .home-blog-pill svg { width: 14px; height: 14px; color: #FF2D75; flex-shrink: 0; }
            .home-blog-heading {
                font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                font-size: clamp(1.9rem, 3.4vw, 2.6rem);
                font-weight: 800;
                color: #111111;
                line-height: 1.2;
                margin: 0 0 12px;
                letter-spacing: -0.02em;
            }
            .home-blog-heading .accent {
                color: #FF2D75;
                position: relative;
                display: inline-block;
            }
            .home-blog-heading .accent svg {
                position: absolute;
                left: 0;
                bottom: -4px;
                width: 100%;
                height: 6px;
                pointer-events: none;
            }
            .home-blog-desc {
                font-size: 1rem;
                color: #4A4A4A;
                line-height: 1.6;
                margin: 0 auto;
                max-width: 640px;
            }
            .home-blog-card {
                background: #FFFFFF;
                border-radius: 20px;
                overflow: hidden;
                border: 1px solid #EAEAEA;
                box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
                transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
                display: flex;
                flex-direction: column;
                height: 100%;
            }
            .home-blog-card:hover {
                transform: translateY(-6px);
                border-color: #FF2D75;
                box-shadow: 0 18px 40px rgba(255, 45, 117, 0.12);
            }
            .home-blog-img-wrap {
                position: relative;
                width: 100%;
                aspect-ratio: 16 / 10;
                overflow: hidden;
                background: #FFF2F7;
            }
            .home-blog-img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
                display: block;
                transition: transform 0.5s ease;
            }
            .home-blog-card:hover .home-blog-img {
                transform: scale(1.05);
            }
            .home-blog-cat {
                position: absolute;
                top: 14px;
                left: 14px;
                background: #FF2D75;
                color: #FFFFFF;
                font-size: 0.72rem;
                font-weight: 800;
                padding: 4px 12px;
                border-radius: 50px;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                box-shadow: 0 4px 12px rgba(255, 45, 117, 0.35);
            }
            .home-blog-body {
                padding: 24px;
                display: flex;
                flex-direction: column;
                flex: 1;
            }
            .home-blog-meta {
                display: flex;
                align-items: center;
                gap: 12px;
                font-size: 0.8rem;
                font-weight: 600;
                color: #666666;
                margin-bottom: 10px;
            }
            .home-blog-title {
                font-size: 1.22rem;
                font-weight: 800;
                color: #111111;
                line-height: 1.4;
                margin: 0 0 10px;
            }
            .home-blog-title a {
                color: inherit;
                text-decoration: none;
                transition: color 0.2s ease;
            }
            .home-blog-card:hover .home-blog-title a {
                color: #FF2D75;
            }
            .home-blog-excerpt {
                font-size: 0.9rem;
                color: #4A4A4A;
                line-height: 1.6;
                margin: 0 0 20px;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            .home-blog-foot {
                margin-top: auto;
                padding-top: 14px;
                border-top: 1px solid #EAEAEA;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .home-blog-link {
                color: #FF2D75;
                font-weight: 700;
                font-size: 0.9rem;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                transition: transform 0.2s ease, color 0.2s ease;
            }
            .home-blog-link:hover {
                color: #111111;
                transform: translateX(4px);
            }
            .home-blog-cta {
                text-align: center;
                margin-top: 48px;
            }
            .home-blog-all-btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 14px 34px;
                border-radius: 50px;
                font-weight: 700;
                font-size: 0.95rem;
                text-decoration: none;
                color: #FFFFFF;
                background: #FF2D75;
                box-shadow: 0 10px 24px rgba(255, 45, 117, 0.35);
                transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
            }
            .home-blog-all-btn:hover {
                background: #F65A91;
                color: #FFFFFF;
                transform: translateY(-3px);
                box-shadow: 0 14px 30px rgba(255, 45, 117, 0.45);
            }
        </style>

        <div class="container" style="max-width: 1240px; margin: 0 auto; padding: 0 20px;">
            <div class="home-blog-header" data-wtm-reveal="fade-up">
                <div class="home-blog-pill">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg>
                    <span>LATEST INSIGHTS</span>
                </div>
                <h2 class="home-blog-heading">
                    Latest
                    <span class="accent">
                        Articles &amp; Strategies
                        <svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#FF2D75" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.4"/></svg>
                    </span>
                </h2>
                <p class="home-blog-desc">Practical tips, search algorithms, and proven digital growth methodologies from WebTecMart's strategists.</p>
            </div>

            <div class="row g-4" data-reveal-stagger style="display: flex; flex-wrap: wrap; margin: -12px;">
                <?php foreach ($posts as $post): ?>
                    <?php 
                    $postUrl = blogUrl($post);
                    $postImg = !empty($post['image']) ? $post['image'] : '/assets/images/placeholder.jpg';
                    ?>
                    <div class="col-12 col-md-6 col-lg-4" style="padding: 12px; flex: 1 1 320px; max-width: 400px;">
                        <article class="home-blog-card">
                            <div class="home-blog-img-wrap">
                                <img src="<?= e($postImg) ?>" alt="<?= e($post['title']) ?>" class="home-blog-img" loading="lazy" onerror="this.src='/assets/images/placeholder.jpg'">
                                <span class="home-blog-cat"><?= e($post['category'] ?? 'Insights') ?></span>
                            </div>
                            <div class="home-blog-body">
                                <div class="home-blog-meta">
                                    <span><?= e($post['date'] ?? date('M d, Y')) ?></span>
                                    <span>&bull;</span>
                                    <span><?= e($post['readTime'] ?? '4 min read') ?></span>
                                </div>
                                <h3 class="home-blog-title">
                                    <a href="<?= e($postUrl) ?>"><?= e($post['title']) ?></a>
                                </h3>
                                <p class="home-blog-excerpt">
                                    <?= e($post['summary'] ?? '') ?>
                                </p>
                                <div class="home-blog-foot">
                                    <a href="<?= e($postUrl) ?>" class="home-blog-link">
                                        Read Article &rarr;
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="home-blog-cta" data-wtm-reveal="fade-up">
                <a href="/blogs.php" class="home-blog-all-btn">
                    Browse All Insights &amp; Guides
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>
    <?php
}
