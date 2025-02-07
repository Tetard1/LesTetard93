<?php

require_once "../src/modele/film.php";
require_once "../src/repository/repositoryFilm.php";
require_once "../src/Bdd/BDD.php";
$listeFilm = new RepositoryFilm();
$listeFilm = $listeFilm->filmAffiche();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Films</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .film {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .film:last-child {
            border-bottom: none;
        }
        img {
            max-width: 100px;
            display: block;
            margin-bottom: 10px;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        .top-right {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        button {
            padding: 5px 10px;
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-right">
            <button onclick="window.location.href='film.html'">Ajouter un film</button>
        </div>
        <h2>Liste des Films</h2>
        <table>
            <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Genre</th>
                <th>Durée</th>
                <th>Affice</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0; $i < count($listeFilm); $i++) {
                ?>
            <tr>
                <td><?= $listeFilm[$i]['titre'] ?></td>
                <td><?= $listeFilm[$i]['description'] ?></td>
                <td><?= $listeFilm[$i]['genre'] ?></td>
                <td><?= $listeFilm[$i]['durée'] ?></td>
                <td><?= $listeFilm[$i]['affiche'] ?></td>
            </tr>
            <?php

            }
            ?>
            </tbody>
        </table>

        </div>
    </div>

</body>
</html>
