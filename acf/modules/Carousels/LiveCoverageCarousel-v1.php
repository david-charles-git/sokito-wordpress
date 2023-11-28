<?php
if (!defined('ABSPATH')) {
    exit;
}

$hidden = get_sub_field('hide');
$backgroundColor = get_sub_field('backgroundColor');
$title = get_sub_field('title');
$maxPostCount = get_sub_field('maxPostCount');
$postTaxonomy = get_sub_field('postType') ? get_sub_field('postType') : 'all';
$articles = [];

$articleArgs = array(
    'post_type' => "live-coverage",
    'posts_per_page' => $maxPostCount,
);

if (!$postTaxonomy == 'all') {
    $articleArgs['tax_query'] = array(
        array(
            'taxonomy' => 'articleType',
            'field'    => 'slug',
            'terms'    => array($postTaxonomy)
        )
    );
}

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

        array_push($articles, $article);
    }

    wp_reset_postdata();
}

if (!$hidden) {
?>
    <section class="ScrollCarousel liveCoverageArticles">
        <div class="heading">
            <?php
            if ($title) {
            ?>
                <h3><?php echo $title; ?></h3>
            <?php
            }
            ?>
        </div>

        <button class="ScrollCarouselButton left" onclick="handleScrollCarouselLeftButtonClick()">
            <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
            </svg>
        </button>

        <div class="outer">
            <div class="inner" style="grid-template-columns: repeat(<?php echo count($articles); ?>, auto);">
                <?php
                $forCount = 0;

                foreach ($articles as $article) {
                    $postID = $article["ID"];
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

    <style>
        .ScrollCarousel.liveCoverageArticles {
            padding: 0;
            position: relative;
        }

        .ScrollCarousel.liveCoverageArticles>.heading {
            max-width: 1920px;
            margin: 0 auto 30px;
            padding: 0 50px;
        }

        .ScrollCarousel.liveCoverageArticles>.heading>h3 {
            font-family: Gza;
            font-size: 60px;
            line-height: 1.1;
            letter-spacing: .01em;
            color: #000;
            max-width: 1300px;
            margin: 0 auto;
        }

        .ScrollCarousel.liveCoverageArticles>.ScrollCarouselButton {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translate(0, -50%);
            padding: 10px;
            background-color: #000;
            z-index: 10;
            opacity: 0;
            transition: opacity 200ms ease, padding 200ms ease;
        }

        .ScrollCarousel.liveCoverageArticles>.ScrollCarouselButton.left {
            transform: translate(0, -50%) rotate(180deg);
            left: 0;
            right: unset;
        }

        .ScrollCarousel.liveCoverageArticles>.ScrollCarouselButton.active {
            opacity: 1;
        }

        .ScrollCarousel.liveCoverageArticles>.outer {
            /* max-width: 1320px; */
            margin: 0 auto;
            position: relative;
            overflow-x: scroll;
            padding-bottom: 50px;
        }

        .ScrollCarousel.liveCoverageArticles>.outer>.inner {
            display: -ms-grid;
            display: grid;
            grid-gap: 20px;
            align-content: center;
            justify-content: start;
            align-items: start;
            transition: transform 200ms ease;
        }

        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item {
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            width: calc((1310px - 30px) / 2);
            opacity: 0.6;
            transition: opacity 200ms ease;
            position: relative;
        }

        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item.active,
        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item:hover,
        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item.active+.item {
            opacity: 1;
        }

        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article {
            position: relative;
        }

        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>a {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner {
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

        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner>.background {
            width: 100%;
            aspect-ratio: 16/9;
            top: 0;
            left: 0;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            grid-area: image;
        }

        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner>h6 {
            grid-area: title;
            font-family: "Univers LT Roman";
            font-size: 34px;
            line-height: 1.1;
            letter-spacing: .01em;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin: 0;
        }

        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner>.taxonomyContainer {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: clip;
        }

        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner>.taxonomyContainer>.taxonomy {
            border: none;
            background: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            display: inline-block;
            width: auto;
            vertical-align: middle;
            margin-right: 10px;
            padding: 0;
        }

        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner>.taxonomyContainer>.taxonomy:last-child {
            margin-right: 0;
        }

        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner>.taxonomyContainer>.taxonomy>a,
        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner>.taxonomyContainer>.taxonomy>p {
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

        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner>.taxonomyContainer>.taxonomy>a:hover,
        .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner>.taxonomyContainer>.taxonomy>p:hover {
            color: #BFBFBF;
            border-color: #BFBFBF;
        }

        .ScrollCarousel.ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner>.readTimeContainer {
            grid-area: readTime;
        }

        .ScrollCarousel.liveCoverageArticles>.viewAllButton {
            max-width: 1920px;
            margin: 50px auto 0;
            padding: 0 50px;
            display: none;
        }

        .ScrollCarousel.liveCoverageArticles>.viewAllButton>.inner {
            max-width: 1320px;
            margin: 0 auto;
        }

        .ScrollCarousel.liveCoverageArticles>.viewAllButton>.inner>.roundedButton.light {
            border: 1px solid #000;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: none;
            border-radius: 30px;
            min-width: 150px;
            transition: background 200ms ease, opacity 200ms ease;
            padding: 0;
            cursor: pointer;
            opacity: 1;
            position: relative;
            background-color: #fff;
        }

        .ScrollCarousel.liveCoverageArticles>.viewAllButton>.inner>.roundedButton.light>a {
            opacity: 1;
            padding: 1em;
            font-size: 16px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-family: 'Gza';
            display: block;
            transition: color 200ms ease, opacity 200ms ease;
            position: relative;
            color: #000;
        }

        @media (max-width: 1180px) {
            .ScrollCarousel.liveCoverageArticles>.heading {
                padding: 0 20px;
            }

            .ScrollCarousel.liveCoverageArticles>.heading>h3 {
                font-size: 48px;
            }

            .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner>h6 {
                font-size: 30px;
            }

            .ScrollCarousel.liveCoverageArticles>.viewAllButton {
                padding: 0 20px;
            }
        }

        @media (max-width: 800px) {
            .ScrollCarousel.liveCoverageArticles>.ScrollCarouselButton {
                display: none;
            }
        }

        @media (max-width: 680px) {
            .ScrollCarousel.liveCoverageArticles>.heading>h3 {
                font-size: 44px;
            }

            .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item>.article>.inner>h6 {
                font-size: 26px;
            }

            .ScrollCarousel.liveCoverageArticles>.viewAllButton {
                margin-top: 10px;
            }
        }

        @media (max-width: 600px) {
            .ScrollCarousel.liveCoverageArticles>.outer>.inner>.item {
                width: 280px;
                padding: 0;
            }
        }
    </style>
<?php
}
