<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("transavia.php");
include_once("countrycode.php");	

$data = CountryCode::getCountryCodeForIATA("AMS");
var_dump($data);
?>