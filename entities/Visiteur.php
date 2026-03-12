<?php

class Visiteur implements JsonSerializable
{
    private $id;
    private $login;
    private $password;
    private $vehicule;
    private $saisieJour;
    private $saisieHebdo;
    private $totalSaisieJour;
    private $totalSaisieHebdo;

    public function __construct($id, $login, $password, $vehicule, $saisieJour, $saisieHebdo, $totalSaisieJour, $totalSaisieHebdo){
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->vehicule = $vehicule;
        $this->saisieJour = $saisieJour;
        $this->saisieHebdo = $saisieHebdo;
        $this->totalSaisieJour = $totalSaisieJour;
        $this->totalSaisieHebdo = $totalSaisieHebdo;
    }

    public function jsonSerialize(){
        return [
            'id' => $this->id,
            'login' => $this->login,
            'password' => $this->password,
            'vehicule' => $this->vehicule,
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

    public function getLogin()
    {
        return $this->login;
    }   

    public function getPassword()
    {
        return $this->password;
    }

    public function getVehicule()
    {
        return $this->vehicule;
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

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setVehicule($vehicule)
    {
        $this->vehicule = $vehicule;
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
    public function addSaisieJour($saisieJour)
    {
        $this->saisieJour[] = $saisieJour;
    }

    public function addSaisieHebdo($saisieHebdo)
    {
        $this->saisieHebdo[] = $saisieHebdo;
    }
}
?>