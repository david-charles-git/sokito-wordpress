<?php
/* Template Name: Recycle Form */
get_header(); ?>

<style>
	.gform_button{
		background: #FF5001;
		color: #fff;
		width: 250px;
		height: 35px;
		line-height: 35px;
		margin: 0px !important;
		padding: 0px !important;
		border-radius: 200px;
		border: 0 none;
		margin-left: 10px;
	}
</style>

<div class="MainContainer access-margin-row">
	<section>
		<div class="margin60px">
			<div class="container ">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 align_center">
						<div class="gza_outln_sup font_size_70 fw400 bc lh120 align_center">Recycle form</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="usu-ready-to-start-margin">
			<div class="container">
				<div class="row justify-content-center usu-basket-margin faq_accor">
					<div class="col-lg-6 col-md-12 col-sm-12 nopadding">
						<?php if(isset($_GET['recycle'])){ ?>
							<p>Thanks for contacting us! We will get in touch with you shortly.</p>
						<?php }else{ ?>
							<?php echo do_shortcode('[gravityforms id="3" title="false" description="false"]'); ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>	
	</section>
</div>

<?php get_footer(); ?>