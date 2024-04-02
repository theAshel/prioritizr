<?php

require "../../../database/databaseConnection.php";

$mail = $_POST['mail'];

$sql = "SELECT * FROM user WHERE mail = :mail";
$stmt = $db_connexion->prepare($sql);
$stmt->bindParam(':mail', $mail);
$stmt->execute();
$userMail = $stmt->fetch(PDO::FETCH_ASSOC);

if ($userMail) {
    echo "already exists";
}
else {
    echo "is available";
}
?>