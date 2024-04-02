// Fonction pour activer le mode sombre
function enableDarkMode() {
    var body = document.body;
    var aside = document.querySelector("aside");
    var homepageHeader = document.querySelector(".homepage-header");
    var mainPage = document.querySelector("main");
    var projectTable = document.querySelectorAll(".project-table")
    // var collaborationTable = document.querySelector(".collaboration-table");
    var profileDialog = document.querySelector("#profile-dialog");
    var pageProfile = document.querySelector(".profile-dialog-box");
    var darkModeButton = document.getElementById("light-dark-mode-button");
    var createProjectDialog = document.querySelector("#create-project-dialog");

    body.classList.add("dark-mode");
    aside.style.background = "#000000";
    // Couleur de fond en mode sombre
    pageProfile.style.background = "#222222";
    homepageHeader.style.background = "#000000"; // Couleur de fond en mode sombre pour le header
    mainPage.style.background = "#222222";
    createProjectDialog.style.backgroundColor = "#222222";
    profileDialog.style.background = "#222222";
    // collaborationTable.style.background = "#1E1E1E";
    darkModeButton.checked = true; // Cocher automatiquement le bouton en mode sombre
    localStorage.setItem("darkModeEnabled", "true"); // Enregistrer l'état du mode sombre dans le localStorage

    if (projectTable) {
        projectTable.forEach(projectTable => {
            projectTable.style.backgroundColor = "#1E1E1E";
        })
    }
}

// Fonction pour désactiver le mode sombre
function disableDarkMode() {
    var body = document.body;

    var aside = document.querySelector("aside");
    var homepageHeader = document.querySelector(".homepage-header");
    var mainPage = document.querySelector("main");
    var projectTable = document.querySelector(".project-table")
    var createProjectDialog = document.querySelector("#create-project-dialog");
    // var collaborationTable = document.querySelector(".collaboration-table");
    var darkModeButton = document.getElementById("light-dark-mode-button");
    var pageProfile = document.querySelector(".profile-dialog-box");
    var profileDialog = document.querySelector("#profile-dialog");

    body.classList.remove("dark-mode");
    aside.style.background = "#E0E1F4"; // Couleur de fond en mode clair
    homepageHeader.style.background = "#ECEDFD"; // Couleur de fond en mode clair pour le header
    mainPage.style.background = "#FFFFFF";
    pageProfile.style.background = "#F3F4FF";
    createProjectDialog.style.background = "#F3F4FF";
    profileDialog.style.background = "#F3F4FF";
    // collaborationTable.style.background = "#ECEDFF";
    darkModeButton.checked = false; // Décocher automatiquement le bouton en mode clair
    localStorage.setItem("darkModeEnabled", "false"); // Enregistrer l'état du mode sombre dans le localStorage

    if (projectTable) {
        projectTable.style.backgroundColor = "#ECEDFF";
    }
}

// Vérifier si le mode sombre est activé dans le localStorage lors du chargement de la page
window.addEventListener("DOMContentLoaded", function () {
    var darkModeEnabled = localStorage.getItem("darkModeEnabled");
    var darkModeButton = document.getElementById("light-dark-mode-button");

    if (darkModeEnabled === "true") {
        enableDarkMode(); // Activer le mode sombre si l'état est "true"
    } else {
        disableDarkMode(); // Désactiver le mode sombre si l'état est "false"
    }
});

// Écouteur d'événement pour détecter le changement d'état de la case à cocher
var darkModeButton = document.getElementById("light-dark-mode-button");
darkModeButton.addEventListener("change", function () {
    if (darkModeButton.checked) {
        enableDarkMode(); // Activer le mode sombre si le bouton est coché
    } else {
        disableDarkMode(); // Désactiver le mode sombre si le bouton est décoché
    }
});
