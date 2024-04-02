<?php

$getMessagesQuery = $db_connexion->prepare("SELECT * FROM message WHERE id_project = :id_project;");
$getMessagesQuery->execute(["id_project" => $_SESSION["project_id"]]);

$messages = $getMessagesQuery->fetchAll(PDO::FETCH_ASSOC);
?>