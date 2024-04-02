<?php

require "../../../database/databaseConnection.php";

$userToAddId = $_POST["id_user"];
$userToAddRole = $_POST["user_role"];

session_start();


$addUsersToProjectQuery = $db_connexion->prepare(
    "INSERT INTO user_access(id_project, id_user, user_rights, is_owner)
    VALUES(:id_project, :id_user, :user_rights, 0)");

$addUsersToProjectQuery->execute([
    "id_project" => $_SESSION["project_id"],
    "id_user" => $userToAddId,
    "user_rights" => $userToAddRole
]);

?>