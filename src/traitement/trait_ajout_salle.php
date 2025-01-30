<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Salle.php';
require_once '../Repository/SalleRepo.php';

if(empty($_POST["nomSalle"])||empty($_POST["placeTotale"])){
echo "Veuillez remplir tous les champs";
header(" ../../vue/ajoutSalle.html");
}else{
    $salle = new Salle([
        'nomSalle'=>$_POST['nomSalle'],
        'placeTotale'=>$_POST['placeTotale'],
    ]);
    $salleRepo = new SalleRepo($salle);
    $resultat= $salleRepo->ajouterSalle($salle);
    if($resultat){
        header("Location: ../../index.php");
    }else{
        header("Location: ../../vue/ajoutSalle.html");
    }

}


