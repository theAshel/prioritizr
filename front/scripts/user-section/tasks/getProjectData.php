<?php

require "../../database/databaseConnection.php";


$getProjectDataQuery = $db_connexion->prepare("SELECT * FROM project WHERE id = :id;");
$getProjectDataQuery->execute(["id" => $_SESSION["project_id"]]);

$projectData = $getProjectDataQuery->fetch(PDO::FETCH_ASSOC);

?>