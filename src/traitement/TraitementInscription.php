<?php
include "../repository/RepositoryUtilisateur.php";
require_once "../bdd/BDD.php";
require_once "../modele/Utilisateur.php";

if(empty($_POST["nom"]) ||
    empty($_POST["prenom"]) ||
    empty($_POST["email"]) ||
    empty($_POST["mdp"]) ||
    empty($_POST["role"])
){

    echo "C'est pas bien tetard";
    header("Location: ../../vue/Connexion.html");
}else{

    $user = new Utilisateur(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT),
        'role' => $_POST['role'],

    ));
    $repository = new repositoryUtilisateur();
    $resultat = $repository->inscription($user);

    if($resultat == true){
        header("Location: ../../vue/Connexion.html");
    }else{
        header("Location: ../../vue/Inscription.html");
    }

}

