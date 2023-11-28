<?php
$post_id = get_the_ID();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="pBq2M8fmtwii4wXhCMWvl2QMAjARDzKgkweV7joVmqo" />
	<meta name="facebook-domain-verification" content="4w2ptq7f1d7oo4r40yp9sizsrfylui" />
	<title><?php wp_title(); ?></title>
	<link rel="shortcut icon" href="<?php echo home_url() . "/favicon.ico"; ?>" />

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/Gza/font_gza.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/Univers _LT_Std/font_univers.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/Extenda/font_extenda.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/font_family.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/css/animation.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive_mobile.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive_desktop.css">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style-color.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/css/normalize.min.css">

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/popper.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/js/modernizr.min.js" type="text/javascript"></script>
	<?php
	if (is_front_page()) {
	?>
		<script type="application/ld+json">
			[{
					"@context": "https://schema.org",
					"@type": "Organization",
					"@id": "https://www.sokito.com/#organization",
					"name": "Sokito",
					"foundingDate": "2018",
					"foundingLocation": "Nottingham",
					"founder": "Jake Hardy",
					"url": "https://www.sokito.com/",
					"logo": "https://www.sokito.com/wp-content/themes/sokito/img/logo/logo.png",
					"description": "Sokito makes high performance football boots for maximum impact on the pitch, not the planet. Handcrafted in Europe from durable, recycled and sustainable materials, Sokito boots are lightweight, comfortable and designed for ultimate performance",
					"address": {
						"@type": "PostalAddress",
						"streetAddress": "Aston House, Cornwall Ave, Church End",
						"addressLocality": "Barnet",
						"addressRegion": "London",
						"postalCode": "N3 1LF",
						"addressCountry": "UK"
					},
					"sameAs": [
						"https://www.facebook.com/Officialsokito/",
						"https://twitter.com/officialsokito/",
						"https://www.linkedin.com/company/sokito/",
						"https://www.instagram.com/officialsokito/",
						"https://www.youtube.com/@officialsokito"
					]
				},
				{
					"@context": "http://schema.org",
					"@type": "WebSite",
					"url": "https://www.sokito.com/",
					"potentialAction": {
						"@type": "SearchAction",
						"target": "https://www.sokito.com/search?q={search_term_string}",
						"query-input": "required name=search_term_string"
					}
				}
			]
		</script>
	<?php
	}
	?>
	<style type="text/css">
		.scribble_img {
			width: 100%;
			max-width: 150px !important;
			margin-left: 100px;
			margin-top: 5px;
		}

		.pres_shoe_img {

			max-width: 300px !important;
		}

		.woocommerce #respond input#submit,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button {
			font-family: 'Gza' !important;
			font-size: 22px !important;
		}

		.woocommerce #payment #place_order,
		.woocommerce-page #payment #place_order {
			font-family: 'Gza' !important;
			font-size: 22px !important;
		}



		.single-product .quantity {
			display: none !important;
		}

		.usu-st th,
		td {
			text-align: left;
		}

		.woocommerce-info {
			color: #FF5001;
		}

		.woocommerce-info {
			border-top-color: #FF5001;
		}

		.woocommerce-info::before {
			color: #FF5001;
		}

		.return-to-shop {
			margin-bottom: 30px;
		}

		.woocommerce-Price-amount.amount {
			color: #FF5001;
			font-weight: bold;
		}

		.variations select {
			height: 40px;
			line-height: 40px;
			border-radius: 300px;
			text-indent: 20px;
			padding-right: 20px;
			border: 2px solid #ccc;
		}

		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce button.button.alt,
		.woocommerce input.button.alt {
			border-radius: 300px;
			background-color: #FF5001;
		}

		.reset_variations {
			position: absolute;
		}

		.woocommerce-product-details__short-description {
			margin-bottom: 30px;
		}

		#main {
			margin-top: 50px;
			margin-bottom: 50px;
		}

		.woocommerce-checkout .select2-container .select2-selection--single {
			height: 45px;
		}

		/*font-family: 'Extenda Trial 40 Hecto';*/

		.single-product .related {
			display: none !important;
		}

		.woocommerce-checkout .select2-container .select2-selection--single .select2-selection__rendered {
			line-height: 45px;
			border-color: #000;
		}

		.woocommerce-checkout form .col2-set p {
			margin-bottom: 1.15em;
		}

		.woocommerce-checkout .select2-container--default .select2-selection--single .select2-selection__arrow {
			height: 43px;
		}


		h3 {
			margin-top: 0px;
		}

		body .col-1 {
			-ms-flex: 0 0 100%;
			flex: 0 0 100%;
			float: none;
			width: 100% !important;
			max-width: 100% !important;
		}

		.woocommerce-additional-fields h3 {
			margin-top: 30px;
		}

		.product_meta {
			display: none !important;
		}

		.woocommerce-checkout form #order_review,
		.woocommerce-checkout form #order_review_heading {
			width: 50%;
			padding-left: 1.5vw;
			float: right;
			clear: right;
			margin-bottom: 30px;
		}

		.woocommerce #payment #place_order,
		.woocommerce-page #payment #place_order {
			margin-top: 30px;
		}

		.woocommerce-checkout form #order_review,
		.woocommerce-checkout form #order_review_heading {
			width: 50%;
			padding-left: 1.5vw;
			float: right;
			clear: right;
		}

		.usu-st th:first-child,
		td:first-child {
			text-align: left;
		}

		header {
			margin-bottom: 50px;
		}

		.col2-set {
			margin-bottom: 50px;
		}

		.woocommerce-input-wrapper {
			display: block;
			width: 100%;
		}

		.woocommerce form .form-row label,
		.woocommerce-page form .form-row label {
			width: 100%;
		}

		.woocommerce form .form-row input.input-text,
		.woocommerce form .form-row textarea {
			display: block;
			min-height: 40px;
			line-height: 40px;
		}


		body .col-2 {
			-ms-flex: 0 0 100%;
			flex: 0 0 100%;
			max-width: 100%;
			float: none !important;
			width: 100% !important;
			clear: both;
		}

		.woocommerce-checkout form .col2-set {
			width: 50%;
			float: left;
			padding-right: 1.5vw;
		}

		select {
			min-height: 40px;
			line-height: 40px;
		}


		.single-product .product_title {
			display: none;
		}

		.single-product .woocommerce-Price-amount {
			/*display: none;*/
		}

		.woocommerce div.product div.images .flex-control-thumbs li {
			width: 12.2% !important;
			margin: 1% !important;
		}

		.flex-control-nav {
			margin-top: 30px;
			margin-left: -1% !important;
			margin-right: -1% !important;
		}

		.woocommerce div.product .woocommerce-product-gallery--columns-4 .flex-control-thumbs li:nth-child(4n+1) {
			clear: none !important;
		}

		.woocommerce-variation-add-to-cart {
			text-align: center;
		}

		.woocommerce div.product form.cart .button {
			margin: 0 auto;
			margin-top: 20px;
			padding: 20px 60px;
			float: none;
		}

		.woocommerce-order-overview {
			margin-top: 40px !important;
			padding-left: 0px;
			margin-left: 0px;
		}

		body .wc-item-meta {
			margin-left: 0px !important;
			padding-left: 0px !important;
		}

		body.woocommerce-checkout .woocommerce-column--1 {
			padding: 0px !important;
			width: 48% !important;
			float: left;
			margin-right: 2%;
		}

		body.woocommerce-checkout .woocommerce-column--2 {
			padding: 0px !important;
			width: 48% !important;
			float: left !important;
			margin-left: 2%;
			clear: none;
		}

		/*change product add to cart button color*/
		.woocommerce div.product form.cart .button {
			background-color: #FF5001;
			color: #fff;
		}

		/*change product add to cart button color hover*/
		.woocommerce div.product form.cart .button:hover {
			background-color: #FF5001;
			color: #FFF;
		}

		/*When Prodcut is added*/
		.woocommerce .product .add_to_cart_button.button {
			background-color: #FF5001;
			color: #FFF;
		}

		.woocommerce .product .add_to_cart_button.button:hover {
			background-color: #FF5001;
			color: #FFF;
		}

		.woocommerce-variation-availability {
			padding: 30px;
			background: #ebebeb;
			border-radius: 10px;
			margin-top: 30px;
		}

		#backinstock_textbox {
			height: 40px;
			line-height: 40px;
			border-radius: 300px;
			text-indent: 20px;
			padding-right: 20px;
			border: 2px solid #ccc;
			width: 100%;
		}

		.out-of-stock {
			font-size: 22px !important;
			font-family: "Gza Super";
		}

		#shipping_method label {
			font-weight: normal !important;
			font-size: 14px !important;
		}

		body #backinstock_button {
			background-color: #FF5001 !important;
			color: #fff;
			margin: 0 auto;
			/* margin-top: 20px; */
			padding: 10px 30px;
			float: none;
			border-radius: 1000px;
			border: 0 none;
			font-size: 22px;
			font-family: "Gza Super";
		}

		.woocommerce-MyAccount-navigation-link {
			padding: 10px 0px;
			border-bottom: 1px solid #ebebeb;
			font-size: 28px;
			font-family: "Gza Super";
		}

		header.woocommerce-Address-title {
			border-bottom: 1px solid #ebebeb;
			font-size: 28px;
			font-family: "Gza Super";
			margin-top: 30px;
			margin-bottom: 20px !important
		}

		.input-text,
		.wps_rma_return_request_subject {
			border-radius: 200px;
			text-indent: 20px;
			border: 2px solid #ccc;
		}

		#wps_rma_return_request_subject {
			border-radius: 300px;
		}

		.woocommerce-column--1 {
			width: 50% !important;
			float: left !important;
		}

		.woocommerce-column--2 {
			width: 50% !important;
			float: left !important;
		}

		body .button.btn {
			padding: 0px 20px !important;
			background: #FF5001;
			color: #fff;
			display: inline-block;
			height: 35px;
			line-height: 35px;
			margin: 0px !important;
			border-radius: 200px;
			border: 0 none;
			margin-left: 10px;
			font-family: "Gza Super";
		}

		#wps_rma_return_request_subject_text {
			border-radius: 30px;
		}

		.reviews {
			padding: 40px 0px 100px 0px;
		}

		.reviewFrom {
			color: #FF5001;
			margin-top: 30px;
			text-align: center;
			font-size: 22px;
		}

		.reviewWords {
			font-family: "Gza Super";
			text-align: center;
			font-size: 48px;
			line-height: 52px;
		}

		.wps_rma_return_request_reason {
			border-radius: 10px;
		}

		.wps-rma-form__heading {
			font-size: 28px;
			font-family: "Gza Super";
		}

		.wps_rma_refund_form_wrapper {
			max-width: 1280px;
			margin: 0 auto;
		}

		.woocommerce-MyAccount-content {
			margin-bottom: 50px;
		}

		.usu-footwear-popup-form-container input[type=text],
		input[type=password] {
			padding: 0px !important;
			display: block;
			width: 100% !important;
		}

		@media(max-width: 1024px) {

			.reviewWords {
				font-family: "Gza Super";
				text-align: center;
				font-size: 28px;
				line-height: 36px;
			}

			body.woocommerce-checkout form .col2-set {
				width: 100% !important;
			}

			body.woocommerce-checkout form #order_review,
			.woocommerce-checkout form #order_review_heading {
				width: 100% !important;
				margin: 0px !important;
			}

			body.woocommerce-checkout .woocommerce-column--2,
			body.woocommerce-checkout .woocommerce-column--1 {
				width: 100% !important;
				margin: 0px !important;
				margin-left: 0px !important;
			}

			.woocommerce-order-overview li {
				width: 100%;
				margin-right: 0px;
				margin-bottom: 20px !important;
			}

		}

		.page-id-4767 .container br {
			display: none !important;
		}

		/* AM_DC quickFixes */
		/* .woocommerce-variation.single_variation .woocommerce-variation-availability .bis_notifier_wrapper:nth-child(n+3) {
			display: none;
		} */
	</style>
	<?php
	wp_head();
	?>

	<!-- live coverage styles -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/homePageStyles.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/dist/articlestyles-liveCoverage.min.css" />

	<!-- live coverage scritps -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/dist/homePageScripts.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/dist/articlesScripts-liveCoverage.min.js"></script>

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});

			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';

			j.async = true;
			j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-N69F9BC');
	</script>
	<!-- End Google Tag Manager -->

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-7L0BFV176H"></script>

	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}

		gtag('js', new Date());
		gtag('config', 'G-7L0BFV176H');



		window.dataLayer.push({
			'ordertotal': ordertotalvalue,
			'orderid': orderidvalue,
			'ordermethod': ordermethodvalue
		});
	</script>

	<?php

	$is_checkout = false;
	$is_preorder = false;

	if ($is_checkout) {
		if ($is_preorder) {
	?>

			<script>
				dataLayer.push({
					'preOrder': true
				});
			</script>

	<?php
		}
	}
	?>

</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N69F9BC" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div class="wrapper" id="home">
		<?php
		/*			
				<header>
					<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark">
						<div class="container_new">
							<a class="navbar-brand" href="<?php echo get_home_url(); ?>/"><img class="logo_img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/logo.png" alt=""></a>
							
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>

							<div class="collapse navbar-collapse" id="main_nav">
								<ul class="navbar-nav ml-auto">
									<!--li class="nav-item">
										<a class="nav-link font_size_13 bc fw500 gza_font" href="<?php echo get_home_url(); ?>/products/midas">CREATE</a>
									</li-->
									<li class="nav-item dropdown">
										<a class="nav-link font_size_13 bc fw500 gza_font" id="navbardrop">Boots</a>
										
										<div class="dropdown-menu">
											<a class="dropdown-item font_size_13 bc fw500 gza_font" href="<?php echo get_home_url(); ?>/product/devista-fg-clearly-black/">Devista</a>
											<a class="dropdown-item font_size_13 bc fw500 gza_font" href="<?php echo get_home_url(); ?>/product/devista-vegan-fg-just-white/">Devista Vegan</a>
											<!--a class="dropdown-item font_size_13 bc fw500 gza_font" href="<?php echo get_home_url(); ?>/sustainable/">SUSTAINABILITY</a-->
										</div>

										<!--div class="dropdown-menu">
											<a class="dropdown-item font_size_13 bc fw500 gza_font" href="#">Football Boots</a>
											<a class="dropdown-item font_size_13 bc fw500 gza_font" href="#">Inspiration</a>
											<a class="dropdown-item font_size_13 bc fw500 gza_font" href="<?php echo get_home_url(); ?>/accessory">Accessories</a>
											<a class="dropdown-item font_size_13 bc fw500 gza_font" href="#">Gift A Pair</a>
										</div -->
									</li>
														
									<li class="nav-item dropdown">
										<a class="nav-link font_size_13 bc fw500 gza_font" id="navbardrop" href="<?php echo get_home_url(); ?>/recycle/">Recycle</a>
									</li>
									
									<!--li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle font_size_13 bc fw500 gza_font" id="navbardrop" href="javascript:void(0);" data-toggle="dropdown">Customise</a>
										<div class="dropdown-menu">
											<a class="dropdown-item font_size_13 bc fw500 gza_font" href="#">Custom Design</a>
											<a class="dropdown-item font_size_13 bc fw500 gza_font" href="#">Custom Fit</a>
										</div>
									</li -->
									
									<li class="nav-item dropdown">
										<a class="nav-link font_size_13 bc fw500 gza_font" id="navbardrop" href="<?php echo get_home_url(); ?>/sustainable/">Sustainability</a>
									</li>
									
									<li class="nav-item dropdown">
										<a class="nav-link font_size_13 bc fw500 gza_font" id="navbardrop" href="javascript:void(0);" data-toggle="dropdown"> About </a>

										<div class="dropdown-menu">
											<a class="dropdown-item font_size_13 bc fw500 gza_font" href="<?php echo get_home_url(); ?>/our-story/">Our Story</a>
											<a class="dropdown-item font_size_13 bc fw500 gza_font" href="<?php echo get_home_url(); ?>/hand-made/">Handmade</a>
											<!--a class="dropdown-item font_size_13 bc fw500 gza_font" href="<?php echo get_home_url(); ?>/sustainable/">SUSTAINABILITY</a-->
										</div>
									</li>

									<li class="nav-item dropdown">
										<a class="nav-link font_size_13 bc fw500 gza_font" id="navbardrop" href="<?php echo get_home_url(); ?>/my-account/">My Account</a>
									</li>
								</ul>
								
								<div class="lang_slect flex_align sub_own" style="margin-right:20px;">
									<div>
										<a class="nav-link relative font_size_13 bc fw500 gza_font" style="position:relative;"id="navbardrop" href="<?php echo get_home_url(); ?>/cart">
	<?php
											global $woocommerce;

											if(count(WC()->cart->get_cart()) > 0){
	?>
												<div class="absolute text-white" style="position:absolute; color:#fff; top:11px; right:23px; font-family:sans-serif; "><?php print_r(count(WC()->cart->get_cart())); ?></div>
												
												<svg width="21px" height="24px" viewBox="0 0 21 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
													<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<g id="Group" transform="translate(-0.002781, 0.000000)">
															<polygon id="Rectangle" fill="#FF0600" points="2.91163455 5.95850783 17.2213376 5.95850783 19.0646568 22 1.45478092 22"></polygon>
															<g id="Untitled-1" fill="#000000" fill-rule="nonzero">
																<path d="M20.0037809,22.353 L18.2467809,5.625 C18.2099423,5.27491906 17.9147948,5.00911368 17.5627809,5.009 L14.2627809,5.009 L14.2627809,4.256 C14.2627809,1.9054761 12.3573048,0 10.0067809,0 C7.65625702,0 5.75078092,1.9054761 5.75078092,4.256 L5.75078092,5.009 L2.45078092,5.009 C2.09876708,5.00911368 1.80361956,5.27491906 1.76678092,5.625 L0.00378091594,22.353 C-0.0166220219,22.5468908 0.0461944863,22.7403342 0.176616726,22.8852478 C0.307038965,23.0301614 0.492819618,23.113 0.687780916,23.113 L19.3187809,23.113 C19.5137422,23.113 19.6995229,23.0301614 19.8299451,22.8852478 C19.9603673,22.7403342 20.0231839,22.5468908 20.0027809,22.353 L20.0037809,22.353 Z M7.12478092,4.256 C7.12478092,2.66541994 8.41420086,1.37600006 10.0047809,1.37600006 C11.595361,1.37600006 12.8847809,2.66541994 12.8847809,4.256 L12.8847809,5.009 L7.12478092,5.009 L7.12478092,4.256 Z M1.45478092,21.737 L3.06678092,6.384 L5.74978092,6.384 L5.74978092,7.9 C5.74978093,8.2799719 6.05780902,8.58799997 6.43778092,8.58799997 C6.81775281,8.58799997 7.1257809,8.2799719 7.12578092,7.9 L7.12578092,6.384 L12.8857809,6.384 L12.8857809,7.9 C12.8857809,8.27997191 13.193809,8.588 13.5737809,8.588 C13.9537528,8.588 14.2617809,8.27997191 14.2617809,7.9 L14.2617809,6.384 L16.9437809,6.384 L18.5557809,21.737 L1.45478092,21.737 Z" id="shopping-bag"></path>
															</g>
														</g>
													</g>
												</svg>
	<?php
											}else{
	?>
												<svg xmlns="http://www.w3.org/2000/svg" width="20.004" height="23.113" viewBox="0 0 20.004 23.113">
													<path id="shopping-bag" d="M20,22.353,18.243,5.625a.688.688,0,0,0-.684-.616h-3.3V4.256a4.256,4.256,0,0,0-8.512,0v.753h-3.3a.688.688,0,0,0-.684.616L0,22.353a.688.688,0,0,0,.684.76H19.315a.688.688,0,0,0,.684-.76ZM7.121,4.256a2.88,2.88,0,0,1,5.76,0v.753H7.121ZM1.451,21.737,3.063,6.384H5.746V7.9a.688.688,0,0,0,1.376,0V6.384h5.76V7.9a.688.688,0,1,0,1.376,0V6.384h2.682l1.612,15.353Zm0,0" transform="translate(0.001)"/>
												</svg>
	<?php 
											}
	?>					
									</a>

									<!-- <a href="<?php echo home_url(); ?>/cart/" class="basket_icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/basket.png" alt="..."></a> -->								
								</div>
							</div>
						</div> 
					</div>
				</nav>
			</header>	
			*/

		get_template_part('Components/Headers/Header-live-coverage');
