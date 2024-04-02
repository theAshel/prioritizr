<?php

require "../../database/databaseConnection.php";

// Vérifier si l'utilisateur est connecté et a une session active
session_start();
if (!isset($_SESSION["user_id"])) {
    // L'utilisateur n'est pas connecté, gérer l'erreur ou rediriger vers la page de connexion
    echo "notLoggedIn";
    exit();
}

// Récupérer les nouvelles valeurs du profil envoyées via la requête POST
$mail = $_POST["mail"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];

// Mettre à jour les données du profil dans la base de données
$updateProfileQuery = $db_connexion->prepare("UPDATE user SET mail = :mail, firstname = :firstname, lastname = :lastname, username = :username WHERE id_user = :user_id");
$updateProfileQuery->execute([
    "mail" => $mail,
    "firstname" => $firstname,
    "lastname" => $lastname,
    "username" => $username,
    "user_id" => $_SESSION["user_id"]
]);
$_SESSION['mail'] = $mail;
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['username'] = $username;
// Vérifier si la mise à jour a réussi
if ($updateProfileQuery->rowCount() > 0) {
    // La mise à jour a réussi, retourner une réponse réussie
    echo "success";
} else {
    // La mise à jour a échoué, gérer l'erreur
    echo "error";
}

?>
