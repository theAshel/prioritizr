<?php

require "../../../database/databaseConnection.php";

session_start();

// $getProjectsListQuery = $db_connexion->prepare(
//     "SELECT * FROM project JOIN user_access 
//     ON project.id = user_access.id_project 
//     WHERE user_access.id_user = :id_user;");

// $getProjectsListQuery->execute(["id_user" => $_SESSION["user_id"]]);

// // projectsList reçoit la liste de tous les projets du user sous la forme d'un
// // tableau associatif, qu'on inverse car on souhaite afficher les projets les
// // plus récents en premier
// $projectsList = array_reverse($getProjectsListQuery->fetchAll(PDO::FETCH_ASSOC));

$projectToOpenId = $_POST["project_id"];

$getProjectToOpenQuery = $db_connexion->prepare("SELECT id, type FROM project WHERE id = :id_project;");
$getProjectToOpenQuery->execute(["id_project" => $projectToOpenId]);

$projectToOpen = $getProjectToOpenQuery->fetch(PDO::FETCH_ASSOC);

$_SESSION["project_id"] = $projectToOpen["id"];

?>