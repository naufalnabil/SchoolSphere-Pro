# SchoolSphere-Pro — Panduan Mulai

Dokumen ini adalah titik awal untuk proyek **SchoolSphere-Pro**, yaitu website sekolah modular berbasis **PHP Native Modular + Laragon + MySQL/phpMyAdmin** dengan pendekatan **frontend-first**.

## Tujuan Dokumen

Masukkan folder `docs/` ini ke dalam folder proyek:

```txt
C:\laragon\www\SchoolSphere-Pro\
```

Lalu buka folder `SchoolSphere-Pro` di Antigravity. Setelah itu minta agent membaca dokumen ini dan dokumen lain di folder `docs/` sebelum mengubah kode apa pun.

## Prinsip Utama

1. **Frontend dulu.** Tampilan public website harus matang, premium, responsive, dan disukai dulu sebelum database dan admin dibuat.
2. **PHP Native Modular, bukan PHP campur aduk.** Jangan membuat satu file panjang berisi query, HTML, CSS, dan logic sekaligus.
3. **Komponen independen.** Navbar, hero, footer, section, card, dan modul musiman harus dipisah sebagai komponen.
4. **No dummy public content.** Jangan membuat konten palsu yang terlihat seperti data resmi sekolah.
5. **Database belakangan.** Pada tahap awal gunakan data fixture development di file terpisah, lalu ganti dengan query MySQL setelah UI matang.
6. **Antigravity sebagai asisten, bukan autopilot.** Setiap tugas harus kecil, jelas, dan diverifikasi manual.

## Dokumen yang Tersedia

| Dokumen | Fungsi |
|---|---|
| `01_PRD.md` | Product Requirements Document utama |
| `02_ROADMAP_FRONTEND_FIRST.md` | Urutan pengerjaan bertahap |
| `03_UI_UX_GUIDELINES.md` | Pedoman visual, layout, animasi, dan responsive |
| `04_TECHNICAL_ARCHITECTURE.md` | Arsitektur PHP native modular |
| `05_DATABASE_PLAN.md` | Rencana database MySQL untuk tahap backend |
| `06_AGENT_RULES.md` | Aturan kerja untuk Antigravity agent |
| `07_PROMPTS_FOR_ANTIGRAVITY.md` | Prompt siap pakai untuk memulai project |
| `08_ACCEPTANCE_TESTS.md` | Checklist pengujian manual |
| `09_SECURITY_AND_DATA_RULES.md` | Aturan keamanan dan data sensitif |
| `10_COMPONENT_SPEC.md` | Spesifikasi komponen public website |

## Prompt Pertama untuk Antigravity

Gunakan prompt ini setelah membuka folder proyek:

```txt
Baca semua dokumen di folder docs/, terutama 00_README_START_HERE.md, 01_PRD.md, 02_ROADMAP_FRONTEND_FIRST.md, 03_UI_UX_GUIDELINES.md, 04_TECHNICAL_ARCHITECTURE.md, dan 06_AGENT_RULES.md.

Jangan mengubah file apa pun dulu.

Rangkum pemahamanmu tentang:
1. tujuan project SchoolSphere-Pro,
2. stack teknologi yang wajib digunakan,
3. prinsip frontend-first,
4. larangan penting,
5. struktur folder yang disarankan,
6. tahap pertama yang aman untuk dikerjakan.

Setelah itu tanyakan konfirmasi sebelum membuat atau mengubah file.
```

## Prinsip Kerja Harian

Pakai pola:

```txt
1 tugas kecil
→ agent jelaskan rencana
→ setujui
→ agent ubah file
→ cek di browser
→ commit git
→ lanjut
```

Jangan memakai pola:

```txt
Buatkan seluruh web sekolah modular lengkap sampai selesai.
```

Karena untuk project besar, instruksi seperti itu rawan menghasilkan kode berantakan.
