<div class="fieldset-final" id="final-form">
    <h3>Vos informations</h3>
    <div class="edit-info">
        <i class="fa-solid fa-pen-to-square" onclick="hideModule('final-form'); showModule('first-form');"></i>
    </div>
    <div class="info end">
        <p>EMAIL</p>
        <p id="show-email"></p>
    </div>
    <div class="edit-info">
        <i class="fa-solid fa-pen-to-square" onclick="hideModule('final-form'); showModule('second-form');"></i>
    </div>
    <div class="info">
        <p>PRÉNOM</p>
        <p id="show-firstname"></p>
    </div>
    <div class="info">
        <p>NOM</p>
        <p id="show-lastname"></p>
    </div>
    <div class="info end">
        <p>NOM D'UTILISATEUR</p>
        <p id="show-username"></p>
    </div>
    <div class="edit-info">
        <i class="fa-solid fa-pen-to-square" onclick="hideModule('final-form'); showModule('third-form');"></i>
    </div>
    <div class="info">
        <p>GENRE</p>
        <p id="show-gender"></p>
    </div>
    <div class="info">
        <p>ÂGE</p>
        <p id="show-age"></p>
    </div>
    <div class="info">
        <p>PAYS</p>
        <p id="show-country"></p>
    </div>
    <div class="info end">
        <p>USAGE</p>
        <p id="show-use"></p>
    </div>
    <div class="newsletter-button-container">
        <input type="checkbox" name="newsletter" id="newsletter">
        <label for="newsletter">Je souhaite souscrire à la newsletter.</label>
    </div>
    <div class="button-container">
        <form class="signup-form">
            <button class="finish" type="submit">S'inscrire</button>
        </form>
    </div>
</div>