<?php
/**
 * SchoolSphere-Pro — Page Repository
 *
 * Mengakses data halaman statis dengan fallback aman.
 */

class PageRepository
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

    public function getPageByKey($pageKey)
    {
        if (!$this->db) return null;

        try {
            $sql = "SELECT * FROM pages WHERE page_key = :key AND status = 'published' LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['key' => $pageKey]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (Throwable $e) {
            return null;
        }
    }

    // Untuk berita (semua post)
    public function getPublishedPosts()
    {
        if (!$this->db) return [];
        try {
            $sql = "SELECT * FROM posts WHERE status = 'published' ORDER BY published_at DESC";
            return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Throwable $e) {
            return [];
        }
    }

    // Untuk galeri lengkap
    public function getPublishedGalleries()
    {
        if (!$this->db) return [];
        try {
            $sql = "SELECT * FROM galleries WHERE status = 'published' ORDER BY sort_order ASC, created_at DESC";
            return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Throwable $e) {
            return [];
        }
    }

    // Untuk layanan lengkap
    public function getActiveServices()
    {
        if (!$this->db) return [];
        try {
            $sql = "SELECT * FROM important_links WHERE is_active = 1 ORDER BY sort_order ASC";
            return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Throwable $e) {
            return [];
        }
    }
}
