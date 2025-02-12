<?php
include "../repository/RepositoryUtilisateur.php";
require_once "../bdd/BDD.php";
require_once "../modele/Utilisateur.php";
var_dump($_POST);
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
    var_dump($user);
    $repository = new repositoryUtilisateur();
    $resultat = $repository->connexion($user);
    var_dump($resultat);
    if ($resultat != null) {
        session_start();
        $_SESSION['userConnecte']=[
            "idUtilisateur" => $resultat->getIdUtilisateur(),
            "role" => $resultat->getRole()
        ];
        header("Location: ../../vue/ModificationUtilisateur.php");
    } else {
       header("Location: ../../vue/Connexion.html");
    }

}

