<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Reservation.php';
require_once '../Repository/ReservationRepo.php';
if (isset($_POST["nbPlaceReserver"])) {
    $reservation = new reservation([
        "idReservation" => $_POST["idReservation"],
        'nbPlaceReserver' => $_POST["nbPlaceReserver"],
        'refSeance' => $_POST["refSeance"],
        'refUtilisateur' => $_POST["refUtilisateur"],
    ]);
    $reservationRepo = new ReservationRepo();
    $resultat = $reservationRepo->modifierReservation($reservation);

} else{
    header("Location:../../vue/afficherReservation.php");
}
