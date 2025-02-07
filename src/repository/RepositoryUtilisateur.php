<?php

class repositoryUtilisateur
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new BDD();
    }

    public function inscription(Utilisateur $user)
    {
        var_dump($_POST);
        $req2 = $this->bdd->getBdd()->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $req2->execute(array(
            'email' => $user->getEmail(),

        ));

        $donne = $req2->fetch();
        var_dump($donne);
        if ($donne == NULL) {
            $sql = 'INSERT INTO utilisateur(nom,prenom,email,mdp,role) 
                Values (:nom,:prenom,:email,:mdp,:role)';
            $req = $this->bdd->getBdd()->prepare($sql);
            $res = $req->execute(array(
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'mdp' => $user->getMdp(),
                'role' => $user->getRole(),
            ));
            if ($res) {
                return true;
            } else {
                return false;
            }
            echo "Votre profil a été créé ! ";
            header('Location:../../vue/Connexion.html');
            exit();
        } else {
            echo "Vous avez déjà un compte, veuillez vous connecter ! ";
            header('Location: ../../vue/Connexion.html');
            exit();
        }
    }

    public function connexion(Utilisateur $user)
    {
        $sqlconnexion = 'SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp';
        $reqconnexion = $this->bdd->getBdd()->prepare($sqlconnexion);
         $reqconnexion->execute(array(
            'email' => $user->getEmail(),
            'mdp' => $user->getMdp(),
        ));
        $donne = $reqconnexion->fetch();
        if($donne != NULL){
            $user->setNom($donne['nom']);
            $user->setPrenom($donne['prenom']);
            $user->setEmail($donne['email']);
            $user->setRole($donne['role']);
            $user->setMdp($donne['mdp']);
            $user->setIdUtilisateur($donne['id_utilisateur']);
        }
        return $user;
    }

    public function modification(Utilisateur $user)
    {
        //var_dump($_POST);
        $sqlmodification = 'UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email, mdp = :mdp, role = :role WHERE id_utilisateur = :id_utilisateur';
        $reqmodification = $this->bdd->getBdd()->prepare($sqlmodification);
        $resmodification = $reqmodification->execute(array(
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'mdp' => $user->getMdp(),
            'role' => $user->getRole(),
            'id_utilisateur' => $user->getIdUtilisateur()
        ));
        header("Location: ../../vue/accueil.php");
        return $resmodification ? "Modification réussie" : "Échec de la modification";
    }


    public function suppression(Utilisateur $user)
    {
        $sqlsuppression = 'DELETE FROM utilisateur WHERE id_utilisateur = :id_utilisateur';
        $reqsuppression = $this->bdd->getBdd()->prepare($sqlsuppression);
        $ressuppression = $reqsuppression->execute(array(
            'id_utilisateur' => $user->getIdUtilisateur()
        ));

        return $ressuppression ? "Suppression réussie" : "Échec de la suppression";
    }
}

