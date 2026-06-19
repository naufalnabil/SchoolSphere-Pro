<?php
/**
 * SchoolSphere-Pro — BaseModel
 *
 * Kelas dasar untuk interaksi tabel ke database menggunakan PDO.
 */

abstract class BaseModel
{
    protected $db;
    protected $table;

    public function __construct()
    {
        // Akan memanggil helper dari app/helpers/database.php
        $this->db = get_db_connection();
    }

    /**
     * Mengambil semua data dari tabel (aktif saja secara default)
     */
    public function findAll($activeOnly = true)
    {
        $sql = "SELECT * FROM `{$this->table}`";
        if ($activeOnly) {
            $sql .= " WHERE is_active = 1";
        }
        
        // Coba sorting berdasarkan sort_order jika tabel memilikinya (asumsi dasar)
        // Karena ini abstrak, pastikan di child class jika perlu spesifik.
        try {
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Mencari satu baris data berdasarkan ID
     */
    public function findById($id)
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}
