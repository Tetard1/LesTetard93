<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Reservation.php';
require_once '../Repository/ReservationRepo.php';
if(empty($_POST["nbPlaceReserver"])){

    echo "C'est pas bien ...";
    header("Location: ../../vue/ajoutReservation.html");
}else{
    $reservation = new reservation([
        'nbPlaceReserver' => $_POST["nbPlaceReserver"],
        'refSeance' => $_POST["refSeance"],
    ]);
    $ReservationRepo = new ReservationRepo();
    $resultat = $ReservationRepo->ajouterReservation($reservation);

    if($resultat){
        header("Location: ../../index.php");
    }else{
        header("Location: ../../vue/ajoutReservation.html");
    }

}