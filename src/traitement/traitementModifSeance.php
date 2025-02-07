<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Seance.php';
require_once '../Repository/SeanceRepo.php';

if(empty($_POST["date"]) || empty($_POST["heure"]) || empty($_POST["nbPlcDispo"]) ||
    empty($_POST["prixPlc"]) || empty($_POST["refFilm"]) || empty($_POST["refSalle"])|| empty($_POST["idSeance"])){
    echo"Desolé, Veuillez remplir tous les champs";
}else{
$seance = new Seance([
    'idSeance' => $_POST["idSeance"],
    'date' => $_POST["date"],
    'heure' => $_POST["heure"],
    'nbPlcDispo' => $_POST["nbPlcDispo"],
    'prixPlc' => $_POST["prixPlc"],
    'refFilm' => $_POST["refFilm"],
    'refSalle' => $_POST["refSalle"]
]);
$seanceRepo = new SeanceRepo();
$resultat=$seanceRepo->modifierSeance($seance);

}

