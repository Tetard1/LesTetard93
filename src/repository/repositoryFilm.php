<?php
class repositoryFilm
{
    private $bdd;
    public function __construct(){
        $this->bdd = new BDD();
    }
    public function ajoutFilm(Film $film)
    {
        $sql = 'INSERT INTO films(titre,description,genre,durée,affiche) VALUES (:titre,:description,:genre,:duree,:affiche)';
        $req = $this->bdd->getBDD()->prepare($sql);
        $req->execute(array(
            'titre' => $film->getTitre(),
            'description' => $film->getDescription(),
            'genre' => $film->getGenre(),
            'duree' => $film->getDuree(),
            'affiche' => $film->getImage(),
        ));
        echo "le film a bien été ajouter";
        header('location:../../vue/filmAffiche.php');
    }
    public function filmAffiche()
    {
        $sqlFilm = 'SELECT * FROM films';
        $reqFilm = $this->bdd->getBDD()->prepare($sqlFilm);
        $reqFilm->execute();

        return $reqFilm->fetchAll();
    }
}