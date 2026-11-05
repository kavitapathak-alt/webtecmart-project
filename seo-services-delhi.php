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
$springSerpImage = $dbService['spring_serp_image'] ?? '/assets/images/spring-sourcing-fair-serp-highlight.png';

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
            "text": "SEO Services increase your site's presence in search engines and make it easier for anyone who searches for your goods or services to find your site. Combating local, commercial and industry-specific searches and building a sustainable source of organic traffic for businesses in Delhi is where SEO comes into the picture."
          }
        },
        {
          "@type": "Question",
          "name": "How long does SEO take to show results?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "SEO is a long-term approach, and there is no guarantee of results, depending on your site, the competition, the industry, the keywords you're targeting and how well your site is being found in the search engines. Technical and on page optimisation can bring about changes fairly quickly, whereas building authority and targeting competitive keywords may take a longer period of time, but need consistent optimisation."
          }
        },
        {
          "@type": "Question",
          "name": "How can Local SEO help my Delhi business?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Local SEO puts your business in front of mobile searches that are related to your area and services. It can help people find your business when they look for local products and/or services, and can help you be seen in queries that are relevant to your business."
          }
        },
        {
          "@type": "Question",
          "name": "What does an SEO agency in Delhi actually do?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "An SEO agency will be able to work on keyword research, technical SEO, on page optimisation, content optimisation, local SEO, internal linking, authority building, competitor analysis and monitoring performance. The exact approach will vary, depending on the business and goals."
          }
        },
        {
          "@type": "Question",
          "name": "Is it possible to create leads with SEO and not traffic?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. The goal of SEO isn't to bring as many visitors as possible, it's to bring the right ones. Through focusing on search intent and optimising content and calls to action, landing pages, SEO can help to drive inquiries, registrations, sales and other conversions."
          }
        },
        {
          "@type": "Question",
          "name": "Which is better, SEO or Google Ads?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "SEO isn't the same thing as Google Ads. While SEO is about long-term organic visibility, Google Ads can offer instant paid visibility. A lot of businesses leverage both of them as part of an extensive digital marketing campaign."
          }
        },
        {
          "@type": "Question",
          "name": "How to select the Ideal SEO firm in Delhi?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Find an SEO firm that has a clear understanding of your business, is able to articulate their approach, has a business objective that is relevant to your business, has a clear reporting system and isn't promising to rank websites in the improbable. A successful SEO partner should be able to tell you not only what they'll be working on, but why it is important to your business."
          }
        },
        {
          "@type": "Question",
          "name": "Which businesses can benefit from SEO services?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "SEO can help virtually any business that has customers find it online. SEO can be beneficial for local businesses, e-commerce retailers, professional services, real estate companies, healthcare providers, educational institutions, tech companies and B2B types of companies as well."
          }
        },
        {
          "@type": "Question",
          "name": "Does WebTecMart provide Local, National and International SEO?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. WebTecMart can develop SEO strategies for businesses targeting customers locally in Delhi and Delhi NCR, across India or in international markets. The method and web design is modified based on the target market."
          }
        },
        {
          "@type": "Question",
          "name": "What is the price of SEO services in Delhi?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The cost of SEO services varies based on website size, competition, location, keywords, content needs, and the technical complexity and business goals. WebTecMart also provides several SEO packages and will be able to design a personalised approach to suit your needs."
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
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
        margin-bottom: 24px;
    }
    @media (min-width: 640px) {
        .del-hero-bullets {
            grid-template-columns: 1fr 1fr;
            gap: 12px 18px;
        }
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
        padding: 68px 0 76px;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 50%, #FFFFFF 100%);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(196, 0, 122, 0.12);
    }
    .del-marquee-wrap {
        position: relative;
        max-width: 1160px;
        margin: 0 auto;
        overflow: hidden;
        padding: 26px 20px;
        border-radius: 28px;
        background: linear-gradient(135deg, rgba(255, 245, 250, 0.98) 0%, rgba(255, 235, 245, 0.88) 100%);
        border: 2px solid rgba(196, 0, 122, 0.22);
        box-shadow: 0 12px 36px rgba(196, 0, 122, 0.08), inset 0 2px 14px rgba(196, 0, 122, 0.04);
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
        border-top-left-radius: 26px;
        border-bottom-left-radius: 26px;
    }
    .del-marquee-wrap::after {
        right: 0;
        background: linear-gradient(270deg, #FFF5FA 0%, rgba(255, 245, 250, 0) 100%);
        border-top-right-radius: 26px;
        border-bottom-right-radius: 26px;
    }
    .del-marquee-track {
        display: flex;
        gap: 18px;
        width: max-content;
        animation: delMarqueeSingle 32s linear infinite;
        padding: 4px 10px;
        align-items: center;
    }
    .del-marquee-wrap:hover .del-marquee-track {
        animation-play-state: paused;
    }
    @keyframes delMarqueeSingle {
        0% { transform: translate3d(0, 0, 0); }
        100% { transform: translate3d(-33.333%, 0, 0); }
    }
    .del-brand-card {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.22);
        border-radius: 16px;
        padding: 12px 24px;
        box-shadow: 0 4px 18px rgba(196, 0, 122, 0.07);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        white-space: nowrap;
        cursor: default;
    }
    .del-brand-card:hover {
        transform: translateY(-4px);
        border-color: #C4007A;
        background: #FFF0F7;
        box-shadow: 0 12px 28px rgba(196, 0, 122, 0.22);
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
    /* Google SERP Browser Showcase (Replaced Laptop Mockup) */
    .del-serp-browser-showcase {
        position: relative;
        background: #FFFFFF;
        border-radius: 24px;
        border: 2px solid rgba(196, 0, 122, 0.22);
        box-shadow: 0 24px 60px rgba(196, 0, 122, 0.12), 0 4px 16px rgba(0, 0, 0, 0.04);
        overflow: hidden;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease;
    }
    .del-serp-browser-showcase:hover {
        transform: translateY(-5px);
        box-shadow: 0 30px 70px rgba(196, 0, 122, 0.18), 0 8px 24px rgba(0, 0, 0, 0.06);
        border-color: #C4007A;
    }
    .del-browser-chrome {
        background: #F9FAFB;
        padding: 12px 18px;
        border-bottom: 1px solid rgba(196, 0, 122, 0.14);
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .del-browser-dots {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .del-browser-dots .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
    }
    .del-browser-dots .dot.red { background: #EF4444; }
    .del-browser-dots .dot.yellow { background: #F59E0B; }
    .del-browser-dots .dot.green { background: #10B981; }
    .del-browser-search-bar {
        flex: 1;
        background: #FFFFFF;
        border: 1px solid rgba(196, 0, 122, 0.2);
        border-radius: 9999px;
        padding: 6px 14px;
        font-size: 0.82rem;
        color: #4B5563;
        display: flex;
        align-items: center;
        gap: 8px;
        font-family: monospace;
    }
    .del-browser-search-bar .lock-icon {
        margin-left: auto;
        font-size: 0.72rem;
        opacity: 0.7;
    }
    .del-browser-viewport {
        position: relative;
        background: #FFFFFF;
        overflow: hidden;
    }
    .del-browser-serp-img {
        width: 100%;
        height: auto;
        display: block;
    }
    .del-serp-float-badge {
        position: absolute;
        background: #FFFFFF;
        color: #111827;
        border-radius: 12px;
        padding: 8px 14px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.14);
        border: 1.5px solid rgba(196, 0, 122, 0.25);
        font-size: 0.78rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        z-index: 4;
        animation: delFloat 4s ease-in-out infinite alternate;
    }
    .del-serp-float-badge.badge-top {
        top: 14px;
        right: 14px;
    }
    .del-serp-float-badge.badge-bottom {
        bottom: 14px;
        left: 14px;
        animation-delay: -2s;
    }
    .del-serp-float-badge .pulse-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #10B981;
        display: inline-block;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25);
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

    /* ========================================================
       NEW COMPONENT STYLES FOR CLIENT'S EXPANDED CONTENT
       ======================================================== */
    /* Value Prop / Why WebTecMart Grid */
    .del-why-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 16px;
        margin-top: 24px;
        margin-bottom: 24px;
    }
    .del-why-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.16);
        border-radius: 16px;
        padding: 16px 18px;
        display: flex;
        align-items: flex-start;
        gap: 14px;
        box-shadow: 0 4px 14px rgba(196, 0, 122, 0.04);
        transition: all 0.3s ease;
    }
    .del-why-card:hover {
        transform: translateY(-3px);
        border-color: #C4007A;
        box-shadow: 0 10px 24px rgba(196, 0, 122, 0.12);
        background: #FFF8FB;
    }
    .del-why-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: #FFF0F7;
        color: #C4007A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        flex-shrink: 0;
    }
    .del-why-text {
        font-size: 0.92rem;
        font-weight: 600;
        color: #1F2937;
        line-height: 1.45;
    }

    /* Approach Flow Banner */
    .del-approach-banner {
        background: linear-gradient(135deg, #FFF0F7 0%, #FFF8FB 100%);
        border: 1.5px dashed rgba(196, 0, 122, 0.3);
        border-radius: 20px;
        padding: 24px;
        margin-top: 30px;
        text-align: center;
    }
    .del-approach-title {
        font-size: 0.82rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #C4007A;
        margin-bottom: 10px;
    }
    .del-approach-flow {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 6px 12px;
        font-size: 0.95rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 10px;
    }
    .del-approach-flow span.arrow {
        color: #C4007A;
        font-weight: 900;
    }

    /* 6-Step Process Grid */
    .del-process-section {
        padding: 84px 0;
        background: #FFFFFF;
        position: relative;
    }
    .del-process-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 24px;
        margin-top: 40px;
    }
    .del-process-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.16);
        border-radius: 20px;
        padding: 28px;
        position: relative;
        box-shadow: 0 8px 24px rgba(196, 0, 122, 0.05);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .del-process-card:hover {
        transform: translateY(-6px);
        border-color: #C4007A;
        box-shadow: 0 18px 40px rgba(196, 0, 122, 0.14);
    }
    .del-process-num {
        font-size: 2.2rem;
        font-weight: 900;
        color: rgba(196, 0, 122, 0.28);
        line-height: 1;
        margin-bottom: 12px;
        transition: color 0.3s ease;
    }
    .del-process-card:hover .del-process-num {
        color: #C4007A;
    }
    .del-process-card h3 {
        font-size: 1.15rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
    }
    .del-process-card p {
        font-size: 0.92rem;
        color: #4B5563;
        line-height: 1.6;
        margin: 0;
    }

    /* 8 Industries Grid */
    .del-industries-section {
        padding: 84px 0;
        background: linear-gradient(180deg, #FFF8FB 0%, #FFFFFF 100%);
        position: relative;
    }
    .del-industries-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }
    .del-industry-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.14);
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 6px 20px rgba(196, 0, 122, 0.04);
        transition: all 0.35s ease;
    }
    .del-industry-card:hover {
        transform: translateY(-5px);
        border-color: #C4007A;
        box-shadow: 0 16px 36px rgba(196, 0, 122, 0.12);
        background: #FFF5FA;
    }
    .del-ind-icon {
        font-size: 2.2rem;
        margin-bottom: 14px;
        display: inline-block;
    }
    .del-industry-card h3 {
        font-size: 1.05rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 8px;
    }
    .del-industry-card p {
        font-size: 0.88rem;
        color: #4B5563;
        line-height: 1.55;
        margin: 0;
    }

    /* 3 Expert Pillars Grid */
    .del-expert-pillars {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 22px;
        margin-top: 36px;
    }
    .del-expert-pillar-card {
        background: #FFFFFF;
        border: 1.5px solid rgba(196, 0, 122, 0.14);
        border-radius: 20px;
        padding: 28px;
        box-shadow: 0 6px 20px rgba(196, 0, 122, 0.05);
        transition: all 0.3s ease;
    }
    .del-expert-pillar-card:hover {
        transform: translateY(-4px);
        border-color: #C4007A;
        box-shadow: 0 14px 32px rgba(196, 0, 122, 0.12);
    }
    .del-ep-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: #FFF0F7;
        color: #C4007A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.45rem;
        margin-bottom: 16px;
    }
    .del-expert-pillar-card h4 {
        font-size: 1.1rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 10px;
    }
    .del-expert-pillar-card p {
        font-size: 0.9rem;
        color: #4B5563;
        line-height: 1.6;
        margin: 0;
    }

    /* Wrapping Up Section Box */
    .del-wrap-section {
        padding: 84px 0;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFF5FA 100%);
    }
    .del-wrap-card {
        background: #FFFFFF;
        border: 2px solid rgba(196, 0, 122, 0.2);
        border-radius: 28px;
        padding: 48px 40px;
        box-shadow: 0 20px 50px rgba(196, 0, 122, 0.08);
        position: relative;
    }
    @media (max-width: 640px) {
        .del-wrap-card {
            padding: 30px 20px;
        }
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
                        <span>RESULT-DRIVEN SEO TO GROW YOUR BUSINESS</span>
                    </div>

                    <h1 class="del-hero-title">
                        SEO Services in Delhi &bull; <span class="accent" style="color: #C4007A;">Result-Driven SEO to Grow Your Business</span>
                    </h1>

                    <p class="del-hero-desc">
                        Get found when your customers are searching. WebTecMart offers strategic SEO solutions in Delhi to boost Google rankings, qualified organic traffic and lead to more enquiries, leads and sales.
                    </p>

                    <p style="font-size: 0.94rem; line-height: 1.62; color: #4B5563; margin-bottom: 20px;">
                        Whether it's technical SEO, on-page optimisation, local SEO, content strategy, or building authority, we develop individual SEO strategies that align with your business, your audience, your competition, and your growth objectives. If you are a local business in Delhi or a business with a growing presence in the Delhi NCR area, an ecommerce company or any business that aims to boost sales across India, our SEO solutions will help you convert search visibility into tangible business growth.
                    </p>

                    <div class="del-hero-bullets">
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>Enhance Google Rankings for relevant, high-value keywords</span>
                        </div>
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>Bring in Targeted Organic Traffic from customers who are searching for your services.</span>
                        </div>
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>Increase website leads and enquiries with search optimisation</span>
                        </div>
                        <div class="del-bullet-item">
                            <span class="dot">✓</span>
                            <span>Create Long-Term Visibility by following a sustainable organic growth strategy.</span>
                        </div>
                    </div>

                    <div class="del-hero-actions">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Schedule a Free SEO Consultation</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                        <a href="tel:+919999674255" class="del-btn-secondary">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span>Call: +91-9999674255</span>
                        </a>
                    </div>

                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px; margin-top: 20px;">
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

                        <div style="font-size: 0.86rem; font-weight: 700; color: #C4007A; background: #FFF0F7; padding: 6px 14px; border-radius: 9999px; border: 1px solid rgba(196, 0, 122, 0.2);">
                            ⚡ Ready for Google to find you?
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
                <!-- Single Row: Continuous Infinite Auto-Scroll -->
                <div class="del-marquee-track">
                    <?php 
                    $tripleLogos = array_merge($brandLogos, $brandLogos, $brandLogos);
                    foreach ($tripleLogos as $b): 
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
                    <div class="del-eyebrow">BE FOUND BY THE CORRECT PEOPLE &bull; GENERATE BETTER LEADS &bull; GROW ORGANICALLY</div>
                    <h2 class="del-section-title" style="text-align: left;">
                        SEO Services in Delhi That Turn Search Visibility Into <span class="accent">Business Growth!<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h2>
                    <p class="del-narrative-lead">
                        Your customers are looking for your products and services. The challenge is to make sure that they find your business, not your competitors.
                    </p>
                    <p class="del-narrative-sub">
                        We at WebTecMart offer SEO Services in Delhi that are optimized to deliver results and enhance your search performance, to ensure that you reach the right people in the right manner with your web pages and that they are transformed into enquiries and customers.
                    </p>
                    <p class="del-narrative-sub">
                        Technical SEO, Keyword Optimisation, Content, Local SEO, and Authority Building are just some of the strategies we will develop in line with your business, your audience and your growth goals. From local businesses in Delhi to growing businesses in Delhi NCR, e-commerce firms to businesses looking to reach customers beyond our borders in India, we develop SEO strategies that promote sustainable growth.
                    </p>

                    <h3 style="font-size: 1.05rem; font-weight: 800; color: #111827; margin: 24px 0 10px;">What makes WebTecMart the perfect SEO choice?</h3>
                    <div class="del-why-grid">
                        <div class="del-why-card">
                            <div class="del-why-icon">📍</div>
                            <div class="del-why-text">Delhi-focused SEO strategies tailored to your market, audience and competition</div>
                        </div>
                        <div class="del-why-card">
                            <div class="del-why-icon">🔍</div>
                            <div class="del-why-text">One-stop search optimization for the search engines.</div>
                        </div>
                        <div class="del-why-card">
                            <div class="del-why-icon">🎯</div>
                            <div class="del-why-text">Keyword- and search-intent-based approaches that draw in relevant traffic</div>
                        </div>
                        <div class="del-why-card">
                            <div class="del-why-icon">📝</div>
                            <div class="del-why-text">Content optimization that helps with rankings and provides useful information for users.</div>
                        </div>
                        <div class="del-why-card">
                            <div class="del-why-icon">📊</div>
                            <div class="del-why-text">Clear reporting to know what is getting better and why</div>
                        </div>
                        <div class="del-why-card">
                            <div class="del-why-icon">🏆</div>
                            <div class="del-why-text">13+ years of digital experience across SEO, content, websites and digital marketing</div>
                        </div>
                    </div>

                    <div style="margin-bottom: 24px; padding: 14px 18px; background: #FFF5FA; border-left: 3px solid #C4007A; border-radius: 8px; font-weight: 700; color: #C4007A; font-size: 0.94rem;">
                        💡 Getting better rankings is just the start. It's really about improving the business results.
                    </div>

                    <div style="display: flex; gap: 14px; flex-wrap: wrap;">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Take Advantage of Complimentary Website Analysis</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                        <a href="tel:+919999674255" class="del-btn-secondary">
                            <span>Call +91-9999674255</span>
                        </a>
                    </div>
                </div>

                <!-- Right: Authentic Google SERP Live Ranking Showcase (Keyword: Spring sourcing fair 2027) -->
                <div class="del-narrative-right" data-framer-reveal="slide-right">
                    <div class="del-serp-browser-showcase">
                        <div class="del-browser-chrome">
                            <div class="del-browser-dots">
                                <span class="dot red"></span>
                                <span class="dot yellow"></span>
                                <span class="dot green"></span>
                            </div>
                            <div class="del-browser-search-bar">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#C4007A" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                                <span>google.com/search?q=spring+sourcing+fair+2027</span>
                                <span class="lock-icon">🔒</span>
                            </div>
                        </div>

                        <div class="del-browser-viewport">
                            <img src="<?= htmlspecialchars($springSerpImage) ?>" alt="Google Search Spring Sourcing Fair 2027 IHGF Delhi Fair #1 Ranking WebTecMart" class="del-browser-serp-img" loading="lazy">
                            
                            <div class="del-serp-float-badge badge-top">
                                <span class="pulse-dot"></span>
                                <span>#1 Organic Rank &bull; IHGF Delhi Fair</span>
                            </div>
                            <div class="del-serp-float-badge badge-bottom">
                                <span>🏆 Verified Client Google Ranking</span>
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
                    <div class="del-eyebrow">KEY TAKEAWAYS</div>
                    <h2 class="del-section-title" style="text-align: left;">
                        SEO Services in Delhi <span class="accent">at a Glance<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h2>
                    <p style="font-size: 0.98rem; line-height: 1.64; color: #4B5563; margin-bottom: 20px;">
                        A good SEO approach ought to do greater than just ranking better. It should draw the intended audience to your business, gain trust and create measurable opportunities.
                    </p>

                    <h3 style="font-size: 1rem; font-weight: 800; color: #111827; margin: 0 0 14px;">Our SEO Services include the following:</h3>

                    <div class="del-takeaways-checklist">
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Technical SEO to boost website performance, crawlability and search accessibility</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>On-page SEO focused on keywords, search intent, content, headings, metadata and internal linking</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Local SEO to attract customers looking for services in Delhi and the surrounding areas</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Authorities building and off page SEO support to boost the credibility of your website.</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Optimizing content for attracting relevant organic traffic.</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Ecommerce SEO for better product and category visibility in search.</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Keyword Research based on search volume and competition, relevance and user intent</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Business SEO strategies for Delhi, Delhi NCR, India and international market.</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Continual performance monitoring and optimisation as search behaviour changes</span>
                        </div>
                        <div class="del-takeaway-item">
                            <span class="chk">✓</span>
                            <span>Adapting to the evolving search landscape and user behaviour with AI-ready strategies.</span>
                        </div>
                    </div>

                    <!-- Our SEO Approach Flow -->
                    <div class="del-approach-banner">
                        <div class="del-approach-title">Our SEO Approach</div>
                        <div class="del-approach-flow">
                            <span>Research</span> <span class="arrow">&rarr;</span>
                            <span>Strategy</span> <span class="arrow">&rarr;</span>
                            <span>Optimisation</span> <span class="arrow">&rarr;</span>
                            <span>Content</span> <span class="arrow">&rarr;</span>
                            <span>Authority</span> <span class="arrow">&rarr;</span>
                            <span>Measurement</span> <span class="arrow">&rarr;</span>
                            <span>Growth</span>
                        </div>
                        <div style="font-size: 0.85rem; color: #4B5563; margin-top: 6px;">
                            SEO is an ongoing process. Performance is analysed on a regular basis and the strategy is continually improved and fine-tuned to ensure your website continues to go in the right direction.
                        </div>
                    </div>

                    <div style="margin-top: 24px;">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Watch the Journey to Higher Rankings</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
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
         WHAT WE OFFER (6 Core SEO Offerings)
         ======================================================== -->
    <section class="del-offers-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">WHAT WE OFFER</div>
                <h2 class="del-section-title">
                    Comprehensive SEO Services That Turn <span class="accent">Search Visibility Into Revenue<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    From technical architecture to local rankings, content strategy, high-authority link acquisition, and AI-search visibility. Discover what's included in our SEO solutions:
                </p>
            </div>

            <div class="del-offers-grid">
                <!-- 1. Technical SEO -->
                <a href="/technical-seo.php" class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/></svg>
                    </div>
                    <h3>Technical SEO</h3>
                    <p>We enhance the performance of your site by addressing crawling, indexing, Core Web Vitals, server response times, and architecture to ensure search bots navigate effortlessly.</p>
                    <span class="del-offer-link">Explore Technical SEO &rarr;</span>
                </a>

                <!-- 2. On-Page Optimization -->
                <a href="/on-page-seo.php" class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2"/><line x1="3" x2="21" y1="9" y2="9"/><line x1="9" x2="9" y1="21" y2="9"/></svg>
                    </div>
                    <h3>On-Page Optimization</h3>
                    <p>Content without optimization cannot perform. We optimize title tags, meta descriptions, header structures (H1-H6), internal linking, and semantic keyword relevance.</p>
                    <span class="del-offer-link">Explore On-Page SEO &rarr;</span>
                </a>

                <!-- 3. Keyword Research & Strategy -->
                <a href="/keyword-research.php" class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    </div>
                    <h3>Keyword Research &amp; Strategy</h3>
                    <p>Searching for the appropriate keywords will guide users straight to your site. We dissect intent, competition, and search volume to capture high-value buyer searches.</p>
                    <span class="del-offer-link">Explore Keyword Research &rarr;</span>
                </a>

                <!-- 4. Local SEO & Google Maps -->
                <a href="/local-seo.php" class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <h3>Local SEO &amp; Google 3-Pack</h3>
                    <p>Dominate Google Maps across Delhi, Noida, Gurgaon, and NCR. Optimize your Google Business Profile, citations, reviews, and proximity signals to drive nearby calls.</p>
                    <span class="del-offer-link">Explore Local SEO &rarr;</span>
                </a>

                <!-- 5. Off-Page & Authority Link Building -->
                <a href="/off-page-seo.php" class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                    </div>
                    <h3>High-Authority Link Building</h3>
                    <p>Earn high-authority editorial backlinks and digital PR citations from verified Indian media and industry portals that supercharge domain trust.</p>
                    <span class="del-offer-link">Explore Off-Page SEO &rarr;</span>
                </a>

                <!-- 6. AI-Ready SEO Strategies -->
                <a href="/ai-seo-strategy.php" class="del-offer-card" data-framer-reveal="fade-up">
                    <div class="del-offer-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z"/></svg>
                    </div>
                    <h3>AI-Ready SEO (AEO &amp; GEO)</h3>
                    <p>Position your brand prominently within Google AI Overviews, Perplexity, Gemini, and ChatGPT search recommendations through structured entity data.</p>
                    <span class="del-offer-link">Explore AI-Ready SEO &rarr;</span>
                </a>
            </div>

        </div>
    </section>

    <!-- ========================================================
         4. WHY SEO EFFORTS FALL SHORT (3x2 Challenge Grid)
         ======================================================== -->
    <section class="del-challenges-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">SEO CHALLENGES</div>
                <h2 class="del-section-title">
                    What is Holding Your Site Back in <span class="accent">Google Search?<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    There are several common SEO challenges that businesses in Delhi encounter. Delhi is among the most competitive business hub in India. Whether it's a local service provider or a start-up, or a reputable brand or an e-commerce company, businesses are vying for the same search audience. Having a website is not sufficient: Your website has to be optimised for the right keywords, have valuable content, a solid technical underpinning, a good user experience and also a website strategy that aligns with your customers' search intent.
                </p>
            </div>

            <div class="del-challenges-grid">
                <div class="del-challenge-card" data-framer-reveal="fade-up">
                    <div class="del-challenge-icon">⚡</div>
                    <h3>Intense Local Competition</h3>
                    <p>Firms fight it out for exposure in Google Search and Google Maps in Delhi. A basic SEO campaign can't be sufficient to beat the competition from other companies that are aimed at the same audience as you are. We define your competitors, learn about their search footprint and create a strategy based on what's possible in your market.</p>
                </div>

                <div class="del-challenge-card" data-framer-reveal="fade-up">
                    <div class="del-challenge-icon">📉</div>
                    <h3>Low or Irrelevant Organic Traffic</h3>
                    <p>Getting visitors does not equal getting prospective customers. When you get visitors to your site that don't want to buy your products or services, you can get more visitors and no more enquiries or sales. We pay special attention to relevant keywords and search intent to get visitors that are more likely to take action.</p>
                </div>

                <div class="del-challenge-card" data-framer-reveal="fade-up">
                    <div class="del-challenge-icon">🎯</div>
                    <h3>Poor Keyword Targeting</h3>
                    <p>Competing for high-ranking keywords that don't have the proper intent, meaning, or business value can be a waste of time and resources. By leveraging our keyword research, we discover opportunities throughout commercial, transactional, informational and local searches to build a more effective SEO strategy.</p>
                </div>

                <div class="del-challenge-card" data-framer-reveal="fade-up">
                    <div class="del-challenge-icon">📍</div>
                    <h3>Weak Local Search Visibility</h3>
                    <p>Local visibility is important if your customers are looking for services in their vicinity. Optimising your website and local search visibility to ensure your business is found in relevant local searches in Delhi and Delhi NCR.</p>
                </div>

                <div class="del-challenge-card" data-framer-reveal="fade-up">
                    <div class="del-challenge-icon">⚙️</div>
                    <h3>Technical SEO Problems</h3>
                    <p>Slow pages, broken links, poor website structure, indexing problems, duplicate content and weak internal linking can impact the understanding and crawling of your website by search engines. We will assess these areas in our technical SEO process and look at the ways we can improve them to make your website's search foundation stronger.</p>
                </div>

                <div class="del-challenge-card" data-framer-reveal="fade-up">
                    <div class="del-challenge-icon">💰</div>
                    <h3>Overdependence on Paid Advertising</h3>
                    <p>When it comes to paid advertising, you can get instant exposure, but it's at a price. With SEO, you can create an organic traffic stream that can keep bringing visibility after your optimisation efforts. We support businesses to achieve a healthier balance of paid and organic acquisition.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 36px;" data-framer-reveal="fade-up">
                <p style="font-size: 1.05rem; font-weight: 700; color: #111827; margin-bottom: 16px;">Don't let your competitors take the searches that should belong to your business.</p>
                <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                    <span>Request a Free SEO Audit</span>
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

            <div class="del-section-head" data-framer-reveal="fade-up" style="margin-bottom: 36px;">
                <div class="del-eyebrow">THE PEOPLE BEHIND YOUR SEO GROWTH</div>
                <h2 class="del-section-title">
                    Meet the Experts Behind <span class="accent">WebTecMart SEO<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p style="font-size: 1.05rem; font-weight: 700; color: #C4007A; margin-top: 6px;">
                    Strategy, SEO, Content and Technical Expertise — Working Together
                </p>
                <p class="del-section-sub">
                    To win at SEO you need more than publishing keywords or link building. We deliver sustainable search growth by leveraging SEO strategy, technical optimisation, content expertise and digital experience. Its goal is to enhance your local presence in Delhi, expand your reach across India or even globally, and our strategy starts from understanding your business and concludes with tangible optimisation.
                </p>
            </div>

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
                            <div class="val">13+</div>
                            <div class="lbl">Years Industry Experience</div>
                        </div>
                        <div class="del-fstat-item">
                            <div class="val">1000+</div>
                            <div class="lbl">Projects &amp; Businesses Served</div>
                        </div>
                        <div class="del-fstat-item">
                            <div class="val">95%</div>
                            <div class="lbl">Client Retention</div>
                        </div>
                        <div class="del-fstat-item">
                            <div class="val">100%</div>
                            <div class="lbl">Dedicated Project Support</div>
                        </div>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; gap: 12px;">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Discuss It With an SEO Specialist</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                        <a href="tel:+919999674255" class="del-btn-secondary" style="border-color: #C4007A; color: #C4007A !important;">
                            <span>Call: +91-9999674255</span>
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
                                <span class="badge-dot"></span> Performance Strategist
                            </div>
                        </div>
                        <h4 class="del-founder-name-tag"><?= htmlspecialchars($founderName) ?></h4>
                        <div class="del-founder-role-tag"><?= htmlspecialchars($founderRole) ?></div>
                        <p class="del-founder-bio">
                            Strong SEO comes from combining the right people, processes and expertise. Focused on aligning technical search architecture with high-converting customer pipeline across Delhi NCR and international markets.
                        </p>
                    </div>
                </div>
            </div>

            <!-- 3 Core Expert Pillars -->
            <div class="del-expert-pillars" data-framer-reveal="fade-up">
                <div class="del-expert-pillar-card">
                    <div class="del-ep-icon">⚙️</div>
                    <h4>SEO Strategy &amp; Technical Expertise</h4>
                    <p>Our SEO experts specialize in keyword strategy, technical audits, competitor analysis, website structure and performance optimization to build a solid foundation for organic growth.</p>
                </div>

                <div class="del-expert-pillar-card">
                    <div class="del-ep-icon">📝</div>
                    <h4>Content &amp; Search Optimisation</h4>
                    <p>Our content team produces useful, search optimized content that's aligned to user intent, keyword opportunities and your brand's expertise — empowering your website to offer actual value and boost search visibility at the same time.</p>
                </div>

                <div class="del-expert-pillar-card">
                    <div class="del-ep-icon">🚀</div>
                    <h4>Digital Growth Support</h4>
                    <p>SEO is best suited when it is integrated with the broader digital landscape. Our team has SEO, content, website development and digital marketing skills to build a more interconnected growth strategy.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- ========================================================
         6. OUR PROCESS (6-Step SEO Process in Delhi)
         ======================================================== -->
    <section class="del-process-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">OUR PROCESS</div>
                <h2 class="del-section-title">
                    How Our SEO Services in Delhi Turn <span class="accent">Strategy Into Results<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Businesses should consider using a centralized and data-driven process around a business. Each business has its own set of customers, competition and goals for growth. Which is why we don't adhere to a single size fits all SEO. We begin by finding out where you're at and create a plan that shows you how to get to where you want to be.
                </p>
            </div>

            <div class="del-process-grid">
                <div class="del-process-card" data-framer-reveal="fade-up">
                    <div class="del-process-num">01</div>
                    <h3>Research &amp; Discovery</h3>
                    <p>We start with knowing your business, your audience, your competition and your online presence. Our research includes keyword analysis, competitor research, search intent and an in-depth website review.</p>
                </div>

                <div class="del-process-card" data-framer-reveal="fade-up">
                    <div class="del-process-num">02</div>
                    <h3>SEO Audit &amp; Analysis</h3>
                    <p>We find technical problems, content gaps, ranking opportunities, website structure issues and areas that could be hindering your organic visibility.</p>
                </div>

                <div class="del-process-card" data-framer-reveal="fade-up">
                    <div class="del-process-num">03</div>
                    <h3>Strategy &amp; Roadmap</h3>
                    <p>Based on our findings, we develop an individual SEO roadmap that covers technical SEO, on-page optimization, content, authority building and local SEO.</p>
                </div>

                <div class="del-process-card" data-framer-reveal="fade-up">
                    <div class="del-process-num">04</div>
                    <h3>SEO Implementation</h3>
                    <p>We put the strategy into action by improving website structure, metadata, content, internal links, technical elements and other priority areas.</p>
                </div>

                <div class="del-process-card" data-framer-reveal="fade-up">
                    <div class="del-process-num">05</div>
                    <h3>Content &amp; Authority Building</h3>
                    <p>We develop and fine-tune material that is relevant to your niche and nurture ongoing efforts in authority building that will bolster your website's search ranking.</p>
                </div>

                <div class="del-process-card" data-framer-reveal="fade-up">
                    <div class="del-process-num">06</div>
                    <h3>Measure, Refine &amp; Grow</h3>
                    <p>SEO is an ongoing process. We track performance metrics like rankings, organic traffic, visibility in search results, and more, to see what's performing well and where there's room for improvement.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         7. INDUSTRY EXPERTISE (8 Industries Across Delhi NCR)
         ======================================================== -->
    <section class="del-industries-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">OUR INDUSTRY EXPERTISE</div>
                <h2 class="del-section-title">
                    SEO Services for Businesses Across <span class="accent">Delhi &amp; Delhi NCR<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Industry-specific SEO Strategies. All industries have a different type of customer, search behaviour, and competition. Our SEO strategies are adapted to the way your audience searches and the goals of your business.
                </p>
            </div>

            <div class="del-industries-grid">
                <div class="del-industry-card" data-framer-reveal="fade-up">
                    <div class="del-ind-icon">🛒</div>
                    <h3>E-commerce &amp; Online Stores</h3>
                    <p>Enhance product, category and commercial search visibility and draw in customers who are actively seeking to purchase.</p>
                </div>

                <div class="del-industry-card" data-framer-reveal="fade-up">
                    <div class="del-ind-icon">🏢</div>
                    <h3>Real Estate &amp; Property</h3>
                    <p>Connect with buyers, investors and tenants looking for properties, locations and real estate services online.</p>
                </div>

                <div class="del-industry-card" data-framer-reveal="fade-up">
                    <div class="del-ind-icon">✈️</div>
                    <h3>Travel &amp; Tourism</h3>
                    <p>Create awareness for destination, travel, hotel, experience and tourism-related searches.</p>
                </div>

                <div class="del-industry-card" data-framer-reveal="fade-up">
                    <div class="del-ind-icon">🚗</div>
                    <h3>Automotive &amp; Auto Parts</h3>
                    <p>Reach prospects who are looking for Cars, Services, Accessories, Parts and Automotive Solutions.</p>
                </div>

                <div class="del-industry-card" data-framer-reveal="fade-up">
                    <div class="del-ind-icon">🩺</div>
                    <h3>Healthcare &amp; Medical Services</h3>
                    <p>Establish a credible online profile and enhance the likelihood of appearing in relevant health and service-related searches.</p>
                </div>

                <div class="del-industry-card" data-framer-reveal="fade-up">
                    <div class="del-ind-icon">⚖️</div>
                    <h3>Legal &amp; Law Firms</h3>
                    <p>Connect with prospective clients seeking legal help, skills and answers in certain areas.</p>
                </div>

                <div class="del-industry-card" data-framer-reveal="fade-up">
                    <div class="del-ind-icon">💳</div>
                    <h3>Finance &amp; Insurance</h3>
                    <p>Create visibility for your financial services and insurance solutions as well as related queries.</p>
                </div>

                <div class="del-industry-card" data-framer-reveal="fade-up">
                    <div class="del-ind-icon">🎓</div>
                    <h3>Education &amp; Training</h3>
                    <p>Get in touch with students, parents and professionals looking for courses, institutions, training and education services.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 36px;" data-framer-reveal="fade-up">
                <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                    <span>Schedule a Free SEO Strategy Call Here</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
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
         8. WRAPPING UP: WHY SEO SERVICES IN DELHI MATTER
         ======================================================== -->
    <section class="del-wrap-section" data-framer-reveal="fade-up">
        <div class="del-container">
            <div class="del-wrap-card">
                <div class="del-section-head" style="margin-bottom: 24px;">
                    <div class="del-eyebrow">WRAPPING UP</div>
                    <h2 class="del-section-title">
                        Why SEO Services in Delhi Matter for Your <span class="accent">Business<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                    </h2>
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: #C4007A; margin-top: -6px;">
                        Build Visibility. Earn Trust. Generate Sustainable Growth.
                    </h3>
                </div>

                <div style="max-width: 900px; margin: 0 auto; font-size: 1.02rem; line-height: 1.7; color: #374151;">
                    <p style="margin-bottom: 18px;">
                        The digital market is extremely competitive in Delhi. There are customers who are always looking in Google for businesses, products and services &mdash; and businesses that show up at the right time have a higher chance of capturing that customer.
                    </p>
                    <p style="margin-bottom: 18px;">
                        WebTecMart offers SEO services in Delhi, which goes beyond rankings. We use technical SEO, keyword research, content optimisation, local SEO and authority building to create a search strategy that's in line with your business goals.
                    </p>
                    <div style="background: #FFF5FA; border: 1.5px solid rgba(196, 0, 122, 0.2); border-radius: 16px; padding: 20px 24px; margin-bottom: 24px;">
                        <div style="font-weight: 800; color: #111827; margin-bottom: 10px; display: flex; align-items: center; gap: 8px;">
                            <span style="color: #C4007A; font-size: 1.2rem;">📍</span>
                            <span>Target Micro-Markets Across Delhi NCR</span>
                        </div>
                        <p style="margin: 0; font-size: 0.94rem; color: #4B5563; line-height: 1.6;">
                            From the target market of <strong>Pitampura, Rohini, Dwarka, Janakpuri, South Delhi, Connaught Place, Saket, Punjabi Bagh</strong> to all of <strong>Delhi NCR</strong>, we can develop an SEO strategy that fits your target market and target audience.
                        </p>
                    </div>
                    <p style="margin-bottom: 18px; font-weight: 700; color: #111827; font-size: 1.05rem;">
                        Our goal is simple: <span style="color: #C4007A;">Make your business discoverable, build trust, and convert search visibility into growth.</span>
                    </p>
                    <p style="margin-bottom: 24px; color: #4B5563;">
                        Looking to boost your organic visibility? Book an SEO consultation at WebTecMart and find out about opportunities for your website.
                    </p>
                    <div style="text-align: center; margin-top: 28px;">
                        <a href="/contact.php" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi">
                            <span>Book Your Free SEO Consultation</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         9. FAQS ACCORDION (All 10 Questions from Document)
         ======================================================== -->
    <section class="del-faq-section">
        <div class="del-container">
            <div class="del-section-head" data-framer-reveal="fade-up">
                <div class="del-eyebrow">FREQUENTLY ASKED QUESTIONS</div>
                <h2 class="del-section-title">
                    Frequently Asked Questions About <span class="accent">SEO Services in Delhi<svg viewBox="0 0 300 6" preserveAspectRatio="none"><path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg></span>
                </h2>
                <p class="del-section-sub">
                    Clear, transparent answers to help you make an informed decision for your digital growth:
                </p>
            </div>

            <div style="max-width: 860px; margin: 0 auto;">
                <?php 
                $faqList = !empty($faqs) ? $faqs : [
                    [
                        'q' => 'What are SEO services and why does my business need them?',
                        'a' => "SEO Services increase your site's presence in search engines and make it easier for anyone who searches for your goods or services to find your site. Combating local, commercial and industry-specific searches and building a sustainable source of organic traffic for businesses in Delhi is where SEO comes into the picture."
                    ],
                    [
                        'q' => 'How long does SEO take to show results?',
                        'a' => "SEO is a long-term approach, and there is no guarantee of results, depending on your site, the competition, the industry, the keywords you're targeting and how well your site is being found in the search engines. Technical and on page optimisation can bring about changes fairly quickly, whereas building authority and targeting competitive keywords may take a longer period of time, but need consistent optimisation."
                    ],
                    [
                        'q' => 'How can Local SEO help my Delhi business?',
                        'a' => "Local SEO puts your business in front of mobile searches that are related to your area and services. It can help people find your business when they look for local products and/or services, and can help you be seen in queries that are relevant to your business."
                    ],
                    [
                        'q' => 'What does an SEO agency in Delhi actually do?',
                        'a' => "An SEO agency will be able to work on keyword research, technical SEO, on page optimisation, content optimisation, local SEO, internal linking, authority building, competitor analysis and monitoring performance. The exact approach will vary, depending on the business and goals."
                    ],
                    [
                        'q' => 'Is it possible to create leads with SEO and not traffic?',
                        'a' => "Yes. The goal of SEO isn't to bring as many visitors as possible, it's to bring the right ones. Through focusing on search intent and optimising content and calls to action, landing pages, SEO can help to drive inquiries, registrations, sales and other conversions."
                    ],
                    [
                        'q' => 'Which is better, SEO or Google Ads?',
                        'a' => "SEO isn't the same thing as Google Ads. While SEO is about long-term organic visibility, Google Ads can offer instant paid visibility. A lot of businesses leverage both of them as part of an extensive digital marketing campaign."
                    ],
                    [
                        'q' => 'How to select the Ideal SEO firm in Delhi?',
                        'a' => "Find an SEO firm that has a clear understanding of your business, is able to articulate their approach, has a business objective that is relevant to your business, has a clear reporting system and isn't promising to rank websites in the improbable. A successful SEO partner should be able to tell you not only what they'll be working on, but why it is important to your business."
                    ],
                    [
                        'q' => 'Which businesses can benefit from SEO services?',
                        'a' => "SEO can help virtually any business that has customers find it online. SEO can be beneficial for local businesses, e-commerce retailers, professional services, real estate companies, healthcare providers, educational institutions, tech companies and B2B types of companies as well."
                    ],
                    [
                        'q' => 'Does WebTecMart provide Local, National and International SEO?',
                        'a' => "Yes. WebTecMart can develop SEO strategies for businesses targeting customers locally in Delhi and Delhi NCR, across India or in international markets. The method and web design is modified based on the target market."
                    ],
                    [
                        'q' => 'What is the price of SEO services in Delhi?',
                        'a' => "The cost of SEO services varies based on website size, competition, location, keywords, content needs, and the technical complexity and business goals. WebTecMart also provides several SEO packages and will be able to design a personalised approach to suit your needs."
                    ]
                ];
                foreach ($faqList as $idx => $fq): 
                    $isActive = ($idx === 0) ? ' active' : '';
                ?>
                    <div class="del-faq-item<?= $isActive ?>" data-framer-reveal="fade-up">
                        <button class="del-faq-btn" onclick="toggleDelFaq(this)">
                            <span><?= htmlspecialchars($fq['q']) ?></span>
                            <span class="icon"><?= ($idx === 0) ? '−' : '+' ?></span>
                        </button>
                        <div class="del-faq-answer">
                            <?= nl2br(htmlspecialchars($fq['a'])) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========================================================
         10. FINAL CONVERSION CTA BANNER (User Closing Content)
         ======================================================== -->
    <section class="del-cta-section">
        <div class="del-container">
            <div class="del-cta-box" data-framer-reveal="fade-up">
                <h2>So You're Ready to Take the Plunge and <span>Grow Your Business With SEO?</span></h2>
                <h3 style="font-size: 1.2rem; font-weight: 700; color: #FCE7F3; margin: 8px 0 16px;">
                    Let's Make Your Search Visibility Business Opportunities
                </h3>
                <p>
                    From local SEO in Delhi to national SEO across India, e-commerce SEO to full-fledged organic growth, WebTecMart has you covered to create a stronger search presence. Give us a brief description of your business, website and growth objectives. We will know the opportunities and understand what we need to put our SEO strategy into.
                </p>

                <div class="del-cta-btns">
                    <button type="button" class="del-btn-primary trigger-enquiry-modal" data-service="SEO Services in Delhi" style="background: #FFFFFF !important; color: #C4007A !important; font-weight: 800; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.18);">
                        <span>Get a Free SEO Consultation</span>
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