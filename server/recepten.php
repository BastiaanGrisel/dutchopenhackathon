<?php
class Recepten{
	
	public static function getReceptenForCountry($countryCode, $amount){
		$kitchen = self::getKitchenForCountry($countryCode);

		$recipes = self::getReceptenForKitchen($kitchen);

		
		$recipes = array_slice($recipes, 0, $amount);

		return $recipes;

	}

	private static function getReceptenForKitchen($kitchen){
		$apikey = "uE1WE1izR2xvV0Y927qP520cYy44quZH";
		$url = "https://frahmework.ah.nl/!ahpi/recepten.php?recepttag1=" . $kitchen . "&ahpikey=" . $apikey;
		$recipesEncoded = file_get_contents($url);
		return json_decode($recipesEncoded);
	
	}

	private static function getKitchenForCountry($country){
		$kitchen = NULL;
		$country = strtolower($country);
		switch ($country) {
			case 'cn':
				$kitchen = "Chinese";
				break;
			case 'fr':
				$kitchen = "Franse";
				break;
			case 'gr':
				$kitchen = "Griekse";
				break;
			case 'nl':
				$kitchen = "Hollandse";
				break;
			case 'in':
				$kitchen = "Indiase";
				break;
			case 'it':
				$kitchen = "Italiaanse";
				break;
			case 'jp':
				$kitchen = "Japanse";
				break;
			case 'mx':
				$kitchen = "Mexicaanse";
				break;
			case 'es':
				$kitchen = "Spaanse";
				break;
			case 'th':
				$kitchen = "Thaise";
				break;
			default:
				$kitchen = "Hollandse";
				break;
		}
		return $kitchen;
	}
}


?>