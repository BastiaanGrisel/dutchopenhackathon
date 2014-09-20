<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/css/probeer_ook_eens.php?url=<?php echo $_GET['image'] ?>">
	</head>
	<body style="background: url('<?php echo $_GET['url'] ?>') no-repeat center center;">
		<div class="container">	
			<div class="title prefix-title">
				<span>Probeer ook eens...</span>
			</div>
			<div class="title recipe-title">
				<span><?php echo $_GET['title'] ?></span>
			</div>
			<div class="cooking-time"><?php echo $_GET['time'] ?></div>
		<div>
	</body>
</html>