<?php
require_once("model/eventModel.php");

echo "<h2>Test récupération des événements :</h2>";

$events = recupererEvenements();

while ($e = mysqli_fetch_assoc($events)) {
    echo "<pre>";
    print_r($e);
    echo "</pre><hr>";
}

