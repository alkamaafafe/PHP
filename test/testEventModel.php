<?php
require_once '../models/EventModel.php';

$model = new EventModel();

// Test création
echo "✅ Test création d’événement : ";
$created = $model->createEvent("Événement test", "2025-01-01", "Un événement de test.");
echo $created ? "Succès<br>" : "Échec<br>";

// Test récupération
echo "📋 Liste des événements :<br>";
$events = $model->getAllEvents();
foreach ($events as $event) {
    echo "- " . $event['titre'] . " le " . $event['date_evenement']."<br>";
}
?>