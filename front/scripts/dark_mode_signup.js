// Fonction pour activer le mode sombre
// Fonction pour activer le mode sombre
function enableDarkMode() {
    var body = document.body;
    var header = document.querySelector("header");
    var darkModeButton = document.getElementById("light-dark-mode-button");
    var fieldSets = document.querySelectorAll(".fieldset");
    var fieldSetFinal = document.querySelector(".fieldset-final");

    body.classList.add("dark-mode");
    // header.style.background = "#000000";
    body.style.background = "#333333";

    fieldSets.forEach(function (fieldSet) {
        fieldSet.style.background = "#222222";
    });
    fieldSetFinal.style.background = "#222222";
    darkModeButton.checked = true; // Cocher automatiquement le bouton en mode sombre
    localStorage.setItem("darkModeEnabled", "true"); // Enregistrer l'état du mode sombre dans le localStorage
}

// Fonction pour désactiver le mode sombre
function disableDarkMode() {
    var body = document.body;
    var header = document.querySelector("header");
    var fieldSets = document.querySelectorAll(".fieldset");
    var fieldSetFinal = document.querySelector(".fieldset-final");

    body.classList.remove("dark-mode");
    body.style.background = "#EEEFFF";
    // header.style.background = "#FFFFFF";
    fieldSets.forEach(function (fieldSet) {
        fieldSet.style.background = "#F3F4FF";
    });
    fieldSetFinal.style.background = "#F3F4FF";
    darkModeButton.checked = false; // Décocher automatiquement le bouton en mode clair
    localStorage.setItem("darkModeEnabled", "false"); // Enregistrer l'état du mode sombre dans le localStorage
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
