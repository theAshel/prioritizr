const openCreateProjectDialogButton = document.getElementsByClassName("create-project")
const createProjectDialog = document.getElementById("create-project-dialog")
const closeDialogButton = document.getElementById("close-project-dialog")

// const modelButtons = document.getElementsByClassName("model-button")

for (let i = 0; i < openCreateProjectDialogButton.length; i++) {
    openCreateProjectDialogButton[i].addEventListener("click", function() {
        createProjectDialog.showModal()
    })
//     modelButtons[i].addEventListener('click', function() {
//         createProjectDialog.showModal()
//     })
}

closeDialogButton.addEventListener("click", function() {
    var newProjectTitleInput = document.getElementById("create-project-title-input")

    newProjectTitleInput.value = ""
    createProjectDialog.close()
})