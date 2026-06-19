<?php
/**
 * SchoolSphere-Pro — Profil Detail View Shell
 */
?>
<!-- PAGE HEADER -->
<section class="section section--tone-white">
    <div class="container">
        <div class="section-header section-header--centered" style="margin-bottom: 0;">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Tentang Kami</span>
                <h1 class="section-header__title">Profil Sekolah</h1>
                <p class="section-header__desc">
                    Informasi profil sekolah akan ditambahkan pada tahap berikutnya.
                </p>
            </div>
        </div>
    </div>
</section>

<?php
$profilData = $dataService->getFullPageData('profil');
?>
<!-- MAIN CONTENT -->
<section class="section section--tone-soft">
    <div class="container">
        <?php if (empty($profilData)): ?>
            <div class="card card--soft text-center" style="padding: var(--sp-12) var(--sp-6); margin-bottom: var(--sp-10);">
                <div style="color: var(--clr-text-muted); margin-bottom: var(--sp-4);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                </div>
                <h3 class="card__title">Data profil belum tersedia.</h3>
                <p class="card__desc">Struktur profil sudah disiapkan untuk menerima data dari sistem manajemen.</p>
            </div>

            <!-- PLACEHOLDER SECTIONS -->
            <div class="grid grid--2 reveal reveal-stagger">
                <div class="card card--hover">
                    <h4 class="card__title">Identitas Sekolah</h4>
                    <p class="card__desc">NPSN, Alamat, Status, dan Kontak Resmi.</p>
                </div>
                <div class="card card--hover">
                    <h4 class="card__title">Visi dan Misi</h4>
                    <p class="card__desc">Arah dan tujuan institusi pendidikan.</p>
                </div>
                <div class="card card--hover">
                    <h4 class="card__title">Sambutan</h4>
                    <p class="card__desc">Pesan resmi dari Kepala Sekolah.</p>
                </div>
                <div class="card card--hover">
                    <h4 class="card__title">Sarana & Prasarana</h4>
                    <p class="card__desc">Fasilitas penunjang kegiatan belajar mengajar.</p>
                </div>
            </div>
        <?php else: ?>
            <div class="card" style="padding: var(--sp-8);">
                <h2 class="card__title" style="margin-bottom: var(--sp-6); font-size: var(--text-2xl);"><?= e($profilData['title']) ?></h2>
                <div class="prose" style="line-height: var(--leading-loose); color: var(--clr-text-secondary);">
                    <?= $profilData['content'] // Not escaped assuming it's rich text ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
