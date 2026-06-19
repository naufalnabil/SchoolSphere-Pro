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
                Membangun <span class="hero__title-accent">Generasi Cerdas</span> Berkarakter & Berprestasi
            </h1>
            <p class="hero__desc">
                Selamat datang di website resmi sekolah kami. Identitas, profil, dan informasi kegiatan sekolah akan diatur secara lengkap pada tahap berikutnya.
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
     PROFIL SEKOLAH (SHELL)
     ════════════════════════════════════════════ -->
<section class="section section--tone-soft" id="profil">
    <div class="container">
        <div class="section-header section-header--centered">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Tentang Kami</span>
                <h2 class="section-header__title">Profil Sekolah</h2>
                <p class="section-header__desc">
                    Identitas sekolah akan diatur pada tahap berikutnya.
                </p>
            </div>
        </div>
        <div class="grid grid--3 reveal reveal-stagger">
            <div class="card card--soft">
                <div class="card__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                </div>
                <h3 class="card__title">Visi & Misi</h3>
                <p class="card__desc">Konten akan tersedia pada tahap berikutnya.</p>
            </div>
            <div class="card card--soft">
                <div class="card__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3 class="card__title">Tenaga Pendidik</h3>
                <p class="card__desc">Konten akan tersedia pada tahap berikutnya.</p>
            </div>
            <div class="card card--soft">
                <div class="card__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
                    </svg>
                </div>
                <h3 class="card__title">Prestasi</h3>
                <p class="card__desc">Konten akan tersedia pada tahap berikutnya.</p>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════
     LAYANAN DIGITAL (SHELL)
     ════════════════════════════════════════════ -->
<section class="section section--tone-white" id="layanan">
    <div class="container">
        <div class="section-header section-header--centered">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Fasilitas</span>
                <h2 class="section-header__title">Layanan Digital</h2>
                <p class="section-header__desc">
                    Identitas sekolah akan diatur pada tahap berikutnya.
                </p>
            </div>
        </div>
        <div class="grid grid--4 reveal reveal-stagger">
            <?php for ($i = 0; $i < 4; $i++): ?>
                <div class="card card--hover text-center">
                    <div class="card__icon" style="margin: 0 auto var(--sp-4);">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                        </svg>
                    </div>
                    <h4 class="card__title">Layanan <?= $i + 1 ?></h4>
                    <p class="card__desc">Konten shell</p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════
     BERITA & PENGUMUMAN (SHELL)
     ════════════════════════════════════════════ -->
<section class="section section--tone-soft" id="berita">
    <div class="container">
        <div class="section-header section-header--split">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Informasi</span>
                <h2 class="section-header__title">Berita & Pengumuman</h2>
            </div>
            <div class="section-header__action">
                <a href="#" class="btn btn--outline btn--sm">Lihat Semua</a>
            </div>
        </div>
        <div class="grid grid--3 reveal reveal-stagger">
            <?php for ($i = 0; $i < 3; $i++): ?>
                <div class="card card--hover">
                    <div class="card__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
                        </svg>
                    </div>
                    <h4 class="card__title">Berita Utama <?= $i + 1 ?></h4>
                    <p class="card__desc">Identitas sekolah akan diatur pada tahap berikutnya.</p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
