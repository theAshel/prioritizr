<dialog id="create-project-dialog">
    <div class="create-project-dialog-header">
        <div>
            <i class="fa-solid fa-xmark" id="close-project-dialog"></i>
        </div>
        <h3>Créer un projet</h3>
    </div>
    <form id="create-project-form">
        <div class="dialog-input">
            <div>
                <label for="create-project-title-input">Titre du projet<span style="color:red"> *</span></label>
            </div>
            <div>
                <input type="text" name="create-project-name" id="create-project-title-input">
            </div>
        </div>
        <p class="invalid-input" id="invalid-title"></p>
        <!-- <div class="choose-model">
            <h5>Modèle <span style="color:red">*</span></h5>
            <div class="buttons-container">
                <input type="radio" name="model-type" id="model-table" value="table">
                <label for="model-table">
                    <div class="model-button" id="dialog-table-model">
                        <div class="color" style="background: red"></div>
                        <div class="model-name">
                            <p>Modèle tableau</p>
                        </div>
                    </div>
                </label>
                <input type="radio" name="model-type" id="model-notepad" value="notepad">
                <label for="model-notepad">
                    <div class="model-button" id="dialog-notepad-model">
                        <div class="color" style="background: green"></div>
                        <div class="model-name">
                            <p>Bloc-notes</p>
                        </div>
                    </div>
                </label>
            </div>
        </div>
        <p class="invalid-input" id="invalid-model"></p> -->
        <div class="dialog-search-bar-input">
            <div>
                <label for="dialog-project-search-bar">Ajoutez un/des utilisateur(s) <span>(optionnel)</span>:</label>
            </div>
            <div class="search-bar-container">
                <input type="text" name="dialog-project-search-bar" id="dialog-project-search-bar" placeholder="Recherchez un utilisateur ou un groupe">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        <div id="valid-project-creation-button-container">
            <button type="button" id="valid-project-creation">Créer le projet</button>
        </div>
    </form>
</dialog>

<script src="../../scripts/user-section/openCreateProjectDialog.js"></script>
<script src="../../scripts/user-section/projects/verifyProjectData.js"></script>