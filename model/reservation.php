<?php


class Reservation{
    private $numclient;
    private $numchambre;
    private $datearrivee;
    private $datedepart;

    /**
     * Get the value of numclient
     */ 
    public function getNumclient()
    {
        return $this->numclient;
    }

    /**
     * Set the value of numclient
     *
     * @return  self
     */ 
    public function setNumclient($numclient)
    {
        $this->numclient = $numclient;

        return $this;
    }

    /**
     * Get the value of numchambre
     */ 
    public function getNumchambre()
    {
        return $this->numchambre;
    }

    /**
     * Set the value of numchambre
     *
     * @return  self
     */ 
    public function setNumchambre($numchambre)
    {
        $this->numchambre = $numchambre;

        return $this;
    }

    /**
     * Get the value of datearrivee
     */ 
    public function getDatearrivee()
    {
        return $this->datearrivee;
    }

    /**
     * Set the value of datearrivee
     *
     * @return  self
     */ 
    public function setDatearrivee($datearrivee)
    {
        $this->datearrivee = $datearrivee;

        return $this;
    }

    /**
     * Get the value of datedepart
     */ 
    public function getDatedepart()
    {
        return $this->datedepart;
    }

    /**
     * Set the value of datedepart
     *
     * @return  self
     */ 
    public function setDatedepart($datedepart)
    {
        $this->datedepart = $datedepart;

        return $this;
    }
}