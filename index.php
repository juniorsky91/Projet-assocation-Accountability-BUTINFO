<?php include "view/header.php"; ?>

<?php if (isset($_GET['logout']) && $_GET['logout'] == 1): ?>
  <p style="color: green; text-align: center;"> Vous avez été déconnecté avec succès.</p>
<?php endif; ?>

<header class="video-header">
  <video class="video-background" autoplay muted loop playsinline>
    <source src="video/intro2.mp4" type="video/mp4">
  </video>
  <div class="overlay-header">
    <h1>Prend le contrôle, accepte réussir.</h1>
    <p>Une association contre la procrastination et pour l’inclusion</p>
  </div>
</header>

<?php include "view/footer.php"; ?>
