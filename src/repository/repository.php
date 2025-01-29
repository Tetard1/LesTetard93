<?php
include "Utilisateur.php";
require_once "../../Classique/Bdd/BDD.php";

class repository
{

    public function inscription()
    {
        var_dump($_POST);
        $req2 = $this->bdd->getBdd()->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $req2->execute(array(
            'email' => $this->getEmail(),

        ));


        $donne = $req2->fetch();
        var_dump($donne);
        if ($donne == NULL) {
            $req = $this->bdd->getBdd()->prepare('INSERT INTO utilisateur(nom,prenom,email,mdp,role) Values (:nom,:prenom,:email,:mdp,:role)');
            $req->execute(array(

                'nom' => $this->getNom(),
                'prenom' => $this->getPrenom(),
                'email' => $this->getEmail(),
                'mdp' => $this->getMdp(),
                'role' => $this->getRole(),
            ));
            echo "Votre profil a été créé ! ";
            header('Location: ../Connexion/Connexion.html');
            exit();
        } else {
            echo "Vous avez déjà un compte, veuillez vous connecter ! ";
            header('Location: ../Connexion/Connexion.html');
            exit();
        }
    }

    public function connexion()
    {
        var_dump($_POST);
        $reqconnexion = $this->bdd->getBdd()->prepare('SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp');
        $reqconnexion->execute(array(

            'email' => $this->getEmail(),
            'mdp' => $this->getMdp(),
        ));
        $donne = $reqconnexion->fetch();
        var_dump($donne);
        if ($donne == NULL) {
            echo "Vous n'avez pas de compte! Veuillez en créer un ! ";
            header('Location: ../Inscription/Inscription.html');
            exit();
        } else {
            session_start();
            $_SESSION['id'] = $donne['id_utilisateur'];
            $_SESSION['role'] = $donne['role'];
            if ($_SESSION['role'] == 'admin') {
                header('Location: ../../Section%20Admin/Espace%20Admin/IndexAdmin.php');
                exit();
            } else {
                header('Location: ../../Accueil/IndexAcceuil.php');
                exit();
            }
        }
    }
}