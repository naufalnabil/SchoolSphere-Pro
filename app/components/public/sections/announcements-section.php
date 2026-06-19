<?php
/**
 * SchoolSphere-Pro — Announcements Section Component
 */
global $site;
$announcements = $site['announcements'] ?? [];
?>
<section class="section section--tone-soft" id="pengumuman">
    <div class="container">
        <div class="section-header section-header--split">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Informasi Penting</span>
                <h2 class="section-header__title">Pengumuman</h2>
            </div>
        </div>
        
        <?php if (empty($announcements)): ?>
            <!-- Empty State -->
            <div class="card card--soft text-center" style="padding: var(--sp-10) var(--sp-6);">
                <div style="color: var(--clr-text-muted); margin-bottom: var(--sp-4);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                    </svg>
                </div>
                <h3 class="card__title" style="margin-bottom: var(--sp-2);">Belum Ada Pengumuman</h3>
                <p class="card__desc">
                    Pengumuman resmi dari sekolah akan dipublikasikan di sini. Belum ada pengumuman yang dipublikasikan pada saat ini.
                </p>
            </div>
        <?php else: ?>
            <div class="grid grid--2 reveal reveal-stagger">
                <?php foreach ($announcements as $ann): ?>
                    <?php if (!($ann['is_published'] ?? true)) continue; ?>
                    <div class="card card--hover">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--sp-3);">
                            <h3 class="card__title" style="margin-bottom: 0;"><?= e($ann['title'] ?? '') ?></h3>
                            <span style="font-size: var(--text-xs); color: var(--clr-text-muted); white-space: nowrap; margin-left: var(--sp-3);">
                                <?= e($ann['date'] ?? '') ?>
                            </span>
                        </div>
                        <p class="card__desc"><?= e($ann['excerpt'] ?? '') ?></p>
                        <?php if (!empty($ann['url'])): ?>
                            <a href="<?= e($ann['url']) ?>" class="btn btn--outline btn--sm" style="margin-top: var(--sp-3);">Selengkapnya</a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
