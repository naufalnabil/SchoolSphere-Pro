<?php
/**
 * SchoolSphere-Pro — Home View (Tahap 2C)
 *
 * Struktur section shell untuk homepage public school.
 * Bebas dari elemen development progress.
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
            <span class="hero__eyebrow">Website Resmi Sekolah</span>
            <h1 class="hero__title">
                <?= isset($site['hero_title']) && $site['hero_title'] !== '' ? $site['hero_title'] : 'Membangun <span class="hero__title-accent">Generasi Cerdas</span> Berkarakter & Berprestasi' ?>
            </h1>
            <p class="hero__desc">
                <?= isset($site['hero_subtitle']) && $site['hero_subtitle'] !== '' ? e($site['hero_subtitle']) : 'Selamat datang di website resmi sekolah kami. Identitas, profil, dan informasi kegiatan sekolah akan diatur secara lengkap pada tahap berikutnya.' ?>
            </p>
            <div class="hero__actions">
                <a href="?page=profil" class="btn btn--primary btn--lg">
                    Jelajahi Profil
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>
                <a href="?page=layanan" class="btn btn--ghost btn--lg">
                    Lihat Layanan
                </a>
            </div>
        </div>
        <div class="hero__visual">
            <div class="hero__composition">
                <!-- Decorative Glow -->
                <div class="hero__comp-glow"></div>
                
                <!-- Main Layer -->
                <div class="hero__comp-main">
                    <div class="hero__comp-header">
                        <div class="hero__comp-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        </div>
                        <div class="hero__comp-title-bar"></div>
                    </div>
                    <div class="hero__comp-body">
                        <div class="hero__comp-line"></div>
                        <div class="hero__comp-line hero__comp-line--short"></div>
                        <div class="hero__comp-grid">
                            <div class="hero__comp-box"></div>
                            <div class="hero__comp-box"></div>
                        </div>
                    </div>
                </div>

                <!-- Floating Layer 1 -->
                <div class="hero__comp-float hero__comp-float--1">
                    <div class="hero__comp-badge">
                        <div class="hero__comp-dot"></div>
                        <div class="hero__comp-text"></div>
                    </div>
                </div>

                <!-- Floating Layer 2 -->
                <div class="hero__comp-float hero__comp-float--2">
                    <div class="hero__comp-stat">
                        <div class="hero__comp-stat-val"></div>
                        <div class="hero__comp-stat-lbl"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════
     MODULAR SECTIONS (CONDITIONALLY RENDERED)
     ════════════════════════════════════════════ -->

<?php
$sections = $site['homepage_sections'] ?? [];

// Profil Sekolah
if ($sections['profile'] ?? true) {
    require component_path('public/sections/profile-section.php');
}

// Layanan Sekolah
if ($sections['services'] ?? true) {
    require component_path('public/sections/services-section.php');
}

// Pengumuman
if ($sections['announcements'] ?? true) {
    require component_path('public/sections/announcements-section.php');
}

// Berita
if ($sections['news'] ?? true) {
    require component_path('public/sections/news-section.php');
}

// Galeri
if ($sections['gallery'] ?? true) {
    require component_path('public/sections/gallery-section.php');
}

// Kontak
if ($sections['contact'] ?? true) {
    require component_path('public/sections/contact-section.php');
}
?>
