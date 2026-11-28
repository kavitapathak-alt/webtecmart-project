<?php
require_once __DIR__ . '/../config.php';

$email = '';

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

    $_SESSION['login_error'] = 'Incorrect email or password. Please check and try again.';
}

require_once __DIR__ . '/templates/header.php';
?>

<style>
    .admin-auth-page { min-height: 100vh; display: grid; place-items: center; padding: 32px 16px; }

    .auth-shell {
        display: grid; grid-template-columns: 1fr 1.05fr; width: 100%; max-width: 940px; margin: 0 auto;
        background: #fff; border-radius: 32px; padding: 12px; gap: 12px;
        box-shadow: 0 30px 70px rgba(0, 0, 0, .10);
    }

    /* ---------- Left dark brand panel ---------- */
    .auth-brand {
        position: relative; padding: 40px 34px; color: #fff; background: var(--adm-ink);
        border-radius: 22px; display: flex; flex-direction: column; justify-content: space-between; gap: 36px; overflow: hidden;
    }
    .auth-logo { width: 44px; height: 44px; border-radius: 50%; background: var(--adm-lime); color: var(--adm-ink); display: grid; place-items: center; font-size: 1.25rem; margin-bottom: 22px; position: relative; z-index: 1; }
    .auth-brand h2 { margin: 0 0 12px; font-size: clamp(1.7rem, 3vw, 2.1rem); line-height: 1.12; font-weight: 600; letter-spacing: -.03em; position: relative; z-index: 1; }
    .auth-brand p { margin: 0; color: #a9a9a9; line-height: 1.6; max-width: 32ch; font-size: .92rem; position: relative; z-index: 1; }

    .auth-chips { display: flex; flex-direction: column; gap: 10px; position: relative; z-index: 1; }
    .auth-chip { display: flex; align-items: center; gap: 12px; padding: 12px 14px; border-radius: 16px; font-size: .88rem; font-weight: 500; background: #1b1b1b; }
    .auth-chip:nth-child(1) { background: var(--adm-yellow); color: var(--adm-ink); }
    .auth-chip:nth-child(2) { background: var(--adm-red); color: #fff; }
    .auth-chip:nth-child(3) { background: var(--adm-blue); color: #fff; }
    .auth-chip i { width: 32px; height: 32px; border-radius: 50%; background: rgba(255,255,255,.28); display: grid; place-items: center; font-size: .95rem; flex: none; }
    .auth-chip:nth-child(1) i { background: rgba(0,0,0,.08); }

    /* ---------- Right form panel ---------- */
    .auth-panel { padding: 40px 36px; display: flex; flex-direction: column; justify-content: center; }
    .auth-panel h1 { margin: 0 0 6px; font-size: 1.8rem; font-weight: 600; letter-spacing: -.03em; color: var(--adm-ink); }
    .auth-panel > p { margin: 0 0 26px; color: #777; font-size: .92rem; }

    .admin-error { display: flex; gap: 10px; align-items: flex-start; border-radius: 16px; padding: 12px 14px; margin-bottom: 20px; background: #FFE9E5; border: 1px solid #FFC6BD; color: #B3270F; font-weight: 500; font-size: .88rem; line-height: 1.45; }
    .admin-error svg { flex: none; margin-top: 2px; }

    .admin-auth-form { display: grid; gap: 18px; }
    .field { display: grid; gap: 8px; }
    .field > span { font-weight: 500; font-size: .85rem; color: #444; }
    .input-wrap { position: relative; }
    .input-wrap > svg.lead { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; stroke: #9a9a9a; pointer-events: none; transition: stroke .15s; }
    .input-wrap input {
        width: 100%; box-sizing: border-box; padding: 14px 46px 14px 46px; border: 1px solid #E3E3E3; border-radius: 999px;
        background: #fff; font: inherit; font-size: .92rem; color: var(--adm-ink); transition: border-color .15s, box-shadow .15s;
    }
    .input-wrap input::placeholder { color: #b5b5b5; }
    .input-wrap input:focus { outline: none; border-color: var(--adm-ink); box-shadow: 0 0 0 4px rgba(230, 247, 58, .6); }
    .input-wrap:focus-within > svg.lead { stroke: var(--adm-ink); }

    .toggle-pass { position: absolute; right: 6px; top: 50%; transform: translateY(-50%); width: 38px; height: 38px; display: grid; place-items: center; border: 0; border-radius: 50%; background: transparent; color: #9a9a9a; cursor: pointer; }
    .toggle-pass:hover { color: var(--adm-ink); background: #F1F1F1; }
    .toggle-pass:focus-visible { outline: 2px solid var(--adm-ink); }
    .toggle-pass svg { width: 19px; height: 19px; }
    .toggle-pass .eye-off { display: none; }
    .toggle-pass[aria-pressed="true"] .eye-on { display: none; }
    .toggle-pass[aria-pressed="true"] .eye-off { display: block; }

    .auth-submit { margin-top: 6px; width: 100%; padding: 15px 18px; border: 0; border-radius: 999px; font: inherit; font-weight: 600; font-size: .95rem; color: var(--adm-lime); background: var(--adm-ink); cursor: pointer; transition: background .15s, transform .15s, opacity .15s; }
    .auth-submit:hover { background: #2a2a2a; transform: translateY(-1px); }
    .auth-submit:active { transform: translateY(0); }
    .auth-submit:focus-visible { outline: 3px solid var(--adm-lime); outline-offset: 2px; }
    .auth-submit[disabled] { opacity: .7; cursor: progress; transform: none; }

    .auth-foot { margin: 22px 0 0; font-size: .82rem; color: #888; text-align: center; }

    @media (max-width: 820px) {
        .auth-shell { grid-template-columns: 1fr; max-width: 460px; }
        .auth-brand { padding: 28px 24px; gap: 20px; }
        .auth-chips { display: none; }
        .auth-panel { padding: 28px 20px 30px; }
    }
    @media (prefers-reduced-motion: reduce) {
        .auth-submit, .input-wrap input, .input-wrap > svg.lead { transition: none; }
    }
</style>

<main class="admin-auth-page">
    <section class="container">
        <div class="auth-shell">

            <aside class="auth-brand">
                <div>
                    <div class="auth-logo"><i class="bi bi-x-diamond-fill"></i></div>
                    <h2>WebTecMart Admin</h2>
                    <p>View and manage every enquiry and lead from your website in one place.</p>
                </div>
                <div class="auth-chips">
                    <div class="auth-chip"><i class="bi bi-inbox"></i> View new enquiries</div>
                    <div class="auth-chip"><i class="bi bi-person-check"></i> Follow up with leads</div>
                    <div class="auth-chip"><i class="bi bi-check2-circle"></i> Update lead status</div>
                </div>
            </aside>

            <div class="auth-panel">
                <h1>Admin sign in</h1>
                <p>Sign in to your account.</p>

                <?php if (!empty($_SESSION['login_error'])): ?>
                    <div class="admin-error" role="alert">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7.5v5.5M12 16.5h.01"/></svg>
                        <span><?= e($_SESSION['login_error']); unset($_SESSION['login_error']); ?></span>
                    </div>
                <?php endif; ?>

                <form method="POST" action="/admin/login.php" class="admin-auth-form" id="adminLoginForm">
                    <label class="field">
                        <span>Email</span>
                        <div class="input-wrap">
                            <svg class="lead" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2.5"/><path d="M3.5 7l8.5 6 8.5-6"/></svg>
                            <input type="email" name="email" value="<?= e($email) ?>" placeholder="you@webtecmart.com" autocomplete="username" required autofocus>
                        </div>
                    </label>

                    <label class="field">
                        <span>Password</span>
                        <div class="input-wrap">
                            <svg class="lead" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4.5" y="10.5" width="15" height="10" rx="2.5"/><path d="M8 10.5V8a4 4 0 0 1 8 0v2.5"/></svg>
                            <input type="password" name="password" id="adminPassword" placeholder="Enter your password" autocomplete="current-password" required>
                            <button type="button" class="toggle-pass" id="togglePass" aria-label="Show password" aria-pressed="false">
                                <svg class="eye-on" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
                                <svg class="eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3l18 18"/><path d="M10.6 5.2A10 10 0 0 1 12 5c6.4 0 10 7 10 7a17 17 0 0 1-3.2 4"/><path d="M6.5 6.6C3.7 8.4 2 12 2 12s3.6 7 10 7c1.6 0 3-.4 4.2-1"/><path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"/></svg>
                            </button>
                        </div>
                    </label>

                    <button type="submit" class="auth-submit" id="loginBtn">Sign in</button>
                </form>

                <p class="auth-foot">Authorised administrators only.</p>
            </div>

        </div>
    </section>
</main>

<script>
    (function () {
        var pass = document.getElementById('adminPassword');
        var toggle = document.getElementById('togglePass');
        var form = document.getElementById('adminLoginForm');
        var btn = document.getElementById('loginBtn');

        toggle.addEventListener('click', function () {
            var show = pass.type === 'password';
            pass.type = show ? 'text' : 'password';
            toggle.setAttribute('aria-pressed', show ? 'true' : 'false');
            toggle.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
        });

        form.addEventListener('submit', function () {
            btn.disabled = true;
            btn.textContent = 'Signing in...';
        });
    })();
</script>

<?php require_once __DIR__ . '/templates/footer.php'; ?>