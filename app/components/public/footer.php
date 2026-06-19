<?php
/**
 * SchoolSphere-Pro — Footer Component (Public)
 *
 * Footer profesional untuk halaman public.
 * Menerima data melalui variabel — tidak menjalankan query database.
 *
 * Variabel yang diharapkan:
 * @var array $site Data identitas dari fixture/database
 */

$siteName    = e($site['school_name'] ?? 'SchoolSphere-Pro');
$siteTagline = e($site['tagline'] ?? '');
$footerLinks = $site['footer_links'] ?? [];
$address     = $site['address'] ?? '';
$phone       = $site['phone'] ?? '';
$email       = $site['email'] ?? '';
?>

<footer class="footer" id="footer">
    <div class="footer__main">
        <div class="container">
            <div class="footer__grid">

                <!-- Kolom 1: Identitas -->
                <div class="footer__col footer__col--brand">
                    <div class="footer__brand">
                        <span class="footer__brand-icon" aria-hidden="true">
                            <svg width="32" height="32" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="36" height="36" rx="10" fill="currentColor" opacity="0.2"/>
                                <path d="M18 8L22 14H26L22 19L24 26L18 22L12 26L14 19L10 14H14L18 8Z" fill="currentColor" opacity="0.9"/>
                            </svg>
                        </span>
                        <span class="footer__brand-name"><?= $siteName ?></span>
                    </div>
                    <?php if ($siteTagline): ?>
                        <p class="footer__tagline"><?= $siteTagline ?></p>
                    <?php else: ?>
                        <p class="footer__tagline footer__tagline--dev">Website Sekolah Modular</p>
                    <?php endif; ?>
                    <p class="footer__dev-note">
                        <small>Identitas sekolah akan diatur pada tahap berikutnya.</small>
                    </p>
                </div>

                <!-- Kolom 2: Navigasi -->
                <div class="footer__col">
                    <h4 class="footer__heading">Navigasi</h4>
                    <?php if (!empty($footerLinks)): ?>
                        <ul class="footer__links">
                            <?php foreach ($footerLinks as $link): ?>
                                <li>
                                    <a href="<?= e($link['url'] ?? '#') ?>" class="footer__link">
                                        <?= e($link['label'] ?? '') ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="footer__empty">Menu akan tersedia setelah pengaturan.</p>
                    <?php endif; ?>
                </div>

                <!-- Kolom 3: Kontak -->
                <div class="footer__col">
                    <h4 class="footer__heading">Kontak</h4>
                    <?php if ($address || $phone || $email): ?>
                        <ul class="footer__contact">
                            <?php if ($address): ?>
                                <li class="footer__contact-item">
                                    <span class="footer__contact-icon" aria-hidden="true">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                            <circle cx="12" cy="10" r="3"/>
                                        </svg>
                                    </span>
                                    <span><?= e($address) ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if ($phone): ?>
                                <li class="footer__contact-item">
                                    <span class="footer__contact-icon" aria-hidden="true">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
                                        </svg>
                                    </span>
                                    <span><?= e($phone) ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if ($email): ?>
                                <li class="footer__contact-item">
                                    <span class="footer__contact-icon" aria-hidden="true">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                            <polyline points="22,6 12,13 2,6"/>
                                        </svg>
                                    </span>
                                    <span><?= e($email) ?></span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php else: ?>
                        <p class="footer__empty">Data kontak akan diatur pada tahap berikutnya.</p>
                    <?php endif; ?>
                </div>

                <!-- Kolom 4: Tautan Eksternal -->
                <div class="footer__col">
                    <h4 class="footer__heading">Tautan Terkait</h4>
                    <ul class="footer__links">
                        <li><a href="#" class="footer__link">Kementerian Pendidikan</a></li>
                        <li><a href="#" class="footer__link">Dinas Pendidikan Provinsi</a></li>
                        <li><a href="#" class="footer__link">Portal NISN</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer__bottom">
        <div class="container">
            <div class="footer__bottom-inner">
                <p class="footer__copyright">
                    &copy; <?= date('Y') ?> <?= $siteName ?>. Hak cipta dilindungi.
                </p>
                <p class="footer__credit">
                    <small>Powered by SchoolSphere-Pro</small>
                </p>
            </div>
        </div>
    </div>
</footer>
