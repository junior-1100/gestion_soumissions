<?php
session_start();
require 'db.php'; // Inclure le fichier de connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe dans la base de données
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['mot_de_passe'])) {
        // Connexion réussie
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header('Location: dashboard.php'); // Rediriger vers le tableau de bord
        exit();
    } else {
        // Connexion échouée
        echo "Email ou mot de passe incorrect.";
    }
}
?>