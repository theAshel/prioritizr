<?php

require "../../../database/databaseConnection.php";

$description = $_POST['description'];
$taskName = $_POST['task_name'];
$priority = $_POST['priority'];
$difficulty = $_POST['difficulty'];
$taskIndex = $_POST['task_index'];
$subtasksIndexToDeleteString = $_POST['subtasks_to_delete_index']; // on reçoit les id des subtask à delete sous la forme d'une string de la forme "X,X,X,X"
$subtasksToAddString = $_POST['subtasks_to_add_names']; // on reçoit les noms des subtask à ajouter sous la forme d'une string de la forme "xxxx,xxxx,xx,xxxxxx"
$taskResponsible = isset($_POST["task_responsible"]) ? $_POST["task_responsible"] : "";

$subtasksIndexToDeleteArray = explode(",", $subtasksIndexToDeleteString); // on convertit cette string en array en utilisant la virgule comme délimiteur
$subtasksIndexToDeleteArray = array_map('intval', $subtasksIndexToDeleteArray); // on convertir tous les éléments en entier

$subtasksToAddArray = explode(",", $subtasksToAddString);

session_start();


try {
    $getTaskIdAndStateQuery = $db_connexion->prepare("SELECT id, state FROM task WHERE id_project = :id_project AND task_index = :task_index");
    $getTaskIdAndStateQuery->execute([
        "id_project" => $_SESSION["project_id"],
        "task_index" => $taskIndex
    ]);

    $task = $getTaskIdAndStateQuery->fetch(PDO::FETCH_ASSOC);
    $taskId = $task["id"];
    $taskState = $task["state"];


    $newTaskState = ($taskState == "unassigned" && isset($_POST["task_responsible"])) ? "pending" : $taskState;


    for ($i = 0; $i < count($subtasksIndexToDeleteArray); $i++) {
        $subtaskId = (int) $subtasksIndexToDeleteArray[$i];
        
        $deleteSubtaskQuery = $db_connexion->prepare("DELETE FROM subtask WHERE id = :id");
        $deleteSubtaskQuery->execute(["id" => $subtaskId]);
    }

    if (strlen($subtasksToAddArray[0])) {
        for ($i = 0; $i < count($subtasksToAddArray); $i++) {
            $getSubtaskCountQuery = $db_connexion->prepare("SELECT COUNT(*) FROM subtask WHERE id_task = :id_task");
            $getSubtaskCountQuery->execute(["id_task" => $taskId]);

            $subtaskCount = $getSubtaskCountQuery->fetch(PDO::FETCH_ASSOC)["COUNT(*)"];

            $addSubtaskQuery = $db_connexion->prepare("INSERT INTO subtask (subtask_name, id_task, subtask_index) VALUES (:subtask_name, :id_task, :subtask_index)");
            $addSubtaskQuery->execute([
                "subtask_name" => htmlspecialchars($subtasksToAddArray[$i]),
                "id_task" => $taskId,
                "subtask_index" => $subtaskCount
            ]);
        }
    }
    


    $createTaskQuery = $db_connexion->prepare(
        "UPDATE task SET task_name = :task_name, priority = :priority, difficulty = :difficulty, description = :description, task_responsible = :task_responsible, state = :state
        WHERE id_project = :id_project AND task_index = :task_index");
    $createTaskQuery->execute([
        "task_name" => htmlspecialchars($taskName),
        "priority" => htmlspecialchars($priority),
        "difficulty" => htmlspecialchars($difficulty),
        "description" => htmlspecialchars($description),
        "task_responsible" => htmlspecialchars($taskResponsible),
        "state" => htmlspecialchars($newTaskState),
        "id_project" => $_SESSION["project_id"],
        "task_index" => $taskIndex
    ]);
} catch(PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
}

?>