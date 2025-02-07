<?php

class SeanceRepo
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new BDD();
    }

    public function ajouterSeance(Seance $seance)
    {
        $req = 'INSERT INTO `seance`(date,heure,nb_place_dispo,ref_films,ref_salle,prix)
VALUES(:date,:heure,:nbplacedispo,:films,:salle,:prix)';
        $ajout = $this->bdd->getBdd()->prepare($req);
        $res = $ajout->execute(array(
            'date' => $seance->getDate(),
            'heure' => $seance->getHeure(),
            'nbplacedispo' => $seance->getNbPlcDispo(),
            'films' => $seance->getRefFilms(),
            'salle' => $seance->getRefSalle(),
            'prix' => $seance->getPrixPlc()
        ));
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function modifierSeance(Seance $seance)
    {
        $req = 'UPDATE `seance` SET ref_films=:refFilms,ref_salle=:refSalle,prix=:prixPlc,
heure=:heure,date=:date, nb_place_dispo=:nbPlcDispo WHERE id_seance=:idSeance';
        $modif = $this->bdd->getBdd()->prepare($req);
        $req = $modif->execute(array(
            'idSeance' => $seance->getIdSeance(),
            'refSalle' => $seance->getRefSalle(),
            'refFilms' => $seance->getRefFilms(),
            'date' => $seance->getDate(),
            'heure' => $seance->getHeure(),
            'nbPlcDispo' => $seance->getNbPlcDispo(),
            'prixPlc' => $seance->getPrixPlc()
        ));
        if ($req) {
            return true;
        } else {
            return false;
        }
    }

    public function afficherSeances()
    {
        $affiche = "SELECT *,DATE_FORMAT(heure,'%H:%i') as heure_complete,(nb_place_dispo-nb_place_reserver) as nb_plc_dispo,nom_salle,titre,id_films,id_salle FROM `seance`
LEFT JOIN films on id_films=ref_films
LEFT JOIN salle on id_salle=ref_salle
LEFT JOIN reservation on id_seance=ref_seance";
        $req = $this->bdd->getBdd()->prepare($affiche);
        $req->execute();
        return $req->fetchAll();
    }

    public function afficherLaSeance(Seance $seance)
    {
        $affiche = "SELECT *,DATE_FORMAT(heure,'%H:%i') as heure_complete,(nb_place_dispo-nb_place_reserver) as nb_plc_dispo,nom_salle,titre,id_films,id_salle FROM `seance`
LEFT JOIN films on id_films=ref_films
LEFT JOIN salle on id_salle=ref_salle
LEFT JOIN reservation on id_seance=ref_seance WHERE id_seance=:idSeance";
        $req = $this->bdd->getBdd()->prepare($affiche);
        $req->execute(array('idSeance' => $seance->getIdSeance()));
        return $req->fetch();
    }

    public function getSalleFilm()
    {
        $get = "SELECT *,nom_salle,titre,id_films,id_salle FROM seance
LEFT JOIN films on id_films=ref_films
LEFT JOIN salle on id_salle=ref_salle";
        $res = $this->bdd->getBdd()->prepare($get);
        $res->execute();
        return $res->fetchAll();
    }

    public function getFilm()
    {
        $get="SELECT titre,id_films FROM films";
        $res = $this->bdd->getBdd()->prepare($get);
        $res->execute();
        return $res->fetchAll();
    }
    public function getSalle()
    {
        $show="SELECT id_salle,nom_salle FROM salle";
        $res = $this->bdd->getBdd()->prepare($show);
        $res->execute();
        return $res->fetchAll();
    }
    public function supprimerSeance($seance)
    {
        $supprimer = "DELETE FROM `seance` WHERE id_seance=:idSeance";
        $sup = $this->bdd->getBdd()->prepare($supprimer);
        $sup->execute(array('idSeance' => $seance->getIdSeance()));
        if ($sup) {
            return true;

        } else {
            return false;
        }
    }
}
?>