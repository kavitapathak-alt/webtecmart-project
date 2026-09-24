<?php
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';

renderServicePageLayout([
    'icon' => 'sparkles',
    'title' => 'Digital Business Branding',
    'tagline' => 'Build a Brand That Sticks',
    'heroDescription' => 'From logo design to complete brand identity systems, we help businesses stand out in a crowded digital marketplace with strategy-backed branding that drives recognition, trust, and loyalty.',
    'overview' => "A digital business only grows when it's positioned the right way. Branding sits at the heart of that growth, and our marketing experts craft well-framed campaigns that build a strong, memorable identity for your brand. Over the last 13 years, we've helped 1000+ businesses transform their brand presence from forgettable to unforgettable — combining deep market research, creative design, and data-driven strategy. Whether you're a startup launching your first brand or an established company planning a rebrand, we deliver identity systems that scale with your ambition.",

    'features' => [
        [
            'title' => 'Brand Strategy',
            'description' => 'Deep research and positioning that defines who you are, who you speak to, and why customers should choose you over the competition.',
        ],
        [
            'title' => 'Visual Identity',
            'description' => 'Logos, color palettes, typography and brand guidelines that stay consistent across every digital and print touchpoint.',
        ],
        [
            'title' => 'Brand Messaging',
            'description' => 'Tone of voice, taglines, and copy frameworks that make your brand instantly recognizable and memorable.',
        ],
        [
            'title' => 'Rebranding',
            'description' => 'Refresh an outdated identity without losing the brand equity you have built over the years.',
        ],
        [
            'title' => 'Brand Guidelines',
            'description' => 'A complete documentation of your brand rules — usage, spacing, color codes — so your team stays consistent everywhere.',
        ],
        [
            'title' => 'Packaging & Print',
            'description' => 'Business cards, packaging, brochures and stationery designed to reflect your brand personality.',
        ],
    ],

    'process' => [
        ['step' => '01', 'title' => 'Discovery', 'description' => 'We learn your business, audience, competitors, and goals inside out through detailed research and stakeholder interviews.'],
        ['step' => '02', 'title' => 'Strategy',  'description' => 'We map out positioning, competitors, brand voice and creative direction that sets you apart.'],
        ['step' => '03', 'title' => 'Design',    'description' => 'We craft the visual and verbal identity of your brand — logo, colors, fonts, and messaging.'],
        ['step' => '04', 'title' => 'Refine',    'description' => 'We iterate based on your feedback until every element feels perfectly aligned with your vision.'],
        ['step' => '05', 'title' => 'Delivery',  'description' => 'You receive a complete, ready-to-use brand kit with source files and detailed guidelines.'],
        ['step' => '06', 'title' => 'Support',   'description' => 'We stay available for brand consultations and roll-out support as you launch.'],
    ],

    'faqs' => [
        ['q' => 'How long does a branding project take?',                'a' => 'Typically 3–6 weeks depending on scope, number of revisions, and how quickly feedback is provided. Larger rebrands with multiple sub-brands may take longer.'],
        ['q' => 'Do I get the source files?',                            'a' => 'Yes, absolutely. All source files (AI, PSD, Figma), brand guidelines PDF, and exported assets are fully handed over to you.'],
        ['q' => 'What if I already have a logo but need a full identity?', 'a' => 'Perfect — we can build a complete visual identity system around your existing logo, or refine it if needed.'],
        ['q' => 'Do you help with brand rollout?',                       'a' => 'Yes, we assist with applying your new identity across your website, social media, packaging, and other touchpoints.'],
        ['q' => 'How much does branding cost?',                          'a' => 'Pricing depends on scope — a simple logo project vs. a full rebrand. Contact us for a free consultation and custom quote.'],
    ],
]);

require_once __DIR__ . '/app/templates/footer.php';