<dialog class="delete-project-dialog" id="delete-project-<?php echo $projectData["id"]?>-dialog">
    <h3>Voulez-vous vraiment supprimer ce projet ?</h3>
    <div>
        <button type="button" class="delete-project-button" id="delete-project-<?php echo $projectData["id"]?>-button">Supprimer le projet</button>
        <p class="close-delete-project-dialog-button" id="cancel-project-<?php echo $projectData["id"]?>-delete">Annuler</p>
    </div>
</dialog>

<script src="../../scripts/user-section/openDeleteProjectDialog.js"></script>
