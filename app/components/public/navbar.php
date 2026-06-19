<?php
/**
 * SchoolSphere-Pro — Navbar Component (Public)
 *
 * Komponen navbar sticky untuk halaman public.
 * Menerima data melalui variabel — tidak menjalankan query database.
 *
 * Variabel yang diharapkan:
 * @var array  $site      Data identitas dari fixture/database
 * @var string $activePage Halaman aktif saat ini (untuk active state)
 */

$siteName  = e($site['school_name'] ?? 'SchoolSphere-Pro');
$siteShort = e($site['school_short_name'] ?? 'SSP');
$navMenus  = $site['nav_menus'] ?? [];
$currentPage = $activePage ?? 'home';
?>

<header class="navbar" id="navbar">
    <div class="navbar__container container">

        <!-- Brand -->
        <a href="?page=home" class="navbar__brand" aria-label="<?= $siteName ?> — Beranda">
            <span class="navbar__brand-icon" aria-hidden="true">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="36" height="36" rx="10" fill="currentColor" opacity="0.12"/>
                    <path d="M18 8L22 14H26L22 19L24 26L18 22L12 26L14 19L10 14H14L18 8Z" fill="currentColor" opacity="0.85"/>
                </svg>
            </span>
            <span class="navbar__brand-text">
                <span class="navbar__brand-name"><?= $siteName ?></span>
            </span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="navbar__nav" id="navbar-nav" aria-label="Navigasi utama">
            <ul class="navbar__menu">
                <?php foreach ($navMenus as $menu): ?>
                    <?php
                        $menuUrl = $menu['url'] ?? '#';
                        $menuLabel = e($menu['label'] ?? '');
                        // Determine active state dari URL parameter
                        $pageParam = '';
                        if (preg_match('/page=([^&]+)/', $menuUrl, $m)) {
                            $pageParam = $m[1];
                        }
                        $isActive = ($pageParam === $currentPage);
                    ?>
                    <li class="navbar__menu-item">
                        <a href="<?= e($menuUrl) ?>"
                           class="navbar__menu-link<?= $isActive ? ' navbar__menu-link--active' : '' ?>"
                           <?= $isActive ? 'aria-current="page"' : '' ?>>
                            <?= $menuLabel ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <!-- Mobile Toggle -->
        <button class="navbar__toggle" id="navbar-toggle"
                aria-label="Buka menu navigasi"
                aria-expanded="false"
                aria-controls="mobile-drawer">
            <span class="navbar__toggle-bar"></span>
            <span class="navbar__toggle-bar"></span>
            <span class="navbar__toggle-bar"></span>
        </button>
    </div>

    <!-- Mobile Drawer -->
    <div class="drawer" id="mobile-drawer" aria-hidden="true">
        <div class="drawer__overlay" id="drawer-overlay"></div>
        <div class="drawer__panel">
            <div class="drawer__header">
                <span class="drawer__brand"><?= $siteName ?></span>
                <button class="drawer__close" id="drawer-close" aria-label="Tutup menu">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>
            <nav class="drawer__nav" aria-label="Menu mobile">
                <ul class="drawer__menu">
                    <?php foreach ($navMenus as $menu): ?>
                        <?php
                            $menuUrl = $menu['url'] ?? '#';
                            $menuLabel = e($menu['label'] ?? '');
                            $pageParam = '';
                            if (preg_match('/page=([^&]+)/', $menuUrl, $m)) {
                                $pageParam = $m[1];
                            }
                            $isActive = ($pageParam === $currentPage);
                        ?>
                        <li>
                            <a href="<?= e($menuUrl) ?>"
                               class="drawer__link<?= $isActive ? ' drawer__link--active' : '' ?>"
                               <?= $isActive ? 'aria-current="page"' : '' ?>>
                                <?= $menuLabel ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>
