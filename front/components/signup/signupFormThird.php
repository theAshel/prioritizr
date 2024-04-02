<?php

require "../../library/countries.php";

$countries = getCountries();

?>
<script src="../../scripts/signup/validation/thirdFormValidation.js"></script>
<div class="fieldset" id="third-form">
    <i class="fa-solid fa-arrow-left" onclick="hideModule('third-form'); showModule('second-form');"></i>
    <h3>Parlez-nous de vous</h3>
    <form method="POST" class="signup-form">
        <div class="input first-input" id="gender-input">
            <div>
                <label for="gender">Quel est votre genre ?</label>
            </div>
            <div class="custom-select">
                <select name="gender" id="gender">
                    <option value="" selected disabled>-- Veuillez sélectionner une valeur --</option>
                    <option value="male">Homme</option>
                    <option value="female">Femme</option>
                    <option value="other">Autre</option>
                </select>
            </div>
        </div>
        <p class="invalid-input" id="invalid-gender"></p>
        <div class="input" id="age-input">
            <div>
                <label for="age">Quel âge avez-vous ?</label>
            </div>
            <div>
                <input type="text" name="age" id="age">
            </div>
        </div>
        <p class="invalid-input" id="invalid-age"></p>
        <div class="input" id="country-input">
            <div>
                <label for="country">De quel pays venez-vous ?</label>
            </div>
            <div class="custom-select">
                <select name="country" id="country">
                    <option value="" selected disabled>-- Veuillez sélectionner un pays --</option>
                    <?php foreach ($countries as $country): ?>
                    <option value="<?php echo $country["value"]; ?>"><?php echo $country["text"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <p class="invalid-input" id="invalid-country"></p>
        <div class="input choice" id="choice-input">
            <div>
                <p class="cadre">Dans quel cadre utiliserez-vous Prioritizr ?<p>
            </div>
            <div class="radio-container1">
                <input type="radio" name="type-of-use" id="professional" value="professional">
                <label for="professional" class="type-of-use">Pour un usage professionnel</label>
            </div>
            <div class="radio-container2">
                <input type="radio" name="type-of-use" id="student" value="student">
                <label for="student" class="type-of-use">Pour mes études</label>
            </div>
            <div class="radio-container3">
                <input type="radio" name="type-of-use" id="personal" value="personal">
                <label for="personal" class="type-of-use">Pour un usage personnel</label>
            </div>
        </div>
        <p class="invalid-input" id="invalid-choice"></p>
        <div class="button-container">
            <button type="submit" class="continue">Continuer</button>
        </div>
    </form>
</div>