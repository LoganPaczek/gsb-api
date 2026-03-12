<?php

class Vehicule implements JsonSerializable
{
    private $id;
    private $immatriculation;
    private $marque;
    private $modele;
    private $attributions = [];
    private $saisieJour;
    private $saisieHebdo;
    private $totalSaisieJour;
    private $totalSaisieHebdo;

    public function __construct($id, $immatriculation, $marque, $modele, array $attributions = [], $saisieJour, $saisieHebdo, $totalSaisieJour, $totalSaisieHebdo)
    {
        $this->id = $id;
        $this->immatriculation = $immatriculation;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->attributions = $attributions;
        $this->saisieJour = $saisieJour;
        $this->saisieHebdo = $saisieHebdo;
        $this->totalSaisieJour = $totalSaisieJour;
        $this->totalSaisieHebdo = $totalSaisieHebdo;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'immatriculation' => $this->immatriculation,
            'marque' => $this->marque,
            'modele' => $this->modele,  
            'attributions' => $this->attributions,
            'saisieJour' => $this->saisieJour,
            'saisieHebdo' => $this->saisieHebdo,
            'totalSaisieJour' => $this->totalSaisieJour,
            'totalSaisieHebdo' => $this->totalSaisieHebdo,
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

    public function getSaisieJour()
    {
        return $this->saisieJour;
    }

    public function getSaisieHebdo()
    {
        return $this->saisieHebdo;
    }

    public function getTotalSaisieJour()
    {
        return $this->totalSaisieJour;
    }

    public function getTotalSaisieHebdo()
    {
        return $this->totalSaisieHebdo;
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

    public function setSaisieJour($saisieJour)
    {
        $this->saisieJour = $saisieJour;
    }

    public function setSaisieHebdo($saisieHebdo)
    {
        $this->saisieHebdo = $saisieHebdo;
    }

    public function setTotalSaisieJour($totalSaisieJour)
    {
        $this->totalSaisieJour = $totalSaisieJour;
    }

    public function setTotalSaisieHebdo($totalSaisieHebdo)
    {
        $this->totalSaisieHebdo = $totalSaisieHebdo;
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