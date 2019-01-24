<?php
/**
 *
 * @package templateSystem
 * @copyright Portions Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 *
 */

  $column_box_default = 'tpl_zca_footerbox_blocks.php';
  
  $footerblocks_group = array();
  for ($i=1; $i<=9; $i++) {
    if (constant('FOOTERBLOCKS_NUMBER_' . $i) == (int)$box_loc) $footerblocks_group[] = $i;
  }

			      echo '<div class="blocks">';
 
  if (sizeof($footerblocks_group) > 0) {

    for($ix=0; $ix<sizeof($footerblocks_group); $ix++) {
      $box_no = $footerblocks_group[$ix];
      $footerblock_name = constant('FILENAME_DEFINE_FOOTERBLOCKS_' . $box_no);
      $sidebox_name = constant('SIDEBOX_FOOTERBLOCKS_' . $box_no);
      $sidebox_filename = $sidebox_name . '.php';

if ( $detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'full' || $detect->isTablet() && $_SESSION['layoutType'] == 'full' || $_SESSION['layoutType'] == 'full' ){
$col_per_row = sizeof($footerblocks_group);
} else
if ( $detect->isMobile() && !$detect->isTablet() || $_SESSION['layoutType'] == 'mobile' ) {
$col_per_row = '1';
} else if ( $detect->isTablet() || $_SESSION['layoutType'] == 'tablet'){
$col_per_row = '2';
} else {
$col_per_row = sizeof($footerblocks_group);
}
      
			      echo '<div class="columns'.$col_per_row.'">';

			
      if ($sidebox_name and (file_exists(DIR_WS_MODULES . 'sideboxes/' . $sidebox_filename) or file_exists(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/' . $sidebox_filename))) {

        $box_id = zen_get_box_id($sidebox_filename); //sidebox handling


if (BLOCK_HEADING_FOOTERBLOCKS1 != '' || BLOCK_HEADING_FOOTERBLOCKS2 != '' || BLOCK_HEADING_FOOTERBLOCKS3 != '' || BLOCK_HEADING_FOOTERBLOCKS4 != '' || BLOCK_HEADING_FOOTERBLOCKS5 != '' || BLOCK_HEADING_FOOTERBLOCKS6 != '' || BLOCK_HEADING_FOOTERBLOCKS7 != '' || BLOCK_HEADING_FOOTERBLOCKS8 != '' || BLOCK_HEADING_FOOTERBLOCKS9 != '') {

 
        echo '<h4 id="heading'.$box_no.'" class="footerblocks-header text-align-center">' . constant('BLOCK_HEADING_FOOTERBLOCKS' . $box_no) . '</h4>' . "\n";

}


if ( file_exists(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/' . $sidebox_filename) ) {


          require(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/' . $sidebox_filename);
          

        } else {


          require(DIR_WS_MODULES . 'sideboxes/' . $sidebox_filename);


        }



      } else {  //defined center blocks output

        echo '<h4 class="footerblocks-header text-align-center">' . constant('BLOCK_HEADING_FOOTERBLOCKS' . $box_no) . '</h4>' . "\n"; 


        require zen_get_file_directory(DIR_WS_LANGUAGES . $_SESSION['language'] . '/html_includes/', $footerblock_name, 'false');



      }
      echo '</div>' . "\n";

    }


  }
      echo '  </div>' . "\n";
//eof
?>