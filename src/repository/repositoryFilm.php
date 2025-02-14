<?php
class repositoryFilm
{
    private $bdd;

    public function __construct()
    {
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
    public function modifFilm(Film $film)
    {
        $sql = 'UPDATE `films` SET `titre`=:titre,`description`=:description,`genre`=:genre,`durée`=:duree,`affiche`=:affiche WHERE id_films = :id';
        $req = $this->bdd->getBDD()->prepare($sql);
        $req->execute(array(
            'titre' => $film->getTitre(),
            'description' => $film->getDescription(),
            'genre' => $film->getGenre(),
            'duree' => $film->getDuree(),
            'affiche' => $film->getImage(),
            'id' => $film->getId()
        ));
        header('location:../../vue/filmAffiche.php');
    }
    public function suppressionFilm(Film $film)
    {
        $sql = 'DELETE FROM films WHERE id_films = :id';
        $req = $this->bdd->getBDD()->prepare($sql);
        return $req->execute(array(
            'id' => $film->getId()));
    }

        public
        function detailFilm($id)
        {
            $sql = 'SELECT * FROM films WHERE id_films = :id';
            $req = $this->bdd->getBDD()->prepare($sql);
            $req->execute(array(
                'id' => $id
            ));
            $film = $req->fetch(PDO::FETCH_ASSOC);
            $filmObj = new Film(
                [
                    "id" => $film['id_films'],
                    "titre" => $film['titre'],
                    "description" => $film['description'],
                    "genre" => $film['genre'],
                    "duree" => $film['durée'],
                    "image" => $film['affiche'],
                ]
            );
            return $filmObj;

        }

        public
        function filmAffiche()
        {
            $sqlFilm = 'SELECT * FROM films';
            $reqFilm = $this->bdd->getBDD()->prepare($sqlFilm);
            $reqFilm->execute();

            return $reqFilm->fetchAll();
        }
}