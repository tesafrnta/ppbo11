<?php
class Database {
    private $host = "localhost";
    private $db_name = "kampus";
    private $username = "root";
    private $password = "Hpsz567qqp-";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
