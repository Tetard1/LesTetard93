<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Seance.php';
require_once '../Repository/SeanceRepo.php';
if(isset($_POST['idSeance'])) {
    $idSeance = $_POST['idSeance'];

    $seance = new Seance([
        'idSeance' => $idSeance
    ]);
    $seanceRepo = new SeanceRepo();
    $suppression = $seanceRepo->supprimerSeance($seance);
    if ($suppression) {
        header('Location:../../vue/afficherSeance.php');
    } else {
        echo "erreur";
    }
}else{
    header('Location: afficherSeance.php');
    echo "Vous navez pas de seance a supprimer";
}

