<?php
function renderBlogSection(): void
{
    $allPosts = blogPosts();
    $posts = array_slice($allPosts, 0, 3);
    if (!$posts) return;
    ?>
    <section class="home-blog-section" id="blog" style="padding: 72px 0 80px; background: #FBF8F1; position: relative;">
        <style>
            .home-blog-header {
                text-align: center;
                max-width: 720px;
                margin: 0 auto 48px;
            }
            .home-blog-pill {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: rgba(196, 0, 122, 0.1);
                color: #C4007A;
                font-size: 0.75rem;
                font-weight: 700;
                letter-spacing: 0.1em;
                text-transform: uppercase;
                padding: 6px 14px;
                border-radius: 999px;
                margin-bottom: 14px;
            }
            .home-blog-heading {
                font-size: clamp(1.8rem, 3.5vw, 2.6rem);
                font-weight: 800;
                color: #111827;
                line-height: 1.2;
                margin: 0 0 14px;
            }
            .home-blog-heading span {
                color: #C4007A;
            }
            .home-blog-desc {
                font-size: 1.05rem;
                color: #4B5563;
                line-height: 1.6;
                margin: 0;
            }
            .home-blog-card {
                background: #ffffff;
                border-radius: 20px;
                overflow: hidden;
                border: 1.5px solid rgba(196, 0, 122, 0.1);
                box-shadow: 0 10px 30px rgba(196, 0, 122, 0.06);
                transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
                display: flex;
                flex-direction: column;
                height: 100%;
            }
            .home-blog-card:hover {
                transform: translateY(-6px);
                border-color: #C4007A;
                box-shadow: 0 20px 45px rgba(196, 0, 122, 0.18);
            }
            .home-blog-img-wrap {
                position: relative;
                width: 100%;
                aspect-ratio: 16 / 10;
                overflow: hidden;
                background: #fce8f3;
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
                background: linear-gradient(90deg, #C4007A, #E0398F);
                color: #fff;
                font-size: 0.72rem;
                font-weight: 800;
                padding: 4px 12px;
                border-radius: 50px;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                box-shadow: 0 4px 12px rgba(196,0,122,0.35);
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
                color: #9CA3AF;
                margin-bottom: 10px;
            }
            .home-blog-title {
                font-size: 1.2rem;
                font-weight: 800;
                color: #111827;
                line-height: 1.4;
                margin: 0 0 10px;
            }
            .home-blog-title a {
                color: inherit;
                text-decoration: none;
                transition: color 0.2s ease;
            }
            .home-blog-card:hover .home-blog-title a {
                color: #C4007A;
            }
            .home-blog-excerpt {
                font-size: 0.92rem;
                color: #4B5563;
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
                border-top: 1px solid rgba(196, 0, 122, 0.08);
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .home-blog-link {
                color: #C4007A;
                font-weight: 700;
                font-size: 0.88rem;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                transition: transform 0.2s ease;
            }
            .home-blog-link:hover {
                color: #A3005F;
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
                padding: 13px 32px;
                border-radius: 50px;
                font-weight: 700;
                font-size: 0.95rem;
                text-decoration: none;
                color: #fff;
                background: linear-gradient(90deg, #C4007A, #E0398F);
                box-shadow: 0 10px 24px rgba(196, 0, 122, 0.25);
                transition: transform 0.25s ease, box-shadow 0.25s ease;
            }
            .home-blog-all-btn:hover {
                color: #fff;
                transform: translateY(-3px);
                box-shadow: 0 14px 30px rgba(196, 0, 122, 0.4);
            }
        </style>

        <div class="container" style="max-width: 1240px; margin: 0 auto; padding: 0 20px;">
            <div class="home-blog-header" data-wtm-reveal="fade-up">
                <span class="home-blog-pill">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    Marketing Insights
                </span>
                <h2 class="home-blog-heading">Latest <span>Articles &amp; SEO Strategies</span></h2>
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
