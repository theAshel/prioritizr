const openDeleteProjectDialogButtons = document.querySelectorAll(".delete-project-popup")

openDeleteProjectDialogButtons.forEach(openDeleteProjectDialogButton => {
    openDeleteProjectDialogButton.addEventListener('click', function() {
        const projectId = parseInt(openDeleteProjectDialogButton.getAttribute("id").replace(/\D/g, ''), 10)
        const dialog = document.getElementById(`delete-project-${projectId}-dialog`)

        dialog.showModal()
    })
})

const closeDeleteProjectDialogButtons = document.querySelectorAll(".close-delete-project-dialog-button")

closeDeleteProjectDialogButtons.forEach(closeDeleteProjectDialogButton => {
    closeDeleteProjectDialogButton.addEventListener('click', function() {
        const projectId = parseInt(closeDeleteProjectDialogButton.getAttribute("id").replace(/\D/g, ''), 10)
        const dialog = document.getElementById(`delete-project-${projectId}-dialog`)

        dialog.close()
    })
})

const deleteProjectButtons = document.querySelectorAll(".delete-project-button")

deleteProjectButtons.forEach(deleteProjectButton => {
    deleteProjectButton.addEventListener('click', function() {
        const projectId = parseInt(deleteProjectButton.getAttribute("id").replace(/\D/g, ''), 10)

        const formData = new FormData()
        formData.append("id_project", projectId)

        const url = "../../scripts/user-section/Projects/deleteProject.php"
        const options = {
            method: "POST",
            body: formData
        }

        fetch(url, options)
        .then(response => {
            if (response.ok) {
            return response.text()
            } else {
            throw new Error("Erreur lors de la requête fetch")
            }
        })
        .then(responseText => {
            // console.log(responseText)
            window.location.href = "./homePage.php"
        })
        .catch(error => {
            console.error(error)
        })
    })
})