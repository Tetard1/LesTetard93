<?php
Class Seance{
    private $date;
    private $heure;
    private $nbPlcDispo;
    private $prixPlc;
    private $refFilms;
    private $refSalle;

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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param mixed $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    /**
     * @return mixed
     */
    public function getNbPlcDispo()
    {
        return $this->nbPlcDispo;
    }

    /**
     * @param mixed $nbPlcDispo
     */
    public function setNbPlcDispo($nbPlcDispo)
    {
        $this->nbPlcDispo = $nbPlcDispo;
    }
    /**
     * @return mixed
     */
    public function getRefSalle()
    {
        return $this->refSalle;
    }

    /**
     * @param mixed $refSalle
     */
    public function setRefSalle($refSalle)
    {
        $this->refSalle = $refSalle;
    }

    /**
     * @return mixed
     */
    public function getRefFilms()
    {
        return $this->refFilms;
    }

    /**
     * @param mixed $refFilms
     */
    public function setRefFilms($refFilms)
    {
        $this->refFilms = $refFilms;
    }
    /**
     * @return mixed
     */
    public function getPrixPlc()
    {
        return $this->prixPlc;
    }

    /**
     * @param mixed $prixPlc
     */
    public function setPrixPlc($prixPlc)
    {
        $this->prixPlc = $prixPlc;
    }



}