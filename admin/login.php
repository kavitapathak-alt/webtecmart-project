<?php
require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = db()->prepare('SELECT id, name, email, password_hash FROM admin_users WHERE email = :email LIMIT 1');
    $stmt->execute([':email' => $email]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = (int) $admin['id'];
        $_SESSION['admin_name'] = $admin['name'];
        $_SESSION['admin_email'] = $admin['email'];
        redirect('/admin/dashboard.php');
    }

    $_SESSION['login_error'] = 'Invalid username or password.';
}

require_once __DIR__ . '/templates/header.php';
?>

<style>
    .admin-auth-page { min-height: 70vh; background: #f6efe8; padding: 64px 0 88px; }
    .admin-auth-card { max-width: 480px; margin: 0 auto; background: rgba(255,255,255,0.72); border: 1px solid rgba(236,44,122,0.16); border-radius: 24px; padding: 32px 26px; box-shadow: 0 20px 45px rgba(31,27,42,0.08); }
    .admin-auth-card h1 { margin: 0 0 8px; letter-spacing: -0.05em; }
    .admin-auth-card > p { color: #6b6478; margin: 0 0 24px; }
    .admin-auth-form { display: grid; gap: 16px; }
    .admin-auth-form label { display: grid; gap: 8px; font-weight: 700; color: #1f1b2a; }
    .admin-auth-form input { border: 1px solid rgba(209,24,105,0.18); border-radius: 12px; padding: 13px 14px; background: #fff; }
    .admin-auth-form .btn { justify-content: center; }
    .admin-error { border-radius: 12px; padding: 12px 14px; margin-bottom: 18px; background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2); color: #b91c1c; font-weight: 600; }
</style>

<main class="admin-auth-page">
    <section class="container">
        <div class="admin-auth-card">
            <h1>Admin Login</h1>
            <p>Manage WebTecMart enquiries and website leads.</p>
            <?php if (!empty($_SESSION['login_error'])): ?>
                <div class="admin-error"><?= e($_SESSION['login_error']); unset($_SESSION['login_error']); ?></div>
            <?php endif; ?>
            <form method="POST" action="/admin/login.php" class="admin-auth-form">
                <label>
                    Email
                    <input type="email" name="email" required>
                </label>
                <label>
                    Password
                    <input type="password" name="password" required>
                </label>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
