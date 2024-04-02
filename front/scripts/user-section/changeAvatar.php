<?php

require "../../database/databaseConnection.php";

// Vérifier si l'utilisateur est connecté et a une session active
session_start();
if (!isset($_SESSION["user_id"])) {
    // L'utilisateur n'est pas connecté, gérer l'erreur ou rediriger vers la page de connexion
    echo "notLoggedIn";
    exit();
}

// Récupérer les nouvelles valeurs de l'avatar envoyées via la requête POST
$gender = $_POST["gender"];
$hair = $_POST["hair"];
$eyes = $_POST["eyes"];
$mouth = $_POST["mouth"];
$skin = $_POST["skin"];

// Mettre à jour les données de l'avatar dans la table AVATAR pour l'utilisateur actuel
$updateAvatarQuery = $db_connexion->prepare("UPDATE AVATAR SET gender = :gender, hair = :hair, eyes = :eyes, mouth = :mouth, skin = :skin WHERE id_user = :user_id");
$updateAvatarQuery->execute([
    "user_id" => $_SESSION["user_id"],
    "gender" => $gender,
    "hair" => $hair,
    "eyes" => $eyes,
    "mouth" => $mouth,
    "skin" => $skin
]);

// Vérifier si la mise à jour a réussi
if ($updateAvatarQuery->rowCount() > 0) {
    // La mise à jour a réussi, retourner une réponse réussie
    echo "success";
} else {
    // La mise à jour a échoué, gérer l'erreur
    echo "error";
}

?>
