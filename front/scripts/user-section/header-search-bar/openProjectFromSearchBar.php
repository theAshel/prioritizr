<?php

session_start();

$_SESSION["project_id"] = $_POST["project_id"];

echo ($_SESSION["project_id"]);

?>