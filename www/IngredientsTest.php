<?php
		// Load file
		$c = file_get_contents($_GET['url']);
		error_reporting(0);
		$doc = new DOMDocument();
		$doc->loadHTML($c);

		echo $doc->saveHTML();

?>