<?php 
/**
 *
 * zca_diy_tpl 1.0.0
 *
 */

if (!isset($_SESSION['layoutType'])) {
  $_SESSION['layoutType'] = 'default';
} ?>

<div class="content-align-center pad-3">

<?php if ( $detect->isMobile() && !$detect->isTablet() || $_SESSION['layoutType'] == 'mobile' ) { ?>

<a href="http://www.zen-cart.com/book"><img src="includes/templates/responsive_classic/images/zencart-book-mobile.png" alt="get your manual today" title="Have you got yours yet? Join the 1000's of Zen Cart users that have bought the only comprehensive owners manual !" class="home-image" /></a>
  
<?php  } else if ( $detect->isTablet() || $_SESSION['layoutType'] == 'tablet' ){ ?>

<a href="http://www.zen-cart.com/book"><img src="includes/templates/responsive_classic/images/zencart-book.png" alt="get your manual today" title="Have you got yours yet? Join the 1000's of Zen Cart users that have bought the only comprehensive owners manual !" class="home-image" /></a>

<?php  } else if ( $_SESSION['layoutType'] == 'full' ) { ?>

<a href="http://www.zen-cart.com/book"><img src="includes/templates/responsive_classic/images/zencart-book.png" alt="get your manual today" title="Have you got yours yet? Join the 1000's of Zen Cart users that have bought the only comprehensive owners manual !" class="home-image" /></a>

<?php  } else { ?>

<a href="http://www.zen-cart.com/book"><img src="includes/templates/responsive_classic/images/zencart-book.png" alt="get your manual today" title="Have you got yours yet? Join the 1000's of Zen Cart users that have bought the only comprehensive owners manual !" class="home-image" /></a>

<?php  } ?>

</div>

<p class="biggerText">The template package uses PHP Mobile Detect to serve up the optimized layout based on device.<br /><br />  
    For the Mobile layout <a class="red" href="index.php?main_page=index&amp;layoutType=mobile">use this link.</a><br /><br />   
    For the Tablet layout <a class="red" href="index.php?main_page=index&amp;layoutType=tablet">use this link.</a><br /><br />
		For the Responsive Site layout (desktop) <a class="red" href="index.php?main_page=index&amp;layoutType=default">use this link.</a><br /><br />
		For the Mobile Full Site layout <a class="red" href="index.php?main_page=index&amp;layoutType=full">use this link.</a><br /><br />   
		</p>

    
<p>This content is located in the file at: <code> /languages/english/html_includes/YOUR_TEMPLATE/define_main_page.php</code></p>
<p>You can quickly edit this content via Admin->Tools->Define Pages Editor, and select define_main_page from the pulldown.</p>
<p><strong>NOTE: Always backup the files in<code> /languages/english/html_includes/your_template</code></strong></p>
