<?php

$getInProgressTasksQuery = $db_connexion->prepare("SELECT task_name FROM task WHERE id_project = :id AND state = 'in-progress'");
$getInProgressTasksQuery->execute(["id" => $project["id"]]);

$inProgressTasks = $getInProgressTasksQuery->fetchAll(PDO::FETCH_ASSOC);