<?php
/**
 * SchoolSphere-Pro — Navigation Repository
 *
 * Mengakses data navigation_menus dengan fallback aman.
 */

class NavigationRepository
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

    public function getHeaderMenus()
    {
        if (!$this->db) {
            return [];
        }

        try {
            $sql = "SELECT * FROM navigation_menus WHERE is_active = 1 AND show_in_header = 1 ORDER BY sort_order ASC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Throwable $e) {
            return [];
        }
    }

    public function getFooterMenus()
    {
        if (!$this->db) {
            return [];
        }

        try {
            $sql = "SELECT * FROM navigation_menus WHERE is_active = 1 AND show_in_footer = 1 ORDER BY sort_order ASC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Throwable $e) {
            return [];
        }
    }
}
