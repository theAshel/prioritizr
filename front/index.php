<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style/style.css" rel="stylesheet">
        <link href="style/fonts.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
        <link href="style/index.css" rel="stylesheet">
    </head>
    <body>
        <header id="index-header">
            <img src="icon/prioritizr_logo.png" alt="logo" class="prioritizr-logo">
            <div id="inside-header-container">
                <div class="toggle-button-container">
                    <i class="fa-regular fa-sun"></i>
                    <input type="checkbox" name="light-dark-mode-button"
                    id="light-dark-mode-button" class="toggle-button">
                    <label for="light-dark-mode-button" class="label-toggle-button"></label>
                    <i class="fa-regular fa-moon"></i>
                </div>
                <a href="pages/signup/login.php"><p id="connection-button">Connexion</p></a>
                <a href="pages/signup/signup.php"><button type="button" class="register-button">S'inscrire</button></a>
            </div>
        </header>
        <main>
            <section id="index-section-1">
                <p class="main-paragraph" id="first-paragraph">Avec <span class="bold-text">Prioritizr</span>,</br>organiser vos projets deviendra un jeu d'enfant.</p>
                <div id="first-image-container">
                    <img class="main-image" src="icon/homepage-screen.png" alt="project-page-image" width="700" height="400" id="first-image">
                    <p class="main-paragraph"><span class="bold-text">Créez autant de projets</span> que vous souhaitez.</br>
                    <span class="bold-text">Travaillez</span> sur vos projets <span class="bold-text">seul</span> ou <span class="bold-text">collaborez en équipe</span></p>
                </div>
            </section>
            <section id="index-section-2">
                    <img class="main-image" src="icon/table-project-page-screen.png" alt="project-page-image" width="780" height="400" id="second-image">
                    <p class="main-paragraph" id="task-explanation"><span class="bold-text">Créer des tâches</span> permet de
                    <span class="bold-text">mieux se retrouver</span> dans un projet et <span class="bold-text">améliorera votre efficacité.</span></p>
                </div>
            </section>
            <div id="last-button-container">
                <a href="pages/signup/signup.php"><button type="button" id ="last-button" class="register-button">Essayez Prioritizr</button></a>
            </div>
        </main>
        <footer>
            <p>Tous droits réservés &copy; 2023 Prioritizr.</p>
        </footer>
    </body>
</html>