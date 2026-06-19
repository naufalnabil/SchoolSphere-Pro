<?php
/**
 * SchoolSphere-Pro — Galeri Detail View Shell
 */
?>
<!-- PAGE HEADER -->
<section class="section section--tone-white">
    <div class="container">
        <div class="section-header section-header--centered" style="margin-bottom: 0;">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Dokumentasi</span>
                <h1 class="section-header__title">Galeri</h1>
                <p class="section-header__desc">
                    Dokumentasi kegiatan sekolah akan ditampilkan setelah foto resmi ditambahkan.
                </p>
            </div>
        </div>
    </div>
</section>

<?php
$galleries = $dataService->getFullPageData('galeri');
?>
<!-- MAIN CONTENT -->
<section class="section section--tone-soft">
    <div class="container">
        <?php if (empty($galleries)): ?>
            <!-- EMPTY STATE -->
            <div class="card card--soft text-center" style="padding: var(--sp-12) var(--sp-6); margin-bottom: var(--sp-10);">
                <div style="color: var(--clr-text-muted); margin-bottom: var(--sp-4);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>
                    </svg>
                </div>
                <h3 class="card__title">Belum ada galeri kegiatan.</h3>
            </div>
        <?php else: ?>
            <div class="grid grid--4">
                <?php foreach ($galleries as $gallery): ?>
                    <div class="card card--hover" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                        <?php if (!empty($gallery['image_url'])): ?>
                            <div style="height: 180px; width: 100%;">
                                <img src="<?= e($gallery['image_url']) ?>" alt="<?= e($gallery['title']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        <?php else: ?>
                            <div style="background: hsla(0, 0%, 0%, 0.05); height: 180px; width: 100%; display: flex; align-items: center; justify-content: center;">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--clr-text-muted);">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                        <div style="padding: var(--sp-4);">
                            <h4 class="card__title" style="font-size: var(--text-base); margin-bottom: var(--sp-1);"><?= e($gallery['title']) ?></h4>
                            <?php if (!empty($gallery['caption'])): ?>
                                <p class="card__desc" style="font-size: var(--text-xs); margin-bottom: 0; color: var(--clr-text-muted);"><?= e($gallery['caption']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
