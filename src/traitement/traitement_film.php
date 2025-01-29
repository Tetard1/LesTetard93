<?php

require_once "../modele/film.php";
require_once "../repository/repository_film.php";
require_once "src/Bdd/BDD.php";

var_dump($_POST);
$film = new Film(array(
    'titre' => $_POST['titre'],
    'description' => $_POST['description'],
    'genre' => $_POST['genre'],
    'duree' => $_POST['duree'],
    'image' => $_POST['image'],
));
var_dump($film);

$film->ajout_film();