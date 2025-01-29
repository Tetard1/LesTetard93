<?php

class BDD
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=rmr_cinema;charset=utf8', 'root','' );
    }

    public function getBdd()
    {
        return $this->bdd;
    }
}
