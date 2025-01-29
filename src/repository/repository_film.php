<?php
class repository_film
{
    private $bdd;
    function ajout_film()
    {
        $req = $this->bdd->getBDD()->prepare('INSERT INTO film(titre,description,genre,durée,affiche) VALUES (:titre,:description,:genre,:durée,:affiche)');
        $req->execute(array(
            'titre' => $this->getTitre(),
            'description' => $this->getDescription(),
            'genre' => $this->getGenre(),
            'duree' => $this->getDurée(),
            'image' => $this->getAffiche(),
        ));
        $film = $req->fetch();
        var_dump($film);

        echo "le film a bien été ajouter";
    }
}