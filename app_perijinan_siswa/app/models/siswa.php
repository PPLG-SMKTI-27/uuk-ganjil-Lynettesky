<?php
class Siswa {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function getByUser($id_user) {
        $stmt = $this->db->prepare('SELECT * FROM siswa WHERE id_user = ? LIMIT 1');
        $stmt->execute([$id_user]);
        return $stmt->fetch();
    }
    public function create($id_user, $nama, $id_kelas) {
    $stmt = $this->db->prepare("INSERT INTO siswa (id_user, nama, id_kelas) VALUES (?, ?, ?)");
    $stmt->execute([$id_user, $nama, $id_kelas]);
}
}