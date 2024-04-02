const openDeleteTaskDialogButtons = document.querySelectorAll(".fa-trash-can")

openDeleteTaskDialogButtons.forEach(openDeleteTaskDialogButton => {
    openDeleteTaskDialogButton.addEventListener('click', function() {
        const taskId = parseInt(openDeleteTaskDialogButton.getAttribute("id").replace(/\D/g, ''), 10)
        const dialog = document.getElementById(`delete-task-${taskId}-dialog`)

        dialog.showModal()
    })
})

const closeDeleteTaskDialogButtons = document.querySelectorAll(".close-delete-task-dialog-button")

closeDeleteTaskDialogButtons.forEach(closeDeleteTaskDialogButton => {
    closeDeleteTaskDialogButton.addEventListener('click', function() {
        const taskId = parseInt(closeDeleteTaskDialogButton.getAttribute("id").replace(/\D/g, ''), 10)
        const dialog = document.getElementById(`delete-task-${taskId}-dialog`)

        dialog.close()
    })
})

const deleteTaskButtons = document.querySelectorAll(".delete-task-button")

deleteTaskButtons.forEach(deleteTaskButton => {
    deleteTaskButton.addEventListener('click', function() {
        const taskId = parseInt(deleteTaskButton.getAttribute("id").replace(/\D/g, ''), 10)

        const formData = new FormData()
        formData.append("id_task", taskId)

        const url = "../../scripts/user-section/tasks/deleteTask.php"
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
            window.location.reload()
        })
        .catch(error => {
            console.error(error)
        })
    })
})