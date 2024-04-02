<script src="../../scripts/user-section/tasks/dragAndDrop.js"></script>
<div class="container">
    <p><a href="./homepage.php"><i class="fa-solid fa-arrow-left"></i><span>Retourner à la page de projets</span></a></p>
    <main>
        <div id="project-actions-menu">
            <div id="project-title">
                <div class="<?php
                            switch ($projectData["status"]) {
                                case 'completed':
                                    echo "green";
                                    break;
                                case 'in-progress':
                                    echo "blue";
                                    break;
                                case 'canceled':
                                    echo "red";
                                    break;
                            }?> dot"></div>
                <h3><?php echo $projectData["project_name"] ?></h3>
                <?php if ($userRights <= 2):?>
                    <i class="fa-solid fa-pen-to-square" id="show-edit-project-modal"></i>
                <?php endif ?>
            </div>
            <p id="show-project-users-modal">Voir les utilisateurs</p>
            <?php if ($userRights != 4): ?>
                <p id ="create-task-popup-button">+ Ajouter une tâche</p>
            <?php endif; ?>
            <?php if ($userRights == 1): ?>
                <p class="delete-project-popup" id ="open-delete-project-<?php echo $projectData["id"]?>-dialog-button">Supprimer le projet</p>
            <?php endif; ?>
        </div>        
        <div id="table">
            <div class="column" id="unassigned" onDragStart="start(event)" onDragOver="return over(event)" onDrop="return drop(event)">
                <h5 class="task-status">Non assignée</h5>
                <?php foreach ($unassignedTasks as $task): ?>
                <?php require "../../scripts/user-section/tasks/getSubtasks.php" ?>
                <div class="task" id="<?php echo $task["task_index"]?>" <?php echo (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])) ? 'draggable="true"' : "" ?>>
                    <div class="task-header">
                        <p class="task-number"><?php echo $projectData["project_name"] . ' #' . $task["task_index"]?></p>
                        <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])): ?>
                            <i class="fa-regular fa-trash-can" id="open-delete-task-<?php echo $task["id"]?>-dialog-button"></i>
                        <?php endif; ?>
                    </div>
                    <p><?php echo $task["task_name"] ?></p>
                    <?php if ($numberOfSubtasks): ?>
                    <div class="subtask-container-button" id="subtask-container-button-<?php echo $task["task_index"]?>">  
                        <p class="subtask-container-button-text"><?php echo $numberOfSubtasks ?> sous-tâche<?php echo $numberOfSubtasks > 1 ? 's' : '' ?></p>
                        <i id="arrow-<?php echo $task["task_index"]?>" class="fa-solid fa-angle-down"></i>
                    </div>
                    <div class="subtasks-container" id="subtasks-container-for-task-<?php echo $task["task_index"] ?>">
                    <?php foreach ($subtasks as $subtask): ?>
                        <div class="subtask-container">
                            <label class="subtask-label" for="subtask-<?php echo $subtask["subtask_index"] ?>-for-task-<?php echo $task["task_index"] ?>"><?php echo $subtask["subtask_name"] ?></label>
                            <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])): ?>
                                <input type="checkbox" class="subtask-checkbox" id="subtask-<?php echo $subtask["id"]?>" <?php echo $subtask["is_completed"] ? 'checked' : "" ?>>
                            <?php endif; ?>
                        </div>
                    <?php endforeach ?>
                    </div>
                    <?php endif ?>
                </div>
                <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])): ?>
                    <dialog class="delete-task-dialog" id="delete-task-<?php echo $task["id"]?>-dialog">
                        <h3>Voulez-vous vraiment supprimer cette tâche ?</h3>
                        <div>
                            <button type="button" class="delete-task-button" id="delete-task-<?php echo $task["id"]?>-button">Supprimer la tâche</button>
                            <p class="close-delete-task-dialog-button" id="cancel-task-<?php echo $task["id"]?>-delete">Annuler</p>
                        </div>
                    </dialog>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="column" id="pending" onDragStart="start(event)" onDragOver="return over(event)" onDrop="return drop(event)">
                <h5 class="task-status">En attente</h5>
                <?php foreach ($pendingTasks as $task): ?>
                <?php require "../../scripts/user-section/tasks/getSubtasks.php" ?>
                <div class="task" id="<?php echo $task["task_index"] ?>" <?php echo (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])) ? 'draggable="true"' : "" ?>>
                    <div class="task-header">
                        <p class="task-number"><?php echo $projectData["project_name"] . ' #' . $task["task_index"]?></p>
                        <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])): ?>
                            <i class="fa-regular fa-trash-can" id="open-delete-task-<?php echo $task["id"]?>-dialog-button"></i>
                        <?php endif; ?>
                    </div>
                    <p><?php echo $task["task_name"] ?></p>
                    <?php if ($task['task_responsible']):?>
                        <p>Assignée à <span style="color: #2541bd"><?php echo $task["task_responsible"] ?></span></p>
                    <?php endif ?>
                    <?php if ($numberOfSubtasks): ?>
                    <div class="subtask-container-button" id="subtask-container-button-<?php echo $task["task_index"]?>">  
                        <p class="subtask-container-button-text"><?php echo $numberOfSubtasks ?> sous-tâche<?php echo $numberOfSubtasks > 1 ? 's' : '' ?></p>
                        <i id="arrow-<?php echo $task["task_index"]?>" class="fa-solid fa-angle-down"></i>
                    </div>
                    <div class="subtasks-container" id="subtasks-container-for-task-<?php echo $task["task_index"] ?>">
                    <?php foreach ($subtasks as $subtask): ?>
                        <div class="subtask-container">
                            <label class="subtask-label" for="subtask-<?php echo $subtask["subtask_index"] ?>-for-task-<?php echo $task["task_index"] ?>"><?php echo $subtask["subtask_name"] ?></label>
                            <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])): ?>
                                <input type="checkbox" class="subtask-checkbox" id="subtask-<?php echo $subtask["id"]?>" <?php echo $subtask["is_completed"] ? 'checked' : "" ?>>
                            <?php endif; ?>
                        </div>
                    <?php endforeach ?>
                    </div>
                    <?php endif ?>
                </div>
                <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])): ?>
                    <dialog class="delete-task-dialog" id="delete-task-<?php echo $task["id"]?>-dialog">
                        <h3>Voulez-vous vraiment supprimer cette tâche ?</h3>
                        <div>
                            <button type="button" class="delete-task-button" id="delete-task-<?php echo $task["id"]?>-button">Supprimer la tâche</button>
                            <p class="close-delete-task-dialog-button" id="cancel-task-<?php echo $task["id"]?>-delete">Annuler</p>
                        </div>
                    </dialog>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="column" id="in-progress" onDragStart="start(event)" onDragOver="return over(event)" onDrop="return drop(event)">
                <h5 class="task-status">En cours</h5>
                <?php foreach ($inProgressTasks as $task): ?>
                <?php require "../../scripts/user-section/tasks/getSubtasks.php" ?>
                <div class="task" id="<?php echo $task["task_index"]?>" <?php echo (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])) ? 'draggable="true"' : "" ?>>
                    <div class="task-header">
                        <p class="task-number"><?php echo $projectData["project_name"] . ' #' . $task["task_index"]?></p>
                        <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])): ?>
                            <i class="fa-regular fa-trash-can" id="open-delete-task-<?php echo $task["id"]?>-dialog-button"></i>
                        <?php endif; ?>
                    </div>
                    <p><?php echo $task["task_name"] ?></p>
                    <?php if ($task['task_responsible']):?>
                        <p>Assignée à <span style="color: #2541bd"><?php echo $task["task_responsible"] ?></span></p>
                    <?php endif ?>
                    <?php if ($numberOfSubtasks): ?>
                    <div class="subtask-container-button" id="subtask-container-button-<?php echo $task["task_index"]?>">  
                        <p class="subtask-container-button-text"><?php echo $numberOfSubtasks ?> sous-tâche<?php echo $numberOfSubtasks > 1 ? 's' : '' ?></p>
                        <i id="arrow-<?php echo $task["task_index"]?>" class="fa-solid fa-angle-down"></i>
                    </div>
                    <div class="subtasks-container" id="subtasks-container-for-task-<?php echo $task["task_index"] ?>">
                    <?php foreach ($subtasks as $subtask): ?>
                        <div class="subtask-container">
                            <label class="subtask-label" for="subtask-<?php echo $subtask["subtask_index"] ?>-for-task-<?php echo $task["task_index"] ?>"><?php echo $subtask["subtask_name"] ?></label>
                            <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])): ?>
                                <input type="checkbox" class="subtask-checkbox" id="subtask-<?php echo $subtask["id"]?>" <?php echo $subtask["is_completed"] ? 'checked' : "" ?>>
                            <?php endif; ?>
                        </div>
                    <?php endforeach ?>
                    </div>
                    <?php endif ?>
                </div>
                <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])): ?>
                    <dialog class="delete-task-dialog" id="delete-task-<?php echo $task["id"]?>-dialog">
                        <h3>Voulez-vous vraiment supprimer cette tâche ?</h3>
                        <div>
                            <button type="button" class="delete-task-button" id="delete-task-<?php echo $task["id"]?>-button">Supprimer la tâche</button>
                            <p class="close-delete-task-dialog-button" id="cancel-task-<?php echo $task["id"]?>-delete">Annuler</p>
                        </div>
                    </dialog>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="column" id="completed" onDragStart="start(event)" onDragOver="return over(event)" onDrop="return drop(event)">
                <h5 class="task-status">Achevée</h5>
                <?php foreach ($completedTasks as $task): ?>
                <?php require "../../scripts/user-section/tasks/getSubtasks.php" ?>    
                <div class="task" id="<?php echo $task["task_index"]?>" <?php echo (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])) ? 'draggable="true"' : "" ?>>
                    <div class="task-header">
                        <p class="task-number"><?php echo $projectData["project_name"] . ' #' . $task["task_index"]?></p>
                        <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])): ?>
                            <i class="fa-regular fa-trash-can" id="open-delete-task-<?php echo $task["id"]?>-dialog-button"></i>
                        <?php endif; ?>
                    </div>
                    <p><?php echo $task["task_name"] ?></p>
                    <?php if ($task['task_responsible']):?>
                        <p>Assignée à <span style="color: #2541bd"><?php echo $task["task_responsible"] ?></span></p>
                    <?php endif ?>
                    <?php if ($numberOfSubtasks): ?>
                    <div class="subtask-container-button" id="subtask-container-button-<?php echo $task["task_index"]?>">  
                        <p class="subtask-container-button-text"><?php echo $numberOfSubtasks ?> sous-tâche<?php echo $numberOfSubtasks > 1 ? 's' : '' ?></p>
                        <i id="arrow-<?php echo $task["task_index"]?>" class="fa-solid fa-angle-down"></i>
                    </div>
                    <div class="subtasks-container" id="subtasks-container-for-task-<?php echo $task["task_index"] ?>">
                    <?php foreach ($subtasks as $subtask): ?>
                        <div class="subtask-container">
                            <label class="subtask-label" for="subtask-<?php echo $subtask["subtask_index"] ?>-for-task-<?php echo $task["task_index"] ?>"><?php echo $subtask["subtask_name"] ?></label>
                            <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])): ?>
                                <input type="checkbox" class="subtask-checkbox" id="subtask-<?php echo $subtask["id"]?>" <?php echo $subtask["is_completed"] ? 'checked' : "" ?>>
                            <?php endif; ?>
                        </div>
                    <?php endforeach ?>
                    </div>
                    <?php endif ?>
                </div>
                <?php if (($userRights <= 2) || ($userRights == 3 && $task["task_creator"] == $_SESSION["username"])): ?>
                    <dialog class="delete-task-dialog" id="delete-task-<?php echo $task["id"]?>-dialog">
                        <h3>Voulez-vous vraiment supprimer cette tâche ?</h3>
                        <div>
                            <button type="button" class="delete-task-button" id="delete-task-<?php echo $task["id"]?>-button">Supprimer la tâche</button>
                            <p class="close-delete-task-dialog-button" id="cancel-task-<?php echo $task["id"]?>-delete">Annuler</p>
                        </div>
                    </dialog>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</div>

<script src="../../style/components/user-section/table-project-page/showSubtasks.js"></script>
<script src="../../scripts/user-section/tasks/getSubtasksCheckboxes.js"></script>
<script src="../../scripts/user-section/tasks/deleteTaskDialog.js"></script>