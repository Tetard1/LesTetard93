<?php
class Reservation
{
    private $idReservation;
    private $nbPlaceReserver;
    private $date_reservation;
    private $refSeance;
    private $refUtilisateur;

    public function __construct(array $donnee){
        $this->hydrate($donnee);
    }
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $valeur)
        {
            $methode = 'set'.ucfirst($key);

            if (method_exists($this, $methode))
            {
                $this->$methode($valeur);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * @param mixed $idReservation
     */
    public function setIdReservation($idReservation)
    {
        $this->idReservation = $idReservation;
    }

    /**
     * @return mixed
     */
    public function getNbPlaceReserver()
    {
        return $this->nbPlaceReserver;
    }

    /**
     * @param mixed $nbPlaceReserver
     */
    public function setNbPlaceReserver($nbPlaceReserver)
    {
        $this->nbPlaceReserver = $nbPlaceReserver;
    }

    /**
     * @return mixed
     */
    public function getRefSeance()
    {
        return $this->refSeance;
    }

    /**
     * @param mixed $ref_seance
     */
    public function setRefSeance($ref_seance)
    {
        $this->refSeance = $ref_seance;
    }

    /**
     * @return mixed
     */
    public function getDateReservation()
    {
        return $this->date_reservation;
    }

    /**
     * @param mixed $date_reservation
     */
    public function setDateReservation($date_reservation)
    {
        $this->date_reservation = $date_reservation;
    }

    /**
     * @return mixed
     */
    public function getRefUtilisateur()
    {
        return $this->refUtilisateur;
    }

    /**
     * @param mixed $refUtilisateur
     */
    public function setRefUtilisateur($refUtilisateur)
    {
        $this->refUtilisateur = $refUtilisateur;
    }



}