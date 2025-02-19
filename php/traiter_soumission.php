<?php
session_start();
require 'db.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.html');
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $vendeur_id = $_SESSION['user_id'];
    $client_nom = $_POST['client_nom'];
    $client_email = $_POST['client_email'];
    $description = $_POST['description'];
    $montant = $_POST['montant'];

    try {
        // Préparer et exécuter la requête d'insertion
        $stmt = $pdo->prepare("INSERT INTO soumissions (vendeur_id, client_nom, client_email, description, montant) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$vendeur_id, $client_nom, $client_email, $description, $montant]);

        // Rediriger vers une page de confirmation
        header('Location: mes_soumissions.php?success=1');
        exit();
    } catch (PDOException $e) {
        // En cas d'erreur, afficher un message
        echo "Erreur lors de la création de la soumission : " . $e->getMessage();
    }
}
?>