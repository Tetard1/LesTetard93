<?php

class Salle{
    private $idSalle;
    private $nomSalle;
    private $placeTotale;
    public function __construct(array $donnees){
        $this->hydrate($donnees);

    }
    public function hydrate(array $donnees){
        foreach($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdSalle()
    {
        return $this->idSalle;
    }

    /**
     * @param mixed $idSalle
     */
    public function setIdSalle($idSalle)
    {
        $this->idSalle = $idSalle;
    }

    /**
     * @return mixed
     */
    public function getNomSalle()
    {
        return $this->nomSalle;
    }

    /**
     * @param mixed $nomSalle
     */
    public function setNomSalle($nomSalle)
    {
        $this->nomSalle = $nomSalle;
    }

    /**
     * @return mixed
     */
    public function getPlaceTotale()
    {
        return $this->placeTotale;
    }

    /**
     * @param mixed $placeTotale
     */
    public function setPlaceTotale($placeTotale)
    {
        $this->placeTotale = $placeTotale;
    }

}