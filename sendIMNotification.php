<?php
/*
** This fonction allowed to connect user a rocket chat 
** with password and username
*/
function login($password, $username)
{
    //login form action url
    $url="https://demo.rocket.chat/api/login";
    $postinfo = "password=".$password."&user=".$username;

    //Creation tmp file
    $cookie = 'rocketChat_temporaire.txt';
    if (!file_exists(realpath($cookie))) touch($cookie);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_NOBODY, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
    curl_setopt($ch, CURLOPT_COOKIEJAR, realpath($cookie));
    curl_exec($ch);
     
    // Http status ( Check error ) debug
    /* $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE); */

    //page with the content I want to grab
    curl_setopt($ch, CURLOPT_URL, $url);
    
    $html = curl_exec($ch);
    curl_close($ch);

    // function ListeChanel Call
    ListeChanel();
    join_chanel();
    unlink($cookie);
}

/*
**This function allowed to display list of Chanel
*/
function ListeChanel()
{
    $url = 'https://demo.rocket.chat/api/publicRooms';
    $MyToken = "05C8yJjVWZiGH7YetCao6951z00R1VuUCInaeMVhyod";
    $MySecretPwd = "RwsYyF2kSdPgc7ppE";
    $postinfo = array(
        "X-Auth-Token: $MyToken",
        "X-User-Id: $MySecretPwd",
    );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $postinfo);

    $json = curl_setopt($ch, CURLOPT_URL, $url);
    $json_decode = json_decode($json);
    
    $response = curl_exec($ch);
    curl_close($ch);
}

/* 
**This function allowed to Join a Room
*/
function join_chanel()
{
    $url = 'https://demo.rocket.chat/api/rooms/x4pRahjs5oYcTYu7i/join';
    $MyToken = "05C8yJjVWZiGH7YetCao6951z00R1VuUCInaeMVhyod";
    $MySecretPwd = "RwsYyF2kSdPgc7ppE";
    $postinfo = array(
        "X-Auth-Token: $MyToken",
        "X-User-Id: $MySecretPwd",
    );
    $postinfo2 ='"' . '{}' .'"';
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo2);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $postinfo);
    curl_setopt($ch, CURLOPT_URL, $url);
    
    $response = curl_exec($ch);
    curl_close($ch);
}

login("Mandresy95", "kevin.mandresy.velia");
?>