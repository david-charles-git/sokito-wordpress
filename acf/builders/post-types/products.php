<?php
if (!defined('ABSPATH')) {
  exit;
}

if (function_exists("register_field_group")) {
  $layout = array(
    //instruction
    array(
      'key' => 'product-instruction',
      'label' => 'Instruction',
      'name' => 'instruction',
      'type' => 'message',
      'column_width' => '100%',
      'message' => 'some message here',
    ),
    array(
      'key' => 'field_product_backOrder',
      'label' => 'Back Order Info',
      'name' => 'backOrderInfo',
      'type' => 'repeater',
      'sub_fields' => array(
        //Variation ID
        array(
          'key' => 'field_product_backOrder_1',
          'label' => 'Variation ID',
          'name' => 'variationID',
          'type' => 'number',
          'column_width' => '33%',
          'formatting' => 'html'
        ),

        //Size
        array(
          'key' => 'field_product_backOrder_2',
          'label' => 'Size',
          'name' => 'size',
          'type' => 'number',
          'column_width' => '34%',
          'formatting' => 'html'
        ),

        //Back Order Limit
        array(
          'key' => 'field_product_backOrder_3',
          'label' => 'Back Order Limit',
          'name' => 'backOrderLimit',
          'type' => 'number',
          'column_width' => '33%',
          'formatting' => 'html'
        ),

        //Shipping Date Range - start
        array(
          'key' => 'field_product_backOrder_4',
          'label' => 'Shipping Date Range - start',
          'name' => 'shippingDateRangeStart',
          'type' => 'date_picker',
          'column_width' => '50%',
          'formatting' => 'html'
        ),

        //Shipping Date Range - end
        array(
          'key' => 'field_product_backOrder_5',
          'label' => 'Shipping Date Range - end',
          'name' => 'shippingDateRangeEnd',
          'type' => 'date_picker',
          'column_width' => '50%',
          'formatting' => 'html'
        ),
      ),
      'row_min' => '',
      'row_limit' => '',
      'layout' => 'block',
      'button_label' => 'Add BackOrder Item'
    ),
  )

  register_field_group(
    array(
      'id' => 'acf_product_pageBuilder',
      'title' => 'Product - Page Builder',
      'fields' => array(
        array(
          'key' =>  "product-group",
          'label' => 'Product Group',
          'name' => 'productGroup',
          'type' => 'group',
          'layout' => 'block',
          'sub_fields' => $layout
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'product'
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
