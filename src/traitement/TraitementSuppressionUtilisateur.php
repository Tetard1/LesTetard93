<?php
include "../repository/RepositoryUtilisateur.php";
require_once "../bdd/BDD.php";
require_once "../modele/Utilisateur.php";

if(empty($_POST["id_utilisateur"]))
    {
    echo "Erreur : ID utilisateur requis";
    return;
    }

$repository = new repositoryUtilisateur();
$resultat = $repository->suppression($user);