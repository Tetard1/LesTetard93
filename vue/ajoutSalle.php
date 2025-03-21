<?php
require_once "../src/bdd/BDD.php";
require_once '../src/modele/Salle.php';
require_once '../src/repository/SalleRepo.php';
session_start();
if(!isset($_SESSION["userConnecte"])){
    header('Location:../index.php');
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Plus 2</title>
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
    </body>
    <body>
        <div class="container mt-4">
            <h1>Ajouter une nouvelle salle</h1>
            <form action="../src/traitement/traitementAjoutSalle.php" method="post">
                <div class="mb-3">
                    <label for="nomSalle" class="form-label">Nom de la salle :</label>
                    <input type="text" class="form-control" id="nomSalle" name="nomSalle">
                </div>
                <div class="mb-3">
                    <label for="placeTotale" class="form-label">Nombre de place disponible :</label>
                    <input type="text" class="form-control" id="placeTotale" name="placeTotale">
                </div>
                <a href="accueil.php"><button type='button' class='btn btn-primary'">retour</button></a>
                <a><input type="submit" value="ajouter" class="btn btn-warning"></a>
                <input type="reset" value="reset" class="btn btn-danger">
            </form>
        </div>
    </body>
</html>