<?php
require_once '../models/InscriptionModel.php';

$model = new InscriptionModel();

// Choisir un participant et un événement existant (à adapter selon votre BDD)
$event_id = 1;
$participant_id = 1;

echo "✅ Test inscription à un événement : ";
$created = $model->createInscription($event_id, $participant_id);
echo $created ? "Succès<br>" : "Échec<br>";

// Affichage des inscriptions
echo "📋 Liste des inscriptions :<br>";
$inscriptions = $model->getAllInscriptions();
foreach ($inscriptions as $i) {
    echo "- " . $i['nom'] . " inscrit à " . $i['titre'] . " le " . $i['date_inscription']."<br>";
}
?>