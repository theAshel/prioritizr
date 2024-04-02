<?php
$host = '51.38.33.73';
$username = 'user';
$password = 'myPasswd';
$database = 'prioritizr_db';
$mysqli = new mysqli($host, $username, $password, $database);

// Vérification de la connexion
if ($mysqli->connect_errno) {
    echo "Echec de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$users = $mysqli->query("INSERT INTO user (id_user, firstname, lastname, username, mail) VALUES (3, 'Pierre', 'Durieux', 'teykoh', 'teykohfr@gmail.com')") ;

$users = $mysqli->query("INSERT INTO user (id_user, firstname, lastname, username, mail) VALUES (4, 'Dimitri', 'Leroux', 'ja-_-lo', 'dimitri.leroux05@gmail.com')") ;

$users = $mysqli->query("INSERT INTO user (id_user, firstname, lastname, username, mail) VALUES (5000, 'Hoang long', 'PHAM', 'ashel', 'ashel@gmail.com')") ;

$users = $mysqli->query("INSERT INTO user (id_user, firstname, lastname, username, mail) VALUES (5, 'Projet', 'Annuel', 'PA1A1', 'projetannuel1a1@gmail.com')") ;
// [["id" => 1], ["id" => 2], ["id" => 3], ["id" => 4] ]

$mysqli->close();

?>
