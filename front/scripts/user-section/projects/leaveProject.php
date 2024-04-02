<?php 

require "../../../database/databaseConnection.php";

session_start();

$projectToLeaveId = $_POST["project_id"];

$getProjectToLeaveQuery = $db_connexion->prepare("DELETE FROM user_access WHERE id_project = :id_project AND id_user = :id_user");
$getProjectToLeaveQuery->execute([
    "id_project" => $projectToLeaveId,
    "id_user" => $_SESSION["user_id"]
]);