# Database Plan — SchoolSphere-Pro

Database dibuat setelah frontend public matang.

## 1. Database

Nama database lokal disarankan:

```sql
schoolsphere_pro
```

Dibuat melalui phpMyAdmin.

## 2. Prinsip Database

1. Gunakan MySQL/MariaDB.
2. Gunakan `utf8mb4_unicode_ci`.
3. Gunakan primary key `id`.
4. Gunakan timestamp `created_at`, `updated_at`.
5. Gunakan soft status seperti `draft`, `published`, `archived`.
6. Jangan simpan password plain text.
7. Jangan membuat data dummy production.

## 3. Tabel Inti

### 3.1 site_settings

Menyimpan identitas sekolah.

Kolom awal:
- `id`
- `school_name`
- `school_short_name`
- `tagline`
- `logo_path`
- `hero_image_path`
- `principal_name`
- `principal_photo_path`
- `principal_message`
- `address`
- `village`
- `district`
- `regency`
- `province`
- `postal_code`
- `phone`
- `whatsapp`
- `email`
- `website_url`
- `maps_embed_url`
- `created_at`
- `updated_at`

### 3.2 theme_settings

Menyimpan tema.

Kolom:
- `id`
- `primary_color`
- `secondary_color`
- `accent_color`
- `background_color`
- `text_color`
- `font_heading`
- `font_body`
- `border_radius`
- `created_at`
- `updated_at`

### 3.3 module_settings

Menyimpan aktif/nonaktif modul.

Kolom:
- `id`
- `module_key`
- `module_name`
- `is_enabled`
- `show_on_homepage`
- `show_in_navbar`
- `show_in_footer`
- `sort_order`

### 3.4 navigation_menus

Menyimpan menu public.

Kolom:
- `id`
- `label`
- `url`
- `module_key`
- `is_active`
- `show_in_header`
- `show_in_footer`
- `sort_order`
- `target`

### 3.5 important_links

Tautan layanan digital.

Kolom:
- `id`
- `title`
- `description`
- `url`
- `icon`
- `is_active`
- `show_on_homepage`
- `show_on_footer`
- `is_primary_cta`
- `sort_order`

### 3.6 pages

Halaman profil/konten statis.

Kolom:
- `id`
- `title`
- `slug`
- `page_type`
- `content`
- `excerpt`
- `featured_image_path`
- `status`
- `show_on_homepage`
- `created_at`
- `updated_at`

### 3.7 posts

Berita.

Kolom:
- `id`
- `title`
- `slug`
- `excerpt`
- `content`
- `featured_image_path`
- `category_id`
- `status`
- `is_featured`
- `show_on_homepage`
- `published_at`
- `created_at`
- `updated_at`

### 3.8 post_categories

Kategori berita.

Kolom:
- `id`
- `name`
- `slug`
- `sort_order`

### 3.9 teachers

Guru dan tendik.

Kolom:
- `id`
- `name`
- `position`
- `employment_status`
- `photo_path`
- `email`
- `phone`
- `show_email`
- `show_phone`
- `is_active`
- `sort_order`

### 3.10 announcements

Pengumuman.

Kolom:
- `id`
- `title`
- `slug`
- `content`
- `priority`
- `attachment_path`
- `status`
- `is_pinned`
- `show_on_homepage`
- `start_date`
- `end_date`
- `created_at`
- `updated_at`

### 3.11 agenda_events

Agenda.

Kolom:
- `id`
- `title`
- `description`
- `location`
- `start_datetime`
- `end_datetime`
- `status`
- `show_on_homepage`
- `created_at`
- `updated_at`

### 3.12 galleries

Album galeri.

Kolom:
- `id`
- `title`
- `slug`
- `description`
- `cover_image_path`
- `status`
- `show_on_homepage`
- `sort_order`

### 3.13 gallery_items

Foto galeri.

Kolom:
- `id`
- `gallery_id`
- `image_path`
- `caption`
- `alt_text`
- `sort_order`
- `is_active`

### 3.14 documents

Dokumen publik.

Kolom:
- `id`
- `title`
- `description`
- `file_path`
- `category`
- `status`
- `show_on_homepage`
- `sort_order`
- `created_at`

### 3.15 achievements

Prestasi.

Kolom:
- `id`
- `title`
- `recipient_name`
- `achievement_level`
- `event_name`
- `organizer`
- `year`
- `photo_path`
- `description`
- `status`
- `show_on_homepage`

## 4. Tabel Admin

### 4.1 users

Kolom:
- `id`
- `name`
- `email`
- `password_hash`
- `role`
- `is_active`
- `last_login_at`
- `created_at`
- `updated_at`

Role:
- `super_admin`
- `admin_sekolah`
- `operator_konten`
- `operator_spmb`
- `operator_kelulusan`

## 5. Tabel SPMB/PPDB

Dibuat setelah modul public dan admin dasar siap.

### 5.1 admissions_settings
### 5.2 admissions_schedules
### 5.3 admissions_requirements
### 5.4 admissions_steps
### 5.5 admissions_applicants

Data pendaftar tidak boleh tampil sebagai public list.

## 6. Tabel Kelulusan

### 6.1 graduation_settings
### 6.2 graduation_students
### 6.3 graduation_scores
### 6.4 graduation_check_logs

Data siswa tidak boleh tampil sebagai public list.

## 7. File SQL

Nanti buat:
- `database/schema.sql`;
- `database/seed_minimal.sql`.

Seed minimal hanya konfigurasi, bukan konten palsu.

## 8. Aturan Koneksi

Gunakan PDO.

Contoh nanti:
```php
$pdo = new PDO($dsn, $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
```

## 9. Aturan Query

Wajib prepared statement:
```php
$stmt = $pdo->prepare("SELECT * FROM posts WHERE status = ? LIMIT ?");
$stmt->execute(['published', 3]);
```

Dilarang query langsung dari input:
```php
$query = "SELECT * FROM posts WHERE slug = '$slug'";
```
