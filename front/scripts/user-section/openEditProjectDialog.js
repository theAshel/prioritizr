if (document.getElementById('show-edit-project-modal')){
    const openEditProjectPopup = document.getElementById('show-edit-project-modal')
    const editProjectDialog = document.getElementById("edit-project-dialog")
    const closeEditProjectDialogButton = document.getElementById("close-edit-project-dialog")

    openEditProjectPopup.addEventListener('click', function() {
        editProjectDialog.showModal()
    })

    closeEditProjectDialogButton.addEventListener('click', function() {
        editProjectDialog.close()
    })
}