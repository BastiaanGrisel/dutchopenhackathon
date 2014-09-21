<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("schiphol.php");

$data = Schiphol::getBagbeltNumber("HV488");
var_dump($data);

?>