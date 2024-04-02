<?php

require "../../../database/databaseConnection.php";

$description = $_POST['description'];
$projectName = $_POST['project_name'];
$status = $_POST['status'];

session_start();

try {
    $createProjectQuery = $db_connexion->prepare("UPDATE project SET project_name = :project_name, status = :status, description = :description WHERE id = :project_id");
    $createProjectQuery->execute([
        "project_name" => htmlspecialchars($projectName),
        "status" => htmlspecialchars($status),
        "description" => htmlspecialchars($description),
        "project_id" => $_SESSION["project_id"]
    ]);
} catch(PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
}

?>