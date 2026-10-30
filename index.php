<?php
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/components/sections/HeroSection.php';
require_once __DIR__ . '/app/components/sections/TrustedPartnersSection.php';
require_once __DIR__ . '/app/components/sections/AboutBrandSection.php';
require_once __DIR__ . '/app/components/sections/WhatWeDoSection.php';
require_once __DIR__ . '/app/components/sections/SearchVisibilitySection.php';
require_once __DIR__ . '/app/components/sections/SeoSuccessStoriesSection.php';
require_once __DIR__ . '/app/components/sections/TestimonialsSection.php';
require_once __DIR__ . '/app/components/sections/BlogSection.php';
require_once __DIR__ . '/app/components/sections/ContactFormSection.php';
require_once __DIR__ . '/app/components/sections/FooterSection.php';
?>

<main class="wtm-site-main">
    <?php renderHeroSection(); ?>

    <?php renderTrustedPartnersSection(); ?>

    <?php renderAboutBrandSection(); ?>

    <?php renderWhatWeDoSection(); ?>

    <?php renderSearchVisibilitySection(); ?>

    <?php renderSeoSuccessStoriesSection(); ?>

    <?php renderTestimonialsSection(); ?>

    <?php renderBlogSection(); ?>

    <?php renderContactFormSection(); ?>
</main>

<?php renderFooterSection(); ?>
