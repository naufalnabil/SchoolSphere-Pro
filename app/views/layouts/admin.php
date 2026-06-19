<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? e($pageTitle) : 'Admin — SchoolSphere-Pro' ?></title>
    <!-- Kita pinjam css public agar konsisten font/warna dasar, tapi tambah gaya admin khusus -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<?php if (isset($isAuthPage) && $isAuthPage): ?>
    <!-- Layout untuk Login & Setup -->
    <div class="admin-layout admin-layout--auth">
        <div class="auth-card">
            <?= $content ?? '' ?>
        </div>
    </div>
<?php else: ?>
    <!-- Layout untuk Dashboard & Konten Admin -->
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div class="admin-sidebar__brand">
                <svg width="24" height="24" viewBox="0 0 36 36" fill="none">
                    <rect width="36" height="36" rx="8" fill="currentColor" opacity="0.1"/>
                    <path d="M18 8L22 14H26L22 19L24 26L18 22L12 26L14 19L10 14H14L18 8Z" fill="currentColor"/>
                </svg>
                SchoolSphere Admin
            </div>
            <nav>
                <ul class="admin-nav">
                    <li><a href="?page=admin-dashboard" class="admin-nav__link admin-nav__link--active">Dashboard</a></li>
                    <!-- Menu CMS akan ditambahkan di tahap selanjutnya -->
                    <li><a href="?page=home" class="admin-nav__link" target="_blank" style="margin-top: var(--sp-6);">Buka Website ↗</a></li>
                </ul>
            </nav>
        </aside>
        <main class="admin-main">
            <header class="admin-header">
                <h1 class="admin-title"><?= isset($pageTitle) ? e($pageTitle) : 'Dashboard' ?></h1>
                <div class="admin-user">
                    <?php $user = current_admin_user(); ?>
                    <span>Halo, <strong><?= e($user['name'] ?? 'Admin') ?></strong></span>
                    <a href="?page=admin-logout" class="btn btn--outline btn--sm">Keluar</a>
                </div>
            </header>
            
            <div class="admin-content">
                <?= $content ?? '' ?>
            </div>
        </main>
    </div>
<?php endif; ?>

</body>
</html>
