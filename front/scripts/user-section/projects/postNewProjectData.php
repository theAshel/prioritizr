<?php

require "../../../database/databaseConnection.php";

$modelType = $_POST['type'];
$projectName = $_POST['project_name'];

try {
    $createProjectQuery = $db_connexion->prepare("INSERT INTO project(project_name, type) VALUES(:project_name, :type)");
    $createProjectQuery->execute([
        "project_name" => htmlspecialchars($projectName),
        "type" => htmlspecialchars($modelType)
    ]);

    $projectId = $db_connexion->lastInsertId();
    session_start();
    $createProjectQuery = $db_connexion->prepare("INSERT INTO user_access(id_project, id_user, user_rights, is_owner) VALUES(:id_project, :id_user, :user_rights, :is_owner)");
    $createProjectQuery->execute([
        "id_project" => $projectId,
        "id_user" => $_SESSION["user_id"],
        "user_rights" => 1,
        "is_owner" => 1
    ]);

    $getProjectQuery = $db_connexion->prepare("SELECT id, type FROM project WHERE id = :id");
    $getProjectQuery->execute([
        "id" => $projectId
    ]);

    $projectData = $getProjectQuery->fetch(PDO::FETCH_ASSOC);
    
    session_start();
    $_SESSION["project_id"] = $projectData["id"];
    
    echo $projectData["type"];

} catch(PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
}

?>