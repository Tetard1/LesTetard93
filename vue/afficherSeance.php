<?php
require_once "../src/bdd/BDD.php";
require_once '../src/modele/Seance.php';
require_once '../src/repository/SeanceRepo.php';
session_start();
if (!isset($_SESSION["userConnecte"])) {
    $_SESSION["userConnecte"] = ["role" => "visiteur"];
}
$role = $_SESSION["userConnecte"]["role"];
$seanceRepo = new SeanceRepo();
$resultat = $seanceRepo->afficherSeances();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plus 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .top-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 15px;
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
        }
        td img {
            max-width: 100px;
            display: block;
        }
    </style>
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function filterSeance() {
        let input = document.getElementById("search").value.toLowerCase();
        let rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            let title = row.cells[1].innerText.toLowerCase();
            row.style.display = title.includes(input) ? "" : "none";
        });
    }

    function confirmDelete(id) {
        document.getElementById("confirmDeleteForm").action = "../src/traitement/traitementSuppressionSeance.php?id=" + id;
        var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        confirmModal.show();
    }
</script>

<header>
    <hr>
    <menu class="nav">
        <li>
            <?php if($role=="visiteur"){

            ?>
            <a class="navbar-brand" href="../index.php">
                <?php

                }else{
                    ?>

                <a class="navbar-brand" href="accueil.php">                    <?php
                }?>
                <img src="../assets/img/logoV2.jpg" style="height: 60px; margin-left: 20px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </li>
        <?php
        if($role!="visiteur"){
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Mon compte
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="ModificationUtilisateur.php">Mon profil </a></li>
                    <li><a class="dropdown-item" href="reservationClient.php">Mes reservation</a></li>
                </ul>
            </li>
            <?php
        }else {
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Connexion
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="Connexion.html">Connexion</a></li>
                    <li><a class="dropdown-item" href="Inscription.html">Inscription</a></li>
                </ul>
            </li>
            <?php
        }
        ?>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Films
            </a>
            <ul class="dropdown-menu">
                <?php
                if($role=="admin"){
                    ?>
                    <li><a class="dropdown-item" href="Film.php">Ajout de Films </a></li>
                    <?php
                }?>
                <li><a class="dropdown-item" href="filmAffiche.php">Liste des Films</a></li>
            </ul>
        </li>


        <?php
        if($role=="admin"){
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
                if($role=="admin"){
                    ?>
                    <li><a class="dropdown-item" href="ajoutSeance.php">Ajouter des Seances</a></li>
                    <?php
                }?>
                <li><a class="dropdown-item" href="afficherSeance.php">Liste des Seances</a></li>
            </ul>
        </li>


        <?php
        if($role=="admin"){
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

<div class="container">
    <div class="top-section">
        <h2>Liste des Séances</h2>
    </div>

    <input type="text" id="search" class="search-bar" onkeyup="filterSeance()" placeholder="Rechercher un film...">

    <table class="table">
        <thead>
        <tr>
            <th>Nom de la Salle</th>
            <th>Titre du Film</th>
            <th>Date de la séance</th>
            <th>Heure de la séance</th>
            <th>Places disponibles</th>
            <th>Prix</th>
            <?php
            if($_SESSION["userConnecte"]["role"]=="admin"){
                ?>
            <th>Modifier</th>
            <th>Supprimer</th>
                <?php
            }?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($resultat as $seance): ?>
            <input type="hidden" name="id" value="<?=$seance["id_seance"]?>">
            <tr>
                <td><?= htmlspecialchars($seance["nom_salle"]) ?></td>
                <td><?= htmlspecialchars($seance["titre"]) ?></td>
                <td><?= htmlspecialchars($seance['date']) ?></td>
                <td><?= htmlspecialchars($seance['heure_complete']) ?></td>
                <td><?= $seance['nb_plc_dispo'] ?? $seance['nb_place_dispo'] ?></td>
                <td><?= htmlspecialchars($seance['prix']) ?></td>
                <?php
                if($_SESSION["userConnecte"]["role"]=="admin"){
                ?>
                <td>
                    <a href='modifierSeance.php?id=<?= $seance["id_seance"] ?>'>
                        <button type='button' class='btn btn-warning'>Modifier</button>
                    </a>
                </td>
                    <?php
                }?>
                <td>
                    <button type='button' class='btn btn-danger' onclick="confirmDelete(<?= $seance['id_seance'] ?>)">
                        Supprimer
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette séance ? Cette action est irréversible.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form id="confirmDeleteForm" method="post">
                    <button type="submit" class="btn btn-danger">Confirmer</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
