<?php
/*
Plugin Name: Lead Magnets
Plugin URI:  http://helloirena.com/wordpress-plugins/lead-magnets/
Description: Displays a link to a popup, containing your newsletter subscription form together with additional title, subtitle and spam statement, which you can adjust for each form. Lead Magnets is lightweight and you can include it in any post or page.
Version:     1.0.1
Author:      Irena Verweij
Author URI:  http://helloirena.com/
Text Domain: lead-magnets
Domain Path: /languages

License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

//Load Languages
add_action( 'init', 'lead_magnets_load_languages' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function lead_magnets_load_languages() {
  load_plugin_textdomain( 'lead-magnets', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

	//include metaboxes, functions
include( plugin_dir_path( __FILE__ ) . 'includes/functions.php');
