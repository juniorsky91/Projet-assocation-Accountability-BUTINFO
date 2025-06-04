<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "yolou");

if (!$conn) {
    die("Erreur de connexion à la base.");
}

$_SESSION['errors'] = [];
$_SESSION['form_data'] = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $_SESSION['form_data']['username'] = $username;
    $_SESSION['form_data']['email'] = $email;

    // Vérifs simples
    if (empty($username)) {
        $_SESSION['errors']['username'] = "Nom d'utilisateur requis";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors']['email'] = "Email invalide";
    }

    if (strlen($password) < 6) {
        $_SESSION['errors']['password'] = "Mot de passe trop court (min. 6 caractères)";
    }

    if ($password !== $confirm_password) {
        $_SESSION['errors']['confirm_password'] = "Les mots de passe ne correspondent pas";
    }

    // Si erreurs, retour
    if (!empty($_SESSION['errors'])) {
        header("Location: register.php");
        exit();
    }

    // Vérifier si email déjà existant
    $check = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);

    if (mysqli_stmt_num_rows($check) > 0) {
        $_SESSION['errors']['email'] = "Email déjà utilisé";
        header("Location: register.php");
        exit();
    }

    // Tout est OK : insérer
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $insert = mysqli_prepare($conn, "INSERT INTO users (nom, email, mot_de_passe, role) VALUES (?, ?, ?, 'sympathisant')");
    mysqli_stmt_bind_param($insert, "sss", $username, $email, $hashed);
    mysqli_stmt_execute($insert);

    $_SESSION['success'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
    unset($_SESSION['form_data']);
    header("Location: register.php");
    exit();
}
?>
