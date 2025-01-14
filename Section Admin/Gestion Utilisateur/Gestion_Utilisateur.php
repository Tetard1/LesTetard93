<?php
var_dump($_POST);
$bddconnexion_admin = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root', '');
$reqconnexion = $bddconnexion_admin->prepare('SELECT * FROM utilisateur WHERE email = :email || mdp = :mdp AND role = :role');
$reqconnexion->execute(array(
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp'],
    'role' => $_POST['role']
));

if ($_POST['role'] == NULL) {
    echo "vous n'avez pas le role admin!";
}
else {
    session_start();
    echo "vous êtes connecter en t'en qu'admin  ";
}
?>
