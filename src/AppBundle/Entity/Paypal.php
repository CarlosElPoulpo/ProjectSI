<?php

namespace AppBundle\Entity;


class Paypal
{


    protected $prix;
    protected $shipping;
    protected $tva;
    protected $urlPayementValid;
    protected $urlPayementRefuse;
    protected $adressBusiness;
    protected $nameProduct;
    protected $language;
    protected $device;
    protected $idUser;

    /**
     * Paypal constructor.
     * @param $prix
     * @param $shipping
     * @param $tva
     * @param $urlPayementValid
     * @param $urlPayementRefuse
     * @param $adressBusiness
     * @param $nameProduct
     * @param $language
     * @param $device
     * @param $idUser
     */
    public function __construct($prix, $shipping, $tva, $urlPayementValid, $urlPayementRefuse, $adressBusiness, $nameProduct, $language, $device, $idUser)
    {
        $this->prix = $prix;
        $this->shipping = $shipping;
        $this->tva = $tva;
        $this->urlPayementValid = $urlPayementValid;
        $this->urlPayementRefuse = $urlPayementRefuse;
        $this->adressBusiness = $adressBusiness;
        $this->nameProduct = $nameProduct;
        $this->language = $language;
        $this->device = $device;
        $this->idUser = $idUser;
    }


    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param mixed $shipping
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
    }

    /**
     * @return mixed
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * @param mixed $tva
     */
    public function setTva($tva)
    {
        $this->tva = $tva;
    }

    /**
     * @return mixed
     */
    public function getUrlPayementValid()
    {
        return $this->urlPayementValid;
    }

    /**
     * @param mixed $urlPayementValid
     */
    public function setUrlPayementValid($urlPayementValid)
    {
        $this->urlPayementValid = $urlPayementValid;
    }

    /**
     * @return mixed
     */
    public function getUrlPayementRefuse()
    {
        return $this->urlPayementRefuse;
    }

    /**
     * @param mixed $urlPayementRefuse
     */
    public function setUrlPayementRefuse($urlPayementRefuse)
    {
        $this->urlPayementRefuse = $urlPayementRefuse;
    }

    /**
     * @return mixed
     */
    public function getAdressBusiness()
    {
        return $this->adressBusiness;
    }

    /**
     * @param mixed $adressBusiness
     */
    public function setAdressBusiness($adressBusiness)
    {
        $this->adressBusiness = $adressBusiness;
    }

    /**
     * @return mixed
     */
    public function getNameProduct()
    {
        return $this->nameProduct;
    }

    /**
     * @param mixed $nameProduct
     */
    public function setNameProduct($nameProduct)
    {
        $this->nameProduct = $nameProduct;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @param mixed $device
     */
    public function setDevice($device)
    {
        $this->device = $device;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }










}