<?php
/* Template Name: Enquiries */
get_header(); ?>

<div class="MainContainer access-margin-row">
				<section>
					<div class="margin60px">
						<div class="container ">
							<div class="row img_padd_hd">
								<div class="col-lg-3 col-md-12 col-sm-12 align_center"></div>
								<div class="col-lg-6 col-md-12 col-sm-12 align_center">
									<div class="gza_outln_sup font_size_70 fw400 bc lh120 align_center">Contact us</div>
									<p class="font_size_22 fw400 bc lh120 jtext ulr center_align">We’d love to hear from you, whether you’re experiencing an issue with your account, order or shipping or enjoying the Sokito experience. </p>
									<p class="font_size_22 fw400 bc lh120 mar_btm_10px jtext ulr center_align">Type your enquiry below and we’ll aim to get back to you in 48hrs (or less). </p>
								</div>
								<div class="col-lg-3 col-md-12 col-sm-12 align_center"></div>
							</div>
						</div>
					</div>
				</section>
				<section>
					<div class="container">
						<div class="row">
							<div class="col-lg-2 col-md-12 col-sm-12 align_center"></div>
							<div class="col-lg-8 col-md-12 col-sm-12">
								<div class="btn_mar_top">
									<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]')?>
								</div>
							</div>
							<div class="col-lg-2 col-md-12 col-sm-12 align_center"></div>
						</div>
					</div>
				</section>
			</div>
            
<?php get_footer(); ?>