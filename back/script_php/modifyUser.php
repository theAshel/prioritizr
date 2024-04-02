<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../gestion_utilisateur.php");
    die();
}

$host = '51.38.33.73';
$username = 'user';
$password = 'myPasswd';
$database = 'prioritizr_db';
$db_connexion = new PDO("mysql:host=$host;dbname=$database", $username, $password);


if (isset($_POST["username"]) and isset($_POST["firstname"]) and isset($_POST["lastname"]) and isset($_POST["mail"]) and isset($_POST["id_user"])) {
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $mail = $_POST["mail"];
    $id_user = $_POST["id_user"];
    if ($_POST["newsletter"] == "Oui"){
        $newsletter = 1;
    } else {
        $newsletter = 0;
    }
    if ($_POST["admin"] == "Oui"){
        $admin = 1;
    } else {
        $admin = 0;
    }
    $sql = "UPDATE user SET username='$username', firstname='$firstname', lastname='$lastname', mail='$mail', newsletter='$newsletter', admin=$admin WHERE id_user='$id_user' ";
    $db_connexion->query($sql);
    header("Location: ../gestion_utilisateur.php");
        
}


?>
