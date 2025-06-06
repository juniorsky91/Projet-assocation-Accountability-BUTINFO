<?php
session_start();
require_once("../model/loginModel.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $user = getUserByEmail($email);

    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        $_SESSION['user'] = $user;
        header("Location: ../index.php");
        exit();
    } else {
        echo "<p style='color:red;'>Email ou mot de passe incorrect.</p>";
    }
}
?>
