<?php
require_once "../src/bdd/BDD.php";
require_once '../src/modele/Utilisateur.php';
require_once '../src/repository/RepositoryUtilisateur.php';
session_start();

$user = new Utilisateur([
    'idUtilisateur' => $_SESSION['userConnecte']['idUtilisateur'],
]);
$repository = new RepositoryUtilisateur();
$result = $repository->afficherUtilisateur($user);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification du compte</title>
    <!-- Bootstrap CSS -->
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
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<header>
    <hr>
    <menu class="nav">
        <li>
            <a class="navbar-brand" href="accueil.php"><img src="../assets/img/logoV2.jpg" style="height: 60px; margin-left: 20px;"></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Mon compte
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="ModificationUtilisateur.php">Mon profil </a></li>
                <li><a class="dropdown-item" href="reservationClient.php">Mes réservations</a></li>
            </ul>
        </li>
    </menu>
    <hr>
</header>

<div class="container">
    <h1>Modification du compte</h1>
    <form action="../src/traitement/TraitementModifUtilisateur.php" method="post">
        <input type="hidden" name="action" value="modification">
        <input type="hidden" name="idUtilisateur" value="<?= $_SESSION["userConnecte"]['idUtilisateur'] ?>">

        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= $result["nom"] ?>">
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $result["prenom"] ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $result["email"] ?>">
        </div>

        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="mdp" name="mdp" value="<?= $result["mdp"] ?>">
        </div>

        <input type="submit" class="btn btn-warning" value="Modifier">
    </form>

    <h1 class="mt-5">Déconnexion du compte</h1>
    <form action="../src/traitement/DecoTraitement.php" method="post">
        <input type="submit" class="btn btn-primary" value="Déconnexion" name="deconnexion">
    </form>

    <h1 class="mt-5">Suppression du compte</h1>

    <!-- Bouton pour ouvrir la modale -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">
        Supprimer
    </button>

    <!-- Modale Bootstrap -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form action="../src/traitement/TraitementSuppressionUtilisateur.php" method="post">
                        <input type="hidden" name="action" value="suppression">
                        <input type="hidden" name="idUtilisateur" value="<?= $_SESSION["userConnecte"]['idUtilisateur'] ?>">
                        <button type="submit" class="btn btn-danger">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
