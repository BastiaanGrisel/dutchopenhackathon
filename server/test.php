<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("countrycode.php");

include_once("bolmanager.php");	

$engl = Countries::getEnglishName("BE");
$dutch = Countries::getDutchName("BE");

echo $engl . $dutch;
die();

$data = BolManager::getProductsForCountry($search);
echo json_encode($data->products);

?>