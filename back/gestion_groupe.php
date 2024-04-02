<?php
require_once "./script_php/connectionDB.php";
require_once "./script_php/checkConnection.php";

$groups = $db_connexion->query("SELECT id_group, group_name FROM `group`");
// [["id" => 1], ["id" => 2], ["id" => 3], ["id" => 4] ]


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
        <h1>Page de gestion de groupe</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de groupe</th>
                    <th colspan=2></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($groups as $group) {?>
                <tr class="table_row">
                    <td><?php echo $group["id_group"]; ?></td>
                    <td><?php echo $group["group_name"]; ?></td>
                    <td><button id="show_group_<?php echo $group['id_group']; ?>" onclick="showGroupMembers(<?php echo $group['id_group']; ?>)">Afficher</button></td>
                    <td><button onclick='deleteInDB(<?php echo $group["id_group"]; ?>, "group", "<?php echo $group["group_name"]; ?>" )'>Supprimer</button></td>
                </tr>
                <tr>
                    <td colspan = 5 id="table_<?php echo $group["id_group"]; ?>" hidden>
                        <table>
                            <thead id="memberlist_<?php echo $group["id_group"]; ?>">
                                <tr>
                                    <th>id</th>
                                    <th>username</th>
                                </tr>
                            </thead>
                            <tbody id ="group_<?php echo $group["id_group"]; ?>">
                                
                            </tbody>
                        </table>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </body>
</html>