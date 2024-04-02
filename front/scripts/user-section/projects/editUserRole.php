<?php

require "../../../database/databaseConnection.php";

$editUserRoleId = $_POST['id_user'];
$newUserRole = $_POST['user_role'];

session_start();

try {
    $editUserRoleQuery = $db_connexion->prepare("UPDATE user_access SET user_rights = :user_rights WHERE id_project = :project_id AND id_user = :id_user");
    $editUserRoleQuery->execute([
        "user_rights" => htmlspecialchars($newUserRole),
        "project_id" => $_SESSION["project_id"],
        "id_user" => htmlspecialchars($editUserRoleId)
    ]);
} catch(PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
}

?>