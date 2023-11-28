<?php

/**
 * Template Name: Page Builder
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

$postID = get_the_ID();

// get_header("live-coverage");
get_header();
?>

<main id='pageBuilder'>
    <?php
    if (have_rows('field_pages', $postID)) {
        while (have_rows('field_pages', $postID)) {
            the_row();

            if (get_row_layout() == 'pageBuilderGroup') {
                if (have_rows('pageBuilder')) {
                    while (have_rows('pageBuilder')) {
                        the_row();

                        if (get_row_layout() == 'twoColumn') {
                            echo "<!-- twoColumn -->";
                            get_template_part('Components/TwoColumn/TwoColumn');
                        } else if (get_row_layout() == 'textBanner_v1') {
                            echo "<!-- textBanner_v1 -->";
                            get_template_part('Components/TextBanners/TextBanner_v1');
                        } else if (get_row_layout() == 'textBanner_v2') {
                            echo "<!-- textBanner_v2 -->";
                            get_template_part('Components/TextBanners/TextBanner_v2');
                        } else if (get_row_layout() == 'spacer') {
                            echo "<!-- spacer -->";
                            get_template_part('Components/Spacer/Spacer');
                        } else if (get_row_layout() == 'reviewCarousel_v1') {
                            echo "<!-- reviewCarousel_v1 -->";
                            get_template_part('Components/Carousels/ReviewCarousel-v1');
                        } else if (get_row_layout() == 'liveCoverageCarousel_v1') {
                            echo "<!-- liveCoverageCarousel_v1 -->";
                            get_template_part('Components/Carousels/LiveCoverageCarousel-v1');
                        } else if (get_row_layout() == 'imageCarousel_v1') {
                            echo "<!-- imageCarousel_v1 -->";
                            get_template_part('Components/Carousels/ImageCarousel-v1');
                        } else if (get_row_layout() == 'bootMaterials_v1') {
                            echo "<!-- bootMaterials_v1 -->";
                            get_template_part('Components/BootMaterials/BootMaterials-v1');
                        } else if (get_row_layout() == 'bootMaterials_v2') {
                            echo "<!-- bootMaterials_v2 -->";
                            get_template_part('Components/BootMaterials/BootMaterials-v2');
                        } else if (get_row_layout() == 'videoModule') {
                            echo "<!-- videoModule -->";
                            get_template_part('Components/VideoModule/VideoModule');
                        }
                    }
                }
            }
        }

        wp_reset_postdata();

        get_template_part("Components/live-coverage/SubscriptionForm/SubscriptionForm");
    ?>
        <div class="geometricBackground">
            <div class="background lazyloaded" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/subcriptionFormBackground.webp');" data-back="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/subcriptionFormBackground.webp"></div>
        </div>
</main>
<?php
        get_footer("live-coverage");
    }
