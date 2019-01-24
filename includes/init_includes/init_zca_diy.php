<?php
/**
 * 
 * init_zca_diy.php
 *
 * @package initSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: rbarbour zcadditions.com Sun Dec 13 16:32:43 2015 -0500 New in v1.5.5 $
 */
 
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// -----
// This module provides the initialization required for the ZCA Bootstrap template,
// if that template is the currently-active template.
//
// First, load the plugin's function-file; it has a common function that identifies
// whether/not the template is active.  If the template's not active, simply return
// since no further initialization is needed.
//
require DIR_WS_FUNCTIONS . 'zca_diy_functions.php';
if (!zca_diy_active()) {
    return;
}