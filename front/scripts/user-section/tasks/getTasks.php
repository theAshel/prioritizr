<?php

// require "../../database/databaseConnection.php";


$getTasksQuery = $db_connexion->prepare("SELECT * FROM task WHERE id_project = :id;");
$getTasksQuery->execute(["id" => $_SESSION["project_id"]]);

$tasks = $getTasksQuery->fetchAll(PDO::FETCH_ASSOC);



$getUnassignedTasksQuery = $db_connexion->prepare("SELECT * FROM task WHERE id_project = :id AND state = 'unassigned';");
$getUnassignedTasksQuery->execute(["id" => $_SESSION["project_id"]]);

$unassignedTasks = $getUnassignedTasksQuery->fetchAll(PDO::FETCH_ASSOC);



$getPendingTasksQuery = $db_connexion->prepare("SELECT * FROM task WHERE id_project = :id AND state = 'pending';");
$getPendingTasksQuery->execute(["id" => $_SESSION["project_id"]]);

$pendingTasks = $getPendingTasksQuery->fetchAll(PDO::FETCH_ASSOC);



$getInProgressTasksQuery = $db_connexion->prepare("SELECT * FROM task WHERE id_project = :id AND state = 'in-progress';");
$getInProgressTasksQuery->execute(["id" => $_SESSION["project_id"]]);

$inProgressTasks = $getInProgressTasksQuery->fetchAll(PDO::FETCH_ASSOC);



$getCompletedTasksQuery = $db_connexion->prepare("SELECT * FROM task WHERE id_project = :id AND state = 'completed';");
$getCompletedTasksQuery->execute(["id" => $_SESSION["project_id"]]);

$completedTasks = $getCompletedTasksQuery->fetchAll(PDO::FETCH_ASSOC);

?>