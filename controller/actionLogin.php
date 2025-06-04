<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "yolou");

if (!$conn) {
    die("Erreur de connexion à la base.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT * FROM users WHERE email = ? AND mot_de_passe = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $mot_de_passe);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: ../index.php");
        exit();
    } else {
        echo "<p style='color:red;'>Email ou mot de passe incorrect.</p>";
    }
}
?>
