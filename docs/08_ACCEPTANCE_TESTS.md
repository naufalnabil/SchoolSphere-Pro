# Acceptance Tests — SchoolSphere-Pro

Gunakan checklist ini setelah setiap tahap.

## 1. Test Laragon

- [ ] Laragon aktif.
- [ ] Project berada di `C:\laragon\www\SchoolSphere-Pro`.
- [ ] URL `http://localhost/SchoolSphere-Pro/public/` bisa dibuka.
- [ ] Tidak ada error PHP.
- [ ] CSS ter-load.
- [ ] JS ter-load.

## 2. Test Struktur

- [ ] Tidak ada file `index.php` super panjang.
- [ ] Navbar dipisah sebagai component.
- [ ] Footer dipisah sebagai component.
- [ ] Section dipisah sebagai component.
- [ ] Fixture berada di `resources/fixtures/`.
- [ ] Query database belum dibuat sebelum tahapnya.

## 3. Test UI Desktop

- [ ] Navbar rapi.
- [ ] Navbar sticky jika sudah dibuat.
- [ ] Hero terlihat profesional.
- [ ] Section tidak sempit di tengah.
- [ ] Card tunggal tampil lebar.
- [ ] Judul section sejajar dengan konten.
- [ ] Footer profesional.
- [ ] Tidak horizontal scroll.

## 4. Test UI Mobile

- [ ] Layout 1 kolom.
- [ ] Menu mobile rapi.
- [ ] Drawer satu tombol close.
- [ ] Button mudah ditekan.
- [ ] Text terbaca.
- [ ] Tidak horizontal scroll.
- [ ] Footer rapi.

## 5. Test Conditional Rendering

Matikan section di fixture/modul.

- [ ] Section hilang.
- [ ] Tidak ada blank space.
- [ ] Background tetap rapi.
- [ ] Section bawah naik dengan baik.

## 6. Test Data Kosong

Kosongkan data fixture untuk section tertentu.

- [ ] Section kosong tidak tampil di homepage.
- [ ] Halaman khusus menampilkan empty state jujur jika diperlukan.
- [ ] Tidak ada dummy content otomatis.

## 7. Test Data Sedikit

Isi 1 item.

- [ ] Card menjadi wide/featured.
- [ ] Tidak kecil di tengah.
- [ ] Layout tetap profesional.

## 8. Test Data Banyak

Isi 6–12 item.

- [ ] Grid rapi.
- [ ] Card tidak terlalu kecil.
- [ ] Mobile tetap 1 kolom.
- [ ] Tidak overflow.

## 9. Test No Dummy

Pastikan tidak ada:
- [ ] foto stock palsu;
- [ ] foto siswa/guru palsu;
- [ ] berita contoh production;
- [ ] lorem ipsum;
- [ ] data siswa palsu;
- [ ] data pendaftar palsu;
- [ ] SKL palsu.

## 10. Test Map

- [ ] Jika map URL kosong, tampil “Peta belum tersedia”.
- [ ] Tidak muncul iframe error besar.
- [ ] Kontak kosong tidak menampilkan data palsu.

## 11. Test Database Saat Backend Dimulai

- [ ] Koneksi pakai PDO.
- [ ] Query pakai prepared statement.
- [ ] Query tidak berada di component.
- [ ] Jika tabel kosong, tampilan tidak rusak.
- [ ] phpMyAdmin dapat melihat tabel.

## 12. Test Admin Saat Dibuat

- [ ] Login bekerja.
- [ ] Session aman.
- [ ] Role check berjalan.
- [ ] Admin route tidak bisa dibuka tanpa login.
- [ ] Form punya CSRF.
- [ ] Upload tervalidasi.
