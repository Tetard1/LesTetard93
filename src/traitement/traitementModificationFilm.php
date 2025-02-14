<?php
include "../repository/repositoryFilm.php";
require_once "../bdd/BDD.php";
require_once "../modele/film.php";
var_dump($_POST);

if(empty($_POST["titre"]) ||
    empty($_POST["description"]) ||
    empty($_POST["duree"]) ||
    empty($_POST["genre"]))
{
    echo "Erreur : Tous les champs doivent être remplis";
    return;
}

$film = new Film(array(
    'titre' => $_POST['titre'],
    'description' => $_POST['description'],
    'duree' => $_POST['duree'],
    'genre' => $_POST['genre'],
    'id' => $_POST['idFilm'],
    'image' => $_POST['affiche']
));

var_dump($film);
$repository = new repositoryFilm();
$resultat = $repository->modifFilm($film);
if($resultat){
    header("Location: ../../vue/filmAffiche.php");
}

