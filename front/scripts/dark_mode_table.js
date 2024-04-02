// Fonction pour activer le mode sombre
function enableDarkMode() {
    var body = document.body;
    var homepageHeader = document.querySelector(".homepage-header");
    var mainPage = document.querySelector("main");
    var containerTable = document.querySelector(".container");
    var createTaskDialog = document.querySelector("#create-task-dialog");
    var updateTaskDataModals = document.querySelector(".update-task-data-modal");
    var deleteProjectDialog = document.querySelector("#delete-project-dialog");
    var profileDialog = document.querySelector("#profile-dialog");
    var pageProfile = document.querySelector(".profile-dialog-box");
    var darkModeButton = document.getElementById("light-dark-mode-button");

    body.classList.add("dark-mode");
    homepageHeader.style.background = "#000000"; // Couleur de fond en mode sombre pour le header
    mainPage.style.background = "#222222";
    containerTable.style.background = "#222222";
    createTaskDialog.style.background = "#222222";
    pageProfile.style.background = "#222222";
    profileDialog.style.background = "#222222";
    deleteProjectDialog.style.background = "#222222";
    darkModeButton.checked = true; // Cocher automatiquement le bouton en mode sombre
    localStorage.setItem("darkModeEnabled", "true"); // Enregistrer l'état du mode sombre dans le localStorage

    if (updateTaskDataModals) {
        updateTaskDataModals.style.background = "#222222";
    }
}

// Fonction pour désactiver le mode sombre
function disableDarkMode() {
    var body = document.body;
    var containerTable = document.querySelector(".container");
    var createTaskDialog = document.querySelector("#create-task-dialog");
    var homepageHeader = document.querySelector(".homepage-header");
    var mainPage = document.querySelector("main");
    var profileDialog = document.querySelector("#profile-dialog");
    var updateTaskDataModals = document.querySelector(".update-task-data-modal");
    var deleteProjectDialog = document.querySelector("#delete-project-dialog");
    var pageProfile = document.querySelector(".profile-dialog-box");
    var darkModeButton = document.getElementById("light-dark-mode-button");

    body.classList.remove("dark-mode");
    homepageHeader.style.background = "#ECEDFD"; // Couleur de fond en mode clair pour le header
    mainPage.style.background = "#FFFFFF";
    containerTable.style.background = "#FFFFFF";
    pageProfile.style.background = "#F3F4FF";
    createTaskDialog.style.background = "#F3F4FF";
    deleteProjectDialog.style.background = "#F3F4FF";
    profileDialog.style.background = "#F3F4FF";
    darkModeButton.checked = false; // Décocher automatiquement le bouton en mode clair
    localStorage.setItem("darkModeEnabled", "false"); // Enregistrer l'état du mode sombre dans le localStorage

    if (updateTaskDataModals) {
        updateTaskDataModals.style.background = "#F3F4FF";
    }
}

// Vérifier si le mode sombre est activé dans le localStorage lors du chargement de la page
window.addEventListener("DOMContentLoaded", function () {
    var darkModeEnabled = localStorage.getItem("darkModeEnabled");

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
