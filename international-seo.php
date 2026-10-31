<?php
$pageMeta = [
    'title' => 'International SEO Services | Global Multilingual Search - WebTecMart',
    'description' => 'Capture global trade buyers and international consumers across the US, UK, UAE, and Europe with hreflang and international SEO.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

$dbService = getServiceBySlug('international-seo');

if (!$dbService) {
    // Fallback if DB row not present
    $dbService = [
        'title' => 'international-seo',
        'slug' => 'international-seo',
        'hero_description' => 'Capture global trade buyers and international consumers across the US, UK, UAE, and Europe with hreflang and international SEO.',
    ];
}

renderServicePageLayout(array_merge($dbService, [
    'heroDescription' => $dbService['hero_description'] ?? ($dbService['summary'] ?? ''),
    'overview' => $dbService['body'] ?? ($dbService['overview'] ?? ''),
    'features' => !empty($dbService['features']) ? $dbService['features'] : [],
    'process' => !empty($dbService['process']) ? $dbService['process'] : [],
    'faqs' => !empty($dbService['faqs']) ? $dbService['faqs'] : [],
]));

renderFooterSection();
