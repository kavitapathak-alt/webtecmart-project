<?php
$pageMeta = [
    'title' => 'AI-Ready SEO Strategies | Google SGE & AI Overviews - WebTecMart',
    'description' => 'Future-proof your organic search presence for Google AI Overviews, Gemini, and conversational AI answer engines with WebTecMart.',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
require_once __DIR__ . '/functions.php';

$dbService = getServiceBySlug('ai-seo-strategy');

if (!$dbService) {
    // Fallback if DB row not present
    $dbService = [
        'title' => 'ai-seo-strategy',
        'slug' => 'ai-seo-strategy',
        'hero_description' => 'Future-proof your organic search presence for Google AI Overviews, Gemini, and conversational AI answer engines with WebTecMart.',
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
