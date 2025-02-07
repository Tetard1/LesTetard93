<?php

class SalleRepo{
    private $bdd;
    public function __construct(){
        $this->bdd = new BDD();
    }

    public function ajouterSalle(Salle $salle)  {
        $sql="INSERT INTO salle(nom_salle,place_totale) VALUES(:nomSalle,:placeTotale)";
        $req=$this->bdd->getBdd()->prepare($sql);
        $res=$req->execute(array(
            "nomSalle"=>$salle->getNomSalle(),
            "placeTotale"=>$salle->getPlaceTotale()
        ));
        if($res){
            return true;
        }else {
            return false;
        }
    }

        public function modificationSalle (Salle $salle)  {

            var_dump($_POST);
            $sqlmodification = 'UPDATE salle SET nomSalle = :nomSalle,placeTotale = :placeTotale WHERE id_salle = :id_salle';
            $reqmodification = $this->bdd->getBdd()->prepare($sqlmodification);
            $resmodification = $reqmodification->execute(array(
                'nomSalle' => $salle->getNomSalle(),
                'placeTotale' => $salle->getPlaceTotale(),
                'id_salle' => $salle->getIdSalle()
            ));

            return $resmodification ? "Modification réussie" : "Échec de la modification";
        }


        public function suppression(Salle $salle)
        {
            $sqlsuppression = 'DELETE FROM salle WHERE id_salle = :id_salle';
            $reqsuppression = $this->bdd->getBdd()->prepare($sqlsuppression);
            $ressuppression = $reqsuppression->execute(array(
                'id_salle' => $salle->getIdSalle()
            ));

            return $ressuppression ? "Suppression réussie" : "Échec de la suppression";
        }
        public function afficherSalle(){
            $affiche="SELECT *,(nb_place_dispo) as nb_plc_dispo,nom_salle,id_salle FROM `salle` 
            LEFT JOIN salle on id_salle=ref_salle";
            $req=$this->bdd->getBdd()->prepare($affiche);
            $req->execute();
            return $req->fetchAll();
    }


}