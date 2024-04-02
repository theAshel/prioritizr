<?php
    session_start();
    if (!$_SESSION["username"]) {
        session_destroy();
        header("Location: ../index.php");
    }
    $username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prioritizr - Projets de <?php echo $username ?></title>
        <link rel="icon" href="../../icon/favicon.ico" />
        <link href="../../style/style.css" rel="stylesheet">
        <link href="../../style/fonts.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
        <link href="../../style/pages/user-section/homePage.css" rel="stylesheet">
        <link href="../../style/components/user-section/home-page/headerHomePage.css" rel="stylesheet">
        <link href="../../style/components/user-section/home-page/asideSection.css" rel="stylesheet">
        <link href="../../style/components/user-section/home-page/mainSection.css" rel="stylesheet">
        <link href="../../style/components/user-section/home-page/createProjectDialog.css" rel="stylesheet">
        <link href="../../style/components/user-section/home-page/deleteProjectDialog.css" rel="stylesheet">
        <link href="../../style/components/user-section/home-page/profileDialog.css" rel="stylesheet">  
        <link href="../../style/components/user-section/home-page/avatarDialog.css" rel="stylesheet">  
    </head>
    <body>
        <?php
        require "../../components/user-section/home-page/headerHomePage.php";
        ?>
        <div class="container">
            <?php
            require "../../components/user-section/home-page/asideSection.php";
            require "../../components/user-section/home-page/mainSection.php";
            ?>
        </div>
        <?php
        require "../../components/user-section/home-page/createProjectDialog.php";
        require "../../components/user-section/home-page/profileDialog.php";
        require "../../components/user-section/home-page/avatarDialog.php";
        ?>
        <script src="../../scripts/dark_mode_home.js"></script>
    </body>
</html>