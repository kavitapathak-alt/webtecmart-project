<?php
$adminPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | WebTecMart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --admin-pink:#c4007a; --admin-pink-light:#e0398f; --admin-cream:#fbf8f1; --admin-ink:#211a29; --admin-muted:#716979; --admin-border:rgba(196,0,122,.13); }
        * { box-sizing:border-box; }
        html, body { margin:0; min-height:100%; }
        body { font-family:'Plus Jakarta Sans',sans-serif; background:var(--admin-cream); color:var(--admin-ink); }
        a { color:inherit; text-decoration:none; }
        .admin-shell-header { position:sticky; top:0; z-index:100; background:rgba(255,255,255,.94); border-bottom:1px solid var(--admin-border); box-shadow:0 8px 24px rgba(44,20,40,.06); backdrop-filter:blur(16px); }
        .admin-shell-inner { max-width:1280px; min-height:78px; margin:0 auto; padding:12px 20px; display:flex; align-items:center; justify-content:space-between; gap:20px; }
        .admin-brand { display:flex; align-items:center; gap:10px; color:var(--admin-ink); font-weight:800; }
        .admin-brand-mark { width:42px; height:42px; border-radius:50%; display:grid; place-items:center; background:linear-gradient(135deg,var(--admin-pink-light),var(--admin-pink)); color:#fff; }
        .admin-brand small { display:block; color:var(--admin-pink); font-size:.62rem; letter-spacing:.16em; }
        .admin-nav { display:flex; align-items:center; gap:6px; flex-wrap:wrap; }
        .admin-nav a { padding:9px 13px; border-radius:999px; color:var(--admin-muted); font-size:.82rem; font-weight:700; }
        .admin-nav a:hover, .admin-nav a.active { color:#fff; background:linear-gradient(90deg,var(--admin-pink),var(--admin-pink-light)); }
        .admin-user { color:var(--admin-muted); font-size:.8rem; }
        @media (max-width:850px) { .admin-shell-inner { align-items:flex-start; flex-direction:column; } .admin-nav { width:100%; overflow-x:auto; flex-wrap:nowrap; padding-bottom:2px; } .admin-user { display:none; } }
    </style>
</head>
<body>
<header class="admin-shell-header">
    <div class="admin-shell-inner">
        <a class="admin-brand" href="/admin/dashboard.php">
            <span class="admin-brand-mark">W</span>
            <span>WebTecMart<small>ADMIN PANEL</small></span>
        </a>
        <nav class="admin-nav" aria-label="Admin navigation">
            <a class="<?= $adminPage === 'dashboard.php' ? 'active' : '' ?>" href="/admin/dashboard.php">Dashboard</a>
            <a class="<?= $adminPage === 'content.php' ? 'active' : '' ?>" href="/admin/content.php">Website Content</a>
            <a class="<?= $adminPage === 'leads.php' ? 'active' : '' ?>" href="/admin/leads.php">Leads</a>
            <a href="/index.php">View Website</a>
            <?php if (!empty($_SESSION['admin_logged_in'])): ?><a href="/admin/logout.php">Logout</a><?php endif; ?>
        </nav>
        <?php if (!empty($_SESSION['admin_name'])): ?><span class="admin-user"><?= e($_SESSION['admin_name']) ?></span><?php endif; ?>
    </div>
</header>
