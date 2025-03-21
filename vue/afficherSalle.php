<?php
require_once "../src/bdd/BDD.php";
require_once '../src/modele/Salle.php';
require_once '../src/repository/SalleRepo.php';
session_start();
if($_SESSION["userConnecte"]["role"]=="user"){
    header('Location:../vue/accueil.php');
}
$salleRepo = new SalleRepo();
$resultat = $salleRepo->afficherSalle();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Liste des Salles</title>
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
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    function filterSalle() {
        let input = document.getElementById("search").value.toLowerCase();
        let rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            let title = row.cells[0].innerText.toLowerCase();
            row.style.display = title.includes(input) ? "" : "none";
        });
    }

    function confirmDelete(id) {
        document.getElementById("confirmDeleteForm").action = "../src/traitement/traitementSuppSalle.php?id=" + id;
        var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        confirmModal.show();
    }
</script>

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

<div class="container">
    <div class="top-section">
        <h2>Liste des Salles</h2>
    </div>

    <input type="text" id="search" class="search-bar" onkeyup="filterSalle()" placeholder="Rechercher une salle">

    <table>
        <thead>
        <tr>
            <th>Nom de la Salle</th>
            <th>Place Disponibles</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($resultat as $salle): ?>
            <tr>
                <td><?= htmlspecialchars($salle['nom_salle']) ?></td>
                <td><?= $salle["place_totale"] ?></td>
                <td><a href='modifSalle.php?id=<?= $salle["id_salle"] ?>'><button type='button' class='btn btn-warning'>Modifier</button></a></td>
                <td><button type='button' class='btn btn-danger' onclick="confirmDelete(<?= $salle['id_salle'] ?>)">Supprimer</button></td>
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
                Êtes-vous sûr de vouloir supprimer cette salle ? Cette action est irréversible.
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
