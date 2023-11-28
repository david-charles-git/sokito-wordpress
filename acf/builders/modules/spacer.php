<?php
function getSpacer($builder_key)
{
  if (!$builder_key) {
    return;
  }

  $field_key = 'field_spacer_' . $builder_key . '_';
  $module_label = 'Spacer';
  $module_name = 'spacer';
  $module = array(
    'label' => $module_label,
    'name' => $module_name,
    'display' => 'row',
    'sub_fields' => array(
      //hide section
      array(
        'key' => $field_key . '0',
        'label' => 'Hide Section?',
        'name' => 'hide',
        'type' => 'true_false',
        'column_width' => '20%',
        'default_value' => 0
      ),
      //max height
      array(
        'key' => $field_key . '1',
        'label' => 'Min height',
        'name' => 'min_height',
        'type' => 'number',
        'column_width' => '40%',
        'default_value' => 50,
        'formatting' => 'html',
        'append' => 'px'
      ),
      //min height
      array(
        'key' => $field_key . '2',
        'label' => 'Max height',
        'name' => 'max_height',
        'type' => 'number',
        'column_width' => '40%',
        'default_value' => 30,
        'formatting' => 'html',
        'append' => 'px'
      ),
    )
  );
  return $module;
}
