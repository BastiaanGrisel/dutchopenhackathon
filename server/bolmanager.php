<?php

foreach (glob("bolapi/src/bolcom/*.php") as $filename)
{
    include $filename;
}


class BolManager{
	private static $bolClient = null;
	public static function getProductsForCountry($countryName){
		
		$books = self::getBooksForSearch($countryName);
		return $books->products;
	}

	private static function getBooksForSearch($search){
		$client = self::getBolClient();
		$ids = '1430,4283461591'; // Nederlanse boeken, 5 sterren rating, Film&TV, Muziek,
		$response = $client->getSearch($search, $ids, null, 0, 10, 'sales_ranking', false, true, true, true, '', NULL);
		return $response;
	}

	private static function getBolClient(){
		if(!self::$bolClient){
			$bol_api_key = '2C42709CDE6B4AF49B874E38CF1DFD12';
			$bol_api_format = 'json';
			$bol_api_debug_mode = 0;
			$bol_api_library_version = 'v.2.0.0';
			self::$bolClient = new Client($bol_api_key,$bol_api_format,$bol_api_debug_mode);
		}
		return self::$bolClient;
	}
}
?>