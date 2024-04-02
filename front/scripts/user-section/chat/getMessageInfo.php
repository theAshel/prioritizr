<?php

if ($message["id_user"] == $_SESSION["user_id"]) {
    $messageSender = 'vous';
}
else {
    $getSenderQuery = $db_connexion->prepare("SELECT username FROM user WHERE id_user = :id_user");
    $getSenderQuery->execute(["id_user" => $message["id_user"]]);

    $messageSender = $getSenderQuery->fetch(PDO::FETCH_ASSOC)["username"];
}

$dateTimeString = $message["date_creation"];

$dateTime = new DateTime($dateTimeString);

$formattedDate = $dateTime->format('d/m/Y');

$formattedTime = $dateTime->format('H\hi');

?>