const usersProject = document.querySelectorAll(".project-user")

usersProject.forEach(user => {
    user.addEventListener('click', function() {
        const userId = parseInt(user.getAttribute("id").replace(/\D/g, ''), 10)
        const editUserRoleContainer = document.getElementById(`edit-user-${userId}-role-section`)
        editUserRoleContainer.style.display = editUserRoleContainer.style.display == "flex" ? "none" : "flex"
    })
})

const editUserRoleButtons = document.querySelectorAll(".edit-role-button")

editUserRoleButtons.forEach(button => {
    button.addEventListener('click', function() {
        const userId = parseInt(button.getAttribute("id").replace(/\D/g, ''), 10)
        
        const role = document.getElementById(`current-user-${userId}-role`).value
        
        const divToMove = document.getElementById(`user-${userId}-container`)
        const targetContainer = document.getElementById(`role-${role}-section`)

        targetContainer.appendChild(divToMove)

        const editUserRoleContainer = document.getElementById(`edit-user-${userId}-role-section`)
        editUserRoleContainer.style.display = "none"

        const formData = new FormData()
        formData.append("id_user", userId)
        formData.append("user_role", role)

        const url = "../../scripts/user-section/projects/editUserRole.php"
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
        })
        .catch(error => {
            console.error(error)
        })
    })
})