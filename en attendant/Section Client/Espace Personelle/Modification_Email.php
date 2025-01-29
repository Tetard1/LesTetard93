<?php

use Bdd\BDD;

var_dump($_POST);
$bdd = new BDD();
$req = $bdd->getBdd()->prepare('UPDATE utilisateur SET email = :email WHERE email = :email');

$req->execute(array(
    'email' => $_POST['email'],
));