<?php 

require "../../../database/databaseConnection.php";

session_start();

$taskToDeleteId = $_POST["id_task"];

// il faut supprimer les sous-tâches en premier

$deleteSubtasksQuery = $db_connexion->prepare("DELETE FROM subtask WHERE id_task = :id_task");
$deleteSubtasksQuery->execute(["id_task" => $taskToDeleteId]);

// on supprime la tâche ensuite

$deleteTaskQuery = $db_connexion->prepare("DELETE FROM task WHERE id = :id_task");
$deleteTaskQuery->execute(["id_task" => $taskToDeleteId]);

?>