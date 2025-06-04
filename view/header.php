<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Osez pour changer</title>
  <link rel="stylesheet" href="style/style-simple.css">
</head>
<body>
  <section class="page">
    <!-- Barre de navigation -->
    <nav>
      <div class="nav-left">
        <img src="image/logo3.png" alt="Logo Accountability" class="logo">
        <div class="onglets" id="nav-links">
          <a href="index.php">Accueil</a>
          <a href="view/events.php">Événements</a>
          <a href="#">Qui sommes-nous ?</a>
          <a href="#">Contact</a>
        </div>
      </div>
      <div class="buttons">
      <?php if (isset($_SESSION['user'])): ?>
         <a class="login" href="controller/logout.php">Se déconnecter</a>
      <?php else: ?>
         <a class="login" href="view/login.php">Se connecter</a>
         <a class="register" href="view/register.php">S’enregistrer</a>
      <?php endif; ?>
      </div>
    </nav>
