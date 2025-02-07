<?php

class SeanceRepo {
    private $bdd;
    public function __construct()
    {
        $this->bdd = new BDD();
    }

    public function ajouterSeance(Seance $seance){
        $req ='INSERT INTO `seance`(date,heure,nb_place_dispo,ref_films,ref_salle,prix) 
VALUES(:date,:heure,:nbplacedispo,:films,:salle,:prix)';
        $ajout = $this->bdd->getBdd()->prepare($req);
        $res=$ajout->execute(array(
            'date' => $seance->getDate(),
            'heure' => $seance->getHeure(),
            'nbplacedispo' => $seance->getNbPlcDispo(),
            'films'=> $seance->getRefFilms(),
            'salle'=> $seance->getRefSalle(),
            'prix'=> $seance->getPrixPlc()
        ));
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function modifierSeance(Seance $seance){
        $req ='UPDATE `seance` WHERE id_seance=:id';
        $modifier = $this->bdd->getBdd()->prepare($req);
        $res=$modifier->execute(array(
            'idfilms' => $seance->getRefFilms(),
            'idsalle' => $seance->getRefSalle(),
            ''

        ));
    }
}