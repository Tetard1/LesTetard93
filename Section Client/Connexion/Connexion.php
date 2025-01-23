<?php
var_dump($_POST);
$bddconnexion = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root', '');
$reqconnexion = $bddconnexion->prepare('SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp');
$reqconnexion->execute(array(
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp'],
));

$donne = $reqconnexion->fetch();
var_dump($donne);
if ($donne == NULL) {
    echo "vous n'avez pas de compte! veuillez en crée un ! ";
    header('location:../Inscription/Inscription.html');
}
else {
    session_start();
    $_SESSION['id'] = $donne['id_utilisateur'];
    $_SESSION['role'] = $donne['role'];
    if ($donne['role'] == 'admin') {
        header('location:../../Section%20Admin/Espace%20Admin/IndexAdmin.php');
    }
    else {
        header('location:../../Accueil/IndexAcceuil.php');
    }
}

