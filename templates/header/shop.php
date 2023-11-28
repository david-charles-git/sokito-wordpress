<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/favicon.png">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/Gza/font_gza.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/Univers _LT_Std/font_univers.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/Extenda/font_extenda.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/font_family.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive_mobile.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive_desktop.css">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style-color.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/css/normalize.min.css">
	<link rel="stylesheet" type="tsxt/css" link="<?php echo get_stylesheet_directory_uri(); ?>/acf/modules/HotspotContainers/style.css" />

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/popper.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/js/modernizr.min.js" type="text/javascript"></script>
	<?php
	wp_head();
	?>
	<!-- live coverage styles -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/articlestyles-liveCoverage.css" />

	<!-- live coverage scritps -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/articlesScripts-liveCoverage.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

	<style type="text/css">
		.scribble_img {
			width: 100%;
			max-width: 150px !important;
			margin-left: 100px;
			margin-top: 5px;
		}

		#navbar_top {
			border-bottom: 1px solid #ccc;
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

		/* AM_DC quickFixes */
		.woocommerce-variation.single_variation .woocommerce-variation-availability .bis_notifier_wrapper:nth-child(n+3) {
			display: none;
		}
	</style>
</head>

<body <?php body_class(); ?>>
	<?php
	get_template_part('acf/modules/PromoBanners/ShopPromoBanner');
	get_template_part('acf/modules/Headers/Header-live-coverage');
