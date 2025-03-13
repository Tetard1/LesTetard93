<?php
require_once "../src/bdd/BDD.php";
require_once '../src/modele/Utilisateur.php';
require_once '../src/repository/RepositoryUtilisateur.php';
session_start();
if(!isset($_SESSION["userConnecte"])){
    header('Location:../index.php');
    session_destroy();
}
$user=new Utilisateur([
        'idUtilisateur'=>$_SESSION['userConnecte']['idUtilisateur'],
]);
$repository=new RepositoryUtilisateur();
$result=$repository->afficherUtilisateur($user);
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
<div class="container">
    <h1>Modification du compte</h1>
    <form action="../src/traitement/TraitementModifUtilisateur.php" method="post">
        <input type="hidden" name="action" value="modification">
        <div class="mb-3">
            <input type="hidden" class="form-control" id="idUtilisateur" name="idUtilisateur" value="<?=$_SESSION["userConnecte"]['idUtilisateur']?>">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?=$result["nom"]?>">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?=$result["prenom"]?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=$result["email"]?>">
        </div>
        <input type="submit" class="btn btn-warning" value="Modifier">
    </form>
    <div class="mb-3">
        <label for="mdp" class="form-label">Mot de passe :</label>
        <a href="modifMdp.php" role="button" class="btn btn-secondary">Modifier le mot de passe</a>
    </div>

    <h1 class="mt-5">Deconnexion du compte</h1>
    <form action="../src/traitement/DecoTraitement.php" method="post">
        <input type="submit" class="btn btn-primary" value="Deconnexion" name="deconnexion">
        <?php session_destroy()?>
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
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

