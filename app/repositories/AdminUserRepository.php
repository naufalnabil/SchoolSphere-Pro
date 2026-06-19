<?php
/**
 * SchoolSphere-Pro — AdminUser Repository
 */

class AdminUserRepository
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

    public function hasSuperAdmin()
    {
        if (!$this->db) return false;

        try {
            $sql = "SELECT COUNT(*) FROM admin_users au
                    JOIN roles r ON au.role_id = r.id
                    WHERE r.role_key = 'super_admin'";
            $stmt = $this->db->query($sql);
            return (int)$stmt->fetchColumn() > 0;
        } catch (Throwable $e) {
            return false;
        }
    }

    public function findByEmail($email)
    {
        if (!$this->db) return null;

        try {
            $sql = "SELECT au.*, r.role_key, r.role_name 
                    FROM admin_users au
                    JOIN roles r ON au.role_id = r.id
                    WHERE au.email = :email LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (Throwable $e) {
            return null;
        }
    }

    public function createAdminUser($roleId, $name, $email, $passwordHash, $status = 'active')
    {
        if (!$this->db) return false;

        try {
            $sql = "INSERT INTO admin_users (role_id, name, email, password_hash, status, created_at, updated_at) 
                    VALUES (:role_id, :name, :email, :password_hash, :status, NOW(), NOW())";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                'role_id'       => $roleId,
                'name'          => $name,
                'email'         => $email,
                'password_hash' => $passwordHash,
                'status'        => $status
            ]);
        } catch (Throwable $e) {
            return false;
        }
    }

    public function updateLastLogin($userId)
    {
        if (!$this->db) return false;

        try {
            $sql = "UPDATE admin_users SET last_login_at = NOW() WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute(['id' => $userId]);
        } catch (Throwable $e) {
            return false;
        }
    }
}
