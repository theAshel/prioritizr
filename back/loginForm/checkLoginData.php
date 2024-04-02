<?php

require "../script_php/connectionDB.php";

$identifier = $_POST['identifier'];
$password = $_POST['password'];

$sql = "SELECT password, username, admin FROM user WHERE username = '$identifier'";

$user = $db_connexion->query($sql)->fetch(PDO::FETCH_ASSOC);


if ($user && password_verify($password, $user["password"]) && $user["admin"] != 0) {
    session_start();
    $_SESSION["username"] = $user["username"];
    echo "validé";
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
    else if ($user["admin"]==0) {
        echo "accessDenied";
    }
}

?>