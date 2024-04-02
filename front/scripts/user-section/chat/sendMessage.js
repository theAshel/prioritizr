const messageInput = document.getElementById("message-input")
const chatContainer = document.getElementById("chat-content")

messageInput.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        const messageInputValue = messageInput.value

        if(messageInputValue.trim() !== "") {
            const messageContainer = document.createElement("div")
            messageContainer.className = "message-container sender"


            const currentDate = new Date();

            const day = String(currentDate.getDate()).padStart(2, '0');
            const month = String(currentDate.getMonth() + 1).padStart(2, '0');
            const year = currentDate.getFullYear();
            const formattedDate = `${day}/${month}/${year}`;

            const hours = String(currentDate.getHours()).padStart(2, '0');
            const minutes = String(currentDate.getMinutes()).padStart(2, '0');
            const formattedTime = `${hours}h${minutes}`;
            

            const messageInfo = document.createElement("p")
            messageInfo.className = "message-info"
            messageInfo.textContent = `Envoyé par vous le ${formattedDate} à ${formattedTime}`


            const words = messageInfo.textContent.split(" ")
            const spanIndex = words.findIndex(word => word === "vous")
            const span = document.createElement("span")
            span.className = "message-sender"
            span.textContent = words[spanIndex]

            words[spanIndex] = span.outerHTML
            messageInfo.innerHTML = words.join(" ")


            const messageParagraph = document.createElement("p")
            messageParagraph.className = "message-content"
            messageParagraph.textContent = messageInputValue

            messageContainer.appendChild(messageInfo)
            messageContainer.appendChild(messageParagraph)

            chatContainer.appendChild(messageContainer)

            document.getElementById("message-input").value = ""

            chatContainer.scrollTop = chatContainer.scrollHeight

            const formData = new FormData()

            formData.append("message_content", messageInputValue)

            const xhr = new XMLHttpRequest()
            const url = "../../scripts/user-section/chat/postNewMessage.php"

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
        }
    }
})