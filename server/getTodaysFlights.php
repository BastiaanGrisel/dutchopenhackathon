<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("transavia.php");

$data = Transavia::getJourneysToKLM();

$flightIds = array();
foreach($data as $flight){
	$flightIds[] = array($flight->id, $flight->DepartureStation . " - " . $flight->ArrivalStation);
}

echo json_encode($flightIds);
?>