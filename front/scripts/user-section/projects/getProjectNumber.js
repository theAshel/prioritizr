const projectsList = document.querySelectorAll(".line-project-list")

projectsList.forEach(project => {
    project.addEventListener('click', function(event) {
        {
            const projectId = parseInt(project.getAttribute("id").replace(/\D/g, ''), 10)

            const formData = new FormData()

            formData.append("project_id", projectId)

            const url = "../../scripts/user-section/projects/openProjectPage.php";
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
                window.location.href = "./tableProjectPage.php"
            })
            .catch((error) => {
                console.error(error)
            })
        }
    })
})