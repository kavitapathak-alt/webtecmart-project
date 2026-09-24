<?php require_once __DIR__ . '/app/templates/header.php'; ?>

<?php
// ===== Icon Helper =====
function pkgIcon(string $name): string {
    $icons = [
        'sparkles'   => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
        'arrow'      => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'check'      => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
        'rocket'     => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
        'zap'        => '<path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/>',
        'crown'      => '<path d="M11.562 3.266a.5.5 0 0 1 .876 0L15.39 8.87a1 1 0 0 0 1.516.294L21.183 5.5a.5.5 0 0 1 .798.519l-2.834 10.246a1 1 0 0 1-.956.735H5.81a1 1 0 0 1-.957-.735L2.02 6.02a.5.5 0 0 1 .798-.519l4.276 3.664a1 1 0 0 0 1.516-.294z"/><path d="M5 21h14"/>',
        'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'trending'   => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        'award'      => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'shield'     => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
        'mail'       => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
        'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'message'    => '<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>',
        'x'          => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
    ];
    $path = $icons[$name] ?? '';
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
}

// ===== Data =====
$packages = [
    [
        'id' => 'basic',
        'name' => 'Basic',
        'icon' => 'zap',
        'price' => ['monthly' => 9999, 'yearly' => 99990],
        'description' => 'Perfect for startups and small businesses looking to establish their digital presence.',
        'features' => [
            'Website Design & Development',
            'Basic SEO (10 Keywords)',
            'Social Media Setup (3 Platforms)',
            'Monthly Performance Report',
            'Email Support',
            '1 GB Hosting',
            '5 Pages Website',
            'Mobile Responsive Design',
        ],
        'popular' => false,
        'buttonText' => 'Get Started',
    ],
    [
        'id' => 'professional',
        'name' => 'Professional',
        'icon' => 'rocket',
        'price' => ['monthly' => 24999, 'yearly' => 249990],
        'description' => 'Ideal for growing businesses that need comprehensive digital marketing solutions.',
        'features' => [
            'Advanced Website Design & Development',
            'Advanced SEO (30 Keywords)',
            'Social Media Management (5 Platforms)',
            'Content Marketing (4 Posts/Month)',
            'Email & WhatsApp Support',
            '5 GB Hosting',
            '15 Pages Website',
            'Mobile Responsive Design',
            'Google Analytics Setup',
            'Monthly Strategy Call',
        ],
        'popular' => true,
        'buttonText' => 'Start Now',
    ],
    [
        'id' => 'enterprise',
        'name' => 'Enterprise',
        'icon' => 'crown',
        'price' => ['monthly' => 49999, 'yearly' => 499990],
        'description' => 'Complete solution for large businesses and enterprises with advanced needs.',
        'features' => [
            'Custom Website Development',
            'Premium SEO (50+ Keywords)',
            'Social Media Management (All Platforms)',
            'Content Marketing (8 Posts/Month)',
            '24/7 Priority Support',
            'Unlimited Hosting',
            'Unlimited Pages',
            'Mobile App Integration',
            'Advanced Analytics & Reporting',
            'Dedicated Account Manager',
            'Quarterly Strategy Review',
            'Custom Development',
        ],
        'popular' => false,
        'buttonText' => 'Contact Sales',
    ],
];

$addons = [
    ['name' => 'Additional SEO Keywords',      'price' => '₹500/keyword'],
    ['name' => 'Social Media Ads Management',  'price' => '₹15,000/month'],
    ['name' => 'Email Marketing Setup',        'price' => '₹10,000'],
    ['name' => 'Content Writing (Per Blog)',   'price' => '₹2,500'],
    ['name' => 'Advanced Analytics Dashboard', 'price' => '₹5,000/month'],
    ['name' => 'Dedicated Account Manager',    'price' => '₹20,000/month'],
];

$faqs = [
    [
        'question' => 'Can I upgrade my package later?',
        'answer'   => 'Yes, you can upgrade your package at any time. We\'ll prorate the difference and ensure a smooth transition.',
    ],
    [
        'question' => 'What happens if I need to cancel?',
        'answer'   => 'You can cancel your subscription anytime. We offer a 30-day money-back guarantee if you\'re not satisfied with our services.',
    ],
    [
        'question' => 'Do you offer custom packages?',
        'answer'   => 'Yes, we offer custom packages tailored to your specific business needs. Contact us for a personalized quote.',
    ],
    [
        'question' => 'How long does it take to see results?',
        'answer'   => 'Results vary depending on the service. SEO typically takes 3-6 months, while website development can be completed in 4-8 weeks.',
    ],
];

$trustBadges = [
    ['icon' => 'award', 'title' => '13+ Years', 'subtitle' => 'of Excellence'],
    ['icon' => 'users', 'title' => '1000+',     'subtitle' => 'Happy Clients'],
    ['icon' => 'shield', 'title' => '98%',      'subtitle' => 'Satisfaction Rate'],
    ['icon' => 'clock', 'title' => '24/7',      'subtitle' => 'Support Available'],
];
?>

<style>
    /* ============================================================
       PACKAGES PAGE — Webtecmart Next.js clone
       ============================================================ */
    .pkg-page {
        position: relative;
        width: 100%;
        background: #FBF8F1;
        overflow: hidden;
        color: #1F1B2A;
    }

    .pkg-container {
        max-width: 1280px;
        padding-left: 16px;
        padding-right: 16px;
        margin: 0 auto;
        width: 100%;
        position: relative;
        z-index: 10;
    }

    /* Decorative Background */
    .pkg-bg {
        position: absolute;
        inset: 0;
        pointer-events: none;
    }
    .pkg-bg-blob-1 {
        position: absolute;
        top: 0; right: 0;
        width: 50%; height: 50%;
        background: linear-gradient(to bottom left, rgba(196, 0, 122, 0.05), transparent);
        border-radius: 9999px;
        filter: blur(64px);
    }
    .pkg-bg-blob-2 {
        position: absolute;
        bottom: 0; left: 0;
        width: 33.333%; height: 50%;
        background: linear-gradient(to top right, rgba(196, 0, 122, 0.05), transparent);
        border-radius: 9999px;
        filter: blur(64px);
    }
    .pkg-bg-shape {
        position: absolute;
        fill: none;
        stroke: #C4007A;
        opacity: 0.1;
    }
    .pkg-bg-shape-1 { top: 80px; right: 40px; width: 128px; height: 128px; stroke-width: 2; }
    .pkg-bg-shape-2 { bottom: 80px; left: 40px; width: 160px; height: 160px; stroke-width: 1.5; }

    /* ===== HERO ===== */
    .pkg-hero {
        position: relative;
        padding: 48px 0;
        text-align: center;
    }
    @media (min-width: 768px) { .pkg-hero { padding: 48px 0; } }

    .pkg-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(196, 0, 122, 0.1);
        padding: 8px 16px;
        border-radius: 9999px;
        margin-bottom: 16px;
    }
    .pkg-pill svg { width: 16px; height: 16px; color: #C4007A; flex-shrink: 0; }
    .pkg-pill span {
        color: #C4007A;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .pkg-h1 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 2.25rem;
        font-weight: 700;
        color: #111827;
        line-height: 1.1;
        margin: 0;
    }
    @media (min-width: 768px) { .pkg-h1 { font-size: 2.25rem; } }

    .pkg-h1 .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .pkg-h1 .accent svg {
        position: absolute;
        left: 0;
        bottom: -8px;
        width: 100%;
        height: 8px;
    }

    .pkg-subtitle {
        color: #6B7280;
        font-size: 1rem;
        max-width: 768px;
        margin: 16px auto 0;
        line-height: 1.625;
    }
    @media (min-width: 768px) { .pkg-subtitle { font-size: 1.125rem; } }

    /* ===== Billing Toggle ===== */
    .pkg-toggle-wrap {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 16px;
        margin-bottom: 48px;
    }

    .pkg-toggle-label {
        font-size: 0.875rem;
        font-weight: 600;
        transition: color 0.3s ease;
    }
    .pkg-toggle-label.active { color: #C4007A; }
    .pkg-toggle-label.inactive { color: #9CA3AF; }

    .pkg-toggle {
        position: relative;
        width: 64px;
        height: 36px;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.2);
        border: none;
        cursor: pointer;
        transition: background 0.3s ease;
        padding: 0;
    }
    .pkg-toggle-knob {
        position: absolute;
        top: 4px;
        left: 4px;
        width: 28px;
        height: 28px;
        border-radius: 9999px;
        background: #C4007A;
        transition: transform 0.3s ease;
    }
    .pkg-toggle.yearly .pkg-toggle-knob {
        transform: translateX(28px);
    }

    .pkg-save-badge {
        margin-left: 8px;
        font-size: 12px;
        background: #DCFCE7;
        color: #16A34A;
        padding: 2px 8px;
        border-radius: 9999px;
        font-weight: 700;
    }

    /* ===== Packages Grid ===== */
    .pkg-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
        margin-bottom: 64px;
    }
    @media (min-width: 768px) {
        .pkg-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }

    .pkg-card {
        position: relative;
        background: #fff;
        border-radius: 16px;
        padding: 32px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: all 0.5s ease;
    }
    .pkg-card:hover {
        transform: translateY(-8px);
        border-color: rgba(196, 0, 122, 0.3);
        box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.1);
    }
    .pkg-card.popular {
        border-color: #C4007A;
        box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.2);
        transform: scale(1.02);
    }
    .pkg-card.popular:hover {
        transform: scale(1.02) translateY(-8px);
    }

    .pkg-popular-badge {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        background: #C4007A;
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        padding: 4px 16px;
        border-radius: 9999px;
        white-space: nowrap;
    }

    .pkg-card-head {
        text-align: center;
        margin-bottom: 24px;
    }

    .pkg-icon-wrap {
        width: 56px;
        height: 56px;
        border-radius: 9999px;
        background: #FDF0F6;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
    }
    .pkg-card.popular .pkg-icon-wrap {
        box-shadow: 0 0 0 2px #C4007A;
    }
    .pkg-icon-wrap svg {
        width: 28px;
        height: 28px;
        color: #C4007A;
    }

    .pkg-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }

    .pkg-desc {
        font-size: 0.875rem;
        color: #6B7280;
        margin: 8px 0 0;
    }

    .pkg-price-wrap {
        text-align: center;
        margin-bottom: 24px;
    }
    .pkg-price {
        font-size: 2.25rem;
        font-weight: 700;
        color: #C4007A;
    }
    .pkg-price-label {
        font-size: 0.875rem;
        color: #9CA3AF;
        margin-left: 4px;
    }

    .pkg-features {
        list-style: none;
        padding: 0;
        margin: 0 0 32px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .pkg-feature {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        font-size: 0.875rem;
        color: #4B5563;
    }
    .pkg-feature svg {
        width: 16px;
        height: 16px;
        color: #C4007A;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .pkg-cta {
        display: block;
        width: 100%;
        text-align: center;
        border-radius: 9999px;
        padding: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1rem;
        cursor: pointer;
        border: none;
        font-family: inherit;
    }
    .pkg-cta.popular {
        background: linear-gradient(90deg, #C4007A, #E0398F);
        color: #fff;
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.25);
    }
    .pkg-cta.popular:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.35);
        color: #fff;
    }
    .pkg-cta.regular {
        border: 2px solid #C4007A;
        color: #C4007A;
        background: transparent;
    }
    .pkg-cta.regular:hover {
        background: #C4007A;
        color: #fff;
    }

    /* ===== Add-ons ===== */
    .pkg-addons {
        background: linear-gradient(to bottom right, #FDF0F6, #fff);
        border-radius: 16px;
        padding: 32px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        margin-bottom: 64px;
    }
    @media (min-width: 768px) { .pkg-addons { padding: 48px; } }

    .pkg-addons-header {
        text-align: center;
        margin-bottom: 32px;
    }
    .pkg-addons-h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }
    @media (min-width: 768px) { .pkg-addons-h2 { font-size: 1.875rem; } }
    .pkg-addons-h2 .accent { color: #C4007A; }
    .pkg-addons-sub {
        color: #6B7280;
        font-size: 0.875rem;
        max-width: 672px;
        margin: 8px auto 0;
    }

    .pkg-addons-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
    }
    @media (min-width: 768px) { .pkg-addons-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (min-width: 1024px) { .pkg-addons-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); } }

    .pkg-addon {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #fff;
        border-radius: 12px;
        padding: 16px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        transition: all 0.3s ease;
    }
    .pkg-addon:hover {
        border-color: rgba(196, 0, 122, 0.3);
        box-shadow: 0 4px 6px -1px rgba(196, 0, 122, 0.1);
    }
    .pkg-addon-name {
        font-size: 0.875rem;
        color: #374151;
    }
    .pkg-addon-price {
        font-size: 0.875rem;
        font-weight: 700;
        color: #C4007A;
    }

    /* ===== Trust Badges ===== */
    .pkg-trust {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 64px;
    }
    @media (min-width: 768px) { .pkg-trust { grid-template-columns: repeat(4, minmax(0, 1fr)); } }

    .pkg-trust-card {
        background: #fff;
        border-radius: 12px;
        padding: 16px;
        text-align: center;
        border: 1px solid rgba(196, 0, 122, 0.1);
    }
    .pkg-trust-card svg {
        width: 24px;
        height: 24px;
        color: #C4007A;
        margin: 0 auto 8px;
        display: block;
    }
    .pkg-trust-title {
        font-size: 0.875rem;
        font-weight: 600;
        color: #111827;
    }
    .pkg-trust-sub {
        font-size: 0.75rem;
        color: #6B7280;
        margin-top: 2px;
    }

    /* ===== FAQ ===== */
    .pkg-faq-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .pkg-faq-h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }
    @media (min-width: 768px) { .pkg-faq-h2 { font-size: 1.875rem; } }
    .pkg-faq-h2 .accent { color: #C4007A; }
    .pkg-faq-sub {
        color: #6B7280;
        font-size: 0.875rem;
        max-width: 672px;
        margin: 8px auto 0;
    }

    .pkg-faq-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
        margin-bottom: 64px;
    }
    @media (min-width: 768px) { .pkg-faq-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }

    .pkg-faq-card {
        background: #fff;
        border-radius: 12px;
        padding: 24px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        transition: all 0.3s ease;
    }
    .pkg-faq-card:hover {
        box-shadow: 0 4px 6px -1px rgba(196, 0, 122, 0.1);
    }
    .pkg-faq-q {
        font-weight: 700;
        color: #111827;
        margin: 0 0 8px;
        font-size: 1rem;
    }
    .pkg-faq-a {
        font-size: 0.875rem;
        color: #4B5563;
        margin: 0;
        line-height: 1.625;
    }

    /* ===== CTA ===== */
    .pkg-cta-section {
        position: relative;
        background: linear-gradient(90deg, #A3005F, #C4007A, #E0398F);
        border-radius: 16px;
        padding: 32px;
        text-align: center;
        overflow: hidden;
        margin-bottom: 0;
    }
    @media (min-width: 768px) { .pkg-cta-section { padding: 48px; } }

    .pkg-cta-pattern {
        position: absolute;
        inset: 0;
        opacity: 0.1;
    }
    .pkg-cta-pattern svg { width: 100%; height: 100%; }

    .pkg-cta-inner {
        position: relative;
        z-index: 10;
    }
    .pkg-cta-h2 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: #fff;
        margin: 0 0 12px;
    }
    @media (min-width: 768px) { .pkg-cta-h2 { font-size: 1.875rem; } }

    .pkg-cta-sub {
        color: rgba(255, 255, 255, 0.8);
        max-width: 672px;
        margin: 0 auto 24px;
        font-size: 0.875rem;
    }
    @media (min-width: 768px) { .pkg-cta-sub { font-size: 1rem; } }

    .pkg-cta-btns {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 16px;
    }
    @media (min-width: 640px) { .pkg-cta-btns { flex-direction: row; } }

    .pkg-cta-btn-1 {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 9999px;
        background: #fff;
        padding: 14px 32px;
        font-weight: 700;
        color: #C4007A;
        text-decoration: none;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }
    .pkg-cta-btn-1:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
        color: #C4007A;
    }
    .pkg-cta-btn-1 svg { width: 16px; height: 16px; }

    .pkg-cta-btn-2 {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 9999px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        padding: 14px 32px;
        font-weight: 600;
        color: #fff;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .pkg-cta-btn-2:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
        color: #fff;
    }
    .pkg-cta-btn-2 svg { width: 16px; height: 16px; }

    /* ===== Bottom Decorative ===== */
    .pkg-bottom-deco {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        margin: 40px 0 8px;
    }
    .pkg-bottom-line {
        width: 48px;
        height: 1px;
        background: linear-gradient(to right, transparent, rgba(196, 0, 122, 0.3));
    }
    .pkg-bottom-line.right {
        background: linear-gradient(to left, transparent, rgba(196, 0, 122, 0.3));
    }
    .pkg-bottom-dots {
        display: flex;
        gap: 4px;
        align-items: center;
    }
    .pkg-bottom-dots span {
        display: block;
        width: 6px;
        height: 6px;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.2);
    }
    .pkg-bottom-dots span.active {
        width: 24px;
        background: #C4007A;
    }
</style>

<main class="pkg-page" id="packagesPage">

    <!-- Decorative Background -->
    <div class="pkg-bg">
        <div class="pkg-bg-blob-1"></div>
        <div class="pkg-bg-blob-2"></div>
        <svg class="pkg-bg-shape pkg-bg-shape-1" viewBox="0 0 100 100">
            <rect x="15" y="15" width="70" height="70" transform="rotate(45 50 50)"/>
        </svg>
        <svg class="pkg-bg-shape pkg-bg-shape-2" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="35"/>
        </svg>
    </div>

    <div class="pkg-container">

        <!-- ===== HERO ===== -->
        <div class="pkg-hero">
            <div class="pkg-pill">
                <?= pkgIcon('sparkles') ?>
                <span>Pricing Plans</span>
            </div>

            <h1 class="pkg-h1">
                Choose Your
                <span class="accent">
                    Package
                    <svg viewBox="0 0 300 8" preserveAspectRatio="none">
                        <path d="M2 4C60 1 240 1 298 4" stroke="#C4007A" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.3"/>
                    </svg>
                </span>
            </h1>

            <p class="pkg-subtitle">
                Select the perfect plan for your business needs. All packages include our expert support and proven strategies.
            </p>
        </div>

        <!-- ===== Billing Toggle ===== -->
        <div class="pkg-toggle-wrap">
            <span class="pkg-toggle-label <?= 'active' ?>" id="pkgLabelMonthly">Monthly</span>
            <button type="button" class="pkg-toggle" id="pkgToggle" onclick="pkgToggleBilling()" aria-label="Toggle billing cycle">
                <span class="pkg-toggle-knob"></span>
            </button>
            <span class="pkg-toggle-label inactive" id="pkgLabelYearly">
                Yearly
                <span class="pkg-save-badge">Save 20%</span>
            </span>
        </div>

        <!-- ===== Packages Grid ===== -->
        <div class="pkg-grid">
            <?php foreach ($packages as $pkg):
                $isPopular = !empty($pkg['popular']);
            ?>
                <div class="pkg-card <?= $isPopular ? 'popular' : '' ?>"
                     data-pkg-id="<?= htmlspecialchars($pkg['id']) ?>"
                     data-price-monthly="<?= (int) $pkg['price']['monthly'] ?>"
                     data-price-yearly="<?= (int) $pkg['price']['yearly'] ?>"
                     data-popular="<?= $isPopular ? '1' : '0' ?>">

                    <?php if ($isPopular): ?>
                        <div class="pkg-popular-badge">Most Popular</div>
                    <?php endif; ?>

                    <div class="pkg-card-head">
                        <div class="pkg-icon-wrap">
                            <?= pkgIcon($pkg['icon']) ?>
                        </div>
                        <h3 class="pkg-name"><?= htmlspecialchars($pkg['name']) ?></h3>
                        <p class="pkg-desc"><?= htmlspecialchars($pkg['description']) ?></p>
                    </div>

                    <div class="pkg-price-wrap">
                        <span class="pkg-price" data-pkg-price>₹<?= number_format($pkg['price']['monthly']) ?></span>
                        <span class="pkg-price-label" data-pkg-label>/month</span>
                    </div>

                    <ul class="pkg-features">
                        <?php foreach ($pkg['features'] as $feature): ?>
                            <li class="pkg-feature">
                                <?= pkgIcon('check') ?>
                                <?= htmlspecialchars($feature) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="/contact.php" class="pkg-cta <?= $isPopular ? 'popular' : 'regular' ?>">
                        <?= htmlspecialchars($pkg['buttonText']) ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- ===== Add-ons ===== -->
        <div class="pkg-addons">
            <div class="pkg-addons-header">
                <h2 class="pkg-addons-h2">
                    Customize Your
                    <span class="accent">Package</span>
                </h2>
                <p class="pkg-addons-sub">
                    Add these services to create a package that perfectly fits your needs
                </p>
            </div>

            <div class="pkg-addons-grid">
                <?php foreach ($addons as $addon): ?>
                    <div class="pkg-addon">
                        <span class="pkg-addon-name"><?= htmlspecialchars($addon['name']) ?></span>
                        <span class="pkg-addon-price"><?= htmlspecialchars($addon['price']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ===== Trust Badges ===== -->
        <div class="pkg-trust">
            <?php foreach ($trustBadges as $badge): ?>
                <div class="pkg-trust-card">
                    <?= pkgIcon($badge['icon']) ?>
                    <div class="pkg-trust-title"><?= htmlspecialchars($badge['title']) ?></div>
                    <div class="pkg-trust-sub"><?= htmlspecialchars($badge['subtitle']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- ===== FAQ ===== -->
        <div class="pkg-faq-header">
            <h2 class="pkg-faq-h2">
                Frequently Asked
                <span class="accent">Questions</span>
            </h2>
            <p class="pkg-faq-sub">
                Everything you need to know about our packages and services
            </p>
        </div>

        <div class="pkg-faq-grid">
            <?php foreach ($faqs as $faq): ?>
                <div class="pkg-faq-card">
                    <h3 class="pkg-faq-q"><?= htmlspecialchars($faq['question']) ?></h3>
                    <p class="pkg-faq-a"><?= htmlspecialchars($faq['answer']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- ===== CTA ===== -->
        <div class="pkg-cta-section">
            <div class="pkg-cta-pattern">
                <svg viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <pattern id="cta-grid-packages" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="1" height="1" fill="white"/>
                        </pattern>
                    </defs>
                    <rect x="0" y="0" width="100" height="100" fill="url(#cta-grid-packages)"/>
                </svg>
            </div>
            <div class="pkg-cta-inner">
                <h2 class="pkg-cta-h2">Need a Custom Package?</h2>
                <p class="pkg-cta-sub">
                    Contact us and we'll create a package tailored specifically for your business needs.
                </p>

                <div class="pkg-cta-btns">
                    <a href="/contact.php" class="pkg-cta-btn-1">
                        Contact Us
                        <?= pkgIcon('arrow') ?>
                    </a>
                    <a href="tel:+919999674255" class="pkg-cta-btn-2">
                        <?= pkgIcon('phone') ?>
                        Call: +91-9999674255
                    </a>
                </div>
            </div>
        </div>

        <!-- ===== Bottom Decorative ===== -->
        <div class="pkg-bottom-deco">
            <div class="pkg-bottom-line"></div>
            <div class="pkg-bottom-dots">
                <span></span><span></span><span></span>
                <span class="active"></span>
                <span></span><span></span><span></span>
            </div>
            <div class="pkg-bottom-line right"></div>
        </div>

    </div>
</main>

<script>
    // ===== Billing toggle =====
    let pkgBillingCycle = 'monthly';
    const pkgInrFormatter = new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: 'INR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    });

    function pkgToggleBilling() {
        pkgBillingCycle = (pkgBillingCycle === 'monthly') ? 'yearly' : 'monthly';

        const toggle = document.getElementById('pkgToggle');
        const labelMonthly = document.getElementById('pkgLabelMonthly');
        const labelYearly = document.getElementById('pkgLabelYearly');

        toggle.classList.toggle('yearly', pkgBillingCycle === 'yearly');

        if (pkgBillingCycle === 'yearly') {
            labelMonthly.classList.add('inactive');
            labelMonthly.classList.remove('active');
            labelYearly.classList.add('active');
            labelYearly.classList.remove('inactive');
        } else {
            labelMonthly.classList.add('active');
            labelMonthly.classList.remove('inactive');
            labelYearly.classList.add('inactive');
            labelYearly.classList.remove('active');
        }

        // Update all cards
        document.querySelectorAll('.pkg-card').forEach((card) => {
            const priceEl = card.querySelector('[data-pkg-price]');
            const labelEl = card.querySelector('[data-pkg-label]');
            if (!priceEl || !labelEl) return;

            const monthly = parseInt(card.dataset.priceMonthly, 10) || 0;
            const yearly = parseInt(card.dataset.priceYearly, 10) || 0;

            if (pkgBillingCycle === 'monthly') {
                priceEl.textContent = pkgInrFormatter.format(monthly);
                labelEl.textContent = '/month';
            } else {
                priceEl.textContent = pkgInrFormatter.format(yearly);
                labelEl.textContent = '/year';
            }
        });
    }
</script>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>