<?php
session_start();

require_once __DIR__ . "./connectionDB.php";

$id_group = $_GET["id_group"];

$memberlist = $db_connexion->query("SELECT user.id_user, user.username FROM part_of JOIN user ON user.id_user = part_of.id_user WHERE part_of.id_group = $id_group");

$data = array();
foreach ($memberlist as $row) {
  $data[] = $row;
}

echo json_encode($data);

