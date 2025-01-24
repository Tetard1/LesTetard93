<?php
use Bdd\BDD;
echo "Votre mot de passe a été changer avec succes ! ";
var_dump($_POST);
$bdd = new BDD();
$req = $bdd->getBdd()->prepare('DELETE FROM inscrit WHERE email = :email AND mdp = :mdp');
$req->execute(array(
    'email' => $_SESSION['email']
));

echo "Votre utilisateur a été suprimer avec succes ! ";
