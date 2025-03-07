<?php
require_once '../src/modele/Reservation.php';
require_once '../src/repository/ReservationRepo.php';
session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];

} else{
    $id=null;
    header("Location:afficherReservation.php");
}
$seance=new Seance([
    'idSeance'=>$id]);
$seanceRepo=new SeanceRepo();
$resultat=$seanceRepo->afficherLaSeance($seance);
$filmSalle=$seanceRepo->getSalleFilm(); ?>
