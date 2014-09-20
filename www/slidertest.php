<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Hans Geers United!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.css">

		<link rel="stylesheet" href="css/flexslider.css">
    </head>
    <body>
		<div id="page">
			<div class="slide" style="background:red;">
				Test1
			</div>
			<div class="slide" style="background:blue;">
				Test2
			</div>
			<div class="slide" style="background:yellow;">
				Test3
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-2.1.1.min.js"></script>
		<!-- jQuery UI -->
		<script src="js/jquery.flexslider-min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>

		<script>
			jQuery(function($) {

				$('#page').flexslider({
					selector: '.slide',
					animation: 'slide',
					slideshowSpeed: 1000,
					controlNav: false,
					directionNav: false,
					useCSS: false
				});
				
				// Set slide height
				$('#page .slide').height($(window).innerHeight());

			});
			
			// Update slide height on window resize
			$(window).on('resize', function(){
				$('#page .slide').height($(window).innerHeight());
			});
		</script>
		<style>
			body {
				margin:0;
				padding:0;
			}
			
			#page {
				width:100%;
				overflow:hidden;
			}
		</style>
    </body>
</html>
