<dialog id="profile-dialog">
    <div class="profile-dialog-content">
        <h3>Modifier le profil</h3>
        <div class="form-group">
            <label for="mail-input">Email:</label>
            <input type="text" id="mail-input" placeholder="Email" required value="<?php echo $_SESSION['mail']; ?>">
        </div>
        <p class="invalid-input" id="invalid-email"></p>
        <div class="form-group">
            <label for="firstname-input">Prénom:</label>
            <input type="text" id="firstname-input" placeholder="Prénom" required value="<?php echo $_SESSION['firstname']; ?>">
        </div>
        <div class="form-group">
            <label for="lastname-input">Nom:</label>
            <input type="text" id="lastname-input" placeholder="Nom" required value="<?php echo $_SESSION['lastname']; ?>">
        </div>
        <div class="form-group">
            <label for="username-input">Username:</label>
            <input type="text" id="username-input" placeholder="Username" required value="<?php echo $_SESSION['username']; ?>">
        </div>
        <p class="invalid-input" id="invalid-username"></p>
        <a href="../../scripts/user-section/export_pdf.php" target="_blank"><div class="buttons-container">
            <button id="export-pdf">Obtenir ses données</button></a>
        </div>
        <div class="buttons-container">
            <button id="save-button">Save</button>
            <button id="close-button">Close</button>
        </div>
    </div>
</dialog>

<script src="../../scripts/user-section/openProfileDialog.js"></script>
