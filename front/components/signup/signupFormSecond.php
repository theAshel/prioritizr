<script src="../../scripts/signup/validation/secondFormValidation.js"></script>
<div class="fieldset" id="second-form">
    <div class="title">
        <i class="fa-solid fa-arrow-left" onclick="hideModule('second-form'); showModule('first-form');"></i>
        <h3>Créez votre compte</h3>
    </div>
    <form method="POST" class="signup-form">
        <div class="input first-input" id="firstname-input">
            <div>
                <label for="firstname">PRÉNOM</label>
            </div>
            <div>
                <input type="text" name="firstname" id="firstname" autofocus>
            </div>
        </div>
        <p class="invalid-input" id="invalid-firstname"></p>
        <div class="input" id="lastname-input">
            <div>
                <label for="lastname">NOM</label>
            </div>
            <div>
                <input type="text" name="lastname" id="lastname">
            </div>
        </div>
        <p class="invalid-input" id="invalid-lastname"></p>
        <div class="input" id="username-input">
            <div>
                <label for="username">NOM D'UTILISATEUR</label>
            </div>
            <div>
                <input type="text" name="username" id="username">
            </div>
        </div>
        <p class="invalid-input" id="invalid-username"></p>
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
        <div class="input last-input" id="passwordConfirmation-input">
            <div>
                <label for="passwordConfirmation">CONFIRMEZ VOTRE MOT DE PASSE</label>
            </div>
            <div class="container-password">
                <input type="password" name="passwordConfirmation" id="passwordConfirmation" class="password">
                <div class="eye-icon">
                    <i class="fa-solid fa-eye"></i>
                </div>
            </div>
        </div>
        <p class="invalid-input" id="invalid-passwordConfirmation"></p>
        <div class="button-container">
            <button type="submit" class="continue" id="second-continue-button">Continuer</button>
        </div>
    </form>
</div>
<script src="../../style/components/signup/showPassword.js"></script>