const openProfileDialogButton = document.getElementsByClassName("profile-dialog-popup");
const closeButton = document.getElementById('close-button');
const profileDialog = document.getElementById('profile-dialog');
const saveButton = document.getElementById('save-button');
const url = "../../scripts/signup/validation/emailValidation.php";
const url_username = "../../scripts/signup/validation/usernameValidation.php";
const emailTextError = document.getElementById('invalid-email');
const border = document.getElementById('mail-input');
const usernameTextError = document.getElementById('invalid-username');
const usernameInputBorder = document.getElementById('username-input');

let originalMail = document.getElementById('mail-input').value;
let originalUser = document.getElementById('username-input').value;

openProfileDialogButton[0].addEventListener('click', () => {
    // Réinitialiser originalMail avec la valeur actuelle du mail
    originalMail = document.getElementById('mail-input').value;
    originalUser = document.getElementById('username-input').value;
    profileDialog.showModal();
});

closeButton.addEventListener('click', () => {
    profileDialog.close();
});


saveButton.addEventListener('click', () => {
    const mailInput = document.getElementById('mail-input').value;
    const firstnameInput = document.getElementById('firstname-input').value;
    const lastnameInput = document.getElementById('lastname-input').value;
    const usernameInput = document.getElementById('username-input').value;

    const formData = new FormData();
    formData.append('mail', mailInput);
    formData.append('firstname', firstnameInput);
    formData.append('lastname', lastnameInput);
    formData.append('username', usernameInput);

    if (
        mailInput !== originalMail ||
        usernameInput !== originalUser
    ) {
        Promise.all([
            fetch(url, {
                method: 'POST',
                body: formData
            }).then(response => response.text()),
            fetch(url_username, {
                method: 'POST',
                body: formData
            }).then(response => response.text())
        ])
            .then(([dataEmail, dataUsername]) => {

                if (dataEmail === 'already exists' && originalMail !== mailInput) {
                    console.log(dataEmail);
                    console.log(originalMail);
                    border.style.borderBottomColor = "red";
                    emailTextError.textContent = "Cette adresse e-mail est déjà reliée à un compte.";
                    usernameInputBorder.style.borderBottomColor = "";
                    usernameTextError.textContent = "";
                } else if (dataEmail === 'is available' || originalMail === mailInput) {
                    if (dataUsername === 'already exists' && originalUser !== usernameInput) {
                        console.log(dataUsername);
                        console.log(originalUser);
                        border.style.borderBottomColor = "";
                        emailTextError.textContent = "";
                        usernameInputBorder.style.borderBottomColor = "red";
                        usernameTextError.textContent = "Cet utilisateur existe déjà.";
                    } else if (dataUsername === 'is available' || originalUser === usernameInput) {
                        updateProfile(mailInput, firstnameInput, usernameInput, lastnameInput);
                        border.style.borderBottomColor = "";
                        emailTextError.textContent = "";
                        usernameInputBorder.style.borderBottomColor = "";
                        usernameTextError.textContent = "";
                    }
                }
            })
            .catch(error => {
                console.error('Erreur lors des requêtes fetch:', error);
            });
    } else {
        profileDialog.close();
    }
});

function updateProfile(mailInput, firstnameInput, usernameInput, lastnameInput) {
    const updatedFormData = new FormData();
    updatedFormData.append('mail', mailInput);
    updatedFormData.append('firstname', firstnameInput);
    updatedFormData.append('lastname', lastnameInput);
    updatedFormData.append('username', usernameInput);
    fetch('../../scripts/user-section/updateProfile.php', {
        method: 'POST',
        body: updatedFormData
    })
        .then(response => response.text())
        .then(data => {
            // Traitez la réponse de la requête ici
            if (data === 'success') {
                // Mise à jour réussie, mettre à jour les valeurs affichées dans les champs de saisie
                console.log("lets gooo");
                document.getElementById('mail-input').value = mailInput;
                document.getElementById('firstname-input').value = firstnameInput;
                document.getElementById('lastname-input').value = lastnameInput;
                document.getElementById('username-input').value = usernameInput;
                profileDialog.close();
                //  location.reload();
                // Mettre à jour les variables de session avec les nouvelles valeurs
            }
        })
        .catch(error => {
            // Gérez les erreurs de la requête ici
            console.error('Erreur lors de la requête fetch:', error);
        });
}