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
    public function afficherSeance(){
        $req = $this->bdd->getBdd()->prepare('SELECT * FROM `seance`
            INNER JOIN films on ref_films=id_films
            INNER JOIN salle on ref_salle=id_salle;');
        $req->execute();
        $seances = $req->fetchAll();
    }
    public function modifierSeance(Seance $seance){
        $req ='UPDATE `seance` WHERE ref_films=:idfilms and ref_salle=:idsalle';
        $modifier = $this->bdd->getBdd()->prepare($req);
        $res=$modifier->execute(array(
            'idfilms' => $seance->getRefFilms(),
            'idsalle' => $seance->getRefSalle(),
            ''

        ));
    }
}