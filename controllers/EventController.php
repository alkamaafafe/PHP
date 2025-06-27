<?php
require_once 'models/EventModel.php';

class EventController {
    public $model;

    public function __construct() {
        $this->model = new EventModel();
    }

    public function listEvents() {
        return $this->model->getAllEvents();
    }

    public function handleCreate($data) {
        $titre = trim($data['titre']);
        $date = $data['date_evenement'];
        $desc = trim($data['description']);

        if (empty($titre) || empty($date)) {
            return "Tous les champs sont obligatoires.";
        }

        if (!strtotime($date)) {
            return "Date invalide.";
        }

        if ($this->model->createEvent($titre, $date, $desc)) {
            return "Événement créé avec succès.";
        } else {
            return "Erreur lors de la création.";
    }
}
}
?>