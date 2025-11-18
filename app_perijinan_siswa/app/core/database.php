<?php
class Database {
    private $host = 'localhost';
    private $dbName = 'app_perijinan';
    private $user = 'root';
    private $pass = '';
    private $conn = null;

    public function connect() {
        if ($this->conn === null) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ];
                $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (PDOException $e) {
                die("Koneksi gagal: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}