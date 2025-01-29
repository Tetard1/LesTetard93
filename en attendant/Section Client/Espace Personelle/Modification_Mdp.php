<?php
use Bdd\BDD;
session_start();
var_dump($_POST);
$bdd = new BDD();
$req = $bdd->getBdd()->prepare('SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp');
$req->execute(array(
'email' => $_POST['email'],
'mdp' => $_POST['mdp2'],
));

$donne = $req->fetch();
var_dump($donne);
if ($donne == NULL) {
echo "Nous sommes pas en possibilité de changer votre mot de passe !
Nous ne trouvons pas votre email !";
} else {
var_dump($_POST);
$bdd = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root', '');
$req = $bdd->prepare('UPDATE utilisateur  SET mdp = :mdp WHERE email = :email');

$req->execute(array(
'email' => $_POST['email'],
'mdp' => $_POST['mdp'],
));
echo "Votre mot de passe a été changer avec succes ! ";
}

