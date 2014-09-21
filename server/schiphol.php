<?php
class Schiphol{
	const BASE_URL = 'http://145.35.195.100:80/rest/';

	public static function getBagbeltNumber($flightNumber){
		$journey = self::getJourney($flightNumber);
		$flight = json_decode($journey);
		return $flight->Flights->Flight->Arrival->BagBelt;
	}

	private static function getJourney($flightNumber){
		$url = "flights/A/" . $flightNumber;
		$data = self::getData($url);
		return $data;
	}

	private static function getData($url){
		$opts = array(
		  'http'=>array(
		    'method'=>"GET",
		    'header'=>"Accept: application/json\r\n" .
		              "Connection: Keep-Alive\r\n"
		  )
		);

		$context = stream_context_create($opts);

		// Open the file using the HTTP headers set above
		$file = file_get_contents(self::BASE_URL . $url, false, $context);
		return $file;
	}
}

?>