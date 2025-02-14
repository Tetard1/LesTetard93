<?php
require_once "../src/bdd/BDD.php";
require_once "../src/modele/film.php";
require_once "../src/repository/repositoryFilm.php";
$liste = new repositoryFilm();
$film = $liste->detailFilm($_GET['id']);
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .film-container {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .film-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .film-title {
            text-align: left;
            vertical-align:
                    text-top;
            font-size: 65px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .film-info p {
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
            max-width: 100%;
        }
        @media (max-width: 768px) {
            .film-info {
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="film-container">
    <div class="row align-items-center">
        <!-- Colonne de gauche (Infos) -->
        <div class="col-md-7 film-info">
            <h2 class="film-title"> <?=$film->getTitre()?>  </h2>
            <p class="text-muted"><?=$film->getDescription()?></p>
            <p><strong>Durée : </strong> <?=$film->getDuree()?> min </p>
            <p><strong>Genre : </strong> <?=$film->getGenre()?></p>

            <!-- Boutons Modifier et Supprimer -->
            <div class="btn-container">
                <a href="modifFilm.php?id=<?=$film->getId()?>"><button type='button' class='btn btn-warning'>Modifier</button></a>
               <button type='button' class='btn btn-danger' onclick="document.getElementById('form_suppr').submit()">Suppprimer</button>

                <form id="form_suppr" method="post" action="../src/traitement/traitementSuppressionFilm.php">
                    <input type="hidden" name = "idFilm" value="<?=$film->getId()?>">
                </form>
            </div>
        </div>
        <!-- Colonne de droite (Affiche) -->
        <div class="col-md-5">
            <img src="<?=$film->getImage() ?>" alt="Affiche du film" class="film-image">
        </div>
    </div>
</div>

</body>
</html>

