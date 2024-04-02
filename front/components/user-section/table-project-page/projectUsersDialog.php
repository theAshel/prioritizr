<dialog id="project-users-dialog">
    <div class="project-users-dialog-header">
        <div>
            <i class="fa-solid fa-xmark" id="close-project-users-dialog"></i>
        </div>
        <h3>Utilisateurs du projet</h3>
    </div>
    <form id="manage-users-form">
    <div class="show-users-section">
        <h5>Utilisateurs:</h5>
        <div class="users-to-delete-container">
            <?php
            for ($i = 1; $i <= 4; $i++):?>
                <div id="role-<?php echo $i ?>-section">
                    <h5 class="user-role<?php echo $i != 1 ? ' not-owner' : ''?>"><?php
                    switch($i) {
                        case 1:
                            echo 'Propriétaire';
                            break;
                        case 2:
                            echo 'Associé(s)';
                            break;
                        case 3:
                            echo 'Participant(s)';
                            break;
                        case 4:
                            echo 'Lecteur(s)';
                            break;
                    }?></h5>
                    <?php
                    if (isset($sortedProjectUsers[$i])):
                        foreach ($sortedProjectUsers[$i] as $user): ?>
                            <div id="user-<?php echo $user["id_user"] ?>-container">
                                <div class="other-users-to-delete-container">
                                    <p class="project-user" id="user-<?php echo $user["id_user"] ?>"><?php echo $user["username"]?></p>
                                    <?php if ($i !== 1 || $user["username"] != $_SESSION["username"]): ?>
                                        <?php if ($userRights <= 2): ?>
                                            <i id="remove-user-<?php echo $user["id_user"] ?>-button" class="fa-solid fa-xmark delete-user-button"></i>
                                        <?php endif ?>
                                    <?php endif ?>
                                </div>
                                <div class="edit-role-section" id="edit-user-<?php echo $user["id_user"] ?>-role-section">
                                    <select name="edit-user-role" id="current-user-<?php echo $user["id_user"] ?>-role">
                                        <option value="2" <?php echo $i == 2 ? 'selected' : ''?>>Associé</option>
                                        <option value="3" <?php echo $i == 3 ? 'selected' : ''?>>Participant</option>
                                        <option value="4" <?php echo $i == 4 ? 'selected' : ''?>>Lecteur</option>
                                    </select>
                                    <p id="edit-user-<?php echo $user["id_user"] ?>-role-section" class="edit-role-button">Modifier le rôle</p>
                                </div>
                            </div>
                        <?php
                        endforeach;
                    endif;?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <?php if ($userRights <= 2): ?>
        <div class="add-users-section">
            <h5>Ajoutez des utilisateurs:</h5>
            <div class="search-bar-section">
                <div class="search-bar-container">
                    <input spellcheck="false" type="text" name="dialog-task-search-bar" id="user-search-bar" placeholder="Recherchez un utilisateur ou un groupe">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div id="user-search-bar-results-container">
                </div>
            </div>
            <div id="users-to-add-container"></div>
        </div>  
    <div class="manage-users-button-container">
        <button type="button" id="valid-manage-users">Ajouter</button>
    </div>
    <?php endif; ?>
    </form>
</dialog>

<script src="../../scripts/user-section/openProjectUsersDialog.js"></script>
<script src="../../scripts/user-section/user-search-bar/showUsersResults.js"></script>
<?php if ($userRights <= 2): ?>
    <script src="../../scripts/user-section/user-search-bar/addUser.js"></script>
    <script src="../../scripts/user-section/user-search-bar/getUsersToAdd.js"></script>
    <script src="../../scripts/user-section/projects/deleteUsersProject.js"></script>
    <script src="../../scripts/user-section/projects/editUserRole.js"></script>
<?php endif ?>