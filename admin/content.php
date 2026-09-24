<?php
require_once __DIR__ . '/../functions.php';
ensureAdmin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $allowedTypes = ['hero', 'service', 'blog', 'pricing', 'testimonial', 'success_story', 'homepage', 'about', 'partners', 'contact', 'page'];

    if (($_POST['action'] ?? '') === 'delete') {
        cmsDelete((int) ($_POST['id'] ?? 0));
    } elseif (($_POST['action'] ?? '') === 'update') {
        $type = $_POST['content_type'] ?? 'service';
        $id = (int) ($_POST['id'] ?? 0);
        if ($id > 0 && in_array($type, $allowedTypes, true) && trim($_POST['title'] ?? '') !== '') {
            $existing = cmsGetById($id);
            $existingMeta = is_array(json_decode($existing['metadata'] ?? '', true)) ? json_decode($existing['metadata'] ?? '', true) : [];
            $image = uploadCmsImage($_FILES['image'] ?? []);
            if ($image === '' && !empty($existingMeta['image'])) {
                $image = $existingMeta['image'];
            }
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
                ],
                $id
            );
        }
    } else {
        $type = $_POST['content_type'] ?? 'service';
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

$editId = isset($_GET['edit']) ? (int) $_GET['edit'] : 0;
$editingItem = $editId > 0 ? cmsGetById($editId) : null;
$editingMeta = is_array(json_decode($editingItem['metadata'] ?? '', true)) ? json_decode($editingItem['metadata'] ?? '', true) : [];

require_once __DIR__ . '/templates/header.php';
serviceCards();
pricingPlans();
testimonials();
blogPosts();
homepageSections();
$items = cmsAllContent();

$contentTypeMeta = [
    'hero' => ['label' => 'Hero Banner', 'where' => 'Homepage top banner section', 'help' => 'Heading, short text and CTA image used in homepage hero block.'],
    'service' => ['label' => 'Service Card', 'where' => 'Homepage What We Do section', 'help' => 'Used for service cards and listing blocks.'],
    'blog' => ['label' => 'Blog / Insight', 'where' => 'Blog page articles', 'help' => 'Appears in blog cards and listing sections.'],
    'pricing' => ['label' => 'Pricing Plan', 'where' => 'Packages / pricing pages', 'help' => 'Plan title, price and features shown on pricing tables.'],
    'testimonial' => ['label' => 'Testimonial', 'where' => 'Homepage testimonial slider', 'help' => 'Client quote, role and star review appear in testimonials.'],
    'success_story' => ['label' => 'Success Story', 'where' => 'SEO portfolio / case studies', 'help' => 'Used in the portfolio cards and case study modal.'],
    'homepage' => ['label' => 'Homepage Block', 'where' => 'General homepage section', 'help' => 'Used for custom homepage section content blocks.'],
    'about' => ['label' => 'About Section', 'where' => 'About page / brand section', 'help' => 'Business intro, team, values and brand story content.'],
    'partners' => ['label' => 'Partner Logo', 'where' => 'Trusted partners marquee', 'help' => 'Client/logo cards shown in the partner marquee.'],
    'contact' => ['label' => 'Contact / CTA', 'where' => 'Contact and CTA content', 'help' => 'Call-to-actions and contact focus texts.'],
    'page' => ['label' => 'Page Block', 'where' => 'Any page detail block', 'help' => 'Extra custom content displayed on selected pages.'],
];

$itemsByType = [];
foreach ($items as $item) {
    $type = $item['content_type'] ?? 'page';
    $itemsByType[$type][] = $item;
}
?>

<style>
    .admin-content-page { background: #f6efe8; min-height: 72vh; padding: 46px 0 76px; }
    .admin-content-head { display: flex; align-items: center; justify-content: space-between; gap: 18px; margin-bottom: 24px; }
    .admin-content-head h1 { margin: 0; letter-spacing: -0.06em; }
    .admin-content-head p { margin: 6px 0 0; color: #6b6478; }
    .admin-content-grid { display: grid; grid-template-columns: minmax(300px, 0.8fr) minmax(0, 1.2fr); gap: 22px; align-items: start; }
    .admin-content-card { background: rgba(255,255,255,0.76); border: 1px solid rgba(236,44,122,0.14); border-radius: 20px; padding: 22px; box-shadow: 0 14px 30px rgba(31,27,42,0.05); }
    .admin-content-card h2 { margin: 0 0 18px; font-size: 1.25rem; }
    .admin-content-form { display: grid; gap: 13px; }
    .admin-content-form label { display: grid; gap: 7px; color: #2a2433; font-size: 0.84rem; font-weight: 700; }
    .admin-content-form input, .admin-content-form select, .admin-content-form textarea { width: 100%; border: 1px solid rgba(209,24,105,0.18); border-radius: 11px; padding: 11px 12px; background: #fff; color: #1f1b2a; font: inherit; }
    .admin-content-form textarea { min-height: 92px; resize: vertical; }
    .admin-content-form .btn { justify-content: center; }
    .admin-content-help { display: grid; gap: 10px; margin-top: 18px; }
    .admin-content-help-item { background: #fffafc; border: 1px solid rgba(196,0,122,0.12); border-radius: 12px; padding: 12px 14px; }
    .admin-content-help-item strong { display: block; color: #2a2433; margin-bottom: 4px; }
    .admin-content-help-item small { color: #6b6478; display: block; line-height: 1.55; }
    .admin-content-list { display: grid; gap: 12px; }
    .admin-content-item { display: flex; align-items: flex-start; justify-content: space-between; gap: 14px; padding: 14px; background: rgba(255,255,255,0.62); border: 1px solid rgba(31,27,42,0.08); border-radius: 14px; }
    .admin-content-item h3 { margin: 0 0 5px; font-size: 1rem; }
    .admin-content-item p { margin: 0; color: #6b6478; font-size: 0.84rem; line-height: 1.5; }
    .admin-content-type { color: #c4007a; font-size: 0.7rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; }
    .admin-delete { border: 0; background: transparent; color: #b91c1c; cursor: pointer; font-weight: 700; }
    .admin-actions { display:flex; flex-direction:column; gap:8px; align-items:flex-end; }
    .admin-btn-inline { padding:8px 12px; font-size:0.75rem; }
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
                    <?php $selectedType = $editingItem['content_type'] ?? 'service'; ?>
                    <?php if ($editingItem): ?>
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?= (int) $editingItem['id'] ?>">
                    <?php else: ?>
                        <input type="hidden" name="action" value="create">
                    <?php endif; ?>
                    <label>Content type
                        <select name="content_type">
                            <?php foreach ($contentTypeMeta as $key => $meta): ?>
                                <option value="<?= e($key) ?>" <?= $selectedType === $key ? 'selected' : '' ?>><?= e($meta['label']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label>Title / Name<input type="text" name="title" value="<?= e($editingItem['title'] ?? '') ?>" required></label>
                    <label>Show on page
                        <select name="page">
                            <?php $selectedPage = $editingMeta['page'] ?? 'index.php'; ?>
                            <option value="index.php" <?= $selectedPage === 'index.php' ? 'selected' : '' ?>>Homepage</option>
                            <option value="about.php" <?= $selectedPage === 'about.php' ? 'selected' : '' ?>>About</option>
                            <option value="services.php" <?= $selectedPage === 'services.php' ? 'selected' : '' ?>>Services</option>
                            <option value="packages.php" <?= $selectedPage === 'packages.php' ? 'selected' : '' ?>>Packages</option>
                            <option value="pricing.php" <?= $selectedPage === 'pricing.php' ? 'selected' : '' ?>>Pricing</option>
                            <option value="portfolio.php" <?= $selectedPage === 'portfolio.php' ? 'selected' : '' ?>>Portfolio</option>
                            <option value="blog.php" <?= $selectedPage === 'blog.php' ? 'selected' : '' ?>>Blog</option>
                            <option value="contact.php" <?= $selectedPage === 'contact.php' ? 'selected' : '' ?>>Contact</option>
                            <option value="digital-business-branding.php" <?= $selectedPage === 'digital-business-branding.php' ? 'selected' : '' ?>>Digital Business Branding</option>
                            <option value="website-design-development.php" <?= $selectedPage === 'website-design-development.php' ? 'selected' : '' ?>>Website Design</option>
                            <option value="search-engine-optimization.php" <?= $selectedPage === 'search-engine-optimization.php' ? 'selected' : '' ?>>Search Engine Optimization</option>
                            <option value="search-engine-marketing.php" <?= $selectedPage === 'search-engine-marketing.php' ? 'selected' : '' ?>>Search Engine Marketing</option>
                            <option value="social-media-optimization.php" <?= $selectedPage === 'social-media-optimization.php' ? 'selected' : '' ?>>Social Media Optimization</option>
                            <option value="mobile-app-development.php" <?= $selectedPage === 'mobile-app-development.php' ? 'selected' : '' ?>>Mobile App Development</option>
                        </select>
                    </label>
                    <label>Short summary<input type="text" name="summary" value="<?= e($editingItem['summary'] ?? '') ?>"></label>
                    <label>Details / Description<textarea name="body"><?= e($editingItem['body'] ?? '') ?></textarea></label>
                    <label>Image (JPG, PNG, WEBP; max 5 MB)<input type="file" name="image" accept="image/jpeg,image/png,image/webp,image/gif"></label>
                    <label>Icon or price (optional)<input type="text" name="icon" value="<?= e($editingMeta['icon'] ?? '') ?>" placeholder="search or ₹29,999"></label>
                    <label>Client role (testimonial only)<input type="text" name="role" value="<?= e($editingMeta['role'] ?? '') ?>"></label>
                    <label>Quote (testimonial only)<textarea name="quote"><?= e($editingMeta['quote'] ?? '') ?></textarea></label>
                    <button type="submit" class="btn btn-primary"><?= $editingItem ? 'Update Content' : 'Add To Website' ?></button>
                    <?php if ($editingItem): ?>
                        <a href="/admin/content.php" class="btn btn-secondary">Cancel Edit</a>
                    <?php endif; ?>
                </form>

                <div class="admin-content-help">
                    <?php foreach ($contentTypeMeta as $key => $meta): ?>
                        <div class="admin-content-help-item">
                            <strong><?= e($meta['label']) ?></strong>
                            <small><?= e($meta['where']) ?> — <?= e($meta['help']) ?></small>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="admin-content-card">
                <h2>Published Content</h2>
                <div class="admin-content-list">
                    <?php foreach ($items as $item): ?>
                        <article class="admin-content-item">
                            <div>
                                <div class="admin-content-type"><?= e($contentTypeMeta[$item['content_type']]['label'] ?? ucfirst(str_replace('_', ' ', $item['content_type']))) ?></div>
                                <h3><?= e($item['title']) ?></h3>
                                <p><?= e($item['summary'] ?: $item['body']) ?></p>
                                <?php $itemMeta = json_decode($item['metadata'] ?? '', true); ?>
                                <?php if (!empty($itemMeta['image'])): ?><img src="<?= e($itemMeta['image']) ?>" alt="<?= e($item['title']) ?>" style="width:72px;height:52px;object-fit:cover;border-radius:8px;margin-top:10px;"><?php endif; ?>
                            </div>
                            <div class="admin-actions">
                                <a href="/admin/content.php?edit=<?= (int) $item['id'] ?>" class="btn btn-secondary admin-btn-inline">Edit</a>
                                <form method="POST">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?= (int) $item['id'] ?>">
                                    <button type="submit" class="admin-delete">Delete</button>
                                </form>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
