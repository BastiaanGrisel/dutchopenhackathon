<?php 
	$json_example = '{
			"title" : "Thaise Curry", 
			"picture" : "http://www.ah.nl.kpnis.nl/static/recepten/img_007053_1600x560_JPG.jpg", 
			"time" : 30, 
			"url" : "http://www.ah.nl/allerhande/recept/R-R697352/thaise-kipcurry"
		}';

 ?>

 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Presentation</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Hello, world!</h1>
    <p><?php var_dump(json_decode($json_example)); ?></p>
    <div id="slide"></div>
	<script type="text/javascript" src="js/presentation.js"></script>



  </body>
</html>