<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

if (isset($_POST["newsletter_object"]) && isset($_POST["newsletter_body"])){
    $mail = new PHPMailer(); // Crée une nouvelle instance de PHPMailer
    
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'newsletter.prioritizr@outlook.com';
    $mail->Password = 'mPEL9e52G9c4tq';
    $mail->SMTPSecure = 'tls';
    $mail->isHTML(true);
    $mail->setFrom('newsletter.prioritizr@outlook.com', 'Prioritizr');
    $mail->CharSet = 'UTF-8';

    include_once './connectionDB.php';
    $liste_mail = $db_connexion->query("SELECT mail, firstname, lastname FROM user WHERE newsletter=1");

    $imagePath = $_FILES['newsletter_image']['tmp_name'];
    $imageName = $_FILES['image']['name'];

    $contenuEmail = file_get_contents('../element/newsletter_mail.php');
    $contenuEmail = str_replace('{newsletter_title}', $_POST["newsletter_title"], $contenuEmail);
    $contenuEmail = str_replace('{newsletter_body}', $_POST["newsletter_body"], $contenuEmail);
    

    foreach($liste_mail as $email){

        $contenuEmail = str_replace('{newsletter_client}', $email["firstname"] . " ". $email["lastname"], $contenuEmail);

        $mail->clearAddresses();
        $mail->addAddress($email["mail"], $email["firstname"] . $email["lastname"]);
        $mail->AddEmbeddedImage($imagePath, 'image', $imageName);
        $mail->Subject = $_POST["newsletter_object"];
        $mail->Body = $contenuEmail;
        $mail->send();
        $contenuEmail = str_replace($email["firstname"] . " ". $email["lastname"],'{newsletter_client}', $contenuEmail);
    }
}
?>

<script>
  alert("Mails envoyés");
  window.location.href = "../gestion_newsletter.php"; 
</script>

