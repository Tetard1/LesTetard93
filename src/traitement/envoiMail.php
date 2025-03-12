<?php
//envoi d'email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Random\RandomException;

require_once '../modele/Utilisateur.php';
require_once '../repository/RepositoryUtilisateur.php';
require '../../vendor/autoload.php';
if(isset($_POST['email'])) {
$user =new Utilisateur($_POST['email']);
$repo=new RepositoryUtilisateur();
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Testcinema@outlook.fr'; // Remplace par ton email Outlook
    $mail->Password = 'phptest1234';  // Mot de passe ou mot de passe d'application
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $token = bin2hex(random_bytes(32));
    setlocale(LC_ALL, 'fr_FR.UTF-8');
    $dateFin=date('Y-m-d H:i', strtotime('+1 hour'));
    $compte=$repo->rechercheUtilisateurParMail($user);
    if(!$compte){
        echo"email non trouvé";
        header("location:../../index.php");
    }else{
        $ajout=$repo->addTokens($token,$dateFin,$user->getEmail());
        if($ajout){
            $lien="http://localhost/SLAM/PHP/Projets%20PHP/LesTetard93/vue/reinitialiserMdp.php?token=".$token;
            try {
                $mail->setFrom('Testcinema@outlook.fr', 'Testcinema');
                $mail->addAddress($user->getEmail());
                $mail->Subject = "Reinitialisation de votre mot de passe";
                $mail->Body = "Bonjour,
                Cliquez sur le lien pour reinitialiser votre mot de passe : $lien";
                }catch (Exception $e){
                echo"Erreur lors de l'envoi de votre mail";

            }
        }
    }


}
