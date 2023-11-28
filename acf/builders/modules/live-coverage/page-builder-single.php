<?php
function get_live_coverage_single_page_builder($builder_key)
{
  if (!$builder_key) {
    return;
  }

  $module_key = 'field_live_coverage_single_page_builder';
  $module_label = 'Live Coverage Single Page Builder';
  $module_name = 'live_coverage_single_page_builder';
  $module = array(
    'key' => $module_key,
    'label' => $module_label,
    'name' => 'liveCoverage_layouts',
    'type' => $module_name,
    'layouts' => array(
      //article Modules
      array(
        'label' => 'Article Modules',
        'name' => 'articleModules',
        'display' => 'row',
        'sub_fields' => array(
          //hide section
          array(
            'key' => 'field_liveCoverage_articleModules_hide',
            'label' => 'Hide Section?',
            'name' => 'hide',
            'type' => 'true_false',
            'column_width' => '100%',
            'default_value' => 0
          ),
          //module type
          array(
            'key' => 'field_liveCoverage_articleModules_1',
            'label' => 'Module Type',
            'name' => 'moduleType',
            'type' => 'select',
            'choices' => array(
              'intro' => 'Intro Module',
              'text' => 'Text Module',
              'quote' => 'Quote Module',
              'image' => 'Image Module',
              "video" => "Video Module"
            ),
            'default_value' => '',
            'allow_null' => 0,
            'multiple' => 0,
          ),
          //intro module group
          array(
            'key' => 'field_liveCoverage_articleModules_2',
            'label' => 'Intro Module',
            'name' => 'introModuleGroup',
            'type' => 'group',
            'sub_fields' => array(
              //Heading
              array(
                'key' => 'field_liveCoverage_articleModules_2_1',
                'label' => 'Heading',
                'name' => 'heading',
                'type' => 'textarea',
                'column_width' => '50%',
                'formatting' => 'html',
                'new_lines' => 'br'
              ),
              //intro type
              array(
                'key' => 'field_liveCoverage_articleModules_2_2',
                'label' => 'Intro Type',
                'name' => 'introType',
                'type' => 'select',
                'column_width' => '50%',
                'choices' => array(
                  'image' => 'Image',
                  'video' => 'Video'
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
              ),
              //video type
              array(
                'key' => 'field_liveCoverage_articleModules_2_3',
                'label' => 'Video Type',
                'name' => 'videoType',
                'type' => 'select',
                'column_width' => '50%',
                'choices' => array(
                  'hosted' => 'Hosted',
                  'embeded' => 'Embeded'
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_articleModules_2_2',
                      'operator' => '==',
                      'value' => 'video',
                    ),
                  ),
                )
              ),
              //video source
              array(
                'key' => 'field_liveCoverage_articleModules_2_4',
                'label' => 'Video Source',
                'name' => 'videoSource',
                'type' => 'file',
                'column_width' => '25%',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'instructions' => "",
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_articleModules_2_2',
                      'operator' => '==',
                      'value' => 'video',
                    ),
                    array(
                      'field' => 'field_liveCoverage_articleModules_2_3',
                      'operator' => '==',
                      'value' => 'hosted',
                    )
                  ),
                )
              ),
              //thumbnail source
              array(
                'key' => 'field_liveCoverage_articleModules_2_5',
                'label' => 'Thumbnail Source',
                'name' => 'videoThumbnail',
                'type' => 'image',
                'column_width' => '25%',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_articleModules_2_2',
                      'operator' => '==',
                      'value' => 'video',
                    ),
                    array(
                      'field' => 'field_liveCoverage_articleModules_2_3',
                      'operator' => '==',
                      'value' => 'hosted',
                    )
                  ),
                )
              ),
              //embed url
              array(
                'key' => 'field_liveCoverage_articleModules_2_6',
                'label' => 'Embed URL',
                'name' => 'embedURL',
                'type' => 'textarea',
                'column_width' => '50%',
                'formatting' => 'html',
                'new_lines' => 'br',
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_articleModules_2_2',
                      'operator' => '==',
                      'value' => 'video',
                    ),
                    array(
                      'field' => 'field_liveCoverage_articleModules_2_3',
                      'operator' => '==',
                      'value' => 'embeded',
                    )
                  ),
                )
              ),
              //image source
              array(
                'key' => 'field_liveCoverage_articleModules_2_7',
                'label' => 'Image Source',
                'name' => 'image_src',
                'type' => 'image',
                'column_width' => '50%',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_articleModules_2_2',
                      'operator' => '==',
                      'value' => 'image',
                    ),
                  ),
                )
              ),
              //image alt
              array(
                'key' => 'field_liveCoverage_articleModules_2_8',
                'label' => 'Image Alt',
                'name' => 'image_alt',
                'type' => 'textarea',
                'column_width' => '50%',
                'formatting' => 'html',
                'new_lines' => 'br',
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_articleModules_2_2',
                      'operator' => '==',
                      'value' => 'image',
                    ),
                  ),
                )
              )
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'field_liveCoverage_articleModules_1',
                  'operator' => '==',
                  'value' => 'intro',
                ),
              ),
            )
          ),
          //text module group
          array(
            'key' => 'field_liveCoverage_articleModules_3',
            'label' => 'Text Module',
            'name' => 'textModuleGroup',
            'type' => 'group',
            'sub_fields' => array(
              //Heading
              array(
                'key' => 'field_liveCoverage_articleModules_3_1',
                'label' => 'Heading',
                'name' => 'heading',
                'type' => 'textarea',
                'column_width' => '50%',
                'formatting' => 'html',
                'new_lines' => 'br'
              ),
              //Body
              array(
                'key' => 'field_liveCoverage_articleModules_3_2',
                'label' => 'Body',
                'name' => 'body',
                'type' => 'textarea',
                'column_width' => '50%',
                'formatting' => 'html',
                'new_lines' => 'br'
              ),
              //hasReadMore
              array(
                'key' => 'field_liveCoverage_articleModules_3_3',
                'label' => 'Has Read More?',
                'name' => 'hasReadMore',
                'type' => 'true_false',
                'column_width' => '100%',
                'default_value' => 0
              ),
              //wordCountDesktop
              array(
                'key' => 'field_liveCoverage_articleModules_3_4',
                'label' => 'Word Count - Desktop',
                'name' => 'readMoreDesktop',
                'type' => 'number',
                'default_value' => 150,
                'column_width' => '33%',
                'append' => 'words',
                'formatting' => 'html',
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_articleModules_3_3',
                      'operator' => '==',
                      'value' => 1,
                    ),
                  ),
                )
              ),
              //wordCountTablet
              array(
                'key' => 'field_liveCoverage_articleModules_3_5',
                'label' => 'Word Count - Tablet',
                'name' => 'readMoreTablet',
                'type' => 'number',
                'default_value' => 100,
                'column_width' => '34%',
                'append' => 'words',
                'formatting' => 'html',
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_articleModules_3_3',
                      'operator' => '==',
                      'value' => 1,
                    ),
                  ),
                )
              ),
              //wordCountMobile
              array(
                'key' => 'field_liveCoverage_articleModules_3_6',
                'label' => 'Word Count - Mobile',
                'name' => 'readMoreMobile',
                'type' => 'number',
                'default_value' => 50,
                'column_width' => '30%',
                'append' => 'words',
                'formatting' => 'html',
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_articleModules_3_3',
                      'operator' => '==',
                      'value' => 1,
                    ),
                  ),
                )
              ),
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'field_liveCoverage_articleModules_1',
                  'operator' => '==',
                  'value' => 'text',
                ),
              ),
            )
          ),
          //quote module group
          array(
            'key' => 'field_liveCoverage_articleModules_4',
            'label' => 'Quote Module',
            'name' => 'quoteModuleGroup',
            'type' => 'group',
            'sub_fields' => array(
              //Heading
              array(
                'key' => 'field_liveCoverage_articleModules_4_1',
                'label' => 'Heading',
                'name' => 'heading',
                'type' => 'textarea',
                'column_width' => '50%',
                'formatting' => 'html',
                'new_lines' => 'br'
              ),
              //Body
              array(
                'key' => 'field_liveCoverage_articleModules_4_2',
                'label' => 'Quote',
                'name' => 'quote',
                'type' => 'textarea',
                'column_width' => '50%',
                'formatting' => 'html',
                'new_lines' => 'br'
              ),
              //Author
              array(
                'key' => 'field_liveCoverage_articleModules_4_3',
                'label' => 'Author',
                'name' => 'author',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              )
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'field_liveCoverage_articleModules_1',
                  'operator' => '==',
                  'value' => 'quote',
                ),
              ),
            )
          ),
          //image module group
          array(
            'key' => 'field_liveCoverage_articleModules_5',
            'label' => 'Image Module',
            'name' => 'imageModuleGroup',
            'type' => 'group',
            'sub_fields' => array(
              //image source
              array(
                'key' => 'field_liveCoverage_articleModules_5_1',
                'label' => 'Image Source',
                'name' => 'image_src',
                'type' => 'image',
                'column_width' => '50%',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all'
              ),
              //image alt
              array(
                'key' => 'field_liveCoverage_articleModules_5_2',
                'label' => 'Image Alt',
                'name' => 'image_alt',
                'type' => 'textarea',
                'column_width' => '50%',
                'formatting' => 'html',
                'new_lines' => 'br'
              )
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'field_liveCoverage_articleModules_1',
                  'operator' => '==',
                  'value' => 'image',
                ),
              ),
            )
          ),
          //video module group
          array(
            'key' => 'field_liveCoverage_articleModules_6',
            'label' => 'Video Module',
            'name' => 'videoModuleGroup',
            'type' => 'group',
            'sub_fields' => array(
              //video type
              array(
                'key' => 'field_liveCoverage_articleModules_6_1',
                'label' => 'Video Type',
                'name' => 'videoType',
                'type' => 'select',
                'column_width' => '50%',
                'choices' => array(
                  'hosted' => 'Hosted',
                  'embeded' => 'Embeded'
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0
              ),
              //video source
              array(
                'key' => 'field_liveCoverage_articleModules_6_2',
                'label' => 'Video Source',
                'name' => 'videoSource',
                'type' => 'file',
                'column_width' => '25%',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'instructions' => "",
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_articleModules_6_1',
                      'operator' => '==',
                      'value' => 'hosted',
                    )
                  ),
                )
              ),
              //image source
              array(
                'key' => 'field_liveCoverage_articleModules_6_3',
                'label' => 'Thumbnail Source',
                'name' => 'videoThumbnail',
                'type' => 'image',
                'column_width' => '25%',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_articleModules_6_1',
                      'operator' => '==',
                      'value' => 'hosted',
                    )
                  ),
                )
              ),
              //embed url
              array(
                'key' => 'field_liveCoverage_articleModules_6_4',
                'label' => 'Embed URL',
                'name' => 'embedURL',
                'type' => 'textarea',
                'column_width' => '50%',
                'formatting' => 'html',
                'new_lines' => 'br',
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_articleModules_6_1',
                      'operator' => '==',
                      'value' => 'embeded',
                    )
                  ),
                )
              ),
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'field_liveCoverage_articleModules_1',
                  'operator' => '==',
                  'value' => 'video',
                ),
              ),
            )
          ),
        )
      ),
      //carousel
      array(
        'label' => 'Carousel',
        'name' => 'carousel',
        'display' => 'row',
        'sub_fields' => array(
          //hide section
          array(
            'key' => 'field_liveCoverage_carousel_hide',
            'label' => 'Hide Section?',
            'name' => 'hide',
            'type' => 'true_false',
            'column_width' => '100%',
            'default_value' => 0
          ),
          //carousel type
          array(
            'key' => 'field_liveCoverage_carousel_0',
            'label' => 'Carousel Type',
            'name' => 'carouselType',
            'type' => 'select',
            'choices' => array(
              'default' => 'Default',
              'scrollCarousel' => 'Scroll Carousel'
            ),
            'default_value' => 'default',
            'allow_null' => 0,
            'multiple' => 0,
          ),
          //carousel items
          array(
            'key' => 'field_liveCoverage_carousel_1',
            'label' => 'Carousel Items',
            'name' => 'carouselItems',
            'type' => 'repeater',
            'sub_fields' => array(
              //item type
              array(
                'key' => 'field_liveCoverage_carousel_1_1',
                'label' => 'Item Type',
                'name' => 'itemType',
                'type' => 'select',
                'choices' => array(
                  'image' => 'Image',
                  'video' => 'Video'
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
              ),
              //image group
              array(
                'key' => 'field_liveCoverage_carousel_1_2',
                'label' => 'Image',
                'name' => 'imageGroup',
                'type' => 'group',
                'sub_fields' => array(
                  //image source
                  array(
                    'key' => 'field_liveCoverage_carousel_1_2_1',
                    'label' => 'Image Source',
                    'name' => 'image_src',
                    'type' => 'image',
                    'column_width' => '50%',
                    'save_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all'
                  ),
                  //image alt
                  array(
                    'key' => 'field_liveCoverage_carousel_1_2_2',
                    'label' => 'Image Alt',
                    'name' => 'image_alt',
                    'type' => 'textarea',
                    'column_width' => '50%',
                    'formatting' => 'html',
                    'new_lines' => 'br'
                  )
                ),
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_carousel_1_1',
                      'operator' => '==',
                      'value' => 'image',
                    ),
                  ),
                )
              ),
              //video group
              array(
                'key' => 'field_liveCoverage_carousel_1_3',
                'label' => 'Video',
                'name' => 'videoGroup',
                'type' => 'group',
                'sub_fields' => array(
                  //video type
                  array(
                    'key' => 'field_liveCoverage_carousel_1_3_1',
                    'label' => 'Video Type',
                    'name' => 'videoType',
                    'type' => 'select',
                    'column_width' => '50%',
                    'choices' => array(
                      'hosted' => 'Hosted',
                      'embeded' => 'Embeded'
                    ),
                    'default_value' => '',
                    'allow_null' => 0,
                    'multiple' => 0
                  ),
                  //video source
                  array(
                    'key' => 'field_liveCoverage_carousel_1_3_2',
                    'label' => 'Video Source',
                    'name' => 'videoSource',
                    'type' => 'file',
                    'column_width' => '25%',
                    'save_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'instructions' => "",
                    'conditional_logic' => array(
                      array(
                        array(
                          'field' => 'field_liveCoverage_carousel_1_3_1',
                          'operator' => '==',
                          'value' => 'hosted',
                        )
                      ),
                    )
                  ),
                  //image source
                  array(
                    'key' => 'field_liveCoverage_carousel_1_3_3',
                    'label' => 'Thumbnail Source',
                    'name' => 'thumbnailSource',
                    'type' => 'image',
                    'column_width' => '25%',
                    'save_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'conditional_logic' => array(
                      array(
                        array(
                          'field' => 'field_liveCoverage_carousel_1_3_1',
                          'operator' => '==',
                          'value' => 'hosted',
                        )
                      ),
                    )
                  ),
                  //embed url
                  array(
                    'key' => 'field_liveCoverage_carousel_1_3_4',
                    'label' => 'Embed URL',
                    'name' => 'embedURL',
                    'type' => 'textarea',
                    'column_width' => '50%',
                    'formatting' => 'html',
                    'new_lines' => 'br',
                    'conditional_logic' => array(
                      array(
                        array(
                          'field' => 'field_liveCoverage_carousel_1_3_1',
                          'operator' => '==',
                          'value' => 'embeded',
                        )
                      ),
                    )
                  ),
                ),
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'field_liveCoverage_carousel_1_1',
                      'operator' => '==',
                      'value' => 'video',
                    ),
                  ),
                )
              ),
            ),
            'row_min' => '',
            'row_limit' => '',
            'layout' => 'block',
            'button_label' => 'Add Carousel Item'
          ),
        )
      ),
      //hero
      array(
        'label' => 'Hero Banner',
        'name' => 'heroBanner',
        'display' => 'row',
        'sub_fields' => array(
          //hide section
          array(
            'key' => 'field_liveCoverage_heroBanner_hide',
            'label' => 'Hide Section?',
            'name' => 'hide',
            'type' => 'true_false',
            'column_width' => '100%',
            'default_value' => 0
          ),
          //Heading
          array(
            'key' => 'field_liveCoverage_heroBanner_1',
            'label' => 'Heading',
            'name' => 'heading',
            'type' => 'textarea',
            'column_width' => '50%',
            'formatting' => 'html',
            'new_lines' => 'br'
          ),
          //background image
          array(
            'key' => 'field_liveCoverage_heroBanner_2',
            'label' => 'Background Image',
            'name' => 'backgroundImage',
            'type' => 'image',
            'column_width' => '50%',
            'save_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all'
          )
        )
      ),
      //spacer
      getSpacer('$module_name'),
      //usp cards
      array(
        'label' => 'USP Cards',
        'name' => 'uspCards',
        'display' => 'row',
        'sub_fields' => array(
          //hide section
          array(
            'key' => 'field_liveCoverage_uspCards_hide',
            'label' => 'Hide Section?',
            'name' => 'hide',
            'type' => 'true_false',
            'column_width' => '100%',
            'default_value' => 0
          ),
          array(
            'key' => 'field_liveCoverage_uspCards_1',
            'label' => 'USP Card Items',
            'name' => 'uspCardItems',
            'type' => 'repeater',
            'sub_fields' => array(
              //Heading
              array(
                'key' => 'field_liveCoverage_uspCards_1_1',
                'label' => 'Heading',
                'name' => 'heading',
                'type' => 'textarea',
                'column_width' => '50%',
                'formatting' => 'html',
                'new_lines' => 'br'
              ),
              //Body
              array(
                'key' => 'field_liveCoverage_uspCards_1_2',
                'label' => 'Body',
                'name' => 'body',
                'type' => 'textarea',
                'column_width' => '50%',
                'formatting' => 'html',
                'new_lines' => 'br'
              )
            ),
            'row_min' => '',
            'row_limit' => '',
            'layout' => 'block',
            'button_label' => 'Add USP Card Item'
          )
        )
      ),
    )
  );
  return $module;
}
