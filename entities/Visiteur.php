<?php

class Visiteur implements JsonSerializable
{
    private $id;
    private $login;
    private $password;
    private $vehicule;

    public function __construct($id, $login, $password, $vehicule){
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->vehicule = $vehicule;
    }

    public function jsonSerialize(){
        return [
            'id' => $this->id,
            'login' => $this->login,
            'password' => $this->password,
            'vehicule' => $this->vehicule,
        ];
    }

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
}
?>