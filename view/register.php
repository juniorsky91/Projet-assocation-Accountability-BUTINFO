<?php include "header.php"; ?>

<?php if (isset($_GET['success'])): ?>
  <?php if ($_GET['success'] == '1'): ?>
    <p style="color:green; text-align:center;">Inscription réussie. Vous pouvez maintenant vous connecter.</p>
  <?php else: ?>
    <?php if (isset($_GET['error']) && $_GET['error'] === 'email'): ?>
      <p style="color:red; text-align:center;">Cet email est déjà enregistré.</p>
    <?php else: ?>
      <p style="color:red; text-align:center;">Une erreur s'est produite lors de l'inscription.</p>
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>

<h2>Inscription</h2>

<form method="post" action="controller/actionRegister.php">
  <label for="nom">Nom :</label><br>
  <input type="text" name="nom" required><br><br>

  <label for="email">Email :</label><br>
  <input type="email" name="email" required><br><br>

  <label for="mot_de_passe">Mot de passe :</label><br>
  <input type="password" name="mot_de_passe" required><br><br>

  <label for="role">Rôle :</label><br>
  <select name="role" required>
    <option value="sympathisant">Sympathisant</option>
    <option value="adherent">Adhérent</option>
    <option value="gestionnaire">Gestionnaire</option>
  </select><br><br>

  <input type="submit" value="S’inscrire">
</form>

<?php include "footer.php"; ?>
