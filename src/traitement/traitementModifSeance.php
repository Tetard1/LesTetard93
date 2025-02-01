<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Seance.php';
require_once '../Repository/SeanceRepo.php';

if(empty($_POST["date"]) || empty($_POST["heure"]) || empty($_POST["nbPlcDispo"]) ||
    empty($_POST["prixPlc"]) || empty($_POST["refFilm"]) || empty($_POST["refSalle"])){
    echo"Desolé, Veuillez remplir tous les champs";
}

