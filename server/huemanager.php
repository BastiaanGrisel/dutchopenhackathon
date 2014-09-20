<?php
require_once("huephp/hue.php");
class HueManager{
	const IP = '10.12.0.4';
	const USER = "HansGeersUnited";

	public static function setColors($colors){
		$hue = new Hue( self::IP, self::USER);
		$lights = $hue->lights();

		for($i = 1; $i <= count($lights); $i++){
			$light = $lights[$i];
			$color = $colors[$i % count($colors)];
			$light->setLight($color);
		}
	}
}

?>