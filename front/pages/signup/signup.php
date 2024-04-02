<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../style/style.css" rel="stylesheet">
        <link href="../../style/fonts.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
        <link href="../../style/pages/signup/signup.css" rel="stylesheet">
        <link href="../../style/components/signup/signupHeader.css" rel="stylesheet">
        <link href="../../style/components/signup/signupFormFirst.css" rel="stylesheet">
        <link href="../../style/components/signup/signupFormSecond.css" rel="stylesheet">
        <link href="../../style/components/signup/signupFormThird.css" rel="stylesheet">
        <link href="../../style/components/signup/signupFormFinal.css" rel="stylesheet">
        <link href="../../components/signup/puzzle/puzzle.css" rel="stylesheet">
        <script src="../../scripts/signup/displayModule.js"></script>
        <title>Inscrivez-vous à Prioritizr</title>
    </head>
 <body>
</html>

        <?php
            require "../../components/signup/signupHeader.php";
            require "../../components/signup/signupFormFirst.php";
            require "../../components/signup/signupFormSecond.php";
            require "../../components/signup/signupFormThird.php";
            require "../../components/signup/signupFormFinal.php";
            require "../../components/signup/captcha_dialog.php";
        ?>
        <script src="../../scripts/signup/saveFormData.js"></script>
        <script>
           hideModule('second-form')
           hideModule('third-form')
           hideModule('final-form')
        </script>
        <script src="../../scripts/dark_mode_signup.js"></script>
    </body>
</html>