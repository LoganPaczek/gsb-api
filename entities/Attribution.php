<?php
require_once 'Visiteur.php';
require_once 'Vehicule.php';

class Attribution implements JsonSerializable
{
    private $visiteur;
    private $vehicule;
    private $dateDebut;
    private $dateFin;

    public function __construct(Visiteur $visiteur, Vehicule $vehicule, $dateDebut, $dateFin)
    {
        $this->visiteur = $visiteur;
        $this->vehicule = $vehicule;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }
    
    public function jsonSerialize()
    {
        return [
            'visiteur' => $this->visiteur,
            'vehicule' => $this->vehicule,
            'dateDebut' => $this->dateDebut,
            'dateFin' => $this->dateFin,
        ];
    }
    
    // Getters
    public function getVisiteur()
    {
        return $this->visiteur;
    }

    public function getVehicule()
    {
        return $this->vehicule;
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
    public function setVisiteur($visiteur)
    {
        $this->visiteur = $visiteur;
    }

    public function setVehicule($vehicule)
    {
        $this->vehicule = $vehicule;
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