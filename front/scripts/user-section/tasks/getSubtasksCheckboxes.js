const subtasksCheckboxes = document.querySelectorAll(".subtask-checkbox")

subtasksCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener('click', function() {
        const subtaskId = parseInt(checkbox.getAttribute("id").replace(/\D/g, ''), 10)
        const subtaskStatus = checkbox.checked

        const formData = new FormData()

        formData.append("subtask_id", subtaskId)
        formData.append("subtask_status", subtaskStatus)

        const xhr = new XMLHttpRequest()
        const url = "../../scripts/user-section/tasks/putSubtaskStatus.php"

        xhr.open("POST", url, true)
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = xhr.responseText
                // console.log(response)
            }
            else 
                console.error("Erreur lors de la requête AJAX")
        }
        xhr.send(formData)
    })
})