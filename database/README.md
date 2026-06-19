# SchoolSphere-Pro Database

Tahap ini berisi fondasi database MySQL awal untuk project SchoolSphere-Pro.

## 1. Persiapan Database

1. Buka **phpMyAdmin** (biasanya di `http://localhost/phpmyadmin` jika menggunakan Laragon/XAMPP).
2. Buat database baru dengan nama: `school_sphere_pro`.
3. Pilih _Collation_ `utf8mb4_unicode_ci` saat membuat database.

## 2. Import Schema & Seed

Proses import dilakukan secara berurutan:

1. Di dalam phpMyAdmin, pilih database `school_sphere_pro`.
2. Buka tab **Import**.
3. **Penting:** Lakukan import file-file berikut secara BERURUTAN:
   - `database/schema/001_initial_schema.sql` (Tabel publik dasar)
   - `database/schema/002_auth_schema.sql` (Tabel autentikasi admin)
   - `database/seed/001_default_public_structure.sql` (Struktur publik)
   - `database/seed/002_default_auth_roles.sql` (Daftar role admin dasar)
   
   *Catatan: Seed ini hanya berisi struktur aman, bukan data konten, identitas palsu, maupun akun/password dummy.*

## 3. Konfigurasi Environment (.env)

Agar aplikasi PHP dapat terhubung ke database tanpa mengekspos kredensial di dalam repository (Git):

1. Salin file `.env.example` yang ada di root project menjadi `.env`.
   - Windows/CMD: `copy .env.example .env`
   - Mac/Linux: `cp .env.example .env`
2. Buka file `.env` di text editor.
3. Sesuaikan dengan kredensial MySQL lokal Anda.
   ```ini
   DB_HOST=127.0.0.1
   DB_NAME=school_sphere_pro
   DB_USER=root
   DB_PASS=
   DB_CHARSET=utf8mb4
   ```
4. File `.env` sudah dimasukkan ke dalam `.gitignore`, sehingga aman tidak akan ikut ter-commit ke GitHub.

## 4. Tes dan Verifikasi

Lakukan pengujian secara berurutan:
1. **Tes Koneksi:** Buka URL `http://localhost/SchoolSphere-Pro/public/?page=db-check` untuk memastikan bahwa `.env` Anda sudah terhubung ke MySQL.
2. **Tes Tampilan Publik:** Buka URL `http://localhost/SchoolSphere-Pro/public/` untuk memastikan beranda merender susunan menu navigasi dan seksi-seksinya dari database yang telah di-seed (tanpa data sekolah palsu).

## 5. Catatan Penting

- **Belum Ada Login / Admin**: Tahap ini murni merancang fondasi relasional. Data disiapkan untuk dibaca ke *frontend*. Belum ada antarmuka CMS untuk mengubah data tersebut.
- **Tabel Sensitif**: Tabel seperti `users`, `admins`, pendaftaran (SPMB), dan nilai siswa celum dibuat. Ini akan diatur pada tahap backend selanjutnya demi keamanan.
- **Jangan Isi Data Palsu**: Skema tidak menyertakan perintah INSERT berisi teks Lorem Ipsum atau data siswa bohongan. Jika butuh data di frontend, buat manual melalui phpMyAdmin menggunakan nilai *NULL* atau konten kosong yang formal.
