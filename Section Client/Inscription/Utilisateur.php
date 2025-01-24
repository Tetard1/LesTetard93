<?php
use Bdd\BDD;
class Utilisateur
{
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $role;

    public function __construct($email, $mdp, $nom = NULL, $prenom = NULL, $role = NULL)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setEmail($email);
        $this->setMdp($mdp);
        $this->setRole($role);
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







    public function inscription()
    {
        var_dump($_POST);
<<<<<<< HEAD
        $bdd2 = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root', '');
        $req2 = $bdd2->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $req2->execute(['email' => $this->getEmail()]);
=======
        $bdd2 = new BDD();
        $req2 = $bdd2->getBdd()->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $req2->execute(array(
            'email' => $this->getEmail(),

        ));
>>>>>>> 0e1c22d93aed428c972bddac7e89fcf29d199faa

        $donne = $req2->fetch();
        var_dump($donne);
        if ($donne == NULL) {
<<<<<<< HEAD
            $bdd = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root', '');
            $req = $bdd->prepare('INSERT INTO utilisateur(nom,prenom,email,mdp,role) Values (:nom,:prenom,:email,:mdp,:role)');
            $req->execute([
=======
            $bdd = new BDD();
            $req = $bdd->getBdd()->prepare('INSERT INTO utilisateur(nom,prenom,email,mdp,role) Values (:nom,:prenom,:email,:mdp,:role)');
            $req->execute(array(
>>>>>>> 0e1c22d93aed428c972bddac7e89fcf29d199faa
                'nom' => $this->getNom(),
                'prenom' => $this->getPrenom(),
                'email' => $this->getEmail(),
                'mdp' => $this->getMdp(),
                'role' => $this->getRole(),
            ]);
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
<<<<<<< HEAD
        $bddconnexion = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root', '');
        $reqconnexion = $bddconnexion->prepare('SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp');
        $reqconnexion->execute([
=======
        $bddconnexion = new BDD();
        $reqconnexion = $bddconnexion->getBdd()->prepare('SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp');
        $reqconnexion->execute(array(
>>>>>>> 0e1c22d93aed428c972bddac7e89fcf29d199faa
            'email' => $this->getEmail(),
            'mdp' => $this->getMdp(),
        ]);
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
            if ($donne['role'] == 'admin') {
                header('Location: ../../Section%20Admin/Espace%20Admin/IndexAdmin.php');
                exit();
            } else {
                header('Location: ../../Accueil/IndexAcceuil.php');
                exit();
            }
        }
    }
}










