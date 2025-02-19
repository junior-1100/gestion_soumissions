<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Soumission</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="dashboard">
        <header>
            <h1>Nouvelle Soumission</h1>
            <a href="dashboard.php" class="button">Retour au tableau de bord</a>
        </header>
        
        <form action="traiter_soumission.php" method="POST" class="form-container">
            <div class="form-group">
                <label for="client_nom">Nom du client :</label>
                <input type="text" id="client_nom" name="client_nom" required>
            </div>
            
            <div class="form-group">
                <label for="client_email">Email du client :</label>
                <input type="email" id="client_email" name="client_email" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="montant">Montant ($) :</label>
                <input type="number" id="montant" name="montant" step="0.01" required>
            </div>
            
            <button type="submit" class="button">Créer la soumission</button>
        </form>
    </div>
</body>
</html>