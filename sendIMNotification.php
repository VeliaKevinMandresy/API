<?php

function login($password, $username)
{
    //login form action url
    $url="https://demo.rocket.chat/api/login";
    $postinfo = "password=".$password."&user=".$username;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_NOBODY, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
    curl_exec($ch);
     
    // Http status ( Check error ) debug
    /* $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE); */
    
    //page with the content I want to grab
    curl_setopt($ch, CURLOPT_URL, $url);
    
    $html = curl_exec($ch);
    curl_close($ch);
}

function 

login("Mandresy95", "kevin.mandresy.velia");

?>