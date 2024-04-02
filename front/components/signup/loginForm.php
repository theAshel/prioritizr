<div class="fieldset">
    <h3>Connexion</h3>
    <form id="login-form" method="POST" action="../../scripts/login/checkLoginData.php">
        <div class="input" id="identifier-input">
            <div>
                <label for="identifier">EMAIL OU NOM D'UTILISATEUR</label>
            </div>
            <div>
                <input type="text" name="identifier" id="identifier">
            </div>
        </div>
        <p class="invalid-input" id="invalid-identifier"></p>
        <div class="input" id="password-input">
            <div>
                <label for="password">MOT DE PASSE</label>
            </div>
            <div class="container-password">
                <input type="password" name="password" id="password" class="password">
                <div class="eye-icon">
                    <i class="fa-solid fa-eye"></i>
                </div>
            </div>
        </div>
        <p class="invalid-input" id="invalid-password"></p>
        <div class="button-container">
            <button class="connection" type="submit">Se connecter</button>
        </div>
    </form>
    <h5>OU</h5>
    <div class="button-container">
        <button class="connection-with-google" type="submit">
            <span class="google-btn">
                <img src="../../icon/google_icon.png" alt="google icon" id="google-icon">
                Continuer avec Google
            </span>
        </button>
    </div>
    <p>Vous n'avez pas de compte ? <span class="hyperlink-text"><a href="signup.php">Inscrivez-vous ici.</a></span></p>
</div>
<script src="../../scripts/login/getLoginData.js"></script>
<script src="../../style/components/signup/showPassword.js"></script>