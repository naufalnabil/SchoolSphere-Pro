<?php
/**
 * SchoolSphere-Pro — SiteSetting Repository
 *
 * Mengakses data site_settings dengan fallback aman.
 */

class SiteSettingRepository
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

    public function getActiveSettings()
    {
        if (!$this->db) {
            return null;
        }

        try {
            $stmt = $this->db->query("SELECT * FROM site_settings WHERE is_active = 1 LIMIT 1");
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (Throwable $e) {
            // Jika tabel belum ada, return null
            return null;
        }
    }
}
