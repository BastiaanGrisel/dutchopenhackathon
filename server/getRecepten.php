<?php

include_once("transavia.php");
include_once("countrycode.php");	
include_once("recepten.php");
include_once("countrycolors.php");
include_once("huemanager.php");
include_once("bolmanager.php");
include_once("iso/src/Jasny/ISO/Countries.php");

//Getting those annoying notices and warnings out of the way

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$flightId = $_REQUEST['flightId'];
$numberOfRecipes = $_REQUEST['numberOfRecipes'];

$airportCode = Transavia::getCountryCodeForJourney($flightId);
$countryCode = CountryCode::getCountryCodeForIATA($airportCode);

$jsonObject = new StdClass();


$jsonObject->recepten = Recepten::getReceptenForCountry($countryCode, $numberOfRecipes);
$jsonObject->colors->RGB = CountryColors::getMainColors($countryCode);
$jsonObject->colors->HUE = CountryColors::array_RGB_TO_HUE($jsonObject->colors->RGB);
$jsonObject->producten = BolManager::getProductsForCountry($search = Countries::getName($countryCode));

//HueManager::setColors($jsonObject->colors->HUE);

echo json_encode($jsonObject);


?>