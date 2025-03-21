<?php
require_once "../bdd/BDD.php";
require_once '../modele/Reservation.php';
require_once '../Repository/ReservationRepo.php';
if (isset($_POST["nbPlaceReserver"])) {
    var_dump($_POST);
    $reservation = new reservation([
        "idReservation" => $_POST["idReservation"],
        'nbPlaceReserver' => $_POST["nbPlaceReserver"],
        'refSeance' => $_POST["refSeance"],
        'refUtilisateur' => $_POST["refUtilisateur"],
    ]);
    $reservationRepo = new ReservationRepo();
    $resultat = $reservationRepo->modifierReservation($reservation);
    header("Location:../../vue/reservationClient.php");

} else{
    header("Location:../../vue/afficherReservation.php");
}
