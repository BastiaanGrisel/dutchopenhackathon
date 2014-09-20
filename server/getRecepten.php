<?php

include_once("transavia.php");
include_once("countrycode.php");	
include_once("recepten.php");

$flightId = $_REQUEST['flightId'];
$numberOfRecipes = $_REQUEST['numberOfRecipes'];

$airportCode = Transavia::getCountryCodeForJourney($flightId);
$countryCode = CountryCode::getCountryCodeForIATA($airportCode);

$recepten = Recepten::getReceptenForCountry($countryCode, $numberOfRecipes);

echo json_encode($recepten);


?>