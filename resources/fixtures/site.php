<?php
/**
 * SchoolSphere-Pro — Site Fixture (Development Only)
 *
 * ⚠️  FILE INI HANYA UNTUK DEVELOPMENT / PROTOTYPING FRONTEND.
 * ⚠️  Bukan data resmi sekolah.
 * ⚠️  Akan diganti dengan data dari database pada tahap backend.
 *
 * Struktur data di bawah ini adalah DRAF DATA CONTRACT yang
 * nantinya akan dikembalikan oleh Model/Query database.
 */

return [
    // ── IDENTITAS SEKOLAH ──────────────────────────────────────
    'school_name'       => 'SchoolSphere-Pro',
    'school_short_name' => 'SSP',
    'tagline'           => 'Website Sekolah Modular',

    // Kontak (kosong, untuk menguji empty state)
    'address'           => null,
    'phone'             => null,
    'whatsapp'          => null,
    'email'             => null,
    'website_url'       => null,
    'maps_embed_url'    => null,

    // Kepala sekolah (kosong, untuk menguji empty state)
    'principal_name'    => null,
    'principal_message' => null,

    // Visual (kosong, tanpa gambar dummy)
    'logo_path'         => null,
    'hero_image_path'   => null,

    // ── PENGATURAN SECTION HOMEPAGE ────────────────────────────
    // Atur false untuk menyembunyikan section dari homepage
    'homepage_sections' => [
        'profile'       => true,
        'services'      => true,
        'announcements' => true,
        'news'          => true,
        'gallery'       => true,
        'contact'       => true,
    ],

    // ── DATA KONTEN (EMPTY STATES) ─────────────────────────────
    
    /**
     * Services / Layanan
     * Contract: array of [title, description, icon_svg, url, is_active]
     */
    'services' => [],

    /**
     * Announcements / Pengumuman
     * Contract: array of [title, excerpt, date, url, is_published]
     */
    'announcements' => [],

    /**
     * News / Berita
     * Contract: array of [title, excerpt, date, category, image_url, slug, is_published]
     */
    'news' => [],

    /**
     * Gallery / Galeri
     * Contract: array of [title, image_url, caption, is_active]
     */
    'gallery' => [],

    // ── NAVIGASI ───────────────────────────────────────────────
    'nav_menus' => [
        ['label' => 'Beranda',  'url' => '?page=home'],
        ['label' => 'Profil',   'url' => '?page=profil'],
        ['label' => 'Berita',   'url' => '?page=berita'],
        ['label' => 'Galeri',   'url' => '?page=galeri'],
        ['label' => 'Layanan',  'url' => '?page=layanan'],
        ['label' => 'Kontak',   'url' => '?page=kontak'],
    ],

    'footer_links' => [
        ['label' => 'Beranda', 'url' => '?page=home'],
        ['label' => 'Profil',  'url' => '?page=profil'],
        ['label' => 'Berita',  'url' => '?page=berita'],
        ['label' => 'Galeri',  'url' => '?page=galeri'],
        ['label' => 'Kontak',  'url' => '?page=kontak'],
    ],
];
