<?php
require_once "./script_php/connectionDB.php";
require_once "./script_php/checkConnection.php";

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
        <h1>Envoi Newsletter</h1>
        <form method="POST" action="./script_php/newsletter.php" enctype="multipart/form-data">
                <div class="newsletter_form">
                    <label class="custom-label" for="newsletter_object">Objet</label><br>
                    <input type="text" name="newsletter_object" id="newsletter_object" class="newsletter_input">
                </div>
                <div class="newsletter_form">
                    <label class="custom-label" for="newsletter_title">Titre de la newsletter</label><br>
                    <input type="text" name="newsletter_title" id="newsletter_title" class="newsletter_input">
                </div>
                <div class="newsletter_form">
                    <label class="custom-label" for="newsletter_body">Corps de la Newsletter</label><br>
                    <textarea id="newsletter_body" name="newsletter_body" rows="20" cols="150" class="newsletter_textarea"></textarea>
                </div>
                <div class="newsletter_form">
                    <label class="custom-label" for="newsletter_image">Image de la newsletter</label><br>
                    <input type="file" name="newsletter_image" id="newsletter_image" class="newsletter_image" accept="image/*" onchange="show_image(event)">
                </div>
                <div id="imageContainer"></div>
                <div id="newsletter_submit">
                    <input type="submit" value="Envoyer" class="newsletter_submit">
                </div>
            </form>
    </body>
</html>