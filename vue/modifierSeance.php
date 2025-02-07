<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Seance.php';
require_once '../src/repository/SeanceRepo.php';
session_start();
$_SESSION["id"]=1;
$_SESSION["role"]="admin";
if(isset($_GET['id'])){
  $id=$_GET['id'];

} else{
    $id=null;
    header("Location:afficherSeance.php");
}
$seance=new Seance([
    'idSeance'=>$id]);
$seanceRepo=new SeanceRepo();
$resultat=$seanceRepo->afficherLaSeance($seance);

$filmSalle=$seanceRepo->getSalleFilm();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Gestion Des Séances</title>
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
            </menu>
        </header>
        <hr>
        <h1>Modification de Seances</h1>
        <form action="../src/traitement/traitementModifSeance.php" method="POST">
            <table>
                <tr>
                    <td><input type="hidden" name="idSeance" value="<?php echo $id; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="nomSalle" class="form-label">Salle : </label>
                            <select name="refSalle" id="nomSalle">
                                <option value="<?= $resultat["id_salle"]?>"><?= $resultat["nom_salle"]?></option>
                                    <?php
                                    foreach ($filmSalle as $salle) {
                                        if ($salle["id_salle"] != $resultat["id_salle"]) {
                                            echo "<option value='" . $salle["id_salle"] . "'>" . $salle["nom_salle"] . "</option>
                                        ";
                                        }
                                    }
                                    ?>
                                </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="titreFilm" class="form-label">Film : </label>
                            <select name="refFilm" id="titreFilm">
                                <option value="<?= $resultat["id_films"]?>"><?= $resultat["titre"]?></option>
                                <?php
                                foreach ($filmSalle as $film){
                                    if($film["id_films"]!=$resultat["id_films"]) {
                                        echo "<option value='" . $film["id_films"] . "'>" . $film["titre"] . "</option>
                                    ";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date : </label>
                            <input type='date' name='date' id="date" value="<?=$resultat['date']?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="heure" class="form-label">Heure : </label>
                            <input type='time' id="heure" name='heure' value="<?=$resultat['heure']?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="nbPlace" class="form-label">Places disponibles : </label>
                            <input type='number' id="nbPlace" name='nbPlace' value="<?=$resultat['nb_place_dispo']?>">

                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix </label>
                            <input type='number' name='prix' id="prix" value="<?=$resultat['prix']?>">
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



