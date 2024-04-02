<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset = "UTF-8">
        <title>Prioritizr - Déconnection</title>
    </head>
    <body>
        <div>
            <p>Vous vous êtes déconnecté avec succès</p>
            <a href="./login.php">Se recconecter</a>
        </div>

    </body>
</html>