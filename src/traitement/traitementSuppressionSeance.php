<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Seance.php';
require_once '../Repository/SeanceRepo.php';
var_dump($_GET['id']);
if(isset($_GET["id"])) {
    $idSeance = $_GET['id'];
    $seance = new Seance([
    'idSeance' => $_GET["id"],
]);
$seanceRepo = new SeanceRepo();
$suppression = $seanceRepo->supprimerSeance($seance);
if ($suppression) {
    header('Location:../../vue/accueil.php');
} else {
    echo "erreur";
}
}else{
    header('location:traitementSuppressionSeance.php');
    echo "Vous navez pas de seance a supprimer";
}
