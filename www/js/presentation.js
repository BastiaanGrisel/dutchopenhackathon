$( document ).ready(function() {

	var json_example = {
			"title" : "Thaise Curry", 
			"picture" : "http://www.ah.nl.kpnis.nl/static/recepten/img_007053_1600x560_JPG.jpg", 
			"time" : 30, 
			"url" : "http://www.ah.nl/allerhande/recept/R-R697352/thaise-kipcurry"
		};

		console.log(JSON.stringify(json_example));
    
	$.get('slides/probeerookeens.html', json_example ).done(function(data) {
		$(#slide).innerHTML(data);
	});

});