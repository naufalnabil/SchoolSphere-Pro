<?php
/**
 * SchoolSphere-Pro — Admin Auth Middleware
 *
 * Middleware untuk memproteksi halaman admin.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!function_exists('is_admin_logged_in')) {
    function is_admin_logged_in()
    {
        return !empty($_SESSION['is_admin_logged_in']) && $_SESSION['is_admin_logged_in'] === true;
    }
}

if (!function_exists('require_admin_login')) {
    function require_admin_login()
    {
        if (!is_admin_logged_in()) {
            header('Location: ?page=admin-login');
            exit;
        }
    }
}

if (!function_exists('current_admin_user')) {
    function current_admin_user()
    {
        if (is_admin_logged_in()) {
            return [
                'id' => $_SESSION['admin_user_id'] ?? null,
                'name' => $_SESSION['admin_user_name'] ?? '',
                'role_key' => $_SESSION['admin_role_key'] ?? '',
            ];
        }
        return null;
    }
}

if (!function_exists('is_super_admin')) {
    function is_super_admin()
    {
        $user = current_admin_user();
        return $user && $user['role_key'] === 'super_admin';
    }
}
