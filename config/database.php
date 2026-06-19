<?php
/**
 * SchoolSphere-Pro — Database Configuration
 */

// Pastikan helper env sudah diload jika file ini dipanggil langsung
if (function_exists('load_env')) {
    // Asumsi config/database.php berada 1 level di atas root
    load_env(__DIR__ . '/../.env');
}

return [
    'host'      => $_ENV['DB_HOST'] ?? '127.0.0.1',
    'database'  => $_ENV['DB_NAME'] ?? 'school_sphere_pro',
    'username'  => $_ENV['DB_USER'] ?? 'root',
    'password'  => $_ENV['DB_PASS'] ?? '',
    'charset'   => $_ENV['DB_CHARSET'] ?? 'utf8mb4',
    'options'   => [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ],
];
