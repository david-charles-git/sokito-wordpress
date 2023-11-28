<?php
if (!defined('ABSPATH')) {
  exit;
}

if (function_exists("register_field_group")) {
  /* Pages Page Builder */
  $liveCoverageTaxonomyList = [
    "all" => "All",
    "ambassador" => "Ambassador",
    "events" => "Events",
    "product" => "Product",
    "review" => "Review",
    "sustainability" => "Sustainability"
  ];

  $layout_liveCoverageHubGroup = array(
    'key' =>  "liveCoverageHub-group",
    'label' => 'Live Coverage Hub Group',
    'name' => 'liveCoverageHubGroup',
    'type' => 'group',
    'layout' => 'block',
    'sub_fields' => array(
      //Hero Banner Heading
      array(
        'key' => 'liveCoverageHub-group-1',
        'label' => 'Hero Banner - Heading',
        'name' => 'heroBanner_heading',
        'type' => 'textarea',
        'column_width' => '25%',
        'formatting' => 'html',
        'new_lines' => 'br'
      ),
      //Hero Banner Background Image
      array(
        'key' => 'liveCoverageHub-group-2',
        'label' => 'Hero Banner - Background Image',
        'name' => 'heroBanner_backgroundImage',
        'type' => 'image',
        'column_width' => '25%',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all'
      ),
      //Hero Banner Main Image
      array(
        'key' => 'liveCoverageHub-group-3',
        'label' => 'Hero Banner - Main Image',
        'name' => 'heroBanner_mainImage',
        'type' => 'image',
        'column_width' => '25%',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all'
      ),
      //Hero Banner Post
      array(
        'key' => 'liveCoverageHub-group-4',
        'label' => 'Hero Banner - Post',
        'name' => 'heroBanner_postID',
        'type' => 'post_object',
        'post_type' => 'live-coverage',
        'taxonomy' => '',
        'allow_null' => 0,
        'multiple' => 0,
        'column_width' => '25%',
        'return_format' => 'id'
      ),
      //Taxonomy Navigation Background Image
      array(
        'key' => 'liveCoverageHub-group-5',
        'label' => 'Taxonomy Navigation - Background Image',
        'name' => 'taxonomyNavigation_backgroundImage',
        'type' => 'image',
        'column_width' => '50%',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all'
      ),
      //Taxonomy Navigation Taxonomy
      array(
        'key' => 'liveCoverageHub-group-6',
        'label' => 'Taxonomy Navigation - Taxonomy',
        'name' => 'taxonomyNavigation_taxonomy',
        'type' => 'select',
        'column_width' => '50%',
        'choices' => array(
          'articleType' => 'Article Type',
        ),
        'default_value' => 'articleType',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      //Trending Article Post ID
      array(
        'key' => 'liveCoverageHub-group-7',
        'label' => 'Trending Article - Post',
        'name' => 'trendingArticle_postID',
        'type' => 'post_object',
        'post_type' => 'live-coverage',
        'taxonomy' => '',
        'allow_null' => 0,
        'multiple' => 0,
        'column_width' => '100%',
        'return_format' => 'id'
      ),
      //Featured Articles Max Posts
      array(
        'key' => 'liveCoverageHub-group-8',
        'label' => 'Featured Articles - Max Posts',
        'name' => 'featuredArticles_maxPosts',
        'type' => 'number',
        'column_width' => '25%',
        'default_value' => 4,
        'formatting' => 'html'
      ),
      //Related Articles Max Posts
      array(
        'key' => 'liveCoverageHub-group-9',
        'label' => 'Related Articles - Max Posts',
        'name' => 'relatedArticles_maxPosts',
        'type' => 'number',
        'column_width' => '25%',
        'default_value' => 4,
        'formatting' => 'html'
      ),
      //More Articles Initial Posts
      array(
        'key' => 'liveCoverageHub-group-10',
        'label' => 'More Articles - Initial Posts',
        'name' => 'moreArticles_initialPosts',
        'type' => 'number',
        'column_width' => '25%',
        'default_value' => 6,
        'formatting' => 'html'
      ),
      //More Articles Posts Per Page
      array(
        'key' => 'liveCoverageHub-group-11',
        'label' => 'More Articles - Posts Per Page',
        'name' => 'moreArticles_postsPerPage',
        'type' => 'number',
        'column_width' => '25%',
        'default_value' => 6,
        'formatting' => 'html'
      ),
    )
  );
  $layout_liveCoverageSingleGroup = array(
    'key' =>  "liveCoverageSingle-group",
    'label' => 'Live Coverage Single Group',
    'name' => 'liveCoverageSingleGroup',
    'type' => 'group',
    'layout' => 'block',
    'sub_fields' => array(
      //Article Type
      array(
        'key' => 'liveCoverageSingle-group-1',
        'label' => 'Article Type',
        'name' => 'artcleType',
        'type' => 'select',
        'choices' => array(
          "ambassador" => "Ambassador",
          "events" => "Events",
          "product" => "Product",
          "review" => "Review",
          "sustainability" => "Sustainability"
        ),
        'default_value' => '',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      //Hero Banner Background Image
      array(
        'key' => 'liveCoverageSingle-group-2',
        'label' => 'Hero Banner - Background Image',
        'name' => 'heroBanner_backgroundImage',
        'type' => 'image',
        'column_width' => '100%',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all'
      ),
      //Featured Articles Max Posts
      array(
        'key' => 'liveCoverageSingle-group-3',
        'label' => 'Featured Articles - Max Posts',
        'name' => 'featuredArticles_maxPosts',
        'type' => 'number',
        'column_width' => '25%',
        'default_value' => 4,
        'formatting' => 'html'
      ),
      //Related Articles Max Posts
      array(
        'key' => 'liveCoverageSingle-group-4',
        'label' => 'Related Articles - Max Posts',
        'name' => 'relatedArticles_maxPosts',
        'type' => 'number',
        'column_width' => '25%',
        'default_value' => 4,
        'formatting' => 'html'
      ),
      //More Articles Initial Posts
      array(
        'key' => 'liveCoverageSingle-group-5',
        'label' => 'More Articles - Initial Posts',
        'name' => 'moreArticles_initialPosts',
        'type' => 'number',
        'column_width' => '25%',
        'default_value' => 6,
        'formatting' => 'html'
      ),
      //More Articles Posts Per Page
      array(
        'key' => 'liveCoverageSingle-group-6',
        'label' => 'More Articles - Posts Per Page',
        'name' => 'moreArticles_postsPerPage',
        'type' => 'number',
        'column_width' => '25%',
        'default_value' => 6,
        'formatting' => 'html'
      )
    )
  );
  $layout_homePageGroup = array(
    'key' =>  "homePage-group",
    'label' => 'Home Page Group',
    'name' => 'homePageGroup',
    'type' => 'group',
    'layout' => 'block',
    'sub_fields' => array()
  );
  $layout_pageBuilderGroup = array(
    'key' =>  "pageBuilder-group",
    'label' => 'Page builder Group',
    'name' => 'pageBuilderGroup',
    'type' => 'group',
    'layout' => 'block',
    'sub_fields' => array(
      array(
        'key' => 'pageBuilder-group-pageBuilder',
        'label' => 'Page Builder',
        'name' => 'pageBuilder',
        'type' => 'flexible_content',
        'layouts' => array(
          //Spacer
          array(
            'label' => 'Spacer',
            'name' => 'spacer',
            'display' => 'row',
            'min' => '',
            'max' => '',
            'sub_fields' => array(
              //hide section
              array(
                'key' => 'spacer-hide',
                'label' => 'Hide Section?',
                'name' => 'hide',
                'type' => 'true_false',
                'column_width' => '100%',
                'default_value' => 0
              ),
              //desktop height
              array(
                'key' => 'spacer-desktop-height',
                'label' => 'Height - Desktop',
                'name' => 'desktopHeight',
                'type' => 'number',
                'column_width' => '25%',
                'default_value' => 50,
                'formatting' => 'html',
                'append' => 'px'
              ),
              //mobile height
              array(
                'key' => 'spacer-mobile-height',
                'label' => 'Height - Mobile',
                'name' => 'mobileHeight',
                'type' => 'number',
                'column_width' => '25%',
                'default_value' => 30,
                'formatting' => 'html',
                'append' => 'px'
              ),
            )
          ),
          //Two Column
          array(
            'label' => 'Two Column',
            'name' => 'twoColumn',
            'display' => 'block',
            'min' => '',
            'max' => '',
            'sub_fields' => array(
              //instruction
              array(
                'key' => 'twoColumn-instruction',
                'label' => 'Instruction',
                'name' => 'instruction',
                'type' => 'message',
                'column_width' => '100%',
                'message' => 'This module allows for a left and right column. On mobile the left column stacks on top of the right column. There are a range of options that can be used for each column: text, image, video, list, or none. If you want to add some custom text to any of the text fields you can wrap it in a span tag with classes of: "clrWhite", "clrBlack", "clrOrange", "strokeText". The color classes will change the color and the strokeText class will transform the wrapped text into stroke text. An example would be &lt;span class="clrWhite strokeText"> stroke text&lt;/span>. <b>IMPORTANT: remember to include the closing span tag.</b>',
              ),
              //hide section
              array(
                'key' => 'twoColumn-hide',
                'label' => 'Hide Section?',
                'name' => 'hide',
                'type' => 'true_false',
                'column_width' => '100%',
                'default_value' => 0
              ),
              //Background Image source
              array(
                'key' => 'twoColumn-backgroundImage-source',
                'label' => 'Background Image - Source',
                'name' => 'backgroundImage_source',
                'type' => 'image',
                'column_width' => '50%',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all'
              ),
              //Background Color
              array(
                'key' => 'twoColumn-background-color',
                'label' => 'Background Color',
                'name' => 'backgroundColor',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              ),
              //Left Column Type
              array(
                'key' => 'twoColumn-left-column-type',
                'label' => 'Left Column type',
                'name' => 'leftColumnType',
                'type' => 'select',
                'column_width' => '50%',
                'choices' => array(
                  'text' => 'Text',
                  'image' => 'Image',
                  'video' => 'Video',
                  'list' => 'List',
                  'none' => 'None'
                ),
                'default_value' => 'text',
                'allow_null' => 0,
                'multiple' => 0,
              ),
              //Left Column Text
              array(
                'key' =>  "twoColumn-left-text-group",
                'label' => 'Left Column Text',
                'name' => 'leftColumnTextGroup',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                  //Title
                  array(
                    'key' => 'twoColumn-left-text-group-title',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                  //Content
                  array(
                    'key' => 'twoColumn-left-text-group-content',
                    'label' => 'Content',
                    'name' => 'content',
                    'type' => 'textarea',
                    'column_width' => '50%',
                    'formatting' => 'html',
                    'new_lines' => 'br'
                  ),
                  //CTA Text
                  array(
                    'key' => 'twoColumn-left-text-group-cta-text',
                    'label' => 'CTA Text',
                    'name' => 'ctaText',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                  //CTA Link
                  array(
                    'key' => 'twoColumn-left-text-group-cta-link',
                    'label' => 'CTA Link',
                    'name' => 'ctaLink',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                ),
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'twoColumn-left-column-type',
                      'operator' => '==',
                      'value' => 'text',
                    ),
                  ),
                )
              ),
              //Left Column Image
              array(
                'key' => 'twoColumn-left-image-group',
                'label' => 'Left Column Image',
                'name' => 'leftColumnImageGroup',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                  //Image Source
                  array(
                    'key' => 'twoColumn-left-image-group-source',
                    'label' => 'Image Source',
                    'name' => 'imageSource',
                    'type' => 'image',
                    'column_width' => '50%',
                    'save_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all'
                  ),
                  //Image Alt
                  array(
                    'key' => 'twoColumn-left-image-group-alt',
                    'label' => 'Image Alt',
                    'name' => 'imageAlt',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                ),
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'twoColumn-left-column-type',
                      'operator' => '==',
                      'value' => 'image',
                    ),
                  ),
                )
              ),
              //Left Column Video
              array(
                'key' => 'twoColumn-left-video-group',
                'label' => 'Left Column Video',
                'name' => 'leftColumnVideoGroup',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                  //Video Source
                  array(
                    'key' => 'twoColumn-left-video-group-source',
                    'label' => 'Video Source',
                    'name' => 'videoSource',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                  //Video Alt
                  array(
                    'key' => 'twoColumn-left-video-group-alt',
                    'label' => 'Video Alt',
                    'name' => 'videoAlt',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                  //Thumbnail Source
                  array(
                    'key' => 'twoColumn-left-thumbnail-group-source',
                    'label' => 'Thumbnail Source',
                    'name' => 'thumbnailSource',
                    'type' => 'image',
                    'column_width' => '50%',
                    'save_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all'
                  ),
                  //Thumbnail Alt
                  array(
                    'key' => 'twoColumn-left-thumbnail-group-alt',
                    'label' => 'Thumbnail Alt',
                    'name' => 'thumbnailAlt',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                ),
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'twoColumn-left-column-type',
                      'operator' => '==',
                      'value' => 'video',
                    ),
                  ),
                )
              ),
              //Left Column List
              array(
                'key' => 'twoColumn-left-list-group',
                'label' => 'Left Column List',
                'name' => 'leftColumnListGroup',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                  //List Items
                  array(
                    'key' => 'twoColumn-left-list-group-items',
                    'label' => 'List Items',
                    'name' => 'listItems',
                    'type' => 'repeater',
                    'column_width' => '100%',
                    'sub_fields' => array(
                      //Title
                      array(
                        'key' => 'twoColumn-left-list-group-item-title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'column_width' => '50%',
                        'formatting' => 'html'
                      ),
                      //Content
                      array(
                        'key' => 'twoColumn-left-list-group-item-content',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'textarea',
                        'column_width' => '50%',
                        'formatting' => 'html',
                        'new_lines' => 'br'
                      ),
                      //CTA Text
                      array(
                        'key' => 'twoColumn-left-list-group-item-cta-text',
                        'label' => 'CTA Text',
                        'name' => 'ctaText',
                        'type' => 'text',
                        'column_width' => '50%',
                        'formatting' => 'html'
                      ),
                      //CTA Link
                      array(
                        'key' => 'twoColumn-left-list-group-item-cta-link',
                        'label' => 'CTA Link',
                        'name' => 'ctaLink',
                        'type' => 'text',
                        'column_width' => '50%',
                        'formatting' => 'html'
                      ),
                    ),
                    'row_min' => '',
                    'row_limit' => '',
                    'layout' => 'block',
                    'button_label' => 'Add List Item'
                  ),
                ),
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'twoColumn-left-column-type',
                      'operator' => '==',
                      'value' => 'list',
                    ),
                  ),
                )
              ),
              //Right Column Type
              array(
                'key' => 'twoColumn-right-column-type',
                'label' => 'Right Column type',
                'name' => 'rightColumnType',
                'type' => 'select',
                'column_width' => '50%',
                'choices' => array(
                  'text' => 'Text',
                  'image' => 'Image',
                  'video' => 'Video',
                  'list' => 'List',
                  'none' => 'None'
                ),
                'default_value' => 'text',
                'allow_null' => 0,
                'multiple' => 0,
              ),
              //Right Column Text
              array(
                'key' =>  "twoColumn-right-text-group",
                'label' => 'Right Column Text',
                'name' => 'rightColumnTextGroup',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                  //Title
                  array(
                    'key' => 'twoColumn-right-text-group-title',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                  //Content
                  array(
                    'key' => 'twoColumn-right-text-group-content',
                    'label' => 'Content',
                    'name' => 'content',
                    'type' => 'textarea',
                    'column_width' => '50%',
                    'formatting' => 'html',
                    'new_lines' => 'br'
                  ),
                  //CTA Text
                  array(
                    'key' => 'twoColumn-right-text-group-cta-text',
                    'label' => 'CTA Text',
                    'name' => 'ctaText',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                  //CTA Link
                  array(
                    'key' => 'twoColumn-right-text-group-cta-link',
                    'label' => 'CTA Link',
                    'name' => 'ctaLink',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                ),
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'twoColumn-right-column-type',
                      'operator' => '==',
                      'value' => 'text',
                    ),
                  ),
                )
              ),
              //Right Column Image
              array(
                'key' => 'twoColumn-right-image-group',
                'label' => 'Right Column Image',
                'name' => 'rightColumnImageGroup',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                  //Image Source
                  array(
                    'key' => 'twoColumn-right-image-group-source',
                    'label' => 'Image Source',
                    'name' => 'imageSource',
                    'type' => 'image',
                    'column_width' => '50%',
                    'save_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all'
                  ),
                  //Image Alt
                  array(
                    'key' => 'twoColumn-right-image-group-alt',
                    'label' => 'Image Alt',
                    'name' => 'imageAlt',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                ),
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'twoColumn-right-column-type',
                      'operator' => '==',
                      'value' => 'image',
                    ),
                  ),
                )
              ),
              //Right Column Video
              array(
                'key' => 'twoColumn-right-video-group',
                'label' => 'Right Column Video',
                'name' => 'rightColumnVideoGroup',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                  //Video Source
                  array(
                    'key' => 'twoColumn-right-video-group-source',
                    'label' => 'Video Source',
                    'name' => 'videoSource',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                  //Video Alt
                  array(
                    'key' => 'twoColumn-right-video-group-alt',
                    'label' => 'Video Alt',
                    'name' => 'videoAlt',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                  //Thumbnail Source
                  array(
                    'key' => 'twoColumn-right-thumbnail-group-source',
                    'label' => 'Thumbnail Source',
                    'name' => 'thumbnailSource',
                    'type' => 'image',
                    'column_width' => '50%',
                    'save_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all'
                  ),
                  //Thumbnail Alt
                  array(
                    'key' => 'twoColumn-right-thumbnail-group-alt',
                    'label' => 'Thumbnail Alt',
                    'name' => 'thumbnailAlt',
                    'type' => 'text',
                    'column_width' => '50%',
                    'formatting' => 'html'
                  ),
                ),
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'twoColumn-right-column-type',
                      'operator' => '==',
                      'value' => 'video',
                    ),
                  ),
                )
              ),
              //Right Column List
              array(
                'key' => 'twoColumn-right-list-group',
                'label' => 'Right Column List',
                'name' => 'rightColumnListGroup',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                  //List Items
                  array(
                    'key' => 'twoColumn-right-list-group-items',
                    'label' => 'List Items',
                    'name' => 'listItems',
                    'type' => 'repeater',
                    'column_width' => '100%',
                    'sub_fields' => array(
                      //Title
                      array(
                        'key' => 'twoColumn-right-list-group-item-title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'column_width' => '50%',
                        'formatting' => 'html'
                      ),
                      //Content
                      array(
                        'key' => 'twoColumn-right-list-group-item-content',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'textarea',
                        'column_width' => '50%',
                        'formatting' => 'html',
                        'new_lines' => 'br'
                      ),
                      //CTA Text
                      array(
                        'key' => 'twoColumn-right-list-group-item-cta-text',
                        'label' => 'CTA Text',
                        'name' => 'ctaText',
                        'type' => 'text',
                        'column_width' => '50%',
                        'formatting' => 'html'
                      ),
                      //CTA Link
                      array(
                        'key' => 'twoColumn-right-list-group-item-cta-link',
                        'label' => 'CTA Link',
                        'name' => 'ctaLink',
                        'type' => 'text',
                        'column_width' => '50%',
                        'formatting' => 'html'
                      ),
                    ),
                    'row_min' => '',
                    'row_limit' => '',
                    'layout' => 'block',
                    'button_label' => 'Add List Item'
                  ),
                ),
                'conditional_logic' => array(
                  array(
                    array(
                      'field' => 'twoColumn-right-column-type',
                      'operator' => '==',
                      'value' => 'list',
                    ),
                  ),
                )
              ),
            ),
          ),
          //Text Banner -v1
          array(
            'label' => 'Text Banner - v1',
            'name' => 'textBanner_v1',
            'display' => 'block',
            'min' => '',
            'max' => '',
            'sub_fields' => array(
              //instruction
              array(
                'key' => 'textBanner_v1-instruction',
                'label' => 'Instruction',
                'name' => 'instruction',
                'type' => 'message',
                'column_width' => '100%',
                'message' => 'Instructions',
              ),
              //hide section
              array(
                'key' => 'textBanner_v1-hide',
                'label' => 'Hide Section?',
                'name' => 'hide',
                'type' => 'true_false',
                'column_width' => '100%',
                'default_value' => 0
              ),
              //Background Image source
              array(
                'key' => 'textBanner_v1-backgroundImage-source',
                'label' => 'Background Image - Source',
                'name' => 'backgroundImage_source',
                'type' => 'image',
                'column_width' => '50%',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all'
              ),
              //Background Color
              array(
                'key' => 'textBanner_v1-background-color',
                'label' => 'Background Color',
                'name' => 'backgroundColor',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              ),
              //Title
              array(
                'key' => 'textBanner_v1-title',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              ),
              //Content
              array(
                'key' => 'textBanner_v1-content',
                'label' => 'Content',
                'name' => 'content',
                'type' => 'textarea',
                'column_width' => '50%',
                'formatting' => 'html',
                'new_lines' => 'br'
              ),
              //CTA Text
              array(
                'key' => 'textBanner_v1-cta-text',
                'label' => 'CTA Text',
                'name' => 'ctaText',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              ),
              //CTA Link
              array(
                'key' => 'textBanner_v1-cta-link',
                'label' => 'CTA Link',
                'name' => 'ctaLink',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              ),
            )
          ),
          //Text Banner - v2
          array(
            'label' => 'Text Banner - v2',
            'name' => 'textBanner_v2',
            'display' => 'block',
            'min' => '',
            'max' => '',
            'sub_fields' => array(
              //instruction
              array(
                'key' => 'textBanner_v2-instruction',
                'label' => 'Instruction',
                'name' => 'instruction',
                'type' => 'message',
                'column_width' => '100%',
                'message' => 'Instructions',
              ),
              //hide section
              array(
                'key' => 'textBanner_v2-hide',
                'label' => 'Hide Section?',
                'name' => 'hide',
                'type' => 'true_false',
                'column_width' => '100%',
                'default_value' => 0
              ),
              //Background Image source
              array(
                'key' => 'textBanner_v2-backgroundImage-source',
                'label' => 'Background Image - Source',
                'name' => 'backgroundImage_source',
                'type' => 'image',
                'column_width' => '50%',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all'
              ),
              //Background Color
              array(
                'key' => 'textBanner_v2-background-color',
                'label' => 'Background Color',
                'name' => 'backgroundColor',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              ),
              //Title
              array(
                'key' => 'textBanner_v2-title',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              ),
              //CTA Text
              array(
                'key' => 'textBanner_v2-cta-text',
                'label' => 'CTA Text',
                'name' => 'ctaText',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              ),
              //CTA Link
              array(
                'key' => 'textBanner_v2-cta-link',
                'label' => 'CTA Link',
                'name' => 'ctaLink',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              ),
            )
          ),
          //Review Carousel - v1
          array(
            'label' => 'Review Carousel - V1',
            'name' => 'reviewCarousel_v1',
            'display' => 'block',
            'min' => '',
            'max' => '',
            'sub_fields' => array(
              //instruction
              array(
                'key' => 'reviewCarousel_v1-instruction',
                'label' => 'Instruction',
                'name' => 'instruction',
                'type' => 'message',
                'column_width' => '100%',
                'message' => 'Instructions',
              ),
              //Hide
              array(
                'key' => 'reviewCarousel_v1-hide',
                'label' => 'Hide Section?',
                'name' => 'hide',
                'type' => 'true_false',
                'column_width' => '100%',
                'default_value' => 0
              ),
              //background Color
              array(
                'key' => 'reviewCarousel_v1-background-color',
                'label' => 'Background Color',
                'name' => 'backgroundColor',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              ),
              //max post count
              array(
                'key' => 'reviewCarousel_v1-max-post-count',
                'label' => 'Max Post Count',
                'name' => 'maxPostCount',
                'type' => 'number',
                'column_width' => '50%',
                'default_value' => 10,
                'formatting' => 'html'
              ),
              //post taxonomy
              array(
                'key' => 'reviewCarousel_v1-post-taxonomy',
                'label' => 'Post Taxonomy',
                'name' => 'postTaxonomy',
                'type' => 'taxonomy',
                'column_width' => '50%',
                'taxonomy' => 'reviewerType',
                'field_type' => 'checkbox',
                'allow_null' => 0,
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'object',
                'multiple' => 1,
              ),
            )
          ),
          //Live Coverage Carousel - v1
          array(
            'label' => 'Live Coverage Carousel - V1',
            'name' => 'liveCoverageCarousel_v1',
            'display' => 'block',
            'min' => '',
            'max' => '',
            'sub_fields' => array(
              //instruction
              array(
                'key' => 'liveCoverageCarousel_v1-instruction',
                'label' => 'Instruction',
                'name' => 'instruction',
                'type' => 'message',
                'column_width' => '100%',
                'message' => 'Instructions',
              ),
              //Hide
              array(
                'key' => 'liveCoverageCarousel_v1-hide',
                'label' => 'Hide Section?',
                'name' => 'hide',
                'type' => 'true_false',
                'column_width' => '100%',
                'default_value' => 0
              ),
              //background Color
              array(
                'key' => 'liveCoverageCarousel_v1-background-color',
                'label' => 'Background Color',
                'name' => 'backgroundColor',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              ),
              //title
              array(
                'key' => 'liveCoverageCarousel_v1-title',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'column_width' => '50%',
                'formatting' => 'html'
              ),
              //max post count
              array(
                'key' => 'liveCoverageCarousel_v1-max-post-count',
                'label' => 'Max Post Count',
                'name' => 'maxPostCount',
                'type' => 'number',
                'column_width' => '50%',
                'default_value' => 10,
                'formatting' => 'html'
              ),
              //post taxonomy
              array(
                'key' => 'liveCoverageCarousel_v1-post-taxonomy',
                'label' => 'Post Taxonomy',
                'name' => 'postTaxonomy',
                'type' => 'taxonomy',
                'column_width' => '50%',
                'taxonomy' => 'articleType',
                'field_type' => 'select',
                'allow_null' => 0,
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'multiple' => 0,
              ),
            )
          ),
          //Image Carousel - v1
          array(
            'label' => 'Image Carousel - V1',
            'name' => 'imageCarousel_v1',
            'display' => 'block',
            'min' => '',
            'max' => '',
            'sub_fields' => array(
              //instruction
              array(
                'key' => 'imageCarousel_v1-instruction',
                'label' => 'Instruction',
                'name' => 'instruction',
                'type' => 'message',
                'column_width' => '100%',
                'message' => 'Instructions',
              ),
              //Hide
              array(
                'key' => 'imageCarousel_v1-hide',
                'label' => 'Hide Section?',
                'name' => 'hide',
                'type' => 'true_false',
                'column_width' => '100%',
                'default_value' => 0
              ),
              //carousel items
              array(
                'key' => 'imageCarousel_v1-carouselItems',
                'label' => 'Carousel Items',
                'name' => 'carouselItems',
                'type' => 'repeater',
                'sub_fields' => array(
                  //item type
                  array(
                    'key' => 'imageCarousel_v1-carouselItem-itemType',
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
                    'key' => 'imageCarousel_v1-carouselItem-imageGroup',
                    'label' => 'Image',
                    'name' => 'imageGroup',
                    'type' => 'group',
                    'sub_fields' => array(
                      //image source
                      array(
                        'key' => 'imageCarousel_v1-carouselItem-imageGroup-imageSource',
                        'label' => 'Image Source',
                        'name' => 'imageSource',
                        'type' => 'image',
                        'column_width' => '50%',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all'
                      ),
                      //image alt
                      array(
                        'key' => 'imageCarousel_v1-carouselItem-imageGroup-imageAlt',
                        'label' => 'Image Alt',
                        'name' => 'imageAlt',
                        'type' => 'textarea',
                        'column_width' => '50%',
                        'formatting' => 'html',
                        'new_lines' => 'br'
                      )
                    ),
                    'conditional_logic' => array(
                      array(
                        array(
                          'field' => 'imageCarousel_v1-carouselItem-itemType',
                          'operator' => '==',
                          'value' => 'image',
                        ),
                      ),
                    )
                  ),
                  //video group
                  array(
                    'key' => 'imageCarousel_v1-carouselItem-videoGroup',
                    'label' => 'Video',
                    'name' => 'videoGroup',
                    'type' => 'group',
                    'sub_fields' => array(
                      //video type
                      array(
                        'key' => 'imageCarousel_v1-carouselItem-videoGroup-videoType',
                        'label' => 'Video Type',
                        'name' => 'videoType',
                        'type' => 'select',
                        'column_width' => '50%',
                        'choices' => array(
                          'hosted' => 'Hosted',
                          'embedded' => 'Embedded'
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0
                      ),
                      //video source
                      array(
                        'key' => 'imageCarousel_v1-carouselItem-videoGroup-videoSource',
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
                              'field' => 'imageCarousel_v1-carouselItem-videoGroup-videoType',
                              'operator' => '==',
                              'value' => 'hosted',
                            )
                          ),
                        )
                      ),
                      //image source
                      array(
                        'key' => 'imageCarousel_v1-carouselItem-videoGroup-thumbnailSource',
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
                              'field' => 'imageCarousel_v1-carouselItem-videoGroup-videoType',
                              'operator' => '==',
                              'value' => 'hosted',
                            )
                          ),
                        )
                      ),
                      //embed url
                      array(
                        'key' => 'imageCarousel_v1-carouselItem-videoGroup-embedURL',
                        'label' => 'Embed URL',
                        'name' => 'embedURL',
                        'type' => 'textarea',
                        'column_width' => '50%',
                        'formatting' => 'html',
                        'new_lines' => 'br',
                        'conditional_logic' => array(
                          array(
                            array(
                              'field' => 'imageCarousel_v1-carouselItem-videoGroup-videoType',
                              'operator' => '==',
                              'value' => 'embedded',
                            )
                          ),
                        )
                      ),
                    ),
                    'conditional_logic' => array(
                      array(
                        array(
                          'field' => 'imageCarousel_v1-carouselItem-itemType',
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
          //Boot Materials - v1
          array(
            'label' => 'Boot Materials - v1',
            'name' => 'bootMaterials_v1',
            'display' => 'block',
            'min' => '',
            'max' => '',
            'sub_fields' => array(
              //instruction
              array(
                'key' => 'bootMaterials_v1-instruction',
                'label' => 'Instruction',
                'name' => 'instruction',
                'type' => 'message',
                'column_width' => '100%',
                'message' => 'Instructions',
              ),
            )
          ),
          //Boot Materials - v2
          array(
            'label' => 'Boot Materials - v2',
            'name' => 'bootMaterials_v2',
            'display' => 'block',
            'min' => '',
            'max' => '',
            'sub_fields' => array(
              //instruction
              array(
                'key' => 'bootMaterials_v2 -instruction',
                'label' => 'Instruction',
                'name' => 'instruction',
                'type' => 'message',
                'column_width' => '100%',
                'message' => 'Instructions',
              ),
            )
          ),
        )
      )
    )
  );
  $layout_productResultsGroup = array(
    'key' =>  "productResults-group",
    'label' => 'Product reviews Group',
    'name' => 'productResultsGroup',
    'type' => 'group',
    'layout' => 'block',
    'sub_fields' => array(
      //Hero Banner Image 
      array(
        'key' => 'productResults-group-heroBannerImage',
        'label' => 'Hero Banner Image',
        'name' => 'heroBannerImage',
        'type' => 'image',
        'column_width' => '33%',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all'
      ),

      //Hero Banner Title
      array(
        'key' => 'productResults-group-heroBannerTitle',
        'label' => 'Hero Banner Title',
        'name' => 'heroBannerTitle',
        'type' => 'text',
        'column_width' => '33%',
        'formatting' => 'html'
      ),

      //Hero Banner Content
      array(
        'key' => 'productResults-group-heroBannerContent',
        'label' => 'Hero Banner Content',
        'name' => 'heroBannerContent',
        'type' => 'textarea',
        'column_width' => '34%',
        'formatting' => 'html',
        'new_lines' => 'br'
      ),

      //USP Banner Title
      array(
        'key' => 'productResults-group-USPBannerTitle',
        'label' => 'USP Banner Title',
        'name' => 'USPBannerTitle',
        'type' => 'text',
        'column_width' => '50%',
        'formatting' => 'html'
      ),

      //USP Banner Content
      array(
        'key' => 'productResults-group-USPBannerContent',
        'label' => 'USP Banner Content',
        'name' => 'USPBannerContent',
        'type' => 'textarea',
        'column_width' => '50%',
        'formatting' => 'html',
        'new_lines' => 'br'
      ),

      //Feed Initial Count
      array(
        'key' => 'productResults-group-feedInitialCount',
        'label' => 'Feed Initial Count',
        'name' => 'feedInitialCount',
        'type' => 'number',
        'column_width' => '100%',
        'default_value' => 10,
        'formatting' => 'html'
      ),
    )
  );

  $layout = array(
    //carousel
    array(
      'label' => 'Carousel',
      'name' => 'carousel',
      'display' => 'row',
      'min' => '',
      'max' => '',
      'sub_fields' => array(
        //hide section
        array(
          'key' => 'field_page_carousel_hide',
          'label' => 'Hide Section?',
          'name' => 'hide',
          'type' => 'true_false',
          'column_width' => '100%',
          'default_value' => 0
        ),
        //Heading
        array(
          'key' => 'field_page_carousel_heading',
          'label' => 'Carousel - Heading',
          'name' => 'heading',
          'type' => 'textarea',
          'column_width' => '33%',
          'formatting' => 'html',
          'new_lines' => 'br'
        ),
        //carousel type
        array(
          'key' => 'field_page_carousel_0',
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
          'column_width' => '34%',
        ),
        //carousel generated from
        array(
          'key' => 'field_page_carousel_1',
          'label' => 'Carousel Generated From',
          'name' => 'carouselGeneration',
          'type' => 'select',
          'choices' => array(
            'custom' => 'Custom',
            'liveCoverage' => 'Live Coverage'
          ),
          'default_value' => 'custom',
          'allow_null' => 0,
          'multiple' => 0,
          'column_width' => '33%',
        ),
        // max number of carousel items
        array(
          'key' => 'field_page_carousel_2',
          'label' => 'Max Number of Carousel Items',
          'name' => 'maxNumberOfItems',
          'type' => 'number',
          'column_width' => '33%',
          'default_value' => 5,
          'formatting' => 'html',
          'conditional_logic' => array(
            array(
              array(
                'field' => 'field_page_carousel_1',
                'operator' => '!=',
                'value' => 'custom',
              ),
            ),
          )
        ),
        /* Live Coverage - start */
        //carousel taxonomies
        array(
          'key' => 'field_page_carousel_3',
          'label' => 'Carousel Taxonomies',
          'name' => 'carouselTaxonomies_liveCoverage',
          'type' => 'select',
          'choices' => $liveCoverageTaxonomyList,
          'default_value' => 'default',
          'column_width' => '34%',
          'allow_null' => 0,
          'multiple' => 0,
          'conditional_logic' => array(
            array(
              array(
                'field' => 'field_page_carousel_1',
                'operator' => '==',
                'value' => 'liveCoverage',
              ),
            ),
          ),

        ),
        //restrict to featured
        array(
          'key' => 'field_page_carousel_4',
          'label' => 'Restrict to Featured?',
          'name' => 'restirctToFeatured_liveCoverage',
          'type' => 'true_false',
          'column_width' => '33%',
          'default_value' => 0,
          'conditional_logic' => array(
            array(
              array(
                'field' => 'field_page_carousel_1',
                'operator' => '==',
                'value' => 'liveCoverage',
              ),
            ),
          )
        ),
        /* Live Coverage - end */
        //carousel items
        array(
          'key' => 'field_page_carousel_5',
          'label' => 'Carousel Items',
          'name' => 'carouselItems',
          'type' => 'repeater',
          'sub_fields' => array(
            //item type
            array(
              'key' => 'field_page_carousel_5_1',
              'label' => 'Item Type',
              'name' => 'itemType',
              'type' => 'select',
              'choices' => array(),
              'default_value' => '',
              'allow_null' => 0,
              'multiple' => 0,
            ),
          ),
          'row_min' => '',
          'row_limit' => '',
          'layout' => 'block',
          'button_label' => 'Add Carousel Item',
          'conditional_logic' => array(
            array(
              array(
                'field' => 'field_page_carousel_1',
                'operator' => '==',
                'value' => 'custom',
              ),
            ),
          )
        ),
      )
    ),
    $layout_liveCoverageHubGroup,
    //Live Coverage Single Group
    $layout_liveCoverageSingleGroup,
    //Home Page Group
    $layout_homePageGroup,
    //Page Builder Group
    $layout_pageBuilderGroup,
    //Product Results Group
    $layout_productResultsGroup,
  );

  register_field_group(
    array(
      'id' => 'acf_page_pageBuilder',
      'title' => 'Page - Page Builder',
      'fields' => array(
        //page builder
        array(
          'key' => 'field_pages',
          'label' => 'Page Builder',
          'name' => 'page_layouts',
          'type' => 'flexible_content',
          'layouts' => $layout
        )
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'page'
          )
        )
      ),
      'options' => array(
        'position' => 'normal',
        'layout' => 'no_box',
        'hide_on_screen' => array()
      ),
      'menu_order' => 0
    )
  );
}
