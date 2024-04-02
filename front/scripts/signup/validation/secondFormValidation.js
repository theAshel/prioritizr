function validSecondForm()
{
    var errorCount = 0

    const nameRegex = /^[A-Z][A-Za-zéùà -]{1,49}$/
    const firstnameInput = document.getElementById('firstname').value
    const firstnameRegexTest = nameRegex.test(firstnameInput)
    const firstnameTextError = document.getElementById('invalid-firstname')
    const firstnameInputBorder = document.getElementById('firstname-input')

    const lastnameInput = document.getElementById('lastname').value
    const lastnameRegexTest = nameRegex.test(lastnameInput)
    const lastnameTextError = document.getElementById('invalid-lastname')
    const lastnameInputBorder = document.getElementById('lastname-input')

    const usernameRegex = /^[a-zA-Z0-9][a-zA-Z0-9-_]{2,49}$/
    const usernameInput = document.getElementById('username').value
    const usernameRegexTest = usernameRegex.test(usernameInput)
    const usernameTextError = document.getElementById('invalid-username')
    const usernameInputBorder = document.getElementById('username-input')

    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-_.,!*$?])[a-zA-Z0-9-_.,!*$?]{8,24}$/
    const passwordInput = document.getElementById('password').value
    const passwordRegexTest = passwordRegex.test(passwordInput)
    const passwordTextError = document.getElementById('invalid-password')
    const passwordInputBorder = document.getElementById('password-input')

    const passwordConfirmationInput = document.getElementById('passwordConfirmation').value
    const passwordConfirmationTest = passwordConfirmationInput.localeCompare(passwordInput)
    const passwordConfirmationTextError = document.getElementById('invalid-passwordConfirmation')
    const passwordConfirmationInputBorder = document.getElementById('passwordConfirmation-input')

    if (!firstnameRegexTest)
    {
        errorCount++
        firstnameInputBorder.style.borderBottomColor = "red"
        if (firstnameInput.length < 2)
            firstnameTextError.textContent = "Veuillez renseigner un prénom de 2 lettres minimum."
        else
            firstnameTextError.textContent = "Veuillez entrer un prénom valide. Il ne doit contenir que des lettres et doit commencer par une majuscule."
    }
    else
    {
        firstnameInputBorder.style.borderBottomColor = "#0a4569"
        firstnameTextError.textContent = ''
    }

    if (!lastnameRegexTest)
    {
        errorCount++
        lastnameInputBorder.style.borderBottomColor = "red"
        if (lastnameInput.length < 2)
            lastnameTextError.textContent = "Veuillez renseigner un nom de 2 lettres minimum."
        else
            lastnameTextError.textContent = "Veuillez entrer un nom valide. Il ne doit contenir que des lettres et doit commencer par une majuscule."
    }
    else
    {
        lastnameInputBorder.style.borderBottomColor = "#0a4569"
        lastnameTextError.textContent = ''
    }

    if (!usernameRegexTest)
    {
        errorCount++
        usernameInputBorder.style.borderBottomColor = "red"
        if (usernameInput.length < 3)
            usernameTextError.textContent = "Veuillez renseigner un nom d'utilisateur de 3 lettres minimum."
        else
            usernameTextError.textContent = "Le nom d'utilisateur ne doit contenir que des lettres, des chiffres, des - ou des _."
    }
    else
    {
        const formData = new FormData()
        formData.append("username", usernameInput)

        const xhr = new XMLHttpRequest()
        const url = "../../scripts/signup/validation/usernameValidation.php"

        xhr.open("POST", url, true)
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = xhr.responseText
                // console.log(response)
                if (response.includes("already exists")) {
                    usernameInputBorder.style.borderBottomColor = "red"
                    usernameTextError.textContent = "Cet utilisateur existe déjà."
                }
                else if (response.includes("is available")) {
                    usernameInputBorder.style.borderBottomColor = "#0a4569"
                    usernameTextError.textContent = ''
                }
            }
            else 
                console.error("Erreur lors de la requête AJAX")
        }
        xhr.send(formData)
    }

    if (!passwordRegexTest)
    {
        errorCount++
        passwordInputBorder.style.borderBottomColor = "red"
        if (passwordInput.length == 0)
            passwordTextError.textContent = "Veuillez entrer un mot de passe."
        else if (passwordInput.length < 8 || passwordInput.length > 24)
            passwordTextError.textContent = "Le mot de passe doit contenir entre 8 et 24 caractères."
        else
            passwordTextError.textContent = "Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre et un de ces symboles : -_.,!*$?"
    }
    else
    {
        passwordInputBorder.style.borderBottomColor = "#0a4569"
        passwordTextError.textContent = ''
    }

    if (passwordConfirmationTest != 0)
    {
        errorCount++
        passwordConfirmationInputBorder.style.borderBottomColor = "red"
        if (passwordConfirmationInput.length == 0)
            passwordConfirmationTextError.textContent = "Veuillez confirmer votre mot de passe."
        else
            passwordConfirmationTextError.textContent = "Les mots de passe ne correspondent pas."
    }
    else
    {
        passwordConfirmationInputBorder.style.borderBottomColor = "#0a4569"
        passwordConfirmationTextError.textContent = ''
    }

    if (!errorCount)
    {
        hideModule('second-form')
        showModule('third-form')
    }
}