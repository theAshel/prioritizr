const projectCardsList = document.querySelectorAll(".project-card")

projectCardsList.forEach(projectCard => {
    projectCard.addEventListener('click', function(event) {
        if (!(event.target.getAttribute("class") && event.target.getAttribute("class").includes("fa-ellipsis")) && !(event.target.closest(".card-popup-window"))
        && !(event.target.getAttribute("class") && event.target.getAttribute("class").includes("delete-project-dialog"))
        && !(event.target.getAttribute("class") && event.target.getAttribute("class").includes("delete-project-button"))
        && !(event.target.getAttribute("class") && event.target.getAttribute("class").includes("leave-project-button")))
        {
            const projectId = parseInt(projectCard.getAttribute("id").replace(/\D/g, ''), 10)

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