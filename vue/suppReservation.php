<?php
require_once "../src/bdd/BDD.php";
require_once '../src/modele/Reservation.php';
require_once '../src/repository/ReservationRepo.php';
session_start();
if($_SESSION["userConnecte"]["role"]=="user"){
    header('Location:../vue/accueil.php');
}
if(isset($_GET['id'])){
    $id=$_GET['id'];

} else{
    $id=null;
    header("Location:afficherReservation.php");
}
$reservationRepo=new ReservationRepo();
$resultat=$reservationRepo->afficherLaReservation($id); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Plus 2</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<header>
    <hr>
    <menu class="nav">
        <li>
            <a class="navbar-brand" href="accueil.php"><img src="../assets/img/logoV2.jpg" style="height: 60px; margin-left: 20px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Mon compte
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="ModificationUtilisateur.php">Mon profil </a></li>
                <li><a class="dropdown-item" href="reservationClient.php">Mes reservation</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Films
            </a>
            <ul class="dropdown-menu">
                <?php
                if($_SESSION["userConnecte"]["role"]=="admin"){
                    ?>
                    <li><a class="dropdown-item" href="Film.php">Ajout de Films </a></li>
                    <?php
                }?>
                <li><a class="dropdown-item" href="filmAffiche.php">Liste des Films</a></li>
            </ul>
        </li>


        <?php
        if($_SESSION["userConnecte"]["role"]=="admin"){
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Reservations
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="ajoutReservation.php">Ajouter des Reservations</a></li>
                    <li><a class="dropdown-item" href="afficherReservation.php">Liste des Reservations</a></li>
                </ul>
            </li>
            <?php
        }?>



        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Seances
            </a>
            <ul class="dropdown-menu">
                <?php
                if($_SESSION["userConnecte"]["role"]=="admin"){
                    ?>
                    <li><a class="dropdown-item" href="ajoutSeance.php">Ajouter des Seances</a></li>
                    <?php
                }?>
                <li><a class="dropdown-item" href="afficherSeance.php">Liste des Seances</a></li>
            </ul>
        </li>


        <?php
        if($_SESSION["userConnecte"]["role"]=="admin"){
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Salles
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="ajoutSalle.php">Ajouter des Salles</a></li>
                    <li><a class="dropdown-item" href="afficherSalle.php">Liste des Salles</a></li>
                </ul>
            </li>
            <?php
        }?>


    </menu>
    <hr>
</header>
<h2>Supprimer une Reservation</h2>
<form action="../src/traitement/traitementSuppReservation.php" method="post">
    <table>
        <tbody>
        <tr>
            <td><input type="hidden" value="<?=$id?>" name="idReservation"></td>
        </tr>
        <tr>
            <td><input type="hidden" value="<?=$_SESSION['userConnecte']['idUtilisateur']?>" name="refUtilisateur"></td>
        </tr>
        <tr>
            <td><label for="dateSeance">Date de la seance : </label></td>
            <td> <?= $resultat["date"]?></td>
        </tr>
        <tr>
            <td><label for='nbPlaceReserver'>Nombre de place reservé : </label></td>
            <td><?=$resultat["nb_place_reserver"]?></td>
        </tr>
        <tr>
            <td>
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" name="supprimerReservation" value="Supprimer ">
                </div>
            </td>
</body>
</html>
