<?php
require_once("connexion.php");

function ajouterEvenement($titre, $description, $date, $type, $id_createur) {
    global $conn;
    $sql = "INSERT INTO events (titre, description, date_event, type_event, id_createur)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $titre, $description, $date, $type, $id_createur);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function recupererEvenements() {
    global $conn;
    return mysqli_query($conn, "SELECT * FROM events ORDER BY date_event ASC");
}
