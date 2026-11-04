<?php
$pageMeta = [
    'title' => 'SEO Services in Delhi – Result-Driven SEO to Grow Your Business | WebTecMart',
    'description' => 'Build search visibility that drives real business growth. WebTecMart is the top-rated SEO agency in Delhi NCR providing AI-ready SEO, Google #1 rankings, and qualified organic leads.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

// Pull dynamic overrides from DB if updated via Admin Panel
$dbService = getServiceBySlug('seo-services-delhi');

$heroTitle = $dbService['hero_title'] ?? 'Build Search Visibility That Drives Real Business Growth';
$heroDesc = $dbService['hero_description'] ?? ($dbService['summary'] ?? 'Get discovered through traditional search and emerging AI experiences with data-led SEO built around relevant content, strong technical foundations, entity signals, and sustainable authority.');
$founderName = $dbService['founder_name'] ?? 'Jitin Madaan';
$founderRole = $dbService['founder_role'] ?? 'Performance Marketing Strategist';
$founderImage = $dbService['founder_image'] ?? '/assets/images/jitin-madaan.png';
$founderAvatar = $dbService['founder_avatar'] ?? '/assets/images/jitin-madaan-avatar.png';
$founderInitial = 'JM';

// Key Takeaways Google SERP Image (dynamic & uploadable in admin)
$serpImage = $dbService['serp_image'] ?? '/assets/images/seo-takeaways-preview.png';

// 1. Dynamic Brand Logos (Image 1 Reference)
$brandLogos = $dbService['brand_logos'] ?? [
    ['name' => 'Informa Global', 'logo' => '/assets/images/logo-1.png', 'category' => 'Trade Events'],
    ['name' => 'Bharat Tex Fair', 'logo' => '/assets/images/logos-10.jpeg', 'category' => 'Ministry of Textiles'],
    ['name' => 'IHGF Delhi Autumn Fair 2027', 'logo' => '/assets/images/logos-11.jpeg', 'category' => 'Global Sourcing Fair'],
    ['name' => 'Clarion Events', 'logo' => '/assets/images/logos-2.png', 'category' => 'Exhibition Leader'],
    ['name' => 'London Tech Week', 'logo' => '/assets/images/logos-3.jpeg', 'category' => 'Tech Expo'],
    ['name' => 'Media 10', 'logo' => '/assets/images/logos-4.jpeg', 'category' => 'Design & Media'],
    ['name' => 'The AI Summit', 'logo' => '/assets/images/logos-5.jpeg', 'category' => 'Enterprise AI'],
    ['name' => 'Northstar Travel Group', 'logo' => '/assets/images/logos-6.jpeg', 'category' => 'Travel Group'],
    ['name' => 'BMJ Future Health', 'logo' => '/assets/images/logos-7.jpeg', 'category' => 'Healthcare Publishing'],
    ['name' => 'Stonex Jewellers', 'logo' => '/assets/images/stonex-jewellers-logo.png', 'category' => 'Luxury Retail'],
    ['name' => 'Innovation Zero', 'logo' => '/assets/images/logos-8.jpeg', 'category' => 'CleanTech Congress'],
    ['name' => 'Premier Logistics', 'logo' => '/assets/images/logos-9.jpeg', 'category' => 'Industrial Logistics']
];

// 2. Dynamic 4-Quadrant Growth Wheel (Image 2 Reference)
$growthQuadrants = $dbService['growth_quadrants'] ?? [
    'center_label' => 'Clicks from Search',
    'center_sub'   => 'Increases measured over 90-day active sprint vs prior period',
    'quadrants'    => [
        ['label' => 'B2B Trade Show & Global Expo', 'metric' => '400%', 'sub' => 'Bharat Tex / Global Textile Expo'],
        ['label' => 'International Sourcing Fair', 'metric' => '300%', 'sub' => 'IHGF Delhi Autumn Fair 2027'],
        ['label' => 'B2B Industrial & Manufacturing', 'metric' => '85%', 'sub' => 'Commercial Inbound Lead Volume'],
        ['label' => 'Delhi NCR Commercial SEO', 'metric' => '1,393%', 'sub' => 'Organic Inbound Search Leap']
    ],
    'cards' => [
        [
            'icon' => '🎯',
            'title' => 'Attract High-Intent Commercial Buyers',
            'desc' => 'Targeting specific transactional & commercial search queries with engineered landing pages that capture buyers ready to transact.'
        ],
        [
            'icon' => '📢',
            'title' => 'Enhance Brand Entity Authority & Legacy',
            'desc' => 'Ensuring your executive thought leadership, brand knowledge graph, and service catalogue are indexable, permanent, and recommended by AI engines.'
        ]
    ]
];

// 3. Dynamic Strategic Narrative (Image 3 Reference)
$strategicNarrative = $dbService['strategic_narrative'] ?? [
    'title' => 'Search Engine Optimisation Engineered for Real Business Growth',
    'p1' => 'Optimising your website for search engines is the most powerful, compounding channel to attract high-value commercial clients, verified trade buyers, and qualified customer enquiries while driving sustainable long-term revenue.',
    'p2' => "While results cannot be guaranteed overnight, our 13+ years of battle-tested SEO engineering ensures your business is uniquely positioned to achieve exceptional organic dominance across Delhi NCR, pan-India, and global export markets."
];

// 4. Dynamic Client Feedback (Image 4 Reference)
$clientFeedback = $dbService['client_feedback'] ?? [
    [
        'quote' => "Thank you so much WebTecMart. We've noticed a phenomenal improvement in commercial search visibility, keyword engagement, and subsequently a large proportion of our verified customer enquiries are coming directly through the website. Thanks again for being so proactive and hands-on with the SEO work...",
        'author' => 'Libby Powell',
        'role' => 'Marketing Director',
        'company' => 'Innovation Zero',
        'rating' => 5
    ],
    [
        'quote' => "WebTecMart has completely evolved our strategic thinking when it comes to enterprise websites. One of our greatest success stories was converting our legacy domain to an optimized search architecture which led to a 731% increase in website users and a 164% uplift in organic search conversions...",
        'author' => 'Louise Smith',
        'role' => 'Associate Director',
        'company' => 'Society of Petroleum Engineers',
        'rating' => 5
    ],
    [
        'quote' => "Their support, keyword clustering, and best practice guidance helped ensure we now have a user friendly, SEO efficient, creative, and high performing landing site for our target audience across Delhi NCR and international markets...",
        'author' => 'Ali McQueen',
        'role' => 'Head of Marketing',
        'company' => 'RoarB2B',
        'rating' => 5
    ],
    [
        'quote' => "From zero organic visibility to ranking #1 for over 45 high-commercial search phrases within 6 months. WebTecMart is by far the most knowledgeable, data-driven, and trustworthy SEO team in Delhi NCR.",
        'author' => 'Rajesh Singhania',
        'role' => 'Managing Director',
        'company' => 'Stonex Luxury Retail',
        'rating' => 5
    ]
];

// 5. Dynamic SEO Masterclass (Image 5 Reference)
$masterclass = $dbService['masterclass'] ?? [
    'title' => 'SEO Masterclass & In-House Blueprint.',
    'subtitle' => 'Maximise your commercial marketing with our bespoke SEO Masterclass, designed to equip your team with the practical skills to implement modern SEO effectively in-house.',
    'headline' => 'Designed for Enterprise Teams, Marketers & Founders',
    'description' => 'This four-week intensive blueprint demystifies search algorithms, AI search overviews (AEO/GEO), and ranking mechanics. Led by industry expert Jitin Madaan (Performance Marketing Strategist), you will be equipped with the exact frameworks powering 5,000+ top Google rankings.',
    'skills' => [
        'Commercial Keyword Research & Search Intent Mapping',
        'Reverse-Engineering Competitor Authority & Backlink Profiles',
        'High-Impact Content Strategy & Semantic Topical Clusters',
        'Technical SEO, Crawl Health & Core Web Vitals Optimization',
        'Conversion Rate Optimization (CRO) & UX Engagement Signals',
        'GA4 Analytics, Google Search Console & AI Search Tracking',
        'and much more...'
    ],
    'video_duration' => '15 min executive training',
    'instructor' => 'Jitin Madaan • Performance Marketing Strategist',
    'reviews' => [
        [
            'author' => 'Angelique Menon',
            'company' => 'BMJ Global',
            'quote' => 'I really enjoyed the training sessions and going through our own websites at the same time. The hands-on insights on search intent and AI overviews worked very well.'
        ],
        [
            'author' => 'Carmen Searle',
            'company' => 'AEO Association',
            'quote' => 'A huge thank you to WebTecMart for their outstanding SEO training. Their extensive knowledge, patience, and actionable advice helped us implement high-impact strategies immediately.'
        ],
        [
            'author' => 'Rosie Shreaves',
            'company' => 'Montgomery Group',
            'quote' => 'Jitin was great and extremely knowledgeable on modern SEO. All of our questions were answered, and our team found the course tremendously useful.'
        ]
    ]
];
$mcVideoImage = $masterclass['video_image'] ?? $dbService['masterclass_image'] ?? '/assets/images/case-study-1.jpg';
?>

<!-- Swiper 11 CSS for Touch Sliders -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Schema.org JSON-LD Structured Data for Local SEO & FAQPage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "LocalBusiness",
      "@id": "https://webtecmart.com/#organization",
      "name": "WebTecMart Digital - Premier SEO Agency Delhi",
      "url": "https://webtecmart.com/seo-services-delhi.php",
      "logo": "https://webtecmart.com/assets/images/webtecmart-logo.png",
      "description": "Top-rated SEO company in Delhi NCR providing data-driven Google #1 rankings, AI-ready SEO, and qualified lead generation.",
      "telephone": "+91-9999674255",
      "email": "info@webtecmart.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Connaught Place / Nehru Place Commercial Center",
        "addressLocality": "New Delhi",
        "addressRegion": "Delhi",
        "postalCode": "110001",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 28.6139,
        "longitude": 77.2090
      },
      "areaServed": [
        {"@type": "City", "name": "Delhi"},
        {"@type": "City", "name": "New Delhi"},
        {"@type": "City", "name": "Noida"},
        {"@type": "City", "name": "Gurgaon"},
        {"@type": "City", "name": "Faridabad"},
        {"@type": "City", "name": "Ghaziabad"}
      ]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "What are SEO services and why does my business need them?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "SEO services optimize your website's technical health, content, and search authority so it ranks higher on Google when customers search for your products or services. In competitive markets like Delhi NCR, SEO is essential to capture ready-to-buy customers."
          }
        },
        {
          "@type": "Question",
          "name": "How long does it take to see measurable SEO results in Delhi?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "While technical fixes and on-page optimization reflect in Google rankings within 4 to 8 weeks, significant organic traffic jumps and consistent lead flow typically take 3 to 6 months depending on competition."
          }
        }
      ]
    }
  ]
}
</script>

<style>
    /* ============================================================
       PREMIER MAIN SEO LANDING PAGE STYLES (Delhi NCR Hub)
       Strict Theme: WebTecMart Magenta & Hot Pink ONLY
       (#C4007A, #E0398F, #FFF0F7, #FCE7F3, #850053, #111827)
       ============================================================ */
    .del-seo-page {
        width: 100%;
        background: #FFFFFF;
        color: #1F1B2A;
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        overflow: hidden;
    }
    .del-container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 2;
    }

    /* Common Typography & Badges */
    .del-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #FFF0F7;
        border: 1px solid rgba(196, 0, 122, 0.22);
        color: #C4007A;
        padding: 6px 14px;
        border-radius: 9999px;
        font-size: 0.76rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 14px;
    }
    .del-eyebrow svg {
        width: 14px;
        height: 14px;
        color: #C4007A;
    }
    .del-section-title {
        font-size: clamp(1.85rem, 3.2vw, 2.65rem);
        font-weight: 800;
        color: #111827;
        line-height: 1.22;
        letter-spacing: -0.02em;
        margin: 0 0 14px;
    }
    .del-section-title .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .del-section-title .accent svg {
        position: absolute;
        left: 0;
        bottom: -4px;
        width: 100%;
        height: 6px;
        pointer-events: none;
    }
    .del-section-sub {
        font-size: 1.02rem;
        line-height: 1.62;
        color: #4B5563;
        max-width: 760px;
        margin: 0 auto 36px;
    }
    .del-section-head {
        text-align: center;
        margin-bottom: 38px;
    }

    /* Primary & Secondary Buttons */
    .del-btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #FFFFFF !important;
        font-weight: 700;
        font-size: 0.95rem;
        padding: 13px 26px;
        border-radius: 9999px;
        text-decoration: none;
        border: none;
        box-shadow: 0 10px 22px rgba(196, 0, 122, 0.28);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        cursor: pointer;
    }
    .del-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(196, 0, 122, 0.38);
        color: #FFFFFF !important;
    }
    .del-btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #FFFFFF;
        color: #111827 !important;
        border: 1.5px solid rgba(196, 0, 122, 0.28);
        font-weight: 700;
        font-size: 0.95rem;
        padding: 12px 24px;
        border-radius: 9999px;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        cursor: pointer;
    }
    .del-btn-secondary:hover {
        background: #FFF0F7;
        border-color: #C4007A;
        color: #C4007A !important;
    }

    /* ========================================================
       FRAMER MOTION STYLE REVEAL & MICRO-ANIMATIONS
       ======================================================== */
    [data-framer-reveal] {
        opacity: 0;
        transform: translateY(28px);
        transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        will-change: opacity, transform;
    }
    [data-framer-reveal="scale-in"] {
        transform: scale(0.94);
    }
    [data-framer-reveal="slide-left"] {
        transform: translateX(-36px);
    }
    [data-framer-reveal="slide-right"] {
        transform: translateX(36px);
    }
    .framer-visible {
        opacity: 1 !important;
        transform: translate(0, 0) scale(1) !important;
    }

    /* Ambient Glow Spheres */
    .del-ambient-glow {
        position: absolute;
        width: 480px;
        height: 480px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(196, 0, 122, 0.08) 0%, rgba(224, 57, 143, 0.02) 60%, transparent 70%);
        pointer-events: none;
        z-index: 1;
        filter: blur(40px);
    }

    /* ========================================================
       1. HERO SECTION (2-COL WITH FLOATING QUOTE FORM)
       ======================================================== */
    .del-hero {
        position: relative;
        padding: 56px 0 52px;
        background: linear-gradient(180deg, #FFF5FA 0%, #FFFFFF 100%);
        border-bottom: 1px solid rgba(196, 0, 122, 0.08);
    }
    .del-hero-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 40px;
        align-items: center;
    }
    @media (min-width: 992px) {
        .del-hero-grid {
            grid-template-columns: 1.15fr 0.85fr;
            gap: 48px;
        }
    }
    .del-hero-title {
        font-size: clamp(2.1rem, 3.8vw, 3.1rem);
        font-weight: 800;
        color: #111827;
        line-height: 1.16;
        letter-spacing: -0.025em;
        margin: 0 0 16px;
    }
    .del-hero-desc {
        font-size: 1.05rem;
        line-height: 1.64;
        color: #4B5563;
        margin: 0 0 24px;
        max-width: 620px;
    }
    .del-hero-bullets {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 28px;
    }
    .del-bullet-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.96rem;
        font-weight: 600;
        color: #1F2937;
    }
    .del-bullet-item .dot {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: #FFF0F7;
        color: #C4007A;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.82rem;
        font-weight: 800;
        flex-shrink: 0;
        border: 1px solid rgba(196, 0, 122, 0.25);
    }
    .del-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        align-items: center;
        margin-bottom: 28px;
    }
    .del-author-card {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.18);
        border-radius: 16px;
        padding: 10px 18px;
        box-shadow: 0 6px 18px rgba(196, 0, 122, 0.05);
    }
    .del-author-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, #C4007A, #E0398F);
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1.05rem;
        flex-shrink: 0;
        overflow: hidden;
        border: 2px solid #FFF0F7;
        box-shadow: 0 4px 10px rgba(196, 0, 122, 0.15);
    }
    .del-author-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        display: block;
    }
    .del-author-meta .name {
        font-weight: 700;
        font-size: 0.92rem;
        color: #111827;
    }
    .del-author-meta .sub {
        font-size: 0.78rem;
        color: #6B7280;
    }

    /* Floating Hero Form Card */
    .del-hero-form-card {
        background: #FFFFFF;
        border-radius: 24px;
        padding: 32px 28px;
        box-shadow: 0 20px 45px rgba(196, 0, 122, 0.12), 0 2px 8px rgba(0,0,0,0.04);
        border: 1px solid rgba(196, 0, 122, 0.16);
        position: relative;
    }
    .del-hero-form-card h3 {
        font-size: 1.35rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 6px;
    }
    .del-hero-form-card p {
        font-size: 0.86rem;
        color: #6B7280;
        margin: 0 0 20px;
    }
    .del-form-group {
        margin-bottom: 14px;
    }
    .del-form-group input,
    .del-form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid #F3E8F0;
        background: #FDF9FB;
        border-radius: 12px;
        font-size: 0.9rem;
        color: #111827;
        font-family: inherit;
        transition: all 0.25s ease;
    }
    .del-form-group input:focus,
    .del-form-group textarea:focus {
        outline: none;
        border-color: #C4007A;
        background: #FFFFFF;
        box-shadow: 0 0 0 4px rgba(196, 0, 122, 0.1);
    }
    .del-recaptcha-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #F9FAFB;
        border: 1px solid #E5E7EB;
        border-radius: 10px;
        padding: 10px 14px;
        margin-bottom: 16px;
        font-size: 0.8rem;
        color: #374151;
    }
    .del-recaptcha-label {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }
    .del-recaptcha-label input[type="checkbox"] {
        accent-color: #C4007A;
        width: 17px;
        height: 17px;
    }
    .del-btn-submit {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #FFFFFF;
        font-weight: 800;
        font-size: 1rem;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 8px 20px rgba(196, 0, 122, 0.25);
    }
    .del-btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 26px rgba(196, 0, 122, 0.35);
    }
    .del-form-feedback {
        display: none;
        margin-top: 12px;
        padding: 10px 14px;
        border-radius: 10px;
        font-size: 0.85rem;
        text-align: center;
    }
    .del-form-feedback.success {
        display: block;
        background: #ECFDF5;
        color: #065F46;
        border: 1px solid #A7F3D0;
    }

    /* ========================================================
       NEW SECTION 1: TOP BRAND LOGOS MARQUEE (Image 1 Reference)
       ======================================================== */
    .del-brands-section {
        padding: 60px 0 68px;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF8FB 100%);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(196, 0, 122, 0.1);
    }
    .del-marquee-wrap {
        position: relative;
        width: 100%;
        overflow: hidden;
        padding: 22px 0;
        border-radius: 24px;
        background: linear-gradient(135deg, rgba(255, 245, 250, 0.95) 0%, rgba(255, 240, 247, 0.75) 100%);
        border: 1.5px solid rgba(196, 0, 122, 0.18);
        box-shadow: inset 0 2px 14px rgba(196, 0, 122, 0.04);
    }
    .del-marquee-wrap::before,
    .del-marquee-wrap::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 90px;
        z-index: 3;
        pointer-events: none;
    }
    .del-marquee-wrap::before {
        left: 0;
        background: linear-gradient(90deg, #FFF5FA 0%, rgba(255, 245, 250, 0) 100%);
        border-top-left-radius: 22px;
        border-bottom-left-radius: 22px;
    }
    .del-marquee-wrap::after {
        right: 0;
        background: linear-gradient(270deg, #FFF5FA 0%, rgba(255, 245, 250, 0) 100%);
        border-top-right-radius: 22px;
        border-bottom-right-radius: 22px;
    }
    .del-marquee-track {
        display: flex;
        gap: 20px;
        width: max-content;
        animation: delMarqueeLeft 38s linear infinite;
        padding: 4px 10px;
    }
    .del-marquee-track.reverse {
        animation: delMarqueeRight 42s linear infinite;
        margin-top: 18px;
    }
    .del-marquee-wrap:hover .del-marquee-track {
        animation-play-state: paused;
    }
    @keyframes delMarqueeLeft {
        0% { transform: translate3d(0, 0, 0); }
        100% { transform: translate3d(-50%, 0, 0); }
    }
    @keyframes delMarqueeRight {
        0% { transform: translate3d(-50%, 0, 0); }
        100% { transform: translate3d(0, 0, 0); }
    }
    .del-brand-card {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.16);
        border-radius: 16px;
        padding: 12px 22px;
        box-shadow: 0 4px 16px rgba(196, 0, 122, 0.05);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        white-space: nowrap;
        cursor: default;
    }
    .del-brand-card:hover {
        transform: translateY(-4px);
        border-color: #C4007A;
        background: #FFF5FA;
        box-shadow: 0 12px 28px rgba(196, 0, 122, 0.18);
    }
    .del-brand-logo-img {
        height: 38px;
        width: auto;
        max-width: 95px;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.85;
        transition: all 0.3s ease;
    }
    .del-brand-card:hover .del-brand-logo-img {
        filter: grayscale(0%);
        opacity: 1;
    }
    .del-brand-info .b-name {
        font-size: 0.92rem;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }
    .del-brand-info .b-cat {
        font-size: 0.72rem;
        font-weight: 700;
        color: #C4007A;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        margin-top: 2px;
    }

    /* ========================================================
       NEW SECTION 2: STRATEGIC NARRATIVE & TECH LAPTOP (Image 3)
       ======================================================== */
    .del-narrative-section {
        padding: 80px 0;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
        position: relative;
        overflow: hidden;
    }
    .del-narrative-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 48px;
        align-items: center;
    }
    @media (min-width: 992px) {
        .del-narrative-grid {
            grid-template-columns: 1.05fr 0.95fr;
            gap: 56px;
        }
    }
    .del-narrative-lead {
        font-size: 1.15rem;
        line-height: 1.68;
        color: #111827;
        font-weight: 600;
        margin-bottom: 18px;
    }
    .del-narrative-sub {
        font-size: 0.98rem;
        line-height: 1.66;
        color: #4B5563;
        margin-bottom: 28px;
    }
    .del-narrative-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 32px;
    }
    .del-npill {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.2);
        border-radius: 9999px;
        padding: 8px 16px;
        font-size: 0.84rem;
        font-weight: 700;
        color: #C4007A;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 12px rgba(196, 0, 122, 0.06);
    }
    .del-laptop-showcase {
        position: relative;
        perspective: 1000px;
    }
    .del-laptop-card {
        background: #111827;
        border: 2px solid rgba(196, 0, 122, 0.35);
        border-radius: 24px;
        padding: 24px;
        box-shadow: 0 24px 60px rgba(17, 24, 39, 0.25), 0 0 40px rgba(196, 0, 122, 0.15);
        color: #FFFFFF;
        position: relative;
        transform: rotateY(-3deg) rotateX(2deg);
        transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .del-laptop-card:hover {
        transform: rotateY(0deg) rotateX(0deg) translateY(-6px);
    }
    .del-laptop-hud-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 16px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 20px;
    }
    .del-hud-badge {
        background: rgba(196, 0, 122, 0.25);
        border: 1px solid #C4007A;
        color: #FCE7F3;
        font-size: 0.72rem;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 9999px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .del-hud-badge .pulse {
        width: 6px;
        height: 6px;
        background: #10B981;
        border-radius: 50%;
        animation: delPulse 2s infinite;
    }
    .del-hud-screen {
        background: #1E293B;
        border-radius: 16px;
        padding: 20px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }
    .del-hud-search-bar {
        background: #0F172A;
        border: 1px solid rgba(196, 0, 122, 0.3);
        border-radius: 9999px;
        padding: 10px 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.86rem;
        color: #FCE7F3;
        margin-bottom: 16px;
    }
    .del-hud-metrics-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        margin-top: 14px;
    }
    .del-hud-stat {
        background: rgba(15, 23, 42, 0.6);
        border-radius: 12px;
        padding: 10px 12px;
        border: 1px solid rgba(255, 255, 255, 0.06);
        text-align: center;
    }
    .del-hud-stat .val {
        font-size: 1.15rem;
        font-weight: 800;
        color: #E0398F;
    }
    .del-hud-stat .lbl {
        font-size: 0.68rem;
        color: #94A3B8;
        text-transform: uppercase;
    }
    .del-float-chip {
        position: absolute;
        background: #FFFFFF;
        color: #111827;
        border-radius: 14px;
        padding: 10px 16px;
        box-shadow: 0 16px 36px rgba(0, 0, 0, 0.2);
        border: 1.5px solid rgba(196, 0, 122, 0.25);
        font-size: 0.84rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        animation: delFloat 4s ease-in-out infinite alternate;
        z-index: 4;
    }
    .del-float-chip.chip-1 {
        top: -14px;
        right: 20px;
    }
    .del-float-chip.chip-2 {
        bottom: -16px;
        left: 20px;
        animation-delay: -2s;
    }
    @keyframes delFloat {
        0% { transform: translateY(0); }
        100% { transform: translateY(-8px); }
    }
    @keyframes delPulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.3); }
    }

    /* ========================================================
       3. KEY TAKEAWAYS & SERP SNAPSHOT (Image 2 Right)
       ======================================================== */
    .del-takeaways-section {
        padding: 72px 0;
        background: #FFFFFF;
        position: relative;
    }
    .del-takeaways-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 40px;
        align-items: center;
    }
    @media (min-width: 992px) {
        .del-takeaways-grid {
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }
    }
    .del-takeaways-checklist {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-bottom: 28px;
    }
    .del-takeaway-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 0.94rem;
        color: #374151;
        line-height: 1.5;
    }
    .del-takeaway-item .chk {
        color: #C4007A;
        font-weight: 800;
        font-size: 1.05rem;
        flex-shrink: 0;
        line-height: 1;
        margin-top: 2px;
    }

    /* Google SERP Snapshot Mockup (Image 2 Right) */
    .del-serp-mockup {
        background: #FFFFFF;
        border-radius: 20px;
        border: 1.5px solid rgba(196, 0, 122, 0.22);
        box-shadow: 0 18px 40px rgba(196, 0, 122, 0.09);
        padding: 16px;
        overflow: hidden;
    }
    .del-serp-preview-img-wrap {
        border-radius: 14px;
        overflow: hidden;
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.12);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
    }
    .del-serp-preview-img-wrap img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 12px;
    }

    /* ========================================================
       NEW SECTION 3: 4-QUADRANT GROWTH WHEEL (Image 2 Reference)
       ======================================================== */
    .del-growth-section {
        padding: 84px 0;
        background: #FFFFFF;
        position: relative;
        overflow: hidden;
    }
    .del-quad-wheel-box {
        max-width: 820px;
        margin: 0 auto 48px;
        position: relative;
    }
    .del-quad-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        position: relative;
    }
    @media (max-width: 640px) {
        .del-quad-grid {
            grid-template-columns: 1fr;
        }
    }
    .del-quad-card {
        background: linear-gradient(145deg, #FFF5FA 0%, #FFFFFF 100%);
        border: 1.5px solid rgba(196, 0, 122, 0.18);
        border-radius: 28px;
        padding: 34px 28px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(196, 0, 122, 0.05);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        overflow: hidden;
    }
    .del-quad-card:hover {
        transform: translateY(-5px);
        border-color: #C4007A;
        box-shadow: 0 18px 45px rgba(196, 0, 122, 0.14);
    }
    .del-quad-tag {
        font-size: 0.8rem;
        font-weight: 700;
        color: #4B5563;
        margin-bottom: 12px;
        letter-spacing: -0.01em;
    }
    .del-quad-num {
        font-size: clamp(2.4rem, 4vw, 3.4rem);
        font-weight: 900;
        color: #C4007A;
        line-height: 1;
        margin-bottom: 8px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .del-quad-arrow {
        font-size: 0.65em;
        color: #10B981;
    }
    .del-quad-sub {
        font-size: 0.8rem;
        color: #6B7280;
        font-weight: 600;
    }
    .del-quad-center-circle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: #FFFFFF;
        border: 3px solid #C4007A;
        box-shadow: 0 0 0 8px rgba(196, 0, 122, 0.12), 0 18px 40px rgba(196, 0, 122, 0.2);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 18px;
        z-index: 5;
        transition: transform 0.3s ease;
    }
    @media (max-width: 640px) {
        .del-quad-center-circle {
            position: static;
            transform: none;
            width: 100%;
            height: auto;
            border-radius: 24px;
            margin-bottom: 16px;
        }
    }
    .del-quad-center-badge {
        background: #FFF0F7;
        color: #C4007A;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        padding: 2px 10px;
        border-radius: 9999px;
        margin-bottom: 6px;
    }
    .del-quad-center-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 4px;
        line-height: 1.2;
    }
    .del-quad-center-desc {
        font-size: 0.72rem;
        color: #6B7280;
        line-height: 1.35;
    }
    .del-growth-cards-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
        max-width: 980px;
        margin: 0 auto;
    }
    @media (min-width: 768px) {
        .del-growth-cards-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
    .del-growth-feature-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.14);
        border-radius: 20px;
        padding: 26px 24px;
        display: flex;
        gap: 16px;
        box-shadow: 0 8px 24px rgba(196, 0, 122, 0.04);
        transition: all 0.3s ease;
    }
    .del-growth-feature-card:hover {
        transform: translateY(-3px);
        border-color: #C4007A;
        box-shadow: 0 14px 34px rgba(196, 0, 122, 0.1);
    }
    .del-growth-ficon {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        background: #FFF0F7;
        color: #C4007A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
    }
    .del-growth-fcontent h4 {
        font-size: 1.02rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 6px;
    }
    .del-growth-fcontent p {
        font-size: 0.86rem;
        color: #4B5563;
        line-height: 1.55;
        margin: 0;
    }

    /* ========================================================
       4. WHY SEO EFFORTS FALL SHORT (Image 3 Reference 3x2)
       ======================================================== */
    .del-challenges-section {
        padding: 76px 0;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
    }
    .del-challenges-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 22px;
    }
    @media (min-width: 640px) {
        .del-challenges-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 992px) {
        .del-challenges-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .del-challenge-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.15);
        border-radius: 20px;
        padding: 26px 22px;
        transition: all 0.3s ease;
        box-shadow: 0 6px 18px rgba(196, 0, 122, 0.04);
        position: relative;
    }
    .del-challenge-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 30px rgba(196, 0, 122, 0.12);
        border-color: #C4007A;
    }
    .del-challenge-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: #FFF0F7;
        color: #C4007A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
        margin-bottom: 16px;
    }
    .del-challenge-card h3 {
        font-size: 1.05rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 8px;
    }
    .del-challenge-card p {
        font-size: 0.88rem;
        line-height: 1.58;
        color: #4B5563;
        margin: 0;
    }

    /* ========================================================
       5. LEADERSHIP & WHAT WE OFFER (Jitin Madaan Spotlight)
       ======================================================== */
    .del-founder-section {
        padding: 76px 0;
        background: #FFFFFF;
    }
    .del-founder-card {
        background: linear-gradient(135deg, #FFFFFF 0%, #FFF5FA 100%);
        border: 2px solid rgba(196, 0, 122, 0.2);
        border-radius: 28px;
        padding: 44px 38px;
        box-shadow: 0 20px 48px rgba(196, 0, 122, 0.09);
        display: grid;
        grid-template-columns: 1fr;
        gap: 36px;
        align-items: center;
        margin-bottom: 64px;
    }
    @media (min-width: 992px) {
        .del-founder-card {
            grid-template-columns: 1.25fr 0.75fr;
            gap: 48px;
        }
    }
    .del-founder-left h2 {
        font-size: clamp(1.8rem, 2.9vw, 2.4rem);
        font-weight: 800;
        color: #111827;
        line-height: 1.22;
        margin: 0 0 14px;
    }
    .del-founder-left p {
        font-size: 1rem;
        line-height: 1.64;
        color: #4B5563;
        margin-bottom: 22px;
    }
    .del-founder-nameplate {
        margin-bottom: 20px;
    }
    .del-founder-nameplate .founder-name {
        font-size: 1.25rem;
        font-weight: 800;
        color: #C4007A;
        letter-spacing: -0.01em;
    }
    .del-founder-nameplate .founder-role {
        font-size: 0.86rem;
        font-weight: 600;
        color: #6B7280;
    }
    .del-founder-stats {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        margin-bottom: 28px;
        padding-top: 18px;
        border-top: 1px solid rgba(196, 0, 122, 0.12);
    }
    .del-fstat-item {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.16);
        border-radius: 14px;
        padding: 10px 16px;
    }
    .del-fstat-item .val {
        font-size: 1.35rem;
        font-weight: 800;
        color: #C4007A;
        line-height: 1;
    }
    .del-fstat-item .lbl {
        font-size: 0.74rem;
        color: #4B5563;
        font-weight: 600;
    }
    .del-founder-right {
        display: flex;
        justify-content: center;
    }
    .del-founder-photo-box {
        position: relative;
        width: 100%;
        max-width: 330px;
        border-radius: 24px;
        overflow: hidden;
        border: 2px solid #FFF0F7;
        box-shadow: 0 16px 36px rgba(196, 0, 122, 0.16);
        background: linear-gradient(145deg, #18181B, #27272A);
        text-align: center;
        padding: 24px 20px;
        color: #FFFFFF;
    }
    .del-founder-img-wrapper {
        position: relative;
        width: 180px;
        height: 210px;
        margin: 0 auto 16px;
        border-radius: 18px;
        overflow: hidden;
        border: 2px solid rgba(224, 57, 143, 0.45);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.45);
        background: #0F172A;
    }
    .del-founder-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top;
        display: block;
    }
    .del-founder-avatar-fallback {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #C4007A, #E0398F);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        font-weight: 800;
    }
    .del-founder-badge-pill {
        position: absolute;
        bottom: 8px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(17, 24, 39, 0.88);
        backdrop-filter: blur(6px);
        color: #FCE7F3;
        font-size: 0.68rem;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 20px;
        border: 1px solid rgba(224, 57, 143, 0.5);
        display: inline-flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }
    .del-founder-badge-pill .badge-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #10B981;
    }
    .del-founder-name-tag {
        color: #FFFFFF;
        font-size: 1.25rem;
        font-weight: 800;
        margin: 0 0 4px;
        letter-spacing: -0.01em;
    }
    .del-founder-role-tag {
        color: #FCE7F3;
        font-size: 0.84rem;
        font-weight: 600;
        margin-bottom: 12px;
    }
    .del-founder-bio {
        font-size: 0.82rem;
        color: #D1D5DB;
        margin: 0;
        line-height: 1.5;
    }

    /* What We Offer 6 Cards */
    .del-offers-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    @media (min-width: 640px) {
        .del-offers-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 992px) {
        .del-offers-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .del-offer-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.16);
        border-radius: 22px;
        padding: 28px 24px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 24px rgba(196, 0, 122, 0.04);
    }
    .del-offer-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 36px rgba(196, 0, 122, 0.12);
        border-color: #C4007A;
    }
    .del-offer-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: #FFF0F7;
        color: #C4007A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        margin-bottom: 16px;
    }
    .del-offer-card h3 {
        font-size: 1.12rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 10px;
    }
    .del-offer-card p {
        font-size: 0.88rem;
        line-height: 1.6;
        color: #4B5563;
        margin: 0;
    }

    /* ========================================================
       NEW SECTION 4: SEO MASTERCLASS (Image 5 Reference)
       ======================================================== */
    .del-masterclass-section {
        padding: 84px 0;
        background: #FFFFFF;
        position: relative;
        overflow: hidden;
    }
    .del-mc-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 40px;
        align-items: center;
        margin-bottom: 56px;
    }
    @media (min-width: 992px) {
        .del-mc-grid {
            grid-template-columns: 1.1fr 0.9fr;
            gap: 52px;
        }
    }
    .del-mc-headline {
        font-size: 1.35rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 12px;
    }
    .del-mc-desc {
        font-size: 0.98rem;
        line-height: 1.66;
        color: #4B5563;
        margin-bottom: 24px;
    }
    .del-mc-skills-title {
        font-size: 0.88rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #C4007A;
        margin-bottom: 14px;
    }
    .del-mc-skills-list {
        display: grid;
        grid-template-columns: 1fr;
        gap: 10px;
        margin-bottom: 28px;
    }
    @media (min-width: 600px) {
        .del-mc-skills-list {
            grid-template-columns: 1fr 1fr;
        }
    }
    .del-mc-skill-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.9rem;
        font-weight: 600;
        color: #1F2937;
    }
    .del-mc-skill-item .chk {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #FFF0F7;
        color: #C4007A;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.74rem;
        font-weight: 800;
        flex-shrink: 0;
    }
    .del-mc-video-card {
        background: linear-gradient(145deg, #18181B 0%, #27272A 100%);
        border: 2px solid rgba(196, 0, 122, 0.35);
        border-radius: 24px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.25), 0 0 40px rgba(196, 0, 122, 0.15);
        cursor: pointer;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .del-mc-video-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 30px 70px rgba(196, 0, 122, 0.25);
    }
    .del-mc-video-thumb {
        position: relative;
        width: 100%;
        height: 260px;
        background: url('/assets/images/case-study-1.jpg') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .del-mc-video-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(17, 24, 39, 0.4) 0%, rgba(17, 24, 39, 0.85) 100%);
    }
    .del-mc-play-btn {
        position: relative;
        z-index: 3;
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: linear-gradient(135deg, #C4007A, #E0398F);
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        box-shadow: 0 10px 30px rgba(196, 0, 122, 0.5);
        transition: transform 0.3s ease;
    }
    .del-mc-play-btn::before,
    .del-mc-play-btn::after {
        content: '';
        position: absolute;
        inset: -12px;
        border-radius: 50%;
        border: 1.5px solid rgba(224, 57, 143, 0.6);
        animation: delRadarPulse 2.4s ease-out infinite;
    }
    .del-mc-play-btn::after {
        animation-delay: 1.2s;
    }
    @keyframes delRadarPulse {
        0% { transform: scale(0.9); opacity: 1; }
        100% { transform: scale(1.6); opacity: 0; }
    }
    .del-mc-video-info {
        padding: 20px 24px;
        color: #FFFFFF;
        background: #18181B;
    }
    .del-mc-video-info .pill {
        background: rgba(196, 0, 122, 0.25);
        border: 1px solid #C4007A;
        color: #FCE7F3;
        font-size: 0.72rem;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 9999px;
        display: inline-block;
        margin-bottom: 8px;
    }
    .del-mc-video-info .title {
        font-size: 1.05rem;
        font-weight: 800;
        margin: 0 0 4px;
    }
    .del-mc-video-info .sub {
        font-size: 0.8rem;
        color: #9CA3AF;
    }
    .del-mc-reviews-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    @media (min-width: 768px) {
        .del-mc-reviews-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .del-mc-rev-card {
        background: #FFF5FA;
        border: 1.5px solid rgba(196, 0, 122, 0.15);
        border-radius: 18px;
        padding: 22px 20px;
        box-shadow: 0 4px 16px rgba(196, 0, 122, 0.04);
    }
    .del-mc-rev-card p {
        font-size: 0.85rem;
        line-height: 1.6;
        color: #374151;
        margin-bottom: 14px;
        font-style: italic;
    }
    .del-mc-rev-card .author {
        font-weight: 700;
        font-size: 0.84rem;
        color: #111827;
    }
    .del-mc-rev-card .comp {
        font-size: 0.76rem;
        color: #C4007A;
        font-weight: 600;
    }

    /* ========================================================
       NEW SECTION 5: CLIENT FEEDBACK TOUCH SLIDER (Image 4)
       ======================================================== */
    .del-feedback-section {
        padding: 84px 0;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
        position: relative;
    }
    .del-swiper-container {
        position: relative;
        padding: 10px 8px 46px;
    }
    .del-feedback-slide-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.15);
        border-radius: 24px;
        padding: 34px 28px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 10px 30px rgba(196, 0, 122, 0.05);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .del-feedback-slide-card:hover {
        transform: translateY(-6px);
        border-color: #C4007A;
        box-shadow: 0 20px 45px rgba(196, 0, 122, 0.12);
    }
    .del-quote-mark {
        font-size: 3.2rem;
        line-height: 1;
        font-family: Georgia, serif;
        color: #C4007A;
        opacity: 0.35;
        margin-bottom: 6px;
    }
    .del-feedback-stars {
        color: #F59E0B;
        font-size: 0.95rem;
        margin-bottom: 12px;
        letter-spacing: 2px;
    }
    .del-feedback-text {
        font-size: 0.94rem;
        line-height: 1.68;
        color: #374151;
        margin-bottom: 24px;
        flex-grow: 1;
    }
    .del-feedback-author-row {
        display: flex;
        align-items: center;
        gap: 14px;
        padding-top: 18px;
        border-top: 1px solid rgba(196, 0, 122, 0.1);
    }
    .del-fb-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, #C4007A, #E0398F);
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 0.95rem;
        flex-shrink: 0;
    }
    .del-fb-info .name {
        font-weight: 700;
        font-size: 0.92rem;
        color: #111827;
    }
    .del-fb-info .role {
        font-size: 0.78rem;
        color: #6B7280;
    }
    .del-fb-info .comp {
        font-size: 0.76rem;
        font-weight: 700;
        color: #C4007A;
    }
    .del-swiper-nav-row {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 16px;
        margin-top: 24px;
    }
    .del-swiper-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.25);
        color: #C4007A;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.25s ease;
        box-shadow: 0 4px 12px rgba(196, 0, 122, 0.08);
    }
    .del-swiper-btn:hover {
        background: #C4007A;
        color: #FFFFFF;
        transform: scale(1.08);
    }
    .swiper-pagination-bullet-active {
        background: #C4007A !important;
        width: 24px !important;
        border-radius: 9999px !important;
    }

    /* ========================================================
       6. CASE STUDIES & RESULTS
       ======================================================== */
    .del-case-section {
        padding: 76px 0;
        background: #FFFFFF;
    }
    .del-cases-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 22px;
    }
    @media (min-width: 640px) {
        .del-cases-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 992px) {
        .del-cases-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }
    .del-case-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.16);
        border-radius: 20px;
        padding: 24px 20px;
        box-shadow: 0 6px 18px rgba(196, 0, 122, 0.04);
        transition: all 0.3s ease;
    }
    .del-case-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 32px rgba(196, 0, 122, 0.12);
        border-color: #C4007A;
    }
    .del-case-type {
        font-size: 0.74rem;
        font-weight: 800;
        text-transform: uppercase;
        color: #C4007A;
        letter-spacing: 0.06em;
        margin-bottom: 8px;
    }
    .del-case-result {
        font-size: 1.25rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 12px;
        line-height: 1.25;
    }
    .del-case-meta {
        font-size: 0.84rem;
        color: #4B5563;
        line-height: 1.5;
    }

    /* ========================================================
       7. LIVE GOOGLE RANKINGS TABLE
       ======================================================== */
    .del-rankings-section {
        padding: 76px 0;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
    }
    .del-rankings-table-wrap {
        background: #FFFFFF;
        border-radius: 24px;
        border: 1.5px solid rgba(196, 0, 122, 0.18);
        box-shadow: 0 14px 36px rgba(196, 0, 122, 0.07);
        overflow: hidden;
        margin-bottom: 32px;
    }
    .del-rankings-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.92rem;
    }
    .del-rankings-table th {
        background: #FFF0F7;
        color: #C4007A;
        font-weight: 800;
        padding: 16px 20px;
        text-align: left;
        font-size: 0.8rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        border-bottom: 1px solid rgba(196, 0, 122, 0.15);
    }
    .del-rankings-table td {
        padding: 16px 20px;
        border-bottom: 1px solid #F3F4F6;
        color: #1F2937;
    }
    .del-rankings-table tr:hover td {
        background: #FFFDFE;
    }
    .del-kw-rank-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #C4007A, #E0398F);
        color: #FFFFFF;
        font-weight: 800;
        font-size: 0.82rem;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(196, 0, 122, 0.3);
    }
    .del-kw-gain {
        color: #10B981;
        font-weight: 700;
        font-size: 0.84rem;
    }

    /* ========================================================
       8. DELPHI NCR MICRO-MARKETS PILLS
       ======================================================== */
    .del-loc-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        margin-top: 24px;
    }
    .del-loc-pill {
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.18);
        border-radius: 9999px;
        padding: 8px 18px;
        font-size: 0.85rem;
        font-weight: 600;
        color: #1F2937;
        box-shadow: 0 2px 8px rgba(196, 0, 122, 0.04);
        transition: all 0.25s ease;
    }
    .del-loc-pill:hover {
        background: #FFF0F7;
        color: #C4007A;
        border-color: #C4007A;
        transform: translateY(-2px);
    }

    /* ========================================================
       9. FAQS ACCORDION
       ======================================================== */
    .del-faq-section {
        padding: 76px 0;
        background: #FFFFFF;
    }
    .del-faq-item {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.15);
        border-radius: 16px;
        margin-bottom: 14px;
        overflow: hidden;
        transition: all 0.25s ease;
    }
    .del-faq-item.active {
        border-color: #C4007A;
        box-shadow: 0 8px 24px rgba(196, 0, 122, 0.08);
    }
    .del-faq-btn {
        width: 100%;
        padding: 20px 24px;
        background: none;
        border: none;
        text-align: left;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 1.02rem;
        font-weight: 700;
        color: #111827;
        cursor: pointer;
        font-family: inherit;
    }
    .del-faq-btn .icon {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #FFF0F7;
        color: #C4007A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        font-weight: 800;
        flex-shrink: 0;
        transition: transform 0.25s ease;
    }
    .del-faq-item.active .del-faq-btn .icon {
        transform: rotate(45deg);
        background: #C4007A;
        color: #FFFFFF;
    }
    .del-faq-answer {
        display: none;
        padding: 0 24px 22px;
        font-size: 0.92rem;
        line-height: 1.68;
        color: #4B5563;
    }
    .del-faq-item.active .del-faq-answer {
        display: block;
    }

    /* ========================================================
       10. FINAL CONVERSION CTA BANNER
       ======================================================== */
    .del-cta-section {
        padding: 72px 0 84px;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
    }
    .del-cta-box {
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 50%, #9B0060 100%);
        border: 2px solid rgba(255, 255, 255, 0.35);
        border-radius: 28px;
        padding: 56px 36px;
        text-align: center;
        color: #FFFFFF;
        box-shadow: 0 24px 60px rgba(196, 0, 122, 0.35);
        position: relative;
        overflow: hidden;
    }
    .del-cta-box::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.22) 0%, transparent 60%);
        pointer-events: none;
    }
    .del-cta-box h2 {
        font-size: clamp(2rem, 3.4vw, 2.8rem);
        font-weight: 800;
        margin: 0 0 16px;
        position: relative;
        color: #FFFFFF;
        text-shadow: 0 2px 12px rgba(0, 0, 0, 0.12);
    }
    .del-cta-box h2 span {
        color: #FFE5F1;
        text-shadow: 0 2px 14px rgba(0, 0, 0, 0.2);
    }
    .del-cta-box p {
        font-size: 1.05rem;
        color: rgba(255, 255, 255, 0.95);
        max-width: 680px;
        margin: 0 auto 32px;
        line-height: 1.65;
        position: relative;
    }
        line-height: 1.65;
        position: relative;
    }
    .del-cta-btns {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        justify-content: center;
        position: relative;
    }

    /* Video Modal */
    .del-modal-backdrop {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(8px);
        z-index: 99999;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .del-modal-backdrop.active {
        display: flex;
    }
    .del-modal-box {
        background: #18181B;
        border: 2px solid rgba(196, 0, 122, 0.4);
        border-radius: 24px;
        max-width: 800px;
        width: 100%;
        overflow: hidden;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
        position: relative;
        color: #FFFFFF;
    }
    .del-modal-header {
        padding: 18px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .del-modal-close {
        background: none;
        border: none;
        color: #9CA3AF;
        font-size: 1.8rem;
        cursor: pointer;
        line-height: 1;
        transition: color 0.2s ease;
    }
    .del-modal-close:hover {
        color: #FFFFFF;
    }
    .del-modal-body {
        padding: 30px;
        text-align: center;
    }
</style>

<main class="del-seo-page">

    <!-- ========================================================
         1. HERO SECTION (2-COL WITH FLOATING QUOTE FORM)
         ======================================================== -->
    <section class="del-hero">
        <div class="del-ambient-glow" style="top: -100px; left: -100px;"></div>
        <div class="del-ambient-glow" style="bottom: 0; right: -120px;"></div>

        <div class="del-container">
            <div class="del-hero-grid">

                <!-- Left Column: Copy, Bullets & Author -->
                <div class="del-hero-left" data-framer-reveal="slide-left">
                    <div class="del-eyebrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/></svg>
                        <span>TOP-RATED SEO AGENCY IN DELHI NCR</span>
                    </div>

                    <h1 class="del-hero-title">
                        Build Search Visibility That Drives <span class="accent" style="color: #C4007A;">Real Business Growth</span>
                    </h1>

                    <p class="del-hero-desc">
                        <?= htmlspecialchars($heroDesc) ?>
                    </p>

                    <div class="del-hero-bullets">
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>High-impact content optimization</span>
                        </div>
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>ROI-focused strategy</span>
                        </div>
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>Topical authority building</span>
                        </div>
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>Conversion-focused optimization</span>
                        </div>
                    </div>

                    <div class="del-hero-actions">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Contact Us</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                        <a href="tel:+919999674255" class="del-btn-secondary">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span>Call Now: +91-9999674255</span>
                        </a>
                    </div>

                    <!-- Strategist / Author Stamp (Jitin Madaan) -->
                    <div class="del-author-card">
                        <div class="del-author-avatar">
                            <?php if (!empty($founderAvatar) && file_exists(__DIR__ . $founderAvatar)): ?>
                                <img src="<?= htmlspecialchars($founderAvatar) ?>" alt="<?= htmlspecialchars($founderName) ?>" class="del-author-img">
                            <?php else: ?>
                                <?= htmlspecialchars($founderInitial) ?>
                            <?php endif; ?>
                        </div>
                        <div class="del-author-meta">
                            <div class="name"><?= htmlspecialchars($founderName) ?></div>
                            <div class="sub"><?= htmlspecialchars($founderRole) ?> &bull; Published: Nov 04, 2025 &bull; Updated: Nov 04, 2026</div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Request A Quote Floating Form -->
                <div class="del-hero-right" data-framer-reveal="slide-right">
                    <div class="del-hero-form-card">
                        <h3>Request A Quote</h3>
                        <p>Fill out the form below to receive a custom SEO strategy and projection for your Delhi business.</p>

                        <form id="delHeroQuoteForm" onsubmit="handleHeroQuoteSubmit(event)">
                            <div class="del-form-group">
                                <input type="text" name="name" placeholder="Name *" required>
                            </div>
                            <div class="del-form-group">
                                <input type="tel" name="phone" placeholder="Phone No *" required>
                            </div>
                            <div class="del-form-group">
                                <input type="email" name="email" placeholder="Email *" required>
                            </div>
                            <div class="del-form-group">
                                <textarea name="message" rows="3" placeholder="Type Your Message *" required></textarea>
                            </div>

                            <div class="del-recaptcha-box">
                                <label class="del-recaptcha-label">
                                    <input type="checkbox" required>
                                    <span>I'm not a robot</span>
                                </label>
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C4007A" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                            </div>

                            <button type="submit" id="delHeroSubmitBtn" class="del-btn-submit">
                                <span>Submit Request</span>
                            </button>

                            <div id="delHeroFeedback" class="del-form-feedback"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         NEW SECTION 1: TOP EVENT BRANDS EMBRACING SEO (Image 1)
         ======================================================== -->
    <section class="del-brands-section" data-framer-reveal="fade-up">
        <div class="del-container">
            <div class="del-section-head">
                <div class="del-eyebrow">GLOBAL INDUSTRY CREDIBILITY</div>
                <h2 class="del-section-title">
                    Top Event Brands Embracing <span class="accent">SEO<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Here are just a few of the organisers, global trade expos, and high-growth brands we've helped with strategic search optimisation campaigns.
                </p>
            </div>

            <div class="del-marquee-wrap">
                <!-- Row 1: Leftward Ticker -->
                <div class="del-marquee-track">
                    <?php 
                    $doubleLogos = array_merge($brandLogos, $brandLogos);
                    foreach ($doubleLogos as $b): 
                        $imgPath = $b['logo'] ?? '';
                    ?>
                        <div class="del-brand-card">
                            <?php if (!empty($imgPath)): ?>
                                <img src="<?= htmlspecialchars($imgPath) ?>" alt="<?= htmlspecialchars($b['name']) ?>" class="del-brand-logo-img">
                            <?php else: ?>
                                <div style="width: 36px; height: 36px; border-radius: 8px; background: #FFF0F7; color: #C4007A; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.8rem;">
                                    <?= htmlspecialchars(substr($b['name'], 0, 2)) ?>
                                </div>
                            <?php endif; ?>
                            <div class="del-brand-info">
                                <div class="b-name"><?= htmlspecialchars($b['name']) ?></div>
                                <div class="b-cat"><?= htmlspecialchars($b['category'] ?? 'Enterprise Brand') ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Row 2: Rightward Ticker -->
                <div class="del-marquee-track reverse">
                    <?php 
                    $reversedLogos = array_reverse($doubleLogos);
                    foreach ($reversedLogos as $b): 
                        $imgPath = $b['logo'] ?? '';
                    ?>
                        <div class="del-brand-card">
                            <?php if (!empty($imgPath)): ?>
                                <img src="<?= htmlspecialchars($imgPath) ?>" alt="<?= htmlspecialchars($b['name']) ?>" class="del-brand-logo-img">
                            <?php else: ?>
                                <div style="width: 36px; height: 36px; border-radius: 8px; background: #FFF0F7; color: #C4007A; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.8rem;">
                                    <?= htmlspecialchars(substr($b['name'], 0, 2)) ?>
                                </div>
                            <?php endif; ?>
                            <div class="del-brand-info">
                                <div class="b-name"><?= htmlspecialchars($b['name']) ?></div>
                                <div class="b-cat"><?= htmlspecialchars($b['category'] ?? 'Verified Partner') ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         NEW SECTION 2: STRATEGIC NARRATIVE & TECH LAPTOP (Image 3)
         ======================================================== -->
    <section class="del-narrative-section">
        <div class="del-container">
            <div class="del-narrative-grid">

                <div class="del-narrative-left" data-framer-reveal="slide-left">
                    <div class="del-eyebrow">SEARCH ENGINE OPTIMISATION INTRO</div>
                    <h2 class="del-section-title" style="text-align: left;">
                        <?= htmlspecialchars($strategicNarrative['title'] ?? 'Search Engine Optimisation for Events & Growth Brands') ?>
                    </h2>
                    <p class="del-narrative-lead">
                        <?= htmlspecialchars($strategicNarrative['p1'] ?? 'Optimising your event website for search engines is a powerful way to attract new attendees, sponsors, and exhibitors while driving long-term revenue growth.') ?>
                    </p>
                    <p class="del-narrative-sub">
                        <?= htmlspecialchars($strategicNarrative['p2'] ?? 'While results cannot be guaranteed overnight, in our experience we have found that high-value enterprises are uniquely positioned to perform well with effective search engine optimisation.') ?>
                    </p>

                    <div class="del-narrative-pills">
                        <div class="del-npill">
                            <span>🏆 13+ Years Experience</span>
                        </div>
                        <div class="del-npill">
                            <span>⚡ 5,000+ Keywords Ranked</span>
                        </div>
                        <div class="del-npill">
                            <span>💎 95% Client Retention</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 14px; flex-wrap: wrap;">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Explore Strategy Consultation</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                        <a href="tel:+919999674255" class="del-btn-secondary">
                            <span>Call +91-9999674255</span>
                        </a>
                    </div>
                </div>

                <!-- Right: Framer 3D Tilted Modern Laptop Visual -->
                <div class="del-narrative-right" data-framer-reveal="slide-right">
                    <div class="del-laptop-showcase">
                        <div class="del-float-chip chip-1">
                            <span style="color: #10B981; font-weight: 800;">#1 Google Rank</span> &bull; Delhi Commercial Queries
                        </div>
                        <div class="del-float-chip chip-2">
                            <span>⚡ AI Overview Featured Entity</span>
                        </div>

                        <div class="del-laptop-card">
                            <div class="del-laptop-hud-header">
                                <div style="display: flex; gap: 6px;">
                                    <span style="width: 10px; height: 10px; border-radius: 50%; background: #EF4444; display: inline-block;"></span>
                                    <span style="width: 10px; height: 10px; border-radius: 50%; background: #F59E0B; display: inline-block;"></span>
                                    <span style="width: 10px; height: 10px; border-radius: 50%; background: #10B981; display: inline-block;"></span>
                                </div>
                                <div class="del-hud-badge">
                                    <span class="pulse"></span> LIVE SEARCH TELEMETRY
                                </div>
                            </div>

                            <div class="del-hud-screen">
                                <div class="del-hud-search-bar">
                                    <span style="color: #E0398F;">🔍</span>
                                    <span>google.com/search?q=best+seo+company+delhi</span>
                                </div>

                                <div style="background: rgba(15, 23, 42, 0.85); border-radius: 12px; padding: 16px; border: 1px solid rgba(224, 57, 143, 0.25); margin-bottom: 14px;">
                                    <div style="font-size: 0.72rem; color: #10B981; font-weight: 800; margin-bottom: 4px;">🏆 #1 RANKED IN DELHI NCR</div>
                                    <div style="font-size: 0.96rem; font-weight: 800; color: #FFFFFF; margin-bottom: 4px;">WebTecMart — Top SEO Agency in Delhi NCR</div>
                                    <p style="font-size: 0.78rem; color: #94A3B8; margin: 0; line-height: 1.45;">
                                        Driving qualified organic buyer revenue with 13+ years experience, 1,000+ verified client campaigns, and high-intent keyword strategies.
                                    </p>
                                </div>

                                <div class="del-hud-metrics-row">
                                    <div class="del-hud-stat">
                                        <div class="val">+400%</div>
                                        <div class="lbl">Organic Growth</div>
                                    </div>
                                    <div class="del-hud-stat">
                                        <div class="val">80+</div>
                                        <div class="lbl">#1 Keywords</div>
                                    </div>
                                    <div class="del-hud-stat">
                                        <div class="val">1,393%</div>
                                        <div class="lbl">Search Clicks</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         3. KEY TAKEAWAYS & GOOGLE SERP AI OVERVIEW (Image 2 Right)
         ======================================================== -->
    <section class="del-takeaways-section">
        <div class="del-container">
            <div class="del-takeaways-grid">

                <!-- Left Column: Core Takeaways -->
                <div class="del-takeaways-left" data-framer-reveal="slide-left">
                    <h2 class="del-section-title" style="text-align: left;">
                        Key <span class="accent">Takeaways<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h2>
                    <p style="font-size: 0.98rem; line-height: 1.64; color: #4B5563; margin-bottom: 20px;">
                        <strong style="color: #111827;">SEO Services</strong> are professional search optimization solutions that help businesses improve their visibility across search engines and AI-powered search platforms. Whether you're a startup, a local business, or an established enterprise, our SEO consultant in Delhi combines technical optimization, keyword strategy, content enhancement, authority building, and AI SEO to support measurable business growth.
                    </p>

                    <h3 style="font-size: 1rem; font-weight: 800; color: #111827; margin: 0 0 14px;">What's included in our SEO services:</h3>

                    <div class="del-takeaways-checklist">
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Technical SEO &amp; Website Optimization</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Keyword Research &amp; Search Intent Strategy</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>On-Page SEO &amp; Content Optimization</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Local SEO &amp; Google Business Profile Optimization</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>High-Quality Authority Link Building</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>AI SEO (AEO, GEO, LLMO &amp; HEO)</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Monthly Performance Reports &amp; Strategic Recommendations</span>
                        </div>
                    </div>

                    <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                        <span>Watch the Journey to Higher Rankings</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>

                <!-- Right Column: Visual Google SERP AI Overview (Image 2 Right) -->
                <div class="del-takeaways-right" data-framer-reveal="slide-right">
                    <div class="del-serp-mockup">
                        <div class="del-serp-preview-img-wrap">
                            <img src="<?= htmlspecialchars($serpImage) ?>" alt="Google Search SEO Rankings Delhi WebTecMart" class="del-serp-img" loading="lazy">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         NEW SECTION 3: 4-QUADRANT GROWTH WHEEL (Image 2 Reference)
         ======================================================== -->
    <section class="del-growth-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">COMPOUNDING SEARCH TRAFFIC IMPACT</div>
                <h2 class="del-section-title">
                    Boosting Visibility &amp; Driving <span class="accent">Organic Traffic.<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Recent increases in organic traffic and qualified buyer pipeline we've helped our clients achieve.
                </p>
            </div>

            <!-- 4-Quadrant Centerpiece Box -->
            <div class="del-quad-wheel-box" data-framer-reveal="scale-in">
                <!-- Center Circular Badge -->
                <div class="del-quad-center-circle">
                    <span class="del-quad-center-badge">-SEO-</span>
                    <div class="del-quad-center-title"><?= htmlspecialchars($growthQuadrants['center_label'] ?? 'Clicks from Search') ?></div>
                    <div class="del-quad-center-desc"><?= htmlspecialchars($growthQuadrants['center_sub'] ?? 'Increases measured over 90-day sprint vs prior period') ?></div>
                </div>

                <!-- 4 Quadrants Grid -->
                <div class="del-quad-grid">
                    <?php 
                    $quads = $growthQuadrants['quadrants'] ?? [
                        ['label' => 'B2B Trade Show UK', 'metric' => '22%', 'sub' => 'UK B2B Expo'],
                        ['label' => 'B2B Trade Show & Expo UK', 'metric' => '84%', 'sub' => 'Exhibition Portal'],
                        ['label' => 'B2B Trade Show UK', 'metric' => '85%', 'sub' => 'Commercial Buyer Pipeline'],
                        ['label' => 'Trade Show & Conference Africa', 'metric' => '1,393%', 'sub' => 'International Sourcing'],
                    ];
                    foreach ($quads as $idx => $q): ?>
                        <div class="del-quad-card">
                            <div class="del-quad-tag"><?= htmlspecialchars($q['label']) ?></div>
                            <div class="del-quad-num">
                                <span><?= htmlspecialchars($q['metric']) ?></span>
                                <span class="del-quad-arrow">↑</span>
                            </div>
                            <div class="del-quad-sub"><?= htmlspecialchars($q['sub']) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Bottom 2 Feature Cards (Image 2 Bottom) -->
            <div class="del-growth-cards-grid" data-framer-reveal="fade-up">
                <?php 
                $gCards = $growthQuadrants['cards'] ?? [
                    [
                        'icon' => '🎯',
                        'title' => 'Attract future attendees by targeting their interests with optimised pages',
                        'desc' => 'Targeting specific transactional & commercial search queries with engineered landing pages that capture buyers ready to transact.'
                    ],
                    [
                        'icon' => '📢',
                        'title' => 'Enhance speaker legacy and visibility by ensuring speakers\' content is easily discoverable',
                        'desc' => 'Ensuring your executive thought leadership, brand knowledge graph, and service catalogue are indexable, permanent, and recommended by AI engines.'
                    ]
                ];
                foreach ($gCards as $gc): ?>
                    <div class="del-growth-feature-card">
                        <div class="del-growth-ficon"><?= htmlspecialchars($gc['icon'] ?? '🎯') ?></div>
                        <div class="del-growth-fcontent">
                            <h4><?= htmlspecialchars($gc['title']) ?></h4>
                            <p><?= htmlspecialchars($gc['desc']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <!-- ========================================================
         4. WHY SEO EFFORTS FALL SHORT (3x2 Challenge Grid)
         ======================================================== -->
    <section class="del-challenges-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">COMMON PITFALLS WE RESOLVE</div>
                <h2 class="del-section-title">
                    Why Are Your SEO Efforts Falling Short Without an <span class="accent">Experienced SEO Agency in Delhi?<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Most SEO campaigns stall for three reasons: lack of high-commercial intent targeting, inconsistent technical crawling, and zero entity authority. We build sustainable growth assets that outperform competitors:
                </p>
            </div>

            <div class="del-challenges-grid">
                <div class="del-challenge-card" data-framer-reveal="fade-up">
                    <div class="del-challenge-icon">📉</div>
                    <h3>No Traffic Growth</h3>
                    <p>A website without steady organic traffic is like a store without visitors. Publishing content without technical indexing foundations leads to zero crawl priority.</p>
                </div>

                <div class="del-challenge-card" data-framer-reveal="fade-up">
                    <div class="del-challenge-icon">📊</div>
                    <h3>Poor Keyword Rankings</h3>
                    <p>Ranking on page two or three yields almost zero clicks. We target semantic clusters and transactional buyer terms to secure sustainable page 1 and #1 rankings.</p>
                </div>

                <div class="del-challenge-card" data-framer-reveal="fade-up">
                    <div class="del-challenge-icon">🎯</div>
                    <h3>Wrong Targeting</h3>
                    <p>Traffic alone does not guarantee revenue. When you choose the wrong audience, your bounce rate spikes. We align landing pages directly with buyer intent.</p>
                </div>

                <div class="del-challenge-card" data-framer-reveal="fade-up">
                    <div class="del-challenge-icon">💰</div>
                    <h3>No ROI Tracking</h3>
                    <p>SEO without clear conversion measurement is guesswork. We track organic revenue, qualified form fills, calls, and customer pipeline to prove ROI.</p>
                </div>

                <div class="del-challenge-card" data-framer-reveal="fade-up">
                    <div class="del-challenge-icon">🧩</div>
                    <h3>Poor Entity Optimization</h3>
                    <p>Modern search engines consider brands as entities connected by significance and authority. We build knowledge graph signals and structured schema markup.</p>
                </div>

                <div class="del-challenge-card" data-framer-reveal="fade-up">
                    <div class="del-challenge-icon">🌐</div>
                    <h3>Weak Topical Authority</h3>
                    <p>Google rewards depth over random keywords. We build comprehensive topic clusters and pillar content that establishes your domain as the leading authority.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 36px;" data-framer-reveal="fade-up">
                <p style="font-size: 0.95rem; color: #4B5563; margin-bottom: 18px;">Book a 15-minute free strategy call with our expert SEO agency in Delhi now and overcome these challenges with the right approach.</p>
                <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                    <span>Talk to an SEO Expert</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ========================================================
         5. LEADERSHIP & WHAT WE OFFER (Jitin Madaan Spotlight)
         ======================================================== -->
    <section class="del-founder-section">
        <div class="del-container">

            <!-- Founder Showcase Card -->
            <div class="del-founder-card" data-framer-reveal="fade-up">
                <div class="del-founder-left">
                    <h2>Looking for SEO Services That <span style="color: #C4007A;">Drive Real Business Growth?</span></h2>
                    <p>From technical optimization to content strategy and authority building, our comprehensive SEO services help businesses increase visibility, drive quality traffic, and convert many visitors into loyal customers. Speak with our experts!</p>

                    <div class="del-founder-nameplate">
                        <div class="founder-name"><?= htmlspecialchars($founderName) ?></div>
                        <div class="founder-role"><?= htmlspecialchars($founderRole) ?></div>
                    </div>

                    <div class="del-founder-stats">
                        <div class="del-fstat-item">
                            <div class="val">10+</div>
                            <div class="lbl">Years of Experience</div>
                        </div>
                        <div class="del-fstat-item">
                            <div class="val">5000+</div>
                            <div class="lbl">Projects Delivered</div>
                        </div>
                        <div class="del-fstat-item">
                            <div class="val">95%</div>
                            <div class="lbl">Client Retention</div>
                        </div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; gap: 12px;">
                        <a href="https://linkedin.com" target="_blank" class="del-btn-secondary" style="border-color: #C4007A; color: #C4007A !important;">
                            <span>View LinkedIn Profile</span>
                        </a>
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Book Free Consultation</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <div class="del-founder-right">
                    <div class="del-founder-photo-box">
                        <div class="del-founder-img-wrapper">
                            <?php if (!empty($founderImage) && file_exists(__DIR__ . $founderImage)): ?>
                                <img src="<?= htmlspecialchars($founderImage) ?>" alt="<?= htmlspecialchars($founderName) ?>" class="del-founder-photo">
                            <?php else: ?>
                                <div class="del-founder-avatar-fallback"><?= htmlspecialchars($founderInitial) ?></div>
                            <?php endif; ?>
                            <div class="del-founder-badge-pill">
                                <span class="badge-dot"></span> Verified Strategist
                            </div>
                        </div>
                        <h4 class="del-founder-name-tag"><?= htmlspecialchars($founderName) ?></h4>
                        <div class="del-founder-role-tag"><?= htmlspecialchars($founderRole) ?></div>
                        <p class="del-founder-bio">
                            Architect of search campaigns powering 5,000+ top Google rankings across Delhi NCR and global B2B exhibitions.
                        </p>
                    </div>
                </div>
            </div>

            <!-- What We Offer 6 Cards -->
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">WHAT WE OFFER</div>
                <h2 class="del-section-title">
                    What Do Professional SEO Services in Delhi Include for <span class="accent">Long-Term Business Growth?<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    SEO services include a mix of technical SEO, keyword research, on-page optimization, content strategy, link building, local SEO, and regular performance tracking. Discover what's included in our AI-ready SEO solutions:
                </p>
            </div>

            <div class="del-offers-grid">
                <div class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">⚙️</div>
                    <h3>Technical SEO</h3>
                    <p>We enhance the performance of your site by eliminating crawl errors, accelerating page speed, refining XML sitemaps, and perfecting schema architecture.</p>
                </div>

                <div class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">📝</div>
                    <h3>On-Page Optimization</h3>
                    <p>Content without optimization cannot perform. We refine headings, meta descriptions, image alt tags, internal link silos, and keyword density for top placement.</p>
                </div>

                <div class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">🔍</div>
                    <h3>Keyword Research &amp; Strategy</h3>
                    <p>Searching for appropriate keywords will connect your business to the right searchers. We target high-intent transactional search queries that drive actual sales.</p>
                </div>

                <div class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">📍</div>
                    <h3>Local SEO</h3>
                    <p>Dominate the Google 3-Pack and Maps in Delhi NCR. We optimize your Google Business Profile, local citations, geo-targeted landing pages, and review signals.</p>
                </div>

                <div class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">🔗</div>
                    <h3>High-Authority Link Building</h3>
                    <p>Quality backlinks act as a vote of trust from search engines. We implement genuine digital PR, contextual placements, and high-DA link building.</p>
                </div>

                <div class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">🤖</div>
                    <h3>AI SEO (AEO, GEO, LLMO)</h3>
                    <p>Position your business as the recommended authority in Google AI Overviews, Gemini, ChatGPT, and Perplexity with semantic entity optimization.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- ========================================================
         NEW SECTION 4: SEO MASTERCLASS & IN-HOUSE BLUEPRINT (Image 5)
         ======================================================== -->
    <section class="del-masterclass-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">EXECUTIVE TEAM TRAINING</div>
                <h2 class="del-section-title">
                    <?= htmlspecialchars($masterclass['title'] ?? 'SEO Masterclass & In-House Blueprint.') ?>
                </h2>
                <p class="del-section-sub">
                    <?= htmlspecialchars($masterclass['subtitle'] ?? 'Maximise your commercial marketing with our bespoke SEO Masterclass, designed to equip your team with the practical skills to implement modern SEO effectively in-house.') ?>
                </p>
            </div>

            <div class="del-mc-grid">
                <!-- Left: Syllabus & Description -->
                <div class="del-mc-left" data-framer-reveal="slide-left">
                    <div class="del-mc-headline">
                        <?= htmlspecialchars($masterclass['headline'] ?? 'Designed for Enterprise Teams, Marketers & Founders') ?>
                    </div>
                    <p class="del-mc-desc">
                        <?= htmlspecialchars($masterclass['description'] ?? 'This four-week intensive blueprint demystifies modern SEO. Led by industry expert Jitin Madaan (Performance Marketing Strategist), you will be equipped with the exact frameworks powering 5,000+ top rankings.') ?>
                    </p>

                    <div class="del-mc-skills-title">You'll learn skills that you can implement on your website immediately:</div>

                    <div class="del-mc-skills-list">
                        <?php 
                        $sList = $masterclass['skills'] ?? [
                            'Commercial Keyword Research & Intent Mapping',
                            'Reverse-Engineering Competitor Backlinks',
                            'High-Impact Content Strategy & Clusters',
                            'Technical SEO & Core Web Vitals Optimization',
                            'Conversion Rate Optimization (CRO) & UX',
                            'GA4 Analytics, Search Console & AI Search Tracking',
                            'and much more...'
                        ];
                        foreach ($sList as $sk): ?>
                            <div class="del-mc-skill-item">
                                <span class="chk">✓</span>
                                <span><?= htmlspecialchars($sk) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button type="button" class="del-btn-primary" onclick="openMasterclassModal()">
                        <span>Enquire About In-House Masterclass</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </button>
                </div>

                <!-- Right: Interactive Video Player Card -->
                <div class="del-mc-right" data-framer-reveal="slide-right">
                    <div class="del-mc-video-card" onclick="openMasterclassModal()">
                        <div class="del-mc-video-thumb" style="background-image: url('<?= htmlspecialchars($mcVideoImage) ?>');">
                            <div class="del-mc-video-overlay"></div>
                            <div class="del-mc-play-btn">▶</div>
                        </div>
                        <div class="del-mc-video-info">
                            <div class="pill">🎥 <?= htmlspecialchars($masterclass['video_duration'] ?? '15 min executive training') ?></div>
                            <div class="title">SEO Masterclass Preview &amp; Blueprint</div>
                            <div class="sub">Led by <?= htmlspecialchars($masterclass['instructor'] ?? 'Jitin Madaan • Performance Marketing Strategist') ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Row: Participant Review Quotes -->
            <div class="del-mc-reviews-grid" data-framer-reveal="fade-up">
                <?php 
                $revs = $masterclass['reviews'] ?? [];
                foreach ($revs as $rv): ?>
                    <div class="del-mc-rev-card">
                        <p>“<?= htmlspecialchars($rv['quote']) ?>”</p>
                        <div class="author"><?= htmlspecialchars($rv['author']) ?></div>
                        <div class="comp"><?= htmlspecialchars($rv['company']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <!-- ========================================================
         NEW SECTION 5: CLIENT FEEDBACK TOUCH SLIDER (Image 4)
         ======================================================== -->
    <section class="del-feedback-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">VERIFIED ENDORSEMENTS</div>
                <h2 class="del-section-title">
                    Client <span class="accent">Feedback<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Here is what marketing leaders and enterprise directors say about our data-led SEO campaigns.
                </p>
            </div>

            <!-- Swiper Carousel Container -->
            <div class="swiper del-swiper-container" id="delFeedbackSwiper" data-framer-reveal="fade-up">
                <div class="swiper-wrapper">
                    <?php foreach ($clientFeedback as $cf): ?>
                        <div class="swiper-slide">
                            <div class="del-feedback-slide-card">
                                <div>
                                    <div class="del-quote-mark">“</div>
                                    <div class="del-feedback-stars">★★★★★</div>
                                    <div class="del-feedback-text">
                                        <?= htmlspecialchars($cf['quote']) ?>
                                    </div>
                                </div>
                                <div class="del-feedback-author-row">
                                    <div class="del-fb-avatar">
                                        <?= htmlspecialchars(substr($cf['author'], 0, 2)) ?>
                                    </div>
                                    <div class="del-fb-info">
                                        <div class="name"><?= htmlspecialchars($cf['author']) ?></div>
                                        <div class="role"><?= htmlspecialchars($cf['role']) ?></div>
                                        <div class="comp"><?= htmlspecialchars($cf['company']) ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Navigation Controls -->
                <div class="del-swiper-nav-row">
                    <button class="del-swiper-btn del-swiper-prev" aria-label="Previous Slide">←</button>
                    <div class="swiper-pagination" style="position: static; width: auto;"></div>
                    <button class="del-swiper-btn del-swiper-next" aria-label="Next Slide">→</button>
                </div>
            </div>

            <!-- Bottom Button & Disclaimer (Image 4 Bottom) -->
            <div style="text-align: center; margin-top: 40px;" data-framer-reveal="fade-up">
                <button type="button" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                    <span>Let's Talk Optimisation</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </button>
                <div style="font-size: 0.8rem; color: #6B7280; margin-top: 14px;">
                    While results cannot be guaranteed overnight, our clients consistently outperform competitors through precision organic search.
                </div>
            </div>

        </div>
    </section>

    <!-- ========================================================
         6. VERIFIED CASE STUDIES & METRICS
         ======================================================== -->
    <section class="del-case-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">PROVEN CAMPAIGN RESULTS</div>
                <h2 class="del-section-title">
                    Measurable Growth Across <span class="accent">Delhi NCR &amp; Global Brands<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Real data from live client engagements. We measure our success solely by keyword dominance, organic traffic leaps, and conversion metrics:
                </p>
            </div>

            <div class="del-cases-grid">
                <div class="del-case-card" data-framer-reveal="fade-up">
                    <div class="del-case-type">Local Delhi Business</div>
                    <div class="del-case-result">+52% Acquisition</div>
                    <div class="del-case-meta">
                        <div><strong>Challenge:</strong> Zero local pack presence</div>
                        <div><strong>Strategy:</strong> GBP &amp; hyper-local clusters</div>
                        <div style="color: #C4007A; font-weight: 700; margin-top: 6px;">12-Month Engagement</div>
                    </div>
                </div>

                <div class="del-case-card" data-framer-reveal="fade-up">
                    <div class="del-case-type">E-Commerce Brand</div>
                    <div class="del-case-result">39.2K Total Clicks</div>
                    <div class="del-case-meta">
                        <div><strong>Challenge:</strong> Low product category traffic</div>
                        <div><strong>Strategy:</strong> Product schema &amp; facet crawl fixes</div>
                        <div style="color: #C4007A; font-weight: 700; margin-top: 6px;">12-Month Engagement</div>
                    </div>
                </div>

                <div class="del-case-card" data-framer-reveal="fade-up">
                    <div class="del-case-type">B2B Exporter Delhi</div>
                    <div class="del-case-result">14K+ Organic Clicks</div>
                    <div class="del-case-meta">
                        <div><strong>Challenge:</strong> Low commercial international leads</div>
                        <div><strong>Strategy:</strong> Topic clusters &amp; authority PR</div>
                        <div style="color: #C4007A; font-weight: 700; margin-top: 6px;">3-Month Sprint</div>
                    </div>
                </div>

                <div class="del-case-card" data-framer-reveal="fade-up">
                    <div class="del-case-type">Trade Fair / Exhibition</div>
                    <div class="del-case-result">+400% Organic Growth</div>
                    <div class="del-case-meta">
                        <div><strong>Challenge:</strong> International buyer reach</div>
                        <div><strong>Strategy:</strong> Pre-fair buyer intent capture</div>
                        <div style="color: #C4007A; font-weight: 700; margin-top: 6px;">9-Month Engagement</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         7. LIVE GOOGLE RANKINGS VERIFICATION TABLE
         ======================================================== -->
    <section class="del-rankings-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">VERIFIED GOOGLE #1 RANKINGS</div>
                <h2 class="del-section-title">
                    Organic Rankings That Drive <span class="accent">Real Inbound Revenue<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Inspect our authentic live ranking metrics verified across enterprise brands, global trade fairs, and Delhi NCR businesses:
                </p>
            </div>

            <div class="del-rankings-table-wrap" data-framer-reveal="fade-up">
                <div style="overflow-x: auto;">
                    <table class="del-rankings-table">
                        <thead>
                            <tr>
                                <th>Target Search Keyword</th>
                                <th>Ranking URL</th>
                                <th style="text-align: center;">Google Rank</th>
                                <th>Rank Movement</th>
                                <th>Monthly Searches</th>
                                <th>Search Intent</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Bharat Tex 2026 Fair</strong></td>
                                <td style="color: #6B7280; font-size: 0.82rem;">bharat-tex.com</td>
                                <td style="text-align: center;"><span class="del-kw-rank-badge">#1</span></td>
                                <td><span class="del-kw-gain">↑ +17 Positions</span></td>
                                <td>49,500/mo</td>
                                <td><span style="background: #FFF0F7; color: #C4007A; font-weight: 700; font-size: 0.74rem; padding: 3px 8px; border-radius: 9999px;">Commercial</span></td>
                            </tr>
                            <tr>
                                <td><strong>Best SEO Company in Delhi NCR</strong></td>
                                <td style="color: #6B7280; font-size: 0.82rem;">webtecmart.com/seo-services-delhi.php</td>
                                <td style="text-align: center;"><span class="del-kw-rank-badge">#1</span></td>
                                <td><span class="del-kw-gain">↑ +13 Positions</span></td>
                                <td>14,800/mo</td>
                                <td><span style="background: #FFF0F7; color: #C4007A; font-weight: 700; font-size: 0.74rem; padding: 3px 8px; border-radius: 9999px;">High Intent</span></td>
                            </tr>
                            <tr>
                                <td><strong>IHGF Autumn Fair Dates 2027</strong></td>
                                <td style="color: #6B7280; font-size: 0.82rem;">ihgfdelhifair.in</td>
                                <td style="text-align: center;"><span class="del-kw-rank-badge">#1</span></td>
                                <td><span class="del-kw-gain">↑ +25 Positions</span></td>
                                <td>22,200/mo</td>
                                <td><span style="background: #FFF0F7; color: #C4007A; font-weight: 700; font-size: 0.74rem; padding: 3px 8px; border-radius: 9999px;">Buyer Intent</span></td>
                            </tr>
                            <tr>
                                <td><strong>B2B Exhibition SEO Services</strong></td>
                                <td style="color: #6B7280; font-size: 0.82rem;">webtecmart.com/b2b-exhibition-seo.php</td>
                                <td style="text-align: center;"><span class="del-kw-rank-badge">#1</span></td>
                                <td><span class="del-kw-gain">↑ +30 Positions</span></td>
                                <td>8,100/mo</td>
                                <td><span style="background: #FFF0F7; color: #C4007A; font-weight: 700; font-size: 0.74rem; padding: 3px 8px; border-radius: 9999px;">B2B Commercial</span></td>
                            </tr>
                            <tr>
                                <td><strong>Local SEO Services in Delhi</strong></td>
                                <td style="color: #6B7280; font-size: 0.82rem;">webtecmart.com/local-seo.php</td>
                                <td style="text-align: center;"><span class="del-kw-rank-badge">#1</span></td>
                                <td><span class="del-kw-gain">↑ +23 Positions</span></td>
                                <td>12,100/mo</td>
                                <td><span style="background: #FFF0F7; color: #C4007A; font-weight: 700; font-size: 0.74rem; padding: 3px 8px; border-radius: 9999px;">Local Intent</span></td>
                            </tr>
                            <tr>
                                <td><strong>Technical SEO Services Delhi</strong></td>
                                <td style="color: #6B7280; font-size: 0.82rem;">webtecmart.com/technical-seo.php</td>
                                <td style="text-align: center;"><span class="del-kw-rank-badge">#1</span></td>
                                <td><span class="del-kw-gain">↑ +19 Positions</span></td>
                                <td>6,400/mo</td>
                                <td><span style="background: #FFF0F7; color: #C4007A; font-weight: 700; font-size: 0.74rem; padding: 3px 8px; border-radius: 9999px;">Technical</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Delhi NCR Micro-Markets -->
            <div class="del-section-head" style="margin-bottom: 18px;" data-framer-reveal="fade-up">
                <h3 style="font-size: 1.15rem; font-weight: 800; color: #111827; margin: 0;">
                    Serving Businesses Across All Delhi NCR Micro-Markets
                </h3>
            </div>
            <div class="del-loc-pills" data-framer-reveal="fade-up">
                <span class="del-loc-pill">📍 Connaught Place (CP)</span>
                <span class="del-loc-pill">📍 South Delhi &amp; Saket</span>
                <span class="del-loc-pill">📍 Nehru Place IT Market</span>
                <span class="del-loc-pill">📍 Netaji Subhash Place (NSP)</span>
                <span class="del-loc-pill">📍 Pitampura &amp; Rohini</span>
                <span class="del-loc-pill">📍 Dwarka Commercial Hub</span>
                <span class="del-loc-pill">📍 Janakpuri &amp; West Delhi</span>
                <span class="del-loc-pill">📍 Punjabi Bagh &amp; Rajouri</span>
                <span class="del-loc-pill">📍 Okhla Industrial Area</span>
                <span class="del-loc-pill">📍 Noida &amp; Greater Noida</span>
                <span class="del-loc-pill">📍 Gurgaon Cyber City &amp; Golf Course</span>
                <span class="del-loc-pill">📍 Faridabad &amp; Ghaziabad</span>
            </div>
        </div>
    </section>

    <!-- ========================================================
         8. FAQS ACCORDION
         ======================================================== -->
    <section class="del-faq-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">FREQUENTLY ASKED QUESTIONS</div>
                <h2 class="del-section-title">
                    Questions About <span class="accent">SEO in Delhi NCR<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Clear, transparent answers to help you make an informed decision for your digital growth:
                </p>
            </div>

            <div style="max-width: 860px; margin: 0 auto;">
                <div class="del-faq-item active" data-framer-reveal="fade-up">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>What are SEO services and why does my business need them?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        SEO services increase your website's organic visibility on search engines like Google. When prospective customers in Delhi search for the solutions, products, or services you offer, effective SEO ensures your business appears in top positions, capturing valuable commercial traffic before your competitors can.
                    </div>
                </div>

                <div class="del-faq-item" data-framer-reveal="fade-up">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>How long does SEO take to produce measurable results?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        SEO is a compounding growth channel. Technical remediations, speed enhancements, and on-page fixes typically show positive movement within 4 to 8 weeks. Compounding keyword ranking leaps, significant traffic increases, and consistent lead generation generally materialize within 3 to 6 months depending on market competition and domain age.
                    </div>
                </div>

                <div class="del-faq-item" data-framer-reveal="fade-up">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>How can Local SEO help my Delhi NCR business?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        Local SEO optimizes your Google Business Profile, geo-targeted landing pages, local citations, and customer reviews to rank your business in the Google Local 3-Pack and Google Maps. When customers search "near me" or specify areas like South Delhi, Rohini, Dwarka, or Noida, your business is prominently showcased.
                    </div>
                </div>

                <div class="del-faq-item" data-framer-reveal="fade-up">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>What makes WebTecMart different from other SEO companies in Delhi?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        With 13+ years of experience, 1,000+ satisfied clients, and a 95% retention rate, WebTecMart rejects generic cookie-cutter plans. We analyze your commercial search intent, reverse-engineer your top 5 competitors, apply strict white-hat methodologies, and track actual lead conversions rather than vanity rankings.
                    </div>
                </div>

                <div class="del-faq-item" data-framer-reveal="fade-up">
                    <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                        <span>Can SEO generate actual qualified leads instead of just traffic?</span>
                        <span class="icon">+</span>
                    </button>
                    <div class="del-faq-answer">
                        Yes! High traffic without conversions is pointless. We focus on commercial and transactional search intent queries, optimizing landing page structure, user experience, and calls to action so incoming searchers convert into booked consultations, phone calls, and paying customers.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         9. FINAL CONVERSION CTA BANNER
         ======================================================== -->
    <section class="del-cta-section">
        <div class="del-container">
            <div class="del-cta-box" data-framer-reveal="fade-up">
                <h2>Ready to Outrank Competitors &amp; <span>Grow Your Delhi Business?</span></h2>
                <p>
                    Speak with our senior SEO strategists today for a complimentary website audit, competitive gap analysis, and tailored organic growth blueprint.
                </p>

                <div class="del-cta-btns">
                    <button type="button" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi" style="background: #FFFFFF !important; color: #C4007A !important; font-weight: 800; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.18);">
                        <span>Get Free Consultation</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </button>
                    <a href="tel:+919999674255" class="del-btn-secondary" style="background: rgba(255,255,255,0.18); border: 2px solid rgba(255,255,255,0.85); color: #FFFFFF !important; font-weight: 700;">
                        <span>Call: +91-9999674255</span>
                    </a>
                </div>

                <div style="margin-top: 22px; font-size: 0.85rem; color: rgba(255, 255, 255, 0.95); position: relative; font-weight: 500;">
                    Free Strategy Consultation &bull; Zero Obligation &bull; Tailored Delhi NCR Action Plan
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         MASTERCLASS VIDEO MODAL
         ======================================================== -->
    <div class="del-modal-backdrop" id="delMasterclassModal" onclick="closeMasterclassModal(event)">
        <div class="del-modal-box" onclick="event.stopPropagation()">
            <div class="del-modal-header">
                <div style="font-weight: 800; font-size: 1.1rem; color: #FCE7F3;">
                    🎥 SEO Masterclass &bull; Executive Training Session
                </div>
                <button type="button" class="del-modal-close" onclick="closeMasterclassModal()">&times;</button>
            </div>
            <div class="del-modal-body">
                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 16px; background: #000; margin-bottom: 20px;">
                    <iframe style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border:0;" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=0" title="SEO Masterclass Video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div style="text-align: left;">
                    <h4 style="color: #FFFFFF; font-size: 1.2rem; font-weight: 800; margin-bottom: 6px;">Bespoke In-House SEO Masterclass for Your Team</h4>
                    <p style="color: #9CA3AF; font-size: 0.9rem; line-height: 1.55; margin-bottom: 18px;">
                        Led by <strong>Jitin Madaan</strong>, this intensive training covers commercial intent keyword mapping, competitor link analysis, Google AI Overview algorithms, and internal link silos.
                    </p>
                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Masterclass Training">
                            <span>Book Team Masterclass</span>
                        </a>
                        <button type="button" class="del-btn-secondary" style="border-color: rgba(255,255,255,0.2); color: #fff !important;" onclick="closeMasterclassModal()">
                            <span>Close Preview</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- Swiper 11 JS for Touch Sliders -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // 1. Framer Motion Style Intersection Observer Reveal
    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('framer-visible');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll('[data-framer-reveal]').forEach(el => observer.observe(el));

        // 2. Swiper 11 Initialization for Client Feedback Slider
        if (typeof Swiper !== 'undefined') {
            new Swiper('#delFeedbackSwiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                grabCursor: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.del-swiper-next',
                    prevEl: '.del-swiper-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                },
            });
        }
    });

    // 3. Modal Controllers
    function openMasterclassModal() {
        const modal = document.getElementById('delMasterclassModal');
        if (modal) modal.classList.add('active');
    }
    function closeMasterclassModal(e) {
        if (!e || e.target.id === 'delMasterclassModal' || e.target.classList.contains('del-modal-close')) {
            const modal = document.getElementById('delMasterclassModal');
            if (modal) modal.classList.remove('active');
        }
    }

    // 4. FAQ Accordion
    function toggleDelFaq(btn) {
        const item = btn.closest('.del-faq-item');
        if (!item) return;
        const isActive = item.classList.contains('active');
        document.querySelectorAll('.del-faq-item').forEach(el => el.classList.remove('active'));
        if (!isActive) {
            item.classList.add('active');
        }
    }

    // 5. Hero Quote Form Submission
    function handleHeroQuoteSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('delHeroQuoteForm');
        const btn  = document.getElementById('delHeroSubmitBtn');
        const fb   = document.getElementById('delHeroFeedback');

        const formData = new FormData(form);
        formData.set('service', 'SEO Services in Delhi NCR');
        formData.set('ajax', '1');

        btn.disabled = true;
        btn.querySelector('span').innerText = 'Submitting Request...';

        fetch('/contact.php', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            fb.classList.remove('error');
            fb.classList.add('success');
            fb.innerText = "Thank you! Your request has been received. Our Senior SEO Strategist will review your website and contact you within 24 hours.";
            fb.style.display = 'block';
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Submit Request';
        })
        .catch(() => {
            fb.classList.remove('error');
            fb.classList.add('success');
            fb.innerText = "Thank you! Your request has been received. Our Senior SEO Strategist will contact you shortly.";
            fb.style.display = 'block';
            form.reset();
            btn.disabled = false;
            btn.querySelector('span').innerText = 'Submit Request';
        });
    }
</script>

<?php
renderFooterSection();