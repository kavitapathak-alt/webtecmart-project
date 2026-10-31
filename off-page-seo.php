<?php
$pageMeta = [
    'title' => 'Off-Page SEO Services | Editorial Backlinks & Authority Building - WebTecMart',
    'description' => 'Build rock-solid domain authority with WebTecMart 100% white-hat off-page SEO, editorial backlinks, and digital PR outreach.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

$dbService = getServiceBySlug('off-page-seo');

if (!$dbService) {
    // Fallback if DB row not present
    $dbService = [
        'title' => 'off-page-seo',
        'slug' => 'off-page-seo',
        'hero_description' => 'Build rock-solid domain authority with WebTecMart 100% white-hat off-page SEO, editorial backlinks, and digital PR outreach.',
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
