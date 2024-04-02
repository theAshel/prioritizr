<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

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

    include_once './connectionDB.php';
    $liste_mail = $db_connexion->query("SELECT mail,firstname,lastname FROM user WHERE date_connection = DATE_SUB(CURDATE(), INTERVAL 30 DAY)");

    foreach($liste_mail as $email){
        $mail->clearAddresses();
        $mail->addAddress($email["mail"], $email["firstname"] . $email["lastname"]);
        $mail->Subject = "Bonjour";
        $mail->Body = "Revenez sur notre site svp";
        $mail->send();
    }
    