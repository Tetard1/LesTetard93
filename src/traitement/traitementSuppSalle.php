<?php
require_once "../bdd/BDD.php";
require_once "../modele/Salle.php";
require_once "../repository/SalleRepo.php";
var_dump($_GET['id']);
if(isset($_GET["id"])) {
    $idSalle = $_GET["id"];
    $salle = new Salle([
        "idSalle" => $_GET["id"]
    ]);
    $SalleRepo = new SalleRepo();
    $suppression = $SalleRepo->suppressionSalle($salle);
    if ($suppression) {
        header('Location:../../vue/accueil.php');
    } else {
        echo "erreur";
    }
}else{
    header('location:traitementSuppressionSeance.php');
    echo "Vous navez pas de salle a supprimer";
}