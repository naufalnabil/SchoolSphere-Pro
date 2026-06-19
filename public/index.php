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
    'dev',
    'progress',
    'design-system',
    'kontak'
];

// Fallback ke home jika halaman tidak valid
if (!in_array($page, $validPages, true)) {
    $page = 'home';
}

// ── Controller Sederhana ───────────────────────────────────

$commonData = [
    'config'     => $config,
    'site'       => $site,
    'activePage' => $page,
];

switch ($page) {
    case 'dev':
    case 'progress':
        $pageTitle = 'Development Progress — ' . $config['name'];
        $metaDescription = 'Halaman internal progress development SchoolSphere-Pro.';
        render_view('public/dev.php', array_merge($commonData, [
            'pageTitle'       => $pageTitle,
            'metaDescription' => $metaDescription,
        ]));
        break;

    case 'design-system':
        $pageTitle = 'Design System Preview — ' . $config['name'];
        $metaDescription = 'Preview komponen UI Design System.';
        render_view('public/design-system.php', array_merge($commonData, [
            'pageTitle'       => $pageTitle,
            'metaDescription' => $metaDescription,
        ]));
        break;

    case 'kontak':
        $pageTitle = 'Kontak Kami — ' . $config['name'];
        $metaDescription = 'Informasi kontak dan lokasi sekolah.';
        render_view('public/kontak.php', array_merge($commonData, [
            'pageTitle'       => $pageTitle,
            'metaDescription' => $metaDescription,
        ]));
        break;

    case 'home':
    default:
        $pageTitle = $config['name'] . ' — Beranda Sekolah';
        $metaDescription = 'Selamat datang di website resmi sekolah kami.';
        render_view('public/home.php', array_merge($commonData, [
            'pageTitle'       => $pageTitle,
            'metaDescription' => $metaDescription,
        ]));
        break;
}
