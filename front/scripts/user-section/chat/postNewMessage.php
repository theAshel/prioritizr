<?php

session_start();
require "../../../database/databaseConnection.php";

$messageContent = $_POST['message_content'];

try {
    $getNumberOfMessagesQuery = $db_connexion->prepare("SELECT COUNT(id) AS count FROM message WHERE id_project = :id_project");
    $getNumberOfMessagesQuery->execute(["id_project" => $_SESSION["project_id"]]);
    $row = $getNumberOfMessagesQuery->fetch(PDO::FETCH_ASSOC);
    $numberOfMessages = $row['count'];

    $createMessageQuery = $db_connexion->prepare("INSERT INTO message(content, id_user, id_project, message_index) VALUES(:content, :id_user, :id_project, :message_index)");
    $createMessageQuery->execute([
        "content" => htmlspecialchars($messageContent),
        "id_user" => $_SESSION["user_id"],
        "id_project" => $_SESSION["project_id"],
        "message_index" => $numberOfMessages
    ]);

} catch(PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
}

?>