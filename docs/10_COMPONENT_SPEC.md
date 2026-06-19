# Component Specification — SchoolSphere-Pro

## 1. Public Components

### 1.1 Navbar

File:
```txt
app/components/public/navbar.php
```

Data:
- site settings;
- navigation menus;
- module settings.

Perilaku:
- sticky;
- dropdown;
- mobile drawer;
- active state;
- no hardcoded menu jika sudah database.

### 1.2 Hero Section

File:
```txt
app/components/public/sections/hero-section.php
```

Data:
- school name;
- tagline;
- logo;
- hero image;
- CTA;
- location.

Aturan:
- no dummy image;
- fallback gradient/shape;
- responsive;
- CTA maksimal 3.

### 1.3 Section Wrapper

File:
```txt
app/components/public/section-wrapper.php
```

Data:
- tone;
- index;
- variant;
- content component.

Tugas:
- padding section;
- background;
- container;
- responsive spacing.

### 1.4 Section Header

File:
```txt
app/components/public/section-header.php
```

Mode:
- split;
- side;
- centered;
- stacked.

Data:
- eyebrow;
- title;
- description;
- action label;
- action URL.

### 1.5 Quick Access Section

File:
```txt
app/components/public/sections/quick-access-section.php
```

Data:
- links.

Aturan:
- 1 item = wide card;
- 2 item = grid 2;
- 3+ item = grid 3–4;
- external link aman.

### 1.6 News Section

File:
```txt
app/components/public/sections/news-section.php
```

Data:
- posts.

Aturan:
- featured post jika ada;
- no dummy image;
- detail URL;
- title, date, excerpt.

### 1.7 Teachers Section

File:
```txt
app/components/public/sections/teachers-section.php
```

Aturan:
- avatar inisial jika foto kosong;
- jangan foto dummy;
- data kontak mengikuti pengaturan privacy saat backend dibuat.

### 1.8 Gallery Section

Aturan:
- image asli jika ada;
- no dummy;
- lightbox;
- 1 item = wide visual card.

### 1.9 Announcements Section

Aturan:
- pinned/priority badge;
- expired tidak tampil di public;
- 1 item = wide official notice.

### 1.10 Documents Section

Aturan:
- card dokumen;
- tombol unduh;
- no fake file.

### 1.11 Admissions Section

Aturan:
- label dinamis SPMB/PPDB;
- banner resmi;
- no applicant data.

### 1.12 Graduation Section

Aturan:
- banner resmi;
- CTA cek kelulusan hanya jika dibuka;
- no student list;
- no score public tanpa validasi.

### 1.13 Contact Section

Aturan:
- contact cards;
- map valid;
- fallback "Peta belum tersedia";
- no fake contact.

### 1.14 Footer

Aturan:
- dark/branded;
- 3–4 columns desktop;
- 1 column mobile;
- no empty columns;
- developer credit kecil.

## 2. Admin Components

Dibuat setelah frontend.

Komponen:
- AdminLayout;
- AdminSidebar;
- AdminTopbar;
- AdminPageHeader;
- AdminCard;
- FormGroup;
- DataTable;
- StatusBadge;
- ConfirmDialog;
- SensitiveActionCard.

## 3. Component Rules

Setiap component:
- fokus UI;
- tidak query database;
- menerima data melalui variabel;
- aman jika data kosong;
- tidak membuat dummy;
- tidak membuat konten palsu;
- tidak memuat CSS inline besar.

## 4. Naming Convention

Gunakan nama file kecil dengan dash:
```txt
hero-section.php
quick-access-section.php
section-wrapper.php
```

Gunakan nama variabel jelas:
```php
$siteSettings
$moduleSettings
$newsItems
$teacherItems
```

## 5. Empty Handling

Component homepage boleh return/skip jika kosong.

Halaman khusus boleh menampilkan empty state jujur.

## 6. Visual Requirements

Setiap component harus diuji:
- desktop;
- tablet;
- mobile;
- data kosong;
- satu data;
- data banyak.
