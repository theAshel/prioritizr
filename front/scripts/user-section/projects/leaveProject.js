const leaveProjectButtons = document.querySelectorAll(".leave-project-button")

leaveProjectButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        {
            const projectId = parseInt(button.getAttribute("id").replace(/\D/g, ''), 10)

            const formData = new FormData()

            formData.append("project_id", projectId)

            const url = "../../scripts/user-section/projects/leaveProject.php";
            fetch(url, {
            method: "POST",
            body: formData,
            })
            .then((response) => {
                if (response.status === 200) {
                    return response.text()
                } 
            })
            .then((data) => {
                window.location.reload()
            })
            .catch((error) => {
                console.error(error)
            })
        }
    })
})