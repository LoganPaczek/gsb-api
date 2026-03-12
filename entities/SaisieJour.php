<?php
require_once 'Visiteur.php';
require_once 'Vehicule.php';

class SaisieJour implements JsonSerializable
{
    private $id;
    private $date;
    private $kmJournee;
    private $visiteur;
    private $vehicule;

    public function __construct($id, $date, $kmJournee, Visiteur $visiteur, Vehicule $vehicule)
    {
        $this->id = $id;
        $this->date = $date;
        $this->kmJournee = $kmJournee;
        $this->visiteur = $visiteur;
        $this->vehicule = $vehicule;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'kmJournee' => $this->kmJournee,
            'visiteur' => $this->visiteur,
            'vehicule' => $this->vehicule,
        ];
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    
    public function getDate()
    {
        return $this->date;
    }

    public function getKmJournee()
    {
        return $this->kmJournee;
    }
    
    public function getVisiteur()
    {
        return $this->visiteur;
    }

    public function getVehicule()
    {
        return $this->vehicule;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setKmJournee($kmJournee)
    {
        $this->kmJournee = $kmJournee;
    }

    public function setVisiteur($visiteur)
    {
        $this->visiteur = $visiteur;
    }

    public function setVehicule($vehicule)
    {
        $this->vehicule = $vehicule;
    }
}

?>