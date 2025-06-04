<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'gestionnaire') {
    header("Location: view/login.php");
    exit();
}
?>
