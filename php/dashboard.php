<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html'); // Rediriger vers la page de connexion
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
    <h1>Bienvenue, <?= $role === 'admin' ? 'Admin' : 'Vendeur' ?></h1>
    <a href="logout.php">Déconnexion</a>
</body>
</html>