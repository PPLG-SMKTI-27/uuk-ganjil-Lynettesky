<?php
class User {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function findByUsername($username) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = ? LIMIT 1');
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function create($username, $password, $role) {
    $stmt = $this->db->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$username, $password, $role]);
    return $this->db->lastInsertId();
}
}