$(function() {
	
	
		window.recipeRequest = $.getJSON("../server/getRecepten.php", {flightId: window.flightNumber, numberOfRecipes: 3}, function(data) {

		window.recipes = data;

	});


});	

$(function() {	
	
		$.get('../www/IngredientsTest.php', function(data) {
			var ingredients = $(data).find('.ingredients').find('a');
			$.each(ingredients, function(index, val) {
				$('#ingredientslist').append('<li>' + val.innerText + '</li>');
				// console.log(val.innerText)
			});
		});

});	
