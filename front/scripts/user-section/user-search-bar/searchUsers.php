<?php
if (isset($_GET['usersToSearch'])) {
    require "../../../database/databaseConnection.php";
    session_start();

    $usersToSearch = $_GET['usersToSearch'];
    $usersToNotSearchIds = isset($_GET['usersToNotSearch']) ? explode(',', $_GET['usersToNotSearch']) : [];

  
    $getUsersSearchResultsQuery = $db_connexion->prepare(
        "SELECT id_user, username FROM user 
        WHERE INSTR(username, :search_text) != 0
        AND id_user != :id_user AND isban = 0"
        );
    $getUsersSearchResultsQuery->execute([
        "search_text" => $usersToSearch,
        "id_user" => $_SESSION["user_id"]
    ]);

    $usersSearchResults = $getUsersSearchResultsQuery->fetchAll(PDO::FETCH_ASSOC);

    usort($usersSearchResults, function($a, $b) {
        return strlen($a["username"]) - strlen($b["username"]);
    });


    $filteredUsersSearchResults = array_filter($usersSearchResults, function($user) use ($usersToNotSearchIds) {
        return !in_array($user["id_user"], $usersToNotSearchIds);
    });


    // $getGroupsSearchResultsQuery = $db_connexion->prepare("SELECT id_group, group_name FROM group WHERE INSTR(group_name, :search_text) != 0");
    // $getGroupsSearchResultsQuery->execute(["search_text" => $searchText]);

    // $groupsSearchResults = $getGroupsSearchResultsQuery->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($usersSearchResults);
    // // var_dump($groupsSearchResults);
    // var_dump($projectsSearchResults);


    $html = '';
    if ($filteredUsersSearchResults) {
        $count = 0;
        foreach ($filteredUsersSearchResults as $result) {
            $html .= '<p class="search-bar-result user-result" id="search-user-' . $result["id_user"] . '">' . $result["username"] . '</p>';
            $count++;

            if ($count >= 7) {
                break;
            }
        }
    }

    if ($html == '') {
        $html .= '<p>Il n\' y a aucun résultat qui correspond à votre recherche.</p>';
    }
    
    echo $html;
}
?>