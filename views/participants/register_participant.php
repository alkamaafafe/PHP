<?php include '../layout/header.php'; ?>
<?php 
require_once '../../controllers/ParticipantController.php';
require_once '../../controllers/EventController.php';

$participantCtrl = new ParticipantController();
$eventCtrl = new EventController();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $participantCtrl->handleRegister($_POST);
}

$events = $eventCtrl->listEvents();
?>

<h2>Inscription Participant</h2>
<form method="POST">
    <label>Nom :</label><br>
    <input type="text" name="nom" required><br>

    <label>Email :</label><br>
    <input type="email" name="email" required><br>

    <label>Choisir un événement :</label><br>
    <select name="event_id" required>
        <?php foreach ($events as $event): ?>
            <option value="<?= $event['id'] ?>"><?= $event['titre'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="S'inscrire">
</form>

<?php if ($message): ?>
    <p><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<?php include '../layout/footer.php';?>

