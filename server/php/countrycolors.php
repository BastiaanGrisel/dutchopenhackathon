<?php
/**
* 
*/
class CountryColors
{
	public static function getMainColors($country){
		
		$flag = self::getFlag($country);

		$colors = self::topColors($flag);

		echo json_encode($colors);
	}

	private static function getFlag($country){
		return @imagecreatefromgif("http://www.geonames.org/flags/x/" . $country . ".gif");
	}

	private static function topColors($image){
		$iDimensions[] = imagesx($image);
		$iDimensions[] = imagesy($image);

		$colors = [];

			//Iterate through every pixel
		for ($i=0; $i < $iDimensions[0]; $i++) { 
			for ($j=0; $j < $iDimensions[1]; $j++) { 
				$color = self::colorAt($image, $i, $j);
				$tag = self::tagIt($color);

				if(@array_key_exists($tag, $colors)){
					$colors[$tag] = 1;
					$cRefs[$tag] = self::RGB_TO_HSV($color["red"], $color["green"], $color["blue"]);
				}else{
					$colors[$tag]++;
				}

			}
		}

		$topColors = self::getTopKeys($colors);

			//Only select 2 colors
		$topColors = array_slice($topColors, 0, 2);

		return [$cRefs[$topColors[0]], $cRefs[$topColors[1]]];
	}

	private static function getTopKeys($colorArray){
		foreach ($colorArray as $key => $value) {
			if(!$highestColor) {
				$highestFreq = $value;
				$topColors[] = $key;
			}else{
				if ($highestFreq <= $value) {
					$highestFreq = $value;
					$topColors[] = $key;
				}
			}
		}

		return array_reverse($topColors);
	}

	private static function colorAt($image, $x, $y){
		$index = imagecolorat($image, $x, $y);
		return imagecolorsforindex($image, $index);
	}

	private static function tagIt($color){
		return "r" . $color["red"] . "g" . $color["green"] . "b" . $color["blue"];
	}

	private static function RGB_TO_HSV ($R, $G, $B)  // RGB Values:Number 0-255
		{                                 // HSV Results:Number 0-1
			$HSL = array();

			$var_R = ($R / 255);
			$var_G = ($G / 255);
			$var_B = ($B / 255);

			$var_Min = min($var_R, $var_G, $var_B);
			$var_Max = max($var_R, $var_G, $var_B);
			$del_Max = $var_Max - $var_Min;

			$V = $var_Max;

			if ($del_Max == 0)
			{
				$H = 0;
				$S = 0;
			}
			else
			{
				$S = $del_Max / $var_Max;

				$del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
				$del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
				$del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;

				if      ($var_R == $var_Max) $H = $del_B - $del_G;
				else if ($var_G == $var_Max) $H = ( 1 / 3 ) + $del_R - $del_B;
				else if ($var_B == $var_Max) $H = ( 2 / 3 ) + $del_G - $del_R;

				if ($H<0) $H++;
				if ($H>1) $H--;
			}

			$HSL['H'] = $H * 255;
			$HSL['S'] = $S * 255;
			$HSL['V'] = $V * 255;

			return $HSL;
		}
	}

	CountryConverter::getMainColors($_GET["country"]);
	?>