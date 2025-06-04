<?php
session_start();
require_once("../model/eventModel.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$evenements = recupererEvenements();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des événements | Osez pour changer</title>
  <link rel="stylesheet" href="../style/style-events.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>

  <div class="events-container">
    <h2>📅 Liste des événements</h2>

    <?php if ($_SESSION['user']['role'] === 'gestionnaire') : ?>
      <div style="text-align:center; margin-bottom: 30px;">
        <a href="createEvent.php" style="
          background-color: #333;
          color: #fff;
          padding: 10px 20px;
          border-radius: 6px;
          text-decoration: none;
          font-weight: 500;
        ">➕ Créer un événement</a>
      </div>
    <?php endif; ?>

    <?php
    if (!$evenements || mysqli_num_rows($evenements) === 0) {
        echo "<p style='text-align:center;'>Aucun événement pour le moment.</p>";
    } else {
        while ($event = mysqli_fetch_assoc($evenements)) {
            echo "<div class='event-card'>";
            echo "<h3>" . htmlspecialchars($event['titre']) . "</h3>";
            echo "<p>" . htmlspecialchars($event['description']) . "</p>";
            echo "<p><strong>Date :</strong> " . htmlspecialchars($event['date_event']) . "</p>";
            echo "<p><strong>Type :</strong> " . htmlspecialchars($event['type_event']) . "</p>";
            echo "</div>";
        }
    }
    ?>
  </div>

</body>
</html>
