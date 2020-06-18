<?php include('services/lookupservice.php'); ?>
<?php include('services/documentservice.php'); ?>
<?php
	$docsrv = new DocumentService();
?>
	<!DOCTYPE html>
	<html class="no-js">
		<head>
			<?php include('support/head.php'); ?>
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

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
								Gallery
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="gallery.php"> Gallery</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<?php
				$lisdata = $docsrv->getData();
				//echo json_encode($lisdata);
				$result = array();
				foreach ($lisdata as $element) {
					$result[$element['FName']][] = $element;
				}
			?>

			<!-- Start contact-page Area -->

			<section class="recent-blog-area section-gap">
				<div class="container">			
					<?php foreach($result as $x => $val) { ?>
						<div class="row">
							<div class="pb-60 col-lg-9">
								<div class="title">
									<h4 class="mb-10">
										<?php echo $x; ?>
									</h4>
								</div>
							</div>
						</div>	
						<div class="row">
							<div class="active-recent-blog-carusel">
								<?php foreach($val as $tournm => $tourval) { ?>
									<div class="single-recent-blog-post item">
										<?php echo "<div class='thumb'' style='max-width: 380px; max-height: 200px;'>
											<a data-caption='" . $x . "'  data-fancybox='gallery' href='" . $tourval['FolderName'] . "\\" . $tourval['FileName'] . "'>
											<img class='img-fluid dynamicimgblog' src='" . $tourval['FolderName'] . "\\" . $tourval['FileName'] . "'>
											</a>
											</div>"; 
										?>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>	
			</section>

			<!-- End contact-page Area -->

			<!-- start footer Area -->		
			<?php include('support/footer.php'); ?>
			<!-- End footer Area -->	
			<?php include('support/scripts.php'); ?>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
			<script>
				$(function(){
					$('[data-fancybox="gallery"]').fancybox({
						 hash: false
					});

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
				})
			</script>
		</body>
	</html>