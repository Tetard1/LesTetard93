<?php

require_once "../src/modele/film.php";
require_once "../src/repository/repositoryFilm.php";
require_once "../src/Bdd/BDD.php";
session_start();

$userPrenom = $_SESSION["userConnecte"]["userPrenom"] ?? "Invité";
$listeFilm = new RepositoryFilm();
$listeFilm = $listeFilm->filmAffiche();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Plus 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Fond blanc */
            margin: 20px;
            padding: 0;
            color: #333;
            text-align: center;
        }

        .logo {
            font-size: 1.8em;
            font-weight: bold;
        }

        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-size: 1.2em;
            transition: 0.3s;
        }

        .banner {
            background: url('https://source.unsplash.com/1600x600/?cinema,movie') no-repeat center;
            background-size: cover;
            color: black;
            padding: 80px 20px;
        }

        .banner h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .banner p {
            font-size: 1.2em;
        }

        /* Section des films */
        h2 {
            margin-top: 40px;
            font-size: 2em;
        }

        .film-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .film-card {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 15px;
            width: 250px;
            text-align: center;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .film-card:hover {
            transform: scale(1.05);
        }

        .film-card img {
            width: 100%;
            border-radius: 8px;
        }

        .film-card h3 {
            margin-top: 10px;
            font-size: 1.2em;
        }
        footer {
            background: #f1f1f1;
            padding: 15px;
            margin-top: 40px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<header>
    <hr>
    <menu class="nav">
        <li>
            <a class="navbar-brand" href="accueil.php"><img src="../assets/img/logoV2.jpg" style="height: 60px; margin-left: 20px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Mon compte
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="ModificationUtilisateur.php">Mon profil </a></li>
                <li><a class="dropdown-item" href="reservationClient.php">Mes reservation</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Films
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="Film.php">Ajout de Films </a></li>
                <li><a class="dropdown-item" href="filmAffiche.php">Liste des Films</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Reservations
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="ajoutReservation.php">Ajouter des Reservations</a></li>
                <li><a class="dropdown-item" href="afficherReservation.php">Liste des Reservations</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Seances
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="ajoutSeance.php">Ajouter des Seances</a></li>
                <li><a class="dropdown-item" href="afficherSeance.php">Liste des Seances</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Salles
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="ajoutSalle.php">Ajouter des Salles</a></li>
                <li><a class="dropdown-item" href="afficherSalle.php">Liste des Salles</a></li>
            </ul>
        </li>

    </menu>
    <hr>
</header>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinéStar</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Bannière principale -->
<section class="banner">
    <h1>Hey <?= urlencode($userPrenom) ?> !</h1>
    <p>Bienvenue dans ton cinéma préféré Plus 2</p>
    <p>Découvrez les meilleurs films du moment.</p>
</section>

<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'rmr_cinema';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Requête SQL pour récupérer 3 films au hasard (ou les premiers 3 films)
$sql = "SELECT id_films, titre, affiche FROM films ORDER BY RAND() LIMIT 5";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$listeFilm = $stmt->fetchAll();
?>

<main>
    <h2>À l'affiche</h2>
    <div class="film-grid">
        <?php foreach ($listeFilm as $film) : ?>
            <div class="film-card">
                <a href="filmDetail.php?id=<?= urlencode($film['id_films']) ?>">
                    <img src="<?= htmlspecialchars($film['affiche']); ?>" alt="<?= htmlspecialchars($film['titre']); ?>">
                    <h3><?= htmlspecialchars($film['titre']); ?></h3>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<!-- Pied de page -->
<footer>
    <p>© 2025 Plus 2 - Tous droits réservés.</p>
</footer>

</body>
</html>
