	<!DOCTYPE html>
	<html class="no-js">
		<head>
			<?php include('./support/head.php'); ?>
			<style type="text/css">
				li {
					line-height: 35px;
				}
			</style>
		</head>
		<body>	
			<!-- start header -->
			<?php include('support/nav.php'); ?>
			<!-- #header -->
			

			<!-- start banner Area -->
			<section class="banner-area relative" id="mainbg">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-8 col-md-6 banner-left" style="height: 100%;">
							<!-- <h6 class="text-white">ALL TYPE OF CARS & BUS AVAILABLE ON RENT A/C & NON-A/C</h6> -->
							<h1 class="text-white">RV Tours and Travels</h1>
							<!-- 
							<p class="text-white">
								THE WORLD IS A BOOK AND THOSE WHO DO NOT TRAVEL READ ONLY A PAGE. ~ SAINT AUGUSTINE
							</p>  
							-->
							<!-- <a href="#" class="primary-btn text-uppercase">Get Started</a>  -->							
						</div>
						<div class="col-lg-4 col-md-6 banner-right  align-self-center">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">Flights</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false">Hotels</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="holiday-tab" data-toggle="tab" href="#holiday" role="tab" aria-controls="holiday" aria-selected="false">Holidays</a>
							  </li>
							</ul>
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
								<div class="form-wrap">
									<input type="text" class="form-control" name="Phone" id ="FlightPhone" placeholder="Phone " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'">
									<input type="text" class="form-control" name="Email" id ="FlightEmail" placeholder="Email " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email '">									
									<input type="text" class="form-control" name="name" id ="FlightFrom" placeholder="From " onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">									
									<input type="text" class="form-control" name="to" placeholder="To " id ="FlightTo"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
									<input type="text" class="form-control date-picker" name="start" placeholder="Start " id ="FlightStart"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
									<input type="text" class="form-control date-picker" name="return" placeholder="Return " id ="FlightReturn" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
									<input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults " id ="FlightAdults" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '">
									<button onclick="sendMail()" class="primary-btn text-uppercase">Search flights</button>									
								</div>
							  </div>
							  <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
								<div class="form-wrap">
									<input type="text" class="form-control" name="Phone" id ="HotelPhone" placeholder="Phone " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'">
									<input type="text" class="form-control" name="Email" id ="HotelEmail" placeholder="Email " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email '">	
									<input type="text" class="form-control" name="HotelName"id ="HotelName"  placeholder="Hotel Name " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Hotel Name '">				
									<input type="text" class="form-control date-picker" name="start" placeholder="Start " id ="HotelStart"onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
									<input type="text"id ="HotelReturn" class="form-control date-picker" name="return" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
									<input type="number" min="1" max="20"id ="HotelAdults" class="form-control" name="adults" placeholder="Adults " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '">
									<input type="number" min="1" max="20" class="form-control"id ="HotelChild" name="child" placeholder="Child " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child '">						
									<button onclick="sendMail()" class="primary-btn text-uppercase">Search Hotels</button>										
								</div>							  	
							  </div>
							  <div class="tab-pane fade" id="holiday" role="tabpanel" aria-labelledby="holiday-tab">
								<div class="form-wrap">
									<input type="text" class="form-control" name="Phone" id ="HolidayPhone" placeholder="Phone " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'">
									<input type="text" class="form-control" name="Email" id ="HolidayEmail" placeholder="Email " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email '">	
									<input type="text" class="form-control" name="Plcace"id ="HolidayPlace"  placeholder="Place " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Place '">								
									<input type="text" class="form-control date-picker" name="start"id ="HolidayStart"  placeholder="Start " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
									<input type="text" class="form-control date-picker" name="return" id ="HolidayReturn" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
									<input type="number" min="1" max="20" class="form-control" name="adults"id ="HolidayAdults"  placeholder="Adults " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '">
									<input type="number" min="1" max="20" class="form-control" name="child"id ="HolidayChild" placeholder="Child " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child '">							
									<button onclick="sendMail()" class="primary-btn text-uppercase">Search Places</button>									
								</div>							  	
							  </div>
							</div>
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start about-info Area -->
			<section class="about-info-area section-gap" style="padding-top: 50px; color: #792917;">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 info-left" style="display: none;">
							<img class="img-fluid" src="img/about/info-img.jpg" alt="">
						</div>
						<div class="col-lg-12 info-right" >
							<h1 style="text-align: center;">Brief Company Information</h1>
							<ul style="font-size: 20px;" class="noglob">
								<li>Our company place great importance on operating staff and transportation. Using the high qualities and placing tour guide efficiently well organising scheduling system which enable to maximize our customer ‘s convince</li>
								<li>Our company RV Tours and Travel was established on April’2017. Formerly known as Ambe Travels which was established on August’2014.</li>
								<li>License holder of EDPL group of companies (Govt. Approved)</li>
								<li>
									We are into various services 
									<ul style="font-size: 20px;" class="noglob">
										<li>Government department as a contract/tender.</li>
										<li>Government car rental service and LTC service.</li>
										<li>All Tour Packages of domestic and international Corporate and commercial.</li>
										<li> Car rental service for wedding, corporate, local etc.</li>
										<li>Air Ticket (IATA)</li>
										<li>Railway Ticket (IRCTC. Govt. Approved).</li>
										<li>Booking – Hotels Corporate parties, conference meeting, birthday parties, wedding.</li>
										<li>Travel Insurance and Forex exchange.</li>
							 		</ul>
							 	</li>
							 	<li>
								We want to give our best services and nothing less. Allow us this opportunities to present our company profile in more details so that you may get to know us better.
								</li>
							</ul>
						</div>
					</div>
				</div>	
			</section>
			<!-- End about-info Area --> 

			<!-- Start popular-destination Area -->
			<section class="popular-destination-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Popular Destinations</h1>
		                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day.</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid dynamicimg" src="" alt="">
								</div>
								<div class="desc">	
									<!-- <a href="#" class="price-btn">$150</a>			 -->
									<h4>HONEYMOON</h4>
									<p>GOA</p>			
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid dynamicimg" src="" alt="">
								</div>
								<div class="desc">	
									<!-- <a href="#" class="price-btn">$250</a>			 -->
									<h4>INTERNATIONAL TOUR</h4>
									<p>Paris</p>			
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid dynamicimg" src="" alt="">
								</div>
								<div class="desc">	
									<!-- <a href="#" class="price-btn">$350</a>			 -->
									<h4>AMAZIA WATER</h4>
									<p>Surat</p>			
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End popular-destination Area -->

			<!-- Start blog Area -->
			<section class="recent-blog-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10">Latest from Our Blog</h1>
								<p>With the exception of Nietzsche, no other madman has contributed so much to human sanity as has.</p>
							</div>
						</div>
					</div>							
					<div class="row">
						<div class="active-recent-blog-carusel">
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid dynamicimgblog" src="" alt="">
								</div>
								<div class="details">
									<!-- 
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									 -->
									<a href="gallery.php"><h4 class="title">MOUNT ABU HILL STATION & AMBAJI TEMPLE</h4></a>
									<p>
										WEEKEND TRIP TO MOUNT ABU HILL STATION & AMBAJI TEMPLE
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid dynamicimgblog" src="" alt="">
								</div>
								<div class="details">
									<!-- 
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>
										</ul>
									</div>
									 -->
									<a href="gallery.php"><h4 class="title">INTERNATIONAL TOUR BALI INDONESIA</h4></a>
									<p>
										Unique Experience Make Great Stories
										At The Beach, Life Is Different.
										Time Doesn't Move Hour To Hour,
										But Mood To Moment.
										We Live By The Currents,
										Plan By The Tides, And Follow The Sun. 
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid dynamicimgblog" src="" alt="">
								</div>
								<div class="details">
									<!-- 
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									 -->
									<a href="gallery.php"><h4 class="title">JOURNEY FROM VALSAD TO KUTCH</h4></a>
									<p>
										JOURNEY FROM VALSAD TO KUTCH
										# MATA NO MADH, # WHITE DESERT, # MANDVI BEACH, # SHRI SWAMINARAYAN TEMPLE
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>	
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid dynamicimgblog" src="" alt="">
								</div>
								<div class="details">
									<!-- 
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>
										</ul>
									</div>
									 -->
									<a href="gallery.php"><h4 class="title">L`ORÉAL PARIS - AMAZIA WATER PARK SURAT</h4></a>
									<p>
										TOUR L'ORÉAL PARIS AMAZIA WATER PARK SURAT.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>							

						</div>
					</div>
				</div>	
			</section>
			<!-- End recent-blog Area -->			

			<!-- start footer Area -->		
			<?php include('support/footer.php'); ?> 
			<!-- End footer Area -->	

		<?php include('support/scripts.php'); ?>

		<script type="text/javascript">
			$(function () {
				if (localStorage) {
			    	if (!localStorage.version) {
			    		localStorage.version = 0;
			    	}
			    
			        if (appVersion > localStorage.version) {
			            $.getScript("js/catchdata.js");
			        }
			        else {
			        	var catchData = JSON.parse(localStorage.catchData);
		                setCatch(catchData);
			        }
			    }
			})

			function setCatch(cdata) {
				$("#mainbg").css("background-image","url(" + cdata.hero_bg + ")");
				for(var i in cdata.img_fluid) {
					$(".dynamicimg").eq(i).attr("src", cdata.img_fluid[i]);
				}

				for(var i in cdata.blog) {
					$(".dynamicimgblog").eq(i).attr("src", cdata.blog[i]);
				}

		        $('.active-recent-blog-carusel').owlCarousel({
		            items: 3,
		            loop: true,
		            margin: 30,
		            dots: true,
		            autoplayHoverPause: true, 
		            smartSpeed:500,               
		            autoplay: true,
		            responsive: {
		                0: {
		                    items: 1
		                },
		                480: {
		                    items: 1,
		                },
		                768: {
		                    items: 2,
		                },
		                961: {
		                    items: 3,
		                }
		            }
		        }); 

			}



			function sendMail() {
				var data ={};
				data.action = "search";
				var sel = "Flight";
				if ($("#flight-tab").hasClass("active")) 
				{
					sel = "Flight";
				}
				else if ($("#hotel-tab").hasClass("active")) 
				{
					sel = "Hotel";
					data.Child = $("#" + sel + "Child").val();
					data.HotelName = $("#" + sel + "Name").val();
				}
				else if ($("#holiday-tab").hasClass("active")) 
				{
					sel = "Holiday";
					data.Child = $("#" + sel + "Child").val();
					data.Place = $("#" + sel + "Place").val();
				}


				data.subject = sel;
				data.email = $("#" + sel + "Email").val();
				data.phone = $("#" + sel + "Phone").val();
				data.FlightFrom = $("#" + sel + "From").val();
				data.FlightTo = $("#" + sel + "To").val();
				data.FlightAdults = $("#" + sel + "Adults").val();
				data.FlightStart = $("#" + sel + "Start").val();
				data.FlightReturn = $("#" + sel + "Return").val();
				$.ajax({
		            url: GlobalConfig.RemoteUrl + 'mail.php',
		            method: 'POST',
		            dataType: "json",
		            data: data,
        			//dataType: "jsonp",
		            success: function (d) {
		                //alert("Data: " + d);
		                if (d.ok) {
		                	alert("We received your request, we will update you soon!");
		                }
		            },
		            error: function (error) {
		                console.log(error);
		            }
		        });	
			}
		</script>
	</body>
</html>