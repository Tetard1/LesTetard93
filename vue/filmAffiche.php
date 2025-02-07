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
        .top-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        .top-section button {
            margin: 3px;
            padding: 5px 10px;
            font-size: 14px;
            width: 110px;
        }
        button {
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .search-bar {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        td img {
            max-width: 100px;
            display: block;
        }
    </style>
    <script>
        function filterFilms() {
            let input = document.getElementById("search").value.toLowerCase();
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                let title = row.cells[1].innerText.toLowerCase();
                row.style.display = title.includes(input) ? "" : "none";
            });
        }
    </script>
</head>
<body>
<div class="container">
    <div class="top-section">
        <h2>Liste des Films <button onclick="window.location.href='film.php'">Ajouter un film</button></h2>
    </div>


    <input type="text" id="search" class="search-bar" onkeyup="filterFilms()" placeholder="Rechercher un film...">

    <table>
        <thead>
        <tr>
            <th>Id Film</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Genre</th>
            <th>Durée</th>
            <th>Affiche</th>
        </tr>
        </thead>
        <tbody>

        <?php
        for ($i = 0; $i < count($listeFilm); $i++) {
            ?>
            <tr>
                <td><?= $listeFilm[$i]['id_films']?></td>
                <td><a href="filmDetail.php?id=<?= urlencode($listeFilm[$i]['id_films']) ?>"><?= htmlspecialchars($listeFilm[$i]['titre']) ?></a></td>
                <td><?= $listeFilm[$i]['description'] ?></td>
                <td><?= $listeFilm[$i]['genre'] ?></td>
                <td><?= $listeFilm[$i]['durée'] ?></td>
                <td><img src="<?= $listeFilm[$i]['affiche'] ?>"></td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>
</body>
</html>
