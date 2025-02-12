<?php
require_once "../src/bdd/BDD.php";
require_once '../src/modele/Utilisateur.php';
require_once '../src/repository/RepositoryUtilisateur.php';
session_start();
//var_dump($_SESSION);
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
  <title>Gestion Utilisateur</title>
</head>
<div class="container mt-4">
  <h1>Modifier un Utilisateur</h1>
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
    <div class="mb-3">
      <label for="mdp" class="form-label">Mot de passe :</label>
      <input type="password" class="form-control" id="mdp" name="mdp" value="<?=$result["mdp"]?>">
    </div>
    <div class="mb-3">
      <label for="role" class="form-label">Rôle :</label>
      <input type="text" class="form-control" id="role" name="role" value="<?=$result["role"]?>">
    </div>
    <input type="submit" class="btn btn-warning" value="Modifier">
  </form>

  <h1 class="mt-5">Supprimer un Utilisateur</h1>
  <form action="../src/traitement/TraitementSuppressionUtilisateur.php" method="post">
    <input type="hidden" name="action" value="suppression">
    <div class="mb-3">
      <input type="hidden" class="form-control" id="idUtilisateur" name="idUtilisateur" value="<?=$_SESSION["userConnecte"]['idUtilisateur']?>">
    </div>
    <button type="submit" class="btn btn-danger">Supprimer</button>
  </form>
</div>
