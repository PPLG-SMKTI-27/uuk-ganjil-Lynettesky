<?php
class Leave {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function add($id_siswa, $tanggal, $alasan) {
        $stmt = $this->db->prepare('
            INSERT INTO student_leave (id_siswa, tanggal, alasan, status)
            VALUES (?, ?, ?, "pending")
        ');
        $stmt->execute([$id_siswa, $tanggal, $alasan]);
    }

    public function getBySiswa($id_siswa) {
        $stmt = $this->db->prepare('SELECT * FROM student_leave WHERE id_siswa = ? ORDER BY id_leave DESC');
        $stmt->execute([$id_siswa]);
        return $stmt->fetchAll();
    }

    public function getPendingByKelas($kelas) {
        $stmt = $this->db->prepare('
            SELECT sl.*, s.nama, s.kelas
            FROM student_leave sl
            JOIN siswa s ON s.id_siswa = sl.id_siswa
            WHERE sl.status = "pending" AND s.kelas = ?
            ORDER BY sl.id_leave DESC
        ');
        $stmt->execute([$kelas]);
        return $stmt->fetchAll();
    }

    public function getById($id_leave) {
        $stmt = $this->db->prepare('
            SELECT sl.*, s.nama, s.kelas
            FROM student_leave sl
            JOIN siswa s ON s.id_siswa = sl.id_siswa
            WHERE sl.id_leave = ?
            LIMIT 1
        ');
        $stmt->execute([$id_leave]);
        return $stmt->fetch();
    }

    public function approve($id_leave, $id_wali) {
        $stmt = $this->db->prepare('
            UPDATE student_leave
            SET status = "approved", approved_by = ?, approved_at = NOW()
            WHERE id_leave = ?
        ');
        $stmt->execute([$id_wali, $id_leave]);
    }

    public function reject($id_leave, $id_wali) {
        $stmt = $this->db->prepare('
            UPDATE student_leave
            SET status = "rejected", approved_by = ?, approved_at = NOW()
            WHERE id_leave = ?
        ');
        $stmt->execute([$id_wali, $id_leave]);
    }
}