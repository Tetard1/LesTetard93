<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Reservation.php';
require_once '../src/repository/ReservationRepo.php';
session_start();
if($_SESSION["userConnecte"]["role"]=="user"){
    header('Location:../vue/accueil.php');
}
$reservationRepo = new ReservationRepo();
$resultat = $reservationRepo->afficherReservations();
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
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .top-section {
            text-align: center;
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
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function filterReservation() {
        let input = document.getElementById("search").value.toLowerCase();
        let rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            let title = row.cells[0].innerText.toLowerCase();
            row.style.display = title.includes(input) ? "" : "none";
        });
    }

    function confirmDelete(id) {
        document.getElementById("confirmDeleteForm").action = "../src/traitement/traitementSuppReservation.php?id=" + id;
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
        <h2>Liste des Réservations</h2>
    </div>

    <input type="text" id="search" class="search-bar" onkeyup="filterReservation()" placeholder="Rechercher une réservation...">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Titre du Film</th>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Places Réservées</th>
            <th scope="col">Prix</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($resultat as $reservation): ?>
            <tr>
                <td><?= htmlspecialchars($reservation['titre']) ?></td>
                <td><?= $reservation['date'] ?></td>
                <td><?= $reservation['heure_complete'] ?></td>
                <td><?= $reservation['nb_place_reserver'] ?></td>
                <td><?= $reservation['prix_complet'] ?></td>
                <td>
                    <a href='modifReservation.php?id=<?= $reservation["id_reservation"] ?>'>
                        <button type='button' class='btn btn-warning'>Modifier</button>
                    </a>
                </td>
                <td>
                    <button type='button' class='btn btn-danger' onclick="confirmDelete(<?= $reservation['id_reservation'] ?>)">
                        Supprimer
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modale de confirmation Bootstrap -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette réservation ? Cette action est irréversible.
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
