<?php
/**
 * SchoolSphere-Pro — Public Data Service
 *
 * Menggabungkan data dari repository database dan memberikan 
 * fallback fixture yang aman jika database kosong atau error.
 */

require_once __DIR__ . '/../repositories/SiteSettingRepository.php';
require_once __DIR__ . '/../repositories/NavigationRepository.php';
require_once __DIR__ . '/../repositories/HomepageRepository.php';
require_once __DIR__ . '/../repositories/PageRepository.php';

class PublicDataService
{
    private $siteRepo;
    private $navRepo;
    private $homeRepo;
    private $pageRepo;

    public function __construct()
    {
        $this->siteRepo = new SiteSettingRepository();
        $this->navRepo  = new NavigationRepository();
        $this->homeRepo = new HomepageRepository();
        $this->pageRepo = new PageRepository();
    }

    /**
     * Membangun payload $site lengkap yang aman untuk public frontend.
     */
    public function getSiteData()
    {
        // 1. Site Settings
        $settings = $this->siteRepo->getActiveSettings();
        
        $schoolName      = $settings['school_name'] ?? 'SchoolSphere-Pro';
        $schoolShortName = $settings['school_short_name'] ?? 'SSP';
        $tagline         = $settings['tagline'] ?? 'Website Sekolah Modular';
        
        $address         = $settings['address'] ?? null;
        $phone           = $settings['phone'] ?? null;
        $whatsapp        = $settings['whatsapp'] ?? null;
        $email           = $settings['email'] ?? null;
        $mapsEmbedUrl    = $settings['maps_embed_url'] ?? null;
        
        $logoPath        = $settings['logo_path'] ?? null;
        $heroTitle       = $settings['hero_title'] ?? null;
        $heroSubtitle    = $settings['hero_subtitle'] ?? null;

        // 2. Navigation Menus
        $headerMenusDb = $this->navRepo->getHeaderMenus();
        $footerMenusDb = $this->navRepo->getFooterMenus();

        $fallbackNav = [
            ['label' => 'Beranda',  'url' => '?page=home'],
            ['label' => 'Profil',   'url' => '?page=profil'],
            ['label' => 'Berita',   'url' => '?page=berita'],
            ['label' => 'Galeri',   'url' => '?page=galeri'],
            ['label' => 'Layanan',  'url' => '?page=layanan'],
            ['label' => 'Kontak',   'url' => '?page=kontak'],
        ];

        $navMenus = !empty($headerMenusDb) ? $this->formatMenus($headerMenusDb) : $fallbackNav;
        $footerLinks = !empty($footerMenusDb) ? $this->formatMenus($footerMenusDb) : [
            ['label' => 'Beranda', 'url' => '?page=home'],
            ['label' => 'Profil',  'url' => '?page=profil'],
            ['label' => 'Berita',  'url' => '?page=berita'],
            ['label' => 'Galeri',  'url' => '?page=galeri'],
            ['label' => 'Kontak',  'url' => '?page=kontak'],
        ];

        // 3. Homepage Sections Visibility
        $sectionsDb = $this->homeRepo->getActiveSections();
        if (!empty($sectionsDb)) {
            $homepageSections = [];
            foreach ($sectionsDb as $sec) {
                $homepageSections[$sec['section_key']] = true;
            }
        } else {
            // Fallback default
            $homepageSections = [
                'profile'       => true,
                'services'      => true,
                'announcements' => true,
                'news'          => true,
                'gallery'       => true,
                'contact'       => true,
            ];
        }

        // 4. Homepage Content
        $services = $this->formatServices($this->homeRepo->getHomepageImportantLinks());
        $announcements = $this->formatAnnouncements($this->homeRepo->getHomepageAnnouncements());
        $news = $this->formatPosts($this->homeRepo->getHomepagePosts());
        $gallery = $this->formatGalleries($this->homeRepo->getHomepageGalleries());

        // Return Data Contract Final
        return [
            // Identitas
            'school_name'       => $schoolName,
            'school_short_name' => $schoolShortName,
            'tagline'           => $tagline,
            'address'           => $address,
            'phone'             => $phone,
            'whatsapp'          => $whatsapp,
            'email'             => $email,
            'maps_embed_url'    => $mapsEmbedUrl,
            'logo_path'         => $logoPath,
            
            // Hero override
            'hero_title'        => $heroTitle,
            'hero_subtitle'     => $heroSubtitle,

            // Struktur & Navigasi
            'homepage_sections' => $homepageSections,
            'nav_menus'         => $navMenus,
            'footer_links'      => $footerLinks,

            // Data Koleksi (Empty Arrays jika kosong)
            'services'          => $services,
            'announcements'     => $announcements,
            'news'              => $news,
            'gallery'           => $gallery,
        ];
    }

    /**
     * Membaca semua data untuk halaman selain homepage.
     */
    public function getFullPageData($pageType)
    {
        switch ($pageType) {
            case 'berita':
                return $this->formatPosts($this->pageRepo->getPublishedPosts());
            case 'galeri':
                return $this->formatGalleries($this->pageRepo->getPublishedGalleries());
            case 'layanan':
                return $this->formatServices($this->pageRepo->getActiveServices());
            case 'profil':
                $page = $this->pageRepo->getPageByKey('profil');
                if ($page) {
                    return [
                        'title' => $page['title'],
                        'content' => $page['content']
                    ];
                }
                return null;
            default:
                return null;
        }
    }

    // --- Helpers Format Contract --- //

    private function formatMenus($menus)
    {
        return array_map(function($m) {
            return [
                'label' => $m['label'],
                'url' => $m['url'],
            ];
        }, $menus);
    }

    private function formatServices($items)
    {
        return array_map(function($i) {
            return [
                'title' => $i['title'],
                'description' => $i['description'],
                'icon_svg' => null, // fallback to CSS classes later or SVG string
                'url' => $i['url'],
                'is_active' => $i['is_active']
            ];
        }, $items);
    }

    private function formatAnnouncements($items)
    {
        return array_map(function($i) {
            return [
                'title' => $i['title'],
                'excerpt' => strip_tags(substr($i['content'], 0, 150)) . '...',
                'date' => date('d M Y', strtotime($i['published_at'])),
                'url' => '?page=pengumuman&slug=' . $i['slug'],
                'is_published' => ($i['status'] === 'published')
            ];
        }, $items);
    }

    private function formatPosts($items)
    {
        return array_map(function($i) {
            return [
                'title' => $i['title'],
                'excerpt' => $i['excerpt'] ?: strip_tags(substr($i['content'], 0, 150)) . '...',
                'date' => date('d M Y', strtotime($i['published_at'])),
                'category' => $i['category'],
                'image_url' => $i['featured_image'],
                'slug' => $i['slug'],
                'is_published' => ($i['status'] === 'published')
            ];
        }, $items);
    }

    private function formatGalleries($items)
    {
        return array_map(function($i) {
            return [
                'title' => $i['title'],
                'image_url' => $i['cover_image'],
                'caption' => $i['description'],
                'is_active' => ($i['status'] === 'published')
            ];
        }, $items);
    }
}
