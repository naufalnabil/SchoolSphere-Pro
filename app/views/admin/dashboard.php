<?php
/**
 * SchoolSphere-Pro — Admin Dashboard
 */
$user = current_admin_user();
?>

<div class="admin-alert admin-alert--success">
    Selamat datang kembali, <?= e($user['name'] ?? 'Admin') ?>. Anda login sebagai <strong><?= e($user['role_key'] ?? '') ?></strong>.
</div>

<div class="grid grid--3" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--sp-6);">
    <div class="admin-card">
        <h3 style="margin-bottom: var(--sp-2); font-size: var(--text-lg);">Status Autentikasi</h3>
        <p style="color: var(--clr-text-muted); margin-bottom: var(--sp-4);">Sistem login dan session telah aktif dan aman.</p>
        <span style="display: inline-block; padding: 4px 8px; background: #dcfce7; color: #166534; border-radius: var(--radius-sm); font-size: var(--text-xs); font-weight: 600;">AKTIF</span>
    </div>

    <div class="admin-card">
        <h3 style="margin-bottom: var(--sp-2); font-size: var(--text-lg);">Status Database</h3>
        <p style="color: var(--clr-text-muted); margin-bottom: var(--sp-4);">Koneksi PDO ke MySQL berhasil terjalin.</p>
        <span style="display: inline-block; padding: 4px 8px; background: #dcfce7; color: #166534; border-radius: var(--radius-sm); font-size: var(--text-xs); font-weight: 600;">CONNECTED</span>
    </div>

    <div class="admin-card">
        <h3 style="margin-bottom: var(--sp-2); font-size: var(--text-lg);">Content Management</h3>
        <p style="color: var(--clr-text-muted); margin-bottom: var(--sp-4);">Modul CMS (Berita, Galeri, Profil) sedang dalam pengembangan.</p>
        <span style="display: inline-block; padding: 4px 8px; background: #f1f5f9; color: #475569; border-radius: var(--radius-sm); font-size: var(--text-xs); font-weight: 600;">COMING SOON</span>
    </div>
</div>
