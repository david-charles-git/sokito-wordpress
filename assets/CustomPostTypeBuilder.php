<?php
    /* 
        Authors: David Charles | addmustard
    */

    /* Exit if accessed directly */
    if (!defined('ABSPATH')) { exit; }

    /* Register Post Types */
    function register_customPostTypes() {
        /* Post Type: Live Coverage */
        $labels = [
            "name" => __("Live Coverage", "custom-post-type-ui"),
            "singular_name" => __("Live Coverage", "custom-post-type-ui"),
        ];
        $args = [
            "label" => __("Live Coverage", "custom-post-type-ui"),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => true,
            "can_export" => true,
            "rewrite" => ["slug" => "live-coverage", "with_front" => false],
            "query_var" => true,
            "menu_position" => 52,
            "menu_icon" => "dashicons-media-document",
            "supports" => ["title", "thumbnail"],
            "taxonomies" => ["articleType"],
            "show_in_graphql" => false,
        ];
        register_post_type("live-coverage", $args);

        /* Post Type: Reviews */
        $labels = [
            "name" => __("Reviews", "custom-post-type-ui"),
            "singular_name" => __("Review", "custom-post-type-ui"),
        ];
        $args = [
            "label" => __("Review", "custom-post-type-ui"),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => true,
            "can_export" => true,
            "rewrite" => ["slug" => "reviews", "with_front" => false],
            "query_var" => true,
            "menu_position" => 52,
            "menu_icon" => "dashicons-format-quote",
            "supports" => ["title", "thumbnail"],
            "taxonomies" => ["reviewerType"],
            "show_in_graphql" => false,
        ];
        register_post_type("reviews", $args);
    }
    add_action('init', 'register_customPostTypes');


    /* Register Taxonomies */
    function register_customTaxonomies() {
        /* live coverage taxonomy - article type */
        register_taxonomy (
            'articleType',
            array (
                'live-coverage'
            ),
            array (
                'hierarchical' => true,
                'labels' => array (
                    'name' => _x( 'Article Types', 'taxonomy general name' ),
                    'singular_name' => _x( 'Article Type', 'taxonomy singular name' ),
                    'search_items' =>  __( 'Search Article Types' ),
                    'all_items' => __( 'All Article Types' ),
                    'parent_item' => __( 'Parent Article Type' ),
                    'parent_item_colon' => __( 'Article Type:' ),
                    'edit_item' => __( 'Edit Article Type' ),
                    'update_item' => __( 'Update Article Type' ),
                    'add_new_item' => __( 'Add New Article Type' ),
                    'new_item_name' => __( 'New Article Type Name' ),
                    'menu_name' => __( 'Article Types' )
                ),
                // Control the slugs used for this taxonomy
                'rewrite' => array (
                    'slug' => 'articleType', // This controls the base slug that will display before each term
                    'with_front' => false, // Don't display the category base before "/locations/"
                    'hierarchical' => false // This will allow URL's like "/locations/boston/cambridge/"
                )
            )
        );

        /* reviews taxonomy - reviewer type */
        register_taxonomy (
            'reviewerType',
            array (
                'reviews'
            ),
            array (
                'hierarchical' => true,
                'labels' => array (
                    'name' => _x( 'Reviewer Types', 'taxonomy general name' ),
                    'singular_name' => _x( 'Reviewer Type', 'taxonomy singular name' ),
                    'search_items' =>  __( 'Search Reviewer Types' ),
                    'all_items' => __( 'All Reviewer Types' ),
                    'parent_item' => __( 'Parent Reviewer Type' ),
                    'parent_item_colon' => __( 'Reviewer Type:' ),
                    'edit_item' => __( 'Edit Reviewer Type' ),
                    'update_item' => __( 'Update Reviewer Type' ),
                    'add_new_item' => __( 'Add New Reviewer Type' ),
                    'new_item_name' => __( 'New Reviewer Type Name' ),
                    'menu_name' => __( 'Reviewer Types' )
                ),
                // Control the slugs used for this taxonomy
                'rewrite' => array (
                    'slug' => 'reviewerType', // This controls the base slug that will display before each term
                    'with_front' => false, // Don't display the category base before "/locations/"
                    'hierarchical' => false // This will allow URL's like "/locations/boston/cambridge/"
                )
            )
        );
    }
    add_action('init', 'register_customTaxonomies');
