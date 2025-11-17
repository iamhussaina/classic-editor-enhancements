<?php
/**
 * Main loader file for the Hussainas Quicktags Enhancement Module.
 *
 * This file defines constants, includes the main class, and initializes the module.
 * It is intended to be included from a theme's functions.php file.
 *
 * @package     HussainasQuicktags
 * @version     1.0.0
 * @author      Hussain Ahmed Shrabon
 * @license     MIT  GPLv2 or later
 * @link        https://github.com/iamhussaina
 * @textdomain  hussainas
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 1. Define Module Constants
// Define a unique constant to prevent re-initialization.
if ( defined( 'HUSSAINAS_QUICKTAGS_VERSION' ) ) {
	return;
}

define( 'HUSSAINAS_QUICKTAGS_VERSION', '1.0.0' );

// Use untrailingslashit for clean paths.
// __FILE__ ensures this works regardless of where it's included from (theme/plugin).
define( 'HUSSAINAS_QUICKTAGS_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'HUSSAINAS_QUICKTAGS_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

// 2. Include the Main Class
require_once HUSSAINAS_QUICKTAGS_PATH . '/class-hussainas-quicktags-loader.php';

// 3. Initialization Function
/**
 * Instantiates the main quicktags loader class.
 *
 * Fired after the theme is loaded to ensure all theme functions are available.
 */
function hussainas_load_quicktags_module() {
	// Instantiate the loader class.
	new Hussainas_Quicktags_Loader();
}
// Use 'after_setup_theme' to ensure it loads with the theme.
add_action( 'after_setup_theme', 'hussainas_load_quicktags_module', 20 );
