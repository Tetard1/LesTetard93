<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Reservation.php';
require_once '../Repository/ReservationRepo.php';

$reservation = new reservation([
        'refUtilisateur' => $_POST["refUtilisateur"],
    ]);
    $reservationRepo = new ReservationRepo();
    $resultat = $reservationRepo->supprimerReservation($reservation);
