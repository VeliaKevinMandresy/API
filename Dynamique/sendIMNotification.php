<?php
require_once('fonctions.php');//Ajout du fichier contenant les fonction demander

$Username = "kevin.mandresy.velia"; // Mon nom d'utilisateur pour la connexion
$Password = "Mandresy95"; // Mon mot de passe
$url = "https://demo.rocket.chat/"; // URL de la demo Rocket Chat

$API = new API_Rest(); //Class API_Rest fonctions.php
$login = $API->login($Username, $Password, $url);

print_r($login); // Affichage du status
print_r("\n");
?>