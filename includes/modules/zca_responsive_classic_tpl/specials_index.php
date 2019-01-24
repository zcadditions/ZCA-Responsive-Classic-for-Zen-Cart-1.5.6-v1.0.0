<?php
/**
 * specials_index module
 * 
 * zca_diy_tpl 1.0.0 
 *
 * @package modules
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version ZCA/GIT: $Id: rbarbour (zcadditions.com) New for v1.5.6 $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

if ( $detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'full' || $detect->isTablet() && $_SESSION['layoutType'] == 'full' || $_SESSION['layoutType'] == 'full' ){
$col_per_row = SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS;
} else if ( $detect->isMobile() && !$detect->isTablet() || $_SESSION['layoutType'] == 'mobile' ) {
$col_per_row = SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS_MOBILE;
} else if ( $detect->isTablet() || $_SESSION['layoutType'] == 'tablet'){
$col_per_row = SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS_TABLET;
} else {
$col_per_row = SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS;
}

// initialize vars
$categories_products_id_list = array();
$list_of_products = '';
$specials_index_query = '';
$display_limit = '';

if ( (($manufacturers_id > 0 && empty($_GET['filter_id'])) || !empty($_GET['music_genre_id']) || !empty($_GET['record_company_id'])) || empty($new_products_category_id) ) {
  $specials_index_query = "SELECT p.products_id, p.products_image, pd.products_name, p.master_categories_id, p.product_is_call
                           FROM (" . TABLE_PRODUCTS . " p
                           LEFT JOIN " . TABLE_SPECIALS . " s ON p.products_id = s.products_id
                           LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd ON p.products_id = pd.products_id )
                           WHERE p.products_id = s.products_id
                           AND p.products_id = pd.products_id
                           AND p.products_status = 1 AND s.status = 1
                           AND pd.language_id = " . (int)$_SESSION['languages_id'];
} else {
  // get all products and cPaths in this subcat tree
  $productsInCategory = zen_get_categories_products_list( (($manufacturers_id > 0 && !empty($_GET['filter_id'])) ? zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath), false, true, 0, $display_limit);

  if (is_array($productsInCategory) && sizeof($productsInCategory) > 0) {
    // build products-list string to insert into SQL query
    foreach($productsInCategory as $key => $value) {
      $list_of_products .= $key . ', ';
    }
    $list_of_products = substr($list_of_products, 0, -2); // remove trailing comma
    $specials_index_query = "SELECT DISTINCT p.products_id, p.products_image, pd.products_name, p.master_categories_id, p.product_is_call
                             FROM (" . TABLE_PRODUCTS . " p
                             LEFT JOIN " . TABLE_SPECIALS . " s ON p.products_id = s.products_id
                             LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd ON p.products_id = pd.products_id )
                             WHERE p.products_id = s.products_id
                             AND p.products_id = pd.products_id
                             AND p.products_status = 1 AND s.status = 1
                             AND pd.language_id = " . (int)$_SESSION['languages_id'] . "
                             AND p.products_id in (" . $list_of_products . ")";
  }
}
if ($specials_index_query != '') $specials_index = $db->ExecuteRandomMulti($specials_index_query, MAX_DISPLAY_SPECIAL_PRODUCTS_INDEX);

$row = 0;
$col = 0;
$list_box_contents = array();
$title = '';

$num_products_count = ($specials_index_query == '') ? 0 : $specials_index->RecordCount();

// show only when 1 or more
if ($num_products_count > 0) {
  if ($num_products_count < $col_per_row || $col_per_row == 0 ) {
    $col_width = floor(100/$num_products_count);
  } else {
    $col_width = floor(100/$col_per_row);
  }

  $list_box_contents = array();
  while (!$specials_index->EOF) {

    if (!isset($productsInCategory[$specials_index->fields['products_id']])) $productsInCategory[$specials_index->fields['products_id']] = zen_get_generated_category_path_rev($specials_index->fields['master_categories_id']);
    
/** bof products link */
    $specials_products_link = zen_href_link(zen_get_info_page($specials_index->fields['products_id']), 'cPath=' . $productsInCategory[$specials_index->fields['products_id']] . '&products_id=' . $specials_index->fields['products_id']);
/** eof products link */

/** bof products price */
    $specials_products_price = '<div id="centerBoxContent-price-'.$specials_index->fields['products_id'].'" class="centerBoxContent-price">';
    $specials_products_price .= zen_get_products_display_price($specials_index->fields['products_id']);
    $specials_products_price .= '</div>';    
/** eof products price */

/** bof products name */
    $specials_products_name = '<div id="centerBoxContent-name-'.$specials_index->fields['products_id'].'" class="centerBoxContent-name">';
    $specials_products_name .= '<a href="' . $specials_products_link . '">' . zen_get_products_name($specials_index->fields['products_id']) . '</a>';
    $specials_products_name .= '</div>';    
/** eof products name */

/** bof products image */
if ($specials_index->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) {
    $specials_products_image = '';
} else {
    $specials_products_image = '<div id="centerBoxContent-image-'.$specials_index->fields['products_id'].'" class="centerBoxContent-image">'; 
    $specials_products_image .= '<a href="' . $specials_products_link . '">' . zen_image(DIR_WS_IMAGES . $specials_index->fields['products_image'], $specials_index->fields['products_name'], IMAGE_PRODUCT_NEW_WIDTH, IMAGE_PRODUCT_NEW_HEIGHT) . '</a>';
    $specials_products_image .= '</div>';     
}
/** eof products image */

/** bof products add to cart/info buttons */  
    $specials_products_buttons = '<div class="btn-row content-align-center">';
if ($specials_index->fields['product_is_call'] == '1' or zen_has_product_attributes($specials_index->fields['products_id'])) {
    $specials_products_buttons .= '<a href="' . $specials_products_link . '" role="button">' . PRODUCT_MORE_INFO_TEXT . '</a>';
} else {
    $specials_products_buttons .= '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $specials_index->fields['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_BUY_NOW, BUTTON_BUY_NOW_ALT) . '</a>';
    $specials_products_buttons .= '<a href="' . $specials_products_link . '" role="button">' . PRODUCT_MORE_INFO_TEXT . '</a>';    
}  
    $specials_products_buttons .= '</div>';
/** eof products add to cart/info buttons */

    $list_box_contents[$row][$col] = array('params' => 'class="centerBoxContentsSpecials centeredContent columns' . $col_per_row . '"',    
 
    'text' => $specials_products_image . $specials_products_name . $specials_products_price . $specials_products_buttons);

    $col ++;
    if ($col > ($col_per_row - 1)) {
      $col = 0;
      $row ++;
    }
    $specials_index->MoveNextRandom();
  }

  if ($specials_index->RecordCount() > 0) {
    $title = '<h2 class="centerBoxHeading pad-2">' . sprintf(TABLE_HEADING_SPECIALS_INDEX, strftime('%B')) . '</h2>';
    $zc_show_specials = true;
  }
}
