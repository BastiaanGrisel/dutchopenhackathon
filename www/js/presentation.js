$(function() {

	/*var json_example = 
	 { "recipes":[
	 {
	 "title" : "Thaise Curry", 
	 "picture" : "http://www.ah.nl.kpnis.nl/static/recepten/img_007053_1600x560_JPG.jpg", 
	 "time" : 30, 
	 "url" : "http://www.ah.nl/allerhande/recept/R-R697352/thaise-kipcurry"
	 },
	 {
	 "title" : "Thaise Curry 2", 
	 "picture" : "http://www.ah.nl.kpnis.nl/static/recepten/img_007053_1600x560_JPG.jpg", 
	 "time" : 60, 
	 "url" : "http://www.ah.nl/allerhande/recept/R-R697352/thaise-kipcurry"
	 }]
	 };*/

	$.getJSON("../server/getRecepten.php", {flightId: window.flightNumber, numberOfRecipes: 3}, function(data) {

		console.log(data);
		
		$("#probeer_ook_eens").html(Mustache.render($("#probeer_ook_eens").html(), data[0]));

	});


});	