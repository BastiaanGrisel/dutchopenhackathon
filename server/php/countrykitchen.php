<?php
	$country = $_GET["country"];

	$kitchen = NULL;
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
			break;
	}

	echo $kitchen;
?>