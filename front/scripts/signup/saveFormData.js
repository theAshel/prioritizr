
const register = document.getElementsByClassName('signup-form');

var mail
var firstname, lastname, username, password, passwordConfirmation
var age
var genderList, gender, genderName, showGender
var countryList, country, countryName, showCountry
var radioButtons, use_type, showUse
var rows = 3;
var columns = 3;

var currTile;
var otherTile; //blank tile

var turns = 0;
var captchaValidate = false;
var imgOrder = shuffleArray(["1", "2", "3", "4", "5", "6", "7", "8", "9"]);

function validateSignup() {
    if (mail && firstname && lastname && username && password && gender && age && country && use_type) {

        const newsletterButton = document.getElementById('newsletter')
        var newsletter
        if (newsletterButton.checked)
            newsletter = 1
        else
            newsletter = 0

        const formData = new FormData()
        formData.append("mail", mail)
        formData.append("firstname", firstname)
        formData.append("lastname", lastname)
        formData.append("username", username)
        formData.append("password", password)
        formData.append("gender", gender)
        formData.append("age", age)
        formData.append("country", country)
        formData.append("use_type", use_type)
        formData.append("newsletter", newsletter)

        const xhr = new XMLHttpRequest()
        const url = "../../scripts/signup/postData.php"

        xhr.open("POST", url, true)
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = xhr.responseText
                // console.log(response)
                window.location.href = "../user-section/homePage.php"
            }
            else
                console.error("Erreur lors de la requête AJAX")
        }
        xhr.send(formData)
    }
}

function displayCaptcha() {
    for (let r = 0; r < rows; r++) {
        for (let c = 0; c < columns; c++) {

            let tile = document.createElement("img");
            tile.id = r.toString() + "-" + c.toString();
            tile.src = "../../components/signup/puzzle/" + imgOrder.shift() + ".jpg";

            tile.addEventListener("dragstart", dragStart);
            tile.addEventListener("dragover", dragOver);
            tile.addEventListener("dragenter", dragEnter);
            tile.addEventListener("dragleave", dragLeave);
            tile.addEventListener("drop", dragDrop);
            tile.addEventListener("dragend", dragEnd);

            document.getElementById("board").append(tile);
        }
    }
}

function dragStart(e) {
    currTile = this;
    e.dataTransfer.setData("text/plain", this.id);
}

function dragOver(e) {
    e.preventDefault();
}

function dragEnter(e) {
    e.preventDefault();
}

function dragLeave() {

}

function dragDrop(e) {
    otherTile = this;
    var currId = e.dataTransfer.getData("text/plain");
    var currImg = document.getElementById(currId).src;
    var otherImg = otherTile.src;

    currTile.src = otherImg;
    otherTile.src = currImg;

    // Vérification de l'ordre des tuiles
    var tileOrder = [];
    var correctOrder = ["1", "2", "3", "4", "5", "6", "7", "8", "9"];
    var tiles = document.querySelectorAll("img");
    tiles.forEach(function (tile) {
        var tileSrc = tile.src.split("/").pop();
        var tileNumber = tileSrc.split(".")[0];
        if (correctOrder.includes(tileNumber)) {
            tileOrder.push(tileNumber);
        }
    });

    if (JSON.stringify(tileOrder) === JSON.stringify(correctOrder)) {
        // Ordre correct, captcha validé
        validateSignup();
    }
}

function dragEnd() {

}

function shuffleArray(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (currentIndex !== 0) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}




for (let i = 0; i < register.length; i++) {
    register[i].addEventListener('submit', function (event) {
        event.preventDefault()
    })
    if (i == 0) {
        register[i].addEventListener('submit', function () {
            mail = document.getElementById('email').value

            validFirstForm()
        })
    }
    else if (i == 1) {
        register[i].addEventListener('submit', function () {
            firstname = document.getElementById('firstname').value
            lastname = document.getElementById('lastname').value
            username = document.getElementById('username').value
            password = document.getElementById('password').value
            passwordConfirmation = document.getElementById('passwordConfirmation').value

            validSecondForm()
        })
    }
    else if (i == 2) {
        register[i].addEventListener('submit', function () {
            age = parseInt(document.getElementById('age').value)
            genderList = document.getElementById('gender')
            gender = genderList.value
            genderName = genderList.options[genderList.selectedIndex]
            showGender = genderName.textContent

            countryList = document.getElementById('country')
            country = countryList.value
            countryName = countryList.options[countryList.selectedIndex]
            showCountry = countryName.textContent

            radioButtons = document.getElementsByName('type-of-use')

            for (var i = 0; i < radioButtons.length; i++) {
                if (radioButtons[i].checked) {
                    use_type = radioButtons[i].value
                    break
                }
            }

            switch (use_type) {
                case 'professional':
                    showUse = 'Pour un usage professionnel';
                    break;
                case 'student':
                    showUse = 'Pour mes études';
                    break;
                case 'personal':
                    showUse = 'Pour un usage personnel';
                    break;
            }

            document.getElementById('show-email').textContent = mail
            document.getElementById('show-firstname').textContent = firstname
            document.getElementById('show-lastname').textContent = lastname
            document.getElementById('show-username').textContent = username
            document.getElementById('show-gender').textContent = showGender
            document.getElementById('show-age').textContent = age
            document.getElementById('show-country').textContent = showCountry
            document.getElementById('show-use').textContent = showUse

            validThirdForm()
        })
    }
    else {
        register[i].addEventListener('submit', function (event) {
            event.preventDefault();
            const captchaDialog = document.getElementById("captcha_dialog");
            captchaDialog.showModal();

            const submitButton = document.getElementById("register-button");
            submitButton.addEventListener('click', displayCaptcha);
        })
    }
}