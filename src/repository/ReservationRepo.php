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
            'nbPlaceReserver'=>$reservation->getNbPlaceReserver(),
            'refSeance'=>$reservation->getRefSeance(),
            'refUtilisateur'=>$reservation->getRefUtilisateur()
        ));
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function afficherReservationsPasse(){
        $afficherReservations="SELECT * FROM reservation
    LEFT JOIN utilisateur on id_films=ref_films
    LEFT JOIN seance on id_seance=ref_seance
    LEFT JOIN films on id_films=ref_films WHERE ref_utilisateur=:refUtilisateur   
    ORDER BY date_reservation";
        $reservations = $this->bdd->getBdd()->query($afficherReservations);

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
        
    }

}
