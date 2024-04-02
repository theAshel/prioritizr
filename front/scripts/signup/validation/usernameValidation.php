<?php

require "../../../database/databaseConnection.php";

$username = $_POST['username'];

$sql = "SELECT * FROM user WHERE BINARY username = :username";
$stmt = $db_connexion->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();
$userUsername = $stmt->fetch(PDO::FETCH_ASSOC);

if ($userUsername) {
    echo "already exists";
}
else {
    echo "is available";
}
?>