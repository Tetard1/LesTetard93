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

    public function modifierSeance(Seance $seance)  {
        $req ='UPDATE `seance` SET ref_film=:refFilm,ref_salle=:refSalle,prix=:prix,
                    heure=:heure,date=:date WHERE id_seance=:idSeance';
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
    public function afficherSeances(){
        $affiche="SELECT *,nom_salle,titre,id_films,id_salle FROM `seance`
            LEFT JOIN films  on ref_films=id_films
            Left JOIN salle  on ref_salle=id_salle";
        $req=$this->bdd->getBdd()->prepare($affiche);
        $req->execute();
        return $req->fetchAll();
    }
    public function afficherLaSeance(Seance $seance)
    {
        $affiche="SELECT *,nom_salle,titre,id_films,id_salle FROM `seance` 
         LEFT JOIN films on id_films=ref_films 
         LEFT JOIN salle on id_salle=ref_salle WHERE id_seance=:idSeance";
        $req=$this->bdd->getBdd()->prepare($affiche);
        $req->execute(array('idSeance' => $seance->getIdSeance()));
        return $req->fetch();
    }
    public function getSalleFilm(){
        $get="SELECT *,nom_salle,titre,id_films,id_salle FROM seance
            LEFT JOIN films on id_films=ref_films 
            LEFT JOIN salle on id_salle=ref_salle";
        $res=$this->bdd->getBdd()->prepare($get);
        $res->execute();
        return $res->fetchAll();
    }
}