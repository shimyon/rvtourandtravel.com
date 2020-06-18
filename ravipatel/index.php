<?php include('../services/lookupservice.php'); ?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><? echo GetLookupValue('SITE', 'NAME')  ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="css/im/favicon.ico" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"  crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Arimo|Playfair+Display" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <div class="container">
  <div class="card">
    <div class="back">
      <div class="">
        <span>
          <img src="css/img/intellingentcard.jpg">
        </span>
      </div>
    </div>
    <div class="front" style="background-image: url('css/img/cardbackground.jpg');">
      <br/>
      <br/>
      <center>
        <h3 class="noback" style="color: #343a40;">
          <i class="fa fa-plane" style="color: #343a40;"></i>
          <? echo GetLookupValue('NAME', 'SITE')  ?>
        </h3>
    	  <h4 class="noback" style="color: #343a40;">
            <i class="fa fa-user" style="color: #343a40;"></i>
            <? echo GetLookupValue('OWNER', 'USER')  ?> <br>
        </h4>
        <h5 class="noback">
          <a href="https://goo.gl/maps/qE9BMoLApDC23GVu6">
            <i class="fa fa-map-marker"></i>
            <? echo GetLookupValue('ADDRESS', 'USER')  ?> <br>
          </a>
        </h5>
      </center>
      <ul class="noback">
        <li>
            <a href="tel:+91 <? echo GetLookupValue('MOBILENO', 'USER')  ?>"><i class="fa fa-phone"></i>+91 <? echo GetLookupValue('MOBILENO', 'USER')  ?>
            </a><br>
            <a href="https://wa.me/ <? echo GetLookupValue('MOBILENO', 'USER')  ?>">
              <i class="fa fa-whatsapp"> <? echo GetLookupValue('MOBILENO', 'USER')  ?></i>
            </a>
        </li>
        <!-- <li>
        	<a href="mailto:info@brokerfreeproperties.com ">
        		<i class="fa fa-envelope"></i>info@brokerfreeproperties.com </a>
    	</li> -->
        <li>
        	<i class="fa fa-globe"></i>
        	<a href="<? echo GetLookupValue('URL', 'SITE')  ?>" target="_blank"><? echo GetLookupValue('NAME', 'SITE')  ?></a>
        </li>
		<li>
			<a href="<? echo GetLookupValue('FACEBOOK', 'USER')  ?>"><i class="fa fa-facebook-square"></i></a> 
			<!-- 
      <a href="#"><i class="fa fa-twitter-square"></i></a> 
			<a href="#"><i class="fa fa-google-plus-square"></i></a> 
			<a href="#"><i class="fa fa-linkedin-square"></i></a> 
			<a href="#"><i class="fa fa-youtube-square"></i></a> 
      --> 
		</li>
      </ul>
    </div>
    </div>
  </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="index.js"></script>
</html>
