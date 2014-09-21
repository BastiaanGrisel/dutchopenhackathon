<?php

class Allerhande {

	/**
	 * Hack allerhande.nl to get high res recipe image.
	 * @param type $url
	 * @return type
	 */
	public static function getHighResImage($url) {

		// Load file
		$c = file_get_contents($url);

		// Find location of image
		$loc = strpos($c, '<li class="responsive-image"');

		// Strip first part of data
		$c = substr($c, $loc);

		// Find first data-default-src
		$loc = strpos($c, 'data-default-src');

		// Strip second part of data
		$c = substr($c, $loc, 1000);

		// Explode on newline
		$arr = explode("\n", $c);

		// Image is in first array item
		$img = $arr[0];

		// Clean up image string
		$img = substr($arr[0], strpos($img, 'http://'), -1);



		return $img;
	}
}
