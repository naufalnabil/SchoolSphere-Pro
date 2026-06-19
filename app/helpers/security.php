<?php
/**
 * SchoolSphere-Pro — Security Helpers
 *
 * Helper keamanan dasar.
 * Escape output, sanitasi, dll.
 */

/**
 * Escape output untuk mencegah XSS.
 *
 * Gunakan ini setiap kali menampilkan data dinamis di HTML.
 * Contoh: <?= e($title) ?>
 */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
