function validThirdForm()
{
    var errorCount = 0

    const genderInput = document.getElementById('gender')
    const gender = genderInput.value
    const genderTextError = document.getElementById('invalid-gender')
    const genderInputBorder = document.getElementById('gender-input')

    const ageInput = document.getElementById('age').value
    const ageTest = Number.isInteger(Number(ageInput))
    const ageTextError = document.getElementById('invalid-age')
    const ageInputBorder = document.getElementById('age-input')

    const countryInput = document.getElementById('country')
    const country = countryInput.value
    const countryTextError = document.getElementById('invalid-country')
    const countryInputBorder = document.getElementById('country-input')

    const choiceTextError = document.getElementById('invalid-choice')

    if (!gender)
    {
        errorCount++
        genderInputBorder.style.borderBottomColor = "red"
        genderTextError.textContent = 'Sélectionnez une valeur.'
    }
    else
    {
        genderInputBorder.style.borderBottomColor = "#0a4569"
        genderTextError.textContent = ''
    }

    if (!ageInput)
    {
        errorCount++
        ageInputBorder.style.borderBottomColor = "red"
        ageTextError.textContent = 'Veuillez entrer votre âge.'
    }
    else if(!ageTest)
    {
        errorCount++
        ageInputBorder.style.borderBottomColor = "red"
        ageTextError.textContent = "Cette valeur n'est pas valide"
    }
    else if (ageInput < 13 || ageInput > 100)
    {
        errorCount++
        ageInputBorder.style.borderBottomColor = "red"
        ageTextError.textContent = "La valeur doit être comprise entre 13 et 100."
    }
    else
    {
        ageInputBorder.style.borderBottomColor = "#0a4569"
        ageTextError.textContent = ''
    }

    if (!country)
    {
        errorCount++
        countryInputBorder.style.borderBottomColor = "red"
        countryTextError.textContent = 'Sélectionnez un pays.'
    }
    else
    {
        countryInputBorder.style.borderBottomColor = "#0a4569"
        countryTextError.textContent = ''
    }

    const radioButtons = document.getElementsByName('type-of-use')
    var i;
    for (i = 0; i < radioButtons.length; i++)
    {
        if (radioButtons[i].checked)
            break
    }

    if (i == radioButtons.length)
    {
        errorCount++
        choiceTextError.textContent = 'Cochez une des options.'
    }
    else
        choiceTextError.textContent = ''

    if (!errorCount)
    {
        hideModule('third-form')
        showModule('final-form')
    }
}