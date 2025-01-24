<?php
include "Utilisateur.php";

$user = new Utilisateur($_POST['email'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $_POST['role']);

if (isset($_POST['action']) && $_POST['action'] === 'inscription') {
    var_dump($user);
    $user->inscription();

} else {
    var_dump($user);
    $user->connexion();

}
