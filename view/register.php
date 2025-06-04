<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../style/style-register.css">
</head>
<body>
    <!-- Vidéo d'arrière-plan -->
    <video class="video-bg" autoplay muted loop>
        <source src="background.mp4" type="video/mp4">
    </video>
    
    <!-- Overlay -->
    <div class="overlay"></div>
    
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="logo">MonSite</a>
            <ul class="nav-menu">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="about.php">À propos</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="main-content">
        <div class="register-container">
            <div class="register-box">
                <h1>Inscription</h1>
                <p>Créez votre compte</p>
                
                <!-- Messages d'erreur/succès -->
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert error">
                        <?php 
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert success">
                        <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php endif; ?>
                
                <!-- Formulaire -->
                <form action="action_register.php" method="POST" class="register-form">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Nom d'utilisateur" 
                               value="<?php echo isset($_SESSION['form_data']['username']) ? htmlspecialchars($_SESSION['form_data']['username']) : ''; ?>" 
                               required>
                        <?php if (isset($_SESSION['errors']['username'])): ?>
                            <span class="error-text"><?php echo $_SESSION['errors']['username']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Adresse email" 
                               value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>" 
                               required>
                        <?php if (isset($_SESSION['errors']['email'])): ?>
                            <span class="error-text"><?php echo $_SESSION['errors']['email']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Mot de passe" required>
                        <?php if (isset($_SESSION['errors']['password'])): ?>
                            <span class="error-text"><?php echo $_SESSION['errors']['password']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
                        <?php if (isset($_SESSION['errors']['confirm_password'])): ?>
                            <span class="error-text"><?php echo $_SESSION['errors']['confirm_password']; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="btn-register">S'inscrire</button>
                </form>
                
                <!-- Lien vers connexion -->
                <div class="login-link">
                    <p>Vous avez déjà un compte ?</p>
                    <a href="login.php">Se connecter</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

<?php
// Nettoyer les données de session après affichage
unset($_SESSION['errors']);
unset($_SESSION['form_data']);
?>