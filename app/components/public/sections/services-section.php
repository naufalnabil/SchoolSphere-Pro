<?php
/**
 * SchoolSphere-Pro — Services / Quick Access Section Component
 */
global $site;
$services = $site['services'] ?? [];
?>
<section class="section section--tone-white" id="layanan">
    <div class="container">
        <div class="section-header section-header--centered">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Akses Cepat</span>
                <h2 class="section-header__title">Layanan Sekolah</h2>
                <p class="section-header__desc">
                    Layanan terintegrasi untuk siswa, orang tua, dan tenaga pendidik. Akan diatur melalui panel admin pada tahap berikutnya.
                </p>
            </div>
        </div>
        
        <?php if (empty($services)): ?>
            <!-- Empty State -->
            <div class="card card--soft text-center" style="padding: var(--sp-10) var(--sp-6);">
                <div style="color: var(--clr-text-muted); margin-bottom: var(--sp-4);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                    </svg>
                </div>
                <h3 class="card__title" style="margin-bottom: var(--sp-2);">Belum Ada Layanan</h3>
                <p class="card__desc">Daftar layanan sekolah belum dikonfigurasi.</p>
            </div>
        <?php else: ?>
            <div class="grid grid--4 reveal reveal-stagger">
                <?php foreach ($services as $srv): ?>
                    <?php if (!($srv['is_active'] ?? true)) continue; ?>
                    <a href="<?= e($srv['url'] ?? '#') ?>" class="card card--hover text-center">
                        <div class="card__icon" style="margin: 0 auto var(--sp-4);">
                            <!-- Gunakan icon default jika tidak diset -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                        </div>
                        <h4 class="card__title"><?= e($srv['title'] ?? '') ?></h4>
                        <p class="card__desc"><?= e($srv['description'] ?? '') ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
