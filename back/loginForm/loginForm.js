function writeErrorMessage(selector, message)
{
    const selectorTextError = document.getElementById(`invalid-${selector}`)
    const border = document.getElementById(`${selector}-input`)

    border.style.borderBottomColor = "red"
    selectorTextError.textContent = message
}

function cleanErrorMessage(selector)
{
    const selectorTextError = document.getElementById(`invalid-${selector}`)
    const border = document.getElementById(`${selector}-input`)

    border.style.borderBottomColor = "#AAA6A6"
    selectorTextError.textContent = ""
}

document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault()

    const identifier = document.getElementsByName("identifier")[0].value
    const password = document.getElementsByName("password")[0].value

    const formData = new FormData()
    formData.append("identifier", identifier)
    formData.append("password", password)

    const xhr = new XMLHttpRequest()
    const url = "./checkLoginData.php"
    const options = {
        method: 'POST',
        body: formData
      };

      fetch(url, options)
      .then(response => {
        if (response.ok) {
          return response.text();
        } else {
          throw new Error('Erreur lors de la requête AJAX');
        }
      })
      .then(response => {
        console.log(response);
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
        } else if (response.includes("accessDenied")) {
          cleanErrorMessage("identifier");
          writeErrorMessage("password", "Accès refusé.");
        } else {
          cleanErrorMessage("identifier");
          cleanErrorMessage("password");
          window.location.href = "../gestion_utilisateur.php";
        }
      })
      .catch(error => {
        console.error('Erreur:', error);
      });
    })