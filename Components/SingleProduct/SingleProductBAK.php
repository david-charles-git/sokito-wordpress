<?php
if (!defined('ABSPATH')) {
  exit;
}

$postID = get_the_ID();

//product details
$product = wc_get_product($postID);
$productName = $product->get_title();
$productIsVegan = get_field('is_vegan');
$productColor = $product->get_attribute('colour');
$productGroundType = $product->get_attribute('ground');
$productPrice = $product->get_price();
$productGalleryImageIDs = $product->get_gallery_image_ids();
$productInitalGalleryImageShowCount = 3;
$productVariantImage = wp_get_attachment_image_src(get_post_thumbnail_id($postID), 'thumbnail');

$productVairaints = new WP_Query(
  array(
    'connected_type' => 'product_to_product',
    'connected_items' => get_queried_object(),
    'nopaging' => true,
  )
);
$productVarientOrder = [
  /* "sg-black" => */
  1104,
  /* "sg-white" => */ 1105,
  4273,
  4304,
  /* "sg-red" => */ 1108,
  /* "sg-blue" => */ 1106,
  /* "fg-black" => */ 1099,
  /* "fg-white" => */ 1100,
  4292,
  4316,
  /* "fg-red" => */ 1103,
  /* "fg-blue" => */ 1101,
  /* "fg-neon" => */ 1899,
  /* "vgn-black" => */ 1755,
  /* "vgn-white" => */ 1756
];
$orderedVarients = [];

array_push($orderedVarients, $postID);

if ($productVairaints->have_posts()) {
  while ($productVairaints->have_posts()) {
    $productVairaints->the_post();
    $variantID = get_the_ID();

    array_push($orderedVarients, $variantID);
  }

  wp_reset_postdata();
}

usort($orderedVarients, function ($a, $b) use ($productVarientOrder) {
  $pos_a = array_search($a, $productVarientOrder);
  $pos_b = array_search($b, $productVarientOrder);

  return $pos_a - $pos_b;
});

$productVarientCount = count($orderedVarients);
$productGroundTypes = new WP_Query(
  array(
    'connected_type' => 'product_to_product_ground',
    'connected_items' => get_queried_object(),
    'nopaging' => true,
  )
);
$productGroundTypesCount = $productGroundTypes->found_posts;
$productSizeVariations = $product->get_available_variations();
$orderedSizeVariations = array();
$finalOrderedSizeVariations = array();
$formShortCode = "[gravityform id='8' title='false' ajax='true']"; // 7 : DEV, 8 : PROD

//review details	
$averageReviewRating = getReviewsAverageRating()["average"]; //in functions.php
$reviewCount = getReviewsAverageRating()["count"]; //in functions.php
$productSizesUK = [6, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 12];
$productSizesUS = [7, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12, 13];
$productSizesEU = [39.5, 40.5, 41.5, 42, 42.5, 43, 44, 44.5, 45, 46, 47];
$productSizesCM = [24.7, 25.7, 26.2, 26.7, 27.2, 27.7, 28.2, 28.7, 29.2, 29.7, 30.7];

for ($a = 0; $a < count($productSizeVariations); $a++) {
  $size = str_replace('-', '.', $productSizeVariations[$a]['attributes']['attribute_pa_size']);
  array_push($orderedSizeVariations, floatVal($size));
}

sort($orderedSizeVariations);

for ($a = 0; $a < count($orderedSizeVariations); $a++) {
  for ($b = 0; $b < count($productSizeVariations); $b++) {
    $size = str_replace('-', '.', $productSizeVariations[$b]['attributes']['attribute_pa_size']);

    if ($size == $orderedSizeVariations[$a]) {
      array_push($finalOrderedSizeVariations, $productSizeVariations[$b]);
    }
  }
}

$productBackOrders = [];

if (have_rows('product-group', $postID)) {
  while (have_rows('product-group', $postID)) {
    the_row();

    if (have_rows('backOrderInfo')) {
      while (have_rows('backOrderInfo')) {
        the_row();

        $productBackOrder = [];
        $productBackOrderVariationID = get_sub_field('variationID');
        $productBackOrderSize = get_sub_field('size');
        $productBackOrderLimit = get_sub_field('backOrderLimit');
        $productBackOrderShippingDateRangeStart = get_sub_field('shippingDateRangeStart');
        $productBackOrderShippingDateRangeEnd = get_sub_field('shippingDateRangeEnd');

        $productBackOrder['variationID'] = $productBackOrderVariationID;
        $productBackOrder['size'] = $productBackOrderSize;
        $productBackOrder['backOrderLimit'] = $productBackOrderLimit;
        $productBackOrder['shippingDateRangeStart'] = $productBackOrderShippingDateRangeStart;
        $productBackOrder['shippingDateRangeEnd'] = $productBackOrderShippingDateRangeEnd;

        array_push($productBackOrders, $productBackOrder);
      }
    }
  }
}

while (have_posts()) {
  the_post();
?>
  <section id="productContainer">
    <div class="outer">
      <div class="inner">
        <div class="left">
          <div class="detailsContainerMobile">
            <h1 class="productName">
              Devista
              <?php
              if ($productIsVegan) {
                echo "<span>Vegan</span>";
              }
              ?>
            </h1>

            <p class="productVariant"><?php echo $productColor; ?></p>

            <p class="productPrice">£<?php echo $productPrice; ?></p>

            <div class="productRating">
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

                <div class="foregroundStars" style="width: <?php echo (($averageReviewRating / 5) * 100); ?>%;">
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

              <div class="countContainer" onclick="handleProductRatingCountClick()">
                <p><?php echo $reviewCount; ?></p>
              </div>
            </div>
          </div>

          <div class="galleryContainer popUpParent">
            <?php
            if ($productIsVegan) {
              echo "<div class='veganImage'><img src='" . get_stylesheet_directory_uri() . "/img/vegan.png' /></div>";
            }
            ?>
            <div class="inner">
              <?php

              for ($a = 0; $a < count($productGalleryImageIDs); $a++) {
                $OriginalImageUrl = wp_get_attachment_url($productGalleryImageIDs[$a]);
              ?>
                <div data-id="<?php echo $a; ?>" class="productImage <?php if ($a == 0) {
                                                                        echo "fullWidth";
                                                                      } else if ($a + 1 > $productInitalGalleryImageShowCount) {
                                                                        echo "hidden";
                                                                      } ?>" onclick="handleProductGalleryImageClick()" style="background-image: url(<?php if ($a == 0) {
                                                                                                                                                      echo get_stylesheet_directory_uri() . "/assets/images/SOK_BG_graph.png";
                                                                                                                                                    } ?>);">
                  <img src="<?php echo $OriginalImageUrl; ?>" />
                </div>
              <?php
              }
              ?>
            </div>
            <?php
            if ($a > $productInitalGalleryImageShowCount) {
            ?>
              <div class="viewMoreButton">
                <div class="inner" onclick="handleProductGalleryViewMore()" data-openClose="open">
                  <p>View More</p>
                </div>
              </div>
            <?php
            }
            ?>
            <div class="galleryPopUpCarousel popUp">
              <div class="background" style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/assets/images/SOK_BG_graph.png"; ?>);"></div>

              <div class="carousel">
                <div class="outer" ontouchstart="handleProductGalleryCarouselTouchStart()" ontouchend="handleProductGalleryCarouselTouchEnd()" ontouchcancel="handleProductGalleryCarouselTouchEnd()">
                  <button class="closeButton" onclick="handleProductGalleryCarouselClose()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.298" height="24.31" viewBox="0 0 24.298 24.31">
                      <g transform="translate(1.062 1.048)">
                        <g transform="translate(0 0.026)">
                          <path transform="translate(0 -0.026)" stroke="#000" stroke-width="2" d="M11.735,11.1,22.022.8a.464.464,0,0,0-.009-.651.466.466,0,0,0-.642,0L11.079,10.441.792.154A.46.46,0,0,0,.142.168a.466.466,0,0,0,0,.642L10.429,11.1.142,21.383a.456.456,0,0,0-.009.651.46.46,0,0,0,.651.009l.009-.009L11.079,11.747,21.366,22.034a.46.46,0,0,0,.651-.651Z" />
                        </g>
                      </g>
                    </svg>
                  </button>

                  <button class="carouselButton left active" onclick="handleProductGalleryCarouselLeftButtonClick()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                      <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                    </svg>
                  </button>

                  <div class="inner" style="grid-template-columns: repeat(<?php echo count($productGalleryImageIDs); ?>, auto);">
                    <?php
                    for ($a = 0; $a < count($productGalleryImageIDs); $a++) {
                      $OriginalImageUrl = wp_get_attachment_url($productGalleryImageIDs[$a]);
                    ?>
                      <div class="item productImage <?php if ($a == 0) {
                                                      echo "active";
                                                    } ?>">
                        <div class="imageContainer">
                          <img src="<?php echo $OriginalImageUrl; ?>" />
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                  </div>

                  <button class="carouselButton right active" onclick="handleProductGalleryCarouselRightButtonClick()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                      <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                    </svg>
                  </button>

                  <div class="tabContainer" style="grid-template-columns: repeat(<?php echo count($productGalleryImageIDs); ?>,auto);">
                    <?php
                    for ($a = 0; $a < count($productGalleryImageIDs); $a++) {
                    ?>
                      <div data-id="<?php echo $a; ?>" class="naigationTab <?php if ($a == 0) {
                                                                              echo "active";
                                                                            } ?>" onclick="handleProductGalleryCarouselNaviagationTabClick()"></div>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="right">
          <div class="detailsContainer">
            <div class="inner">
              <div class="productRating">
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

                  <div class="foregroundStars" style="width: <?php echo (($averageReviewRating / 5) * 100); ?>%;">
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

                <div class="countContainer" onclick="handleProductRatingCountClick()">
                  <p><?php echo $reviewCount; ?></p>
                </div>
              </div>

              <h1 class="productName">
                Devista
                <?php
                if ($productIsVegan) {
                  echo "<span>Vegan</span>";
                }
                ?>
              </h1>

              <p class="productVariant"><?php echo $productColor; ?></p>

              <p class="productPrice">£<?php echo $productPrice; ?></p>

              <div class="productVariantGallery right">
                <div class="button left" onclick='scrollProductVariantGalleryLeft(event)'>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                    <g>
                      <path d="M1 1.25086L7 7.62465L13 1.25086" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                  </svg>
                </div>

                <div class='outer'>
                  <div class="inner" style="grid-template-columns: repeat(<?php echo $productVarientCount; ?>, auto);">
                    <?php
                    for ($a = 0; $a < $productVarientCount; $a++) {
                      $variantImage = wp_get_attachment_image_src(get_post_thumbnail_id($orderedVarients[$a]), 'thumbnail');

                      if ($postID === $orderedVarients[$a]) {
                    ?>
                        <div class="variantImage active">
                          <div class="checkbox">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                              <path transform="translate(-3.375 -3.375)" d="M13.375,3.375a10,10,0,1,0,10,10A10,10,0,0,0,13.375,3.375Zm5.12,7.236-6.428,6.457h0a.868.868,0,0,1-.558.264.842.842,0,0,1-.563-.274L8.25,14.365a.192.192,0,0,1,0-.274l.856-.856a.186.186,0,0,1,.269,0L11.51,15.37l5.865-5.909A.19.19,0,0,1,17.51,9.4h0a.175.175,0,0,1,.135.058l.841.87A.19.19,0,0,1,18.5,10.611Z" />
                            </svg>
                          </div>

                          <img src="<?php echo $variantImage[0]; ?>" />
                        </div>
                      <?php
                      } else {
                        $permalink = get_the_permalink($orderedVarients[$a]);
                      ?>
                        <a href="<?php echo $permalink; ?>" class="variantImage">
                          <img src="<?php echo $variantImage[0]; ?>" />
                        </a>
                    <?php
                      }
                    }
                    ?>
                  </div>
                </div>

                <div class="button right" onclick='scrollProductVariantGalleryRight(event)'>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                    <g>
                      <path d="M1 1.25086L7 7.62465L13 1.25086" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                  </svg>
                </div>
              </div>

              <script>
                function scrollProductVariantGalleryLeft(event) {
                  event.preventDefault();

                  try {
                    const target = event.currentTarget || event.target;
                    const parent = target.closest('.productVariantGallery');
                    const outer = parent.getElementsByClassName('outer')[0];

                    outer.scrollTo({
                      left: 0,
                      behavior: 'smooth'
                    });
                    parent.classList.remove('left');
                    parent.classList.add('right');
                  } catch (error) {
                    console.log(error);
                  }
                }

                function scrollProductVariantGalleryRight(event) {
                  event.preventDefault();

                  try {
                    const target = event.currentTarget || event.target;
                    const parent = target.closest('.productVariantGallery');
                    const outer = parent.getElementsByClassName('outer')[0];
                    const inner = parent.getElementsByClassName('inner')[0];
                    const innerWidth = inner.offsetWidth;

                    outer.scrollTo({
                      left: innerWidth,
                      behavior: 'smooth'
                    });
                    parent.classList.remove('right');
                    parent.classList.add('left');

                    console.log(outer.scrollLeft);
                  } catch (error) {
                    console.log(error);
                  }
                }
              </script>

              <div class="bootTypeContainer">
                <div class="inner" style="grid-template-columns: repeat(<?php echo $productGroundTypesCount + 1; ?>, auto);">
                  <?php
                  if ($productGroundType == 'firm') {
                  ?>
                    <div class="bootType" data-option="<?php echo $productGroundType; ?>">
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                          <path transform="translate(-3.375 -3.375)" d="M13.375,3.375a10,10,0,1,0,10,10A10,10,0,0,0,13.375,3.375Zm5.12,7.236-6.428,6.457h0a.868.868,0,0,1-.558.264.842.842,0,0,1-.563-.274L8.25,14.365a.192.192,0,0,1,0-.274l.856-.856a.186.186,0,0,1,.269,0L11.51,15.37l5.865-5.909A.19.19,0,0,1,17.51,9.4h0a.175.175,0,0,1,.135.058l.841.87A.19.19,0,0,1,18.5,10.611Z" />
                        </svg>
                      </div>

                      <p><?php echo ucfirst($productGroundType) . " ground"; ?></p>
                    </div>
                    <?php
                  }

                  // Display connected pages
                  if ($productGroundTypes->have_posts()) {
                    while ($productGroundTypes->have_posts()) {
                      $productGroundTypes->the_post();
                      $linkedProduct = new WC_Product(get_the_ID());
                      $linkProductGroundType = $linkedProduct->get_attribute('ground');
                    ?>
                      <div class="bootType" data-option="<?php echo $linkProductGroundType; ?>">
                        <a href="<?php the_permalink(); ?>"><?php echo ucfirst($linkProductGroundType) . " ground"; ?></a>
                      </div>
                    <?php
                    }

                    wp_reset_postdata();
                  }

                  if ($productGroundType == 'soft') {
                    ?>
                    <div class="bootType" data-option="<?php echo $productGroundType; ?>">
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                          <path transform="translate(-3.375 -3.375)" d="M13.375,3.375a10,10,0,1,0,10,10A10,10,0,0,0,13.375,3.375Zm5.12,7.236-6.428,6.457h0a.868.868,0,0,1-.558.264.842.842,0,0,1-.563-.274L8.25,14.365a.192.192,0,0,1,0-.274l.856-.856a.186.186,0,0,1,.269,0L11.51,15.37l5.865-5.909A.19.19,0,0,1,17.51,9.4h0a.175.175,0,0,1,.135.058l.841.87A.19.19,0,0,1,18.5,10.611Z" />
                        </svg>
                      </div>

                      <p><?php echo ucfirst($productGroundType) . " ground"; ?></p>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>

              <div class="sizeContainer">
                <div class="inner">
                  <p>Select a Size</p>

                  <div class="sizeGuidContainer">
                    <div class="sizeTypes">
                      <p data-id="uk" class="sizeType active" onclick="handleProcuctSizeTypeClick()">UK</p>
                      <p data-id="eu" class="sizeType" onclick="handleProcuctSizeTypeClick()">EU</p>
                      <p data-id="us" class="sizeType" onclick="handleProcuctSizeTypeClick()">US</p>
                    </div>

                    <div class="sizeGuide popUpParent">
                      <p onclick="handlePopUpOpen()">Size Guide</p>

                      <div class="sizeGuidePopUp popUp">
                        <div class="background" onclick="handlePopUpClose()"></div>

                        <div class="outer">
                          <div class="inner">
                            <p>Size guide</p>

                            <button class="closeButton" onclick="handlePopUpClose()">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24.298" height="24.31" viewBox="0 0 24.298 24.31">
                                <g transform="translate(1.062 1.048)">
                                  <g transform="translate(0 0.026)">
                                    <path transform="translate(0 -0.026)" stroke="#000" stroke-width="2" d="M11.735,11.1,22.022.8a.464.464,0,0,0-.009-.651.466.466,0,0,0-.642,0L11.079,10.441.792.154A.46.46,0,0,0,.142.168a.466.466,0,0,0,0,.642L10.429,11.1.142,21.383a.456.456,0,0,0-.009.651.46.46,0,0,0,.651.009l.009-.009L11.079,11.747,21.366,22.034a.46.46,0,0,0,.651-.651Z" />
                                  </g>
                                </g>
                              </svg>
                            </button>

                            <div class="content">
                              <div class="unitToggleContainer">
                                <div class="inner">
                                  <p class="unitToggle active" onclick="handleProductUnitToggleClick()" data-unit="cm">CM</p>

                                  <p class="unitToggle" onclick="handleProductUnitToggleClick()" data-unit="inch">IN</p>
                                </div>
                              </div>

                              <div class="sizeTable">
                                <div class="inner">
                                  <ul id="unitContainer" class="sizeRow">
                                    <li class="rowName">
                                      <p>Foot length (<span class="unit">cm</span>)</p>
                                    </li>
                                    <?php
                                    for ($a = 0; $a < count($productSizesCM); $a++) {
                                    ?>
                                      <li>
                                        <p><?php echo $productSizesCM[$a]; ?></p>
                                      </li>
                                    <?php
                                    }
                                    ?>
                                  </ul>

                                  <ul class="sizeRow">
                                    <li class="rowName">
                                      <p>UK</p>
                                    </li>
                                    <?php
                                    for ($a = 0; $a < count($productSizesUK); $a++) {
                                    ?>
                                      <li>
                                        <p><?php echo $productSizesUK[$a]; ?></p>
                                      </li>
                                    <?php
                                    }
                                    ?>
                                  </ul>

                                  <ul class="sizeRow">
                                    <li class="rowName">
                                      <p>EU</p>
                                    </li>
                                    <?php
                                    for ($a = 0; $a < count($productSizesEU); $a++) {
                                    ?>
                                      <li>
                                        <p><?php echo $productSizesEU[$a]; ?></p>
                                      </li>
                                    <?php
                                    }
                                    ?>
                                  </ul>

                                  <ul class="sizeRow">
                                    <li class="rowName">
                                      <p>US</p>
                                    </li>
                                    <?php
                                    for ($a = 0; $a < count($productSizesUS); $a++) {
                                    ?>
                                      <li>
                                        <p><?php echo $productSizesUS[$a]; ?></p>
                                      </li>
                                    <?php
                                    }
                                    ?>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="sizeSelectContainer">
                    <?php
                    for ($a = 0; $a < count($finalOrderedSizeVariations); $a++) {
                      $ID = $finalOrderedSizeVariations[$a]["variation_id"];
                      $size = $finalOrderedSizeVariations[$a]['attributes']['attribute_pa_size'];
                      $isInStock = $finalOrderedSizeVariations[$a]['is_in_stock'];
                      $hasBackOrder = false;
                      $backOrderRangeStartDate = null;
                      $backOrderRangeEndDate = null;
                      $variation_obj = new WC_Product_variation($ID);
                      $stock = $variation_obj->get_stock_quantity();

                      if ($stock <= 0) {
                        for ($b = 0; $b < count($productBackOrders); $b++) {
                          if ($productBackOrders[$b]['variationID'] == $ID) {
                            $hasBackOrder = true;
                            $backOrderRangeStartDate = $productBackOrders[$b]['shippingDateRangeStart'];
                            $backOrderRangeEndDate = $productBackOrders[$b]['shippingDateRangeEnd'];
                          }
                        }
                      }
                    ?>
                      <div data-hasBackOrder="<?php echo $hasBackOrder; ?>" data-backOrderRangeStart="<?php echo $backOrderRangeStartDate; ?>" data-backOrderRangeEnd="<?php echo $backOrderRangeEndDate; ?>" data-variation-id="<?php echo $ID; ?>" data-variation-size="<?php echo $size; ?>" class="size <?php if (!$isInStock && !$hasBackOrder) {
                                                                                                                                                                                                                                                                                                              echo "outOfStock";
                                                                                                                                                                                                                                                                                                            } ?>" onclick="<?php if ($isInStock && !$hasBackOrder) {
                                                                                                                                                                                                                                                                                                                              echo "handleProductSizeClick()";
                                                                                                                                                                                                                                                                                                                            } else if (!$isInStock && !$hasBackOrder) {
                                                                                                                                                                                                                                                                                                                              echo "handleProductNoStockClick()";
                                                                                                                                                                                                                                                                                                                            } else if ($hasBackOrder) {
                                                                                                                                                                                                                                                                                                                              echo "handleBackOrderClick()";
                                                                                                                                                                                                                                                                                                                            } ?>">
                        <?php
                        if (!$isInStock && !$hasBackOrder) {
                        ?>
                          <svg xmlns="http://www.w3.org/2000/svg" width="14.354" height="15.835" viewBox="0 0 14.354 15.835" onclick="handleProductNoStockClick()">
                            <g transform="translate(-4 -2.5)">
                              <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15.628,7.451a4.451,4.451,0,1,0-8.9,0c0,5.193-2.226,6.677-2.226,6.677H17.854s-2.226-1.484-2.226-6.677" />
                              <path transform="translate(-5.511 -14.404)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17.972,31.5a1.484,1.484,0,0,1-2.567,0" />
                            </g>
                          </svg>
                        <?php
                        } else {
                        ?>
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <path transform="translate(-3.375 -3.375)" d="M13.375,3.375a10,10,0,1,0,10,10A10,10,0,0,0,13.375,3.375Zm5.12,7.236-6.428,6.457h0a.868.868,0,0,1-.558.264.842.842,0,0,1-.563-.274L8.25,14.365a.192.192,0,0,1,0-.274l.856-.856a.186.186,0,0,1,.269,0L11.51,15.37l5.865-5.909A.19.19,0,0,1,17.51,9.4h0a.175.175,0,0,1,.135.058l.841.87A.19.19,0,0,1,18.5,10.611Z" />
                          </svg>
                        <?php
                        }
                        ?>
                        <p class="<?php if (!$isInStock) {
                                    echo 'outOfStock';
                                  } ?>"><?php echo str_replace('-', '.', $size); ?></p>
                      </div>
                    <?php
                    }
                    ?>
                  </div>

                  <div id="backOrderMessage">
                    <div class="inner">
                      <p>Ships in <span class="startDate"></span> - <span class="endDate"></span> weeks</p>
                    </div>
                  </div>

                  <div class="popUpParent">
                    <div class="outOfStockNotificationPopUp popUp">
                      <div class="background" onclick="handlePopUpClose()"></div>

                      <div class="outer">
                        <div class="inner">
                          <p>Notify me</p>

                          <button class="closeButton" onclick="handlePopUpClose()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24.298" height="24.31" viewBox="0 0 24.298 24.31">
                              <g transform="translate(1.062 1.048)">
                                <g transform="translate(0 0.026)">
                                  <path transform="translate(0 -0.026)" stroke="#000" stroke-width="2" d="M11.735,11.1,22.022.8a.464.464,0,0,0-.009-.651.466.466,0,0,0-.642,0L11.079,10.441.792.154A.46.46,0,0,0,.142.168a.466.466,0,0,0,0,.642L10.429,11.1.142,21.383a.456.456,0,0,0-.009.651.46.46,0,0,0,.651.009l.009-.009L11.079,11.747,21.366,22.034a.46.46,0,0,0,.651-.651Z" />
                                </g>
                              </g>
                            </svg>
                          </button>

                          <div class="content">
                            <p>Email when back in stock.</p>

                            <div class="form OutOfStockForm">
                              <div class="confirmationContainer">
                                <div class="background" onclick="handleProductOutOfStockConfirmationClose()"></div>

                                <div class="outer">
                                  <div class="inner">
                                    <h6>Thanks for subbing in!</h6>

                                    <p>We just sent a confirmation email to <span class="userEmail"></span></p>

                                    <button class="closeButton" onclick="handleProductOutOfStockConfirmationClose()">Close</button>
                                  </div>
                                </div>
                              </div>

                              <div class="inner">
                                <div class="emailContainer">
                                  <input type="email" placeholder="Email address" onchange="handleProductOutOfStockEmailChange()" />
                                  <span class="errorText">Please enter a valid email address</span>
                                </div>

                                <button class="submit" onclick="handleProductOutOfStockFormSubmission()">Submit</button>

                                <input type="hidden" class="shoeSize" />

                                <input type="hidden" class="shoeName" value="<?php echo $product->get_title(); ?>" />
                              </div>

                              <div id="OutOfStickNotificationGForm" style="display: none;">
                                <?php
                                echo do_shortcode($formShortCode);
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  if ($productIsVegan) {
                  ?>
                    <div class="sizeNotice">
                      <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18.998" height="18.998" viewBox="0 0 18.998 18.998">
                          <g transform="translate(-3.375 -3.375)">
                            <path transform="translate(-4.618 -2.57)" fill="#727272" d="M16.552,11.617a.941.941,0,1,1,.936.913A.914.914,0,0,1,16.552,11.617Zm.064,1.63H18.36v6.581H16.615Z" />
                            <path transform="translate(0 0)" fill="#727272" d="M12.874,4.654A8.217,8.217,0,1,1,7.06,7.06a8.166,8.166,0,0,1,5.814-2.407m0-1.279a9.5,9.5,0,1,0,9.5,9.5,9.5,9.5,0,0,0-9.5-9.5Z" />
                          </g>
                        </svg>
                        Devista Vegan fits small, order half a size up
                      </p>
                    </div>
                  <?php
                  }
                  ?>
                  <div class="addToBagButtonContainer">
                    <button id="addProductToBag" class="disabled" onclick="handleAddProductToBag()">Add to bag</button>

                    <input type="hidden" id="productIDContainer" value="<?php echo $postID; ?>" />
                    <!-- <input type="hidden" id="productSKUCotnainer" value="" /> -->
                    <input type="hidden" id="productQantityCotnainer" value="1" />
                    <input type="hidden" id="productVariationIDCotnainer" value="" />
                  </div>
                </div>
              </div>

              <div class="trackingContainer popUpParent">
                <div class="inner">
                  <div class="trackingDetails">
                    <div class="inner" onclick="handlePopUpOpen()">
                      <div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/k.png" />
                      </div>

                      <p>Split the cost into 3 payments with <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/kl.png" /><br /> No fees.</p>

                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="27.956" height="28.21" viewBox="0 0 27.956 28.21">
                          <g transform="translate(20.437)">
                            <path transform="translate(-9.952)" d="M17.091,0H.38A.38.38,0,0,0,0,.38V17.091a.38.38,0,0,0,.38.38H17.091a.38.38,0,0,0,.38-.38V.38A.38.38,0,0,0,17.091,0Zm-.38,16.711H.76V.76H16.711Z" />
                            <path transform="translate(-20.437 11.743) rotate(-45)" d="M11.561,23.181a.38.38,0,0,0,.537-.537L.917,11.463,11.736.644A.38.38,0,0,0,11.2.107L.111,11.194a.38.38,0,0,0,0,.537Z" />
                          </g>
                        </svg>
                      </div>
                    </div>

                    <div class="klarnaPopUp popUp">
                      <div class="background" onclick="handlePopUpClose()"></div>

                      <div class="outer">
                        <div class="inner">
                          <p>Klarna</p>

                          <button class="closeButton" onclick="handlePopUpClose()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24.298" height="24.31" viewBox="0 0 24.298 24.31">
                              <g transform="translate(1.062 1.048)">
                                <g transform="translate(0 0.026)">
                                  <path transform="translate(0 -0.026)" stroke="#000" stroke-width="2" d="M11.735,11.1,22.022.8a.464.464,0,0,0-.009-.651.466.466,0,0,0-.642,0L11.079,10.441.792.154A.46.46,0,0,0,.142.168a.466.466,0,0,0,0,.642L10.429,11.1.142,21.383a.456.456,0,0,0-.009.651.46.46,0,0,0,.651.009l.009-.009L11.079,11.747,21.366,22.034a.46.46,0,0,0,.651-.651Z" />
                                </g>
                              </g>
                            </svg>
                          </button>

                          <div class="content">
                            <div>
                              <p>
                                Shop and pay in 3 interest free payments with Klarna<br /><br />
                                The first payment is made at the point of purchase, with remaining instalments scheduled automatically every 30 days.<br /><br />
                                Simply select Klarna as your payment method at the checkout and Klarna will do the rest!
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="trackingDetails popUpParent">
                    <div class="inner" onclick="handlePopUpOpen()">
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32.291" height="19.375" viewBox="0 0 32.291 19.375">
                          <g transform="translate(0 -12)">
                            <path d="M31.314,22.528l-2.928-1.255-3.2-6.8A4.324,4.324,0,0,0,21.29,12H3.229A2.694,2.694,0,0,0,.538,14.691v11.99A1.073,1.073,0,0,0,0,27.608v1.076A1.076,1.076,0,0,0,1.076,29.76h4a2.686,2.686,0,0,0,4.926,0H24.985a2.686,2.686,0,0,0,4.926,0h.766a1.615,1.615,0,0,0,1.615-1.615V24.012A1.622,1.622,0,0,0,31.314,22.528Zm-4.176-1.379H23.68A1.076,1.076,0,0,1,22.6,20.073V17.92a.538.538,0,0,1,.538-.538h2.223ZM2.691,28.684H1.076V27.608H2.691ZM7.535,30.3a1.615,1.615,0,1,1,1.615-1.615A1.615,1.615,0,0,1,7.535,30.3Zm17.222-1.615H10.226a2.691,2.691,0,0,0-5.382,0H3.767V27.608a1.076,1.076,0,0,0-1.076-1.076H1.615V14.691a1.615,1.615,0,0,1,1.615-1.615H21.29a3.242,3.242,0,0,1,2.921,1.854l.647,1.375H23.142a1.615,1.615,0,0,0-1.615,1.615v2.153a2.153,2.153,0,0,0,2.153,2.153h4.2l3.01,1.292a.546.546,0,0,1,.327.5v2.519H29.046a2.665,2.665,0,0,0-1.6-.538A2.694,2.694,0,0,0,24.757,28.684ZM27.448,30.3a1.615,1.615,0,1,1,1.615-1.615A1.615,1.615,0,0,1,27.448,30.3Zm3.229-1.615h-.538a2.664,2.664,0,0,0-.228-1.076h1.3v.538A.538.538,0,0,1,30.677,28.684Z" />
                            <path transform="translate(-9.698 -12.469)" d="M32.84,39h-11.3a.538.538,0,0,0,0,1.076h11.3a.538.538,0,0,0,0-1.076Z" />
                          </g>
                        </svg>
                      </div>

                      <p><strong>Free UK shipping & delivery</strong><br /> on all orders available</p>

                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="27.956" height="28.21" viewBox="0 0 27.956 28.21">
                          <g transform="translate(20.437)">
                            <path transform="translate(-9.952)" d="M17.091,0H.38A.38.38,0,0,0,0,.38V17.091a.38.38,0,0,0,.38.38H17.091a.38.38,0,0,0,.38-.38V.38A.38.38,0,0,0,17.091,0Zm-.38,16.711H.76V.76H16.711Z" />
                            <path transform="translate(-20.437 11.743) rotate(-45)" d="M11.561,23.181a.38.38,0,0,0,.537-.537L.917,11.463,11.736.644A.38.38,0,0,0,11.2.107L.111,11.194a.38.38,0,0,0,0,.537Z" />
                          </g>
                        </svg>
                      </div>
                    </div>

                    <div class="shippingPopUp popUp">
                      <div class="background" onclick="handlePopUpClose()"></div>

                      <div class="outer">
                        <div class="inner">
                          <p>Shipping & delivery</p>

                          <button class="closeButton" onclick="handlePopUpClose()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24.298" height="24.31" viewBox="0 0 24.298 24.31">
                              <g transform="translate(1.062 1.048)">
                                <g transform="translate(0 0.026)">
                                  <path transform="translate(0 -0.026)" stroke="#000" stroke-width="2" d="M11.735,11.1,22.022.8a.464.464,0,0,0-.009-.651.466.466,0,0,0-.642,0L11.079,10.441.792.154A.46.46,0,0,0,.142.168a.466.466,0,0,0,0,.642L10.429,11.1.142,21.383a.456.456,0,0,0-.009.651.46.46,0,0,0,.651.009l.009-.009L11.079,11.747,21.366,22.034a.46.46,0,0,0,.651-.651Z" />
                                </g>
                              </g>
                            </svg>
                          </button>

                          <div class="content">
                            <div class="shippingTable">
                              <ul class="headerRow">
                                <li>
                                  <p>Shipping Location</p>
                                </li>

                                <li>
                                  <p>Service</p>
                                </li>

                                <li>
                                  <p>Courier</p>
                                </li>
                              </ul>

                              <ul>
                                <li>
                                  <p>United Kingdom</p>
                                </li>

                                <li>
                                  <p>Standard (2-3 days)</p>
                                </li>

                                <li>
                                  <p>Royal Mail</p>
                                </li>
                              </ul>

                              <ul>
                                <li>
                                  <p></p>
                                </li>

                                <li>
                                  <p>Next Day Delivery</p>
                                </li>

                                <li>
                                  <p>Parcel Force</p>
                                </li>
                              </ul>

                              <ul>
                                <li>
                                  <p></p>
                                </li>

                                <li>
                                  <p>Saturday Delivery</p>
                                </li>

                                <li>
                                  <p>Royal Mail</p>
                                </li>
                              </ul>

                              <ul>
                                <li>
                                  <p>Europe</p>
                                </li>

                                <li>
                                  <p>Express (3-7 days)</p>
                                </li>

                                <li>
                                  <p>Royal Mail</p>
                                </li>
                              </ul>

                              <ul>
                                <li>
                                  <p></p>
                                </li>

                                <li>
                                  <p>Express (2-4 days)</p>
                                </li>

                                <li>
                                  <p>DHL</p>
                                </li>
                              </ul>

                              <ul>
                                <li>
                                  <p>USA/Mexico</p>
                                </li>

                                <li>
                                  <p>Express (2-4 days)</p>
                                </li>

                                <li>
                                  <p>DHL</p>
                                </li>
                              </ul>

                              <ul>
                                <li>
                                  <p>Rest of the World</p>
                                </li>

                                <li>
                                  <p>Express (3-7 days)</p>
                                </li>

                                <li>
                                  <p>DHL</p>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="trackingDetails popUpParent">
                    <div class="inner" onclick="handlePopUpOpen()">
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="27.451" height="24" viewBox="0 0 27.451 24">
                          <g transform="translate(0 -32.211)">
                            <g transform="translate(0 32.211)">
                              <g>
                                <path transform="translate(0 -32.211)" d="M2.2,42.457a.564.564,0,0,0,.451-.011l4.463-2.029a.574.574,0,0,0,.269-.766.563.563,0,0,0-.737-.274L3.519,40.8a11.036,11.036,0,0,1,21.086.7.57.57,0,0,0,1.1-.291,12.184,12.184,0,0,0-23.28-.777L1.113,37.142a.575.575,0,0,0-.72-.366.575.575,0,0,0-.366.72.352.352,0,0,0,.029.069l1.823,4.571A.568.568,0,0,0,2.2,42.457Z" />
                                <path transform="translate(-30.547 -274.505)" d="M57.963,293.185a.081.081,0,0,1-.011-.034l-1.823-4.571a.568.568,0,0,0-.32-.32.589.589,0,0,0-.451.011L50.895,290.3a.573.573,0,0,0,.44,1.057l.034-.017,3.126-1.423a11.044,11.044,0,0,1-21.1-.7.57.57,0,1,0-1.1.291,12.184,12.184,0,0,0,23.28.777l1.314,3.286a.571.571,0,0,0,1.074-.389Z" />
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>

                      <p><strong>Free UK returns</strong><br /> on all orders available</p>

                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="27.956" height="28.21" viewBox="0 0 27.956 28.21">
                          <g transform="translate(20.437)">
                            <path transform="translate(-9.952)" d="M17.091,0H.38A.38.38,0,0,0,0,.38V17.091a.38.38,0,0,0,.38.38H17.091a.38.38,0,0,0,.38-.38V.38A.38.38,0,0,0,17.091,0Zm-.38,16.711H.76V.76H16.711Z" />
                            <path transform="translate(-20.437 11.743) rotate(-45)" d="M11.561,23.181a.38.38,0,0,0,.537-.537L.917,11.463,11.736.644A.38.38,0,0,0,11.2.107L.111,11.194a.38.38,0,0,0,0,.537Z" />
                          </g>
                        </svg>
                      </div>
                    </div>

                    <div class="returnsPopUp popUp">
                      <div class="background" onclick="handlePopUpClose()"></div>

                      <div class="outer">
                        <div class="inner">
                          <p>Returns</p>

                          <button class="closeButton" onclick="handlePopUpClose()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24.298" height="24.31" viewBox="0 0 24.298 24.31">
                              <g transform="translate(1.062 1.048)">
                                <g transform="translate(0 0.026)">
                                  <path transform="translate(0 -0.026)" stroke="#000" stroke-width="2" d="M11.735,11.1,22.022.8a.464.464,0,0,0-.009-.651.466.466,0,0,0-.642,0L11.079,10.441.792.154A.46.46,0,0,0,.142.168a.466.466,0,0,0,0,.642L10.429,11.1.142,21.383a.456.456,0,0,0-.009.651.46.46,0,0,0,.651.009l.009-.009L11.079,11.747,21.366,22.034a.46.46,0,0,0,.651-.651Z" />
                                </g>
                              </g>
                            </svg>
                          </button>

                          <div class="content">
                            <div>
                              <p>
                                Need to return your boots? No problem, we offer free returns within 30 days if your boots are undamaged and unworn.<br /><br />
                                For customers outside of the UK, international returns are available within 30 days, but you will need to cover any postage fees. <br /><br />
                                Need a bit more info? Click <a href="https://www.sokito.com/return-refund-policy/">here</a> for the full returns process.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
}
?>
<script>
  function handleProductDetailsTopPosition() {
    const productContainer = document.getElementById("productContainer");

    if (!productContainer) {
      return;
    }

    const productDetailsContainer = productContainer.getElementsByClassName("detailsContainer")[0];

    if (!productDetailsContainer) {
      return;
    }

    const windowWidth = window.innerWidth; //px

    if (windowWidth <= 1080) {
      productDetailsContainer.style.transform = null;

      return;
    }

    const windowScrollY = window.scrollY; //px
    const elmtDistanceToPageTop = windowScrollY + productContainer.getBoundingClientRect().top; //px
    const productContainerHeight = productContainer.clientHeight; //px
    const productDetailsContainerHeight = productDetailsContainer.clientHeight; //px
    var topPosition = windowScrollY <= elmtDistanceToPageTop ? 0 : Math.abs(windowScrollY - elmtDistanceToPageTop + 50); //px

    if (topPosition + productDetailsContainerHeight > productContainerHeight - 30) {
      topPosition = productContainerHeight - 30 - productDetailsContainerHeight;
    }


    productDetailsContainer.style.transform = "translateY(" + topPosition + "px)";

    return;
  }

  window.addEventListener("scroll", handleProductDetailsTopPosition);

  const productSizesUK = [6, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 12];
  const productSizesUS = [7, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12, 13];
  const productSizesEU = [39.5, 40.5, 41.5, 42, 42.5, 43, 44, 44.5, 45, 46, 47];
  const productSizesCM = [24.7, 25.7, 26.2, 26.7, 27.2, 27.7, 28.2, 28.7, 29.2, 29.7, 30.7];
  const productSizesINCH = [9.72, 10.12, 10.31, 10.51, 10.71, 10.91, 11.1, 11.3, 11.5, 11.69, 12.1];

  function handlePopUpClose() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) {
      return;
    }

    const popUpParent = eventTarget.closest(".popUpParent");

    if (!popUpParent) {
      return;
    }

    const popUp = popUpParent.getElementsByClassName("popUp")[0];
    const body = document.getElementsByTagName("BODY")[0];

    if (!popUp || !body) {
      return;
    }

    const detailsContainer = eventTarget.closest(".detailsContainer");

    if (detailsContainer) {
      detailsContainer.classList.remove("static");
    }

    body.style.height = null;
    body.style.overflow = null;
    popUp.classList.remove("active");

    return;
  }

  function handlePopUpOpen() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) {
      return;
    }

    const popUpParent = eventTarget.closest(".popUpParent");

    if (!popUpParent) {
      return;
    }

    const popUp = popUpParent.getElementsByClassName("popUp")[0];
    const body = document.getElementsByTagName("BODY")[0];

    if (!popUp || !body) {
      return;
    }

    const detailsContainer = eventTarget.closest(".detailsContainer");

    if (detailsContainer) {
      detailsContainer.classList.add("static");
    }

    setTimeout(function() {
      popUp.classList.add("active");
      body.style.height = "100vh";
      body.style.overflow = "hidden";
    }, 150);

    return;
  }

  function handleProductGalleryImageClick() {
    try {
      handlePopUpOpen(event);

      const eventTarget = event.currentTarget || event.target;
      const popUpParent = eventTarget.closest(".popUpParent");
      const popUp = popUpParent.getElementsByClassName("popUp")[0];
      const carousel = popUp.getElementsByClassName("carousel")[0];
      const frameID = parseInt(eventTarget.getAttribute("data-id"));

      if (!carousel || isNaN(frameID)) return;

      setTimeout(() => {
        shiftProductGalleryCarouselToFrame(carousel, frameID);
        window.addEventListener("keydown", handleProductGalleryKeyDownNavigation);
      }, 150);
    } catch (error) {
      console.log(error);
    }
  }

  function handleProductGalleryCarouselClose() {
    handlePopUpClose(event);

    window.removeEventListener("keydown", handleProductGalleryKeyDownNavigation);
    return;
  }

  function handleProductGalleryKeyDownNavigation() {
    const eventKey = event.key;
    const productContainer = document.getElementById("productContainer");

    if (!eventKey || !productContainer) {
      return;
    }

    const galleryPopUpCarousel = productContainer.getElementsByClassName("galleryPopUpCarousel")[0];

    if (!galleryPopUpCarousel) {
      return;
    }

    const carousel = galleryPopUpCarousel.getElementsByClassName("carousel")[0];

    if (!carousel) {
      return;
    }

    const items = carousel.getElementsByClassName("item");
    var frameID = 0;

    for (var a = 0; a < items.length; a++) {
      if (items[a].classList.contains("active")) {
        frameID = a;
      }
    }

    if (eventKey === "ArrowRight") {
      frameID = frameID + 1 > items.length - 1 ? items.length - 1 : frameID + 1;

    } else if (eventKey === "ArrowLeft") {
      frameID = frameID - 1 < 0 ? 0 : frameID - 1;

    }

    shiftProductGalleryCarouselToFrame(carousel, frameID);

    return;
  }

  function handleProductNoStockClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) {
      return;
    }

    const productContainer = eventTarget.closest("#productContainer");

    if (!productContainer) {
      return;
    }

    const outOfStockNotificationPopUp = productContainer.getElementsByClassName("outOfStockNotificationPopUp")[0];

    if (!outOfStockNotificationPopUp) {
      return;
    }

    const showSizeInput = outOfStockNotificationPopUp.getElementsByClassName("shoeSize")[0];
    const sizeValue = eventTarget.getAttribute("data-variation-id");
    const body = document.getElementsByTagName("BODY")[0];
    //const WC_sizeContainer = document.getElementById("pa_size"); //$("#pa_size")

    if (!sizeValue || !showSizeInput || !body) {
      return;
    }

    const detailsContainer = eventTarget.closest(".detailsContainer");

    $("#pa_size").val(sizeValue);
    $("#pa_size").trigger('change');

    if (detailsContainer) {
      detailsContainer.classList.add("static");
    }

    showSizeInput.value = sizeValue;

    setTimeout(function() {
      outOfStockNotificationPopUp.classList.add("active");
      body.style.height = "100vh";
      body.style.overflow = "hidden";
    }, 150);

    return;
  }

  function handleProductUnitToggleClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) {
      return;
    }

    const unitToggleContainer = eventTarget.closest(".unitToggleContainer");
    const sizeGuidePopUp = eventTarget.closest(".sizeGuidePopUp");
    const unitContainerParent = document.getElementById("unitContainer");
    const unitType = eventTarget.getAttribute("data-unit");

    if (!unitToggleContainer || !sizeGuidePopUp || !unitContainerParent || !unitType) {
      return;
    }

    const unitContainer = sizeGuidePopUp.getElementsByClassName("unit")[0];
    const unitElements = unitContainerParent.getElementsByTagName("LI");

    if (!unitContainer) {
      return;
    }

    const unitToggles = unitToggleContainer.getElementsByClassName("unitToggle");

    for (var a = 0; a < unitToggles.length; a++) {
      unitToggles[a].classList.remove("active");
    }

    for (var a = 0; a < unitElements.length; a++) {
      if (!unitElements[a].classList.contains("rowName")) {
        var unitArray = productSizesCM;
        const unitValue = parseFloat(unitElements[a].getElementsByTagName("P")[0].innerText);

        if (unitType === "inch") {
          unitArray = productSizesINCH;
        }

        if (unitType === "cm") {
          unitElements[a].getElementsByTagName("P")[0].innerText = productSizesCM[a - 1];

        } else if (unitType === "inch") {
          unitElements[a].getElementsByTagName("P")[0].innerText = productSizesINCH[a - 1];

        }
      }
    }

    eventTarget.classList.add("active");
    unitContainer.innerText = unitType;

    return;
  }

  function handleProductRatingCountClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) {
      return;
    }

    const hotspotContainer = document.getElementById("productHotspotsModule");

    if (!hotspotContainer) {
      return;
    }

    const hotSpotTabContainer = document.getElementById("tabContainer");
    const hotspotOffsetTop = hotspotContainer.offsetTop; //px

    if (!hotSpotTabContainer || !hotspotOffsetTop) {
      return;
    }

    const tabs = hotSpotTabContainer.getElementsByClassName("tab");

    for (var a = 0; a < tabs.length; a++) {
      const tabName = tabs[a].getAttribute("data-name");

      if (tabName == "reviews") {
        tabs[a].click();
      }
    }

    window.scrollTo({
      top: hotspotOffsetTop,
      left: 0,
      behavior: "smooth",
    });

    return;
  }

  function handleProductOutOfStockEmailChange() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) {
      return;
    }

    const parentContainer = eventTarget.closest(".emailContainer");

    if (!parentContainer) {
      return;
    }

    parentContainer.classList.remove("error");

    return;
  }

  function handleProductOutOfStockFormSubmission() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) return;

    if (eventTarget.classList.contains("loading")) return;

    const outOfStockForm = eventTarget.closest(".OutOfStockForm");
    const GForm = document.getElementById("gform_8"); // 7 : DEV, 8 : PROD
    const WC_backinstock_form = document.getElementsByClassName("variations_form cart")[0];

    if (!outOfStockForm || !GForm || !WC_backinstock_form) return;

    const emailContainer = outOfStockForm.getElementsByTagName("INPUT")[0];
    const sizeContainer = outOfStockForm.getElementsByClassName("shoeSize")[0];
    const nameContainer = outOfStockForm.getElementsByClassName("shoeName")[0];
    const GFormEmailInput = document.getElementById("input_8_1"); // input_7_1 : DEV | input_8_1 : PROD
    const GFormSizeInput = document.getElementById("input_8_3"); // input_7_3 : DEV | input_8_3 : PROD
    const GFormNameInput = document.getElementById("input_8_4"); // input_7_4 : DEV | input_8_4 : PROD

    if (!emailContainer || !sizeContainer || !nameContainer || !GFormEmailInput || !GFormSizeInput || !GFormNameInput) return;

    const emailValue = emailContainer.value;
    const sizeValue = sizeContainer.value;
    const nameValue = nameContainer.value;
    var validEmail = false;
    var validSize = true;
    var validName = true;

    if (isValidEmail(emailValue)) {
      GFormEmailInput.value = emailValue;
      validEmail = true;
      emailContainer.parentElement.classList.remove("error");

    } else {
      emailContainer.parentElement.classList.add("error");
      return
    }

    GFormSizeInput.value = sizeValue;
    GFormNameInput.value = nameValue;

    if (validEmail && validSize && validName) {
      eventTarget.classList.add("loading");

      $.ajax({
        type: 'POST',
        url: bis_out_of_stock_notify.wp_ajax_url,
        data: {
          action: 'bis_out_of_stock_notify',
          security: bis_out_of_stock_notify.out_of_stock_notify_nonce,
          lang: bis_out_of_stock_notify.current_user_language,
          notifyaddress: emailValue,
          firstname: "",
          lastname: "",
          mobilenumber: "",
          product_id: <?php echo $postID; ?>,
          variation_id: sizeValue
        },
        success: function(data) {
          GForm.submit();
        }
      });
    }

    return;
  }

  function handleProductOutOfStockConfirmationClose() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) {
      return;
    }

    const submissionForm = eventTarget.closest(".OutOfStockForm");
    const popUp = eventTarget.closest(".popUp")

    if (!submissionForm || !popUp) {
      return;
    }

    submissionForm.classList.add("complete");
    popUp.classList.remove("active")

    return;
  }

  function updateProductSize(variationID = null) {
    if (!variationID) {
      return;
    }

    const productContainer = document.getElementById("productContainer");
    const productVariationIDCotnainer = document.getElementById("productVariationIDCotnainer");
    const addProductToBagContainer = document.getElementById("addProductToBag");

    if (!productContainer || !productVariationIDCotnainer || !addProductToBagContainer) {
      return;
    }

    const sizes = productContainer.getElementsByClassName("size");

    for (var a = 0; a < sizes.length; a++) {
      const sizeVariationID = sizes[a].getAttribute("data-variation-id");

      sizes[a].classList.remove("active");

      if (variationID === sizeVariationID) {
        sizes[a].classList.add("active");
      }

    }

    addProductToBagContainer.classList.remove("disabled");
    productVariationIDCotnainer.value = variationID;

    return;
  }

  function updateHotspotProductSize(variationID = null) {
    if (!variationID) {
      return;
    }

    const hotspotContainer = document.getElementById("productHotspotsModule");
    const variationIDCotnainer = document.getElementById("hotSpotProductVariationIDCotnainer");
    const addProductToBagContainer = document.getElementById("hotSpotAddProductToBag");

    if (!hotspotContainer || !variationIDCotnainer || !addProductToBagContainer) {
      return;
    }

    const productSize = hotspotContainer.getElementsByClassName("productSize")[0];

    if (!productSize) {
      return;
    }

    const sizes = hotspotContainer.getElementsByClassName("size");

    for (var a = 0; a < sizes.length; a++) {
      const sizeVariationID = sizes[a].getAttribute("data-variation-id");
      const sizeVariationSize = sizes[a].getAttribute("data-variation-size");

      if (variationID === sizeVariationID) {
        productSize.innerText = parseFloat(sizeVariationSize.replace("-", "."));
      }
    }

    variationIDCotnainer.value = variationID;
    addProductToBagContainer.classList.remove("disabled");

    return;
  }

  function handleProductSizeClick(isBackOrder = false) {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) return;

    const variationID = eventTarget.getAttribute("data-variation-id");

    if (!variationID) return;

    const productContainer = document.getElementById("productContainer");

    if (productContainer) updateProductSize(variationID);

    const hotspotContainer = document.getElementById("productHotspotsModule");

    if (hotspotContainer) updateHotspotProductSize(variationID);

    if (!isBackOrder) {
      const addToBag = document.getElementById("addProductToBag");

      addToBag.innerText = "Add to bag";

      hideBackOrderMessage();
    }

    return;
  }

  function handleProcuctSizeTypeClick() {
    try {
      const eventTarget = event.currentTarget || event.target;
      const sizeContainer = eventTarget.closest(".sizeContainer");
      const sizeType = eventTarget.getAttribute("data-id");
      const sizeTypes = sizeContainer.getElementsByClassName("sizeType");

      for (var a = 0; a < sizeTypes.length; a++) {
        sizeTypes[a].classList.remove("active");
      }

      eventTarget.classList.add("active");
      setProductSizesToType(sizeType);
    } catch (error) {
      console.log(error);
    }
  }

  function setProductSizesToType(sizeType = null) {
    try {
      const sizeSelectContainer = document.getElementsByClassName("sizeSelectContainer")[0];
      const sizes = sizeSelectContainer.getElementsByClassName("size");

      for (var a = 0; a < sizes.length; a++) {
        var sizeValue = sizes[a].getAttribute("data-variation-size");

        if (!sizeValue) break;

        sizeValue = parseFloat(sizeValue.replace("-", "."));

        const sizeIndex = productSizesUK.indexOf(sizeValue);

        if (sizeIndex < 0) break;

        switch (sizeType) {
          case 'uk':
            sizes[a].getElementsByTagName("P")[0].innerText = productSizesUK[sizeIndex];
            break;
          case 'us':
            sizes[a].getElementsByTagName("P")[0].innerText = productSizesUS[sizeIndex];
            break;
          case 'eu':
            sizes[a].getElementsByTagName("P")[0].innerText = productSizesEU[sizeIndex];
            break;
        }
      }
    } catch (error) {
      console.log(error);
    }
  }

  var globalCarouselTouchX = 0;

  function handleProductGalleryPopUpOpen() {
    try {
      const eventTarget = event.currentTarget || event.target;
      const galleryContainer = eventTarget.closest(".galleryContainer");
      const galleryPopUpCarousel = galleryContainer.getElementsByClassName("galleryPopUpCarousel")[0];
      const productImageID = eventTarget.getAttribute("data-id");

      galleryPopUpCarousel.style.display = "block";

      shiftProductGalleryCarouselToFrame(galleryPopUpCarousel, productImageID);
      setTimeout(function() {
        galleryPopUpCarousel.classList.add("active");
        galleryPopUpCarousel.style.display = null;

      }, 20);
    } catch (error) {
      console.log(error);
    }
  }

  function handleProductGalleryPopUpClose() {
    try {
      const eventTarget = event.currentTarget || event.target;
      const galleryPopUpCarousel = eventTarget.closest(".galleryPopUpCarousel");

      galleryPopUpCarousel.style.opacity = 0;

      setTimeout(function() {
        galleryPopUpCarousel.classList.remove("active");
        galleryPopUpCarousel.style.opacity = null;

      }, 200);
    } catch (error) {
      console.log(error);
    }
  }

  function handleProductGalleryPopUpCloseButtonPosition() {
    try {
      const carousels = document.getElementsByClassName("galleryPopUpCarousel");

      for (var a = 0; a < carousels.length; a++) {
        const closeButton = carousels[a].getElementsByClassName("closeButton")[0];

        if (!closeButton) break;

        const windowWidth = window.innerWidth; //px
        const carouselWidth = 1920; //px
        const closeButtonPosition = (windowWidth - carouselWidth) / 2 < 0 ? 40 : ((windowWidth - carouselWidth) / 2) + 40; //px

        closeButton.style.right = closeButtonPosition + "px";
      }
    } catch (error) {
      console.log(error);
    }
  }

  function handleProductGalleryViewMore() {
    try {
      const eventTarget = event.currentTarget || event.target;
      const galleryContainer = eventTarget.closest(".galleryContainer");
      const galleryOpenClose = eventTarget.getAttribute("data-openclose");

      setProductGalleryHeights();
      setTimeout(function() {
        const productImages = galleryContainer.getElementsByClassName("productImage");

        for (var a = 0; a < productImages.length; a++) {
          if (galleryOpenClose == "open") {
            productImages[a].classList.remove("hidden");

          } else if (galleryOpenClose == "close" && a > 2) {
            productImages[a].classList.add("hidden");
          }
        }

        if (galleryOpenClose == "open") {
          eventTarget.getElementsByTagName("P")[0].innerText = "View less";
          eventTarget.setAttribute("data-openclose", "close");

        } else if (galleryOpenClose == "close") {
          eventTarget.getElementsByTagName("P")[0].innerText = "View more";
          eventTarget.setAttribute("data-openclose", "open");
        }

        setProductGalleryHeights();
      }, 20);
    } catch (error) {
      console.log(error);
    }
  }

  function setProductGalleryHeights() {
    try {
      const productContainers = document.getElementById("productContainer");

      for (var a = 0; a < productContainers.length; a++) {
        const galleryContainer = productContainers[a].getElementsByClassName("galleryContainer")[0];

        if (!galleryContainer) break;

        const galleryInner = galleryContainer.getElementsByClassName("inner")[0];

        if (!galleryContainer) break;

        const galleryInnerHeight = galleryInner.clientHeight; //px

        galleryContainer.style.height = galleryInnerHeight + "px";
      }
    } catch (error) {
      console.log(error);
    }
  }

  function handleProductGalleryCarouselLeftButtonPosition() {
    try {
      const carousels = document.getElementsByClassName("galleryPopUpCarousel");

      for (var a = 0; a < carousels.length; a++) {
        const leftButton = carousels[a].getElementsByClassName("carouselButton left")[0];

        if (!leftButton) break;

        const windowWidth = window.innerWidth; //px
        const carouselWidth = 1920; //px
        const leftButtonPosition = (windowWidth - carouselWidth) / 2 < 0 ? 0 : (windowWidth - carouselWidth) / 2; //px

        leftButton.style.left = leftButtonPosition + "px";
      }
    } catch (error) {
      console.log(error);
    }
  }

  function handleProductGalleryCarouselRightButtonPosition() {
    try {
      const carousels = document.getElementsByClassName("galleryPopUpCarousel");

      for (var a = 0; a < carousels.length; a++) {
        const rightButton = carousels[a].getElementsByClassName("carouselButton right")[0];

        if (!rightButton) break;

        const windowWidth = window.innerWidth; //px
        const carouselWidth = 1920; //px
        const rightButtonPosition = (windowWidth - carouselWidth) / 2 < 0 ? 0 : ((1) * (windowWidth - carouselWidth)) / 2; //px

        rightButton.style.right = rightButtonPosition + "px";
      }
    } catch (error) {
      console.log(error);
    }
  }

  function handleProductGalleryCarouselLeftButtonClick() {
    try {
      const eventTarget = event.currentTarget || event.target;

      shiftProductGalleryCarouselLeft(eventTarget);
    } catch (error) {
      console.log(error);
    }
  }

  function handleProductGalleryCarouselRightButtonClick() {
    try {
      const eventTarget = event.currentTarget || event.target;

      shiftProductGalleryCarouselRight(eventTarget);
    } catch (error) {
      console.log(error);
    }
  }

  function handleProductGalleryCarouselNaviagationTabClick() {
    try {
      const eventTarget = event.currentTarget || event.target;

      navigateProductGalleryCarousel(event);
    } catch (error) {
      console.log(error);
    }
  }

  function handleProductGalleryCarouselTouchStart() {
    try {
      const touchX = event.touches[0].clientX;

      globalCarouselTouchX = touchX;
    } catch (error) {
      console.log(error);
    }
  }

  function handleProductGalleryCarouselTouchEnd() {
    try {
      const eventTarget = event.currentTarget || event.target;
      const touchX = event.changedTouches[0].clientX;

      if (globalCarouselTouchX > touchX) shiftProductGalleryCarouselRight(eventTarget);

      if (globalCarouselTouchX < touchX) shiftProductGalleryCarouselLeft(eventTarget);

      globalCarouselTouchX = 0;
    } catch (error) {
      console.log(error);
    }
  }

  function shiftProductGalleryCarouselRight(eventTarget = null) {
    try {
      const carousel = eventTarget.closest(".galleryPopUpCarousel");
      const carsouselItems = carousel.getElementsByClassName("item");

      for (var a = 0; a < carsouselItems.length; a++) {
        if (carsouselItems[a].classList.contains("active")) {
          const newIndex = a + 1 >= carsouselItems.length ? 0 : a + 1;

          shiftProductGalleryCarouselToFrame(carousel, newIndex);

          return;
        }
      }
    } catch (error) {
      console.log(error);
    }
  }

  function shiftProductGalleryCarouselLeft(eventTarget = null) {
    try {
      const carousel = eventTarget.closest(".galleryPopUpCarousel");
      const carsouselItems = carousel.getElementsByClassName("item");

      for (var a = 0; a < carsouselItems.length; a++) {
        if (carsouselItems[a].classList.contains("active")) {
          const newIndex = a - 1 < 0 ? carsouselItems.length - 1 : a - 1;

          shiftProductGalleryCarouselToFrame(carousel, newIndex);

          return;
        }
      }
    } catch (error) {
      console.log(error);
    }
  }

  function navigateProductGalleryCarousel(event = null) {
    try {
      const eventTarget = event.currentTarget || event.target;
      const carousel = eventTarget.closest(".galleryPopUpCarousel");
      const tabIndex = eventTarget.getAttribute("data-id") || 0;

      shiftProductGalleryCarouselToFrame(carousel, tabIndex);
    } catch (error) {
      console.log(error);
    }
  }

  function shiftProductGalleryCarouselToFrame(carousel = null, frame = 0) {
    try {
      const carouselInner = carousel.getElementsByClassName("inner")[0];
      const carsouselItems = carousel.getElementsByClassName("item");
      const tabItems = carousel.getElementsByClassName("naigationTab");
      const transformXValue = frame * (carsouselItems[0].clientWidth + 20);

      for (var a = 0; a < carsouselItems.length; a++) {
        carsouselItems[a].classList.remove("active");
      }

      for (var a = 0; a < tabItems.length; a++) {
        tabItems[a].classList.remove("active");
      }

      carouselInner.style.transform = "translateX(-" + (transformXValue) + "px)";
      carsouselItems[frame].classList.add("active");
      tabItems[frame].classList.add("active");
    } catch (error) {
      console.log(error);
    }
  }

  function productGalleryCarouselOnLoadListener() {
    handleProductGalleryCarouselLeftButtonPosition();
    handleProductGalleryCarouselRightButtonPosition();
    handleProductGalleryPopUpCloseButtonPosition();
  }

  function productGalleryCarouselOnResizeListener() {
    handleProductGalleryCarouselLeftButtonPosition();
    handleProductGalleryCarouselRightButtonPosition();
    handleProductGalleryPopUpCloseButtonPosition();
  }

  function handleAddProductToBag() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) return;

    if (eventTarget.classList.contains("disabled") || eventTarget.classList.contains("loading")) return;

    const productIDContainer = document.getElementById("productIDContainer");
    //const productSKUCotnainer = document.getElementById("productSKUCotnainer");
    const productQantityCotnainer = document.getElementById("productQantityCotnainer");
    const productVariationIDCotnainer = document.getElementById("productVariationIDCotnainer");

    if (!productIDContainer /*|| !productSKUCotnainer*/ || !productQantityCotnainer || !productVariationIDCotnainer) return;

    const productID = productIDContainer.value ? parseInt(productIDContainer.value) : 0;
    //const productSKU = productSKUCotnainer.value ? parseInt(productSKUCotnainer.value) : 0;
    const productQantity = productQantityCotnainer.value ? parseInt(productQantityCotnainer.value) : 0;
    const productVariationID = productVariationIDCotnainer.value ? parseInt(productVariationIDCotnainer.value) : 0;

    if (!productID /*|| !productSKU*/ || !productQantity || !productVariationID) return;

    eventTarget.classList.add("loading");

    ajax_addToCard(productID, "", productQantity, productVariationID);

    return;
  }

  function ajax_addToCard(ID = 0, SKU = 0, quantity = 0, variableID = 0) {
    const ajaxURL = "/wp-admin/admin-ajax.php";
    const ajaxAction = "handleAddProductToBag";

    console.log(ID, SKU, quantity, variableID);

    $.ajax({
      type: 'POST',
      url: ajaxURL,
      dataType: 'html',
      data: {
        action: ajaxAction,
        productID: ID,
        productSKU: SKU,
        productVariableID: variableID,
        productQuantity: quantity
      },
      success: function(response) {
        console.log('add to cart ajax success', response);
        const addProductToBagButton = document.getElementById("addProductToBag");
        const hotspotAddProductToBagButton = document.getElementById("hotSpotAddProductToBag");

        if (addProductToBagButton) {
          addProductToBagButton.classList.remove("loading");
        }

        if (hotspotAddProductToBagButton) {
          hotspotAddProductToBagButton.classList.remove("loading");
        }

        if (!response) {
          handleProductAddToBagError();
          return;
        }

        const JSONResponse = JSON.parse(response);
        const isError = JSONResponse["error"];

        if (isError) {
          handleProductAddToBagError(JSONResponse["errorType"]);
          return;
        }

        handleProductAddedToBag(JSONResponse["cartCount"]);

        return;
      },
      error: function(response) {
        console.log('add to cart ajax failed', response);
        const addProductToBagButton = document.getElementById("addProductToBag");

        if (addProductToBagButton) {
          addProductToBagButton.classList.remove("loading");
        }

        handleProductAddToBagError();

        console.log('ajax failed ' + response);

        return;
      }
    });
  }

  function handleProductAddToBagError(errorType = null) {
    const productContainer = document.getElementById("productContainer");

    if (!productContainer) {
      return;
    }

    const addToBadErrorContainer = document.getElementById("addToBagErrorContainer");

    if (!addToBadErrorContainer) {
      return;
    }

    return;
  }

  function handleProductAddedToBag(cartCount = 0) {
    if (!cartCount) {
      return;
    }

    const navigationCartCountContainer = document.getElementById("navigationCartCount");

    if (!navigationCartCountContainer) {
      return;
    }

    navigationCartCountContainer.innerText = cartCount;
    window.location = window.location.origin + "/cart/";

    return;
  }

  function convertDateFormat(dateString) {
    const parts = dateString.split('/');
    const formattedDate = `${parts[1]}/${parts[0]}/${parts[2]}`;
    return formattedDate;
  }

  function handleBackOrderClick() {
    const eventTarget = event.currentTarget || event.target;
    const backOrderMessage = document.getElementById("backOrderMessage");
    const backOrderStartDate = eventTarget.getAttribute('data-backOrderRangeStart').toString().trim();
    const backOrderEndDate = eventTarget.getAttribute('data-backOrderRangeEnd').toString().trim();
    const backOrderFrom = backOrderMessage.getElementsByClassName('startDate')[0];
    const backOrderTo = backOrderMessage.getElementsByClassName('endDate')[0];
    const addToBagButton = document.getElementById("addProductToBag");
    const currentDate = new Date();
    const startDateAsDateObject = new Date(convertDateFormat(backOrderStartDate));
    const endDateAsDateObject = new Date(convertDateFormat(backOrderEndDate));
    const startWeeks = Math.ceil((startDateAsDateObject.getTime() - currentDate.getTime()) / (1000 * 60 * 60 * 24 * 7));
    const endWeeks = Math.ceil((endDateAsDateObject.getTime() - currentDate.getTime()) / (1000 * 60 * 60 * 24 * 7));

    console.log(backOrderEndDate);
    console.log(endDateAsDateObject);
    console.log(endWeeks);
    console.log(backOrderStartDate);
    console.log(startDateAsDateObject);
    console.log(startWeeks);

    backOrderFrom.innerText = startWeeks;
    backOrderTo.innerText = endWeeks;
    addToBagButton.innerText = "Pre-order";
    addToBagButton.classList.add("preOrder");
    backOrderMessage.classList.add("active");

    handleProductSizeClick(true);
  }

  // function showBackOrderMessage() {
  //   const backOrderMessage = document.getElementById("backOrderMessage");

  //   if (!backOrderMessage) return;

  //   backOrderMessage.classList.add("active");

  //   return;
  // };

  function hideBackOrderMessage() {
    try {
      const backOrderMessage = document.getElementById("backOrderMessage");
      const addToBagButton = document.getElementById("addProductToBag");

      backOrderMessage.classList.remove("active");
      addToBagButton.classList.remove("preOrder");
    } catch (error) {
      console.log(error);
    }
  };

  window.addEventListener("load", productGalleryCarouselOnLoadListener);
  window.addEventListener("resize", productGalleryCarouselOnResizeListener);
</script>

<style>
  @media (max-width: 600px) {
    .shopPromoBanner>.outer>.inner>svg {
      width: 20px !important;
      margin-right: 0px !important;
    }

    .shopPromoBanner>.outer>.inner>p {
      font-size: 10px;
    }

    #main {
      margin-top: 20px !important;
    }
  }

  #backOrderMessage {
    display: none;
    text-align: center;
    padding-top: 20px;
  }

  #backOrderMessage.active {
    display: block;
  }

  #main {
    margin-bottom: 0px !important;
  }

  .preOrder {
    background-color: #000 !important;
  }

  section#productContainer {
    padding-bottom: 100px;
    overflow: hidden;
  }

  section#productContainer>.outer {
    max-width: 1920px !important;
    padding: 0 50px;
    margin: 0 auto;
  }

  section#productContainer>.outer>.inner {
    max-width: 1320px;
    margin: 0 auto;
    display: grid;
    grid-gap: 0px;
    grid-template-columns: 1fr 420px;
    grid-template-areas: "left right";
    align-content: center;
    justify-content: center;
    align-items: start;
    grid-gap: 50px;
  }

  section#productContainer>.outer>.inner>.left {
    grid-area: left;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer {
    transition: height 200ms ease;
    overflow: visible;
    position: relative;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.veganImage {
    position: absolute;
    top: 40px;
    left: 40px;
    width: 100px;
    z-index: 10;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner {
    display: grid;
    align-content: center;
    justify-content: center;
    align-items: center;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 10px;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner>.productImage {
    background-color: #F7F7F7;
    padding: 30px;
    opacity: 1;
    transition: opacity 200ms ease, background 200ms ease;
    cursor: pointer;
    background-position: center bottom;
    background-size: contain;
    background-repeat: no-repeat;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner>.productImage:hover {
    background-color: #e5e7eb;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner>.productImage>img {}

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner>.productImage.fullWidth {
    grid-column: span 2;
    padding: 0;

  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner>.productImage.fullWidth>img {}

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner>.productImage.hidden {
    display: none;
    opacity: 0;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.viewMoreButton {
    text-align: center;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.viewMoreButton>.inner {
    display: inline-block;
    width: auto;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.viewMoreButton>.inner>p {
    font-size: 18px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Gza';
    color: #000;
    background-color: #fff;
    padding: 1em 2.5em;
    border-radius: 30px;
    border: 1px solid #000;
    transform: translateY(-1.5em);
    transition: color 200ms ease, background 200ms ease;
    cursor: pointer;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.viewMoreButton>.inner>p:hover {
    background-color: #000;
    color: #fff;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: #fff;
    z-index: 16;
    display: none;
    opacity: 0;
    transition: opacity 200ms ease;
    overflow-y: scroll;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.background {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 1;
    background-position: left bottom;
    background-size: auto;
    background-repeat: no-repeat;
    background-color: #f7f7f7;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel {
    display: grid;
    align-content: center;
    justify-content: start;
    align-items: center;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel::-webkit-scrollbar {
    display: none;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel.active {
    display: block;
    opacity: 1;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer {
    margin: 0 auto;
    position: relative;
    max-width: 100vw;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.closeButton {
    padding: 0;
    background: none;
    border: none;
    appearance: none;
    position: absolute;
    top: 40px;
    z-index: 10;
    right: 0;
    cursor: pointer;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>button.carouselButton {
    position: absolute;
    top: 50%;
    transform: translate(0, -50%);
    padding: 10px;
    background-color: #000;
    z-index: 10;
    opacity: 0;
    transition: opacity 200ms ease, padding 200ms ease;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>button.carouselButton.active {
    opacity: 1;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>button.carouselButton.left {
    transform: translate(0, -50%) rotate(180deg);
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>button.carouselButton.left:hover {
    padding-left: 20px;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>button.carouselButton.right:hover {
    padding-left: 20px;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner {
    display: -ms-grid;
    display: grid;
    grid-gap: 20px;
    align-content: center;
    justify-content: start;
    align-items: start;
    transition: transform 200ms ease;
    max-height: 80vh;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item {
    padding: 30px;
    border-radius: 10px;
    width: 100vw;
    opacity: 0.6;
    transition: opacity 200ms ease;
    position: relative;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item.active,
  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item.active+.item {
    opacity: 1;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item>.imageContainer {
    text-align: center;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item>.imageContainer>img {
    max-height: 80vh;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.tabContainer {
    display: -ms-grid;
    display: grid;
    align-content: center;
    justify-content: center;
    align-items: center;
    grid-gap: 10px;
    margin-top: 30px;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.tabContainer>.naigationTab {
    width: 20px;
    height: 5px;
    background: #000;
    border-radius: 10px;
    opacity: 0.4;
    transition: opacity 200ms ease;
    cursor: pointer;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.tabContainer>.naigationTab.active {
    opacity: 1;

  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile {
    display: none;
  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productName {
    font-size: 31px;
    line-height: 1.1;
    letter-spacing: 0.01px;
    font-weight: bold;
    font-family: 'Univers LT Roman';
    max-width: calc(100% - 110px);
    margin: 0;
    grid-area: heading;
  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productVariant {
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    color: #727272;
    font-family: 'Univers LT Roman';
    grid-area: variant;
  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productPrice {
    font-size: 25px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Gza';
    color: #FC4F00;
    font-weight: bold;
    grid-area: price;
    text-align: right;
  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating {
    display: inline-block;
    width: auto;
  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating>.starContainer {
    position: relative;
    width: calc(5 * 19px);
    height: 30px;
    display: inline-block;
    vertical-align: middle;
  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating>.starContainer>.backgroundStars,
  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating>.starContainer>.backgroundStars {
    opacity: 0.3;
  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating>.starContainer>.foregroundStars,
  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating>.starContainer>.backgroundStars {
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden !important;
  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating>.starContainer>.foregroundStars>.inner,
  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating>.starContainer>.foregroundStars>.inner {
    width: calc(5 * 34px);
  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating>.starContainer svg,
  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating>.starContainer svg {
    width: 15px;
    height: 15px;
    display: inline-block;
    vertical-align: middle;
  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating>.countContainer {
    display: inline-block;
    vertical-align: middle;
  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating>.countContainer>p {
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Univers LT Roman';
    text-decoration: underline;
    cursor: pointer;
    color: #000;
    transition: color 200ms ease;
  }

  section#productContainer>.outer>.inner>.left>.detailsContainerMobile>.productRating>.countContainer>p:hover {
    color: #FC4F00;
  }

  section#productContainer>.outer>.inner>.right {
    grid-area: right;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer {
    transition: transform 100ms linear;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer.static {
    transform: none !important;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner {
    position: relative;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating {
    position: absolute;
    top: 0;
    right: 0;
    display: inline-block;
    width: auto;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating>.starContainer {
    position: relative;
    width: calc(5 * 19px);
    height: 30px;
    display: inline-block;
    vertical-align: middle;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating>.starContainer>.backgroundStars,
  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating>.starContainer>.backgroundStars {
    opacity: 0.3;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating>.starContainer>.foregroundStars,
  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating>.starContainer>.backgroundStars {
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden !important;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating>.starContainer>.foregroundStars>.inner,
  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating>.starContainer>.foregroundStars>.inner {
    width: calc(5 * 34px);
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating>.starContainer svg,
  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating>.starContainer svg {
    width: 15px;
    height: 15px;
    display: inline-block;
    vertical-align: middle;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating>.countContainer {
    display: inline-block;
    vertical-align: middle;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating>.countContainer>p {
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Univers LT Roman';
    text-decoration: underline;
    cursor: pointer;
    color: #000;
    transition: color 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating>.countContainer>p:hover {
    color: #FC4F00;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productName {
    font-size: 31px;
    line-height: 1.1;
    letter-spacing: 0.01px;
    font-weight: bold;
    font-family: 'Univers LT Roman';
    max-width: calc(100% - 110px);
    margin: 0;
    margin-bottom: 10px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productName>span {
    color: rgb(4, 169, 141);
    font-weight: bold;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariant {
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    color: #727272;
    font-family: 'Univers LT Roman';
    margin-bottom: 20px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productPrice {
    font-size: 25px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Gza';
    color: #FC4F00;
    margin-bottom: 50px;
    font-weight: bold;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery {
    margin-bottom: 30px;
    position: relative;

  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.outer {
    overflow-x: scroll;
    padding-left: 20px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.outer::-webkit-scrollbar {
    display: none;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.button {
    display: none;
    position: absolute;
    top: 50%;
    transform: translateY(-75%);
    cursor: pointer;
    z-index: 2;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery.left>.button.left {
    display: block;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery.right>.button.right {
    display: block;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.button.left {
    left: -20px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.button.right {
    right: -10px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.button.left svg {
    rotate: 90deg;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.button.right svg {
    rotate: 270deg;
  }


  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.outer>.inner {
    display: grid;
    grid-gap: 10px;
    align-content: center;
    justify-content: start;
    align-items: center;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.outer>.inner>.variantImage {
    width: 70px;
    height: 70px;
    position: relative;
    background-color: #fff;
    transition: background 200ms ease;
    overflow: hidden;
    border-radius: 5px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.outer>.inner>.variantImage.active {
    border: 1px solid #727272;
    background-color: #F7F7F7;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.outer>.inner>.variantImage:hover {
    background-color: #F7F7F7;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.outer>.inner>.variantImage>.checkbox {
    display: inline-block;
    position: absolute;
    top: 0;
    right: 3px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.bootTypeContainer {
    margin-bottom: 40px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.bootTypeContainer>.inner {
    display: grid;
    grid-gap: 10px;
    align-content: center;
    justify-content: start;
    align-items: center;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.bootTypeContainer>.inner>.bootType {
    position: relative;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.bootTypeContainer>.inner>.bootType>div {
    position: absolute;
    top: 0;
    right: 3px;
    display: inline-block;
    width: auto;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.bootTypeContainer>.inner>.bootType>div>svg {}

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.bootTypeContainer>.inner>.bootType>p {
    font-size: 15px;
    padding: 1em 2em;
    background-color: #f7f7f7;
    border: 1px solid #727272;
    border-radius: 5px;
    font-family: 'Univers LT Roman';
    transition: background 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.bootTypeContainer>.inner>.bootType>a {
    font-size: 15px;
    padding: 1em 2em;
    background-color: #f7f7f7;
    border: 1px solid #f7f7f7;
    border-radius: 5px;
    font-family: 'Univers LT Roman';
    transition: background 200ms ease;
    color: #000
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.bootTypeContainer>.inner>.bootType>a:hover,
  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.bootTypeContainer>.inner>.bootType>p:hover {
    background-color: #e5e7eb;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer {
    margin-bottom: 40px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner {}

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>p {
    font-size: 18px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-weight: bold;
    font-family: 'Univers LT Roman';
    margin-bottom: 10px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer {
    display: grid;
    grid-gap: 10px;
    align-content: center;
    justify-content: start;
    align-items: center;
    grid-template-columns: 1fr auto;
    grid-template-areas: "sizeTypes sizeGuide";
    margin-bottom: 20px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeTypes {
    display: grid;
    grid-gap: 10px;
    grid-template-columns: repeat(3, auto);
    align-content: center;
    justify-content: start;
    grid-area: sizeTypes;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeTypes>p {
    font-size: 15px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Univers LT Roman';
    color: #727272;
    transition: color 200ms ease;
    cursor: pointer;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeTypes>p.active {
    color: #000;
    font-weight: bold;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeTypes>p:hover {
    color: #FC4F00;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeTypes>p.active:hover {
    color: #000;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide {
    grid-area: sizeGuide;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>p {
    font-size: 15px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Univers LT Roman';
    color: #48A18A;
    text-decoration: underline;
    transition: color 200ms ease;
    cursor: pointer;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>p:hover {
    color: #FC4F00
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 10;
    display: none;
    opacity: 0;
    transition: opacity 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp.active {
    display: block;
    opacity: 1;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp>.background {
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.6);
    width: 100vw;
    height: 100vh;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp>.outer {
    max-width: 1920px;
    margin: 0 auto;
    height: 100%;
    padding: 0 50px;
    display: grid;
    align-content: center;
    justify-content: center;
    align-items: center;
    position: relative;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp>.outer>.inner {
    display: grid;
    grid-template-columns: 1fr 100px;
    grid-template-areas:
      "heading close"
      "content content";
    align-content: center;
    justify-content: center;
    align-items: center;
    max-width: 1320px;
    background-color: #fff;
    max-height: 50vh;
    overflow-y: scroll;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp>.outer>.inner::-webkit-scrollbar {
    display: none;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp>.outer>.inner>p {
    font-size: 38px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Gza';
    display: block;
    padding: 30px 20px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp>.outer>.inner>button {
    /* here */
    height: 100px;
    width: 100px;
    padding: 0;
    bordeR: none;
    background: none;
    appearance: none;
    background-color: #EBEBEB;
    cursor: pointer;
    transition: background 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp>.outer>.inner>button:hover {
    background-color: #BFBFBF;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp>.outer>.inner>.content {
    padding: 30px 20px;
    border-top: 2px solid #EBEBEB;
    grid-area: content;
  }

  .sizeTable {}

  .sizeTable>.inner {
    overflow-x: scroll;
    padding-bottom: 30px;
  }

  .sizeTable>.inner::-webkit-scrollbar {
    height: 5px;
    width: 5px;
  }

  .sizeTable>.inner::-webkit-scrollbar-thumb {
    background: #EBEBEB;
    border-radius: 10px;
  }

  .sizeTable>.inner::-webkit-scrollbar-track {
    margin-left: 30vw;
    margin-right: 30vw;
    background: #e7e7e7;
    border-radius: 10px;
  }

  .sizeTable>.inner>.sizeRow {
    display: grid;
    grid-template-columns: repeat(25, auto);
    align-content: center;
    justify-content: start;
    align-items: center;
    padding: 0;
    margin: 0;
  }

  .sizeTable>.inner>.sizeRow>li>p {
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Univers LT Roman';
    text-align: center;
    width: 150px;
    padding: 1em 0;
    border: 1px solid #727272;
    border-top: none;
    border-left: none;
  }

  .sizeTable>.inner>.sizeRow>li:nth-child(odd)>p {
    background-color: #EBEBEB;
    border: 1px solid #727272;
    border-top: none;
    border-left: none;
  }

  .sizeTable>.inner>.sizeRow:nth-last-child(1)>li>p {
    border-bottom: none
  }

  .sizeTable>.inner>.sizeRow>li:nth-last-child(1)>p {
    border-right: none;
  }

  .sizeTable>.inner>.sizeRow>li.rowName>p {
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Univers LT Roman';
    text-align: center;
    width: 150px;
    padding: 1em 0;
    font-weight: bold;
    background-color: #EBEBEB;
    border: 1px solid #727272;
    border-top: none;
    border-left: none;
  }

  .sizeTable>.inner>.sizeRow:nth-last-child(1)>li.rowName>p {
    border-bottom: none
  }

  .unitToggleContainer {
    margin-bottom: 20px;
  }

  .unitToggleContainer>.inner {
    display: grid;
    grid-gap: 10px;
    grid-template-columns: repeat(2, auto);
    align-content: center;
    justify-content: start;
    align-items: center;
  }

  .unitToggleContainer>.inner>.unitToggle {
    padding: 10px;
    border: 1px solid #EBEBEB;
    background-color: #fff;
    text-align: center;
    width: 50px;
    cursor: pointer;
    transition: background 200ms ease, border 200ms ease, color 200ms ease;
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Univers LT Roman';
    color: #000;
  }

  .unitToggleContainer>.inner>.unitToggle:hover {
    background-color: #EBEBEB;
  }

  .unitToggleContainer>.inner>.unitToggle.active {
    border: 1px solid #000;
    background-color: #000;
    color: #fff;
  }




  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeNotice>p {
    display: inline-block;
    vertical-align: middle;
    color: #727272;
    font-size: 12px;
    font-family: 'Univers LT Roman';
    line-height: 1.1;
    letter-spacing: 0.01em;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeNotice>p>svg {
    display: inline-block;
    vertical-align: middle;
  }




  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    align-content: center;
    justify-content: center;
    align-items: center;
    margin-bottom: 10px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size {
    position: relative;
    cursor: pointer;
    text-align: center;
    background-color: #fff;
    transition: background 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:hover {
    background-color: #F7F7F7;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size.outOfStock {
    background-color: #F7F7F7;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size.active {
    background-color: #F7F7F7;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size>svg {
    display: none;
    opacity: 0;
    transition: opacity 200ms ease;
    position: absolute;
    top: 3px;
    right: 3px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size>p {
    font-size: 15px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    color: #000;
    font-family: 'Univers LT Roman';
    display: inline-block;
    width: auto;
    padding: 1em;
    border: 1px solid #CFD0D0;
    border-left: none;
    width: 100%;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(1)>p,
  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(7)>p,
  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(13)>p,
  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(19)>p {
    border-left: 1px solid #CFD0D0;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(n + 7)>p {
    border-top: none;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size.outOfStock>svg {
    display: inline-block;
    opacity: 1;
    width: auto;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size.outOfStock>svg path {
    transition: all 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size.outOfStock:hover>svg path {
    fill: #FC4F00;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size.outOfStock>svg:hover path {
    fill: #FC4F00;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size.outOfStock>p {
    color: #BFBFBF;
    text-decoration: line-through;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size.active>svg {
    display: inline-block;
    opacity: 1;
    width: auto;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size.active>p {
    border: 1px solid #727272 !important;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.addToBagButtonContainer {
    margin-top: 40px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.addToBagButtonContainer>button {
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
    transition: background 200ms ease, opacity 200ms ease;
    position: relative;
    opacity: 1;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.addToBagButtonContainer>button.disabled,
  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.addToBagButtonContainer>button.disabled::after {
    background-color: #E24700;
    cursor: not-allowed;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.addToBagButtonContainer>button.disabled {
    opacity: 0.6;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.addToBagButtonContainer>button:hover {
    background-color: #E24700;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.addToBagButtonContainer>button.disabled:hover {
    background-color: #E24700;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.addToBagButtonContainer>button::after {
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

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.addToBagButtonContainer>button.loading::after {
    opacity: 1;
    z-index: 2;
    cursor: not-allowed;
  }

  .outOfStockNotificationPopUp {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 12;
    display: none;
    opacity: 0;
    transition: opacity 200ms ease;
  }

  .outOfStockNotificationPopUp.active {
    display: block;
    opacity: 1;
    z-index: 21;
  }

  .outOfStockNotificationPopUp>.background {
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.6);
    width: 100vw;
    height: 100vh;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
  }

  .outOfStockNotificationPopUp>.outer {
    max-width: 1920px;
    margin: 0 auto;
    height: 100%;
    padding: 0 50px;
    display: grid;
    align-content: center;
    justify-content: center;
    align-items: center;
    position: relative;
  }

  .outOfStockNotificationPopUp>.outer>.inner {
    display: grid;
    grid-template-columns: 1fr 100px;
    grid-template-areas:
      "heading close"
      "content content";
    align-content: center;
    justify-content: center;
    align-items: center;
    width: 100vw;
    max-width: 1320px;
    background-color: #fff;
    max-height: 80vh;
    overflow-y: scroll;
    height: auto;
  }

  .outOfStockNotificationPopUp>.outer>.inner::-webkit-scrollbar {
    display: none;
  }

  .outOfStockNotificationPopUp>.outer>.inner>p {
    font-size: 38px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Gza';
    display: block;
    padding: 30px 20px;
  }

  .outOfStockNotificationPopUp>.outer>.inner>button {
    /* here */
    height: 100px;
    width: 100px;
    padding: 0;
    bordeR: none;
    background: none;
    appearance: none;
    background-color: #EBEBEB;
    cursor: pointer;
    transition: background 200ms ease;
  }

  .outOfStockNotificationPopUp>.outer>.inner>button:hover {
    background-color: #bfbfbf;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content {
    padding: 30px 20px;
    border-top: 2px solid #EBEBEB;
    grid-area: content;
    padding-bottom: 50px;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>p {
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Univers LT Roman';
    margin-bottom: 20px;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form {}

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.confirmationContainer {
    display: none;
    opacity: 0;
    transition: opacity 200ms ease;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 10;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.4);
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form.submitted>.confirmationContainer {
    display: block;
    opacity: 1;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form.submitted.complete>.confirmationContainer {
    display: none;
    opacity: 0;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.confirmationContainer>.background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    z-index: 2;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.confirmationContainer>.outer {
    max-width: 1920px;
    padding: 10vh 50px;
    margin: 0 auto;
    height: 100vh;
    position: relative;
    display: grid;
    align-content: center;
    justify-content: center;
    align-items: center;
    grid-template-columns: 1fr;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.confirmationContainer>.outer>.inner {
    max-width: 800px;
    margin: 0 auto;
    padding: 40px;
    border-radius: 30px;
    background-color: black;
    width: 100%;
    position: relative;
    z-index: 3;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.confirmationContainer>.outer>.inner>h6 {
    margin-bottom: 20px;
    font-size: 34px;
    line-height: 1.1;
    letter-spacing: 0;
    font-weight: bold;
    font-family: 'Gza';
    color: #FC4F00;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.confirmationContainer>.outer>.inner>p {
    font-family: 'Univers LT Roman';
    font-size: 18px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    color: #fff;
    margin-bottom: 20px;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.confirmationContainer>.outer>.inner>.closeButton {
    font-family: 'Univers LT Roman';
    font-size: 18px;
    font-weight: bold;
    line-height: 1.1;
    letter-spacing: 0.01em;
    color: #fff;
    transition: color 200ms ease;
    background: none;
    border: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    cursor: pointer;
    padding: 0;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner {
    width: 100%;
    display: inline-block;
    position: relative;
    max-width: 450px;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.emailContainer {}

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.emailContainer>input {
    font-family: 'Gza';
    font-size: 16px;
    line-height: 1.1;
    letter-spacing: 0;
    color: #000;
    padding: 1rem 2rem;
    border-radius: 30px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border: 1px solid #727272;
    transition: all 200ms ease;
    width: 100%;
    height: 53px;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.emailContainer.error>input {
    border-color: red;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.emailContainer>.errorText {
    font-family: 'Gza';
    font-size: 12px;
    line-height: 1.1;
    letter-spacing: 0;
    color: red;
    padding: 16px 32px;
    position: absolute;
    bottom: 0;
    left: 0;
    display: block;
    width: 100%;
    transform: translateY(100%);
    opacity: 0;
    transition: opacity 200ms ease;
    overflow: hidden;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.emailContainer.error>.errorText {
    opacity: 1;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.submit {
    grid-area: submit;
    font-family: 'Gza';
    font-size: 18px;
    font-weight: bold;
    line-height: 1.3;
    letter-spacing: 0.05em;
    color: #FFF;
    padding: 1rem 2rem;
    border-radius: 30px;
    margin: 0;
    border: none;
    background-color: #FC4F00;
    position: relative;
    opacity: 1;
    transition: opacity 200ms ease, background 200ms ease;
    position: absolute;
    top: 0;
    right: 0;
    height: 53px;
    min-width: 180px;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.submit:hover {
    background-color: #E24700;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.submit::after {
    content: "Submitting...";
    font-family: 'Gza';
    font-size: 18px;
    font-weight: bold;
    line-height: 1.3;
    letter-spacing: 0.05em;
    color: #FFF;
    padding: 1rem 2rem;
    border-radius: 30px;
    margin: 0;
    border: none;
    background-color: #FC4F00;
    position: absolute;
    opacity: 0;
    transition: opacity 200ms ease;
    top: 0;
    left: 0;
    display: block;
    width: 100%;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.submit.loading {
    cursor: not-allowed;
    opacity: 0.5;
  }

  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.submit.loading::after {
    opacity: 1;
    cursor: not-allowed;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer {}

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.inner {
    display: grid;
    grid-template-columns: 30px 1fr 30px;
    grid-gap: 11px;
    align-content: center;
    justify-content: center;
    align-items: center;
    padding: 10px 20px;
    background-color: #f7f7f7;
    border-radius: 5px;
    margin-bottom: 5px;
    cursor: pointer;
    transition: background 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.inner:hover {
    background-color: #e5e7eb;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails:nth-last-child(1) {
    margin-bottom: 0px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.inner>p {
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Univers LT Roman';
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.inner>p>img {
    transform: translateY(-1px);
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 21;
    display: none;
    opacity: 0;
    transition: opacity 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp.active {
    display: block;
    opacity: 1;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.background {
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.6);
    width: 100vw;
    height: 100vh;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.outer {
    max-width: 1920px;
    margin: 0 auto;
    height: 100%;
    padding: 0 50px;
    display: grid;
    align-content: center;
    justify-content: center;
    align-items: center;
    position: relative;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.outer>.inner {
    display: grid;
    grid-template-columns: 1fr 100px;
    grid-template-areas:
      "heading close"
      "content content";
    align-content: center;
    justify-content: center;
    align-items: center;
    max-width: 1320px;
    background-color: #fff;
    max-height: 50vh;
    overflow-y: scroll;
    height: auto;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.outer>.inner::-webkit-scrollbar {
    display: none;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.outer>.inner>p {
    font-size: 38px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Gza';
    display: block;
    padding: 30px 20px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.outer>.inner>button {
    /* here */
    height: 100px;
    width: 100px;
    padding: 0;
    bordeR: none;
    background: none;
    appearance: none;
    background-color: #EBEBEB;
    cursor: pointer;
    transition: background 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.outer>.inner>button:hover {
    background-color: #bfbfbf;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.outer>.inner>.content {
    padding: 30px 20px;
    border-top: 2px solid #EBEBEB;
    grid-area: content;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.outer>.inner>.content>div>p {
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Univers LT Roman';
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 21;
    display: none;
    opacity: 0;
    transition: opacity 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp.active {
    display: block;
    opacity: 1;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.background {
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.6);
    width: 100vw;
    height: 100vh;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer {
    max-width: 1920px;
    margin: 0 auto;
    height: 100%;
    padding: 0 50px;
    display: grid;
    align-content: center;
    justify-content: center;
    align-items: center;
    position: relative;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner {
    display: grid;
    grid-template-columns: 1fr 100px;
    grid-template-areas:
      "heading close"
      "content content";
    align-content: stretch;
    justify-content: center;
    align-items: start;
    max-width: 1320px;
    background-color: #fff;
    max-height: 50vh;
    overflow-y: scroll;
    height: auto;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner::-webkit-scrollbar {
    display: none;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>p {
    font-size: 38px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Gza';
    display: block;
    padding: 30px 20px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>button {
    /* here */
    height: 100px;
    width: 100px;
    padding: 0;
    bordeR: none;
    background: none;
    appearance: none;
    background-color: #EBEBEB;
    cursor: pointer;
    transition: background 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>button:hover {
    background-color: #bfbfbf;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>.content {
    padding: 30px 20px;
    border-top: 2px solid #EBEBEB;
    grid-area: content;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>.content>.shippingTable {}

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>.content>.shippingTable>ul {
    padding: 0;
    margin: 0;
    grid-template-columns: repeat(3, 1fr);
    display: grid;
    text-align: left;
    align-content: center;
    justify-content: start;
    align-items: center;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>.content>.shippingTable>ul>li:nth-child(1) {
    min-width: 110px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>.content>.shippingTable>ul>li>p {
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Univers LT Roman';
    font-weight: bold;
    border: 1px solid #727272;
    border-top: none;
    border-left: none;
    padding: 1em;
    height: 59px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>.content>.shippingTable>ul.headerRow>li>p,
  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>.content>.shippingTable>ul:nth-child(odd)>li>p {
    font-weight: bold;
    background-color: #EBEBEB;
    border: 1px solid #727272;
    border-top: none;
    border-left: none;
    padding: 1em;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>.content>.shippingTable>ul>li:nth-last-child(1)>p {
    border-right: none;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>.content>.shippingTable>ul:nth-last-child(1)>li>p {
    border-bottom: none;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 21;
    display: none;
    opacity: 0;
    transition: opacity 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp.active {
    display: block;
    opacity: 1;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.background {
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.6);
    width: 100vw;
    height: 100vh;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer {
    max-width: 1920px;
    margin: 0 auto;
    height: 100%;
    padding: 0 50px;
    display: grid;
    align-content: center;
    justify-content: center;
    align-items: center;
    position: relative;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer>.inner {
    display: grid;
    grid-template-columns: 1fr 100px;
    grid-template-areas:
      "heading close"
      "content content";
    align-content: center;
    justify-content: center;
    align-items: center;
    max-width: 1320px;
    background-color: #fff;
    max-height: 50vh;
    overflow-y: scroll;
    height: auto;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer>.inner::-webkit-scrollbar {
    display: none;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer>.inner>p {
    font-size: 38px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Gza';
    display: block;
    padding: 30px 20px;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer>.inner>button {
    /* here */
    height: 100px;
    width: 100px;
    padding: 0;
    bordeR: none;
    background: none;
    appearance: none;
    background-color: #EBEBEB;
    cursor: pointer;
    transition: background 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer>.inner>button:hover {
    background-color: #bfbfbf;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer>.inner>.content {
    padding: 30px 20px;
    border-top: 2px solid #EBEBEB;
    grid-area: content;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer>.inner>.content>div>p {
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.01em;
    font-family: 'Univers LT Roman';
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer>.inner>.content>div>p>a {
    color: #FC4F00;
    font-weight: bold;
    transition: color 200ms ease;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer>.inner>.content>div>p>a:hover {
    color: #E24700;
  }

  @media (max-width: 1200px) {
    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item.active+.item {
      opacity: 0.6;
    }
  }

  @media (max-width: 1080px) {

    section#productContainer>.outer,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.outer,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp>.outer,
    .outOfStockNotificationPopUp>.outer {
      padding: 0 20px;
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.outer>.inner,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer>.inner,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp>.outer>.inner,
    .outOfStockNotificationPopUp>.outer>.inner {
      grid-template-columns: 1fr 65px;
      width: calc(100vw - 40px);
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.outer>.inner>p,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>p,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer>.inner>p,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp>.outer>.inner>p,
    .outOfStockNotificationPopUp>.outer>.inner>p {
      font-size: 32px;
      padding: 20px;
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.klarnaPopUp>.outer>.inner>button,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.shippingPopUp>.outer>.inner>button,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer>.inner>.trackingDetails>.returnsPopUp>.outer>.inner>button,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeGuidContainer>.sizeGuide>.sizeGuidePopUp>.outer>.inner>button,
    .outOfStockNotificationPopUp>.outer>.inner button {
      height: auto;
      width: auto;
      padding: 20px;
      background-color: #fff;
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.bootTypeContainer>.inner>.bootType>a,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.bootTypeContainer>.inner>.bootType>p {
      padding: 1em 0.5em;
      min-width: 130px;
      display: inline-block;
      text-align: center;
    }

    section#productContainer>.outer>.inner {
      grid-template-columns: 1fr;
      grid-template-areas:
        "left"
        "right";
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>button.carouselButton {
      display: none;
    }

    section#productContainer>.outer>.inner>.left>.detailsContainerMobile {
      display: grid;
      grid-template-columns: 1fr 110px;
      grid-template-areas:
        "heading price"
        "variant rating";
      align-content: center;
      justify-content: center;
      align-items: center;
      max-width: 100vw;
      margin: 0 auto;
      padding: 0 20px;
      grid-gap: 10px 0;
      position: relative;
      z-index: 10;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer {
      max-width: 100vw;
      margin: 0 auto;
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer {
      max-width: 100vw;
      margin: 0 auto;
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productName,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariant,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productPrice,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productRating {
      display: none;
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.outer>.inner>.variantImage {
      width: 100px;
      height: 100px;
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.button {
      display: none !important;
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.bootTypeContainer {
      padding: 0 20px;
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer {
      padding: 0 20px;
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.trackingContainer {
      padding: 0 20px;
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer {
      grid-template-columns: repeat(5, 1fr);
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(1)>p,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(6)>p,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(11)>p,
    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(16)>p {
      border-left: 1px solid #CFD0D0;
    }

    section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(n + 6)>p {
      border-top: none;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.veganImage {
      top: 40px;
      left: 20px;
      width: 80px;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.inner {
      display: none;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.viewMoreButton {
      display: none;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel {
      display: block;
      opacity: 1;
      position: relative;
      width: calc(100% + 40px);
      transform: translateX(-20px);
      height: auto;
      overflow: hidden;
      max-height: 600px;
      background-color: #F7F7F7;
      padding-bottom: 30px;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel {
      position: relative;
      top: unset;
      transform: unset;
      display: block;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.closeButton {
      display: none;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner,
    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item>.imageContainer,
    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item>.imageContainer>img {
      max-height: 500px;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item {
      background-color: unset;
      padding: 0;
      max-height: 580px;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item {
      padding: 0;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.tabContainer {
      margin-top: 0;
    }
  }

  @media (max-width: 600px) {
    .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.submit {
      position: relative;
      margin-top: 30px;
      width: 100%;
    }

    .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner {
      max-width: unset;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel {
      height: 100%;
    }

    section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer {
      position: initial;
      height: 100%;
    }
  }
</style>

<div id="WC_addToCart" style="display: none;">
  <?php
  echo do_shortcode('[add_to_cart_form id=' . $postID . ']');
  ?>
</div>

<script>
  $(document).ready(function() {
    $('.outOfStock').on('click', function() {
      var variationSize = $(this).attr('data-variation-id');

      if (variationSize && $('#pa_size')) {
        $('#pa_size').val(variationSize);
        $('#pa_size').trigger('change');
      }
    });
  });
</script>