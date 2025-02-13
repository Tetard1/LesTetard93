<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Gestion de Film</title>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</header>
<body>
    <div class="container mt-4">
        <h1>Ajouter un Nouveau Film</h1>
        <form action="../src/traitement/traitement_film.php" method="post">
            <div class="mb-3">
                <label for="titre" class="form-label">Titre du film :</label>
                <input type="text" class="form-control" id="titre" name="titre">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre :</label>
                <select class="form-control" id="genre" name="genre">
                    <option value="">-- Sélectionner un genre --</option>
                    <option value="Action">Action</option>
                    <option value="Aventure">Aventure</option>
                    <option value="Comédie">Comédie</option>
                    <option value="Drame">Drame</option>
                    <option value="Fantastique">Fantastique</option>
                    <option value="Horreur">Horreur</option>
                    <option value="Science-fiction">Science-fiction</option>
                    <option value="Animation">Animation</option>
                    <option value="Documentaire">Documentaire</option>
                    <option value="Policier">Policier</option>
                    <option value="Romance">Romance</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="duree" class="form-label">Durée (en minutes) :</label>
                <input type="number" class="form-control" id="duree" name="duree">
            </div>
            <div class="mb-3">
                <label for="affiche" class="form-label">Affiche du film (URL) :</label>
                <input type="text" class="form-control" id="affiche" name="affiche">
            </div>

            <input type="submit" value="liste" class="btn btn-primary" formaction="filmAffiche.php">
            <input type="submit" value="Envoyer" class="btn btn-primary" >
            <input type="reset" value="Annuler" class="btn btn-primary" formaction="./">
        </form>



    </div>
</body>
</body>
</html>
