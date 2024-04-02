<dialog id="edit-project-dialog">
    <div class="edit-project-dialog-header">
        <div>
            <i class="fa-solid fa-xmark" id="close-edit-project-dialog"></i>
        </div>
        <h3>Modifiez les infos du projet</h3>
    </div>
    <form id="edit-project-form">
        <div class="edit-name-and-status-container">
            <div>
                <div class="edit-project-dialog-input">
                    <div>
                        <label for="edit-project-name-input">Nom du projet:</label>
                    </div>
                    <div>
                        <input spellcheck="false" type="text" name="edit-project-name" id="edit-project-name-input" value="<?php echo $projectData["project_name"] ?>">
                    </div>
                </div>
                <p class="invalid-input" id="invalid-updated-name"></p>
            </div>
            <div class="edit-project-dialog-input">
                <div>
                    <label for="edit-project-status-input">Statut du projet:</span></label>
                </div>
                <div>
                    <select name="edit-project-status" id="edit-project-status-input">
                        <option value="canceled" <?php if ($projectData["status"] === 'canceled') echo 'selected' ?>>Annulé</option>
                        <option value="in-progress" <?php if ($projectData["status"] === 'in-progress') echo 'selected' ?>>En cours</option>
                        <option value="completed" <?php if ($projectData["status"] === 'completed') echo 'selected' ?>>Terminé</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="edit-project-description">
            <div>
                <label for="edit-project-description-input">Modifiez la description:</label>
            </div>
            <div>
                <textarea spellcheck="false" name="project-description" id="edit-project-description-input"><?php echo $projectData["description"] ?></textarea>
            </div>
        </div>
        <div class="edit-project-button-container">
            <button type="button" id="valid-project-edit">Modifier les infos du projet</button>
        </div>
    </form>
</dialog>

<script src="../../scripts/user-section/openEditProjectDialog.js"></script>
<script src="../../scripts/user-section/projects/verifyUpdatedProjectData.js"></script>