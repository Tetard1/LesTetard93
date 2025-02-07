<?php
session_start();
var_dump($_SESSION);
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
      <label for="idUtilisateur" class="form-label">ID Utilisateur :</label>
      <input type="number" class="form-control" id="idUtilisateur" name="idUtilisateur" required>
    </div>
    <div class="mb-3">
      <label for="nom" class="form-label">Nom :</label>
      <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="mb-3">
      <label for="prenom" class="form-label">Prénom :</label>
      <input type="text" class="form-control" id="prenom" name="prenom" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email :</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
      <label for="mdp" class="form-label">Mot de passe :</label>
      <input type="password" class="form-control" id="mdp" name="mdp" required>
    </div>
    <div class="mb-3">
      <label for="role" class="form-label">Rôle :</label>
      <input type="text" class="form-control" id="role" name="role" required>
    </div>
    <button type="submit" class="btn btn-warning">Modifier</button>
  </form>

  <h1 class="mt-5">Supprimer un Utilisateur</h1>
  <form action="../src/traitement/TraitementSuppressionUtilisateur.php" method="post">
    <input type="hidden" name="action" value="suppression">
    <div class="mb-3">
      <label for="idUtilisateur" class="form-label">ID Utilisateur :</label>
      <input type="number" class="form-control" id="idUtilisateur" name="idUtilisateur" required>
    </div>
    <button type="submit" class="btn btn-danger">Supprimer</button>
  </form>
</div>
