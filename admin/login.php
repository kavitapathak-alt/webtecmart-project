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

    $_SESSION['login_error'] = 'Email ya password galat hai. Dobara check karke try karein.';
}

require_once __DIR__ . '/templates/header.php';
?>

<style>
    :root {
        --auth-ink: #1f1b2a;
        --auth-muted: #6b6478;
        --auth-pink: #ec2c7a;
        --auth-pink-deep: #d11869;
        --auth-plum: #2a1233;
        --auth-plum-soft: #4a1d52;
        --auth-paper: #f6efe8;
        --auth-line: rgba(209, 24, 105, 0.18);
    }

    .admin-auth-page {
        min-height: 75vh;
        display: grid;
        place-items: center;
        padding: 56px 0 80px;
        background:
            radial-gradient(900px 400px at 85% -10%, rgba(236, 44, 122, 0.14), transparent 60%),
            var(--auth-paper);
    }

    .auth-shell {
        display: grid;
        grid-template-columns: 1fr 1.05fr;
        max-width: 960px;
        margin: 0 auto;
        border-radius: 28px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 30px 70px rgba(42, 18, 51, 0.18);
    }

    /* ---------- Left brand panel ---------- */
    .auth-brand {
        position: relative;
        padding: 48px 40px;
        color: #fff;
        background: linear-gradient(160deg, var(--auth-plum-soft) 0%, var(--auth-plum) 70%);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 40px;
        overflow: hidden;
    }

    .auth-brand::after {
        content: "";
        position: absolute;
        width: 320px;
        height: 320px;
        right: -120px;
        bottom: -120px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(236, 44, 122, 0.55), transparent 70%);
        pointer-events: none;
    }

    .auth-brand h2 {
        margin: 0 0 14px;
        font-size: clamp(1.7rem, 3vw, 2.2rem);
        line-height: 1.15;
        letter-spacing: -0.04em;
        position: relative;
        z-index: 1;
    }

    .auth-brand p {
        margin: 0;
        color: rgba(255, 255, 255, 0.72);
        line-height: 1.6;
        max-width: 34ch;
        position: relative;
        z-index: 1;
    }

    .auth-points {
        list-style: none;
        margin: 0;
        padding: 0;
        display: grid;
        gap: 14px;
        position: relative;
        z-index: 1;
    }

    .auth-points li {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .auth-points svg {
        flex: none;
        width: 34px;
        height: 34px;
        padding: 8px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.12);
        stroke: #fff;
    }

    /* ---------- Right form panel ---------- */
    .auth-panel {
        padding: 48px 44px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .auth-panel h1 {
        margin: 0 0 6px;
        font-size: 1.9rem;
        letter-spacing: -0.05em;
        color: var(--auth-ink);
    }

    .auth-panel > p {
        margin: 0 0 26px;
        color: var(--auth-muted);
    }

    .admin-error {
        display: flex;
        gap: 10px;
        align-items: flex-start;
        border-radius: 12px;
        padding: 12px 14px;
        margin-bottom: 20px;
        background: rgba(239, 68, 68, 0.08);
        border: 1px solid rgba(239, 68, 68, 0.22);
        color: #b91c1c;
        font-weight: 600;
        font-size: 0.92rem;
        line-height: 1.45;
    }

    .admin-error svg { flex: none; margin-top: 2px; }

    .admin-auth-form { display: grid; gap: 18px; }

    .field { display: grid; gap: 8px; }

    .field > span {
        font-weight: 700;
        font-size: 0.92rem;
        color: var(--auth-ink);
    }

    .input-wrap { position: relative; }

    .input-wrap > svg.lead {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        width: 18px;
        height: 18px;
        stroke: #a39bb0;
        pointer-events: none;
        transition: stroke 0.15s ease;
    }

    .input-wrap input {
        width: 100%;
        box-sizing: border-box;
        padding: 14px 44px 14px 44px;
        border: 1.5px solid var(--auth-line);
        border-radius: 12px;
        background: #fffdfb;
        font: inherit;
        color: var(--auth-ink);
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .input-wrap input::placeholder { color: #b6aec2; }

    .input-wrap input:focus {
        outline: none;
        border-color: var(--auth-pink);
        box-shadow: 0 0 0 4px rgba(236, 44, 122, 0.14);
    }

    .input-wrap:focus-within > svg.lead { stroke: var(--auth-pink); }

    .toggle-pass {
        position: absolute;
        right: 6px;
        top: 50%;
        transform: translateY(-50%);
        width: 38px;
        height: 38px;
        display: grid;
        place-items: center;
        border: 0;
        border-radius: 10px;
        background: transparent;
        color: #a39bb0;
        cursor: pointer;
    }

    .toggle-pass:hover { color: var(--auth-pink-deep); background: rgba(236, 44, 122, 0.08); }
    .toggle-pass:focus-visible { outline: 2px solid var(--auth-pink); }
    .toggle-pass svg { width: 19px; height: 19px; }
    .toggle-pass .eye-off { display: none; }
    .toggle-pass[aria-pressed="true"] .eye-on { display: none; }
    .toggle-pass[aria-pressed="true"] .eye-off { display: block; }

    .auth-submit {
        margin-top: 6px;
        width: 100%;
        padding: 15px 18px;
        border: 0;
        border-radius: 12px;
        font: inherit;
        font-weight: 700;
        color: #fff;
        cursor: pointer;
        background: linear-gradient(135deg, var(--auth-pink) 0%, var(--auth-pink-deep) 100%);
        box-shadow: 0 12px 24px rgba(236, 44, 122, 0.28);
        transition: transform 0.15s ease, box-shadow 0.15s ease, opacity 0.15s ease;
    }

    .auth-submit:hover { transform: translateY(-1px); box-shadow: 0 16px 28px rgba(236, 44, 122, 0.34); }
    .auth-submit:active { transform: translateY(0); }
    .auth-submit:focus-visible { outline: 3px solid rgba(236, 44, 122, 0.4); outline-offset: 2px; }
    .auth-submit[disabled] { opacity: 0.7; cursor: progress; transform: none; }

    .auth-foot {
        margin: 22px 0 0;
        font-size: 0.85rem;
        color: var(--auth-muted);
        text-align: center;
    }

    @media (max-width: 820px) {
        .auth-shell { grid-template-columns: 1fr; max-width: 480px; }
        .auth-brand { padding: 32px 28px; gap: 24px; }
        .auth-points { display: none; }
        .auth-panel { padding: 32px 26px 36px; }
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
                    <h2>WebTecMart Admin</h2>
                    <p>Website se aane wali har enquiry aur lead yahin se dekhein aur manage karein.</p>
                </div>
                <ul class="auth-points">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v12H5.2L4 17.2V4z"/><path d="M8 9h8M8 12h5"/></svg>
                        Nayi enquiries dekhein
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3.2"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6"/><path d="M17 11l1.8 1.8L22 9.5"/></svg>
                        Leads ko follow up karein
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.5l4.2 4.2L19 7"/></svg>
                        Status update karein
                    </li>
                </ul>
            </aside>

            <div class="auth-panel">
                <h1>Admin login</h1>
                <p>Apne account se sign in karein.</p>

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
                            <input type="password" name="password" id="adminPassword" placeholder="Apna password likhein" autocomplete="current-password" required>
                            <button type="button" class="toggle-pass" id="togglePass" aria-label="Password dikhayein" aria-pressed="false">
                                <svg class="eye-on" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
                                <svg class="eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3l18 18"/><path d="M10.6 5.2A10 10 0 0 1 12 5c6.4 0 10 7 10 7a17 17 0 0 1-3.2 4"/><path d="M6.5 6.6C3.7 8.4 2 12 2 12s3.6 7 10 7c1.6 0 3-.4 4.2-1"/><path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"/></svg>
                            </button>
                        </div>
                    </label>

                    <button type="submit" class="auth-submit" id="loginBtn">Login</button>
                </form>

                <p class="auth-foot">Sirf authorised admin ke liye.</p>
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
            toggle.setAttribute('aria-label', show ? 'Password chhupayein' : 'Password dikhayein');
        });

        form.addEventListener('submit', function () {
            btn.disabled = true;
            btn.textContent = 'Login ho raha hai...';
        });
    })();
</script>

<?php require_once __DIR__ . '/templates/footer.php'; ?>