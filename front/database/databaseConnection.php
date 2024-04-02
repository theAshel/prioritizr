<?php
$host = '51.38.33.73';
$username = 'user';
$password = 'myPasswd';
$database = 'prioritizr_db';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $db_connexion = new PDO("mysql:host=$host;dbname=$database", $username, $password, $options);
} catch(PDOException $e) {
    echo "Database connection failed : " . $e->getMessage() . "\n";
}
?>