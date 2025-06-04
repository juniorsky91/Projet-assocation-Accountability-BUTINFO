<?php
$conn = mysqli_connect("localhost", "root", "", "yolou");

if (!$conn) {
    die("❌ Connexion échouée à la base de données : " . mysqli_connect_error());
}

echo "✅ Connexion à la base réussie";

// Test une requête simple
$result = mysqli_query($conn, "SELECT * FROM users");

if ($result) {
    echo "<br>👍 Requête SELECT * FROM users OK";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }

} else {
    echo "<br>❌ La requête SQL a échoué : " . mysqli_error($conn);
}
