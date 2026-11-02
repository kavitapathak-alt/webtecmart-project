<?php if (!empty($_SESSION['admin_logged_in'])): ?>
        </main> <!-- /.adm-body -->

        <!-- Admin Footer -->
        <footer style="padding: 16px 28px; background: #FFFFFF; border-top: 1px solid #E2E8F0; font-size: 0.8rem; color: #64748B; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
            <div>
                &copy; <?= date('Y') ?> <strong style="color: #C4007A;">WebTecMart</strong> Content Management System. All rights reserved.
            </div>
            <div>
                <a href="/" target="_blank" style="color: #64748B; text-decoration: none; font-weight: 600;">Visit Live Site &rarr;</a>
            </div>
        </footer>

    </div> <!-- /.adm-main -->
</div> <!-- /.adm-layout -->

<script>
(function() {
    const sidebar = document.getElementById('admSidebar');
    const toggle = document.getElementById('admSidebarToggle');
    const overlay = document.getElementById('admOverlay');

    if (!sidebar || !toggle) return;

    function openSidebar() {
        sidebar.classList.add('open');
        overlay?.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        sidebar.classList.remove('open');
        overlay?.classList.remove('open');
        document.body.style.overflow = '';
    }

    toggle.addEventListener('click', () => {
        sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
    });

    overlay?.addEventListener('click', closeSidebar);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeSidebar();
    });
})();
</script>
<?php endif; ?>

</body>
</html>
