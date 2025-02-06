<?php
include "../repository/RepositoryUtilisateur.php";
require_once "../bdd/BDD.php";
require_once "../modele/Utilisateur.php";

var_dump($_SESSION);
if(empty($_POST["id_utilisateur_supp"]))
    {
        var_dump($_POST);
    echo "Erreur : ID utilisateur requis";
    return;
    }

$user = new Utilisateur(array(
    'idUtilisateur' => $_SESSION['userConnecte'],

));
$repository = new repositoryUtilisateur();
$resultat = $repository->suppression($user);
header("Location:../../vue/Connexion.html");