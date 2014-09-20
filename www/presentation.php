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
  
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/mustache.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>

      <div id="probeer_ook_eens">
        <div class="container" style="background-image: url('{{picture}}');">
          <div class="title prefix-title">
            <span>Probeer ook eens...</span>
          </div>
          <div class="title recipe-title">
            <span>{{title}}</span>
          </div>
          <div class="cooking-time">{{time}}</div>
        </div>
      </div>

      <!-- <div id="ah_to_go">probeer ook eens</div> -->

      <script type="text/javascript" src="js/presentation.js"></script>
    </body>
    </html>