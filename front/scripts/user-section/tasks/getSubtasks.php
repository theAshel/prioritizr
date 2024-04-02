<?php

$getSubtasksQuery = $db_connexion->prepare("SELECT * FROM subtask WHERE id_task = :id_task;");
$getSubtasksQuery->execute(["id_task" => $task["id"]]);

$subtasks = $getSubtasksQuery->fetchAll(PDO::FETCH_ASSOC);

$numberOfSubtasks = count($subtasks)
?>