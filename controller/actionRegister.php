<?php
require_once("../model/userModel.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Vérifie si l'email est déjà présent dans la base
    if (getUserByEmail($email)) {
        header("Location: ../view/register.php?success=0&error=email");
        exit();
    }

    // Ajout de l'utilisateur puis redirection avec message de succès
    ajouterUtilisateur($nom, $email, $mot_de_passe, $role);
    header("Location: ../view/register.php?success=1");
    exit();
}
?>
