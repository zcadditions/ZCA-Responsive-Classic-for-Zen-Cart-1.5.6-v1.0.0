<?php
/**
 * also_purchased_products.php
 * 
 * zca_diy_tpl 1.0.0 
 *
 * @package modules
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version ZCA/GIT: $Id: rbarbour (zcadditions.com) New for v1.5.6 $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

if ( $detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'full' || $detect->isTablet() && $_SESSION['layoutType'] == 'full' || $_SESSION['layoutType'] == 'full' ){
$col_per_row = SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS;
} else if ( $detect->isMobile() && !$detect->isTablet() || $_SESSION['layoutType'] == 'mobile' ) {
$col_per_row = SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS_MOBILE;
} else if ( $detect->isTablet() || $_SESSION['layoutType'] == 'tablet'){
$col_per_row = SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS_TABLET;
} else {
$col_per_row = SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS;
}

if (isset($_GET['products_id']) && $col_per_row > 0 && MIN_DISPLAY_ALSO_PURCHASED > 0) {

  $also_purchased_products = $db->ExecuteRandomMulti(sprintf(SQL_ALSO_PURCHASED, (int)$_GET['products_id'], (int)$_GET['products_id']), MAX_DISPLAY_ALSO_PURCHASED);

  $num_products_ordered = $also_purchased_products->RecordCount();

  $row = 0;
  $col = 0;
  $list_box_contents = array();
  $title = '';

  // show only when 1 or more and equal to or greater than minimum set in admin
  if ($num_products_ordered >= MIN_DISPLAY_ALSO_PURCHASED && $num_products_ordered > 0) {
    if ($num_products_ordered < $col_per_row) {
      $col_width = floor(100/$num_products_ordered);
    } else {
      $col_width = floor(100/$col_per_row);
    }

    while (!$also_purchased_products->EOF) {
      $also_purchased_products->fields['products_name'] = zen_get_products_name($also_purchased_products->fields['products_id']);

/** bof products link */
    $also_purchased_products_link = zen_href_link(zen_get_info_page($also_purchased_products->fields['products_id']), 'cPath=' . $productsInCategory[$also_purchased_products->fields['products_id']] . '&products_id=' . $also_purchased_products->fields['products_id']);
/** eof products link */

/** bof products price */
    $also_purchased_products_price = '<div id="centerBoxContent-price-'.$also_purchased_products->fields['products_id'].'" class="centerBoxContent-price">';
    $also_purchased_products_price .= zen_get_products_display_price($also_purchased_products->fields['products_id']);
    $also_purchased_products_price .= '</div>';    
/** eof products price */

/** bof products name */
    $also_purchased_products_name = '<div id="centerBoxContent-name-'.$also_purchased_products->fields['products_id'].'" class="centerBoxContent-name">';
    $also_purchased_products_name .= '<a href="' . $also_purchased_products_link . '">' . zen_get_products_name($also_purchased_products->fields['products_id']) . '</a>';
    $also_purchased_products_name .= '</div>';    
/** eof products name */

/** bof products image */
if ($featured_products->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) {
    $also_purchased_products_image = '';
} else {
    $also_purchased_products_image = '<div id="centerBoxContent-image-'.$also_purchased_products->fields['products_id'].'" class="centerBoxContent-image">'; 
    $also_purchased_products_image .= '<a href="' . $also_purchased_products_link . '">' . zen_image(DIR_WS_IMAGES . $also_purchased_products->fields['products_image'], $also_purchased_products->fields['products_name'], IMAGE_PRODUCT_NEW_WIDTH, IMAGE_PRODUCT_NEW_HEIGHT) . '</a>';
    $also_purchased_products_image .= '</div>';     
}
/** eof products image */

/** bof products add to cart/info buttons */  
    $also_purchased_products_buttons = '<div class="btn-row content-align-center">';
if ($also_purchased_products->fields['product_is_call'] == '1' or zen_has_product_attributes($also_purchased_products->fields['products_id'])) {
    $also_purchased_products_buttons .= '<a href="' . $also_purchased_products_link . '" role="button">' . PRODUCT_MORE_INFO_TEXT . '</a>';
} else {
    $also_purchased_products_buttons .= '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $also_purchased_products->fields['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_BUY_NOW, BUTTON_BUY_NOW_ALT) . '</a>';
    $also_purchased_products_buttons .= '<a href="' . $also_purchased_products_link . '" role="button">' . PRODUCT_MORE_INFO_TEXT . '</a>';    
}  
    $also_purchased_products_buttons .= '</div>';
/** eof products add to cart/info buttons */

      $list_box_contents[$row][$col] = array('params' => 'class="centerBoxContentsAlsoPurch centeredContent columns' . $col_per_row . '"',

    'text' => $also_purchased_products_image . $also_purchased_products_name . $also_purchased_products_price . $also_purchased_products_buttons);

      $col ++;
      if ($col > ($col_per_row - 1)) {
        $col = 0;
        $row ++;
      }
      $also_purchased_products->MoveNextRandom();
    }
  }
  if ($also_purchased_products->RecordCount() > 0 && $also_purchased_products->RecordCount() >= MIN_DISPLAY_ALSO_PURCHASED) {
    $title = '<h2 class="centerBoxHeading pad-2">' . TEXT_ALSO_PURCHASED_PRODUCTS . '</h2>';
    $zc_show_also_purchased = true;
  }
}
