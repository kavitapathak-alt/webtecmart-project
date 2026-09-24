<?php
function renderWhatWeDoSection(): void
{
    // ===== Services Data =====
    $services = [
        [
            'id' => 'branding',
            'href' => '/digital-business-branding.php',
            'icon' => 'sparkles',
            'title' => 'Digital Business Branding',
            'description' => "A digital business only grows when it's positioned the right way. Branding sits at the heart of that growth, and our marketing experts craft well-framed campaigns that build a strong, memorable identity for your brand.",
        ],
        [
            'id' => 'website',
            'href' => '/website-design-development.php',
            'icon' => 'layout',
            'title' => 'Website Design & Development',
            'description' => 'First impressions matter online, and we help make yours memorable and robust. With the right mix of content and visuals, we build responsive, easy-to-use websites that work as hard as you do.',
        ],
        [
            'id' => 'seo',
            'href' => '/search-engine-optimization.php',
            'icon' => 'search',
            'title' => 'Search Engine Optimization',
            'description' => "Nearly 75% of online users never go past the first page of search results, which makes ranking there essential for any business. Our SEO strategies work with Google's algorithm to help your pages climb higher and stay visible.",
        ],
        [
            'id' => 'smo',
            'href' => '/social-media-optimization.php',
            'icon' => 'share',
            'title' => 'Social Media Optimization',
            'description' => "Audiences today are looking for content that speaks to them. We create engaging, innovative social media campaigns that keep your brand part of the conversation and your audience coming back for more.",
        ],
        [
            'id' => 'sem',
            'href' => '/search-engine-marketing.php',
            'icon' => 'megaphone',
            'title' => 'Search Engine Marketing',
            'description' => "Paid advertisements on search engine result pages remain one of the fastest ways to get noticed. Our experienced team builds strategies that can double a business's visibility through smart, targeted SERP campaigns.",
        ],
        [
            'id' => 'app',
            'href' => '/mobile-app-development.php',
            'icon' => 'smartphone',
            'title' => 'Mobile App Development',
            'description' => "With 2 million+ mobile users and growing, having an app is no longer optional — it's expected. We build easy-to-use, on-trend apps that help businesses meet their customers right where they are.",
        ],
    ];

    $managedServices = serviceCards();
    if ($managedServices) {
        $services = array_map(static function (array $service): array {
            return [
                'href' => $service['href'] ?? '/services.php',
                'icon' => 'sparkles',
                'title' => $service['title'],
                'description' => $service['summary'] ?? '',
                'image' => $service['image'] ?? '',
            ];
        }, $managedServices);
    }

    // Icon helper
    function wwdIcon(string $name): string {
        $icons = [
            'sparkles' => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
            'layout'   => '<rect width="18" height="7" x="3" y="3" rx="1"/><rect width="9" height="7" x="3" y="14" rx="1"/><rect width="5" height="7" x="16" y="14" rx="1"/>',
            'search'   => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
            'share'    => '<path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/>',
            'megaphone'=> '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>',
            'smartphone' => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/>',
        ];
        $path = $icons[$name] ?? '';
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
    }
    ?>
    <style>
        /* ============================================================
           WHAT WE DO SECTION — PURE PINK VERSION
           ============================================================ */
        .wwd-section {
            width: 100%;
            background: #fff;
            padding: 64px 0;
        }
        @media (min-width: 768px) {
            .wwd-section { padding: 80px 0; }
        }

        .wwd-container {
            max-width: 1280px;
            padding-left: 16px;
            padding-right: 16px;
            margin: 0 auto;
            width: 100%;
        }

        /* ===== Header ===== */
        .wwd-header {
            margin: 0 auto 48px;
            max-width: 768px;
            text-align: center;
        }
        @media (min-width: 768px) {
            .wwd-header { margin-bottom: 64px; }
        }

        .wwd-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(196, 0, 122, 0.1);
            padding: 8px 16px;
            border-radius: 9999px;
            margin-bottom: 16px;
        }

        .wwd-pill svg {
            width: 16px;
            height: 16px;
            color: #C4007A;
            flex-shrink: 0;
        }

        .wwd-pill span {
            color: #C4007A;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .wwd-heading {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.875rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
            line-height: 1.2;
        }
        @media (min-width: 640px) {
            .wwd-heading { font-size: 2.25rem; }
        }
        @media (min-width: 768px) {
            .wwd-heading { font-size: 2.25rem; }
        }

        .wwd-heading .accent {
            color: #C4007A;
            position: relative;
            display: inline-block;
        }

        .wwd-heading .accent svg {
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 100%;
            height: 8px;
        }

        /* ===== Grid ===== */
        .wwd-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }
        @media (min-width: 640px) {
            .wwd-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media (min-width: 1024px) {
            .wwd-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        }

        /* ===== Card ===== */
        .wwd-card {
            display: block;
            background: #FBF8F1;
            border: 1px solid #F3F4F6;
            border-radius: 16px;
            padding: 32px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .wwd-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.1), 0 4px 6px -2px rgba(196, 0, 122, 0.05);
            border-color: rgba(196, 0, 122, 0.2);
        }
        .wwd-card-image {
            display: block;
            width: 100%;
            height: 150px;
            margin: -8px 0 22px;
            border-radius: 12px;
            object-fit: cover;
        }

        /* Icon Box — Pink version (no black) */
        .wwd-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: rgba(196, 0, 122, 0.1);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .wwd-card:hover .wwd-icon {
            background: linear-gradient(135deg, #C4007A, #E0398F);
            transform: scale(1.05);
            box-shadow: 0 8px 16px -4px rgba(196, 0, 122, 0.3);
        }
        .wwd-icon svg {
            width: 20px;
            height: 20px;
            color: #C4007A;
            transition: color 0.3s ease;
        }
        .wwd-card:hover .wwd-icon svg {
            color: #fff;
        }

        /* Title */
        .wwd-card h3 {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 12px;
            line-height: 1.3;
            transition: color 0.3s ease;
        }
        .wwd-card:hover h3 {
            color: #C4007A;
        }

        /* Description */
        .wwd-card p {
            font-size: 15px;
            color: #4B5563;
            line-height: 1.625;
            margin: 0;
        }
    </style>

    <section class="wwd-section" id="whatWeDoSection">
        <div class="wwd-container">

            <!-- Header -->
            <div class="wwd-header">
                <div class="wwd-pill">
                    <?= wwdIcon('sparkles') ?>
                    <span>What We Do</span>
                </div>

                <h2 class="wwd-heading">
                    Development
                    <span class="accent">
                        Services
                        <svg viewBox="0 0 300 8" preserveAspectRatio="none">
                            <path d="M2 4C60 1 240 1 298 4" stroke="#C4007A" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.3"/>
                        </svg>
                    </span>
                    Offered by Us
                </h2>
            </div>

            <!-- Grid -->
            <div class="wwd-grid">
                <?php foreach ($services as $service): ?>
                    <a href="<?= htmlspecialchars($service['href']) ?>" class="wwd-card">
                        <?php if (!empty($service['image'])): ?>
                            <img src="<?= htmlspecialchars($service['image']) ?>" alt="<?= htmlspecialchars($service['title']) ?>" class="wwd-card-image">
                        <?php endif; ?>
                        <span class="wwd-icon">
                            <?= wwdIcon($service['icon']) ?>
                        </span>
                        <h3><?= htmlspecialchars($service['title']) ?></h3>
                        <p><?= htmlspecialchars($service['description']) ?></p>
                    </a>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
    <?php
}