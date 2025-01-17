<?php
var_dump($_POST);
$bdd = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root', '');
$req = $bdd->prepare('UPDATE utilisateur SET email = :email WHERE email = :email');

$req->execute(array(
    'email' => $_POST['email'],
));