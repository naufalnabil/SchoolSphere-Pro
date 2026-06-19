<?php
/**
 * SchoolSphere-Pro — SiteSetting Model
 */

require_once __DIR__ . '/BaseModel.php';

class SiteSetting extends BaseModel
{
    protected $table = 'site_settings';

    /**
     * Ambil identitas sekolah (biasanya hanya 1 row yang aktif)
     */
    public function getActiveSettings()
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE is_active = 1 LIMIT 1";
        $stmt = $this->db->query($sql);
        return $stmt->fetch();
    }
}
