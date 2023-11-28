<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
	return;
}

?>
<div class="woocommerce-product-details__short-description">
<img style="width:100% !important; max-width:100px !important;" src="<?php echo get_stylesheet_directory_uri(); ?>/img/devista.png"/>
	<?php echo $short_description; // WPCS: XSS ok. ?>

    

    <?php if(get_the_id() == 11){ ?>
        <div class="flex_align mar_btm_10px" style="margin-top:30px;">
            <div class="font_size_24 fw400 gc70 lh120 gza_sup mr-20">
                <a class="sgfg_circle gc70 sgfg_active" href="javascript:void(0);">SG</a>
            </div>
            <div class="font_size_24 fw400 gc70 lh120 gza_sup">
                <a class="sgfg_circle gc70 sgfg_inactive" href="<?php echo home_url(); ?>/product/devista-fg">FG</a>
            </div>
        </div>
    <?php }else{ ?>
        <div class="flex_align mar_btm_10px" style="margin-top:30px;">
            <div class="font_size_24 fw400 gc70 lh120 gza_sup mr-20">
                <a class="sgfg_circle gc70 sgfg_inactive" href="<?php echo home_url(); ?>/product/devista">SG</a>
            </div>
            <div class="font_size_24 fw400 gc70 lh120 gza_sup">
                <a class="sgfg_circle gc70 sgfg_active" href="javascript:void(0);">FG</a>
            </div>
        </div>
    <?php } ?>

    <a style="color:#FF5001; text-decoration:underline;" href="<?php echo home_url(); ?>/size-guide" target="_blank">Size Guide</a>
</div>
