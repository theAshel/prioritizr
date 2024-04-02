const validAddUsersButton = document.getElementById("valid-manage-users")

validAddUsersButton.addEventListener('click', function() {
    const usersToAddList = document.querySelectorAll(".user-to-add")

    usersToAddList.forEach(userToAddElement => {
        const userToAddId = parseInt(userToAddElement.getAttribute("id").replace(/\D/g, ''), 10)
        const userRole = document.getElementById(`user-${userToAddId}-role`).value

        const formData = new FormData()
        formData.append("id_user", userToAddId)
        formData.append("user_role", userRole)

        const url = "../../scripts/user-section/user-search-bar/addUsersToProject.php"
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
            window.location.reload()
        })
        .catch(error => {
            console.error(error)
        })
    })
})