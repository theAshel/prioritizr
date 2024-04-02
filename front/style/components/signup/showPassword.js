const iconButton = document.getElementsByClassName("fa-eye")
const inputPasswordList = document.getElementsByClassName('password')

for (let i = 0; i < iconButton.length; i++) {
    iconButton[i].addEventListener('mouseenter', function() {
        iconButton[i].style.color = "#b3b3ff"
        iconButton[i].style.fontSize = "17px"
        iconButton[i].style.transition = "0.3s"
    })

    iconButton[i].addEventListener('click', function() {
        const inputPasswordList = document.getElementsByClassName('password')
        const inputPassword = inputPasswordList[i]

        if (inputPassword.type === 'password') {
            inputPassword.type = 'text'
            iconButton[i].style.color = "#4B4A69"
            iconButton[i].style.fontSize = "17px"
        }
        else if (inputPassword.type === 'text') {
            inputPassword.type = 'password'
            iconButton[i].style.color = "#bfbfbf"
            iconButton[i].style.fontSize = "15px"
        }
    })

    iconButton[i].addEventListener('mouseleave', function() {
        const inputPasswordList = document.getElementsByClassName('password')
        const inputPassword = inputPasswordList[i]

        if (inputPassword.type === 'password') {
            iconButton[i].style.color = "#bfbfbf"
            iconButton[i].style.fontSize = "15px"
        }
        else if (inputPassword.type === 'text') {
            iconButton[i].style.color = "#4B4A69"
            iconButton[i].style.fontSize = "17px"
        }
    })
}
