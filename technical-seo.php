<?php
$pageMeta = [
    'title' => 'Technical SEO Services | Speed, Crawlability & Web Vitals - WebTecMart',
    'description' => 'Fix crawl bottlenecks, Core Web Vitals, mobile indexing, and schema markup with WebTecMart comprehensive Technical SEO services.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

$dbService = getServiceBySlug('technical-seo');

if (!$dbService) {
    // Fallback if DB row not present
    $dbService = [
        'title' => 'technical-seo',
        'slug' => 'technical-seo',
        'hero_description' => 'Fix crawl bottlenecks, Core Web Vitals, mobile indexing, and schema markup with WebTecMart comprehensive Technical SEO services.',
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
