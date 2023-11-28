<style>
  body .outOfStockNotificationPopUp>.background {
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.6);
    width: 100vw;
    height: 100vh;
    -webkit-backdrop-filter: blur(0px);
    backdrop-filter: blur(0px);
  }

  body header.header-liveCoverage.light {
    position: relative;
  }

  .active>span {
    border-color: #000;
    border-left: 1px solid #727272 !important;
    border-bottom: 1px solid #727272 !important;
    border-right: 1px solid #727272 !important;
  }

  .shoeSizeWrap {
    position: relative;
  }

  .shoeSizeWrap:after {
    position: absolute;
    top: 9px;
    right: 14px;
    content: "›";
    display: block;
    transform: rotate(90deg);
  }


  body .outOfStockNotificationPopUp>.outer>.inner {

    background-color: #F7F7F7;
  }

  .outOfStockNotificationPopUp>.outer>.inner>p {
    text-align: center;
    width: 100%;
    grid-column: span 2 / span 2;
  }

  .outOfStockNotificationPopUp>.outer>.inner>div {
    text-align: center;
    width: 100%;
    grid-column: span 2 / span 2;
    padding: 50px 90px;
    padding-bottom: 20px;
  }


  .outOfStockNotificationPopUp>.outer>.inner>div>p {
    font-size: 28px;
    font-family: 'Gza';
    font-weight: 700;
    margin-bottom: 10px;
  }

  body .outOfStockNotificationPopUp>.outer>.inner>button {
    height: 60px;
    width: 60px;
    padding: 0;
    bordeR: none;
    background: none;
    appearance: none;
    background-color: #EBEBEB;
    cursor: pointer;
    transition: background 200ms ease;
    position: absolute;
    top: 0;
    right: 0px;
    background: transparent;

  }

  body .outOfStockNotificationPopUp>.outer>.inner>button:hover {
    background: transparent;

  }

  body .outOfStockNotificationPopUp>.outer>.inner>button svg {
    width: 18px;
    height: 18px;
  }

  body .outOfStockNotificationPopUp>.outer>.inner>.content {
    border: 0 none;
  }

  body .outOfStockNotificationPopUp>.outer>.inner {
    width: 460px;
  }


  body .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.emailContainer>input,
  .bisInput {
    font-family: 'Gza';
    font-size: 16px;
    line-height: 1.1;
    letter-spacing: 0;
    color: #000;
    border-radius: 00px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border: 1px solid #727272;
    transition: all 200ms ease;
    width: 100%;
    height: 42px;
    margin-bottom: 15px;
    padding-left: 15px;
    background: #fff;
  }


  body .error input {
    border-color: red;
  }

  .bisLabel {
    font-size: 16px;
    display: block;
    margin-bottom: 0px;
    text-align: left;
    opacity: 0.7;
  }


  body .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.submit {
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
    background-color: #000000;
    position: relative;
    opacity: 1;
    transition: opacity 200ms ease, background 200ms ease;
    position: static;
    top: 0;
    right: 0;
    height: 53px;
    min-width: 180px;
    width: 100%;
    display: block;
    position: relative;
    top: 0;
    left: 0;

  }

  .bisInput {
    width: 100%;
    display: block;
    border-radius: 0px;
  }

  body .outOfStockNotificationPopUp>.outer>.inner>.content {
    padding-top: 0px;
    padding-left: 80px;
    padding-right: 80px;
  }


  .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.confirmationContainer {
    position: relative;

  }

  .showIfConfirmed {
    display: none;
  }

  .btn {
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
    margin-top: 20px;
    margin-bottom: 10px;
    background: transparent;
    border: 1px solid #000;
    color: #000;
  }

  .header {
    border-bottom: 1px solid #ebebeb;
  }

  #main {
    margin-top: 10px;
  }

  .SubscriptionForm {
    padding-bottom: 80px !important;
    margin-bottom: -80px !important;
  }


  .header.fixed {
    position: relative;
    height: auto !important;
  }



  @media(min-width:1024px) {
    section#productContainer>.outer>.inner>.right {
      position: sticky;
      top: 30px;
      bottom: -30px;
      z-index: 10;
    }

    section#productContainer .detailsContainer {
      position: sticky;
      top: 30px;
    }

    body {
      overflow: clip;
    }

  }

  @media(max-width:1024px) {

    .SubscriptionForm .background {
      margin-bottom: -80px;
    }

    body section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel {
      display: block;
      opacity: 1;
      position: relative;
      width: auto;
      transform: translateX(0px);
      height: 0;
      overflow: hidden;
      background-color: #F7F7F7;
      padding-bottom: 30px;
      padding-bottom: 100%;
    }

    body section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel {
      position: absolute;
      width: 100%;
      height: 100%;
    }



    .SubscriptionForm {
      padding-bottom: 0px !important;
      margin-bottom: 0px !important;
    }

    body section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner,
    body section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item>.imageContainer,
    body section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item>.imageContainer>img {
      max-height: 100%;
    }

    body section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item>.imageContainer>img {
      object-fit: cover;
      position: absolute;
      top: 0px;
      left: 0px;
      width: 100%;
      height: 100%;
    }

    body section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item {
      position: relative;
      padding-bottom: 100%;
      height: 1px;
    }


    body section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item>.imageContainer {
      position: absolute;
      top: 0px;
      left: 0px;
      width: 100%;
      padding-bottom: 100%;
    }

    body section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.tabContainer {
      margin-top: -20px;
    }

    body .outOfStockNotificationPopUp>.outer>.inner {
      width: auto;
    }

    .outOfStockNotificationPopUp>.outer>.inner>div {
      padding: 50px 40px 20px 40px;
    }

    body .outOfStockNotificationPopUp>.outer>.inner>.content {
      padding-left: 40px;
      padding-right: 40px;
    }

  }


  @media (max-width: 1080px) {
    body section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer {
      grid-template-columns: repeat(6, 1fr);
    }

    body section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(6)>p {
      border: 1px solid #CFD0D0;
    }

    body section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(6)>p {
      border-top: 1px solid #CFD0D0;
      border-left: 0 none;
    }

    body section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size:nth-child(11)>p {
      border-left: 0 none;
    }


  }

  .breadcrumbsContainer {
    margin-bottom: 10px;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner {
    position: relative !important;
  }

  .productTag {
    position: absolute;
    top: 15px;
    left: 15px;
    background: #F3FC55;
    padding: 4px 25px;
    color: #222;
    font-size: 15px;
    /* z-index: 1; */
  }

  .mobileReviews {
    position: absolute;
    top: 8px;
    right: 15px;
    padding: 4px 25px;
    color: #222;
    font-size: 15px;
    z-index: 9;
    display: none;
  }

  .productTitleContainer {
    display: flex;
    justify-content: space-between;
  }

  .productTitleContainer .productPrice {
    font-family: 'Gza';
    font-size: 1.5em;
    margin-top: 38px;
  }

  span.productName {
    font-family: 'NewBold';
    font-weight: bold;
    margin-top: 30px;
    margin-bottom: 2px;
  }

  .productName>span {
    color: rgb(4, 169, 141) !important;
    font-weight: bold;
  }

  .productRating {
    position: relative;
    top: 0;
    right: 0;
    display: inline-block;
    width: auto;
  }

  #productContainer .starContainer {
    position: relative;
    width: calc(5 * 19px);
    height: 30px;
    display: inline-block;
    vertical-align: middle;
    margin-top: 5px;
  }

  #productContainer .backgroundStars,
  #productContainer .foregroundStars {
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden !important;
  }

  #productContainer .starContainer svg {
    width: 15px;
    height: 15px;
    display: inline-block;
    vertical-align: middle;
  }

  #productContainer .countContainer {
    display: inline-block;
    vertical-align: middle;
  }

  body h1 {
    margin-bottom: 2px;
    margin-top: 30px;
  }

  .productVariant {
    font-size: 14px;
    opacity: 0.6;
    font-weight: normal;
  }

  .productDescription {
    font-size: 14px;
    opacity: 1;
    padding: 10px 0px;
    margin-bottom: 30px;
    color: #727272;
  }

  .productVariantGallery>.outer {
    padding-left: 0px !important;
  }

  body .variantImage,
  body section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.outer>.inner>.variantImage {
    width: 74px;
    height: 74px;
  }

  .awardsFooter {
    display: flex;
    justify-content: center;
    position: absolute;
    bottom: 0px;
    left: 0px;
    width: 100%;
    padding: 15px 0px;
    gap: 30px;
    font-size: 14px;
    font-weight: bold;
  }

  .relative {
    position: relative;
  }

  .awardsFooter svg {
    margin-right: 7px;
  }

  .readMoreDescription {
    text-decoration: underline;
    cursor: pointer;
    color: #222;
  }

  .productDescriptionMore {
    display: none;
  }
</style>


<?php
if (!defined('ABSPATH')) {
  exit;
}

$postID = get_the_ID();

//product details
$product = wc_get_product($postID);
$productName = $product->get_title();
$productIsVegan = get_field('is_vegan');
$isClassico = false;
if (get_the_id() == 1103) {
  $isClassico = true;
}
$productColor = $product->get_attribute('colour');
$productGroundType = $product->get_attribute('ground');
$productPrice = $product->get_price();
$productGalleryImageIDs = $product->get_gallery_image_ids();
$productInitalGalleryImageShowCount = 5;
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

            <div class="productTitleContainer visibleMobile">

              <div>
                <h1>
                  <span class="productName">
                    Devista <?php if ($isClassico == true) {
                              echo ' Clásico';
                            } ?>
                    <?php
                    if ($productIsVegan) {
                      echo "<span>Vegan</span>";
                    }
                    ?>
                  </span>
                  <p class="productVariant"><?php echo $productColor; ?>,
                    <?php echo $productGroundType; ?> ground
                  </p>
                </h1>




              </div>

              <p class="productPrice">£<?php echo $productPrice; ?></p>

            </div>


          </div>

          <div class="galleryContainer popUpParent">

            <div class="breadcrumbsContainer">
              <?php
              if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
              }
              ?>
            </div>

            <?php
            if ($productIsVegan) {
              echo "<div class='veganImage'><img src='" . get_stylesheet_directory_uri() . "/img/vegan.png' /></div>";
            }
            ?>
            <div class="inner">


              <div class="mobileReviews">
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

              <?php

              for ($a = 0; $a < count($productGalleryImageIDs); $a++) {
                $OriginalImageUrl = wp_get_attachment_url($productGalleryImageIDs[$a]);
              ?>

                <div data-id="<?php echo $a; ?>" class="productImage <?php if ($a == 0) {
                                                                        echo "fullWidth relative";
                                                                      } else if ($a + 1 > $productInitalGalleryImageShowCount) {
                                                                        echo "hidden";
                                                                      } ?>" onclick="handleProductGalleryImageClick()" style="background-image: url(<?php if ($a == 0) {
                                                                                                                                                      // echo get_stylesheet_directory_uri() . "/assets/images/SOK_BG_graph.png";

                                                                                                                                                    } ?>);">


                  <img src="<?php echo $OriginalImageUrl; ?>" />

                  <?php if ($a == 0) { ?>
                    <div class="productTag">
                      SELLING FAST
                    </div>

                    <div class="hoverIcon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g id="layer1" transform="translate(66 26)" opacity="0.996">
                          <path id="path1026" d="M5,4A1,1,0,0,0,4,5v7.086a1,1,0,0,0,2,0V6h6.057a1,1,0,1,0,0-2Z" transform="translate(-70 -30)" />
                          <path id="path1028" d="M19.942,4a1,1,0,0,0,0,2H26v6.086a1,1,0,1,0,2,0V5a1,1,0,0,0-1-1Z" transform="translate(-70 -30)" />
                          <path id="path1033" d="M4.985,18.9A1,1,0,0,0,4,19.914V27a1,1,0,0,0,1,1h7.058a1,1,0,0,0,0-2H6V19.914A1,1,0,0,0,4.985,18.9Z" transform="translate(-70 -30)" />
                          <path id="path1035" d="M26.984,18.9A1,1,0,0,0,26,19.914V26H19.941a1,1,0,0,0,0,2H27a1,1,0,0,0,1-1V19.914A1,1,0,0,0,26.984,18.9Z" transform="translate(-70 -30)" />
                        </g>
                      </svg>

                    </div>


                  <?php } ?>



                  <?php if ($a == 0) { ?>
                    <div class="awardsFooter">
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                          <path id="Path_162" data-name="Path 162" d="M21.355,1.588H18.532q.015-.469.016-.943A.645.645,0,0,0,17.9,0H4.1a.645.645,0,0,0-.645.645q0,.474.016.943H.645A.644.644,0,0,0,0,2.232,13.97,13.97,0,0,0,2.125,9.9a6.725,6.725,0,0,0,5.109,3.318,6.618,6.618,0,0,0,1.4,1.172v2.865H7.548a2.373,2.373,0,0,0-2.37,2.37v1.081H5.132a.645.645,0,0,0,0,1.289H16.868a.645.645,0,0,0,0-1.289h-.046V19.63a2.373,2.373,0,0,0-2.37-2.37H13.37V14.394a6.613,6.613,0,0,0,1.4-1.172A6.725,6.725,0,0,0,19.875,9.9,13.969,13.969,0,0,0,22,2.232.644.644,0,0,0,21.355,1.588ZM3.2,9.191A12.422,12.422,0,0,1,1.3,2.877H3.54a21.538,21.538,0,0,0,2,7.819q.258.516.538.974A6.216,6.216,0,0,1,3.2,9.191ZM15.533,19.63v1.081H6.467V19.63a1.083,1.083,0,0,1,1.081-1.081h6.9A1.083,1.083,0,0,1,15.533,19.63Zm-3.452-2.37H9.919v-2.3a4.194,4.194,0,0,0,2.163,0Zm.4-3.838a.629.629,0,0,0-.084.042,3.01,3.01,0,0,1-2.793,0,.643.643,0,0,0-.084-.043,5.188,5.188,0,0,1-1.457-1.2.651.651,0,0,0-.082-.1,10.163,10.163,0,0,1-1.285-2,21.277,21.277,0,0,1-1.947-8.83h12.5a21.282,21.282,0,0,1-1.947,8.83,10.17,10.17,0,0,1-1.285,2,.635.635,0,0,0-.082.1A5.19,5.19,0,0,1,12.481,13.421ZM18.8,9.191a6.216,6.216,0,0,1-2.882,2.48q.28-.459.538-.974a21.542,21.542,0,0,0,2-7.819H20.7A12.422,12.422,0,0,1,18.8,9.191Zm0,0" />
                        </svg>


                        Award winning
                      </div>
                      <div>

                        <svg xmlns="http://www.w3.org/2000/svg" width="23.9" height="22.726" viewBox="0 0 23.9 22.726">
                          <g id="recycle" transform="translate(-9.913 -11.968)">
                            <path id="Path_137" data-name="Path 137" d="M27.571,17.055a8.335,8.335,0,0,1,6.1,1.869,7.964,7.964,0,0,0,1.685,1,2.858,2.858,0,0,0,.872.156,2.926,2.926,0,0,0,1.8-.654.417.417,0,0,0,.087-.561.356.356,0,0,0-.523-.093,2.154,2.154,0,0,1-2.034.4,6.35,6.35,0,0,1-1.511-.872,9.039,9.039,0,0,0-5.782-2.024,9.2,9.2,0,0,1,8.194-3.426,3.039,3.039,0,0,1,2.5,3.364,1.249,1.249,0,0,1-.029.311,3.848,3.848,0,0,1-.2.779,9.288,9.288,0,0,0-6.16-2.4.372.372,0,0,0-.378.374.376.376,0,0,0,.349.4c3.981.156,6.538,2.024,7.845,5.637a.378.378,0,0,0,.349.249.247.247,0,0,0,.145-.031.4.4,0,0,0,.2-.529,10.239,10.239,0,0,0-1.8-3.177,4.72,4.72,0,0,0,.378-1.246,1.761,1.761,0,0,0,.029-.374,3.838,3.838,0,0,0-3.167-4.2,9.71,9.71,0,0,0-9.327,4.454.492.492,0,0,0,0,.4c.116.125.232.218.378.187Z" transform="translate(-11.869)" />
                            <path id="Path_138" data-name="Path 138" d="M19.128,54.207a.475.475,0,0,0,.374-.218.383.383,0,0,0-.031-.4,9.214,9.214,0,0,1-1.651-6.6,7.463,7.463,0,0,0-.062-2.056,3.146,3.146,0,0,0-1.869-2.242.4.4,0,0,0-.529.187.411.411,0,0,0,.187.529,2.414,2.414,0,0,1,1.433,1.682,5.954,5.954,0,0,1,.031,1.838A10.3,10.3,0,0,0,18.349,53.3,10.018,10.018,0,0,1,11,47.417a3.086,3.086,0,0,1,1.557-3.987,1.106,1.106,0,0,1,.28-.125,3.163,3.163,0,0,1,.779-.187,10.3,10.3,0,0,0,1.246,6.914.422.422,0,0,0,.343.218.4.4,0,0,0,.187-.031.373.373,0,0,0,.156-.529c-1.993-3.769-1.775-7.07.685-10.122a.4.4,0,0,0-.623-.5,9.366,9.366,0,0,0-1.775,3.27,4.919,4.919,0,0,0-1.308.28,3.656,3.656,0,0,0-.343.156,3.868,3.868,0,0,0-1.931,5.045,10.654,10.654,0,0,0,8.876,6.385Z" transform="translate(0 -19.513)" />
                            <path id="Path_139" data-name="Path 139" d="M53.483,52.142a3.138,3.138,0,0,0-1,2.741.406.406,0,0,0,.81-.062,2.374,2.374,0,0,1,.747-2.087,7.365,7.365,0,0,1,1.588-.965,10.077,10.077,0,0,0,4.827-4.36,10.1,10.1,0,0,1-1.433,9.312,3.055,3.055,0,0,1-4.236.623c-.093-.062-.156-.125-.249-.187a3.182,3.182,0,0,1-.561-.561,10.139,10.139,0,0,0,5.357-4.516.406.406,0,0,0-.685-.436c-2.274,3.613-5.263,5.077-9.094,4.485a.41.41,0,0,0-.125.81,10.828,10.828,0,0,0,1.713.125,8.323,8.323,0,0,0,1.993-.218,4.3,4.3,0,0,0,.872.965c.093.093.218.156.311.249a4.125,4.125,0,0,0,2.274.685,3.6,3.6,0,0,0,3.052-1.557c3.924-5.731,1.277-10.683,1.152-10.87a.432.432,0,0,0-.374-.218.383.383,0,0,0-.343.218,9.187,9.187,0,0,1-4.827,4.734A9,9,0,0,0,53.483,52.142Z" transform="translate(-27.977 -24.456)" />
                          </g>
                        </svg>

                        13 eco-friendly components
                      </div>
                    </div>
                  <?php } ?>

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
                  <p class="smp">Show more
                    <svg xmlns="http://www.w3.org/2000/svg" width="18.673" height="10.786" viewBox="0 0 18.673 10.786">
                      <g id="right-chevron" transform="translate(17.595 -121.536) rotate(90)">
                        <g id="Group_31" data-name="Group 31" transform="translate(122.594 0)">
                          <path id="Path_37" data-name="Path 37" d="M131.14,8.049,123.188.1A.347.347,0,0,0,122.7.1a.349.349,0,0,0,0,.481l7.707,7.707L122.7,16a.345.345,0,0,0,.481.494l.007-.007,7.952-7.952A.344.344,0,0,0,131.14,8.049Z" transform="translate(-122.594 0)" stroke="#000" stroke-width="2" />
                        </g>
                      </g>
                    </svg>
                  </p>
                </div>
              </div>
            <?php
            }
            ?>
            <div class="galleryPopUpCarousel popUp">



              <div class="awardsFooter">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                    <path id="Path_162" data-name="Path 162" d="M21.355,1.588H18.532q.015-.469.016-.943A.645.645,0,0,0,17.9,0H4.1a.645.645,0,0,0-.645.645q0,.474.016.943H.645A.644.644,0,0,0,0,2.232,13.97,13.97,0,0,0,2.125,9.9a6.725,6.725,0,0,0,5.109,3.318,6.618,6.618,0,0,0,1.4,1.172v2.865H7.548a2.373,2.373,0,0,0-2.37,2.37v1.081H5.132a.645.645,0,0,0,0,1.289H16.868a.645.645,0,0,0,0-1.289h-.046V19.63a2.373,2.373,0,0,0-2.37-2.37H13.37V14.394a6.613,6.613,0,0,0,1.4-1.172A6.725,6.725,0,0,0,19.875,9.9,13.969,13.969,0,0,0,22,2.232.644.644,0,0,0,21.355,1.588ZM3.2,9.191A12.422,12.422,0,0,1,1.3,2.877H3.54a21.538,21.538,0,0,0,2,7.819q.258.516.538.974A6.216,6.216,0,0,1,3.2,9.191ZM15.533,19.63v1.081H6.467V19.63a1.083,1.083,0,0,1,1.081-1.081h6.9A1.083,1.083,0,0,1,15.533,19.63Zm-3.452-2.37H9.919v-2.3a4.194,4.194,0,0,0,2.163,0Zm.4-3.838a.629.629,0,0,0-.084.042,3.01,3.01,0,0,1-2.793,0,.643.643,0,0,0-.084-.043,5.188,5.188,0,0,1-1.457-1.2.651.651,0,0,0-.082-.1,10.163,10.163,0,0,1-1.285-2,21.277,21.277,0,0,1-1.947-8.83h12.5a21.282,21.282,0,0,1-1.947,8.83,10.17,10.17,0,0,1-1.285,2,.635.635,0,0,0-.082.1A5.19,5.19,0,0,1,12.481,13.421ZM18.8,9.191a6.216,6.216,0,0,1-2.882,2.48q.28-.459.538-.974a21.542,21.542,0,0,0,2-7.819H20.7A12.422,12.422,0,0,1,18.8,9.191Zm0,0" />
                  </svg>


                  Award winning
                </div>
                <div>

                  <svg xmlns="http://www.w3.org/2000/svg" width="23.9" height="22.726" viewBox="0 0 23.9 22.726">
                    <g id="recycle" transform="translate(-9.913 -11.968)">
                      <path id="Path_137" data-name="Path 137" d="M27.571,17.055a8.335,8.335,0,0,1,6.1,1.869,7.964,7.964,0,0,0,1.685,1,2.858,2.858,0,0,0,.872.156,2.926,2.926,0,0,0,1.8-.654.417.417,0,0,0,.087-.561.356.356,0,0,0-.523-.093,2.154,2.154,0,0,1-2.034.4,6.35,6.35,0,0,1-1.511-.872,9.039,9.039,0,0,0-5.782-2.024,9.2,9.2,0,0,1,8.194-3.426,3.039,3.039,0,0,1,2.5,3.364,1.249,1.249,0,0,1-.029.311,3.848,3.848,0,0,1-.2.779,9.288,9.288,0,0,0-6.16-2.4.372.372,0,0,0-.378.374.376.376,0,0,0,.349.4c3.981.156,6.538,2.024,7.845,5.637a.378.378,0,0,0,.349.249.247.247,0,0,0,.145-.031.4.4,0,0,0,.2-.529,10.239,10.239,0,0,0-1.8-3.177,4.72,4.72,0,0,0,.378-1.246,1.761,1.761,0,0,0,.029-.374,3.838,3.838,0,0,0-3.167-4.2,9.71,9.71,0,0,0-9.327,4.454.492.492,0,0,0,0,.4c.116.125.232.218.378.187Z" transform="translate(-11.869)" />
                      <path id="Path_138" data-name="Path 138" d="M19.128,54.207a.475.475,0,0,0,.374-.218.383.383,0,0,0-.031-.4,9.214,9.214,0,0,1-1.651-6.6,7.463,7.463,0,0,0-.062-2.056,3.146,3.146,0,0,0-1.869-2.242.4.4,0,0,0-.529.187.411.411,0,0,0,.187.529,2.414,2.414,0,0,1,1.433,1.682,5.954,5.954,0,0,1,.031,1.838A10.3,10.3,0,0,0,18.349,53.3,10.018,10.018,0,0,1,11,47.417a3.086,3.086,0,0,1,1.557-3.987,1.106,1.106,0,0,1,.28-.125,3.163,3.163,0,0,1,.779-.187,10.3,10.3,0,0,0,1.246,6.914.422.422,0,0,0,.343.218.4.4,0,0,0,.187-.031.373.373,0,0,0,.156-.529c-1.993-3.769-1.775-7.07.685-10.122a.4.4,0,0,0-.623-.5,9.366,9.366,0,0,0-1.775,3.27,4.919,4.919,0,0,0-1.308.28,3.656,3.656,0,0,0-.343.156,3.868,3.868,0,0,0-1.931,5.045,10.654,10.654,0,0,0,8.876,6.385Z" transform="translate(0 -19.513)" />
                      <path id="Path_139" data-name="Path 139" d="M53.483,52.142a3.138,3.138,0,0,0-1,2.741.406.406,0,0,0,.81-.062,2.374,2.374,0,0,1,.747-2.087,7.365,7.365,0,0,1,1.588-.965,10.077,10.077,0,0,0,4.827-4.36,10.1,10.1,0,0,1-1.433,9.312,3.055,3.055,0,0,1-4.236.623c-.093-.062-.156-.125-.249-.187a3.182,3.182,0,0,1-.561-.561,10.139,10.139,0,0,0,5.357-4.516.406.406,0,0,0-.685-.436c-2.274,3.613-5.263,5.077-9.094,4.485a.41.41,0,0,0-.125.81,10.828,10.828,0,0,0,1.713.125,8.323,8.323,0,0,0,1.993-.218,4.3,4.3,0,0,0,.872.965c.093.093.218.156.311.249a4.125,4.125,0,0,0,2.274.685,3.6,3.6,0,0,0,3.052-1.557c3.924-5.731,1.277-10.683,1.152-10.87a.432.432,0,0,0-.374-.218.383.383,0,0,0-.343.218,9.187,9.187,0,0,1-4.827,4.734A9,9,0,0,0,53.483,52.142Z" transform="translate(-27.977 -24.456)" />
                    </g>
                  </svg>

                  13 eco-friendly components
                </div>
              </div>


              <div class="mobileReviews">

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


              <div class="background" style="display:none; background-image: url(<?php echo get_stylesheet_directory_uri() . "/assets/images/SOK_BG_graph.png"; ?>);"></div>

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

                          <?php if ($a == 0) { ?>

                          <?php } ?>


                        </div>
                      </div>
                    <?php
                    }
                    ?>


                  </div>

                  <div class="productTag">
                    SELLING FAST
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

              <div class="productTitleContainer">

                <div>
                  <h1>
                    <span class="productName">
                      Devista <?php if ($isClassico == true) {
                                echo ' Clásico';
                              } ?>
                      <?php
                      if ($productIsVegan) {
                        echo "<span>Vegan</span>";
                      }
                      ?>
                    </span>
                    <p class="productVariant"><?php echo $productColor; ?>,
                      <?php echo $productGroundType; ?> ground</p>
                  </h1>

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
                      <!-- <p><?php //echo $reviewCount; 
                              ?></p> -->
                      <p>216</p>
                    </div>
                  </div>


                </div>

                <p class="productPrice">£<?php echo $productPrice; ?></p>

              </div>

              <p class="productDescription">Devista is engineered from sustainably-sourced, high performance materials... <span class="readMoreDescription" onclick='scrollToDescription()'>Find out more</span></p>

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

                    $veganIds = [
                      4080,
                      4050,
                      4035,
                      1755,
                      1756
                    ];


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
                          <?php if (in_array($orderedVarients[$a], $veganIds)) { ?>
                            <!-- <img class="veganIcon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/vegan_logo.svg"/> -->
                          <?php } ?>

                          <img src="<?php echo $variantImage[0]; ?>" />
                        </div>
                      <?php
                      } else {
                        $permalink = get_the_permalink($orderedVarients[$a]);
                      ?>
                        <a href="<?php echo $permalink; ?>" class="variantImage">
                          <?php if (in_array($orderedVarients[$a], $veganIds)) { ?>
                            <img class="veganIcon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/vegan_logo.svg" />
                          <?php } ?>
                          <img src="<?php echo $variantImage[0]; ?>" />
                        </a>
                    <?php
                      }
                    }
                    ?>
                  </div>
                </div>


                <?php if ($productVarientCount >= 6) { ?>
                  <div class="button right" onclick='scrollProductVariantGalleryRight(event)'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                      <g>
                        <path d="M1 1.25086L7 7.62465L13 1.25086" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </g>
                    </svg>
                  </div>
                <?php } ?>
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
                    parent.classList.add('left');
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
                    const currentScroll = outer.scrollLeft;
                    const inner = parent.getElementsByClassName('inner')[0];
                    const innerWidth = inner.offsetWidth;

                    outer.scrollTo({
                      left: currentScroll + innerWidth,
                      behavior: 'smooth'
                    });
                    parent.classList.add('right');
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
                                                                                                                                                                                                                                                                                                                              echo "handleProductNoStockClick('deselect')";
                                                                                                                                                                                                                                                                                                                            } else if ($hasBackOrder) {
                                                                                                                                                                                                                                                                                                                              echo "handleBackOrderClick()";
                                                                                                                                                                                                                                                                                                                            } ?>">
                        <?php

                        if (!$isInStock && !$hasBackOrder) {
                        ?>
                          <!-- <svg xmlns="http://www.w3.org/2000/svg" width="14.354" height="15.835" viewBox="0 0 14.354 15.835" onclick="handleProductNoStockClick()">
                            <g transform="translate(-4 -2.5)">
                              <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15.628,7.451a4.451,4.451,0,1,0-8.9,0c0,5.193-2.226,6.677-2.226,6.677H17.854s-2.226-1.484-2.226-6.677" />
                              <path transform="translate(-5.511 -14.404)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17.972,31.5a1.484,1.484,0,0,1-2.567,0" />
                            </g>
                          </svg> -->
                        <?php
                        } else {
                        ?>
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <path transform="translate(-3.375 -3.375)" d="M13.375,3.375a10,10,0,1,0,10,10A10,10,0,0,0,13.375,3.375Zm5.12,7.236-6.428,6.457h0a.868.868,0,0,1-.558.264.842.842,0,0,1-.563-.274L8.25,14.365a.192.192,0,0,1,0-.274l.856-.856a.186.186,0,0,1,.269,0L11.51,15.37l5.865-5.909A.19.19,0,0,1,17.51,9.4h0a.175.175,0,0,1,.135.058l.841.87A.19.19,0,0,1,18.5,10.611Z" />
                          </svg>
                        <?php
                        }
                        ?>

                        <?php if ($hasBackOrder === true) {
                          echo '<span style="border-left: 1px solid #D8D8D8; border-bottom: 1px solid #D8D8D8; border-right: 1px solid #D8D8D8; position:absolute; bottom:0px; left:0px; width:100%; background:#EBEBEB; font-size:8px; text-align:center; line-height:15px; display:block; ">pre-order</span>';
                        } ?>
                        <p class="<?php if (!$isInStock) {
                                    echo 'outOfStock';
                                  } ?>">

                          <?php echo str_replace('-', '.', $size); ?>

                        </p>
                      </div>
                    <?php
                    }
                    ?>
                  </div>

                  <?php

                  $productId = get_the_id();

                  $eligibleForBackOrder = false;

                  if ($productId == '1100') {
                    $eligibleForBackOrder = true;
                  }
                  if ($productId == '1105') {
                    $eligibleForBackOrder = true;
                  }
                  if ($productId == '1104') {
                    $eligibleForBackOrder = true;
                  }
                  if ($productId == '1099') {
                    $eligibleForBackOrder = true;
                  }

                  // Only black and white have back order
                  if ($eligibleForBackOrder) {
                  ?>
                    <div id="" style="margin-bottom:40px;">
                      <div class="inner">
                        <span onclick="handleProductNoStockClick()" style="font-size:12px;"><strong>Size missing?</strong> <span style="text-decoration:underline; cursor:pointer;">Notify me</span> when they're back in stock.</span>
                      </div>
                    </div>
                  <?php
                  } else {
                    echo '<br/>';
                  }
                  ?>

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

                          <div>
                            <p>Put me on the list</p>

                            <div class="showIfConfirmed">
                              <span> They've only gone and done it.<br /> Watch those emails...</span>
                              <a class="btn" href="#" onclick="handlePopUpClose()">Continue Shopping</a>
                            </div>
                            <div class="hideIfConfirmed">
                              <span> It'll be back. Drop in your email to be the first to know when it is.</span>
                            </div>

                          </div>



                          <button class="closeButton" onclick="handlePopUpClose()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24.298" height="24.31" viewBox="0 0 24.298 24.31">
                              <g transform="translate(1.062 1.048)">
                                <g transform="translate(0 0.026)">
                                  <path transform="translate(0 -0.026)" stroke="#000" stroke-width="2" d="M11.735,11.1,22.022.8a.464.464,0,0,0-.009-.651.466.466,0,0,0-.642,0L11.079,10.441.792.154A.46.46,0,0,0,.142.168a.466.466,0,0,0,0,.642L10.429,11.1.142,21.383a.456.456,0,0,0-.009.651.46.46,0,0,0,.651.009l.009-.009L11.079,11.747,21.366,22.034a.46.46,0,0,0,.651-.651Z" />
                                </g>
                              </g>
                            </svg>
                          </button>

                          <div class="content hideIfConfirmed">
                            <div class="form OutOfStockForm">


                              <div class="inner">
                                <div class="emailContainer">

                                  <div>
                                    <label class="bisLabel">Email address*</label>
                                    <input class="bisInput" type="email" placeholder="Email address" onchange="handleProductOutOfStockEmailChange()" />
                                  </div>

                                  <label class="bisLabel">Size*</label>
                                  <div class="shoeSizeWrap">
                                    <select class="bisInput shoeSize">
                                      <option selected="selected" selected value="0">Choose Size</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="7.5">7.5</option>
                                      <option value="8">8</option>
                                      <option value="8.5">8.5</option>
                                      <option value="9">9</option>
                                      <option value="9.5">9.5</option>
                                      <option value="ten">10</option>
                                      <option value="10.5">10.5</option>
                                      <option value="11">11</option>
                                      <option value="12">12</option>
                                    </select>
                                  </div>

                                  <span class="errorText">Please enter a valid email address</span>
                                </div>



                                <input type="hidden" class="shoeSizeOld" />

                                <input type="hidden" class="shoeName" value="<?php echo $product->get_title(); ?>" />


                                <button class="submit" onclick="handleProductOutOfStockFormSubmission()">Notify Me</button>
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
                    <button id="addProductToBag" class="single_add_to_cart_button disabled" onclick="handleAddProductToBag()">Add to bag</button>
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



  <style>
    .highlightContainer {
      max-width: 1320px;
      margin: 0 auto;
    }

    .highlightFlex {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 40px;
    }

    .highlightSection {
      padding: 50px 0px;
    }

    .highlightSlick {
      margin-left: -20px;
      margin-right: -20px;

    }

    .highlightsTitle {
      font-family: 'gza';
    }

    .highlightItem {
      margin: 0px 20px;
    }

    .highlightItemImage {
      padding-bottom: 100%;
      background: #000;
      margin-bottom: 20px;
      background-size: cover;
      background-position: center center;
    }

    .grid {
      display: grid;
      gap: 50px;
    }

    .grid-cols-3 {
      grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .highlightItemText {
      /* opacity: 0.6; */
      font-size: 15px;
    }

    .highlightQuote {
      font-size: 22px;

      font-style: italic;
      display: flex;
      align-items: center;
      justify-content: center;

    }

    .highlightQuoteWrap {
      display: flex;
      align-items: center;
      justify-content: center;
      padding-top: 50px;
      padding-bottom: 100px;
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/SOK_BG_graph.png);
      background-position: left bottom;
      background-size: 80% auto;
      background-repeat: no-repeat;

    }

    .galleryPopUpCarousel.popUp.active .productTag {
      display: none;
    }

    .galleryPopUpCarousel.popUp.active .mobileReviews {
      display: none;
    }

    .countContainer p {
      text-decoration: underline;
      cursor: pointer;
      position: relative;
      top: 1px;
    }

    #breadcrumbs {
      font-size: 10px;
    }

    #breadcrumbs a {
      color: #48A18A;
      text-decoration: underline;
    }

    .smp svg {
      margin-left: 6px;
      position: relative;
      top: -1px;
    }

    .smp.invert svg {
      transform: rotate(180deg);
    }

    .veganIcon {
      position: absolute;
      top: 2px;
      right: 2px;
      width: 18px;
      height: 18px;
    }

    body header.header-liveCoverage {
      z-index: 8;
    }

    #productContainer .tabContainer {
      display: none !important;
    }

    .productImage.fullWidth.relative {
      cursor: url("<?php echo get_stylesheet_directory_uri(); ?>/img/hoverIcon.svg") !important;
    }


    /* .hoverIcon{
      position: absolute;
      top:150px;
      right:150px;
    
      width:35px;
      height:35px;
      opacity:0;
      transition: all 0.3s cubic-bezier(.42, 0, .58, 1);
    }

    .productImage:hover .hoverIcon{
        transform:translate(20px, -20px);
        opacity:1;
    } */



    .breadcrumbsContainerMobile {
      display: none !important;
    }

    @media(max-width:1024px) {

      section#productContainer>.outer {
        padding-left: 0px !important;
        padding-right: 0px !important;
      }

      body .breadcrumbsContainerMobile {
        display: block !important;
        left: -30px !important;
      }

      body section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer {
        grid-template-columns: repeat(4, 1fr) !important;
        gap: 4px !important;
      }

      section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.sizeContainer>.inner>.sizeSelectContainer>.size>p {
        border: 1px solid #CFD0D0 !important;
      }

      .awardsFooter svg {
        margin-right: 0px;
      }

      .hoverIcon {
        display: none;
      }

      span.productName {
        margin-top: 20px;
      }

      #productContainer .tabContainer {
        display: grid !important;
      }

      .backgroundStars,
      .foregroundStars {
        text-align: left;
      }

      #productHotspotsModule>.detailsContainer>.outer>.inner>.details.reviews>.inner>.ratingCotnainer>.starContainer>.foregroundStars {
        left: 0px !important;
      }


      body section#productContainer>.outer>.inner {
        grid-gap: 30px;
      }

      .highlightQuoteWrap {
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 0px;
        padding-bottom: 40px;
        background-image: url(https://sokdevelopment.wpengine.com/wp-content/themes/sokito/assets/images/SOK_BG_graph.png);
        background-position: left bottom;
        background-size: 80% auto;
        background-repeat: no-repeat;
      }

      .awardsFooter {
        bottom: 30px;
        padding: 15px 40px;
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }

      .awardsFooter div {
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 14px;
        font-weight: normal
      }

      .highlightItemImage {
        margin-bottom: 10px;
      }

      .awardsFooter {
        z-index: 9;
      }

      .productTitleContainer {
        display: none;
      }

      .slick-list {
        padding: 0 10% 0 0 !important;
      }

      body section#productContainer {
        padding-bottom: 40px;
      }

      body .highlightSection {
        padding-top: 0px;
      }

      .mobileReviews {
        display: block;
      }

      .productTag {
        left: 13px;
        font-size: 13px;
        padding: 4px 10px;
      }

      body section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.tabContainer>.naigationTab {
        width: 13px;
        height: 4px;
      }

      body section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.tabContainer {
        grid-gap: 7px;
      }

      .awardsFooter {
        padding-right: 10px;
        padding-left: 10px;
      }

      .awardsFooter svg {
        width: 22px !important;
        height: 22px !important;
        flex: none;
        margin-right: 7px;
      }

      .mobileReviews {
        padding-right: 0px;
        ;
      }

      .productTitleContainer.visibleMobile {
        display: flex;
      }

      .detailsContainerMobile {
        display: block !important;
      }

      body #main {
        margin-top: 0px !important;
      }



      header.header-liveCoverage>.outer>.inner {
        padding: 0px;
      }

      .detailsContainerMobile {
        border-top: 1px solid #ccc;
      }

      .breadcrumbsContainer {
        display: none !important;
      }

      .productDescription,
      .productVariantGallery {
        padding: 0px 20px;
      }

      .highlightQuote svg {
        display: block !important;
        margin: 0 auto;
        margin-right: auto !important;
        margin-bottom: 15px;
      }

      .highlightQuote {
        font-size: 16px;
        padding: 0px 20px;
        display: block;
      }

      body .singleProductBannerText {
        font-size: 33px;
      }

      body span.highlight::before {
        font-size: 33px;
        top: 11px;
      }

      .highlightSection {
        margin: 0px 20px;
      }


      body .detailsContainerMobile {
        margin-bottom: 20px !important;
      }

      .awardsFooter svg {
        width: 40px;
      }

    }
  </style>

  <div class="highlightContainer highlightSection">
    <div class="highlightFlex">
      <h2 class="highlightsTitle">Highlights</h2>
      <div class="">
        <?php get_template_part('Components/live-coverage/Buttons/shareButton'); ?>
        </svg>
      </div>
    </div>

    <div class="highlightSlick">
      <div class="highlightItem">
        <div class="highlightItemImage" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/img/lightweight.webp)">
        </div>
        <div class="highlightItemText">
          At just 214 grams, the boots make sure you’re never weighed down. Even when the weather is trying to hold you back. Quick reactions are everything, and the Devista gives you the freedom to make those split-second decisions.
        </div>
      </div>
      <div class="highlightItem">
        <div class="highlightItemImage" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/img/ecofriendly.webp)">
        </div>
        <div class="highlightItemText">
          Made of at least 56% eco-friendly materials, the Devistas use innovative techniques to include things like recycled plastic bottles, castor beans and recycled rubber inside them. Ensuring maximum impact on the pitch, not the planet.
        </div>
      </div>
      <div class="highlightItem">
        <div class="highlightItemImage" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/img/highlight3.png)">
        </div>
        <div class="highlightItemText">
          Our classic laced fit locks down your feet with cushioning across key contact areas, giving you a greater level of comfort both on the ball and on the move.
        </div>
      </div>
    </div>

  </div>



  <div class="highlightQuoteWrap">
    <div class="text-center">
      <div class="italic highlightQuote">

        <svg style="height:30px; width:116px; position:relative; top:-3px; margin-right:10px;" width="600px" height="156px" viewBox="0 0 600 156" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="fourfourtwo-logo-vector" transform="translate(0.000000, 0.900000)" fill="#000000" fill-rule="nonzero">
              <path d="M217.1,0 L272.4,0 L272.4,21.2 L241.8,21.2 L241.8,65.4 L263.5,65.4 L263.5,88 L241.8,88 L241.8,150.3 L217.1,150.3 L217.1,0 M386.8,36.2 L408.4,36.2 L408.4,52.8 L408.7,52.6 C413.7,42.8 420,36.5 430.3,35.5 L430.3,61.9 C427.2,61.4 424.9,60.8 421.9,61.5 C416.6,62.7 408.3,66.7 408.4,75.6 L408.4,150.2 L386.8,150.2 L386.8,36.2 M431.8,21.2 L410.6,21.2 L410.6,2.84217094e-14 L477.7,2.84217094e-14 L477.7,21.2 L456.5,21.2 L456.5,150.3 L431.9,150.3 L431.9,21.2 M461.8,35.6 L480.7,35.6 L485.3,97.4 L485.7,95.5 L493.7,35.6 L511.1,35.6 L517.7,97.4 L518.1,94.6 L524.6,35.6 L540.8,35.6 L527.2,150.3 L509.4,150.3 L501.4,81.2 L501,84 L492.7,150.3 L474.7,150.3 L461.8,35.6 M600,70.1 C600,61.6 600,35.5 571.1,35.5 C551.5,35.5 540.8,46.9 540.8,67.4 L540.8,122.3 C540.8,131.4 542.1,141.3 550,148 C555.5,152.5 563.3,154.3 570,154.3 C596.1,154.3 600,135.1 600,121.2 L600,70.1 L600,70.1 Z M578,123.6 C578,129 578,137.7 570,137.7 C563.3,137.7 562.6,130.3 562.6,123.9 L562.6,65.9 C562.6,61.7 562.6,53.9 570.4,53.9 C578,53.9 578,62.8 578,65.7 L578,123.6 L578,123.6 Z M323.7,70.1 C323.7,61.6 323.7,35.5 294.8,35.5 C275.2,35.5 264.5,46.9 264.5,67.4 L264.5,122.3 C264.5,131.4 265.8,141.3 273.7,148 C279.2,152.5 287,154.3 293.7,154.3 C319.8,154.3 323.7,135.1 323.7,121.2 L323.7,70.1 Z M301.7,123.6 C301.7,129 301.7,137.7 293.7,137.7 C287,137.7 286.3,130.3 286.3,123.9 L286.3,65.9 C286.3,61.7 286.3,53.9 294.1,53.9 C301.7,53.9 301.7,62.8 301.7,65.7 L301.7,123.6 L301.7,123.6 Z M382.9,153.1 L361.8,153.1 L361.8,142.5 L361.4,142.5 C356.5,148.8 352.1,154.3 345,154.3 C335.4,154.3 327.6,145.9 327.6,131.4 L327.6,39.5 L348.7,39.5 L348.7,121.9 C348.7,130.5 351.1,133.2 354.7,133.2 C357.6,133.2 360.3,131.2 361.8,128.9 L361.8,39.5 L382.9,39.5 L382.9,153.1 M0,0 L55.3,0 L55.3,21.2 L24.7,21.2 L24.7,65.4 L46.4,65.4 L46.4,88 L24.7,88 L24.7,150.3 L0,150.3 L0,0 M169.7,36.2 L191.3,36.2 L191.3,52.8 L191.6,52.6 C196.6,42.8 202.9,36.5 213.2,35.5 L213.2,61.9 C210.1,61.4 207.8,60.8 204.8,61.5 C199.5,62.7 191.2,66.7 191.3,75.6 L191.3,150.2 L169.7,150.2 L169.7,36.2 M106.6,70.1 C106.6,61.6 106.6,35.5 77.7,35.5 C58.1,35.5 47.4,46.9 47.4,67.4 L47.4,122.3 C47.4,131.4 48.7,141.3 56.6,148 C62.1,152.5 69.9,154.3 76.6,154.3 C102.7,154.3 106.6,135.1 106.6,121.2 L106.6,70.1 Z M84.6,123.6 C84.6,129 84.6,137.7 76.6,137.7 C69.9,137.7 69.2,130.3 69.2,123.9 L69.2,65.9 C69.2,61.7 69.2,53.9 77,53.9 C84.6,53.9 84.6,62.8 84.6,65.7 L84.6,123.6 L84.6,123.6 Z M165.8,153.1 L144.7,153.1 L144.7,142.5 L144.3,142.5 C139.4,148.8 135,154.3 127.9,154.3 C118.3,154.3 110.5,145.9 110.5,131.4 L110.5,39.5 L131.6,39.5 L131.6,121.9 C131.6,130.5 134,133.2 137.6,133.2 C140.5,133.2 143.2,131.2 144.7,128.9 L144.7,39.5 L165.8,39.5 L165.8,153.1" id="Shape"></path>
            </g>
          </g>
        </svg>

        <div>"...light and durable, and feel like a homage to classic designs forgotten by the big brands."</div>
      </div>
    </div>
  </div>

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


    // productDetailsContainer.style.transform = "translateY(" + topPosition + "px)";

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

  function handleProductNoStockClick(select = 'select') {

    if (select == 'deselect') {
      $('.size.active').removeClass('active');
      return;
    }



    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) {
      return;
    }

    // const productContainer = eventTarget.closest("#productContainer");

    // if (!productContainer) {
    //   return;
    // }

    const outOfStockNotificationPopUp = productContainer.getElementsByClassName("outOfStockNotificationPopUp")[0];

    if (!outOfStockNotificationPopUp) {
      return;
    }

    const showSizeInput = outOfStockNotificationPopUp.getElementsByClassName("shoeSize")[0];
    //const sizeValue = eventTarget.getAttribute("data-variation-id");
    const sizeValue = true;
    const body = document.getElementsByTagName("BODY")[0];
    //const WC_sizeContainer = document.getElementById("pa_size"); //$("#pa_size")

    if (!sizeValue || !showSizeInput || !body) {
      return;
    }

    const detailsContainer = eventTarget.closest(".detailsContainer");

    // $("#pa_size").val(sizeValue);
    $("#pa_size").trigger('change');

    if (detailsContainer) {
      detailsContainer.classList.add("static");
    }

    //showSizeInput.value = sizeValue;

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

  function scrollToDescription() {
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

      if (tabName == "description") {
        tabs[a].click();
      }
    }

    window.scrollTo({
      top: hotspotOffsetTop - 100,
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

          $('.showIfConfirmed').show();
          $('.hideIfConfirmed').hide();

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
          $('.smp').html('Show less <svg xmlns="http://www.w3.org/2000/svg" width="18.673" height="10.786" viewBox="0 0 18.673 10.786"><g id="right-chevron" transform="translate(17.595 -121.536) rotate(90)"><g id="Group_31" data-name="Group 31" transform="translate(122.594 0)"><path id="Path_37" data-name="Path 37" d="M131.14,8.049,123.188.1A.347.347,0,0,0,122.7.1a.349.349,0,0,0,0,.481l7.707,7.707L122.7,16a.345.345,0,0,0,.481.494l.007-.007,7.952-7.952A.344.344,0,0,0,131.14,8.049Z" transform="translate(-122.594 0)" stroke="#000" stroke-width="2"/></g></g></svg>');
          eventTarget.setAttribute("data-openclose", "close");
          $('.smp').addClass('invert');
        } else if (galleryOpenClose == "close") {
          $('.smp').html('Show more <svg xmlns="http://www.w3.org/2000/svg" width="18.673" height="10.786" viewBox="0 0 18.673 10.786"><g id="right-chevron" transform="translate(17.595 -121.536) rotate(90)"><g id="Group_31" data-name="Group 31" transform="translate(122.594 0)"><path id="Path_37" data-name="Path 37" d="M131.14,8.049,123.188.1A.347.347,0,0,0,122.7.1a.349.349,0,0,0,0,.481l7.707,7.707L122.7,16a.345.345,0,0,0,.481.494l.007-.007,7.952-7.952A.344.344,0,0,0,131.14,8.049Z" transform="translate(-122.594 0)" stroke="#000" stroke-width="2"/></g></g></svg>');
          eventTarget.setAttribute("data-openclose", "open");
          $('.smp').removeClass('invert');
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

        // leftButton.style.left = leftButtonPosition + "px";
        leftButton.style.left = 0;
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

        // rightButton.style.right = rightButtonPosition + "px";
        rightButton.style.right = 0;
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
      return;
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

      console.log(transformXValue);
      $('.carousel .inner').css('transform', "translateX(-" + (transformXValue) + "px)");
      //carouselInner.style.transform = "translateX(-" + (transformXValue) + "px)";
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
    padding-top: 00px;
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
    /* overflow: hidden; */
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
    top: 60px;
    left: auto;
    right: 30px;
    width: 100px;
    z-index: 9;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner {
    display: grid;
    align-content: center;
    justify-content: center;
    align-items: center;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 2px;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner>.productImage {
    background-color: #F7F7F7;
    padding-bottom: 0%;
    opacity: 1;
    transition: opacity 200ms ease, background 200ms ease;
    cursor: url("<?php echo get_stylesheet_directory_uri(); ?>/img/hoverIcon.svg"), pointer;
    background-position: center bottom;
    background-size: contain;
    background-repeat: no-repeat;
    position: relative;
  }


  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner>.productImage:not(.fullWidth) {
    padding-bottom: 100%;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner>.productImage:hover {
    background-color: #e5e7eb;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner>.productImage:not(.fullWidth)>img {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0px;
    left: 0px;
    object-fit: cover;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner>.productImage.fullWidth {
    grid-column: span 2;
    padding: 0;
    padding-bottom: 75%;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.inner>.productImage.fullWidth>img {
    position: absolute;
    top: 0;
    left: 0px;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

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
    background-color: #EBEBEB;
    color: #222;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: #fff;
    z-index: 9;
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
    height: 100%;
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
    height: 100vh;
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
    height: 100vh;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item {
    padding: 0px;
    border-radius: 10px;
    width: 100vw;
    opacity: 0.6;
    transition: opacity 200ms ease;
    position: relative;
    height: 100vh;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item.active,
  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item.active+.item {
    opacity: 1;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item>.imageContainer {
    text-align: center;
  }

  section#productContainer>.outer>.inner>.left>.galleryContainer>.galleryPopUpCarousel>.carousel>.outer>.inner>.item>.imageContainer>img {
    height: 100vh;
    width: 100%;
    object-fit: cover;
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
    z-index: 9;
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

    /* background-color: #F7F7F7; */
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.outer>.inner>.variantImage img {
    transition: all 200ms ease;
    mix-blend-mode: multiply;
  }

  section#productContainer>.outer>.inner>.right>.detailsContainer>.inner>.productVariantGallery>.outer>.inner>.variantImage:hover img {
    /* opacity: 0.8; */
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
    margin-top: 5px;
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

  body .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.confirmationContainer {
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

  body .outOfStockNotificationPopUp>.outer>.inner>.content>.form>.inner>.submit:hover {
    background: #000
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
    margin-bottom: 0px;
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
  $(document).ready(function() {

    $('.highlightSlick').slick({
      dots: false,
      arrows: false,
      slidesToShow: 3,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      }]
    });

    $('.outOfStock').on('click', function() {
      var variationSize = $(this).attr('data-variation-id');

      if (variationSize && $('#pa_size')) {
        $('#pa_size').val(variationSize);
        $('#pa_size').trigger('change');
      }
    });
  });
</script>

<?php do_action('woocommerce_after_single_product'); ?>