<?php if (!empty($_SESSION['admin_logged_in'])): ?>
        </main> <!-- /.adm-body -->

        <!-- Admin Footer -->
        <footer class="adm-footer">
            <div class="adm-footer-inner">
                <div class="adm-footer-brand">
                    <span class="adm-footer-dot" aria-hidden="true"></span>
                    <span>&copy; <?= date('Y') ?> <strong>WebTecMart</strong> Content Management System. All rights reserved.</span>
                </div>
                <div class="adm-footer-links">
                    <a href="/" target="_blank" class="adm-footer-link">
                        Visit Live Site
                        <span class="adm-footer-arrow">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7"/><path d="M7 7h10v10"/></svg>
                        </span>
                    </a>
                </div>
            </div>
        </footer>

    </div> <!-- /.adm-main -->
</div> <!-- /.adm-layout -->

<style>
    /* ============================================================
       ADMIN FOOTER — matches the black / lime admin theme
       ============================================================ */
    .adm-footer {
        --ft-ink: #0E0E0E;
        --ft-lime: var(--adm-lime, #E6F73A);
        background: transparent;
        border: 0;
        padding: 8px 0 24px;
        margin-top: auto;
        font-family: var(--adm-font, 'Space Grotesk', system-ui, -apple-system, sans-serif);
    }

    .adm-footer-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 14px 20px;
        max-width: none;
        margin: 0;
        padding: 12px 14px 12px 22px;
        background: #FFFFFF;
        border: 1px solid #EDEDED;
        border-radius: 999px;
    }

    .adm-footer-brand {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.84rem;
        color: #777;
        font-weight: 500;
        letter-spacing: 0;
    }

    .adm-footer-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--ft-lime);
        box-shadow: 0 0 0 4px rgba(230, 247, 58, 0.35);
        flex-shrink: 0;
    }

    .adm-footer-brand strong {
        color: var(--ft-ink);
        font-weight: 700;
        margin: 0 1px;
    }

    .adm-footer-links {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .adm-footer-link {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 0.84rem;
        font-weight: 600;
        color: #fff;
        text-decoration: none;
        padding: 7px 8px 7px 18px;
        border-radius: 999px;
        background: var(--ft-ink);
        transition: background 0.2s ease, color 0.2s ease;
    }

    .adm-footer-arrow {
        display: grid;
        place-items: center;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: var(--ft-lime);
        color: var(--ft-ink);
    }

    .adm-footer-link:hover {
        background: #2a2a2a;
        color: var(--ft-lime);
    }

    .adm-footer-arrow svg {
        transition: transform 0.2s ease;
    }

    .adm-footer-link:hover .adm-footer-arrow svg {
        transform: translate(2px, -2px);
    }

    /* ============================================================
       RESPONSIVE
       ============================================================ */
    @media (max-width: 768px) {
        .adm-footer {
            padding: 8px 0 20px;
        }
        .adm-footer-inner {
            flex-direction: column;
            text-align: center;
            gap: 12px;
            padding: 16px;
            border-radius: 26px;
        }
        .adm-footer-brand {
            font-size: 0.8rem;
            justify-content: center;
        }
        .adm-footer-link {
            font-size: 0.82rem;
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