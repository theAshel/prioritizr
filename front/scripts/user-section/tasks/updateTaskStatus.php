<?php

require "../../../database/databaseConnection.php";

$taskIndex = $_POST["task_index"];
$status = $_POST["status"];

session_start();

try {
    if ($status == "unassigned") {
        $updateTaskStatusQuery = $db_connexion->prepare("UPDATE task SET state = :status, task_responsible = '' WHERE id_project = :project_id AND task_index = :task_index");
        $updateTaskStatusQuery->execute([
            "status" => htmlspecialchars($status),
            "project_id" => $_SESSION["project_id"],
            "task_index" => $taskIndex
        ]);
    }
    else {
        $updateTaskStatusQuery = $db_connexion->prepare("UPDATE task SET state = :status WHERE id_project = :project_id AND task_index = :task_index");
        $updateTaskStatusQuery->execute([
            "status" => htmlspecialchars($status),
            "project_id" => $_SESSION["project_id"],
            "task_index" => $taskIndex
        ]);
    }
} catch(PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
}

?>