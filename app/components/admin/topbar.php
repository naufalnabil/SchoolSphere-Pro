<?php
/**
 * SchoolSphere-Pro — Admin Topbar Component
 */
$user = current_admin_user();
?>
<header class="admin-topbar">
    <div class="admin-topbar__left">
        <button type="button" class="admin-topbar__toggle" id="adminSidebarToggle" aria-label="Toggle Sidebar">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
            </svg>
        </button>
        <h1 class="admin-title"><?= isset($pageTitle) ? e($pageTitle) : 'Dashboard' ?></h1>
    </div>
    
    <div class="admin-topbar__right">
        <div class="admin-user-info">
            <span class="admin-user-info__name"><?= e($user['name'] ?? 'Admin') ?></span>
            <span class="admin-user-info__role"><?= e($user['role_key'] ?? '') ?></span>
        </div>
        <a href="?page=admin-logout" class="btn btn--outline btn--sm admin-logout-btn">Keluar</a>
    </div>
</header>
