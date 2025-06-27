<?php
require_once 'config/Database.php';

class EventModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllEvents() {
        $stmt = $this->conn->prepare("SELECT * FROM events ORDER BY date_evenement ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createEvent($titre, $date, $description) {
        $stmt = $this->conn->prepare("INSERT INTO events (titre, date_evenement, description) VALUES (?, ?, ?)");
        return $stmt->execute([$titre, $date, $description]);
    }

    public function getEventById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM events WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateEvent($id, $titre, $date, $description) {
        $stmt = $this->conn->prepare("UPDATE events SET titre = ?, date_evenement = ?, description = ? WHERE id = ?");
        return $stmt->execute([$titre, $date, $description, $id]);
    }

    public function deleteEvent($id) {
        $stmt = $this->conn->prepare("DELETE FROM events WHERE id = ?");
        return $stmt->execute([$id]);
}
}
?>