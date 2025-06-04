<?php
$conn = mysqli_connect("localhost", "root", "", "yolou");
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}
?>
