<?php
require_once "../../Classique/Bdd/BDD.php";

var_dump($_POST);

$bdd = new BDD();
$req = $bdd->getBDD()->prepare('INSERT INTO film(titre,description,genre,durée,affiche) VALUES (:titre,:description,:genre,:durée,:affiche)');
$req->execute(array(
    'titre' => $_POST['titre'],
    'description' => $_POST['description'],
    'genre' => $_POST['genre'],
    'durée' => $_POST['durée'],
    'affiche' => $_POST['affiche']
));
$film  = $req->fetchAll();



echo "le film a bien été ajouter";













