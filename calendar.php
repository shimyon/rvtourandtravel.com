<?php include('services/calendarservice.php'); ?>
<?php
	$srv = new CalendarService();
	// $getData = $srv->getData();
	// print_r($getData);
?>
	<!DOCTYPE html>
	<html class="no-js">
		<head>
			<?php include('support/head.php'); ?>

			<link href='https://unpkg.com/fullcalendar@5.0.1/main.min.css' rel='stylesheet' />
			<style type="text/css">
				.selecteddate {
					border-color: red;
				}

				#displayevent {					
					margin-bottom: auto;
					margin-top: 30px;
				}

				#displayevent .noevent {
					display: block;
				}

				#displayevent.hasevent .noevent {
					display: none;
				}

				#displayevent .divevent {
					display: none;
				}

				#displayevent.hasevent .divevent {
					display: block;
				}

				.divvspace {
					margin-bottom: 20px;
				}
			
				.fc-day-sat, .fc-day-sun { 
					color: #ffffff;
				    border-color: black;
				    background-color: #009688;
				}
			</style>
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
					<!-- 
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div id="datepicker"></div>
						</div>
						<div class="col-lg-6">
							<h4>No tour available!</h4>
						</div>
					</div> 
					-->
					<div class="row align-items-center">
						<div class="col-lg-8">
							<div id='calendar'></div>
						</div>
						<div class="col-lg-4" id="displayevent">
							<h4 style="text-align: top;" class="noevent">Select any event for show details!</h4>
							<div class="divevent">
								<div class="divvspace">
									<h2>
										<span id="eventtitle"></span>
									</h2>
								</div>
								<div class="divvspace">
									<h3>
										<span id="eventtime"></span>
									</h3>
								</div>
								<div class="divvspace">
									<h4>
										<span id="eventdesc"></span>
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<!-- End contact-page Area --> 

			<!-- start footer Area -->		
			<?php include('support/footer.php'); ?>
			<!-- End footer Area -->	
			<?php include('support/scripts.php'); ?>
		  	<script src='https://unpkg.com/fullcalendar@5.0.1/main.min.js'></script>
		  	<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js'></script>
			<script>
				var today = "<?php echo date('Y-m-d'); ?>";

				$(function() {
					$.ajax({
			            url: GlobalConfig.RemoteUrl + 'admin/calendar_action.php',
			            type: 'POST',
			            //dataType: "text",
			            data: {action: 'listing'},
			            success: function (data) {
			                LoadDates(data);
			            },
			            error: function (error) {
			                console.log(error);
			            }
			        });	
					
				})

				function LoadDates(data) {
					var calendardata = $.map(data, function(val) {
						return {
							start: val.Date,
							title: val.Subject,
							description: val.Message
						};
					})

					//$( "#datepicker" ).datepicker();
				    var calendarEl = document.getElementById('calendar');
					var calendar = new FullCalendar.Calendar(calendarEl, {
				      initialView: 'dayGridMonth',
				      initialDate: today,
				      headerToolbar: {
				        left: 'prev,next today',
				        center: 'title',
				        right: 'dayGridMonth,timeGridWeek,timeGridDay'
				      },
				      eventClick: function(info) {
					    $(".selecteddate").removeClass("selecteddate");
					    $("#eventtitle").text(info.event.title);
					    var dt = '';
					    if (info.event.start) {
					    	dt = moment(info.event.start).format('YYYY/MM/DD');
					    }
				    	$("#eventtime").text(dt);
					    $("#eventdesc").text(info.event.extendedProps.description);
					    $("#displayevent").addClass("hasevent");
					    // alert('Event: ' + info.event.title);
					    // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
					    // alert('View: ' + info.view.type);

					    // change the border color just for fun
					    //info.el.style.borderColor = 'red';
					    $(info.el).addClass("selecteddate");
					  },
				      events: calendardata
				  	});
			  	 	calendar.render();

				    // var calendar = new FullCalendar.Calendar(calendarEl, {
				    //   initialView: 'dayGridMonth',
				    //   initialDate: today,
				    //   headerToolbar: {
				    //     left: 'prev,next today',
				    //     center: 'title',
				    //     right: 'dayGridMonth,timeGridWeek,timeGridDay'
				    //   },
				    //   events: [
				    //     {
				    //       title: 'All Day Event',
				    //       start: '2020-06-01'
				    //     },
				    //     {
				    //       title: 'Long Event',
				    //       start: '2020-06-07',
				    //       end: '2020-06-10'
				    //     },
				    //     {
				    //       groupId: '999',
				    //       title: 'Repeating Event',
				    //       start: '2020-06-09T16:00:00'
				    //     },
				    //     {
				    //       groupId: '999',
				    //       title: 'Repeating Event',
				    //       start: '2020-06-16T16:00:00'
				    //     },
				    //     {
				    //       title: 'Conference',
				    //       start: '2020-06-11',
				    //       end: '2020-06-13'
				    //     },
				    //     {
				    //       title: 'Meeting',
				    //       start: '2020-06-12T10:30:00',
				    //       end: '2020-06-12T12:30:00'
				    //     },
				    //     {
				    //       title: 'Lunch',
				    //       start: '2020-06-12T12:00:00'
				    //     },
				    //     {
				    //       title: 'Meeting',
				    //       start: '2020-06-12T14:30:00'
				    //     },
				    //     {
				    //       title: 'Birthday Party',
				    //       start: '2020-06-13T07:00:00'
				    //     },
				    //     {
				    //       title: 'Click for Google',
				    //       url: 'http://google.com/',
				    //       start: '2020-06-28'
				    //     }
				    //   ]
				    // });

				    // calendar.render();

				}
			</script>
		</body>
	</html>