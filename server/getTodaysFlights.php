<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("transavia.php");

$data = Transavia::getJourneysToKLM();
echo json_encode($data);
?>