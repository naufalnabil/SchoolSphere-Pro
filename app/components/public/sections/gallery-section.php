<?php
/**
 * SchoolSphere-Pro — Gallery Section Component
 */
global $site;
$gallery = $site['gallery'] ?? [];
?>
<section class="section section--tone-soft" id="galeri">
    <div class="container">
        <div class="section-header section-header--split">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Dokumentasi</span>
                <h2 class="section-header__title">Galeri Kegiatan</h2>
            </div>
            <div class="section-header__action">
                <a href="?page=galeri" class="btn btn--outline btn--sm">Lihat Semua</a>
            </div>
        </div>
        
        <?php if (empty($gallery)): ?>
            <!-- Empty State -->
            <div class="card card--soft text-center" style="padding: var(--sp-10) var(--sp-6);">
                <div style="color: var(--clr-text-muted); margin-bottom: var(--sp-4);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>
                    </svg>
                </div>
                <h3 class="card__title" style="margin-bottom: var(--sp-2);">Galeri Kosong</h3>
                <p class="card__desc">
                    Galeri kegiatan akan tersedia setelah foto resmi dokumentasi sekolah ditambahkan.
                </p>
            </div>
        <?php else: ?>
            <div class="grid grid--4 reveal reveal-stagger">
                <?php foreach ($gallery as $item): ?>
                    <?php if (!($item['is_active'] ?? true)) continue; ?>
                    <div class="card card--hover text-center" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                        <?php if (!empty($item['image_url'])): ?>
                            <div style="height: 200px; width: 100%; background: url('<?= e($item['image_url']) ?>') center/cover no-repeat;"></div>
                        <?php else: ?>
                            <div style="height: 200px; width: 100%; background: hsla(0, 0%, 0%, 0.05); display: flex; align-items: center; justify-content: center;">
                                <span style="font-size: var(--text-sm); color: var(--clr-text-muted);">No Image</span>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($item['title'])): ?>
                            <div style="padding: var(--sp-3);">
                                <h4 class="card__title" style="font-size: var(--text-sm); margin-bottom: 0;"><?= e($item['title']) ?></h4>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
