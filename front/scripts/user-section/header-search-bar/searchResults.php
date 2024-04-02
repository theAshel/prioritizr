<?php
if (isset($_GET['searchText'])) {
    require "../../../database/databaseConnection.php";
    session_start();

    $searchText = $_GET['searchText'];
  
    $getUsersSearchResultsQuery = $db_connexion->prepare(
        "SELECT id_user, username FROM user 
        WHERE INSTR(username, :search_text) != 0
        AND id_user != :id_user AND isban = 0"
        );
    $getUsersSearchResultsQuery->execute([
        "search_text" => $searchText,
        "id_user" => $_SESSION["user_id"]
    ]);

    $usersSearchResults = $getUsersSearchResultsQuery->fetchAll(PDO::FETCH_ASSOC);

    usort($usersSearchResults, function($a, $b) {
        return strlen($a["username"]) - strlen($b["username"]);
    });


    $getProjectsSearchResultsQuery = $db_connexion->prepare(
        "SELECT project_name, id
        FROM project
        JOIN user_access ON project.id = user_access.id_project
        WHERE user_access.id_user = :id_user AND user_access.user_rights = 1
        AND INSTR(project.project_name, :search_text) != 0;"
    );

    $getProjectsSearchResultsQuery->execute([
        "id_user" => $_SESSION["user_id"],
        "search_text" => $searchText
    ]);

    $projectsSearchResults = $getProjectsSearchResultsQuery->fetchAll(PDO::FETCH_ASSOC);

    usort($projectsSearchResults, function($a, $b) {
        return strlen($a["project_name"]) - strlen($b["project_name"]);
    });


    $getCollaborationsSearchResultsQuery = $db_connexion->prepare(
        "SELECT project_name, id
        FROM project
        JOIN user_access ON project.id = user_access.id_project
        WHERE user_access.id_user = :id_user AND user_access.user_rights != 1
        AND INSTR(project.project_name, :search_text) != 0;"
    );

    $getCollaborationsSearchResultsQuery->execute([
        "id_user" => $_SESSION["user_id"],
        "search_text" => $searchText
    ]);

    $collaborationsSearchResults = $getCollaborationsSearchResultsQuery->fetchAll(PDO::FETCH_ASSOC);

    usort($collaborationsSearchResults, function($a, $b) {
        return strlen($a["project_name"]) - strlen($b["project_name"]);
    });




    $html = '';
    if ($usersSearchResults) {
        $count = 0;
        $html .= '<div class="search-bar-results users-results"><h5 class="search-bar-title">Utilisateurs</h5>';
        foreach ($usersSearchResults as $result) {
            $html .= '<p class="search-bar-result user-result" id="search-user-' . $result["id_user"] . '">' . $result["username"] . '</p>';
            $count++;

            if ($count >= 7) {
                break;
            }
        }
        $html .= '</div>';
    }
    if ($projectsSearchResults) {
        $count = 0;
        $html .= '<div class="search-bar-results projects-results"><h5 class="search-bar-title">Vos projets</h5>';
        foreach ($projectsSearchResults as $result) {
            $html .= '<p class="search-bar-result project-result" id="search-project-' . $result["id"] . '">' . $result["project_name"] . '</p>';
            $count++;

            if ($count >= 7) {
                break;
            }
        }
        $html .= '</div>';
    }

    if ($collaborationsSearchResults) {
        $count = 0;
        $html .= '<div class="search-bar-results collaborations-results"><h5 class="search-bar-title">Vos collaborations</h5>';
        foreach ($collaborationsSearchResults as $result) {
            $html .= '<p class="search-bar-result project-result" id="search-project-' . $result["id"] . '">' . $result["project_name"] . '</p>';
            $count++;

            if ($count >= 7) {
                break;
            }
        }
        $html .= '</div>';
    }

    if ($html == '') {
        $html .= '<p>Il n\' y a aucun résultat qui correspond à votre recherche.</p>';
    }
    
    echo $html;
}
?>