<?php
session_start();
require_once("../model/connexion.php");
require_once("../model/eventModel.php");


// Vérifie que l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: ../view/login.php");
    exit();
}

$titre = $_POST['titre'];
$description = $_POST['description'];
$date = $_POST['date_event'];
$type = $_POST['type_event'];

//  On récupère l'ID de l'utilisateur connecté
$id_createur = $_SESSION['user']['id'];

ajouterEvenement($titre, $description, $date, $type, $id_createur);

header("Location: ../view/events.php");
exit();

