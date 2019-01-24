<?php
/**
 * Module Template
 *
 * Template used to render attribute display/input fields
 * 
 * zca_diy_tpl 1.0.0 
 *
 * @package templateSystem
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: mc12345678 Tue May 8 00:42:18 2018 -0400 Modified in v1.5.6 $
 */
?>
<div id="productAttributes" class="pad-2">
<?php if ($zv_display_select_option > 0) { ?>
<h5 id="attribsOptionsText mgnt-3"><?php echo TEXT_PRODUCT_OPTIONS; ?></h5>
<?php } // show please select unless all are readonly ?>

<?php
    for($i=0, $j=sizeof($options_name); $i<$j; $i++) {
?>
<?php
  if ($options_comment[$i] != '' and $options_comment_position[$i] == '0') {
?>
<h5 class="attributesComments mgnt-3"><?php echo $options_comment[$i]; ?></h5>
<?php
  }
?>

<div class="wrapperAttribsOptions pad-2" id="<?php echo $options_html_id[$i]; ?>">
<h5 class="optionName"><?php echo $options_name[$i]; ?></h5>
<div><?php echo "\n" . $options_menu[$i]; ?></div>
</div>


<?php if ($options_comment[$i] != '' and $options_comment_position[$i] == '1') { ?>
    <div class="ProductInfoComments"><?php echo $options_comment[$i]; ?></div>
<?php } ?>


<?php
if (isset($options_attributes_image[$i]) && $options_attributes_image[$i] != '') {
?>
<div class="attribImgWrappper text-align-center blocks">
<?php echo $options_attributes_image[$i]; ?>
<?php
}
?>
</div>
<?php
    }
?>


<?php
  if ($show_onetime_charges_description == 'true') {
?>
    <div class="wrapperAttribsOneTime"><?php echo TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION; ?></div>
<?php } ?>


<?php
  if ($show_attributes_qty_prices_description == 'true') {
?>
    <div class="wrapperAttribsQtyPrices"><?php echo zen_image(DIR_WS_TEMPLATE_ICONS . 'icon_status_green.gif', TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK, 10, 10) . '&nbsp;' . '<a href="javascript:popupWindowPrice(\'' . zen_href_link(FILENAME_POPUP_ATTRIBUTES_QTY_PRICES, 'products_id=' . $_GET['products_id'] . '&products_tax_class_id=' . $products_tax_class_id) . '\')">' . TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK . '</a>'; ?></div>
<?php } ?>
</div>
