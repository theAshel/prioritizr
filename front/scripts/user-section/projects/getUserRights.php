<?php

$getUserRightsQuery = $db_connexion->prepare("SELECT user_rights FROM user_access WHERE id_project = :id_project AND id_user = :id_user");
$getUserRightsQuery->execute([
    "id_project" => $_SESSION["project_id"],
    "id_user" => $_SESSION["user_id"]
]);

$userRights = $getUserRightsQuery->fetch(PDO::FETCH_ASSOC)["user_rights"];

?>