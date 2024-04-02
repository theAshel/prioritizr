function start(task) {
    task.dataTransfer.effectAllowed="move"
    task.dataTransfer.setData("text", task.target.getAttribute("id"))
    console.log(task.dataTransfer)
}

function over(task) {
    return false
}

function drop(task) {
    ob = task.dataTransfer.getData("text")
    task.currentTarget.appendChild(document.getElementById(ob))
    task.stopPropagation()

    const formData = new FormData()
    const taskIndex = ob
    const status = task.currentTarget.id

    formData.append("task_index", taskIndex)
    formData.append("status", status)

    const xhr = new XMLHttpRequest()
    const url = "../../scripts/user-section/tasks/updateTaskStatus.php"

    xhr.open("POST", url, true)
    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = xhr.responseText
            // console.log(response)
        }
        else 
            console.error("Erreur lors de la requête AJAX")
    }
    xhr.send(formData)

    return false
}