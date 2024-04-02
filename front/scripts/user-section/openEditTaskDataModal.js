const tasks = document.querySelectorAll('.task')

tasks.forEach(trigger => {
    trigger.addEventListener('click', function(event) {
        const dialogId = this.getAttribute('id')
        const dialog = document.getElementById(`dialog-${dialogId}`)
        if (event.target.getAttribute("class") !== "subtask-container-button-text" && event.target.getAttribute("class") !== "subtask-container-button"
        && event.target.getAttribute("class") !== "subtask-label" && event.target.getAttribute("class") !== "subtask-checkbox" 
        && event.target.getAttribute("class") !== "fa-solid fa-angle-up" && event.target.getAttribute("class") !== "fa-solid fa-angle-down"
        && event.target.getAttribute("class") !== "fa-regular fa-trash-can") 
            dialog.showModal()
    })
})

const closeModal = document.querySelectorAll(".close")

closeModal.forEach(closeButton => {
    closeButton.addEventListener('click', function() {
        const dialog = this.parentNode.parentNode.parentNode
        dialog.close()
    })
})
