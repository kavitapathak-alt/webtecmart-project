<?php
require_once __DIR__ . '/../functions.php';
ensureAdmin();

$leadCount = db()->query('SELECT COUNT(*) as total FROM leads')->fetch()['total'];
$contactCount = db()->query('SELECT COUNT(*) as total FROM contacts')->fetch()['total'];
$recentLeads = latestLeads();

require_once __DIR__ . '/templates/header.php';
?>

<style>
    .admin-dashboard-page { background: #f6efe8; min-height: 72vh; padding: 48px 0 76px; }
    .admin-dashboard-head { display: flex; align-items: center; justify-content: space-between; gap: 18px; margin-bottom: 28px; }
    .admin-dashboard-head h1 { margin: 0; letter-spacing: -0.06em; }
    .admin-dashboard-head p { margin: 6px 0 0; color: #6b6478; }
    .admin-actions { display: flex; gap: 10px; flex-wrap: wrap; }
    .admin-secondary { background: #fff; color: #a3134f; border: 1px solid rgba(236,44,122,0.2); }
    .admin-stats { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px; margin-bottom: 24px; }
    .admin-stat { background: rgba(255,255,255,0.72); border: 1px solid rgba(236,44,122,0.13); border-radius: 18px; padding: 22px; box-shadow: 0 12px 28px rgba(31,27,42,0.05); }
    .admin-stat span { color: #6b6478; font-size: 0.86rem; }
    .admin-stat strong { display: block; margin-top: 8px; color: #c4007a; font-size: 2rem; letter-spacing: -0.05em; }
    .admin-panel { background: rgba(255,255,255,0.72); border: 1px solid rgba(236,44,122,0.13); border-radius: 20px; padding: 22px; overflow-x: auto; }
    .admin-panel-head { display: flex; align-items: center; justify-content: space-between; gap: 14px; margin-bottom: 16px; }
    .admin-panel-head h2 { margin: 0; font-size: 1.35rem; }
    .admin-panel-head a { color: #c4007a; font-weight: 700; }
    .admin-table { width: 100%; border-collapse: collapse; min-width: 620px; }
    .admin-table th, .admin-table td { padding: 13px 10px; border-bottom: 1px solid rgba(31,27,42,0.08); text-align: left; }
    .admin-table th { color: #6b6478; font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.08em; }
    .admin-table td { color: #2a2433; }
    @media (max-width: 700px) {
        .admin-dashboard-page { padding: 32px 0 56px; }
        .admin-dashboard-head { align-items: flex-start; flex-direction: column; }
        .admin-stats { grid-template-columns: 1fr; }
        .admin-panel { padding: 16px 12px; }
    }
</style>

<main class="admin-dashboard-page">
    <section class="container">
        <div class="admin-dashboard-head">
            <div>
                <h1>Admin Dashboard</h1>
                <p>Welcome back, <?= e($_SESSION['admin_name'] ?? 'Admin') ?>.</p>
            </div>
            <div class="admin-actions">
                <a href="/admin/leads.php" class="btn btn-primary">View Leads</a>
                <a href="/admin/content.php" class="btn admin-secondary">Manage Content</a>
                <a href="/admin/logout.php" class="btn admin-secondary">Logout</a>
            </div>
        </div>

        <div class="admin-stats">
                <div class="admin-stat">
                    <span>Total Leads</span>
                    <strong><?= $leadCount ?></strong>
                </div>
                <div class="admin-stat">
                    <span>Messages</span>
                    <strong><?= $contactCount ?></strong>
                </div>
                <div class="admin-stat">
                    <span>Last Update</span>
                    <strong><?= date('d M Y') ?></strong>
                </div>
        </div>

        <div class="admin-panel">
                <div class="admin-panel-head">
                    <h2>Recent Leads</h2>
                    <a href="/admin/leads.php">View all</a>
                </div>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Service</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentLeads)): ?>
                            <tr><td colspan="4">No leads yet.</td></tr>
                        <?php else: ?>
                            <?php foreach ($recentLeads as $lead): ?>
                                <tr>
                                    <td><?= e($lead['name']) ?></td>
                                    <td><?= e($lead['email']) ?></td>
                                    <td><?= e($lead['service']) ?></td>
                                    <td><?= e(date('d M Y', strtotime($lead['created_at']))) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
    </section>
</main>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
