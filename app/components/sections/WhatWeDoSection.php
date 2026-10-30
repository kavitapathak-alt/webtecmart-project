<?php
function renderWhatWeDoSection(): void
{
    // 6 Core Services data matching the design reference exactly
    $services = [
        [
            'id' => 'branding',
            'href' => '/digital-business-branding.php',
            'icon' => 'pen',
            'title' => 'Digital Business Branding',
            'description' => 'Any web business can flourish and develop only if it is rightly promoted. "BRANDING" is highly crucial for a digital business\'s success, and you can assure a well-framed campaign with our digital marketing experts.',
            'tags' => ['Brand Strategy', 'Visual Identity', 'Brand Positioning', 'Brand Guidelines'],
        ],
        [
            'id' => 'website',
            'href' => '/website-design-development.php',
            'icon' => 'code',
            'title' => 'Website Design & Development',
            'description' => 'We help make the first impression of the website memorable and robust. By providing a mix of relevant content and graphics, we provide responsive, easy-to-use websites.',
            'tags' => ['Responsive Design', 'UI/UX', 'E-Commerce', 'CMS Integration'],
        ],
        [
            'id' => 'seo',
            'href' => '/search-engine-optimization.php',
            'icon' => 'search',
            'title' => 'Search Engine Optimization',
            'description' => '75% of online users refer to the search engines\' first page. Hence, it has become essential for businesses to be on the very first page. We help you rank higher on search.',
            'tags' => ['On-Page SEO', 'Off-Page SEO', 'Technical SEO', 'Keyword Research'],
        ],
        [
            'id' => 'smo',
            'href' => '/social-media-optimization.php',
            'icon' => 'share',
            'title' => 'Social Media Optimization',
            'description' => 'Now is the correct time that the audience starts craving for your content. This is only possible with engaging and innovative social media campaigns that our experts are well-versed with.',
            'tags' => ['Content Strategy', 'Social Media Management', 'Influencer Marketing', 'Community Building'],
        ],
        [
            'id' => 'sem',
            'href' => '/search-engine-marketing.php',
            'icon' => 'megaphone',
            'title' => 'Search Engine Marketing',
            'description' => 'Our professionals have the relevant practice of marketing businesses that use paid advertisements on SERPs. Our strategies help businesses increase visibility two folds.',
            'tags' => ['PPC Campaigns', 'Google Ads', 'Bing Ads', 'Retargeting'],
        ],
        [
            'id' => 'performance',
            'href' => '/performance-marketing.php',
            'icon' => 'smartphone',
            'title' => 'Performance Marketing',
            'description' => 'There are 2 million + mobile users today, which means having apps have become the need of the hour. Businesses are left with no choice but to come up with easy-to-use apps.',
            'tags' => ['iOS Development', 'Android Development', 'Cross-Platform', 'AppStore Optimization'],
        ],
    ];

    // Icon helper matching exact reference designs
    function coreSvcIcon(string $name): string {
        $icons = [
            'pen' => '<path d="m18 2 4 4-12 12H6v-4L18 2Z"/><path d="m15 5 4 4"/><circle cx="5" cy="19" r="1.5"/>',
            'code' => '<path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/>',
            'search' => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
            'share' => '<path d="M4 14v4a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-4"/><polyline points="16 8 12 4 8 8"/><line x1="12" y1="4" x2="12" y2="15"/>',
            'megaphone' => '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>',
            'smartphone' => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/>',
            'arrow' => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
            'sparkles' => '<path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3z"/>',
        ];
        $path = $icons[$name] ?? '';
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
    }
    ?>
    <style>
        /* ============================================================
           WHAT WE OFFER — OUR CORE SERVICES SECTION
           Matches exact reference screenshot styling with compact spacing
           ============================================================ */
        .core-services-section {
            width: 100%;
            background: #FBF8F1;
            padding: 32px 0 24px;
            position: relative;
        }
        @media (min-width: 768px) {
            .core-services-section {
                padding: 40px 0 28px;
            }
        }

        .core-services-container {
            max-width: 1280px;
            margin: 0 auto;
            padding-left: 20px;
            padding-right: 20px;
            width: 100%;
        }

        /* ===== Header ===== */
        .core-services-header {
            text-align: center;
            margin: 0 auto 22px;
            max-width: 720px;
        }
        @media (min-width: 768px) {
            .core-services-header {
                margin-bottom: 26px;
            }
        }

        .core-services-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(196, 0, 122, 0.08);
            border: 1px solid rgba(196, 0, 122, 0.15);
            padding: 5px 14px;
            border-radius: 9999px;
            margin-bottom: 10px;
        }

        .core-services-pill svg {
            width: 13px;
            height: 13px;
            color: #C4007A;
            flex-shrink: 0;
        }

        .core-services-pill span {
            font-size: 0.72rem;
            color: #C4007A;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .core-services-title {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: clamp(1.85rem, 3.2vw, 2.5rem);
            font-weight: 800;
            color: #111827;
            letter-spacing: -0.02em;
            line-height: 1.18;
            margin: 0 0 8px;
        }

        .core-services-title .accent {
            color: #C4007A;
            position: relative;
            display: inline-block;
        }

        .core-services-title .accent svg {
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 6px;
            pointer-events: none;
        }

        .core-services-subtitle {
            font-size: 0.95rem;
            color: #4B5563;
            margin: 0 auto;
            line-height: 1.55;
            max-width: 600px;
        }

        /* ===== 6-Card Grid ===== */
        .core-services-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        @media (min-width: 680px) {
            .core-services-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 22px;
            }
        }
        @media (min-width: 1024px) {
            .core-services-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 24px;
            }
        }

        /* ===== Card (Exact design reference matching) ===== */
        .core-service-card {
            background: #FFFFFF;
            border: 1.5px solid #F1E5EC;
            border-radius: 20px;
            padding: 26px 22px 20px 22px;
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: inherit;
            box-shadow: 0 4px 18px -2px rgba(17, 24, 39, 0.03);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1),
                        border-color 0.3s ease;
            position: relative;
        }

        .core-service-card:hover {
            transform: translateY(-5px);
            border-color: rgba(196, 0, 122, 0.32);
            box-shadow: 0 16px 28px -8px rgba(196, 0, 122, 0.12), 0 0 0 1px rgba(196, 0, 122, 0.12);
        }

        /* Icon Container */
        .core-service-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #FFF0F7;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            transition: transform 0.25s ease, background 0.25s ease;
            flex-shrink: 0;
        }

        .core-service-card:hover .core-service-icon {
            transform: scale(1.06);
            background: #FCE4EC;
        }

        .core-service-icon svg {
            width: 20px;
            height: 20px;
            color: #C4007A;
            stroke-width: 2;
        }

        /* Card Title */
        .core-service-heading {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: 1.18rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 10px;
            line-height: 1.32;
            letter-spacing: -0.015em;
            transition: color 0.2s ease;
        }

        .core-service-card:hover .core-service-heading {
            color: #C4007A;
        }

        /* Description */
        .core-service-desc {
            font-size: 0.85rem;
            color: #4B5563;
            line-height: 1.58;
            margin: 0 0 18px;
            flex-grow: 1;
        }

        /* Tags */
        .core-service-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 20px;
        }

        .core-service-tag {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            background: #FFF0F7;
            color: #C4007A;
            border-radius: 9999px;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.01em;
            transition: background 0.2s ease;
        }

        .core-service-card:hover .core-service-tag {
            background: #FCE4EC;
        }

        /* Learn More Link */
        .core-service-cta {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #C4007A;
            font-weight: 600;
            font-size: 0.88rem;
            text-decoration: none;
            margin-top: auto;
            transition: gap 0.2s ease, color 0.2s ease;
        }

        .core-service-cta svg {
            width: 14px;
            height: 14px;
            stroke-width: 2.5;
            transition: transform 0.2s ease;
        }

        .core-service-card:hover .core-service-cta {
            color: #A3005F;
        }

        .core-service-card:hover .core-service-cta svg {
            transform: translateX(4px);
        }

        /* ===== B2B & Exhibition SEO Spotlight Banner ===== */
        .core-spotlight-banner {
            margin-top: 24px;
            background: linear-gradient(135deg, #FFF0F7 0%, #FFFFFF 100%);
            border: 1.5px solid rgba(196, 0, 122, 0.18);
            border-radius: 16px;
            padding: 20px 24px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            align-items: flex-start;
            box-shadow: 0 4px 18px -4px rgba(196, 0, 122, 0.06);
            position: relative;
            overflow: hidden;
        }
        @media (min-width: 860px) {
            .core-spotlight-banner {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                padding: 22px 30px;
            }
        }

        .core-spotlight-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: #C4007A;
        }

        .core-spotlight-left {
            max-width: 760px;
        }

        .core-spotlight-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 9999px;
            background: #C4007A;
            color: #fff;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .core-spotlight-heading {
            font-family: 'Plus Jakarta Sans', -apple-system, sans-serif;
            font-size: 1.22rem;
            font-weight: 800;
            color: #111827;
            margin: 0 0 6px;
            line-height: 1.28;
        }

        .core-spotlight-heading span {
            color: #C4007A;
        }

        .core-spotlight-desc {
            font-size: 0.86rem;
            color: #4B5563;
            line-height: 1.55;
            margin: 0;
        }

        .core-spotlight-desc strong {
            color: #111827;
            font-weight: 600;
        }

        .core-spotlight-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #C4007A;
            color: #ffffff !important;
            padding: 10px 20px;
            border-radius: 9999px;
            font-weight: 700;
            font-size: 0.85rem;
            text-decoration: none;
            white-space: nowrap;
            box-shadow: 0 4px 14px -3px rgba(196, 0, 122, 0.3);
            transition: all 0.2s ease;
        }

        .core-spotlight-btn:hover {
            background: #A3005F;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px -4px rgba(196, 0, 122, 0.4);
        }

        .core-spotlight-btn svg {
            width: 14px;
            height: 14px;
            stroke-width: 2.5;
            transition: transform 0.2s ease;
        }

        .core-spotlight-btn:hover svg {
            transform: translateX(4px);
        }
    </style>

    <section class="core-services-section" id="core-services">
        <div class="core-services-container">

            <!-- Section Header -->
            <div class="core-services-header" data-wtm-reveal="fade-up">
                <div class="core-services-pill">
                    <?= coreSvcIcon('sparkles') ?>
                    <span>WHAT WE OFFER</span>
                </div>
                <h2 class="core-services-title">
                    Our
                    <span class="accent">
                        Core Services
                        <svg viewBox="0 0 300 6" preserveAspectRatio="none">
                            <path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.35"/>
                        </svg>
                    </span>
                </h2>
                <p class="core-services-subtitle">End-to-end digital solutions to help your business thrive</p>
            </div>

            <!-- 6 Services Grid (matches exact reference design) -->
            <div class="core-services-grid" data-reveal-stagger>
                <?php foreach ($services as $svc): ?>
                    <a href="<?= htmlspecialchars($svc['href']) ?>" class="core-service-card">
                        <div class="core-service-icon">
                            <?= coreSvcIcon($svc['icon']) ?>
                        </div>
                        <h3 class="core-service-heading"><?= htmlspecialchars($svc['title']) ?></h3>
                        <p class="core-service-desc"><?= htmlspecialchars($svc['description']) ?></p>

                        <div class="core-service-tags">
                            <?php foreach ($svc['tags'] as $tag): ?>
                                <span class="core-service-tag"><?= htmlspecialchars($tag) ?></span>
                            <?php endforeach; ?>
                        </div>

                        <span class="core-service-cta">
                            Learn More
                            <?= coreSvcIcon('arrow') ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- B2B & Exhibition SEO Flagship Spotlight Callout -->
            <div class="core-spotlight-banner" data-wtm-reveal="fade-up">
                <div class="core-spotlight-left">
                    <span class="core-spotlight-badge">Specialized Flagship</span>
                    <h3 class="core-spotlight-heading">B2B &amp; <span>Exhibition SEO</span> Services</h3>
                    <p class="core-spotlight-desc">
                        The organic search engine behind <strong>Bharat Tex Fair</strong> (Ministry of Textiles) and <strong>IHGF Delhi Autumn Fair</strong> (EPCH). We help trade show organizers, international exporters, and B2B brands dominate high-intent Google search rankings, capture global buyers, and pack exhibition halls.
                    </p>
                </div>
                <a href="/b2b-exhibition-seo.php" class="core-spotlight-btn">
                    Explore Exhibition SEO
                    <?= coreSvcIcon('arrow') ?>
                </a>
            </div>

        </div>
    </section>
    <?php
}