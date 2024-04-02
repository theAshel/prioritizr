function writeErrorMessage(selector, message) {
    const selectorTextError = document.getElementById(`invalid-${selector}`);
    const border = document.getElementById(`${selector}-input`);

    border.style.borderBottomColor = "red";
    selectorTextError.textContent = message;
}

function cleanErrorMessage(selector) {
    const selectorTextError = document.getElementById(`invalid-${selector}`);
    const border = document.getElementById(`${selector}-input`);

    border.style.borderBottomColor = "#AAA6A6";
    selectorTextError.textContent = "";
}

document.getElementById("login-form").addEventListener("submit", function (event) {
    event.preventDefault();

    const identifier = document.getElementsByName("identifier")[0].value;
    const password = document.getElementsByName("password")[0].value;

    const formData = new FormData();
    formData.append("identifier", identifier);
    formData.append("password", password);

    const url = "../../scripts/login/checkLoginData.php";

    fetch(url, {
        method: "POST",
        body: formData
    })
        .then(response => {
            if (response.ok) {
                return response.text();
            } else {
                throw new Error("Erreur lors de la requête Fetch.");
            }
        })
        .then(response => {
            if (response.includes("nothing")) {
                writeErrorMessage("identifier", "Veuillez entrer un identifiant.");
                writeErrorMessage("password", "Veuillez entrer un mot de passe.");
            } else if (response.includes("noIdentifier")) {
                writeErrorMessage("identifier", "Veuillez entrer un identifiant.");
                cleanErrorMessage("password");
            } else if (response.includes("noPassword")) {
                cleanErrorMessage("identifier");
                writeErrorMessage("password", "Veuillez entrer un mot de passe.");
            } else if (response.includes("wrongIdentifier")) {
                writeErrorMessage("identifier", "Cet identifiant est incorrect.");
                cleanErrorMessage("password");
            } else if (response.includes("wrongPassword")) {
                cleanErrorMessage("identifier");
                writeErrorMessage("password", "Le mot de passe correspondant à cet identifiant est incorrect.");
            } else if (response.includes("bannedUser")) {
                writeErrorMessage("identifier", "Cet utilisateur est banni.");
                cleanErrorMessage("password");
            } else {
                cleanErrorMessage("identifier");
                cleanErrorMessage("password");
                window.location.href = "../user-section/homePage.php";
            }
        })
        .catch(error => {
            console.error(error);
        });
});
