<?php

class BDD
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost:8889;dbname=rmr_cinema;charset=utf8', 'root','root' );
    }
    public function getBdd()
    {
        return $this->bdd;
    }
}
