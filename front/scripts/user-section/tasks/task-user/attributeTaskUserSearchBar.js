function searchUsers(searchTerm) {
    searchTerm = searchTerm.toLowerCase();
  
    var results = [];
  
    for (var i = 0; i < projectUsersJson.length; i++) {
        var user = projectUsersJson[i];
        var name = user.username.toLowerCase();

        if (name.includes(searchTerm)) {
        results.push(user);
        }
    }
  
    return results;
}

function displayResults(results) {
    // Effacer les résultats précédents
    addTaskUsersearchBarResultsContainer.innerHTML = '';
  
    // Afficher les nouveaux résultats
    for (var i = 0; i < results.length; i++) {
        var user = results[i];

        var resultItem = document.createElement('p');
        resultItem.classList.add("attribute-task-user-search-result")
        resultItem.id = `attribute-task-user-${user.id_user}-search-result`
        resultItem.textContent = user.username;
        addTaskUsersearchBarResultsContainer.appendChild(resultItem);
    }
    if (!results.length) {
        var resultItem = document.createElement('p');
        resultItem.textContent = "Aucun résultat trouvé.";
        addTaskUsersearchBarResultsContainer.appendChild(resultItem);
    }
  }





const addTaskUsersearchBarResultsContainer = document.getElementById("search-attribute-task-user-results-container")
var addTaskUserSearchBarInput = document.getElementById("dialog-task-search-bar")

addTaskUserSearchBarInput.addEventListener("input", function(event) {
    const searchText = event.target.value.trim()

    if (searchText !== '') {
        addTaskUsersearchBarResultsContainer.style.display = "block"
        var searchResults = searchUsers(searchText);
        displayResults(searchResults);
    }
    else {
        addTaskUsersearchBarResultsContainer.style.display = "none"
    }
})

  document.addEventListener('click', function(event) {
    const userResult = event.target
    if (userResult.getAttribute("class") && userResult.getAttribute("class").includes("attribute-task-user-search-result")) { //  on vérifie si l'élément cliqué est bien un user de la barre de recherche
        const userResultId = parseInt(userResult.getAttribute("id").replace(/\D/g, ''), 10) // on récupère l'id du user contenu dans son attribut id
        const userResultName = userResult.textContent // on récupère son nom

         // on crée l'élément p qui contient le nom du user à ajouter

        const userToAttributeName = document.createElement('p')
        userToAttributeName.id = `attribute-user`
        userToAttributeName.textContent = userResultName

        // ajout de la croix qui permet de retirer l'user qu'on souhaitait ajouter

        const removeUserToAttributeButton = document.createElement('i')
        removeUserToAttributeButton.classList.add("fa-solid")
        removeUserToAttributeButton.classList.add("fa-xmark")
        removeUserToAttributeButton.id = `remove-user-to-attribute`

        // on ajoute tous ces éléments dans la div

        const userToAttributeContianer = document.getElementById("task-user-to-attribute-container")
        // on vide cette div car on ne peux ajouter qu'un user à la fois
        userToAttributeContianer.innerHTML = ""
        userToAttributeContianer.appendChild(userToAttributeName)
        userToAttributeContianer.appendChild(removeUserToAttributeButton)


        // après ajout, on vide l'input et la zone où apparaissent les users trouvés

        addTaskUsersearchBarResultsContainer.innerHTML = ""
        addTaskUsersearchBarResultsContainer.style.display = "none"
        document.getElementById("dialog-task-search-bar").value = ""
    }
    else if (event.target.getAttribute("id") && event.target.getAttribute("id") == "remove-user-to-attribute") { // on vérifie si on clique sur une croix permettant de retirer un user qui devait être ajouté

        // div qui contient l'user assigné à la tâche
        const userToAttributeContianer = document.getElementById("task-user-to-attribute-container")
        // on supprime le contenu de cette div
        userToAttributeContianer.innerHTML = ""
    }
})