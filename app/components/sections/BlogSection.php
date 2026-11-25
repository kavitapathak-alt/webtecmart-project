<?php
function renderBlogSection(): void
{
    $allPosts = blogPosts();
    $posts = array_slice($allPosts, 0, 3);
    if (!$posts) return;
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

    <section class="xpb" id="blog">
        <style>
            /* ============================================================
               BLOG — "Expo Floor" colour edition (matches portfolio page)
               ============================================================ */
            .xpb {
                --pink:#C4007A; --pink2:#E0398F; --pink3:#FF7BC0;
                --deep:#7E004E; --head:#5E0B45;
                --blush:#FBEAF3; --soft:#FFF4FA;
                --gold:#FFB547; --mint:#0E9F6E;
                --text:#4A3342; --mute:#7A6574;
                --line:rgba(126,0,78,.14);
                --disp:'Bricolage Grotesque','Plus Jakarta Sans',system-ui,sans-serif;
                position:relative; padding:76px 0; overflow-x:clip; color:var(--text);
                font-family:'Plus Jakarta Sans',system-ui,-apple-system,sans-serif;
                background:var(--soft) radial-gradient(rgba(126,0,78,.07) 1px,transparent 1.2px) 0 0/24px 24px;
            }
            .xpb *, .xpb *::before, .xpb *::after { box-sizing:border-box; }
            .xpb h2, .xpb h3 { font-family:var(--disp); letter-spacing:-.02em; }
            /* awning scallop — pink/gold like the portfolio CTA */
            .xpb::before {
                content:''; position:absolute; top:0; left:0; right:0; height:18px; pointer-events:none;
                background:
                    radial-gradient(circle at 18px 0, var(--pink) 17px, transparent 18px) 0 0/36px 18px repeat-x,
                    radial-gradient(circle at 18px 0, var(--gold) 17px, transparent 18px) 18px 0/36px 18px repeat-x;
            }
            .xpb a:focus-visible { outline:3px solid var(--gold); outline-offset:2px; }
            .xpb-wrap { position:relative; max-width:1200px; margin:0 auto; padding:0 22px; }
            @media (min-width:1440px){ .xpb-wrap { max-width:1320px; } }

            .xpb-head { max-width:760px; margin:0 auto 40px; text-align:center; }
            .xpb-kicker {
                display:inline-block; margin-bottom:12px; padding-left:14px; border-left:4px solid var(--pink);
                font-size:.82rem; font-weight:800; color:var(--pink); text-align:left;
                text-transform:uppercase; letter-spacing:.06em;
            }
            .xpb-head h2 {
                margin:0 0 14px; font-family:var(--disp); font-size:clamp(1.85rem,3.5vw,2.8rem);
                font-weight:800; line-height:1.1; letter-spacing:-.02em; color:var(--head);
            }
            .xpb-head h2 span { color:var(--pink); }
            .xpb-bar { display:block; width:84px; height:7px; margin:0 auto 16px;
                background:repeating-linear-gradient(90deg,var(--pink) 0 12px,var(--gold) 12px 24px); }
            .xpb-head p { margin:0; color:var(--mute); line-height:1.65; font-size:1.02rem; }

            .xpb-grid { display:grid; gap:24px; grid-template-columns:minmax(0,1fr); }
            @media (min-width:640px){ .xpb-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }
            @media (min-width:992px){ .xpb-grid { grid-template-columns:repeat(3,minmax(0,1fr)); } }

            .xpb-card {
                display:flex; flex-direction:column; height:100%; min-width:0;
                background:#fff; border:2px solid var(--deep); border-radius:18px; overflow:hidden;
                box-shadow:6px 6px 0 var(--gold); transition:translate .25s, box-shadow .25s;
            }
            .xpb-card:hover { translate:-4px -4px; box-shadow:10px 10px 0 var(--pink); }
            .xpb-img { position:relative; aspect-ratio:16/10; overflow:hidden; background:var(--blush); border-bottom:2px solid var(--deep); }
            .xpb-img img { display:block; width:100%; height:100%; object-fit:cover; object-position:center; transition:transform .5s ease; }
            .xpb-card:hover .xpb-img img { transform:scale(1.05); }
            .xpb-cat {
                position:absolute; top:14px; left:14px; padding:5px 12px;
                background:var(--gold); color:var(--deep);
                border:2px solid var(--deep); border-radius:8px; box-shadow:3px 3px 0 var(--deep);
                font-size:.74rem; font-weight:800;
            }
            .xpb-body { display:flex; flex-direction:column; flex:1; padding:22px 22px 20px; }
            .xpb-meta { display:flex; flex-wrap:wrap; align-items:center; gap:6px 10px; margin-bottom:10px; font-size:.78rem; font-weight:700; color:var(--mute); }
            .xpb-meta i { width:5px; height:5px; border-radius:50%; background:var(--pink); }
            .xpb-title {
                margin:0 0 10px; font-family:var(--disp); font-size:1.2rem; font-weight:800;
                line-height:1.3; letter-spacing:-.01em; color:var(--head); overflow-wrap:anywhere;
            }
            .xpb-title a { color:inherit; text-decoration:none; transition:color .2s; }
            .xpb-card:hover .xpb-title a { color:var(--pink); }
            .xpb-excerpt {
                margin:0 0 18px; font-size:.92rem; line-height:1.65; color:var(--mute);
                display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;
            }
            .xpb-foot { margin-top:auto; padding-top:14px; border-top:2px dashed var(--line); }
            .xpb-link { display:inline-flex; align-items:center; gap:8px; font-weight:800; font-size:.9rem; color:var(--pink); text-decoration:none; transition:gap .2s; }
            .xpb-card:hover .xpb-link { gap:12px; }

            .xpb-cta { margin-top:48px; text-align:center; }
            .xpb-btn {
                display:inline-flex; align-items:center; justify-content:center; gap:10px;
                padding:15px 28px; border-radius:12px; border:2px solid var(--deep);
                background:var(--pink); color:#fff; font-weight:800; font-size:.95rem; line-height:1.2;
                text-decoration:none; box-shadow:0 6px 0 var(--deep); transition:translate .2s, box-shadow .2s;
            }
            .xpb-btn:hover { color:#fff; translate:0 2px; box-shadow:0 4px 0 var(--deep); }
            .xpb-btn:active { translate:0 6px; box-shadow:0 0 0 var(--deep); }
            .xpb-btn svg { flex-shrink:0; }

            @media (max-width:575px){
                .xpb { padding:56px 0; } .xpb-wrap { padding:0 16px; }
                .xpb-card { box-shadow:4px 4px 0 var(--gold); }
                .xpb-btn { width:100%; white-space:normal; text-align:center; min-height:48px; }
            }
            @media (hover:none){
                .xpb-card:hover { translate:none; box-shadow:6px 6px 0 var(--gold); }
            }
            @media (prefers-reduced-motion:reduce){
                .xpb-card,.xpb-img img,.xpb-btn,.xpb-link { transition:none; }
            }
        </style>

        <div class="xpb-wrap">
            <div class="xpb-head" data-wtm-reveal="fade-up">
                <span class="xpb-kicker">Latest insights</span>
                <h2>Latest <span>Articles &amp; Strategies</span></h2>
                <i class="xpb-bar"></i>
                <p>Practical tips, search algorithms, and proven digital growth methodologies from WebTecMart's strategists.</p>
            </div>

            <div class="xpb-grid" data-reveal-stagger>
                <?php foreach ($posts as $post): ?>
                    <?php
                    $postUrl = blogUrl($post);
                    $postImg = !empty($post['image']) ? $post['image'] : '/assets/images/placeholder.jpg';
                    ?>
                    <article class="xpb-card">
                        <div class="xpb-img">
                            <img src="<?= e($postImg) ?>" alt="<?= e($post['title']) ?>" loading="lazy" onerror="this.src='/assets/images/placeholder.jpg'">
                            <span class="xpb-cat"><?= e($post['category'] ?? 'Insights') ?></span>
                        </div>
                        <div class="xpb-body">
                            <div class="xpb-meta">
                                <span><?= e($post['date'] ?? date('M d, Y')) ?></span>
                                <i></i>
                                <span><?= e($post['readTime'] ?? '4 min read') ?></span>
                            </div>
                            <h3 class="xpb-title"><a href="<?= e($postUrl) ?>"><?= e($post['title']) ?></a></h3>
                            <p class="xpb-excerpt"><?= e($post['summary'] ?? '') ?></p>
                            <div class="xpb-foot">
                                <a href="<?= e($postUrl) ?>" class="xpb-link">Read Article <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="xpb-cta" data-wtm-reveal="fade-up">
                <a href="/blogs.php" class="xpb-btn">
                    <span>Browse All Insights &amp; Guides</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>
    <?php
}