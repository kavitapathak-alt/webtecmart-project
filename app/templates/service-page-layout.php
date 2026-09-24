<?php
/**
 * Service Page Layout — Reusable for all service pages
 * 
 * Usage:
 * renderServicePageLayout([
 *     'icon' => 'sparkles',
 *     'title' => 'Digital Business Branding',
 *     'tagline' => 'Build a Brand That Sticks',
 *     'heroDescription' => '...',
 *     'overview' => '...',
 *     'features' => [['title' => '...', 'description' => '...'], ...],
 *     'process' => [['step' => '01', 'title' => '...', 'description' => '...'], ...],
 *     'faqs' => [['q' => '...', 'a' => '...'], ...],
 * ]);
 */

function renderServicePageLayout(array $config): void
{
    $icon           = $config['icon'] ?? 'sparkles';
    $title          = $config['title'] ?? 'Service';
    $tagline        = $config['tagline'] ?? '';
    $heroDescription = $config['heroDescription'] ?? '';
    $overview       = $config['overview'] ?? '';
    $features       = $config['features'] ?? [];
    $process        = $config['process'] ?? [];
    $faqs           = $config['faqs'] ?? [];

    // Icon helper
    function svcIcon(string $name): string {
        $icons = [
            'sparkles'   => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
            'layout'     => '<rect width="18" height="7" x="3" y="3" rx="1"/><rect width="9" height="7" x="3" y="14" rx="1"/><rect width="5" height="7" x="16" y="14" rx="1"/>',
            'search'     => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
            'share'      => '<path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/>',
            'megaphone'  => '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>',
            'smartphone' => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/>',
            'check'      => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
            'arrow'      => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
            'plus'       => '<path d="M5 12h14"/><path d="M12 5v14"/>',
            'minus'      => '<path d="M5 12h14"/>',
            'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
            'rocket'     => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
        ];
        $path = $icons[$name] ?? $icons['sparkles'];
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
    }
    ?>
    <style>
        /* ============================================================
           SERVICE PAGE LAYOUT
           ============================================================ */
        .svc-page {
            width: 100%;
            background: #FBF8F1;
            color: #1F1B2A;
        }

        .svc-container {
            max-width: 1280px;
            padding-left: 16px;
            padding-right: 16px;
            margin: 0 auto;
            width: 100%;
        }

        .svc-narrow { max-width: 896px; margin: 0 auto; }

        /* ===== HERO ===== */
        .svc-hero {
            position: relative;
            padding: 48px 0 32px;
            overflow: hidden;
        }
        @media (min-width: 768px) { .svc-hero { padding: 64px 0 48px; } }

        .svc-hero-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }
        .svc-hero-bg::before {
            content: '';
            position: absolute;
            top: 0; right: 0;
            width: 50%; height: 50%;
            background: linear-gradient(to bottom left, rgba(196, 0, 122, 0.05), transparent);
            border-radius: 9999px;
            filter: blur(64px);
        }

        .svc-hero-inner {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 896px;
            margin: 0 auto;
        }

        .svc-hero-icon {
            display: inline-flex;
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: linear-gradient(135deg, #C4007A, #E0398F);
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 30px -10px rgba(196, 0, 122, 0.3);
            margin-bottom: 20px;
        }
        .svc-hero-icon svg {
            width: 40px;
            height: 40px;
            color: #fff;
        }

        .svc-tagline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(196, 0, 122, 0.1);
            color: #C4007A;
            padding: 8px 16px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 20px;
        }
        .svc-tagline .dot {
            width: 6px;
            height: 6px;
            border-radius: 9999px;
            background: #C4007A;
        }

        .svc-h1 {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: #111827;
            line-height: 1.15;
            letter-spacing: -0.02em;
            margin: 0 0 20px;
        }
        @media (min-width: 640px) { .svc-h1 { font-size: 2.5rem; } }
        @media (min-width: 768px) { .svc-h1 { font-size: 3rem; } }

        .svc-hero-desc {
            font-size: 1rem;
            color: #4B5563;
            line-height: 1.625;
            margin: 0 0 24px;
            max-width: 720px;
            margin-left: auto;
            margin-right: auto;
        }
        @media (min-width: 768px) { .svc-hero-desc { font-size: 1.125rem; } }

        .svc-hero-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 9999px;
            background: linear-gradient(90deg, #C4007A, #E0398F);
            padding: 14px 28px;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 10px 20px -5px rgba(196, 0, 122, 0.35);
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }
        .svc-hero-cta:hover {
            transform: scale(1.03);
            box-shadow: 0 20px 30px -5px rgba(196, 0, 122, 0.45);
            color: #fff;
        }
        .svc-hero-cta svg { width: 16px; height: 16px; }

        /* ===== OVERVIEW ===== */
        .svc-overview-section {
            padding: 0 0 48px;
        }
        @media (min-width: 768px) { .svc-overview-section { padding: 0 0 64px; } }

        .svc-overview-card {
            background: #fff;
            border-radius: 20px;
            padding: 32px;
            border: 1px solid rgba(196, 0, 122, 0.1);
            box-shadow: 0 10px 30px -15px rgba(196, 0, 122, 0.1);
        }
        @media (min-width: 768px) { .svc-overview-card { padding: 48px; } }

        .svc-overview-title {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 20px;
            text-align: center;
        }
        @media (min-width: 768px) { .svc-overview-title { font-size: 1.875rem; } }
        .svc-overview-title .accent { color: #C4007A; }

        .svc-overview-text {
            font-size: 1rem;
            color: #4B5563;
            line-height: 1.75;
            margin: 0;
            text-align: center;
            max-width: 720px;
            margin: 0 auto;
        }
        @media (min-width: 768px) { .svc-overview-text { font-size: 1.0625rem; } }

        /* ===== FEATURES ===== */
        .svc-features-section {
            padding: 0 0 64px;
        }
        @media (min-width: 768px) { .svc-features-section { padding: 0 0 80px; } }

        .svc-section-header {
            text-align: center;
            max-width: 672px;
            margin: 0 auto 40px;
        }
        @media (min-width: 768px) { .svc-section-header { margin-bottom: 56px; } }

        .svc-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin: 0 0 12px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: #C4007A;
        }
        .svc-eyebrow .dot {
            width: 6px;
            height: 6px;
            border-radius: 9999px;
            background: #C4007A;
        }

        .svc-section-title {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.875rem;
            font-weight: 800;
            color: #111827;
            margin: 0;
            line-height: 1.15;
        }
        @media (min-width: 768px) { .svc-section-title { font-size: 2.25rem; } }
        .svc-section-title .accent { color: #C4007A; }

        .svc-features-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }
        @media (min-width: 640px) { .svc-features-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (min-width: 1024px) { .svc-features-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); } }

        .svc-feature {
            background: #fff;
            border-radius: 16px;
            padding: 28px;
            border: 1px solid rgba(196, 0, 122, 0.08);
            transition: all 0.3s ease;
        }
        .svc-feature:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 30px -10px rgba(196, 0, 122, 0.15);
            border-color: rgba(196, 0, 122, 0.25);
        }

        .svc-feature-icon {
            display: inline-flex;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(196, 0, 122, 0.1);
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            transition: transform 0.3s ease;
        }
        .svc-feature:hover .svc-feature-icon {
            transform: scale(1.1);
        }
        .svc-feature-icon svg {
            width: 22px;
            height: 22px;
            color: #C4007A;
        }

        .svc-feature h3 {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.125rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 8px;
            line-height: 1.3;
        }

        .svc-feature p {
            font-size: 0.9375rem;
            color: #4B5563;
            line-height: 1.625;
            margin: 0;
        }

        /* ===== PROCESS ===== */
        .svc-process-section {
            padding: 64px 0;
            background: linear-gradient(180deg, rgba(196, 0, 122, 0.03), transparent);
        }
        @media (min-width: 768px) { .svc-process-section { padding: 80px 0; } }

        .svc-process-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        @media (min-width: 640px) { .svc-process-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (min-width: 1024px) { .svc-process-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); } }

        .svc-process-card {
            position: relative;
            background: #fff;
            border-radius: 16px;
            padding: 28px;
            border: 1px solid rgba(196, 0, 122, 0.1);
            transition: all 0.3s ease;
        }
        .svc-process-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 30px -10px rgba(196, 0, 122, 0.15);
        }

        .svc-process-step {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            color: rgba(196, 0, 122, 0.15);
            line-height: 1;
            margin-bottom: 12px;
        }

        .svc-process-card h3 {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 10px;
        }

        .svc-process-card p {
            font-size: 0.9375rem;
            color: #4B5563;
            line-height: 1.625;
            margin: 0;
        }

        /* ===== FAQ ===== */
        .svc-faq-section {
            padding: 0 0 64px;
        }
        @media (min-width: 768px) { .svc-faq-section { padding: 0 0 80px; } }

        .svc-faq-list {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .svc-faq {
            background: #fff;
            border-radius: 14px;
            border: 1px solid rgba(196, 0, 122, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .svc-faq.active {
            box-shadow: 0 10px 30px -10px rgba(196, 0, 122, 0.15);
        }

        .svc-faq-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 20px 24px;
            background: transparent;
            border: none;
            text-align: left;
            cursor: pointer;
            font-family: inherit;
            transition: background 0.3s ease;
        }
        .svc-faq-btn:hover { background: rgba(196, 0, 122, 0.03); }

        .svc-faq-q {
            font-size: 0.9375rem;
            font-weight: 600;
            color: #111827;
        }
        @media (min-width: 768px) { .svc-faq-q { font-size: 1rem; } }

        .svc-faq-icon {
            display: flex;
            width: 28px;
            height: 28px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.1);
            color: #C4007A;
            transition: all 0.3s ease;
        }
        .svc-faq.active .svc-faq-icon {
            background: #C4007A;
            color: #fff;
            transform: rotate(180deg);
        }
        .svc-faq-icon svg {
            width: 14px;
            height: 14px;
        }

        .svc-faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
            padding: 0 24px;
            font-size: 0.9375rem;
            color: #4B5563;
            line-height: 1.7;
        }
        .svc-faq.active .svc-faq-body {
            max-height: 400px;
            padding: 0 24px 20px;
        }

        /* ===== CTA ===== */
        .svc-cta {
            position: relative;
            background: linear-gradient(90deg, #A3005F, #C4007A, #E0398F);
            border-radius: 20px;
            padding: 40px 24px;
            text-align: center;
            overflow: hidden;
            margin-bottom: 64px;
        }
        @media (min-width: 768px) { .svc-cta { padding: 56px 32px; } }

        .svc-cta::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.15) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.4;
            pointer-events: none;
        }

        .svc-cta-inner {
            position: relative;
            z-index: 10;
        }
        .svc-cta-inner > svg {
            width: 48px;
            height: 48px;
            color: #fff;
            margin: 0 auto 16px;
            display: block;
        }

        .svc-cta h2 {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            margin: 0 0 12px;
        }
        @media (min-width: 768px) { .svc-cta h2 { font-size: 1.875rem; } }

        .svc-cta p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.9375rem;
            max-width: 640px;
            margin: 0 auto 24px;
            line-height: 1.6;
        }
        @media (min-width: 768px) { .svc-cta p { font-size: 1rem; } }

        .svc-cta-btns {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }
        @media (min-width: 640px) { .svc-cta-btns { flex-direction: row; } }

        .svc-cta-btn-1 {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 9999px;
            background: #fff;
            padding: 14px 28px;
            font-weight: 700;
            color: #C4007A;
            text-decoration: none;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }
        .svc-cta-btn-1:hover {
            transform: scale(1.03);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
            color: #C4007A;
        }
        .svc-cta-btn-1 svg { width: 16px; height: 16px; }

        .svc-cta-btn-2 {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 9999px;
            border: 2px solid rgba(255, 255, 255, 0.4);
            padding: 12px 26px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }
        .svc-cta-btn-2:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.6);
            color: #fff;
        }
    </style>

    <main class="svc-page">

        <!-- ===== HERO ===== -->
        <section class="svc-hero">
            <div class="svc-hero-bg"></div>
            <div class="svc-container">
                <div class="svc-hero-inner">

                    <div class="svc-hero-icon">
                        <?= svcIcon($icon) ?>
                    </div>

                    <div>
                        <span class="svc-tagline">
                            <span class="dot"></span>
                            <?= htmlspecialchars($tagline) ?>
                        </span>
                    </div>

                    <h1 class="svc-h1"><?= htmlspecialchars($title) ?></h1>

                    <p class="svc-hero-desc"><?= htmlspecialchars($heroDescription) ?></p>

                    <a href="/contact.php" class="svc-hero-cta">
                        Get Free Consultation
                        <?= svcIcon('arrow') ?>
                    </a>

                </div>
            </div>
        </section>

        <!-- ===== OVERVIEW ===== -->
        <section class="svc-overview-section">
            <div class="svc-container">
                <div class="svc-overview-card">
                    <h2 class="svc-overview-title">
                        Overview of <span class="accent"><?= htmlspecialchars($title) ?></span>
                    </h2>
                    <p class="svc-overview-text"><?= htmlspecialchars($overview) ?></p>
                </div>
            </div>
        </section>

        <!-- ===== FEATURES ===== -->
        <?php if (!empty($features)): ?>
        <section class="svc-features-section">
            <div class="svc-container">

                <div class="svc-section-header">
                    <p class="svc-eyebrow">
                        <span class="dot"></span>
                        What's Included
                    </p>
                    <h2 class="svc-section-title">
                        Everything You Need to <span class="accent">Succeed</span>
                    </h2>
                </div>

                <div class="svc-features-grid">
                    <?php foreach ($features as $feature): ?>
                        <div class="svc-feature">
                            <div class="svc-feature-icon">
                                <?= svcIcon('check') ?>
                            </div>
                            <h3><?= htmlspecialchars($feature['title']) ?></h3>
                            <p><?= htmlspecialchars($feature['description']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php endif; ?>

        <!-- ===== PROCESS ===== -->
        <?php if (!empty($process)): ?>
        <section class="svc-process-section">
            <div class="svc-container">

                <div class="svc-section-header">
                    <p class="svc-eyebrow">
                        <span class="dot"></span>
                        How We Work
                    </p>
                    <h2 class="svc-section-title">
                        Our <span class="accent">Process</span>
                    </h2>
                </div>

                <div class="svc-process-grid">
                    <?php foreach ($process as $step): ?>
                        <div class="svc-process-card">
                            <div class="svc-process-step"><?= htmlspecialchars($step['step']) ?></div>
                            <h3><?= htmlspecialchars($step['title']) ?></h3>
                            <p><?= htmlspecialchars($step['description']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php endif; ?>

        <!-- ===== FAQ ===== -->
        <?php if (!empty($faqs)): ?>
        <section class="svc-faq-section">
            <div class="svc-container">

                <div class="svc-section-header">
                    <p class="svc-eyebrow">
                        <span class="dot"></span>
                        Common Questions
                    </p>
                    <h2 class="svc-section-title">
                        Frequently Asked <span class="accent">Questions</span>
                    </h2>
                </div>

                <div class="svc-faq-list" id="svcFaqList">
                    <?php foreach ($faqs as $i => $faq): ?>
                        <div class="svc-faq <?= $i === 0 ? 'active' : '' ?>">
                            <button type="button" class="svc-faq-btn" onclick="svcToggleFaq(this)">
                                <span class="svc-faq-q"><?= htmlspecialchars($faq['q']) ?></span>
                                <span class="svc-faq-icon">
                                    <?= svcIcon('plus') ?>
                                </span>
                            </button>
                            <div class="svc-faq-body">
                                <?= htmlspecialchars($faq['a']) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php endif; ?>

        <!-- ===== CTA ===== -->
        <section class="svc-container">
            <div class="svc-cta">
                <div class="svc-cta-inner">
                    <?= svcIcon('rocket') ?>
                    <h2>Ready to Get Started with <?= htmlspecialchars($title) ?>?</h2>
                    <p>Let's discuss how we can help your business grow with a strategy tailored to your goals.</p>

                    <div class="svc-cta-btns">
                        <a href="/contact.php" class="svc-cta-btn-1">
                            Get Free Consultation
                            <?= svcIcon('arrow') ?>
                        </a>
                        <a href="tel:+919999674255" class="svc-cta-btn-2">
                            <?= svcIcon('phone') ?>
                            Call: +91-9999674255
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script>
        function svcToggleFaq(btn) {
            const faq = btn.closest('.svc-faq');
            const list = document.getElementById('svcFaqList');
            const isActive = faq.classList.contains('active');

            // Close all
            list.querySelectorAll('.svc-faq').forEach((el) => {
                el.classList.remove('active');
                const icon = el.querySelector('.svc-faq-icon');
                if (icon) {
                    icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>`;
                }
            });

            // Open current if was closed
            if (!isActive) {
                faq.classList.add('active');
                const icon = faq.querySelector('.svc-faq-icon');
                if (icon) {
                    icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>`;
                }
            }
        }
    </script>
    <?php
}