<?php include('services/lookupservice.php'); ?>
<?php include('services/documentservice.php'); ?>
<?php
	$docsrv = new DocumentService();
?>
	<!DOCTYPE html>
	<html class="no-js">
		<head>
			<?php include('support/head.php'); ?>

		</head>
		<body>	
			<!-- start header -->
			<?php include('support/nav.php'); ?>
			<!-- #header -->
	  
			<!-- start banner Area -->
			<section class="relative about-banner">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Calendar
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="calendar.php"> Calendar</a></p>
						</div>	
					</div> 
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="about-info-area section-gap">
				<div class="container">				
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div id="datepicker"></div>
						</div>
						<div class="col-lg-6">
							<h4>No tour available!</h4>
						</div>
					</div>
				</div>
			</section>
			
			<!-- End contact-page Area -->

			<!-- start footer Area -->		
			<?php include('support/footer.php'); ?>
			<!-- End footer Area -->	
			<?php include('support/scripts.php'); ?>
			<script>
				$(function(){
					$( "#datepicker" ).datepicker();
				})
			</script>
		</body>
	</html>