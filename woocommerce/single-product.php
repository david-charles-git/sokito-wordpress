<?php
if (!defined('ABSPATH')) {
	exit;
}

get_header('shop');

do_action('woocommerce_before_main_content');

get_template_part("Components/SingleProduct/SingleProduct");

do_action('woocommerce_after_main_content');

get_template_part("Components/HotspotContainers/HotspotContainer");

get_template_part("Components/SingleProduct/Banner");

// get_template_part("Components/NewsletterForm/NewsletterForm");


$args = ['posts_per_page' => 3, 'post_type' => array('live-coverage')];
$the_query = new WP_Query($args);

// The Loop
if ($the_query->have_posts()) {

	?>

	<style>
		section.moreArticles{
			padding-bottom:50px;
		}

		section.moreArticles>.outer {
			max-width: 1920px;
			margin: 0 auto;
			padding: 0 50px;
			transition: height 200ms ease;
		}

		section.moreArticles>.outer>.inner {
			max-width: 1320px;
			margin: 0 auto;
			display: grid;
			align-content: center;
			justify-content: center;
			align-items: center;
			grid-template-columns: repeat(3, 1fr);
			grid-gap: 30px;
		}

		section.moreArticles>.outer>.inner>.item {
			height: 420px;
			position: relative;
			opacity: 1;
			transition: opacity 200ms ease;
		}

		section.moreArticles>.outer>.inner>.item.full {
			display: grid;
			align-items: end;
			justify-content: start;
			grid-template-columns: 1fr;
		}

		section.moreArticles>.outer>.inner>.item.hidden {
			opacity: 0;
			transition: opacity 200ms ease;
		}

		section.moreArticles>.outer>.inner>.item>a {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 2;
		}

		section.moreArticles>.outer>.inner>.item.full>a {
			background-image: linear-gradient(0deg, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0));
		}

		section.moreArticles>.outer>.inner>.item.full>.inner {
			padding: 30px 20px;
		}

		section.moreArticles>.outer>.inner>.item>.inner>.image {
			width: 100%;
			height: 200px;
			background: none;
			opacity: 1;
			transition: none;
		}

		section.moreArticles>.outer>.inner>.item.full>.inner>.image {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}

		section.moreArticles>.outer>.inner>.item>.inner>.image>img {
			object-fit: cover;
			width: 100%;
			height: 100%;
		}

		section.moreArticles>.outer>.inner>.item>.inner>h6 {
			margin: 0;
			margin-top: 20px;
			font-family: 'Univers LT Roman';
			font-size: 30px;
			line-height: 1.1;
			letter-spacing: 0.01em;
			font-weight: bold;
			display: -webkit-box;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}

		section.moreArticles>.outer>.inner>.item.full>.inner>h6 {
			color: #fff;
			position: relative;
			z-index: 2;
		}

		section.moreArticles>.outer>.inner>.item>.inner>.taxonomyContainer {
			margin-top: 20px;
		}

		section.moreArticles>.outer>.inner>.item.full>.inner>.taxonomyContainer>.taxonomy>a,
		section.moreArticles>.outer>.inner>.item.full>.inner>.taxonomyContainer>.taxonomy>p {
			color: #EBEBEB;
			border-color: #EBEBEB;
		}

		section.moreArticles>.outer>.inner>.item.full>.inner>.taxonomyContainer>.taxonomy>a:hover,
		section.moreArticles>.outer>.inner>.item.full>.inner>.taxonomyContainer>.taxonomy>p:hover {
			color: #BFBFBF;
			border-color: #BFBFBF;
		}

		section.moreArticles>.viewMorePosts {
			text-align: center;
			margin-top: 50px;
		}

		@media (max-width: 1080px) {
			section.moreArticles>.outer {
				padding: 0 20px;
			}

			section.moreArticles>.outer>.inner {
				grid-template-columns: repeat(2, 1fr);
			}

			section.moreArticles>.outer>.inner>.item>.inner>h6 {
				font-size: 24px;
			}
		}

		@media (max-width: 800px) {
			section.moreArticles>.outer>.inner {
				grid-template-columns: repeat(1, 1fr);
				grid-gap: 40px;
			}

			section.moreArticles>.outer>.inner>.item>.inner>h6 {
				font-size: 30px;
			}
		}


		.viewMoreButtonLCWrap{
			margin-top:50px;
			position: relative;
			z-index:1;
		}

		.viewMoreButtonLC{
			padding: 1em 2em;
			background-color: #fff;
			cursor: pointer;
			color: #000;
			border-radius: 30px;
			font-family: 'Gza';
			font-size: 18px;
			line-height: 1.1;
			letter-spacing: 0.3px;
			-webkit-transition: all 200ms ease;
			-o-transition: all 200ms ease;
			transition: all 200ms ease;
			border: 1px solid #fff;
			display:inline-block;
			border:1px solid #000;
		}
		.viewMoreButtonLC:hover{
			color:#fff;
			background: #000;
		}

		@media (max-width: 1024px) {

			.viewMoreButtonLCWrap{
			margin-top:-50px;
		}


			.viewMoreButtonLC{
				margin-top:-50px;
			}
		}

	</style>


	<div class="Spacer">
		<div class="desktop" style="height: 20px"></div>
		<div class="mobile" style="height: 30px"></div>
	</div>


	<div class="highlightContainer highlightSection" style="padding-bottom:0px;">
		<div class="highlightFlex">
			<h2 class="highlightsTitle">Live Coverage</h2>

		</div>
	</div>
	<section class="moreArticles feed">
		<div class="outer">
			<div class="inner">
				<?php
				$oddEvenValue = 0;
				while ($the_query->have_posts()) {
					$the_query->the_post();
					$oddEvenValue++;
					?>
					<div class="item <?php if ($oddEvenValue == 2) {
						echo "full";
					} ?>">
						<a href="<?php the_permalink(); ?>"></a>

						<div class="inner">
							<div class="image">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" />
							</div>

							<h6>
								<?php the_title(); ?>
							</h6>

							<div class="taxonomyContainer">
								<?php

								$category_detail = get_the_terms(get_the_id(), 'articleType'); //$post->ID


								foreach ($category_detail as $cd) {

									?>
									<div class="taxonomy" data-slug="<?php echo $cd->slug; ?>">
										<p><?php echo $cd->name; ?></p>
									</div>
									<?php
									break;
								}

								?>


							</div>
						</div>
					</div>
					<?php
				}
				?>

				
			</div>
<div class="viewMoreButtonLCWrap" style="text-align:center;">
			<a class="viewMoreButtonLC" href="<?php echo home_url('');?>/live-coverage/">View more</a>
</div>


		</div>
	</section>

	<?php
}
/* Restore original Post Data */
wp_reset_postdata();
?>
<div style="padding-bottom:80px; position:relative;">
	<?php get_template_part("Components/live-coverage/SubscriptionForm/SubscriptionForm"); ?>

	<div class="container" style="position:relative; left:50px;">
	<div class="breadcrumbsContainer breadcrumbsContainerMobile" style="position:absolute;bottom:-60px; left:15px;"> 
              <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }
              ?>
              </div>

			</div>


</div>




<?php
get_footer('shop');
?>