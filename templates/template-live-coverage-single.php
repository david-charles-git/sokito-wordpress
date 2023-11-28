<?php
    /**
    * Template Name: Live Coverage - Single
    * Template Post Type: page
    */
    
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    $postID = get_the_ID();

    if (have_rows('field_pages', $postID)) {
        $articleType = "live-coverage";
        $articles = [];
        $pageArticleCount = 0;
        $initalArticleCount = 0;
        $currentArticleCount = 0;

        while (have_rows('field_pages', $postID)) {
            the_row();

            if (get_row_layout() == 'liveCoverageSingleGroup') {
                //Taxonomy Details
                $articleTaxonomy = get_sub_field("artcleType");

                //Hero Banner Details
                $heroBanner_backgroundImage = get_sub_field("heroBanner_backgroundImage");

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
                $articleArgs = array (
                    'post_type' => $articleType,
                    'posts_per_page' => $initalArticleCount,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'articleType',
                            'field'    => 'slug',
                            'terms'    => $articleTaxonomy
                        )
                    )
                );
                
                $articleQuery = new WP_Query($articleArgs);
                $totalArticleCount = $articleQuery -> found_posts;
                
                if ($articleQuery -> have_posts()) {
                    while ($articleQuery -> have_posts()) {
                        $article = [];
                        $articleQuery -> the_post();
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

                foreach ($articles as $article) {
                    if ($article["isFeatured"] && $featuredArticles_count < $featuredArticles_maxPosts) {
                        array_push($featuredArticles, $article);

                        $featuredArticles_count++;

                        continue;
                    }

                    if ($realtedArticles_count < $realtedArticles_maxPosts) {
                        array_push($realtedArticles,$article);

                        $realtedArticles_count++;

                        continue;
                    }

                    array_push($moreArticles, $article);

                    $moreArticles_count++;
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
        <main id="liveCoverageSingle">
            <section class="HeroBanner">
                <div class="backgroundImage" style="background-color: #000; background-image: url(<?php echo $heroBanner_backgroundImage; ?>);">
                    <div class="overlay"></div>
                </div>

                <div class="outer">
                    <div class="inner">
                        <div class="taxonomyContainer">
                            <div class="taxonomy">
                                <a href="<?php echo get_the_permalink(wp_get_post_parent_id($postID)); ?>">Live Coverage</a>
                            </div>  
                        </div>

                        <h1><?php echo get_the_title(); ?></h1>

                        <div class="detailsCotnainer">
                            <div class="inner">
                                <div class="dateContainer">
                                    <p><?php echo $totalArticleCount; ?> articles</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php
            if ($featuredArticles_count) {
?>
                <div class="Spacer">
                    <div class="desktop" style="height: 50px"></div>
                    <!-- <div class="laptop" style="height: <?php echo $height_laptop; ?>px"></div>
                    <div class="tablet" style="height: <?php echo $height_tablet; ?>px"></div> -->
                    <div class="mobile" style="height: 30px"></div>
                </div>

                <section class="ScrollCarousel featuredArticles" data-autoShift="true">
                    <div class="heading">
                        <h3 class="enterExit" data-enter-exit-start-value="-200" data-enter-exit-offset="200">Featured</h3>
                    </div>

                    <button class="ScrollCarouselButton left" onclick="handleScrollCarouselLeftButtonClick()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                            <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                        </svg>
                    </button>

                    <div class="outer enterExit" data-scrollValue="0" data-enter-exit-start-value="500" data-enter-exit-offset="300">
                        <div class="inner" style="grid-template-columns: repeat(<?php echo $featuredArticles_count; ?>, auto);" <?php /*ontouchstart="handleCarouselTouchStart()" ontouchend="handleCarouselTouchEnd()" ontouchcancel="handleCarouselTouchEnd()"*/ ?>>
<?php
                            for ($a = 0; $a < count($featuredArticles); $a++) {   
?>                    
                                <div class="item <?php if ($a == 0) { echo "active"; } ?>">
                                    <div class="article">
                                        <a href="<?php echo $featuredArticles[$a]["permalink"]; ?>"></a>

                                        <div class="inner">
                                            <div class="background" style="background-image: url(<?php echo $featuredArticles[$a]["thumbnail"]; ?>);"></div>

                                            <h6><?php echo $featuredArticles[$a]["title"]; ?></h6>

                                            <div class="taxonomyContainer">
<?php
                                                for ($b = 0; $b < count($featuredArticles[$a]["types"]); $b++) {
                                                    $name = $featuredArticles[$a]["types"][$b] -> name;
                                                    $slug = $featuredArticles[$a]["types"][$b] -> slug;
                                                    $permalink = home_url() . "/live-coverage/" . $slug . "/";
?>
                                                    <div class="taxonomy" data-slug="<?php echo $slug; ?>">
                                                        <a href="<?php echo $permalink; ?>"><?php echo $name; ?></a>
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

            if ($realtedArticles_count) {
?>           
                <div class="Spacer">
                    <div class="desktop" style="height: 50px"></div>
                    <!-- <div class="laptop" style="height: <?php echo $height_laptop; ?>px"></div>
                    <div class="tablet" style="height: <?php echo $height_tablet; ?>px"></div> -->
                    <div class="mobile" style="height: 30px"></div>
                </div>

                <section class="relatedArticles">
                    <div class="background"></div>

                    <div class="outer">
                        <div class="heading">
                            <h4 class="enterExit" data-enter-exit-start-value="-200" data-enter-exit-offset="200">Other news</h4>
                        </div>

                        <div class="inner fadeInOut" data-fade-in-out-offset="200">
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
                                                $name = $realtedArticles[$a]["types"][$b] -> name;
                                                $slug = $realtedArticles[$a]["types"][$b] -> slug;
                                                $permalink = home_url() . "/live-coverage/" . $slug . "/";
?>
                                                <div class="taxonomy" data-slug="<?php echo $slug; ?>">
                                                    <a href="<?php echo $permalink; ?>"><?php echo $name; ?></a>
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

                <section class="moreArticles feed fadeInOut" data-fade-in-out-offset="200">
                    <div class="outer">
                        <div class="inner">
<?php
                            for ($a = 0; $a < count($moreArticles); $a++) {
                                $oddEvenValue = rand(1,10) % 2;
?>
                                <div class="item <?php if ($oddEvenValue) { echo "full"; } ?>">
                                    <a href="<?php echo $moreArticles[$a]["permalink"]; ?>"></a>

                                    <div class="inner">
                                        <div class="image">
                                            <img src="<?php echo $moreArticles[$a]["thumbnail"]; ?>" />
                                        </div>

                                        <h6><?php echo $moreArticles[$a]["title"]; ?></h6>

                                        <div class="taxonomyContainer">
<?php
                                            for ($b = 0; $b < count($moreArticles[$a]["types"]); $b++) {
                                                $name = $moreArticles[$a]["types"][$b] -> name;
                                                $slug = $moreArticles[$a]["types"][$b] -> slug;
                                                $permalink = home_url() . "/live-coverage/" . $slug . "/";
?>
                                                <div class="taxonomy" data-slug="<?php echo $slug; ?>">
                                                    <a href="<?php echo $permalink; ?>"><?php echo $name; ?></a>
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
                            <button class="roundedButton light" onclick="handleViewMoreLiveCoveragePostsByArticleType(<?php echo $moreArticles_postsPerPage . ',\'' . $articleTaxonomy . '\'' ?>)"  data-currentPostCount="<?php echo $currentArticleCount; ?>">
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

        <!-- Featured Articles -->
        <script>

        </script>

        <style>
            section.ScrollCarousel.featuredArticles > .heading {
                max-width: 1920px;
                margin: 0 auto;
                padding: 0 50px;
                margin-bottom: 30px;
            }
            section.ScrollCarousel.featuredArticles > .heading > h3 {
                font-family: 'Gza';
                font-size: 60px;
                line-height: 1.1;
                letter-spacing: 0.01em;
                color: #000;
                margin: 0;
                max-width: 1320px;
                margin: 0 auto;
            }
            section.ScrollCarousel.featuredArticles > .outer > .inner > .item {
                padding: 0px;
                padding-right: 20px;
                border-radius: 0;
            }
            section.ScrollCarousel.featuredArticles > .outer > .inner > .item > .article {
                position: relative;
            }
            section.ScrollCarousel.featuredArticles > .outer > .inner > .item > .article {
                position: relative;
            }
            section.ScrollCarousel.featuredArticles > .outer > .inner > .item > .article > a {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
            }
            section.ScrollCarousel.featuredArticles > .outer > .inner > .item > .article > .inner {
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
            section.ScrollCarousel.featuredArticles > .outer > .inner > .item > .article > .inner > .background {
                width: 100%;
                aspect-ratio: 16 / 9;
                top: 0;
                left: 0;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                grid-area: image;
            }
            section.ScrollCarousel.featuredArticles > .outer > .inner > .item > .article > .inner > h6 {
                grid-area: title;
                font-family: 'Univers LT Roman';
                font-size: 34px;
                line-height: 1.1;
                letter-spacing: 0.01em;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            section.ScrollCarousel.featuredArticles > .outer > .inner > .item > .article > .inner > .readTimeContainer {
                grid-area: readTime;
            }
            section.ScrollCarousel.featuredArticles > .outer > .inner > .item > .article > .inner > .readTimeContainer p {
                font-size: 13px;
                font-family: 'Univers LT Roman';
                line-height: 1;
                letter-spacing: 0.01em;
                color: #727272;
            }

            @media (max-width: 1080px) {
                section.ScrollCarousel.featuredArticles > .heading {
                    padding: 0 20px;
                }
                section.ScrollCarousel.featuredArticles > .heading > h3 {
                    font-size: 48px;
                }
                section.ScrollCarousel.featuredArticles > .outer > .inner > .item > .article > .inner > h6 {
                    font-size: 30px;
                }
            }


            @media (max-width: 800px) {
                section.ScrollCarousel.featuredArticles > .heading > h3 {
                    font-size: 44px;
                }
                section.ScrollCarousel.featuredArticles > .outer > .inner > .item > .article > .inner > h6 {
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
            section.relatedArticles > .background {

            }
            section.relatedArticles > .outer {
                max-width: 1920px;
                margin: 0 auto;
                padding: 0 50px;
            }
            section.relatedArticles > .outer > .heading {
                max-width: 1320px;
                margin: 0 auto;
            }
            section.relatedArticles > .outer > .heading > h4 {
                font-family: 'Gza';
                font-size: 70px;
                margin: 0;
                line-height: 1.1;
                letter-spacing: 0.01em;
                -webkit-text-stroke: 1px black;
                color: #fff;
            }
            section.relatedArticles > .outer > .inner {
                display: grid;
                grid-template-columns: 1fr;
                align-content: center;
                justify-content: center;
                align-items: center;
                grid-gap: 0px;
                max-width: 1320px;
                margin: 0 auto;
            }
            section.relatedArticles > .outer > .inner >.item {
                padding: 40px 0;
                border-bottom: 1px solid #EBEBEB;
                position: relative;
            }
            section.relatedArticles > .outer > .inner >.item:nth-last-child(1) {
                border-bottom: none;
            }
            section.relatedArticles > .outer > .inner > .item > a {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
            }

            section.relatedArticles > .outer > .inner >.item > .inner {
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
            section.relatedArticles > .outer > .inner >.item > .inner >  .image {
                grid-area: image;
                width: 400px;
                background: none;
                opacity: 1;
                background: none;
                position: unset;
                transition: unset;
            }
            section.relatedArticles > .outer > .inner >.item > .inner >  .image > img{
                object-fit: cover;
                width: 100%;
                height: 100%;
            }
            section.relatedArticles > .outer > .inner >.item > .inner > h6 { 
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
            section.relatedArticles > .outer > .inner >.item > .inner > .taxonomyContainer {
                grid-area: taxonomies;
                display: -webkit-box;
                -webkit-line-clamp: 1;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            section.relatedArticles > .outer > .inner >.item > .inner > .taxonomyContainer > .taxonomy {
                border: none;
                background: none;
                appearance: none;
                display: inline-block;
                width: auto;
                vertical-align: middle;
                margin-right: 10px;
                padding: 0;
            }
            section.relatedArticles > .outer > .inner >.item > .inner > .taxonomyContainer > .taxonomy:nth-last-child(1) {
                margin-right: 0;
            }
            section.relatedArticles > .outer > .inner >.item > .inner > .taxonomyContainer > .taxonomy > a {
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
            section.relatedArticles > .outer > .inner >.item > .inner > .taxonomyContainer > .taxonomy > a:hover {
                color: #EBEBEB;
                border-color: #EBEBEB;
            }
            section.relatedArticles > .outer > .inner >.item > .inner > .readTimeContainer {
                grid-area: readTime;
            }
            section.relatedArticles > .outer > .inner >.item > .inner > .readTimeContainer > p {
                color: #727272;
                font-family: 'Univers LT Roman';
                font-size: 13px;
                line-height: 1;
                letter-spacing: 0.01em;
            }

            @media (max-width: 1080px) {
                section.relatedArticles > .outer {
                    padding: 0 20px;
                }
                section.relatedArticles > .outer > .heading > h4 {
                    font-size: 52px;
                }
                section.relatedArticles > .outer > .inner >.item {
                    padding: 30px 0;
                }
                section.relatedArticles > .outer > .inner >.item > .inner {
                    grid-template-areas:
                        "image title title"
                        "image taxonomies taxonomies"
                        "image readTime readTime";
                    grid-gap: 10px 20px;
                }
                section.relatedArticles > .outer > .inner >.item > .inner > h6 { 
                    font-size: 24px;
                }
                section.relatedArticles > .outer > .inner >.item > .inner > .image {
                    width: 300px;
                    height: 200px;
                }
            }

            @media (max-width: 800px) {
                section.relatedArticles > .outer > .heading > h4 {
                    font-size: 44px;
                }
                section.relatedArticles > .outer > .inner >.item {
                    padding: 20px 0;
                }
                section.relatedArticles > .outer > .inner >.item > .inner > h6 { 
                    font-size: 22px;
                }
                section.relatedArticles > .outer > .inner >.item > .inner > .image {
                    width: 200px;
                    height: 200px;
                }
            }

            @media (max-width: 500px) {
                section.relatedArticles > .outer > .inner >.item > .inner {
                    grid-template-areas:
                        "image title title"
                        "image taxonomies taxonomies";
                }
                section.relatedArticles > .outer > .inner >.item > .inner > .image {
                    width: 120px;
                    height: 120px;
                }
                section.relatedArticles > .outer > .inner >.item > .inner > .readTimeContainer {
                    display: none;
                }
            }
        </style>

        <!-- More Articles -->
        <script>
            function handleViewMoreLiveCoveragePostsByArticleType(postsPerPage = 0, articleType = "") {
                const eventTarget = event.currentTarget || event.target;    

                if (!eventTarget || !postsPerPage || !articleType) { return; }

                const feedContainer = eventTarget.closest(".feed");
                const currentPostCount = parseInt(eventTarget.getAttribute("data-currentPostCount"));     

                if (!feedContainer || isNaN(currentPostCount)) { return; }
                
                const ajaxURL = "/wp-admin/admin-ajax.php";
                const ajaxAction = "handleViewMoreLiveCoveragePostsByArticleType";   

                eventTarget.classList.add("loading");

                $.ajax({
                    type: 'POST',
                    url: ajaxURL,
                    dataType: 'html',
                    data: {
                        action : ajaxAction,
                        postsPerPage : postsPerPage,
                        postTaxonomy : articleType,
                        postOffset : currentPostCount
                    },
                    success:(response) => { handleViewMoreLiveCoveragePostsByArticleTypeSuccess(response, eventTarget); },
                    error: (response) => { handleViewMoreLiveCoveragePostsByArticleTypeError(response); }
                });

                return;
            }

            function handleViewMoreLiveCoveragePostsByArticleTypeSuccess(response = null, eventTarget = null) {
                if (!response || !eventTarget) { return; }

                const feed = eventTarget.closest(".feed");

                if (!feed) { return; }

                const outerContainer = feed.getElementsByClassName("outer")[0];
                const innerContainer = feed.getElementsByClassName("inner")[0];

                if (!innerContainer || !outerContainer) { return; }

                const newContent = JSON.parse(response)["content"];
                const newPostCount = JSON.parse(response)["postCount"];
                const totalPostCount = JSON.parse(response)["totalPostCount"]
                const innerHTMLContent = innerContainer.innerHTML;
                const newInnerHTMLContent = innerHTMLContent + newContent;
                
                outerContainer.style.height = innerContainer.clientHeight + "px";
                innerContainer.innerHTML = newInnerHTMLContent;
                eventTarget.setAttribute("data-currentPostCount", newPostCount);  
                eventTarget.classList.remove("loading");

                setTimeout(function() { outerContainer.style.height = innerContainer.clientHeight + "px"; }, 100);

                setTimeout(function() {
                    const items = innerContainer.getElementsByClassName("item");

                    for (var a = 0; a < items.length; a++) { items[a].classList.remove("hidden"); }

                }, 110);

                if (newPostCount >= totalPostCount) {
                    eventTarget.classList.add("hidden");

                    setTimeout(function() { eventTarget.style.display = "none"; }, 210);
                }
                return;
            }

            function handleViewMoreLiveCoveragePostsByArticleTypeError(response = null, eventTarget = null) {
                if (!response || !eventTarget) { return; }

                const JSONResponse = JSON.parse(response);

                eventTarget.classList.remove("loading");
                
                console.log("ajax Error - handleViewMoreLiveCoveragePosts" + JSONResponse);

                return;
            }
        </script>

        <style>
            section.moreArticles > .outer {
                max-width: 1920px;
                margin: 0 auto;
                padding: 0 50px;
                transition: height 200ms ease;
            }
            section.moreArticles > .outer > .inner {
                max-width: 1320px;
                margin: 0 auto;
                display: grid;
                align-content: center;
                justify-content: center;
                align-items: center;
                grid-template-columns: repeat(3, 1fr);
                grid-gap: 30px;
            }
            section.moreArticles > .outer > .inner > .item {
                height: 420px;
                position: relative;
                opacity: 1;
                transition: opacity 200ms ease;
            }   
            section.moreArticles > .outer > .inner > .item.full {
                display: grid;
                align-items: end;
                justify-content: start;
                grid-template-columns: 1fr;
            }
            section.moreArticles > .outer > .inner > .item.hidden {
                opacity: 0;
                transition: opacity 200ms ease;
            }
            section.moreArticles > .outer > .inner > .item > a {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 2;
            }   
            section.moreArticles > .outer > .inner > .item.full > .inner {
                padding: 30px 20px;
            }
            section.moreArticles > .outer > .inner > .item > .inner > .image {
                width: 100%;
                height: 200px;
                background: none;
                opacity: 1;
                transition: none;
            }   
            section.moreArticles > .outer > .inner > .item.full > .inner > .image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            section.moreArticles > .outer > .inner > .item > .inner > .image > img {
                object-fit: cover;
                width: 100%;
                height: 100%;
            }  
            section.moreArticles > .outer > .inner > .item > .inner > h6 {
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
            section.moreArticles > .outer > .inner > .item.full > .inner > h6 {
                color: #fff;
                position: relative;
            }
            section.moreArticles > .outer > .inner > .item.full > .inner > .taxonomyContainer > .taxonomy > a {
                color: #EBEBEB;
                border-color: #EBEBEB;
            }
            section.moreArticles > .outer > .inner > .item.full > .inner > .taxonomyContainer > .taxonomy > a:hover {
                color: #BFBFBF;
                border-color: #BFBFBF;
            }
            section.moreArticles > .viewMorePosts {
                text-align: center;
                margin-top: 50px;
            }

            @media (max-width: 1080px) {
                section.moreArticles > .outer {
                    padding: 0 20px;
                }
                section.moreArticles > .outer > .inner {
                    grid-template-columns: repeat(2, 1fr);
                }
                section.moreArticles > .outer > .inner > .item > .inner > h6 {
                    font-size: 24px;
                }  
            }

            @media (max-width: 800px) {
                section.moreArticles > .outer > .inner {
                    grid-template-columns: repeat(1, 1fr);
                    grid-gap: 40px;
                }
                section.moreArticles > .outer > .inner > .item > .inner > h6 {
                    font-size: 30px;
                }  
            }
        </style>
<?php
        get_footer("live-coverage");
    }
?>

