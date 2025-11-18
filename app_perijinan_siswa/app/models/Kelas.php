<?php
class Kelas {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getById($id_kelas) {
        $stmt = $this->db->prepare("SELECT * FROM kelas WHERE id_kelas = ?");
        $stmt->execute([$id_kelas]);
        return $stmt->fetch();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM kelas");
        return $stmt->fetchAll();
    }
}