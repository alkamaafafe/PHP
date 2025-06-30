<?php include '../layout/header.php'; ?>
<?php require_once '../../controllers/EventController.php';

$controller = new EventController();
$events = $controller->listEvents();
?>

<h2>Liste des Événements</h2>
<table border="1">
    <tr>
        <th>Titre</th>
        <th>Date</th>
        <th>Description</th>
    </tr>
    <?php foreach ($events as $event): ?>
    <tr>
        <td><?= htmlspecialchars($event['titre']) ?></td>
        <td><?= htmlspecialchars($event['date_evenement']) ?></td>
        <td><?= htmlspecialchars($event['description']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../layout/footer.php';?>

