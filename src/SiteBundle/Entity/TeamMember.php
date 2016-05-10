<?php

namespace SiteBundle\Entity;


class TeamMember
{
    protected $prenom;

    protected $nom;

    protected $specialite;

    protected $description;

    protected $image;

    public function __construct($prenom, $nom, $specialite, $description, $image)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->specialite = $specialite;
        $this->description = $description;
        $this->image = $image;
    }

    public function fullName(){
        return $this->prenom." ".$this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param mixed $specialite
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return "images/teampictures/".$this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


}