function validFirstForm()
{
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    const emailInput = document.getElementById('email').value
    const emailRegexTest = emailRegex.test(emailInput)
    const emailTextError = document.getElementById('invalid-email')
    const border = document.getElementById('email-input')

    if (!emailRegexTest)
    {
        border.style.borderBottomColor = "red"
        if (emailInput.length == 0)
            emailTextError.textContent = "Une adresse mail est obligatoire."
        else
            emailTextError.textContent = "Cette adresse mail n'est pas valide."
    }
    else
    {
        const formData = new FormData()
        formData.append("mail", emailInput)

        const xhr = new XMLHttpRequest()
        const url = "../../scripts/signup/validation/emailValidation.php"

        xhr.open("POST", url, true)
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = xhr.responseText
                // console.log(response)
                if (response.includes("already exists")) {
                    border.style.borderBottomColor = "red"
                    emailTextError.textContent = "Cette adresse mail est déjà reliée à un compte."
                }
                else if (response.includes("is available")) {
                    border.style.borderBottomColor = "#0a4569"
                    emailTextError.textContent = ''
                    hideModule('first-form')
                    showModule('second-form')
                }
            }
            else 
                console.error("Erreur lors de la requête AJAX")
        }
        xhr.send(formData)
    }
}