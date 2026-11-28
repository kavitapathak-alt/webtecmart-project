<?php
require_once __DIR__ . '/../functions.php';
ensureAdmin();

// ---------- Real SQLite statistics (unchanged) ----------
$leadCount = (int) db()->query('SELECT COUNT(*) as total FROM leads')->fetch()['total'];
$contactCount = (int) db()->query('SELECT COUNT(*) as total FROM contacts')->fetch()['total'];
$serviceCount = (int) db()->query("SELECT COUNT(*) FROM content_items WHERE content_type = 'service_detail'")->fetchColumn();
$blogCount = (int) db()->query("SELECT COUNT(*) as total FROM content_items WHERE content_type = 'blog'")->fetch()['total'];
$partnerCount = (int) db()->query("SELECT COUNT(*) as total FROM content_items WHERE content_type = 'partner'")->fetch()['total'];
$totalContentItems = (int) db()->query('SELECT COUNT(*) as total FROM content_items')->fetch()['total'];

$recentLeads = latestLeads();
$adminName = $_SESSION['admin_name'] ?? 'Admin';
$latestLead = $recentLeads[0] ?? null;

$initial = static function (string $name): string {
    $name = trim($name);
    if ($name === '') return '?';
    return strtoupper(substr($name, 0, 1));
};

// ---------- Helpers for charts ----------
$countByDay = static function (string $table, string $fromDate): array {
    try {
        $st = db()->prepare("SELECT strftime('%Y-%m-%d', created_at) AS d, COUNT(*) AS c FROM {$table} WHERE created_at >= ? GROUP BY d");
        $st->execute([$fromDate]);
        $out = [];
        foreach ($st->fetchAll() as $r) $out[$r['d']] = (int) $r['c'];
        return $out;
    } catch (\Throwable $e) { return []; }
};
$countByMonth = static function (string $table, string $fromDate): array {
    try {
        $st = db()->prepare("SELECT strftime('%Y-%m', created_at) AS m, COUNT(*) AS c FROM {$table} WHERE created_at >= ? GROUP BY m");
        $st->execute([$fromDate]);
        $out = [];
        foreach ($st->fetchAll() as $r) $out[$r['m']] = (int) $r['c'];
        return $out;
    } catch (\Throwable $e) { return []; }
};
// smooth cubic-bezier path through points
$smooth = static function (array $pts): string {
    $n = count($pts);
    if ($n === 0) return '';
    $d = sprintf('M%.1f,%.1f', $pts[0][0], $pts[0][1]);
    for ($i = 0; $i < $n - 1; $i++) {
        $p0 = $pts[max($i - 1, 0)]; $p1 = $pts[$i]; $p2 = $pts[$i + 1]; $p3 = $pts[min($i + 2, $n - 1)];
        $c1x = $p1[0] + ($p2[0] - $p0[0]) / 6; $c1y = $p1[1] + ($p2[1] - $p0[1]) / 6;
        $c2x = $p2[0] - ($p3[0] - $p1[0]) / 6; $c2y = $p2[1] - ($p3[1] - $p1[1]) / 6;
        $d .= sprintf(' C%.1f,%.1f %.1f,%.1f %.1f,%.1f', $c1x, $c1y, $c2x, $c2y, $p2[0], $p2[1]);
    }
    return $d;
};

// ---- Monthly: last 6 months leads vs contacts ----
$months = [];
for ($i = 5; $i >= 0; $i--) {
    $dt = new DateTime('first day of this month');
    $dt->modify("-{$i} month");
    $months[] = ['key' => $dt->format('Y-m'), 'label' => $dt->format('M')];
}
$mFrom = $months[0]['key'] . '-01';
$leadsByMonth = $countByMonth('leads', $mFrom);
$contactsByMonth = $countByMonth('contacts', $mFrom);
$leadSeries = $contactSeries = [];
foreach ($months as $m) {
    $leadSeries[] = $leadsByMonth[$m['key']] ?? 0;
    $contactSeries[] = $contactsByMonth[$m['key']] ?? 0;
}
$maxM = max(1, max($leadSeries), max($contactSeries));
$W = 800; $H = 220; $padT = 20; $padB = 20;
$toPts = static function (array $series) use ($W, $H, $padT, $padB, $maxM): array {
    $n = count($series); $pts = [];
    foreach ($series as $i => $v) {
        $x = $n > 1 ? $i * ($W / ($n - 1)) : $W / 2;
        $y = $H - $padB - ($v / $maxM) * ($H - $padT - $padB);
        $pts[] = [$x, $y];
    }
    return $pts;
};
$leadPath = $smooth($toPts($leadSeries));
$contactPath = $smooth($toPts($contactSeries));

// ---- Weekly: last 7 days leads (area chart) ----
$days = [];
for ($i = 6; $i >= 0; $i--) {
    $dt = new DateTime("-{$i} day");
    $days[] = ['key' => $dt->format('Y-m-d'), 'label' => $dt->format('D')];
}
$leadsByDay = $countByDay('leads', $days[0]['key']);
$daySeries = [];
foreach ($days as $d) $daySeries[] = $leadsByDay[$d['key']] ?? 0;
$maxD = max(1, max($daySeries));
$AW = 300; $AH = 110;
$aPts = [];
foreach ($daySeries as $i => $v) {
    $aPts[] = [$i * ($AW / 6), $AH - 10 - ($v / $maxD) * ($AH - 30)];
}
$areaLine = $smooth($aPts);
$areaFill = $areaLine . sprintf(' L%d,%d L0,%d Z', $AW, $AH, $AH);

// ---- Content breakdown (replaces "Weekly Report" list) ----
try {
    $contentBreakdown = db()->query("SELECT content_type, COUNT(*) AS c FROM content_items GROUP BY content_type ORDER BY c DESC")->fetchAll();
} catch (\Throwable $e) { $contentBreakdown = []; }

// ---- Calendar for current month, dots on days that received leads ----
$monthStart = new DateTime('first day of this month');
$daysInMonth = (int) $monthStart->format('t');
$firstDow = (int) $monthStart->format('w'); // 0=Sun
$leadDays = [];
foreach ($countByDay('leads', $monthStart->format('Y-m-01')) as $k => $v) $leadDays[(int) substr($k, 8, 2)] = $v;
$todayNum = (int) date('j');

$maxLeadStat = $leadCount;

require_once __DIR__ . '/templates/header.php';
?>

<style>
    /* ---------- Base responsive grid ---------- */
    .bx-grid {
        display: grid;
        grid-template-columns: minmax(0, 2fr) minmax(0, 1fr);
        gap: 20px;
        align-items: start;
    }
    .bx-left, .bx-right {
        display: flex;
        flex-direction: column;
        gap: 20px;
        min-width: 0;
    }

    /* ---------- Cards ---------- */
    .bx-card {
        background: #fff;
        border-radius: 26px;
        padding: 22px;
        border: 1px solid #EDEDED;
        min-width: 0;
    }
    .bx-card h3 {
        font-size: .95rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    /* ---------- Search ---------- */
    .bx-search {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #fff;
        border: 1px solid #EDEDED;
        border-radius: 999px;
        padding: 12px 20px;
    }
    .bx-search input {
        border: 0;
        outline: 0;
        width: 100%;
        font: inherit;
        font-size: .88rem;
        background: transparent;
        min-width: 0;
    }

    /* ---------- Stat cards ---------- */
    .bx-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
    }
    .bx-stat {
        border-radius: 20px;
        padding: 18px 20px 20px;
        position: relative;
        min-height: 140px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-width: 0;
    }
    .bx-stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: .88rem;
        font-weight: 500;
        gap: 8px;
        flex-wrap: wrap;
    }
    .bx-stat-tag {
        background: #0E0E0E;
        color: #fff;
        font-size: .68rem;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 99px;
        white-space: nowrap;
    }
    .bx-stat-val {
        font-size: clamp(1.7rem, 4vw, 2.3rem);
        font-weight: 600;
        letter-spacing: -.03em;
        line-height: 1.1;
    }
    .bx-yellow { background: var(--adm-yellow); color: #0E0E0E; }
    .bx-red    { background: var(--adm-red);    color: #fff; }
    .bx-blue   { background: var(--adm-blue);   color: #fff; }

    /* ---------- Legend + chart ---------- */
    .bx-legend {
        display: flex;
        gap: 14px;
        font-size: .68rem;
        color: #777;
        align-items: center;
        flex-wrap: wrap;
        justify-content: flex-end;
    }
    .bx-legend i { font-size: .45rem; }
    .bx-chart {
        width: 100%;
        height: auto;
        aspect-ratio: 800 / 220;
        max-height: 260px;
        margin-top: 14px;
        display: block;
    }
    .bx-xaxis {
        display: flex;
        justify-content: space-between;
        font-size: .72rem;
        color: #999;
        margin-top: 4px;
        gap: 2px;
        flex-wrap: nowrap;
    }
    .bx-xaxis span {
        flex: 1 1 0;
        text-align: center;
        min-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* ---------- Two-column cards ---------- */
    .bx-two {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    /* ---------- Content list rows ---------- */
    .bx-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        background: #F6F6F6;
        border-radius: 12px;
        padding: 9px 12px;
        margin-top: 8px;
        font-size: .8rem;
        flex-wrap: wrap;
    }
    .bx-row .n { color: #888; width: 18px; flex-shrink: 0; }
    .bx-row .t {
        flex: 1 1 100px;
        font-weight: 500;
        text-transform: capitalize;
        min-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .bx-row .c { color: #777; font-size: .75rem; white-space: nowrap; }

    .bx-mini {
        background: var(--adm-red);
        color: #fff;
        border-radius: 99px;
        font-size: .64rem;
        font-weight: 600;
        padding: 5px 12px;
        text-decoration: none;
        white-space: nowrap;
    }
    .bx-mini:hover { color: #fff; background: #e63e27; }

    /* ---------- Calendar ---------- */
    .bx-cal {
        width: 100%;
        font-size: .75rem;
        margin-top: 10px;
        text-align: center;
        border-collapse: collapse;
        table-layout: fixed;
    }
    .bx-cal th { color: #999; font-weight: 500; padding: 5px 0; }
    .bx-cal td { padding: 3px 0; height: 30px; }
    .bx-cal span {
        display: inline-grid;
        place-items: center;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        position: relative;
    }
    .bx-cal .today { background: #0E0E0E; color: #fff; font-weight: 600; }
    .bx-cal .has::after {
        content: '';
        position: absolute;
        bottom: 0;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: var(--adm-red);
    }

    /* ---------- Notch / analysis frame ---------- */
    .bx-notice {
        background: #0E0E0E;
        color: #fff;
        border-radius: 26px 26px 0 0;
        padding: 18px 24px 22px;
        text-align: center;
        font-size: .8rem;
        line-height: 1.5;
    }
    .bx-notice b { color: var(--adm-red); font-weight: 600; }
    .bx-frame {
        background: #0E0E0E;
        border-radius: 0 0 26px 26px;
        padding: 0 12px 12px;
        margin-top: -20px;
    }
    .bx-frame-inner { border-radius: 20px; overflow: hidden; }
    .bx-an-top { background: #fff; padding: 16px 16px 8px; }
    .bx-an-top h4 { font-size: .85rem; font-weight: 600; margin: 0 0 8px; }
    .bx-an-bot {
        background: var(--adm-yellow);
        padding: 14px 16px 16px;
        font-size: .72rem;
    }
    .bx-an-bot .hd { font-size: .8rem; font-weight: 500; }
    .bx-an-bot .hd b { color: var(--adm-red); }
    .bx-an-bot .dl { font-weight: 600; font-size: .85rem; margin: 6px 0; }
    .bx-an-btn {
        background: #0E0E0E;
        color: #fff;
        border-radius: 99px;
        padding: 8px 14px;
        font-size: .7rem;
        font-weight: 600;
        text-decoration: none;
        white-space: nowrap;
    }
    .bx-an-btn:hover { color: #fff; background: #333; }

    /* weekly mini chart keeps aspect ratio */
    .bx-an-top svg {
        width: 100%;
        height: auto !important;
        aspect-ratio: 300 / 110;
        display: block;
    }

    /* ---------- Member list ---------- */
    .bx-member {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 0;
        min-width: 0;
    }
    .bx-member + .bx-member { border-top: 1px solid #F0F0F0; }
    .bx-av {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: var(--adm-lime);
        display: grid;
        place-items: center;
        font-weight: 700;
        flex-shrink: 0;
    }
    .bx-member > div { min-width: 0; }
    .bx-member b {
        display: block;
        font-size: .85rem;
        font-weight: 600;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .bx-member span {
        font-size: .72rem;
        color: #8a8a8a;
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .bx-member .when {
        margin-left: auto;
        font-size: .68rem;
        color: #aaa;
        white-space: nowrap;
        flex-shrink: 0;
    }

    .bx-pillsel {
        border: 1px solid #E6E6E6;
        border-radius: 99px;
        padding: 6px 14px;
        font-size: .75rem;
        font-weight: 500;
        text-decoration: none;
        color: #0E0E0E;
        white-space: nowrap;
        display: inline-block;
    }

    /* ---------- Leads table ---------- */
    .bx-table { width: 100%; border-collapse: collapse; }
    .bx-table th {
        text-align: left;
        padding: 12px 22px;
        font-size: .72rem;
        color: #888;
        font-weight: 500;
        background: #FAFAFA;
        border-bottom: 1px solid #EEE;
        white-space: nowrap;
    }
    .bx-table td {
        padding: 14px 22px;
        border-bottom: 1px solid #F3F3F3;
        font-size: .85rem;
        vertical-align: middle;
    }
    .bx-table tr:hover td { background: #FAFAFA; }
    .bx-table-wrap { overflow-x: auto; -webkit-overflow-scrolling: touch; }

    /* ============================================================
       RESPONSIVE BREAKPOINTS
       ============================================================ */

    /* Large tablet — collapse main 2-col grid */
    @media (max-width: 1100px) {
        .bx-grid { grid-template-columns: 1fr; }
    }

    /* Tablet */
    @media (max-width: 900px) {
        .bx-two { grid-template-columns: 1fr; }
        .bx-card { padding: 18px; border-radius: 22px; }
        .bx-search { padding: 10px 16px; }
    }

    /* Big phones */
    @media (max-width: 700px) {
        .bx-stats { grid-template-columns: 1fr 1fr; }
        .bx-stat { min-height: 120px; padding: 16px; }
        .bx-legend { justify-content: flex-start; }
        .bx-table th, .bx-table td { padding: 10px 14px; }
        .bx-table td { font-size: .8rem; }
        .bx-member .when { font-size: .64rem; }
    }

    /* Small phones */
    @media (max-width: 520px) {
        .bx-grid, .bx-left, .bx-right { gap: 14px; }
        .bx-stats { grid-template-columns: 1fr; gap: 12px; }
        .bx-stat { min-height: auto; padding: 16px 18px; }
        .bx-stat-val { font-size: 1.9rem; }
        .bx-card { padding: 16px; border-radius: 18px; }
        .bx-notice { padding: 16px 16px 20px; font-size: .75rem; }
        .bx-frame { padding: 0 8px 8px; }
        .bx-an-top { padding: 12px 12px 6px; }
        .bx-an-bot { padding: 12px; }
        .bx-an-bot .d-flex { flex-direction: column; align-items: stretch; gap: 10px; }
        .bx-an-btn { text-align: center; }
        .bx-member .when { display: none; } /* hide date on very narrow */
        .bx-xaxis { font-size: .64rem; }
        .bx-row .t { flex-basis: 80px; }
        .bx-cal span { width: 24px; height: 24px; font-size: .7rem; }
        .bx-cal td { height: 28px; }
        .bx-table th, .bx-table td { padding: 9px 12px; }
        .bx-av { width: 36px !important; height: 36px !important; }
    }

    /* Very narrow (<=380px) */
    @media (max-width: 380px) {
        .bx-stat-val { font-size: 1.6rem; }
        .bx-cal span { width: 22px; height: 22px; font-size: .65rem; }
        .bx-cal { font-size: .68rem; }
    }

    /* Reduced motion / print safety */
    @media (prefers-reduced-motion: reduce) {
        * { transition: none !important; animation: none !important; }
    }
</style>

<div class="bx-grid">

    <!-- ================= LEFT ================= -->
    <div class="bx-left">

        <div class="bx-search">
            <i class="bi bi-search text-muted"></i>
            <input type="text" id="bxSearch" placeholder="Search leads...">
        </div>

        <div class="bx-stats">
            <div class="bx-stat bx-yellow">
                <div class="bx-stat-top"><span>Total Leads</span><span class="bx-stat-tag"><?= $leadCount ?> total</span></div>
                <div class="bx-stat-val"><?= $leadCount ?></div>
            </div>
            <div class="bx-stat bx-red">
                <div class="bx-stat-top"><span>Contacts</span><span class="bx-stat-tag"><?= $contactCount ?> total</span></div>
                <div class="bx-stat-val"><?= $contactCount ?></div>
            </div>
            <div class="bx-stat bx-blue">
                <div class="bx-stat-top"><span>Service Pages</span><span class="bx-stat-tag">Live</span></div>
                <div class="bx-stat-val"><?= $serviceCount ?></div>
            </div>
        </div>

        <!-- Enquiries report -->
        <div class="bx-card">
            <div class="d-flex justify-content-between align-items-center">
                <h3><i class="bi bi-bar-chart-line"></i> Enquiries Report</h3>
                <div class="bx-legend">
                    <span><i class="bi bi-circle-fill" style="color:#FF4B33"></i> Leads</span>
                    <span><i class="bi bi-circle-fill" style="color:#3B3BC8"></i> Contacts</span>
                    <span class="bx-pillsel">Last 6 months</span>
                </div>
            </div>
            <svg viewBox="0 0 <?= $W ?> <?= $H ?>" preserveAspectRatio="none" class="bx-chart" role="img" aria-label="Leads and contacts over the last 6 months">
                <?php for ($g = 0; $g < 5; $g++): $gy = $padT + $g * (($H - $padT - $padB) / 4); ?>
                    <line x1="0" y1="<?= $gy ?>" x2="<?= $W ?>" y2="<?= $gy ?>" stroke="#EFEFEF" stroke-width="1"/>
                <?php endfor; ?>
                <path d="<?= $contactPath ?>" fill="none" stroke="#3B3BC8" stroke-width="2.5" stroke-linecap="round" vector-effect="non-scaling-stroke"/>
                <path d="<?= $leadPath ?>" fill="none" stroke="#FF4B33" stroke-width="2.5" stroke-linecap="round" vector-effect="non-scaling-stroke"/>
            </svg>
            <div class="bx-xaxis"><?php foreach ($months as $m): ?><span><?= e($m['label']) ?></span><?php endforeach; ?></div>
        </div>

        <div class="bx-two">
            <!-- Content breakdown -->
            <div class="bx-card">
                <h3><i class="bi bi-collection"></i> Content Overview</h3>
                <?php if (!$contentBreakdown): ?>
                    <p class="text-muted mt-3 mb-0" style="font-size:.8rem">No content yet.</p>
                <?php endif; ?>
                <?php foreach (array_slice($contentBreakdown, 0, 6) as $i => $row):
                    $type = (string) $row['content_type'];
                    $href = $type === 'service_detail' ? '/admin/services.php' : '/admin/content.php?section=' . urlencode('collection:' . $type);
                ?>
                    <div class="bx-row">
                        <span class="n"><?= $i + 1 ?></span>
                        <span class="t"><?= e(str_replace('_', ' ', $type)) ?></span>
                        <span class="c"><?= (int) $row['c'] ?> items</span>
                        <a class="bx-mini" href="<?= e($href) ?>">View</a>
                    </div>
                <?php endforeach; ?>
                <div class="bx-row" style="background:#0E0E0E;color:#fff">
                    <span class="t">Total content items</span><span><?= $totalContentItems ?></span>
                </div>
            </div>

            <!-- Calendar -->
            <div class="bx-card">
                <h3><i class="bi bi-calendar3"></i> This Month</h3>
                <div class="text-center fw-semibold mt-3" style="font-size:.85rem"><?= date('F') ?></div>
                <table class="bx-cal">
                    <thead><tr><?php foreach (['Su','Mo','Tu','We','Th','Fr','Sa'] as $dn): ?><th><?= $dn ?></th><?php endforeach; ?></tr></thead>
                    <tbody>
                    <?php
                    $cell = 0;
                    echo '<tr>';
                    for ($b = 0; $b < $firstDow; $b++) { echo '<td></td>'; $cell++; }
                    for ($day = 1; $day <= $daysInMonth; $day++) {
                        if ($cell % 7 === 0 && $cell > 0) echo '</tr><tr>';
                        $cls = ($day === $todayNum ? 'today ' : '') . (isset($leadDays[$day]) ? 'has' : '');
                        $title = isset($leadDays[$day]) ? $leadDays[$day] . ' lead(s)' : '';
                        echo '<td><span class="' . $cls . '" title="' . $title . '">' . $day . '</span></td>';
                        $cell++;
                    }
                    while ($cell % 7 !== 0) { echo '<td></td>'; $cell++; }
                    echo '</tr>';
                    ?>
                    </tbody>
                </table>
                <div class="text-muted mt-2" style="font-size:.68rem"><i class="bi bi-circle-fill" style="color:#FF4B33;font-size:.4rem"></i> days with new leads</div>
            </div>
        </div>
    </div>

    <!-- ================= RIGHT ================= -->
    <div class="bx-right">

        <div>
            <div class="bx-notice">
                <?php if ($latestLead): ?>
                    New enquiry from <b><?= e($latestLead['name']) ?></b><br>
                    Received <?= e(formatDatabaseDateTime((string) $latestLead['created_at'])) ?>
                <?php else: ?>
                    No enquiries yet.<br>Share your <b>website</b> to start getting leads.
                <?php endif; ?>
            </div>
            <div class="bx-frame">
                <div class="bx-frame-inner">
                    <div class="bx-an-top">
                        <h4>Leads This Week</h4>
                        <svg viewBox="0 0 <?= $AW ?> <?= $AH ?>" preserveAspectRatio="none" style="width:100%;height:110px" role="img" aria-label="Leads in the last 7 days">
                            <defs><linearGradient id="bxg" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#FF4B33" stop-opacity=".85"/><stop offset="1" stop-color="#FF4B33" stop-opacity=".05"/></linearGradient></defs>
                            <path d="<?= $areaFill ?>" fill="url(#bxg)"/>
                            <path d="<?= $areaLine ?>" fill="none" stroke="#FF4B33" stroke-width="2" vector-effect="non-scaling-stroke"/>
                        </svg>
                        <div class="bx-xaxis" style="font-size:.62rem"><?php foreach ($days as $d): ?><span><?= e($d['label']) ?></span><?php endforeach; ?></div>
                    </div>
                    <div class="bx-an-bot">
                        <div class="hd">Latest Lead: <b><?= $latestLead ? e($latestLead['service'] ?? 'General') : 'None' ?></b></div>
                        <div class="dl"><?= array_sum($daySeries) ?> new in the last 7 days</div>
                        <div class="d-flex justify-content-between align-items-end gap-2">
                            <span>Total <?= $leadCount ?> leads · <?= $blogCount ?> blogs · <?= $partnerCount ?> partners</span>
                            <a href="/admin/leads.php" class="bx-an-btn">Lead Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bx-card">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h3><i class="bi bi-people-fill"></i> Recent Leads</h3>
                <a href="/admin/leads.php" class="bx-pillsel">View all</a>
            </div>
            <?php if (empty($recentLeads)): ?>
                <p class="text-muted mt-3 mb-0" style="font-size:.85rem"><i class="bi bi-inbox"></i> No inquiries logged yet.</p>
            <?php else: foreach (array_slice($recentLeads, 0, 4) as $lead): ?>
                <div class="bx-member">
                    <div class="bx-av"><?= e($initial((string) $lead['name'])) ?></div>
                    <div style="min-width:0">
                        <b><?= e($lead['name']) ?></b>
                        <span><?= e($lead['service'] ?? 'General') ?></span>
                    </div>
                    <span class="when"><?= e(formatDatabaseDateTime((string) $lead['created_at'])) ?></span>
                </div>
            <?php endforeach; endif; ?>
        </div>

        <div class="bx-card">
            <h3 class="mb-2"><i class="bi bi-lightning-charge"></i> Quick Actions</h3>
            <div class="bx-row"><span class="t">B2B Exhibition SEO</span><a class="bx-mini" href="/admin/services.php?edit=68">Edit</a></div>
            <div class="bx-row"><span class="t">SEO in Delhi</span><a class="bx-mini" href="/admin/services.php?edit=69">Edit</a></div>
            <div class="bx-row"><span class="t">Manage Services (<?= $serviceCount ?>)</span><a class="bx-mini" href="/admin/services.php">View</a></div>
        </div>
    </div>

    <!-- ================= FULL-WIDTH LEADS TABLE ================= -->
    <div class="bx-card" style="grid-column: 1 / -1; padding: 0; overflow: hidden;">
        <div style="padding: 20px 22px; display:flex; justify-content:space-between; align-items:center;">
            <h3><i class="bi bi-inbox"></i> Recent Website Leads</h3>
            <a href="/admin/leads.php" class="bx-pillsel">View all</a>
        </div>
        <?php if (empty($recentLeads)): ?>
            <div style="padding: 40px; text-align: center; color: #888;">No inquiries logged yet.</div>
        <?php else: ?>
            <div style="overflow-x:auto">
                <table class="bx-table" id="bxLeadTable">
                    <thead><tr><th>Client / Company</th><th>Contact Info</th><th>Service Requested</th><th>Date Received</th></tr></thead>
                    <tbody>
                    <?php foreach ($recentLeads as $lead): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bx-av" style="width:38px;height:38px"><?= e($initial((string) $lead['name'])) ?></div>
                                    <div>
                                        <div class="fw-semibold"><?= e($lead['name']) ?></div>
                                        <div style="font-size:.76rem;color:#888"><?= e($lead['company'] ?? 'Individual') ?></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-medium"><?= e($lead['email']) ?></div>
                                <div style="font-size:.76rem;color:#888"><?= e($lead['phone'] ?? '—') ?></div>
                            </td>
                            <td><span style="background:#F6F6F6;border:1px solid #EAEAEA;padding:5px 12px;border-radius:99px;font-size:.76rem;font-weight:500"><?= e($lead['service'] ?? 'General') ?></span></td>
                            <td style="color:#666;font-size:.8rem"><?= formatDatabaseDateTime((string) $lead['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
// live filter for the recent-leads table
document.getElementById('bxSearch')?.addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('#bxLeadTable tbody tr').forEach(tr => {
        tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
});
</script>

<?php require_once __DIR__ . '/templates/footer.php'; ?>