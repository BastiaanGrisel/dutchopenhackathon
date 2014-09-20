<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("huemanager.php");	
include_once("countrycolors.php");

$colors = CountryColors::getMainColors("NL");
echo json_encode($colors);
HueManager::setColors($colors);

?>