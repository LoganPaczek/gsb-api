<?php
require_once 'Visiteur.php';
require_once 'Vehicule.php';

class SaisieHebdo implements JsonSerializable
{
    private $id;
    private $date;
    private $kmHebdo;
    private $visiteur;
    private $vehicule;

    public function __construct($id, $date, $kmHebdo, Visiteur $visiteur, Vehicule $vehicule)
    {
        $this->id = $id;
        $this->date = $date;
        $this->kmHebdo = $kmHebdo;
        $this->visiteur = $visiteur;
        $this->vehicule = $vehicule;
    }
    
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'kmHebdo' => $this->kmHebdo,
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

    public function getKmHebdo()
    {
        return $this->kmHebdo;
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

    public function setKmHebdo($kmHebdo)
    {
        $this->kmHebdo = $kmHebdo;
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