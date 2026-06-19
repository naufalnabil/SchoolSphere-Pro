<?php
/**
 * SchoolSphere-Pro — Contact Section Component
 */
global $site;
$hasContactInfo = !empty($site['address']) || !empty($site['phone']) || !empty($site['email']) || !empty($site['whatsapp']);
$hasMap = !empty($site['maps_embed_url']);
?>
<section class="section section--tone-white" id="kontak">
    <div class="container">
        <div class="section-header section-header--split">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Hubungi Kami</span>
                <h2 class="section-header__title">Informasi Kontak</h2>
            </div>
            <div class="section-header__action">
                <a href="?page=kontak" class="btn btn--outline btn--sm">Detail Kontak</a>
            </div>
        </div>
        
        <div class="grid grid--2 reveal reveal-stagger">
            <!-- CONTACT INFO -->
            <div class="card card--soft">
                <h3 class="card__title" style="margin-bottom: var(--sp-4);">Alamat & Kontak</h3>
                
                <?php if (!$hasContactInfo): ?>
                    <div style="display: flex; gap: var(--sp-3); align-items: flex-start;">
                        <div style="color: var(--clr-text-muted);">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div>
                            <p class="card__desc">Informasi kontak resmi akan diatur melalui panel admin pada tahap berikutnya.</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div style="display: flex; flex-direction: column; gap: var(--sp-4);">
                        <?php if (!empty($site['address'])): ?>
                            <div style="display: flex; gap: var(--sp-3);">
                                <div style="color: var(--clr-primary);">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                </div>
                                <p class="card__desc" style="margin: 0;"><?= nl2br(e($site['address'])) ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($site['phone'])): ?>
                            <div style="display: flex; gap: var(--sp-3);">
                                <div style="color: var(--clr-primary);">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                </div>
                                <p class="card__desc" style="margin: 0;"><?= e($site['phone']) ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($site['email'])): ?>
                            <div style="display: flex; gap: var(--sp-3);">
                                <div style="color: var(--clr-primary);">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                </div>
                                <p class="card__desc" style="margin: 0;"><?= e($site['email']) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- MAP CONTAINER -->
            <?php if (!$hasMap): ?>
                <div class="card card--soft text-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 200px;">
                    <div style="color: var(--clr-text-muted); margin-bottom: var(--sp-3);">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/>
                        </svg>
                    </div>
                    <p class="card__desc">Peta belum tersedia.</p>
                </div>
            <?php else: ?>
                <div class="card card--soft" style="padding: 0; overflow: hidden; min-height: 200px;">
                    <iframe src="<?= e($site['maps_embed_url']) ?>" width="100%" height="100%" style="border:0; min-height: 250px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
