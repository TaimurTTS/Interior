<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

<style>
/* ----------------------------------------------------------------
	Canvas: eCommerce Demo
	Version: 1.0
-----------------------------------------------------------------*/
.grid-item .grid-info h3 { margin-bottom: 15px }

.grid-item .grid-info h3 a {
	display: block;
	font-weight: 400;
	text-transform: uppercase;
	font-size: 15px;
	letter-spacing: 1px;
	color: #111;
}

.grid-item .grid-info h3 a span {
	display: block;
	font-family: 'Merriweather', serif;
	font-weight: 300;
	font-size: 13px;
	color: #999;
	margin-top: 5px;
	text-transform: none;
	letter-spacing: 0;
}

.more-link {
	color: #666;
	border-bottom-color: #666;
	font-style: normal;
	font-weight: 300;
	font-size: 13px;
	cursor: pointer;
}


@media (max-width: 991px) and (min-width: 767px) {
	.grid-item .grid-info h3 { margin-bottom: 10px; }

	.grid-item .grid-info h3 a {
		font-size: 13px;
		letter-spacing: 0;
		color: #111;
	}

	.grid-item .grid-info h3 a span {
		font-size: 11px;
		color: #999;
		margin-top: 5px;
		text-transform: none;
		letter-spacing: 0;
	}

	.more-link {
		font-size: 12px;
	}
}

@media (max-width: 767px) {
	.grid-info {
		padding: 15px 0;
		margin-bottom: 30px;
		text-align: center;
	}
}


.iportfolio .portfolio-image .flex-prev,
.iportfolio .portfolio-image .flex-next,
.product-cart,
.product-quickview {
	opacity: 0;
	background-color: #FFF;
	border-radius: 35px;
	width: 35px;
	height: 35px;
	border: 1px solid rgba(0, 0, 0, .07) !important;
	text-align: center;
	margin: -17px 8px 0;
	-webkit-transform: translateX(-3px);
	transform: translateX(-3px);
	-webkit-transition: -webkit-transform .6s;
	transition: -webkit-transform .6s;
	transition: transform .6s;
	transition: transform .6s,-webkit-transform .6s;
	-webkit-transition: all .3s ease;
	-o-transition: all .3s ease;
	transition: all .3s ease;
	z-index: 2;
}

.product-cart,
.product-quickview {
	position: absolute;
	bottom: 10px;
	right: 0px;
	-webkit-transform: none;
	transform: none;
}

.product-quickview { right: 40px; }

.iportfolio .portfolio-image .flex-next {
	-webkit-transform: translateX(3px);
	transform: translateX(3px);
}

.iportfolio:hover .portfolio-image .flex-prev,
.iportfolio:hover .portfolio-image .flex-next,
.iportfolio:hover .product-cart,
.iportfolio:hover .product-quickview {
	opacity: 1;
	-webkit-transform: none;
	transform: none;
}

.iportfolio .portfolio-image .flex-prev i,
.iportfolio .portfolio-image .flex-next i,
.product-cart i,
.product-quickview i {
	color: #444;
	text-shadow: none;
	width: auto;
	height: auto;
	line-height: 33px;
	margin-left: -2px;
	font-size: 18px;
	text-align: center;
	-webkit-transition: all .3s ease;
	-o-transition: all .3s ease;
	transition: all .3s ease;
}

.product-cart i,
.product-quickview i {
	font-size: 14px;
	margin-left: 1px;
}

.iportfolio .portfolio-image .flex-next i { margin-left: 2px; }

.iportfolio .portfolio-image .flex-prev:hover,
.iportfolio .portfolio-image .flex-next:hover { background-color: #FFF !important; }

.sale-flash {
	background-color: #454545;
	color: #FFF;
	border-radius: 50%;
	min-height: 60px;
	min-width: 60px;
	font-size: 12px;
	line-height: 48px;
	text-align: center;
	font-family: 'Merriweather', serif;
	font-weight: 400;
	text-transform: uppercase;
}

.portfolio-desc {
	position: relative;
	font-family: 'Montserrat';
}

.portfolio-desc h3 a {
	font-size: 16px;
	font-weight: 400;
	-webkit-transition: all .3s ease;
	-o-transition: all .3s ease;
	transition: all .3s ease;
}

.portfolio-desc span a {
	font-size: 12px;
	font-weight: 300;
	letter-spacing: 0;
	margin-top: 0;
}

.portfolio-desc .item-price {
	position: absolute;
	bottom: 0;
	right: 5px;
	float: right;
	text-align: right;
}

.portfolio-desc .item-price span {
	font-weight: 400;
	font-size: 15px;
	color: #444;
	margin-bottom: 3px;
}

.portfolio-desc .item-price del { color: #AAA; }

.rating-stars i { color: #CCC; }

.tooltip.top .tooltip-arrow{ border-top: 5px solid #FFF; }

.tooltip-inner {
	padding: 4px 8px;
	color: #555;
	background-color: #FFF;
	border-radius: 2px;
	border: 1px solid #EEE;
	font-family: 'Montserrat';
	font-weight: 300;
}

.heading-block.center > span {
	font-size: 15px;
	color: #BBB;
	font-family: 'Montserrat';
}


.ecommerce-categories [class^=col-] {
	position: relative;
	margin-bottom: 30px;
}

.ecommerce-categories [class^=col-] > a {
	display: block;
	position: relative;
	height: 250px;
	background-color: #EEE;
}

.ecommerce-categories [class^=col-] img { display: block; }

.ecommerce-categories [class^=col-] > a:before {
	content: '';
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	background-color: rgba(0,0,0,0.4);
	opacity: 0.4;
	-webkit-transition: all .7s ease;
	transition: all .7s ease;
}

.ecommerce-categories [class^=col-] > a:hover:before { opacity: 1; }

.before-heading {
	text-transform: uppercase;
	font-style: normal;
	letter-spacing: 4px;
	font-family: 'Lato' !important;
	font-weight: 400;
	font-size: 14px;
}


.item-title h3 { margin-bottom: 20px; }

.item-title h3 a {
	font-size: 40px;
	color: #444;
}

.item-meta {
	color: #777;
	font-weight: 300;
}

.item-desc p {
	margin-top: 20px;
	font-size: 1rem;
	color: #888;
	font-weight: 400;
}

.item-color span {
	display: block;
	text-transform: uppercase;
	font-size: 12px;
	letter-spacing: 3px;
	margin-bottom: 12px;
	font-weight: 600;
}

#item-color-dots .owl-dot { display: inline-block; }

#item-color-dots .owl-dot span {
	display: block;
	width: 16px;
	height: 16px;
	margin: 0 5px;
	opacity: 1;
	border-radius: 50%;
	background-color: #444;
	cursor: pointer;
	-webkit-transition: opacity .3s ease;
	-o-transition: opacity .3s ease;
	transition: opacity .3s ease;
}

#item-color-dots .owl-dot.active span {
	opacity: 0.7;
	border: 2px solid #000 !important;
}

#item-color-dots .owl-dot:nth-of-type(1) span {
	margin-left: 0;
	background-color: #2f3977;
}

#item-color-dots .owl-dot:nth-of-type(2) span { background-color: #c8271d; }
#item-color-dots .owl-dot:nth-of-type(3) span { background-color: #723f2e; }
#item-color-dots .owl-dot:nth-of-type(4) span { background-color: #4a4c4b; }
#item-color-dots .owl-dot:nth-of-type(5) span { background-color: #af6035; }
#item-color-dots .owl-dot:nth-of-type(6) span { background-color: #3d6370; }

.section-content {
	display: block;
	max-width: 400px;
	position: absolute;
	width: 90%;
	top: 40px;
	left: 50%;
	-webkit-transform: translateX(-50%);
	transform: translateX(-50%);
}

.section-content h3 {
	display: block;
	font-size: 32px;
	line-height: 1.5;
	font-family: "Merriweather", serif;
	font-weight: 400;
	margin-bottom: 20px;
}

.section-content span {
	display: block;
	font-size: 14px;
	font-weight: 300;
	color: #888;
	margin-bottom: 20px;
}

.fbox-image { margin-top: 20px; }

.feature-box .before-heading { font-size: 10px; }


.app-footer-features h5 {
	display: inline-block;
	font-weight: 500;
	font-size: 13px;
	letter-spacing: 1px;
}

.app-footer-features h5 a {
	color: #666;
	font-weight: 600;
}

.app-footer-features h5 a:hover {
	color: #444;
	border-bottom: 1px dotted #AAA;
}

.app-footer-features i {
	position: relative;
	top: 8px;
	width: 30px;
	height: 30px;
	font-size: 30px;
	margin-right: 10px;
	color: #888;
}

.app-footer-features h5 span { color: #A0ACB6 !important; }

.payment-cards {
	list-style: none;
	text-align: right;
	margin: 0;
}

.payment-cards li {
	display: inline-block;
	margin: 0 5px;
	width: 44px;
}

.widget.subscribe-widget .form-control {
	border-radius: 0 !important;
	border: 1px solid #333;
}

.widget.subscribe-widget .button {
	border-radius: 0 !important;
	height: 46px;
	line-height: 46px;
	margin: 0;
}

.widget.subscribe-widget .button:hover { background-color: #111; }

.copy-link a {
	font-family: 'Montserrat';
	color: #000;
	opacity: .5;
	font-weight: 300;
	font-size: 13px;
}

.social-icon.si-mini {
	width: 24px;
	height: 24px;
	font-size: 11px;
	line-height: 23px !important;
}

.social-icon.si-mini:hover i:first-child { margin-top: -23px; }

/* Footer
-----------------------------------------------------------------*/
.widget_links li,
.widget_links li a {
	background-image: none !important;
	padding-left: 0;
	color: #666 !important;
	font-size: 13px;
	font-weight: 300;
}


@media (max-width: 991px) {

	.payments-info { text-align: center; }

	.payment-cards {
		margin-top: 40px;
		text-align: center;
	}
}


</style>
<!-- Stylesheets
============================================= -->
<link href="http://fonts.googleapis.com/css?family=Poppins:300,400,400i,600,700|Open+Sans:300,400,600,700,800,900" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dark.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/swiper.css" type="text/css" />
<!-- eCommerce Demo Specific Stylesheet -->


<!-- / -->
<!-- Business Demo Specific Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/demos/business/business.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/demos/business/css/fonts.css" type="text/css" />
<!-- / -->

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-icons.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/magnific-popup.css" type="text/css" />

<link rel="stylesheet" href="<?php echo base_url();?>assets/one-page/css/et-line.css" type="text/css" />

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<!-- Theme Color
============================================= -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/demos/business/css/colors.css" type="text/css" />

	<!-- Document Title
	============================================= -->
	<title>Business | Canvas</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<style>

    #icons{
        backgound-color:grey;
					position: fixed;
    top: 0px;
    /* left: 0px; */
    right: 0;
    margin-right: auto;
    margin-left: auto;
    /* width: 50px; */
    /* height: 300px; */
    z-index: 999999;
}
</style>
</head>

<body class="stretched">
<div id="icons">
<a href="javascript:;"><i class="fab fa-facebook"></i></a>
<a href="javascript:;"><i class="fab fa-instagram"></i></a>
<a href="javascript:;"><i class="fab fa-twitter-square"></i></a>
<a href="javascript:;"><i class="fab fa-pinterest-square"></i></a>
</div>

	<!-- Document Wrapper
	============================================= -->

	<div id="wrapper" class="clearfix">


		<!-- Header
		============================================= -->
		<header id="header" class="transparent-header dark full-header" data-sticky-class="dark" data-responsive-class="not-dark" data-sticky-offset="full">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="<?php echo base_url();?>assets/demos/business/images/-dark.png"><img src="<?php echo base_url();?>assets/demos/business/images/logo.png" alt="Interio Logo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="<?php echo base_url();?>assets/demos/business/images/"><img src="<?php echo base_url();?>assets/demos/business/images/logo@2x.png" alt="Interio Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" class="not-dark">

						<ul>
							<li class="active"><a href="#"><div>Home</div></a></li>
							<li><a href="#"><div>Products</div></a>
								<ul>
									<li><a href="#"><div>NextGen Framework</div></a></li>
									<li><a href="#"><div>Stunning Graphics</div></a></li>
									<li><a href="#"><div>Secured Solutions</div></a></li>
								</ul>
							</li>
							<li><a href="#"><div>About us</div></a></li>
							<li><a href="#"><div>Estimation</div></a></li>
							<li><a href="#"><div>Contact Us</div></a></li>
						</ul>

						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->