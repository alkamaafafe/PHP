<?php
require_once 'config/Database.php';

class InscriptionModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllInscriptions() {
        $stmt = $this->conn->prepare("
            SELECT i.id, p.nom, p.email, e.titre, i.date_inscription
            FROM inscriptions i
            JOIN participants p ON i.participant_id = p.id
            JOIN events e ON i.event_id = e.id
            ORDER BY i.date_inscription DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createInscription($event_id, $participant_id) {
        $stmt = $this->conn->prepare("INSERT INTO inscriptions (event_id, participant_id, date_inscription) VALUES (?, ?, NOW())");
        return $stmt->execute([$event_id, $participant_id]);
}
}
?>