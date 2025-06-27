<?php
require_once '../models/ParticipantModel.php';

$model = new ParticipantModel();

// Test création
echo "✅ Test enregistrement d’un participant : ";
$created = $model->createParticipant("Test Nom", "test@email.com");
echo $created ? "Succès<br>" : "Échec<br>";

// Test récupération
echo "📋 Liste des participants :<br>";
$participants = $model->getAllParticipants();
foreach ($participants as $p) {
    echo "- " . $p['nom'] . " (" . $p['email'].")<br>";
}
?>