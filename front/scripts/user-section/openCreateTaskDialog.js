const openCreateTaskPopup = document.getElementById('create-task-popup-button')
const createTaskDialog = document.getElementById("create-task-dialog")
const closeTaskDialogButton = document.getElementById("close-task-dialog")

openCreateTaskPopup.addEventListener('click', function() {
    createTaskDialog.showModal()
})

closeTaskDialogButton.addEventListener('click', function() {
    createTaskDialog.close()
})