<?php
class CountryCode{
	const URL = "https://www.googleapis.com/freebase/v1/mqlread?indent=2&query=[{%22type%22:%22/aviation/airport%22,%22id%22:null,%22limit%22:%2025,%22name%22:null,%22sort%22:%22name%22,%22iata%22:%20%22<<CODE>>%22,%20%22/location/location/containedby%22:%20[{%22limit%22:6,%22name%22:null,%22optional%22:%20true,%22sort%22:%22name%22,%22/location/country/iso3166_1_alpha2%22:%20[{%20%22limit%22:6,%20%22optional%22:%20false,%20%22sort%22:%22value%22,%20%22value%22:null}]}],%22airport_type%22:%20[{%22limit%22:3,%22name%22:null,%22optional%22:%20true,%22sort%22:%22name%22,%22type%22:%22/aviation/airport_type%22}]}]";

	public static function getCountryCodeForIATA($IATA){
		$url = str_replace("<<CODE>>", $IATA, self::URL);
		$code = self::getCountryCode($url);
		return $code;
	}

	private static function getCountryCode($url){
		$data = file_get_contents($url);
		$json = json_decode($data);
		
		$prop1 = "/location/location/containedby";
		$prop2 = "/location/country/iso3166_1_alpha2";
		$result = $json->result;
		$containedBy = $result[0]->$prop1;
		$iso3166_1_alpha2 = $containedBy[0]->$prop2;
		$code = $iso3166_1_alpha2[0]->value;
		
		return $code;
	}

}

?>