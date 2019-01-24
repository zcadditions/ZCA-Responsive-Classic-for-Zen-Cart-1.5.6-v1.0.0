<?php
/**
 * Common Template - tpl_columnar_display.php
 * 
 * zca_diy_tpl 1.0.0
 *
 * This file is used for generating tabular output where needed, based on the supplied array of table-cell contents.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version ZCA/GIT: $Id: rbarbour (zcadditions.com) New for v1.5.6 $
 */

$zco_notifier->notify('NOTIFY_TPL_COLUMNAR_DISPLAY_START', $current_page_base, $list_box_contents, $title);

?>
<?php
  if ($title) {
  ?>
<?php echo $title; ?>
<?php
 }
 ?>
<?php
//-bof-zca_diy_tpl_demo  *** 1 of 2 ***
    echo '<div class="blocks border mgnb-3">';
//-eof-zca_diy_tpl_demo  *** 1 of 2 ***

if (is_array($list_box_contents) > 0 ) {
 for($row=0, $n=sizeof($list_box_contents); $row<$n; $row++) {
    $params = "";
    //if (isset($list_box_contents[$row]['params'])) $params .= ' ' . $list_box_contents[$row]['params'];
?>

<?php
    for($col=0, $j=sizeof($list_box_contents[$row]); $col<$j; $col++) {
      $r_params = "";
      if (isset($list_box_contents[$row][$col]['params'])) $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
     if (isset($list_box_contents[$row][$col]['text'])) {
?>
    <?php echo '<div' . $r_params . '>' . $list_box_contents[$row][$col]['text'] .  '</div>' . "\n"; ?>
<?php
      }
    }
?>
<br class="clearBoth" />
<?php
  }
}

//-bof-zca_diy_tpl_demo  *** 2 of 2 ***
    echo '</div>';
//-eof-zca_diy_tpl_demo  *** 2 of 2 ***

$zco_notifier->notify('NOTIFY_TPL_COLUMNAR_DISPLAY_END', $current_page_base, $list_box_contents, $title);
