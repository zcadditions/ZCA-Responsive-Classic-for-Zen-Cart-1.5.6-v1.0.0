<?php
/**
 * Common Template - tpl_box_default_left.php
 * 
 * zca_diy_tpl 1.0.0
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version ZCA/GIT: $Id: rbarbour (zcadditions.com) New for v1.5.6 $
 */

// choose box images based on box position
  if ($title_link) {
    $title = '<a href="' . zen_href_link($title_link) . '">' . $title . BOX_HEADING_LINKS . '</a>';
  }
?>

<div class="leftBoxContainer <?php echo $tabletClass; ?> <?php echo $mobileClass; ?> border mgnb-3" id="<?php echo str_replace('_', '-', $box_id ); ?>">
<h4 class="leftBoxHeading pad-2" id="<?php echo str_replace('_', '-', $box_id) . 'Heading'; ?>"><?php echo $title; ?></h4>
<?php echo $content; ?>
</div>


