<?php
$post_id = get_the_ID();
?>
<!DOCTYPE html>
<html>

<head>
	<!-- meta data -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="pBq2M8fmtwii4wXhCMWvl2QMAjARDzKgkweV7joVmqo" />
	<meta name="facebook-domain-verification" content="4w2ptq7f1d7oo4r40yp9sizsrfylui" />
	<title><?php wp_title(); ?></title>
	<?php
	wp_head();
	?>
	<!-- pre live coverage update styles -->
	<!-- <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/favicon.png" />
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.min.css" type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/Gza/font_gza.css" rel="stylesheet" /> -->
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/Univers _LT_Std/font_univers.css" rel="stylesheet" />
	<!-- <link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/Extenda/font_extenda.css" rel="stylesheet" /> -->
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/font_family.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/css/animation.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive_mobile.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive_desktop.css" />
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style-color.css" rel="stylesheet" />
	<!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/css/normalize.min.css"> -->
	<?php
	if (is_front_page()) {
	?>
		<!-- Schema -->
		<script type="application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "Organization",
				"name": "Sokito",
				"foundingDate": "2021",
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
			}
		</script>
	<?php
	}
	?>
	<!-- live coverage styles -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/articlestyles-liveCoverage.css" />

	<!-- live coverage scritps -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/articlesScripts-liveCoverage.js"></script>

	<!-- Google Tag Manager -->
	<script type="text/partytown">
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
	<script type="text/partytown" async src="https://www.googletagmanager.com/gtag/js?id=G-7L0BFV176H"></script>

	<script type="text/partytown">
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}

		gtag('js', new Date());
		gtag('config', 'G-7L0BFV176H');
	</script>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N69F9BC" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php
	$recycle_page_id = 3442;

	if ($post_id == $recycle_page_id) {
		get_template_part('Components/PromoBanners/ShopPromoBanner');
	}

	get_template_part('Components/Headers/Header-live-coverage');
	


