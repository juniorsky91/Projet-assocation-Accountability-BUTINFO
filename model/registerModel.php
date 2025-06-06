<?php
require_once("connexion.php");

function ajouterUtilisateur($nom, $email, $mot_de_passe, $role) {
    global $conn;

    $sql = "INSERT INTO users (nom, email, mot_de_passe, role) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $nom, $email, $mot_de_passe, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
?>
