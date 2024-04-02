<?php
        // Pas besoin de require le script getProjectsList car on le fait déjà dans le composant aside
?>

<main>
    <!-- <div class="model-section">
        <p>Choississez un de ces modèles pour construire vore projet:</p>
        <div class="model-button-section">
            <div class="model-button" id="table-model">
                <div class="color" style="background: red"></div>
                <div class="model-name">
                    <p>Modèle tableau</p>
                </div>
            </div>
            <div class="model-button" id="notepad-model">
                <div class="color" style="background: green"></div>
                <div class="model-name">
                    <p>Bloc-notes</p>
                </div>
            </div>
        </div>
    </div> -->
    <section class="project-section">
        <div class="project-section-header">
            <h5>Mes projets</h5>
            <button type="button" class="create-project">+ Créer un nouveau projet</button>
        </div>
        <?php if (!$projectsList):?>
        <p>Vous n'avez aucun projet de lancé.</p>
        <?php else: ?>
        <div class="project-table card-table">
            <?php foreach ($projectsList as $project): ?>
            <?php require "../../scripts/user-section/tasks/getInProgressTasks.php"?>
            <div class="project-card" id="project-<?php echo $project["id"] ?>-card">
                <header class="project-card-header">
                    <h6><?php echo $project["project_name"]; ?></h6>
                    <i class="fa-regular fa-star"></i>
                </header>
                <section class="project-card-task-preview">
                    <p>En cours:</p>
                    <?php if ($inProgressTasks): ?>
                    <ul>
                        <?php 
                        for ($i = 0; $i < 3; $i++):
                            if (isset($inProgressTasks[$i])): ?>
                                <li><?php echo $inProgressTasks[$i]["task_name"] ?></li>
                            <?php endif;
                        endfor; ?>
                    </ul>
                    <?php else: ?>
                    <p class="project-card-no-task">Aucune tâche est en cours.</p>
                    <?php endif ?>
                </section>
                <div class="card-popup-window">
                    <p>Modifier des informations du projet</p>
                    <p class="delete-project-popup" id="open-delete-project-<?php echo $project["id"]?>-dialog-button">Supprimer le projet</p>
                </div>
                <footer class="project-card-subinfo">
                    <div class="project-card-model-type">
                        <p><?php echo $project["type"] === 'table' ? 'Tableau' : 'Bloc-notes';?></p>
                    </div>
                    <i class="fa-solid fa-ellipsis"></i>
                </footer>
                <dialog class="delete-project-dialog" id="delete-project-<?php echo $project["id"]?>-dialog">
                    <h3>Voulez-vous vraiment supprimer ce projet ?</h3>
                    <div>
                        <button type="button" class="delete-project-button" id="delete-project-<?php echo $project["id"]?>-button">Supprimer le projet</button>
                        <p class="close-delete-project-dialog-button" id="cancel-project-<?php echo $project["id"]?>-delete">Annuler</p>
                    </div>
                </dialog>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <p class="show-more-project-cards"><i class="fa-solid fa-angle-down"></i> Voir tous les projets</p>
        <p class="show-less-project-cards"><i class="fa-solid fa-angle-up"></i> Voir moins</p>
    </section>
    <section class="project-section">
    <div class="project-section-header">
            <h5>Mes collaborations</h5>
        </div>
        <?php if (!$collaborationsList):?>
        <p>Vous n'avez aucun projet de lancé.</p>
        <?php else: ?>
        <div class="project-table card-table">
            <?php foreach ($collaborationsList as $project): ?>
            <?php require "../../scripts/user-section/tasks/getInProgressTasks.php"?>
            <div class="project-card" id="project-<?php echo $project["id"] ?>-card">
                <header class="project-card-header">
                    <h6><?php echo $project["project_name"]; ?></h6>
                    <i class="fa-regular fa-star"></i>
                </header>
                <section class="project-card-task-preview">
                    <p>En cours:</p>
                    <?php if ($inProgressTasks): ?>
                    <ul>
                        <?php 
                        for ($i = 0; $i < 3; $i++):
                            if (isset($inProgressTasks[$i])): ?>
                                <li><?php echo $inProgressTasks[$i]["task_name"] ?></li>
                            <?php endif;
                        endfor; ?>
                    </ul>
                    <?php else: ?>
                    <p class="project-card-no-task">Aucune tâche est en cours.</p>
                    <?php endif ?>
                </section>
                <div class="card-popup-window">
                    <p>Consulter les informations du projet</p>
                    <p class="delete-project-popup" id="open-delete-project-<?php echo $project["id"]?>-dialog-button">Quitter le projet</p>
                </div>
                <footer class="project-card-subinfo">
                    <div class="project-card-model-type">
                        <p><?php echo $project["type"] === 'table' ? 'Tableau' : 'Bloc-notes';?></p>
                    </div>
                    <i class="fa-solid fa-ellipsis"></i>
                </footer>
                <dialog class="delete-project-dialog" id="delete-project-<?php echo $project["id"]?>-dialog">
                    <h3>Voulez-vous vraiment quitter ce projet ?</h3>
                    <div>
                        <button type="button" class="leave-project-button" id="leave-project-<?php echo $project["id"]?>-button">Quitter le projet</button>
                        <p class="close-delete-project-dialog-button" id="cancel-project-<?php echo $project["id"]?>-delete">Annuler</p>
                    </div>
                </dialog>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <p class="show-more-project-cards"><i class="fa-solid fa-angle-down"></i> Voir toutes les collaborations</p>
        <p class="show-less-project-cards"><i class="fa-solid fa-angle-up"></i> Voir moins</p>
    </section>
</main>

<script src="../../style/components/user-section/home-page/showProjectCards.js"></script>
<script src="../../scripts/user-section/openPopUp.js"></script>
<script src="../../scripts/user-section/projects/getProjectNumberFromCards.js"></script>
<script src="../../scripts/user-section/openDeleteProjectDialog.js"></script>
<script src="../../scripts/user-section/projects/leaveProject.js"></script>