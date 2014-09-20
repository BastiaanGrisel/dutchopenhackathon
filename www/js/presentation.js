$( document ).ready(function() {

	var json_example = { "recipes":[
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
	}

	]
};


console.log(json_example);

console.log($(json_example.recipes).size());
console.log(json_example.recipes[0])

$.get('slides/probeer_ook_eens.php', json_example.recipes[0] 
	).done(function(data) {
		$('body').html(data);
		//console.log(data);
	});

});