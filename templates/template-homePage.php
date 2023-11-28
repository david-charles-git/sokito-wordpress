<?php

/**
 * Template Name: Home Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

$postID = get_the_ID();

$instagramItems = [
    [
        "imageGallery" => [
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/319583357_1592220301213738_2540803935885127080_n.jpg"
            ]
        ],
        "content" => "First impressions are everything right? So we're super excited to see such a great review of Sokito from the team at FourFourTwo...
            .
            + Old school design makes them stand out ✅
            + Light and soft for good first touch and speed ✅
            + Leather and sturdy sole give durable feel ✅
            .
            Check out the full review from FourFourTwo via the link in our bio!⚽
            .
            @fourfourtwouk",
        "hashTags" => "#Sokito #ChangeTheGame #SustainableBoots #Review"
    ],
    [
        "imageGallery" => [
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-2.jpg"
            ],
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-10.jpg"
            ],
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-11.jpg"
            ],
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-3.jpg"
            ],
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-12.jpg"
            ]
        ],
        "content" => "There is an epidemic of wasted football boots🚨
            .
            Boots that won't biodegrade for thousands of years. You've probably heard it before, but it's true.
            .
            This terrified us. And rightly so. Which is why Sokito became the first company to figure out how to recycle football boots. We know it's not going to fix the whole problem, but it's a start💪
            .
            Find out more about how we did it with the 🔗 in our bio (plus, get money off when you recycle your boots with us).",
        "hashTags" => "#recycling #recycledshoes #sokito #changethegame #footballboots #sustainabilitygoals #ecofriendly"
    ],
    [
        "imageGallery" => [
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-4.jpg"
            ]
        ],
        "content" => "Green boots for a green player🟢",
        "hashTags" => "#newboots #customboots #bundesliga #germanfootball #greenshift #ecofriendly #sustainabilityinfootball"
    ],
    [
        "imageGallery" => [
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-13.jpg"
            ]
        ],
        "content" => "When footballers fly ✈️",
        "hashTags" => "#footballboots #newboots #recycled #footballlifestyle #goalcelebration #footballpitch"
    ],
    [
        "imageGallery" => [
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-14.jpg"
            ],
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-15.jpg"
            ],
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-5.jpg"
            ],
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-6.jpg"
            ],
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-16.jpg"
            ],
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-7.jpg"
            ],
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-8.jpg"
            ],
            [
                "source" => get_stylesheet_directory_uri() . "/assets/images/instagram-9.jpg"
            ]
        ],
        "content" => "It's been 6 months since Sokito officially launched.
            .
            So we thought it was about time we got the gang back together to talk about what we've achieved, and what our goals are going forward:
            .
            🌎 More research into the environmental impact of the football industry
            ✈️ Pushing for carbon offsetting in every transfer window
            🤫 Dropping a new campaign that will change the way you see Sokito
            .
            We're ready for the next 6.",
        "hashTags" => "#footballboots #ecofriendly #environmentalgoals #ecopromise #newboots #bootlaunch #changethegame"
    ]
];

if (have_rows('field_pages', $postID)) {
    while (have_rows('field_pages', $postID)) {
        the_row();

        if (get_row_layout() == 'homePageGroup') {
            //Business Reviews
            $businessReviews = [];
            $businessReviewsQuery = new WP_Query(array(
                'post_type' => "reviews",
                'posts_per_page' => 6,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'reviewerType',
                        'field'    => 'slug',
                        'terms'    => 'business'
                    )
                )
            ));

            if ($businessReviewsQuery->have_posts()) {
                while ($businessReviewsQuery->have_posts()) {
                    $review = [];
                    $businessReviewsQuery->the_post();
                    $reviewID = get_the_ID();

                    if (have_rows('field_reviews')) {
                        while (have_rows('field_reviews')) {
                            the_row();

                            $reviewHeading = get_sub_field('reviewHeading');
                            $featureImage_src = get_sub_field('featureImage_src');
                        }
                    }

                    $review["ID"] = $reviewID;
                    $review["reviewHeading"] = $reviewHeading;
                    $review["featureImage_src"] = $featureImage_src;

                    array_push($businessReviews, $review);
                }

                wp_reset_postdata();
            }

            //Good For Section Details
            $goodForSectionData = [
                [
                    "title" => "Devista",
                    "content" => "<span>Innovative technology, sustainable materials</span><br /><span>and a handcrafted finish, the Devista is created for</span><br /><span>maximum performance.</span>",
                    "subTitle" => "Good for grass",
                    "image" => "/assets/images/SOK_Boot-Images_Grass.webp"
                ],
                [
                    "title" => "Devista",
                    "content" => "<span>Boots that feel as light</span><br /><span>as a feather, no matter how</span><br /><span>heavy the pitch is.</span>",
                    "subTitle" => "Good for mud",
                    "image" => "/assets/images/SOK_Boot-Images_Mud.webp"
                ],
                [
                    "title" => "Devista",
                    "content" => "<span>Single use plastics are destroying our oceans. So we took</span><br /><span>them out of our line-up completely. And we've committed to</span><br /><span>using recycled materials as much as possible.</span>",
                    "subTitle" => "Good for our oceans",
                    "image" => "/assets/images/SOK_Boot-Images_Ocean.webp"
                ],
                [
                    "title" => "Devista",
                    "content" => "<span>Let's be the world's first 100% net-zero</span><br /><span>boot. We're not there yet, but we'll</span><br /><span>keep pressing. And pressing.</span>",
                    "subTitle" => "Good for our forests",
                    "image" => "/assets/images/SOK_Boot-Images_Forest.webp"
                ],
                [
                    "title" => "Devista",
                    "content" => "<span>The planet's in extra time.</span><br /><span>That's a fact. And it scared us so much we decided</span><br /><span>to change the game. Will you join us?</span>",
                    "subTitle" => "Good for our glaciers",
                    "image" => "/assets/images/SOK_Boot-Images_Glacier.webp"
                ]
            ];

            //Footballer Reviews
            $footballerReviews = [];
            $footballerReviewsQuery = new WP_Query(array(
                'post_type' => "reviews",
                'posts_per_page' => 10,
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'reviewerType',
                        'field'    => 'slug',
                        'terms'    => array('footballer', 'verified-buyer')
                    ),
                    array(
                        'taxonomy' => 'reviewerType',
                        'field'    => 'slug',
                        'terms'    => array('home - page - item')
                    )
                )
            ));

            if ($footballerReviewsQuery->have_posts()) {
                while ($footballerReviewsQuery->have_posts()) {
                    $review = [];
                    $footballerReviewsQuery->the_post();
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

                    array_push($footballerReviews, $review);
                }

                wp_reset_postdata();
            }

            //Live Coverage Articles
            $liveCoverageArticles = [];
            $liveCoverageArticlesQuery = new WP_Query(array(
                'post_type' => "live-coverage",
                'posts_per_page' => 6
            ));

            if ($liveCoverageArticlesQuery->have_posts()) {
                while ($liveCoverageArticlesQuery->have_posts()) {
                    $article = [];
                    $liveCoverageArticlesQuery->the_post();
                    $articleID = get_the_ID();
                    $articleThumbnail = get_the_post_thumbnail_url();
                    $articleTitle = get_the_title();
                    $articleTypes = get_the_terms($articleID, "articleType");
                    $articlePermalink = get_the_permalink();
                    $articleReadingTime = "";

                    if (have_rows('field_liveCoverage_details')) {
                        while (have_rows('field_liveCoverage_details')) {
                            the_row();

                            $articleReadingTime = get_sub_field('readingTime');
                        }
                    }

                    $article["ID"] = $articleID;
                    $article["thumbnail"] = $articleThumbnail;
                    $article["title"] = $articleTitle;
                    $article["types"] = $articleTypes;
                    $article["permalink"] = $articlePermalink;
                    $article["readTime"] = $articleReadingTime;

                    array_push($liveCoverageArticles, $article);
                }

                wp_reset_postdata();
            }
        }
    }

    wp_reset_postdata();

    get_header("live-coverage");
?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . "/css/dist/homePageStyles.min.css"; ?>" />

    <main id="liveCoverageHub">
        <!-- Hero Banner -->
        <section id="liveCoverageHeroBanner" class="HeroBanner hasEnterExit hasParallax">
            <div class="background" style="background-image: url('<?php echo get_stylesheet_directory_uri() . "/assets/images/liveCoveragesArticles-backgroundIamge.webp"; ?>');"></div>

            <div class="background" style="opacity: 1;background-image: linear-gradient(0deg,rgba(0,0,0,1),rgba(0,0,0,0),rgba(0,0,0,0),rgba(0,0,0,0),rgba(0,0,0,1));"></div>

            <div class="imageSwitchContainer images enterExitItem" data-enter-exit-type="enter" data-enter-exit-offset-y="300" data-enter-exit-delay="200">
                <div class="parallaxItem" data-parallax-rate-y="0.4">
                    <div class="images">
                        <div class="image active" data-id="0">
                            <img src="<?php echo get_stylesheet_directory_uri() . "/assets/images/SOK_Home_Header_black.webp"; ?>" loading="lazy" />
                        </div>

                        <div class="image" data-id="1">
                            <img src="<?php echo get_stylesheet_directory_uri() . "/assets/images/SOK_Home_Header_white.webp"; ?>" loading="lazy" />
                        </div>
                    </div>

                    <div class="gradient"></div>
                </div>
            </div>

            <div class="outer">
                <div class="inner enterExitItem" data-enter-exit-type="enter" data-enter-exit-offset-y="500" data-enter-exit-delay="0">
                    <div class="title fadeInOutItem" data-fade-in-out-threshold="-50">
                        <h1 class="parallaxItem" data-parallax-rate-y="-0.5">
                            <span>The world’s</span>
                            <br />
                            <span>most eco-friendly</span>
                            <br />
                            <span>
                                <span data-name="football boot" class="highlight">
                                    <div class="background" style="background-image: url('<?php echo get_stylesheet_directory_uri() . "/assets/images/underlineOrange.svg"; ?>');"></div>
                                    football boot
                                </span> brand.
                            </span>
                        </h1>
                    </div>

                    <div class="content parallaxItem" data-parallax-rate-y="-0.5">
                        <h2><span>12.5 million</span> boots are sent to landfill every year*.</h2>
                        <?php
                        $readMoreArgs = array(
                            'content' => "Let that sink in. That’s enough to fill over 18 thousand football pitches. The beautiful game has taken a pretty ugly turn.<br /><br /> That’s why we created a boot that has maximum impact on the pitch, not the planet. Handcrafted in Europe from durable, recycled and sustainable materials, the Devista is lightweight, comfortable and designed for ultimate performance. So you can feel good in your boots, and you can feel good about your boots. <a href='https://www.sokito.com/sustainability/'>The mission ></a>",
                            'readMoreDesktop' => 150,
                            'readMoreTablet' => 100,
                            'readMoreMobile' => 50,
                        );

                        doReadMore($readMoreArgs); //found in functions

                        ?>
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="imageSwitchContainer switches enterExitItem" data-enter-exit-type="enter" data-enter-exit-offset-y="300" data-enter-exit-delay="200">
                <div class="parallaxItem" data-parallax-rate-y="0.4">
                    <div class="outer">
                        <div class="inner">
                            <div class="switchButtons">
                                <div class="inner">
                                    <button class="switchButton active" data-id="0" onclick="handleImageSwitchContainerImageSwitch()">
                                        <div style="background-color: #000;"></div>
                                    </button>

                                    <button class="switchButton" data-id="1" onclick="handleImageSwitchContainerImageSwitch()">
                                        <div style="background-color: #FFF;"></div>
                                    </button>
                                </div>
                            </div>

                            <div class="shopButtons">
                                <button class="roundedButton">
                                    <a href="https://www.sokito.com/product/devista-fg-clearly-black/">Shop Devista</a>
                                </button>

                                <button class="roundedButton light">
                                    <a href="https://www.sokito.com/product/devista-vegan-fg-just-white/">Shop Devista Vegan</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Business Reviews Section -->
        <section class="Carousel businessReviews" style="background-color: #000;" data-autoShift="false">
            <div class="background" style="background-image: url('<?php echo get_stylesheet_directory_uri() . "/assets/images/liveCoveragesArticles-backgroundIamge.webp"; ?>');"></div>

            <div class="background" style="opacity: 1;background-image: linear-gradient(0deg,rgba(0,0,0,1),rgba(0,0,0,0),rgba(0,0,0,0),rgba(0,0,0,0),rgba(0,0,0,1));"></div>

            <div class="quotationMark">
                <span>"</span>
            </div>

            <div class="outer" ontouchstart="handleCarouselTouchStart()" ontouchend="handleCarouselTouchEnd()" ontouchcancel="handleCarouselTouchEnd()">
                <div class="inner" style="grid-template-columns: repeat(<?php echo count($businessReviews); ?>, auto);">
                    <?php
                    $forCount = 0;

                    foreach ($businessReviews as $review) {
                    ?>
                        <div class="item <?php if ($forCount == 0) {
                                                echo "active";
                                            } ?>">
                            <h4><?php echo $review["reviewHeading"]; ?></h4>
                        </div>
                    <?php
                        $forCount++;
                    }
                    ?>
                </div>
            </div>

            <div class="tabContainer">
                <div class="inner" style="grid-template-columns: repeat(<?php echo count($businessReviews); ?>,auto);">
                    <?php
                    $forCount = 0;

                    foreach ($businessReviews as $review) {
                    ?>
                        <div data-id="<?php echo $forCount; ?>" class="naigationTab <?php if ($forCount == 0) {
                                                                                        echo "active";
                                                                                    } ?>" onclick="handleCarouselNaviagationTabClick()" style="background-image:url('<?php echo $review["featureImage_src"]; ?>');"></div>
                    <?php
                        $forCount++;
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Good For Section -->
        <section id="goodForSection">
            <div class="background"></div>

            <div class="outer">
                <div class="inner" style="height: calc(<?php echo count($goodForSectionData) + 2; ?> * 100vh);">
                    <div class="items">
                        <?php
                        $forCount = 0;

                        foreach ($goodForSectionData as $data) {
                        ?>
                            <div class="item <?php if ($forCount == 0) {
                                                    echo "active";
                                                } ?>">
                                <div class="background" style="background-image:url('<?php echo get_stylesheet_directory_uri() . $data["image"]; ?>');"></div>

                                <div class="content">
                                    <div class="inner">
                                        <h4><?php echo $data["title"]; ?></h4>

                                        <p><?php echo $data["content"]; ?></p>

                                        <h3><?php echo $data["subTitle"]; ?></h3>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $forCount++;
                        }
                        ?>
                        <div class="item">
                            <div class="background" style="background-image:url('<?php echo get_stylesheet_directory_uri() . $goodForSectionData[count($goodForSectionData) - 1]["image"]; ?>');"></div>

                            <div class="content">
                                <div class="inner">
                                    <div class="USPContainer">
                                        <div class="outer">
                                            <div class="inner">
                                                <div class="usp">
                                                    <h5><span>2.5</span> Bottles in Every Boot</h5>

                                                    <p>We've subbed out single-use plastic completely. In comes recycled bottles and rubber.</p>
                                                </div>

                                                <div class="usp">
                                                    <h5>13 <span>Eco Components</span></h5>

                                                    <p>Including recycled carpet, which means that scratchy thing in your nan's house is making a comeback.</p>
                                                </div>

                                                <div class="usp">
                                                    <h5><span>56% </span> Eco Materials</h5>

                                                    <p>A minimum for every boot, but we're constantly expanding the team.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs">
                                            <div class="tab active" data-id="0" onclick="handleUSPContainerTabClick()"></div>

                                            <div class="tab" data-id="1" onclick="handleUSPContainerTabClick()"></div>

                                            <div class="tab" data-id="2" onclick="handleUSPContainerTabClick()"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overlay">
                        <div class="shopButtons">
                            <button class="roundedButton">
                                <a href="https://www.sokito.com/product/devista-fg-clearly-black/">Shop Devista</a>
                            </button>

                            <button class="roundedButton light">
                                <a href="https://www.sokito.com/product/devista-vegan-fg-just-white/">Shop Devista Vegan</a>
                            </button>
                        </div>

                        <div class="ctaButtons">
                            <button class="roundedButton">
                                <a href="https://www.sokito.com/hand-made/">Find out more</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="Spacer" style="background-color: #EBEBEB;">
            <div class="desktop" style="height: 50px"></div>
            <!-- <div class="laptop" style="height: <?php echo $height_laptop; ?>px"></div>
                <div class="tablet" style="height: <?php echo $height_tablet; ?>px"></div> -->
            <div class="mobile" style="height: 30px"></div>
        </div>

        <!-- Footballer Review Section -->
        <section id="footballerReviewSection" style="background-color: #EBEBEB;">
            <div class="inner">
                <div class="Carousel footballerReviews" style="background-color: #EBEBEB;" data-autoShift="false">
                    <div class="heading">
                        <h3>What our foot<span class="highlight"><span class="background" style="background-image: url('<?php echo get_stylesheet_directory_uri() . "/assets/images/SOK_Underline_green.svg;"; ?>');"></span>ballers</span> say</h3>
                    </div>

                    <button class="carouselButton left" onclick="handleCarouselLeftButtonClick()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                            <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                        </svg>
                    </button>

                    <div class="outer" ontouchstart="handleCarouselTouchStart()" ontouchend="handleCarouselTouchEnd()" ontouchcancel="handleCarouselTouchEnd()">
                        <div class="inner" style="grid-template-columns: repeat(<?php echo count($footballerReviews); ?>, auto);">
                            <?php
                            $forCount = 0;

                            foreach ($footballerReviews as $review) {
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

                    <div class="tabContainer" style="grid-template-columns: repeat(<?php echo count($footballerReviews); ?>,auto);">
                        <?php
                        $forCount = 0;

                        foreach ($footballerReviews as $review) {
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

        <div class="Spacer" style="background-color: #EBEBEB;">
            <div class="desktop" style="height: 50px"></div>
            <!-- <div class="laptop" style="height: <?php echo $height_laptop; ?>px"></div>
                <div class="tablet" style="height: <?php echo $height_tablet; ?>px"></div> -->
            <div class="mobile" style="height: 30px"></div>
        </div>

        <!-- Recycle Scheme Section -->
        <section class="reycleSchemeBanner hasEnterExit">
            <div class="background"></div>

            <div class="outer">
                <div class="inner">
                    <div class="background" style="background-image: url('<?php echo get_stylesheet_directory_uri() . "/assets/images/recycleSchemeBackground.webp"; ?>');"></div>

                    <div class="content">
                        <h3 class="enterExitItem" data-enter-exit-type="both" data-enter-exit-offset-y="200" data-enter-exit-delay="0">
                            <span>The world’s first</span>
                            <br />
                            <span>boot recycling</span>
                            <br />
                            <span>scheme</span>
                        </h3>
                    </div>

                    <button class="roundedButton light">
                        <a href="https://www.sokito.com/recycle/">Find out more</a>
                    </button>
                </div>
            </div>
        </section>

        <div class="Spacer" style="background-color: #fff; position: relative; z-index: 2;">
            <div class="desktop" style="height: 50px"></div>
            <!-- <div class="laptop" style="height: <?php echo $height_laptop; ?>px"></div>
                <div class="tablet" style="height: <?php echo $height_tablet; ?>px"></div> -->
            <div class="mobile" style="height: 30px"></div>
        </div>

        <!-- Live Coevrage Articles -->
        <section class="ScrollCarousel liveCoverageArticles">
            <div class="heading">
                <h3>Live Coverage</h3>
            </div>

            <button class="ScrollCarouselButton left" onclick="handleScrollCarouselLeftButtonClick()">
                <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                    <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                </svg>
            </button>

            <div class="outer">
                <div class="inner" style="grid-template-columns: repeat(<?php echo count($liveCoverageArticles); ?>, auto);">
                    <?php
                    $forCount = 0;

                    foreach ($liveCoverageArticles as $article) {
                    ?>
                        <div class="item <?php if ($forCount == 0) {
                                                echo "active";
                                            } ?>">
                            <div class="article">
                                <a href="<?php echo $article["permalink"]; ?>"></a>

                                <div class="inner">
                                    <div class="background" style="background-image: url(<?php echo $article["thumbnail"]; ?>);"></div>

                                    <h6><?php echo $article["title"]; ?></h6>

                                    <div class="taxonomyContainer">
                                        <?php
                                        foreach ($article["types"] as $type) {
                                            $name = $type->name;
                                            $slug = $type->slug;
                                            $permalink = get_the_permalink($postID) . $slug . "/";
                                        ?>
                                            <div class="taxonomy" data-slug="<?php echo $slug; ?>">
                                                <!-- <a href="<?php echo $permalink; ?>"><?php echo $name; ?></a> -->
                                                <p><?php echo $name; ?></p>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="readTimeContainer">
                                        <p><?php echo $article["readTime"]; ?> min read</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $forCount++;
                    }
                    ?>
                </div>
            </div>

            <button class="ScrollCarouselButton right active" onclick="handleScrollCarouselRightButtonClick()">
                <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                    <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                </svg>
            </button>

            <div class="viewAllButton">
                <div class="inner">
                    <button class="roundedButton light">
                        <a href="<?php echo home_url() . "/live-coverage/"; ?>">View more</a>
                    </button>
                </div>
            </div>
        </section>

        <div class="Spacer">
            <div class="desktop" style="height: 150px"></div>
            <!-- <div class="laptop" style="height: <?php echo $height_laptop; ?>px"></div>
                <div class="tablet" style="height: <?php echo $height_tablet; ?>px"></div> -->
            <div class="mobile" style="height: 30px"></div>
        </div>

        <!-- Instagram Section -->
        <section class="ScrollCarousel instergramArticles">
            <div class="heading">
                <h3>
                    Follow us

                    <svg xmlns="http://www.w3.org/2000/svg" id="instagram" width="38.574" height="38.15" viewBox="0 0 38.574 38.15">
                        <path d="M17.779,38.15a34.964,34.964,0,0,1-8.05-.784,13.66,13.66,0,0,1-6.461-3.237A11.455,11.455,0,0,1,.081,27.8c.045-1.656.01-3.5-.027-5.445v0c-.047-2.463-.1-5.01.007-7.546.049-.715.089-1.414.128-2.089V12.7l0-.082A25.275,25.275,0,0,1,1.752,5.155,11.036,11.036,0,0,1,7.715.918,29.826,29.826,0,0,1,15.455.04C16.563.013,17.711,0,18.963,0c2.2,0,4.437.041,6.6.081h0c1.59.029,3.235.06,4.851.073,3.773.8,6.164,3.264,7.309,7.532.983,3.665.882,7.949.793,11.729l-.005.222c-.016.611-.022,1.228-.029,1.882-.033,3.084-.071,6.579-1.17,9.372a9.156,9.156,0,0,1-3.478,4.467,22.735,22.735,0,0,1-5.025,2.288l-.025.009c-1.114.044-2.3.117-3.565.194l-.044,0C22.786,38,20.31,38.15,17.779,38.15ZM18.1,2.065A27.455,27.455,0,0,0,8.659,3.381C5.72,4.5,4.216,6.33,4.191,8.824a.638.638,0,0,0-.1.266c-.953,8.386-.8,15,.441,19.669a6.131,6.131,0,0,0,2.7,3.825,11.675,11.675,0,0,0,4.629,1.443,68.225,68.225,0,0,0,9.517.756,27.934,27.934,0,0,0,8.706-1.146A6.19,6.19,0,0,0,33.913,30.5a12.752,12.752,0,0,0,.974-5.016c.041-1.029.14-2.229.244-3.5.3-3.675.679-8.248-.086-11.978a10.272,10.272,0,0,0-2.151-4.8A7.315,7.315,0,0,0,28.133,2.8,79.705,79.705,0,0,0,18.1,2.065Z" />
                        <path d="M157.483,63.98c.021-2.45-3.034-3.228-4.674-1.722a2.441,2.441,0,0,0-.676,1.712,3.689,3.689,0,0,0,1.363,2.224C155.085,67.311,157.463,65.825,157.483,63.98Z" transform="translate(-125.22 -55.761)" />
                        <path d="M10.09,19.651a11.385,11.385,0,0,1-8.283-3.858.732.732,0,0,0-.338-.236A11.465,11.465,0,0,1,.024,9.168,9.784,9.784,0,0,1,2.392,3.217,9.6,9.6,0,0,1,5.8.8,10.161,10.161,0,0,1,9.778,0a9.849,9.849,0,0,1,8.284,4.344,9.661,9.661,0,0,1,1.43,7.041A10.38,10.38,0,0,1,15.849,17.6,9,9,0,0,1,10.09,19.651ZM9.383,3.49a4.751,4.751,0,0,0-3.22,1.315A4.979,4.979,0,0,0,4.048,7.814a6.424,6.424,0,0,0,.045,3.808,7.607,7.607,0,0,0,2.543,3.416,6.59,6.59,0,0,0,3.943,1.441,5.054,5.054,0,0,0,2.676-.758,5.462,5.462,0,0,0,2.463-3,6.223,6.223,0,0,0,0-3.6,8.556,8.556,0,0,0-2.424-3.927,5.9,5.9,0,0,0-3.908-1.7Z" transform="translate(9.661 8.64)" />
                    </svg>
                </h3>
            </div>

            <button class="ScrollCarouselButton left" onclick="handleScrollCarouselLeftButtonClick()">
                <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                    <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                </svg>
            </button>

            <div class="outer">
                <div class="inner" style="grid-template-columns: repeat(<?php echo count($instagramItems); ?>, auto);">
                    <?php
                    $forCount = 0;

                    foreach ($instagramItems as $item) {
                    ?>
                        <div class="item <?php if ($forCount == 0) {
                                                echo "active";
                                            } ?>">
                            <div class="article" onclick="handleOpenInstgramPopUp()" data-id="<?php echo $forCount; ?>">
                                <div class="inner">
                                    <div class="background" style="background-image: url(<?php echo $item["imageGallery"][0]["source"]; ?>);"></div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $forCount++;
                    }
                    ?>
                </div>
            </div>

            <button class="ScrollCarouselButton right active" onclick="handleScrollCarouselRightButtonClick()">
                <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                    <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                </svg>
            </button>

            <div class="viewAllButton">
                <div class="inner">
                    <button class="roundedButton light">
                        <a href="https://instagram.com/officialsokito?igshid=YmMyMTA2M2Y=">Follow us</a>
                    </button>
                </div>
            </div>
        </section>

        <section id="instgramPopUps">
            <?php
            $forCount = 0;

            foreach ($instagramItems as $item) {
            ?>
                <div class="popUp" data-id="<?php echo $forCount; ?>">
                    <div class="background" onclick="handleCloseInstgramPopUp()"></div>

                    <div class="outer">
                        <div class="closeButton tablet">
                            <button onclick="handleCloseInstgramPopUp()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17.074" height="17.221" viewBox="0 0 17.074 17.221">
                                    <g id="X" transform="translate(-2.515 5.235)">
                                        <path id="minus_icn" d="M0,.5H22" transform="translate(2.868 10.925) rotate(-45)" fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="2" />
                                        <path id="minus_icn-2" data-name="minus_icn" d="M0,.5H22" transform="translate(3.679 -4.882) rotate(45)" fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="2" />
                                    </g>
                                </svg>
                            </button>
                        </div>

                        <div class="inner">
                            <div class="left">
                                <div class="Carousel" style="background-color: #000;" data-autoShift="false" data-gap="0">
                                    <div class="outer" ontouchstart="handleCarouselTouchStart()" ontouchend="handleCarouselTouchEnd()" ontouchcancel="handleCarouselTouchEnd()">
                                        <div class="inner" style="grid-template-columns: repeat(<?php echo count($item["imageGallery"]); ?>, 100%);">
                                            <?php
                                            $forCount_2 = 0;

                                            foreach ($item["imageGallery"] as $image) {
                                            ?>
                                                <div class="item <?php if ($forCount_2 == 0) {
                                                                        echo "active";
                                                                    } ?>">
                                                    <div class="background" style="background-image: url(<?php echo $image["source"]; ?>)"></div>
                                                </div>
                                            <?php
                                                $forCount_2++;
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="tabContainer">
                                        <div class="inner" style="grid-template-columns: repeat(<?php echo count($item["imageGallery"]); ?>,auto);">
                                            <?php
                                            $forCount_2 = 0;

                                            foreach ($item["imageGallery"] as $image) {
                                            ?>
                                                <div data-id="<?php echo $forCount_2; ?>" class="naigationTab <?php if ($forCount_2 == 0) {
                                                                                                                    echo "active";
                                                                                                                } ?>" onclick="handleCarouselNaviagationTabClick()"></div>
                                            <?php
                                                $forCount_2++;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="right">
                                <div class="closeButton">
                                    <button onclick="handleCloseInstgramPopUp()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.074" height="17.221" viewBox="0 0 17.074 17.221">
                                            <g id="Burger" transform="translate(-2.515 5.235)">
                                                <path id="minus_icn" d="M0,.5H22" transform="translate(2.868 10.925) rotate(-45)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="2" />
                                                <path id="minus_icn-2" data-name="minus_icn" d="M0,.5H22" transform="translate(3.679 -4.882) rotate(45)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                    </button>
                                </div>

                                <div class="head">
                                    <a href="https://www.instagram.com/officialsokito/">
                                        <div class="logo" style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/assets/images/soktoInstagramLogo.jpg"; ?>);"></div>

                                        <p>officialsokito</p>
                                    </a>
                                </div>

                                <div class="body">
                                    <a href="https://www.instagram.com/officialsokito/">officialsokito</a>

                                    <p><?php echo $item["content"]; ?></p>

                                    <a class="hashTag" href=""><?php echo $item["hashTags"]; ?></a>
                                </div>

                                <div class="foot">
                                    <button class="roundedButton light">
                                        <a href="https://instagram.com/officialsokito?igshid=YmMyMTA2M2Y=">Follow us</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $forCount++;
            }
            ?>
        </section>

        <!-- Subscription Form -->
        <?php
        get_template_part("Components/live-coverage/SubscriptionForm/SubscriptionForm");
        ?>
        <div class="geometricBackground">
            <div class="background" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/subcriptionFormBackground.webp);"></div>
        </div>
    </main>

    <script src="<?php echo get_stylesheet_directory_uri() . "/js/dist/homePageScripts.min.js"; ?>"></script>
    <script>
        function simulateScrollEvent() {
            window.scrollTo({
                top: window.scrollY + 1,
                left: 0,
                behavior: "smooth"
            });
        }

        window.addEventListener("load", function() {
            setTimeout(function() {
                simulateScrollEvent();
            }, 100);
        });
    </script>
<?php

    get_footer("live-coverage");
}
