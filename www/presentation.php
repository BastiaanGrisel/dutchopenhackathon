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
		<link href="css/new.css" rel="stylesheet">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-2.1.1.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/mustache.js"></script>
		<script>
<?php
if (!empty($_POST['s'])) {
	?>
				window.flightNumber = "<?php echo htmlentities($_POST['s']); ?>";
	<?php
} else {
	?>
				window.alert('JE HEBT GEEN FLIGHTNUMBER GEKOZEN LULLO!');
<?php } ?>
		</script>
	</head>
	<body>

		<div id="timer" style="font-weight: bold; position:absolute; top:0; left:0; font-size: 50px; background: white; z-index: 999; padding: 20px"></div>	

		<div id="slider"></div>

		<div style="display: none">

			<div class="slide" id="bol_com">
				<div class="slide-container"> 
					<div class="bol-header">Neem je vakantie mee naar huis met Bol.com</div>
					<div class="products">
						<div id="product1" class="product">
							<div class="product-title">{{title}}</div>
							<img src="{{images.4.url}}" />
							<div class="product-price">&euro; {{offerData.offers.0.price}}</div>
						</div>
						<div id="product2" class="product">
							<div class="product-title">{{title}}</div>
							<img src="{{images.4.url}}" />
							<div class="product-price">&euro; {{offerData.offers.0.price}}</div>
						</div>
						<div id="product3" class="product">
							<div class="product-title">{{title}}</div>
							<img src="{{images.4.url}}" />
							<div class="product-price">&euro; {{offerData.offers.0.price}}</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slide" id="ah">
				<div class="slide-container">
					<section id="recipe-top" class="recipe">

						<div class="recipe-image" style="background-image:url('{{receptimagehd}}');">&nbsp;</div>
						<div class="recipe-meta">
							<div class="recipe-title">
								<h1>{{receptomschrijving}}</h1>
							</div>
							{{#recepttijd}}
							<div class="recipe-duration">
								{{recepttijd}} min
							</div>
							{{/recepttijd}}
						</div>

					</section>

					<header id="header">
						<div style="display:table;width:100%;height:100%;"><div style="display:table-cell;width:100%;height:100%;vertical-align:middle;"><span style="color:#00A0E2;">Thuis op vakantie.</span> <span style="color:#6CCAF1;">Gewoon bij <img style="margin:-20px 5px 0 5px;" draggable="false" src="img/new/ah_small.png"> Albert Heijn.</span></div></div>
					</header>

					<section id="recipe-btm" class="recipe">

						<div class="recipe-image" style="background-image:url('{{receptimagehd}}');">

							<div class="recipe-meta">
								<div class="recipe-title">
									<h1>{{receptomschrijving}}</h1>
								</div>
								{{#recepttijd}}
								<div class="recipe-duration">
									{{recepttijd}} min
								</div>
								{{/recepttijd}}
							</div>

						</div>

					</section>
				</div>
			</div>

		</div>

		<script src="js/jquery.flexslider-min.js"></script>

		<script>
			if (typeof window.flight)
				jQuery(function($) {

					// Start the countdown
					time = (Math.floor((Math.random() * 2700) + 900));

					setInterval(function() {
						time -= 1;
						seconds = Math.floor(time % 60).toString().length == 1 ? "0" + Math.floor(time % 60) : Math.floor(time % 60);
						$("#timer").html(Math.floor(time / 60) + ":" + seconds);
					}, 1000);


					// Hide slider
					$('#slider').hide();

					$.getJSON("../server/getRecepten.php", {flightId: window.flightNumber, numberOfRecipes: 4}, function(data) {

						console.log(data);

						recipes = data.recepten;
						bolcom = data.producten;

						// Remove loading icon
						$('#loading').remove();

						// Slider elem shortcut
						$s = $('#slider');

						if (recipes == null || typeof recipes != 'undefined' && recipes.length > 0) {

							// Loop over recipes
							for (i = 0; i < recipes.length; i += 2) {

								// Clone template div
								$n = $('#ah').clone();
								$n.addClass($n.attr('id'));
								$n.removeAttr('id');

								// Append to slider
								$s.append($n);

								$rtop = $n.find('#recipe-top');
								$rbtm = $n.find('#recipe-btm');

								// Parse with Mustache
								$rtop.html(Mustache.render($rtop.html(), recipes[i]));
								$rbtm.html(Mustache.render($rbtm.html(), recipes[i + 1]));

								$n.height($(window).innerHeight());

							}

						}

						if (typeof bolcom != 'undefined' && bolcom.length > 0) {

							// Loop over bolcom
							for (i = 0; i < bolcom.length; i += 3) {

								// Only show slides with all three products
								if (bolcom == null || typeof bolcom[i + i] == 'undefined' || typeof bolcom[i + 2] == 'undefined')
									break;

								// Clone template div
								$n = $('#bol_com').clone();
								$n.addClass($n.attr('id'));
								$n.removeAttr('id');

								// Append to slider
								$s.append($n);

								$p1 = $n.find('#product1');
								$p2 = $n.find('#product2');
								$p3 = $n.find('#product3');

								// Parse with Mustache
								$p1.html(Mustache.render($p1.html(), bolcom[i]));
								$p2.html(Mustache.render($p2.html(), bolcom[i + 1]));
								$p3.html(Mustache.render($p3.html(), bolcom[i + 2]));

								$n.height($(window).innerHeight());

							}

						}

						// Add slider functionality
						$('#slider').flexslider({
							selector: '.slide',
							animation: 'fade',
							slideshowSpeed: 5000,
							//controlNav: false,
							directionNav: false,
							keyboard:true,
							multipleKeyboard: true
						});

						// Display slider
						$('#slider').show();

						playAudio(data.spotify);
					});

				});

			// Update slide height on window resize
			$(window).on('resize', function() {
				$('#slider .slide').height($(window).innerHeight());
			});

			function playAudio($url) {
				var audio = new Audio($url);
				audio.play();
			}

		</script>

		<div id="loading" style="position:absolute;width:100%;height:100%;z-index:10000;background:#fff url('img/loading.gif') center no-repeat;"></div>
	</body>
</html>
