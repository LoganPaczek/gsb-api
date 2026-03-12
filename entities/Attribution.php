<?php

class Attribution implements JsonSerializable
{
    private $idVisiteur;
    private $idVehicule;
    private $dateDebut;
    private $dateFin;

    public function __construct($idVisiteur, $idVehicule, $dateDebut, $dateFin)
    {
        $this->idVisiteur = $idVisiteur;
        $this->idVehicule = $idVehicule;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }
    
    public function jsonSerialize()
    {
        return [
            'idVisiteur' => $this->idVisiteur,
            'idVehicule' => $this->idVehicule,
            'dateDebut' => $this->dateDebut,
            'dateFin' => $this->dateFin,
        ];
    }
    
    // Getters
    public function getIdVisiteur()
    {
        return $this->idVisiteur;
    }

    public function getIdVehicule()
    {
        return $this->idVehicule;
    }
    
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    public function getDateFin()
    {
        return $this->dateFin;
    }
    
    // Setters
    public function setIdVisiteur($idVisiteur)
    {
        $this->idVisiteur = $idVisiteur;
    }

    public function setIdVehicule($idVehicule)
    {
        $this->idVehicule = $idVehicule;
    }

    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }
}