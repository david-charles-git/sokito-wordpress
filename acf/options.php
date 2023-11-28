<?php
if (!defined('ABSPATH')) {
  exit;
}

if (function_exists("acf_add_options_page")) {
  /* add Site Options page */
  acf_add_options_page(
    array(
      'page_title'    => 'Site Settings',
      'menu_title'    => 'Site Settings',
      'menu_slug'     => 'site_settings',
      'capability'    => 'edit_posts',
      'redirect'      => false
    )
  );
  /* add Navigation Options page */
  acf_add_options_sub_page(
    array(
      'page_title'    => 'Navigation Menus',
      'menu_title'    => 'Navigation Menus',
      'menu_slug'     => 'navigation_menus',
      'parent_slug'   => 'site_settings',
      'capability'    => 'edit_posts',
      'redirect'      => false
    )
  );
}

if (function_exists("acf_add_local_field_group")) {
  //General Site Settings
  acf_add_local_field_group(
    array(
      'key' => 'acf_generalSiteSettings',
      'title' => 'General Site Settings',
      'fields' => array(
        //Promo Banner Details
        array(
          'key' => 'field_PromoBanner',
          'label' => 'Promo Banner',
          'name' => 'promoBanner',
          'type' => 'group',
          'sub_fields' => array(
            //content
            array(
              'key' => 'field_PromoBanner_1',
              'label' => 'Content',
              'name' => 'content',
              'type' => 'text',
              'column_width' => '33%',
              'formatting' => 'html'
            ),
            //startDate
            array(
              'key' => 'field_PromoBanner_2',
              'label' => 'Promo start date',
              'name' => 'startDate',
              'type' => 'date_picker',
              'column_width' => '34%',
              'display_format' => 'd/m/Y',
              'return_format' => 'd/m/Y',
              'first_day' => 1
            ),
            //end Date
            array(
              'key' => 'field_PromoBanner_3',
              'label' => 'Promo end date',
              'name' => 'endDate',
              'type' => 'date_picker',
              'column_width' => '33%',
              'display_format' => 'd/m/Y',
              'return_format' => 'd/m/Y',
              'first_day' => 1
            ),
          )
        )
      ),
      'location' => array(
        array(
          array(
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'site_settings',
          ),
        ),
      )
    )
  );

  //Navigation - Menus
  acf_add_local_field_group(
    array(
      'key' => 'acf_navigationMenus',
      'title' => 'Navigation - Menus',
      'fields' => array(
        //Header Menu
        array(
          'key' => 'field_navigation_header',
          'label' => 'Navigation - Header Menu',
          'name' => 'headerMenu',
          'type' => 'group',
          'sub_fields' => array(
            //Home Button image
            // array (
            //     'key' => 'field_navigation_header_1',
            //     'label' => 'Home Button Image',
            //     'name' => 'homeButtonImage',
            //     'type' => 'image',
            //     'column_width' => '100%',
            //     'save_format' => 'url',
            //     'preview_size' => 'thumbnail',
            //     'library' => 'all'
            // ),
            //Navigation Options
            array(
              'key' => 'field_navigation_header_2',
              'label' => 'Navigation Options',
              'name' => 'navigationOptions',
              'type' => 'repeater',
              'sub_fields' => array(
                //navigation type
                array(
                  'key' => 'field_navigation_header_2_1',
                  'label' => 'Navigation Type',
                  'name' => 'type',
                  'type' => 'select',
                  'choices' => array(
                    'custom' => 'Custom',
                    'post' => 'Post'
                  ),
                  'default_value' => 'post',
                  'allow_null' => 0,
                  'multiple' => 0,
                ),
                //custom navigation content
                array(
                  'key' => 'field_navigation_header_2_2',
                  'label' => 'Content',
                  'name' => 'content',
                  'type' => 'text',
                  'column_width' => '50%',
                  'formatting' => 'html',
                  'conditional_logic' => array(
                    array(
                      array(
                        'field' => 'field_navigation_header_2_1',
                        'operator' => '==',
                        'value' => 'custom',
                      ),
                    ),
                  )
                ),
                //custom navigation href
                array(
                  'key' => 'field_navigation_header_2_3',
                  'label' => 'Href',
                  'name' => 'href',
                  'type' => 'text',
                  'column_width' => '50%',
                  'formatting' => 'html',
                  'conditional_logic' => array(
                    array(
                      array(
                        'field' => 'field_navigation_header_2_1',
                        'operator' => '==',
                        'value' => 'custom',
                      ),
                    ),
                  )
                ),
                //navigation Post
                array(
                  'key' => 'field_navigation_header_2_4',
                  'label' => 'Post',
                  'name' => 'post',
                  'type' => 'post_object',
                  'post_type' => '',
                  'taxonomy' => '',
                  'allow_null' => 0,
                  'multiple' => 0,
                  'column_width' => '100%',
                  'return_format' => 'id',
                  'conditional_logic' => array(
                    array(
                      array(
                        'field' => 'field_navigation_header_2_1',
                        'operator' => '==',
                        'value' => 'post',
                      ),
                    ),
                  )
                ),
                //Navigation Sub Menu Options
                array(
                  'key' => 'field_navigation_header_2_5',
                  'label' => 'Sub Menu Options',
                  'name' => 'navigationSubMenuOptions',
                  'type' => 'repeater',
                  'sub_fields' => array(
                    //navigation type
                    array(
                      'key' => 'field_navigation_header_2_5_1',
                      'label' => 'Navigation Type',
                      'name' => 'subType',
                      'type' => 'select',
                      'choices' => array(
                        'custom' => 'Custom',
                        'post' => 'Post'
                      ),
                      'default_value' => 'post',
                      'allow_null' => 0,
                      'multiple' => 0,
                    ),
                    //custom navigation content
                    array(
                      'key' => 'field_navigation_header_2_5_2',
                      'label' => 'Content',
                      'name' => 'subContent',
                      'type' => 'text',
                      'column_width' => '50%',
                      'formatting' => 'html',
                      'conditional_logic' => array(
                        array(
                          array(
                            'field' => 'field_navigation_header_2_5_1',
                            'operator' => '==',
                            'value' => 'custom',
                          ),
                        ),
                      )
                    ),
                    //custom navigation href
                    array(
                      'key' => 'field_navigation_header_2_5_3',
                      'label' => 'Href',
                      'name' => 'subHref',
                      'type' => 'text',
                      'column_width' => '50%',
                      'formatting' => 'html',
                      'conditional_logic' => array(
                        array(
                          array(
                            'field' => 'field_navigation_header_2_5_1',
                            'operator' => '==',
                            'value' => 'custom',
                          ),
                        ),
                      )
                    ),
                    //navigation Post
                    array(
                      'key' => 'field_navigation_header_2_5_4',
                      'label' => 'Post',
                      'name' => 'subPost',
                      'type' => 'post_object',
                      'post_type' => '',
                      'taxonomy' => '',
                      'allow_null' => 0,
                      'multiple' => 0,
                      'column_width' => '100%',
                      'return_format' => 'id',
                      'conditional_logic' => array(
                        array(
                          array(
                            'field' => 'field_navigation_header_2_5_1',
                            'operator' => '==',
                            'value' => 'post',
                          ),
                        ),
                      )
                    )
                  ),
                  'row_min' => '',
                  'row_limit' => '',
                  'layout' => 'block',
                  'button_label' => 'Add Sub Menu Option'
                )
              ),
              'row_min' => '',
              'row_limit' => '',
              'layout' => 'block',
              'button_label' => 'Add Navigation Option'
            )
          ),
        ),
        //Footer Menu
        array(
          'key' => 'field_navigation_footer',
          'label' => 'Nevigation - Footer Menu',
          'name' => 'footerMenu',
          'type' => 'group',
          'sub_fields' => array(
            //Navigation Options
            array(
              'key' => 'field_navigation_footer_1',
              'label' => 'Navigation Options',
              'name' => 'navigationOptions',
              'type' => 'repeater',
              'sub_fields' => array(
                //navigation heading
                array(
                  'key' => 'field_navigation_footer_1_1',
                  'label' => 'Title',
                  'name' => 'title',
                  'type' => 'text',
                  'column_width' => '100%',
                  'formatting' => 'html',
                ),
                //Navigation Sub Menu Options
                array(
                  'key' => 'field_navigation_footer_1_2',
                  'label' => 'Sub Menu Options',
                  'name' => 'navigationSubMenuOptions',
                  'type' => 'repeater',
                  'sub_fields' => array(
                    //navigation type
                    array(
                      'key' => 'field_navigation_footer_1_2_1',
                      'label' => 'Navigation Type',
                      'name' => 'subType',
                      'type' => 'select',
                      'choices' => array(
                        'custom' => 'Custom',
                        'post' => 'Post'
                      ),
                      'default_value' => 'post',
                      'allow_null' => 0,
                      'multiple' => 0,
                    ),
                    //custom navigation content
                    array(
                      'key' => 'field_navigation_footer_1_2_2',
                      'label' => 'Content',
                      'name' => 'subContent',
                      'type' => 'text',
                      'column_width' => '50%',
                      'formatting' => 'html',
                      'conditional_logic' => array(
                        array(
                          array(
                            'field' => 'field_navigation_footer_1_2_1',
                            'operator' => '==',
                            'value' => 'custom',
                          ),
                        ),
                      )
                    ),
                    //custom navigation href
                    array(
                      'key' => 'field_navigation_footer_1_2_3',
                      'label' => 'Href',
                      'name' => 'subHref',
                      'type' => 'text',
                      'column_width' => '50%',
                      'formatting' => 'html',
                      'conditional_logic' => array(
                        array(
                          array(
                            'field' => 'field_navigation_footer_1_2_1',
                            'operator' => '==',
                            'value' => 'custom',
                          ),
                        ),
                      )
                    ),
                    //navigation Post
                    array(
                      'key' => 'field_navigation_footer_1_2_4',
                      'label' => 'Post',
                      'name' => 'subPost',
                      'type' => 'post_object',
                      'post_type' => '',
                      'taxonomy' => '',
                      'allow_null' => 0,
                      'multiple' => 0,
                      'column_width' => '100%',
                      'return_format' => 'id',
                      'conditional_logic' => array(
                        array(
                          array(
                            'field' => 'field_navigation_header_1_2_1',
                            'operator' => '==',
                            'value' => 'post',
                          ),
                        ),
                      )
                    )
                  ),
                  'row_min' => '',
                  'row_limit' => '',
                  'layout' => 'block',
                  'button_label' => 'Add Sub Menu Option'
                )
              ),
              'row_min' => '',
              'row_limit' => '',
              'layout' => 'block',
              'button_label' => 'Add Navigation Option'
            )
          )
        )
      ),
      'location' => array(
        array(
          array(
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'navigation_menus',
          ),
        ),
      ),
    )
  );
}
