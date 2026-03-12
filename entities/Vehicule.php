<?php

class Vehicule implements JsonSerializable
{
    private $id;
    private $immatriculation;
    private $marque;
    private $modele;

    public function __construct($id, $immmatriculation, $marque, $modele)
    {
        $this->id = $id;
        $this->immatriculation = $immatriculation;
        $this->marque = $marque;
        $this->modele = $modele;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'immatriculation' => $this->immatriculation,
            'marque' => $this->marque,
            'modele' => $this->modele,
        ];
    }


    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    public function getMarque()
    {
        return $this->marque;
    }

    public function getModele()
    {
        return $this->modele;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    public function setModele($modele)
    {
        $this->modele = $modele;
    }
}