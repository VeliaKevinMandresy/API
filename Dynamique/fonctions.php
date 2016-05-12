<?php

require 'Curl.php';
class API_Rest
{
    function __construct()
    {
        $this->Curl = new Curl();
    }
       
    /*
    ** Fonction de login qui prend en parmettre: Nom Utilisateur, Mdp & url (Rocket chat)
    */
    public function login($username, $password , $url)
    {
        $data['user'] = $username;
        $data['password'] = $password;
        $this->url = $url . "/api/";
        $login = $this->Curl->post($this->url.'login', $data);
        if ($login->status == "success") // Verification du status
        {
            $this->authToken = $login->data->authToken;
            $this->userId = $login->data->userId;
        }
        return $login;
    }
    
    /*
    ** Fonction qui permet la recuperation des Rooms en fonction du Token et de l'Id de l'utilisateur
    */
    public function publicRooms()
    {
        // -- setHeader -> Methode provenant de Curl.php
        $this->Curl->setHeader('X-Auth-Token', $this->authToken);
        $this->Curl->setHeader('X-User-Id', $this->userId);
        $listRooms = $this->Curl->get($this->url.'publicRooms');
        
        return $listRooms;
    }

    /*
    ** Fonction permettant de rejoindre une Room en fonction de son ID
    */
    public function join($idRooms)
    {
        // -- setHeader -> Methode provenant de Curl.php
        $this->Curl->setHeader('X-Auth-Token', $this->authToken);
        $this->Curl->setHeader('X-User-Id', $this->userId);
        $join = $this->Curl->post($this->url."rooms/$idRooms/join");

        return $join;
    }

    /*
    ** Fonction permettant d'envoyer un message predefinie a  une Room rejoin au prealable
    */
    public function sendMessage($idRooms, $message)
    {
        $this->Curl->setHeader('X-Auth-Token', $this->authToken);
        $this->Curl->setHeader('X-User-Id', $this->userId);
        $sendMessage = $this->Curl->post($this->url."rooms/$idRooms/send",array('msg' => $message));
        return $sendMessage;
    }
}