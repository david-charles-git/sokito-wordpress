<?php
get_template_part('Components/Footers/Footer-live-coverage');
wp_footer();
get_template_part("Components/PromotionPopUp/PromotionPopUp");
?>
<!-- END Wrapper -->
<?php
if (get_the_id() !== 8) {
}
?>

<!-- footer -->

<!-- <style>
			#input_2_1{
				background: #000;
				border:1px solid #fff;
				border-radius:100px;
				width:95%;
				color:#fff;
			}
			#gform_2 .gform-body{
				width:80%;
				float: left;
			}

			#gform_2{
				height:55px;
			}

			#gform_confirmation_message_2{
				color:#fff;
			}

			#gform_2 .gform_footer{
				width:15%;
				float: left;
				margin-left:5%;
				padding:0px !important;
				margin:0px !important;

			}
			#gform_submit_button_2{
				background: #FF5001;
				color:#fff;
				/* width:100%; */
				/* height:35px; */
				/* line-height:35px; */
				/* margin:0px !important; */
				/* padding:0px !important; */
				border-radius:200px;
				border:0 none;
				margin-left:10px;
			}

			#gform_submit_button_1{
				border-radius:200px;
				border:0 none;
				background: #FF5001;
				color:#fff;
				height:35px;
				line-height:35px;
				width:200px;
				text-align:center;
			}
		</style> -->
<?php
/*
		<footer>
			<div class="container">
				<div class="footer_grid_container1 footer_padd">
					<!-- <div class="footer_brd">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="footer_coman">
									<p class="font_size_22 fw400 wc lh120 gza_sup">Fancy hearing about new launches, events and cool stuff? </p>
									<p class="font_size_18 fw400 oc lh120 gza_sup">Sign-up for our newsletter</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<?php echo do_shortcode('[gravityform id="2" title="false" description="false"]'); ?>
							</div>
						</div>
					</div> -->
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<div class="left_align">
								<h4 class="et40h font_size_45 oc fw400 ls1px">INFO</h4>
								<div><a href="<?php echo home_url(); ?>/my-account/" class="font_size_18 gc ulr">My Account</a></div>
								<div><a href="<?php echo home_url(); ?>/recycle/" class="font_size_18 gc ulr">Recycle</a></div>
								<div><a href="<?php echo home_url(); ?>/sustainable/" class="font_size_18 gc ulr">Sustainability</a></div>
								<div><a href="<?php echo home_url(); ?>/our-story/" class="font_size_18 gc ulr">Our Story</a></div>						
								<div><a href="<?php echo home_url(); ?>/hand-made/" class="font_size_18 gc ulr">Handmade</a></div>
								
								<!-- div><a href="#" class="font_size_18 gc ulr">Customised</a></div>
								<div><a href="#" class="font_size_18 gc ulr">Our Blog</a></div>
								<div><a href="<?php echo home_url(); ?>/faq" class="font_size_18 gc ulr">FAQ</a></div -->
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<div class="left_align">
								<h4 class="et40h font_size_45 oc fw400 ls1px">CONTACT</h4>
								<!-- div><a href="#" class="font_size_18 gc ulr">+00 (0) 0000 0000</a></div -->
								<div><a href="<?php echo home_url(); ?>/enquiries/" class="font_size_18 gc ulr">Enquiries</a></div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12">
							<div class="left_align">
								<h4 class="et40h font_size_45 oc fw400 ls1px">LEGAL</h4>
								<div><a href="<?php echo home_url(); ?>/privacy-policy/" class="font_size_18 gc ulr">Privacy Policy</a></div>
								<div><a href="<?php echo home_url(); ?>/terms/" class="font_size_18 gc ulr">Terms and Conditions</a></div>
								<div><a target="_blank" href="<?php echo get_stylesheet_directory_uri(); ?>/downloads/SokitoT&C.pdf" class="font_size_18 gc ulr">Supplier Terms & Conditions</a></div>
								<div><a href="https://www.sokito.com/return-refund-policy/" class="font_size_18 gc ulr">Return & Refund Policy</a></div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12">
							<div class="" style="text-align: right;">
								<a href="https://www.facebook.com/Officialsokito/" target="_blank"><img class="img-responsive padd_right10px" src="<?php echo get_stylesheet_directory_uri();?>/img/social/facebook.png" alt="" /></a>
								<a href="https://www.instagram.com/officialsokito/" target="_blank"><img class="img-responsive padd_right10px" src="<?php echo get_stylesheet_directory_uri();?>/img/social/instagram.png" alt="" /></a>
								<a href="https://twitter.com/officialsokito/" target="_blank"><img class="img-responsive padd_right10px" src="<?php echo get_stylesheet_directory_uri();?>/img/social/twitter.png" alt="" /></a>
							</div>
							<div class="footer_coman2" style="text-align: right;">
								<a href="#"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/img/payment/paypal.png" alt="" /></a>
								<a href="#"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/img/payment/visa.png" alt="" /></a>
								<a href="#"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/img/payment/pay.png" alt="" /></a>
								<a href="#"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/img/payment/master_card.png" alt="" /></a>
								<a href="#"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/img/payment/am.png" alt="" /></a>
								<p class="copy_right gift_fz_sep gc ulr">© Technological Tailors Ltd t/a Sokito Footwear. All rights reserved.</p>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</footer>
		*/
?>
<!-- Thanks for Subscription Popup Modal -->
<div class="modal animate bottom_fixed_modal" id="thanks_bottom_modal">
	<div class="modal-dialog">
		<div class="modal-content animate-bottom">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" onClick="javascript:$('#thanks_bottom_modal').hide();" class="close story_close_btn buttd" data-dismiss="modal">×</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="pa-15">
					<div>
						<p class="font_size_65 fw400 oc lh100 et40h">THANKS FOR <span class="font_size_65 fw400 bc lh100 mar_btm_10px et30d">SIGNING UP</span></p>

						<p class="font_size_22 fw400 bc lh120 ulr">We’ll keep you updated with all the good stuff</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
	$ = jQuery;
	$('.reviewSlick').slick({
		arrows: false,
		autoplay: true,
		dots: true,
		autoplaySpeed: 3500,
	});


	function subscribeNewsletter() {

		var email_id = $("#email_id").val();

		if (email_id != "") {

			$.ajax({
				url: "<?php echo home_url(); ?>/index.php/apis/users/newsletter/",
				data: {
					"email_id": email_id
				},
				dataType: "json",
				type: "POST",
				success: function(data) {

					$("#thanks_bottom_modal").show();

					$("#email_id").val("");

				},
				error: function(xhr, status, error) {
					//alert(xhr.responseText)
				}
			});
		} else {
			//alert("Do nothing");
		}

	}

	function subscribeNewsletter2() {

		var email_id = $("#email_id2").val();

		if (email_id != "") {

			$.ajax({
				url: "<?php echo home_url(); ?>/index.php/apis/users/newsletter/",
				data: {
					"email_id": email_id
				},
				dataType: "json",
				type: "POST",
				success: function(data) {
					$("#discount_modal").hide();
					$("#thanks_bottom_modal").show();

					$("#email_id2").val("");
				},
				error: function(xhr, status, error) {
					//alert(xhr.responseText)
				}
			});
		} else {
			//alert("Do nothing");
		}

	}
</script>

<!-- footer end -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
	$('.js_hide_product_gallery').on('click', function() {
		$('.productGallery').hide();
	});

	$('.js_show_stock').on('click', function() {
		$('.js_stock_modal').show();
		return false;
	});
	$('.js_show_klarna').on('click', function() {
		$('.js_klarna_modal').show();
		return false;
	});
	$('.js_show_shipping').on('click', function() {
		$('.js_shipping_modal').show();
		return false;
	});
	$('.js_show_returns').on('click', function() {
		$('.js_returns_modal').show();
		return false;
	});

	var slickOn = false;

	$('.js_show_gallery').on('click', function() {

		var index = $(this).attr('data-id');

		$('.productGallery').show();
		if (slickOn) {
			$('.productGalleryinner').slick('unslick');
		} else {
			slickOn = true;
		}
		$('.productGalleryinner').slick({
			prevArrow: '<div class="absolute left-8 top-1/2 -traslate-x-1/2 -translate-y-1/2 w-4 h-8 z-10 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481"><path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(835.81 961.09) rotate(180)"/></svg></div>',
			nextArrow: '<div class="absolute right-8 top-1/2 -traslate-x-1/2 -translate-y-1/2 w-4 h-8 z-10 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481"><path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)"/></svg></div>',
		});

		$('.productGalleryinner').slick('slickGoTo', (index - 1));

	});




	$('.mobileGallery').slick({
		dots: true
	});



	$('.js_select_attribute_size').on('click', function() {
		$('.js_select_attribute_size').not('.cursor-not-allowed').removeClass('bg-gray-100').removeClass('border-black');
		$('.showTick').removeClass('showTick');
		$(this).addClass('bg-gray-100').addClass('border-black').addClass('showTick');
	});

	$('.js_choose_colour').on('click', function() {
		$('.js_choose_colour').removeClass('border').removeClass('bg-gray-100');
		$(this).addClass('border').addClass('bg-gray-100');
	});

	$('.js_show_size_guide').click(function() {
		$('.js_size_modal').show();
	});

	$('.js_close_size_guide').click(function() {
		$('.js_size_modal, .js_stock_modal, .js_returns_modal, .js_shipping_modal, .js_klarna_modal').hide();
	});

	$('.js_load_tab_description').on('click', function() {
		$('.js_load_tab_materials').removeClass('bg-black text-white');
		$('.js_tab_materials').hide();
		$('.js_load_tab_reviews').removeClass('bg-black text-white');
		$('.js_tab_reviews').hide();
		$('.js_tab_description').show();
		$(this).addClass('bg-black text-white');
	});

	$('.js_load_tab_materials').on('click', function() {
		$('.js_load_tab_description').removeClass('bg-black text-white');
		$('.js_tab_description').hide();
		$('.js_load_tab_reviews').removeClass('bg-black text-white');
		$('.js_tab_reviews').hide();
		$('.js_tab_materials').show();
		$(this).addClass('bg-black text-white');
	});

	$('.js_load_tab_reviews').on('click', function() {
		$('.js_load_tab_materials').removeClass('bg-black text-white');
		$('.js_tab_materials').hide();
		$('.js_load_tab_description').removeClass('bg-black text-white');
		$('.js_tab_description').hide();
		$('.js_tab_reviews').show();
		$(this).addClass('bg-black text-white');
	});

	$("#button").hover(
		function() {
			$("#div1").animate({
				"top": "0px"
			}, 600);
			$("#div2").animate({
				"top": "100px"
			}, 600);
			$("#div4").animate({
				"top": "220px"
			}, 600);
			$("#div5").animate({
				"top": "300px"
			}, 600);
			$("#div6").animate({
				"top": "350px"
			}, 600);

			$(".frsttext").css({
				"display": "block",
				"top": "150px"
			}, 600);
			$(".secondtext").css({
				"display": "block",
				"top": "250px"
			});
			$(".thirdtext").css({
				"display": "block",
				"top": "350px"
			});
			$(".frthtext").css({
				"display": "block",
				"top": "450px"
			});
			$(".fifthtext").css({
				"display": "block",
				"top": "550px"
			});
			$(".sixthtext").css({
				"display": "block",
				"top": "650px"
			});
			$(".seventhtext").css({
				"display": "block",
				"top": "150px"
			});
			$(".eighthtext").css({
				"display": "block",
				"top": "250px"
			});
			$(".ninetext").css({
				"display": "block",
				"top": "350px"
			});
			$(".tenthtext").css({
				"display": "block",
				"top": "450px"
			});
			$(".elevntext").css({
				"display": "block",
				"top": "550px"
			});
			$(".tweltext").css({
				"display": "block",
				"top": "650px"
			});
			$("p").slideDown(600);
		},
		function() {
			$("#div1").animate({
				"top": "0%"
			}, 600);
			$("#div2").animate({
				"top": "0%"
			}, 600);
			$("#div3").animate({
				"top": "0%"
			}, 600);
			$("#div4").animate({
				"top": "0%"
			}, 600);
			$("#div5").animate({
				"top": "0%"
			}, 600);
			$("#div6").animate({
				"top": "0%"
			}, 600);

			$(".frsttext").css({
				"display": "none",
				"top": "0px"
			});
			$(".secondtext").css({
				"display": "none",
				"top": "0px"
			});
			$(".thirdtext").css({
				"display": "none",
				"top": "0px"
			});
			$(".frthtext").css({
				"display": "none",
				"top": "0px"
			});
			$(".fifthtext").css({
				"display": "none",
				"top": "0px"
			});
			$(".sixthtext").css({
				"display": "none",
				"top": "0px"
			});
			$(".seventhtext").css({
				"display": "none",
				"top": "0px"
			});
			$(".eighthtext").css({
				"display": "none",
				"top": "0px"
			});
			$(".ninetext").css({
				"display": "none",
				"top": "0px"
			});
			$(".tenthtext").css({
				"display": "none",
				"top": "0px"
			});
			$(".elevntext").css({
				"display": "none",
				"top": "0px"
			});
			$(".tweltext").css({
				"display": "none",
				"top": "0px"
			});

			//$( "p" ).slideUp(600);
		}
	);
</script>

<script>
	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
		document.getElementById("mySidenav").style.marginLeft = "50px";
		document.getElementById("main_products").style.marginLeft = "0px";
		document.getElementById("hide_icon").style.display = "none";

	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById("mySidenav").style.marginLeft = "0px";
		document.getElementById("main_products").style.marginLeft = "0";
		document.getElementById("hide_icon").style.display = "block";
	}
</script>

<script>
	// function myFunction(imgs) {
	//   var expandImg = document.getElementById("expandedImg");
	//   expandImg.src = imgs.src;
	//   expandImg.parentElement.style.display = "block";
	// }
	//  document.getElementById("defaultOpen").click();
</script>

<script>
	function openCity(evt, reViews) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(reViews).style.display = "block";
		evt.currentTarget.className += " active";
	}

	// Get the element with id="defaultOpen" and click on it
	//document.getElementById("defaultOpenre").click();
</script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/js/animation.js"></script>
<style>
	.backOrderNotice {
		display: none;
	}
</style>
</body>

</html>