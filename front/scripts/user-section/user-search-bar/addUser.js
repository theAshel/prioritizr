document.addEventListener('click', function(event) {
    const userResult = event.target
    if (userResult.getAttribute("class") && userResult.getAttribute("class").includes("user-result")) { //  on vérifie si l'élément cliqué est bien un user de la barre de recherche
        const userResultId = parseInt(userResult.getAttribute("id").replace(/\D/g, ''), 10) // on récupère l'id du user contenu dans son attribut id
        const userResultName = userResult.textContent // on récupère son nom

         // on crée l'élément p qui contient le nom du user à ajouter

        const userToAddName = document.createElement('p')
        userToAddName.id = `add-user-${userResultId}`
        userToAddName.textContent = userResultName

        // création du select pour le rôle du user

        const userRole = document.createElement('select')
        userRole.name = "user-role"
        userRole.id = `user-${userResultId}-role`

        const userRoleOption1 = document.createElement('option')
        userRoleOption1.value = "2"
        userRoleOption1.textContent = "Associé"
        const userRoleOption2 = document.createElement('option')
        userRoleOption2.value = "3"
        userRoleOption2.textContent = "Participant"
        const userRoleOption3 = document.createElement('option')
        userRoleOption3.value = "4"
        userRoleOption3.textContent = "Lecteur"

        userRole.add(userRoleOption1)
        userRole.add(userRoleOption2)
        userRole.add(userRoleOption3)

        // ajout de la croix qui permet de retirer l'user qu'on souhaitait ajouter

        const removeUserToAddButton = document.createElement('i')
        removeUserToAddButton.classList.add("fa-solid")
        removeUserToAddButton.classList.add("fa-xmark")
        removeUserToAddButton.classList.add("remove-user-to-add-button")
        removeUserToAddButton.id = `remove-user-${userResultId}-to-add`
        
        // création de la div qui contiendra tout ces éléments 

        const userToAddContainer = document.createElement('div')
        userToAddContainer.classList.add("user-to-add")
        userToAddContainer.id = `user-${userResultId}-to-add-section`

        // on ajoute tous ces éléments dans la div

        userToAddContainer.appendChild(userToAddName)
        userToAddContainer.appendChild(userRole)
        userToAddContainer.appendChild(removeUserToAddButton)

        // on l'ajoute dans l'endroit de la page prévu pour

        const usersToAddContainer = document.getElementById("users-to-add-container")
        usersToAddContainer.appendChild(userToAddContainer)

        // après ajout, on vide l'input et la zone où apparaissent les users trouvés

        const userSearchBarResultsContainer = document.getElementById("user-search-bar-results-container")
        userSearchBarResultsContainer.innerHTML = ""
        document.getElementById("user-search-bar").value = ""
    }
    else if (event.target.getAttribute("class") && event.target.getAttribute("class").includes("remove-user-to-add-button")) { // on vérifie si on clique sur une croix permettant de retirer un user qui devait être ajouté
        const removeUserToAddButton = event.target
        const removeUserToAddId = parseInt(removeUserToAddButton.getAttribute("id").replace(/\D/g, ''), 10) // on récupère l'id du user à retirer contenue dans l'id du bouton

        const usersToAddList = document.querySelectorAll(".user-to-add")
        usersToAddList.forEach(userToAddElement => { // on vérifie quelle div contient cet id pour la supprimer
            if (parseInt(userToAddElement.getAttribute("id").replace(/\D/g, ''), 10) == removeUserToAddId) {
                userToAddElement.remove()
            }
        })
    }
})