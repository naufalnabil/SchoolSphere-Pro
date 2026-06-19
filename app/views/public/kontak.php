<?php
/**
 * SchoolSphere-Pro — Kontak Detail View Shell
 */
?>
<!-- PAGE HEADER -->
<section class="section section--tone-white">
    <div class="container">
        <div class="section-header section-header--centered" style="margin-bottom: 0;">
            <div class="section-header__text">
                <span class="section-header__eyebrow">Hubungi Kami</span>
                <h1 class="section-header__title">Kontak</h1>
                <p class="section-header__desc">
                    Informasi kontak sekolah akan diatur pada tahap identitas sekolah.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<section class="section section--tone-soft">
    <div class="container">
        <div class="grid grid--2 reveal reveal-stagger">
            <!-- KONTAK INFO -->
            <?php if (empty($site['address']) && empty($site['phone']) && empty($site['email'])): ?>
                <div class="card card--soft" style="display: flex; flex-direction: column; justify-content: center; padding: var(--sp-8);">
                    <div style="color: var(--clr-text-muted); margin-bottom: var(--sp-4);">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </div>
                    <h3 class="card__title">Data kontak belum tersedia.</h3>
                    <p class="card__desc">Alamat, nomor telepon, dan email resmi institusi akan tampil di sini setelah dikonfigurasi melalui panel admin.</p>
                </div>
            <?php else: ?>
                <div class="card" style="padding: var(--sp-8);">
                    <h3 class="card__title" style="margin-bottom: var(--sp-6);">Hubungi Kami</h3>
                    <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: var(--sp-4);">
                        <?php if (!empty($site['address'])): ?>
                            <li style="display: flex; gap: var(--sp-3);">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--clr-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; margin-top: 2px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                <span><?= nl2br(e($site['address'])) ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($site['phone'])): ?>
                            <li style="display: flex; align-items: center; gap: var(--sp-3);">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--clr-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                <span><?= e($site['phone']) ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($site['whatsapp'])): ?>
                            <li style="display: flex; align-items: center; gap: var(--sp-3);">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--clr-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                                <span><?= e($site['whatsapp']) ?> (WhatsApp)</span>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($site['email'])): ?>
                            <li style="display: flex; align-items: center; gap: var(--sp-3);">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--clr-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                <span><?= e($site['email']) ?></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <!-- MAP PLACEHOLDER -->
            <?php if (empty($site['maps_embed_url'])): ?>
                <div class="card card--soft text-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 250px; padding: var(--sp-8);">
                    <div style="color: var(--clr-text-muted); margin-bottom: var(--sp-3);">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/>
                        </svg>
                    </div>
                    <h3 class="card__title" style="margin-bottom: var(--sp-2);">Peta belum tersedia.</h3>
                    <p class="card__desc">Admin dapat menambahkan tautan peta pada tahap berikutnya.</p>
                </div>
            <?php else: ?>
                <div class="card" style="padding: 0; overflow: hidden; min-height: 250px;">
                    <iframe src="<?= e($site['maps_embed_url']) ?>" width="100%" height="100%" style="border:0; min-height: 250px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
