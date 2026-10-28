<?php
$pageMeta = [
    'title' => 'HTML Sitemap | Complete Directory - WebTecMart Digital',
    'description' => 'Explore the complete directory of WebTecMart website pages, digital marketing services, SEO offerings, case studies, and blog articles.',
];
require_once __DIR__ . '/app/templates/header.php';
$recentPosts = blogPosts();
?>

<style>
.sm-hero {
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 50%, var(--primary-light) 100%);
    color: #fff;
    padding: 70px 0 80px;
    text-align: center;
}
.sm-wrap {
    max-width: 1200px;
    margin: -40px auto 80px;
    padding: 0 20px;
    position: relative;
    z-index: 2;
}
.sm-card {
    background: #fff;
    border-radius: 24px;
    padding: 32px 28px;
    box-shadow: 0 15px 40px rgba(196, 0, 122, 0.08);
    border: 1px solid var(--border-soft);
    height: 100%;
}
.sm-title {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--deep);
    margin: 0 0 18px;
    display: flex;
    align-items: center;
    gap: 10px;
    border-bottom: 2px solid var(--border-soft);
    padding-bottom: 12px;
}
.sm-title i {
    color: var(--primary);
    font-size: 1.3rem;
}
.sm-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.sm-list li {
    margin-bottom: 12px;
}
.sm-list a {
    color: #4B5563;
    font-size: 0.96rem;
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
}
.sm-list a:hover {
    color: var(--primary);
    transform: translateX(4px);
}
.sm-list a::before {
    content: "→";
    color: var(--primary-light);
    font-weight: 800;
    font-size: 0.85rem;
}
.sm-badge {
    display: inline-block;
    font-size: 0.72rem;
    font-weight: 800;
    padding: 2px 8px;
    border-radius: 50px;
    background: #fce8f3;
    color: var(--primary);
    margin-left: 6px;
    text-transform: uppercase;
}
</style>

<section class="sm-hero">
    <div class="container">
        <h1 style="font-size:clamp(2rem, 4vw, 3rem);font-weight:800;margin:0 0 10px;">Website HTML Sitemap</h1>
        <p style="font-size:1.05rem;opacity:0.9;max-width:600px;margin:0 auto;">Quickly browse all pages, core services, marketing solutions, and insights across WebTecMart.</p>
    </div>
</section>

<main class="sm-wrap">
    <div class="row g-4">
        <!-- Main Pages -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="sm-card">
                <h2 class="sm-title"><i class="bi bi-house-door-fill"></i> Main Pages</h2>
                <ul class="sm-list">
                    <li><a href="/">Home Page</a></li>
                    <li><a href="/about.php">About WebTecMart</a></li>
                    <li><a href="/services.php">All Services Overview</a></li>
                    <li><a href="/packages.php">Packages &amp; Pricing Plans</a></li>
                    <li><a href="/portfolio.php">Case Studies &amp; Portfolio</a></li>
                    <li><a href="/blogs.php">Blogs &amp; Marketing Insights</a></li>
                    <li><a href="/contact.php">Contact &amp; Free Consultation</a></li>
                </ul>
            </div>
        </div>

        <!-- Core Marketing Services -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="sm-card">
                <h2 class="sm-title"><i class="bi bi-gear-wide-connected"></i> Digital Services</h2>
                <ul class="sm-list">
                    <li><a href="/search-engine-optimization.php">Search Engine Optimization</a></li>
                    <li><a href="/website-design-development.php">Website Design &amp; Development</a></li>
                    <li><a href="/digital-business-branding.php">Digital Business Branding</a></li>
                    <li><a href="/search-engine-marketing.php">Search Engine Marketing (PPC)</a></li>
                    <li><a href="/social-media-optimization.php">Social Media Optimization (SMO)</a></li>
                    <li><a href="/mobile-app-development.php">Mobile App Development</a></li>
                    <li><a href="/content-marketing.php">Content Marketing Services</a></li>
                    <li><a href="/performance-marketing.php">Performance Marketing</a></li>
                </ul>
            </div>
        </div>

        <!-- Specialized SEO & Locations -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="sm-card">
                <h2 class="sm-title"><i class="bi bi-geo-alt-fill"></i> SEO &amp; Local Focus</h2>
                <ul class="sm-list">
                    <li><a href="/seo-services-delhi.php">Top SEO Company in Delhi NCR <span class="sm-badge">Featured</span></a></li>
                    <li><a href="/local-seo.php">Local SEO &amp; Google Map Pack</a></li>
                    <li><a href="/ecommerce-seo.php">E-Commerce Store SEO</a></li>
                    <li><a href="/service.php?slug=local-seo">Managed Local SEO Solutions</a></li>
                    <li><a href="/service.php?slug=national-seo">National SEO Campaigns</a></li>
                    <li><a href="/service.php?slug=international-seo">International &amp; Global SEO</a></li>
                    <li><a href="/service.php?slug=small-business-seo">SEO for Small Businesses</a></li>
                    <li><a href="/service.php?slug=online-reputation-management">Reputation Management (ORM)</a></li>
                </ul>
            </div>
        </div>

        <!-- Latest Blog Articles -->
        <div class="col-12 col-md-6 col-lg-8">
            <div class="sm-card">
                <h2 class="sm-title"><i class="bi bi-journal-richtext"></i> Latest Blog Articles &amp; Insights</h2>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <ul class="sm-list">
                            <?php 
                            $half = ceil(count($recentPosts) / 2);
                            for ($i = 0; $i < $half; $i++): 
                                $p = $recentPosts[$i] ?? null;
                                if (!$p) continue;
                            ?>
                                <li><a href="<?= blogUrl($p) ?>"><?= e((string) $p['title']) ?></a></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6">
                        <ul class="sm-list">
                            <?php 
                            for ($i = $half; $i < count($recentPosts); $i++): 
                                $p = $recentPosts[$i] ?? null;
                                if (!$p) continue;
                            ?>
                                <li><a href="<?= blogUrl($p) ?>"><?= e((string) $p['title']) ?></a></li>
                            <?php endfor; ?>
                            <li><a href="/blogs.php"><strong>View All Insights &rarr;</strong></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Legal & Company Policies -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="sm-card">
                <h2 class="sm-title"><i class="bi bi-shield-check"></i> Legal &amp; Policies</h2>
                <ul class="sm-list">
                    <li><a href="/privacy-policy.php">Privacy Policy</a></li>
                    <li><a href="/terms-conditions.php">Terms &amp; Conditions</a></li>
                    <li><a href="/sitemap.php">HTML Website Sitemap</a></li>
                    <li><a href="/contact.php">Customer Support &amp; Helpdesk</a></li>
                    <li><a href="/admin/login.php">Staff / Admin Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>
