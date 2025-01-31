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
            header('Location: ../Connexion/Connexion.html');
            exit();
        } else {
            echo "Vous avez déjà un compte, veuillez vous connecter ! ";
            header('Location: ../Connexion/Connexion.html');
            exit();
        }
    }

    public function connexion(Utilisateur $user)
    {
        $sqlconnexion = 'SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp';
        $reqconnexion = $this->bdd->getBdd()->prepare($sqlconnexion);
        $resconnexion = $reqconnexion->execute(array(

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
}
