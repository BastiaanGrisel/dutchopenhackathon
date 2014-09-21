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

<div id="slider"></div>

<div style="display: none">

  <div class="slide" id="probeer_ook_eens">
    <div class="slide-container" style="background-image: url({{receptimagehd}});">
      <div class="title-container">
        <div class="title prefix-title">
          <span>Probeer ook eens...</span>
        </div>
        <div class="title recipe-title">
          <span>{{receptomschrijving}}</span>
        </div>
        <div class="cooking-time">{{recepttijd}} min.</div>
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

  <div class="slide" id="bol_com">
    <div class="slide-container"> 
      <div class="bol-header">Italiaanse producten, bij Bol.com</div>
      <div class="products">
        <div id="product1" class="product">
          <div class="product-title">Nerf N-Strike Elite Retaliator</div>
          <img src="http://s.s-bol.com/imgbase0/imagebase/large/FC/5/1/5/6/1004004012376515.jpg" />
          <div class="product-price">E149,00</div>
        </div>
        <div id="product1" class="product">
          <div class="product-title">Nerf N-Strike Elite Retaliator</div>
          <img src="http://s.s-bol.com/imgbase0/imagebase/large/FC/5/1/5/6/1004004012376515.jpg" />
          <div class="product-price">E49,00</div>
        </div>
        <div id="product1" class="product">
          <div class="product-title">Nerf N-Strike Elite Retaliator</div>
          <img src="http://s.s-bol.com/imgbase0/imagebase/large/FC/5/1/5/6/1004004012376515.jpg" />
          <div class="product-price">E49,00</div>
        </div>
      </div>
    </div>
  </div>

</div>

<script type="text/javascript" src="js/presentation.js"></script>
<script src="js/jquery.flexslider-min.js"></script>

<script>
  if (typeof window.flight)
    jQuery(function($) {

  // Hide slider, show loading image
  $('#slider').hide();
  $('body').append('<div id="loading" style="position:absolute;width:100%;height:100%;z-index:10000;background:#fff url(\'img/loading.gif\') center no-repeat;"></div>')

  flickr_url = "https://api.flickr.com/services/rest"

  // $.ajax({
  //   url: flickr_url,
  //   dataType: "json",
  //   data: {
  //     method: "flickr.photos.search",
  //     api_key: "025977b9a5e181b53a7597ecd4f8ae8f",
  //     format: "json",
  //     nojsoncallback: 1,
  //     text: "cats",
  //     extras: "url_o"
  //   },
  //   success: function(data) {
  //     console.log(data);
  //   }
  // });

  console.log(window);

  // Get recipes
  $.getJSON("../server/getRecepten.php", {flightId: window.flightNumber, numberOfRecipes: 3}, function(recipes) {

  // Remove loading icon
  $('#loading').remove();

  // Slider elem shortcut
  $s = $('#slider');

  // Loop over recipes
  $.each(recipes, function(i, v) {

  // Clone template div
  $n = $('#' + getSlideType(v)).clone();
  $n.addClass($n.attr('id'));
  $n.removeAttr('id');

  // Append to slider
  $s.append($n);

  // Parse with Mustache
  $n.html(Mustache.render($n.html(), v));

  });

  // Add slider functionality
  $('#slider').flexslider({
    selector: '.slide',
    animation: 'fade',
    slideshowSpeed: 5000,
    controlNav: false,
    directionNav: false,
  });

  // Display slider
  $('#slider').show();

  });

  });

  // Update slide height on window resize
  $(window).on('resize', function() {
    $('#slider .slide').height($(window).innerHeight());
  });
  // Set slide height
  $('#slider .slide').height($(window).innerHeight());

  function getSlideType() {

    d = new Date();

    return 'probeer_ook_eens';

  }

  function getHighResImage(url) {

    result = $.load(url, '.responsive-image');
    console.log(result);

  }
</script>
</body>
</html>
