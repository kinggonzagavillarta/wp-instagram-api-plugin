<?php
/*
Plugin Name: WP INSTA
Description: Demo plugin to fetch instagram post to wordpress via API.
Version: 1.0.0
Contributors: kingvillarta
Author: King Villarta
Author URI: https://kinggonzagavillarta.site
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wpinsta
Domain Path:  /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

// Define plugin paths and URLs
define( 'WPINSTA_URL', plugin_dir_url( __FILE__ ) );
define( 'WPINSTA_DIR', plugin_dir_path( __FILE__ ) );


// Create Settings Fields
include( plugin_dir_path( __FILE__ ) . 'includes/wpinsta-settings-fields.php');

// Create Plugin Admin Menus and Setting Pages
include( plugin_dir_path( __FILE__ ) . 'includes/wpinsta-menus.php');

// Create Custom Functions
include( plugin_dir_path( __FILE__ ) . 'includes/wpinsta-functions.php');


?>
