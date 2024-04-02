<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: gestion_utilisateur.php");
    die();
}

require_once __DIR__ . "./connectionDB.php";

if (isset($_POST["id_delete"])) {
    $id_delete = $_POST["id_delete"];
    $database = $_POST["database"];
    $db_connexion->query("DELETE FROM $database" . "_access" . " WHERE id_" . $database . "= $id_delete");
    $db_connexion->query("DELETE FROM part_of WHERE id_" . $database . "= $id_delete");
    $sql = "DELETE FROM `$database` WHERE id_" . $database . "= $id_delete";
    var_dump($sql);
    if ($db_connexion->query($sql) === TRUE) {
        echo "Utilisateur supprimé avec succès";
    }
}


?>
