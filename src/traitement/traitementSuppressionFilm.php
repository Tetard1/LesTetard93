<?php

require_once "../Bdd/BDD.php";
require_once "../modele/film.php";
require_once "../repository/repositoryFilm.php";

var_dump($_POST);
//exit();
if(isset($_POST['idFilm'])) {
    $id = $_POST['idFilm'];
    $film = new Film(['id' => $id]);

    $repositoryFilm = new RepositoryFilm();
    $suppression = $repositoryFilm->suppressionFilm($film);
    if ($suppression) {
        header('Location:../../vue/filmAffiche.php');
    } else {
        echo "erreur";
    }
}else{
    header('Location: ../../vue/filmAffiche.php');
}
