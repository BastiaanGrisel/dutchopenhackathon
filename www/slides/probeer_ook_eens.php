<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/css/presentation.css">
	</head>
	<body style="background: url('https://frahmework.ah.nl/!data/recepten/jpg200/<?php echo $_GET['receptimageid'] ?>.jpg') no-repeat center;">
		<div class="container">	
			<div class="title prefix-title">
				<span>Probeer ook eens...</span>
			</div>
			<div class="title recipe-title">
				<span><?php echo $_GET['receptomschrijving'] ?></span>
			</div>
			<div class="cooking-time"><?php echo $_GET['recepttijd'] ?></div>
		<div>
	</body>
</html>