<?php
session_start();
require_once("../model/eventModel.php");

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'gestionnaire') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Créer un événement</title>
  <link rel="stylesheet" href="../style/style-events.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>

  <div class="events-container">
    <h2>📝 Créer un événement</h2>

    <form method="post" action="../controller/actionCreateEvent.php" class="event-card">
      <label for="titre">Titre :</label><br>
      <input type="text" name="titre" required><br><br>

      <label for="description">Description :</label><br>
      <textarea name="description" required></textarea><br><br>

      <label for="date_event">Date :</label><br>
      <input type="date" name="date_event" required><br><br>

      <label for="type_event">Type :</label><br>
      <input type="text" name="type_event" required><br><br>

      <input type="submit" value="Créer" style="margin-top: 15px; padding: 10px 20px;">
    </form>
  </div>

</body>
</html>
