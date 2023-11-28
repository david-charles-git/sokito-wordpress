<?php
/* Builders */
require get_template_directory() . '/assets/CustomPostTypeBuilder.php';
include get_template_directory() . '/assets/OptionsBuilder.php';
include get_template_directory() . '/assets/PageBuilder.php';

add_filter('yoast_seo_development_mode', '__return_true');

add_filter('wpseo_schema_graph', 'removeUncategorised', 10, 2);

/**
 * Replaces hostname in all images with the CDN one.  
 *
 * @param array             $data    Schema.org graph.
 * @param Meta_Tags_Context $context Context object.
 *
 * @return array The altered Schema.org graph.
 */
function removeUncategorised($data, $context)
{
    $newData = array();
    $count = 0;
    foreach ($data as $key => $value) {
        if ($value['@type'] === 'ListItem' &&  $value['position'] === '2') {
        } else {
            array_push($newData, $data[$count]);
        }
        $count++;
    }
    return $data;
}


add_filter('wpseo_breadcrumb_links', 'fix_care_plan_bc_path');

/**
 * Custom breadcrumb paths using Yoast SEO to fix care plan breadcrumb paths.
 *
 * @param [array] $links default param.
 * @return [array] $links edited links path.
 */
function fix_care_plan_bc_path($links)
{

    global $post;

    if (get_post_type() == 'product') {

        $breadcrumb[] = array(
            'url'  => '/football-boots/',
            'text' => 'Football Boots',
        );
        array_splice($links, 1, 1, $breadcrumb);
    }

    return $links;
}


// add_action('woocommerce_checkout_update_order_meta',function( $order_id, $posted ) {
//     $order = wc_get_order( $order_id );
//     $isPreorder = false;

//     foreach ( $order->get_items() as $item_id => $item ) {
//         $product_id = $item->get_product_id();
//         $postID = $product_id;
//         $variation_id = $item->get_variation_id();

//         // Build an array of all the product variatins that have backorder
//         $productBackOrders = array();

//         if (have_rows('product-group', $postID)) {
//             while (have_rows('product-group', $postID)) {
//                 the_row();

//                 if (have_rows('backOrderInfo')) {

//                     while (have_rows('backOrderInfo')) {
//                         the_row();
//                         array_push($productBackOrders, get_sub_field('variationID'));
//                     }
//                 }
//             }
//         }

//         foreach($productBackOrders as $productBackOrder){
//             if($productBackOrder == $variation_id){
//                 // Product is on back order in CMS but also need to check if stock value is <= 0
//                 $variation_obj = new WC_Product_variation($variation_id);
//                 $stock = $variation_obj->get_stock_quantity();
//                 if($stock <= 0){
//                     // Is a back order and isnt in stock, must be a pre-order
//                     $order->update_meta_data( 'is_pre_order', true );
//                     $order->save();
//                 }
//             }
//         }
//     }

// } , 10, 2);

/* Filters */
add_filter('gform_confirmation_anchor', '__return_true');

// Allow File Types to be uploaded
function cc_mime_types($mimes)
{
    $mimes['svg']   = 'image/svg+xml';
    $mimes['webp']  = 'image/webp';

    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/* Functions */
//Read More Function
function doReadMore($args)
{
    if (count($args) < 1) {
        //do nothing

    } else {
        $content = $args['content'];
        $word_count_desktop = $args['readMoreDesktop'];
        $word_count_tablet = $args['readMoreTablet'];
        $word_count_mobile = $args['readMoreMobile'];
        $replace_target_array = ['<br>', '<br />', '<br/>'];
        $replace_with_array = ['**BREAK**', '**BREAK**', '**BREAK**'];
        $content = str_replace($replace_target_array, $replace_with_array, $content);
        $content_word_count = str_word_count($content);
        $readmore_class = "";
        $content_mobile = "";
        $content_tablet = "";
        $content_desktop = "";
        $content_readmore = "";

        if ($word_count_mobile < $content_word_count) {
            $content_mobile_array = explode(' ', $content, $word_count_mobile + 1);
            $readmore_class = 'readMoreMobile';

            if ($word_count_tablet < $content_word_count) {
                $content_tablet_array = explode(' ', array_pop($content_mobile_array), $word_count_tablet - $word_count_mobile + 1);
                $readmore_class = $readmore_class . ' readMoreTablet';

                if ($word_count_desktop < $content_word_count) {
                    $content_desktop_array = explode(' ', array_pop($content_tablet_array), $word_count_desktop - $word_count_tablet + 1);
                    $content_readMore_array = explode(' ', array_pop($content_desktop_array));
                    $readmore_class = $readmore_class . ' readMoreDesktop';

                    $content_desktop = implode(' ', $content_desktop_array);
                    $content_desktop = str_replace($replace_with_array, $replace_target_array, $content_desktop);
                    $content_readmore = implode(' ', $content_readMore_array);
                    $content_readmore = str_replace($replace_with_array, $replace_target_array, $content_readmore);
                } else {
                    $content_readMore_array = explode(' ', array_pop($content_tablet_array));
                    $content_readmore = implode(' ', $content_readMore_array);
                    $content_readmore = str_replace($replace_with_array, $replace_target_array, $content_readmore);
                }

                $content_tablet = implode(' ', $content_tablet_array);
                $content_tablet = str_replace($replace_with_array, $replace_target_array, $content_tablet);
            } else {
                $content_readmore = array_pop($content_mobile_array);
                $content_readmore = str_replace($replace_with_array, $replace_target_array, $content_readmore);
            }

            $content_mobile = implode(' ', $content_mobile_array);
            $content_mobile = str_replace($replace_with_array, $replace_target_array, $content_mobile);
        } else {
            $content_mobile = str_replace($replace_with_array, $replace_target_array, $content);
        }

        $html = "<div class='readMoreParent' data-openClose='open'>";
        $html .= "<div class='readMoreContainer " . $readmore_class . "'>";
        $html .= "<p class='readMoreMobileCopy'>" . $content_mobile . "</p>";
        $html .= "<p class='readMoreTabletCopy'>" . " " . $content_tablet . "</p>";
        $html .= "<p class='readMoreDesktopCopy'>" . " " . $content_desktop . "</p>";
        $html .= "<p class='readMoreReadmore'>" . " " . $content_readmore . "</p>";
        $html .= "<p class='readMoreButton' onclick='readMoreLess()'>Read more</p>";
        $html .= "</div>";
        $html .= "</div>";

        echo $html;
    }
}
function generate_breadcrumbs()
{
    $breadcrumbs = [];
    $home_text = 'Home';
    $separator = ' > ';
    $url = '';
    $url_parts = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));

    $breadcrumbs[] = '<a href="' . get_home_url() . '">' . $home_text . '</a>';

    foreach ($url_parts as $part) {
        $url .= '/' . $part;
        $breadcrumbs[] = (count($breadcrumbs) - 1) < count($url_parts) ? '<a href="' . $url . '">' . ucfirst(str_replace('-', ' ', $part)) . '</a>' : '<span>' . ucfirst(str_replace('-', ' ', $part)) . '</span>';
    }

    echo '<div class="breadcrumbs">' . implode($separator, $breadcrumbs) . '</div>';
}
//get average review rating from review post type
function getReviewsAverageRating()
{
    $reviewsPostArgs = array(
        'post_type' => "reviews",
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'reviewerType',
                'field' => 'slug',
                'terms' => 'verified-buyer',
            )
        ),
    );
    $reviewPosts = new WP_Query($reviewsPostArgs);
    $reviewCount = $reviewPosts->found_posts; //wp_count_posts('reviews') -> publish;
    $averageReviewRating = 0;

    if ($reviewPosts->have_posts()) {
        while ($reviewPosts->have_posts()) {
            $reviewPosts->the_post();

            if (have_rows('field_reviews')) {
                while (have_rows('field_reviews')) {
                    the_row();
                    $rating = get_sub_field('reviewRating');
                }
            }

            if (is_numeric($rating)) {
                $averageReviewRating += $rating;
            }
        }
    }

    $averageReviewRating = number_format($averageReviewRating / $reviewCount, 1);

    return array(
        "average" => $averageReviewRating,
        "count" => $reviewCount
    );
}

//ajax add to cart
function handleAddProductToBag()
{
    $productID = $_POST['productID'] ? intval($_POST['productID']) : 0;
    $productVariableID = $_POST['productVariableID'] ? intval($_POST['productVariableID']) : 0;
    $productQuantity = $_POST['productQuantity'] ? intval($_POST['productQuantity']) : 1;
    $response = [
        "error" => true,
        "errorType" => "",
        "cartCount" => 0,
        "productID" =>  $productID,
        "productVariableID" => $productVariableID,
        "productQuantity" => $productQuantity
    ];

    if (!$productID) {
        $response["errorType"] = "productID";
    }

    if (!$productVariableID) {
        $response["errorType"] = "productVariableID";
    }

    if (!$productQuantity) {
        $response["errorType"] = "productQuantity";
    }

    if (WC()->cart->add_to_cart($productID, $productQuantity, $productVariableID)) {
        $response["error"] = false;
        $response["cartCount"] = WC()->cart->get_cart_contents_count();
    }

    $response["productID"] = $productID;
    $response["productVariableID"] = $productVariableID;
    $response["productQuantity"] = $productQuantity;

    echo json_encode($response);

    die();
}
add_action("wp_ajax_handleAddProductToBag", "handleAddProductToBag");
add_action("wp_ajax_nopriv_handleAddProductToBag", "handleAddProductToBag");

//ajax view more posts
function handleViewMoreLiveCoveragePosts()
{
    if (!$_POST['postsPerPage'] || !$_POST['postsNotIn'] || !$_POST['postOffset']) {
        die();
    }

    $postType = "live-coverage";
    $postArgs = array(
        'post_type'      => $postType,
        'posts_per_page' => $_POST['postsPerPage'],
        'post__not_in'   => $_POST['postsNotIn'],
        'offset'         => $_POST['postOffset']
    );
    $postQuery = new WP_Query($postArgs);
    $totalPostCount = wp_count_posts($postType)->publish;
    $posts = [];
    $response = [
        "content" => "",
        "postCount" => $_POST['postOffset'],
        "totalPostCount" => $totalPostCount
    ];

    if ($postQuery->have_posts()) {
        while ($postQuery->have_posts()) {
            $post = [];
            $postQuery->the_post();
            $postID = get_the_ID();
            $postThumbnail = get_the_post_thumbnail_url();
            $postTitle = get_the_title();
            $postTypes = get_the_terms($postID, "articleType");
            $postPermalink = get_the_permalink();
            $postReadingTime = "";
            $postIsFeatured = false;

            if (have_rows('field_liveCoverage_details')) {
                while (have_rows('field_liveCoverage_details')) {
                    the_row();

                    $postReadingTime = get_sub_field('readingTime');
                    $postIsFeatured = get_sub_field('isFeatured');
                }
            }

            $post["ID"] = $postID;
            $post["thumbnail"] = $postThumbnail;
            $post["title"] = $postTitle;
            $post["types"] = $postTypes;
            $post["permalink"] = $postPermalink;
            $post["readTime"] = $postReadingTime;
            $post["isFeatured"] = $postIsFeatured;

            array_push($posts, $post);
        }

        wp_reset_postdata();
    }

    for ($a = 0; $a < count($posts); $a++) {
        $oddEvenValue = rand(1, 10) % 2;

        $response['content'] .= $oddEvenValue ? "<div class='item full hidden'>" : "<div class='item hidden'>";
        $response['content'] .= "<a href='" . $posts[$a]["permalink"] . "'></a>";
        $response['content'] .= "<div class='inner'>";
        $response['content'] .= "<div class='image'>";
        $response['content'] .= "<img src='" . $posts[$a]["thumbnail"] . "' />";
        $response['content'] .= "</div>";
        $response['content'] .= "<h6>" . $posts[$a]["title"] . "</h6>";
        $response['content'] .= "<div class='taxonomyContainer'>";

        for ($b = 0; $b < count($posts[$a]["types"]); $b++) {
            $name = $posts[$a]["types"][$b]->name;
            $slug = $posts[$a]["types"][$b]->slug;
            $permalink = home_url() . "/live-coverage/" . $slug . "/";

            $response['content'] .= "<div class='taxonomy' data-slug='" . $slug . "'>";
            $response['content'] .= "<a href='" . $permalink . "'>" . $name . "</a>";
            $response['content'] .= "</div>";
        }

        $response['content'] .= "</div>";
        $response['content'] .= "</div>";
        $response['content'] .= "</div>";
    }

    $response["postCount"] = $_POST['postOffset'] + count($posts);

    if ($response['content']) {
        echo json_encode($response);
    }

    die();
}
add_action("wp_ajax_handleViewMoreLiveCoveragePosts", "handleViewMoreLiveCoveragePosts");
add_action("wp_ajax_nopriv_handleViewMoreLiveCoveragePosts", "handleViewMoreLiveCoveragePosts");






//do_action( 'wp_enqueue_scripts' );


add_filter('wpseo_schema_breadcrumb', 'replace_domain_name_to_breadcrumb_schema', 11, 2);
/**
 * Replace domain name in the breadcrumb schema piece individually.
 * 
 * 
 * @param array $piece Schema.org Breadcrumb data array.
 * @return array Altered Schema.org Breadcrumb data array.
 */
function replace_domain_name_to_breadcrumb_schema($piece)
{

    $newP = array();

    foreach ($piece['itemListElement'] as &$list) {
        if ($list['item'] == 'https://www.sokito.com/shop/') {
            continue;
        } else {
            $list['item'] = str_replace('18.132.2.119', 'sokito.com', $list['item']);
            array_push($newP, $list);
        }
    }
    return $newP;
}


function add_to_cart_form_shortcode($atts)
{
    if (empty($atts)) {
        return '';
    }

    if (!isset($atts['id']) && !isset($atts['sku'])) {
        return '';
    }

    $args = array(
        'posts_per_page'      => 1,
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'no_found_rows'       => 1,
    );

    if (isset($atts['sku'])) {
        $args['meta_query'][] = array(
            'key'     => '_sku',
            'value'   => sanitize_text_field($atts['sku']),
            'compare' => '=',
        );

        $args['post_type'] = array('product', 'product_variation');
    }

    if (isset($atts['id'])) {
        $args['p'] = absint($atts['id']);
    }

    $single_product = new WP_Query($args);

    $preselected_id = '0';


    if (isset($atts['sku']) && $single_product->have_posts() && 'product_variation' === $single_product->post->post_type) {

        $variation = new WC_Product_Variation($single_product->post->ID);
        $attributes = $variation->get_attributes();


        $preselected_id = $single_product->post->ID;


        $args = array(
            'posts_per_page'      => 1,
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'no_found_rows'       => 1,
            'p'                   => $single_product->post->post_parent,
        );

        $single_product = new WP_Query($args);
?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                var $variations_form = $('[data-product-page-preselected-id="<?php echo esc_attr($preselected_id); ?>"]').find('form.variations_form');
                <?php foreach ($attributes as $attr => $value) { ?>
                    $variations_form.find('select[name="<?php echo esc_attr($attr); ?>"]').val('<?php echo esc_js($value); ?>');
                <?php } ?>
            });
        </script>
    <?php
    }

    $single_product->is_single = true;
    ob_start();
    global $wp_query;

    $previous_wp_query = $wp_query;

    $wp_query          = $single_product;

    wp_enqueue_script('wc-single-product');
    while ($single_product->have_posts()) {
        $single_product->the_post()
    ?>
        <div class="single-product" data-product-page-preselected-id="<?php echo esc_attr($preselected_id); ?>">
            <?php woocommerce_template_single_add_to_cart(); ?>
        </div>
<?php
    }

    $wp_query = $previous_wp_query;

    wp_reset_postdata();
    return '<div class="woocommerce">' . ob_get_clean() . '</div>';
}
add_shortcode('add_to_cart_form', 'add_to_cart_form_shortcode');






function my_connection_types()
{
    p2p_register_connection_type(array(
        'name' => 'product_to_product',
        'from' => 'product',
        'to' => 'product'
    ));

    p2p_register_connection_type(array(
        'name' => 'product_to_product_ground',
        'from' => 'product',
        'to' => 'product',
        'title' => array(
            'from' => __('Linked product studs', 'my-textdomain'),
            'to' => __('Linked product studs', 'my-textdomain')
        ),
    ));
}
add_action('p2p_init', 'my_connection_types');


add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}


add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

function woocommerce_ajax_add_to_cart()
{

    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }

        WC_AJAX::get_refreshed_fragments();
    } else {

        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );

        echo wp_send_json($data);
    }

    wp_die();
}

?>