<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= e($metaDescription ?? 'Website Sekolah Modular — SchoolSphere-Pro') ?>">
    <title><?= e($pageTitle ?? 'SchoolSphere-Pro') ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="<?= asset_url('css/app.css') ?>">
</head>
<body>

    <?php
    // ── Navbar ──
    // Load fixture jika $site belum tersedia
    if (!isset($site)) {
        $site = require resource_path('fixtures/site.php');
    }
    $activePage = $activePage ?? ($page ?? 'home');
    include component_path('public/navbar.php');
    ?>

    <main id="main-content">
        <?= $content ?? '' ?>
    </main>

    <?php
    // ── Footer ──
    include component_path('public/footer.php');
    ?>

    <!-- Scripts -->
    <script src="<?= asset_url('js/app.js') ?>"></script>
</body>
</html>
