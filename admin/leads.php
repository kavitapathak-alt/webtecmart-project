<?php
require_once __DIR__ . '/../config.php';
ensureAdmin();

$leads = db()->query('SELECT * FROM leads ORDER BY created_at DESC')->fetchAll();
require_once __DIR__ . '/templates/header.php';
?>

<style>
    .admin-leads-page { background: #f6efe8; min-height: 72vh; padding: 48px 0 76px; }
    .admin-leads-head { display: flex; align-items: center; justify-content: space-between; gap: 18px; margin-bottom: 24px; }
    .admin-leads-head h1 { margin: 0; letter-spacing: -0.06em; }
    .admin-leads-head p { margin: 6px 0 0; color: #6b6478; }
    .admin-leads-panel { background: rgba(255,255,255,0.72); border: 1px solid rgba(236,44,122,0.13); border-radius: 20px; padding: 22px; overflow-x: auto; }
    .admin-leads-table { width: 100%; border-collapse: collapse; min-width: 980px; }
    .admin-leads-table th, .admin-leads-table td { padding: 13px 10px; border-bottom: 1px solid rgba(31,27,42,0.08); text-align: left; vertical-align: top; }
    .admin-leads-table th { color: #6b6478; font-size: 0.76rem; text-transform: uppercase; letter-spacing: 0.08em; white-space: nowrap; }
    .admin-leads-table td { color: #2a2433; max-width: 260px; }
    .admin-leads-table td:last-child { color: #6b6478; white-space: nowrap; }
    @media (max-width: 700px) {
        .admin-leads-page { padding: 32px 0 56px; }
        .admin-leads-head { align-items: flex-start; flex-direction: column; }
        .admin-leads-panel { padding: 16px 12px; }
    }
</style>

<main class="admin-leads-page">
    <section class="container">
        <div class="admin-leads-head">
            <div>
                <h1>All Leads</h1>
                <p>Enquiries submitted through the WebTecMart website.</p>
            </div>
            <a href="/admin/dashboard.php" class="btn btn-primary">Back to Dashboard</a>
        </div>

        <div class="admin-leads-panel">
                <table class="admin-leads-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Service</th>
                            <th>Budget</th>
                            <th>Message</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($leads)): ?>
                            <tr><td colspan="7">No leads yet.</td></tr>
                        <?php else: ?>
                            <?php foreach ($leads as $lead): ?>
                                <tr>
                                    <td><?= e($lead['name']) ?></td>
                                    <td><?= e($lead['email']) ?></td>
                                    <td><?= e($lead['company']) ?></td>
                                    <td><?= e($lead['service']) ?></td>
                                    <td><?= e($lead['budget']) ?></td>
                                    <td><?= e($lead['message']) ?></td>
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
