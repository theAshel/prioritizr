<?php

require "../../scripts/user-section/projects/getProjectsStats.php";
require "../../scripts/user-section/projects/getProjectsList.php";

?>

<aside>
    <div class="stats-container">
        <div class="stat number-of-projects">
            <h5>Nombre de projets:</h5>
            <p><?php echo $numberOfProjects?></p>
        </div>
        <div class="stat completed">
            <h5>Terminés:</h5>
            <p><?php echo $numberOfCompletedProjects["total"]?></p>
        </div>
        <div class="stat in-progress">
            <h5>En cours:</h5>
            <p><?php echo $numberOfInProgressProjects["total"]?></p>
        </div>
        <div class="stat canceled">
            <h5>Annulés:</h5>
            <p><?php echo $numberOfCanceledProjects["total"]?></p>
        </div>
    </div>
    <div class="info my-projects">
        <h3>Mes projets</h3>
        <div class="list project">
            <?php
            if (!$projectsList): ?>
            <p class="empty">Vous n'avez aucun projet de lancé.</p>
            <?php else: foreach ($projectsList as $project):?>
            <div class="line-container">
                <div class="<?php
                            switch ($project["status"]) {
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
                <p class="line-project-list in-progress" id="project-<?php echo $project["id"] ?>-line"><?php echo $project["project_name"]?></p>
            </div>
            <?php endforeach;
            endif;?>
        </div>
        <p class="show-more">...voir plus</p>
        <p class="show-less">voir moins</p>
        <p class="create-button create-project">+ Créer un nouveau projet</p>
    </div>
    <div class="info my-collaborations">
        <h3>Mes collaborations</h3>
        <div class="list collaborations">
        <?php
            if (!$collaborationsList): ?>
            <p class="empty">Vous ne collaborez dans aucun projet.</p>
            <?php else: foreach ($collaborationsList as $project):?>
            <div class="line-container">
                <div class="<?php
                            switch ($project["status"]) {
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
                <p class="line-project-list in-progress" id="project-<?php echo $project["id"] ?>-line"><?php echo $project["project_name"]?></p>
            </div>
            <?php endforeach;
            endif;?>
        </div>
        <p class="show-more">...voir plus</p>
        <p class="show-less">voir moins</p>
    </div>
</aside>

<script src="../../style/components/user-section/home-page/showList.js"></script>
<script src="../../scripts/user-section/projects/getProjectNumber.js"></script>