<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.html');
    exit();
}

$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="dashboard">
        <header>
            <h1>Bienvenue, <?= $role === 'admin' ? 'Admin' : 'Vendeur' ?></h1>
            <nav>
                <a href="nouvelle_soumission.php" class="button">Nouvelle Soumission</a>
                <a href="mes_soumissions.php" class="button">Mes Soumissions</a>
                <a href="logout.php" class="button logout">Déconnexion</a>
            </nav>
        </header>
    </div>
</body>
</html>