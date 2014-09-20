$(function() {
	
	
	window.recipeRequest = $.getJSON("../server/getRecepten.php", {flightId: window.flightNumber, numberOfRecipes: 3}, function(data) {

		window.recipes = data;

	});


});	