const removeUserButtons = document.querySelectorAll(".delete-user-button")

removeUserButtons.forEach(removeUser => {
    removeUser.addEventListener('click', function() {
        const userId = parseInt(removeUser.getAttribute("id").replace(/\D/g, ''), 10)
        
        const userContainer = document.getElementById(`user-${userId}-container`)
        userContainer.remove()

        const formData = new FormData()
        formData.append("id_user", userId)

        const url = "../../scripts/user-section/projects/deleteUsersProject.php"
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
        .then(responseText => {})
        .catch(error => {
            console.error(error)
        })
    })
})