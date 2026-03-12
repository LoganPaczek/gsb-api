<?php

class Vehicule implements JsonSerializable
{
    private $id;
    private $immatriculation;
    private $marque;
    private $modele;
    private $attributions;

    public function __construct($id, $immatriculation, $marque, $modele)
    {
        $this->id = $id;
        $this->immatriculation = $immatriculation;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->attributions = [];
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'immatriculation' => $this->immatriculation,
            'marque' => $this->marque,
            'modele' => $this->modele,
            'attributions' => $this->attributions,
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

    public function getAttributions()
    {
        return $this->attributions;
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

    public function setAttributions($attributions)
    {
        $this->attributions = $attributions;
    }

    // adders
    public function addAttribution($attribution)
    {
        $this->attributions[] = $attribution;
    }

    // removers
    public function removeAttribution($attribution)
    {
        $this->attributions = array_filter($this->attributions, function($a) use ($attribution) {
            return $a->getId() !== $attribution->getId();
        });
    }
}