<?php

/**

 * ZCA Footer Blocks

 *

 * @copyright Copyright 2003-2005 Zen Cart Development Team

 * @copyright Portions Copyright 2003 osCommerce

 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0

 * @version $Id: init_fb_config.php

 */



    $fb_menu_title = 'ZCA Footer Blocks';

    $fb_menu_text = 'ZCA Footer Blocks Configuration';



    /* find if ZCA Footer Blocks Configuration Group Exists */

    $sql = "SELECT * FROM ".TABLE_CONFIGURATION_GROUP." WHERE configuration_group_title = '".$fb_menu_title."'";

    $original_config = $db->Execute($sql);



    if($original_config->RecordCount())

    {

        // if exists updating the existing ZCA Footer Blocks configuration group entry

        $sql = "UPDATE ".TABLE_CONFIGURATION_GROUP." SET 

                configuration_group_description = '".$fb_menu_text."' 

                WHERE configuration_group_title = '".fb_menu_title."'";

        $db->Execute($sql);

        $sort = $original_config->fields['sort_order'];



    }else{

        /* Find max sort order in the configuation group table -- add 2 to this value to create the ZCA Footer Blocks configuration group ID */

        $sql = "SELECT (MAX(sort_order)+2) as sort FROM ".TABLE_CONFIGURATION_GROUP;

        $result = $db->Execute($sql);

        $sort = $result->fields['sort'];



        /* Create ZCA Footer Blocks configuration group */

        $sql = "INSERT INTO ".TABLE_CONFIGURATION_GROUP." (configuration_group_title, configuration_group_description, sort_order, visible) VALUES ('".$fb_menu_title."', '".$fb_menu_text."', ".$sort.", '1')";

        $db->Execute($sql);

   }



    /* Find configuation group ID of ZCA Footer Blocks */

    $sql = "SELECT configuration_group_id FROM ".TABLE_CONFIGURATION_GROUP." WHERE configuration_group_title='".$fb_menu_title."' LIMIT 1";

    $result = $db->Execute($sql);

        $fb_configuration_id = $result->fields['configuration_group_id'];



    /* Remove ZCA Footer Blocks items from the configuration table */

    $sql = "DELETE FROM ".DB_PREFIX."configuration WHERE configuration_group_id ='".$fb_configuration_id."'";

        $db->Execute($sql);



//-- ADD VALUES TO ZCA FOOTER BLOCKS CONFIGURATION GROUP (Admin > Configuration > ZCA Footer Blocks Configuration) --

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

		VALUES ('Activate Footer Blocks', 'ZCA_ACTIVATE_FOOTERBLOCKS', 'true', 'Set this option true or false to enable or disable the <b>Home Page ZCA Footer Blocks</b>', '".$fb_configuration_id."', 1, NULL, now(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')";

    $db->Execute($sql);

		

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 1 Row Group', 'FOOTERBLOCKS_NUMBER_1', '1', 'Each Footer Block Box <b>MUST</b> be assigned to a <b>ROW GROUP</b>.', '".$fb_configuration_id."', 2, NULL, now(), NULL, 'zen_cfg_select_option(array(\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\'),')";

    $db->Execute($sql);

			

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 1 Heading', 'BLOCK_HEADING_FOOTERBLOCKS1', 'Quick Links', 'Add a Footer Blocks Box 1 Heading.', '".$fb_configuration_id."', 3, NULL, now(), NULL, NULL)";

    $db->Execute($sql);



		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 1 Sidebox', 'SIDEBOX_FOOTERBLOCKS_1', '', 'Add a Footer Blocks Box 1 Sidebox <b>Leave Blank</b> to use a Define Page (Admin > Tools > Define Pages Editor > DEFINE_CENTERBLOCKS_1.php).', '".$fb_configuration_id."', 4, NULL, now(), NULL, NULL)";

    $db->Execute($sql);



		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 2 Row Group', 'FOOTERBLOCKS_NUMBER_2', '1', 'Each Footer Block Box <b>MUST</b> be assigned to a <b>ROW GROUP</b>.', '".$fb_configuration_id."', 5, NULL, now(), NULL, 'zen_cfg_select_option(array(\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\'),')";

    $db->Execute($sql);

			

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 2 Heading', 'BLOCK_HEADING_FOOTERBLOCKS2', 'More Information', 'Add a Footer Blocks Box 2 Heading.', '".$fb_configuration_id."', 6, NULL, now(), NULL, NULL)";

    $db->Execute($sql);



		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 2 Sidebox', 'SIDEBOX_FOOTERBLOCKS_2', 'more_information', 'Add a Footer Blocks Box 2 Sidebox <b>Leave Blank</b> to use a Define Page (Admin > Tools > Define Pages Editor > DEFINE_CENTERBLOCKS_2.php).', '".$fb_configuration_id."', 7, NULL, now(), NULL, NULL)";

    $db->Execute($sql);

		

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 3 Row Group', 'FOOTERBLOCKS_NUMBER_3', '1', 'Each Footer Block Box <b>MUST</b> be assigned to a <b>ROW GROUP</b>.', '".$fb_configuration_id."', 8, NULL, now(), NULL, 'zen_cfg_select_option(array(\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\'),')";

    $db->Execute($sql);

			

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 3 Heading', 'BLOCK_HEADING_FOOTERBLOCKS3', 'Customer Service', 'Add a Footer Blocks Box 3 Heading.', '".$fb_configuration_id."', 9, NULL, now(), NULL, NULL)";

    $db->Execute($sql);



		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 3 Sidebox', 'SIDEBOX_FOOTERBLOCKS_3', '', 'Add a Footer Blocks Box 3 Sidebox <b>Leave Blank</b> to use a Define Page (Admin > Tools > Define Pages Editor > DEFINE_CENTERBLOCKS_3.php).', '".$fb_configuration_id."', 10, NULL, now(), NULL, NULL)";

    $db->Execute($sql);

		

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 4 Row Group', 'FOOTERBLOCKS_NUMBER_4', '1', 'Each Footer Block Box <b>MUST</b> be assigned to a <b>ROW GROUP</b>.', '".$fb_configuration_id."', 11, NULL, now(), NULL, 'zen_cfg_select_option(array(\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\'),')";

    $db->Execute($sql);

			

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 4 Heading', 'BLOCK_HEADING_FOOTERBLOCKS4', 'Share and Connect', 'Add a Footer Blocks Box 4 Heading.', '".$fb_configuration_id."', 12, NULL, now(), NULL, NULL)";

    $db->Execute($sql);



		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 4 Sidebox', 'SIDEBOX_FOOTERBLOCKS_4', '', 'Add a Footer Blocks Box 4 Sidebox <b>Leave Blank</b> to use a Define Page (Admin > Tools > Define Pages Editor > DEFINE_CENTERBLOCKS_4.php).', '".$fb_configuration_id."', 13, NULL, now(), NULL, NULL)";

    $db->Execute($sql);

		

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 5 Row Group', 'FOOTERBLOCKS_NUMBER_5', '2', 'Each Footer Block Box <b>MUST</b> be assigned to a <b>ROW GROUP</b>.', '".$fb_configuration_id."', 14, NULL, now(), NULL, 'zen_cfg_select_option(array(\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\'),')";

    $db->Execute($sql);

			

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 5 Heading', 'BLOCK_HEADING_FOOTERBLOCKS5', 'ZCA Footer Blocks', 'Add a Footer Blocks Box 5 Heading.', '".$fb_configuration_id."', 15, NULL, now(), NULL, NULL)";

    $db->Execute($sql);



		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 5 Sidebox', 'SIDEBOX_FOOTERBLOCKS_5', '', 'Add a Footer Blocks Box 5 Sidebox <b>Leave Blank</b> to use a Define Page (Admin > Tools > Define Pages Editor > DEFINE_CENTERBLOCKS_5.php).', '".$fb_configuration_id."', 16, NULL, now(), NULL, NULL)";

    $db->Execute($sql);

		

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 6 Row Group', 'FOOTERBLOCKS_NUMBER_6', '', 'Each Footer Block Box <b>MUST</b> be assigned to a <b>ROW GROUP</b>.', '".$fb_configuration_id."', 17, NULL, now(), NULL, 'zen_cfg_select_option(array(\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\'),')";

    $db->Execute($sql);

			

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 6 Heading', 'BLOCK_HEADING_FOOTERBLOCKS6', '', 'Add a Footer Blocks Box 6 Heading.', '".$fb_configuration_id."', 18, NULL, now(), NULL, NULL)";

    $db->Execute($sql);



		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 6 Sidebox', 'SIDEBOX_FOOTERBLOCKS_6', '', 'Add a Footer Blocks Box 6 Sidebox <b>Leave Blank</b> to use a Define Page (Admin > Tools > Define Pages Editor > DEFINE_CENTERBLOCKS_6.php).', '".$fb_configuration_id."', 19, NULL, now(), NULL, NULL)";

    $db->Execute($sql);

		

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 7 Row Group', 'FOOTERBLOCKS_NUMBER_7', '', 'Each Footer Block Box <b>MUST</b> be assigned to a <b>ROW GROUP</b>.', '".$fb_configuration_id."', 20, NULL, now(), NULL, 'zen_cfg_select_option(array(\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\'),')";

    $db->Execute($sql);

			

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 7 Heading', 'BLOCK_HEADING_FOOTERBLOCKS7', '', 'Add a Footer Blocks Box 7 Heading.', '".$fb_configuration_id."', 21, NULL, now(), NULL, NULL)";

    $db->Execute($sql);



		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 7 Sidebox', 'SIDEBOX_FOOTERBLOCKS_7', '', 'Add a Footer Blocks Box 7 Sidebox <b>Leave Blank</b> to use a Define Page (Admin > Tools > Define Pages Editor > DEFINE_CENTERBLOCKS_7.php).', '".$fb_configuration_id."', 22, NULL, now(), NULL, NULL)";

    $db->Execute($sql);

		

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 8 Row Group', 'FOOTERBLOCKS_NUMBER_8', '', 'Each Footer Block Box <b>MUST</b> be assigned to a <b>ROW GROUP</b>.', '".$fb_configuration_id."', 23, NULL, now(), NULL, 'zen_cfg_select_option(array(\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\'),')";

    $db->Execute($sql);

			

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 8 Heading', 'BLOCK_HEADING_FOOTERBLOCKS8', '', 'Add a Footer Blocks Box 8 Heading.', '".$fb_configuration_id."', 24, NULL, now(), NULL, NULL)";

    $db->Execute($sql);



		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 8 Sidebox', 'SIDEBOX_FOOTERBLOCKS_8', '', 'Add a Footer Blocks Box 8 Sidebox <b>Leave Blank</b> to use a Define Page (Admin > Tools > Define Pages Editor > DEFINE_CENTERBLOCKS_8.php).', '".$fb_configuration_id."', 25, NULL, now(), NULL, NULL)";

    $db->Execute($sql);

		

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 9 Row Group', 'FOOTERBLOCKS_NUMBER_9', '', 'Each Footer Block Box <b>MUST</b> be assigned to a <b>ROW GROUP</b>.', '".$fb_configuration_id."', 26, NULL, now(), NULL, 'zen_cfg_select_option(array(\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\'),')";

    $db->Execute($sql);

			

		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 9 Heading', 'BLOCK_HEADING_FOOTERBLOCKS9', '', 'Add a Footer Blocks Box 9 Heading.', '".$fb_configuration_id."', 27, NULL, now(), NULL, NULL)";

    $db->Execute($sql);



		$sql = "INSERT INTO ".DB_PREFIX."configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) 

    VALUES ('Footer Blocks Box 9 Sidebox', 'SIDEBOX_FOOTERBLOCKS_9', '', 'Add a Footer Blocks Box 9 Sidebox <b>Leave Blank</b> to use a Define Page (Admin > Tools > Define Pages Editor > DEFINE_CENTERBLOCKS_9.php).', '".$fb_configuration_id."', 28, NULL, now(), NULL, NULL)";

    $db->Execute($sql);



   if(file_exists(DIR_FS_ADMIN . DIR_WS_INCLUDES . 'auto_loaders/config.zca_footer_blocks.php'))

    {

        if(!unlink(DIR_FS_ADMIN . DIR_WS_INCLUDES . 'auto_loaders/config.zca_footer_blocks.php'))

	{

		$messageStack->add('The auto-loader file '.DIR_FS_ADMIN.'includes/auto_loaders/config.zca_footer_blocks.php has not been deleted. For this module to work you must delete the '.DIR_FS_ADMIN.'includes/auto_loaders/config.zca_footer_blocks.php file manually.  Before you post on the Zen Cart forum to ask, YES you are REALLY supposed to follow these instructions and delete the '.DIR_FS_ADMIN.'includes/auto_loaders/config.zca_footer_blocks.php file.','error');

	};

    }



       $messageStack->add('ZCA Footer Blocks install completed!','success');



    // find next sort order in admin_pages table

    $sql = "SELECT (MAX(sort_order)+2) as sort FROM ".TABLE_ADMIN_PAGES;

    $result = $db->Execute($sql);

    $admin_page_sort = $result->fields['sort'];



    // now register the admin pages

    // Admin Menu for ZCA Footer Blocks Configuration

    zen_deregister_admin_pages('configZCAFooterBlocks');

    zen_register_admin_page('configZCAFooterBlocks',

        'BOX_CONFIGURATION_FOOTERBLOCKS', 'FILENAME_CONFIGURATION',

        'gID=' . $fb_configuration_id, 'configuration', 'Y',

        $admin_page_sort);