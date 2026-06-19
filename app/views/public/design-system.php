<?php
/**
 * SchoolSphere-Pro — Design System View
 *
 * Halaman internal preview design system.
 */
?>

<!-- ════════════════════════════════════════════
     DESIGN SYSTEM HEADER
     ════════════════════════════════════════════ -->
<section class="section section--tone-white">
    <div class="container">
        <div class="section-header section-header--centered">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Development Only</span>
                <h1 class="section-header__title">Design System Preview</h1>
                <p class="section-header__desc">
                    Preview komponen UI yang tersedia untuk digunakan.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════
     DESIGN SYSTEM PREVIEW
     ════════════════════════════════════════════ -->
<section class="section section--tone-soft section--compact" id="ds-preview">
    <div class="container">

        <!-- Buttons -->
        <div class="ds-group reveal">
            <h3 class="ds-group__title">Buttons</h3>
            <div class="ds-group__row">
                <a href="#" class="btn btn--primary">Primary</a>
                <a href="#" class="btn btn--secondary">Secondary</a>
                <a href="#" class="btn btn--outline">Outline</a>
                <a href="#" class="btn btn--primary btn--sm">Small</a>
                <a href="#" class="btn btn--primary btn--lg">Large</a>
            </div>
        </div>

        <!-- Badges -->
        <div class="ds-group reveal">
            <h3 class="ds-group__title">Badges</h3>
            <div class="ds-group__row">
                <span class="badge badge--success">Success</span>
                <span class="badge badge--warning">Warning</span>
                <span class="badge badge--info">Info</span>
                <span class="badge badge--muted">Muted</span>
                <span class="badge badge--shell">Shell</span>
                <span class="badge badge--planned">Planned</span>
            </div>
        </div>

        <!-- Cards -->
        <div class="ds-group reveal">
            <h3 class="ds-group__title">Cards</h3>
            <div class="card-grid card-grid--3">
                <div class="card card--hover">
                    <div class="card__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/></svg>
                    </div>
                    <h4 class="card__title">Card Default</h4>
                    <p class="card__desc">Card dasar dengan border lembut dan hover effect yang smooth.</p>
                </div>
                <div class="card card--soft card--hover">
                    <div class="card__icon card__icon--accent">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    </div>
                    <h4 class="card__title">Card Soft</h4>
                    <p class="card__desc">Card dengan background muted, tanpa border visible yang mencolok.</p>
                </div>
                <div class="card card--featured card--hover">
                    <div class="card__icon card__icon--green">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h4 class="card__title">Card Featured</h4>
                    <p class="card__desc">Card yang menonjol, untuk konten utama atau featured item.</p>
                </div>
            </div>
        </div>
    </div>
</section>
