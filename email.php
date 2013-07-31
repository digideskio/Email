<?php
/*
 * Plugin Name: Email
 * Description: Email users with custom templates when certain actions happen, such as new posts, updated custom post types, deleted users.
 * Author: developdaly
 * Version: 0.1
 * Author URI: http://developdaly.com/
 */

define( 'EMAIL_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

require_once( EMAIL_DIR . 'admin.php' );
require_once( EMAIL_DIR . 'shortcodes.php' );
require_once( EMAIL_DIR . 'actions/router.php' );
require_once( EMAIL_DIR . 'templates/new.php' );

add_action( 'init',							'email_register' );
add_action( 'transition_post_status',		'email_action_router', 10, 3 );
add_action( 'admin_menu',					'email_add_menu' );
add_action( 'admin_enqueue_scripts',		'email_enqueue_scripts' );
add_action( 'wp_ajax_email_get_users',		'email_get_users' );
add_action( 'wp_ajax_email_get_template',	'email_get_template' );