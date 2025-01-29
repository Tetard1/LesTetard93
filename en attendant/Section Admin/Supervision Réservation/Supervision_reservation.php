<?php

use Bdd\BDD;

session_start();
$bdd = new BDD();
$req = $bdd->getBdd()->prepare('SELECT * FROM reservation');
$req->execute();
$reservations = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Gestion reservation</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<hr>
<header>
    <menu class="nav">
        <li>
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../Espace%20Admin/IndexAdmin.php">Mon compte</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../Gestion%20film/Gestion_Film.php">Films</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../Gestion%20Séance/Gestion_Seance.php">Séances</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../Supervision%20Réservation/Supervision_reservation.php">Reservations</a>
        </li>
    </menu>
</header>
<hr>
<form action="Supervision_reservation.php" method="Post">
    <table>
        <?php

        if ($reservations != NULL) {
            if ($_SESSION["role"] == "admin") {
                foreach ($reservations as $reservation) {
                    echo "
                <thead>
                <tr>
                    <tr>
                <th>nombre de place reserver</th>
                <th>Heure</th>
                <th>Date</th>
                <th>Nombre de place disponible</th>
        </tr>
                    <th>Supprimer</th>
                </tr>
                </thead> 
                <tbody><tr>
                    <td><input type='date' name='date' value='" . $reservation['date'] . "'></td>
                    <td><input type='time' name='heure' value='" . $reservation['heure'] . "'></td>
                    <td><input type='number' name='dispo' value='" . $reservation['nb_place_dispo'] . "'></td>
                    <td><input type='checkbox' name='suppprimer'></td>
                </tr>
                <tr>
                                 <td><input type='submit' value='modifier'</td>
                                   <td><input type='submit' value='supprimer' </td>
                                    </tr> ";
                }
            }
        } else {
            echo " <tr>
                                <td><label for='date'>Saisir une Date :</label></td>
                                <td><input type='date' name='date' id='date'></td>
                                </tr>
                                <tr>
                                 <td><label for='heure'>Saisir une heure:</label></td>
                                <td><input type='time' name='heure' id='heure'></td>
                                <tr>
                                 <td><label for='nbdispo'>Saisir le nombre de place dispoonible :</label></td>
                                <td><input type='number' name='nbdispo' id='nbdispo'></td>
                                </tr>
                                <tr>
                                <td><input type='submit' name='ajout' value='Ajouter'></td>
                                </tr>
                                 </tbody>
                                ";
        }
        ?>
        </tbody>
    </table>
</form>

