<?php
/**
 * Side Box Template
 * 
 * zca_diy_tpl 1.0.0 
 *
 * @package templateSystem
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_featured.php 18698 2011-05-04 14:50:06Z wilt $
 */
  $content = "";
  $content .= '<div class="sideBoxContent centeredContent blocks">';
  $featured_box_counter = 0;
  while (!$random_featured_product->EOF) {
    $featured_box_counter++;
    
    $content .= "\n" . '  <div class="sideBoxContentItem columns1">';    
    
/** bof products link */
    $random_featured_product_link = zen_href_link(zen_get_info_page($random_featured_product->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($random_featured_product->fields['master_categories_id']) . '&products_id=' . $random_featured_product->fields['products_id']);
/** eof products link */

/** bof products image */
if ($random_featured_product->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) {
    $content .= '';
} else {
    $content .= '<div id="centerBoxContent-image-'.$random_featured_product->fields['products_id'].'" class="centerBoxContent-image">'; 
    $content .= '<a href="' . $random_featured_product_link . '">' . zen_image(DIR_WS_IMAGES . $random_featured_product->fields['products_image'], $random_featured_product->fields['products_name'], IMAGE_PRODUCT_NEW_WIDTH, IMAGE_PRODUCT_NEW_HEIGHT) . '</a>';
    $content .= '</div>';     
}
/** eof products image */

/** bof products name */
    $content .= '<div id="centerBoxContent-name-'.$random_featured_product->fields['products_id'].'" class="centerBoxContent-name">';
    $content .= '<a href="' . $random_featured_product_link . '">' . zen_get_products_name($random_featured_product->fields['products_id']) . '</a>';
    $content .= '</div>';    
/** eof products name */

/** bof products price */
    $content .= '<div id="centerBoxContent-price-'.$random_featured_product->fields['products_id'].'" class="centerBoxContent-price">';
    $content .= zen_get_products_display_price($random_featured_product->fields['products_id']);
    $content .= '</div>';    
/** eof products price */

/** bof products add to cart/info buttons */  
    $content .= '<div class="btn-row content-align-center">';
if ($random_featured_product->fields['product_is_call'] == '1' or zen_has_product_attributes($random_featured_product->fields['products_id'])) {
    $content .= '<a href="' . $random_featured_product_link . '" role="button">' . PRODUCT_MORE_INFO_TEXT . '</a>';
} else {
    $content .= '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $random_featured_product->fields['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_BUY_NOW, BUTTON_BUY_NOW_ALT, ' role="button"') . '</a>';
    $content .= '<a href="' . $random_featured_product_link . '" role="button">' . PRODUCT_MORE_INFO_TEXT . '</a>';    
}  
    $content .= '</div>';
/** eof products add to cart/info buttons */ 

    $content .= '</div>';
    $random_featured_product->MoveNextRandom();
  }
  $content .= '</div>' . "\n";
