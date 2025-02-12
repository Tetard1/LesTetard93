<?php
include "../repository/RepositoryUtilisateur.php";
require_once "../bdd/BDD.php";
require_once "../modele/Utilisateur.php";
//var_dump($_POST);
if(empty($_POST["nom"]) ||
    empty($_POST["prenom"]) ||
    empty($_POST["email"]) ||
    empty($_POST["mdp"]) ||
    empty($_POST["role"]))
    {
    echo "Erreur : Tous les champs doivent être remplis";
    return;
    }

$user = new Utilisateur(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'email' => $_POST['email'],
    'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT),
    'role' => $_POST['role'],
    'idUtilisateur' => $_POST['idUtilisateur']
    ));

//var_dump($user);
$repository = new repositoryUtilisateur();
$resultat = $repository->modification($user);

