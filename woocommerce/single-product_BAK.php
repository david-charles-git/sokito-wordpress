<?php
	if (!defined( 'ABSPATH' )) { exit; }

	get_header('shop');

	do_action('woocommerce_before_main_content');

	get_template_part("Components/SingleProduct/SingleProduct");

	do_action('woocommerce_after_main_content');

	get_template_part("Components/HotspotContainers/HotspotContainer");

	get_template_part("Components/NewsletterForm/NewsletterForm");

	get_footer('shop');
?>