<?php
use Bdd\BDD;
class Utilisateur
{
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $role;

    public function __construct($email, $mdp)
    {
        $this->setEmail($email);
        $this->setMdp($mdp);
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set' . ucfirst($key);

            // Si le setter correspondant existe
            if (method_exists($this, $method)) {
                // On appelle le setter
                $this->$method($value);
            }
        }
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
        $bdd2 = new BDD();
        $req2 = $bdd2->getBdd()->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $req2->execute(array(
            'email' => $this->getEmail(),

        ));

        $donne = $req2->fetch();
        var_dump($donne);
        if ($donne == NULL) {
            $bdd = new BDD();
            $req = $bdd->getBdd()->prepare('INSERT INTO utilisateur(nom,prenom,email,mdp,role) Values (:nom,:prenom,:email,:mdp,:role)');
            $req->execute(array(
                'nom' => $this->getNom(),
                'prenom' => $this->getPrenom(),
                'email' => $this->getEmail(),
                'mdp' => $this->getMdp(),
                'role' => $this->getRole(),
            ));
            echo "Votre profil a été crée ! ";
            header('location:../Connexion/Connexion.html');
        } else {
            echo "vous avez déjà un compte veuillez vous connecter ! ";
            header('location:../Connexion/Connexion.html');
        }
    }

        public function connexion()
    {

        var_dump($_POST);
        $bddconnexion = new BDD();
        $reqconnexion = $bddconnexion->getBdd()->prepare('SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp');
        $reqconnexion->execute(array(
            'email' => $this->getEmail(),
            'mdp' => $this->getMdp(),
        ));
        $donne = $reqconnexion->fetch();
        var_dump($donne);
        if ($donne == NULL) {
            echo "vous n'avez pas de compte! veuillez en crée un ! ";
            header('location:../Inscription/Inscription.html');
        } else {
            session_start();
            $_SESSION['id'] = $donne['id_utilisateur'];
            $_SESSION['role'] = $donne['role'];
            if ($donne['role'] == 'admin') {
                header('location:../../Section%20Admin/Espace%20Admin/IndexAdmin.php');
            } else {
                header('location:../../Accueil/IndexAcceuil.php');
            }
        }


    }

}









