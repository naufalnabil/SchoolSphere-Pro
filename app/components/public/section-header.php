<?php
/**
 * SchoolSphere-Pro — Section Header Component
 *
 * Header reusable untuk section public.
 *
 * Mode:
 * - 'centered'  : judul tengah (default)
 * - 'left'      : judul kiri
 * - 'split'     : judul kiri, action kanan
 * - 'stacked'   : judul di atas, lebar penuh
 *
 * Variabel yang diharapkan:
 * @var string $headerMode        Mode: 'centered','left','split','stacked'
 * @var string $headerEyebrow     Teks kecil di atas judul (opsional)
 * @var string $headerTitle       Judul section
 * @var string $headerDescription Deskripsi singkat (opsional)
 * @var string $headerActionLabel Label tombol action (opsional)
 * @var string $headerActionUrl   URL tombol action (opsional)
 */

$mode        = $headerMode ?? 'centered';
$eyebrow     = $headerEyebrow ?? '';
$title       = $headerTitle ?? '';
$description = $headerDescription ?? '';
$actionLabel = $headerActionLabel ?? '';
$actionUrl   = $headerActionUrl ?? '';

if (empty($title)) return;
?>

<div class="section-header section-header--<?= e($mode) ?>">
    <div class="section-header__text">
        <?php if ($eyebrow): ?>
            <span class="section-header__eyebrow"><?= e($eyebrow) ?></span>
        <?php endif; ?>
        <h2 class="section-header__title"><?= e($title) ?></h2>
        <?php if ($description): ?>
            <p class="section-header__desc"><?= e($description) ?></p>
        <?php endif; ?>
    </div>
    <?php if ($actionLabel && $actionUrl): ?>
        <div class="section-header__action">
            <a href="<?= e($actionUrl) ?>" class="btn btn--outline btn--sm">
                <?= e($actionLabel) ?>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                </svg>
            </a>
        </div>
    <?php endif; ?>
</div>
