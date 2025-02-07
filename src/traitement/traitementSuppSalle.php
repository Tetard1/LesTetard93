<?php
include "../repository/SalleRepo.php";
require_once "../bdd/BDD.php";
require_once "../modele/Salle.php";

var_dump($_POST);
if(empty($_POST["idSalle"]))
{
    var_dump($_POST);
    echo "Erreur : ID utilisateur requis";
    return;
}

$salle = new Salle(array(
    'idSalle' => $_POST["idSalle"]

));
$repository = new SalleRepo();
$resultat = $repository->suppressionSalle($salle);