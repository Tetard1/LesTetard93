<?php
if(isset($_POST['token'])&&isset($_POST['mdp'])&&isset($_POST['confirmation'])){
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $token=$_POST['token'];
    $repo=new repositoryUtilisateur();
    $verif=$repo->verifierToken($token);
    if($verif){
        $email=$verif["email"];
        $repo->changerMdp($email,$mdp);
        echo"mdp mis a jour";
        header("Location:../../vue/connexion.html");
    }

}else {
    echo"veuillez remplir tous les champs";
    header("Location:../../vue/connexion.html");
}
