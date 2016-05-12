<?php
require_once('test.php');//Ajout du fichier contenant les fonction demander

$Username = "kevin.mandresy.velia"; // Mon nom d'utilisateur pour la connexion
$Password = "Mandresy95"; // Mon mot de passe
$url = "https://demo.rocket.chat/"; // URL de la demo Rocket Chat
$idRooms = "GENERAL"; // Room par default
$idRooms = "007"; // Room Test

$API = new API_Rest(); //Class API_Rest fonctions.php
$login = $API->login($Username, $Password, $url);
$publicRooms = $API->publicRooms(); 
$joinMessage = $API->join($idRooms);

// Affichage
print_r($login);
print_r("\n");
print_r($joinMessage);
?>