<?php
/**
 * SchoolSphere-Pro — Admin Login
 */
?>

<div style="text-align: center; margin-bottom: var(--sp-6);">
    <h1 style="font-size: var(--text-2xl); margin-bottom: var(--sp-2);">Admin Login</h1>
    <p style="color: var(--clr-text-muted);">Masuk ke panel manajemen SchoolSphere.</p>
</div>

<?php if (!empty($errorMsg)): ?>
    <div class="admin-alert admin-alert--error">
        <?= e($errorMsg) ?>
    </div>
<?php endif; ?>

<?php if (!empty($successMsg)): ?>
    <div class="admin-alert admin-alert--success">
        <?= e($successMsg) ?>
    </div>
<?php endif; ?>

<form action="?page=admin-login" method="POST">
    <?= csrf_field() ?>
    
    <div class="form-group" style="margin-bottom: var(--sp-4);">
        <label for="email" class="form-label" style="display: block; margin-bottom: var(--sp-1); font-weight: 500;">Email</label>
        <input type="email" id="email" name="email" class="form-input" required style="width: 100%; padding: var(--sp-2); border: 1px solid var(--admin-border); border-radius: var(--radius-sm);" value="<?= e($_POST['email'] ?? '') ?>">
    </div>
    
    <div class="form-group" style="margin-bottom: var(--sp-6);">
        <label for="password" class="form-label" style="display: block; margin-bottom: var(--sp-1); font-weight: 500;">Password</label>
        <input type="password" id="password" name="password" class="form-input" required style="width: 100%; padding: var(--sp-2); border: 1px solid var(--admin-border); border-radius: var(--radius-sm);">
    </div>
    
    <button type="submit" class="btn btn--primary" style="width: 100%; padding: var(--sp-3);">Masuk</button>
</form>

<div style="text-align: center; margin-top: var(--sp-6);">
    <a href="?page=home" style="color: var(--clr-text-muted); text-decoration: none; font-size: var(--text-sm);">&larr; Kembali ke Beranda</a>
</div>
