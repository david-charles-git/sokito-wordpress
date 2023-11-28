<?php
if (!defined('ABSPATH')) {
  exit;
}

if (function_exists("register_field_group")) {
  $layout = array(
    //Rating
    array(
      'key' => 'field_reviews_1',
      'label' => 'Review - Rating',
      'name' => 'reviewRating',
      'type' => 'number',
      'column_width' => '33%',
      'default_value' => 5,
      'formatting' => 'html'
    ),
    //Heading
    array(
      'key' => 'field_reviews_2',
      'label' => 'Review - Heading',
      'name' => 'reviewHeading',
      'type' => 'textarea',
      'column_width' => '33%',
      'formatting' => 'html',
      'new_lines' => 'br'
    ),
    //Body
    array(
      'key' => 'field_reviews_3',
      'label' => 'Review - Body',
      'name' => 'reviewBody',
      'type' => 'textarea',
      'column_width' => '34%',
      'formatting' => 'html',
      'new_lines' => 'br'
    ),
    //Name
    array(
      'key' => 'field_reviews_4',
      'label' => 'Reviewer - Name',
      'name' => 'reviewerName',
      'type' => 'text',
      'column_width' => '33%',
      'formatting' => 'html'
    ),
    //Position
    array(
      'key' => 'field_reviews_5',
      'label' => 'Reviewer - Position',
      'name' => 'reviewerPosition',
      'type' => 'text',
      'column_width' => '33%',
      'formatting' => 'html'
    ),
    //Club
    array(
      'key' => 'field_reviews_6',
      'label' => 'Reviewer - Club',
      'name' => 'reviewerClub',
      'type' => 'text',
      'column_width' => '34%',
      'formatting' => 'html'
    ),
    //feature image  source
    array(
      'key' => 'field_reviews_7',
      'label' => 'Feature Image - Source',
      'name' => 'featureImage_src',
      'type' => 'image',
      'column_width' => '50%',
      'save_format' => 'url',
      'preview_size' => 'thumbnail',
      'library' => 'all',
    ),
    //feature image alt
    array(
      'key' => 'field_reviews_8',
      'label' => 'Feature Image - Alt',
      'name' => 'featureImage_alt',
      'type' => 'text',
      'column_width' => '50%',
      'formatting' => 'html'
    )
  );

  register_field_group(
    array(
      'id' => 'acf_reviews_pageBuilder',
      'title' => 'Reviews - Page Builder',
      'fields' => array(
        array(
          'key' => 'field_reviews',
          'label' => 'Reviews',
          'name' => 'reviews_group',
          'type' => 'group',
          'sub_fields' => $layout
        )
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'reviews'
          )
        )
      ),
      'options' => array(
        "show_in_rest" => true,
        'position' => 'normal',
        'layout' => 'no_box',
        'hide_on_screen' => array()
      ),
      'menu_order' => 0
    )
  );
}
