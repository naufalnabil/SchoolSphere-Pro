<?php
/**
 * SchoolSphere-Pro — News Section Component
 */
global $site;
$news = $site['news'] ?? [];
?>
<section class="section section--tone-white" id="berita">
    <div class="container">
        <div class="section-header section-header--split">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Seputar Sekolah</span>
                <h2 class="section-header__title">Berita & Artikel</h2>
            </div>
            <div class="section-header__action">
                <a href="?page=berita" class="btn btn--outline btn--sm">Semua Berita</a>
            </div>
        </div>
        
        <?php if (empty($news)): ?>
            <!-- Empty State -->
            <div class="card card--soft text-center" style="padding: var(--sp-10) var(--sp-6);">
                <div style="color: var(--clr-text-muted); margin-bottom: var(--sp-4);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                </div>
                <h3 class="card__title" style="margin-bottom: var(--sp-2);">Belum Ada Berita</h3>
                <p class="card__desc">
                    Berita dan artikel kegiatan sekolah akan ditampilkan di sini setelah dipublikasikan melalui panel admin.
                </p>
            </div>
        <?php else: ?>
            <div class="grid grid--3 reveal reveal-stagger">
                <?php foreach ($news as $item): ?>
                    <?php if (!($item['is_published'] ?? true)) continue; ?>
                    <div class="card card--hover" style="display: flex; flex-direction: column; padding: 0; overflow: hidden;">
                        <?php if (!empty($item['image_url'])): ?>
                            <div style="height: 160px; width: 100%; background: url('<?= e($item['image_url']) ?>') center/cover no-repeat;"></div>
                        <?php else: ?>
                            <div style="background: hsla(0, 0%, 0%, 0.05); height: 160px; width: 100%; display: flex; align-items: center; justify-content: center;">
                                <span style="color: var(--clr-text-muted); font-size: var(--text-sm);">No Image</span>
                            </div>
                        <?php endif; ?>
                        
                        <div style="padding: var(--sp-5);">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--sp-3);">
                                <span class="badge badge--shell"><?= e($item['category'] ?? 'Berita') ?></span>
                                <span style="font-size: var(--text-xs); color: var(--clr-text-muted);"><?= e($item['date'] ?? '') ?></span>
                            </div>
                            <h4 class="card__title"><?= e($item['title'] ?? '') ?></h4>
                            <p class="card__desc" style="font-size: var(--text-sm); margin-bottom: 0;"><?= e($item['excerpt'] ?? '') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
