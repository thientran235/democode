<?php

/**
 * Demo Map
 *
 * @package     Demo Map
 * @author      thientran2359
 * @copyright   2021 thientran2350
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Demo Map
 * Plugin URI:  https://woocommerce.vn
 * Description: A simple starter for demo map
 * Version:     1.0.0
 * Author:      thientran2359
 * Author URI:  https://woocommerce.vn
 * Text Domain: demo-map
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */

// Block direct access to file
defined( 'ABSPATH' ) or die( 'Not Authorized!' );

// Plugin Defines
define( "WPS_FILE", __FILE__ );
define( "WPS_DIRECTORY", dirname(__FILE__) );
define( "WPS_TEXT_DOMAIN", dirname(__FILE__) );
define( "WPS_DIRECTORY_BASENAME", plugin_basename( WPS_FILE ) );
define( "WPS_DIRECTORY_PATH", plugin_dir_path( WPS_FILE ) );
define( "WPS_DIRECTORY_URL", plugins_url( null, WPS_FILE ) );

// Require the main class file
require_once( WPS_DIRECTORY . '/include/main-class.php' );
