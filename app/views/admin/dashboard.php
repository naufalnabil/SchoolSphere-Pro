<?php
/**
 * SchoolSphere-Pro — Admin Dashboard
 */
$user = current_admin_user();
?>

<div class="admin-alert admin-alert--success">
    Selamat datang kembali, <?= e($user['name'] ?? 'Admin') ?>. Anda login sebagai <strong><?= e($user['role_key'] ?? '') ?></strong>.
</div>

<div class="grid grid--2" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--sp-6); margin-bottom: var(--sp-8);">
    <div class="admin-card">
        <h3 style="margin-bottom: var(--sp-2); font-size: var(--text-lg); display: flex; align-items: center; justify-content: space-between;">
            Status Autentikasi
            <span class="admin-badge">AKTIF</span>
        </h3>
        <p style="color: var(--clr-text-muted);">Sistem login, session, dan CSRF protection beroperasi normal.</p>
    </div>

    <div class="admin-card">
        <h3 style="margin-bottom: var(--sp-2); font-size: var(--text-lg); display: flex; align-items: center; justify-content: space-between;">
            Status Database
            <span class="admin-badge">CONNECTED</span>
        </h3>
        <p style="color: var(--clr-text-muted);">Koneksi PDO ke MySQL berhasil terjalin.</p>
    </div>
</div>

<h2 style="font-size: var(--text-xl); margin-bottom: var(--sp-4);">Shortcut Modul CMS</h2>
<div class="grid grid--3" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: var(--sp-4);">
    <a href="?page=admin-site-identity" class="admin-card" style="text-decoration: none; color: inherit; transition: transform var(--transition-fast);">
        <h4 style="margin-bottom: var(--sp-1);">Identitas Sekolah</h4>
        <p style="color: var(--clr-text-muted); font-size: var(--text-sm);">Kelola profil dan info institusi</p>
    </a>
    <a href="?page=admin-homepage" class="admin-card" style="text-decoration: none; color: inherit; transition: transform var(--transition-fast);">
        <h4 style="margin-bottom: var(--sp-1);">Beranda</h4>
        <p style="color: var(--clr-text-muted); font-size: var(--text-sm);">Atur susunan section beranda</p>
    </a>
    <a href="?page=admin-news" class="admin-card" style="text-decoration: none; color: inherit; transition: transform var(--transition-fast);">
        <h4 style="margin-bottom: var(--sp-1);">Berita</h4>
        <p style="color: var(--clr-text-muted); font-size: var(--text-sm);">Kelola artikel dan publikasi</p>
    </a>
    <a href="?page=admin-gallery" class="admin-card" style="text-decoration: none; color: inherit; transition: transform var(--transition-fast);">
        <h4 style="margin-bottom: var(--sp-1);">Galeri</h4>
        <p style="color: var(--clr-text-muted); font-size: var(--text-sm);">Album foto kegiatan</p>
    </a>
    <a href="?page=admin-settings" class="admin-card" style="text-decoration: none; color: inherit; transition: transform var(--transition-fast);">
        <h4 style="margin-bottom: var(--sp-1);">Pengaturan</h4>
        <p style="color: var(--clr-text-muted); font-size: var(--text-sm);">Konfigurasi sistem admin</p>
    </a>
</div>
