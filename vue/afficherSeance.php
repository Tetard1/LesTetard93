<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Seance.php';
require_once '../src/repository/SeanceRepo.php';
session_start();
$_SESSION["id"]=1;
$_SESSION["role"]="admin";
$seanceRepo=new SeanceRepo();
$resultat=$seanceRepo->afficherSeances();

?>
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
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../vue/ModificationUtilisateur.php">Mon compte</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Films
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="Film.php">Ajout de Films </a></li>
                <li><a class="dropdown-item" href="filmAffiche.php">Liste des Films</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Reservations
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="ajoutReservation.php">Ajouter des Reservations</a></li>
                <li><a class="dropdown-item" href="afficherReservation.php">Liste des Reservations</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Seances
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="ajoutSeance.php">Ajouter des Seances</a></li>
                <li><a class="dropdown-item" href="afficherSeance.php">Liste des Seances</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Salles
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="ajoutSalle.php">Ajouter des Salles</a></li>
                <li><a class="dropdown-item" href="afficherSalle.php">Liste des Salles</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Connexion
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="Connexion.html">Connexion</a></li>
                <li><a class="dropdown-item" href="Inscription.html">Inscription</a></li>
            </ul>
        </li>
    </menu>
    <hr>
</header>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Nom de la Salle</th>
        <th scope="col">Titre du Film</th>
        <th scope="col">Date</th>
        <th scope="col">Heure</th>
        <th scope="col">Place Disponibles</th>
        <th scope="col">Prix</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($resultat as $seance) {
        echo "<tr>
        <td>" . $seance["nom_salle"] . "</td>
        <td>" . $seance["titre"] . "</td>
        <td>" . $seance['date'] . "</td>
        <td>" .$seance['heure_complete']. "</td>
        <td>";

        // Corrected PHP logic to check 'nb_plc_dispo'
        if ($seance['nb_plc_dispo'] == null) {
            echo $seance['nb_place_dispo'];
        } else {
            echo $seance['nb_plc_dispo'];
        }

        echo "</td>
        <td>" . $seance['prix'] . "</td>
        <td><a href='modifierSeance.php?id=" . $seance["id_seance"] . "'><button type='button' class='btn btn-warning'>Modifier</button></a></td>
        <td><a href='supprimerSeance.php?id=" . $seance["id_seance"] . "'><button type='button' class='btn btn-danger'>Suppprimer</button></a></td>
    </tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>
