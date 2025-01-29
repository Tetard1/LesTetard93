<?php

class SeanceRepo {
    private $bdd;

    public function ajouterSeance(){
        $ajout = $this->bdd->getBdd()->prepare('INSERT INTO `seance`(date,heure,nb_place_dispo,ref_films,ref_salle,prix) VALUES(:date,:heure,:nbplacedispo,:films,:salle,:prix)');
        $ajout->execute(array(
            'date' => getDate(),
            'heure' => getHeure(),
            'nb_place_dispo' =>getNbPlcDispo(),
            'films'=>getRefFilms(),
            'salle'=>getRefSalle(),
            'prix'=>getPrixPlc()
        ));
    }
    public function afficherSeance(){
        $req = $this->bdd->getBdd()->prepare('SELECT * FROM `seance`
            INNER JOIN films on ref_films=id_films
            INNER JOIN salle on ref_salle=id_salle;');
        $req->execute();
        $seances = $req->fetchAll();

    }
}