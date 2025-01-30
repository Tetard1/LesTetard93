<?php

class SalleRepo{
    private $bdd;
    public function __construct($bdd){
        $this->bdd = new BDD();
    }

    public function ajouterSalle(Salle $salle){
        $sql="INSERT INTO salle(nom_salle,place_totale) VALUES(:nomSalle,:placeTotale)";
        $req=$this->bdd->getBdd()->prepare($sql);
        $res=$req->execute(array(
            "nomSalle"=>$salle->getNomSalle(),
            "placeTotale"=>$salle->getPlaceTotale()
        ));
        if($res){
            return true;
        }else{
            return false;
        }
    }

}