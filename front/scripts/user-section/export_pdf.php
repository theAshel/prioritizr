<?php
session_start();

require('../../../fpdf185/fpdf.php');
$host = '51.38.33.73';
$username = 'user';
$password = 'myPasswd';
$database = 'prioritizr_db';
$db_connexion = new PDO("mysql:host=$host;dbname=$database", $username, $password);


$query = "SELECT username, firstname, lastname, mail FROM user WHERE id_user = " . $_SESSION['user_id'] . " AND username = '" . $_SESSION['username'] ."'";
$stmt = $db_connexion->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


$pdf = new FPDF();

$pdf->SetTitle("Informations utlisateur" . $_SESSION['username']);
$pdf->SetAuthor('Prioritizr');
$pdf->SetMargins(15, 15, 15);

$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, "Informations utilisateur : " . $data[0]['username'], 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 10, 'Nom d\'utilisateur : ' . $data[0]['username']);
$pdf->MultiCell(0, 10, 'Adresse mail : ' . $data[0]['mail']);
$pdf->MultiCell(0, 10, 'Nom : ' . $data[0]['lastname']);
$pdf->MultiCell(0, 10, utf8_decode('Prénom : ' . $data[0]['firstname']));

$pdf->Output($_SESSION['username'] . ".pdf", 'D' , 'UTF-8');