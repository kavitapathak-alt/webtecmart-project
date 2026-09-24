<?php
function renderAboutBrandSection(): void
{
    // ===== Stats data =====
    $stats = [
        ['icon' => 'award',     'value' => '13+',       'label' => 'Years Experience'],
        ['icon' => 'shield',    'value' => '100%',      'label' => 'Ethical Agency'],
        ['icon' => 'dollar',    'value' => 'Affordable','label' => 'Agency Fee'],
        ['icon' => 'users2',    'value' => '11',        'label' => 'In-House Team'],
    ];

    // ===== Why Choose Us =====
    $whyChooseUs = [
        '👤 Dedicated Account Manager',
        '📊 Transparent Reporting',
        '📈 ROI-Driven Strategies',
        '⚡ Fast Support & Execution',
    ];

    // ===== Features =====
    $features = [
        [
            'icon' => 'rocket',
            'title' => '360° Digital Solutions',
            'description' => 'From website development and SEO to branding, social media, paid advertising, and mobile apps—we provide everything your business needs to grow under one roof.',
        ],
        [
            'icon' => 'target',
            'title' => 'Growth-Focused Strategies',
            'description' => 'Every campaign is built with one goal in mind: attracting qualified traffic, generating leads, increasing conversions, and maximizing your ROI.',
        ],
        [
            'icon' => 'brain',
            'title' => 'Innovation Meets Performance',
            'description' => 'We combine creative thinking, AI-powered insights, and data-driven strategies to deliver digital solutions that keep your brand ahead of the competition.',
        ],
        [
            'icon' => 'handshake',
            'title' => 'Your Long-Term Growth Partner',
            'description' => "We don't just complete projects—we build lasting partnerships. Our team works as an extension of your business, providing transparent communication, continuous optimization, and dedicated support.",
        ],
    ];

    // Icon SVG helper
    function abIcon(string $name): string {
        $icons = [
            'award'   => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
            'shield'  => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
            'dollar'  => '<line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>',
            'users2'  => '<path d="M14 19a6 6 0 0 0-12 0"/><circle cx="8" cy="9" r="4"/><path d="M22 19a6 6 0 0 0-6-6 4 4 0 1 0 0-8"/>',
            'rocket'  => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
            'target'  => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
            'brain'   => '<path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"/><path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"/><path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"/><path d="M17.599 6.5a3 3 0 0 0 .399-1.375"/><path d="M6.003 5.125A3 3 0 0 0 6.401 6.5"/><path d="M3.477 10.896a4 4 0 0 1 .585-.396"/><path d="M19.938 10.5a4 4 0 0 1 .585.396"/><path d="M6 18a4 4 0 0 1-1.967-.516"/><path d="M19.967 17.484A4 4 0 0 1 18 18"/>',
            'handshake' => '<path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2"/><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 4h8"/>',
            'heart'   => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/><path d="M12 5 9.04 7.96a2.17 2.17 0 0 0 0 3.08c.82.82 2.13.85 3 .07l2.07-1.9a2.82 2.82 0 0 1 3.79 0l2.96 2.66"/><path d="m18 15-2-2"/><path d="m15 18-2-2"/>',
            'check'   => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
            'arrow'   => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
            'sparkles'=> '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
            'user'    => '<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
        ];
        $path = $icons[$name] ?? '';
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
    }
    ?>
    <style>
        /* ============================================================
           ABOUT SECTION — Webtecmart Next.js clone
        ============================================================ */
        .about-section {
            position: relative;
            width: 100%;
            padding: 16px 0;
            background: #FBF8F1;
            overflow: hidden;
        }

        /* Decorative background */
        .about-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .about-bg-blob-1 {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 50%;
            background: linear-gradient(to bottom left, rgba(196, 0, 122, 0.05), transparent);
            border-radius: 9999px;
            filter: blur(64px);
        }

        .about-bg-blob-2 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 33.333%;
            height: 33.333%;
            background: linear-gradient(to top right, rgba(196, 0, 122, 0.05), transparent);
            border-radius: 9999px;
            filter: blur(64px);
        }

        .about-bg-shape {
            position: absolute;
            stroke: #C4007A;
            stroke-width: 2;
            fill: none;
            opacity: 0.1;
            display: none;
        }

        /* ===== Header ===== */
        .about-header {
            position: relative;
            z-index: 10;
            text-align: center;
            margin-bottom: 24px;
        }

        .about-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(196, 0, 122, 0.1);
            padding: 4px 10px;
            border-radius: 9999px;
            margin-bottom: 8px;
        }

        .about-pill svg {
            width: 12px;
            height: 12px;
            color: #C4007A;
            flex-shrink: 0;
        }

        .about-pill span {
            font-size: 10px;
            color: #C4007A;
            font-weight: 600;
            letter-spacing: 0.025em;
            text-transform: uppercase;
        }

        .about-heading {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
            line-height: 1.3;
            padding: 0 8px;
        }

        .about-heading .accent {
            color: #C4007A;
            position: relative;
            display: inline-block;
        }

        .about-heading .accent svg {
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 6px;
        }

        .about-subtitle {
            font-size: 0.75rem;
            color: #6B7280;
            max-width: 640px;
            margin: 8px auto 0;
            padding: 0 16px;
        }

        /* ===== Main Grid ===== */
        .about-grid {
            position: relative;
            z-index: 10;
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            align-items: stretch;
        }

        /* ===== LEFT COLUMN ===== */
        .about-left {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* Image Card */
        .about-image-card {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(196, 0, 122, 0.1);
            border: 1px solid rgba(196, 0, 122, 0.1);
        }

        .about-image-inner {
            position: relative;
            width: 100%;
            aspect-ratio: 4 / 3;
        }

        .about-image-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .about-image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(196, 0, 122, 0.5), rgba(196, 0, 122, 0.1) 50%, transparent);
        }

        .about-brand-badge {
            position: absolute;
            bottom: 8px;
            left: 8px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(4px);
            border-radius: 8px;
            padding: 6px 10px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .about-brand-badge h3 {
            font-size: 0.75rem;
            font-weight: 700;
            color: #C4007A;
            margin: 0;
            line-height: 1.1;
        }

        .about-brand-badge p {
            font-size: 8px;
            color: #4B5563;
            margin: 0;
        }

        /* Stats Grid */
        .about-stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 6px;
            margin-top: 12px;
        }

        .about-stat {
            background: #fff;
            border-radius: 8px;
            padding: 8px;
            text-align: center;
            border: 1px solid rgba(196, 0, 122, 0.1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .about-stat:hover {
            box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.1);
            transform: translateY(-4px);
        }

        .about-stat svg {
            width: 14px;
            height: 14px;
            color: #C4007A;
            margin: 0 auto 2px;
            display: block;
        }

        .about-stat .value {
            font-size: 0.875rem;
            font-weight: 700;
            color: #C4007A;
            line-height: 1.2;
        }

        .about-stat .label {
            font-size: 8px;
            color: #4B5563;
            line-height: 1.2;
            margin-top: 2px;
        }

        /* Why Choose Us Card */
        .about-why {
            flex: 1;
            background: #fff;
            border-radius: 8px;
            padding: 12px;
            margin-top: 12px;
            border: 1px solid rgba(196, 0, 122, 0.1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .about-why h4 {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-weight: 700;
            color: #111827;
            font-size: 0.875rem;
            margin: 0 0 8px;
        }

        .about-why ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .about-why li {
            display: flex;
            align-items: flex-start;
            gap: 6px;
        }

        .about-why li svg {
            width: 14px;
            height: 14px;
            color: #C4007A;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .about-why li span {
            font-size: 10px;
            color: #4B5563;
            line-height: 1.6;
        }

        .about-why-footer {
            margin-top: auto;
            padding-top: 12px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            border-top: 1px solid rgba(196, 0, 122, 0.1);
        }

        .about-avatars {
            display: flex;
            margin-left: -8px;
        }

        .about-avatars > div {
            width: 20px;
            height: 20px;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.1);
            border: 2px solid #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: -8px;
        }

        .about-avatars > div:first-child { margin-left: 0; }

        .about-avatars svg {
            width: 10px;
            height: 10px;
            color: #C4007A;
        }

        .about-trust-text {
            font-size: 8px;
            color: #6B7280;
        }

        .about-trust-text .bold {
            font-weight: 600;
            color: #C4007A;
        }

        /* ===== RIGHT COLUMN ===== */
        .about-right {
            display: flex;
            flex-direction: column;
            height: 100%;
            gap: 12px;
        }

        .about-right h3 {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.125rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 6px;
            line-height: 1.3;
        }

        .about-right h3 .accent {
            color: #C4007A;
        }

        .about-right p {
            font-size: 0.75rem;
            color: #4B5563;
            line-height: 1.625;
            margin: 0 0 6px;
        }

        .about-right p:last-child { margin-bottom: 0; }

        .about-right p .bold {
            font-weight: 700;
            color: #C4007A;
        }

        /* Features Grid */
        .about-features {
            display: grid;
            grid-template-columns: 1fr;
            gap: 8px;
        }

        .about-feature {
            background: #fff;
            border-radius: 8px;
            padding: 10px;
            border: 1px solid rgba(196, 0, 122, 0.05);
            transition: all 0.3s ease;
        }

        .about-feature:hover {
            border-color: rgba(196, 0, 122, 0.2);
            box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.1);
        }

        .about-feature svg {
            width: 14px;
            height: 14px;
            color: #C4007A;
            margin-bottom: 4px;
            transition: transform 0.3s ease;
        }

        .about-feature:hover svg {
            transform: scale(1.1);
        }

        .about-feature h4 {
            font-weight: 600;
            color: #111827;
            font-size: 10px;
            margin: 0 0 2px;
        }

        .about-feature p {
            font-size: 8px;
            color: #6B7280;
            line-height: 1.625;
            margin: 0;
        }

        /* USP Badge */
        .about-usp {
            background: linear-gradient(to right, rgba(196, 0, 122, 0.05), #FDF0F6);
            border-radius: 8px;
            padding: 10px;
            border: 1px solid rgba(196, 0, 122, 0.1);
        }

        .about-usp-inner {
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .about-usp-icon {
            width: 20px;
            height: 20px;
            border-radius: 9999px;
            background: rgba(196, 0, 122, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .about-usp-icon svg {
            width: 10px;
            height: 10px;
            color: #C4007A;
        }

        .about-usp h5 {
            font-weight: 600;
            color: #111827;
            font-size: 10px;
            margin: 0 0 2px;
        }

        .about-usp p {
            font-size: 8px;
            color: #4B5563;
            line-height: 1.625;
            margin: 0;
        }

        /* CTA Row */
        .about-cta-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            padding-top: 4px;
        }

        .about-cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 9999px;
            background: linear-gradient(to right, #C4007A, #E0398F);
            padding: 6px 14px;
            font-weight: 600;
            color: #fff;
            box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.25);
            transition: all 0.3s ease;
            font-size: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .about-cta-btn:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.35);
            color: #fff;
        }

        .about-cta-btn svg {
            width: 10px;
            height: 10px;
        }

        .about-cta-excellence {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 10px;
            color: #6B7280;
        }

        .about-cta-excellence svg {
            width: 12px;
            height: 12px;
            color: #C4007A;
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */

        /* Small (≥ 480px) — mini improvements */
        @media (min-width: 480px) {
            .about-section { padding: 20px 0; }
            .about-header { margin-bottom: 32px; }
            .about-pill { gap: 8px; padding: 6px 12px; margin-bottom: 12px; }
            .about-pill svg { width: 14px; height: 14px; }
            .about-pill span { font-size: 12px; }
            .about-heading { font-size: 1.5rem; }
            .about-subtitle { font-size: 0.875rem; margin-top: 12px; }
            .about-grid { gap: 32px; }
            .about-image-card { border-radius: 16px; }
            .about-brand-badge { bottom: 12px; left: 12px; border-radius: 12px; padding: 8px 12px; }
            .about-brand-badge h3 { font-size: 0.875rem; }
            .about-brand-badge p { font-size: 10px; }
            .about-stats { gap: 8px; margin-top: 16px; }
            .about-stat { border-radius: 12px; padding: 10px; }
            .about-stat svg { width: 16px; height: 16px; margin-bottom: 4px; }
            .about-stat .value { font-size: 1rem; }
            .about-stat .label { font-size: 10px; }
            .about-why { border-radius: 12px; padding: 16px; margin-top: 16px; }
            .about-why h4 { font-size: 1rem; margin-bottom: 12px; }
            .about-why ul { gap: 10px; }
            .about-why li svg { width: 16px; height: 16px; }
            .about-why li span { font-size: 12px; }
            .about-why-footer { padding-top: 16px; gap: 12px; }
            .about-avatars > div { width: 24px; height: 24px; }
            .about-avatars svg { width: 12px; height: 12px; }
            .about-trust-text { font-size: 10px; }
            .about-right { gap: 16px; }
            .about-right h3 { font-size: 1.25rem; margin-bottom: 8px; }
            .about-right p { font-size: 0.875rem; margin-bottom: 8px; }
            .about-features { gap: 10px; }
            .about-feature { padding: 12px; border-radius: 12px; }
            .about-feature svg { width: 16px; height: 16px; margin-bottom: 6px; }
            .about-feature h4 { font-size: 12px; }
            .about-feature p { font-size: 10px; }
            .about-usp { padding: 12px; border-radius: 12px; }
            .about-usp-inner { gap: 10px; }
            .about-usp-icon { width: 24px; height: 24px; }
            .about-usp-icon svg { width: 12px; height: 12px; }
            .about-usp h5 { font-size: 12px; }
            .about-usp p { font-size: 10px; }
            .about-cta-row { gap: 12px; padding-top: 8px; }
            .about-cta-btn { padding: 8px 18px; font-size: 12px; gap: 8px; }
            .about-cta-btn svg { width: 12px; height: 12px; }
            .about-cta-excellence { font-size: 12px; gap: 6px; }
            .about-cta-excellence svg { width: 14px; height: 14px; }
        }

        /* Medium (≥ 768px) */
        @media (min-width: 768px) {
            .about-section { padding: 24px 0; }
            .about-header { margin-bottom: 40px; }
            .about-pill svg { width: 16px; height: 16px; }
            .about-pill span { font-size: 14px; }
            .about-heading { font-size: 1.875rem; }
            .about-subtitle { font-size: 1rem; }
            .about-grid { gap: 40px; }
            .about-brand-badge { bottom: 16px; left: 16px; padding: 10px 16px; }
            .about-brand-badge h3 { font-size: 1rem; }
            .about-brand-badge p { font-size: 12px; }
            .about-stats { gap: 12px; margin-top: 24px; }
            .about-stat { padding: 12px; }
            .about-stat svg { width: 20px; height: 20px; margin-bottom: 4px; }
            .about-stat .value { font-size: 1.125rem; }
            .about-stat .label { font-size: 12px; }
            .about-why { padding: 20px; margin-top: 24px; }
            .about-why h4 { font-size: 1.125rem; margin-bottom: 16px; }
            .about-why ul { gap: 12px; }
            .about-why li svg { width: 20px; height: 20px; }
            .about-why li span { font-size: 14px; }
            .about-why-footer { padding-top: 20px; gap: 16px; }
            .about-avatars > div { width: 28px; height: 28px; }
            .about-avatars svg { width: 14px; height: 14px; }
            .about-trust-text { font-size: 12px; }
            .about-right { gap: 20px; }
            .about-right h3 { font-size: 1.5rem; margin-bottom: 12px; }
            .about-right p { font-size: 1rem; margin-bottom: 12px; }
            .about-features { gap: 12px; }
            .about-feature { padding: 14px; }
            .about-feature svg { width: 18px; height: 18px; margin-bottom: 6px; }
            .about-feature h4 { font-size: 14px; }
            .about-feature p { font-size: 12px; }
            .about-usp { padding: 16px; }
            .about-usp-icon { width: 28px; height: 28px; }
            .about-usp-icon svg { width: 14px; height: 14px; }
            .about-usp h5 { font-size: 14px; }
            .about-usp p { font-size: 12px; }
            .about-cta-row { gap: 16px; padding-top: 8px; }
            .about-cta-btn { padding: 10px 22px; font-size: 14px; }
            .about-cta-btn svg { width: 14px; height: 14px; }
            .about-cta-excellence { font-size: 14px; gap: 8px; }
            .about-cta-excellence svg { width: 16px; height: 16px; }
        }

        /* Large (≥ 1024px) — 2-col layout */
        @media (min-width: 1024px) {
            .about-section { padding: 32px 0; }
            .about-header { margin-bottom: 48px; }
            .about-heading { font-size: 2.25rem; }
            .about-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 48px;
            }
            .about-stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .about-right { gap: 24px; }
            .about-right h3 { font-size: 1.875rem; margin-bottom: 16px; }
            .about-features {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 16px;
            }
            .about-feature { padding: 16px; }
            .about-feature svg { width: 20px; height: 20px; margin-bottom: 8px; }
            .about-feature h4 { font-size: 14px; }
            .about-feature p { font-size: 12px; }
            .about-usp { padding: 16px; }
            .about-usp-icon { width: 32px; height: 32px; }
            .about-usp-icon svg { width: 16px; height: 16px; }
            .about-cta-btn { padding: 12px 24px; font-size: 16px; }
            .about-cta-btn svg { width: 16px; height: 16px; }
            .about-cta-excellence { font-size: 14px; }
        }

        /* Extra Large (≥ 1280px) */
        @media (min-width: 1280px) {
            .about-section { padding: 40px 0; }
            .about-header { margin-bottom: 64px; }
            .about-grid { gap: 64px; }
            .about-why { padding: 24px; }
            .about-why h4 { font-size: 1.125rem; }
            .about-why li span { font-size: 14px; }
            .about-usp { padding: 20px; }
        }

        /* Decorative shapes - show only on larger screens */
        @media (min-width: 640px) {
            .about-bg-shape { display: block; }
            .about-bg-shape-1 {
                top: -80px;
                left: -80px;
                width: 128px;
                height: 128px;
            }
            .about-bg-shape-2 {
                bottom: 40px;
                right: 20px;
                width: 96px;
                height: 96px;
            }
        }

        @media (min-width: 768px) {
            .about-bg-shape-1 { width: 192px; height: 192px; top: -96px; left: -96px; }
            .about-bg-shape-2 { width: 128px; height: 128px; }
        }

        @media (min-width: 1024px) {
            .about-bg-shape-1 { width: 256px; height: 256px; top: -128px; left: -128px; }
            .about-bg-shape-2 { width: 160px; height: 160px; }
            .about-bg-shape-3 {
                display: block;
                top: 50%;
                left: 20px;
                width: 64px;
                height: 64px;
            }
        }

        @media (min-width: 1280px) {
            .about-bg-shape-1 { width: 320px; height: 320px; top: -160px; left: -160px; }
            .about-bg-shape-2 { width: 192px; height: 192px; }
            .about-bg-shape-3 { width: 96px; height: 96px; }
        }
    </style>

    <section class="about-section" id="aboutSection">

        <!-- Decorative Background -->
        <div class="about-bg">
            <div class="about-bg-blob-1"></div>
            <div class="about-bg-blob-2"></div>

            <svg class="about-bg-shape about-bg-shape-1" viewBox="0 0 100 100">
                <rect x="10" y="10" width="80" height="80" transform="rotate(45 50 50)" />
            </svg>
            <svg class="about-bg-shape about-bg-shape-2" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="40" />
            </svg>
            <svg class="about-bg-shape about-bg-shape-3" viewBox="0 0 100 100">
                <polygon points="50,10 90,90 10,90" />
            </svg>
        </div>

        <div class="container">

            <!-- Header -->
            <div class="about-header">
                <div class="about-pill">
                    <?= abIcon('sparkles') ?>
                    <span>About WebTecMart</span>
                </div>

                <h2 class="about-heading">
                    Complete
                    <span class="accent">
                        Digital Branding
                        <svg viewBox="0 0 300 6" preserveAspectRatio="none">
                            <path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.3"/>
                        </svg>
                    </span>
                    Agency
                </h2>

                <p class="about-subtitle">
                    Helping Your Business Get Found, Get Clicked, and Grow
                </p>
            </div>

            <!-- Main Grid -->
            <div class="about-grid">

                <!-- LEFT COLUMN -->
                <div class="about-left">

                    <!-- Image Card -->
                    <div class="about-image-card">
                        <div class="about-image-inner">
                            <img
                                src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80"
                                alt="WebTecMart digital branding agency team collaborating"
                                loading="lazy"
                            >
                            <div class="about-image-overlay"></div>

                            <!-- Floating Brand Badge -->
                            <div class="about-brand-badge">
                                <h3>WebTecMart</h3>
                                <p>Digital Branding Agency</p>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="about-stats">
                        <?php foreach ($stats as $stat): ?>
                            <div class="about-stat">
                                <?= abIcon($stat['icon']) ?>
                                <div class="value"><?= htmlspecialchars($stat['value']) ?></div>
                                <div class="label"><?= htmlspecialchars($stat['label']) ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Why Choose Us -->
                    <div class="about-why">
                        <h4>Why Businesses Choose WebTecMart</h4>
                        <ul>
                            <?php foreach ($whyChooseUs as $point): ?>
                                <li>
                                    <?= abIcon('check') ?>
                                    <span><?= htmlspecialchars($point) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="about-why-footer">
                            <div class="about-avatars">
                                <?php for ($i = 0; $i < 4; $i++): ?>
                                    <div><?= abIcon('user') ?></div>
                                <?php endfor; ?>
                            </div>
                            <p class="about-trust-text">
                                Trusted by <span class="bold">500+ brands</span> across industries
                            </p>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="about-right">

                    <div>
                        <h3>
                            Your Trusted Partner in
                            <span class="accent">Digital Growth</span>
                        </h3>

                        <p>
                            WebTecMart is the <span class="bold">No.1 digital service provider</span> from the last 13 years in the industry, strengthening over <span class="bold">1000+</span> online businesses with comprehensive digital marketing solutions.
                        </p>

                        <p>
                            We aim at transforming every idea into the proposition that results in revolutionary business growth. IT, Digital Marketing, and Online Reputation Management services offered by us are at par. We come up with innovative and futuristic options that help you sustain in a competitive market environment.
                        </p>
                    </div>

                    <!-- Features Grid -->
                    <div class="about-features">
                        <?php foreach ($features as $feature): ?>
                            <div class="about-feature">
                                <?= abIcon($feature['icon']) ?>
                                <h4><?= htmlspecialchars($feature['title']) ?></h4>
                                <p><?= htmlspecialchars($feature['description']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- USP Badge -->
                    <div class="about-usp">
                        <div class="about-usp-inner">
                            <div class="about-usp-icon">
                                <?= abIcon('heart') ?>
                            </div>
                            <div>
                                <h5>Our USP</h5>
                                <p>
                                    We host a very qualified team, which are great listeners as well. Our digital wizard experts possess analytical skills to build customized and innovative plans for clients.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="about-cta-row">
                        <a href="/about.php" class="about-cta-btn">
                            Learn More About Us
                            <?= abIcon('arrow') ?>
                        </a>
                        <div class="about-cta-excellence">
                            <?= abIcon('check') ?>
                            <span>13+ Years of Excellence</span>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <?php
}