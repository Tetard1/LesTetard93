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
            $sqlmodification = 'UPDATE salle SET nom_salle = :nomSalle,place_totale =:placeTotale WHERE id_salle = :idSalle';
            $reqmodification = $this->bdd->getBdd()->prepare($sqlmodification);
            $resmodification = $reqmodification->execute(array(
                'nomSalle' => $salle->getNomSalle(),
                'placeTotale' => $salle->getPlaceTotale(),
                'idSalle' => $salle->getIdSalle()
            ));

            return $resmodification ? "Modification réussie" : "Échec de la modification";
        }


        public function suppressionSalle (Salle $salle)
        {
            $sqlsuppression = 'DELETE FROM salle WHERE id_salle = :idSalle';
            $reqsuppression = $this->bdd->getBdd()->prepare($sqlsuppression);
            $ressuppression = $reqsuppression->execute(array(
                'idSalle' => $salle->getIdSalle()
            ));

            return $ressuppression ? "Suppression réussie" : "Échec de la suppression";
        }
        public function afficherSalle(){
            $affiche="SELECT * FROM `salle` ";
            $req=$this->bdd->getBdd()->prepare($affiche);
            $req->execute(
            );
            return $req->fetchall();
    }
    public function afficherLaSalle(Salle $salle){
        $show="SELECT nom_salle,place_totale FROM `salle` WHERE id_salle=:idSalle";
        $req=$this->bdd->getBdd()->prepare($show);
        $req->execute([
            'idSalle'=>$salle->getIdSalle()
        ]);
        return $req->fetch();
    }


}