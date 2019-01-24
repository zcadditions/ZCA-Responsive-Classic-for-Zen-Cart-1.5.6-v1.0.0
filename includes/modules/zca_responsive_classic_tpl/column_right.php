<?php
/**
 * column_right module
 * 
 * zca_diy_tpl 1.0.0
 *
 * @package templateStructure
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: column_left.php 4274 2006-08-26 03:16:53Z drbyte $
 * @version ZCA/GIT: $Id: rbarbour (zcadditions.com) New for v1.5.6 $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
$column_box_default='tpl_box_default_right.php';
// Check if there are boxes for the column
$column_right_display = $db->Execute("select layout_box_name, layout_box_status_mobile, layout_box_status_tablet from " . TABLE_LAYOUT_BOXES . " where layout_box_location = 1 and layout_box_status= '1' and layout_template ='" . $template_dir . "'" . ' order by layout_box_sort_order');
// safety row stop
$box_cnt=0;
while (!$column_right_display->EOF and $box_cnt < 100) {
  $box_cnt++;
  if ( file_exists(DIR_WS_MODULES . 'sideboxes/' . $column_right_display->fields['layout_box_name']) or file_exists(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/' . $column_right_display->fields['layout_box_name']) ) {
if ( file_exists(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/' . $column_right_display->fields['layout_box_name']) ) {
  $box_id = zen_get_box_id($column_right_display->fields['layout_box_name']);
if ( $detect->isMobile() && !$detect->isTablet() || $_SESSION['layoutType'] == 'mobile' ) {
if ( $column_right_display->fields['layout_box_status_mobile'] == '0' && $_SESSION['layoutType'] != 'full' ) {
    $flag_disable_box = true;
  } else {
    $flag_disable_box = false;
 }
} else if ( $detect->isTablet() || $_SESSION['layoutType'] == 'tablet'){
if ( $column_right_display->fields['layout_box_status_tablet'] == '0' && $_SESSION['layoutType'] != 'full' ) {
    $flag_disable_box = true;
  } else {
    $flag_disable_box = false;
 }
} else {

if ( $column_right_display->fields['layout_box_status_tablet'] == '0' && $_SESSION['layoutType'] != 'full') {
$tabletClass = 'tabletHide';
  } else {
$tabletClass = '';
 }
if ( $column_right_display->fields['layout_box_status_mobile'] == '0' && $_SESSION['layoutType'] != 'full' ) {
$mobileClass = 'mobileHide';
  } else {
$mobileClass = '';
 }
$flag_disable_box = false;
}
if ($flag_disable_box == false) {
  require(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/' . $column_right_display->fields['layout_box_name']);
  }
} else {
  $box_id = zen_get_box_id($column_right_display->fields['layout_box_name']);
  if ( $detect->isMobile() && !$detect->isTablet() || $_SESSION['layoutType'] == 'mobile' ) {
if ( $column_right_display->fields['layout_box_status_mobile'] == '0' && $_SESSION['layoutType'] != 'full' ) {
    $flag_disable_box = true;
  } else {
    $flag_disable_box = false;
 }
} else if ( $detect->isTablet() || $_SESSION['layoutType'] == 'tablet'){
if ( $column_right_display->fields['layout_box_status_tablet'] == '0' && $_SESSION['layoutType'] != 'full' ) {
    $flag_disable_box = true;
  } else {
    $flag_disable_box = false;
 }
} else {

if ( $column_right_display->fields['layout_box_status_tablet'] == '0' && $_SESSION['layoutType'] != 'full' ) {
$tabletClass = 'tabletHide';
  } else {
$tabletClass = '';
 }
if ( $column_right_display->fields['layout_box_status_mobile'] == '0' && $_SESSION['layoutType'] != 'full' ) {
$mobileClass = 'mobileHide';
  } else {
$mobileClass = '';
 }
$flag_disable_box = false;
}
if ($flag_disable_box == false) {
  require(DIR_WS_MODULES . 'sideboxes/' . $column_right_display->fields['layout_box_name']);
  }
}
  } // file_exists
  $column_right_display->MoveNext();
} // while column_left
$box_id = '';
?>
