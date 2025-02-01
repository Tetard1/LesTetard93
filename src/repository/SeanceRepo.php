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

    public function modifierSalle(Seance $seance)  {
        $req ='UPDATE `seance` SET ref_film=:refFilm,ref_salle=:refSalle,prix=:prix,
                    heure=:heure,date=:date WHERE id=:idSeance';
        $modif=$this->bdd->getBdd()->prepare($req);
        $req=$modif->execute(array(
            'date' => $seance->getDate(),
            'heure' => $seance->getHeure(),
            'nbplacedispo' => $seance->getNbPlcDispo(),
            'films'=> $seance->getRefFilms(),
            'salle'=> $seance->getRefSalle(),
            'prix'=> $seance->getPrixPlc()
        ));
        if($req){
            return true;
        }
        else{
            return false;
        }
    }
}