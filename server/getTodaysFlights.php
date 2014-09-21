<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("transavia.php");

$fileName = "cache/cache.json.todaysFlights";

$flightIds = array();
if(file_exists($fileName)){
	$flightIds = json_decode(file_get_contents($fileName));
} else {
	$data = Transavia::getJourneysToKLM();
	foreach($data as $flight){
		$flightIds[] = array($flight->id, $flight->DepartureStation . " - " . $flight->ArrivalStation);
	}
	file_put_contents($fileName, json_encode($flightIds));	
}

echo json_encode($flightIds);
?>