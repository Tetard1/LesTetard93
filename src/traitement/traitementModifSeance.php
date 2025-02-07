<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Seance.php';
require_once '../Repository/SeanceRepo.php';


if(empty($_POST["date"]) || empty($_POST["heure"]) || empty($_POST["nbPlcDispo"]) ||
    empty($_POST["prixPlc"]) || empty($_POST["refFilms"]) || empty($_POST["refSalle"])|| empty($_POST["idSeance"])){
    echo"Desolé, Veuillez remplir tous les champs";
    var_dump($_POST);
}else{
    var_dump($_POST);
$seance = new Seance([
    'idSeance' =>$_POST["idSeance"],
    'refSalle' => $_POST["refSalle"],
    'refFilms' => $_POST["refFilms"],
    'date' => $_POST["date"],
    'heure' => $_POST["heure"],
    'nbPlcDispo' => $_POST["nbPlcDispo"],
    'prixPlc' => $_POST["prixPlc"]
]);
$seanceRepo = new SeanceRepo();
$resultat=$seanceRepo->modifierSeance($seance);
if($resultat){
    header('Location: ../../vue/afficherSeance.php');
}
else{
    header('Location:../../vue/modifierSeance.php');
}
}

