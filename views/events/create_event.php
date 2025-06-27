<?php include '../layout/header.php'; ?>
<?php require_once '../../controllers/EventController.php';

$message = '';
$controller = new EventController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $controller->handleCreate($_POST);
}
?>

<h2>Créer un événement</h2>
<form method="POST">
    <label>Titre :</label><br>
    <input type="text" name="titre" required><br>

    <label>Date :</label><br>
    <input type="date" name="date_evenement" required><br>

    <label>Description :</label><br>
    <textarea name="description"></textarea><br>

    <input type="submit" value="Créer">
</form>

<?php if ($message): ?>
    <p><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<?php include '../layout/footer.php';?>