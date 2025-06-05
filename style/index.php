<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
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
    <nav class="navbar">
      <div class="nav-container">
        <div class="nav-left">
          <a href="index.php">
            <img src="image/logo3.png" alt="Logo Accountability" class="logo">
          </a>
          <ul class="nav-menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="view/events.php">Événements</a></li>
            <li><a href="#">Qui sommes-nous ?</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="buttons">
          <?php if (isset($_SESSION['user'])): ?>
            <a class="login" href="controller/logout.php">Se déconnecter</a>
          <?php else: ?>
            <a class="login" href="view/login.php">Se connecter</a>
            <a class="register" href="view/register.php">S’enregistrer</a>
          <?php endif; ?>
        </div>
      </div>
    </nav>

    <!-- Header avec vidéo -->
    <header class="video-header">
      <video autoplay muted loop class="video-background">
        <source src="background.mp4" type="video/mp4">
        Votre navigateur ne supporte pas la vidéo.
      </video>
      <div class="overlay-header">
        <h1>Prend le contrôle,<br>accepte réussir.</h1>
        <p>Une association contre la procrastination et pour l’inclusion</p>
      </div>
    </header>
  </section>
</body>
</html>