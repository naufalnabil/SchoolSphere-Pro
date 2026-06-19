<?php
/**
 * SchoolSphere-Pro — Layanan Detail View Shell
 */
?>
<!-- PAGE HEADER -->
<section class="section section--tone-white">
    <div class="container">
        <div class="section-header section-header--centered" style="margin-bottom: 0;">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Fasilitas</span>
                <h1 class="section-header__title">Layanan Sekolah</h1>
                <p class="section-header__desc">
                    Tautan dan layanan sekolah akan dikelola pada tahap berikutnya.
                </p>
            </div>
        </div>
    </div>
</section>

<?php
$services = $dataService->getFullPageData('layanan');
?>
<!-- MAIN CONTENT -->
<section class="section section--tone-soft">
    <div class="container">
        <?php if (empty($services)): ?>
            <!-- EMPTY STATE -->
            <div class="card card--soft text-center" style="padding: var(--sp-12) var(--sp-6); margin-bottom: var(--sp-10);">
                <div style="color: var(--clr-text-muted); margin-bottom: var(--sp-4);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>
                    </svg>
                </div>
                <h3 class="card__title">Belum ada layanan atau tautan penting yang tersedia.</h3>
            </div>
        <?php else: ?>
            <div class="grid grid--4 reveal reveal-stagger">
                <?php foreach ($services as $service): ?>
                    <a href="<?= e($service['url']) ?>" class="card card--hover text-center" target="_blank" rel="noopener noreferrer">
                        <div class="card__icon" style="margin: 0 auto var(--sp-4);">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                            </svg>
                        </div>
                        <h4 class="card__title"><?= e($service['title']) ?></h4>
                        <?php if (!empty($service['description'])): ?>
                            <p class="card__desc"><?= e($service['description']) ?></p>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
