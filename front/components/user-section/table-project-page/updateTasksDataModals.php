<?php
foreach ($tasks as $task): ?>
<?php require "../../scripts/user-section/tasks/getSubtasks.php" ?> 
<dialog class="update-task-data-modal" id="dialog-<?php echo $task["task_index"] ?>">
    <div class="update-task-dialog-header">
        <div>
            <i class="fa-solid fa-xmark close"></i>
        </div>
        <h3><?php echo (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])) ? "Modifier" : "Consulter" ?> les infos de la tâche</h3>
    </div>
    <p class="task-creator-username">Tâche crée par : <span style="color: #2541bd"><?php echo $task["task_creator"] ?></span></p>
    <form id="update-task-form">
        <div class="dialog-input" id="update-task-name-input-container-<?php echo $task["task_index"] ?>">
            <div>
                <label for="update-task-name-input-<?php echo $task["task_index"] ?>">Nom de la tâche:<span style="color:red"> *</span></label>
            </div>
            <div>
                <?php
                if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])):?>
                    <input type="text" spellcheck="false" name="update-task-name" id="update-task-name-input-<?php echo $task["task_index"] ?>" value="<?php echo $task["task_name"] ?>">
                <?php else: ?>
                    <p class="readonly-info"><?php echo $task["task_name"] ?></p>
                <?php endif; ?>
            </div>
        </div>
        <p class="invalid-input" id="invalid-updated-task-name-<?php echo $task["task_index"] ?>"></p>
        <div class="second-input-field">
            <div>
                <div class="dialog-input">
                    <div>
                        <label for="update-task-priority-input-<?php echo $task["task_index"] ?>">Priorité:</label>
                    </div>
                    <div>
                        <?php
                        if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])):?>
                            <select name="update-task-priority" id="update-task-priority-input-<?php echo $task["task_index"] ?>">
                                <option value="secondary" <?php if ($task["priority"] === 'secondary') echo 'selected' ?>>Secondaire</option>
                                <option value="not-important" <?php if ($task["priority"] === 'not-important') echo 'selected' ?>>Peu important</option>
                                <option value="important" <?php if ($task["priority"] === 'important') echo 'selected' ?>>Important</option>
                                <option value="very-important" <?php if ($task["priority"] === 'very-important') echo 'selected' ?>>Très important</option>
                            </select>
                        <?php else: ?>
                            <p class="readonly-info">
                            <?php 
                            switch($task["priority"]) {
                                case "secondary":
                                    echo "Secondaire";
                                    break;
                                case "not-important":
                                    echo "Peu important";
                                    break;
                                case "important":
                                    echo "Important";
                                    break;
                                case "very-important":
                                    echo "Très important";
                                    break;
                            } ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div>
                <div class="dialog-input">
                    <div>
                        <label for="update-task-difficulty-input-<?php echo $task["task_index"] ?>">Difficulté:</label>
                    </div>
                    <div>
                        <?php
                        if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])):?>
                            <select name="update-task-difficulty" id="update-task-difficulty-input-<?php echo $task["task_index"] ?>">
                                <option value="very-easy" <?php if ($task["difficulty"] === 'very-easy') echo 'selected' ?>>Très facile</option>
                                <option value="easy" <?php if ($task["difficulty"] === 'easy') echo 'selected' ?>>Facile</option>
                                <option value="intermediate" <?php if ($task["difficulty"] === 'intermediate') echo 'selected' ?>>Intermédiaire</option>
                                <option value="hard" <?php if ($task["difficulty"] === 'hard') echo 'selected' ?>>Difficile</option>
                                <option value="very-hard" <?php if ($task["difficulty"] === 'very-hard') echo 'selected' ?>>Très difficile</option>
                            </select>
                        <?php else: ?>
                        <p class="readonly-info">
                        <?php 
                            switch($task["difficulty"]) {
                                case "very-easy":
                                    echo "Très facile";
                                    break;
                                case "easy":
                                    echo "Facile";
                                    break;
                                case "intermediate":
                                    echo "Intermédiaire";
                                    break;
                                case "hard":
                                    echo "Difficile";
                                    break;
                                case "very-hard":
                                    echo "Très difficile";
                                    break;
                            } ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="show-subtasks-section">
            <h5>Sous-tâches:<?php if ($numberOfSubtasks && (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"]))): ?> 
                <span style="font-size: 14px">(cochez pour supprimer une sous-tâche)</span><?php endif; ?>
            </h5>
            <?php if (!$numberOfSubtasks): ?>
            <p>Il n'y a aucune sous-tâche.</p>
            <?php else:
            foreach ($subtasks as $subtask): ?>
            <div class="subtask-to-delete-container">
                <label for="delete-subtask-<?php echo $subtask["id"]?>"><?php echo $subtask["subtask_name"]?></label>
                <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])):?>
                    <input type="checkbox" class="delete-subtask-checkbox" id="delete-subtask-<?php echo $subtask["id"]?>">
                <?php endif ?>
            </div>
            <?php endforeach ?>
            <?php endif; ?>
        </div>
        <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])):?>
            <div class="add-subtask-section">
                <h5>Ajoutez des sous-tâches:</h5>
                <div class="add-subtask-input-container">
                    <input type="text" spellcheck="false" class="add-subtask-input" placeholder="Entrez le nom de la sous-tâche">
                    <p class="add-subtask-btn">+ Ajouter</p>
                </div>
                <div class="subtask-to-add-container" id="subtask-to-add-container-<?php echo $task["task_index"] ?>"></div>
            </div>
            <div class="dialog-search-bar-input">
                <div>
                    <label for="update-task-search-bar-<?php echo $task["task_index"] ?>">Assignez une personne ou un groupe à la tâche:</label>
                </div>
                <div class="search-bar-container">
                    <input type="text" spellcheck="false" name="dialog-task-search-bar" class="update-task-search-bar" id="update-task-search-bar-<?php echo $task["task_index"] ?>" placeholder="Recherchez un utilisateur ou un groupe">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="search-update-attribute-task-user-results-container" id="search-update-attribute-task-<?php echo $task["task_index"] ?>-user-results-container"></div>
                <div class="update-task-user-to-attribute-container" id="update-task-<?php echo $task["task_index"] ?>-user-to-attribute-container">
                    <?php if ($task["task_responsible"]): ?>
                        <p id="update-task-<?php echo $task["task_index"] ?>-responsible"><?php echo $task["task_responsible"] ?></p>
                        <i class="fa-solid fa-xmark" id="remove-update-user-to-attribute-button-<?php echo $task["task_index"] ?>"></i>
                    <?php endif;?>
                </div>
            </div>
        <?php endif; ?>
        <div class="update-task-description">
            <div>
                <label for="update-task-description-input-<?php echo $task["task_index"] ?>"><?php echo (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])) ? "Modfiez la d" : "D" ?>escription:</label>
            </div>
            <div>
                <textarea name="task-description" spellcheck="false" id="update-task-description-input-<?php echo $task["task_index"] ?>"
                 <?php echo (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])) ? "" : "readonly" ?>><?php echo $task["description"] ?></textarea>
            </div>
        </div>
        <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])):?>
            <div class="valid-task-update-button-container">
                <button type="button" class="valid-task-update" id="update-task-button-<?php echo $task["task_index"] ?>">Modifiez les informations</button>
            </div>
        <?php endif; ?>
    </form>
</dialog>
<?php endforeach; ?>

<script src="../../scripts/user-section/openEditTaskDataModal.js"></script>
<?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])):?>
    <script src="../../scripts/user-section/tasks/addSubTask.js"></script>
    <script src="../../scripts/user-section/tasks/task-user/updateAttributeTaskUserSearchBar.js"></script>
    <script src="../../scripts/user-section/tasks/verifyUpdatedTaskData.js"></script>
<?php endif; ?>
