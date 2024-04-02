<?php

require "../../database/databaseConnection.php";

$mail = $_POST['mail'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$gender = $_POST['gender'];
$age = $_POST['age'];
$country = $_POST['country'];
$use_type = $_POST['use_type'];
$newsletter = $_POST['newsletter'];

$createUserQuery = $db_connexion->prepare("INSERT INTO user (mail, firstname, lastname, username, password, gender, age, country, use_type, newsletter) VALUES (:mail, :firstname, :lastname, :username, :password, :gender, :age, :country, :use_type, :newsletter)");

try {
    $createUserQuery->execute([
        "mail" => htmlspecialchars($mail),
        "firstname" => htmlspecialchars($firstname),
        "lastname" => htmlspecialchars($lastname),
        "username" => htmlspecialchars($username),
        "password" => $hashedPassword,
        "gender" => htmlspecialchars($gender),
        "age" => htmlspecialchars($age),
        "country" => htmlspecialchars($country),
        "use_type" => htmlspecialchars($use_type),
        "newsletter" => htmlspecialchars($newsletter)
    ]);

    // Récupérer l'ID du nouvel utilisateur créé
    $newUserId = $db_connexion->lastInsertId();

    // Créer l'avatar par défaut

    $insertAvatarQuery = $db_connexion->prepare("INSERT INTO AVATAR (id_user) VALUES (:user_id)");
    $insertAvatarQuery->execute([
        "user_id" => $newUserId
    ]);

    $getNewUserQuery = $db_connexion->prepare("SELECT * FROM user WHERE mail = :identifier");
    $getNewUserQuery->execute(["identifier" => $mail]);

    $user = $getNewUserQuery->fetch(PDO::FETCH_ASSOC);

    session_start();
    $_SESSION["username"] = $user["username"];
    $_SESSION["firstname"] = $user["firstname"];
    $_SESSION["mail"] = $user["mail"];
    $_SESSION["lastname"] = $user["lastname"];
    $_SESSION["password"] = $user["password"];
    $_SESSION["gender"] = $user["gender"];
    $_SESSION["age"] = $user["age"];
    $_SESSION["country"] = $user["country"];
    $_SESSION["user_id"] = $user["id_user"];
    $_SESSION["admin"] = $user["admin"];
    $_SESSION["is_ban"] = $user["isban"];
} catch(PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
}

?>
