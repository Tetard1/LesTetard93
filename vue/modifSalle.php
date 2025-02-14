<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Salle.php';
require_once '../src/repository/SalleRepo.php';
session_start();
$_SESSION["id"]=1;
$_SESSION["role"]="admin";
if(isset($_GET['id'])){
  $id=$_GET['id'];
} else{
    $id=null;
    header("Location:afficherSalle.php");
}
$salle=new Salle([
    'idSalle'=>$id
]);
$salleRepo=new SalleRepo();
$resultat= $salleRepo->afficherLaSalle($salle);


/*
$bdd = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root','' );

$show="SELECT nom_salle,place_totale FROM `salle` WHERE id_salle=:idSalle";
$req=$bdd->prepare($show);
$req->execute([
    'idSalle'=>$id
]);
$resultat=$req->fetch();*/
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Gestion Des Salles</title>
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
                    <a class="nav-link active" aria-current="page" href="espaceClient.php">Mon compte</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Films
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Ajout de Films </a></li>
                        <li><a class="dropdown-item" href="#">Liste des Films</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Supprimer Des Films</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reservations
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Ajouter des Reservations</a></li>
                        <li><a class="dropdown-item" href="#">Liste des Reservations</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Supprimer Des Reservations</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Seances
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="ajoutSeance.php">Ajouter des Seances</a></li>
                        <li><a class="dropdown-item" href="afficherSeance.php">Liste des Seances</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="supprimerSeance.php">Supprimer Des Seance</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Salles
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="ajoutSalle.php">Ajouter des Salles</a></li>
                        <li><a class="dropdown-item" href="afficherSalle.php">Liste des Salles</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="modifSalle.php">Modification Des Salles</a></li>
                    </ul>
                </li>
            </menu>
        </header>
        <hr>
        <h1>Modification des Salles</h1>
        <form action="../src/traitement/traitementModifSalle.php" method="POST">
            <table>
                <tr>
                    <td><input type="hidden" name="idSalle" value="<?= $id ?>"></td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="nomSalle" class="form-label">Salle : </label>
                            <input type='text' id="nomSalle" name='nomSalle' value="<?=$resultat["nom_salle"]?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="place_totale" class="form-label">Places disponibles : </label>
                            <input type='number' id="placeTotale" name='placeTotale' value="<?=$resultat["place_totale"]?>">
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



