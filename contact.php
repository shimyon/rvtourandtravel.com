<?php include('services/lookupservice.php'); ?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
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
								Contact Us				
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.php"> Contact Us</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d922.6186703299824!2d73.15076652916578!3d22.33569863956764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc8e40b63a309%3A0x38f8c58ed1df12be!2sDattar%20Complex%2C%20Gorwa%20Rd%2C%20Nav%20Durga%20Society%2C%20Panchvati%2C%20Vadodara%2C%20Gujarat%20390016!5e0!3m2!1sen!2sin!4v1593253092094!5m2!1sen!2sin" height="450" frameborder="0" style="border:0; width: 100%; margin-bottom: 50px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>
										<? echo GetLookupValue('CITY', 'USER') . ', ' . GetLookupValue('STATE', 'USER')  ?>
									</h5>
									<p>
										<a href="https://goo.gl/LUfMLF">
											<? echo GetLookupValue('ADDRESS', 'USER')  ?>
										</a>
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details" itemscope itemtype="http://rvtourandtrave.com">
									<h5 itemprop="name"><? echo GetLookupValue('OWNER', 'USER')  ?></h5>
									<h5>
										<a href="tel:+91<? echo GetLookupValue('MOBILENO', 'USER')  ?>"><? echo GetLookupValue('MOBILENO', 'USER')  ?></a>
									</h5>
									<p><? echo GetLookupValue('MOBILENO', 'OFFICETIME')  ?></p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>
										<a href="mailto:<? echo GetLookupValue('EMAIL', 'OFFICETIME')  ?>">
											<? echo GetLookupValue('EMAIL', 'OFFICETIME')  ?>
										</a>
									</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
								<div class="row">	
									<div class="col-lg-6 form-group">
										<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
									
										<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

										<input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text">
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required=""></textarea>				
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button class="genric-btn primary" style="float: right;">Send Message</button>											
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->

			<!-- start footer Area -->		
			<?php include('support/footer.php'); ?>
			<!-- End footer Area -->	
			<?php include('support/scripts.php'); ?>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
		</body>
	</html>