<?php
class Spotify
{
	public static function getTrack($country){
		$country = Countries::getEnglishName($country);
		$encodedJSON = file_get_contents("https://api.spotify.com/v1/search?type=track&q=" . urlencode($country));
		$tracks = json_decode($encodedJSON)->tracks;
		return $tracks->items[0]->preview_url;
	}
}
?>