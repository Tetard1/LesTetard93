<?php
//envoi d'email
require_once "src/bdd/BDD.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';
$bdd = new BDD();
if(isset($_POST['email'])) {
    $email=$_POST['email'];

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Testcinema@outlook.fr'; // Remplace par ton email Outlook
    $mail->Password = 'phptest1234';  // Mot de passe ou mot de passe d'application
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

}
