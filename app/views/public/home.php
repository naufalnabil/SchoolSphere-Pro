<?php
/**
 * SchoolSphere-Pro — Home View (Tahap 2)
 *
 * Struktur section shell untuk homepage.
 * Menggunakan teks netral development — bukan data sekolah palsu.
 * Menggunakan design system: card, badge, section, btn tokens.
 * Gambar dummy tidak digunakan.
 */
?>

<!-- ════════════════════════════════════════════
     HERO SECTION
     ════════════════════════════════════════════ -->
<section class="hero" id="hero">
    <div class="hero__bg" aria-hidden="true">
        <div class="hero__shape hero__shape--1"></div>
        <div class="hero__shape hero__shape--2"></div>
        <div class="hero__shape hero__shape--3"></div>
    </div>
    <div class="hero__container container">
        <div class="hero__content">
            <span class="hero__eyebrow">Website Sekolah Modular</span>
            <h1 class="hero__title">
                Membangun <span class="hero__title-accent">Identitas Digital</span> Sekolah yang Profesional
            </h1>
            <p class="hero__desc">
                Platform website sekolah modular yang dirancang untuk tampil premium,
                mudah dikelola, dan siap dikembangkan secara bertahap.
            </p>
            <div class="hero__actions">
                <a href="#sections-preview" class="btn btn--primary btn--lg">
                    Lihat Komponen
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="12" y1="5" x2="12" y2="19"/><polyline points="19 12 12 19 5 12"/>
                    </svg>
                </a>
                <a href="#about-system" class="btn btn--ghost btn--lg">
                    Tentang Sistem
                </a>
            </div>
        </div>
        <div class="hero__visual">
            <div class="hero__card">
                <div class="hero__card-header">
                    <span class="hero__card-dot"></span>
                    <span class="hero__card-dot"></span>
                    <span class="hero__card-dot"></span>
                </div>
                <div class="hero__card-body">
                    <div class="hero__card-line hero__card-line--long"></div>
                    <div class="hero__card-line hero__card-line--medium"></div>
                    <div class="hero__card-line hero__card-line--short"></div>
                    <div class="hero__card-grid">
                        <div class="hero__card-block"></div>
                        <div class="hero__card-block"></div>
                        <div class="hero__card-block"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════
     INTRO SECTION
     ════════════════════════════════════════════ -->
<section class="section section--tone-soft" id="about-system">
    <div class="container">
        <div class="section-header section-header--centered">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Tentang Sistem</span>
                <h2 class="section-header__title">Platform Modular & Bertahap</h2>
                <p class="section-header__desc">
                    SchoolSphere-Pro dibangun dengan pendekatan frontend-first —
                    tampilan matang dulu, baru database dan admin menyusul.
                </p>
            </div>
        </div>
        <div class="intro-grid reveal reveal-stagger">
            <div class="intro-card">
                <div class="intro-card__icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/>
                    </svg>
                </div>
                <h3 class="intro-card__title">Modular</h3>
                <p class="intro-card__desc">
                    Setiap section adalah komponen independen yang bisa diaktifkan, dinonaktifkan, atau dipoles tanpa merusak bagian lain.
                </p>
            </div>
            <div class="intro-card">
                <div class="intro-card__icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                    </svg>
                </div>
                <h3 class="intro-card__title">Responsive</h3>
                <p class="intro-card__desc">
                    Layout menyesuaikan perangkat — desktop, tablet, dan mobile — dengan grid tak terlihat dan spacing adaptif.
                </p>
            </div>
            <div class="intro-card">
                <div class="intro-card__icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <h3 class="intro-card__title">Aman</h3>
                <p class="intro-card__desc">
                    Output di-escape, query akan memakai prepared statement, dan data sensitif tidak ditampilkan di halaman publik.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════
     COMPONENT PREVIEW SECTION
     ════════════════════════════════════════════ -->
<section class="section section--tone-white" id="sections-preview">
    <div class="container">
        <div class="section-header section-header--split">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Komponen Tersedia</span>
                <h2 class="section-header__title">Section yang Akan Dibangun</h2>
                <p class="section-header__desc">
                    Daftar section yang direncanakan untuk homepage. Setiap section dikerjakan bertahap.
                </p>
            </div>
        </div>
        <div class="preview-grid reveal reveal-stagger">
            <?php
            $plannedSections = [
                ['icon' => 'star',     'title' => 'Hero & Header',      'status' => 'shell',   'desc' => 'Header utama dengan headline dan CTA'],
                ['icon' => 'user',     'title' => 'Profil Sekolah',     'status' => 'planned', 'desc' => 'Sambutan dan identitas sekolah'],
                ['icon' => 'zap',      'title' => 'Layanan Digital',    'status' => 'planned', 'desc' => 'Tautan cepat ke layanan sekolah'],
                ['icon' => 'bell',     'title' => 'Pengumuman',         'status' => 'planned', 'desc' => 'Pengumuman resmi sekolah'],
                ['icon' => 'calendar', 'title' => 'Agenda',             'status' => 'planned', 'desc' => 'Kegiatan dan agenda sekolah'],
                ['icon' => 'file',     'title' => 'Berita',             'status' => 'planned', 'desc' => 'Berita dan artikel sekolah'],
                ['icon' => 'users',    'title' => 'Guru & Tendik',      'status' => 'planned', 'desc' => 'Daftar guru dan tenaga kependidikan'],
                ['icon' => 'image',    'title' => 'Galeri',             'status' => 'planned', 'desc' => 'Album foto kegiatan sekolah'],
                ['icon' => 'award',    'title' => 'Prestasi',           'status' => 'planned', 'desc' => 'Prestasi siswa dan sekolah'],
                ['icon' => 'folder',   'title' => 'Dokumen',            'status' => 'planned', 'desc' => 'Dokumen publik sekolah'],
                ['icon' => 'edit',     'title' => 'SPMB/PPDB',          'status' => 'planned', 'desc' => 'Informasi penerimaan peserta didik'],
                ['icon' => 'check',    'title' => 'Kelulusan',          'status' => 'planned', 'desc' => 'Pengumuman dan cek kelulusan'],
                ['icon' => 'map',      'title' => 'Kontak',             'status' => 'planned', 'desc' => 'Informasi kontak dan lokasi'],
                ['icon' => 'layout',   'title' => 'Footer Premium',     'status' => 'shell',   'desc' => 'Footer profesional multi-kolom'],
            ];

            $iconMap = [
                'star'     => '<circle cx="12" cy="12" r="3"/><path d="M12 2v2m0 16v2m-10-10h2m16 0h2m-3.05-6.95l-1.41 1.41M6.46 17.54l-1.41 1.41m0-12.9l1.41 1.41m11.08 11.08l1.41 1.41"/>',
                'user'     => '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
                'zap'      => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
                'bell'     => '<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>',
                'calendar' => '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>',
                'file'     => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>',
                'users'    => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
                'image'    => '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>',
                'award'    => '<circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>',
                'folder'   => '<path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>',
                'edit'     => '<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>',
                'check'    => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',
                'map'      => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>',
                'layout'   => '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/>',
            ];
            ?>
            <?php foreach ($plannedSections as $ps): ?>
                <div class="preview-card">
                    <div class="preview-card__header">
                        <span class="preview-card__icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?= $iconMap[$ps['icon']] ?? '' ?>
                            </svg>
                        </span>
                        <span class="badge badge--<?= $ps['status'] ?>">
                            <?= $ps['status'] === 'shell' ? 'Shell' : 'Planned' ?>
                        </span>
                    </div>
                    <h3 class="preview-card__title"><?= e($ps['title']) ?></h3>
                    <p class="preview-card__desc"><?= e($ps['desc']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════
     DESIGN SYSTEM PREVIEW
     ════════════════════════════════════════════ -->
<section class="section section--tone-soft section--compact" id="ds-preview">
    <div class="container">
        <div class="section-header section-header--centered">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Design System</span>
                <h2 class="section-header__title">Komponen UI</h2>
                <p class="section-header__desc">
                    Preview komponen design system yang sudah tersedia untuk dipakai di seluruh halaman.
                </p>
            </div>
        </div>

        <!-- Buttons -->
        <div class="ds-group reveal">
            <h3 class="ds-group__title">Buttons</h3>
            <div class="ds-group__row">
                <a href="#" class="btn btn--primary">Primary</a>
                <a href="#" class="btn btn--secondary">Secondary</a>
                <a href="#" class="btn btn--outline">Outline</a>
                <a href="#" class="btn btn--primary btn--sm">Small</a>
                <a href="#" class="btn btn--primary btn--lg">Large</a>
            </div>
        </div>

        <!-- Badges -->
        <div class="ds-group reveal">
            <h3 class="ds-group__title">Badges</h3>
            <div class="ds-group__row">
                <span class="badge badge--success">Success</span>
                <span class="badge badge--warning">Warning</span>
                <span class="badge badge--info">Info</span>
                <span class="badge badge--muted">Muted</span>
                <span class="badge badge--shell">Shell</span>
                <span class="badge badge--planned">Planned</span>
            </div>
        </div>

        <!-- Cards -->
        <div class="ds-group reveal">
            <h3 class="ds-group__title">Cards</h3>
            <div class="card-grid card-grid--3">
                <div class="card card--hover">
                    <div class="card__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/></svg>
                    </div>
                    <h4 class="card__title">Card Default</h4>
                    <p class="card__desc">Card dasar dengan border lembut dan hover effect yang smooth.</p>
                </div>
                <div class="card card--soft card--hover">
                    <div class="card__icon card__icon--accent">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    </div>
                    <h4 class="card__title">Card Soft</h4>
                    <p class="card__desc">Card dengan background muted, tanpa border visible yang mencolok.</p>
                </div>
                <div class="card card--featured card--hover">
                    <div class="card__icon card__icon--green">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h4 class="card__title">Card Featured</h4>
                    <p class="card__desc">Card yang menonjol, untuk konten utama atau featured item.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════
     DEVELOPMENT STATUS
     ════════════════════════════════════════════ -->
<section class="section section--tone-white" id="dev-status">
    <div class="container">
        <div class="section-header section-header--centered">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Status</span>
                <h2 class="section-header__title">Tahap Pengembangan</h2>
            </div>
        </div>
        <div class="status-timeline reveal">
            <div class="status-item status-item--done">
                <div class="status-item__marker"></div>
                <div class="status-item__content">
                    <h4 class="status-item__title">Tahap 0 — Setup Project</h4>
                    <p class="status-item__desc">Struktur folder, helper, entry point, dan CSS dasar.</p>
                </div>
            </div>
            <div class="status-item status-item--done">
                <div class="status-item__marker"></div>
                <div class="status-item__content">
                    <h4 class="status-item__title">Tahap 1 — Public Layout Shell</h4>
                    <p class="status-item__desc">Navbar, footer, layout, dan section shell awal.</p>
                </div>
            </div>
            <div class="status-item status-item--active">
                <div class="status-item__marker"></div>
                <div class="status-item__content">
                    <h4 class="status-item__title">Tahap 2 — Design System</h4>
                    <p class="status-item__desc">Token, card, button, badge, grid, dan motion foundation.</p>
                </div>
            </div>
            <div class="status-item">
                <div class="status-item__marker"></div>
                <div class="status-item__content">
                    <h4 class="status-item__title">Tahap 3 — Hero Premium</h4>
                    <p class="status-item__desc">Hero/header premium dengan CTA dan visual profesional.</p>
                </div>
            </div>
            <div class="status-item">
                <div class="status-item__marker"></div>
                <div class="status-item__content">
                    <h4 class="status-item__title">Tahap 4+ — Section System & Database</h4>
                    <p class="status-item__desc">Homepage sections, halaman public, database, lalu admin.</p>
                </div>
            </div>
        </div>
    </div>
</section>
