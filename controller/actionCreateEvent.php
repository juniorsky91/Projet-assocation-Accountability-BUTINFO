<?php
session_start();
require_once("../model/eventModel.php");


// Vérifie que l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: ../view/login.php");
    exit();
}

// Nettoyage des entrées utilisateur pour éviter l'injection de contenu
$titre = htmlspecialchars(trim($_POST['titre']), ENT_QUOTES, 'UTF-8');
$description = htmlspecialchars(trim($_POST['description']), ENT_QUOTES, 'UTF-8');
$date = $_POST['date_event'];
$type = htmlspecialchars(trim($_POST['type_event']), ENT_QUOTES, 'UTF-8');

//  On récupère l'ID de l'utilisateur connecté
$id_createur = $_SESSION['user']['id'];

ajouterEvenement($titre, $description, $date, $type, $id_createur);

header("Location: ../view/events.php");
exit();

