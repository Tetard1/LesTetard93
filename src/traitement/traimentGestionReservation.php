<?php
require_once "../bdd/BDD.php";
require_once '../modele/Reservation.php';
require_once '../Repository/ReservationRepo.php';

    if (empty($_POST["nbPlaceReserver"])) {

        echo "C'est pas bien ...";
        header("Location: ../../vue/ajoutReservation.php");
    } else {
        $reservation = new reservation([
            'nbPlaceReserver' => $_POST["nbPlaceReserver"],
            'refSeance' => $_POST["refSeance"],
            'refUtilisateur' => $_POST["refUtilisateur"],
        ]);
        $ReservationRepo = new ReservationRepo();
        $resultat = $ReservationRepo->ajouterReservation($reservation);

        if ($resultat) {

            header("Location: ../../vue/accueil.php");
        } else {
            header("Location: ../../vue/index.php");
        }
    }

