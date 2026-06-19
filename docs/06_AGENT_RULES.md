# Agent Rules — SchoolSphere-Pro

Dokumen ini wajib dibaca agent sebelum mengubah file.

## 1. Peran Agent

Agent bertindak sebagai:
- asisten coding;
- pembaca kode;
- refactor assistant;
- UI/UX implementation assistant;
- debugging assistant.

Agent bukan pengambil keputusan utama.

## 2. Teknologi Wajib

Gunakan:
- PHP native modular;
- Laragon;
- MySQL/MariaDB;
- phpMyAdmin;
- HTML/CSS/JavaScript biasa.

Jangan menggunakan:
- React;
- Supabase;
- Laravel;
- Node build system;
- framework berat;
- stack baru tanpa izin eksplisit.

## 3. Urutan Kerja Wajib

1. Baca dokumen di folder `docs/`.
2. Rangkum rencana.
3. Sebutkan file yang akan dibuat/diubah.
4. Tunggu persetujuan jika perubahan besar.
5. Ubah file secukupnya.
6. Laporkan hasil.
7. Beri instruksi tes manual.
8. Jangan lanjut tahap berikutnya tanpa perintah.

## 4. Larangan Keras

Jangan:
- membuat seluruh proyek sekaligus;
- mengubah banyak file tanpa alasan;
- menghapus file tanpa konfirmasi;
- membuat database sebelum diminta;
- membuat admin sebelum landing page selesai;
- mencampur query database ke view;
- membuat konten dummy production;
- memakai gambar dummy;
- memakai foto siswa/guru/sekolah palsu;
- membuat CSS inline besar;
- membuat file PHP super panjang;
- membuat dependency berat tanpa izin.

## 5. Aturan Frontend

Frontend public dikerjakan dulu.

Wajib:
- navbar;
- hero premium;
- invisible grid;
- section wrapper;
- conditional rendering;
- adaptive spacing;
- smart background;
- footer premium;
- mobile responsive.

## 6. Aturan Komponen

Setiap component:
- menerima data melalui variabel;
- tidak menjalankan query database;
- return/menampilkan UI;
- aman jika data kosong;
- tidak membuat konten palsu.

## 7. Aturan Data Fixture

Data fixture development boleh dipakai hanya di:
```txt
resources/fixtures/
```

Fixture harus jelas sebagai development.

Jangan menanam data contoh di view/component.

## 8. Aturan Database

Database dibuat setelah diminta.

Jika membuat database:
- gunakan PDO;
- prepared statement;
- model/repository;
- query tidak boleh berada di component view.

## 9. Aturan UI/UX

Setiap perubahan visual harus mempertimbangkan:
- desktop;
- tablet;
- mobile;
- spacing;
- typography;
- hover;
- animation;
- empty state;
- data sedikit;
- data kosong;
- data banyak.

## 10. Aturan Pelaporan

Setelah mengubah file, laporkan:

```txt
File dibuat:
- ...

File diubah:
- ...

Yang sengaja tidak disentuh:
- database
- admin
- query
- dll.

Cara tes:
1. buka ...
2. cek ...
```

## 11. Prompt Safety

Jika instruksi pengguna terlalu besar, pecah menjadi tahap kecil dan jelaskan risikonya.

Jika ada konflik antara permintaan dan dokumen ini, tanyakan konfirmasi.
