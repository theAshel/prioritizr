<?php 
session_start();
if (!$_SESSION["username"]) {
    session_destroy();
    header("Location: ../index.php");
}

if (!$_SESSION["project_id"]) {
    header("Location: ./homePage.php");
}
else {
    require "../../scripts/user-section/tasks/getProjectData.php"; // infos du projet dans le tableau associatif $projectData
    require "../../scripts/user-section/tasks/getTasks.php"; // récupère les tâches dans le tableau associatif $tasks
    require "../../scripts/user-section/chat/getMessages.php"; // récupère les messages dans le tableau associatif $messages
    require "../../scripts/user-section/projects/getUsers.php"; // récupère les users dans le tableau associatif trié $sortedProjectUsers ou dans le json projectUserJson
    require "../../scripts/user-section/projects/getUserRights.php"; // récupère les users dans le tableau associatif trié $sortedProjectUsers ou dans le json projectUserJson
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $projectData["project_name"] ?></title>
        <link rel="icon" href="../../icon/favicon.ico" />
        <link href="../../style/style.css" rel="stylesheet">
        <link href="../../style/fonts.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
        <link href="../../style/pages/user-section/tableProjectPage.css" rel="stylesheet">
        <link href="../../style/components/user-section/home-page/headerHomePage.css" rel="stylesheet">
        <link href="../../style/components/user-section/table-project-page/mainSection.css" rel="stylesheet">
        <link href="../../style/components/user-section/table-project-page/projectChat.css" rel="stylesheet">
        <link href="../../style/components/user-section/table-project-page/createTaskDialog.css" rel="stylesheet">
        <link href="../../style/components/user-section/table-project-page/updateTasksDataModals.css" rel="stylesheet">
        <link href="../../style/components/user-section/table-project-page/editProjectDialog.css" rel="stylesheet">
        <link href="../../style/components/user-section/table-project-page/projectUsersDialog.css" rel="stylesheet">
        <link href="../../style/components/user-section/home-page/deleteProjectDialog.css" rel="stylesheet">
        <link href="../../style/components/user-section/table-project-page/deleteTaskDialog.css" rel="stylesheet">
        <link href="../../style/components/user-section/home-page/profileDialog.css" rel="stylesheet">
        <link href="../../style/components/user-section/home-page/avatarDialog.css" rel="stylesheet">  
    </head>
    <body>
        <script>
            var projectUsersJson = <?php echo $jsonProjectUsers ?>
        </script>
        <?php
            // require "../../components/user-section/table-project-page/headerTableProjectPage.php";
            require "../../components/user-section/home-page/headerHomePage.php";
            require "../../components/user-section/table-project-page/mainSection.php";
            require "../../components/user-section/table-project-page/projectChat.php";
            if ($userRights != 4) {
                require "../../components/user-section/table-project-page/createTaskDialog.php";
            }
            require "../../components/user-section/table-project-page/updateTasksDataModals.php";
            require "../../components/user-section/table-project-page/editProjectDialog.php";
            require "../../components/user-section/table-project-page/projectUsersDialog.php";
            if ($userRights == 1) {
                require "../../components/user-section/deleteProjectDialog.php";
            }
            require "../../components/user-section/home-page/profileDialog.php";
            require "../../components/user-section/home-page/avatarDialog.php";
        ?>
     <script src="../../scripts/dark_mode_table.js"></script>
    </body>
</html>