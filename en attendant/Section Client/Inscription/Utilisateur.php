<?php
class Utilisateur
{
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $role;
    private $bdd;


    public function __construct($email, $mdp, $nom = NULL, $prenom = NULL, $role = NULL)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setEmail($email);
        $this->setMdp($mdp);
        $this->setRole($role);
        $this->setBDD();
    }
    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getBdd()
    {
        return $this->bdd;
    }

    /**
     * @param mixed $BDD
     */
    public function setBDD()
    {
        $this->bdd = new BDD();
    }
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










