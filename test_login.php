<?php
// Simuler un mot de passe entré par l'utilisateur
$mot_de_passe_saisi = 'admin123';

// Le mot de passe stocké dans la BDD (doit venir de phpMyAdmin)
$hash_en_bdd = '$2y$10$KZjbP8ZtKoIjz16InuRoi.kP2fxF8aEz5vGN7Ot69sXssShgbPt5i';

// Vérification
if (password_verify($mot_de_passe_saisi, $hash_en_bdd)) {
    echo "✅ password_verify() OK : mot de passe correct";
} else {
    echo "❌ password_verify() échoue";
}
