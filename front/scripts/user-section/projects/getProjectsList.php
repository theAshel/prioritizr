<?php

require "../../database/databaseConnection.php";

$getProjectsListQuery = $db_connexion->prepare(
    "SELECT * FROM project JOIN user_access 
    ON project.id = user_access.id_project 
    WHERE user_access.id_user = :id_user AND user_access.user_rights = 1");

$getProjectsListQuery->execute(["id_user" => $_SESSION["user_id"]]);

// projectsList reçoit la liste de tous les projets du user sous la forme d'un
// tableau associatif, qu'on inverse car on souhaite afficher les projets les
// plus récents en premier
$projectsList = array_reverse($getProjectsListQuery->fetchAll(PDO::FETCH_ASSOC));

$getCollaborationsListQuery = $db_connexion->prepare(
    "SELECT * FROM project JOIN user_access 
    ON project.id = user_access.id_project 
    WHERE user_access.id_user = :id_user AND user_access.user_rights != 1");

$getCollaborationsListQuery->execute(["id_user" => $_SESSION["user_id"]]);

$collaborationsList = array_reverse($getCollaborationsListQuery->fetchAll(PDO::FETCH_ASSOC));

?>