document.addEventListener('click', function(event) {
    const projectResult = event.target
    if (projectResult.getAttribute("class") && projectResult.getAttribute("class").includes("project-result")) {
        const projectResultId = parseInt(projectResult.getAttribute("id").replace(/\D/g, ''), 10)

        const formData = new FormData();
        formData.append("project_id", projectResultId);

        const url = "../../scripts/user-section/header-search-bar/openProjectFromSearchBar.php";
        const options = {
            method: "POST",
            body: formData
        }

        fetch(url, options)
        .then(response => {
            if (response.ok) {
            return response.text();
            } else {
            throw new Error("Erreur lors de la requête fetch");
            }
        })
        .then(responseText => {
            // console.log(responseText);
            window.location.href = "./tableProjectPage.php";
        })
        .catch(error => {
            console.error(error);
        });
    }
})
