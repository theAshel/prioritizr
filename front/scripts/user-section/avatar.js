const openAvatarDialogButton = document.getElementsByClassName("avatar-dialog-popup");
const avatarDialog = document.getElementById('avatar-dialog');
const closeButtons = document.getElementById('avatar-close');
const saveButtons = document.getElementById('avatar-save');
const avatarImage = document.getElementById('avatarimage');

openAvatarDialogButton[0].addEventListener('click', () => {

    avatarDialog.showModal();
});

closeButtons.addEventListener('click', () => {
    avatarDialog.close();
});

const gender = document.getElementById("gender");
const hair = document.getElementById("hair");
const eyes = document.getElementById("eyes");
const skin = document.getElementById("skin");
const mouth = document.getElementById("mouth");


saveButtons.addEventListener('click', saveAvatar);

function saveAvatar() {
    const genderAvatar = gender.value;
    const hairAvatar = hair.value;
    const eyesAvatar = eyes.value;
    const skinAvatar = skin.value;
    const mouthAvatar = mouth.value;

    // Créer une requête HTTP POST pour appeler le script changeAvatarInDb.php
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../scripts/user-section/changeAvatar.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Gérer la réponse du serveur ici (success ou error)
                const response = xhr.responseText;
                console.log("Server response:", response);
                if (response === "success") {
                    console.log("Avatar saved successfully.");

                    const genderavatar = gender.value
                    const hairavatar = hair.value
                    const eyesavatar = eyes.value
                    const skinavatar = skin.value
                    const mouthavatar = mouth.value

                    const imageprofil = document.getElementById("imageprofil")

                    imageprofil.removeAttribute('style')
                    imageprofil.setAttribute('style', "background-image: url('../../components/user-section/home-page/test_image.php?" + "gender=" + genderavatar + "&hair=" + hairavatar + "&eyes=" + eyesavatar + "&mouth=" + mouthavatar + "&skin=" + skinavatar + "');");
                    //gender=" + genderavatar + "&hair=" + hairavatar + "&eyes=" + eyesavatar + "&mouth=" + mouthavatar + "&skin=" + skinavatar
                    avatarDialog.close();

                } else {
                    console.log("Failed to save avatar.");
                }
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    // Envoyer les données de l'avatar dans la requête POST
    const params = "gender=" + encodeURIComponent(genderAvatar) + "&hair=" + encodeURIComponent(hairAvatar) + "&eyes=" + encodeURIComponent(eyesAvatar) + "&mouth=" + encodeURIComponent(mouthAvatar) + "&skin=" + encodeURIComponent(skinAvatar);
    console.log("Request params:", params);
    xhr.send(params);
}


gender.addEventListener('click', reloadavatar);
hair.addEventListener('click', reloadavatar);
eyes.addEventListener('click', reloadavatar);
skin.addEventListener('click', reloadavatar);
mouth.addEventListener('click', reloadavatar);


function reloadavatar() {
    const genderavatar = gender.value
    const hairavatar = hair.value
    const eyesavatar = eyes.value
    const skinavatar = skin.value
    const mouthavatar = mouth.value

    const avatarimage = document.getElementById("avatarimage")

    console.log(gender.value)

    avatarimage.removeAttribute('src')
    avatarimage.setAttribute('src', "../../components/user-section/home-page/test_image.php?gender=" + genderavatar + "&hair=" + hairavatar + "&eyes=" + eyesavatar + "&mouth=" + mouthavatar + "&skin=" + skinavatar);

}