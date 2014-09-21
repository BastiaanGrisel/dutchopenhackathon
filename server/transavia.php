<?php
include_once("countrycode.php");
class Transavia{
	const BASE_URL = 'http://api.transapia.nl:80/api/';
	const KEY_ARRIVALSTATION = "ArrivalStation";
	const KEY_DEPARTUREDAY = "DepartureDate";
	const DESTINATION_AMS = "AMS";
	const DEFAULT_DATE = "2014-06-24";

	// public static function getJourneyForFlightId($flightID){
	// 	$url = BASE_URL + "journeys" + "/" + "?" + "filter" + "[where]";
	// }

	public static function getJourneysToKLM(){
		$url = self::BASE_URL . "journeys" . "/" . "?" . self::generateWhereFilter(self::KEY_ARRIVALSTATION, self::DESTINATION_AMS) . "&" . self::generateWhereFilter(self::KEY_DEPARTUREDAY, self::DEFAULT_DATE);
		$data = self::getJSONData($url);
		$flightNumbers = self::getFlightNumberForJourneys($data);
		return $flightNumbers;
	}

	private static function getFlightNumberForJourneys($journeys){
		$flightNumbers = array();
		foreach($journeys as $journey){
			$flightNumbers[] = array($journey->id, self::getFlightNumberForJourney($journey->id) . ", from" . $journey->DepartureDate);
		}	
		return $flightNumbers;
	}

	public static function getFlightNumberForJourney($journeyId){
		$data = self::getJourney($journeyId)[0];
		$flightNumber = $data->CarrierCode . $data->FlightNumber;
		return $flightNumber;
	}

	private static function generateWhereFilter($key, $value){
		return "filter" . "[where]" . "[" . $key . "]" . "=" . $value;
	}


	private static function getJourney($journeyId){
		$url = self::BASE_URL . "journeys" . "/" . $journeyId . "/legs";
		$data = self::getJSONData($url);	
		return $data;
	}

	private static function getJSONData($url){
		$data = file_get_contents($url);
		return json_decode($data);
	}

	public static function getCountryCodeForJourney($journeyId){
		$journey = self::getJourney($journeyId)[0];
		return $journey->DepartureStation;
	}

}

?>