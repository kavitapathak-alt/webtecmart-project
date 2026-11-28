<?php if (!empty($_SESSION['admin_logged_in'])): ?>
        </main> <!-- /.adm-body -->

        <!-- Admin Footer -->
        <footer class="adm-footer">
            <div class="adm-footer-inner">
                <div class="adm-footer-brand">
                    &copy; <?= date('Y') ?> <strong>WebTecMart</strong> Content Management System. All rights reserved.
                </div>
                <div class="adm-footer-links">
                    <a href="/" target="_blank" class="adm-footer-link">
                        Visit Live Site
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7"/><path d="M7 7h10v10"/></svg>
                    </a>
                </div>
            </div>
        </footer>

    </div> <!-- /.adm-main -->
</div> <!-- /.adm-layout -->

<style>
    /* ============================================================
       PREMIUM ADMIN FOOTER
       ============================================================ */
    .adm-footer {
        background: #FFFFFF;
        border-top: 1px solid rgba(26, 6, 19, 0.08);
        padding: 20px 32px;
        margin-top: auto;
        font-family: 'Plus Jakarta Sans', -apple-system, sans-serif;
    }

    .adm-footer-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .adm-footer-brand {
        font-size: 0.85rem;
        color: #6C6474;
        font-weight: 500;
        letter-spacing: -0.01em;
    }

    .adm-footer-brand strong {
        color: #C4007A;
        font-weight: 700;
        margin: 0 2px;
    }

    .adm-footer-links {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .adm-footer-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.85rem;
        font-weight: 600;
        color: #1A0613;
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 8px;
        transition: all 0.2s ease;
        background: transparent;
    }

    .adm-footer-link:hover {
        background: rgba(196, 0, 122, 0.05);
        color: #C4007A;
    }

    .adm-footer-link svg {
        transition: transform 0.2s ease;
    }

    .adm-footer-link:hover svg {
        transform: translate(2px, -2px);
    }

    /* ============================================================
       RESPONSIVE
       ============================================================ */
    @media (max-width: 768px) {
        .adm-footer {
            padding: 20px 20px;
        }
        .adm-footer-inner {
            flex-direction: column;
            text-align: center;
            gap: 12px;
        }
        .adm-footer-brand {
            font-size: 0.8rem;
        }
        .adm-footer-link {
            font-size: 0.8rem;
            padding: 8px 16px;
            background: #FAFAFC;
            border: 1px solid rgba(196, 0, 122, 0.1);
        }
    }
</style>

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