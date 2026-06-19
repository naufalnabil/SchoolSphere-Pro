<?php
/**
 * SchoolSphere-Pro — Setup Super Admin
 */
?>

<div style="text-align: center; margin-bottom: var(--sp-6);">
    <h1 style="font-size: var(--text-2xl); margin-bottom: var(--sp-2);">Setup Super Admin</h1>
    <p style="color: var(--clr-text-muted);">Buat akun administrator utama untuk pertama kali.</p>
</div>

<?php if (!empty($errorMsg)): ?>
    <div class="admin-alert admin-alert--error">
        <?= e($errorMsg) ?>
    </div>
<?php endif; ?>

<form action="?page=admin-setup" method="POST">
    <?= csrf_field() ?>
    
    <div class="form-group" style="margin-bottom: var(--sp-4);">
        <label for="name" class="form-label" style="display: block; margin-bottom: var(--sp-1); font-weight: 500;">Nama Lengkap</label>
        <input type="text" id="name" name="name" class="form-input" required style="width: 100%; padding: var(--sp-2); border: 1px solid var(--admin-border); border-radius: var(--radius-sm);" value="<?= e($_POST['name'] ?? '') ?>">
    </div>
    
    <div class="form-group" style="margin-bottom: var(--sp-4);">
        <label for="email" class="form-label" style="display: block; margin-bottom: var(--sp-1); font-weight: 500;">Email</label>
        <input type="email" id="email" name="email" class="form-input" required style="width: 100%; padding: var(--sp-2); border: 1px solid var(--admin-border); border-radius: var(--radius-sm);" value="<?= e($_POST['email'] ?? '') ?>">
    </div>
    
    <div class="form-group" style="margin-bottom: var(--sp-4);">
        <label for="password" class="form-label" style="display: block; margin-bottom: var(--sp-1); font-weight: 500;">Password</label>
        <input type="password" id="password" name="password" class="form-input" required minlength="8" style="width: 100%; padding: var(--sp-2); border: 1px solid var(--admin-border); border-radius: var(--radius-sm);">
        <small style="color: var(--clr-text-muted); display: block; margin-top: 4px;">Minimal 8 karakter.</small>
    </div>
    
    <div class="form-group" style="margin-bottom: var(--sp-6);">
        <label for="password_confirm" class="form-label" style="display: block; margin-bottom: var(--sp-1); font-weight: 500;">Konfirmasi Password</label>
        <input type="password" id="password_confirm" name="password_confirm" class="form-input" required minlength="8" style="width: 100%; padding: var(--sp-2); border: 1px solid var(--admin-border); border-radius: var(--radius-sm);">
    </div>
    
    <button type="submit" class="btn btn--primary" style="width: 100%; padding: var(--sp-3);">Buat Akun</button>
</form>
