<?php
/**
 * SchoolSphere-Pro — Auth Service
 */

require_once __DIR__ . '/../repositories/AdminUserRepository.php';
require_once __DIR__ . '/../repositories/RoleRepository.php';

class AuthService
{
    private $adminRepo;
    private $roleRepo;

    public function __construct()
    {
        $this->adminRepo = new AdminUserRepository();
        $this->roleRepo  = new RoleRepository();
    }

    public function isSuperAdminSetup()
    {
        return $this->adminRepo->hasSuperAdmin();
    }

    public function createSuperAdmin($name, $email, $password)
    {
        if ($this->isSuperAdminSetup()) {
            return ['success' => false, 'message' => 'Super admin sudah tersedia.'];
        }

        $superAdminRole = $this->roleRepo->getRoleByKey('super_admin');
        if (!$superAdminRole) {
            return ['success' => false, 'message' => 'Sistem role belum diatur (database seed hilang).'];
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $created = $this->adminRepo->createAdminUser($superAdminRole['id'], $name, $email, $hash, 'active');

        if ($created) {
            return ['success' => true, 'message' => 'Super admin berhasil dibuat.'];
        }

        return ['success' => false, 'message' => 'Gagal membuat super admin (database error).'];
    }

    public function attemptLogin($email, $password)
    {
        $user = $this->adminRepo->findByEmail($email);

        if (!$user || $user['status'] !== 'active') {
            return ['success' => false, 'message' => 'Email atau password tidak sesuai.'];
        }

        if (password_verify($password, $user['password_hash'])) {
            // Update last login
            $this->adminRepo->updateLastLogin($user['id']);

            // Setup session
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            
            // Regenerate ID for security to prevent fixation
            session_regenerate_id(true);

            $_SESSION['is_admin_logged_in'] = true;
            $_SESSION['admin_user_id'] = $user['id'];
            $_SESSION['admin_user_name'] = $user['name'];
            $_SESSION['admin_role_key'] = $user['role_key'];

            return ['success' => true];
        }

        return ['success' => false, 'message' => 'Email atau password tidak sesuai.'];
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Unset all of the session variables
        $_SESSION = array();

        // Destroy the session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Destroy session
        session_destroy();
    }
}
