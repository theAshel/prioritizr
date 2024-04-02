<?php

require_once "./script_php/connectionDB.php";
require_once "./script_php/checkConnection.php";

$users = $db_connexion->query("SELECT id_user, username, firstname, lastname, mail, newsletter, admin  FROM user");

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset = "UTF-8">
        <script src="./script_js/backoffice.js"></script>
        <link rel="stylesheet" href="./stylesheet/style.css">
        <title>Prioritizr - Back</title>
    </head>
    <body>
    <?php include_once "./element/header.php"; ?>
        <dialog id="modify">
            <button onclick="closeModification()">X</button>
            <form method="POST" action="./script_php/modifyUser.php">
                <div class="modifyFormRow">
                    <label for="id_user">ID utilisateur</label>
                    <input type="text" name="id_user" id="id_user" readonly="readonly">
                </div>
                <div class="modifyFormRow">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" value="">
                </div>
                <div class="modifyFormRow">
                    <label for="firstname">Prénom</label>
                    <input type="text" name="firstname" id="firstname" value="">
                </div>
                <div class="modifyFormRow">
                    <label for="lastname">Nom</label>
                    <input type="text" name="lastname" id="lastname" value="">
                </div>
                <div class="modifyFormRow">
                    <label for="mail">Mail</label>
                    <input type="text" name="mail" id="mail" value="">
                </div>
                <div class="modifyFormRow">
                    <label for="newsletter">Newsletter</label>
                    <select name="newsletter" id="newsletter">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>
                </div>
                <div class="modifyFormRow">
                    <label for="admin">Admin</label>
                    <select name="admin" id="admin">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>
                </div>
                <div class="modifyFormRow">
                    <input type="submit" value="Modifier">
                </div>
            </form>
        </dialog>
        <div id="mainpage">
            <h1>Page de gestion utilisateur</h1>
            <table id="userlist">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom d'utilisateur</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Mail</th>
                        <th>Newsletter</th>
                        <th>Admin</th>
                        <th colspan=2></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) {?>
                    <tr id="tr_<?php echo $user["id_user"]; ?>" class="table_row">
                        <td><?php echo $user["id_user"]; ?></td>
                        <td><?php echo $user["username"]; ?></td>
                        <td><?php echo $user["firstname"]; ?></td>
                        <td><?php echo $user["lastname"]; ?></td>
                        <td><?php echo $user["mail"]; ?></td>
                        <td><?php 
                            if ($user["newsletter"] == 0){
                                echo "Non";
                            }else {
                                echo "Oui";
                            }
                        ; ?></td>
                        <td><?php 
                            if ($user["admin"] == 0){
                                echo "Non";
                            }else {
                                echo "Oui";
                            }
                        ; ?></td>
                        <td><?php echo "<button onclick='modifyUser(" . $user["id_user"] . ")'>Modifier</button>"; ?></td>
                        <td><button onclick='deleteInDB(<?php echo $user["id_user"]; ?>, "user", "<?php echo $user["username"]; ?>" )'>Supprimer</button></td>
                        
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </body>
</html>