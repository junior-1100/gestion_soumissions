<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.html');
    exit();
}

// Récupérer les soumissions du vendeur
$stmt = $pdo->prepare("SELECT * FROM soumissions WHERE vendeur_id = ? ORDER BY date_creation DESC");
$stmt->execute([$_SESSION['user_id']]);
$soumissions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Soumissions</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="dashboard">
        <header>
            <h1>Mes Soumissions</h1>
            <nav>
                <a href="nouvelle_soumission.php" class="button">Nouvelle Soumission</a>
                <a href="dashboard.php" class="button">Retour au tableau de bord</a>
            </nav>
        </header>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert success">
                La soumission a été créée avec succès !
            </div>
        <?php endif; ?>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Client</th>
                        <th>Montant</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($soumissions as $soumission): ?>
                        <tr>
                            <td><?= date('d/m/Y H:i', strtotime($soumission['date_creation'])) ?></td>
                            <td><?= htmlspecialchars($soumission['client_nom']) ?></td>
                            <td><?= number_format($soumission['montant'], 2, ',', ' ') ?> $</td>
                            <td><?= $soumission['statut'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>