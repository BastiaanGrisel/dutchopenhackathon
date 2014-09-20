<?php
	$country = $_GET["country"];
	$amount = $_GET["amount"];

	$curdir = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . "/";

	//Convert country to kitchen
	$kitchen = file_get_contents($curdir . "countrykitchen.php?country=" . $country);

	$recipes = getRecipes($kitchen);

	//Get the first amount of recipes
	$recipes = array_slice($recipes, 0, $amount);

	echo json_encode($recipes);

	function getRecipes($kitchen){
		$apikey = "uE1WE1izR2xvV0Y927qP520cYy44quZH";

		$recipesEncoded = file_get_contents("https://frahmework.ah.nl/!ahpi/recepten.php?recepttag1=" . $kitchen . "&ahpikey=" . $apikey);

		return json_decode($recipesEncoded);
	}
?>