<?php
require_once 'config/Database.php';

class ParticipantModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllParticipants() {
        $stmt = $this->conn->prepare("SELECT * FROM participants ORDER BY nom ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createParticipant($nom, $email) {
        $stmt = $this->conn->prepare("INSERT INTO participants (nom, email) VALUES (?, ?)");
        return $stmt->execute([$nom, $email]);
    }

    public function getParticipantById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM participants WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
}
}
?>