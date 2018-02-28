
		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix" data-loop="true">

			<div class="slider-parallax-inner">
				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">
						<?php
						if(isset($slider) && !empty($slider)) {
							foreach ($slider as $key => $value) {
								// echo '<div class="swiper-slide dark" style="background-image: url("'.base_url().'/assets/demos/business/images/slider/1.jpg"); background-size: cover">';
								echo "<div class='swiper-slide dark' style='background-image: url(".base_url()."/assets/images/slider/".$value['name']."); background-size: cover'>";
								echo "<div class='container clearfix'>";
								echo "<div class='slider-caption slider-caption-center'>";
								echo "<h2 class='font-primary nott'>".$value['tagline']."</h2>";
								echo "<p class='t300 font-primary d-none d-sm-block'>".$value['text']."</p>";
								echo "<a href='javascript:;' class='button button-rounded button-large nott ls0 font-primary'>Get Started</a>";
								echo "</div></div></div>";
							}
						}
						?>
<!-- <div class="swiper-slide dark" style="background-image: url('<?php// echo base_url(); ?>assets/demos/business/images/slider/1.jpg'); background-size: cover">
							<div class="container clearfix">
								<div class="slider-caption slider-caption-center">
									<h2 class="font-primary nott">Creative Work.</h2>
									<p class="t300 font-primary d-none d-sm-block">Quickly communicate bleeding-edge best practices.</p>
									<a href="#" class="button button-rounded button-large nott ls0 font-primary">Get Started</a>
								</div>
							</div>
						</div> -->
						<!--
						<div class="swiper-slide dark" style="background-image: url('<?php// echo base_url(); ?>assets/demos/business/images/slider/2.jpg'); background-size: cover">
							<div class="container clearfix">
								<div class="slider-caption slider-caption-center">
									<h2 class="font-primary">Amazing Prospects.</h2>
									<p class="t300 font-primary d-none d-sm-block">Seamlessly engineer effective synergy after e-business experiences.</p>
									<a href="#" class="button button-rounded button-large nott ls0 font-primary">Get Started</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide dark" style="background-image: url('<?php// echo base_url(); ?>assets/demos/business/images/slider/3.jpg'); background-size: cover">
							<div class="container clearfix">
								<div class="slider-caption slider-caption-center">
									<h2 class="font-primary">Flexible Works.</h2>
									<p class="t300 font-primary d-none d-sm-block">Completely incubate worldwide users before imperatives.</p>
									<a href="#" class="button button-rounded button-large nott ls0 font-primary">Get Started</a>
								</div>
							</div>
						</div> -->
					</div>
					<!-- Slider Arrows
					============================================= -->
					<div class="slider-arrow-left" class="nobg"><i class="icon-line-arrow-left"></i></div>
					<div class="slider-arrow-right" class="nobg"><i class="icon-line-arrow-right"></i></div>
				</div>

				<!-- Slider Mouse Icon
				============================================= -->
				<a href="#" data-scrollto="#content" data-offset="0" class="dark one-page-arrow"><img class="infinite animated fadeInDown" src="<?php echo base_url();?>assets/demos/business/images/mouse.svg" alt="" ></a>
			</div>

		</section>

		<!-- Content
		============================================= -->
		<section id="content" style="margin-bottom: 0px;">

				<div class="content-wrap notoppadding">
					<br>
					<div class="heading-block  page-section nomargin nobottomborder center">
						<h3>Popular Catagories</h3>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit voluptas.</span>
					</div>

					<div class="row ecommerce-categories clearfix" style="padding: 20px 0 0;">
						<?php
							if(isset($category) && !empty($category)) {
								$class = '';
								$tmp = 0;
								foreach ($category as $key => $value) {
									if($tmp == 0) {
										$class = 'col-lg-7'; 
									} else if($tmp == 1 ) {
										$class = 'col-lg-5';
									} else if($tmp >= 2) {
										$class = 'col-lg-4';
									}
									echo '<script> console.log('.$tmp.'); </script>';
									echo '<div class='.$class.'>';
									echo '<a href="javascript:;" style="background: url('.base_url().'assets/images/category/'.$value['imagename'].') no-repeat center center; background-size: cover;">';
									echo '<div class="vertical-middle dark center">';
									echo '<div class="heading-block nomargin noborder">';
									echo '<h3 class="capitalize font-secondary nott t500">'.$value['cat_name'].'</h3>';
									echo '</div> </div></a></div>';
									if($tmp >= 4) {
										$tmp = 0;
									} else {
										$tmp++;
									}
								}
							}
						?>
						<!-- <div class="col-lg-7">
							<a href="#" style="background: url('demos/ecommerce/images/types/1.jpg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block nomargin noborder">
										<h3 class="capitalize font-secondary nott t500">Travel</h3>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-5">
							<a href="#" style="background: url('demos/ecommerce/images/types/3.jpg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block nomargin noborder">
										<h3 class="capitalize font-secondary nott t500">College</h3>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-4">
							<a href="#" style="background: url('demos/ecommerce/images/types/5.jpg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block nomargin noborder">
										<h3 class="capitalize font-secondary nott t500">Leather</h3>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="#" style="background: url('demos/ecommerce/images/types/6.jpg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block nomargin noborder">
										<h3 class="capitalize font-secondary nott t500">Reise</h3>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="#" style="background: url('demos/ecommerce/images/types/8.jpg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block nomargin noborder">
										<h3 class="capitalize font-secondary nott t500">Handmade</h3>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-5">
							<a href="#" style="background: url('demos/ecommerce/images/types/7.jpg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block nomargin noborder">
										<h3 class="capitalize font-secondary nott t500">Brown</h3>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-7">
							<a href="#" style="background: url('demos/ecommerce/images/types/9.jpg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block nomargin noborder">
										<h3 class="capitalize font-secondary nott t500">Acessories</h3>
									</div>
								</div>
							</a>
						</div> -->
					</div>

					<div id="section-about" class="section page-section nomargin">

						<div class="container clearfix">

							<div class="row">
								<div class="col-lg-6">
									<div class="heading-block nobottomborder bottommargin-sm">
										<h3 class="cookie-font capitalize color">About Us</h3>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, libero voluptas iusto quo illum quam possimus provident, deserunt est minima quisquam amet magnam animi? Enim adipisci facilis voluptas odit! Facilis rerum ipsam modi perspiciatis exercitationem explicabo, tempore soluta culpa cupiditate!</p>
								</div>
								<div class="col-lg-6">
									<img class="bottommargin-lg divcenter img-fluid" src="<?php echo base_url();?>assets/demos/spa/images/others/1.png" alt="">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 bottommargin">
									<div class="feature-box fbox-plain fadeIn animated" data-animate="fadeIn">
										<div class="fbox-icon">
											<a href="#"><i class="spa-towel"></i></a>
										</div>
										<h3>Shower Services</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas omnis nam molestias minus ipsa, placeat!</p>
									</div>
								</div>

								<div class="col-lg-4 bottommargin">
									<div class="feature-box fbox-plain fadeIn animated" data-animate="fadeIn" data-delay="200">
										<div class="fbox-icon">
											<a href="#"><i class="spa-sandals"></i></a>
										</div>
										<h3>Foot Treatments</h3>
										<p>Facere aliquam itaque quia recusandae, corporis fugit fugiat eaque, accusamus officiis reprehenderit.</p>
									</div>
								</div>

								<div class="col-lg-4 bottommargin">
									<div class="feature-box fbox-plain fadeIn animated" data-animate="fadeIn" data-delay="800">
										<div class="fbox-icon">
											<a href="#"><i class="spa-cup-flower"></i></a>
										</div>
										<h3>Internal Beautification</h3>
										<p>Velit id facilis odit aliquid laudantium. Tempore, sequi. Harum nesciunt, magni aperiam est?</p>
									</div>
								</div>

								<div class="w-100 clear"></div>

								<div class="col-lg-4 bottommargin">
									<div class="feature-box fbox-plain fadeIn animated" data-animate="fadeIn" data-delay="1000">
										<div class="fbox-icon">
											<a href="#"><i class="spa-meditation"></i></a>
										</div>
										<h3>Yoga &amp; Meditation</h3>
										<p>Voluptatum distinctio laboriosam, excepturi delectus nam fugit obcaecati reiciendis neque iste!</p>
									</div>
								</div>
								<div class="col-lg-4 bottommargin">
									<div class="feature-box fbox-plain fadeIn animated" data-animate="fadeIn" data-delay="1000">
										<div class="fbox-icon">
											<a href="#"><i class="spa-comb"></i></a>
										</div>
										<h3>Hair Dressing</h3>
										<p>Quis, tenetur. Nam explicabo modi pariatur, blanditiis distinctio sapiente fugiat accusantium.</p>
									</div>
								</div>
								<div class="col-lg-4 bottommargin">
									<div class="feature-box fbox-plain fadeIn animated" data-animate="fadeIn" data-delay="1000">
										<div class="fbox-icon">
											<a href="#"><i class="spa-flowers-feet"></i></a>
										</div>
										<h3>Herbal Pedicure</h3>
										<p>Veniam atque corporis commodi. Quidem odit, necessitatibus quo tenetur! Harum similique illo eligendi!</p>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

					
					<div class="section clearfix notopmargin"  style="padding: 80px 0;">
						<div class="container clearfix">

							<div class="heading-block nobottomborder center">
								<h3 class="t400" style="font-size: 16px;">Best Selling Products</h3>
							</div>

							<div class="row clearfix">
								<div class="col-lg-3 col-md-6">
									<div class="iportfolio clearfix">
										<div class="portfolio-image clearfix">
											<div class="fslider" data-pagi="false" data-animation="fade" data-slideshow="false">
												<div class="flexslider">
													<div class="slider-wrap">
														<div class="slide"><a href="#"><img src="<?php echo base_url();?>assets/demos/ecommerce/images/items/1-1.jpg" alt="Grey Bag"></a></div>
														<div class="slide"><a href="#"><img src="<?php echo base_url();?>assets/demos/ecommerce/images/items/1-2.jpg" alt="Grey Bag"></a></div>
														<div class="slide"><a href="#"><img src="<?php echo base_url();?>assets/demos/ecommerce/images/items/1-3.jpg" alt="Grey Bag"></a></div>
													</div>
												</div>
											</div>
											<div class="product-cart"><a href="#"><i class="icon-shopping-cart"></i></a></div>
											<div class="product-quickview"><a href="#" data-toggle="tooltip" data-placement="top" title="Available Sizes: S | M | L"><i class="icon-info"></i></a></div>
										</div>
										<div class="portfolio-desc nobottompadding">
											<h3><a href="#">Leather Bag</a></h3>
											<span class="notopmargin"><a href="#">Grey Messenger Bag</a></span>
											<div class="item-price">
												<span>&euro;29.99</span>
												<div class="rating-stars">
													<i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i>
												</div>
											</div>
										</div>
									</div>
							</div>

							<div class="col-lg-3 col-md-6">
								<div class="iportfolio clearfix">
									<div class="portfolio-image clearfix">
										<div class="fslider" data-pagi="false" data-animation="fade" data-slideshow="false">
											<div class="flexslider">
												<div class="slider-wrap">
													<div class="slide"><a href="#"><img src="<?php echo base_url();?>assets/demos/ecommerce/images/items/4-1.jpg" alt="Grey Bag"></a></div>
													<div class="slide"><a href="#"><img src="<?php echo base_url();?>assets/demos/ecommerce/images/items/4-2.jpg" alt="Grey Bag"></a></div>
												</div>
											</div>
										</div>
										<div class="product-cart"><a href="#"><i class="icon-shopping-cart"></i></a></div>
										<div class="product-quickview"><a href="#" data-toggle="tooltip" data-placement="top" title="Available Sizes: S | M | L"><i class="icon-info"></i></a></div>
									</div>
									<div class="portfolio-desc nobottompadding">
										<h3><a href="#">Black Bagpack</a></h3>
										<span class="notopmargin"><a href="#">college Backpack</a></span>
										<div class="item-price">
											<span>&euro;23.49</span>
											<div class="rating-stars">
												<i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="w-100 bottommargin d-block d-md-none"></div>

							<div class="col-lg-3 col-md-6">
								<div class="iportfolio clearfix">
									<div class="portfolio-image clearfix">
										<div class="fslider" data-pagi="false" data-animation="fade" data-slideshow="false">
											<div class="flexslider">
												<div class="slider-wrap">
													<div class="slide"><a href="#"><img src="<?php echo base_url();?>assets/demos/ecommerce/images/items/2-1.jpg" alt="Office Bag"></a></div>
													<div class="slide"><a href="#"><img src="<?php echo base_url();?>assets/demos/ecommerce/images/items/2-2.jpg" alt="Office Bag"></a></div>
												</div>
											</div>
										</div>
										<div class="product-cart"><a href="#"><i class="icon-shopping-cart"></i></a></div>
										<div class="product-quickview"><a href="#" data-toggle="tooltip" data-placement="top" title="Available Sizes: L"><i class="icon-info"></i></a></div>
									</div>
									<div class="portfolio-desc nobottompadding">
										<h3><a href="#">Women Office Bag</a></h3>
										<span class="notopmargin"><a href="#">Hand Bag</a></span>
										<div class="item-price">
											<span>&euro;11.99</span>
											<div class="rating-stars">
												<i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="w-100 bottommargin d-block d-md-none"></div>

							<div class="col-lg-3 col-md-6">
								<div class="iportfolio clearfix">
									<div class="portfolio-image clearfix">
										<div class="fslider" data-pagi="false" data-animation="fade" data-slideshow="false">
											<div class="flexslider">
												<div class="slider-wrap">
													<div class="slide"><a href="#"><img src="<?php echo base_url();?>assets/demos/ecommerce/images/items/3-1.jpg" alt="Men Bag"></a></div>
													<div class="slide"><a href="#"><img src="<?php echo base_url();?>assets/demos/ecommerce/images/items/3-2.jpg" alt="Men Bag"></a></div>
													<div class="slide"><a href="#"><img src="<?php echo base_url();?>assets/demos/ecommerce/images/items/3-3.jpg" alt="Men Bag"></a></div>
												</div>
											</div>
										</div>
										<div class="sale-flash">Sale!</div>
										<div class="product-cart"><a href="#"><i class="icon-shopping-cart"></i></a></div>
										<div class="product-quickview"><a href="#" data-toggle="tooltip" data-placement="top" title="Available Sizes: S | M | L"><i class="icon-info"></i></a></div>
									</div>
									<div class="portfolio-desc nobottompadding">
										<h3><a href="#">Men Black Bag</a></h3>
										<span class="notopmargin"><a href="#">Laptop Bag</a></span>
										<div class="item-price">
											<span><del class="d-md-none d-lg-block">$45.99</del> &euro;39.00</span>
											<div class="rating-stars">
												<i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-half"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="row noleftmargin norightmargin bottommargin-lg common-height">
					<div id="headquarters-map" class="col-lg-8 col-md-6 gmap d-none d-md-block"></div>
					<div class="col-lg-4 col-md-6" style="background-color: #F5F5F5;">
						<div class="col-padding max-height">
							<h3 class="font-body t400 ls1">Our Headquarters</h3>

							<div style="font-size: 16px; line-height: 1.7;">
								<address style="line-height: 1.7;">
									<strong>North America:</strong><br>
									795 Folsom Ave, Suite 600<br>
									San Francisco, CA 94107<br>
								</address>

								<div class="clear topmargin-sm"></div>

								<address style="line-height: 1.7;">
									<strong>Europe:</strong><br>
									795 Folsom Ave, Suite 600<br>
									San Francisco, CA 94107<br>
								</address>

								<div class="clear topmargin"></div>

								<abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
								<abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>
								<abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
							</div>
						</div>
					</div>
				</div>



				<div class="container clearfix">

					<div class="divcenter topmargin" style="max-width: 850px;">

						<div class="contact-widget">

							<div class="contact-form-result"></div>

							<form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">

								<div class="form-process"></div>

								<div class="col_half">
									<input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control border-form-control required" placeholder="Name" />
								</div>
								<div class="col_half col_last">
									<input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control border-form-control" placeholder="Email Address" />
								</div>

								<div class="clear"></div>

								<div class="col_one_third">
									<input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control border-form-control" placeholder="Phone" />
								</div>

								<div class="col_two_third col_last">
									<input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control border-form-control" placeholder="Subject" />
								</div>

								<div class="clear"></div>

								<div class="col_full">
									<textarea class="required sm-form-control border-form-control" id="template-contactform-message" name="template-contactform-message" rows="7" cols="30" placeholder="Your Message"></textarea>
								</div>

								<div class="col_full center">
									<button class="button button-border button-circle t500 noleftmargin topmargin-sm" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Send Message</button>
									<br>
									<small style="display: block; font-size: 13px; margin-top: 15px;">We'll do our best to get back to you within 6-8 working hours.</small>
								</div>

								<div class="clear"></div>

								<div class="col_full hidden">
									<input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
								</div>

							</form>

						</div>

					</div>

				</div>

				</div>

				</div>


			</section>
	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?php echo base_url();?>assets/js/functions.js"></script>

	<script>
		// Owl Carousel Scripts
		$('#oc-features').owlCarousel({
			items: 1,
			margin: 60,
		    nav: true,
		    navText: ['<i class="icon-line-arrow-left"></i>','<i class="icon-line-arrow-right"></i>'],
		    dots: false,
		    stagePadding: 30,
		    responsive:{
				768: { items: 2 },
				1200: { stagePadding: 200 }
			},
		});
	</script>
	<!-- Google Map JavaScripts
	============================================= -->
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.gmap.js"></script>

	<!-- Footer Scripts
	============================================= -->


	<script>

		jQuery(window).on( 'load', function(){

			// Google Map
			jQuery('#headquarters-map').gMap({
				address: 'Melbourne, Australia',
				maptype: 'ROADMAP',
				zoom: 14,
				markers: [
					{
						address: "Melbourne, Australia",
						html: "Melbourne, Australia",
						icon: {
							image: "images/icons/map-icon-red.png",
							iconsize: [32, 32],
							iconanchor: [14,44]
						}
					}
				],
				doubleclickzoom: false,
				controls: {
					panControl: false,
					zoomControl: false,
					mapTypeControl: false,
					scaleControl: false,
					streetViewControl: false,
					overviewMapControl: false
				},
				styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":"-100"},{"lightness":"30"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"simplified"},{"gamma":"0.00"},{"lightness":"74"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"lightness":"3"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
			});

		});

	</script>
</body>
</html>
