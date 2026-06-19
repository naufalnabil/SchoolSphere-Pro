# Technical Architecture — PHP Native Modular

## 1. Stack

Wajib:
- PHP native;
- Laragon;
- Apache;
- MySQL/MariaDB;
- phpMyAdmin;
- HTML, CSS, JavaScript;
- Antigravity sebagai AI coding assistant.

Tidak digunakan pada tahap awal:
- React;
- Supabase;
- Laravel;
- Composer package berat;
- build system kompleks.

Catatan:
Laravel boleh dipertimbangkan di masa depan, tetapi proyek awal ini harus tetap PHP native modular.

## 2. Struktur Folder

Disarankan:

```txt
SchoolSphere-Pro/
├── app/
│   ├── controllers/
│   │   ├── PublicController.php
│   │   └── AdminController.php
│   ├── models/
│   │   ├── BaseModel.php
│   │   ├── SiteSetting.php
│   │   ├── News.php
│   │   └── ...
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── public.php
│   │   │   └── admin.php
│   │   ├── public/
│   │   │   ├── home.php
│   │   │   ├── berita.php
│   │   │   └── ...
│   │   └── admin/
│   ├── components/
│   │   ├── public/
│   │   │   ├── navbar.php
│   │   │   ├── footer.php
│   │   │   ├── section-wrapper.php
│   │   │   ├── section-header.php
│   │   │   └── sections/
│   │   │       ├── hero-section.php
│   │   │       ├── quick-access-section.php
│   │   │       └── ...
│   │   └── admin/
│   ├── helpers/
│   │   ├── path.php
│   │   ├── view.php
│   │   ├── component.php
│   │   ├── security.php
│   │   └── format.php
│   └── middleware/
├── config/
│   ├── app.php
│   └── database.php
├── database/
│   ├── schema.sql
│   └── seed_minimal.sql
├── docs/
├── public/
│   ├── index.php
│   ├── assets/
│   │   ├── css/
│   │   │   └── app.css
│   │   ├── js/
│   │   │   └── app.js
│   │   └── images/
├── resources/
│   └── fixtures/
│       ├── site.php
│       ├── modules.php
│       ├── homepage.php
│       └── ...
└── storage/
    └── uploads/
```

## 3. Public Entry Point

Semua akses public diarahkan ke:

```txt
public/index.php
```

Jangan biarkan file sensitif diakses langsung.

## 4. Helper Path

Buat helper path seperti:
- `base_path()`;
- `app_path()`;
- `view_path()`;
- `component_path()`;
- `public_path()`;
- `asset_url()`.

Tujuan:
- tidak menulis path manual berulang;
- mudah pindah folder;
- include lebih rapi.

## 5. View dan Component

View halaman:
- mengatur halaman besar;
- menerima data dari controller;
- memanggil component.

Component:
- menampilkan potongan UI;
- tidak boleh menjalankan query database;
- boleh menerima variabel seperti `$section`, `$items`, `$settings`.

## 6. Controller

Controller:
- mengambil data;
- menentukan halaman;
- mengirim data ke view.

Controller tidak boleh berisi markup HTML panjang.

## 7. Model

Model:
- berisi query database;
- tidak boleh berisi HTML.

Contoh:
```php
class News
{
    public static function publishedLimit(int $limit = 3): array
    {
        // query database
    }
}
```

## 8. Fixture Development

Sebelum database:
- pakai file fixture di `resources/fixtures`;
- fixture hanya untuk development;
- jangan tampilkan konten palsu pada final production.

Contoh:
```php
$site = require base_path('resources/fixtures/site.php');
```

## 9. Conditional Rendering

Homepage harus membentuk `$visibleSections`.

Contoh:
```php
$visibleSections = [];

if (is_module_enabled('quick_access') && !empty($quickLinks)) {
    $visibleSections[] = [
        'key' => 'quick_access',
        'component' => 'public/sections/quick-access-section.php',
        'data' => $quickLinks,
        'title' => 'Layanan Digital'
    ];
}
```

Render:
```php
foreach ($visibleSections as $index => $section) {
    $tone = section_tone($index);
    include component_path('public/section-wrapper.php');
}
```

## 10. CSS Architecture

Satu file awal boleh:
```txt
public/assets/css/app.css
```

Namun di dalamnya harus terstruktur:
1. reset/base;
2. tokens;
3. layout;
4. components;
5. sections;
6. utilities;
7. responsive.

Dilarang:
- CSS acak tanpa komentar;
- inline style besar;
- menumpuk class tidak jelas.

## 11. JavaScript

Gunakan JS ringan untuk:
- mobile drawer;
- sticky navbar;
- dropdown;
- smooth reveal;
- lightbox galeri;
- form small interaction.

Jangan membuat SPA kompleks.

## 12. Database Layer

Saat backend dimulai:
- gunakan PDO;
- prepared statement;
- jangan `mysqli_query` tersebar di view;
- jangan query langsung di component.

## 13. Routing Sederhana

Pada tahap awal routing bisa sederhana:
```php
$page = $_GET['page'] ?? 'home';
```

Nanti bisa dibuat lebih rapi dengan router kecil.

## 14. Keamanan Dasar

Wajib:
- escape output dengan `htmlspecialchars`;
- CSRF untuk form admin;
- prepared statement;
- validasi upload;
- session login aman;
- proteksi folder upload;
- role check untuk admin.

## 15. Cara Berpikir

Yang benar:
```txt
data → controller → view → component → CSS
```

Yang salah:
```txt
query + HTML + CSS + JS + session campur dalam satu file
```
