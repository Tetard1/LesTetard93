<?php
include "../repository/RepositoryUtilisateur.php";
require_once "../bdd/BDD.php";
require_once "../modele/Utilisateur.php";

var_dump($_POST);
if(empty($_POST["idUtilisateur"]))
    {
        var_dump($_POST);
    echo "Erreur : ID utilisateur requis";
    return;
    }

$user = new Utilisateur(array(
    'idUtilisateur' => $_POST["idUtilisateur"]

));
$repository = new repositoryUtilisateur();
$resultat = $repository->suppression($user);
header("Location:../../vue/Connexion.html");