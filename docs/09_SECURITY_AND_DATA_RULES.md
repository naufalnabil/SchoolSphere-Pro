# Security and Data Rules — SchoolSphere-Pro

## 1. Output Escaping

Semua output dari data harus di-escape.

Gunakan:
```php
htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8')
```

Buat helper:
```php
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
```

## 2. Query Database

Gunakan PDO dan prepared statement.

Jangan menyusun query dari input user secara langsung.

## 3. Form Security

Saat admin dibuat:
- gunakan CSRF token;
- validasi input;
- sanitasi output;
- batasi ukuran upload;
- batasi ekstensi upload;
- validasi MIME type.

## 4. Password

Password admin:
- jangan plain text;
- gunakan `password_hash()`;
- verifikasi dengan `password_verify()`.

## 5. Session

Saat login:
- gunakan `session_regenerate_id(true)`;
- cek role;
- logout hapus session.

## 6. Upload

Aturan upload:
- simpan di `storage/uploads` atau `public/uploads` dengan hati-hati;
- rename file;
- jangan pakai nama file asli mentah;
- batasi ekstensi;
- jangan izinkan upload `.php`;
- validasi ukuran;
- pisah folder image/document.

## 7. Data Sensitif

Jangan tampilkan public:
- password hash;
- email admin;
- data pendaftar lengkap;
- NIK;
- NISN massal;
- nilai siswa massal;
- data kelulusan tanpa validasi.

## 8. SPMB

Public boleh melihat:
- info pendaftaran;
- jadwal;
- syarat;
- alur;
- form jika dibuka.

Public tidak boleh melihat:
- daftar pendaftar;
- NIK pendaftar;
- dokumen pendaftar;
- status internal.

## 9. Kelulusan

Public boleh:
- melihat halaman cek kelulusan;
- memasukkan nama + NISN;
- melihat hasil hanya jika cocok.

Public tidak boleh:
- melihat daftar siswa;
- melihat semua nilai;
- melihat statistik kelulusan jika tidak ditentukan;
- mengakses data siswa dari URL tebak-tebakan.

## 10. No Dummy Production

Jangan membuat data palsu yang bisa dianggap resmi.

Jika butuh fixture development:
- beri nama jelas;
- simpan di `resources/fixtures`;
- jangan dipakai di production.

## 11. Antigravity Safety

Agent tidak boleh:
- menghapus file tanpa izin;
- menjalankan query DROP/TRUNCATE tanpa izin;
- menambahkan dependency berat tanpa izin;
- membuat route admin terbuka;
- menyimpan password di kode;
- mengubah aturan keamanan tanpa konfirmasi.
