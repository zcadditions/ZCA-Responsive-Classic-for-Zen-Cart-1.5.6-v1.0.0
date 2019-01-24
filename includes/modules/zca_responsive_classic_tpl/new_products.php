<?php
/**
 * new_products.php module
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
$col_per_row = SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS;
} else if ( $detect->isMobile() && !$detect->isTablet() || $_SESSION['layoutType'] == 'mobile' ) {
$col_per_row = SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS_MOBILE;
} else if ( $detect->isTablet() || $_SESSION['layoutType'] == 'tablet'){
$col_per_row = SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS_TABLET;
} else {
$col_per_row = SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS;
}

// initialize vars
$categories_products_id_list = array();
$list_of_products = '';
$new_products_query = '';

$display_limit = zen_get_new_date_range();

if ( (($manufacturers_id > 0 && empty($_GET['filter_id'])) || !empty($_GET['music_genre_id']) || !empty($_GET['record_company_id'])) || empty($new_products_category_id) ) {
  $new_products_query = "SELECT DISTINCT p.products_id, p.products_image, p.products_tax_class_id, pd.products_name,
                                p.products_date_added, p.products_price, p.products_type, p.master_categories_id, p.product_is_call
                           FROM " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd
                           WHERE p.products_id = pd.products_id
                           AND pd.language_id = " . (int)$_SESSION['languages_id'] . "
                           AND   p.products_status = 1 " . $display_limit;
} else {
  // get all products and cPaths in this subcat tree
  $productsInCategory = zen_get_categories_products_list( (($manufacturers_id > 0 && !empty($_GET['filter_id'])) ? zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath), false, true, 0, $display_limit);

  if (is_array($productsInCategory) && sizeof($productsInCategory) > 0) {
    // build products-list string to insert into SQL query
    foreach($productsInCategory as $key => $value) {
      $list_of_products .= $key . ', ';
    }
    $list_of_products = substr($list_of_products, 0, -2); // remove trailing comma

    $new_products_query = "SELECT DISTINCT p.products_id, p.products_image, p.products_tax_class_id, pd.products_name,
                                  p.products_date_added, p.products_price, p.products_type, p.master_categories_id, p.product_is_call
                           FROM " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd
                           WHERE p.products_id = pd.products_id
                           AND pd.language_id = " . (int)$_SESSION['languages_id'] . "
                           AND p.products_status = 1
                           AND p.products_id in (" . $list_of_products . ")";
  }
}

if ($new_products_query != '') $new_products = $db->ExecuteRandomMulti($new_products_query, MAX_DISPLAY_NEW_PRODUCTS);

$row = 0;
$col = 0;
$list_box_contents = array();
$title = '';

$num_products_count = ($new_products_query == '') ? 0 : $new_products->RecordCount();

// show only when 1 or more
if ($num_products_count > 0) {
  if ($num_products_count < $col_per_row || $col_per_row == 0 ) {
    $col_width = floor(100/$num_products_count);
  } else {
    $col_width = floor(100/$col_per_row);
  }

  while (!$new_products->EOF) {

    if (!isset($productsInCategory[$new_products->fields['products_id']])) $productsInCategory[$new_products->fields['products_id']] = zen_get_generated_category_path_rev($new_products->fields['master_categories_id']);

/** bof products link */
    $new_products_link = zen_href_link(zen_get_info_page($new_products->fields['products_id']), 'cPath=' . $productsInCategory[$new_products->fields['products_id']] . '&products_id=' . $new_products->fields['products_id']);
/** eof products link */

/** bof products price */
    $new_products_price = '<div id="centerBoxContent-price-'.$new_products->fields['products_id'].'" class="centerBoxContent-price">';
    $new_products_price .= zen_get_products_display_price($new_products->fields['products_id']);
    $new_products_price .= '</div>';    
/** eof products price */

/** bof products name */
    $new_products_name = '<div id="centerBoxContent-name-'.$new_products->fields['products_id'].'" class="centerBoxContent-name">';
    $new_products_name .= '<a href="' . $new_products_link . '">' . zen_get_products_name($new_products->fields['products_id']) . '</a>';
    $new_products_name .= '</div>';    
/** eof products name */

/** bof products image */
if ($new_products->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) {
    $new_products_image = '';
} else {
    $new_products_image = '<div id="centerBoxContent-image-'.$new_products->fields['products_id'].'" class="centerBoxContent-image">'; 
    $new_products_image .= '<a href="' . $new_products_link . '">' . zen_image(DIR_WS_IMAGES . $new_products->fields['products_image'], $new_products->fields['products_name'], IMAGE_PRODUCT_NEW_WIDTH, IMAGE_PRODUCT_NEW_HEIGHT) . '</a>';
    $new_products_image .= '</div>';     
}
/** eof products image */

/** bof products add to cart/info buttons */  
    $new_products_buttons = '<div class="btn-row content-align-center">';
if ($new_products->fields['product_is_call'] == '1' or zen_has_product_attributes($new_products->fields['products_id'])) {
    $new_products_buttons .= '<a href="' . $new_products_link . '" role="button">' . PRODUCT_MORE_INFO_TEXT . '</a>';
} else {
    $new_products_buttons .= '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $new_products->fields['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_BUY_NOW, BUTTON_BUY_NOW_ALT) . '</a>';
    $new_products_buttons .= '<a href="' . $new_products_link . '" role="button">' . PRODUCT_MORE_INFO_TEXT . '</a>';    
}  
    $new_products_buttons .= '</div>';
/** eof products add to cart/info buttons */

    $list_box_contents[$row][$col] = array('params' => 'class="centerBoxContentsNew centeredContent columns' . $col_per_row . '"', 
 
    'text' => $new_products_image . $new_products_name . $new_products_price . $new_products_buttons);
    
    $col ++;
    if ($col > ($col_per_row - 1)) {
      $col = 0;
      $row ++;
    }
    $new_products->MoveNextRandom();
  }

  if ($new_products->RecordCount() > 0) {
    if (!empty($new_products_category_id)) {
      $category_title = zen_get_categories_name((int)$new_products_category_id);
      $title = '<h2 class="centerBoxHeading pad-2">' . sprintf(TABLE_HEADING_NEW_PRODUCTS, strftime('%B')) . ($category_title != '' ? ' - ' . $category_title : '' ) . '</h2>';
    } else {
      $title = '<h2 class="centerBoxHeading pad-2">' . sprintf(TABLE_HEADING_NEW_PRODUCTS, strftime('%B')) . '</h2>';
    }
    $zc_show_new_products = true;
  }
}

