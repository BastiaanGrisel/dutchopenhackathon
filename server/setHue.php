<?php
include("huemanager.php");

$colors = json_decode($_REQUEST['colors']);
HueManager::setColors($jsonObject->colors->HUE);


?>