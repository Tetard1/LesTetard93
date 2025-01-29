<?php
Class Seance{
    private $date;
    private $heure;
    private $nbPlcDispo;
    private $titre;
    private $nomSalle;


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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
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
}