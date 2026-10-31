<?php
$pageMeta = [
    'title' => 'Content Optimization Services | E-E-A-T & Helpful Content - WebTecMart',
    'description' => 'Transform your website copy into high-ranking, helpful content that satisfies Google algorithms and drives customer inquiries.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

$dbService = getServiceBySlug('content-optimization');

if (!$dbService) {
    // Fallback if DB row not present
    $dbService = [
        'title' => 'content-optimization',
        'slug' => 'content-optimization',
        'hero_description' => 'Transform your website copy into high-ranking, helpful content that satisfies Google algorithms and drives customer inquiries.',
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
