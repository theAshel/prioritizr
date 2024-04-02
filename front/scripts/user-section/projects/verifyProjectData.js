// const modelButtonInputs = document.getElementsByName('model-type')
    
// for (let i = 0; i < modelButtonInputs.length; i++) {
//     modelButtonInputs[i].addEventListener('click', function() {
//         if (i === 0) {
//             document.getElementById("dialog-table-model").style.border = "3px solid #057ec9"
//             document.getElementById("dialog-notepad-model").style.border = "1px solid #DFE1EF"
//         }
//         else if (i === 1) {
//             document.getElementById("dialog-notepad-model").style.border = "3px solid #057ec9"
//             document.getElementById("dialog-table-model").style.border = "1px solid #DFE1EF"
//         }
//     })
// }

const createProjectButton = document.getElementById("valid-project-creation")

createProjectButton.addEventListener('click', function() {

    const newProjectTitle = document.getElementById("create-project-title-input")
    const newProjectTitleInput = newProjectTitle.value
    const newProjectTitleError = document.getElementById("invalid-title")
    const newProjectTitleBorder = document.getElementsByClassName("dialog-input")
    const newProjectTitleRegex = /^(?!\s*$).{1,50}$/
    const newProjectTitleRegexTest = newProjectTitleRegex.test(newProjectTitleInput)

    // const modelChoiceError = document.getElementById("invalid-model")

    var errorCount = 0

    if (!newProjectTitleInput) {    // Check si l'input pour renseigner un titre de projet n'est pas vide
        errorCount++
        newProjectTitleBorder[0].style.borderBottomColor = "red"
        newProjectTitleError.textContent = "Veuillez renseigner un titre à votre projet."
    }
    else if (!newProjectTitleRegexTest) {
        errorCount++
        newProjectTitleBorder[0].style.borderBottomColor = "red"
        newProjectTitleError.textContent = "Vous ne pouvez pas mettre un titre vide ou qui a plus de 50 caractères."
    }
    else {
        newProjectTitleBorder[0].style.borderBottomColor = "#AAA6A6"
        newProjectTitleError.textContent = ""
    }
    
    // let i
    // var modelType
    // for (i = 0; i < modelButtonInputs.length; i++) {        // Vérifie si au moins un modèle est sélectionné
    //     if (modelButtonInputs[i].checked) {
    //         modelType = modelButtonInputs[i].value
    //         break       // On arrête de boucler si un des deux modèles est sélectionné
    //     }
    // }

    // if (i === modelButtonInputs.length) {     // Cela veut dire qu'aucun modèle n'a été sélectionné
    //     errorCount++
    //     modelChoiceError.textContent = "Veuillez sélectionner un modèle."
    // }
    // else
    //     modelChoiceError.textContent = ""

    if (!errorCount) {
        const formData = new FormData();
        formData.append("project_name", newProjectTitleInput)
        formData.append("type", "table")

        const url = "../../scripts/user-section/projects/postNewProjectData.php"

        fetch(url, {
        method: "POST",
        body: formData,
        })
        .then((response) => {
            if (response.status === 200) {
            return response.text();
            } else {
            throw new Error("Erreur lors de la requête Fetch")
            }
        })
        .then((data) => {
            console.log("test")
            window.location.href = "../user-section/tableProjectPage.php" 
        })
        .catch((error) => {
            console.error(error)
        })
    }
})

