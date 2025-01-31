<?php

require_once "../modele/film.php";
require_once "../repository/repositoryFilm.php";
require_once "../Bdd/BDD.php";

var_dump($_POST);
$film = new Film(array(
    'titre' => $_POST['titre'],
    'description' => $_POST['description'],
    'genre' => $_POST['genre'],
    'duree' => $_POST['duree'],
    'image' => $_POST['affiche'],
));

var_dump($film);

$repositoryFilm = new RepositoryFilm();
$resultat = $repositoryFilm->ajoutFilm($film);


