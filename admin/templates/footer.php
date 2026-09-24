<style>
    .admin-shell-footer { margin-top:40px; background:#1a1a1a; color:#a9a2ad; border-top:3px solid #c4007a; }
    .admin-shell-footer-inner { max-width:1280px; margin:0 auto; padding:22px 20px; display:flex; align-items:center; justify-content:space-between; gap:16px; font-size:.78rem; }
    .admin-shell-footer strong { color:#e0398f; }
    .admin-shell-footer a { color:#fff; font-weight:700; }
    @media (max-width:650px) { .admin-shell-footer-inner { align-items:flex-start; flex-direction:column; } }
</style>
<footer class="admin-shell-footer">
    <div class="admin-shell-footer-inner">
        <span>&copy; <?= date('Y') ?> <strong>WebTecMart</strong> Admin Panel</span>
        <a href="/index.php">Open Website</a>
    </div>
</footer>
</body>
</html>
