function toggleTab() {
    const tabContainer = document.querySelector(".chat-container");
    tabContainer.classList.toggle("open");

    const chatArrow = document.getElementById("chat-header-arrow")

    chatArrow.classList.toggle("fa-angle-up")
    chatArrow.classList.toggle("fa-angle-down")
}

window.addEventListener("load", function() {
    const chatContainer = document.getElementById("chat-content")
    chatContainer.scrollTop = chatContainer.scrollHeight
  });