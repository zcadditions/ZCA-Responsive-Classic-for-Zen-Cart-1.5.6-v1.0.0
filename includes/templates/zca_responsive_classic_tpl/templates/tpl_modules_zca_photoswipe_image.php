<?php
/**
 * Module Template
 * 
 * zca_diy_tpl 1.0.0
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: DrByte  Wed Jan 6 12:47:43 2016 -0500 Modified in v1.5.5 $
 */

echo '<div class="my-gallery border blocks mgnx-auto" itemscope itemtype="http://schema.org/ImageGallery">';
 
require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_MAIN_PRODUCT_IMAGE)); 
echo '<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="columns1">';

echo '<a href="' . zca_photoswipe($products_image_large, '', MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT) . '" itemprop="contentUrl" data-size="1024x1024">';

echo '<img src="' . zca_photoswipe($products_image_medium, '', MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT) . '" itemprop="thumbnail" alt="Image description" class="mgnx-auto dsp-block" style="width:' .  MEDIUM_IMAGE_WIDTH . 'px;" /></a>';
      
echo '<figcaption itemprop="caption description"><?php echo stripslashes($products_name); ?></figcaption></figure>';  

require(DIR_WS_MODULES . zen_get_module_directory('additional_images.php'));

if (is_array($list_box_contents) > 0 ) {
 for($row=0;$row<sizeof($list_box_contents);$row++) {
    $params = "";

    for($col=0;$col<sizeof($list_box_contents[$row]);$col++) {
      $r_params = "";
      if (isset($list_box_contents[$row][$col]['params'])) $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
     if (isset($list_box_contents[$row][$col]['text'])) {

echo $list_box_contents[$row][$col]['text'];

      }
    }

  }
}

echo '</div><div class="clear-both"></div>';

?>