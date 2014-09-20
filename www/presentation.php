<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Presentation</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/presentation.css" rel="stylesheet">
		<link href="css/flexslider.css" rel="stylesheet">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-2.1.1.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/mustache.js"></script>
		<?php
		if (!empty($_POST['s'])) {
			?>
			<script>
				window.flightNumber = "<?php echo htmlentities($_POST['s']); ?>";
			</script>
			<?php
		}
		?>
	</head>
	<body>

		<div id="slider">

      <div class="slide" id="probeer_ook_eens">
        <div class="slide-container" style="background-image: url(https://frahmework.ah.nl/!data/recepten/jpg200/{{receptimageid}}.jpg);">
          <div class="title-container">
            <div class="title prefix-title">
              <span>Probeer ook eens...</span>
            </div>
            <div class="title recipe-title">
              <span>{{receptomschrijving}}</span>
            </div>
            <div class="cooking-time">{{recepttijd}}</div>
          </div>
        </div>
      </div>

      <div class="slide" id="ah_to_go">
        <div class="slide-container"> 
          <div class="title">
            <span>Zin in een snelle snack voor onderweg?</span>
          </div>
          <img src="http://www.sispr.nl/wp-content/uploads/2014/03/AH-To-Go-3-0-Logo-stacked1.jpg" />
        </div>
      </div>

		</div>

		<script type="text/javascript" src="js/presentation.js"></script>
		<script src="js/jquery.flexslider-min.js"></script>
		<script>
			jQuery(function($) {

				console.log(window);

				$('#slider').hide();
				$('body').append('<div id="loading" style="position:absolute;width:100%;height:100%;z-index:10000;background:#fff url(\'img/loading.gif\') center no-repeat;"></div>')

				window.recipeRequest.done(function(data) {
					console.log(data);
					
					$('#loading').remove();

					$('#slider').flexslider({
						selector: '.slide',
						animation: 'fade',
						slideshowSpeed: 1000,
						controlNav: false,
						directionNav: false,
						useCSS: false,
						before: function() {
							$("#probeer_ook_eens").html(Mustache.render($("#probeer_ook_eens").html(), window.recipes[0]));
						},
						start: function() {
							$('#slider').show();
						}
					});
					
				});

				// Set slide height
				$('#slider .slide').height($(window).innerHeight());

			});

			// Update slide height on window resize
			$(window).on('resize', function() {
				$('#slider .slide').height($(window).innerHeight());
			});
		</script>
	</body>
</html>
