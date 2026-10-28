<?php
$pageMeta = [
    'title' => 'Performance Marketing Services | High-ROAS Paid Ads - WebTecMart',
    'description' => 'Scale your business with WebTecMart performance marketing services. Data-driven Google Ads, Meta advertising, YouTube campaigns, and full-funnel CRO.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';

renderServicePageLayout([
    'icon' => 'target',
    'title' => 'Performance Marketing',
    'tagline' => 'Data-Driven Advertising Focused Relentlessly on ROAS & Revenue',
    'heroDescription' => 'Stop burning money on paid clicks that don’t convert. We engineer high-performance paid ad funnels across Google, Meta (Facebook & Instagram), LinkedIn, and YouTube with strict focus on Customer Acquisition Cost (CAC) and Return on Ad Spend (ROAS).',
    'overview' => "Modern digital advertising has evolved beyond simple boost posts and basic search ads. With rising ad costs, privacy changes, and fierce market competition, scaling profitably requires rigorous data analytics, audience segmentation, creative testing, and ruthless conversion tracking. Performance marketing means every single rupee spent must justify itself with measurable returns.

At WebTecMart, we combine quantitative media buying with psychological creative strategy. We map customer conversion funnels from top-of-funnel scroll-stopping video ads to bottom-of-funnel retargeting and dynamic offer landing pages. Over the last 13+ years, our media buyers have managed crores in ad spend, consistently beating industry benchmarks for cost-per-lead (CPL) and return on ad spend (ROAS) across startups, D2C brands, B2B software, and professional service companies.",

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

    'process' => [
        ['step' => '01', 'title' => 'Audit & Tracking Setup', 'description' => 'We audit your historical ad performance, pixel accuracy, conversion API health, and attribution models.'],
        ['step' => '02', 'title' => 'Audience & Offer Strategy', 'description' => 'We identify high-margin customer segments, craft compelling offers, and build multi-stage audience funnels.'],
        ['step' => '03', 'title' => 'Creative & Landing Page Build', 'description' => 'Our creative and development teams produce targeted ad variations and dedicated high-converting landing pages.'],
        ['step' => '04', 'title' => 'Controlled Launch', 'description' => 'Campaigns are launched with disciplined budget distribution, initial bid caps, and real-time conversion monitoring.'],
        ['step' => '05', 'title' => 'Optimization & Pruning', 'description' => 'Daily analysis to kill losing creatives, eliminate wasteful search terms, reallocate budget, and lower CPA.'],
        ['step' => '06', 'title' => 'Aggressive Scaling', 'description' => 'Scale winning ad sets vertically and horizontally while maintaining target ROAS and profitability benchmarks.'],
    ],

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
]);

require_once __DIR__ . '/app/templates/footer.php';
