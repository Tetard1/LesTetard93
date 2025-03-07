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
    public function afficherReservationsPasse($reservation){
        $afficherReservations="SELECT * FROM reservation
    LEFT JOIN seance on id_seance=ref_seance
    LEFT JOIN films on id_films=ref_films WHERE ref_utilisateur=:refUtilisateur   ";
        $reservations = $this->bdd->getBdd()->prepare($afficherReservations);
        $reservations->execute(array(
            'refUtilisateur' =>$reservation->getRefUtilisateur(),
        ));
            return $reservations->fetchAll();
    }
    public function afficherReservations(){
        $afficherReservations="SELECT *,DATE_FORMAT(heure,'%H:%i') as heure_complete,titre,date,(prix*nb_place_reserver) as prix FROM reservation
    LEFT JOIN seance on id_seance=ref_seance
    LEFT JOIN films on id_films=ref_films";
        $reservations = $this->bdd->getBdd()->query($afficherReservations);
        $reservations->execute();
        return $reservations->fetchAll();
    }
    public function supprimerReservation(Reservation $reservation){
        $sql= "DELETE FROM reservation WHERE id_reservation=:idReservation AND ref_utilisateur=:refUtilisateur";
        $req=$this->bdd->getBdd()->prepare($sql);
        $res=$req->execute(array(
            'idReservation'=>$reservation->getIdReservation(),
            'refUtilisateur' =>$reservation->getRefUtilisateur(),
        ));
        if($res){
            return true;
        }
        else{
            return false;
        }
    }
    public function modifierReservation(Reservation $reservation){
        $req = 'UPDATE `reservation` SET ref_seance=:refSeance,
nb_place_reserver=:nbPlaceReserver WHERE id_reservation=:idReservation';
        $modif = $this->bdd->getBdd()->prepare($req);
        $req = $modif->execute(array(
            'idReservation' => $reservation->getIdReservation(),
            'nbPlaceReserver' => $reservation->getNbPlaceReserver(),
            'refSeance' => $reservation->getRefSeance(),
            'refUtilisateur' => $reservation->getRefUtilisateur(),
        ));
    }
    public function getSeances($id){
        $date="SELECT id_seance, date, prix FROM seance WHERE ref_films=:films OR id_seance=:seance";
        $seance = $this->bdd->getBdd()->prepare($date);
        $seance->execute(array(
            'films'=>$id,
            'seance'=>$id,
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
    public function afficherLaReservation($id){
        $show="SELECT *,titre,id_films,date FROM reservation
LEFT JOIN seance on id_seance=ref_seance
    LEFT JOIN films on id_films=ref_films
     WHERE id_reservation=:idReservation";
        $reservations = $this->bdd->getBdd()->prepare($show);
        $reservations->execute(array(
            'idReservation'=>$id
        ));
        return $reservations->fetch();
    }
}
