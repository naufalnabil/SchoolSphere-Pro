# Prompt Siap Pakai untuk Antigravity

## Prompt 0 — Baca Dokumen Dulu

```txt
Baca semua dokumen di folder docs/.

Jangan mengubah file apa pun dulu.

Rangkum pemahamanmu tentang:
1. tujuan project SchoolSphere-Pro,
2. stack teknologi yang wajib digunakan,
3. prinsip frontend-first,
4. larangan utama,
5. struktur folder yang disarankan,
6. roadmap tahap awal.

Setelah itu, ajukan rencana Tahap 0 saja.
```

## Prompt 1 — Buat Struktur Project Awal

```txt
Kerjakan hanya Tahap 0: Setup Project.

Buat struktur folder PHP native modular untuk SchoolSphere-Pro sesuai docs/04_TECHNICAL_ARCHITECTURE.md.

Jangan buat database.
Jangan buat admin.
Jangan buat fitur SPMB.
Jangan buat kelulusan.
Jangan buat login.

Buat halaman awal yang bisa dibuka melalui Laragon di:
http://localhost/SchoolSphere-Pro/public/

Tampilkan halaman sederhana “SchoolSphere-Pro siap dikembangkan”.

Pisahkan file minimal:
- public/index.php
- config/app.php
- app/helpers/path.php
- app/views/layouts/public.php
- public/assets/css/app.css
- public/assets/js/app.js

Laporkan file yang dibuat dan cara mengetesnya.
```

## Prompt 2 — Public Layout Shell

```txt
Kerjakan hanya Public Layout Shell.

Buat layout public dasar:
- navbar public
- footer public
- area main content
- asset loading CSS/JS
- responsive baseline

Jangan buat database.
Jangan buat admin.
Jangan buat SPMB.
Jangan buat kelulusan.
Jangan membuat dummy image.

Gunakan data fixture sederhana dari resources/fixtures/site.php untuk identitas pengembangan.
Pastikan fixture jelas hanya untuk development.

Laporkan file yang dibuat/diubah.
```

## Prompt 3 — Design System Dasar

```txt
Kerjakan hanya Design System Dasar.

Buat CSS design system untuk:
- warna
- typography
- spacing
- container
- grid tak terlihat
- card
- button
- badge
- section wrapper
- section header
- responsive breakpoint

Jangan ubah struktur data.
Jangan buat database.
Jangan buat admin.
Jangan membuat konten dummy production.

Pastikan style terasa modern, profesional, formal, hangat, dan cocok untuk website sekolah.
```

## Prompt 4 — Hero Premium

```txt
Kerjakan hanya HeroSection public.

Buat hero/header premium untuk homepage:
- full width
- sticky navbar compatibility
- layout 2 kolom desktop
- headline kuat
- CTA
- visual header profesional tanpa dummy image
- fallback gradient/shape jika tidak ada gambar
- responsive mobile
- animasi smooth ringan

Jangan buat database.
Jangan ubah section lain.
Jangan pakai foto stock palsu.
Jangan membuat gambar dummy.
```

## Prompt 5 — Homepage Section Architecture

```txt
Kerjakan hanya arsitektur section homepage.

Buat sistem visibleSections:
- conditional rendering
- section nonaktif tidak dirender
- section kosong tidak dirender
- adaptive spacing
- smart background berdasarkan urutan section yang tampil
- section wrapper
- section header

Gunakan fixture development untuk data sementara.
Jangan database dulu.
Jangan admin dulu.
```

## Prompt 6 — Section Public Statis

```txt
Buat section public statis bertahap dengan data fixture development:
1. Profil/Sambutan
2. Layanan Digital
3. Pengumuman
4. Agenda
5. Berita
6. Guru
7. Galeri
8. Prestasi
9. Dokumen
10. SPMB/PPDB banner
11. Kelulusan banner
12. Kontak

Jangan buat semuanya sekaligus jika terlalu besar. Mulai dari 3 section dulu:
Profil, Layanan Digital, dan Berita.

Setiap section harus self-contained, responsive, no dummy image, dan aman jika data kosong.
```

## Prompt 7 — Database Baru Setelah UI Disetujui

```txt
Sekarang frontend public sudah disetujui. Mulai rancang database MySQL.

Buat database/schema.sql dan database/seed_minimal.sql sesuai docs/05_DATABASE_PLAN.md.

Jangan ubah tampilan frontend.
Jangan buat admin CRUD dulu.
Seed minimal hanya konfigurasi, bukan konten palsu.
```

## Prompt 8 — Ganti Fixture ke Query

```txt
Ganti sumber data section [nama section] dari fixture development menjadi query MySQL melalui Model.

Jangan ubah markup visual.
Jangan ubah CSS.
Jangan ubah komponen section kecuali variabel data.
Gunakan PDO dan prepared statement.
Pastikan jika tabel kosong, section tetap aman.
```

## Prompt 9 — Commit Safety

```txt
Sebelum lanjut, periksa perubahan terakhir.

Laporkan:
1. file yang berubah,
2. apakah database tersentuh,
3. apakah query tersentuh,
4. apakah ada dummy content,
5. cara tes manual,
6. apakah aman untuk commit.

Jangan mengubah file.
```
