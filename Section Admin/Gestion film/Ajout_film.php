<?php
var_dump($_POST);

$bdd = new PDO('mysql:host=localhost;dbname=rmr_cinema', 'root', '');
$req = $bdd->prepare('INSERT INTO film(titre,description,genre,durée,affiche) VALUES (:titre,:description,:genre,:durée,:affiche)');
$req->execute(array(
    'nom' => $this->getNom(),
    'prenom' => $this->getPrenom(),
    'email' => $this->getEmail(),
    'mdp' => $this->getMdp(),
    'role' => $this->getRole(),
));
$film  = $req->fetchAll();



echo "le film a bien été ajouter";













?>