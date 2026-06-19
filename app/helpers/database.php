<?php
/**
 * SchoolSphere-Pro — Database Helper
 *
 * Mengelola koneksi PDO (Singleton pattern sederhana)
 */

if (!function_exists('get_db_connection')) {
    function get_db_connection()
    {
        static $pdo = null;

        if ($pdo === null) {
            $config = require config_path('database.php');

            $dsn = sprintf(
                "mysql:host=%s;dbname=%s;charset=%s",
                $config['host'],
                $config['database'],
                $config['charset']
            );

            try {
                $pdo = new PDO($dsn, $config['username'], $config['password'], $config['options']);
            } catch (Throwable $e) {
                // Return null jika gagal agar fallback service dapat bekerja dengan aman
                return null;
            }
        }

        return $pdo;
    }
}
