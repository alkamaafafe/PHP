<?php
include '../layout/header.php';
require_once '../../controllers/EventController.php';

$controller = new EventController();
$message = '';

// Vérifier si l’ID de l’événement est présent dans l’URL
if (!isset($_GET['id'])) {
    echo "<p>ID d’événement manquant.</p>";
    include '../layout/footer.php';
    exit;
}

// Récupérer l’événement existant
$event = $controller->model->getEventById($_GET['id']);

if (!$event) {
    echo "<p>Événement non trouvé.</p>";
    include '../layout/footer.php';
    exit;
}

// Gérer la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $date = $_POST['date_evenement'];
    $description = $_POST['description'];

    if (empty($titre) || empty($date)) {
        $message = "Tous les champs obligatoires.";
    } elseif (!strtotime($date)) {
        $message = "Date invalide.";
    } else {
        $updated = $controller->model->updateEvent($_GET['id'], $titre, $date, $description);
        if ($updated) {
            $message = "Événement modifié avec succès.";
            // Recharger les nouvelles données :
            $event = $controller->model->getEventById($_GET['id']);
        } else {
            $message = "Erreur lors de la modification.";
        }
    }
}
?>

<h2>Modifier l'Événement</h2>

<form method="POST">
    <label>Titre :</label><br>
    <input type="text" name="titre" value="<?= htmlspecialchars($event['titre']) ?>" required><br>

    <label>Date :</label><br>
    <input type="date" name="date_evenement" value="<?= htmlspecialchars($event['date_evenement']) ?>" required><br>

    <label>Description :</label><br>
    <textarea name="description"><?= htmlspecialchars($event['description']) ?></textarea><br>

    <input type="submit" value="Modifier">
</form>

<?php if ($message): ?>
    <p><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<?php include '../layout/footer.php';?>