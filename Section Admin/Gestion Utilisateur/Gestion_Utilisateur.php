<?php
var_dump($_POST);
$bddconnexion = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root', '');
$reqconnexion = $bddconnexion->prepare('SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp AND role = :role');
$reqconnexion->execute(array(
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp'],
    'role' => $_POST['role']
));

$donne = $reqconnexion->fetch();
var_dump($donne);
if ($donne == NULL) {
    echo "vous n'avez pas de compte admin!";
}
else {
    session_start();
}
?>
