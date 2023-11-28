<?php
    $postID = get_the_ID();
    $postTerms = get_the_terms($postID, "articleType");
    $allPostTerm_names = [];
    $allPostTerm_slugs = [];

    for ($a = 0; $a < count($postTerms); $a++) {
        array_push($allPostTerm_slugs, $postTerms[$a]->slug);
        array_push($allPostTerm_names, $postTerms[$a]->name);
    }

    $articleType = "live-coverage";
    $articleArgs = array (
        'post_type' => $articleType,
        'posts_per_page' => 3,
        'post__not_in' => array (
            $postID
        ),
        'tax_query' => array(
            array(
                'taxonomy' => 'articleType',
                'field'    => 'slug',
                'terms'    => $allPostTerm_slugs
            )
        )
    );
    $articles = new WP_Query($articleArgs);
    $articleCount = wp_count_posts($articleType) -> publish;
    $allArticles = [];

    if ($articles -> have_posts()) {
        while ($articles -> have_posts()) {
            $article = array ();
            $articles -> the_post();
            $articleID = get_the_ID();
            $articleTypes = get_the_terms($articleID, "articleType");
            $title = get_the_title($articleID);
            $featureImage = get_the_post_thumbnail_url( $articleID, "full" );
            $href = get_the_permalink();

            if (have_rows('field_liveCoverage_details')) {
                while (have_rows('field_liveCoverage_details')) {
                    the_row();

                    $readingTime = get_sub_field('readingTime');
                }
            }

            $article["ID"] = $articleID;
            $article["articleTypes"] = $articleTypes;
            $article["title"] = $title;
            $article["readingTime"] = $readingTime;
            $article["featureImage"] = $featureImage;
            $article["href"] = $href;

            array_push($allArticles, $article);
        }

        wp_reset_postdata();
    }

    if (count($allArticles) > 0) {
?>
        <section class="RelatedArticles">
            <div class="outer">
                <div class="inner">
                    <div class="left">
                        <h6>Related articles</h6> 

                        <div class="taxonomyContainer">
<?php
                            for ($a = 0; $a < count($allPostTerm_names); $a++) {
?>
                                <div class="taxonomy" data-slug="<?php echo $allPostTerm_slugs[$a]; ?>">
                                    <a href="<?php echo home_url() . "/live-coverage-hub/" . $allPostTerm_slugs[$a] . "/"; ?>"><?php echo $allPostTerm_names[$a]; ?></a>
                                </div>  
<?php
                            }
?>
                        </div>
                    </div>

                    <div class="right">
                        <div class="articleContainer">
<?php
                            for ($a = 0; $a < count($allArticles); $a++) {
?>
                                <div class="article">
                                    <a href="<?php echo $allArticles[$a]["href"]; ?>"></a>

                                    <div class="inner">
                                        <div class="left">
                                            <div class="background" style="background-image: url(<?php echo $allArticles[$a]["featureImage"]; ?>);"></div>
                                        </div>

                                        <div class="right">
                                            <h6><?php echo $allArticles[$a]["title"]; ?></h6>

                                            <div class="taxonomyContainer">
<?php
                                                for ($b = 0; $b < count($allArticles[$a]["articleTypes"]); $b++) {
?>
                                                    <div class="taxonomy" data-slug="<?php echo $allArticles[$a]["articleTypes"][$b]->slug; ?>">
                                                        <a href="<?php echo home_url() . "/live-coverage-hub/" . $allArticles[$a]["articleTypes"][$b]->slug . "/"; ?>"><?php echo $allArticles[$a]["articleTypes"][$b]->name; ?></a>
                                                    </div>  
<?php
                                                }
?>
                                            </div>

                                            <div class="readTimeContainer">
                                                <p><?php echo $allArticles[$a]["readingTime"]; ?> min read</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php
                            }
?>
                    </div>
                </div>
            </div>
        </section>
<?php
    } 
?>