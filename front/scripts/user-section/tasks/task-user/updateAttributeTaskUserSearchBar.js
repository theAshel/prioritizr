// on stocke les conteneurs où apparaissent les résultats de la barre de recherche de toutes les boites de dialogues "modification de tâche"
const updateTaskUsersearchBarResultsContainers = document.querySelectorAll(".search-update-attribute-task-user-results-container")
// ainsi que les barres de recherche
var updateTaskUserSearchBarInputs = document.querySelectorAll(".update-task-search-bar")
var taskIndex

// on boucle sur chaque barre de recherche
updateTaskUserSearchBarInputs.forEach(updateTaskUserSearchBarInput => {
    updateTaskUserSearchBarInput.addEventListener("input", function(event) {
        const searchText = event.target.value.trim()

        // on stocke l'index de la barre de recherche actuellement visée par la boucle
        taskIndex = parseInt(updateTaskUserSearchBarInput.getAttribute("id").replace(/\D/g, ''), 10)
    
        // on boucle cette fois-ci sur toutes les "conteneurs de résultats de la barre de recherche"
        updateTaskUsersearchBarResultsContainers.forEach(updateTaskUsersearchBarResultsContainer => {
            // cette condition vérifie si le conteneur est bien celui associé la barre de recherche qui est actuellement visée
            if (parseInt(updateTaskUsersearchBarResultsContainer.getAttribute("id").replace(/\D/g, ''), 10) == taskIndex) {
                // même script que dans attributeTaskUserSearchBar.js
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
                    updateTaskUsersearchBarResultsContainer.innerHTML = '';
                  
                    // Afficher les nouveaux résultats
                    for (var i = 0; i < results.length; i++) {
                        var user = results[i];
                
                        var resultItem = document.createElement('p');
                        resultItem.classList.add("attribute-task-user-search-result")
                        resultItem.id = `attribute-task-${taskIndex}-user-search-result`
                        resultItem.textContent = user.username;
                        updateTaskUsersearchBarResultsContainer.appendChild(resultItem);
                    }
                    if (!results.length) {
                        var resultItem = document.createElement('p');
                        resultItem.textContent = "Aucun résultat trouvé.";
                        updateTaskUsersearchBarResultsContainer.appendChild(resultItem);
                    }
                  }

                if (searchText !== '') {
                    updateTaskUsersearchBarResultsContainer.style.display = "block"
                    var searchResults = searchUsers(searchText);
                    displayResults(searchResults);
                }
                else {
                    updateTaskUsersearchBarResultsContainer.style.display = "none"
                }
            }
        })
    })
})

document.addEventListener('click', function(event) {
    const userResult = event.target

    if (userResult.getAttribute("class") && userResult.getAttribute("class").includes("attribute-task-user-search-result")
    && parseInt(userResult.getAttribute("id").replace(/\D/g, ''), 10) == taskIndex) {
        //  on vérifie si l'élément cliqué est bien un user de la barre de recherche
        const userResultName = userResult.textContent // on récupère son nom

        // on crée l'élément p qui contient le nom du user à ajouter

        const userToAttributeName = document.createElement('p')
        userToAttributeName.id = `update-task-${taskIndex}-responsible`
        userToAttributeName.textContent = userResultName

        // ajout de la croix qui permet de retirer l'user qu'on souhaitait ajouter

        const removeUserToAttributeButton = document.createElement('i')
        removeUserToAttributeButton.classList.add("fa-solid")
        removeUserToAttributeButton.classList.add("fa-xmark")
        removeUserToAttributeButton.id = `remove-update-user-to-attribute-button-${taskIndex}`

        // on ajoute tous ces éléments dans la div

        const userToAttributeContianer = document.getElementById(`update-task-${taskIndex}-user-to-attribute-container`)
        // on vide cette div car on ne peux ajouter qu'un user à la fois
        userToAttributeContianer.innerHTML = ""
        userToAttributeContianer.appendChild(userToAttributeName)
        userToAttributeContianer.appendChild(removeUserToAttributeButton)


        // après ajout, on vide l'input et le conteneur où apparaissent les users trouvés

        const updateTaskUsersearchBarResultsContainer = document.getElementById(`search-update-attribute-task-${taskIndex}-user-results-container`)
        updateTaskUsersearchBarResultsContainer.innerHTML = ""
        updateTaskUsersearchBarResultsContainer.style.display = "none"
        document.getElementById(`update-task-search-bar-${taskIndex}`).value = ""
    }
    // on vérifie si on clique sur une croix permettant de retirer un user qui devait être ajouté
    else if (event.target.getAttribute("id") && event.target.getAttribute("id") == `remove-update-user-to-attribute-button-${taskIndex}`) {

        // div qui contient l'user assigné à la tâche
        const userToAttributeContianer = document.getElementById(`update-task-${taskIndex}-user-to-attribute-container`)
        // on supprime le contenu de cette div
        userToAttributeContianer.innerHTML = ""
    }
})

