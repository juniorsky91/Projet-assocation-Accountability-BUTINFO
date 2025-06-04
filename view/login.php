<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Osez pour changer</title>
    <link rel="stylesheet" href="../style/style-login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>

    <form class="login-box" method="post" action="../controller/actionLogin.php">
        <div class="login-header">
            <header>Connexion</header>
        </div>

        <div class="input-box">
            <input type="email" name="email" class="input-field" placeholder="Email" required>
        </div>

        <div class="input-box">
            <input type="password" name="mot_de_passe" class="input-field" placeholder="Mot de passe" required>
        </div>

        <div class="forgot">
            <section>
                <input type="checkbox" id="check">
                <label for="check">Se souvenir de moi</label>
            </section>
            <section>
                <a href="#">Mot de passe oublié ?</a>
            </section>
        </div>

        <div class="input-submit">
            <button class="submit-btn" id="submit"></button>
            <label for="submit">Se connecter</label>
        </div>

        <div class="sign-up-link">
            <p>Pas encore de compte ? <a href="register.php">Créer un compte</a></p>
        </div>
    </form>

</body>
</html>
