<?php
require_once __DIR__ . '/../functions.php';
ensureAdmin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (($_POST['action'] ?? '') === 'delete') {
        cmsDelete((int) ($_POST['id'] ?? 0));
    } else {
        $type = $_POST['content_type'] ?? 'service';
        $allowedTypes = ['service', 'blog', 'pricing', 'testimonial', 'homepage', 'page'];
        if (in_array($type, $allowedTypes, true) && trim($_POST['title'] ?? '') !== '') {
            $image = uploadCmsImage($_FILES['image'] ?? []);
            cmsSave(
                $type,
                trim($_POST['title']),
                trim($_POST['summary'] ?? ''),
                trim($_POST['body'] ?? ''),
                [
                    'icon' => trim($_POST['icon'] ?? ''),
                    'price' => trim($_POST['price'] ?? ''),
                    'name' => trim($_POST['name'] ?? ''),
                    'role' => trim($_POST['role'] ?? ''),
                    'quote' => trim($_POST['quote'] ?? ''),
                    'image' => $image,
                    'page' => trim($_POST['page'] ?? ''),
                ]
            );
        }
    }
    redirect('/admin/content.php');
}

require_once __DIR__ . '/templates/header.php';
serviceCards();
pricingPlans();
testimonials();
blogPosts();
homepageSections();
$items = cmsAllContent();
?>

<style>
    .admin-content-page { background: #f6efe8; min-height: 72vh; padding: 46px 0 76px; }
    .admin-content-head { display: flex; align-items: center; justify-content: space-between; gap: 18px; margin-bottom: 24px; }
    .admin-content-head h1 { margin: 0; letter-spacing: -0.06em; }
    .admin-content-head p { margin: 6px 0 0; color: #6b6478; }
    .admin-content-grid { display: grid; grid-template-columns: minmax(280px, 0.75fr) minmax(0, 1.25fr); gap: 22px; align-items: start; }
    .admin-content-card { background: rgba(255,255,255,0.76); border: 1px solid rgba(236,44,122,0.14); border-radius: 20px; padding: 22px; box-shadow: 0 14px 30px rgba(31,27,42,0.05); }
    .admin-content-card h2 { margin: 0 0 18px; font-size: 1.25rem; }
    .admin-content-form { display: grid; gap: 13px; }
    .admin-content-form label { display: grid; gap: 7px; color: #2a2433; font-size: 0.84rem; font-weight: 700; }
    .admin-content-form input, .admin-content-form select, .admin-content-form textarea { width: 100%; border: 1px solid rgba(209,24,105,0.18); border-radius: 11px; padding: 11px 12px; background: #fff; color: #1f1b2a; font: inherit; }
    .admin-content-form textarea { min-height: 92px; resize: vertical; }
    .admin-content-form .btn { justify-content: center; }
    .admin-content-list { display: grid; gap: 12px; }
    .admin-content-item { display: flex; align-items: flex-start; justify-content: space-between; gap: 14px; padding: 14px; background: rgba(255,255,255,0.62); border: 1px solid rgba(31,27,42,0.08); border-radius: 14px; }
    .admin-content-item h3 { margin: 0 0 5px; font-size: 1rem; }
    .admin-content-item p { margin: 0; color: #6b6478; font-size: 0.84rem; line-height: 1.5; }
    .admin-content-type { color: #c4007a; font-size: 0.7rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; }
    .admin-delete { border: 0; background: transparent; color: #b91c1c; cursor: pointer; font-weight: 700; }
    @media (max-width: 850px) { .admin-content-grid { grid-template-columns: 1fr; } }
</style>

<main class="admin-content-page">
    <section class="container">
        <div class="admin-content-head">
            <div>
                <h1>Website Content</h1>
                <p>Add content here and it will be available to the public website.</p>
            </div>
            <a href="/admin/dashboard.php" class="btn btn-primary">Dashboard</a>
        </div>

        <div class="admin-content-grid">
            <div class="admin-content-card">
                <h2>Add New Content</h2>
                <form method="POST" class="admin-content-form" enctype="multipart/form-data">
                    <label>Content type
                        <select name="content_type">
                            <option value="service">Service</option>
                            <option value="blog">Blog / Insight</option>
                            <option value="pricing">Pricing Plan</option>
                            <option value="testimonial">Testimonial</option>
                            <option value="homepage">Homepage Section</option>
                            <option value="page">Page Content Block</option>
                        </select>
                    </label>
                    <label>Title / Name<input type="text" name="title" required></label>
                    <label>Show on page
                        <select name="page">
                            <option value="index.php">Homepage</option>
                            <option value="about.php">About</option>
                            <option value="services.php">Services</option>
                            <option value="packages.php">Packages</option>
                            <option value="pricing.php">Pricing</option>
                            <option value="portfolio.php">Portfolio</option>
                            <option value="blog.php">Blog</option>
                            <option value="contact.php">Contact</option>
                            <option value="digital-business-branding.php">Digital Business Branding</option>
                            <option value="website-design-development.php">Website Design</option>
                            <option value="search-engine-optimization.php">Search Engine Optimization</option>
                            <option value="search-engine-marketing.php">Search Engine Marketing</option>
                            <option value="social-media-optimization.php">Social Media Optimization</option>
                            <option value="mobile-app-development.php">Mobile App Development</option>
                        </select>
                    </label>
                    <label>Short summary<input type="text" name="summary"></label>
                    <label>Details / Description<textarea name="body"></textarea></label>
                    <label>Image (JPG, PNG, WEBP; max 5 MB)<input type="file" name="image" accept="image/jpeg,image/png,image/webp,image/gif"></label>
                    <label>Icon or price (optional)<input type="text" name="icon" placeholder="search or ₹29,999"></label>
                    <label>Client role (testimonial only)<input type="text" name="role"></label>
                    <label>Quote (testimonial only)<textarea name="quote"></textarea></label>
                    <button type="submit" class="btn btn-primary">Add To Website</button>
                </form>
            </div>

            <div class="admin-content-card">
                <h2>Published Content</h2>
                <div class="admin-content-list">
                    <?php foreach ($items as $item): ?>
                        <article class="admin-content-item">
                            <div>
                                <div class="admin-content-type"><?= e($item['content_type']) ?></div>
                                <h3><?= e($item['title']) ?></h3>
                                <p><?= e($item['summary'] ?: $item['body']) ?></p>
                                <?php $itemMeta = json_decode($item['metadata'] ?? '', true); ?>
                                <?php if (!empty($itemMeta['image'])): ?><img src="<?= e($itemMeta['image']) ?>" alt="<?= e($item['title']) ?>" style="width:72px;height:52px;object-fit:cover;border-radius:8px;margin-top:10px;"><?php endif; ?>
                            </div>
                            <form method="POST">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= (int) $item['id'] ?>">
                                <button type="submit" class="admin-delete">Delete</button>
                            </form>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
