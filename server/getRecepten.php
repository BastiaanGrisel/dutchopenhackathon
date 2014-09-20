<?php

include_once("transavia.php");
include_once("countrycode.php");	
include_once("recepten.php");
include_once("Allerhande.php");

$flightId = $_REQUEST['flightId'];
$numberOfRecipes = $_REQUEST['numberOfRecipes'];

$airportCode = Transavia::getCountryCodeForJourney($flightId);
$countryCode = CountryCode::getCountryCodeForIATA($airportCode);

$recepten = Recepten::getReceptenForCountry($countryCode, $numberOfRecipes);

foreach($recepten as $r) {
	$r->receptimagehd = Allerhande::getHighResImage($r->recepturl);
}

echo json_encode($recepten);