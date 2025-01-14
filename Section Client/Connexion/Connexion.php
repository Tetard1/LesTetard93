<?php
session_start();
var_dump($_POST);
$bddconnexion = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root', '');
$reqconnexion = $bddconnexion->prepare('SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp');
$reqconnexion->execute(array(
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp'],
));

$donne = $reqconnexion->fetch();
var_dump($donne);
if ($donne == NULL) {
    echo "vous n'avez pas de compte! veuillez en crée un ! ";
    header('location:../Insrciption/Inscription.php');
}
else {
    $_SESSION['email'] = $donne['email'];;
    header('location:../../Acceuil/Acceuil.php');
    session_start();
}
?>
