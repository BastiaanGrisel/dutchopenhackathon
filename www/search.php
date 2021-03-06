<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Hans Geers United!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/search.css">

		<link rel="stylesheet" href="css/jquery-ui.min.css">
		<link rel="stylesheet" href="css/jquery-ui.structure.min.css">
		<link rel="stylesheet" href="css/jquery-ui.theme.min.css">
    </head>
    <body>
		<div id="page">
			<div id="page-helper">

				<div class="container">

					<div class="row">
						<div class="col-lg-12">
							<img src="img/logo.png" id="logo">
						</div>
					</div>

					<div class="row">

						<form id="hgu-search" method="post" action="presentation.php">
							<div class="input-group input-group-lg">
								<span class="input-group-addon">Flight no.</span>
								<select type="text" class="form-control" id="s" name="s" placeholder="e.g. HV 1357">
									<option id="loading">Loading..</option>
								</select>
								<span class="input-group-btn">
									<button class="btn btn-primary" type="submit">Generate &rarr;</button>
								</span>
							</div>
						</form>

					</div>

				</div>

			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-2.1.1.min.js"></script>
		<!-- jQuery UI -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>

		<script>
			jQuery(function($) {

				console.log('Preparing to get JSON.');
				autocompleteData = new Array();
				flightIDs = new Array();

				$.getJSON("../server/getTodaysFlights.php", function(data) {

					$('#loading').remove();

					$.each(data, function(i, v) {
						$('#s').append('<option value="'+v[0]+'">'+v[1]+'</option>');
					});

					$("#s_dummy").autocomplete({
						source: autocompleteData
					});
					
					$("#s_dummy").on('change', function(){
						
						ind = autocompleteData.indexOf($(this).val());
						
						console.log(ind);
					
						
						$('#s').val(flightIDs[autocompleteData.indexOf()]);
						
					});
					
				});

			});
		</script>
    </body>
</html>
