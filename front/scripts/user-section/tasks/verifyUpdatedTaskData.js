const updateTaskButtons = document.querySelectorAll(".valid-task-update")

updateTaskButtons.forEach(trigger => {
    trigger.addEventListener('click', function() {
        const buttonId = this.getAttribute('id')

        const taskIndex = parseInt(buttonId.replace(/\D/g, ''), 10)

        var errorCount = 0

        const updatedTaskInputBorder = document.getElementById(`update-task-name-input-container-${taskIndex}`)
        const updatedTaskName = document.getElementById(`update-task-name-input-${taskIndex}`)
        const updatedTaskNameInput = updatedTaskName.value
        const updatedTaskNameError = document.getElementById(`invalid-updated-task-name-${taskIndex}`)
        const updatedTaskNameRegex = /^(?!\s*$).{1,50}$/
        const updatedTaskNameRegexTest = updatedTaskNameRegex.test(updatedTaskNameInput)

        if (!updatedTaskNameInput) {    // Check si l'input pour renseigner le nom de tâche n'est pas vide
            errorCount++
            updatedTaskInputBorder.style.borderBottomColor = "red"
            updatedTaskNameError.textContent = "Veuillez renseigner un nom à la tâche."
        }
        else if (!updatedTaskNameRegexTest) {
            errorCount++
            updatedTaskInputBorder.style.borderBottomColor = "red"
            updatedTaskNameError.textContent = "Vous ne pouvez pas mettre un nom vide ou qui a plus de 50 caractères."
        }
        else {
            updatedTaskInputBorder.style.borderBottomColor = "#AAA6A6"
            updatedTaskNameError.textContent = ""
        }

        if (!errorCount) {
            const updatedTaskPriority  = document.getElementById(`update-task-priority-input-${taskIndex}`).value
            const updatedTaskDifficulty  = document.getElementById(`update-task-difficulty-input-${taskIndex}`).value
            const updatedDescription = document.getElementById(`update-task-description-input-${taskIndex}`).value

            const subtasksToDelete = document.querySelectorAll(".delete-subtask-checkbox:checked") // récupère tous les sous-tâches à supprimer, où les checkbox sont cochées
            var subtasksIndexToDeleteArray = [] // stocke tous les id des sous tâches à supprimer
            
            subtasksToDelete.forEach(function(checkbox) {
                const subTaskId = parseInt(checkbox.getAttribute("id").replace(/\D/g, ''), 10)
                subtasksIndexToDeleteArray.push(subTaskId) // on ajoute les id des sous tâches à supprimer dans le tableau
            })

            const subtasksToAddContainer = document.getElementById(`subtask-to-add-container-${taskIndex}`) // sélectionne le bon conteneur de sous-tâches à ajouter
            const subtaskToAdd = subtasksToAddContainer.querySelectorAll("div") // récupère toutes les div qui sont dans le contenur précédemment sélectionné
            var subtasksToAddArray = [] // on stockera dans ce tableau les noms des sous-tâches à ajouter

            subtaskToAdd.forEach((subtask) => { // pour chaque div enfant, on récupère le contenu du paragraphe à l'intérieur qui est en fait le nom de la sous-tâche
                const subtaskToAddParagraph = subtask.querySelector("p")
                const subtaskToAddName = subtaskToAddParagraph.textContent
                subtasksToAddArray.push(subtaskToAddName) // on ajoute le nom de chaque sous-tâche au fur et à mesure
            })

            const formData = new FormData()
            
            formData.append("priority", updatedTaskPriority)
            formData.append("difficulty", updatedTaskDifficulty)
            formData.append("task_name", updatedTaskNameInput)
            formData.append("description", updatedDescription)
            formData.append("task_index", taskIndex)
            formData.append("subtasks_to_delete_index", subtasksIndexToDeleteArray)
            formData.append("subtasks_to_add_names", subtasksToAddArray)

            if (document.getElementById(`update-task-${taskIndex}-responsible`)) {
                formData.append("task_responsible", document.getElementById(`update-task-${taskIndex}-responsible`).textContent)
            }
    
            const xhr = new XMLHttpRequest()
            const url = "../../scripts/user-section/tasks/postUpdatedTaskData.php"
    
            xhr.open("POST", url, true)
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = xhr.responseText
                    // console.log(response)
                    window.location.reload()
                }
                else 
                    console.error("Erreur lors de la requête AJAX")
            }
            xhr.send(formData)
        }
    })
})