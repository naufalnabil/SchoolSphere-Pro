-- SchoolSphere-Pro Initial Schema
-- Database: school_sphere_pro
-- Charset: utf8mb4
-- Engine: InnoDB

-- 1. site_settings
CREATE TABLE IF NOT EXISTS `site_settings` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `school_name` varchar(255) NOT NULL,
    `school_short_name` varchar(100) DEFAULT NULL,
    `tagline` varchar(255) DEFAULT NULL,
    `logo_path` varchar(255) DEFAULT NULL,
    `hero_title` varchar(255) DEFAULT NULL,
    `hero_subtitle` text DEFAULT NULL,
    `address` text DEFAULT NULL,
    `phone` varchar(50) DEFAULT NULL,
    `whatsapp` varchar(50) DEFAULT NULL,
    `email` varchar(100) DEFAULT NULL,
    `maps_embed_url` text DEFAULT NULL,
    `is_active` tinyint(1) NOT NULL DEFAULT 1,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. theme_settings
CREATE TABLE IF NOT EXISTS `theme_settings` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `primary_color` varchar(20) DEFAULT NULL,
    `secondary_color` varchar(20) DEFAULT NULL,
    `accent_color` varchar(20) DEFAULT NULL,
    `background_color` varchar(20) DEFAULT NULL,
    `text_color` varchar(20) DEFAULT NULL,
    `border_radius` varchar(20) DEFAULT NULL,
    `is_active` tinyint(1) NOT NULL DEFAULT 1,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. navigation_menus
CREATE TABLE IF NOT EXISTS `navigation_menus` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `label` varchar(100) NOT NULL,
    `url` varchar(255) NOT NULL,
    `page_key` varchar(50) DEFAULT NULL,
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `is_active` tinyint(1) NOT NULL DEFAULT 1,
    `show_in_header` tinyint(1) NOT NULL DEFAULT 1,
    `show_in_footer` tinyint(1) NOT NULL DEFAULT 1,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_page_key` (`page_key`),
    KEY `idx_is_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. homepage_sections
CREATE TABLE IF NOT EXISTS `homepage_sections` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `section_key` varchar(50) NOT NULL,
    `title` varchar(150) NOT NULL,
    `subtitle` varchar(255) DEFAULT NULL,
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `is_active` tinyint(1) NOT NULL DEFAULT 1,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `idx_section_key` (`section_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. pages
CREATE TABLE IF NOT EXISTS `pages` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `page_key` varchar(50) NOT NULL,
    `title` varchar(255) NOT NULL,
    `slug` varchar(255) NOT NULL,
    `excerpt` text DEFAULT NULL,
    `content` longtext DEFAULT NULL,
    `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
    `show_on_homepage` tinyint(1) NOT NULL DEFAULT 0,
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `idx_page_key` (`page_key`),
    UNIQUE KEY `idx_slug` (`slug`),
    KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. posts
CREATE TABLE IF NOT EXISTS `posts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `slug` varchar(255) NOT NULL,
    `excerpt` text DEFAULT NULL,
    `content` longtext DEFAULT NULL,
    `category` varchar(100) DEFAULT NULL,
    `featured_image` varchar(255) DEFAULT NULL,
    `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
    `published_at` timestamp NULL DEFAULT NULL,
    `show_on_homepage` tinyint(1) NOT NULL DEFAULT 0,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `idx_slug` (`slug`),
    KEY `idx_status` (`status`),
    KEY `idx_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. announcements
CREATE TABLE IF NOT EXISTS `announcements` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `slug` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `priority` enum('low','normal','high') NOT NULL DEFAULT 'normal',
    `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
    `published_at` timestamp NULL DEFAULT NULL,
    `expired_at` timestamp NULL DEFAULT NULL,
    `show_on_homepage` tinyint(1) NOT NULL DEFAULT 1,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `idx_slug` (`slug`),
    KEY `idx_status` (`status`),
    KEY `idx_priority` (`priority`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. galleries
CREATE TABLE IF NOT EXISTS `galleries` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `slug` varchar(255) NOT NULL,
    `description` text DEFAULT NULL,
    `cover_image` varchar(255) DEFAULT NULL,
    `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
    `show_on_homepage` tinyint(1) NOT NULL DEFAULT 0,
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `idx_slug` (`slug`),
    KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. gallery_items
CREATE TABLE IF NOT EXISTS `gallery_items` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `gallery_id` int(11) NOT NULL,
    `image_path` varchar(255) NOT NULL,
    `caption` varchar(255) DEFAULT NULL,
    `alt_text` varchar(255) DEFAULT NULL,
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `is_active` tinyint(1) NOT NULL DEFAULT 1,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `fk_gallery_id` (`gallery_id`),
    CONSTRAINT `fk_gallery_items_gallery` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 10. important_links
CREATE TABLE IF NOT EXISTS `important_links` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(150) NOT NULL,
    `description` varchar(255) DEFAULT NULL,
    `url` varchar(255) NOT NULL,
    `icon_key` varchar(50) DEFAULT NULL,
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `is_active` tinyint(1) NOT NULL DEFAULT 1,
    `show_on_homepage` tinyint(1) NOT NULL DEFAULT 0,
    `show_in_footer` tinyint(1) NOT NULL DEFAULT 0,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_is_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
