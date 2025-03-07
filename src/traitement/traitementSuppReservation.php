<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Reservation.php';
require_once '../Repository/ReservationRepo.php';
var_dump($_GET['id']);
$reservation = new reservation([
        'idReservation' => $_GET["id"],
    ]);
    $reservationRepo = new ReservationRepo();
    var_dump($reservation);
    $resultat = $reservationRepo->supprimerReservation($reservation);
if ($resultat) {
    var_dump($resultat);
    header('Location:../../vue/accueil.php');
}
else {
    echo "erreur";
}

