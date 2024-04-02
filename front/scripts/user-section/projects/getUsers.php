<?php

$getUsersQuery = $db_connexion->prepare(
    "SELECT user_rights, user.id_user, user.username
    FROM user JOIN user_access ON user.id_user = user_access.id_user
    WHERE user_access.id_project = :id_project");

$getUsersQuery->execute([
    "id_project" => $_SESSION["project_id"]
]);

$projectUsers = $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);

$jsonProjectUsers = json_encode($projectUsers);

function compareUserRights($a, $b) {
    return $a["user_rights"] - $b["user_rights"];
}

// Trie le tableau des utilisateurs en utilisant la fonction de comparaison
usort($projectUsers, "compareUserRights");

// Crée les tableaux triés en fonction de "user_rights"
$sortedProjectUsers = [];
foreach ($projectUsers as $user) {
    $userRights = $user["user_rights"];
    if (!isset($sortedProjectUsers[$userRights])) {
        $sortedProjectUsers[$userRights] = [];
    }
    $sortedProjectUsers[$userRights][] = $user;
}

?>