<?php
/**
 * SchoolSphere-Pro — Berita Detail View Shell
 */
?>
<!-- PAGE HEADER -->
<section class="section section--tone-white">
    <div class="container">
        <div class="section-header section-header--centered" style="margin-bottom: 0;">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Seputar Kami</span>
                <h1 class="section-header__title">Berita</h1>
                <p class="section-header__desc">
                    Berita dan artikel sekolah akan tampil di halaman ini setelah data resmi ditambahkan.
                </p>
            </div>
        </div>
    </div>
</section>

<?php
$posts = $dataService->getFullPageData('berita');
?>
<!-- MAIN CONTENT -->
<section class="section section--tone-soft">
    <div class="container">
        <?php if (empty($posts)): ?>
            <!-- EMPTY STATE -->
            <div class="card card--soft text-center" style="padding: var(--sp-12) var(--sp-6); margin-bottom: var(--sp-10);">
                <div style="color: var(--clr-text-muted); margin-bottom: var(--sp-4);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                </div>
                <h3 class="card__title">Belum ada berita yang dipublikasikan.</h3>
            </div>
        <?php else: ?>
            <div class="grid grid--3">
                <?php foreach ($posts as $post): ?>
                    <div class="card card--hover" style="display: flex; flex-direction: column; padding: 0; overflow: hidden;">
                        <?php if (!empty($post['image_url'])): ?>
                            <div style="height: 160px; width: 100%;">
                                <img src="<?= e($post['image_url']) ?>" alt="<?= e($post['title']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        <?php else: ?>
                            <div style="background: hsla(0, 0%, 0%, 0.05); height: 160px; width: 100%; display: flex; align-items: center; justify-content: center;">
                                <span style="color: var(--clr-text-muted); font-size: var(--text-sm);">No Image</span>
                            </div>
                        <?php endif; ?>
                        <div style="padding: var(--sp-5);">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--sp-3);">
                                <span class="badge badge--shell"><?= e($post['category'] ?: 'Berita') ?></span>
                                <span style="font-size: var(--text-xs); color: var(--clr-text-muted);"><?= e($post['date']) ?></span>
                            </div>
                            <h4 class="card__title"><?= e($post['title']) ?></h4>
                            <p class="card__desc" style="font-size: var(--text-sm); margin-bottom: 0;"><?= e($post['excerpt']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
