<?php
// -----
// Configuration initialization for the ZCAdditions' diy templates.
//
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// -----
// If a SuperUser admin is logged in, check to see that all of the new configuration settings required
// by the ZCA Responsive Classic template are present, adding them if not.
//
if (zen_is_superuser()) {
    // -----
    // So far, no additional values have been inserted.
    //
    $zca_responsive_classic_config_changes = array();
    
    // -----
    // 1) Configuration->Layout Settings:
    //
    $zca_which_group = 'Configuration->Layout Settings->';
    if (!defined('SET_COLUMN_LEFT_LAYOUT')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Responsive Left Column Width';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Responsive Left Column Width', 'SET_COLUMN_LEFT_LAYOUT', '2', 'Set Width of Left Column<br />Default is <b>2</b>, Total columns <b>12</b>.<br />Responsive Left, Center & Right Column Width must sum to 12', 19, NOW(), 200, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }
    if (!defined('SET_COLUMN_CENTER_LAYOUT')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Responsive Center Column Width';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Responsive Center Column Width', 'SET_COLUMN_CENTER_LAYOUT', '8', 'Set Width of Center Column<br />Default is <b>8</b>, Total columns <b>12</b>.<br />Responsive Left, Center & Right Column Width must sum to 12', 19, NOW(), 201, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }
    if (!defined('SET_COLUMN_RIGHT_LAYOUT')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Responsive Right Column Width';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Responsive Right Column Width', 'SET_COLUMN_RIGHT_LAYOUT', '2', 'Set Width of Right Column<br />Default is <b>2</b>, Total columns <b>12</b>.<br />Responsive Left, Center & Right Column Width must sum to 12', 19, NOW(), 202, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }
    if (!defined('SET_COLUMN_RIGHT_LAYOUT')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Responsive Mobile Full Site Version Width';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Responsive Mobile Full Site Version Width', 'SET_MAX_WIDTH', '1024', 'Set Width of Responsive Mobile Full Site Version<br />Default is <b>1024px</b>, To give mobile users same experience.', 19, NOW(), 203, NULL , NULL)"
        );
    }  
    // -----
    // 2) Configuration->Product Listing
    //
    $zca_which_group = 'Configuration->Product Listing->';
    if (!defined('PRODUCT_LISTING_LAYOUT_STYLE')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Listing Layout Style';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Listing Layout Style', 'PRODUCT_LISTING_LAYOUT_STYLE', 'columns', '<br /><br />Select the layout style:<br />Each product can be listed in its own row (rows option) or products can be listed in multiple columns per row (columns option)', 8, NOW(), 200, NULL, 'zen_cfg_select_option(array(''rows'',''columns''),')"
        );
        define('PRODUCT_LISTING_LAYOUT_STYLE', 'columns');
    }
    if (!defined('PRODUCT_LISTING_COLUMNS_PER_ROW')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Listing Columns Per Row';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Listing Columns Per Row (Desktop)', 'PRODUCT_LISTING_COLUMNS_PER_ROW', '3', '<br /><br />Set the number of columns (products) to show in each row on product listing pages for desktops. The default setting is 3.', 8, NOW(), 201, NULL , NULL)"
        );
    }
    if (!defined('PRODUCT_LISTING_COLUMNS_PER_ROW_TABLET')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Listing Columns Per Row (Tablet)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Listing Columns Per Row (Tablet)', 'PRODUCT_LISTING_COLUMNS_PER_ROW_TABLET', '2', '<br /><br />Set the number of columns (products) to show in each row on product listing pages for tablet devices. The default setting is 2.', 8, NOW(), 202, NULL , NULL)"
        );
    }
    if (!defined('PRODUCT_LISTING_COLUMNS_PER_ROW_MOBILE')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Listing Columns Per Row (Mobile)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Listing Columns Per Row (Mobile)', 'PRODUCT_LISTING_COLUMNS_PER_ROW_MOBILE', '1', '<br /><br />Set the number of columns (products) to show in each row on product listing pages for mobile devices. The default setting is 1.', 8, NOW(), 203, NULL , NULL)"
        );
    }				
    
    // -----
    // 3) Configuration->Product Info
    //
    $zca_which_group = 'Configuration->Product Info->';
    if (!defined('ZCA_PHOTOSWIPE_STATUS')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Use Photoswipe Lightbox';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Use Photoswipe Lightbox', 'ZCA_PHOTOSWIPE_STATUS', 'false', 'Default is <b>false</b>, Opens images in an individual modal, <b>true</b> opens images in a photoswipe lightbox.', 18, NOW(), 200, NULL, 'zen_cfg_select_option(array(''true'',''false''),')"
        );
    }			
    if (!defined('SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS_TABLET')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Also Purchased Products Columns per Row (Tablet)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Also Purchased Products Columns per Row (Tablet)', 'SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS_TABLET', '2', 'Also Purchased Products Columns per row on (Tablet Devices). Default = 2', 18, NOW(), 202, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }	
    if (!defined('SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS_MOBILE')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Also Purchased Products Columns per Row (Mobile)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Also Purchased Products Columns per Row (Mobile)', 'SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS_MOBILE', '1', 'Also Purchased Products Columns per row on (Mobile Devices). Default = 1', 18, NOW(), 203, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }				
    // -----
    // 3) Configuration->Images
    //
    $zca_which_group = 'Configuration->Images->';
    if (!defined('IMAGES_AUTO_ADDED_MOBILE')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Product Info - Number of Additional Images per Row (Mobile)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Product Info - Number of Additional Images per Row (Mobile)', 'IMAGES_AUTO_ADDED_MOBILE', '1', 'Product Info - Enter the number of additional images to display per row on (Mobile Devices). Default = 1', 4, NOW(), 200, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }			
    if (!defined('IMAGES_AUTO_ADDED_TABLET')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Product Info - Number of Additional Images per Row (Tablet)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Product Info - Number of Additional Images per Row (Tablet)', 'IMAGES_AUTO_ADDED_TABLET', '2', 'Enter the number of additional images to display per row on (Tablet Devices). Default = 2', 4, NOW(), 201, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }	
    // -----
    // 3) Configuration->Maximum Values
    //
    $zca_which_group = 'Configuration->Maximum Values->';
    if (!defined('MAX_DISPLAY_CATEGORIES_PER_ROW_MOBILE')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Categories To List Per Row (Mobile)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Categories To List Per Row (Mobile)', 'MAX_DISPLAY_CATEGORIES_PER_ROW_MOBILE', '1', 'How many categories to list per row on (Mobile Devices). Default = 1', 3, NOW(), 200, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }			
    if (!defined('MAX_DISPLAY_CATEGORIES_PER_ROW_TABLET')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Categories To List Per Row (Tablet)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Categories To List Per Row (Tablet)', 'MAX_DISPLAY_CATEGORIES_PER_ROW_TABLET', '2', 'How many categories to list per row on (Tablet Devices). Default = 2', 3, NOW(), 201, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }	
    // -----
    // 3) Configuration->Index Listing
    //
    $zca_which_group = 'Configuration->Index Listing->';
    if (!defined('SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS_MOBILE')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Featured Products Columns per Row (Mobile)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Featured Products Columns per Row (Mobile)', 'SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS_MOBILE', '1', 'Featured Products Columns per row on (Mobile Devices). Default = 1', 24, NOW(), 200, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }			
    if (!defined('SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS_TABLET')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Featured Products Columns per Row (Tablet)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Featured Products Columns per Row (Tablet)', 'SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS_TABLET', '2', 'Featured Products Columns per row on (Tablet Devices). Default = 2', 24, NOW(), 201, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }
    if (!defined('SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS_MOBILE')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'New Products Columns per Row (Mobile)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('New Products Columns per Row (Mobile)', 'SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS_MOBILE', '1', 'New Products Columns per row on (Mobile Devices). Default = 1', 24, NOW(), 200, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }			
    if (!defined('SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS_TABLET')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'New Products Columns per Row (Tablet)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('New Products Columns per Row (Tablet)', 'SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS_TABLET', '2', 'New Products Columns per row on (Tablet Devices). Default = 2', 24, NOW(), 201, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }
    if (!defined('SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS_MOBILE')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Special Products Columns per Row (Mobile)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Special Products Columns per Row (Mobile)', 'SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS_MOBILE', '1', 'Special Products Columns per row on (Mobile Devices). Default = 1', 24, NOW(), 200, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }			
    if (!defined('SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS_TABLET')) {
        $zca_responsive_classic_config_changes[] = $zca_which_group . 'Special Products Columns per Row (Tablet)';
        $db->Execute(
            "INSERT INTO " . TABLE_CONFIGURATION . "
                (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
             VALUES
                ('Special Products Columns per Row (Tablet)', 'SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS_TABLET', '2', 'Special Products Columns per row on (Tablet Devices). Default = 2', 24, NOW(), 201, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
        );
    }						
    // -----
    // If any insertions were performed above, let the admin know via message.
    //
    if (count($zca_responsive_classic_config_changes) != 0) {
        $zca_responsive_classic_config_changes = '<ol><li>' . implode('</li><li>', $zca_responsive_classic_config_changes) . '</li></ol>';
        $messageStack->add(sprintf(ZCA_DIY_SETTINGS_ADDED, $zca_responsive_classic_config_changes), 'warning');
    }
    
    // -----
    // Next, update the description and title of a couple of the built-in settings to let the store owner know that
    // they're not applicable/used when the ZCA DIY templates is active.
    //
    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION . "
            SET configuration_description = 'Width of the Left Column Boxes<br />px may be included<br />Default = 150px<br /><b>This configuration has no affect with the ZCA DIY or Bootstrap Templates<b/>',
                last_modified = now()
          WHERE configuration_key = 'BOX_WIDTH_LEFT' LIMIT 1"
    );
    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION . "
            SET configuration_description = 'Width of the Right Column Boxes<br />px may be included<br />Default = 150px<br /><b>This configuration has no affect with the ZCA DIY or Bootstrap Templates<b/>',
                last_modified = now()
          WHERE configuration_key = 'BOX_WIDTH_RIGHT' LIMIT 1"
    );
    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION . "
            SET configuration_description = 'Width of the Left Column<br />px may be included<br />Default = 150px<br /><br /><b>This configuration has no affect with the ZCA DIY or Bootstrap Templates<b/>',
                last_modified = now()
          WHERE configuration_key = 'COLUMN_WIDTH_LEFT' LIMIT 1"
    );
    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION . "
            SET configuration_description = 'Width of the Right Column<br />px may be included<br />Default = 150px<br /><b>This configuration has no affect with the ZCA DIY or Bootstrap Templates<b/>',
                last_modified = now()
          WHERE configuration_key = 'COLUMN_WIDTH_RIGHT' LIMIT 1"
    );

    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION . "
            SET configuration_title = 'Product Info - Number of Additional Images per Row (Desktop)',
                last_modified = now()
          WHERE configuration_key = 'IMAGES_AUTO_ADDED' LIMIT 1"
    );

    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION . "
            SET configuration_title = 'Also Purchased Products Columns per Row (Desktop)',
                last_modified = now()
          WHERE configuration_key = 'SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS' LIMIT 1"
    );

    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION . "
            SET configuration_title = 'Categories To List Per Row (Desktop)',
                last_modified = now()
          WHERE configuration_key = 'MAX_DISPLAY_CATEGORIES_PER_ROW' LIMIT 1"
    );

    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION . "
            SET configuration_title = 'Featured Products Columns per Row (Desktop)',
                last_modified = now()
          WHERE configuration_key = 'SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS' LIMIT 1"
    );

    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION . "
            SET configuration_title = 'New Products Columns per Row (Desktop)',
                last_modified = now()
          WHERE configuration_key = 'SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS' LIMIT 1"
    );

    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION . "
            SET configuration_title = 'Special Products Columns per Row (Desktop)',
                last_modified = now()
          WHERE configuration_key = 'SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS' LIMIT 1"
    );

    // -----
    // Next, alter the layout_boxes table and add 2 new fields
    //

//		$db->Execute(
//		"ALTER TABLE " . TABLE_LAYOUT_BOXES . " DROP COLUMN layout_box_status_mobile");
		
//		$db->Execute(
//		"ALTER TABLE " . TABLE_LAYOUT_BOXES . " DROP COLUMN layout_box_status_tablet");		
		
//		$db->Execute(
//		"ALTER TABLE " . TABLE_LAYOUT_BOXES . " ADD COLUMN layout_box_status_mobile TINYINT(1) NOT NULL default '1' after layout_box_status_single");
		
//		$db->Execute(
//		"ALTER TABLE " . TABLE_LAYOUT_BOXES . " ADD COLUMN layout_box_status_tablet TINYINT(1) NOT NULL default '1' after layout_box_status_mobile");
		
// -----
// If the current template has just been CHANGED to the ZCA Responsive Classic (or a clone), ensure that the
// Zen Cart configuration values required contain the recommended values for the template (if existing).
//
// The ZCA Responsive Classic template (and its clones) contains the storefront file /includes/languages/english/extra_definitions/YOUR_TEMPLATE/zca_diy_id.php,
// where YOUR_TEMPLATE is the name of the template.  Use the PRESENCE of that file to identify a DIY Template template.
//
if ($current_page == (FILENAME_TEMPLATE_SELECT . '.php') && isset($_GET['action']) && $_GET['action'] == 'save' && isset($_POST['ln'])) {
    if (file_exists(DIR_FS_CATALOG . DIR_WS_LANGUAGES . 'english/extra_definitions/' . $_POST['ln'] . '/zca_diy_id.php')) {
        // -----
        // Finally, compare the Zen Cart built-in settings to see if they're different from the ZCA Responsive Classic Template
        // recommendations.  If so, create a log file identifying what's different and let the current admin
        // know about the changes.
        //
        $zca_responsive_classic_configs = array(
            'IMAGE_USE_CSS_BUTTONS' => 'Yes',
            'SHOW_CATEGORIES_SEPARATOR_LINK' => '0',
            'SHOW_SHOPPING_CART_DELETE' => '1',
            'PRODUCT_LIST_PRICE_BUY_NOW' => '1',
            'PRODUCT_LISTING_MULTIPLE_ADD_TO_CART' => '0'
        );
        $sql_update = '';
        foreach ($zca_responsive_classic_configs as $key => $value) {
            if (constant($key) != $value) {
                $sql_update .= ("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '$value', last_modified = now() WHERE configuration_key = '$key' LIMIT 1;" . PHP_EOL);
            }
        }
        
        if ($sql_update != '') {
            $logfile_name = DIR_FS_LOGS . '/zca_responsive_classic_' . date('YmdHis') . '.log';
            $messageStack->add(sprintf(ZCA_DIY_CONFIG_WARNING, $logfile_name), 'warning');
            
            $logfile_data = 'The ZCA "Responsive Classic" template (or a clone) was activated on ' . date('Y-m-d H:i:s') . ' and some of its default settings are different than those currently set.  You can copy and paste the following SQL into your admin\'s Tools->Install SQL Patches to change those defaults:' . PHP_EOL . PHP_EOL . $sql_update;
            error_log($logfile_data, 3, $logfile_name);
        }
    }
}
}
