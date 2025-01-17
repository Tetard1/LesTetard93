<?php
var_dump($_POST);
$bdd2 = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root', '');
$req2 = $bdd2->prepare('SELECT * FROM utilisateur WHERE email = :email');
$req2->execute(array(
    'email' => $_POST['email'],

));

$donne = $req2->fetch();
var_dump($donne);
if ($donne == NULL) {
    var_dump($_POST);
    $bdd = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root', '');
    $req = $bdd->prepare('INSERT INTO utilisateur(nom,prenom,email,mdp,role) Values (:nom,:prenom,:email,:mdp,:role)');
    $req->execute(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'mdp' => $_POST['mdp'],
        'role' => $_POST['role'],
    ));
    echo "Votre profil a été crée ! ";
        header('location:../Connexion/Connexion.html');
}
else{
    echo "vous avez déjà un compte veuillez vous connecter ! ";
    header('location:../Connexion/Connexion.html');
}
