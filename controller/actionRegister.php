<?php
require_once("model/userModel.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    if (emailExists($email)) {
        header("Location: view/register.php?error=email");
        exit();
    }

    ajouterUtilisateur($nom, $email, $mot_de_passe, $role);
    header("Location: view/login.php");
    exit();
}
?>
