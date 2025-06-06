<?php
require_once("connexion.php");

function verifyCredentials($email, $plainPassword) {
    global $conn;

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if ($user && password_verify($plainPassword, $user['mot_de_passe'])) {
        return $user;
    }

    return false;
}
?>
