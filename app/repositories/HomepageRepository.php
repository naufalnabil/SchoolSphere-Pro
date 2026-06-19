<?php
/**
 * SchoolSphere-Pro — Homepage Repository
 *
 * Mengakses data section homepage dengan fallback aman.
 */

class HomepageRepository
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = get_db_connection();
        } catch (Throwable $e) {
            $this->db = null;
        }
    }

    public function getActiveSections()
    {
        if (!$this->db) {
            return [];
        }

        try {
            $sql = "SELECT * FROM homepage_sections WHERE is_active = 1 ORDER BY sort_order ASC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Throwable $e) {
            return [];
        }
    }

    public function getHomepageImportantLinks()
    {
        if (!$this->db) return [];
        try {
            $sql = "SELECT * FROM important_links WHERE is_active = 1 AND show_on_homepage = 1 ORDER BY sort_order ASC LIMIT 6";
            return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Throwable $e) {
            return [];
        }
    }

    public function getHomepageAnnouncements()
    {
        if (!$this->db) return [];
        try {
            $sql = "SELECT * FROM announcements WHERE status = 'published' AND show_on_homepage = 1 AND (expired_at IS NULL OR expired_at > NOW()) ORDER BY priority DESC, published_at DESC LIMIT 3";
            return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Throwable $e) {
            return [];
        }
    }

    public function getHomepagePosts()
    {
        if (!$this->db) return [];
        try {
            $sql = "SELECT * FROM posts WHERE status = 'published' AND show_on_homepage = 1 ORDER BY published_at DESC LIMIT 3";
            return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Throwable $e) {
            return [];
        }
    }

    public function getHomepageGalleries()
    {
        if (!$this->db) return [];
        try {
            $sql = "SELECT * FROM galleries WHERE status = 'published' AND show_on_homepage = 1 ORDER BY sort_order ASC, created_at DESC LIMIT 4";
            return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Throwable $e) {
            return [];
        }
    }
}
