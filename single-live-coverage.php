<?php
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    $postID = get_the_id();

    function buildPage($postID) {
        function doModuleLoop() {
            if (get_row_layout() == 'heroBanner') {
                get_template_part('Components/live-coverage/HeroBanner/HeroBanner');

            } else if (get_row_layout() == 'spacer') {
                get_template_part('Components/live-coverage/Spacer/Spacer');

            } else if (get_row_layout() == 'articleModules') {
                get_template_part('Components/live-coverage/ArticleModules/ArticleModules');

            } else if (get_row_layout() == 'carousel') {
                $carouselType = get_sub_field("carouselType");

                if ($carouselType == "default") {
                    get_template_part('Components/live-coverage/Carousel/Carousel');

                } else if ($carouselType == "scrollCarousel") {
                    get_template_part('Components/live-coverage/ScrollCarousel/ScrollCarousel');

                }

            } else if (get_row_layout() == 'uspCards') {
                get_template_part('Components/live-coverage/USPCards/USPCards');

            }
        }

        //default page builder
		if (have_rows('field_liveCoverage', $postID)) {
			while (have_rows('field_liveCoverage', $postID)) {
				the_row();

				doModuleLoop();
			}

            wp_reset_postdata();
		} 
	}

    get_header("live-coverage");
?>
    <main>
<?php
        buildPage($postID);

        get_template_part('Components/live-coverage/AuthorContainer/AuthorContainer');
        
        get_template_part('Components/live-coverage/RelatedArticles/RelatedArticles');

        get_template_part('Components/live-coverage/SubscriptionForm/SubscriptionForm');
?>
        <div class="geometricBackground">
            <div class="background" style="background-image: url(<?php echo home_url(); ?>/wp-content/themes/sokito/assets/images/subcriptionFormBackground.webp);"></div>
        </div>
    </main>
<?php
    get_footer("live-coverage");
?>

