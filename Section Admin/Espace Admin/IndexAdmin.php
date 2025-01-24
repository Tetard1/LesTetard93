<?php

use Bdd\BDD;

session_start();
$bdd=new BDD();
$req=$bdd->getBdd()->prepare("SELECT * FROM utilisateur WHERE id_utilisateur =:id AND role=:role");
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
    <header>
    <menu class="nav">
        <li>
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../Espace%20Admin/IndexAdmin.php">Mon compte</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../Gestion%20film/Gestion_Film.php">Films</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../Gestion%20Séance/Gestion_Seance.php">Séances</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" href="../Gestion%20Utilisateur/Gestion_Utilisateur.php">Utilisateurs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../Supervision%20Réservation/Supervision_reservation.php">Reservations</a>
        </li>
    </menu>
    </header>
    <hr>
    <h1>Mon compte</h1>
    <form action="IndexAdmin.php" method="POST">
        <table>
            <tr>
                <td>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?= $resultat['nom'] ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $resultat['prenom'] ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $resultat['email'] ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="mb-3">
                        <label for="mdp" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="mdp" name="mdp" value="<?= $resultat['mdp'] ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-12">
                        <input class="btn btn-primary" type="submit" value="Modifier ">
                    </div>
                </td>
            </tr>
        </table>
    </form>
    </body>
    </html>

<?php
if (isset($_POST['nom']) && isset($_POST['prenom'])
    && isset($_POST['email']) && isset($_POST['mdp'])) {
    var_dump($_POST);
    $req=$bdd->prepare('UPDATE utilisateur SET nom=:nom, prenom= :prenom, email = :email, mdp=:mdp WHERE id_utilisateur =:id AND role=:role');
    $req->execute(array('nom' => $_POST["nom"],
            'prenom' => $_POST["prenom"],
            'email' => $_POST["email"],
            'mdp' => $_POST["mdp"],
            'id' => $_SESSION['id'],
            'role' => $_SESSION['role']));
}