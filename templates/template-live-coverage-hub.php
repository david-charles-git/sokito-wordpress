<?php

/**
 * Template Name: Live Coverage - Hub
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

$postID = get_the_ID();

if (have_rows('field_pages', $postID)) {
    $articleType = "live-coverage";
    $articleIgnorePosts = [];
    $articles = [];
    $pageArticleCount = 0;
    $initalArticleCount = 0;
    $currentArticleCount = 0;
    $totalArticleCount = wp_count_posts("live-coverage")->publish;

    while (have_rows('field_pages', $postID)) {
        the_row();

        if (get_row_layout() == 'liveCoverageHubGroup') {
            //Hero Banner Details
            $heroBanner_heading = get_sub_field("heroBanner_heading");
            $heroBanner_backgroundImage = get_sub_field("heroBanner_backgroundImage");
            $heroBanner_mainImage = get_sub_field("heroBanner_mainImage");
            $heroBanner_postID = get_sub_field("heroBanner_postID");

            if ($heroBanner_postID) {
                $pageArticleCount++;
                array_push($articleIgnorePosts, $heroBanner_postID);
            }

            //Taxonomy Navigation Details
            $taxonomyNavigation_backgroundImage = get_sub_field("taxonomyNavigation_backgroundImage");
            $taxonomyNavigation_taxonomy = get_sub_field("taxonomyNavigation_taxonomy");
            $taxonomyNavigation_taxonomyTerms = get_terms($taxonomyNavigation_taxonomy);

            //Trending Article Details
            $trendingArticle_postID = get_sub_field("trendingArticle_postID");

            if ($trendingArticle_postID) {
                $pageArticleCount++;
                array_push($articleIgnorePosts, $trendingArticle_postID);
            }

            //Featured Articles Details
            $featuredArticles = [];
            $featuredArticles_maxPosts = get_sub_field("featuredArticles_maxPosts");
            $featuredArticles_count = 0;
            $initalArticleCount += $featuredArticles_maxPosts;

            //Related Articles Details
            $realtedArticles = [];
            $realtedArticles_maxPosts = get_sub_field("relatedArticles_maxPosts");
            $realtedArticles_count = 0;
            $initalArticleCount += $realtedArticles_maxPosts;

            //More Artcles Details
            $moreArticles = [];
            $moreArticles_intialPosts = get_sub_field("moreArticles_initialPosts");
            $moreArticles_postsPerPage = get_sub_field("moreArticles_postsPerPage");
            $moreArticles_count = 0;
            $initalArticleCount += $moreArticles_intialPosts;

            //Article Query
            $articleArgs = array(
                'post_type' => $articleType,
                'posts_per_page' => $initalArticleCount,
                'post__not_in' => $articleIgnorePosts
            );
            $articleQuery = new WP_Query($articleArgs);

            if ($articleQuery->have_posts()) {
                while ($articleQuery->have_posts()) {
                    $article = [];
                    $articleQuery->the_post();
                    $articleID = get_the_ID();
                    $articleThumbnail = get_the_post_thumbnail_url();
                    $articleTitle = get_the_title();
                    $articleTypes = get_the_terms($articleID, "articleType");
                    $articlePermalink = get_the_permalink();
                    $articleReadingTime = "";
                    $articleIsFeatured = false;

                    if (have_rows('field_liveCoverage_details')) {
                        while (have_rows('field_liveCoverage_details')) {
                            the_row();

                            $articleReadingTime = get_sub_field('readingTime');
                            $articleIsFeatured = get_sub_field('isFeatured');
                        }
                    }

                    $article["ID"] = $articleID;
                    $article["thumbnail"] = $articleThumbnail;
                    $article["title"] = $articleTitle;
                    $article["types"] = $articleTypes;
                    $article["permalink"] = $articlePermalink;
                    $article["readTime"] = $articleReadingTime;
                    $article["isFeatured"] = $articleIsFeatured;

                    array_push($articles, $article);
                }
            }

            for ($a = 0; $a < count($articles); $a++) {
                if ($articles[$a]["isFeatured"] && $featuredArticles_count < $featuredArticles_maxPosts) {
                    array_push($featuredArticles, $articles[$a]);

                    $featuredArticles_count++;
                } else if ($realtedArticles_count < $realtedArticles_maxPosts) {
                    array_push($realtedArticles, $articles[$a]);

                    $realtedArticles_count++;
                } else {
                    array_push($moreArticles, $articles[$a]);

                    $moreArticles_count++;
                }
            }

            $pageArticleCount += $featuredArticles_count;
            $pageArticleCount += $realtedArticles_count;
            $pageArticleCount += $moreArticles_count;
            $currentArticleCount += $featuredArticles_count;
            $currentArticleCount += $realtedArticles_count;
            $currentArticleCount += $moreArticles_count;
        }
    }

    wp_reset_postdata();

    get_header("live-coverage");
?>
    <style>
        /* Enter Exit */
        .hasEnterExit {
            padding: 20px 0;
        }

        .hasEnterExit .enterExitSet {
            -webkit-transition: opacity 2500ms ease-in-out, -webkit-transform 2500ms ease-in-out;
            transition: opacity 2500ms ease-in-out, -webkit-transform 2500ms ease-in-out;
            -o-transition: transform 2500ms ease-in-out, opacity 2500ms ease-in-out;
            transition: transform 2500ms ease-in-out, opacity 2500ms ease-in-out;
            transition: transform 2500ms ease-in-out, opacity 2500ms ease-in-out, -webkit-transform 2500ms ease-in-out;
        }

        .hasEnterExit .enterExitItem {
            opacity: 0;
        }

        .hasEnterExit .enterExitItem.entered {
            opacity: 1;
            -webkit-transform: translate(0, 0) !important;
            -ms-transform: translate(0, 0) !important;
            transform: translate(0, 0) !important;
        }

        /* Parallax */
        .hasParallax {
            overflow: visible;
        }

        .hasParallax .parallaxSet {
            -webkit-transition: opacity 1000ms ease-in-out, -webkit-transform 50ms ease-in-out;
            transition: opacity 1000ms ease-in-out, -webkit-transform 50ms ease-in-out;
            -o-transition: transform 50ms ease-in-out, opacity 1000ms ease-in-out;
            transition: transform 50ms ease-in-out, opacity 1000ms ease-in-out;
            transition: transform 50ms ease-in-out, opacity 1000ms ease-in-out, -webkit-transform 50ms ease-in-out;
        }

        .hasParallax .parallaxItem {
            opacity: 0;
        }

        .hasParallax .parallaxItem.parallaxSet {
            opacity: 1;
        }
    </style>

    <script>
        /* Element Functions */
        var getElementCoordinates = function(element) {
            var elementTop = window.scrollY + element.getBoundingClientRect().top; //px
            var elementBottom = elementTop + element.clientHeight; //px
            var elementLeft = window.scrollX + element.getBoundingClientRect().left; //px
            var elementRight = elementLeft + element.clientWidth; //px
            var elementCoordinates = {
                top: elementTop,
                left: elementLeft,
                bottom: elementBottom,
                right: elementRight
            };
            return elementCoordinates;
        };
        var getElementIsAboveFold = function(element) {
            var elementCoordinates = getElementCoordinates(element);
            if (elementCoordinates.top > window.innerHeight) {
                return false;
            }
            return true;
        };
        var getElementIsInViewportX = function(element) {
            var elementCoordinates = getElementCoordinates(element);
            if (elementCoordinates.left > window.scrollX + window.innerWidth || elementCoordinates.right < window.scrollX) {
                return false;
            }
            return true;
        };
        var getElementIsInViewportY = function(element) {
            var elementCoordinates = getElementCoordinates(element);
            if (elementCoordinates.top > window.scrollY + window.innerHeight || elementCoordinates.bottom < window.scrollY) {
                return false;
            }
            return true;
        };
        var getElementIsInViewport = function(element) {
            if (!getElementIsInViewportX(element) || !getElementIsInViewportY(element)) {
                return false;
            }
            return true;
        };
        var getElementRelativeScrollY = function(element) {
            if (!element) {
                return 0;
            }
            var elementCoordinates = getElementCoordinates(element);
            var elementIsAboveFold = getElementIsAboveFold(element);
            var elementRelativeScrollY = window.scrollY + window.innerHeight - elementCoordinates.top; //px
            if (elementIsAboveFold) {
                elementRelativeScrollY = window.scrollY;
            }
            if (window.scrollY + window.innerHeight - elementCoordinates.top < 0) {
                elementRelativeScrollY = 0;
            }
            return elementRelativeScrollY;
        };
        var setElementEnterExit = function(element) {
            var enterExitType = element.getAttribute("data-enter-exit-type") || "";
            if (enterExitType == "enter") {
                if (getElementIsInViewportY(element) && !element.classList.contains("entered")) {
                    element.classList.add("entered");
                }
                return;
            }
            if (enterExitType == "exit") {
                if (!getElementIsInViewportY(element) && element.classList.contains("entered")) {
                    element.classList.remove("entered");
                }
                return;
            }
            if (!getElementIsInViewportY(element) && element.classList.contains("entered")) {
                element.classList.remove("entered");
            }
            if (getElementIsInViewportY(element) && !element.classList.contains("entered")) {
                element.classList.add("entered");
            }
            return;
        };
        var setElementParallax = function(element) {
            var parallaxParent = element.closest(".hasParallax") || null;
            if (!parallaxParent) {
                return;
            }
            var windowWidthToHeightRatio = window.innerWidth / window.innerHeight;
            var parentRelativeScroll = getElementRelativeScrollY(parallaxParent); //px
            var parallaxRateX = element.getAttribute("data-parallax-rate-x") || "";
            var parallaxRateY = element.getAttribute("data-parallax-rate-y") || "";
            var parallaxOffsetX = element.getAttribute("data-parallax-offset-x") || "";
            var parallaxOffsetY = element.getAttribute("data-parallax-offset-y") || "";
            var parallaxRateXValue = !isNaN(parseFloat(parallaxRateX)) ? parseFloat(parallaxRateX) : 0;
            var parallaxRateYValue = !isNaN(parseFloat(parallaxRateY)) ? parseFloat(parallaxRateY) : 0;
            var parallaxOffsetXValue = !isNaN(parseFloat(parallaxOffsetX)) ? parseFloat(parallaxOffsetX) : 0; //px
            var parallaxOffsetYValue = !isNaN(parseFloat(parallaxOffsetY)) ? parseFloat(parallaxOffsetY) : 0; //px
            var parallaxValueX = parallaxOffsetXValue + (parallaxRateXValue * parentRelativeScroll + windowWidthToHeightRatio); //px
            var parallaxValueY = parallaxOffsetYValue + (parallaxRateYValue * parentRelativeScroll); //px
            element.style.transform = "translate(" + parallaxValueX + "px, " + parallaxValueY + "px)";
            return;
        };
        var setBackgroundElementParallax = function(element) {
            var parallaxParent = element.closest(".hasParallaxBackground");
            if (!parallaxParent) {
                return;
            }
            var parentRelativeScroll = getElementRelativeScrollY(parallaxParent); //px
            var parallaxRateX = element.getAttribute("data-parallax-rate-x") || "";
            var parallaxRateY = element.getAttribute("data-parallax-rate-y") || "";
            var parallaxRateXValue = !isNaN(parseFloat(parallaxRateX)) ? parseFloat(parallaxRateX) : 0;
            var parallaxRateYValue = !isNaN(parseFloat(parallaxRateY)) ? parseFloat(parallaxRateY) : 0;
            var parallaxValueX = parallaxRateXValue * parentRelativeScroll; //px
            var parallaxValueY = parallaxRateYValue * parentRelativeScroll; //px
            element.style.transform = "translate(" + parallaxValueX + "px, " + parallaxValueY + "px)";
            return;
        };

        /* Enter Exit Functions */
        var setEnterExitOffsets = function() {
            var enterExitItems = document.getElementsByClassName("enterExitItem");
            for (var a = 0; a < enterExitItems.length; a++) {
                var enterExitOffsetX = enterExitItems[a].getAttribute("data-enter-exit-offset-x") || "";
                var enterExitOffsetY = enterExitItems[a].getAttribute("data-enter-exit-offset-y") || "";
                var enterExitOffsetXValue = !isNaN(parseFloat(enterExitOffsetX)) ? parseFloat(enterExitOffsetX) : 0; //px
                var enterExitOffsetYValue = !isNaN(parseFloat(enterExitOffsetY)) ? parseFloat(enterExitOffsetY) : 0; //px
                var elementIsAboveFold = getElementIsAboveFold(enterExitItems[a]);
                var defaultDelay = elementIsAboveFold ? 500 : 0; //ms
                var enterExitDelay = enterExitItems[a].getAttribute("data-enter-exit-delay") || "";
                var enterExitDelayValue = !isNaN(parseFloat(enterExitDelay)) ? defaultDelay + parseFloat(enterExitDelay) : defaultDelay; //ms
                enterExitItems[a].style.transform = "translate(" + enterExitOffsetXValue + "px, " + enterExitOffsetYValue + "px)";
                enterExitItems[a].classList.add("enterExitSet");
                setTimeout(setElementEnterExit, enterExitDelayValue, enterExitItems[a]);
            }
            return;
        };
        var manageEnterExit = function() {
            var enterExitParents = document.getElementsByClassName("hasEnterExit");
            for (var a = 0; a < enterExitParents.length; a++) {
                var elementIsInViewport = getElementIsInViewportY(enterExitParents[a]);
                if (!elementIsInViewport) {
                    continue;
                }
                var enterExitItems = enterExitParents[a].getElementsByClassName("enterExitItem");
                for (var b = 0; b < enterExitItems.length; b++) {
                    setElementEnterExit(enterExitItems[b]);
                }
            }
            return;
        };
        window.addEventListener("load", function() {
            setEnterExitOffsets();
        });
        window.addEventListener("scroll", function() {
            manageEnterExit();
        });

        /* Parallax Functions */
        var setParallaxOffsets = function() {
            var parallaxItems = document.getElementsByClassName("parallaxItem");
            for (var a = 0; a < parallaxItems.length; a++) {
                var parallaxParent = parallaxItems[a].closest(".hasParallax");
                if (!parallaxParent) {
                    continue;
                }
                var parentCoordinates = getElementCoordinates(parallaxParent);
                var parallaxRateX = parallaxItems[a].getAttribute("data-parallax-rate-x") || "";
                var parallaxRateY = parallaxItems[a].getAttribute("data-parallax-rate-y") || "";
                var parallaxRateXValue = !isNaN(parseFloat(parallaxRateX)) ? parseFloat(parallaxRateX) : 0;
                var parallaxRateYValue = !isNaN(parseFloat(parallaxRateY)) ? parseFloat(parallaxRateY) : 0;
                var elementIsAboveFold = getElementIsAboveFold(parallaxItems[a]);
                var elementOffsetX = elementIsAboveFold ? 0 : (-1) * parallaxRateXValue * (window.innerWidth / 2 - parallaxItems[a].clientWidth); //px
                var elementOffsetY = elementIsAboveFold ? 0 : (-1) * parallaxRateYValue * (window.innerHeight - parallaxItems[a].clientHeight); //px
                parallaxItems[a].style.transform = "translate(" + elementOffsetX + "px, " + elementOffsetY + "px)";
                parallaxItems[a].setAttribute("data-parallax-offset-x", elementOffsetX);
                parallaxItems[a].setAttribute("data-parallax-offset-y", elementOffsetY);
                parallaxItems[a].classList.add("parallaxSet");
            }
            return;
        };
        var manageParallax = function() {
            var parallaxElements = document.getElementsByClassName("hasParallax");
            for (var a = 0; a < parallaxElements.length; a++) {
                var elementIsInViewport = getElementIsInViewportY(parallaxElements[a]);
                if (!elementIsInViewport) {
                    continue;
                }
                var parallaxItems = parallaxElements[a].getElementsByClassName("parallaxItem");
                for (var b = 0; b < parallaxItems.length; b++) {
                    setElementParallax(parallaxItems[b]);
                }
            }
            return;
        };
        window.addEventListener("load", function() {
            setParallaxOffsets();
        });
        window.addEventListener("scroll", function() {
            manageParallax();
        });

        /* Fade In Out of window */
        var manageFadeInOut = function() {
            const fadeInOutItems = document.getElementsByClassName("fadeInOutItem");

            for (var a = 0; a < fadeInOutItems.length; a++) {
                const threshold = fadeInOutItems[a].getAttribute("data-fade-in-out-threshold");
                const elementModifiedHeight = fadeInOutItems[a].clientHeight * (1 - threshold / 100); //px
                const elementTop = fadeInOutItems[a].getBoundingClientRect().top; //px
                var opacity = 1;

                if (elementTop < 0) {
                    opacity = Math.abs(elementTop / elementModifiedHeight) > 1 ? 0 : 1 - Math.abs(elementTop / elementModifiedHeight);

                } else if (elementTop > window.innerHeight) {
                    opacity = 0;

                }

                // if in bottom poart of page

                fadeInOutItems[a].style.opacity = opacity;
            }

            return;
        }

        window.addEventListener("scroll", function() {
            manageFadeInOut();
        });
    </script>

    <main id="liveCoverageHub">
        <section class="HeroBanner hasParallax">
            <div class="background" style="background-image: url(<?php echo $heroBanner_backgroundImage; ?>);"></div>

            <div class="mainImage parallaxItem" data-parallax-rate-y="-0.5">
                <div class="image fadeInOutItem" data-fade-in-out-threshold="10">
                    <img src="<?php echo $heroBanner_mainImage; ?>" />
                </div>
            </div>

            <div class="outer">
                <div class="inner">
                    <div class="header parallaxItem" data-parallax-rate-y="0.3">
                        <h1><?php echo $heroBanner_heading; ?></h1>
                    </div>
                    <?php
                    if ($heroBanner_postID) {
                        $postImage = get_the_post_thumbnail_url($heroBanner_postID, "full");
                        $postTitle = get_the_title($heroBanner_postID);
                        $postPermalink = get_the_permalink($heroBanner_postID);
                        $postArticleTypes = get_the_terms($heroBanner_postID, "articleType");

                        if (have_rows("field_liveCoverage_details", $heroBanner_postID)) {
                            while (have_rows("field_liveCoverage_details", $heroBanner_postID)) {
                                the_row();

                                $postReadTime = get_sub_field('readingTime');
                            }
                        }
                    ?>
                        <div class="postContainer parallaxItem" data-parallax-rate-y="-0.5">
                            <div class="postCard">
                                <a href="<?php echo $postPermalink; ?>"></a>

                                <div class="left">
                                    <div class="image" style="background-image: url(<?php echo $postImage; ?>);"></div>
                                </div>

                                <div class="right">
                                    <h4><?php echo $postTitle; ?></h4>

                                    <div class="taxonomyContainer">
                                        <?php
                                        for ($a = 0; $a < count($postArticleTypes); $a++) {
                                            $name = $postArticleTypes[$a]->name;
                                            $slug = $postArticleTypes[$a]->slug;
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
                                        <p><?php echo $postReadTime; ?> min read</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php /*
            <section class="TaxonomyNavigation">
                <div class="stickyContainer">
                    <div class="background" style="background-image: url(<?php echo $taxonomyNavigation_backgroundImage; ?>);"></div>

                    <div class="outer">
                        <div class="inner">
                            <nav style="grid-template-columns: repeat(<?php echo count($taxonomyNavigation_taxonomyTerms); ?>, auto);">
<?php
                                for ($a = 0; $a < count($taxonomyNavigation_taxonomyTerms); $a++) {
                                    $name = $taxonomyNavigation_taxonomyTerms[$a] -> name;
                                    $slug = $taxonomyNavigation_taxonomyTerms[$a] -> slug;
                                    $permalink = get_the_permalink($postID) . $slug . "/";
?>
                                    <button class="roundedButton light">
                                        <a href="<?php echo $permalink; ?>"><?php echo $name; ?></a>
                                    </button>
<?php
                                }
?>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
*/ ?>
        <?php
        if ($featuredArticles_count) {
        ?>
            <div class="Spacer">
                <div class="desktop" style="height: 50px"></div>
                <!-- <div class="laptop" style="height: <?php echo $height_laptop; ?>px"></div>
                    <div class="tablet" style="height: <?php echo $height_tablet; ?>px"></div> -->
                <div class="mobile" style="height: 30px"></div>
            </div>

            <section class="ScrollCarousel featuredArticles hasEnterExit">
                <div class="heading">
                    <h3 class="enterExitItem" data-enter-exit-type="both" data-enter-exit-offset-x="-200" data-enter-exit-delay="0">Featured</h3>
                </div>

                <button class="ScrollCarouselButton left" onclick="handleScrollCarouselLeftButtonClick()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                        <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                    </svg>
                </button>

                <div class="outer enterExitItem" data-enter-exit-type="both" data-enter-exit-offset-x="200" data-enter-exit-delay="0">
                    <div class="inner" style="grid-template-columns: repeat(<?php echo $featuredArticles_count; ?>, auto);" <?php /*ontouchstart="handleCarouselTouchStart()" ontouchend="handleCarouselTouchEnd()" ontouchcancel="handleCarouselTouchEnd()"*/ ?>>
                        <?php
                        for ($a = 0; $a < count($featuredArticles); $a++) {
                        ?>
                            <div class="item <?php if ($a == 0) {
                                                    echo "active";
                                                } ?>">
                                <div class="article">
                                    <a href="<?php echo $featuredArticles[$a]["permalink"]; ?>"></a>

                                    <div class="inner">
                                        <div class="background" style="background-image: url(<?php echo $featuredArticles[$a]["thumbnail"]; ?>);"></div>

                                        <h6><?php echo $featuredArticles[$a]["title"]; ?></h6>

                                        <div class="taxonomyContainer">
                                            <?php
                                            for ($b = 0; $b < count($featuredArticles[$a]["types"]); $b++) {
                                                $name = $featuredArticles[$a]["types"][$b]->name;
                                                $slug = $featuredArticles[$a]["types"][$b]->slug;
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
                                            <p><?php echo $featuredArticles[$a]["readTime"]; ?> min read</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <button class="ScrollCarouselButton right active" onclick="handleScrollCarouselRightButtonClick()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                        <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                    </svg>
                </button>
            </section>
        <?php
        }

        if ($trendingArticle_postID) {
            $postImage = get_the_post_thumbnail_url($trendingArticle_postID, "full");
            $postPermalink = get_the_permalink($trendingArticle_postID);
            $postTitle = get_the_title($trendingArticle_postID);
            $postArticleTypes = get_the_terms($trendingArticle_postID, "articleType");
        ?>
            <div class="Spacer">
                <div class="desktop" style="height: 50px"></div>
                <!-- <div class="laptop" style="height: <?php echo $height_laptop; ?>px"></div>
                    <div class="tablet" style="height: <?php echo $height_tablet; ?>px"></div> -->
                <div class="mobile" style="height: 30px"></div>
            </div>

            <section class="trendingArticleCotnainer hasEnterExit">
                <div class="background"></div>

                <div class="outer">
                    <div class="inner">
                        <h2 class="enterExitItem" data-enter-exit-type="both" data-enter-exit-offset-x="-200" data-enter-exit-delay="0">Trending</h2>

                        <div class="content enterExitItem" data-enter-exit-type="both" data-enter-exit-offset-x="200" data-enter-exit-delay="0">
                            <div class="background hasParallax" style="background-image: url('<?php echo $postImage; ?>');" data-parallax-rate="-0.1" data-parallax-start-offset="-400" data-parallax-max-travel="1000"></div>

                            <div class="inner">
                                <a href="<?php echo $postPermalink; ?>"></a>

                                <h4><?php echo $postTitle; ?></h4>

                                <div class="taxonomyContainer">
                                    <?php
                                    for ($a = 0; $a < count($postArticleTypes); $a++) {
                                        $name = $postArticleTypes[$a]->name;
                                        $slug = $postArticleTypes[$a]->slug;
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        }

        if ($realtedArticles_count) {
        ?>
            <div class="Spacer">
                <div class="desktop" style="height: 50px"></div>
                <!-- <div class="laptop" style="height: <?php echo $height_laptop; ?>px"></div>
                    <div class="tablet" style="height: <?php echo $height_tablet; ?>px"></div> -->
                <div class="mobile" style="height: 30px"></div>
            </div>

            <section class="relatedArticles hasEnterExit">
                <div class="background"></div>

                <div class="outer">
                    <div class="heading">
                        <h4 class="enterExitItem font-GAZ-outline" data-enter-exit-type="both" data-enter-exit-offset-x="-200" data-enter-exit-delay="0">Other news</h4>
                    </div>

                    <div class="inner">
                        <?php
                        for ($a = 0; $a < count($realtedArticles); $a++) {
                        ?>
                            <div class="item">
                                <a href="<?php echo $realtedArticles[$a]["permalink"]; ?>"></a>

                                <div class="inner">
                                    <div class="image">
                                        <img src="<?php echo $realtedArticles[$a]["thumbnail"]; ?>" />
                                    </div>

                                    <h6><?php echo $realtedArticles[$a]["title"]; ?></h6>

                                    <div class="taxonomyContainer">
                                        <?php
                                        for ($b = 0; $b < count($realtedArticles[$a]["types"]); $b++) {
                                            $name = $realtedArticles[$a]["types"][$b]->name;
                                            $slug = $realtedArticles[$a]["types"][$b]->slug;
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
                                        <p><?php echo $realtedArticles[$a]["readTime"]; ?> min read</p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </section>
        <?php
        }
        ?>
        <div class="Spacer">
            <div class="desktop" style="height: 50px"></div>
            <!-- <div class="laptop" style="height: <?php echo $height_laptop; ?>px"></div>
                <div class="tablet" style="height: <?php echo $height_tablet; ?>px"></div> -->
            <div class="mobile" style="height: 30px"></div>
        </div>
        <?php
        get_template_part("Components/live-coverage/SubscriptionForm/SubscriptionForm");

        if ($moreArticles_count) {
        ?>
            <div class="Spacer">
                <div class="desktop" style="height: 100px"></div>
                <!-- <div class="laptop" style="height: <?php echo $height_laptop; ?>px"></div>
                    <div class="tablet" style="height: <?php echo $height_tablet; ?>px"></div> -->
                <div class="mobile" style="height: 50px"></div>
            </div>

            <section class="moreArticles feed">
                <div class="outer">
                    <div class="inner">
                        <?php
                        for ($a = 0; $a < count($moreArticles); $a++) {
                            $oddEvenValue = rand(1, 10) % 2;
                        ?>
                            <div class="item <?php if ($oddEvenValue) {
                                                    echo "full";
                                                } ?>">
                                <a href="<?php echo $moreArticles[$a]["permalink"]; ?>"></a>

                                <div class="inner">
                                    <div class="image">
                                        <img src="<?php echo $moreArticles[$a]["thumbnail"]; ?>" />
                                    </div>

                                    <h6><?php echo $moreArticles[$a]["title"]; ?></h6>

                                    <div class="taxonomyContainer">
                                        <?php
                                        for ($b = 0; $b < count($moreArticles[$a]["types"]); $b++) {
                                            $name = $moreArticles[$a]["types"][$b]->name;
                                            $slug = $moreArticles[$a]["types"][$b]->slug;
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
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                if ($totalArticleCount > $pageArticleCount) {
                ?>
                    <div class="viewMorePosts">
                        <button class="roundedButton light" onclick="handleViewMoreLiveCoveragePosts(<?php echo $moreArticles_postsPerPage . ',' . json_encode($articleIgnorePosts); ?>)" data-currentPostCount="<?php echo $currentArticleCount; ?>">
                            <p>View More</p>
                        </button>
                    </div>
                <?php
                }
                ?>
            </section>
        <?php
        }
        ?>
        <div class="geometricBackground">
            <div class="background" style="background-image: url(<?php echo home_url(); ?>/wp-content/themes/sokito/assets/images/subcriptionFormBackground.webp);"></div>
        </div>
    </main>

    <!-- all -->
    <script>
        // /* Background Parallax Functions */
        // function handleParallaxBackground() {
        //     const parallaxElements = document.getElementsByClassName("hasParallax");
        //     const windowScrollY = window.scrollY; //px
        //     const windowHeight = window.innerHeight; //px

        //     for (var a = 0; a < parallaxElements.length; a++) {
        //         const parallaxRate = isNaN(parseFloat(parallaxElements[a].getAttribute("data-parallax-rate"))) ? 0 : parseFloat(parallaxElements[a].getAttribute("data-parallax-rate"));
        //         const parallaxStartOffset = isNaN(parseFloat(parallaxElements[a].getAttribute("data-parallax-start-offset"))) ? 0 : parseFloat(parallaxElements[a].getAttribute("data-parallax-start-offset"));
        //         const parallaxMaxTravel = isNaN(parseFloat(parallaxElements[a].getAttribute("data-parallax-max-travel"))) ? 0 : Math.abs(parseFloat(parallaxElements[a].getAttribute("data-parallax-max-travel")));
        //         const elmtDistanceToPageTop = windowScrollY + parallaxElements[a].getBoundingClientRect().top; //px

        //         if (windowScrollY + windowHeight <= elmtDistanceToPageTop + parallaxStartOffset) { continue; }

        //         var parallaxvalue = windowScrollY - (elmtDistanceToPageTop + parallaxStartOffset) < 0 ? 0 : parallaxRate * (windowScrollY - (elmtDistanceToPageTop + parallaxStartOffset)); //px

        //         if (Math.abs(parallaxvalue) > parallaxMaxTravel) { parallaxvalue = parallaxRate < 0 ? (-1) * parallaxMaxTravel : parallaxMaxTravel; }

        //         parallaxElements[a].style.transform = "translateY(" + parallaxvalue + "px)";
        //     }

        //     return;
        // }
        // window.addEventListener("scroll", () => {
        //     handleParallaxBackground();
        // });

        /* enter / exit Function */
        // function setEnterExitStartingValues() {
        //     const enterExitElements = document.getElementsByClassName("enterExit");

        //     for (var a = 0; a < enterExitElements.length; a++) {
        //         const enterExitStartValue = isNaN(parseFloat(enterExitElements[a].getAttribute("data-enter-exit-start-value"))) ? 0 : parseFloat(enterExitElements[a].getAttribute("data-enter-exit-start-value")); //px

        //         enterExitElements[a].style.transform = "translatex(" + enterExitStartValue + "px)";
        //     }

        //     return;
        // }
        // function handleEnterExit() {
        //     const enterExitElements = document.getElementsByClassName("enterExit");
        //     const windowScrollY = window.scrollY; //px
        //     const windowHeight = window.innerHeight; //px

        //     for (var a = 0; a < enterExitElements.length; a++) {
        //         const enterExitOffset = isNaN(parseFloat(enterExitElements[a].getAttribute("data-enter-exit-offset"))) ? 0 : parseFloat(enterExitElements[a].getAttribute("data-enter-exit-offset"));
        //         const elmtDistanceToPageTop = windowScrollY + enterExitElements[a].getBoundingClientRect().top; //px

        //         if (windowScrollY + windowHeight <= elmtDistanceToPageTop + enterExitOffset) {
        //             enterExitElements[a].classList.remove("entered");

        //             continue;
        //         }

        //         enterExitElements[a].classList.add("entered");
        //     }

        //     return;
        // }
        // window.addEventListener("load", () => {
        //     setEnterExitStartingValues();
        // });
        // window.addEventListener("scroll", () => {
        //     handleEnterExit();
        // });

        /* fade in / out functions */
        // function handleFadeInOut() {
        //     const fadeInOutElements = document.getElementsByClassName("fadeInOut");
        //     const windowScrollY = window.scrollY; //px
        //     const windowHeight = window.innerHeight; //px

        //     for (var a = 0; a < fadeInOutElements.length; a++) {
        //         const fadeInOutOffset = isNaN(parseFloat(fadeInOutElements[a].getAttribute("data-fade-in-out-offset"))) ? 0 : parseFloat(fadeInOutElements[a].getAttribute("data-fade-in-out-offset"));
        //         const elmtDistanceToPageTop = windowScrollY + fadeInOutElements[a].getBoundingClientRect().top; //px

        //         if (windowScrollY + windowHeight <= elmtDistanceToPageTop + fadeInOutOffset) {
        //             fadeInOutElements[a].classList.remove("entered");

        //             continue;
        //         }

        //         fadeInOutElements[a].classList.add("entered");
        //     }

        //     return;
        // }
        // window.addEventListener("scroll", () => {
        //     handleFadeInOut();
        // });

        // /* Background Parallax Functions */
        // function handleFadeScroll() {
        //     const fadeScrollElements = document.getElementsByClassName("fadeScroll");
        //     const windowScrollY = window.scrollY; //px
        //     const windowHeight = window.innerHeight; //px

        //     for (var a = 0; a < fadeScrollElements.length; a++) {
        //         const fadeScrollRate = isNaN(parseFloat(fadeScrollElements[a].getAttribute("data-fade-scroll-rate"))) ? 0 : parseFloat(fadeScrollElements[a].getAttribute("data-fade-scroll-rate"));
        //         const fadeScrollStartOffset = isNaN(parseFloat(fadeScrollElements[a].getAttribute("data-parallax-start-offset"))) ? 0 : parseFloat(fadeScrollElements[a].getAttribute("data-parallax-start-offset"));
        //         const elmtDistanceToPageTop = windowScrollY + fadeScrollElements[a].getBoundingClientRect().top; //px

        //         if (windowScrollY + windowHeight <= elmtDistanceToPageTop + fadeScrollStartOffset) { continue; }

        //         var opacityValue = windowScrollY - (elmtDistanceToPageTop + fadeScrollStartOffset) < 0 ? 0 : fadeScrollRate * (windowScrollY - (elmtDistanceToPageTop + fadeScrollStartOffset)); //px

        //         opacityValue = opacityValue > 1 ? 1 : opacityValue;

        //         fadeScrollElements[a].style.opacityValue = opacityValue;
        //     }

        //     return;
        // }
        // window.addEventListener("scroll", () => {
        //     handleParallaxBackground();
        // });
    </script>

    <style>
        /* .hasParallax {
                transition: transform 50ms ease;
            }
            .enterExit {
                opacity: 0;
                transition: transform 200ms ease, opacity 200ms ease;
            }
            .enterExit.entered {
                opacity: 1;
                transform: translateX(0px) !important;
            }
            .fadeInOut {
                opacity: 0;
                transition: opacity 200ms ease;
            }
            .fadeInOut.entered { 
                opacity: 1;
            } */
    </style>

    <!-- Hero Banner -->
    <script>
        function setHeroBannerHeaderParallaxMaxTravel() {
            const HeroBanner = document.getElementsByClassName("HeroBanner")[0];

            if (!HeroBanner) {
                return;
            }

            const parallaxHeader = HeroBanner.getElementsByClassName("header hasParallax")[0];

            if (!parallaxHeader) {
                return;
            }

            const windowWidth = window.innerWidth; //px
            const postContainer = HeroBanner.getElementsByClassName("postContainer")[0];
            const HeroBannerHeight = HeroBanner.clientHeight; //px
            const postContainerHeight = !postContainer ? 0 : postContainer.clientHeight; //px
            const HeroBannerPaddingTop = 400; //px
            const extraPadding = windowWidth <= 800 ? 300 : 350; //px
            const maxTravel = HeroBannerHeight - postContainerHeight - HeroBannerPaddingTop - extraPadding > 0 ? HeroBannerHeight - postContainerHeight - HeroBannerPaddingTop - extraPadding : 0; //px

            parallaxHeader.setAttribute("data-parallax-max-travel", maxTravel);

            return;
        }

        window.addEventListener("load", () => {
            setHeroBannerHeaderParallaxMaxTravel();
        });
        window.addEventListener("resize", () => {
            setHeroBannerHeaderParallaxMaxTravel();
        });
    </script>

    <style>
        #liveCoverageHub .HeroBanner {
            background-color: #000;
            z-index: 1;
            padding-top: 150px;
        }

        #liveCoverageHub .HeroBanner>.background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            opacity: 0.3;
        }

        #liveCoverageHub .HeroBanner>.mainImage {
            position: absolute;
            overflow: hidden;
            width: 90vw;
            max-width: 1420px;
            top: 150px;
            right: 0;
            height: 700px;
            background-color: #000;
        }

        #liveCoverageHub .HeroBanner>.mainImage>.image {
            width: 100%;
            height: 100%;
            background: none;
            opacity: 1;
            transition: none;
        }

        #liveCoverageHub .HeroBanner>.mainImage>.image>img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner {
            display: block;
            padding-bottom: 100vh;
            position: relative;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.header {
            max-width: 700px;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.header>h1 {
            font-family: 'Gza';
            font-size: 100px;
            margin: 0;
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-weight: 400;
            color: #fff;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer {
            position: absolute;
            width: 100%;
            bottom: 50px;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard {
            display: grid;
            grid-gap: 50px;
            align-content: center;
            justify-content: center;
            align-items: start;
            grid-template-columns: 1fr 450px;
            grid-template-areas: "left right";
            position: relative;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.left {
            grid-area: left;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>a {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.left>.image {
            width: 100%;
            height: 450px;
            background-color: unset;
            box-shadow: 15px 15px 0px #F3FD55;
            opacity: 1;
            transition: none;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.right {
            grid-area: right;
            display: grid;
            grid-gap: 10px;
            align-content: center;
            justify-content: center;
            align-items: center;
            grid-template-columns: auto minmax(100px, 1fr);
            grid-template-areas:
                "title title"
                "taxonomies readMore";
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.right>h4 {
            grid-area: title;
            font-size: 40px;
            font-family: 'Univers LT Roman';
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-weight: bold;
            color: #fff;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.right>.taxonomyContainer {
            grid-area: taxonomies;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.right>.taxonomyContainer>.taxonomy>a,
        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.right>.taxonomyContainer>.taxonomy>p {
            color: #EBEBEB;
            border-color: #EBEBEB;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.right>.taxonomyContainer>.taxonomy>a:hover,
         #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.right>.taxonomyContainer>.taxonomy>p:hover {
            color: #BFBFBF;
            border-color: #BFBFBF;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.right>.readTimeContainer {
            grid-area: readMore;
        }

        #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.right>.readTimeContainer p {
            font-size: 13px;
            line-height: 1;
            letter-spacing: 0.01em;
            font-family: 'Univers LT Roman';
            color: #EBEBEB;
        }

        @media (max-width: 1080px) {
            #liveCoverageHub .HeroBanner>.outer>.inner {
                padding-top: 30vh;
            }

            #liveCoverageHub .HeroBanner>.outer>.inner>.header>h1 {
                font-size: 76px;
            }

            #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer {
                bottom: 0px;
            }

            #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard {
                grid-template-areas:
                    "right"
                    "left";
                grid-template-columns: 1fr;
            }

            #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.left>.image {
                height: 400px;
            }

            #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.right>h4 {
                font-size: 34px;
            }
        }

        @media (max-width: 800px) {
            #liveCoverageHub .HeroBanner>.outer>.inner>.header>h1 {
                font-size: 76px;
            }

            #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer {
                bottom: -100px;
            }

            #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.left>.image {
                height: 250px;
            }

            #liveCoverageHub .HeroBanner>.outer>.inner>.postContainer>.postCard>.right>h4 {
                font-size: 30px;
            }
        }
    </style>

    <!-- Taxonomy Navigation -->
    <script>
        function setTaxonomyNavigationPaddingLeft() {
            const TaxonomyNavigations = document.getElementsByClassName("TaxonomyNavigation");

            for (var a = 0; a < TaxonomyNavigations.length; a++) {
                const navContainer = TaxonomyNavigations[a].getElementsByTagName("NAV")[0];

                if (!navContainer) {
                    break;
                }

                const windowWidth = window.innerWidth; //px
                const mobileScreenBreak = 1080; //px
                const minPadding = windowWidth <= mobileScreenBreak ? 20 : 50; //px
                const maxWidth = 1320; //px
                const navContainerPaddingLeft = ((windowWidth - maxWidth) / 2) > minPadding ? ((windowWidth - maxWidth) / 2) : minPadding; //px

                navContainer.style.paddingLeft = navContainerPaddingLeft + "px";
            }

            return;
        }

        function toggleTaxonomyNavigationIsFixed() {
            const TaxonomyNavigations = document.getElementsByClassName("TaxonomyNavigation");

            for (var a = 0; a < TaxonomyNavigations.length; a++) {
                const distanceToTopOfPage = window.pageYOffset + TaxonomyNavigations[a].getBoundingClientRect().top; //px
                const windowScrollY = window.scrollY; //px

                if (distanceToTopOfPage < windowScrollY) {
                    TaxonomyNavigations[a].classList.add("fixed");

                } else {
                    TaxonomyNavigations[a].classList.remove("fixed");
                }
            }

            return;
        }

        function TaxonomyNavigationOnLoadListener() {
            setTaxonomyNavigationPaddingLeft()

            return;
        }

        function TaxonomyNavigationOnResizeListener() {
            setTaxonomyNavigationPaddingLeft()

            return;
        }

        function TaxonomyNavigationOnScrollListener() {
            toggleTaxonomyNavigationIsFixed();

            return;
        }

        window.addEventListener("load", TaxonomyNavigationOnLoadListener);
        window.addEventListener("resize", TaxonomyNavigationOnResizeListener);
        window.addEventListener("scroll", TaxonomyNavigationOnScrollListener);
    </script>

    <style>
        section.TaxonomyNavigation {
            height: 90px;
        }

        section.TaxonomyNavigation>.stickyContainer {
            position: relative;
            background-color: #000;
        }

        section.TaxonomyNavigation.fixed>.stickyContainer {
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 11;
        }

        section.TaxonomyNavigation>.stickyContainer>.background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            opacity: 0.3;
        }

        section.TaxonomyNavigation>.stickyContainer>.outer {
            padding: 20px 0;
            position: relative;
        }

        section.TaxonomyNavigation>.stickyContainer>.outer>.inner {
            overflow-x: scroll;
        }

        section.TaxonomyNavigation>.stickyContainer>.outer>.inner::-webkit-scrollbar {
            display: none;
        }

        section.TaxonomyNavigation>.stickyContainer>.outer>.inner>nav {
            display: grid;
            grid-gap: 10px;
            align-content: center;
            justify-content: start;
            align-items: center;
            padding: 0 50px;
        }

        section.TaxonomyNavigation>.stickyContainer>.outer>.inner>nav>.roundedButton::before {
            content: none;
        }

        @media (max-width: 1080px) {
            section.TaxonomyNavigation>.stickyContainer>.outer>.inner>nav {
                padding: 0 20px;
            }
        }
    </style>

    <!-- Featured Articles -->
    <script>

    </script>

    <style>
        section.ScrollCarousel.featuredArticles>.heading {
            max-width: 1920px;
            margin: 0 auto;
            padding: 0 50px;
            margin-bottom: 30px;
        }

        section.ScrollCarousel.featuredArticles>.heading>h3 {
            font-family: 'Gza';
            font-size: 60px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            color: #000;
            margin: 0;
            max-width: 1320px;
            margin: 0 auto;
        }

        section.ScrollCarousel.featuredArticles>.outer>.inner>.item {
            padding: 0px;
            padding-right: 20px;
            border-radius: 0;
        }

        section.ScrollCarousel.featuredArticles>.outer>.inner>.item>.article {
            position: relative;
            transition: opacity 200ms ease;
        }

        section.ScrollCarousel.featuredArticles>.outer>.inner>.item>.article:hover {
            opacity: 0.9;
        }

        section.ScrollCarousel.featuredArticles>.outer>.inner>.item>.article {
            position: relative;
        }

        section.ScrollCarousel.featuredArticles>.outer>.inner>.item>.article>a {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        section.ScrollCarousel.featuredArticles>.outer>.inner>.item>.article>.inner {
            display: grid;
            align-content: center;
            justify-content: start;
            align-items: center;
            grid-template-columns: auto minmax(100px, 1fr);
            grid-gap: 20px;
            grid-template-areas:
                "image image"
                "title title"
                "taxonomies readTime";
        }

        section.ScrollCarousel.featuredArticles>.outer>.inner>.item>.article>.inner>.background {
            width: 100%;
            aspect-ratio: 16 / 9;
            top: 0;
            left: 0;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            grid-area: image;
        }

        section.ScrollCarousel.featuredArticles>.outer>.inner>.item>.article>.inner>h6 {
            grid-area: title;
            font-family: 'Univers LT Roman';
            font-size: 34px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin: 0;
        }

        section.ScrollCarousel.featuredArticles>.outer>.inner>.item>.article>.inner>.readTimeContainer {
            grid-area: readTime;
        }

        section.ScrollCarousel.featuredArticles>.outer>.inner>.item>.article>.inner>.readTimeContainer p {
            font-size: 13px;
            font-family: 'Univers LT Roman';
            line-height: 1;
            letter-spacing: 0.01em;
            color: #727272;
        }

        @media (max-width: 1080px) {
            section.ScrollCarousel.featuredArticles>.heading {
                padding: 0 20px;
            }

            section.ScrollCarousel.featuredArticles>.heading>h3 {
                font-size: 48px;
            }

            section.ScrollCarousel.featuredArticles>.outer>.inner>.item>.article>.inner>h6 {
                font-size: 30px;
            }
        }


        @media (max-width: 800px) {
            section.ScrollCarousel.featuredArticles>.heading>h3 {
                font-size: 44px;
            }

            section.ScrollCarousel.featuredArticles>.outer>.inner>.item>.article>.inner>h6 {
                font-size: 26px;
            }
        }
    </style>

    <!-- Related Artles -->
    <script>

    </script>

    <style>
        section.relatedArticles {
            position: relative;
        }

        section.relatedArticles>.background {}

        section.relatedArticles>.outer {
            max-width: 1920px;
            margin: 0 auto;
            padding: 0 50px;
        }

        section.relatedArticles>.outer>.heading {
            max-width: 1320px;
            margin: 0 auto;
        }

        section.relatedArticles>.outer>.heading>h4 {
            font-family: 'GZAOutline';
            font-size: 70px;
            margin: 0;
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-weight: 400;
        }

        section.relatedArticles>.outer>.inner {
            display: grid;
            grid-template-columns: 1fr;
            align-content: center;
            justify-content: center;
            align-items: center;
            grid-gap: 0px;
            max-width: 1320px;
            margin: 0 auto;
        }

        section.relatedArticles>.outer>.inner>.item {
            padding: 40px 0;
            border-bottom: 1px solid #EBEBEB;
            position: relative;
        }

        section.relatedArticles>.outer>.inner>.item:nth-last-child(1) {
            border-bottom: none;
        }

        section.relatedArticles>.outer>.inner>.item>a {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        section.relatedArticles>.outer>.inner>.item>.inner {
            display: grid;
            align-content: center;
            justify-content: start;
            align-items: center;
            grid-template-columns: auto auto minmax(100px, 1fr);
            grid-gap: 20px;
            grid-template-areas:
                "image title title"
                "image taxonomies readTime";
        }

        section.relatedArticles>.outer>.inner>.item>.inner>.image {
            grid-area: image;
            width: 400px;
            background: none;
            opacity: 1;
            background: none;
            position: unset;
            transition: unset;
        }

        section.relatedArticles>.outer>.inner>.item>.inner>.image>img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        section.relatedArticles>.outer>.inner>.item>.inner>h6 {
            grid-area: title;
            margin: 0;
            font-family: 'Univers LT Roman';
            font-size: 30px;
            color: #000;
            font-weight: bold;
            line-height: 1.1;
            letter-spacing: 0.01em;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        section.relatedArticles>.outer>.inner>.item>.inner>.taxonomyContainer {
            grid-area: taxonomies;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        section.relatedArticles>.outer>.inner>.item>.inner>.taxonomyContainer>.taxonomy {
            border: none;
            background: none;
            appearance: none;
            display: inline-block;
            width: auto;
            vertical-align: middle;
            margin-right: 10px;
            padding: 0;
        }

        section.relatedArticles>.outer>.inner>.item>.inner>.taxonomyContainer>.taxonomy:nth-last-child(1) {
            margin-right: 0;
        }

        section.relatedArticles>.outer>.inner>.item>.inner>.taxonomyContainer>.taxonomy>a,
        section.relatedArticles>.outer>.inner>.item>.inner>.taxonomyContainer>.taxonomy>p {
            font-family: 'Univers LT Roman';
            font-size: 13px;
            line-height: 1;
            letter-spacing: 0;
            color: #727272;
            border: 1px solid #727272;
            border-radius: 5px;
            padding: 0.5em;
            text-transform: uppercase;
            transition: color 200ms ease;
            position: relative;
            position: relative;
            z-index: 2;
            transition: color 200ms ease, border 200ms ease;
            display: inline-block;
        }

        section.relatedArticles>.outer>.inner>.item>.inner>.taxonomyContainer>.taxonomy>a:hover,
        section.relatedArticles>.outer>.inner>.item>.inner>.taxonomyContainer>.taxonomy>p:hover {
            color: #BFBFBF;
            border-color: #BFBFBF;
        }

        section.relatedArticles>.outer>.inner>.item>.inner>.readTimeContainer {
            grid-area: readTime;
        }

        section.relatedArticles>.outer>.inner>.item>.inner>.readTimeContainer>p {
            color: #727272;
            font-family: 'Univers LT Roman';
            font-size: 13px;
            line-height: 1;
            letter-spacing: 0.01em;
        }

        @media (max-width: 1080px) {
            section.relatedArticles>.outer {
                padding: 0 20px;
            }

            section.relatedArticles>.outer>.heading>h4 {
                font-size: 52px;
            }

            section.relatedArticles>.outer>.inner>.item {
                padding: 30px 0;
            }

            section.relatedArticles>.outer>.inner>.item>.inner {
                grid-template-areas:
                    "image title title"
                    "image taxonomies taxonomies"
                    "image readTime readTime";
                grid-gap: 10px 20px;
            }

            section.relatedArticles>.outer>.inner>.item>.inner>h6 {
                font-size: 24px;
            }

            section.relatedArticles>.outer>.inner>.item>.inner>.image {
                width: 300px;
                height: 200px;
            }
        }

        @media (max-width: 800px) {
            section.relatedArticles>.outer>.heading>h4 {
                font-size: 44px;
            }

            section.relatedArticles>.outer>.inner>.item {
                padding: 20px 0;
            }

            section.relatedArticles>.outer>.inner>.item>.inner>h6 {
                font-size: 22px;
            }

            section.relatedArticles>.outer>.inner>.item>.inner>.image {
                width: 200px;
                height: 200px;
            }
        }

        @media (max-width: 500px) {
            section.relatedArticles>.outer>.inner>.item>.inner {
                grid-template-areas:
                    "image title title"
                    "image taxonomies taxonomies";
            }

            section.relatedArticles>.outer>.inner>.item>.inner>.image {
                width: 120px;
                height: 120px;
            }

            section.relatedArticles>.outer>.inner>.item>.inner>.readTimeContainer {
                display: none;
            }
        }
    </style>

    <!-- More Articles -->
    <script>
        function handleViewMoreLiveCoveragePosts(postsPerPage = 0, postsNotIn = []) {
            const eventTarget = event.currentTarget || event.target;

            if (!eventTarget || !postsPerPage || !postsNotIn) {
                return;
            }

            const feedContainer = eventTarget.closest(".feed");
            const currentPostCount = parseInt(eventTarget.getAttribute("data-currentPostCount"));

            if (!feedContainer || isNaN(currentPostCount)) {
                return;
            }

            const ajaxURL = "/wp-admin/admin-ajax.php";
            const ajaxAction = "handleViewMoreLiveCoveragePosts";

            eventTarget.classList.add("loading");

            $.ajax({
                type: 'POST',
                url: ajaxURL,
                dataType: 'html',
                data: {
                    action: ajaxAction,
                    postsPerPage: postsPerPage,
                    postsNotIn: postsNotIn,
                    postOffset: currentPostCount
                },
                success: (response) => {
                    handleViewMoreLiveCoveragePostsSuccess(response, eventTarget);
                },
                error: (response) => {
                    handleViewMoreLiveCoveragePostsError(response);
                }
            });

            return;
        }

        function handleViewMoreLiveCoveragePostsSuccess(response = null, eventTarget = null) {
            if (!response || !eventTarget) {
                return;
            }

            const feed = eventTarget.closest(".feed");

            if (!feed) {
                return;
            }

            const outerContainer = feed.getElementsByClassName("outer")[0];
            const innerContainer = feed.getElementsByClassName("inner")[0];

            if (!innerContainer || !outerContainer) {
                return;
            }

            const newContent = JSON.parse(response)["content"];
            const newPostCount = JSON.parse(response)["postCount"];
            const totalPostCount = JSON.parse(response)["totalPostCount"]
            const innerHTMLContent = innerContainer.innerHTML;
            const newInnerHTMLContent = innerHTMLContent + newContent;

            outerContainer.style.height = innerContainer.clientHeight + "px";
            innerContainer.innerHTML = newInnerHTMLContent;
            eventTarget.setAttribute("data-currentPostCount", newPostCount);
            eventTarget.classList.remove("loading");

            setTimeout(function() {
                outerContainer.style.height = innerContainer.clientHeight + "px";
            }, 100);

            setTimeout(function() {
                const items = innerContainer.getElementsByClassName("item");

                for (var a = 0; a < items.length; a++) {
                    items[a].classList.remove("hidden");
                }

            }, 110);

            if (newPostCount >= totalPostCount) {
                eventTarget.classList.add("hidden");

                setTimeout(function() {
                    eventTarget.style.display = "none";
                }, 210);
            }
            return;
        }

        function handleViewMoreLiveCoveragePostsError(response = null, eventTarget = null) {
            if (!response || !eventTarget) {
                return;
            }

            const JSONResponse = JSON.parse(response);

            eventTarget.classList.remove("loading");

            console.log("ajax Error - handleViewMoreLiveCoveragePosts" + JSONResponse);

            return;
        }
    </script>

    <style>
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
    </style>

    <!-- Trending Container -->
    <script>

    </script>

    <style>
        section.trendingArticleCotnainer {
            background-color: #000;
            position: relative;
        }

        section.trendingArticleCotnainer>.outer {
            max-width: 1920px;
            margin: 0 auto;
            padding: 0 50px;
        }

        section.trendingArticleCotnainer>.outer>.inner {
            max-width: 1320px;
            padding: 30px 0;
            margin: 0 auto;
        }

        section.trendingArticleCotnainer>.outer>.inner>h2 {
            color: #fff;
            font-family: 'GZAOutline';
            font-size: 70px;
            font-weight: 400;
            line-height: 1.1;
            letter-spacing: 0.01em;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        section.trendingArticleCotnainer>.outer>.inner>.content {
            position: relative;
        }

        section.trendingArticleCotnainer>.outer>.inner>.content>.background {
            position: absolute;
            top: -10px;
            width: 100vw;
            left: -5vw;
            height: 120%;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        section.trendingArticleCotnainer>.outer>.inner>.content>.inner {
            padding: 100px 0;
            text-align: center;
            max-width: 500px;
            margin: 0 auto;
            position: relative;
        }

        section.trendingArticleCotnainer>.outer>.inner>.content>.inner>a {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        section.trendingArticleCotnainer>.outer>.inner>.content>.inner>h4 {
            font-family: 'Extenda40';
            font-size: 80px;
            line-height: 1.1;
            letter-spacing: 0.05em;
            font-weight: 400;
            color: #fff;
        }

        section.trendingArticleCotnainer>.outer>.inner>.content>.inner>.taxonomyContainer>.taxonomy>a,
        section.trendingArticleCotnainer>.outer>.inner>.content>.inner>.taxonomyContainer>.taxonomy>p {
            color: #EBEBEB;
            border-color: #EBEBEB;
        }

        section.trendingArticleCotnainer>.outer>.inner>.content>.inner>.taxonomyContainer>.taxonomy>a:hover,
        section.trendingArticleCotnainer>.outer>.inner>.content>.inner>.taxonomyContainer>.taxonomy>p:hover {
            color: #BFBFBF;
            border-color: #BFBFBF;
        }

        @media (max-width: 1500px) {
            section.trendingArticleCotnainer>.outer>.inner>.content>.background {
                left: 100px;
            }
        }

        @media (max-width: 1080px) {
            section.trendingArticleCotnainer>.outer {
                padding: 0 20px;
            }

            section.trendingArticleCotnainer>.outer>.inner>h2 {
                font-size: 48px;
            }

            section.trendingArticleCotnainer>.outer>.inner>.content>.background {
                left: 50px;
            }

            section.trendingArticleCotnainer>.outer>.inner>.content>.inner>h4 {
                font-size: 70px;
            }
        }

        @media (max-width: 800px) {
            section.trendingArticleCotnainer>.outer>.inner>h2 {
                font-size: 45px;
            }

            section.trendingArticleCotnainer>.outer>.inner>.content>.background {
                left: 20px;
                height: 110%;
                top: 10px;
            }

            section.trendingArticleCotnainer>.outer>.inner>.content>.inner>h4 {
                font-size: 60px;
            }
        }
    </style>
<?php
    get_footer("live-coverage");
}
?>