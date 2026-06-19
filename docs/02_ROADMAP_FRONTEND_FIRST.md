# Roadmap Frontend-First — SchoolSphere-Pro

Dokumen ini mengatur urutan kerja agar proyek tidak langsung membengkak.

## Prinsip Roadmap

Jangan membangun semua fitur sekaligus. Gunakan pendekatan:

```txt
Satu tahap kecil → tes → commit → lanjut
```

## Tahap 0 — Setup Project

Tujuan:
- membuat folder project;
- membuat struktur PHP native modular;
- memastikan Laragon bisa membuka project;
- membuat halaman "Hello SchoolSphere".

Tidak boleh:
- membuat database;
- membuat admin;
- membuat SPMB;
- membuat kelulusan;
- membuat login.

Output:
- `public/index.php`;
- struktur folder awal;
- helper path dasar;
- CSS utama kosong/awal.

## Tahap 1 — Public Layout Shell

Tujuan:
- membuat layout public;
- navbar;
- footer awal;
- asset loading;
- CSS design tokens;
- responsive baseline.

Output:
- `app/views/layouts/public.php`;
- `app/components/public/navbar.php`;
- `app/components/public/footer.php`;
- `public/assets/css/app.css`;
- `public/assets/js/app.js`.

Acceptance:
- halaman terbuka di Laragon;
- CSS dan JS ter-load;
- tidak ada error PHP;
- belum perlu database.

## Tahap 2 — Design System Dasar

Tujuan:
- membuat token warna;
- tipografi;
- spacing;
- button;
- card;
- badge;
- section wrapper;
- grid tak terlihat.

Output:
- `resources/css/design-tokens.css` atau `public/assets/css/app.css`;
- komponen `section-wrapper.php`;
- komponen `section-header.php`;
- komponen `button.php` jika diperlukan.

Acceptance:
- layout rapi;
- tidak ada CSS inline besar;
- mobile tidak horizontal scroll.

## Tahap 3 — Hero Premium Statis

Tujuan:
- membuat hero/header premium;
- CTA;
- visual header tanpa dummy image;
- fallback gradient/shape;
- sticky navbar compatibility.

Data:
- gunakan fixture development untuk identitas sekolah.

Acceptance:
- hero terlihat profesional di desktop;
- mobile rapi;
- tidak ada foto palsu;
- tidak ada data production palsu.

## Tahap 4 — Homepage Section System

Tujuan:
- membuat `visibleSections`;
- conditional rendering;
- adaptive spacing;
- smart background;
- layout grid 12 kolom.

Output:
- `app/views/public/home.php`;
- `app/components/public/sections/*.php`;
- `resources/fixtures/homepage.php`.

Acceptance:
- section bisa dimatikan dari fixture;
- section hilang tanpa blank space;
- background tetap selang-seling rapi.

## Tahap 5 — Frontend Public Statis Lengkap

Buat section:
1. profil/sambutan;
2. layanan digital;
3. pengumuman;
4. agenda;
5. berita;
6. guru/tendik;
7. galeri;
8. prestasi;
9. dokumen;
10. SPMB/PPDB banner;
11. kelulusan banner;
12. kontak;
13. footer premium.

Acceptance:
- tampilan desktop matang;
- mobile matang;
- setiap section data kosong/sedikit/banyak sudah ditangani;
- tidak ada dummy image;
- data fixture jelas hanya untuk development.

## Tahap 6 — Public Pages Statis

Buat halaman:
- `/profil`;
- `/berita`;
- `/berita/detail`;
- `/galeri`;
- `/guru`;
- `/pengumuman`;
- `/dokumen`;
- `/agenda`;
- `/prestasi`;
- `/kontak`;
- `/spmb`;
- `/kelulusan`.

Acceptance:
- semua halaman memakai layout konsisten;
- empty state jujur;
- belum database.

## Tahap 7 — Database Design

Baru setelah frontend disetujui:
- buat skema MySQL;
- buat migration SQL manual;
- buat seed minimal untuk konfigurasi, bukan konten palsu;
- dokumentasikan tabel.

Output:
- `database/schema.sql`;
- `database/seed_minimal.sql`;
- `config/database.php`.

## Tahap 8 — Data Layer

Tujuan:
- membuat koneksi database;
- membuat model;
- mengganti fixture menjadi query;
- komponen visual tidak berubah besar.

Output:
- `app/models/*.php`;
- `app/controllers/PublicController.php`;
- helper database.

Acceptance:
- halaman public tetap sama secara visual;
- data berasal dari MySQL;
- jika tabel kosong, section hilang/empty state sesuai desain.

## Tahap 9 — Admin Shell

Tujuan:
- membuat login;
- session;
- admin layout;
- dashboard kosong/awal;
- sidebar admin.

Jangan langsung CRUD semua.

## Tahap 10 — Admin CMS Bertahap

Urutan:
1. identitas sekolah;
2. tema;
3. menu;
4. modul;
5. berita;
6. halaman profil;
7. galeri;
8. guru;
9. pengumuman;
10. dokumen;
11. agenda;
12. prestasi;
13. layanan digital.

## Tahap 11 — Modul Musiman

1. SPMB/PPDB;
2. Kelulusan;
3. print/SKL jika diperlukan;
4. import data jika diperlukan.

## Tahap 12 — Hardening

- keamanan form;
- validasi input;
- CSRF;
- upload security;
- backup;
- audit log;
- role permission;
- testing responsive.

## Aturan Stop

Berhenti dan perbaiki jika:
- UI terasa jelek;
- struktur file mulai campur aduk;
- query masuk ke view;
- ada dummy public content;
- agent mengubah terlalu banyak file tanpa alasan;
- ada error yang tidak dipahami.
