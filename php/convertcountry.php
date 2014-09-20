<?php
	$country = $_GET["country"];

	$curdir = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . "/";

	$colors = json_decode(file_get_contents($curdir . "countrycolors.php?country=" . $country));
	$kitchen = file_get_contents($curdir . "countrykitchen.php?country=" . $country);

	$object = new stdClass();
	$object->country = $country;
	$object->colors = $colors;
	$object->kitchen = $kitchen;

	echo json_encode($object);
?>