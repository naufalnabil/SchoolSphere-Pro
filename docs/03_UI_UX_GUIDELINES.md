# UI/UX Guidelines — SchoolSphere-Pro

## 1. Arah Visual

Website harus terlihat:
- modern;
- profesional;
- formal;
- hangat;
- ramah sekolah dasar;
- bersih;
- tidak jadul;
- tidak seperti template default;
- tidak seperti scaffold generated UI.

## 2. Prinsip Desain Utama

### 2.1 Invisible Grid System

Gunakan grid tak terlihat untuk presisi layout.

Desktop:
- container 1180–1280px;
- 12 kolom;
- gap konsisten.

Tablet:
- 8 kolom atau 2 kolom.

Mobile:
- 1 kolom;
- full width card;
- tidak horizontal scroll.

Grid tidak boleh terlihat sebagai border.

### 2.2 Content-Aware Section Header

Judul section harus menyesuaikan konten.

Mode:
- `split`: judul kiri, tombol kanan;
- `side`: judul di kiri, konten di kanan;
- `centered`: judul tengah untuk section visual;
- `stacked`: judul di atas konten.

Jangan biarkan judul di kiri tetapi card kecil mengambang jauh di tengah.

### 2.3 Wide Card Rule

Jika hanya ada 1 item:
- jangan buat card kecil di tengah;
- tampilkan sebagai featured/wide card.

Jika ada 2 item:
- grid 2 kolom.

Jika ada 3 item:
- grid 3 kolom.

Jika 4+ item:
- grid 3–4 kolom sesuai jenis konten.

### 2.4 Adaptive Spacing

Setiap section memiliki padding sendiri:
- desktop: 80–120px;
- tablet: 64–80px;
- mobile: 48–64px.

Jika section tidak dirender, spacing ikut hilang.

### 2.5 Smart Background Rhythm

Gunakan background selang-seling:
- white;
- soft neutral;
- light brand tint;
- dark/branded untuk banner resmi jika cocok.

Background dihitung dari visible section, bukan semua section mentah.

## 3. Navbar

Navbar public harus:
- sticky;
- tinggi desktop 72–80px;
- brand area seimbang;
- menu tidak terlalu kecil;
- dropdown rapi;
- active state elegan;
- mobile drawer satu tombol close.

Dilarang:
- menu terlalu renggang;
- dropdown mentah;
- label campur bahasa tidak sengaja;
- navbar menutupi hero.

## 4. Hero/Header

Hero adalah bagian paling penting.

Wajib:
- full width;
- inner container 1180–1280px;
- layout 2 kolom desktop;
- headline kuat;
- CTA jelas;
- visual header profesional;
- fallback gradient/shape jika tidak ada gambar;
- tidak ada dummy image.

Jika gambar header belum tersedia:
- gunakan gradient;
- abstract shape;
- logo/initial sekolah;
- identity card.
Jangan pakai foto stock palsu.

## 5. Footer

Footer harus terasa menyatu dengan brand.

Struktur:
- identitas sekolah;
- navigasi;
- layanan/tautan;
- kontak;
- copyright;
- developer credit kecil.

Dilarang:
- footer seperti blok warna biasa;
- data kontak palsu;
- kolom kosong;
- credit terlalu dominan.

## 6. Animasi

Animasi harus smooth dan ringan:
- fade-up subtle;
- hover lembut;
- drawer slide smooth;
- dropdown fade + translate;
- button press halus.

Dilarang:
- animasi berat;
- parallax berlebihan;
- efek yang membuat scroll patah-patah;
- layout shift saat hover.

## 7. Warna

Arah palet:
- primary: biru tua/hijau tua profesional;
- secondary: off-white;
- accent: emerald/toska/gold tipis;
- text: slate/navy;
- muted: gray-slate.

Jangan terlalu banyak warna.

## 8. Tipografi

Heading:
- tegas;
- tidak terlalu kecil;
- hierarchy jelas.

Body:
- nyaman dibaca;
- line-height cukup.

Admin:
- font jangan terlalu kecil;
- label form jelas;
- table readable.

## 9. Empty State

Empty state harus jujur:
- “Belum ada berita yang dipublikasikan.”
- “Peta belum tersedia.”
- “Data guru belum tersedia.”

Jangan isi dummy agar terlihat penuh.

## 10. Peta

Jika `maps_embed_url` kosong atau invalid:
- jangan tampilkan iframe error besar;
- tampilkan card elegan “Peta belum tersedia”.

## 11. Gambar

Aturan gambar:
- jangan pakai dummy image;
- jangan pakai foto orang random;
- jangan pakai foto sekolah palsu;
- jika kosong, gunakan layout tanpa gambar, icon abstrak, gradient, atau avatar inisial.

## 12. Checklist Visual

Sebuah halaman dianggap layak jika:
- desktop tidak terlihat kosong;
- mobile rapi;
- section sejajar;
- card tidak kecil mengambang;
- heading presisi dengan konten;
- tidak ada horizontal scroll;
- footer profesional;
- hero kuat;
- tidak ada dummy image;
- tidak ada data palsu.
