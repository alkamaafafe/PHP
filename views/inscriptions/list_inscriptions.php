<?php include '../layout/header.php'; ?>
<?php 
require_once '../../controllers/InscriptionController.php';
$controller = new InscriptionController();
$inscriptions = $controller->listInscriptions();
?>

<h2>Liste des Inscriptions</h2>
<table border="1">
    <tr>
        <th>Participant</th>
        <th>Email</th>
        <th>Événement</th>
        <th>Date d'inscription</th>
    </tr>
    <?php foreach ($inscriptions as $row): ?>
    <tr>
        <td><?= htmlspecialchars($row['nom']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['titre']) ?></td>
        <td><?= htmlspecialchars($row['date_inscription']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../layout/footer.php';?>

