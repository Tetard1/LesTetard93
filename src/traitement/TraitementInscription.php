<?php
include "../repository/RepositoryUtilisateur.php";
require_once "../bdd/BDD.php";
require_once "../modele/Utilisateur.php";

if(empty($_POST["nom"]) ||
    empty($_POST["prenom"]) ||
    empty($_POST["email"]) ||
    empty($_POST["mdp"])
){

    echo "C'est pas bien tetard";
    header("Location: ../../index.php");
}else{

    $user = new Utilisateur(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT),

    ));
    $repository = new repositoryUtilisateur();
    $resultat = $repository->inscription($user);

    if($resultat == true){
        header("Location: ../../index.php");
    }else{
        header("Location: ../../index.php");
    }

}

