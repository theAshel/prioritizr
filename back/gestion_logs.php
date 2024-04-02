<?php
require_once "./script_php/connectionDB.php";
require_once "./script_php/checkConnection.php";
$logFile = '/var/log/apache2/access.log'; // Chemin vers le fichier de logs d'accès




?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset = "UTF-8">
        <script src="./script_js/backoffice.js"></script>
        <link rel="stylesheet" href="./stylesheet/style.css">
        <title>Prioritizr - Back</title>
    </head>
    <body>
    <?php include_once "./element/header.php"; ?>
        <h1>Page de gestion de logs</h1>
        <?php 
        // Vérifier si le fichier de logs existe et est accessible en lecture
        if (file_exists($logFile) && is_readable($logFile)) {
        // Ouvrir le fichier de logs
        $file = fopen($logFile, 'r');

        while (($line = fgets($file)) !== false) {
            echo $line . "<br>";
        }
        // Fermer le fichier de logs
        fclose($file);
        } else {
            echo "Impossible d'accéder au fichier de logs d'accès.";
        }
        ?>
    </body>
</html>