<?php
/**
 * SchoolSphere-Pro — Role Repository
 */

class RoleRepository
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

    public function getRoleByKey($roleKey)
    {
        if (!$this->db) return null;

        try {
            $stmt = $this->db->prepare("SELECT * FROM roles WHERE role_key = :key LIMIT 1");
            $stmt->execute(['key' => $roleKey]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (Throwable $e) {
            return null;
        }
    }
}
