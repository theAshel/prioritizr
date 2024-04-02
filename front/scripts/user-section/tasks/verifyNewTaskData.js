const createTaskButton = document.getElementById("valid-task-creation")

createTaskButton.addEventListener('click', function() {

    const newTaskInputBorder = document.getElementsByClassName("dialog-input")
    var errorCount = 0

    // TEST NOM DE TACHE

    const newTaskName = document.getElementById("create-task-name-input")
    const newTaskNameInput = newTaskName.value
    const newTaskNameError = document.getElementById("invalid-name")
    const newTaskNameRegex = /^(?!\s*$).{1,50}$/
    const newTaskNameRegexTest = newTaskNameRegex.test(newTaskNameInput)

    if (!newTaskNameInput) {    // Check si l'input pour renseigner le nom de tâche n'est pas vide
        errorCount++
        newTaskInputBorder[0].style.borderBottomColor = "red"
        newTaskNameError.textContent = "Veuillez renseigner un nom à la tâche."
    }
    else if (!newTaskNameRegexTest) {
        errorCount++
        newTaskInputBorder[0].style.borderBottomColor = "red"
        newTaskNameError.textContent = "Vous ne pouvez pas mettre un nom vide ou qui a plus de 50 caractères."
    }
    else {
        newTaskInputBorder[0].style.borderBottomColor = "#AAA6A6"
        newTaskNameError.textContent = ""
    }

    // TEST TAUX DE PRIORITE

    const newPriorityInput = document.getElementById("create-task-priority-input").value
    const newPriorityError = document.getElementById("invalid-priority")

    if (!newPriorityInput) {    // Check si l'input pour renseigner un taux de priorité à la tâche n'est pas vide
        errorCount++
        newTaskInputBorder[1].style.borderBottomColor = "red"
        newPriorityError.textContent = "Veuillez choisir un niveau de priorité."
    }
    else {  // l'entrée est valide
        newTaskInputBorder[1].style.borderBottomColor = "#AAA6A6"
        newPriorityError.textContent = ""
    }

    // TEST TAUX DE PRIORITE

    const newDifficultyInput = document.getElementById("create-task-difficulty-input").value
    const newDifficultyError = document.getElementById("invalid-difficulty")

    if (!newDifficultyInput) {    // Check si l'input pour renseigner un taux de difficulté à la tâche n'est pas vide
        errorCount++
        newTaskInputBorder[2].style.borderBottomColor = "red"
        newDifficultyError.textContent = "Veuillez renseigner un taux de priorité."
    }
    else {  // l'entrée est valide
        newTaskInputBorder[2].style.borderBottomColor = "#AAA6A6"
        newDifficultyError.textContent = ""
    }

    if (!errorCount) {
        const formData = new FormData()
        const description = document.getElementById("create-task-description-input").value

        formData.append("priority", newPriorityInput)
        formData.append("difficulty", newDifficultyInput)
        formData.append("task_name", newTaskNameInput)
        formData.append("description", description)

        if (document.getElementById("attribute-user")) {
            formData.append("task_responsible", document.getElementById("attribute-user").textContent)
        }

        const xhr = new XMLHttpRequest()
        const url = "../../scripts/user-section/tasks/postNewTaskData.php"

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