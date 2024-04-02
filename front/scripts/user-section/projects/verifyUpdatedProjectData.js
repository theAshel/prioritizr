const editProjectButton = document.getElementById("valid-project-edit")

editProjectButton.addEventListener('click', function() {

    const editProjectInputBorder = document.getElementsByClassName("edit-project-dialog-input")
    var errorCount = 0

    // TEST NOM DE PROJET

    const editProjectName = document.getElementById("edit-project-name-input")
    const editProjectNameInput = editProjectName.value
    const editProjectNameError = document.getElementById("invalid-updated-name")
    const editProjectNameRegex = /^(?!\s*$).{1,50}$/
    const editProjectNameRegexTest = editProjectNameRegex.test(editProjectNameInput)

    if (!editProjectNameInput) {    // Check si l'input pour renseigner un titre de projet n'est pas vide
        errorCount++
        editProjectInputBorder[0].style.borderBottomColor = "red"
        editProjectNameError.textContent = "Veuillez renseigner un nom de projet."
    }
    else if (!editProjectNameRegexTest) { // Check si le nom de projet respect le regex
        errorCount++
        editProjectInputBorder[0].style.borderBottomColor = "red"
        editProjectNameError.textContent = "Vous ne pouvez pas mettre un nom vide ou qui a plus de 50 caractères."
    }
    else {
        editProjectInputBorder[0].style.borderBottomColor = "#AAA6A6"
        editProjectNameError.textContent = ""
    }

    if (!errorCount) {
        const formData = new FormData()
        const description = document.getElementById("edit-project-description-input").value
        const status = document.getElementById("edit-project-status-input").value

        formData.append("project_name", editProjectNameInput)
        formData.append("description", description)
        formData.append("status", status)

        const xhr = new XMLHttpRequest()
        const url = "../../scripts/user-section/projects/postUpdatedProjectData.php"

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