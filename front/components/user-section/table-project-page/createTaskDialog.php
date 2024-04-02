<dialog id="create-task-dialog">
    <div class="create-task-dialog-header">
        <div>
            <i class="fa-solid fa-xmark" id="close-task-dialog"></i>
        </div>
        <h3>Ajoutez une tâche</h3>
    </div>
    <form id="create-task-form">
        <div class="dialog-input">
            <div>
                <label for="create-task-name-input">Nom de la tâche:<span style="color:red"> *</span></label>
            </div>
            <div>
                <input spellcheck="false" type="text" name="create-task-name" id="create-task-name-input">
            </div>
        </div>
        <p class="invalid-input" id="invalid-name"></p>
        <div class="second-input-field">
            <div>
                <div class="dialog-input">
                    <div>
                        <label for="create-task-priority-input">Priorité:<span style="color:red"> *</span></label>
                    </div>
                    <div>
                        <select name="create-task-priority" id="create-task-priority-input">
                            <option value="" selected disabled></option>
                            <option value="secondary">Secondaire</option>
                            <option value="not-important">Peu important</option>
                            <option value="important">Important</option>
                            <option value="very-important">Très important</option>
                        </select>
                    </div>
                </div>
                <p class="invalid-input" id="invalid-priority"></p>
            </div>
            <div>
                <div class="dialog-input">
                    <div>
                        <label for="create-task-difficulty-input">Difficulté:<span style="color:red"> *</span></label>
                    </div>
                    <div>
                        <select name="create-task-difficulty" id="create-task-difficulty-input">
                            <option value="" selected disabled></option>
                            <option value="very-easy">Très facile</option>
                            <option value="easy">Facile</option>
                            <option value="intermediate">Intermédiaire</option>
                            <option value="hard">Difficile</option>
                            <option value="very-hard">Très difficile</option>
                        </select>
                    </div>
                </div>
                <p class="invalid-input" id="invalid-difficulty"></p>
            </div>
        </div>
        <div class="dialog-search-bar-input">
            <div>
                <label for="dialog-task-search-bar">Assignez une personne ou un groupe à la tâche:</label>
            </div>
            <div class="search-bar-container">
                <input spellcheck="false" type="text" name="dialog-task-search-bar" id="dialog-task-search-bar" placeholder="Recherchez un utilisateur ou un groupe">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div id="search-attribute-task-user-results-container"></div>
            <div id="task-user-to-attribute-container"></div>
        </div>
        <div id="new-description-input">
            <div>
                <label for="create-task-description-input">Ajoutez une description:</label>
            </div>
            <div>
                <textarea spellcheck="false" name="task-description" id="create-task-description-input"></textarea>
            </div>
        </div>
        <div id="valid-task-button-container">
            <button type="button" id="valid-task-creation">Ajouter une tâche</button>
        </div>
    </form>
</dialog>

<script src="../../scripts/user-section/openCreateTaskDialog.js"></script>
<script src="../../scripts/user-section/tasks/task-user/attributeTaskUserSearchBar.js"></script>
<script src="../../scripts/user-section/tasks/verifyNewTaskData.js"></script>