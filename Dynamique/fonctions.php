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
}