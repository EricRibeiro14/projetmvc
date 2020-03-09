<?php

class Driver{
    protected $base;

    public function __construct($base){
        $this->base = $base;
    }
    public function getBase(){
        return $this->base;
    }
    public function listeChambre($mcle){
        $sql = "SELECT * FROM chambre WHERE numchambre like ? OR prix LIKE ? OR nbpers LIKE ?";
        $res = $this->base->prepare($sql);
        $res->execute(["%$mcle%","%$mcle%","%$mcle%"]);
        $rows = $res->fetchAll(PDO::FETCH_OBJ);
        $res->closeCursor();
        $donnees = [];
        $compteur = 0;
        foreach($rows as $row){
            $chambre = new Chambre();
            $chambre->setNumchambre($row->numchambre);
            $chambre->setPrix($row->prix);
            $chambre->setNblits($row->nblits);
            $chambre->setNbpers($row->nbpers);
            $chambre->setComfort($row->confort);
            $chambre->setImage($row->image);
            $chambre->setDescription($row->description);
            $donnees[$compteur++] = $chambre;
        }
        return $donnees;
    }
    public function listeReservation($mcle){
        if($mcle !== ""){
            $sql = "SELECT * FROM reservations  WHERE numclient LIKE ? OR numchambre LIKE ?";
            $res = $this->base->prepare($sql);
            $res->execute(["%$mcle%","%$mcle%"]);
        }else{
        $sql = "SELECT * FROM reservations";
        $res = $this->base->prepare($sql);
        $res->execute();
        }
        $rows = $res->fetchAll(PDO::FETCH_OBJ);
        $res->closeCursor();
        $donnees = [];
        $compteur = 0;
        foreach($rows as $row){
            $resa = new Reservation();
            $resa->setNumchambre($row->numchambre);
            $resa->setNumclient($row->numclient);
            $resa->setDatearrivee($row->datearivee);
            $resa->setDatedepart($row->datedepart);
            $donnees[$compteur++] = $resa;
        }
        return $donnees;
    }
}