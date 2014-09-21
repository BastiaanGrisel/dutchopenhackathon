<?php
include("huemanager.php");

$colors = json_encode($_REQUEST['']);
HueManager::setColors($jsonObject->colors->HUE);


?>