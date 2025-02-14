<?php
require_once '../src/bdd/Bdd.php';
session_start();
$_SESSION["id"]=1;
$_SESSION["role"]="admin";
$bdd = new Bdd();
$req=$bdd->getBdd()->prepare("SELECT id_films,titre FROM `films`");
$req->execute();
$films = $req->fetchAll();
$res=$bdd->getBdd()->prepare("SELECT id_salle,nom_salle FROM `salle`");
$res->execute();
$salles = $res->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Gestion Des Salles</title>
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
                    <a class="nav-link active" aria-current="page" href="../vue/ModificationUtilisateur.php">Mon compte</a>
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
                        <li><a class="dropdown-item" href="supprimerSeance.php">Supprimer Des Seances</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Salles
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="ajoutSalle.php">Ajouter des Salles</a></li>
                    <li><a class="dropdown-item" href="afficherSalle.php">Liste des Salles</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="modifSalle.php">Modification Des Salles</a></li>
                </ul>
                </li>
            </menu>
        </header>
        <hr>
        <form action="../src/traitement/traitementAjoutSalle.php" method="post">
            <table>
                <tbody>
                    <tr>
                        <td><label for="nomSalle">Veuillez choisir le nom de la salle : </label></td>
                        <td><input type="text" class="form-control" id="nomSalle" name="nomSalle"></td>
                    </tr>
                    <tr>
                        <td><label for='placeTotale'>Saisir le nombre de place disponible : </label></td>
                        <td><input type="number" name='placeTotale' id='placeTotale'></td>
                    </tr>
                    <tr>
                        <td><input type='submit' value="Ajouter"></td>
                    </tr>
                </tbody>
            </table>
        </form>
