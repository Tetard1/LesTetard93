<?php
class ReservationRepo {
    private $bdd;
    public function __construct()
    {
        $this->bdd = new BDD();
    }

    public function ajouterReservation(Reservation $reservation){
        $sql= "INSERT INTO reservation (nb_place_reserver,ref_seance,ref_utilisateur) VALUES(:nbPlaceReserver,:refSeance,:refUtilisateur)";
        $req=$this->bdd->getBdd()->prepare($sql);
        $res=$req->execute(array(
            'nbPlaceReserver' => $reservation->getNbPlaceReserver(),
            'refSeance' => $reservation->getRefSeance(),
            'refUtilisateur' => $reservation->getRefUtilisateur(),
        ));
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function afficherReservationsPasse(){
        $afficherReservations="SELECT * FROM reservation
    LEFT JOIN seance on id_seance=ref_seance
    LEFT JOIN films on id_films=ref_films WHERE ref_utilisateur=:refUtilisateur   ";
        $reservations = $this->bdd->getBdd()->query($afficherReservations);
        $reservations->execute(array(
            'refUtilisateur' =>$_SESSION['userConnecte']
        ));
            return $reservations->fetchAll();


    }
    public function supprimerReservation(Reservation $reservation){
        $sql= "DELETE FROM reservation WHERE id_reservation=:idReservation";
        $req=$this->bdd->getBdd()->prepare($sql);
        $res=$req->execute(array(
            'idReservation'=>$reservation->getIdReservation()
        ));
        if($res){
            return true;
        }
        else{
            return false;
        }
    }
    public function modifierReservation(Reservation $reservation){
        $req = 'UPDATE `reservation` SET ref_seance=:refSeance,ref_salle=:refSalle,
heure=:heure,date=:date, nb_place_dispo=:nbPlcDispo WHERE id_reservation=:idReservation';
        $modif = $this->bdd->getBdd()->prepare($req);
        $req = $modif->execute(array(
            'idReservation' => $reservation->getIdReservation(),
            'nbPlaceReserver' => $reservation->getRefSalle(),
            'refSeance' => $reservation->getRefFilms(),
            'refUtilisateur' => $reservation->getDate()
        ));
    }
    public function getSeances($id){
        $date="SELECT id_seance, date, prix FROM seance WHERE ref_films=:films";
        $seance = $this->bdd->getBdd()->prepare($date);
        $seance->execute(array(
            'films'=>$id
        ));
        return $seance->fetchAll();
    }
    public function afficherFilms($id){
        $film="SELECT * FROM films WHERE id_films=:films";
        $films = $this->bdd->getBdd()->prepare($film);
        $films->execute(array(
            'films'=>$id
        ));
        return $films->fetch();
    }
}
