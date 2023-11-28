<?php
function get_live_coverage_single_details_group($builder_key) {
  if (!$builder_key) {
    return;
  }

  $field_key = 'field_live_coverage_single_details_group_' . $builder_key . '_';
  $module_key = 'field_liveCoverage_details';
  $module_label = 'Live Coverage Details';
  $module_name = 'live_coverage_details';
  $module = array(
    'key' => $module_key,
    'label' => $module_label,
    'name' => $module_name,
    'type' => 'group',
    'sub_fields' => (
      //read time
      array(
        'key' => $field_key . '0',
        'label' => 'Read Time',
        'name' => 'readingTime',
        'type' => 'number',
        'column_width' => '33%',
        'default_value' => 5,
        'formatting' => 'html',
        'append' => 'mins'
      ),
      //is featured
      array(
        'key' => $field_key . '1',
        'label' => 'Is Featured Article?',
        'name' => 'isFeatured',
        'type' => 'true_false',
        'column_width' => '34%',
        'default_value' => 0
      ),
      //Author
      array(
        'key' => $field_key . '2',
        'label' => 'Author',
        'name' => 'author',
        'type' => 'text',
        'column_width' => '33%',
        'formatting' => 'html'
      ),
      //share link - twitter
      array(
        'key' => $field_key . '3',
        'label' => 'Share Link - Twitter',
        'name' => 'shareLinkTwitter',
        'type' => 'text',
        'column_width' => '50%',
        'formatting' => 'html',
        'instructions' => "Follow this link to generate share links: <a href='https://corp.inntopia.com/tools/social-share-link-generator/'>https://corp.inntopia.com/tools/social-share-link-generator/</a>"
      ),
      //share link - facebook
      array(
        'key' => $field_key . '4',
        'label' => 'Share Link - Facebook',
        'name' => 'shareLinkFacebook',
        'type' => 'text',
        'column_width' => '50%',
        'formatting' => 'html',
        'instructions' => "Follow this link to generate share links: <a href='https://corp.inntopia.com/tools/social-share-link-generator/'>https://corp.inntopia.com/tools/social-share-link-generator/</a>"
      ),
    )
  );
  return $module;
}