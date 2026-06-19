# PRD — SchoolSphere-Pro

## 1. Identitas Produk

**Nama proyek:** SchoolSphere-Pro  
**Jenis produk:** Website sekolah modular berbasis PHP Native Modular  
**Lingkungan kerja lokal:** Laragon  
**Database:** MySQL/MariaDB melalui phpMyAdmin  
**Editor/AI Workspace:** Antigravity  
**Pendekatan utama:** Frontend-first, component-based, modular, no-dummy, UI/UX premium  

## 2. Latar Belakang

SchoolSphere-Pro dibuat sebagai website sekolah modular yang dapat digunakan untuk menampilkan identitas sekolah, informasi publik, layanan digital, berita, galeri, guru/tendik, pengumuman, dokumen, agenda, prestasi, SPMB/PPDB, dan pengumuman kelulusan.

Proyek ini dibangun dengan mempertimbangkan kebutuhan pengguna yang:
- terbiasa dengan PHP native, Laragon, MySQL, dan phpMyAdmin;
- ingin menguasai kembali web development dengan cara yang tidak terlalu asing;
- sangat memperhatikan kualitas UI/UX;
- ingin membangun sistem modular yang mudah dipoles tampilannya tanpa merusak query database;
- ingin memakai Antigravity sebagai AI coding assistant untuk belajar dan membangun secara bertahap.

## 3. Visi Produk

Membangun website sekolah modular yang:
1. tampil profesional seperti website resmi modern;
2. mudah dikelola;
3. dapat dikembangkan bertahap;
4. tetap dapat dipahami oleh developer yang terbiasa dengan PHP native;
5. tidak bergantung pada stack yang terlalu asing seperti React/Supabase pada tahap awal;
6. memiliki struktur kode yang rapi, modular, dan mudah dipelihara.

## 4. Prinsip Non-Negotiable

### 4.1 Frontend First

Tampilan public website harus dikerjakan terlebih dahulu sampai matang.

Urutan prioritas:
1. landing page statis premium;
2. komponen public;
3. responsive mobile;
4. animasi smooth;
5. struktur modular;
6. baru database;
7. baru admin panel;
8. baru fitur kompleks seperti SPMB dan kelulusan.

### 4.2 PHP Native Modular

Proyek tetap memakai PHP native, tetapi bukan PHP campur aduk.

Dilarang:
- satu file panjang berisi query, HTML, CSS, dan logic sekaligus;
- CSS inline besar-besaran;
- JavaScript acak tanpa struktur;
- query langsung tersebar di view;
- file public yang memuat semua fitur.

Wajib:
- pisah layout, component, controller, model, helper, config, dan assets;
- query dikelola di model/repository;
- view hanya menerima data dan menampilkan UI;
- component fokus pada tampilan.

### 4.3 No Dummy Public Content

Jangan membuat konten palsu yang terlihat sebagai data resmi sekolah.

Dilarang:
- berita contoh yang tampil di production;
- guru contoh;
- foto siswa/guru/sekolah palsu;
- pengumuman contoh;
- prestasi contoh;
- data pendaftar contoh;
- data kelulusan contoh;
- nilai contoh;
- SKL palsu;
- lorem ipsum di halaman public final.

Untuk development boleh memakai fixture lokal, tetapi harus berada di folder khusus dan jelas sebagai data pengembangan, bukan data production.

### 4.4 UI/UX Premium

Karena kualitas visual sangat penting, setiap tampilan harus memenuhi prinsip:
- modern;
- clean;
- formal;
- hangat;
- profesional;
- ramah sekolah dasar;
- responsive;
- animasi halus;
- bukan seperti web jadul;
- bukan seperti template default;
- bukan seperti scaffold mentah.

### 4.5 Komponen Independen

Setiap section public harus dianggap sebagai balok Lego independen.

Contoh:
- `HeroSection`
- `QuickAccessSection`
- `ProfileSection`
- `NewsSection`
- `GallerySection`
- `TeachersSection`
- `AnnouncementSection`
- `DocumentsSection`
- `AdmissionsSection`
- `GraduationSection`
- `ContactSection`
- `Footer`

Setiap component menerima data. Selama variabel data tidak dihapus, tampilan boleh dipoles tanpa merusak query.

### 4.6 Conditional Rendering

Jika modul nonaktif atau data kosong, section tidak boleh dirender.

Yang benar:
```php
if ($module['gallery']['enabled'] && !empty($galleryItems)) {
    include component_path('public/sections/gallery-section.php');
}
```

Yang salah:
```html
<section style="display:none"></section>
```

Karena section tersembunyi dengan CSS masih bisa meninggalkan struktur dan mengganggu spacing/background.

### 4.7 Adaptive Spacing

Setiap section harus memiliki padding atas dan bawah sendiri. Jangan bergantung pada margin dari section sebelumnya.

Jika section hilang, spacing milik section tersebut ikut hilang.

### 4.8 Smart Background

Background selang-seling harus mengikuti urutan section yang benar-benar tampil.

Jangan hardcode:
```css
.spmb-section { background: #f8fafc; }
.news-section { background: #ffffff; }
```

Lebih baik section wrapper diberi tone berdasarkan index visible section.

### 4.9 Database Belakangan

Pada tahap frontend, data boleh diwakili fixture development:

```php
$newsItems = require base_path('resources/fixtures/news.php');
```

Nanti setelah UI matang, sumber data diganti menjadi:

```php
$newsItems = NewsModel::publishedLimit(3);
```

Komponen view tidak perlu berubah.

## 5. Target Pengguna

### 5.1 Pengunjung Public
- siswa;
- orang tua;
- masyarakat;
- calon peserta didik;
- alumni;
- pihak dinas;
- tamu sekolah.

### 5.2 Admin Sekolah
- kepala sekolah;
- operator sekolah;
- guru yang ditugaskan;
- developer/pengelola awal.

### 5.3 Developer/Pengelola
- pengguna yang terbiasa PHP native, Laragon, MySQL/phpMyAdmin;
- menggunakan Antigravity sebagai asisten coding.

## 6. Modul Public

### 6.1 Beranda
Berisi:
- sticky navbar;
- hero/header premium;
- CTA utama;
- profil/sambutan singkat;
- layanan digital;
- pengumuman;
- agenda;
- berita;
- guru/tendik;
- galeri;
- prestasi;
- dokumen;
- SPMB/PPDB jika aktif;
- kelulusan jika aktif;
- kontak;
- footer premium.

### 6.2 Profil Sekolah
Berisi:
- identitas sekolah;
- sejarah jika tersedia;
- visi misi jika tersedia;
- sambutan kepala sekolah jika tersedia;
- fasilitas/program jika tersedia.

Tidak boleh mengarang data.

### 6.3 Berita
Berisi daftar berita published dan halaman detail berita.

### 6.4 Galeri
Berisi album/foto kegiatan sekolah.

### 6.5 Guru & Tendik
Berisi daftar guru/tendik aktif.

### 6.6 Pengumuman
Berisi pengumuman resmi.

### 6.7 Dokumen
Berisi dokumen publik seperti PDF, surat edaran, panduan, atau file penting.

### 6.8 Agenda
Berisi agenda/kegiatan sekolah.

### 6.9 Prestasi
Berisi prestasi siswa, guru, tim, atau sekolah.

### 6.10 Layanan Digital
Berisi tautan penting seperti e-learning, rapor, formulir, atau layanan sekolah.

### 6.11 SPMB/PPDB
Modul musiman untuk informasi penerimaan peserta didik baru.

Label harus dinamis. Jangan hardcode satu istilah saja.

### 6.12 Kelulusan
Modul musiman untuk cek kelulusan dengan aman.

Tidak boleh menampilkan daftar siswa publik.

### 6.13 Kontak
Berisi alamat, telepon, WhatsApp, email, website, dan peta jika tersedia.

Jika peta kosong atau invalid, tampilkan fallback jujur, bukan error besar.

## 7. Modul Admin

Admin dibuat setelah frontend public matang.

Modul admin:
1. login;
2. dashboard;
3. identitas sekolah;
4. tema dan branding;
5. menu navigasi;
6. modul website;
7. halaman profil;
8. berita;
9. galeri;
10. guru/tendik;
11. pengumuman;
12. dokumen;
13. agenda;
14. prestasi;
15. layanan digital;
16. SPMB/PPDB;
17. kelulusan;
18. media library;
19. users/roles;
20. backup/export sederhana;
21. audit log dasar.

## 8. Role Awal

Minimal:
- `super_admin`;
- `admin_sekolah`;
- `operator_konten`;
- `operator_spmb`;
- `operator_kelulusan`.

Untuk tahap awal, role boleh disederhanakan setelah login dasar selesai.

## 9. Kriteria Sukses Produk

Produk dianggap berhasil jika:
1. public landing page terlihat premium di desktop dan mobile;
2. semua section modular dan mudah dipoles;
3. data kosong tidak merusak layout;
4. module toggle tidak meninggalkan blank space;
5. frontend bisa berdiri dulu tanpa database;
6. database dapat dihubungkan tanpa mengubah komponen visual besar;
7. admin dapat mengelola konten secara bertahap;
8. kode masih dapat dipahami oleh pengguna yang terbiasa PHP native;
9. tidak ada dummy public content;
10. website dapat berjalan di Laragon secara lokal.

## 10. Definisi "Selesai" untuk Tahap Frontend

Tahap frontend dianggap selesai jika:
- halaman public utama sudah premium;
- navbar sticky dan rapi;
- hero profesional;
- footer profesional;
- semua section memakai invisible grid;
- mobile responsive;
- tidak horizontal scroll;
- animasi smooth;
- komponen terpisah;
- data masih fixture tetapi siap diganti database;
- tidak ada konten palsu production.
