<?php
require_once "../src/bdd/BDD.php";
require_once "../src/modele/film.php";
require_once "../src/repository/repositoryFilm.php";
$liste = new repositoryFilm();
$film = $liste->detailFilm($_GET['id']);
?>

<img src="<?=$film->getImage() ?>">





