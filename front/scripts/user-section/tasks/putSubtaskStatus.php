<?php

require "../../../database/databaseConnection.php";

$subtaskId = $_POST["subtask_id"];
$subtaskStatus = $_POST["subtask_status"];

$subtaskStatus =  $subtaskStatus == 'true' ? 1 : 0;


try {
    $putSubtaskStatusQuery = $db_connexion->prepare("UPDATE subtask SET is_completed = :subtask_status WHERE id = :subtask_id");
    $putSubtaskStatusQuery->execute([
        "subtask_status" => $subtaskStatus,
        "subtask_id" => $subtaskId
    ]);
} catch(PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
}

?>