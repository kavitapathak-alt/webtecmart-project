<?php
$pageMeta = [
    'title' => 'National SEO Services | Pan-India Organic Dominance - WebTecMart',
    'description' => 'Scale search visibility across metro cities and national markets across India with WebTecMart competitive national SEO campaigns.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

$dbService = getServiceBySlug('national-seo');

if (!$dbService) {
    // Fallback if DB row not present
    $dbService = [
        'title' => 'national-seo',
        'slug' => 'national-seo',
        'hero_description' => 'Scale search visibility across metro cities and national markets across India with WebTecMart competitive national SEO campaigns.',
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
