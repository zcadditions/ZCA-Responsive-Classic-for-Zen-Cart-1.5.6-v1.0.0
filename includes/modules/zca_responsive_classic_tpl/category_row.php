<?php
/**
 * index category_row.php
 * 
 * zca_diy_tpl 1.0.0 
 *
 * Prepares the content for displaying a category's sub-category listing in grid format.  
 * Once the data is prepared, it calls the standard tpl_list_box_content template for display.
 *
 * @package page
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version ZCA/GIT: $Id: rbarbour (zcadditions.com) New for v1.5.6 $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

if ( $detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'full' || $detect->isTablet() && $_SESSION['layoutType'] == 'full' || $_SESSION['layoutType'] == 'full' ){
$col_per_row = MAX_DISPLAY_CATEGORIES_PER_ROW;
} else if ( $detect->isMobile() && !$detect->isTablet() || $_SESSION['layoutType'] == 'mobile' ) {
$col_per_row = MAX_DISPLAY_CATEGORIES_PER_ROW_MOBILE;
} else if ( $detect->isTablet() || $_SESSION['layoutType'] == 'tablet'){
$col_per_row = MAX_DISPLAY_CATEGORIES_PER_ROW_TABLET;
} else {
$col_per_row = MAX_DISPLAY_CATEGORIES_PER_ROW;
}

$title = '';
$num_categories = $categories->RecordCount();

$row = 0;
$col = 0;
$list_box_contents = array();
if ($num_categories > 0) {
  if ($num_categories < $col_per_row || $col_per_row == 0) {
    $col_width = floor(100/$num_categories);
  } else {
    $col_width = floor(100/$col_per_row);
  }

  while (!$categories->EOF) {
    if (!$categories->fields['categories_image']) !$categories->fields['categories_image'] = 'pixel_trans.gif';
    $cPath_new = zen_get_path($categories->fields['categories_id']);

    // strip out 0_ from top level cats
    $cPath_new = str_replace('=0_', '=', $cPath_new);

    //    $categories->fields['products_name'] = zen_get_products_name($categories->fields['products_id']);
//-bof-zca_diy_tpl_demo  *** 1 of 0 ***
//    $list_box_contents[$row][$col] = array('params' => 'class="categoryListBoxContents"' . ' ' . 'style="width:' . $col_width . '%;"',
    $list_box_contents[$row][$col] = array('params' => 'class="categoryListBoxContents centeredContent columns' . $col_per_row . '"',
//-eof-zca_diy_tpl_demo  *** 1 of 0 ***    
                                           'text' => '<a href="' . zen_href_link(FILENAME_DEFAULT, $cPath_new) . '">' . zen_image(DIR_WS_IMAGES . $categories->fields['categories_image'], $categories->fields['categories_name'], SUBCATEGORY_IMAGE_WIDTH, SUBCATEGORY_IMAGE_HEIGHT) . '<br />' . $categories->fields['categories_name'] . '</a>');

    $col ++;
    if ($col > ($col_per_row -1)) {
      $col = 0;
      $row ++;
    }
    $categories->MoveNext();
  }
}
