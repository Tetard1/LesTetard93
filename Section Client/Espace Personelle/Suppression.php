<?php
echo "Votre mot de passe a été changer avec succes ! ";
var_dump($_POST);
$bdd = new PDO('mysql:host=localhost;dbname=tli3;charset=utf8', 'root', '');
$req = $bdd->prepare('DELETE FROM inscrit WHERE email = :email AND mdp = :mdp');
$req->execute(array(
    'email' => $_SESSION['email']
));

echo "Votre utilisateur a été suprimer avec succes ! ";
