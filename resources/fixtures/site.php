<?php
/**
 * SchoolSphere-Pro — Site Fixture (Development Only)
 *
 * ⚠️  FILE INI HANYA UNTUK DEVELOPMENT.
 * ⚠️  Bukan data resmi sekolah.
 * ⚠️  Akan diganti dengan data dari database pada tahap backend.
 *
 * Data ini digunakan agar komponen layout (navbar, footer)
 * bisa menampilkan placeholder identitas development.
 */

return [
    // Identitas development — BUKAN data sekolah sesungguhnya
    'school_name'       => 'SchoolSphere-Pro',
    'school_short_name' => 'SSP',
    'tagline'           => 'Website Sekolah Modular',

    // Kontak development (placeholder netral)
    'address'           => '',
    'phone'             => '',
    'whatsapp'          => '',
    'email'             => '',
    'website_url'       => '',
    'maps_embed_url'    => '',

    // Kepala sekolah — kosong di tahap development
    'principal_name'    => '',
    'principal_message' => '',

    // Visual — kosong, tidak memakai gambar dummy
    'logo_path'         => '',
    'hero_image_path'   => '',

    // Menu navigasi development
    'nav_menus' => [
        ['label' => 'Beranda',  'url' => '?page=home',    'active' => true],
        ['label' => 'Profil',   'url' => '?page=profil',  'active' => false],
        ['label' => 'Berita',   'url' => '?page=berita',  'active' => false],
        ['label' => 'Galeri',   'url' => '?page=galeri',  'active' => false],
        ['label' => 'Layanan',  'url' => '?page=layanan', 'active' => false],
        ['label' => 'Kontak',   'url' => '?page=kontak',  'active' => false],
    ],

    // Footer links development
    'footer_links' => [
        ['label' => 'Beranda', 'url' => '?page=home'],
        ['label' => 'Profil',  'url' => '?page=profil'],
        ['label' => 'Berita',  'url' => '?page=berita'],
        ['label' => 'Galeri',  'url' => '?page=galeri'],
        ['label' => 'Kontak',  'url' => '?page=kontak'],
    ],
];
