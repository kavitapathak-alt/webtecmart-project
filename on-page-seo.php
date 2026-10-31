<?php
$pageMeta = [
    'title' => 'On-Page SEO Services | Search Intent & Content Optimization - WebTecMart',
    'description' => 'Align headings, metadata, internal link siloing, and search intent with WebTecMart expert On-Page SEO optimization services.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

$dbService = getServiceBySlug('on-page-seo');

if (!$dbService) {
    // Fallback if DB row not present
    $dbService = [
        'title' => 'on-page-seo',
        'slug' => 'on-page-seo',
        'hero_description' => 'Align headings, metadata, internal link siloing, and search intent with WebTecMart expert On-Page SEO optimization services.',
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
