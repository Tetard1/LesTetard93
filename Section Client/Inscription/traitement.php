<?php
include "Utilisateur.php";

$user = new Utilisateur($_POST['email'],$_POST['mdp']);

$user->connexion();
$user->inscription();
