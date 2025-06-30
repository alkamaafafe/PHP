<?php
require_once 'models/ParticipantModel.php';

class ParticipantController {
    private $model;

    public function __construct() {
        $this->model = new ParticipantModel();
    }

    public function listParticipants() {
        return $this->model->getAllParticipants();
    }

    public function handleRegister($data) {
        $nom = trim($data['nom']);
        $email = trim($data['email']);

        if (empty($nom) || empty($email)) {
            return "Tous les champs sont obligatoires.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Format d'email invalide.";
        }

        if ($this->model->createParticipant($nom, $email)) {
            return "Participant enregistré avec succès.";
        } else {
            return "Erreur lors de l'enregistrement.";
    }
}
}
?>

