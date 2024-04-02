<?php 

require "../../../database/databaseConnection.php";

session_start();

$projectToDeleteId = $_POST["id_project"];

// on récupère les tâches du projet à supprimer

$getTasksFromProjectQuery = $db_connexion->prepare("SELECT id FROM task WHERE id_project = :id_project;");
$getTasksFromProjectQuery->execute(["id_project" => $projectToDeleteId]);

$tasksToDeleteIds = $getTasksFromProjectQuery->fetchAll(PDO::FETCH_ASSOC);

// on supprime chaque tâche du projet grâce à une boucle

for ($i = 0; $i < count($tasksToDeleteIds); $i++) {
    $taskToDeleteId =  $tasksToDeleteIds[$i]["id"];

    // il faut supprimer les sous-tâches en premier

    $deleteSubtasksQuery = $db_connexion->prepare("DELETE FROM subtask WHERE id_task = :id_task");
    $deleteSubtasksQuery->execute(["id_task" => $taskToDeleteId]);

    // on supprime la tâche ensuite

    $deleteTaskQuery = $db_connexion->prepare("DELETE FROM task WHERE id = :id_task");
    $deleteTaskQuery->execute(["id_task" => $taskToDeleteId]);
}

// on récupère ensuite les messages du projet qu'il faut également supprimer

$getMessagesFromProjectQuery = $db_connexion->prepare("SELECT id FROM message WHERE id_project = :id_project");
$getMessagesFromProjectQuery->execute(["id_project" => $projectToDeleteId]);

$messagesToDeleteIds = $getMessagesFromProjectQuery->fetchAll(PDO::FETCH_ASSOC);

// on supprime chaque message du projet grâce à une boucle

for ($i = 0; $i < count($messagesToDeleteIds); $i++) {
    $messageToDeleteId =  $messagesToDeleteIds[$i]["id"];

    // on supprime le message

    $deleteMessageQuery = $db_connexion->prepare("DELETE FROM message WHERE id = :id_message");
    $deleteMessageQuery->execute(["id_message" => $messageToDeleteId]);
}

// on supprime ensuite les liens entre le projet et les users de la table user_access

$getLinksFromUserAccessQuery = $db_connexion->prepare("DELETE FROM user_access WHERE id_project = :id_project");
$getLinksFromUserAccessQuery->execute(["id_project" => $projectToDeleteId]);

// on supprime enfin le projet

$deleteProjectQuery = $db_connexion->prepare("DELETE FROM project WHERE id = :id_project");
$deleteProjectQuery->execute(["id_project" => $projectToDeleteId]);

unset($_SESSION["project_id"]);

?>