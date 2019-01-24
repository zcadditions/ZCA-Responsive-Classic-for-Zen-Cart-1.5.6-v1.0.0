<?php
/**
 * information sidebox - displays list of general info links, as defined in this file
 *
 * @package templateSystem
 * @copyright Copyright 2003-2019 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2019 Jan 04 Modified in v1.5.6a $
 */

  unset($information);

  if (DEFINE_SHIPPINGINFO_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_SHIPPING) . '"><li class="list-group-item">' . BOX_INFORMATION_SHIPPING . '</li></a>';
  }
  if (DEFINE_PRIVACY_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_PRIVACY) . '"><li class="list-group-item">' . BOX_INFORMATION_PRIVACY . '</li></a>';
  }
  if (DEFINE_CONDITIONS_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_CONDITIONS) . '"><li class="list-group-item">' . BOX_INFORMATION_CONDITIONS . '</li></a>';
  }
  if (DEFINE_CONTACT_US_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_CONTACT_US, '', 'SSL') . '"><li class="list-group-item">' . BOX_INFORMATION_CONTACT . '</li></a>';
  }

// forum/bb link:
  if (!empty($external_bb_url) && !empty($external_bb_text)) {
    $information[] = '<a href="' . $external_bb_url . '" target="_blank"><li class="list-group-item">' . $external_bb_text . '</li></a>';
  }

  if (DEFINE_SITE_MAP_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_SITE_MAP) . '"><li class="list-group-item">' . BOX_INFORMATION_SITE_MAP . '</li></a>';
  }

  // only show GV FAQ when installed
  if (defined('MODULE_ORDER_TOTAL_GV_STATUS') && MODULE_ORDER_TOTAL_GV_STATUS == 'true') {
    $information[] = '<a href="' . zen_href_link(FILENAME_GV_FAQ) . '"><li class="list-group-item">' . BOX_INFORMATION_GV . '</li></a>';
  }
  // only show Discount Coupon FAQ when installed
  if (DEFINE_DISCOUNT_COUPON_STATUS <= 1 && defined('MODULE_ORDER_TOTAL_COUPON_STATUS') && MODULE_ORDER_TOTAL_COUPON_STATUS == 'true') {
    $information[] = '<a href="' . zen_href_link(FILENAME_DISCOUNT_COUPON) . '"><li class="list-group-item">' . BOX_INFORMATION_DISCOUNT_COUPONS . '</li></a>';
  }

  if (SHOW_NEWSLETTER_UNSUBSCRIBE_LINK == 'true') {
    $information[] = '<a href="' . zen_href_link(FILENAME_UNSUBSCRIBE) . '"><li class="list-group-item">' . BOX_INFORMATION_UNSUBSCRIBE . '</li></a>';
  }

  require($template->get_template_dir('tpl_information.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_information.php');

  $title =  BOX_HEADING_INFORMATION;
  $title_link = false;

  require($template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . $column_box_default);
