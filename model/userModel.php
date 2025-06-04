<?php
require_once("connexion.php");

//  Fonction d'inscription
function ajouterUtilisateur($nom, $email, $mot_de_passe, $role) {
    global $conn;

    $sql = "INSERT INTO users (nom, email, mot_de_passe, role)
            VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $nom, $email, $mot_de_passe, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

//  Fonction de connexion
function getUserByEmail($email) {
    global $conn;

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_assoc($result); // retourne l'utilisateur ou null
}
