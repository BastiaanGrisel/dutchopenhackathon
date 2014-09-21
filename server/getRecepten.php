<?php

include_once("transavia.php");
include_once("countrycode.php");	
include_once("recepten.php");
include_once("Allerhande.php");
include_once("countrycolors.php");
include_once("huemanager.php");
include_once("bolmanager.php");
include_once("spotify.php");


//Getting those annoying notices and warnings out of the way

error_reporting(0);
// ini_set('display_errors', 1);

$flightId = $_REQUEST['flightId'];
$numberOfRecipes = $_REQUEST['numberOfRecipes'];

$airportCode = Transavia::getCountryCodeForJourney($flightId);
$countryCode = CountryCode::getCountryCodeForIATA($airportCode);

$fileName = "cache/cache.json." . $flightId . $numberOfRecipes;

$jsonObject = new StdClass();
if(file_exists($fileName)){
	$jsonObject = json_decode(file_get_contents($fileName));
} else {
	$jsonObject->recepten = Recepten::getReceptenForCountry($countryCode, $numberOfRecipes);
	$jsonObject->colors->RGB = CountryColors::getMainColors($countryCode);
	$jsonObject->colors->HUE = CountryColors::array_RGB_TO_HUE($jsonObject->colors->RGB);
	$jsonObject->producten = BolManager::getProductsForCountry($search = Countries::getDutchName($countryCode));
	$jsonObject->spotify = Spotify::getTrack($countryCode);

	file_put_contents($fileName, json_encode($jsonObject));	
}


//HueManager::setColors($jsonObject->colors->HUE);

foreach($recepten as $r) {
	$r->receptimagehd = Allerhande::getHighResImage($r->recepturl);
}

echo json_encode($jsonObject);
