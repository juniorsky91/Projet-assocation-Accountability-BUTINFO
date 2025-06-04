<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "yolou");

if (!$conn) {
    die("Erreur de connexion à la base.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $mot_de_passe = trim($_POST['mot_de_passe']);

    // On récupère l'utilisateur via son email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // Vérifie le mot de passe hashé
    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        $_SESSION['user'] = $user;
        header("Location: ../index.php");
        exit();
    } else {
        echo "<p style='color:red; text-align:center;'>Email ou mot de passe incorrect.</p>";
        echo "<p style='text-align:center;'><a href='../view/login.php'>Retour</a></p>";
    }
}
?>
