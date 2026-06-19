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
        <?php include __DIR__ . '/../../components/admin/sidebar.php'; ?>
        
        <main class="admin-main">
            <?php include __DIR__ . '/../../components/admin/topbar.php'; ?>
            
            <div class="admin-content">
                <?= $content ?? '' ?>
            </div>
        </main>
    </div>
<?php endif; ?>

<script src="assets/js/admin.js"></script>
</body>
</html>
