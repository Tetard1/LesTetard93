<?php
require_once '../src/bdd/Bdd.php';
session_start();
$_SESSION["id"]=1;
$_SESSION["role"]="admin";
$bdd = new Bdd();
$req=$bdd->getBdd()->prepare("SELECT *,nom_salle,titre,id_films,id_salle FROM `seance`
            LEFT JOIN films  on ref_films=id_films
            Left JOIN salle  on ref_salle=id_salle");
$req->execute();
$seances = $req->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Gestion Des Séances</title>
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
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Films
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Ajout de Films </a></li>
                <li><a class="dropdown-item" href="#">Liste des Films</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Supprimer Des Films</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Reservations
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Ajouter des Reservations</a></li>
                <li><a class="dropdown-item" href="#">Liste des Reservations</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Supprimer Des Reservations</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Seances
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="ajoutSeance.php">Ajouter des Seances</a></li>
                <li><a class="dropdown-item" href="afficherSeance.php">Liste des Seances</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="supprimerSeance.php">Supprimer Des Seance</a></li>
            </ul>
        </li>
    </menu>
</header>
<hr>
<form action="../src/traitement/traitementModifSeance.php" method="post">
<table>
    <thead>
    <tr>
        <th>Nom de la salle</th>
        <th>Nom du film</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Nb de place disponibles</th>
        <th>Prix de la seance</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($seances as $seance){
        echo "<tr>
                <td><select name=".'refSalle'." id=".'nomSalle'.">
                    <option value='".$seance["id_salle"]."'>".$seance["nom_salle"]."</option>
                 </select>
                
                </td>
                <td><select name=".'refFilm'." id=".'titreFilm'.">
                   <option value='".$seance["id_films"]."'>".$seance["titre"]."></option>
                        </select>
                        </td>
                <td><input type='date' name='date' value='".$seance['date']."'></td>
                <td><input type='time' name='heure' value='".$seance['heure']."'></td>
                <td><input type='number' name='nbPlace' value='".$seance['nb_place_dispo']."'></td>
                <td><input type='number' name='prix' value='".$seance['prix']."'></td>
               </tr>";
    }
    ?>
    </tbody>
</table>
</form>
</body>
</html>
