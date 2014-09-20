<?php
ini_set('display_errors', 1);

include_once("transavia.php");
include_once("countrycode.php");	

$flightId = $_REQUEST['flightId'];
$numberOfRecipes = $_REQUEST['numberOfRecipes'];

$airportCode = Transavia::getCountryCodeForJourney($flightId);
$countryCode = CountryCode::getCountryCodeForIATA($airportCode);


?>