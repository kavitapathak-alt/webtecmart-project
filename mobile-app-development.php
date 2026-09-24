<?php
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';

renderServicePageLayout([
    'icon' => 'trending',
    'title' => 'Performance Marketing',
    'tagline' => 'Every Rupee, Measurably Working',
    'heroDescription' => 'Data-driven campaigns across Google, Meta, and beyond — engineered for measurable ROI, lower acquisition costs, and scalable growth that your business can actually track.',
    'overview' => "Performance marketing isn't about impressions or vanity metrics — it's about results you can see in your bank account. At WebTechMart, we combine deep audience research, sharp creative, and relentless optimization to turn ad spend into predictable revenue. Over the last 13 years, we've managed crores in ad budgets across 500+ brands, consistently delivering lower CPAs and higher ROAS. Whether you're launching your first campaign or scaling a proven funnel, we build performance systems that grow with your ambition.",

    'features' => [
        [
            'title' => 'Google Ads (PPC)',
            'description' => 'Search, Display, Shopping, and YouTube campaigns engineered for high-intent buyers and maximum return on ad spend.',
        ],
        [
            'title' => 'Meta Ads (Facebook & Instagram)',
            'description' => 'Full-funnel campaigns — from cold audience awareness to retargeting — built for scale, precision, and creative testing.',
        ],
        [
            'title' => 'Landing Page & CRO',
            'description' => 'High-converting landing pages and continuous conversion rate optimization to squeeze more value from every click.',
        ],
        [
            'title' => 'Analytics & Tracking',
            'description' => 'GA4, Meta Pixel, and server-side tracking setup so every rupee spent is measurable and every decision is data-backed.',
        ],
        [
            'title' => 'Retargeting & Funnels',
            'description' => 'Smart retargeting sequences that re-engage warm audiences and turn abandoned interest into repeat customers.',
        ],
        [
            'title' => 'A/B Testing & Scaling',
            'description' => 'Continuous creative and copy testing to find winners, kill losers, and scale what actually drives revenue.',
        ],
    ],

    'process' => [
        ['step' => '01', 'title' => 'Research', 'description' => 'We study your audience, competitors, and current funnel to identify exactly where the biggest growth opportunities lie.'],
        ['step' => '02', 'title' => 'Strategy', 'description' => 'We map out channels, budgets, messaging, and KPIs — building a clear roadmap tied to your revenue goals.'],
        ['step' => '03', 'title' => 'Setup',    'description' => 'We build campaigns, creatives, landing pages, and tracking infrastructure so nothing is left to guesswork.'],
        ['step' => '04', 'title' => 'Launch',   'description' => 'Campaigns go live with tight monitoring — we track every click, conversion, and cost-per-acquisition in real time.'],
        ['step' => '05', 'title' => 'Optimize', 'description' => 'We continuously test creatives, audiences, and bids — cutting waste and doubling down on what performs best.'],
        ['step' => '06', 'title' => 'Scale',    'description' => 'Once we find winning combinations, we scale spend profitably while keeping ROAS and CPA firmly in control.'],
    ],

    'faqs' => [
        [
            'q' => 'What is performance marketing?',
            'a' => 'Performance marketing is a results-driven approach where every campaign is measured against clear KPIs — clicks, leads, sales, or ROAS. Unlike brand awareness campaigns, you pay for measurable outcomes, not just impressions.',
        ],
        [
            'q' => 'What platforms do you run ads on?',
            'a' => 'Primarily Google Ads (Search, Display, Shopping, YouTube), Meta Ads (Facebook & Instagram), and LinkedIn. We also handle programmatic, native ads, and marketplace ads depending on your goals.',
        ],
        [
            'q' => 'What is the minimum ad budget required?',
            'a' => 'It depends on your industry and goals. For most small businesses, we recommend starting with at least ₹30,000–₹50,000/month in ad spend, plus our management fee, to gather meaningful data fast.',
        ],
        [
            'q' => 'How soon can I see results?',
            'a' => 'Initial data comes within the first 7–14 days. Meaningful optimization and stable ROAS typically take 4–8 weeks as we gather enough data to refine targeting and creatives.',
        ],
        [
            'q' => 'How do you report performance?',
            'a' => 'You get a transparent dashboard plus weekly/monthly reports showing spend, clicks, conversions, CPA, ROAS, and clear next-step recommendations — no vanity metrics, no fluff.',
        ],
        [
            'q' => 'Do you charge a fixed fee or a percentage of ad spend?',
            'a' => "We offer both models — a fixed monthly retainer or a percentage of ad spend (typically 10–20%). We'll recommend whichever suits your scale and goals best.",
        ],
    ],
]);

require_once __DIR__ . '/app/templates/footer.php';