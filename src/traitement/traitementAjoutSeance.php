<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Seance.php';
require_once '../Repository/SeanceRepo.php';
session_start();
var_dump($_POST);
if(empty($_POST["date"]) || empty($_POST["heure"]) || empty($_POST["nbPlcDispo"]) ||
    empty($_POST["prixPlc"]) || empty($_POST["refFilm"]) || empty($_POST["refSalle"])){
    echo"Desolé, Veuillez remplir tous les champs";
}
else{
    $seance = new Seance([
        'date' => $_POST["date"],
        'heure' => $_POST["heure"],
        'nbPlcDispo' => $_POST["nbPlcDispo"],
        'prixPlc' => $_POST["prixPlc"],
        'refFilms' => $_POST["refFilm"],
        'refSalle' => $_POST["refSalle"]
    ]);
    $seanceRepository = new SeanceRepo();
    $resultat = $seanceRepository->ajouterSeance($seance);
    var_dump($resultat);
    if($resultat){
        header("Location: ../../vue/traitementAfficherSeance.php");
    }else{
        header("Location: ../../vue/ajoutSeance.php");
    }
}



