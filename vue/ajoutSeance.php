<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Seance.php';
require_once '../src/repository/SeanceRepo.php';
session_start();
if($_SESSION["userConnecte"]["userPrenom"]==null||$_SESSION["userConnecte"]["idUtilisateur"]==null){
    header('Location:../accueil.php');
    session_destroy();
}

$seanceRepo = new SeanceRepo();
$films = $seanceRepo->getFilm();
$salles = $seanceRepo->getSalle();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Ajouter une Séance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .top-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        .top-section h2 {
            text-align: center;
            width: 100%;
        }
        .top-section button {
            margin: 3px;
            padding: 5px 10px;
            font-size: 14px;
            width: 110px;
        }
        button {
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .search-bar {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        td img {
            max-width: 100px;
            display: block;
        }
    </style>
</head>
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

    </menu>
    <hr>
</header>
<body>
<div class="container mt-4">
    <h1>Ajouter une Nouvelle Séance</h1>
    <form action="../src/traitement/traitementAjoutSeance.php" method="post">
        <div class="mb-3">
            <label for="date" class="form-label">Date de la séance :</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="mb-3">
            <label for="heure" class="form-label">Heure de la séance :</label>
            <input type="time" class="form-control" id="heure" name="heure">
        </div>
        <div class="mb-3">
            <label for="titreFilm" class="form-label">Choisissez le film :</label>
            <select class="form-control" id="titreFilm" name="refFilm">
                <?php foreach ($films as $film) {
                    echo "<option value='" . $film["id_films"] . "'>" . $film["titre"] . "</option>";
                } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="nomSalle" class="form-label">Choisissez la salle :</label>
            <select class="form-control" id="nomSalle" name="refSalle">
                <?php foreach ($salles as $salle) {
                    echo "<option value='" . $salle["id_salle"] . "'>" . $salle["nom_salle"] . "</option>";
                } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="nbdispo" class="form-label">Places disponibles :</label>
            <select class="form-control" id="nbdispo" name="nbPlcDispo">
                <?php foreach ($salles as $salle) {
                    echo "<option value='" . $salle["place_totale"] . "'>" . $salle["nom_salle"] . " : " . $salle["place_totale"] . " places</option>";
                } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix de la séance (€) :</label>
            <input type="number" class="form-control" id="prix" name="prixPlc">
        </div>
        <a href="accueil.php" class="btn btn-primary">Retour</a>
        <input type="submit" value="Ajouter" class="btn btn-warning">
        <input type="reset" value="Réinitialiser" class="btn btn-danger">
    </form>
</div>
</body>
</html>
