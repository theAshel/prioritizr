<script src="../../scripts/signup/validation/firstFormValidation.js"></script>
<div class="fieldset" id="first-form">
    <h3>Créez votre compte</h3>
    <form method="POST" class="signup-form">
        <div class="input first-input last-input" id="email-input">
            <div>
                <label for="email">EMAIL</label>
            </div>
            <div>
                <input type="text" name="email" id="email" placeholder="Saisissez une adresse e-mail" autofocus>
            </div>
        </div>
        <p class="invalid-input" id="invalid-email"></p>
        <div class="button-container">
            <button type="submit" class="continue">Continuer</button>
        </div>
    </form>
    <p class="cgu">
        En cliquant sur le bouton Continuer ci-dessus, vous reconnaissez avoir lu, compris et accepté les 
        <span class="hyperlink-text"><a href="signup.php">Conditions générales</a></span> 
        et la <span class="hyperlink-text"><a href="signup.php">Politique de confidentialité</a></span> de Prioritizr.
    </p>
    <h5>OU</h5>
    <div class="button-container">
        <button class="connection-with-google">
            <span class="google-btn">
                <img src="../../icon/google_icon.png" alt="google icon" id="google-icon">
                Continuer avec Google
            </span>
        </button>
    </div>
    <p class="last-line">Vous avez déjà un compte ? <span class="hyperlink-text"><a href="login.php">Connectez-vous.</a></span></p>
</div>
