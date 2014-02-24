<?php
/**
 * @package   Email
 * @author    Patrick Daly <patrick@developdaly.com>
 * @license   GPL-2.0+
 * @link      http://wordpress.org/extend/plugins/email
 * @copyright 2014 Patrick Daly
 *
 * @wordpress-plugin
 * Plugin Name:       Email
 * Plugin URI:        http://wordpress.org/extend/plugins/email
 * Description:       Email users with custom templates when certain actions happen, such as new posts, updated custom post types, deleted users.
 * Version:           2.0.0
 * Author:            Patrick Daly
 * Author URI:        http://developdaly.com
 * Text Domain:       email
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/developdaly/email
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-email.php` with the name of the plugin's class file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/class-email.php' );
require_once( plugin_dir_path( __FILE__ ) . 'admin/views/templates.php' );
require_once( plugin_dir_path( __FILE__ ) . 'admin/includes/router.php' );
require_once( plugin_dir_path( __FILE__ ) . 'admin/includes/parser.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace Email with the name of the class defined in
 *   `class-email.php`
 */
register_activation_hook( __FILE__, array( 'Email', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Email', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace Email with the name of the class defined in
 *   `class-email.php`
 */
add_action( 'plugins_loaded', array( 'Email', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

if ( is_admin() ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-email-admin.php' );
	add_action( 'plugins_loaded', array( 'Email_Admin', 'get_instance' ) );

}
