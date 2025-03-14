<?php
require_once "../bdd/BDD.php";
require_once "../modele/Utilisateur.php";
require_once "../repository/RepositoryUtilisateur.php";
if(isset($_POST['token'])&&isset($_POST['mdp'])&&isset($_POST['confirmation'])){
    if($_POST['mdp']==$_POST['confirmation']) {
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $token = $_POST['token'];
        $repo = new repositoryUtilisateur();
        $verif = $repo->verifierToken($token);
        if ($verif) {
            $email = $verif["email"];
            $repo->changerMdp($mdp, $email);
            echo "mdp mis a jour";
            //header("Location:../../vue/connexion.html");
        }
    }else{
        echo"La confirmation du  mot de passe est differente du mot de passe";
        header("Location:../../vue/connexion.html");
    }

}else {
    echo"veuillez remplir tous les champs";
    header("Location:../../vue/connexion.html");
}
