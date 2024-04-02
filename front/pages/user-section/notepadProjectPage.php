<?php 

session_start();

echo "Bienvenue sur la page notepad " . $_SESSION["project_id"];