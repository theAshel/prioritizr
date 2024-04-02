<div class="fieldset">
    <h3>Connexion</h3>
    <form id="login-form" method="POST">
        <div class="input" id="identifier-input">
            <div>
                <label for="identifier">NOM D'UTILISATEUR</label>
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
            <div>
                <input type="password" name="password" id="password">
            </div>
        </div>
        <p class="invalid-input" id="invalid-password"></p>
        <div class="button-container">
            <button class="connection" type="submit">Se connecter</button>
        </div>
    </form>
</div>
<script src="./loginForm.js"></script>