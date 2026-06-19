<?php
/**
 * SchoolSphere-Pro — Section Wrapper Component
 *
 * Membungkus setiap section dengan:
 * - padding konsisten (adaptive spacing)
 * - background selang-seling (smart background)
 * - container
 *
 * Variabel yang diharapkan:
 * @var int    $sectionIndex   Index section yang visible (untuk background rhythm)
 * @var string $sectionId      ID unik section (untuk anchor/CSS)
 * @var string $sectionClass   Class tambahan (opsional)
 * @var string $sectionTone    Override tone: 'white','soft','muted','light','dark' (opsional)
 * @var string $sectionSpacing Variant spacing: 'normal','compact','spacious' (opsional)
 * @var string $sectionContent Konten section (dari buffer)
 */

$index   = $sectionIndex ?? 0;
$id      = $sectionId ?? '';
$class   = $sectionClass ?? '';
$spacing = $sectionSpacing ?? 'normal';

// Smart background: tone berdasarkan index visible section (override jika ditentukan)
if (!empty($sectionTone)) {
    $tone = 'section--tone-' . $sectionTone;
} else {
    $tones = ['section--tone-white', 'section--tone-soft', 'section--tone-white', 'section--tone-muted'];
    $tone  = $tones[$index % count($tones)];
}

// Spacing class
$spacingClass = '';
if ($spacing === 'compact')  $spacingClass = 'section--compact';
if ($spacing === 'spacious') $spacingClass = 'section--spacious';
?>

<section class="section <?= e($tone) ?> <?= e($spacingClass) ?> <?= e($class) ?>"
         <?= $id ? 'id="' . e($id) . '"' : '' ?>>
    <div class="container">
        <?= $sectionContent ?? '' ?>
    </div>
</section>
