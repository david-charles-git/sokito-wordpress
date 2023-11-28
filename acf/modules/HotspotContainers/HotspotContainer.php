<?php
    $postID = get_the_ID(); 
    $productIsVegan = get_field('is_vegan');

    //hotspot details
    $descriptionCount = 6;
    $materialCount = 13;
    $imageVariants = [
        [
            "imageSrc" => "http://" . $_SERVER["HTTP_HOST"] . "/wp-content/themes/sokito/assets/images/sokitoBoot-Devista-black.webp",
            "imageAlt" => "",
            "swatchBackground" => "#000000",
            "isVegan" => false
        ],
        [
            "imageSrc" => "http://" . $_SERVER["HTTP_HOST"] . "/wp-content/themes/sokito/assets/images/sokitoBoot-Devista-blackWithRedTrim.webp",
            "imageAlt" => "",
            "swatchBackground" => "linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 40%, rgba(255,49,26,1) 40%, rgba(255,49,26,1) 60%, rgba(0,0,0,1) 60%)",
            "isVegan" => false
        ],
        [
            "imageSrc" => "http://" . $_SERVER["HTTP_HOST"] . "/wp-content/themes/sokito/assets/images/sokitoBoot-Devista-white.webp",
            "imageAlt" => "",
            "swatchBackground" => "#FFFFFF",
            "isVegan" => false
        ],
        [
            "imageSrc" => "http://" . $_SERVER["HTTP_HOST"] . "/wp-content/themes/sokito/assets/images/sokitoBoot-Devista-blue.webp",
            "imageAlt" => "",
            "swatchBackground" => "rgb(37, 99, 235)",
            "isVegan" => false
        ],
        [
            "imageSrc" => "http://" . $_SERVER["HTTP_HOST"] . "/wp-content/themes/sokito/assets/images/sokitoBoot-Devista-blackWithYellowTrim.webp",
            "imageAlt" => "",
            "swatchBackground" => "linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 40%, rgba(217,235,0,1) 40%, rgba(217,235,0,1) 60%, rgba(0,0,0,1) 60%)",
            "isVegan" => false
        ],
        [
            "imageSrc" => "http://" . $_SERVER["HTTP_HOST"] . "/wp-content/themes/sokito/assets/images/sokitoBoot-Devista-Vegan-white.webp",
            "imageAlt" => "",
            "swatchBackground" => "linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 40%, rgba(255,49,26,1) 40%, rgba(255,49,26,1) 60%, rgba(255,255,255,1) 60%)",
            "isVegan" => true
        ],
        [
            "imageSrc" => "http://" . $_SERVER["HTTP_HOST"] . "/wp-content/themes/sokito/assets/images/sokitoBoot-Devista-Vegan-black.webp",
            "imageAlt" => "",
            "swatchBackground" => "linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 40%, rgba(255,49,26,1) 40%, rgba(255,49,26,1) 60%, rgba(0,0,0,1) 60%)",
            "isVegan" => true
        ]
    ];

    //review details
    $reviewsPostArgs = array (
        'post_type' => "reviews",
        'posts_per_page' => -1,
        'tax_query' => array (
            array (
                'taxonomy' => 'reviewerType',
                'field' => 'slug',
                'terms' => 'verified-buyer',
            )
        )
    );
    $reviewPosts = new WP_Query($reviewsPostArgs);
    $reviewCount = $reviewPosts -> found_posts;//wp_count_posts( 'reviews' )->publish;
    $allReviews = [];
    $averageReviewRating = 0;

    if ($reviewPosts -> have_posts()) {
        while ($reviewPosts -> have_posts()) {
            $review = array ();
            $reviewPosts -> the_post();
            $reviewID = get_the_ID();
            $reviewerType = get_the_terms($reviewID, "reviewerType");

            if (have_rows('field_reviews')) {
                while (have_rows('field_reviews')) {
                    the_row();

                    $rating = get_sub_field('reviewRating');
                    $heading = get_sub_field('reviewHeading');
                    $body = get_sub_field('reviewBody');
                    $name = get_sub_field('reviewerName');
                    $position = get_sub_field('reviewerPosition');
                    $club = get_sub_field('reviewerClub');
                    $featureImage_src = get_sub_field("featureImage_src");
                    $featureImage_alt = get_sub_field("featureImage_alt");
                }
            }
        
            if (is_numeric($rating)) { $averageReviewRating += $rating; }

            $review["ID"] = $reviewID;
            $review["type"] = $reviewerType;
            $review["rating"] = $rating;
            $review["heading"] = $heading;
            $review["body"] = $body;
            $review["name"] = $name;
            $review["position"] = $position;
            $review["club"] = $club;
            $review["featureImage_src"] = $featureImage_src;
            $review["featureImage_alt"] = $featureImage_alt;

            array_push($allReviews, $review);
        }
    }

    $averageReviewRating = number_format($averageReviewRating / $reviewCount, 1);

    //product details
    $product = wc_get_product($postID); 
    $isInStock = true;
    $variations = $product->get_available_variations('array');
    $orderedVariations = [];
    $finalOrderedVariations = [];

    for ($a = 0; $a < count($variations); $a++) {
        array_push($orderedVariations, (float)str_replace('-','.', $variations[$a]['attributes']['attribute_pa_size']) );
    }

    sort($orderedVariations);

    for ($a = 0; $a < count($orderedVariations); $a++) {
        for ($b = 0; $b < count($variations); $b++) {
            if (str_replace('-','.', $variations[$b]['attributes']['attribute_pa_size']) == $orderedVariations[$a]) {
                array_push($finalOrderedVariations, $variations[$b]);
            }
        }
    }

?>
    <section id="productHotspotsModule" class="<?php if ($productIsVegan) { echo "isVegan"; } ?>">
        <!-- add to bag button start -->
        <div class="addToBagContainer">
            <div class="outer">
                <div class="inner">
                    <div class="contentConatiner">
                        <h6 class="productName">Devista</h6>

                        <p>£<span class="productPrice"><?php echo $product->get_price(); ?></span></p>
                    </div>

                    <div class="sizeContainer">
                        <div class="currentSize" openClose="open" onclick="handleSizeContainerClick()">
                            <p>Size: <span class="productSize">
<?php
                                for ($a = 0; $a < count($finalOrderedVariations); $a++) {
                                    $size = $finalOrderedVariations[$a]['attributes']['attribute_pa_size'];
                                    $isInStock = $finalOrderedVariations[$a]['is_in_stock'];

                                    if ($isInStock) {
                                        $a = count($finalOrderedVariations);

                                        echo $size;

                                    }

                                }
?>
                            </span></p>

                            <div class="arrowContainer" style="background-image: url(<?php echo "http://" . $_SERVER["HTTP_HOST"] . "/wp-content/themes/sokito/assets/images/Arrow_black_down.png"; ?>);"></div>
                        </div>

                        <div class="sizes">
                            <ul>
<?php
                                for ($a = 0; $a < count($finalOrderedVariations); $a++) {
                                    $ID = $finalOrderedVariations[$a]["variation_id"];
                                    $size = $finalOrderedVariations[$a]['attributes']['attribute_pa_size'];
                                    $isInStock = $finalOrderedVariations[$a]['is_in_stock'];
?>
                                    <li data-variation-id="<?php echo $ID; ?>" data-variation-size="<?php echo $size; ?>" class="size <?php if (!$isInStock) { echo 'outOfStock'; } ?>" onclick="handleChangeSizeClick()">
                                        <p>
<?php
										    echo str_replace('-','.', $size);
?>
                                        </p>
                                    </li>
<?php
                                }
?>
                            </ul>
                        </div>
                    </div>

                    <div class="addToBagButtonContainer">
                        <button id="hotSpotAddProductToBag" class="disabled" onclick="handleHotspotAddToBagClick()">Add to bag</button>

                        <input type="hidden" id="hotSpotProductIDContainer" value="<?php echo $postID; ?>" />
                        <!-- <input type="hidden" id="hotSpotProductSKUCotnainer" value="" /> -->
                        <input type="hidden" id="hotSpotProductQantityCotnainer" value="1" />
                        <input type="hidden" id="hotSpotProductVariationIDCotnainer" value="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- add to button end -->

        <div id="tabContainer" class="tabContainer">
            <div class="outer">
                <div class="inner">
                    <div class="tab active" onclick="handleViewChange(this)" data-name="description">
                        <p class="">Description</p>
                    </div>

                    <div class="tab" onclick="handleViewChange(this)" data-name="materials">
                        <p class="">Materials</p>
                    </div>

                    <div class="tab" onclick="handleViewChange(this)" data-name="reviews">
                        <p class="">Reviews (<span id="reviewContainer"><?php echo $reviewCount; ?></span>)</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="detailsContainer" class="detailsContainer" style="height: 185px;">
            <div class="outer">
                <div class="inner">
                    <div class="details active" data-name="description">
                        <div class="inner">
                            <p>Devista is born to be a menace. It’s handcrafted with specialised components that allow you to keep the ball at your feet and away from opponents.<br /><br />It’s engineered from sustainably-sourced, high performance materials to keep your game impacting the pitch, rather than the planet.<br /><br />The result? A performance boot that changes the game.</p>
                        </div>
                    </div>

                    <div class="details" data-name="materials">
                        <div class="inner">
                            <p>Take a look through the materials we're currently using for the Devista, and the innovative changes we're looking to make in the future. Even though we're already the most eco-friendly boots, we're always wanting more ways to make our boots 100% sustainable.</p>
                        </div>
                    </div>

                    <div class="details reviews" data-name="reviews">
                        <div class="inner">
                            <div class="ratingCotnainer">
                                <div class="rating">
                                    <p><?php echo $averageReviewRating; ?></p>
                                </div>

                                <div class="starContainer">
                                    <div class="backgroundStars">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                            <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)"/>
                                        </svg>  

                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                            <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)"/>
                                        </svg>  

                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                            <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)"/>
                                        </svg>  

                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                            <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)"/>
                                        </svg>  

                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                            <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)"/>
                                        </svg>  
                                    </div>

                                    <div class="foregroundStars" style="width: <?php echo (($averageReviewRating / 5) * 100); ?>%;">
                                        <div class="inner">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)"/>
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)"/>
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)"/>
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)"/>
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="countContainer">
                                    <p>Based on <?php echo $reviewCount; ?> reviews</p>
                                </div>
                            </div>
                        
                            <div class="reviewsCarousel" id="hotspotReviewCarousel">
                                <button class="carouselButton left" onclick="handleReviewCarouselLeftButtonClick()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                                        <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                                    </svg>
                                </button>

                                <div class="outer" ontouchstart="handleReviewCarouselTouchStart()" ontouchend="handleReviewCarouselTouchEnd()" ontouchcancel="handleReviewCarouselTouchEnd()">
                                    <div class="inner carouselInner" style="grid-template-columns: repeat(<?php echo $reviewCount; ?>, auto);">
<?php
                                        for ($a = 0; $a < $reviewCount; $a++) {
?>
                                            <div class="reviewCard carouselItem <?php if ($a == 0) { echo "active"; } ?>">
<?php
                                                if (is_numeric($allReviews[$a]["rating"])) {
?>
                                                    <div class="starContainer">
                                                        <div class="backgroundStars">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                                <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)"/>
                                                            </svg>

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                                <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)"/>
                                                            </svg>

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                                <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)"/>
                                                            </svg>

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                                <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)"/>
                                                            </svg>

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                                <path id="Path_68" data-name="Path 68" d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9ZM101.6,94.888a.514.514,0,0,0-.147.531l1.375,4.534-4.2-3.26-4.246,3.26,1.587-5.064L92.34,92.042h4.245l2.045-5.034,1.538,5.034h4.58Z" transform="translate(-90.66 -85.359)"/>
                                                            </svg>
                                                        </div>

                                                        <div class="foregroundStars" style="width: <?php echo (($allReviews[$a]["rating"] / 5) * 100); ?>%;">
                                                            <div class="inner">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                                    <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)"/>
                                                                </svg>

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                                    <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)"/>
                                                                </svg>

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                                    <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)"/>
                                                                </svg>

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                                    <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)"/>
                                                                </svg>

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.941 16.451">
                                                                    <path d="M106.084,91.014H100.8l-1.685-5.3a.514.514,0,0,0-.966-.039l-2.182,5.334h-4.8a.514.514,0,0,0-.344.9l3.9,3.516L93,101.147a.514.514,0,0,0,.8.56l4.833-3.594,4.833,3.594a.514.514,0,0,0,.8-.562l-1.732-5.71,3.9-3.524a.514.514,0,0,0-.345-.9Z" transform="translate(-90.66 -85.359)"/>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
<?php
                                                }

                                                if ($allReviews[$a]["heading"]) {
?>
                                                    <h6>
                                                        <?php echo $allReviews[$a]["heading"]; ?>
                                                    </h6>
<?php
                                                }

                                                if ($allReviews[$a]["featureImage_src"]) {
?>
                                                    <div class="imageContainer">
                                                        <img src="<?php echo $allReviews[$a]["featureImage_src"]; ?>" alt="<?php echo $allReviews[$a]["featureImage_alt"]; ?>" />
                                                    </div>
<?php
                                                }

                                                if ($allReviews[$a]["body"]) {
?>
                                                    <p class="body">
                                                        <?php echo $allReviews[$a]["body"]; ?>
                                                    </p>
<?php
                                                }

                                                if ($allReviews[$a]["name"]) {
?>
                                                    <p class="name">
<?php
                                                        echo $allReviews[$a]["name"];

                                                        if ($allReviews[$a]["position"]) {
                                                            echo " - " . $allReviews[$a]["position"];
                                                        }

                                                        if ($allReviews[$a]["club"]) {
                                                            echo " - " . $allReviews[$a]["club"];
                                                        }
?>
                                                    </p>
<?php
                                                }
                                                        
                                                if ($allReviews[$a]["type"]) {
?>
                                                    <p class="tag"><?php echo $allReviews[$a]["type"][0] -> name; ?></p>
<?php
                                                }
?>                                                    
                                            </div>
<?php
                                        }
?>
                                    </div>
                                </div>

                                <button class="carouselButton right active" onclick="handleReviewCarouselRightButtonClick()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                                        <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                                    </svg>
                                </button>

                                <div class="tabContainer" style="grid-template-columns: repeat(<?php echo $reviewCount; ?>,auto);">
<?php
                                    for ($a = 0; $a < $reviewCount; $a++) {
?>
                                        <div data-id="<?php echo $a; ?>" class="naigationTab <?php if ($a == 0) { echo "active"; } ?>" onclick="handleReviewCarouselNaviagationTabClick()"></div>
<?php
                                    }
?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="hotspotContainer" class="hotspotContainer active">                
            <div class="outer">
                <div class="inner">
                    <div class="contentContainer left">
                        <div class="contentGroup active" data-name="description">
                            <div class="content description" data-id="description-3">
                                <div class="inner">
                                    <h5 class=""><span>Development</span> period</h5>

                                    <p>Instead of designing a boot only to find out it wasn’t possible to make it eco-friendly, we reverse engineered a boot and packed as many eco-friendly materials into the shoe as possible. Each material factored in Performance, Planet and Price to give us the optimal performance boot.</p>
                                </div>
                            </div>

                            <div class="content description" data-id="description-4">
                                <div class="inner">
                                    <h5 class=""><span>Tech</span> specs</h5>

                                    <p>
                                        Weight: 214g (comparatively speaking, this is similar to a Nike Mercurial, the most recognisable lightweight speed boot on the market)<br />
                                        Soleplate: FG (Firm ground) - For hard, dry grass and artificial turf surfaces.<br />
                                        SG (Soft ground) - Made for the UK’s wintery months, when playing surfaces are more of a swamp than a pitch. (Soft, Muddy and wet grass surfaces).
                                    </p>
                                </div>
                            </div>

                            <div class="content description" data-id="description-5">
                                <div class="inner">
                                    <h5 class=""><span>Non-slip</span> grip</h5>

                                    <p>Our eco-suede lining is 85% recycled polyester, sourced from discarded plastic bottles. The material has a suede type texture, for a super soft ‘slipper-like’ touch and a non-slip grippy texture, to lock the foot into place.</p>
                                </div>
                            </div>
                        </div>  

                        <div class="contentGroup" data-name="materials">
                            <div class="content materials" data-id="materials-6">
                                <div class="inner">
                                    <h5 class=""><span>Castor</span> bean soleplate</h5>

                                    <p>Today, castor oil helps us to create sustainably produced plastic. Traditionally, your tupperware would be made from fossil fuels (unrefined petrol), which creates a shedload of CO<span class="subscript">2</span>. But castor oil creates a renewable carbon variant without the nasty side effects. Castor oil is a feedstock that takes less than one year to grow and does not compete with the human or animal food chain. It is inherently drought resistant, requiring little irrigation or fertilisation. The percentage of renewable carbon is 87 - 91%.</p>
                                </div>
                            </div>

                            <div class="content materials" data-id="materials-7">
                                <div class="inner">
                                    <h5 class=""><span>Soft</span> ground studs</h5>

                                    <p>
                                        Sokito was born in the UK, so we understand the need for grip when the pitch turns to a swamp. Our soft ground studs are produced from 100% aluminium, that’s all.
                                        <br />
                                        Aluminium fact of the day… 75% of all of the aluminium ever produced is still in circulation. It can be melted down and re-used countless times, which makes it perfect for the studs in the Devista.
                                    </p>
                                </div>
                            </div>

                            <div class="content materials" data-id="materials-8">
                                <div class="inner">
                                    <h5 class=""><span>Eco-foam</span> insole</h5>

                                    <p>Sokito’s insoles are produced using eco-foam. Super lightweight with exceptional rebound properties, they’ll have you feeling like you’re running on clouds. Eco-foam contains 20% recycled rubber.</p>
                                </div>
                            </div>

                            <div class="content materials" data-id="materials-9">
                                <div class="inner">
                                    <h5 class=""><span>Stitching</span> thread</h5>

                                    <p>Talk about an unsung hero. Stitching thread is rarely noticed, but without it, football boots would be nothing more than a pile of material. We eco-analysed every component in the Devista and replaced the traditional polyester thread with an alternative made from 100% recycled plastic bottles.</p>
                                </div>
                            </div>

                            <div class="content materials" data-id="materials-10">
                                <div class="inner">
                                    <h5 class=""><span>Heel</span> Counter</h5>

                                    <p>A heel counter is a vital piece in the football boot puzzle. It provides structure and protection to the heel area and can play a vital part in the overall comfort of the boot. Ours sits between the upper and the lining and is made with TPE (40% of that being recycled). We have limited traceability on this material at the moment and are working on ways to certify the origin of the raw material.</p>
                                </div>
                            </div>

                            <div class="content materials" data-id="materials-11">
                                <div class="inner">
                                    <h5 class=""><span>Eco-suede</span> lining</h5>

                                    <p>Recycled polyester is sourced from recycled PET bottles, which are collected, cleaned and spun into new polyester fibre. The lining in each pair contains 1.08 recycled bottles.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="slider">
                        <div class="inner">
                            <div class="imageContainer">
                                <div class="image">
<?php
                                    $initlaActiveIndex = $productIsVegan ? 5 : 0;

                                    for ($a = 0; $a < count($imageVariants); $a++) {
?>
                                        <img class="<?php if ($a === $initlaActiveIndex) { echo "active "; } if ($imageVariants[$a]["isVegan"]) { echo "isVegan"; } ?>" src="<?php echo $imageVariants[$a]["imageSrc"]; ?>" alt="<?php echo $imageVariants[$a]["imageAlt"]; ?>" data-id="<?php echo $a; ?>" />
<?php
                                    }
?>
                                </div>
                            </div>

                            <div class="hotspots active" data-name="description">
<?php
                                for ($a = 0; $a < $descriptionCount; $a++) {
?>
                                    <div class="hotspot description" data-id="description-<?php echo $a; ?>" onmouseenter="showHotspotCardHover(this)" onmouseleave="handleMouseLeave()" onclick="showHotspotCardClick(this)"></div>
<?php
                                }
?>                                
                            </div>

                            <div class="hotspots" data-name="materials">
<?php
                                $veganMaterialsID = 3;
                                for ($a = 0; $a < $materialCount; $a++) {
?>
                                    <div class="hotspot materials <?php if ($a == $veganMaterialsID) { echo "isVegan"; } ?>" data-id="materials-<?php echo $a; ?>" onmouseenter="showHotspotCardHover(this)" onmouseleave="handleMouseLeave()" onclick="showHotspotCardClick(this)"></div>
<?php
                                }
?>
                            </div>
                        </div>  
                    </div>

                    <div class="contentContainer right">
                        <div class="contentGroup active" data-name="description">
                            <div class="content" data-id="description-0">
                                <div class="inner">
                                    <h5 class=""><span>Engineered</span> lacing system</h5>

                                    <p>Off-centre lacing opens surface area on the medial side of the shoe (the strike zone), allowing for cleaner contact,higher levels of control and greater shot power.</p>
                                </div>
                            </div>

                            <div class="content" data-id="description-1">
                                <div class="inner">
                                    <h5 class=""><span>Comfort</span> toe padding</h5>

                                    <p>The ‘package’ (combination of materials) in the toe area has been specifically designed to optimise both comfort and performance, with a mix of soft upper materials and strategically placed padding and protection.</p>
                                </div>
                            </div>

                            <div class="content" data-id="description-2">
                                <div class="inner">
                                    <h5 class=""><span>Crafted</span> by hand</h5>

                                    <p>European production allows for tighter controls on quality and employee working conditions, whilst minimising supply chain emissions. Our handmade production methods allow us to maximise material optimisation, ensuring less waste materials.</p>
                                </div>
                            </div>
                        </div>

                        <div class="contentGroup" data-name="materials">
                            <div class="content materials" data-id="materials-0">
                                <div class="inner">
                                    <h5 class=""><span>Eco-lastic</span> tongue strap</h5>

                                    <p>
                                        Okay, it’s a small detail. And yes, it’s only on one of our boots. But every little detail matters to us at Sokito. 
                                        <br />
                                        The elastic that holds down your fold over tongue is made with 70% recycled plastic bottles and 30% spandex (to make it stretchy).
                                        <br />
                                        Each pair contains 0.37 recycled bottles.
                                    </p>
                                </div>
                            </div>

                            <div class="content materials" data-id="materials-1">
                                <div class="inner">
                                    <h5 class=""><span>Eco</span>-laces</h5>

                                    <p>Every Sokito shoelace is produced using 100% recycled polyester, from discarded plastic bottles. Each pair contains 1.09 recycled bottles, with the lace tips made from plant based cellulose too.</p>
                                </div>
                            </div>

                            <div class="content materials" data-id="materials-2">
                                <div class="inner">
                                    <h5 class=""><span>Upper</span> reinforcement</h5>

                                    <p>The upper reinforcement is made from cellulose, which consists of 100% waste paper fibres. Collected from sustainable wood sources, we use the material to reinforce our boots. Its strength prevents overstretching but stays soft to move and mould to your feet. You’re protected, even if you can’t see it.</p>
                                </div>
                            </div>

                            <div class="content materials isVegan" data-id="materials-3">
                                <div class="inner">
                                    <h5 class=""><span>Kangaroo</span> leather vamp</h5>

                                    <p>Kangaroo leather is tough-as-nails, which is excellent for durability. It’s also incredibly soft, which ensures a comfortable and flexible fit.  Our kangaroo leather comes from only wild kangaroos down under and is a bi-product of governmental population control which is enforced to protect local agriculture. Most brands hide behind the ‘K-leather’ term, not us. All tannage and material dyes are REACH compliant and comply with ecological and toxicological criteria for the EU ecolabel award. All scrap leather, from both supplier and Sokito production is recycled into fertiliser.</p>
                                </div>
                            </div>

                            <div class="content materials" data-id="materials-4">
                                <div class="inner">
                                    <h5 class=""><span>Cotton</span> vamp reinforcement</h5>

                                    <p>
                                        Unless you’re like us and spend your days taking apart football boots, you likely won’t know that this component of a boot exists. 
                                        <br />
                                        Football boots often require reinforcement in the vamp (toe area) to prevent overstretching. In leather boots, this is usually virgin nylon (not very good for mother nature). Sokito switched the plastic for a natural cotton material (better for mother nature). Right now we have limited traceability on the raw material but we’re working on ways to guarantee that all of our cotton is organic (best for mother nature).
                                    </p>
                                </div>
                            </div>

                            <div class="content materials" data-id="materials-5">
                                <div class="inner">
                                    <h5 class=""><span>Eco-suede</span> insole top cloth</h5>

                                    <p>
                                        Our insoles are topped with a non-slip eco-suede, which is made up of 51% recycled polyester, produced from discarded plastic bottles.
                                        <br />
                                        The material locks the foot into place to prevent slipping and improve grip to help with push-off speed
                                        <br />
                                        Each pair contains 0.41 recycled bottles (size 9)
                                    </p>
                                </div>
                            </div>

                            <div class="content materials" data-id="materials-12">
                                <div class="inner">
                                    <h5 class=""><span>Innovation</span></h5>

                                    <p>As a planet positive brand, we’re committed to transparency. Here are the materials that we currently have to use but are working hard to find alternatives for:<span class="tick"><strong>Stud tips – Virgin TPU –</strong> To guarantee abrasion resistance.</span><span class="tick"><strong>Lasting insole – Polypropylene –</strong> To avoid stud pressure.</span><span class="tick"><strong>Eyestay reinforcement - Fibreglass –</strong> To make sure lace holes don’t tear.</span><span class="tick"><strong>Foam padding – Virgin materials –</strong> For consistent softness and rebound.</span><span class="tick"><strong>Adhesive – Solvent based –</strong> To keep the boot in one piece.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="colorSwitchContainer">
<?php
                        for ($a = 0; $a < count($imageVariants); $a++) {
?>
                            <div class="colorSwitch <?php if($a === 0) { echo "active "; } if ($imageVariants[$a]["isVegan"]) { echo "isVegan"; } ?>" onclick="handleColorSwicth(this)" data-id="<?php echo $a; ?>">
                                <div class="inner" style="background: <?php echo $imageVariants[$a]["swatchBackground"]; ?>;"></div>
                            </div>
<?php
                        }
?>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
                    
    <style>
        .subscript {
            font-size:0.6em;
        }
        @media (max-width: 600px) {
            #productHotspotsModule > .tabContainer > .outer > .inner > .tab > p {
                min-width: 200px;
                text-align: center;
            }
        }
        #productHotspotsModule {
            background-color: #F7F7F7;
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
            -ms-grid-columns: 1fr;
            grid-template-columns: 1fr;
            grid-gap: 40px;
            position: relative;
            max-width: 100vw;
            overflow-x: clip !important;
        }
        #productHotspotsModule > div > .outer {
            max-width: 1920px;
            padding: 0 50px;
            margin: 0 auto;
            position: relative;
        }
        #productHotspotsModule > div > .outer > .inner {
            max-width: 1320px;
            margin: 0 auto;
        }
        #productHotspotsModule > .addToBagContainer {
            z-index: 5;
            position: relative;
            opacity: 0;
            transition: opacity 200ms ease;
        }
        #productHotspotsModule > .addToBagContainer.active {
            opacity: 1;
        }
        #productHotspotsModule > .addToBagContainer > .outer {
            max-width: 1320px;
            margin: 0 auto;
            padding: 0;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner {
            position: absolute;
            top: 40px;
            right: 0;
            background-color: #fff;
            -webkit-box-shadow: 0px 2px 3px rgb(0 0 0 / 30%);
                    box-shadow: 0px 2px 3px rgb(0 0 0 / 30%);
            border-radius: 80px;
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
                grid-template-areas: "content sizes button";
            grid-gap: 20px;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .contentConatiner {
            -ms-grid-row: 1;
            -ms-grid-column: 1;
            grid-area: content;
            padding-left: 30px;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .contentConatiner > h6 {
            font-size: 18px;
            line-height: 1.1;
            font-weight: bold;
            display: inline-block;
            vertical-align: middle;
            margin-bottom: 0;
            font-family: 'Univers LT Roman';
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .contentConatiner > p {
            display: inline-block;
            vertical-align: top;
            font-size: 18px;
            line-height: 1.1;
            color: #FC4F00;
            font-family: 'Gza';
            margin-left: 10px;
            transform: translateY(2px);
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer {
            -ms-grid-row: 1;
            -ms-grid-column: 3;
            grid-area: sizes;
            position: relative;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer > .currentSize {
            cursor: pointer;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer > .currentSize > .sizes {
            position: absolute;
            width: 100%;
            -webkit-transform: translateY(15px);
                -ms-transform: translateY(15px);
                    transform: translateY(15px);
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer > .currentSize > p {
            font-size: 14px;
            line-height: 1.1;
            font-weight: bold;
            display: inline-block;
            vertical-align: middle;
            font-family: 'Univers LT Roman';
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer > .currentSize > .arrowContainer {
            display: inline-block;
            vertical-align: middle;
            width: 15px;
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
            height: 10px;
            -webkit-transform: rotate(0deg) translateY(-2px);
                -ms-transform: rotate(0deg) translateY(-2px);
                    transform: rotate(0deg) translateY(-2px);
            -webkit-transition: -webkit-transform 200ms ease;
            transition: -webkit-transform 200ms ease;
            -o-transition: transform 200ms ease;
            transition: transform 200ms ease;
            transition: transform 200ms ease, -webkit-transform 200ms ease;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer.active > .currentSize > .arrowContainer {
            -webkit-transform: rotate(180deg);
                -ms-transform: rotate(180deg);
                    transform: rotate(180deg);
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer > .sizes {
            height: 0;
            position: absolute;
            width: 100%;
            -webkit-transform: translateY(15px);
                -ms-transform: translateY(15px);
                    transform: translateY(15px);
            overflow: hidden !important;
            -webkit-transition: height 200ms ease;
            -o-transition: height 200ms ease;
            transition: height 200ms ease;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer > .sizes > ul {
            overflow: hidden !important;
            background-color: #ffffff;
            border-radius: 0 0 20px 20px;
            -webkit-box-shadow: 0px 2px 3px rgb(0 0 0 / 30%);
                    box-shadow: 0px 2px 3px rgb(0 0 0 / 30%);
            padding: 0;
            margin: 0;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer > .sizes > ul > li {
            cursor: pointer;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer > .sizes > ul > li.outOfStock {
            display: none;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer > .sizes > ul > li > p {
            text-align: right;
            padding: 10px 20px;
            font-size: 14px;
            line-height: 1.1;
            font-weight: bold;
            -webkit-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer > .sizes > ul > li > p:hover {
            color: #fff;
            background-color: #FF5001;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButton {
            -ms-grid-row: 1;
            -ms-grid-column: 5;
            grid-area: button;
            height:100%;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButton > .inner,
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButton > .inner > .woocommerce,
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButton > .inner > .woocommerce > .single-product,
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButton > .inner > .woocommerce > .single-product > .variations_form,
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButton > .inner > .woocommerce > .single-product > .variations_form > .single_variation_wrap,
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButton > .inner > .woocommerce > .single-product > .variations_form > .single_variation_wrap > .woocommerce-variation-add-to-cart,
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButton > .inner > .woocommerce > .single-product > .variations_form > .single_variation_wrap > .woocommerce-variation-add-to-cart > button {
            height:100%;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButton > .inner > .woocommerce > .single-product > .variations_form > .single_variation_wrap > .woocommerce-variation-add-to-cart > button {
            font-family: 'Gza' !important;
            font-size: 18px !important;
            font-weight: 400;
            line-height: 1.1;
            letter-spacing: 0.01em;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButton > .inner > p {
            padding: 15px 30px;
            background-color: #FC4F00;
            border-radius: 80px;
            font-size: 18px;
            color: #fff;
            font-family: 'Gza';
            cursor: pointer;
            -webkit-transition: background-color 200ms ease;
            -o-transition: background-color 200ms ease;
            transition: background-color 200ms ease;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButton > .inner > p:hover {
            background-color: #E24700;
        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButtonContainer {

        }
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButtonContainer > button {
			border: none;
			background: none;
			appearance: none;
			font-size: 14px;
			line-height: 1.1;
			letter-spacing: 0.01em;
			font-family: 'Gza';
			font-weight: 400;
			background-color: #FC4F00;
			text-align: center;
			padding: 1em 2em;
			border-radius: 30px;
			width: 100%;
			color: #fff;
			cursor: pointer;
			transition: background 200ms ease, opacity 200ms ease;
			position: relative;
            height: 58px;
            opacity: 1;
		}
		#productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButtonContainer > button.disabled,
		#productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButtonContainer > button.disabled::after {
			background-color: #E24700;
			cursor: not-allowed;
		}
        #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButtonContainer > button.disabled {
            opacity: 0.6;
        }
		#productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButtonContainer > button:hover {
			background-color: #E24700;
		}
		#productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButtonContainer > button.disabled:hover {
			background-color: #E24700;
		}
		#productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButtonContainer > button::after {
			content: "Adding...";
			position: absolute;
			top: 0;
			left: 0;
			border: none;
			background: none;
			appearance: none;
			font-size: 18px;
			line-height: 1.1;
			letter-spacing: 0.01em;
			font-family: 'Gza';
			font-weight: bold;
			background-color: #FC4F00;
			text-align: center;
			padding: 1em 2em;
			border-radius: 30px;
			width: 100%;
			color: #fff;
			cursor: pointer;
			opacity: 0;
			z-index: 0;
			transition: opacity 200ms ease;
		}
		#productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButtonContainer > button.loading::after {
			opacity: 1;
			z-index: 2;
			cursor: not-allowed;
		}
        #productHotspotsModule > .tabContainer {
            width: 100%;
            max-width: 100vw;
        }
        #productHotspotsModule > .tabContainer > .outer {
            overflow: hidden !important;
            overflow-x: scroll !important;
        }
        #productHotspotsModule > .tabContainer > .outer::-webkit-scrollbar {
            display: none;
        }
        #productHotspotsModule > .tabContainer > .outer > .inner {
            font-size: 0;
        }
        #productHotspotsModule > .tabContainer > .outer > .inner > .tab {
            display: inline-block;
            width: auto;
            margin: 0 10px;
        }
        #productHotspotsModule > .tabContainer > .outer > .inner > .tab:nth-child(1) {
            margin-left: 0;
        }
        #productHotspotsModule > .tabContainer > .outer > .inner > .tab:nth-last-child(1) {
            margin-right: 0;
        }
        #productHotspotsModule > .tabContainer > .outer > .inner > .tab > p {
            padding: 1em 2em;
            background-color: #fff;
            cursor: pointer;
            color: #000;
            border-radius: 30px;
            font-family: 'Gza';
            font-size: 18px;
            line-height: 1.1;
            letter-spacing: 0.3px;
            -webkit-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
            border: 1px solid #fff;
        }
        #productHotspotsModule > .tabContainer > .outer > .inner > .tab.active > p {
            background-color: #000;
            color: #fff;
            border-color: #000;
        }
        #productHotspotsModule > .tabContainer > .outer > .inner > .tab:hover > p {
            border-color: #000;
        }
        #productHotspotsModule > .detailsContainer {
            width: 100%;
            max-width: 100vw;
            -webkit-transition: height 200ms ease;
            -o-transition: height 200ms ease;
            transition: height 200ms ease;
            padding-bottom: 0px;
            -webkit-box-sizing: content-box;
                    box-sizing: content-box;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner {
            position: relative;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details {
            opacity: 0;
            max-width: 920px;
            margin-left: 0;
            position: absolute;
            top: 0;
            left: 0;
            -webkit-transition: opacity 200ms ease;
            -o-transition: opacity 200ms ease;
            transition: opacity 200ms ease;
            z-index:2;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.active {
            opacity: 1;
            z-index: 4;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details > .inner > h3 {
            margin-bottom: 20px;
            font-family: 'Gza';
            font-size: 38px;
            line-height: 45px;
            letter-spacing: 0.8px;
            font-weight: 400;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details > .inner p span.tick {
            display: block;
            font-family: 'Univers LT Roman';
            font-size: 18px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            margin-top: 1em;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details > .inner p span.tick::before {
            display: inline-block;
            vertical-align: middle;
            width: calc(100% - 25px);
            width: 15px;
            height: 15px;
            content: "";
            margin-right: 10px;
            background-image: url("<?php echo "http://" . $_SERVER["HTTP_HOST"] . "/wp-content/themes/sokito/assets/images/Icon\ ionic-ios-checkmark-orange.svg"; ?>");
            background-position: center center;
            background-size: contain;
            background-repeat: no-repeat;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews {
            max-width: 100%;
            padding: 0 0 30px 0;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews {
            max-width: 100%;
            padding: 0;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner {
            padding-bottom: 50px;
            padding-top: 60px;
            position: relative;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > h3 {
            max-width: 50%;
            display: inline-block;
            vertical-align: middle;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer {
            max-width: 50%;
            vertical-align: middle;
            display: -ms-grid;
            display: grid;
            grid-gap: 10px;
                grid-template-areas:
                "rating star"
                "rating count";
            -ms-flex-line-pack: center;
                align-content: center;
            -webkit-box-pack: center;
                -ms-flex-pack: center;
                    justify-content: center;
            -webkit-box-align: start;
                -ms-flex-align: start;
                    align-items: start;
            position: absolute;
            top: 0;
            right: 0;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer > .rating {
            -ms-grid-row: 1;
            -ms-grid-row-span: 3;
            -ms-grid-column: 1;
            grid-area: rating;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer > .rating > p {
            font: normal normal normal 32px Gza;
            letter-spacing: 0.76px;
            color: #48A18A;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer > .starContainer {
            -ms-grid-row: 1;
            -ms-grid-column: 3;
            grid-area: star;
            position: relative;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .starContainer {
            position: relative;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer > .starContainer > .backgroundStars,
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .starContainer > .backgroundStars {
            opacity: 0.3;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer > .starContainer > .foregroundStars,
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .starContainer > .backgroundStars {
            position: absolute;
            top: 0;
            left: 0;
            overflow: hidden !important;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer > .starContainer > .foregroundStars > .inner,
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .starContainer > .foregroundStars > .inner {
            width: calc(5 * 34px);
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer > .starContainer svg,
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .starContainer svg {
            width: 30px;
            height: 30px;
            display: inline-block;
            vertical-align: middle;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .starContainer svg {
            width: 20px;
            height: 20px;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .starContainer > .foregroundStars {
            overflow: hidden;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .starContainer > .foregroundStars > .inner {
            width: calc(5 * 24px);
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer > .countContainer {
            -ms-grid-row: 3;
            -ms-grid-column: 3;
            grid-area: count;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer > .countContainer > p {
            text-align: right;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel {
            margin-top: 20px;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel > button.carouselButton {
            position: absolute;
            top: 50%;
            -webkit-transform: translate(0, -50%);
                -ms-transform: translate(0, -50%);
                    transform: translate(0, -50%);
            padding: 10px;
            background-color: #000;
            z-index: 10;
            opacity: 0;
            -webkit-transition: opacity 200ms ease, padding 200ms ease;
            -o-transition: opacity 200ms ease, padding 200ms ease;
            transition: opacity 200ms ease, padding 200ms ease;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel > button.carouselButton.active {
            opacity: 1;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel > button.carouselButton.left {
            -webkit-transform: translate(0, -50%) rotate(180deg);
                -ms-transform: translate(0, -50%) rotate(180deg);
                    transform: translate(0, -50%) rotate(180deg); 
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel > button.carouselButton.left:hover {
            padding-left: 20px;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel > button.carouselButton.right:hover {
            padding-right: 20px;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel > .outer > .inner {
            display: -ms-grid;
            display: grid;
            grid-gap: 20px;
            -ms-flex-line-pack: center;
                align-content: center;
            -webkit-box-pack: start;
                -ms-flex-pack: start;
                    justify-content: start;
            -webkit-box-align: start;
                -ms-flex-align: start;
                    align-items: start;
            -webkit-transition: -webkit-transform 200ms ease;
            transition: -webkit-transform 200ms ease;
            -o-transition: transform 200ms ease;
            transition: transform 200ms ease;
            transition: transform 200ms ease, -webkit-transform 200ms ease;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard {
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            width: calc((1310px - 30px) / 3);
            opacity: 0.6;
            -webkit-transition: opacity 200ms ease;
            -o-transition: opacity 200ms ease;
            transition: opacity 200ms ease;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard.active,
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard.active + .reviewCard,
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard.active + .reviewCard + .reviewCard {
            opacity: 1;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard > .starContainer {
            margin-bottom: 20px;
            width: calc(5 * 24px);
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard > .imageContainer {
            padding: 20px 0;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard > .imageContainer > img {
            width: 100%;
            aspect-ratio: 16 / 9;
            object-fit: cover;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard > h6 {
            font-family: 'Gza';
            font-style: italic;
            font-size: 32px;
            color: rgb(13, 148, 136);
            font-weight: 400;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard > .body {
            margin: 20px 0;
            font-size: 14px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-family: 'Univers LT Roman';
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard > .name {
            font-weight: 700;
            font-size: 14px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-family: 'Univers LT Roman';
            margin-bottom: 5px;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard > .tag {
            color: rgb(156, 163, 175);
            font-size: 14px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-family: 'Univers LT Roman';
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel > .tabContainer {
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
            margin-top: 30px;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel > .tabContainer > .naigationTab {
            width: 20px;
            height: 5px;
            background: #000;
            border-radius: 10px;
            opacity: 0.4;
            -webkit-transition: opacity 200ms ease;
            -o-transition: opacity 200ms ease;
            transition: opacity 200ms ease;
            cursor: pointer;
        }
        #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel > .tabContainer > .naigationTab.active {
            opacity: 1;
        }

        @media (max-width: 1420px) {
            #productHotspotsModule > .addToBagContainer > .outer > .inner {
                right: 50px;
            }
        }

        @media (max-width: 1200px) {
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard.active + .reviewCard + .reviewCard {
                opacity: 0.6;
            }
        }

        @media (max-width: 1080px) {
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer > .starContainer svg,
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .starContainer svg {
                width: 20px;
                height: 20px;
            }
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer > .starContainer > .foregroundStars > .inner,
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .starContainer > .foregroundStars > .inner {
                width: calc(5 * 24px);
            }
        }

        @media (max-width: 800px) {
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard.active + .reviewCard {
                opacity: 0.6;
            }
        }

        @media (max-width: 600px) {
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > h3 {
                display: block;
                max-width: unset;
            }
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer {
                float: none;
                text-align: right;
                max-width: unset;
                -webkit-box-pack: end;
                    -ms-flex-pack: end;
                        justify-content: end;
            }
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard {
                width: 280px;
            }
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .reviewsCarousel .reviewCard > h6 {
                font-size: 30px;
            }
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details.reviews > .inner > .ratingCotnainer > .starContainer > .foregroundStars {
                left: 4px;
            }
        }

        #productHotspotsModule > .hotspotContainer  {
            width: 100%;
            max-width: 100vw;
            display: none;
            position: relative;
            z-index:2;
        }
        #productHotspotsModule > .hotspotContainer.active {
            display: block;
        }
        #productHotspotsModule > .hotspotContainer > .outer {
            position: relative;
            padding: 0;
            padding-bottom: 50px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner {
            max-width: 1920px;
            display: -ms-grid;
            display: grid;
            -ms-grid-columns: 1fr;
            grid-template-columns: 1fr;
                grid-template-areas: 
                "slider"
                "colorSwitch";
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider {
            -ms-grid-row: 1;
            -ms-grid-column: 1;
            text-align: center;
            overflow: hidden !important;
            grid-area: slider;
            max-width: 100vw;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider::-webkit-scrollbar {
            -webkit-appearance: none;
            height: 5px;
            width: 5px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider::-webkit-scrollbar-thumb {
            background: #000;
            border-radius: 10px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider::-webkit-scrollbar-track {
            margin-left: 10vw;
            margin-right: 10vw;
            background: #e7e7e7;
            border-radius: 10px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner {
            display: inline-block;
            position: relative;
            padding: 0 20px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .imageContainer > .image {
            display: -ms-grid;
            display: grid;
                grid-template-areas: "center";
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .imageContainer > .image > img {
            -ms-grid-row: 1;
            -ms-grid-column: 1;
            aspect-ratio: 16 / 9;
            -o-object-fit: cover;
            object-fit: cover;
            grid-area: center;
            max-width: 700px;
            opacity: 0;
            -webkit-transition: opacity 200ms ease;
            -o-transition: opacity 200ms ease;
            transition: opacity 200ms ease;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .imageContainer > .image > img.isVegan {
            display: none;
        }
        #productHotspotsModule.isVegan > .hotspotContainer > .outer > .inner > .slider > .inner > .imageContainer > .image > img {
            display: none;
        }
        #productHotspotsModule.isVegan > .hotspotContainer > .outer > .inner > .slider > .inner > .imageContainer > .image > img.isVegan {
            display: block;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .imageContainer > .image > img.active {
            opacity: 1;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            z-index:2;
            display: none;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots.active {
            display: block;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot {
            width: 20px;
            height: 20px;
            background-color: #fff;
            border: 3px solid #FC4F00;
            border-radius: 50%;
            position: absolute;
            cursor: pointer;
            -webkit-animation: hotspotPulse 2000ms ease-in-out 0ms infinite forwards;
                    animation: hotspotPulse 2000ms ease-in-out 0ms infinite forwards;
        }
        #productHotspotsModule.isVegan > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.isVegan {
            display: none;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot:hover,
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.active {
            background-color: #FC4F00;
            z-index: 4;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(1) {
            top: 90px;
            left: 360px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(2) {
            top: 220px;
            left: 700px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(3) {
            top: 300px;
            left: 540px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(4) {
            top: 290px;
            left: 79px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(5) {
            top: 170px;
            left: 20px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(6) {
            top: 110px;
            left: 130px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(1) {
            top: 60px;
            left: 280px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(2) {
            top: 110px;
            left: 400px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(3) {
            top: 150px;
            left: 520px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(4) {
            top: 220px;
            left: 700px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(5) {
            top: 300px;
            left: 540px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(6) {
            top: 300px;
            left: 360px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(7) {
            top: 290px;
            left: 300px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(8) {
            top: 300px;
            left: 180px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(9) {
            top: 290px;
            left: 60px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(10) {
            top: 170px;
            left: 20px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(11) {
            top: 60px;
            left: 50px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(12) {
            top: 110px;
            left: 130px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(13) {
            top: 275px;
            left: 640px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer {
            position: absolute;
            height: 100%;
            width: calc((100% - 740px - 100px - 100px) / 2);
            top: 0;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer.left {
            left: 50px
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer.right {
            right: 50px
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup {
            display: none;
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            -ms-flex-line-pack: center;
                align-content: center;
            -webkit-box-pack: center;
                -ms-flex-pack: center;
                    justify-content: center;
            -webkit-box-align: center;
                -ms-flex-align: center;
                    align-items: center;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup.active {
            display: -ms-grid;
            display: grid;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content {
            position: absolute;
            width: 100%;
            height: auto;
            max-height: 100%;
            background-color: #fff;
            padding: 20px;
            -webkit-box-sizing: border-box;
                    box-sizing: border-box;
            opacity: 0;
            overflow: hidden !important;
            -webkit-transition: opacity 200ms ease;
            -o-transition: opacity 200ms ease;
            transition: opacity 200ms ease;
            transform: translatey(-50px);
        }
        #productHotspotsModule.isVegan > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content.isVegan {
            display: none;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content.active {
            display: block;
            z-index:3;
            opacity: 1;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content > .inner {
            max-height: 100%;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content > .inner > h5 {
            margin: 0;
            margin-bottom: 10px;
            font-family: 'Extenda Trial 40 Hecto';
            font-size: 50px;
            line-height: 0.8;
            letter-spacing: 1.1px;
            font-weight: 400;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content > .inner > h5 > span{
            color: #FC4F00;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content > .inner > p {
            margin-bottom: 0;
            font-size: 14px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-family: 'Univers LT Roman';
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content > .inner > p span.tick {
            display: block;
            font-size: 14px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-family: 'Univers LT Roman';
            margin-top: 1em;
            position: relative;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content > .inner > p span.tick::before {
            display: inline-block;
            vertical-align: middle;
            width: calc(100% - 25px);
            width: 15px;
            height: 15px;
            content: "";
            background-image: url(<?php echo home_url() . "/wp-content/themes/sokito/assets/images/Icon\ ionic-ios-checkmark-orange.svg"; ?>);
            background-position: center center;
            background-size: contain;
            background-repeat: no-repeat;
            position: absolute;
            top: -3px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content > .inner > p span.tick > strong {
            display: block;
            padding-left: 20px;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .colorSwitchContainer {
            -ms-grid-row: 2;
            -ms-grid-column: 1;
            text-align: center;
            font-size: 0;
            padding: 20px 0;
            grid-area: colorSwitch;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .colorSwitchContainer > .colorSwitch {
            padding: 2px;
            position: relative;
            border-radius: 50%;
            border: 1px solid rgba(0,0,0,0);
            display: inline-block;
            margin: 0 5px;
            -webkit-box-sizing: border-box;
                    box-sizing: border-box;
            cursor: pointer;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .colorSwitchContainer > .colorSwitch.isVegan {
            display: none;
        }
        #productHotspotsModule.isVegan > .hotspotContainer > .outer > .inner > .colorSwitchContainer > .colorSwitch {
            display: none;
        }
        #productHotspotsModule.isVegan > .hotspotContainer > .outer > .inner > .colorSwitchContainer > .colorSwitch.isVegan {
            display: inline-block;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .colorSwitchContainer > .colorSwitch.active {
            border: 1px solid rgba(0,0,0,1)
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .colorSwitchContainer > .colorSwitch:nth-child(1) {
            margin-left: 0;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .colorSwitchContainer > .colorSwitch:nth-last-child(1) {
            margin-right: 0;
        }
        #productHotspotsModule > .hotspotContainer > .outer > .inner > .colorSwitchContainer > .colorSwitch > .inner {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        @-webkit-keyframes hotspotPulse {
            0% {
                -webkit-transform: scale(0.8);
                        transform: scale(0.8);
            }

            50% {
                -webkit-transform: scale(1);
                        transform: scale(1);
            }

            100% {
                -webkit-transform: scale(0.8);
                        transform: scale(0.8);
            }
        }

        @keyframes hotspotPulse {
            0% {
                -webkit-transform: scale(0.8);
                        transform: scale(0.8);
            }

            50% {
                -webkit-transform: scale(1);
                        transform: scale(1);
            }

            100% {
                -webkit-transform: scale(0.8);
                        transform: scale(0.8);
            }
        }
        
        @media only screen and (max-width: 1500px) {
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer {
                width: calc((100% - 540px - 100px - 100px) / 2)
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .imageContainer > .image > img {
                max-width: 500px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(1) {
                top: 60px;
                left: 270px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(2) {
                top: 160px;
                left: 500px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(3) {
                top: 210px;
                left: 390px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(4) {
                top: 200px;
                left: 70px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(5) {
                top: 110px;
                left: 20px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(6) {
                top: 70px;
                left: 100px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(1) {
                top: 40px;
                left: 200px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(2) {
                top: 70px;
                left: 290px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(3) {
                top: 110px;
                left: 380px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(4) {
                top: 160px;
                left: 500px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(5) {
                top: 210px;
                left: 380px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(6) {
                top: 210px;
                left: 250px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(7) {
                top: 200px;
                left: 200px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(8) {
                top: 210px;
                left: 130px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(9) {
                top: 200px;
                left: 50px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(10) {
                top: 120px;
                left: 10px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(11) {
                top: 50px;
                left: 30px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(12) {
                top: 70px;
                left: 100px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(13) {
                top: 190px;
                left: 455px;
            }
        }

        @media only screen and (max-width: 1321px) {
            #productHotspotsModule > .hotspotContainer > .outer > .inner {
                    grid-template-areas:
                    "colorSwitch"
                    "slider"
                    "content";
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider {
                z-index: 2;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer {
                -ms-grid-row: 1;
                -ms-grid-column: 1;
                position: relative;
                width: 100%;
                top: unset;
                padding: 0 50px;
                grid-area: content;
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                z-index: 1;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer.left,
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer.right {
                left: 0;
                right: unset;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup {
                width: 100%;
                position: relative;
                    grid-template-areas: "hotspotContent";
                -ms-grid-columns: 1fr;
                grid-template-columns: 1fr;
                max-width: 700px;
                margin: 0 auto;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content {
                padding: 0;
                grid-area: hotspotContent;
                max-height: unset;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content.active {
                -webkit-transform: translateY(-130px);
                    -ms-transform: translateY(-130px);
                        transform: translateY(-130px);
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content > .inner {
                padding: 150px 20px 20px 20px;
            }

            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider {
                -ms-grid-row: 2;
                -ms-grid-column: 1;
            }

            #productHotspotsModule > .hotspotContainer > .outer > .inner > .colorSwitchContainer {
                -ms-grid-row: 1;
                -ms-grid-column: 1;
            }
        }

        @media only screen and (max-width: 1200px) {
            /* #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer {
                width: calc((100% - 500px - 100px - 100px) / 2)
            } */
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .imageContainer > .image > img {
                max-width: 500px;
            }
        }

        @media only screen and (max-width: 1180px) {
            #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButtonContainer > button.disabled {
                opacity: 1;
            }
            #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButtonContainer > button {
                height: 90px;
                font-size: 18px;
            }
            #productHotspotsModule > .tabContainer {
                padding-top: 40px;
            }
            #productHotspotsModule > .addToBagContainer {
                position: fixed;
                bottom: 0;
                z-index: 9;
                left: 0;
                display: block;
                width: 100%;
            }
            #productHotspotsModule > .addToBagContainer > .outer > .inner {
                position: relative;
                top: unset;
                right: unset;
                display: block;
                width: 100%;
                background-color: unset;
                border-radius: unset;
                -webkit-box-shadow: unset;
                        box-shadow: unset;
            }
            
			#productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButtonContainer > button {
				border-radius: 0;
			}
            #productHotspotsModule > .addToBagContainer > .outer > .inner > .contentConatiner,
            #productHotspotsModule > .addToBagContainer > .outer > .inner > .sizeContainer {
                display: none;
            }
            #productHotspotsModule > .addToBagContainer > .outer > .inner > .addToBagButton .woocommerce button.button.alt {
                border-radius: 0px;
            }
        }

        @media only screen and (max-width: 1080px) {
            #productHotspotsModule {
                grid-gap: 50px;
            }
            #productHotspotsModule > .tabContainer > .outer {
                padding: 0 20px;
            }
            #productHotspotsModule > .detailsContainer > .outer {
                padding: 0 20px;
            }

            #productHotspotsModule > .hotspotContainer > .outer > .inner {
                    grid-template-areas:
                    "colorSwitch"
                    "slider"
                    "content";
            }
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details > .inner > h3 {
                font-size: 32px;
            }
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details > .inner p {
                font-size: 14px;
            }
            #productHotspotsModule > .detailsContainer > .outer > .inner > .details > .inner p > span {
                font-size: 14px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider {
                z-index: 2;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer {
                -ms-grid-row: 1;
                -ms-grid-column: 1;
                position: relative;
                width: 100%;
                top: unset;
                padding: 0 50px;
                grid-area: content;
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                z-index: 1;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer.left,
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer.right {
                left: 0;
                right: unset;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup {
                width: 100%;
                position: relative;
                    grid-template-areas: "hotspotContent";
                -ms-grid-columns: 1fr;
                grid-template-columns: 1fr;
                max-width: 700px;
                margin: 0 auto;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content {
                padding: 0;
                grid-area: hotspotContent;
                max-height: unset;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content.active {
                -webkit-transform: translateY(-130px);
                    -ms-transform: translateY(-130px);
                        transform: translateY(-130px);
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content > .inner {
                padding: 150px 20px 20px 20px;
            }

            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider {
                -ms-grid-row: 2;
                -ms-grid-column: 1;
            }

            #productHotspotsModule > .hotspotContainer > .outer > .inner > .colorSwitchContainer {
                -ms-grid-row: 1;
                -ms-grid-column: 1;
            }
            
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content {
                -ms-grid-row: 1;
                -ms-grid-column: 1;
            }
        }

        @media only screen and (max-width: 980px) {
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .imageContainer > .image,
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .imageContainer > .image > img {
                height: 400px;
                max-width: unset;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(1) {
                top: 90px;
                left: 380px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(2) {
                top: 240px;
                left: 720px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(3) {
                top: 300px;
                left: 560px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(4) {
                top: 290px;
                left: 70px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(5) {
                top: 180px;
                left: 20px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.description:nth-child(6) {
                top: 110px;
                left: 150px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(1) {
                top: 60px;
                left: 280px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(2) {
                top: 110px;
                left: 400px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(3) {
                top: 150px;
                left: 520px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(4) {
                top: 220px;
                left: 700px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(5) {
                top: 300px;
                left: 540px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(6) {
                top: 300px;
                left: 360px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(7) {
                top: 290px;
                left: 300px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(8) {
                top: 300px;
                left: 180px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(9) {
                top: 290px;
                left: 60px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(10) {
                top: 170px;
                left: 20px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(11) {
                top: 60px;
                left: 50px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(12) {
                top: 110px;
                left: 130px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider > .inner > .hotspots > .hotspot.materials:nth-child(13) {
                top: 275px;
                left: 640px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer {
                padding: 0 20px;
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
            }
            /* #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content {
                position: relative;
                width: 100%;
                height: auto;
                top: unset !important;
                left: unset !important;
                right: unset !important;
                padding: 0;
                background-color: unset;
            } */
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .contentContainer > .contentGroup > .content > .inner {
                overflow-y: hidden !important;
                max-width: unset;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .colorSwitchContainer {
                padding: 10px 0;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .colorSwitchContainer > .colorSwitch {
                margin: 0 5px;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .colorSwitchContainer > .colorSwitch > .inner {
                width: 20px;
                height: 20px;
            }
        }

        @media only screen and (max-width: 810px) {
            #productHotspotsModule > .hotspotContainer > .outer {
                -webkit-box-pack: start;
                    -ms-flex-pack: start;
                        justify-content: start;
            }
            #productHotspotsModule > .hotspotContainer > .outer > .inner > .slider {
                overflow-x: scroll !important;
            }
        }
    </style>

    <script>
        function handleHotspotAddToBagClick() {
            const eventTarget = event.currentTarget || event.target;
            const hotSpotProductVariationIDCotnainer = document.getElementById("hotSpotProductVariationIDCotnainer");

            if (!eventTarget || !hotSpotProductVariationIDCotnainer) { return; }

            const variationID = hotSpotProductVariationIDCotnainer.value;

            if (variationID) {
                handleAddProductToBag(event);

            } else {
                goToProductSizeSelector();
            }

            return;
        }

        function goToProductSizeSelector() {
            const productContainer = document.getElementById("productContainer");

            if (!productContainer) { return; }

            const productVariantGallery = productContainer.getElementsByClassName("productVariantGallery")[0];

            if (!productVariantGallery) { return; }

            const distanceToTopOfPage = window.pageYOffset + productVariantGallery.getBoundingClientRect().top; //px

            window.scrollTo({
                top: distanceToTopOfPage,
                left: 0,
                behavior: "smooth",
            });

            return;
        }
        function toggleAddToBagContainerIsActive() {
            const productHotspotsModule = document.getElementById("productHotspotsModule");

            if (!productHotspotsModule) { return; }

            const addToBagContainer = productHotspotsModule.getElementsByClassName("addToBagContainer")[0];

            if (!addToBagContainer) { return; }

            const distanceToTopOfPage = window.pageYOffset + productHotspotsModule.getBoundingClientRect().top; //px
            const windowScrollY = window.scrollY; //px
            const windowHeight = window.innerHeight; //px

            if (distanceToTopOfPage < windowScrollY + (windowHeight / 2)) {
                addToBagContainer.classList.add("active");

            } else {
                addToBagContainer.classList.remove("active");
            }

            return;
        }
        function hideHotspotCards() { 
            const hotspotContainer = document.getElementById("hotspotContainer");

            if (!hotspotContainer) { return; }

            const hotspotArray = hotspotContainer.getElementsByClassName("hotspot");
            const cardArray = hotspotContainer.getElementsByClassName("content");

            for (var a = 0; a < hotspotArray.length; a++) { 
                hotspotArray[a].classList.remove("active");
            }

            for (var a = 0; a < cardArray.length; a++) { 
                cardArray[a].classList.remove("active");
            }
        }

        function showHotspotCardHover(elmt = null) { 
            const hotspotContainer = document.getElementById("hotspotContainer");
            const mobilScreeBreak = 1321;

            if (!elmt || !hotspotContainer || window.innerWidth <= mobilScreeBreak) { return; }
            
            
            const elmtID = elmt.getAttribute("data-id");                
            const hotspotArray = hotspotContainer.getElementsByClassName("hotspot");
            const cardArray = hotspotContainer.getElementsByClassName("content");

            for (var a = 0; a < hotspotArray.length; a++) {
                if (hotspotArray[a].getAttribute("data-id") === elmtID) {
                    hotspotArray[a].classList.add("active");

                    break;
                }
            }

            for (var a = 0; a < cardArray.length; a++) {
                if (cardArray[a].getAttribute("data-id") === elmtID) {
                    cardArray[a].classList.add("active");

                    break;
                }
            }
        }

        function showHotspotCardClick(elmt = null) {
            const hotspotContainer = document.getElementById("hotspotContainer");
            const mobilScreenBreak = 1321;

            if (!elmt || !hotspotContainer || window.innerWidth > mobilScreenBreak) { return; }

            hideHotspotCards();

            const elmtID = elmt.getAttribute("data-id");
            const hotspotArray = hotspotContainer.getElementsByClassName("hotspot");
            const cardArray = hotspotContainer.getElementsByClassName("content");

            for (var a = 0; a < hotspotArray.length; a++) {
                if (hotspotArray[a].getAttribute("data-id") === elmtID) {
                    hotspotArray[a].classList.add("active");

                    break;
                }
            }

            for (var a = 0; a < cardArray.length; a++) {
                if (cardArray[a].getAttribute("data-id") === elmtID) {
                    const cardParent = cardArray[a].parentElement;
                    const cardHeight = cardArray[a].clientHeight;

                    cardArray[a].classList.add("active");
                    cardParent.style.height = Math.ceil(cardHeight) + "px";

                    break;
                }
            }

            goToHotspotContentCard();
        }

        function goToHotspotContentCard() {
            const hotspotContainer = document.getElementById("hotspotContainer");

            if (!hotspotContainer) { return; }

            const contentContainer = hotspotContainer.getElementsByClassName("contentContainer")[0];

            if (!contentContainer) { return; }

            const distanceToTopOfPage = window.pageYOffset + contentContainer.getBoundingClientRect().top; //px
            const windowHeight = window.innerHeight; //px
            const scrollToValue = distanceToTopOfPage - (windowHeight / 4); //px

            window.scrollTo({
                top: scrollToValue,
                left: 0,
                behavior: "smooth",
            });

            return;
        }

        function handleMouseLeave() {
            const mobilScreeBreak = 1321;

            if (window.innerWidth <= mobilScreeBreak) { return; }

            hideHotspotCards();
        }

        function setHotpostTabInnerMinWidth() {
            const tabContainer = document.getElementById("tabContainer");

            if (!tabContainer) { return; }

            const innerElement = tabContainer.getElementsByClassName("inner")[0];
            const tabArray = tabContainer.getElementsByClassName("tab");
            var newInnerMinWidth = 0;

            for (var a = 0; a < tabArray.length; a++) {
                const tabWidth = tabArray[a].clientWidth;

                newInnerMinWidth += tabWidth;
            }

            newInnerMinWidth += (tabArray.length - 1) * 20;
            newInnerMinWidth = Math.ceil(newInnerMinWidth) + 1;
            innerElement.style.minWidth = newInnerMinWidth + "px";
        }

        function setdetailsContainerHeight() {
            const detailsContainer = document.getElementById("detailsContainer");

            if (!detailsContainer) { return; }

            const activeDetails = detailsContainer.getElementsByClassName("details active")[0];

            if (!activeDetails) { return; }

            const activeDetailsHeight = activeDetails.clientHeight;

            detailsContainer.style.height = Math.ceil(activeDetailsHeight) + "px";

            return;
        }

        function resetHotspotContaentContainerHeights() {
            const hotspotContainer = document.getElementById("hotspotContainer");

            if (!hotspotContainer) { return; }

            const contentGroupArray = hotspotContainer.getElementsByClassName("contentGroup");

            for (var a = 0; a < contentGroupArray.length; a++) {
                contentGroupArray[a].style.height = null;
            }

        }

        function handleViewChange(elmt = null) {
            const hotspotContainer = document.getElementById("productHotspotsModule");

            if (!elmt || !hotspotContainer) { return; }

            const tabContainer = document.getElementById("tabContainer");
            const tabArray = tabContainer.getElementsByClassName("tab");
            const detailsContainer = document.getElementById("detailsContainer");
            const detailsArray = detailsContainer.getElementsByClassName("details");                
            const hotspotsCotnainer = document.getElementById("hotspotContainer");
            const hotspotContentGroupArray = hotspotContainer.getElementsByClassName("contentGroup");
            const hotspotGroupArray = hotspotContainer.getElementsByClassName("hotspots");
            const elmtName = elmt.getAttribute("data-name");

            for (var a = 0; a < tabArray.length; a++) {
                const tabName = tabArray[a].getAttribute("data-name");

                tabArray[a].classList.remove("active");

                if (tabName === elmtName) { tabArray[a].classList.add("active"); }

            }

            for (var a = 0; a < detailsArray.length; a++) {
                const detailsName = detailsArray[a].getAttribute("data-name");

                detailsArray[a].classList.remove("active");

                if (detailsName === elmtName) {
                    const detailsHeight = detailsArray[a].clientHeight;

                    detailsArray[a].classList.add("active");
                    detailsContainer.style.height = Math.ceil(detailsHeight) + "px";
                }
            }

            for (var a = 0; a < hotspotContentGroupArray.length; a++) {
                const contentName = hotspotContentGroupArray[a].getAttribute("data-name");

                hotspotContentGroupArray[a].classList.remove("active");

                if (contentName === elmtName) {
                    hotspotContentGroupArray[a].classList.add("active");
                }
            }

            for (var a = 0; a < hotspotGroupArray.length; a++) {
                const hotspotName = hotspotGroupArray[a].getAttribute("data-name");

                hotspotGroupArray[a].classList.remove("active");

                if (hotspotName === elmtName) {
                    hotspotGroupArray[a].classList.add("active");
                }
            }

            if (elmtName === "reviews") {
                hotspotsCotnainer.classList.remove("active");

            } else {
                hotspotsCotnainer.classList.add("active");

            }
        }

        function handleColorSwicth(elmt = null) {
            const hotspotContainer = document.getElementById("hotspotContainer");

            if (!elmt || !hotspotContainer) { return; }

            const imageContainer = hotspotContainer.getElementsByClassName("imageContainer")[0];
            const imageArray = imageContainer.getElementsByTagName("IMG");
            const colorSwitchArray = hotspotContainer.getElementsByClassName("colorSwitch");
            const elmtID = elmt.getAttribute("data-id");

            for (var a = 0; a < imageArray.length; a++) { 
                const imageID = imageArray[a].getAttribute("data-id");

                imageArray[a].classList.remove("active");

                if (elmtID === imageID) {
                    imageArray[a].classList.add("active");
                }
            }

            for (var a = 0; a < colorSwitchArray.length; a++) { 
                const colorSwitchID = colorSwitchArray[a].getAttribute("data-id");

                colorSwitchArray[a].classList.remove("active");

                if (elmtID === colorSwitchID) {
                    colorSwitchArray[a].classList.add("active");
                }
            }

        }

        function handleReviewCarouselLeftButtonPosition() {
            const reviewCarousel = document.getElementById("hotspotReviewCarousel");

            if (!reviewCarousel) { return; }

            const leftButton = reviewCarousel.getElementsByClassName("carouselButton left")[0];

            if (!leftButton) { return; }

            const windowWidth = window.innerWidth; //px
            const carouselWidth = 1320; //px
            const leftButtonPosition = ((-1) * (windowWidth - carouselWidth)) / 2; //px
            const leftButtonDispaly = leftButtonPosition > 0 ? "none" : "block";

            leftButton.style.display = leftButtonDispaly;
            leftButton.style.left = leftButtonPosition + "px";

            return;
        }

        function handleReviewCarouselRightButtonPosition() {
            const reviewCarousel = document.getElementById("hotspotReviewCarousel");

            if (!reviewCarousel) { return; }

            const rightButton = reviewCarousel.getElementsByClassName("carouselButton right")[0];

            if (!rightButton) { return; }

            const windowWidth = window.innerWidth; //px
            const carouselWidth = 1320; //px
            const rightButtonPosition = ((-1) * (windowWidth - carouselWidth)) / 2; //px
            const rightButtonDispaly = rightButtonPosition > 0 ? "none" : "block";

            rightButton.style.display = rightButtonDispaly;
            rightButton.style.right = rightButtonPosition + "px";

            return;
        }

        function handleReviewCarouselLeftButtonClick() {
            shiftReviewCarouselLeft();
            stopReviewCarouselAutoShift();

            return;
        }

        function handleReviewCarouselRightButtonClick() {
            shiftReviewCarouselRight();
            stopReviewCarouselAutoShift();

            return;
        }

        function handleReviewCarouselNaviagationTabClick() {
            navigateReviewCarousel();
            stopReviewCarouselAutoShift();

            return;
        }

        var globalCarouselTouchX = 0;
        function handleReviewCarouselTouchStart() {
            const touchX = event.touches[0].clientX;

            if (isNaN(touchX)) { return; }

            globalCarouselTouchX = touchX
        }

        function handleReviewCarouselTouchEnd() {
            const touchX = event.changedTouches[0].clientX;
            
            if (isNaN(touchX)) { return; }

            if (globalCarouselTouchX > touchX) {
                shiftReviewCarouselRight();

            } else {
                shiftReviewCarouselLeft();
                
            }

            globalCarouselTouchX = touchX;
            stopReviewCarouselAutoShift();

            return;
        }

        function shiftReviewCarouselRight() {
            const reviewCarousel = document.getElementById("hotspotReviewCarousel");

            if (!reviewCarousel) { return; }

            const carsouselItems = reviewCarousel.getElementsByClassName("carouselItem");

            for (var a = 0; a < carsouselItems.length; a++) {
                if (carsouselItems[a].classList.contains("active")) {
                    const newIndex = a + 1 >= carsouselItems.length ? 0 : a + 1;

                    shiftHotspotReviewCarouselToFrame(newIndex);

                    return;
                }
            }

            return;
        }

        function shiftReviewCarouselLeft() {
            const reviewCarousel = document.getElementById("hotspotReviewCarousel");

            if (!reviewCarousel) { return; }

            const carsouselItems = reviewCarousel.getElementsByClassName("carouselItem");

            for (var a = 0; a < carsouselItems.length; a++) {
                if (carsouselItems[a].classList.contains("active")) {
                    const newIndex = a - 1 < 0 ? 0 : a - 1;

                    shiftHotspotReviewCarouselToFrame(newIndex);
                    
                    return;
                }
            }

            return;
        }

        function navigateReviewCarousel() {
            const reviewCarousel = document.getElementById("hotspotReviewCarousel");

            if (!reviewCarousel) { return; }
            
            const targetTab = event.currentTarget || event.target;
            const tabIndex = targetTab.getAttribute("data-id") || 0;
            
            shiftHotspotReviewCarouselToFrame(tabIndex);

            return;
        }

        function shiftHotspotReviewCarouselToFrame(frame = 0) {
            const reviewCarousel = document.getElementById("hotspotReviewCarousel");

            if (!reviewCarousel || isNaN(frame)) { return; }

            const carouselInner = reviewCarousel.getElementsByClassName("carouselInner")[0];

            if (!carouselInner) { return; }

            var carouselItemWidth = 0;
            const carsouselItems = carouselInner.getElementsByClassName("carouselItem");
            const tabItems = reviewCarousel.getElementsByClassName("naigationTab");

            for (var a = 0; a < carsouselItems.length; a++) {
                if (carsouselItems[a].classList.contains("active")) {
                    carouselItemWidth = carsouselItems[a].clientWidth + 20; //px
                }
                
                carsouselItems[a].classList.remove("active");
            }

            for (var a = 0; a < tabItems.length; a++) {
                tabItems[a].classList.remove("active");
            }

            const transformXValue = frame * carouselItemWidth; //px

            carouselInner.style.transform = "translateX(-" + ( transformXValue ) + "px)";
            carsouselItems[frame].classList.add("active");
            tabItems[frame].classList.add("active");

            const leftButton = reviewCarousel.getElementsByClassName("carouselButton left")[0];

            if (frame == 0) {
                leftButton.classList.remove("active");

            } else {
                leftButton.classList.add("active");
            }

            return;
        }

        //const reviewCarouselAutoShiftInterval = setInterval(shiftReviewCarouselRight, 3000);
        function stopReviewCarouselAutoShift() {
            clearInterval(reviewCarouselAutoShiftInterval);
            
            return;
        }

        function handleSizeContainerClick() {
            const evtTarget = event.currentTarget || event.target;
            const parentCotnainer = evtTarget.parentElement;
            const sizeContainer = parentCotnainer.getElementsByClassName("sizes")[0];
            const openClose = evtTarget.getAttribute("openClose");

            if (openClose == "open") {
                const sizeContainerHeight = sizeContainer.children[0].clientHeight; //px

                sizeContainer.style.height = sizeContainerHeight + 10 + "px";
                evtTarget.setAttribute("openClose", "close");
                parentCotnainer.classList.add("active");

            } else if (openClose == "close") {
                sizeContainer.style.height = 0 + "px";
                evtTarget.setAttribute("openClose", "open");
                parentCotnainer.classList.remove("active");
            }

            return;
        }
        function handleChangeSizeClick() {
            const eventTarget = event.currentTarget || event.target;
			
			if (!eventTarget) { return; }

			const variationID = eventTarget.getAttribute("data-variation-id");
            const variationSize = eventTarget.getAttribute("data-variation-size");

			if (!variationID || !variationSize) { return; }

			//handle product size update
			const productContainer = document.getElementById("productContainer");

			if (productContainer) { updateProductSize(variationID); }

			//handle hotspot size update
			const hotspotContainer = document.getElementById("productHotspotsModule");

			if (hotspotContainer) { updateHotspotProductSize(variationID); }

            const sizeContainer = eventTarget.closest(".sizeContainer ");

            if (!sizeContainer) { return; }

            const currentSizeContainer = sizeContainer.getElementsByClassName("currentSize")[0];

            currentSizeContainer.click();

            return;
        }

        function handleReadMoreButtonHotSpotHeightChange() {
            const eventTarget = event.currentTarget || event.target;

            if (!eventTarget) { return; }

            const closestDetailsContainer = eventTarget.closest("#detailsContainer");
            
            if (!closestDetailsContainer) { return; }

            const detailsContainer = document.getElementById("detailsContainer");

            if (!detailsContainer) { return; }

            detailsContainer.style.height = 1000 + "px";

            setTimeout(setdetailsContainerHeight, 201);
            
            return;
        }

        function addHotSpotHeightChangeToReadMoreButtons() {
            const readMoreButtons = document.getElementsByClassName("readMoreButton");

            for (var a = 0; a < readMoreButtons.length; a++) {
                readMoreButtons[a].addEventListener("click", handleReadMoreButtonHotSpotHeightChange);
            }

            return;
        }

        function doOnScrollFunctions() {
            toggleAddToBagContainerIsActive();

            return;
        }

        function doOnloadFunctions() {
            setHotpostTabInnerMinWidth();
            setdetailsContainerHeight();
            handleReviewCarouselLeftButtonPosition();
            handleReviewCarouselRightButtonPosition();
            addHotSpotHeightChangeToReadMoreButtons();
        }

        function doOnResizeFunctions() {
            setHotpostTabInnerMinWidth();
            setdetailsContainerHeight();
            hideHotspotCards();
            resetHotspotContaentContainerHeights();
            handleReviewCarouselLeftButtonPosition();
            handleReviewCarouselRightButtonPosition();
        }

        function readMoreLess() {
            const eventTarget = event.currentTarget || event.target;

            if (!eventTarget) { return; }

            var readMoreParent = eventTarget.parentElement.parentElement;
            var readMoreContainer = eventTarget.parentElement;
            var readMoreElementArray = readMoreContainer.getElementsByTagName("P");
            var buttonInnerText = "Read more";
            var elementDisplay = "";

            readMoreParent.style.opacity = 0;

            setTimeout(function() {
                readMoreContainer.classList.remove("active");

                if (eventTarget.innerText == "Read more") {
                    buttonInnerText = "Read less";
                    elementDisplay = "inline";
                    readMoreContainer.classList.add("active");

                }

                for (var a = 0; a < readMoreElementArray.length; a++) {
                    if (readMoreElementArray[a] != eventTarget) {
                        readMoreElementArray[a].style.display = elementDisplay;
            
                    }
                }

                var parentHeight = readMoreContainer.clientHeight;

                eventTarget.innerText = buttonInnerText;
                readMoreParent.style.height = parentHeight + 'px';

            }, 0);

            setTimeout(function() {
                readMoreParent.style.opacity = 1;

            }, 0);
        }

        window.addEventListener("load", doOnloadFunctions);
        window.addEventListener("resize", doOnResizeFunctions);
        window.addEventListener("scroll", doOnScrollFunctions);
    </script>