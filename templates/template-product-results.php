<?php

/**
 * Template Name: Product Results - test
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
  exit;
}

function getWeekDifference($givenDate)
{
  $currentDate = new DateTime();
  $givenDateObj = DateTime::createFromFormat('d/m/Y', $givenDate); //new DateTime($givenDate);
  $weeks = 0;

  if ($givenDateObj instanceof DateTime) {
    $currentDateTimeStamp = $currentDate->getTimestamp();
    $givenDateTimeStamp = $givenDateObj->getTimestamp();

    if ($currentDateTimeStamp < $givenDateTimeStamp) {
      $interval = $givenDateObj->diff($currentDate);
      $weeks = floor($interval->days / 7);
    }
  }

  return $weeks;
}

function getProductResultsFeedData($productQuery)
{
  $data = [
    'products' => [],
    'filters' => [
      'surface' => [],
      'sizes' => [],
      'gender' => [],
      'colors' => [],
      'collections' => []
    ],
    'counts' => [
      'surface' => [],
      'sizes' => [],
      'gender' => [],
      'colors' => [],
      'collections' => []
    ]
  ];
  $parentGroup = 'product-group';
  $childGroup = 'details_group';

  if ($productQuery->have_posts()) {
    while ($productQuery->have_posts()) {
      $product = [];
      $productQuery->the_post();
      $productID = get_the_ID();
      $productObject = wc_get_product($productID);
      $permalink = get_the_permalink($productID);
      $price = $productObject->get_price();
      $publishDate = get_the_date('Y/m/d', $productID);
      $showInFeed = false;

      $wcProduct = wc_get_product($productID);
      $productSizeVariations = $wcProduct->get_available_variations();
      $orderedSizeVariations = array();
      $finalOrderedSizeVariations = array();

      for ($a = 0; $a < count($productSizeVariations); $a++) {
        $size = str_replace('-', '.', $productSizeVariations[$a]['attributes']['attribute_pa_size']);

        array_push($orderedSizeVariations, floatVal($size));
      }

      sort($orderedSizeVariations);

      for ($a = 0; $a < count($orderedSizeVariations); $a++) {
        for ($b = 0; $b < count($productSizeVariations); $b++) {
          $size = str_replace('-', '.', $productSizeVariations[$b]['attributes']['attribute_pa_size']);
          $isInStock = $productSizeVariations[$b]['is_in_stock'];

          if ($size == $orderedSizeVariations[$a] && $isInStock) {
            array_push($finalOrderedSizeVariations, $size);
          }
        }
      }

      if (have_rows($parentGroup, $productID)) {
        while (have_rows($parentGroup, $productID)) {
          the_row();

          if (have_rows($childGroup)) {
            while (have_rows($childGroup)) {
              the_row();
              $showInFeed = !!get_sub_field('shownInFeed');
              $title =  get_sub_field('productName');
              $image = get_sub_field('productImage');
              $ground = get_sub_field('groundType');
              $colorNames = get_sub_field('colorName');
              $colorCode = get_sub_field('colorCode');
              $isVegan = get_sub_field('isVegan');
              $featureTag = get_sub_field('featureTag');
              $collection = get_sub_field('collection');
              $availabilityDate = get_sub_field('availabilityDate');
              $gender = get_sub_field('gender');
              $colorVariants = [];

              $colorNames = $colorNames ? explode(',', $colorNames) : [];

              foreach ($colorNames as $key => $colorName) {
                $colorNames[$key] = str_replace(' ', '-', trim($colorName));
              }

              if (have_rows('colorVariants')) {
                while (have_rows('colorVariants')) {
                  the_row();
                  $colorVariantName = get_sub_field('colorVariantName');
                  $colorVariantImage = get_sub_field('colorVariantImage');
                  $colorVariantCode = get_sub_field('colorVariantCode');
                  $colorVariants[] = array(
                    'colorName' => $colorVariantName,
                    'image' => $colorVariantImage,
                    'colorCode' => $colorVariantCode
                  );
                }
              }
            }

            $product = array(
              'showInFeed' => $showInFeed,
              'title' => $title,
              'image' => $image,
              'ground' => $ground,
              'colorNames' => $colorNames,
              'colorCode' => $colorCode,
              'isVegan' => $isVegan,
              'featureTag' => $featureTag,
              'availabilityDate' => $availabilityDate,
              'gender' => $gender,
              'collections' => $collection,
              'colorVariants' => $colorVariants,
              'sizes' => $finalOrderedSizeVariations,
              'price' => $price,
              'productID' => $productID,
              'permalink' => $permalink,
              'publishDate' => $publishDate
            );
          }
        }
      }

      if ($showInFeed) {
        $data['products'][] = $product;

        if (!in_array($ground, $data['filters']['surface']) && $ground) {
          $data['filters']['surface'][] = $ground;
          $data['counts']['surface'][] = 0;
        }

        $surfaceIndex = array_search($ground, $data['filters']['surface']);

        if ($surfaceIndex !== false && $ground) $data['counts']['surface'][$surfaceIndex] += 1;

        foreach ($finalOrderedSizeVariations as $size) {
          if (!in_array($size, $data['filters']['sizes']) && $size) {
            $data['filters']['sizes'][] = $size;
            $data['counts']['sizes'][] = 0;
          }

          $sizeIndex = array_search($size, $data['filters']['sizes']);

          if ($sizeIndex !== false && $size) $data['counts']['sizes'][$sizeIndex] += 1;
        }

        foreach ($colorNames as $colorName) {
          if (!in_array($colorName, $data['filters']['colors']) && $colorName) {
            $data['filters']['colors'][] = $colorName;
            $data['counts']['colors'][] = 0;
          }

          $colorIndex = array_search($colorName, $data['filters']['colors']);

          if ($colorIndex !== false && $colorName) $data['counts']['colors'][$colorIndex] += 1;
        }

        if (!in_array($gender, $data['filters']['gender']) && $gender) {
          $data['filters']['gender'][] = $gender;
          $data['counts']['gender'][] = 0;
        }

        $genderIndex = array_search($gender, $data['filters']['gender']);

        if ($genderIndex !== false && $gender) $data['counts']['gender'][$genderIndex] += 1;

        if (!in_array($collection, $data['filters']['collections']) && $collection) {
          $data['filters']['collections'][] = $collection;
          $data['counts']['collections'][] = 0;
        }

        $collectionIndex = array_search($collection, $data['filters']['collections']);

        if ($collectionIndex !== false && $collection) $data['counts']['collections'][$collectionIndex] += 1;
      }
    }
  }

  return $data;
}

function get_active_base_filter($url)
{
  $active_filter = [];
  $url = explode('/', $url);
  $url = $url[2];

  if (!$url) {
    return false;
  }

  if ($url == 'firm-ground') {
    $active_filter['type'] = 'surface';
    $active_filter['value'] = 'firm';
  } else if ($url == 'soft-ground') {
    $active_filter['type'] = 'surface';
    $active_filter['value'] = 'soft';
  } else if ($url == 'size-6') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '6';
  } else if ($url == 'size-6-5') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '6.5';
  } else if ($url == 'size-7') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '7';
  } else if ($url == 'size-7-5') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '7.5';
  } else if ($url == 'size-8') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '8';
  } else if ($url == 'size-8-5') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '8.5';
  } else if ($url == 'size-9') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '9';
  } else if ($url == 'size-9-5') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '9.5';
  } else if ($url == 'size-10') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '10';
  } else if ($url == 'size-10-5') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '10.5';
  } else if ($url == 'size-11') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '11';
  } else if ($url == 'size-11-5') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '11.5';
  } else if ($url == 'size-12') {
    $active_filter['type'] = 'size';
    $active_filter['value'] = '12';
  } else if ($url == 'red') {
    $active_filter['type'] = 'color';
    $active_filter['value'] = 'red';
  } else if ($url == 'blue') {
    $active_filter['type'] = 'color';
    $active_filter['value'] = 'blue';
  } else if ($url == 'black') {
    $active_filter['type'] = 'color';
    $active_filter['value'] = 'black';
  } else if ($url == 'orange') {
    $active_filter['type'] = 'color';
    $active_filter['value'] = 'orange';
  } else if ($url == 'neon') {
    $active_filter['type'] = 'color';
    $active_filter['value'] = 'neon';
  } else if ($url == 'devista') {
    $active_filter['type'] = 'collection';
    $active_filter['value'] = 'devista';
  } else if ($url == 'clasico') {
    $active_filter['type'] = 'collection';
    $active_filter['value'] = 'devista_clásico';
  }

  return $active_filter;
}

$productID = get_the_ID();
$current_url = $_SERVER['REQUEST_URI'];
$active_filter = get_active_base_filter($current_url);
get_template_part('templates/header/product');

if (have_rows('field_pages', $productID)) {
  $productQuery = new WP_Query(array(
    'post_type' => 'product',
    'status' => 'publish',
    'posts_per_page' => -1,
  ));
  $data = getProductResultsFeedData($productQuery);
  $sortOptions = [
    [
      'value' => 'featured',
      'label' => 'Featured'
    ],
    [
      'value' => 'newest',
      'label' => 'Newest'
    ],
    [
      'value' => 'priceHighToLow',
      'label' => 'Price: high to low'
    ],
    [
      'value' => 'priceLowToHigh',
      'label' => 'Price: low to high'
    ],
    [
      'value' => 'bestseller',
      'label' => 'Best sellers'
    ]
  ];

  while (have_rows('field_pages', $productID)) {
    the_row();

    if (get_row_layout() === 'productResultsGroup') {
      $heroBannerImage = get_sub_field('heroBannerImage');
      $heroBannerTitle = get_sub_field('heroBannerTitle');
      $heroBannerContent = get_sub_field('heroBannerContent');
      $USPBannerTitle = get_sub_field('USPBannerTitle');
      $USPBannerContent = get_sub_field('USPBannerContent');
      $feedInitialCount = get_sub_field('feedInitialCount');
    }
  }

  wp_reset_postdata();

?>
  <main id='productResults'>
    <section class="heroBanner">
      <div class="background" style="background-image: url(<?php echo $heroBannerImage; ?>);">
        <div class="overlay"></div>
      </div>

      <div class="inner grid">
        <div class="breadcrumbContainer">
          <?php echo generate_breadcrumbs(); ?>
        </div>

        <div class="content grid">
          <div class="top" style="background-image: url(<?php echo $heroBannerImage; ?>);">
            <?php if ($heroBannerTitle) { ?>
              <h1><?php echo $heroBannerTitle; ?></h1>
            <?php }
            if (count($data['products'])) { ?>
              <p class="totalProductCount">(<?php echo count($data['products']); ?>)</p>
            <?php } ?>
          </div>
          <?php if ($heroBannerContent) { ?>
            <div class="bottom">
              <p><?php echo $heroBannerContent; ?></p>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <section id='productResultsFeed' data-defaultfeedcount='<?php echo $feedInitialCount; ?>' data-feedcount='<?php echo $feedInitialCount; ?>' data-activeFilters='[]'>
      <div class="inner grid">
        <div class="filterContainer grid">
          <div class="filterButton">
            <button onclick="toggleFeedFilterActive(event)">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="14" viewBox="0 0 19 14" fill="none">
                <g>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4688 0C10.8892 0 9.56025 1.13269 9.25444 2.625H0.65625C0.482202 2.625 0.315282 2.69414 0.192211 2.81721C0.0691404 2.94028 0 3.1072 0 3.28125C0 3.4553 0.0691404 3.62222 0.192211 3.74529C0.315282 3.86836 0.482202 3.9375 0.65625 3.9375H9.25444C9.56025 5.43047 10.8885 6.5625 12.4688 6.5625C14.049 6.5625 15.3772 5.43047 15.6831 3.9375H17.7188C17.8928 3.9375 18.0597 3.86836 18.1828 3.74529C18.3059 3.62222 18.375 3.4553 18.375 3.28125C18.375 3.1072 18.3059 2.94028 18.1828 2.81721C18.0597 2.69414 17.8928 2.625 17.7188 2.625H15.6831C15.3772 1.13269 14.049 0 12.4688 0ZM12.4688 1.3125C13.564 1.3125 14.4375 2.18597 14.4375 3.28125C14.4375 4.37653 13.564 5.25 12.4688 5.25C11.3735 5.25 10.5 4.37653 10.5 3.28125C10.5 2.18597 11.3735 1.3125 12.4688 1.3125ZM5.90625 6.5625C4.32666 6.5625 2.99775 7.69519 2.69194 9.1875H0.65625C0.482202 9.1875 0.315282 9.25664 0.192211 9.37971C0.0691404 9.50278 0 9.6697 0 9.84375C0 10.0178 0.0691404 10.1847 0.192211 10.3078C0.315282 10.4309 0.482202 10.5 0.65625 10.5H2.69194C2.99775 11.993 4.326 13.125 5.90625 13.125C7.4865 13.125 8.81475 11.993 9.12056 10.5H17.7188C17.8928 10.5 18.0597 10.4309 18.1828 10.3078C18.3059 10.1847 18.375 10.0178 18.375 9.84375C18.375 9.6697 18.3059 9.50278 18.1828 9.37971C18.0597 9.25664 17.8928 9.1875 17.7188 9.1875H9.12056C8.81475 7.69519 7.4865 6.5625 5.90625 6.5625ZM5.90625 7.875C7.00153 7.875 7.875 8.74847 7.875 9.84375C7.875 10.939 7.00153 11.8125 5.90625 11.8125C4.81097 11.8125 3.9375 10.939 3.9375 9.84375C3.9375 8.74847 4.81097 7.875 5.90625 7.875Z" fill="black" />
                </g>
              </svg>
              <p class="text">Filters</p>
            </button>
          </div>

          <div class="filters">
            <ul class='grid'>
              <button class="closeButton" onclick="toggleFeedFilterActive(event)">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                  <path d="M1 9L5.00001 5.00002M5.00001 5.00002L9 1M5.00001 5.00002L1 1M5.00001 5.00002L9 9" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </button>

              <li class='title'>
                <p>Filters</p>
              </li>
              <?php
              if (count($data['filters']['surface']) > 1) {
              ?>
                <li class="filter" data-value="surface">
                  <button onclick="toggleFeedFilterDropdownActive(event)">
                    <p>
                      Surface
                      <span data-count='' class="count"></span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                        <g>
                          <path d="M1 1.25086L7 7.62465L13 1.25086" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                      </svg>
                    </p>
                  </button>
                  <div class="filterDropdown">
                    <div class="background closing" onclick="toggleFeedFilterDropdownActive(event)"></div>

                    <ul class="inner">
                      <?php
                      $count = 0;
                      foreach ($data['filters']['surface'] as $surface) {
                      ?>
                        <li class="filterOption" data-value='<?php echo $surface; ?>'>
                          <button onclick="handleFeedFilterOptionClick(event)">
                            <div class="checkbox">
                              <div class="check"></div>
                            </div>

                            <a href='#'><?php echo $surface === 'firm' ? 'Firm ground' : 'Soft ground'; ?> <span class="count">(<?php echo $data['counts']['surface'][$count]; ?>)</span></a>
                          </button>
                        </li>
                      <?php
                        $count++;
                      }
                      ?>
                    </ul>
                  </div>
                </li>
              <?php
              }

              if (count($data['filters']['sizes']) > 1) {
              ?>
                <li class="filter" data-value="sizes">
                  <button onclick="toggleFeedFilterDropdownActive(event)">
                    <p>
                      Size
                      <span data-count='' class="count"></span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                        <g>
                          <path d="M1 1.25086L7 7.62465L13 1.25086" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                      </svg>
                    </p>
                  </button>
                  <div class="filterDropdown">
                    <div class="background closing" onclick="toggleFeedFilterDropdownActive(event)"></div>

                    <ul class="inner">
                      <?php
                      $count = 0;
                      sort($data['filters']['sizes']);
                      foreach ($data['filters']['sizes'] as $size) {
                      ?>
                        <li class="filterOption" data-value='<?php echo $size; ?>'>
                          <button onclick="handleFeedFilterOptionClick(event)">
                            <div class="checkbox">
                              <div class="check"></div>
                            </div>

                            <a href='#'>Size <?php echo $size; ?> <span class="count">(<?php echo $data['counts']['sizes'][$count]; ?>)</span></a>
                          </button>
                        </li>
                      <?php
                        $count++;
                      }
                      ?>
                    </ul>
                  </div>
                </li>
              <?php
              }

              if (count($data['filters']['colors']) > 1) {
              ?>
                <li class="filter" data-value="color">
                  <button onclick="toggleFeedFilterDropdownActive(event)">
                    <p>
                      Colour
                      <span data-count='' class="count"></span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                        <g>
                          <path d="M1 1.25086L7 7.62465L13 1.25086" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                      </svg>
                    </p>
                  </button>
                  <div class="filterDropdown">
                    <div class="background closing" onclick="toggleFeedFilterDropdownActive(event)"></div>

                    <ul class="inner">
                      <?php
                      $count = 0;
                      foreach ($data['filters']['colors'] as $color) {
                      ?>
                        <li class="filterOption" data-value='<?php echo $color; ?>'>
                          <button onclick="handleFeedFilterOptionClick(event)">
                            <div class="checkbox">
                              <div class="check"></div>
                            </div>

                            <a href='#'><?php echo str_replace('-', ' ', $color); ?> <span class="count">(<?php echo $data['counts']['colors'][$count]; ?>)</span></a>
                          </button>
                        </li>
                      <?php
                        $count++;
                      }
                      ?>
                    </ul>
                  </div>
                </li>
              <?php
              }

              if (count($data['filters']['gender']) > 1) {
              ?>
                <li class="filter" data-value="gender">
                  <button onclick="toggleFeedFilterDropdownActive(event)">
                    <p>
                      Gender
                      <span data-count='' class="count"></span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                        <g>
                          <path d="M1 1.25086L7 7.62465L13 1.25086" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                      </svg>
                    </p>
                  </button>
                  <div class="filterDropdown">
                    <div class="background closing" onclick="toggleFeedFilterDropdownActive(event)"></div>

                    <ul class="inner">
                      <?php
                      $count = 0;
                      foreach ($data['filters']['gender'] as $gender) {
                      ?>
                        <li class="filterOption" data-value='<?php echo $gender; ?>'>
                          <button onclick="handleFeedFilterOptionClick(event)">
                            <div class="checkbox">
                              <div class="check"></div>
                            </div>

                            <a href='#'><?php echo $gender; ?> <span class="count">(<?php echo $data['counts']['gender'][$count]; ?>)</span></a>
                          </button>
                        </li>
                      <?php
                        $count++;
                      }
                      ?>
                    </ul>
                  </div>
                </li>
              <?php
              }

              if (count($data['filters']['collections']) > 0) {
              ?>
                <li class="filter" data-value="collections">
                  <button onclick="toggleFeedFilterDropdownActive(event)">
                    <p>
                      Collections
                      <span data-count='' class="count"></span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                        <g>
                          <path d="M1 1.25086L7 7.62465L13 1.25086" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                      </svg>
                    </p>
                  </button>
                  <div class="filterDropdown">
                    <div class="background closing" onclick="toggleFeedFilterDropdownActive(event)"></div>

                    <ul class="inner">
                      <?php
                      $count = 0;
                      foreach ($data['filters']['collections'] as $collection) {
                      ?>
                        <li class="filterOption" data-value='<?php echo $collection; ?>'>
                          <button onclick="handleFeedFilterOptionClick(event)">
                            <div class="checkbox">
                              <div class="check"></div>
                            </div>

                            <a href='#'><?php echo str_replace('_', ' ', $collection); ?> <span class="count">(<?php echo $data['counts']['collections'][$count]; ?>)</span></a>
                          </button>
                        </li>
                      <?php
                        $count++;
                      }
                      ?>
                    </ul>
                  </div>
                </li>
              <?php
              }
              ?>
              <li class='mobile-filter-buttons grid'>
                <button class="clear" onclick="clearFeedActiveFilters(event)">
                  <p>Clear<span>(0)</span></p>
                </button>

                <button class="apply" onclick="toggleFeedFilterActive(event)">
                  <p>Apply<span>(0)</span></p>
                </button>
              </li>
            </ul>
          </div>

          <div class="sortButton">
            <button onclick="toggleFeedSortActive(event)">
              <p class="text">Sort by</p>
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                <g>
                  <path d="M1 1.25086L7 7.62465L13 1.25086" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>
              </svg>
            </button>
          </div>

          <div class="sortContainer">
            <div class="background closing" onclick="toggleFeedSortActive(event)"></div>

            <button class="closeButton" onclick="toggleFeedSortActive(event)">
              <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                <path d="M1 9L5.00001 5.00002M5.00001 5.00002L9 1M5.00001 5.00002L1 1M5.00001 5.00002L9 9" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>

            <ul class="inner">
              <li class='title'>
                <p>Sort by</p>
              </li>
              <?php
              foreach ($sortOptions as $sortOption) {
              ?>
                <li class="sortOption" data-value='<?php echo $sortOption['value']; ?>'>
                  <button onclick="handleFeedSortOptionClick(event)">
                    <div class="checkbox">
                      <div class="check"></div>
                    </div>

                    <p><?php echo $sortOption['label']; ?></p>
                  </button>
                </li>
              <?php
              }
              ?>
              <li>

              <li class='mobile-sort-buttons grid'>
                <button class="apply" onclick="toggleFeedSortActive(event)">
                  <p>Apply</p>
                </button>
              </li>
            </ul>
          </div>

          <div class="activeFilters">
          </div>
        </div>

        <div class="feedContainer">
          <div class='feed'>
            <div class="inner grid">
              <?php
              $count = 1;
              foreach ($data['products'] as $product) {
                $itemClass = $count <= $feedInitialCount ? 'item active' : 'item';
                $availabilityString = null;
                $weekDifference = getWeekDifference($product['availabilityDate']);

                if ($weekDifference > 0) {
                  $availabilityString = 'Available in ' . $weekDifference . ' week';
                  $availabilityString .= $weekDifference > 1 ? 's' : null;
                }

                $count++;
              ?>
                <div class="<?php echo $itemClass; ?>" data-id='<?php echo $product['productID']; ?>' data-surface='<?php echo $product['ground']; ?>' data-sizes=<?php echo json_encode($product['sizes']); ?> data-color=<?php echo json_encode($product['colorNames']); ?> data-vegan='<?php echo $product['isVegan']; ?>' data-featuretag='<?php echo $product['featureTag']; ?>' data-collection='<?php echo $product['collections']; ?>' data-gender='<?php echo $product['gender']; ?>' data-price='<?php echo $product['price']; ?>' data-date='<?php echo $product['publishDate']; ?>'>
                  <?php
                  if ($availabilityString || $product['isVegan'] || $product['featureTag'] !== 'none') {
                  ?>
                    <div class="featureContainer grid">
                      <?php
                      if ($availabilityString) {
                      ?>
                        <p><?php echo $availabilityString; ?></p>
                        <?php
                      } else if ($product['featureTag'] !== 'none') {
                        if ($product['featureTag'] === 'new') {
                        ?>
                          <p>New in</p>
                        <?php
                        } else if ($product['featureTag'] === 'selling_fast') {
                        ?>
                          <p class="bestSeller">Selling fast</p>
                        <?php
                        }
                      }

                      if ($product['isVegan']) {
                        ?>
                        <!-- <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/vegan-logo-black.webp'; ?>" alt="Vegan" width="46" height="37" /> -->
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 46 37.89">
                          <defs>
                            <style>
                              .cls-1 {
                                stroke-width: 0px;
                              }
                            </style>
                          </defs>
                          <path fill='#000' d="m17.08,0c.87.15,1.75.25,2.6.47,6.35,1.62,10.95,6.74,11.88,13.23.49,3.44-.12,6.7-1.8,9.76-.21.37-.41.75-.63,1.16-.23-.13-.44-.25-.69-.39.18-.34.35-.66.52-.98,1.29-2.34,1.97-4.83,1.96-7.52-.02-6.85-5.01-13.08-11.69-14.56C11.1-.63,3.11,4.27,1.23,12.34c-1.16,4.98-.17,9.56,3.29,13.43,2.34,2.63,5.39,4.06,8.78,4.82.15.03.3.07.44.1.01,0,.02.02.04.04-.01.11-.02.23-.04.35-.02.12-.06.24-.09.38-1.65-.3-3.23-.79-4.72-1.51C4.09,27.64,1.12,23.87.2,18.55.12,18.06.07,17.57,0,17.08c0-.83,0-1.66,0-2.49.05-.34.11-.68.16-1.02C1.01,7.33,5.75,2.03,11.87.51c.92-.23,1.87-.34,2.8-.51.8,0,1.6,0,2.4,0Z" />
                          <path fill='#000' d="m27.69,37.89c-.52-.24-1.08-.43-1.55-.74-1.67-1.11-1.58-3.62.15-4.65.78-.47,2.16-.2,2.71.53.38.5.2,1.2-.35,1.41-.34.13-.61.04-.86-.22-.35-.37-.64-.42-.98-.21-.38.23-.53.64-.41,1.07.28,1,1.44,1.61,2.48,1.28.64-.2,1.15-.58,1.51-1.16.42-.67.34-1.37-.23-1.91-.59-.55-1.31-.86-2.08-1.05-.85-.21-1.71-.38-2.34-1.06-1.04-1.12-1.11-2.58-.25-3.75.92-1.26,2.24-1.63,3.74-1.45.1.01.19.02.28.05.42.15.71.06.94-.36.31-.56.83-.69,1.43-.53.01,0,.03,0,.04.01q1.12.26,2.1-.11c.03,1.17-.96,1.84-1.99,1.33-.21-.1-.42-.25-.64-.27-.18-.01-.37.13-.56.21.08.16.11.37.23.47.48.37.98.72,1.23,1.31.48,1.15.07,2.48-.98,3.16-.17.11-.35.22-.5.37-.3.3-.23.53.17.65,1.08.32,1.7,1.14,1.57,2.25-.05.46-.25.94-.49,1.34-.53.88-1.31,1.48-2.27,1.84-.12.05-.24.11-.37.16h-1.74Zm-.46-8.63c.03.47.01.89.08,1.29.11.62.55.96,1.16.96.6,0,1.06-.36,1.12-.99.07-.75.08-1.51.08-2.27,0-.72-.39-1.14-1.05-1.21-.55-.06-1.15.37-1.27.96-.09.43-.09.87-.12,1.26Z" />
                          <path fill='#000' d="m17.42,33.37h-2.52c-.49-5.66-2.63-10.51-6.97-14.32.17.04.35.06.52.12,1.45.53,2.63,1.45,3.64,2.59,1.37,1.54,2.47,3.25,2.99,5.28.06.24.16.47.24.7.06,0,.12-.02.18-.02.01-.23.04-.46.03-.69-.08-1.4-.26-2.81-.24-4.21.03-1.69.61-3.27,1.37-4.78.62-1.24.91-2.54.86-3.92-.01-.34-.48-.72-.8-.6-.1.04-.18.2-.22.32-.26.7-.78,1.18-1.4,1.64.03-.62.06-1.19.09-1.77-.05-.01-.1-.03-.15-.04-.55.58-.77,1.35-1.07,2.13-.15-.42-.29-.79-.44-1.23-.82.35-1.17,1.37-2.09,1.46.13-.47.27-.96.44-1.56-1.16.29-2.06.77-2.73,1.63-.12-.31-.09-.52.2-1.15.16-.36.34-.71.54-1.12-.98-.02-1.78.33-2.61.69.65-.72,1.3-1.45,2.01-2.22-.92-.07-1.72.05-2.41.62-.02-.04-.04-.08-.06-.13.6-.58,1.21-1.16,1.89-1.81-.67-.06-1.18-.11-1.69-.16,0-.04-.01-.07-.02-.11,1.1-.46,2.19-.92,3.32-1.4-.15-.61-.7-1.16-.49-1.94.58.86,1.44.77,2.23.77-.06-.83-.12-1.61-.18-2.4.05-.02.1-.05.16-.07.34.61.86.95,1.55,1.06.14-.52.28-1.04.41-1.55.04,0,.09.02.13.03.05.2.07.43.17.6.1.18.29.3.48.49.33-.59.02-1.1,0-1.59.44.27.88.54,1.35.83.32-.7.42-1.32.23-2.01.95.06,1.21.9,1.71,1.4.45-.52.88-1.02,1.32-1.53-.18.96-.18,1.34.06,1.76.9-.66,1.8-1.32,2.7-1.98.01.02.02.04.03.06-.23.47-.47.94-.74,1.49.82-.05,1.25-.61,1.84-.88-.47.6-.73,1.26-.81,2.02.78-.12,1.52-.24,2.26-.36.02.04.03.08.05.11-.56.37-1.21.64-1.5,1.45.46-.13.85-.24,1.24-.35-.5.74-1.23,1.17-2.12,1.58.56.38,1.06.72,1.67,1.13-.5.09-.88.19-1.27.22-.38.04-.77,0-1.19,0,.13.63.68.8,1.13,1.2-.54,0-1.01-.02-1.47,0-.71.04-.72.06-.81.76-.07.49-.12.98-.19,1.53-.35-.51-.01-1.26-.78-1.6-.13.61-.26,1.16-.39,1.75-.24-.28-.49-.58-.74-.88-.05.03-.1.05-.15.08,0,.18,0,.36,0,.55-.06,1.17,0,2.36-.21,3.5-.17.94-.59,1.86-1.01,2.74-.93,1.95-1.1,3.95-.7,6.05.2,1.07.27,2.16.41,3.3.09-.14.2-.26.26-.41.89-2.25,2.26-4.2,3.84-6.01.28-.32.61-.6.91-.91.18-.18.33-.39.52-.61-1.47-.24-2.51.76-3.31,3.09-.81-1.67-.29-3.57,1.25-4.19.67-.27,1.45-.4,2.18-.4,1.11-.01,1.95-.53,2.75-1.17.09-.07.18-.14.35-.16-.11.2-.2.41-.34.59-.69.85-.96,1.84-1.03,2.91-.06.83-.33,1.59-1.03,2.13-.66.5-1.4.67-2.21.64-.17,0-.37.06-.5.16-.16.12-.29.3-.4.47-1.61,2.41-2.4,5.07-2.46,7.95,0,.21,0,.41,0,.65Zm-3.4-25.91c-.51-.22-1.02-.43-1.53-.65-.04.04-.09.07-.13.11.09.44.19.89.28,1.35-.71.33-1.45.31-2.19.2-.03.03-.06.06-.09.09.27.32.54.63.77.91-.69.3-1.42.61-2.15.93.02.05.03.09.05.14.45-.03.91-.07,1.36-.1,0,.02.02.04.02.06-.66.42-1.32.85-1.99,1.27,0,.03.01.06.02.09h1.78c-.44.58-.82,1.06-1.23,1.61.66-.11,1.25-.2,1.91-.31-.27.48-.5.89-.73,1.29.03.02.06.05.09.07.66-.31,1.32-.63,2.04-.97v1.31c.79-.25.91-1.07,1.41-1.57.12.38.22.69.33,1.04.6-.51.59-1.52,1.57-1.69v1.54s.09.03.13.04c.26-.48.52-.95.8-1.47.28.12.62.25,1,.41.05-.38.08-.73.13-1.08.07-.46.18-.52.6-.29.19.1.37.21.55.31.03-.03.06-.05.09-.08-.1-.29-.19-.57-.3-.89.29-.04.55-.1.81-.09.66.02.69-.01.53-.66-.02-.06-.01-.13-.02-.22.52.1,1,.2,1.48.3q-.64-1.01-.61-1.38c.62.05,1.23.11,1.85.16l.05-.18c-.48-.28-.97-.56-1.52-.88.5-.18.94-.34,1.43-.52-.4-.06-.74-.11-1.07-.17,0-.04,0-.09,0-.13.69-.22,1.26-.61,1.75-1.26-.61.19-1.14.35-1.72.52.24-.58.46-1.1.67-1.63-.03-.02-.05-.04-.08-.05-.45.3-.91.59-1.36.89-.03-.02-.07-.04-.1-.06.11-.48.22-.96.34-1.48-.65.48-1.26.93-1.96,1.45.39.06.68.09.96.14.84.16,1.3.82,1.08,1.64-.23.86-.77,1.55-1.41,2.15-.18.17-.44.24-.66.36.04-.19.13-.31.22-.42.43-.52.91-1.01,1.29-1.56.55-.8.18-1.76-.73-1.88-.59-.08-1.23-.12-1.81,0-1.98.38-3.75,1.24-5.22,2.62-.65.62-1.22,1.36-1.68,2.13-.47.79-.1,1.51.79,1.73.35.09.74.11,1.1.06,1.81-.28,3.43-1.02,4.92-2.06.27-.18.55-.35.82-.52.03.03.05.07.08.1-.26.25-.5.54-.8.74-1.14.76-2.3,1.49-3.66,1.78-.77.16-1.58.31-2.36.25-1.32-.11-1.84-1.17-1.15-2.29.45-.73,1.03-1.39,1.63-2.02.45-.47,1.01-.83,1.53-1.24.12-.05.25-.09.37-.16,1.21-.68,2.48-1.19,3.85-1.45.25-.05.51-.07.8-.11-.1-.18-.16-.31-.24-.45-.34.19-.65.37-1,.56-.18-.6-.42-1.1-.93-1.48-.17.62-.33,1.18-.5,1.79-.33-.14-.65-.28-.99-.43-.01.07-.03.12-.03.18-.06.89-.11.92-.91.57-.07-.03-.15-.05-.27-.1-.05.39-.09.74-.14,1.09Z" />
                          <path fill='#000' d="m41.63,26.89c.13-.1.23-.18.32-.26.86-.77,2.09-.71,2.82.18.18.22.33.54.33.81.02,1.34,0,2.67-.04,4.01-.02.7-.02.75.63,1.04.36.16.32.46.31.79h-3.29c-.14-.36-.07-.62.3-.82.13-.07.26-.26.26-.41.05-1.1.07-2.21.09-3.31,0-.15-.01-.3-.04-.45-.07-.39-.22-.76-.64-.82-.43-.06-.83.11-1.05.51-.13.25-.23.54-.25.82-.05.87-.06,1.74-.09,2.61-.01.51.11.93.7,1.04.1.02.24.08.28.16.08.18.13.38.13.57,0,.05-.24.14-.37.14-1.51,0-3.01.02-4.52,0-.31,0-.62-.19-.93-.25-.23-.05-.48-.08-.71-.04-.54.1-1.06.32-1.61.37-1.12.12-2.1-.67-2.21-1.71-.06-.53.09-.97.53-1.27.43-.29.9-.54,1.36-.79.57-.31,1.15-.6,1.72-.92.56-.31.72-.89.4-1.41-.34-.56-.96-.69-1.5-.32-.31.22-.42.5-.28.86.04.1.08.21.13.31.23.52.17.83-.21,1.03-.53.28-1,.17-1.29-.31-.48-.82-.08-2.01.91-2.47,1.04-.49,2.14-.53,3.21-.06.81.35,1.12.92,1.08,1.81-.05.92-.11,1.85-.14,2.77-.01.33.02.66.09.98.09.41.36.58.76.54.51-.05.63-.15.65-.66.05-1.14.07-2.29.12-3.43.01-.31-.1-.47-.38-.61-.68-.33-.7-.83-.05-1.2.42-.24.87-.43,1.32-.58.66-.21.92-.03,1.13.76Zm-5.48,3.05c-.69.45-1.32.83-1.9,1.27-.15.11-.26.47-.2.64.08.2.34.4.56.46.52.14.94-.09,1.21-.57.29-.52.36-1.08.32-1.8Z" />
                          <path fill='#000' d="m20.39,29.94c.08.52.09,1.01.23,1.46.3.96,1.42,1.32,2.25.76.24-.16.45-.37.68-.54.14-.11.3-.22.46-.26.14-.03.36-.02.45.07.07.07.05.31,0,.44-.8,1.84-2.83,2.37-4.42,1.16-2.15-1.64-2.18-5.21-.02-6.61,1.28-.83,2.27-.68,3.46.02.93.55,1.45,2.01,1.24,3.1-.06.31-.19.42-.52.42-1.1-.02-2.21,0-3.31,0-.13,0-.27,0-.49,0Zm2.29-1.06c.17-.61.05-1.14-.33-1.61-.4-.48-1.02-.5-1.4-.04-.38.47-.47,1.03-.46,1.65h2.19Z" />
                        </svg>
                      <?php
                      }
                      ?>
                    </div>
                  <?php
                  }
                  ?>

                  <div class="imageContainer">
                    <picture>
                      <source srcset="<?php echo $product['image']; ?>" media="0" />

                      <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" width='321' height="356" />
                    </picture>

                    <div class="colorVariants">
                      <button class="colorVariant active" data-image='<?php echo $product['image']; ?>' style="background: <?php echo $product['colorCode']; ?>;" onclick="handleFeedItemVariantChange(event)"></button>
                      <?php
                      foreach ($product['colorVariants'] as $colorVariant) {
                        $variant_colorCode = $colorVariant['colorCode'];
                        $variant_image = $colorVariant['image'];
                      ?>
                        <button class="colorVariant" data-image='<?php echo $variant_image; ?>' style="background: <?php echo $variant_colorCode; ?>;" onclick="handleFeedItemVariantChange(event)"></button>
                      <?php
                      }
                      ?>
                    </div>
                  </div>

                  <div class="content grid">
                    <a class="linkWrapper" href="<?php echo $product['permalink']; ?>"><?php echo $product['title']; ?></a>
                    <h3><?php echo $product['title']; ?> <?php echo $product['ground'] === 'firm' ? 'FG' : 'SG'; ?></h3>
                    <p class="price">£<?php echo $product['price']; ?></p>
                    <p class='color-names'><?php
                                            for ($i = 0; $i < count($product['colorNames']); $i++) {
                                              echo str_replace('-', ' ', $product['colorNames'][$i]);
                                              if ($i < count($product['colorNames']) - 1) {
                                                echo ' / ';
                                              }
                                            }
                                            ?></p>
                    <p class='ground-type'><?php echo $product['ground'] === 'firm' ? 'Firm ground' : 'Soft ground'; ?></p>
                    <p class='color-count'><?php echo count($product['colorVariants']) + 1;
                                            ?> colours</p>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
            <?php
            if (count($data['products']) > $feedInitialCount) {
              $resultsString = $feedInitialCount . ' of ' . count($data['products']);
            ?>
              <div class="loadMoreContainer">
                <p class="results">Showing <?php echo $resultsString; ?> results</p>
                <button class='loadMore' onclick="handleFeedLoadMore(event)">
                  Load more
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="none">
                    <g id="ð¦ icon &quot;nav arrow down&quot;">
                      <path id="Vector" d="M1 1.05688L7 6.79593L13 1.05688" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                  </svg>
                </button>
              </div>
            <?php
            } ?>
          </div>
        </div>
      </div>
    </section>

    <div class='spacer' style='height: clamp(30px, 16vw, 60px); background-color: transparent;'></div>

    <section class='uspBanner'>
      <div class="inner">
        <div class="content">
          <h3><?php echo $USPBannerTitle; ?></h3>
          <p><?php echo $USPBannerContent; ?></p>
        </div>
      </div>
    </section>
  </main>

  <style>
    #productResults {
      margin-top: 130px;
    }

    .page-template {
      margin-top: 0px !important;
    }

    header.header-liveCoverage>.outer {
      max-width: unset;
      padding: 0px;
      margin: 0 auto;
      background-color: #000;
    }

    header.header-liveCoverage>.outer>.inner {
      max-width: 1920px;
      padding: 20px 50px;
    }

    .shopPromoBanner {
      display: none;
    }
  </style>
<?php
}
get_template_part("Components/live-coverage/SubscriptionForm/SubscriptionForm");
?>
<div class="geometricBackground">
  <img src='<?php echo home_url(); ?>/wp-content/themes/sokito/assets/images/subcriptionFormBackground.webp' />
  <!-- <div class="background lazyloaded" style="background-image: url(<?php echo home_url(); ?>/wp-content/themes/sokito/assets/images/subcriptionFormBackground.webp);" data-back="<?php echo home_url(); ?>/wp-content/themes/sokito/assets/images/subcriptionFormBackground.webp"></div> -->
</div>
<?php
get_footer("product");
