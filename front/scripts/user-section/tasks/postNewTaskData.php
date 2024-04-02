<?php

session_start();
require "../../../database/databaseConnection.php";

$taskName = $_POST['task_name'];
$priority = $_POST['priority'];
$difficulty = $_POST['difficulty'];
$description = $_POST['description'];

if (isset($_POST["task_responsible"])) {
    $state = "pending";
    $taskResponsible = $_POST["task_responsible"];
}
else {
    $state = "unassigned";
    $taskResponsible = "";
}

try {
    $getNumberOfTasksQuery = $db_connexion->prepare("SELECT COUNT(id) AS count FROM task WHERE id_project = :id_project");
    $getNumberOfTasksQuery->execute(["id_project" => $_SESSION["project_id"]]);
    $row = $getNumberOfTasksQuery->fetch(PDO::FETCH_ASSOC);
    $numberOfTasks = $row['count'];

    $createTaskQuery = $db_connexion->prepare(
        "INSERT INTO task(task_name, priority, difficulty, state, description, id_project, task_index, task_creator, task_responsible) 
        VALUES(:task_name, :priority, :difficulty, :state, :description, :id_project, :task_index, :task_creator, :task_responsible)");
    $createTaskQuery->execute([
        "task_name" => htmlspecialchars($taskName),
        "priority" => htmlspecialchars($priority),
        "difficulty" => htmlspecialchars($difficulty),
        "state" => $state,
        "description" => htmlspecialchars($description),
        "id_project" => $_SESSION["project_id"],
        "task_index" => $numberOfTasks,
        "task_creator" => $_SESSION["username"],
        "task_responsible" => $taskResponsible
    ]);

} catch(PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
}

?>