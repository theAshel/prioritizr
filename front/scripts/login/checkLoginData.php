<?php

require "../../database/databaseConnection.php";

$identifier = $_POST['identifier'];
$password = $_POST['password'];

$getUserQuery = $db_connexion->prepare("SELECT * FROM user WHERE mail = :identifier OR BINARY username = :identifier");
$getUserQuery->execute(["identifier" => $identifier]);

$user = $getUserQuery->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user["password"])) {
    if ($user["isban"]) {
        echo "bannedUser";
    }
    else {
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
    }
}
else {
    if (!$identifier && !$password) {
        echo "nothing";
    }
    else if (!$identifier) {
        echo "noIdentifier";
    }
    else if (!$password) {
        echo "noPassword";
    }
    else if (!$user) {
        echo "wrongIdentifier";
    }
    else if (!password_verify($password, $user["password"])) {
        echo "wrongPassword";
    }
}

?>