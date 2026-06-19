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
require_once __DIR__ . '/../app/helpers/env.php';
require_once __DIR__ . '/../app/helpers/database.php';

// Load konfigurasi
$config = require config_path('app.php');

// Set timezone
date_default_timezone_set($config['timezone'] ?? 'Asia/Jakarta');

// ── Load Site Data (Database with Safe Fallback) ─────────────
require_once __DIR__ . '/../app/services/PublicDataService.php';
$dataService = new PublicDataService();
$site = $dataService->getSiteData();

// ── Routing Sederhana ──────────────────────────────────────

$page = $_GET['page'] ?? 'home';

// Whitelist halaman yang valid (akan bertambah seiring tahap)
$validPages = [
    'home',
    'dev',
    'progress',
    'design-system',
    'kontak',
    'profil',
    'layanan',
    'berita',
    'galeri',
    'db-check',
    'admin-setup',
    'admin-login',
    'admin-logout',
    'admin-dashboard'
];

// Fallback ke 404 jika halaman tidak valid
if (!in_array($page, $validPages, true)) {
    $page = 'not-found';
}

// ── Admin Middleware & Service ───────────────────────────────
require_once __DIR__ . '/../app/middleware/admin-auth.php';
require_once __DIR__ . '/../app/services/AuthService.php';
$authService = new AuthService();

// ── Controller Sederhana ───────────────────────────────────

$commonData = [
    'config'      => $config,
    'site'        => $site,
    'dataService' => $dataService,
    'activePage'  => $page,
];

switch ($page) {
    case 'admin-setup':
        if ($authService->isSuperAdminSetup()) {
            die("Super admin sudah tersedia.");
        }
        $errorMsg = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
                $errorMsg = "Token keamanan tidak valid. Silakan coba lagi.";
            } else {
                $name = trim($_POST['name'] ?? '');
                $email = trim($_POST['email'] ?? '');
                $password = $_POST['password'] ?? '';
                $passwordConfirm = $_POST['password_confirm'] ?? '';

                if (empty($name) || empty($email) || empty($password)) {
                    $errorMsg = "Semua kolom wajib diisi.";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorMsg = "Format email tidak valid.";
                } elseif (strlen($password) < 8) {
                    $errorMsg = "Password minimal 8 karakter.";
                } elseif ($password !== $passwordConfirm) {
                    $errorMsg = "Konfirmasi password tidak cocok.";
                } else {
                    $result = $authService->createSuperAdmin($name, $email, $password);
                    if ($result['success']) {
                        header('Location: ?page=admin-login&setup=success');
                        exit;
                    } else {
                        $errorMsg = $result['message'];
                    }
                }
            }
        }
        $pageTitle = 'Setup Super Admin';
        render_view('admin/setup.php', ['isAuthPage' => true, 'pageTitle' => $pageTitle, 'errorMsg' => $errorMsg], 'admin.php');
        break;

    case 'admin-login':
        if (is_admin_logged_in()) {
            header('Location: ?page=admin-dashboard');
            exit;
        }
        $errorMsg = '';
        $successMsg = ($_GET['setup'] ?? '') === 'success' ? 'Setup berhasil. Silakan login.' : '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
                $errorMsg = "Token keamanan tidak valid.";
            } else {
                $email = trim($_POST['email'] ?? '');
                $password = $_POST['password'] ?? '';
                
                $result = $authService->attemptLogin($email, $password);
                if ($result['success']) {
                    header('Location: ?page=admin-dashboard');
                    exit;
                } else {
                    $errorMsg = $result['message'];
                }
            }
        }
        $pageTitle = 'Admin Login';
        render_view('admin/login.php', ['isAuthPage' => true, 'pageTitle' => $pageTitle, 'errorMsg' => $errorMsg, 'successMsg' => $successMsg], 'admin.php');
        break;

    case 'admin-logout':
        $authService->logout();
        header('Location: ?page=admin-login');
        exit;

    case 'admin-dashboard':
        require_admin_login();
        $pageTitle = 'Dashboard Admin';
        render_view('admin/dashboard.php', ['isAuthPage' => false, 'pageTitle' => $pageTitle], 'admin.php');
        break;
    case 'db-check':
        // Halaman test koneksi khusus development
        // Menggunakan try-catch langsung tanpa mengekspos error sensitif ke public
        echo '<!DOCTYPE html><html><head><title>DB Check</title><style>body{font-family:sans-serif;padding:2rem}</style></head><body>';
        echo '<h1>Database Connection Check</h1>';
        try {
            $db = get_db_connection();
            if ($db !== null) {
                echo '<div style="color:green;padding:1rem;border:1px solid green;background:#e8f5e9;"><strong>Sukses:</strong> Database connected.</div>';
            } else {
                echo '<div style="color:red;padding:1rem;border:1px solid red;background:#ffebee;"><strong>Gagal:</strong> Database not configured or connection failed.</div>';
            }
        } catch (Throwable $e) {
            echo '<div style="color:red;padding:1rem;border:1px solid red;background:#ffebee;"><strong>Gagal:</strong> Database not configured or connection failed.</div>';
        }
        echo '<p><a href="?page=home">&larr; Kembali ke Beranda</a></p>';
        echo '</body></html>';
        break;

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

    case 'profil':
        $pageTitle = 'Profil Sekolah — ' . $config['name'];
        $metaDescription = 'Profil dan identitas resmi institusi.';
        render_view('public/profil.php', array_merge($commonData, [
            'pageTitle'       => $pageTitle,
            'metaDescription' => $metaDescription,
        ]));
        break;

    case 'layanan':
        $pageTitle = 'Layanan Sekolah — ' . $config['name'];
        $metaDescription = 'Layanan digital dan fasilitas institusi.';
        render_view('public/layanan.php', array_merge($commonData, [
            'pageTitle'       => $pageTitle,
            'metaDescription' => $metaDescription,
        ]));
        break;

    case 'berita':
        $pageTitle = 'Berita Sekolah — ' . $config['name'];
        $metaDescription = 'Berita terbaru dari sekolah kami.';
        render_view('public/berita.php', array_merge($commonData, [
            'pageTitle'       => $pageTitle,
            'metaDescription' => $metaDescription,
        ]));
        break;

    case 'galeri':
        $pageTitle = 'Galeri Kegiatan — ' . $config['name'];
        $metaDescription = 'Dokumentasi visual kegiatan institusi.';
        render_view('public/galeri.php', array_merge($commonData, [
            'pageTitle'       => $pageTitle,
            'metaDescription' => $metaDescription,
        ]));
        break;

    case 'home':
        $pageTitle = $site['school_name'] . ' — Beranda Sekolah';
        $metaDescription = 'Selamat datang di website resmi sekolah kami.';
        render_view('public/home.php', array_merge($commonData, [
            'pageTitle'       => $pageTitle,
            'metaDescription' => $metaDescription,
        ]));
        break;

    case 'not-found':
    default:
        // Kembalikan header HTTP 404
        http_response_code(404);
        $pageTitle = 'Halaman Tidak Ditemukan — ' . $site['school_name'];
        $metaDescription = 'Halaman yang Anda cari tidak ditemukan.';
        render_view('public/not-found.php', array_merge($commonData, [
            'pageTitle'       => $pageTitle,
            'metaDescription' => $metaDescription,
        ]));
        break;
}
