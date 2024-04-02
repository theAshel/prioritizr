const openProjectUsersPopup = document.getElementById('show-project-users-modal')
const projectUsersDialog = document.getElementById("project-users-dialog")
const closeProjectUsersDialogButton = document.getElementById("close-project-users-dialog")

openProjectUsersPopup.addEventListener('click', function() {
    projectUsersDialog.showModal()
})

closeProjectUsersDialogButton.addEventListener('click', function() {
    projectUsersDialog.close()

    // à chaque fois qu'on ferme la boîte de dialogue, on vide la barre de recherche, la zone où apparaissent les users trouvés ainsi que les users censés être ajoutés
    const userSearchBarResultsContainer = document.getElementById("user-search-bar-results-container")
    const usersToAddContainer = document.getElementById("users-to-add-container")

    document.getElementById("user-search-bar").value = ""
    userSearchBarResultsContainer.innerHTML = ""
    usersToAddContainer.innerHTML = ""
})