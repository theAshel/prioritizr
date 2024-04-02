<?php
session_start();

$username = $_SESSION["username"];

$stmt = $db_connexion->prepare("SELECT admin FROM user WHERE username = :username");
$stmt->bindValue(':username', $username);
$stmt->execute();
$checkadmin = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$username || $checkadmin["admin"] == 0) {
    session_destroy();
    header("Location: ./loginForm/login.php");
    exit(); // Terminer le script après la redirection
}

$username = $_SESSION["username"];
?>