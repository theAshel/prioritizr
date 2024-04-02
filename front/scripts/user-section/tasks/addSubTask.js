const addSubtaskSections = document.querySelectorAll('.add-subtask-section')

addSubtaskSections.forEach(function(section) {
    const addSubtaskBtn = section.querySelector('.add-subtask-btn')
    const subtasksToAddContainer = section.querySelector('.subtask-to-add-container')
    const addSubtaskInput = section.querySelector('.add-subtask-input')

    addSubtaskBtn.addEventListener('click', function() {
        const newSubtaskInput = addSubtaskInput.value

        if (newSubtaskInput.trim() !== "") {
            const subtaskItem = document.createElement("div")
            const subtaskName = document.createElement("p")
            subtaskName.textContent = newSubtaskInput

            const cross = document.createElement("i")
            cross.className = "fa-solid fa-xmark"
            cross.addEventListener('click', function() {
                subtaskItem.remove()
            })

            subtaskItem.appendChild(subtaskName)
            subtaskItem.appendChild(cross)
            subtaskItem.classList.add("subtask-to-add")
            subtasksToAddContainer.appendChild(subtaskItem)

            addSubtaskInput.value = ""
        }
    })
})