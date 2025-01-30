<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Seance.php';
require_once '../Repository/SeanceRepo.php';
session_start();
if(empty($_POST["date"]) || empty($_POST["heure"]) || empty($_POST["nbPlcDispo"]) ||
    empty($_POST["prixPlc"]) || empty($_POST["refFilms"]) || empty($_POST["refSalle"])){
    echo"Desolé, Veuillez remplir tous les champs";
}
else{
    $seance = new Seance([
        'date' => $_POST["date"],
        'heure' => $_POST["heure"],
        'nbPlcDispo' => $_POST["nbPlcDispo"],
        'prixPlc' => $_POST["prixPlc"],
        'refFilms' => $_POST["refFilms"],
        'refSalle' => $_POST["refSalle"]
    ]);
    $seanceRepository = new SeanceRepo();
    $resultat = $seanceRepository->ajouterSeance($seance);
    if($resultat){
        header("Location: ../../index.php");
    }else{
        header("Location: ../../vue/ajoutSeance.html");
    }
}



