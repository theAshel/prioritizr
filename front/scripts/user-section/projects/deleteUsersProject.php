<?php 

require "../../../database/databaseConnection.php";

session_start();

$userToDeleteId = $_POST["id_user"];

$deleteUserFromProjectQuery = $db_connexion->prepare("DELETE FROM user_access WHERE id_project = :id_project AND id_user = :id_user");

$deleteUserFromProjectQuery->execute([
    "id_project" => $_SESSION["project_id"],
    "id_user" => $userToDeleteId
]);

?>