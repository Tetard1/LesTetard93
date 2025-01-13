<?php
session_start();
var_dump($_POST);
$bddconnexion = new PDO('mysql:host=localhost;dbname=tli3;charset=utf8', 'root', '');
$reqconnexion = $bddconnexion->prepare('SELECT * FROM inscrit WHERE email = :email AND mdp = :mdp');
$reqconnexion->execute(array(
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp'],
));

$donne = $reqconnexion->fetch();
var_dump($donne);
if ($donne == NULL) {
    echo "vous n'avez pas de compte! veuillez en crée un ! ";
}
else {
    $_SESSION['email'] = $donne['email'];;
    header('Location: ../Affichage_compte/Affichage_Compte.php');
}


?>
