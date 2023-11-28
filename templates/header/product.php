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
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/Univers _LT_Std/font_univers.css" rel="stylesheet" />
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/font_family.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/css/animation.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive_mobile.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive_desktop.css" />
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style-color.css" rel="stylesheet" />

  <!-- live coverage styles -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/articlestyles-liveCoverage.css" />

  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/dist/core.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/templates/dist/product-results.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/components/dist/uspBanner.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/components/dist/heroBanner.min.css" />


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
  get_template_part('acf/modules/Headers/Header-live-coverage');
