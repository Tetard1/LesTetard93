<?php
include "../repository/SalleRepo.php";
require_once "../bdd/BDD.php";
require_once "../modele/Salle.php";
var_dump($_POST);
if(empty($_POST["nomSalle"]) ||
    empty($_POST["placeTotale"]) ||
    empty($_POST["id_salle"]))
{
    echo "Erreur : Tous les champs doivent être remplis";
    return;
}

$salle = new Salle(array(
    'nomSalle' => $_POST['nomSalle'],
    'prenom' => $_POST['placeTotale'],
    'idSalle' => $_POST['idSalle']
));

var_dump($salle);
$repository = new SalleRepo();
$resultat = $repository->modificationSalle($salle);

