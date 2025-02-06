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
    var_dump($resultat);
    if ($resultat->getIdUtilisateur() != null) {
        var_dump($resultat);
        session_start();
        $_SESSION['userConnecte']=[
            "idUtilisateur" => $resultat->getIdUtilisateur(),
            "role" => $resultat->getRole()
        ];
        header("Location: ../../vue/ModificationUtilisateur.php");
    } else {
       var_dump($resultat);
    }

}

