const showSubtasksButtons = document.querySelectorAll(".subtask-container-button")

showSubtasksButtons.forEach(trigger => {
    trigger.addEventListener('click', function() {
        const subtaskContainerId = parseInt(this.getAttribute('id').replace(/\D/g, ''), 10)
        const subtaskContainer = document.getElementById(`subtasks-container-for-task-${subtaskContainerId}`)
        const showSubtasksButtonArrow = document.getElementById(`arrow-${subtaskContainerId}`)

        if (subtaskContainer.style.display === "none") {
            showSubtasksButtonArrow.classList.remove('fa-angle-down')
            showSubtasksButtonArrow.classList.add('fa-angle-up')
            subtaskContainer.style.display = "flex"
        }
        else {
            showSubtasksButtonArrow.classList.remove('fa-angle-up')
            showSubtasksButtonArrow.classList.add('fa-angle-down')
            subtaskContainer.style.display = "none" 
        }
    })
})