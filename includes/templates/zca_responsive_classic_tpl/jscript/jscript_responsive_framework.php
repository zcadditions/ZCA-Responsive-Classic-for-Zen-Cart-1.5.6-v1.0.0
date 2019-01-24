<?php
/**
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version ZCA/GIT: $Id: rbarbour (zcadditions.com) New for v1.5.6 $
 */
?>


<?php if ( $detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'full' || $detect->isTablet() && $_SESSION['layoutType'] == 'full' || $_SESSION['layoutType'] == 'full' ){ ?>

<script type="text/javascript"><!--//
(function($) {
$(document).ready(function() {
$('.layout>[class*="columns"]').addClass('full');
$('.blocks>[class*="columns"]').addClass('full');
 $('.layout').css({
     'min-width': '<?php echo SET_MAX_WIDTH ?>',
     'margin': 'auto'
 });
  });
}) (jQuery);
//--></script>

<?php }  ?>
