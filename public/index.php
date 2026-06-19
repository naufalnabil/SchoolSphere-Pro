<?php
/**
 * SchoolSphere-Pro — Public Entry Point
 *
 * Semua akses public diarahkan melalui file ini.
 * Jangan biarkan file sensitif diakses langsung.
 */

// ── Bootstrap ──────────────────────────────────────────────

// Load helpers (urutan penting: path dulu)
require_once __DIR__ . '/../app/helpers/path.php';
require_once __DIR__ . '/../app/helpers/security.php';
require_once __DIR__ . '/../app/helpers/view.php';

// Load konfigurasi
$config = require config_path('app.php');

// Set timezone
date_default_timezone_set($config['timezone'] ?? 'Asia/Jakarta');

// ── Load Site Fixture ──────────────────────────────────────
// Pada tahap backend, ini diganti dengan query database.
$site = require resource_path('fixtures/site.php');

// ── Routing Sederhana ──────────────────────────────────────

$page = $_GET['page'] ?? 'home';

// Whitelist halaman yang valid (akan bertambah seiring tahap)
$validPages = [
    'home',
];

// Fallback ke home jika halaman tidak valid
if (!in_array($page, $validPages, true)) {
    $page = 'home';
}

// ── Controller Sederhana ───────────────────────────────────

switch ($page) {
    case 'home':
    default:
        $pageTitle = $config['name'] . ' — Website Sekolah Modular';
        $metaDescription = 'Platform website sekolah modular yang tampil premium, mudah dikelola, dan siap dikembangkan secara bertahap.';

        render_view('public/home.php', [
            'pageTitle'       => $pageTitle,
            'metaDescription' => $metaDescription,
            'config'          => $config,
            'site'            => $site,
            'activePage'      => $page,
        ]);
        break;
}
