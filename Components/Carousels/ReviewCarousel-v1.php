<?php
if (!defined('ABSPATH')) {
    exit;
}

$hidden = get_sub_field('hide');
$backgroundColor = get_sub_field('backgroundColor');
//$title = get_sub_field('title');
$maxPostCount = get_sub_field('maxPostCount');
$postTaxonomyObjects = get_sub_field('postTaxonomy');
$postTaxonomies = [];
$reviews = [];

foreach ($postTaxonomyObjects as $postTaxonomyObject) {
    array_push($postTaxonomies, $postTaxonomyObject->slug);
}

if (count($postTaxonomyObjects) == 0) {
    $postTaxonomies = ['all'];
}

$reviewArgs = array(
    'post_type' => "reviews",
    'posts_per_page' => $maxPostCount,
    'tax_query' => array(
        array(
            'taxonomy' => 'reviewerType',
            'field'    => 'slug',
            'terms'    => $postTaxonomies
        )
    )
);
$reviewQuery = new WP_Query($reviewArgs);

if ($reviewQuery->have_posts()) {
    while ($reviewQuery->have_posts()) {
        $review = [];
        $reviewQuery->the_post();
        $reviewID = get_the_ID();
        $reviewerTags = get_the_terms($post->ID, 'reviewerType');

        if (have_rows('field_reviews')) {
            while (have_rows('field_reviews')) {
                the_row();

                $reviewRating = get_sub_field("reviewRating");
                $reviewHeading = get_sub_field("reviewHeading");
                $reviewBody = get_sub_field("reviewBody");
                $reviewerName = get_sub_field("reviewerName");
                $reviewerClub = get_sub_field("reviewerClub");
            }
        }

        $review["ID"] = $reviewID;
        $review["reviewRating"] = $reviewRating;
        $review["reviewHeading"] = $reviewHeading;
        $review["reviewBody"] = $reviewBody;
        $review["reviewerName"] = $reviewerName;
        $review["reviewerClub"] = $reviewerClub;
        $review["reviewerTags"] = $reviewerTags;

        array_push($reviews, $review);
    }

    wp_reset_postdata();
}

if (!$hidden) {
?>
    <section class='ReviewCarousel v1' style="background-color: <?php echo $backgroundColor; ?>;">
        <div class="inner">
            <div class="Carousel reviews" style="background-color: <?php echo $backgroundColor; ?>;" data-autoShift="false">
                <div class="heading">
                    <h3>What our foot<span class="highlight"><span class="background lazyloaded" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/SOK_Underline_green.svg');" data-back="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/SOK_Underline_green.svg"></span>ballers</span> say</h3>
                </div>

                <button class="carouselButton left" onclick="handleCarouselLeftButtonClick()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                        <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                    </svg>
                </button>

                <div class="outer" ontouchstart="handleCarouselTouchStart()" ontouchend="handleCarouselTouchEnd()" ontouchcancel="handleCarouselTouchEnd()">
                    <div class="inner" style="grid-template-columns: repeat(<?php echo count($reviews); ?>, auto);">
                        <?php
                        $forCount = 0;

                        foreach ($reviews as $review) {
                        ?>
                            <div class="item <?php if ($forCount == 0) {
                                                    echo "active";
                                                } ?>">
                                <div class="inner">
                                    <div class="starContainer">
                                        <div class="backgroundStars">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)" />
                                            </svg>
                                        </div>

                                        <div class="foregroundStars" style="width: <?php echo (($review["reviewRating"] / 5) * 100); ?>%;">
                                            <div class="inner">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                    <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)" />
                                                </svg>

                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                    <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)" />
                                                </svg>

                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                    <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)" />
                                                </svg>

                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                    <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)" />
                                                </svg>

                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                    <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <h5><?php echo $review["reviewHeading"]; ?></h5>

                                    <p><?php echo $review["reviewBody"]; ?></p>

                                    <p class="author">
                                        <span><?php echo $review["reviewerName"]; ?></span>
                                        <?php
                                        for ($a = 0; $a < count($review["reviewerTags"]); $a++) {
                                            if ($review["reviewerTags"][$a]->slug == "verified-buyer") {
                                                echo "- <span>" . $review["reviewerTags"][$a]->name . "</span>";

                                                continue;
                                            }

                                            if ($review["reviewerTags"][$a]->slug == "footballer") {
                                                echo "- <span>" . $review["reviewerClub"] . "</span>";

                                                continue;
                                            }
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        <?php
                            $forCount++;
                        }
                        ?>
                    </div>
                </div>

                <button class="carouselButton right active" onclick="handleCarouselRightButtonClick()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                        <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                    </svg>
                </button>

                <div class="tabContainer" style="grid-template-columns: repeat(<?php echo count($reviews); ?>,auto);">
                    <?php
                    $forCount = 0;

                    foreach ($reviews as $review) {
                    ?>
                        <div data-id="<?php echo $forCount; ?>" class="naigationTab <?php if ($forCount == 0) {
                                                                                        echo "active";
                                                                                    } ?>" onclick="handleCarouselNaviagationTabClick()"></div>
                    <?php
                        $forCount++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- <style>
        .ReviewCarousel {
            position: relative;
            overflow: hidden;
        }

        .ReviewCarousel.v1 {
            padding: 100px 0px;
        }

        .ReviewCarousel.v1>.inner {
            width: 100%;
        }

        .ReviewCarousel.v1>.inner>.Carousel {
            max-width: 1320px;
            margin: 0 auto;
            position: relative;
            width: 100vw;
            padding: 0;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.heading {
            max-width: 1320px;
            margin: 0 auto;
            text-align: center;
            padding: 0 50px;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.heading>h3 {
            font-size: 50px;
            line-height: 1.1;
            letter-spacing: .01em;
            font-family: "Gza bold";
            font-weight: 700;
            color: #000;
            margin: 0;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.heading>h3>.highlight {
            position: relative;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.heading>h3>.highlight>.background {
            position: absolute;
            bottom: -10px;
            height: 20px;
            width: 100%;
            left: 0;
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.carouselButton {
            position: absolute;
            top: 50%;
            padding: 0;
            border: none;
            background: 0 0;
            appearance: none;
            z-index: 1;
            opacity: .4;
            transition: opacity .2s ease;
            filter: brightness(0);
        }

        .ReviewCarousel.v1>.inner>.Carousel>.carouselButton.active {
            opacity: 1;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.carouselButton.left {
            left: 0 !important;
            transform: translateY(-50%) rotate(180deg);
        }

        .ReviewCarousel.v1>.inner>.Carousel>.carouselButton.right {
            right: 0 !important;
            transform: translateY(-50%);
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer {
            overflow: hidden;
            padding: 20px;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner {
            grid-gap: 20px;
            display: grid;
            align-content: center;
            justify-content: start;
            align-items: center;
            max-width: 1320px;
            margin: 0 auto;
            transition: transform .2s ease;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item {
            width: calc(100vw - 40px);
            max-width: 1280px;
            background: 0 0;
            padding: 0;
            text-align: center;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item>.inner {
            max-width: 800px;
            margin: 0 auto;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item>.inner>.starContainer {
            position: relative;
            width: calc(5 * 19px);
            height: 30px;
            display: inline-block;
            vertical-align: middle;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item>.inner>.starContainer>.backgroundStars {
            width: 100%;
            opacity: .3;
            position: absolute;
            top: 0;
            left: 0;
            overflow: hidden !important;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item>.inner>.starContainer>.backgroundStars>svg {
            width: 15px;
            height: 15px;
            display: inline-block;
            vertical-align: middle;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item>.inner>.starContainer>.foregroundStars {
            position: absolute;
            top: 0;
            left: 0;
            overflow: hidden !important;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item>.inner>.starContainer>.foregroundStars>.inner {
            width: calc(5 * 19px);
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item>.inner>.starContainer>.foregroundStars>.inner>svg {
            width: 15px;
            height: 15px;
            display: inline-block;
            vertical-align: middle;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item>.inner>h5 {
            font-size: 28px;
            line-height: 1.1;
            letter-spacing: .01em;
            font-family: "Univers LT Roman";
            font-style: oblique;
            color: #48a18a;
            font-weight: 400;
            margin-bottom: 10px;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item>.inner>p {
            margin-bottom: 20px;
            font-size: 18px;
            line-height: 1.1;
            letter-spacing: .01em;
            font-family: "Univers LT Roman";
            color: #000;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item>.inner>p.author {
            font-size: 16px;
            line-height: 1.1;
            letter-spacing: .01em;
            font-family: "Univers LT Roman";
            color: #000;
            font-weight: 700;
            margin: 0;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.tabContainer {
            display: -ms-grid;
            display: grid;
            -ms-flex-line-pack: center;
            align-content: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            grid-gap: 10px;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.tabContainer>.naigationTab {
            width: 20px;
            height: 5px;
            background: #000;
            border-radius: 10px;
            opacity: .4;
            -webkit-transition: opacity .2s ease;
            -o-transition: opacity .2s ease;
            transition: opacity .2s ease;
            cursor: pointer;
        }

        .ReviewCarousel.v1>.inner>.Carousel>.tabContainer>.naigationTab.active {
            opacity: 1;
        }

        @media (max-width: 1180px) {
            .ReviewCarousel.v1>.inner>.Carousel>.heading {
                padding: 0 20px;
            }
        }

        @media (max-width: 680px) {
            .ReviewCarousel.v1>.inner>.Carousel>.heading>h3 {
                font-size: 44px;
            }

            .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item>.inner>h5 {
                font-size: 24px;
            }

            .ReviewCarousel.v1>.inner>.Carousel>.outer>.inner>.item>.inner>p {
                font-size: 15px;
            }
        }
    </style> -->

<?php
}
