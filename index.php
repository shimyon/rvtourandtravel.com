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
									<input type="text" class="form-control" name="name" placeholder="From " id ="HotelName" onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">									
									<input type="text" class="form-control" name="to" placeholder="To " id ="Hotelto" onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
									<input type="text" class="form-control date-picker" name="start" placeholder="Start " id ="HotelStart"onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
									<input type="text"id ="HotelReturn" class="form-control date-picker" name="return" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
									<input type="number" min="1" max="20"id ="HotelAdults" class="form-control" name="adults" placeholder="Adults " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '">
									<input type="number" min="1" max="20" class="form-control"id ="HotelChild" name="child" placeholder="Child " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child '">						
									<a href="#" class="primary-btn text-uppercase">Search Hotels</a>									
								</div>							  	
							  </div>
							  <div class="tab-pane fade" id="holiday" role="tabpanel" aria-labelledby="holiday-tab">
								<div class="form-wrap">
									<input type="text" class="form-control" name="name" placeholder="From " id ="HolidayFrom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">									
									<input type="text" class="form-control" name="to" placeholder="To "id ="HolidayTo"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
									<input type="text" class="form-control date-picker" name="start"id ="HolidayStart"  placeholder="Start " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
									<input type="text" class="form-control date-picker" name="return" id ="HolidayReturn" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
									<input type="number" min="1" max="20" class="form-control" name="adults"id ="HolidayAdults"  placeholder="Adults " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '">
									<input type="number" min="1" max="20" class="form-control" name="child"id ="HolidayChild" placeholder="Child " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child '">							
									<a href="#" class="primary-btn text-uppercase">Search Holidays</a>									
								</div>							  	
							  </div>
							</div>
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

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
				}
				else if ($("#holiday-tab").hasClass("active")) 
				{
					sel = "Holiday";
				}


				data.subject = "Search " + sel;
				data.email = $("#" + sel + "Email").val();
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