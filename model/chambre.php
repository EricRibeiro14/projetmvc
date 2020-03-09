<?php

class Chambre{
    private $numchambre;
    private $prix;
    private $nblits;
    private $nbpers;
    private $comfort;
    private $image;
    private $description;

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
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of nblits
     */ 
    public function getNblits()
    {
        return $this->nblits;
    }

    /**
     * Set the value of nblits
     *
     * @return  self
     */ 
    public function setNblits($nblits)
    {
        $this->nblits = $nblits;

        return $this;
    }

    /**
     * Get the value of nbpers
     */ 
    public function getNbpers()
    {
        return $this->nbpers;
    }

    /**
     * Set the value of nbpers
     *
     * @return  self
     */ 
    public function setNbpers($nbpers)
    {
        $this->nbpers = $nbpers;

        return $this;
    }

    /**
     * Get the value of comfort
     */ 
    public function getComfort()
    {
        return $this->comfort;
    }

    /**
     * Set the value of comfort
     *
     * @return  self
     */ 
    public function setComfort($comfort)
    {
        $this->comfort = $comfort;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}