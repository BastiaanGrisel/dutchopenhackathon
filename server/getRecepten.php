<?php

include_once("transavia.php");
include_once("countrycode.php");	
include_once("recepten.php");
include_once("countrycolors.php");

$flightId = $_REQUEST['flightId'];
$numberOfRecipes = $_REQUEST['numberOfRecipes'];

$airportCode = Transavia::getCountryCodeForJourney($flightId);
$countryCode = CountryCode::getCountryCodeForIATA($airportCode);

$jsonObject = new StdClass();

$jsonObject->recepten = Recepten::getReceptenForCountry($countryCode, $numberOfRecipes);
$jsonObject->colors = CountryColors::getMainColors($country);

echo json_encode($jsonObject);


?>