<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root', '');
$req = $bdd->prepare('SELECT * FROM films');
$req->execute();
$films = $req->fetchAll();







?>
