<?php
class ReservationRepo {
    private $bdd;
    public function __construct()
    {
        $this->bdd = new BDD();
    }

    public function ajouterReservation(Reservation $reservation){
        $sql= "INSERT INTO reservation (nb_place_reserver,ref_seance) VALUES(:nbPlaceReserver,:refSeance)";
        $req=$this->bdd->getBdd()->prepare($sql);
        $res=$req->execute(array(
            'nbPlaceReserver'=>$reservation->getNbPlaceReserver(),
            'refSeance'=>$reservation->getRefSeance()
        ));
        if($res){
            return true;
        }else{
            return false;
        }
    }

}
