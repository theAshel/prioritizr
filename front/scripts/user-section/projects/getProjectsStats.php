<?php

require "../../database/databaseConnection.php";

$getNumberOfCanceledProjectsQuery = $db_connexion->prepare(
    "SELECT COUNT(*) AS total FROM project 
    JOIN user_access ON project.id = user_access.id_project 
    WHERE project.status = 'canceled' AND user_access.id_user = :id_user AND user_access.user_rights = 1");

$getNumberOfCanceledProjectsQuery->execute(["id_user" => $_SESSION["user_id"]]);

$numberOfCanceledProjects = $getNumberOfCanceledProjectsQuery->fetch(PDO::FETCH_ASSOC);



$getNumberOfInProgressProjectsQuery = $db_connexion->prepare(
    "SELECT COUNT(*) AS total FROM project 
    JOIN user_access ON project.id = user_access.id_project 
    WHERE project.status = 'in-progress' AND user_access.id_user = :id_user AND user_access.user_rights = 1");

$getNumberOfInProgressProjectsQuery->execute(["id_user" => $_SESSION["user_id"]]);

$numberOfInProgressProjects = $getNumberOfInProgressProjectsQuery->fetch(PDO::FETCH_ASSOC);



$getNumberOfCompletedProjectsQuery = $db_connexion->prepare(
    "SELECT COUNT(*) AS total FROM project 
    JOIN user_access ON project.id = user_access.id_project 
    WHERE project.status = 'completed' AND user_access.id_user = :id_user AND user_access.user_rights = 1");

$getNumberOfCompletedProjectsQuery->execute(["id_user" => $_SESSION["user_id"]]);

$numberOfCompletedProjects = $getNumberOfCompletedProjectsQuery->fetch(PDO::FETCH_ASSOC);



$numberOfProjects = $numberOfCanceledProjects["total"] + $numberOfInProgressProjects["total"] + $numberOfCompletedProjects["total"];

?>