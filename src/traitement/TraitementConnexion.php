<?php
include "../repository/RepositoryUtilisateur.php";
require_once "../bdd/BDD.php";
require_once "../modele/Utilisateur.php";

if (empty($_POST["email"]) ||
    empty($_POST["mdp"]) )
{

    echo "C'est pas bien tetard";
    header("Location: ../../vue/Inscription.html");
} else {

    $user = new Utilisateur(array(
        'email' => $_POST['email'],
        'mdp' => $_POST['mdp'],

    ));
    $repository = new repositoryUtilisateur();
    $resultat = $repository->connexion($user);

    if ($resultat->getIdUtilisateur() != null) {
        session_start();
        $_SESSION['userConnecte'] =$resultat;
        $_SESSION['role']=$user-> getRole();
        header("Location: ../../vue/Film.html");
    } else {
        header("Location: ../../vue/Connexion.html");
    }

}

