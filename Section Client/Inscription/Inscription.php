<?php
var_dump($_POST);
$bdd2 = new PDO('mysql:host=localhost;dbname=tli3;charset=utf8', 'root', '');
$req2 = $bdd2->prepare('SELECT * FROM inscrit WHERE email = :email');
$req2->execute(array(
    'email' => $_POST['email'],

));

$donne = $req2->fetch();
var_dump($donne);
if ($donne == NULL) {
    var_dump($_POST);
    $bdd = new PDO('mysql:host=localhost;dbname=tli3;charset=utf8', 'root', '');
    $req = $bdd->prepare('INSERT INTO inscrit(nom,prenom,email,tel_fixe,tel_portable,rue,cp,ville,passe) Values (:nom,:prenom,:email,:tel_fixe,:tel_portable,:rue,:cp,:ville,:passe)');
    $req->execute(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'tel_fixe' => $_POST['tel_fixe'],
        'tel_portable' => $_POST['tel_portable'],
        'rue' => $_POST['rue'],
        'cp' => $_POST['cp'],
        'ville' => $_POST['ville'],
        'passe' => $_POST['passe']
    ));
    echo "Votre profil a été crée ! ";
}
else{
    echo "vous avez déjà un compte veuillez vous connecter ! ";
}
?>