<?php
require_once "../src/bdd/BDD.php";
require_once '../src/modele/Seance.php';
require_once '../src/repository/SeanceRepo.php';
session_start();
if(!isset($_SESSION["userConnecte"])){
    header('Location:../index.php');
    session_destroy();
}
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
$filmSalle=$seanceRepo->getSalleFilm(); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Plus 2</title>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
                        <?php
                        if($_SESSION["userConnecte"]["role"]=="admin"){
                            ?>
                            <li><a class="dropdown-item" href="Film.php">Ajout de Films </a></li>
                            <?php
                        }?>
                        <li><a class="dropdown-item" href="filmAffiche.php">Liste des Films</a></li>
                    </ul>
                </li>


                <?php
                if($_SESSION["userConnecte"]["role"]=="admin"){
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Reservations
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="ajoutReservation.php">Ajouter des Reservations</a></li>
                            <li><a class="dropdown-item" href="afficherReservation.php">Liste des Reservations</a></li>
                        </ul>
                    </li>
                    <?php
                }?>



                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Seances
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        if($_SESSION["userConnecte"]["role"]=="admin"){
                            ?>
                            <li><a class="dropdown-item" href="ajoutSeance.php">Ajouter des Seances</a></li>
                            <?php
                        }?>
                        <li><a class="dropdown-item" href="afficherSeance.php">Liste des Seances</a></li>
                    </ul>
                </li>


                <?php
                if($_SESSION["userConnecte"]["role"]=="admin"){
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Salles
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="ajoutSalle.php">Ajouter des Salles</a></li>
                            <li><a class="dropdown-item" href="afficherSalle.php">Liste des Salles</a></li>
                        </ul>
                    </li>
                    <?php
                }?>


            </menu>
            <hr>
        </header>
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
                                <option value="<?= $resultat["ref_salle"]?>"><?= $resultat["nom_salle"]?></option>
                                    <?php
                                    foreach ($filmSalle as $salle) {
                                        if ($salle["id_salle"] != $resultat["ref_salle"]) {
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
                            <select name="refFilms" id="titreFilm">
                                <option value="<?= $resultat["ref_films"]?>"><?= $resultat["titre"]?></option>
                                <?php
                                foreach ($filmSalle as $film){
                                    if($film["id_films"]!=$resultat["ref_films"]) {
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
                            <input type='time' id="heure" name='heure' value="<?=$resultat['heure_complete']?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="nbPlace" class="form-label">Places disponibles : </label>
                            <input type='number' id="nbPlace" name='nbPlcDispo' value="<?php
                            if ($resultat['nb_plc_dispo'] == null) {
                                echo $resultat['nb_place_dispo'];
                            } else {
                                echo $resultat['nb_plc_dispo'];
                            }
                            ?>">

                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix </label>
                            <input type='number' name='prixPlc' id="prix" value="<?=$resultat['prix']?>">
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



