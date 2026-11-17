<?php
$pageMeta = [
    'title' => 'Performance Marketing Services | High-ROAS Paid Ads - WebTecMart',
    'description' => 'Turn advertising spend into business growth with data-driven Google Ads, Meta Ads, LinkedIn Advertising, YouTube Ads, Display Advertising, and conversion rate optimization.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';

require_once __DIR__ . '/functions.php';
$dbService = getServiceBySlug('performance-marketing');

$serviceData = [
    'icon' => 'target',
    'title' => 'Performance Marketing',
    'heroTitle' => 'Performance Marketing Services That Turn Ad Spend Into Business Growth!',
    'heroTitleLead' => 'Performance Marketing Services That Turn Ad Spend Into ',
    'heroTitleAccent' => 'Business Growth!',
    'heroPanel' => true,
    'heroHeadline' => 'Reach the Right Audience. Generate Quality Leads. Maximize Your ROI.',
    'tagline' => 'DATA-DRIVEN CAMPAIGNS BUILT FOR MEASURABLE GROWTH',
    'showHeroBullets' => false,
    'showHeroActions' => false,
    'showPackages' => false,
    'heroDescription' => "Every advertising rupee should contribute to your business growth. At WebTecMart, we create data-driven performance marketing campaigns designed to reach potential customers, generate qualified leads, increase conversions, and maximize your return on advertising investment.\n\nOur performance marketing services combine Google Ads, Meta Ads, LinkedIn Advertising, YouTube Ads, Display Advertising, and Conversion Rate Optimization to help businesses connect with the right audience at the right time.\n\nWhether you're a startup, B2B company, e-commerce brand, or global exhibition organizer, we develop customized advertising strategies focused on measurable results and sustainable growth.",
    'overview' => "Every advertising rupee should contribute to your business growth. At WebTecMart, we create data-driven performance marketing campaigns designed to reach potential customers, generate qualified leads, increase conversions, and maximize your return on advertising investment.\n\nOur performance marketing services combine Google Ads, Meta Ads, LinkedIn Advertising, YouTube Ads, Display Advertising, and Conversion Rate Optimization to help businesses connect with the right audience at the right time.\n\nWhether you're a startup, B2B company, e-commerce brand, or global exhibition organizer, we develop customized advertising strategies focused on measurable results and sustainable growth.",

    'features' => [
        [
            'title' => 'Full-Funnel Paid Media Strategy',
            'description' => 'Cross-channel media planning aligning Google Search intent with Meta emotional engagement and YouTube video awareness.',
        ],
        [
            'title' => 'Meta Ads (Facebook & Instagram)',
            'description' => 'Audience testing, lookalike modeling, Advantage+ campaign setups, and thumb-stopping visual creatives that convert cold traffic.',
        ],
        [
            'title' => 'Google Ads & Performance Max',
            'description' => 'High-intent Search campaigns, Display remarketing, Google Shopping, and AI-powered Performance Max campaigns optimized for profit.',
        ],
        [
            'title' => 'Creative Strategy & A/B Testing',
            'description' => 'Continuous creative testing across hooks, headlines, visual formats (UGC, statics, carousels), and offers to beat creative fatigue.',
        ],
        [
            'title' => 'Landing Page CRO & Funnels',
            'description' => 'Custom, blazing-fast landing pages designed specifically for your paid campaigns to maximize conversion rates and lower cost-per-lead.',
        ],
        [
            'title' => 'Advanced Attribution & Analytics',
            'description' => 'Server-side tracking (Conversions API), GA4 custom events, UTM governance, and live client reporting dashboards.',
        ],
    ],

    'benefitsTitleLead' => 'Why Choose Our ',
    'benefitsTitleAccent' => 'Performance Marketing',
    'benefitsTitleTail' => ' Services?',
    'benefitsSubtitle' => 'A strategic, measurable approach that helps your campaigns reach the right people and turn advertising investment into business outcomes.',
    'benefits' => [
        [
            'icon' => 'trending',
            'title' => 'ROI-Driven Strategies',
            'desc' => 'Every campaign is designed to maximize advertising returns and deliver measurable business growth.',
        ],
        [
            'icon' => 'target',
            'title' => 'Precision Audience Targeting',
            'desc' => 'Reach the right customers at the right time through intent-based targeting and audience insights.',
        ],
        [
            'icon' => 'check',
            'title' => 'Conversion-Focused Campaigns',
            'desc' => 'We focus on generating qualified leads, increasing conversions, and driving real business outcomes.',
        ],
        [
            'icon' => 'dollar',
            'title' => 'Smart Budget Optimization',
            'desc' => 'Make every advertising rupee count with strategic budget allocation and continuous performance monitoring.',
        ],
        [
            'icon' => 'megaphone',
            'title' => 'Multi-Platform Advertising Expertise',
            'desc' => 'Integrated advertising strategies across Google Ads, Meta Ads, LinkedIn Ads, and other digital platforms.',
        ],
        [
            'icon' => 'search',
            'title' => 'Transparent Reporting & Analytics',
            'desc' => 'Track what matters with clear performance insights, conversion tracking, and actionable campaign reports.',
        ],
    ],
    'processEyebrow' => 'OUR PERFORMANCE MARKETING APPROACH',
    'processTitleLead' => 'Our ',
    'processTitleAccent' => 'Performance Marketing',
    'processTitleTail' => ' Approach',
    'processSubtitle' => 'A Data-Driven Process Designed for Measurable Growth',
    'process' => [
        ['step' => '01', 'title' => 'Business & Audience Analysis', 'description' => 'We understand your business objectives, target customers, competitors, advertising budget, and existing marketing performance.'],
        ['step' => '02', 'title' => 'Campaign Strategy & Media Planning', 'description' => 'We identify the most relevant advertising platforms, define audience segments, establish campaign objectives, and develop a customized media plan.'],
        ['step' => '03', 'title' => 'Campaign Setup & Creative Development', 'description' => 'We develop targeted advertisements, compelling messaging, optimized landing page recommendations, and conversion tracking infrastructure.'],
        ['step' => '04', 'title' => 'Campaign Launch & Performance Monitoring', 'description' => 'We launch campaigns and closely monitor audience engagement, click-through rates, lead generation, conversion rates, and advertising costs.'],
        ['step' => '05', 'title' => 'Continuous Optimization & Scaling', 'description' => 'We refine targeting, creatives, bidding strategies, and budget allocation to improve campaign efficiency and scale successful campaigns.'],
    ],
    'caseStudyTitle' => 'Performance marketing results screenshots:',
    'caseStudyBadge' => 'Google Ads Campaign Snapshot',
    'caseStudy' => [
        'client' => 'Google Ads — 62nd IHGF Delhi Fair',
        'result' => '218 Submission Leads',
        'metrics' => [
            ['val' => '20.2K', 'lbl' => 'Clicks'],
            ['val' => '218', 'lbl' => 'Submission Leads'],
            ['val' => '₹171K', 'lbl' => 'Ad Spend'],
            ['val' => '₹784', 'lbl' => 'Cost per Conversion'],
        ],
        'desc' => 'Across six campaigns, Google Ads generated 218 form submission leads from 20.2K clicks at an average cost per conversion of ₹784 (24 July–10 October 2026).',
        'link' => '/portfolio.php',
    ],
    'caseStudyScreenshots' => [
        [
            'src' => '/assets/images/performance-marketing-results-1.png',
            'alt' => 'Google Ads summary showing 20.2K clicks, 218 submission leads, ₹171K cost, and ₹784 cost per conversion.',
            'caption' => 'Google Ads performance overview · 24 July–10 October 2026',
        ],
        [
            'src' => '/assets/images/performance-marketing-results-2.png',
            'alt' => 'Google Ads campaign report for the 62nd IHGF Delhi Fair showing campaign-level results.',
            'caption' => 'Campaign-level performance · 62nd IHGF Delhi Fair',
        ],
        [
            'src' => '/assets/images/performance-marketing-results-3.png',
            'alt' => 'Google Search Console performance report for IHGF Delhi Fair.',
            'caption' => 'Organic search performance · IHGF Delhi Fair',
        ],
        [
            'src' => '/assets/images/performance-marketing-results-4.png',
            'alt' => 'Google Search Console performance report for EPCH.',
            'caption' => 'Organic search performance · EPCH',
        ],
    ],
    'featuresTitleLead' => 'Performance Marketing ',
    'featuresTitleAccent' => 'Services',
    'featuresTitleTail' => ' for Measurable Growth',
    'featuresSubtitle' => 'Google Ads, Meta Ads, LinkedIn Advertising, YouTube Ads, Display Advertising, and Conversion Rate Optimization—planned around your business goals.',
    'featureTagOne' => 'Platform-specific campaign strategy',
    'featureTagTwo' => 'Ongoing performance optimization',

    'faqs' => [
        [
            'q' => 'What is the minimum ad spend required for performance marketing?',
            'a' => 'We typically recommend a minimum monthly ad budget of ₹30,000 to ₹50,000 across platforms so algorithms have sufficient data to optimize effectively and test multiple creative variations.',
        ],
        [
            'q' => 'How do you measure campaign success?',
            'a' => 'We focus on bottom-line business metrics: Return on Ad Spend (ROAS), Cost Per Qualified Lead (CPL), Cost Per Acquisition (CPA), and Customer Lifetime Value (LTV), rather than vanity metrics like impressions or clicks.',
        ],
        [
            'q' => 'Who owns the ad accounts and creative assets?',
            'a' => 'You retain 100% ownership of your ad accounts, pixel data, landing page code, and creative assets. Everything is built inside your business infrastructure with full transparency.',
        ],
        [
            'q' => 'How quickly can campaigns be launched?',
            'a' => 'After our initial onboarding strategy session, campaigns, tracking infrastructure, and creative assets are typically live within 5 to 7 business days.',
        ],
    ],
];

$pageConfig = $dbService ? array_merge($dbService, $serviceData) : $serviceData;
$pageConfig['faqs'] = !empty($dbService['faqs']) ? $dbService['faqs'] : $serviceData['faqs'];
renderServicePageLayout($pageConfig);

require_once __DIR__ . '/app/templates/footer.php';
