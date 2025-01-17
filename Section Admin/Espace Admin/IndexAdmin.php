<?php
session_start();

var_dump($_SESSION);
$bdd=new PDO ('mysql:host=localhost;dbname=rmr_cinema', 'root', '');
$req=$bdd->prepare("SELECT * FROM utilisateur WHERE id_utilisateur =:id AND role=:role");
$req->execute(array('id'=>$_SESSION['id'],
    'role'=>$_SESSION['role'])
);
$resultat=$req->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Espace Personnel</title>
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <hr>
    <menu class="nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/Section%20Admin/Espace%20Admin/IndexAdmin.php">Mon compte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Section%20Admin/Gestion%20film/Gestion_Film.php">Films</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Section%20Admin/Gestion%20Séance/Gestion_Seance.php">Séances</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Section%20Admin/Gestion%20Utilisateur/Gestion_Utilisateur.php">Utilisateurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Section%20Admin/Supervision%20Réservation/Supervision_reservation.php">Reservations</a>
            </li>
        </menu>
        <hr>
        <h1>Mon compte</h1>
        <form action="IndexAdmin.php" method="POST">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $resultat['nom'] ?>">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $resultat['prenom'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $resultat['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="mdp" name="mdp" value="<?= $resultat['mdp'] ?>">
            </div>
        </form>
    </body>
</html>

