<?php
$pageMeta = [
    'title' => 'Keyword Research Services | Search Intent & Competitor Intelligence - WebTecMart',
    'description' => 'Uncover high-intent commercial queries and competitive search gaps with WebTecMart data-backed keyword research services.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

$dbService = getServiceBySlug('keyword-research');

if (!$dbService) {
    // Fallback if DB row not present
    $dbService = [
        'title' => 'keyword-research',
        'slug' => 'keyword-research',
        'hero_description' => 'Uncover high-intent commercial queries and competitive search gaps with WebTecMart data-backed keyword research services.',
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
