<?php
/**
 * SchoolSphere-Pro — NavigationMenu Model
 */

require_once __DIR__ . '/BaseModel.php';

class NavigationMenu extends BaseModel
{
    protected $table = 'navigation_menus';

    /**
     * Ambil menu untuk Header, diurutkan berdasarkan sort_order
     */
    public function getHeaderMenus()
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE is_active = 1 AND show_in_header = 1 ORDER BY sort_order ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    /**
     * Ambil menu untuk Footer, diurutkan berdasarkan sort_order
     */
    public function getFooterMenus()
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE is_active = 1 AND show_in_footer = 1 ORDER BY sort_order ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
}
