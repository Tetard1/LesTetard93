<?php
include "../repository/repository.php";
require_once "../bdd/BDD.php";
require_once "../modele/Utilisateur.php";

$user = new Utilisateur(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp'],
    'role' => $_POST['role'],

));
if (isset($_POST['action']) && $_POST['action'] === 'inscription') {
    var_dump($user);
    $user->inscription();

} else {
    var_dump($user);
    $user->connexion();

}
