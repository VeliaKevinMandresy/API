<?php
require_once('fonctions.php');//Ajout du fichier contenant les fonctions demander

$Username = "kevin.mandresy.velia"; // Mon nom d'utilisateur pour la connexion
$Password = "Mandresy95"; // Mon mot de passe
$url = "https://demo.rocket.chat/"; // URL de la demo Rocket Chat
//$idRooms = "GENERAL"; // Room par default
$idRooms = "whfpPjE2okzgBHLv5"; // Nom de Room "Anime"
$message = "Bonjour, je suis kevin un ami a TOTO et j'adore les animes";
//$message = "Goodnight everyone"; //Message test

$API = new API_Rest(); //Class API_Rest fonctions.php
$login = $API->login($Username, $Password, $url);
$joinRoom = $API->join($idRooms);
$sendMsg = $API->sendMessage($idRooms, $message);
$listRooms = $API->publicRooms();

// Affichage
print_r($listRooms);
?>