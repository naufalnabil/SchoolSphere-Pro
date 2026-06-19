<?php
/**
 * SchoolSphere-Pro — Path Helpers
 *
 * Helper untuk menghindari penulisan path manual berulang.
 * Semua path relatif terhadap root project (SchoolSphere-Pro/).
 */

/**
 * Root project path.
 */
function base_path(string $path = ''): string
{
    static $root = null;
    if ($root === null) {
        // public/index.php → naik 2 level ke root project
        $root = dirname(__DIR__, 2);
    }
    return $root . ($path ? DIRECTORY_SEPARATOR . ltrim(str_replace('/', DIRECTORY_SEPARATOR, $path), DIRECTORY_SEPARATOR) : '');
}

/**
 * Path ke folder app/.
 */
function app_path(string $path = ''): string
{
    return base_path('app' . ($path ? '/' . $path : ''));
}

/**
 * Path ke folder app/views/.
 */
function view_path(string $path = ''): string
{
    return app_path('views' . ($path ? '/' . $path : ''));
}

/**
 * Path ke folder app/components/.
 */
function component_path(string $path = ''): string
{
    return app_path('components' . ($path ? '/' . $path : ''));
}

/**
 * Path ke folder public/.
 */
function public_path(string $path = ''): string
{
    return base_path('public' . ($path ? '/' . $path : ''));
}

/**
 * Path ke folder config/.
 */
function config_path(string $path = ''): string
{
    return base_path('config' . ($path ? '/' . $path : ''));
}

/**
 * Path ke folder resources/.
 */
function resource_path(string $path = ''): string
{
    return base_path('resources' . ($path ? '/' . $path : ''));
}

/**
 * Menghasilkan URL relatif untuk asset public (CSS, JS, images).
 * Berdasarkan base_url di config/app.php.
 *
 * Contoh: asset_url('css/app.css') → '/SchoolSphere-Pro/public/assets/css/app.css'
 */
function asset_url(string $path = ''): string
{
    static $baseUrl = null;
    if ($baseUrl === null) {
        $config = require config_path('app.php');
        $baseUrl = rtrim($config['base_url'], '/');
    }
    return $baseUrl . '/assets/' . ltrim($path, '/');
}
