<?php
require_once 'models/InscriptionModel.php';

class InscriptionController {
    private $model;

    public function __construct() {
        $this->model = new InscriptionModel();
    }

    public function listInscriptions() {
        return $this->model->getAllInscriptions();
    }

    public function handleInscription($data) {
        $event_id = $data['event_id'];
        $participant_id = $data['participant_id'];

        if (empty($event_id) || empty($participant_id)) {
            return "Veuillez sélectionner un événement et un participant.";
        }

        if ($this->model->createInscription($event_id, $participant_id)) {
            return "Inscription enregistrée avec succès.";
        } else {
            return "Erreur lors de l'inscription.";
    }
}
}
?>